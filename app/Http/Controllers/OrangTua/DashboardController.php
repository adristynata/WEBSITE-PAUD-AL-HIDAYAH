<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use App\Models\LaporanBulanan;
use App\Models\CatatanMingguan;
use App\Models\ProfilSekolah;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Ambil siswa yang dikaitkan dengan orang tua, lengkap dengan wali kelas dan laporan bulanan yang sudah dipublikasikan
        $siswas = $user->siswas()
            ->with(['kelas.guru', 'laporanBulanans' => function ($query) {
                $query->where('status', 'published')
                      ->orderBy('tahun', 'desc')
                      ->orderBy('bulan', 'desc');
            }])
            ->get();

        // Ambil daftar notifikasi untuk header
        $notifications = Notifikasi::query()
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Tarik data catatan guru terbaru & statistik capaian untuk setiap anak
        $latestCatatans = [];
        $capaianStatsPerSiswa = [];

        foreach ($siswas as $s) {
            // Catatan mingguan terbaru
            $latestCatatans[$s->id] = CatatanMingguan::where('siswa_id', $s->id)
                ->orderBy('tahun', 'desc')
                ->orderBy('bulan', 'desc')
                ->orderBy('minggu_ke', 'desc')
                ->take(3)
                ->get();

            // Hitung statistik capaian 7 aspek dari semua catatan mingguan
            $allCatatans = CatatanMingguan::where('siswa_id', $s->id)->get();
            $capaianCounts = ['BSB' => 0, 'BSH' => 0, 'MB' => 0, 'BB' => 0];
            foreach ($allCatatans as $c) {
                foreach (['nilai_agama_moral', 'motorik_kasar', 'motorik_halus', 'kognitif', 'bahasa', 'sosial_emosional', 'seni'] as $aspek) {
                    $val = $c->$aspek;
                    if (isset($capaianCounts[$val])) {
                        $capaianCounts[$val]++;
                    }
                }
            }
            $capaianStatsPerSiswa[$s->id] = $capaianCounts;
        }

        $myTestimoni = \App\Models\Testimoni::where('user_id', $user->id)->first();

        return view('ortu.dashboard', compact('siswas', 'notifications', 'latestCatatans', 'capaianStatsPerSiswa', 'myTestimoni'));
    }

    public function showLaporan($id)
    {
        $user = Auth::user();
        $laporan = LaporanBulanan::query()->with(['siswa.kelas.guru'])->findOrFail($id);

        // Validasi hak akses orang tua terhadap data anak
        if (!$user->siswas->contains($laporan->siswa_id)) {
            abort(403, 'Anda tidak memiliki hak akses untuk melihat laporan ini.');
        }

        // Status notifikasi berubah menjadi telah dibaca setelah orang tua membuka laporan
        Notifikasi::where('user_id', $user->id)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        // Ambil catatan evaluasi mingguan dari guru untuk periode bulan & tahun yang sama
        $catatansGuru = CatatanMingguan::where('siswa_id', $laporan->siswa_id)
            ->where('bulan', $laporan->bulan)
            ->where('tahun', $laporan->tahun)
            ->orderBy('minggu_ke', 'asc')
            ->get();

        // Ambil notifikasi untuk tetap tampil di topbar header
        $notifications = Notifikasi::query()
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('ortu.laporan.show', compact('laporan', 'catatansGuru', 'notifications'));
    }

    public function readNotifikasi($id)
    {
        $user = Auth::user();
        $notif = Notifikasi::where('user_id', $user->id)->findOrFail($id);
        
        $notif->is_read = true;
        $notif->save();

        return redirect($notif->link ?? route('ortu.dashboard'));
    }

    public function downloadPdf($id)
    {
        $user = Auth::user();
        $laporan = LaporanBulanan::query()->with(['siswa.kelas.guru'])->findOrFail($id);

        if (!$user->siswas->contains($laporan->siswa_id)) {
            abort(403, 'Anda tidak memiliki hak akses untuk mengunduh laporan ini.');
        }

        $profil = ProfilSekolah::query()->first();

        // Ambil catatan evaluasi mingguan dari guru untuk disertakan pada PDF
        $catatansGuru = CatatanMingguan::where('siswa_id', $laporan->siswa_id)
            ->where('bulan', $laporan->bulan)
            ->where('tahun', $laporan->tahun)
            ->orderBy('minggu_ke', 'asc')
            ->get();

        $pdf = Pdf::loadView('ortu.laporan.pdf', compact('laporan', 'profil', 'catatansGuru'));
        return $pdf->download('Laporan_' . str_replace(' ', '_', $laporan->siswa->nama) . '_' . $laporan->bulan . '_' . $laporan->tahun . '.pdf');
    }

    public function updateFoto(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'foto' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ], [
            'foto.required' => 'Pilih file foto terlebih dahulu.',
            'foto.image'    => 'File harus berupa gambar.',
            'foto.mimes'    => 'Format gambar harus JPG, JPEG, atau PNG.',
            'foto.max'      => 'Ukuran foto maksimal 2MB.',
        ]);

        $user = Auth::user();

        // Hapus foto lama jika ada
        if ($user->foto && \Illuminate\Support\Facades\Storage::disk('public')->exists('profil/' . $user->foto)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete('profil/' . $user->foto);
        }

        $filename = 'ortu_' . $user->id . '_' . time() . '.' . $request->file('foto')->getClientOriginalExtension();
        $request->file('foto')->storeAs('profil', $filename, 'public');

        $user->foto = $filename;
        $user->save();

        return back()->with('success', 'Foto profil Anda berhasil diperbarui!');
    }
}
