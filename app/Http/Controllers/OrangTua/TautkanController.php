<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TautkanController extends Controller
{
    public function show()
    {
        // Jika sudah punya anak tertaut, langsung ke dashboard
        if (Auth::user()->siswas()->exists()) {
            return redirect()->route('ortu.dashboard');
        }
        return view('ortu.tautkan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis'           => 'required|string',
            'tanggal_lahir' => 'required|date',
        ]);

        $siswa = Siswa::where('nis', $request->nis)
                      ->where('tanggal_lahir', $request->tanggal_lahir)
                      ->where('is_aktif', true)
                      ->first();

        if (!$siswa) {
            return back()->withErrors([
                'nis' => 'NIS dan tanggal lahir tidak cocok dengan data siswa. Hubungi pihak sekolah.',
            ])->withInput();
        }

        // Cek apakah sudah ditautkan sebelumnya
        $sudahTautkan = Auth::user()->siswas()->where('siswa_id', $siswa->id)->exists();
        if (!$sudahTautkan) {
            Auth::user()->siswas()->attach($siswa->id);
        }

        return redirect()->route('ortu.dashboard')
                         ->with('success', 'Akun berhasil ditautkan dengan data ' . $siswa->nama . '!');
    }
}
