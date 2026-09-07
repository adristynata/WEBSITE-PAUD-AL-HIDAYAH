<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use App\Models\CatatanMingguan;
use App\Models\LaporanBulanan;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_siswa'  => Siswa::where('is_aktif', true)->count(),
            'total_kelas'  => Kelas::count(),
            'total_guru'   => User::where('role', 'guru')->count(),
            'total_ortu'   => User::where('role', 'orang_tua')->count(),
        ];

        // Analytics 1: Rekap Total Capaian Evaluasi Perkembangan Anak
        $allCatatans = CatatanMingguan::all();
        $capaianStats = [
            'BSB' => 0,
            'BSH' => 0,
            'MB'  => 0,
            'BB'  => 0,
        ];
        
        // Analytics Tren per Minggu (Minggu 1, 2, 3, 4) untuk Line Chart
        $weeklyLineData = [
            'labels' => ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
            'BSB' => [0, 0, 0, 0],
            'BSH' => [0, 0, 0, 0],
            'MB'  => [0, 0, 0, 0],
            'BB'  => [0, 0, 0, 0],
        ];

        foreach ($allCatatans as $c) {
            $wIndex = min(max((int)$c->minggu_ke - 1, 0), 3);
            foreach (['nilai_agama_moral', 'motorik_kasar', 'motorik_halus', 'kognitif', 'bahasa', 'sosial_emosional', 'seni'] as $aspek) {
                $val = $c->$aspek;
                if (isset($capaianStats[$val])) {
                    $capaianStats[$val]++;
                }
                if (isset($weeklyLineData[$val])) {
                    $weeklyLineData[$val][$wIndex]++;
                }
            }
        }

        // Analytics 2: Distribusi Siswa per Kelas
        $kelases = Kelas::withCount(['siswas' => function($q) {
            $q->where('is_aktif', true);
        }])->get();

        // Analytics 3: Status Laporan Bulanan
        $laporanStats = [
            'published' => LaporanBulanan::where('status', 'published')->count(),
            'draft'     => LaporanBulanan::where('status', 'draft')->count(),
        ];

        // Aktivitas Evaluasi Terbaru (Recent Activities)
        $recentCatatans = CatatanMingguan::with('siswa.kelas')
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'capaianStats', 'weeklyLineData', 'kelases', 'laporanStats', 'recentCatatans'));
    }
}
