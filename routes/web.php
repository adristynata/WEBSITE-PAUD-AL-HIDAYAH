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
use App\Http\Controllers\Guru\ProfilController as GuruProfil;
use App\Http\Controllers\OrangTua\DashboardController as OrtuDashboard;
use App\Http\Controllers\OrangTua\TautkanController;
use Illuminate\Support\Facades\Route;

// ─── Halaman Publik ────────────────────────────────────────────────────────────
Route::get('/', function () {
    $profil = \App\Models\ProfilSekolah::query()->first();
    $galeris = \App\Models\Galeri::query()->orderBy('created_at', 'desc')->take(6)->get();
    $testimonis = \App\Models\Testimoni::approved()->orderBy('created_at', 'desc')->take(6)->get();
    return view('welcome', compact('profil', 'galeris', 'testimonis'));
})->name('home');

Route::get('/prestasi', function () {
    $profil = \App\Models\ProfilSekolah::query()->first();
    $prestasis = \App\Models\Prestasi::query()->orderBy('tahun', 'desc')->orderBy('created_at', 'desc')->get();
    return view('prestasi', compact('profil', 'prestasis'));
})->name('prestasi');

Route::get('/galeri', function () {
    $profil = \App\Models\ProfilSekolah::query()->first();
    $galeris = \App\Models\Galeri::query()->orderBy('created_at', 'desc')->paginate(9);
    return view('galeri', compact('profil', 'galeris'));
})->name('galeri.publik');

// ─── Auth ──────────────────────────────────────────────────────────────────────
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/login/ortu', function() { return redirect()->route('login'); });
Route::post('/login', [AuthController::class, 'login'])->name('login.post')->middleware('throttle:10,1');
Route::post('/login/ortu', [AuthController::class, 'loginOrtu'])->name('login.ortu')->middleware('throttle:10,1');
Route::get('/login/check-nis/{nis}', [AuthController::class, 'checkNisStatus'])->name('login.check-nis')->middleware('throttle:30,1');
Route::get('/login/setup-pin', [AuthController::class, 'showSetupPin'])->name('login.setup-pin');
Route::post('/login/setup-pin', [AuthController::class, 'setupPin'])->name('login.setup-pin.post')->middleware('throttle:10,1');
Route::get('/test-429', function() { return response()->view('errors.429', [], 429); })->name('test-429');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ─── Admin ─────────────────────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

    // Kelas
    Route::resource('kelas', KelasController::class)->parameters(['kelas' => 'kelas']);

    // Siswa
    Route::resource('siswa', SiswaController::class)->except(['show']);
    Route::patch('siswa/{siswa}/toggle-aktif', [SiswaController::class, 'toggleAktif'])->name('siswa.toggle-aktif');

    // Laporan Bulanan
    Route::get('/laporan', [LaporanBulananController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/buat', [LaporanBulananController::class, 'create'])->name('laporan.create');
    Route::post('/laporan', [LaporanBulananController::class, 'store'])->name('laporan.store');
    Route::get('/laporan/{id}/edit', [LaporanBulananController::class, 'edit'])->name('laporan.edit');
    Route::put('/laporan/{id}', [LaporanBulananController::class, 'update'])->name('laporan.update');

    // Profil Sekolah (CMS Sambutan & Fonnte)
    Route::get('/profil', [ProfilSekolahController::class, 'edit'])->name('profil.edit');
    Route::put('/profil', [ProfilSekolahController::class, 'update'])->name('profil.update');
    Route::post('/profil/test-fonnte', [ProfilSekolahController::class, 'testFonnte'])->name('profil.test-fonnte');

    // Galeri
    Route::resource('galeri', GaleriController::class)->only(['index', 'create', 'store', 'destroy']);

    // Prestasi
    Route::resource('prestasi', \App\Http\Controllers\Admin\PrestasiController::class);

    // Indikator Penilaian
    Route::resource('indikator', IndikatorController::class)->except(['show']);

    // Review / Testimoni Orang Tua
    Route::resource('testimoni', \App\Http\Controllers\Admin\TestimoniController::class)->only(['index', 'store', 'destroy']);
    Route::patch('testimoni/{id}/status', [\App\Http\Controllers\Admin\TestimoniController::class, 'updateStatus'])->name('testimoni.update-status');
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

    // Profil & TTD Guru
    Route::get('/profil', [GuruProfil::class, 'edit'])->name('profil.edit');
    Route::match(['post', 'put'], '/profil', [GuruProfil::class, 'update'])->name('profil.update');
});

// ─── Orang Tua ─────────────────────────────────────────────────────────────────
Route::prefix('ortu')->name('ortu.')->middleware(['auth', 'role:orang_tua'])->group(function () {
    Route::get('/dashboard', [OrtuDashboard::class, 'index'])->name('dashboard');
    Route::get('/laporan/{id}', [OrtuDashboard::class, 'showLaporan'])->name('laporan.show');
    Route::get('/laporan/{id}/download', [OrtuDashboard::class, 'downloadPdf'])->name('laporan.download');
    Route::get('/notifikasi/{id}/read', [OrtuDashboard::class, 'readNotifikasi'])->name('notifikasi.read');
    Route::post('/profil/foto', [OrtuDashboard::class, 'updateFoto'])->name('profil.foto');
    Route::post('/testimoni', [\App\Http\Controllers\OrangTua\TestimoniController::class, 'store'])->name('testimoni.store');
    Route::delete('/testimoni/{id?}', [\App\Http\Controllers\OrangTua\TestimoniController::class, 'destroy'])->name('testimoni.destroy');
});
