<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $kelas = Auth::user()->kelas()->with('siswas')->get();
        return view('guru.dashboard', compact('kelas'));
    }
}
