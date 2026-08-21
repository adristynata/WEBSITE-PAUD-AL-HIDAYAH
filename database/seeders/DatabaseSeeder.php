<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── Admin ──────────────────────────────────────────
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@paud-alhidayah.sch.id',
            'password' => Hash::make('password123'),
            'role'     => 'admin',
        ]);

        // ── Guru ───────────────────────────────────────────
        $guru1 = User::create([
            'name'     => 'Bu Liris',
            'email'    => 'liris@paud-alhidayah.sch.id',
            'password' => Hash::make('password123'),
            'role'     => 'guru',
        ]);

        $guru2 = User::create([
            'name'     => 'Bu Imas',
            'email'    => 'imas@paud-alhidayah.sch.id',
            'password' => Hash::make('password123'),
            'role'     => 'guru',
        ]);

        $guru3 = User::create([
            'name'     => 'Bu Ria',
            'email'    => 'ria@paud-alhidayah.sch.id',
            'password' => Hash::make('password123'),
            'role'     => 'guru',
        ]);

        // ── Kelas ──────────────────────────────────────────
        $kelasA = Kelas::create([
            'nama_kelas'   => 'Kelompok A',
            'tahun_ajaran' => '2026/2027',
            'guru_id'      => $guru1->id,
        ]);

        // ── Siswa ──────────────────────────────────────────
        $siswa1 = Siswa::create([
            'nis'           => '2025001',
            'nama'          => 'Ahmad Fauzi',
            'tanggal_lahir' => '2021-03-15',
            'kelas_id'      => $kelasA->id,
            'kontak_ortu'   => '081234567890',
        ]);

        $siswa2 = Siswa::create([
            'nis'           => '2025002',
            'nama'          => 'Siti Rahmah',
            'tanggal_lahir' => '2021-07-22',
            'kelas_id'      => $kelasA->id,
            'kontak_ortu'   => '082345678901',
        ]);

        $siswa3 = Siswa::create([
            'nis'           => '2025003',
            'nama'          => 'Budi Santoso',
            'tanggal_lahir' => '2020-11-05',
            'kelas_id'      => $kelasA->id,
            'kontak_ortu'   => '083456789012',
        ]);

        // ── Orang Tua ──────────────────────────────────────
        $ortu1 = User::create([
            'name'     => 'Bapak Fauzi (Ortu Ahmad)',
            'email'    => 'ortu.ahmad@gmail.com',
            'password' => Hash::make('password123'),
            'role'     => 'orang_tua',
        ]);

        // Tautkan ortu ke siswa
        $ortu1->siswas()->attach($siswa1->id);

        // ── Profil Sekolah ─────────────────────────────────
        \App\Models\ProfilSekolah::create([
            'sambutan_judul'   => 'Mewujudkan Generasi Berakhlak Mulia & Kreatif',
            'sambutan_nama'    => 'Sri Wahyuni, S.Pd.',
            'sambutan_jabatan' => 'Kepala Sekolah PAUD Al-Hidayah',
            'sambutan_teks'    => "Selamat datang di keluarga besar PAUD Al Hidayah. Kami percaya bahwa setiap anak adalah bintang yang memiliki cahaya masing-masing. Di sini, kami hadir untuk menjaga cahaya tersebut tetap bersinar melalui kasih sayang dan bimbingan yang tepat.\n\nTerima kasih atas kepercayaan yang Anda berikan kepada kami untuk mendampingi masa-masa emas (golden age) buah hati Anda. Mari bersama-sama kita tuntun langkah awal mereka menuju masa depan yang gemilang.",
            'sambutan_foto'    => 'foto kepsek1.jpg',
        ]);
    }
}
