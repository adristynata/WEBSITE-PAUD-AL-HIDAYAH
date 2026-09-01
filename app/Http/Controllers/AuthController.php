<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return $this->redirectByRole();
        }
        return view('auth.login');
    }

    // ── Login Admin / Guru (email + password) ─────────────────────────────
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // Pastikan bukan orang tua (ortu punya login sendiri)
            if (Auth::user()->role === 'orang_tua') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Orang tua login melalui tab "Orang Tua" dengan NIS dan tanggal lahir anak.',
                ])->onlyInput('email');
            }
            $request->session()->regenerate();
            return $this->redirectByRole();
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // ── Login Orang Tua (NIS + PIN / Tanggal Lahir) ───────────────────────
    public function loginOrtu(Request $request)
    {
        $validated = $request->validate([
            'nis' => ['required', 'string'],
        ], [
            'nis.required' => 'NIS anak wajib diisi.',
        ]);

        $siswa = Siswa::where('nis', '=', $validated['nis'])
            ->where('is_aktif', '=', true)
            ->first();
        if (!$siswa) {
            return back()->withErrors([
                'nis' => 'Data anak tidak ditemukan atau sudah tidak aktif.',
            ])->withInput()->with('tab', 'ortu');
        }

        $ortu = $siswa->orangTuas()->first();
        $hasPin = $ortu && !is_null($ortu->pin);

        if ($hasPin) {
            // Login harian pakai PIN
            $request->validate([
                'pin' => ['required', 'string', 'size:6'],
            ], [
                'pin.required' => 'PIN wajib diisi.',
                'pin.size' => 'PIN harus berupa 6-digit angka.',
            ]);

            if ($ortu->pin !== $request->pin) {
                return back()->withErrors([
                    'nis' => 'PIN yang Anda masukkan salah.',
                ])->withInput()->with('tab', 'ortu');
            }

            Auth::login($ortu);
            $request->session()->regenerate();

            return redirect()->route('ortu.dashboard')
                             ->with('success', 'Selamat datang kembali, Orang Tua dari ' . $siswa->nama . '.');
        } else {
            // Aktivasi pertama kali pakai Tanggal Lahir
            $request->validate([
                'tanggal_lahir' => ['required', 'date'],
            ], [
                'tanggal_lahir.required' => 'Tanggal lahir anak wajib diisi untuk aktivasi pertama kali.',
            ]);

            // Robust parsing of tanggal_lahir format (works if Carbon object or string)
            $dbTanggalLahir = $siswa->tanggal_lahir;
            $dbTanggalLahirStr = '';

            if ($dbTanggalLahir instanceof \Carbon\Carbon) {
                $dbTanggalLahirStr = $dbTanggalLahir->format('Y-m-d');
            } elseif (is_string($dbTanggalLahir)) {
                $dbTanggalLahirStr = date('Y-m-d', strtotime($dbTanggalLahir));
            } else {
                $dbTanggalLahirStr = \Carbon\Carbon::parse($dbTanggalLahir)->format('Y-m-d');
            }

            if ($dbTanggalLahirStr !== $request->tanggal_lahir) {
                return back()->withErrors([
                    'nis' => 'Tanggal lahir anak tidak cocok dengan data sekolah.',
                ])->withInput()->with('tab', 'ortu');
            }

            // Buat akun orang tua jika belum ada
            if (!$ortu) {
                $firstWord = strtolower(explode(' ', trim($siswa->nama))[0]);
                $cleanName = preg_replace('/[^a-z0-9]/', '', $firstWord);
                $baseEmail = 'ortu.' . $cleanName . '@gmail.com';
                $email = $baseEmail;
                $counter = 1;
                while (User::where('email', $email)->exists()) {
                    $email = 'ortu.' . $cleanName . $counter . '@gmail.com';
                    $counter++;
                }

                $ortu = User::create([
                    'name'     => 'Orang Tua ' . $siswa->nama,
                    'email'    => $email,
                    'password' => bcrypt($siswa->nis . $dbTanggalLahirStr),
                    'role'     => 'orang_tua',
                ]);
                $ortu->siswas()->attach($siswa->id);
            }

            // Simpan ke session untuk setup PIN
            session([
                'activation_user_id' => $ortu->id,
                'activation_siswa_id' => $siswa->id
            ]);

            return redirect()->route('login.setup-pin');
        }
    }

    public function checkNisStatus($nis)
    {
        $siswa = Siswa::where('nis', $nis)->where('is_aktif', true)->first();
        if (!$siswa) {
            return response()->json(['exists' => false]);
        }

        $ortu = $siswa->orangTuas()->first();
        $hasPin = $ortu && !is_null($ortu->pin);

        return response()->json([
            'exists'  => true,
            'has_pin' => $hasPin
        ]);
    }

    public function showSetupPin()
    {
        return view('auth.setup-pin');
    }

    public function setupPin(Request $request)
    {
        $request->validate([
            'pin' => ['required', 'digits:6', 'confirmed'],
        ], [
            'pin.required' => 'PIN wajib diisi.',
            'pin.digits'   => 'PIN harus berupa 6-digit angka.',
            'pin.confirmed' => 'Konfirmasi PIN tidak cocok.',
        ]);

        if (session()->has('activation_user_id')) {
            $user = User::findOrFail(session('activation_user_id'));
            $user->pin = $request->pin;
            $user->save();

            // Clear session keys
            session()->forget(['activation_user_id', 'activation_siswa_id']);

            // Log in directly
            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->route('ortu.dashboard')
                             ->with('success', 'Aktivasi berhasil! PIN Anda telah disimpan. Selamat datang!');
        }

        return redirect()->route('login')->with('success', 'PIN berhasil dibuat!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    private function redirectByRole()
    {
        return match(Auth::user()->role) {
            'admin'     => redirect()->route('admin.dashboard'),
            'guru'      => redirect()->route('guru.dashboard'),
            'orang_tua' => redirect()->route('ortu.dashboard'),
            default     => redirect('/'),
        };
    }
}
