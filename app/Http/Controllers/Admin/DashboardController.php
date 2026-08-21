<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;

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
        return view('admin.dashboard', compact('stats'));
    }
}
