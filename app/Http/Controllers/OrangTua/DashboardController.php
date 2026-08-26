<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use App\Models\LaporanBulanan;
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

        return view('ortu.dashboard', compact('siswas', 'notifications'));
    }

    public function showLaporan($id)
    {
        $user = Auth::user();
        $laporan = LaporanBulanan::query()->with(['siswa.kelas.guru'])->findOrFail($id);

        // Validasi hak akses orang tua terhadap data anak
        if (!$user->siswas->contains($laporan->siswa_id)) {
            abort(403, 'Anda tidak memiliki hak akses untuk melihat laporan ini.');
        }

        // Ambil notifikasi untuk tetap tampil di topbar header
        $notifications = Notifikasi::query()
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('ortu.laporan.show', compact('laporan', 'notifications'));
    }

    public function readNotifikasi($id)
    {
        $notif = Notifikasi::query()
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        $notif->update(['is_read' => true]);

        return redirect($notif->link ?? route('ortu.dashboard'));
    }

    public function downloadPdf($id)
    {
        $user = Auth::user();
        $laporan = LaporanBulanan::query()->with(['siswa.kelas.guru'])->findOrFail($id);

        // Validasi hak akses orang tua terhadap data anak
        if (!$user->siswas->contains($laporan->siswa_id)) {
            abort(403, 'Anda tidak memiliki hak akses untuk mengunduh laporan ini.');
        }

        $months = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];
        $namaBulan = $months[$laporan->bulan] ?? $laporan->bulan;

        $profil = ProfilSekolah::query()->first();

        // Render view ke PDF
        $pdf = Pdf::loadView('ortu.laporan.pdf', compact('laporan', 'profil'));

        // Nama file dinamis
        $filename = 'Laporan_Perkembangan_' . str_replace(' ', '_', $laporan->siswa->nama) . '_' . $namaBulan . '_' . $laporan->tahun . '.pdf';

        return $pdf->download($filename);
    }
}
