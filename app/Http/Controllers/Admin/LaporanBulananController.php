<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\CatatanMingguan;
use App\Models\LaporanBulanan;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LaporanBulananController extends Controller
{
    public function index(Request $request)
    {
        $kelases = Kelas::query()->get();
        $kelas_id = $request->input('kelas_id', $kelases->first()?->id);
        $bulan = (int) $request->input('bulan', date('m'));
        $tahun = (int) $request->input('tahun', date('Y'));

        $siswas = null;
        if ($kelas_id) {
            $siswas = Siswa::query()->where('kelas_id', $kelas_id)
                ->where('is_aktif', true)
                ->with(['laporanBulanans' => function($q) use ($bulan, $tahun) {
                    $q->where('bulan', $bulan)->where('tahun', $tahun);
                }])
                ->orderBy('nama')
                ->paginate(10)
                ->withQueryString();
        }

        return view('admin.laporan.index', compact('kelases', 'kelas_id', 'bulan', 'tahun', 'siswas'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'bulan' => 'required|numeric|between:1,12',
            'tahun' => 'required|numeric',
        ]);

        $siswa = Siswa::findOrFail($request->siswa_id);
        $bulan = (int) $request->bulan;
        $tahun = (int) $request->tahun;

        // Ambil catatan mingguan siswa pada bulan/tahun tersebut untuk dipajang side-by-side
        $catatans = CatatanMingguan::query()->where('siswa_id', $siswa->id)
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->orderBy('minggu_ke', 'asc')
            ->get();

        return view('admin.laporan.create', compact('siswa', 'bulan', 'tahun', 'catatans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'bulan' => 'required|numeric|between:1,12',
            'tahun' => 'required|numeric',
            'rekap_agama_moral' => 'required|string',
            'rekap_motorik_kasar' => 'required|string',
            'rekap_motorik_halus' => 'required|string',
            'rekap_kognitif' => 'required|string',
            'rekap_bahasa' => 'required|string',
            'rekap_sosial_emosional' => 'required|string',
            'rekap_seni' => 'required|string',
            'status' => 'required|in:draft,published',
        ]);

        // Cek duplikasi
        $exists = LaporanBulanan::query()->where('siswa_id', $request->siswa_id)
            ->where('bulan', $request->bulan)
            ->where('tahun', $request->tahun)
            ->exists();

        if ($exists) {
            return back()->withErrors(['duplikat' => 'Laporan bulanan siswa ini sudah ada.'])->withInput();
        }

        $validated['disunting_oleh'] = Auth::id();

        $laporan = LaporanBulanan::query()->create($validated);

        // Jika status published, buat notifikasi untuk orang tua & kirim pesan Fonnte WA
        if ($request->status === 'published') {
            $this->createNotification($laporan);
            $this->sendFonnteWaNotification($laporan);
        }

        return redirect()->route('admin.laporan.index', [
            'kelas_id' => $laporan->siswa->kelas_id,
            'bulan' => $laporan->bulan,
            'tahun' => $laporan->tahun
        ])->with('success', 'Laporan bulanan berhasil disimpan.');
    }

    public function edit($id)
    {
        $laporan = LaporanBulanan::query()->with('siswa')->findOrFail($id);
        $siswa = $laporan->siswa;
        $bulan = $laporan->bulan;
        $tahun = $laporan->tahun;

        // Ambil catatan mingguan
        $catatans = CatatanMingguan::query()->where('siswa_id', $siswa->id)
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->orderBy('minggu_ke', 'asc')
            ->get();

        return view('admin.laporan.edit', compact('laporan', 'siswa', 'bulan', 'tahun', 'catatans'));
    }

    public function update(Request $request, $id)
    {
        $laporan = LaporanBulanan::findOrFail($id);

        $request->validate([
            'rekap_agama_moral' => 'required|string',
            'rekap_motorik_kasar' => 'required|string',
            'rekap_motorik_halus' => 'required|string',
            'rekap_kognitif' => 'required|string',
            'rekap_bahasa' => 'required|string',
            'rekap_sosial_emosional' => 'required|string',
            'rekap_seni' => 'required|string',
            'status' => 'required|in:draft,published',
        ]);

        $oldStatus = $laporan->status;
        $laporan->update($request->only([
            'rekap_agama_moral', 'rekap_motorik_kasar', 'rekap_motorik_halus',
            'rekap_kognitif', 'rekap_bahasa', 'rekap_sosial_emosional', 'rekap_seni', 'status'
        ]));

        // Kirim notifikasi jika status dipublish
        if ($request->status === 'published') {
            $this->createNotification($laporan);
            $this->sendFonnteWaNotification($laporan);
        }

        return redirect()->route('admin.laporan.index', [
            'kelas_id' => $laporan->siswa->kelas_id,
            'bulan' => $laporan->bulan,
            'tahun' => $laporan->tahun
        ])->with('success', 'Laporan bulanan berhasil diperbarui.');
    }

    private function createNotification(LaporanBulanan $laporan)
    {
        // Cari user orang tua dari siswa ini
        $parentUsers = $laporan->siswa->orangTuas;
        
        $months = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];
        $namaBulan = $months[$laporan->bulan] ?? $laporan->bulan;

        foreach ($parentUsers as $parent) {
            Notifikasi::query()->create([
                'user_id' => $parent->id,
                'judul' => 'Laporan Bulanan Baru Terbit! 📊',
                'pesan' => 'Laporan perkembangan anak Anda ' . $laporan->siswa->nama . ' untuk periode ' . $namaBulan . ' ' . $laporan->tahun . ' telah diterbitkan. Silakan lihat selengkapnya.',
                'link' => route('ortu.dashboard'),
                'is_read' => false
            ]);
        }
    }

    private function sendFonnteWaNotification(LaporanBulanan $laporan)
    {
        // Ambil konfigurasi Fonnte dari database (Admin dapat mengaturnya di halaman Profil Sekolah)
        $profil = \App\Models\ProfilSekolah::first();
        $token = $profil?->fonnte_token ?? config('services.fonnte.token');

        if (empty($token)) {
            Log::warning('Fonnte WA skipped: Fonnte API Token belum diatur di Profil Sekolah / .env');
            return;
        }

        $months = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];
        $namaBulan = $months[$laporan->bulan] ?? $laporan->bulan;

        $appUrl  = $profil?->app_url ?? config('app.url', 'https://paud-alhidayah.com');
        $siswa   = $laporan->siswa;
        $nis     = $siswa->nis;
        // Hint password awal: tanggal lahir format DDMMYYYY
        $tglLahir = $siswa->tanggal_lahir
            ? \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('dmY')
            : 'Tanggal Lahir Anak (DDMMYYYY)';

        $message = "📢 *PEMBERITAHUAN RESMI*\n"
                 . "*KB-PAUD AL-HIDAYAH WEDELAN*\n\n"
                 . "Yth. Bapak/Ibu Orang Tua/Wali dari *{$siswa->nama}*,\n\n"
                 . "Laporan perkembangan anak Anda untuk periode *{$namaBulan} {$laporan->tahun}* "
                 . "telah diterbitkan oleh wali kelas.\n\n"
                 . "📋 *Data Akses Portal Orang Tua:*\n"
                 . "• NIS Anak       : *{$nis}*\n"
                 . "• Password Awal  : *{$tglLahir}*\n\n"
                 . "🌐 Silakan buka website resmi kami:\n"
                 . "*{$appUrl}*\n\n"
                 . "Masuk menggunakan NIS anak dan PIN yang sudah Anda daftarkan. "
                 . "Jika belum pernah login, gunakan Tanggal Lahir anak (format: DDMMYYYY) "
                 . "sebagai password awal untuk membuat PIN baru.\n\n"
                 . "Terima kasih atas kepercayaan Bapak/Ibu kepada kami.\n\n"
                 . "_KB-PAUD Al-Hidayah Wedelan_";

        // Tentukan target: kirim per nomor orang tua, atau ke nomor/grup tetap jika diisi
        $fixedTarget = $profil?->fonnte_target ?? config('services.fonnte.target');

        if (!empty($fixedTarget)) {
            // Kirim ke nomor/grup tetap (misal grup WA kelas / nomor admin)
            try {
                $response = Http::withoutVerifying()
                    ->withHeaders(['Authorization' => $token])
                    ->post('https://api.fonnte.com/send', [
                        'target'  => $fixedTarget,
                        'message' => $message,
                    ]);
                Log::info('Fonnte WA (fixed target) Response: ' . $response->body());
            } catch (\Exception $e) {
                Log::error('Fonnte WA (fixed target) Error: ' . $e->getMessage());
            }
        } else {
            // Kirim personal ke nomor HP masing-masing orang tua
            $phones = [];
            if (!empty($siswa->kontak_ortu)) {
                $phones[] = $siswa->kontak_ortu;
            }
            foreach ($siswa->orangTuas as $parent) {
                if (!empty($parent->email) && preg_match('/^[0-9+]+$/', $parent->email)) {
                    $phones[] = $parent->email;
                }
            }
            $phones = array_unique(array_filter($phones));

            if (empty($phones)) {
                Log::warning("Fonnte WA skipped for {$siswa->nama}: Kontak Ortu / Nomor WA belum diisi pada data siswa.");
                return;
            }

            foreach ($phones as $rawPhone) {
                $phone = preg_replace('/[^0-9]/', '', $rawPhone);
                if (str_starts_with($phone, '0')) {
                    $phone = '62' . substr($phone, 1);
                }

                try {
                    $response = Http::withoutVerifying()
                        ->withHeaders(['Authorization' => $token])
                        ->post('https://api.fonnte.com/send', [
                            'target'  => $phone,
                            'message' => $message,
                        ]);
                    Log::info("Fonnte WA (personal) Response [{$phone}]: " . $response->body());
                } catch (\Exception $e) {
                    Log::error("Fonnte WA (personal) Error [{$phone}]: " . $e->getMessage());
                }
            }
        }
    }
}

