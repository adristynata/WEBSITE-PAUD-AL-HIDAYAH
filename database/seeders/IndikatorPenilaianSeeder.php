<?php

namespace Database\Seeders;

use App\Models\IndikatorPenilaian;
use Illuminate\Database\Seeder;

class IndikatorPenilaianSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama agar tidak duplikat
        IndikatorPenilaian::truncate();

        $data = [
            // ── Agama & Moral ──
            ['aspek' => 'agama_moral', 'nilai' => 'BB',  'urutan' => 1, 'teks' => 'Belum mau berdoa dan belum mengenal aturan keagamaan sederhana.'],
            ['aspek' => 'agama_moral', 'nilai' => 'MB',  'urutan' => 1, 'teks' => 'Mulai mau berdoa dengan bimbingan guru, mulai mengenal aturan sederhana.'],
            ['aspek' => 'agama_moral', 'nilai' => 'BSH', 'urutan' => 1, 'teks' => 'Mampu berdoa sendiri dengan benar dan menunjukkan sikap sopan kepada teman dan guru.'],
            ['aspek' => 'agama_moral', 'nilai' => 'BSH', 'urutan' => 2, 'teks' => 'Memahami aturan sederhana di kelas dan menerapkan nilai moral dalam kegiatan sehari-hari.'],
            ['aspek' => 'agama_moral', 'nilai' => 'BSB', 'urutan' => 1, 'teks' => 'Selalu berdoa dengan khusyuk, aktif mengingatkan teman untuk berdoa, dan berakhlak mulia.'],

            // ── Motorik Kasar ──
            ['aspek' => 'motorik_kasar', 'nilai' => 'BB',  'urutan' => 1, 'teks' => 'Belum mampu berlari atau melompat dengan seimbang, perlu dukungan penuh dari guru.'],
            ['aspek' => 'motorik_kasar', 'nilai' => 'MB',  'urutan' => 1, 'teks' => 'Mulai mampu berlari dan melompat dengan sedikit bimbingan, keseimbangan masih berkembang.'],
            ['aspek' => 'motorik_kasar', 'nilai' => 'BSH', 'urutan' => 1, 'teks' => 'Mampu berlari, melompat, dan melempar dengan koordinasi yang baik secara mandiri.'],
            ['aspek' => 'motorik_kasar', 'nilai' => 'BSH', 'urutan' => 2, 'teks' => 'Gerakan tubuh terkoordinasi dengan baik, mampu menjaga keseimbangan saat beraktivitas fisik.'],
            ['aspek' => 'motorik_kasar', 'nilai' => 'BSB', 'urutan' => 1, 'teks' => 'Sangat terampil dalam berbagai gerakan fisik, menjadi contoh bagi teman-teman di kelas.'],

            // ── Motorik Halus ──
            ['aspek' => 'motorik_halus', 'nilai' => 'BB',  'urutan' => 1, 'teks' => 'Belum mampu memegang alat tulis dengan benar, koordinasi tangan dan mata masih lemah.'],
            ['aspek' => 'motorik_halus', 'nilai' => 'MB',  'urutan' => 1, 'teks' => 'Mulai mampu menggunting dan menggambar dengan bimbingan, meski hasilnya belum rapi.'],
            ['aspek' => 'motorik_halus', 'nilai' => 'BSH', 'urutan' => 1, 'teks' => 'Mampu menggambar, menggunting, dan meronce dengan rapi secara mandiri.'],
            ['aspek' => 'motorik_halus', 'nilai' => 'BSH', 'urutan' => 2, 'teks' => 'Keterampilan tangan berkembang baik, mampu mewarnai dalam batas garis dengan cukup rapi.'],
            ['aspek' => 'motorik_halus', 'nilai' => 'BSB', 'urutan' => 1, 'teks' => 'Sangat terampil, hasil karya sangat rapi dan kreatif, melampaui ekspektasi usianya.'],

            // ── Kognitif ──
            ['aspek' => 'kognitif', 'nilai' => 'BB',  'urutan' => 1, 'teks' => 'Belum mampu mengenal bentuk, warna, dan angka sederhana meski dengan bimbingan.'],
            ['aspek' => 'kognitif', 'nilai' => 'MB',  'urutan' => 1, 'teks' => 'Mulai mengenal bentuk, warna, dan angka dengan bimbingan intensif dari guru.'],
            ['aspek' => 'kognitif', 'nilai' => 'BSH', 'urutan' => 1, 'teks' => 'Mampu menghitung, mengenal bentuk dan warna, serta memecahkan masalah sederhana secara mandiri.'],
            ['aspek' => 'kognitif', 'nilai' => 'BSH', 'urutan' => 2, 'teks' => 'Dapat mengklasifikasikan benda berdasarkan bentuk, ukuran, dan warna dengan tepat.'],
            ['aspek' => 'kognitif', 'nilai' => 'BSB', 'urutan' => 1, 'teks' => 'Mampu berpikir logis dan menyelesaikan tantangan secara mandiri, rasa ingin tahu sangat tinggi.'],

            // ── Bahasa ──
            ['aspek' => 'bahasa', 'nilai' => 'BB',  'urutan' => 1, 'teks' => 'Belum mampu mengungkapkan keinginan dengan kata-kata, komunikasi sangat terbatas.'],
            ['aspek' => 'bahasa', 'nilai' => 'MB',  'urutan' => 1, 'teks' => 'Mulai menggunakan kata-kata sederhana untuk berkomunikasi, kosakata masih sangat terbatas.'],
            ['aspek' => 'bahasa', 'nilai' => 'BSH', 'urutan' => 1, 'teks' => 'Mampu bercerita singkat, memahami instruksi sederhana, dan kosakata terus berkembang.'],
            ['aspek' => 'bahasa', 'nilai' => 'BSH', 'urutan' => 2, 'teks' => 'Dapat mengikuti percakapan dua arah dan mampu menjawab pertanyaan dengan kalimat lengkap.'],
            ['aspek' => 'bahasa', 'nilai' => 'BSB', 'urutan' => 1, 'teks' => 'Sangat komunikatif, kosakata sangat kaya, mampu bercerita runtut dan menarik perhatian teman.'],

            // ── Sosial Emosional ──
            ['aspek' => 'sosial_emosional', 'nilai' => 'BB',  'urutan' => 1, 'teks' => 'Belum mampu berbagi, sering menangis atau marah tanpa sebab yang jelas, sulit ditenangkan.'],
            ['aspek' => 'sosial_emosional', 'nilai' => 'MB',  'urutan' => 1, 'teks' => 'Mulai mau berbagi mainan dengan bimbingan guru, emosi mulai bisa dikendalikan.'],
            ['aspek' => 'sosial_emosional', 'nilai' => 'BSH', 'urutan' => 1, 'teks' => 'Mampu berbagi, bekerja sama dalam kelompok, dan mulai mengendalikan emosi secara mandiri.'],
            ['aspek' => 'sosial_emosional', 'nilai' => 'BSH', 'urutan' => 2, 'teks' => 'Menunjukkan empati kepada teman, mau membantu teman yang kesulitan.'],
            ['aspek' => 'sosial_emosional', 'nilai' => 'BSB', 'urutan' => 1, 'teks' => 'Sangat mandiri dan penuh empati, sering menjadi pemimpin kelompok yang positif bagi teman.'],

            // ── Seni ──
            ['aspek' => 'seni', 'nilai' => 'BB',  'urutan' => 1, 'teks' => 'Belum tertarik mengikuti kegiatan seni (menggambar, mewarnai, bernyanyi), perlu motivasi dan bimbingan penuh.'],
            ['aspek' => 'seni', 'nilai' => 'MB',  'urutan' => 1, 'teks' => 'Mulai mau mengikuti nyanyian anak atau mewarnai gambar dengan dorongan dan arahan guru.'],
            ['aspek' => 'seni', 'nilai' => 'BSH', 'urutan' => 1, 'teks' => 'Mampu mengekspresikan diri melalui seni rupa (mewarnai, kolase, melipat) dan bernyanyi dengan percaya diri.'],
            ['aspek' => 'seni', 'nilai' => 'BSH', 'urutan' => 2, 'teks' => 'Kreatif memadukan warna dan menghasilkan karya seni sederhana secara mandiri serta menghargai karyanya.'],
            ['aspek' => 'seni', 'nilai' => 'BSB', 'urutan' => 1, 'teks' => 'Sangat kreatif dan memiliki apresiasi seni tinggi, antusias memimpin bernyanyi dan menciptakan karya orisinal.'],
        ];

        foreach ($data as $item) {
            IndikatorPenilaian::create($item);
        }
    }
}
