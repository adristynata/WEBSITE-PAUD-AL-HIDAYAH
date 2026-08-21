<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\LaporanBulananController;
use App\Http\Controllers\Admin\ProfilSekolahController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\IndikatorController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboard;
use App\Http\Controllers\Guru\CatatanMingguanController;
use App\Http\Controllers\OrangTua\DashboardController as OrtuDashboard;
use App\Http\Controllers\OrangTua\TautkanController;
use Illuminate\Support\Facades\Route;

// ─── Halaman Publik ────────────────────────────────────────────────────────────
Route::get('/', function () {
    // Auto-copy uploaded login images if they exist in system uploads
    $src1 = "C:\\Users\\HP\\.gemini\\antigravity\\brain\\03753526-d35b-42fa-b7fe-6ac8a552c3ba\\.user_uploaded\\media_1786408321321.png";
    $src2 = "C:\\Users\\HP\\.gemini\\antigravity\\brain\\03753526-d35b-42fa-b7fe-6ac8a552c3ba\\.user_uploaded\\media_1786408250473.png";
    $dest1 = public_path('images/login-classroom.png');
    $dest2 = public_path('images/login-classroom2.png');
    
    if (file_exists($src1)) {
        @copy($src1, $dest1);
    }
    if (file_exists($src2)) {
        @copy($src2, $dest2);
    }

    $profil = \App\Models\ProfilSekolah::query()->first();
    $galeris = \App\Models\Galeri::query()->orderBy('created_at', 'desc')->get();
    return view('welcome', compact('profil', 'galeris'));
})->name('home');

// ─── Auth ──────────────────────────────────────────────────────────────────────
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/login/ortu', [AuthController::class, 'loginOrtu'])->name('login.ortu');
Route::get('/login/check-nis/{nis}', [AuthController::class, 'checkNisStatus'])->name('login.check-nis');
Route::get('/login/setup-pin', [AuthController::class, 'showSetupPin'])->name('login.setup-pin');
Route::post('/login/setup-pin', [AuthController::class, 'setupPin'])->name('login.setup-pin.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ─── Admin ─────────────────────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

    // Kelas
    Route::resource('kelas', KelasController::class)->parameters(['kelas' => 'kelas']);

    // Siswa
    Route::resource('siswa', SiswaController::class)->except(['destroy', 'show']);
    Route::patch('siswa/{siswa}/toggle-aktif', [SiswaController::class, 'toggleAktif'])->name('siswa.toggle-aktif');

    // Laporan Bulanan
    Route::get('/laporan', [LaporanBulananController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/buat', [LaporanBulananController::class, 'create'])->name('laporan.create');
    Route::post('/laporan', [LaporanBulananController::class, 'store'])->name('laporan.store');
    Route::get('/laporan/{id}/edit', [LaporanBulananController::class, 'edit'])->name('laporan.edit');
    Route::put('/laporan/{id}', [LaporanBulananController::class, 'update'])->name('laporan.update');

    // Profil Sekolah (CMS Sambutan)
    Route::get('/profil', [ProfilSekolahController::class, 'edit'])->name('profil.edit');
    Route::put('/profil', [ProfilSekolahController::class, 'update'])->name('profil.update');

    // Galeri
    Route::resource('galeri', GaleriController::class)->only(['index', 'create', 'store', 'destroy']);

    // Indikator Penilaian
    Route::resource('indikator', IndikatorController::class)->except(['show']);
});

// ─── Guru ──────────────────────────────────────────────────────────────────────
Route::prefix('guru')->name('guru.')->middleware(['auth', 'role:guru'])->group(function () {
    Route::get('/dashboard', [GuruDashboard::class, 'index'])->name('dashboard');

    // Catatan Mingguan
    Route::get('/catatan', [CatatanMingguanController::class, 'index'])->name('catatan.index');
    Route::get('/catatan/kelas/{kelas_id}', [CatatanMingguanController::class, 'showSiswa'])->name('catatan.siswa');
    Route::get('/catatan/siswa/{siswa_id}', [CatatanMingguanController::class, 'listCatatan'])->name('catatan.list');
    Route::get('/catatan/siswa/{siswa_id}/tambah', [CatatanMingguanController::class, 'create'])->name('catatan.create');
    Route::post('/catatan/simpan', [CatatanMingguanController::class, 'store'])->name('catatan.store');
    Route::get('/catatan/{id}/edit', [CatatanMingguanController::class, 'edit'])->name('catatan.edit');
    Route::put('/catatan/{id}/update', [CatatanMingguanController::class, 'update'])->name('catatan.update');
});

// ─── Orang Tua ─────────────────────────────────────────────────────────────────
Route::prefix('ortu')->name('ortu.')->middleware(['auth', 'role:orang_tua'])->group(function () {
    Route::get('/dashboard', [OrtuDashboard::class, 'index'])->name('dashboard');
    Route::get('/laporan/{id}', [OrtuDashboard::class, 'showLaporan'])->name('laporan.show');
    Route::get('/laporan/{id}/download', [OrtuDashboard::class, 'downloadPdf'])->name('laporan.download');
    Route::get('/notifikasi/{id}/read', [OrtuDashboard::class, 'readNotifikasi'])->name('notifikasi.read');
});
