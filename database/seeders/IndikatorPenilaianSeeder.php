<?php

namespace Database\Seeders;

use App\Models\IndikatorPenilaian;
use Illuminate\Database\Seeder;

class IndikatorPenilaianSeeder extends Seeder
{
    public function run(): void
    {
        // Truncate existing data to ensure clean 5 indicators per (aspek, nilai)
        IndikatorPenilaian::truncate();

        $data = [
            // ══════════════════════════════════════════════════════════════
            // 1. AGAMA & MORAL (5 per nilai = 20 total)
            // ══════════════════════════════════════════════════════════════
            // BB
            ['aspek' => 'agama_moral', 'nilai' => 'BB', 'urutan' => 1, 'teks' => 'Belum mau berdoa dan belum mengenal aturan keagamaan sederhana.'],
            ['aspek' => 'agama_moral', 'nilai' => 'BB', 'urutan' => 2, 'teks' => 'Masih perlu bimbingan penuh untuk mengucapkan kalimat thayyibah (salam/bismillah/alhamdulillah).'],
            ['aspek' => 'agama_moral', 'nilai' => 'BB', 'urutan' => 3, 'teks' => 'Belum mau duduk tenang saat kegiatan pembiasaan ibadah bersama di kelas.'],
            ['aspek' => 'agama_moral', 'nilai' => 'BB', 'urutan' => 4, 'teks' => 'Belum memahami konsep kejujuran dan belum bisa membedakan perilaku baik dan buruk.'],
            ['aspek' => 'agama_moral', 'nilai' => 'BB', 'urutan' => 5, 'teks' => 'Masih enggan merawat perlengkapan ibadah dan lingkungan tempat belajar.'],
            // MB
            ['aspek' => 'agama_moral', 'nilai' => 'MB', 'urutan' => 1, 'teks' => 'Mulai mau berdoa dengan bimbingan dan contoh rutin dari guru.'],
            ['aspek' => 'agama_moral', 'nilai' => 'MB', 'urutan' => 2, 'teks' => 'Mulai terbiasa mengucapkan salam saat masuk kelas dengan dorongan motivasi.'],
            ['aspek' => 'agama_moral', 'nilai' => 'MB', 'urutan' => 3, 'teks' => 'Mulai mau duduk tenang beberapa saat ketika diajak kegiatan pembiasaan ibadah.'],
            ['aspek' => 'agama_moral', 'nilai' => 'MB', 'urutan' => 4, 'teks' => 'Mulai dapat membedakan contoh perilaku baik dan kurang baik melalui peragaan cerita.'],
            ['aspek' => 'agama_moral', 'nilai' => 'MB', 'urutan' => 5, 'teks' => 'Mulai bersikap sopan kepada guru dan teman namun masih perlu sering diingatkan.'],
            // BSH
            ['aspek' => 'agama_moral', 'nilai' => 'BSH', 'urutan' => 1, 'teks' => 'Mampu berdoa sendiri dengan benar sebelum dan sesudah melakukan kegiatan.'],
            ['aspek' => 'agama_moral', 'nilai' => 'BSH', 'urutan' => 2, 'teks' => 'Terbiasa mengucapkan salam, terima kasih, dan maaf dalam interaksi sehari-hari.'],
            ['aspek' => 'agama_moral', 'nilai' => 'BSH', 'urutan' => 3, 'teks' => 'Menunjukkan sikap menghormati ibadah dan antusias mengikuti pembiasaan agama.'],
            ['aspek' => 'agama_moral', 'nilai' => 'BSH', 'urutan' => 4, 'teks' => 'Menunjukkan sikap jujur, sopan santun, dan mau berbagi dengan teman secara sukarela.'],
            ['aspek' => 'agama_moral', 'nilai' => 'BSH', 'urutan' => 5, 'teks' => 'Mampu menjaga kebersihan diri dan merawat perlengkapan pribadi sebagai bentuk syukur.'],
            // BSB
            ['aspek' => 'agama_moral', 'nilai' => 'BSB', 'urutan' => 1, 'teks' => 'Selalu berdoa dengan khusyuk, percaya diri, dan mampu memimpin hafalan doa pendek.'],
            ['aspek' => 'agama_moral', 'nilai' => 'BSB', 'urutan' => 2, 'teks' => 'Menjadi teladan akhlak terpuji, sopan santun, dan tutur kata santun di lingkungan sekolah.'],
            ['aspek' => 'agama_moral', 'nilai' => 'BSB', 'urutan' => 3, 'teks' => 'Spontan mengucapkan kalimat thayyibah dalam berbagai situasi dan aktif mengajak teman berbuat baik.'],
            ['aspek' => 'agama_moral', 'nilai' => 'BSB', 'urutan' => 4, 'teks' => 'Konsisten menerapkan aturan agama dan nilai moral secara mandiri serta menghargai sesama.'],
            ['aspek' => 'agama_moral', 'nilai' => 'BSB', 'urutan' => 5, 'teks' => 'Menunjukkan kepedulian tinggi terhadap lingkungan, hewan, dan sesama tanpa perlu diingatkan.'],

            // ══════════════════════════════════════════════════════════════
            // 2. MOTORIK KASAR (5 per nilai = 20 total)
            // ══════════════════════════════════════════════════════════════
            // BB
            ['aspek' => 'motorik_kasar', 'nilai' => 'BB', 'urutan' => 1, 'teks' => 'Belum mampu berlari atau melompat dengan seimbang, butuh bantuan fisik penuh dari guru.'],
            ['aspek' => 'motorik_kasar', 'nilai' => 'BB', 'urutan' => 2, 'teks' => 'Masih ragu-ragu dan takut saat diajak melakukan permainan gerakan motorik kasar.'],
            ['aspek' => 'motorik_kasar', 'nilai' => 'BB', 'urutan' => 3, 'teks' => 'Belum dapat menyeimbangkan badan saat berdiri satu kaki atau berjalan di papan titian.'],
            ['aspek' => 'motorik_kasar', 'nilai' => 'BB', 'urutan' => 4, 'teks' => 'Koordinasi mata-tangan-kaki masih sangat lemah saat melempar atau menangkap bola.'],
            ['aspek' => 'motorik_kasar', 'nilai' => 'BB', 'urutan' => 5, 'teks' => 'Cepat lelah dan belum aktif mengikuti kegiatan senam/kesegaran jasmani di sekolah.'],
            // MB
            ['aspek' => 'motorik_kasar', 'nilai' => 'MB', 'urutan' => 1, 'teks' => 'Mulai mampu berlari dan melompat dengan bimbingan, keseimbangan masih berkembang.'],
            ['aspek' => 'motorik_kasar', 'nilai' => 'MB', 'urutan' => 2, 'teks' => 'Mulai berani mencoba permainan fisik kelompok walau masih terlihat canggung.'],
            ['aspek' => 'motorik_kasar', 'nilai' => 'MB', 'urutan' => 3, 'teks' => 'Mampu berdiri di atas satu kaki sejenak atau berjalan di papan titian dengan dipegangi.'],
            ['aspek' => 'motorik_kasar', 'nilai' => 'MB', 'urutan' => 4, 'teks' => 'Mulai bisa melempar bola ke arah depan walau tangkapan bola belum tepat.'],
            ['aspek' => 'motorik_kasar', 'nilai' => 'MB', 'urutan' => 5, 'teks' => 'Antusias mengikuti gerakan senam sederhana meski gerakannya belum seragam.'],
            // BSH
            ['aspek' => 'motorik_kasar', 'nilai' => 'BSH', 'urutan' => 1, 'teks' => 'Mampu berlari, melompat, meloncat, dan memanjat dengan koordinasi tubuh yang baik.'],
            ['aspek' => 'motorik_kasar', 'nilai' => 'BSH', 'urutan' => 2, 'teks' => 'Lincah dan seimbang saat berjalan di atas papan titian atau melompati rintangan kecil.'],
            ['aspek' => 'motorik_kasar', 'nilai' => 'BSH', 'urutan' => 3, 'teks' => 'Mampu melempar, menangkap, dan menendang bola besar secara terarah dan terkoordinasi.'],
            ['aspek' => 'motorik_kasar', 'nilai' => 'BSH', 'urutan' => 4, 'teks' => 'Aktif dan gembira mengikuti senam irama serta permainan fisik luar ruangan secara mandiri.'],
            ['aspek' => 'motorik_kasar', 'nilai' => 'BSH', 'urutan' => 5, 'teks' => 'Memiliki stamina dan kekuatan fisik yang cukup untuk menyelesaikan rangkaian aktivitas fisik.'],
            // BSB
            ['aspek' => 'motorik_kasar', 'nilai' => 'BSB', 'urutan' => 1, 'teks' => 'Sangat terampil dan lincah dalam berbagai gerakan fisik kompleks dan permainan ketangkasan.'],
            ['aspek' => 'motorik_kasar', 'nilai' => 'BSB', 'urutan' => 2, 'teks' => 'Memiliki keseimbangan, kelenturan, dan ketahanan tubuh yang luar biasa saat beraktivitas.'],
            ['aspek' => 'motorik_kasar', 'nilai' => 'BSB', 'urutan' => 3, 'teks' => 'Mampu mengontrol arah, kecepatan, dan akurasi lemparan/tendangan bola dengan sangat presisi.'],
            ['aspek' => 'motorik_kasar', 'nilai' => 'BSB', 'urutan' => 4, 'teks' => 'Menjadi pemimpin senam di depan kelas dan cepat menguasai koreografi gerakan baru.'],
            ['aspek' => 'motorik_kasar', 'nilai' => 'BSB', 'urutan' => 5, 'teks' => 'Selalu energik, menunjukkan sportivitas tinggi, serta antusias membantu teman bermain.'],

            // ══════════════════════════════════════════════════════════════
            // 3. MOTORIK HALUS (5 per nilai = 20 total)
            // ══════════════════════════════════════════════════════════════
            // BB
            ['aspek' => 'motorik_halus', 'nilai' => 'BB', 'urutan' => 1, 'teks' => 'Belum mampu memegang alat tulis dengan benar, genggaman tangan masih sangat kaku.'],
            ['aspek' => 'motorik_halus', 'nilai' => 'BB', 'urutan' => 2, 'teks' => 'Belum mampu menggunting kertas dan tangan masih canggung saat meronce atau menempel.'],
            ['aspek' => 'motorik_halus', 'nilai' => 'BB', 'urutan' => 3, 'teks' => 'Coretan garis masih acak dan belum mampu mewarnai di dalam area batas gambar.'],
            ['aspek' => 'motorik_halus', 'nilai' => 'BB', 'urutan' => 4, 'teks' => 'Kesulitan mengancingkan baju, menempel stiker, atau meremas adonan playdough sendiri.'],
            ['aspek' => 'motorik_halus', 'nilai' => 'BB', 'urutan' => 5, 'teks' => 'Koordinasi mata dan jari tangan belum fokus dalam menyelesaikan tugas presisi kecil.'],
            // MB
            ['aspek' => 'motorik_halus', 'nilai' => 'MB', 'urutan' => 1, 'teks' => 'Mulai mampu memegang alat tulis mendekati posisi tepat dengan arahan bimbingan.'],
            ['aspek' => 'motorik_halus', 'nilai' => 'MB', 'urutan' => 2, 'teks' => 'Mulai bisa menggunting garis lurus pendek meski hasilnya belum sepenuhnya lurus.'],
            ['aspek' => 'motorik_halus', 'nilai' => 'MB', 'urutan' => 3, 'teks' => 'Mulai mampu mewarnai bentuk sederhana walau terkadang masih keluar dari garis.'],
            ['aspek' => 'motorik_halus', 'nilai' => 'MB', 'urutan' => 4, 'teks' => 'Mulai dapat meronce manik-manik besar dan meremas playdough membentuk benda sederhana.'],
            ['aspek' => 'motorik_halus', 'nilai' => 'MB', 'urutan' => 5, 'teks' => 'Mulai menunjukkan kontrol jari yang membaik saat menempel kertas atau menyusun puzzle.'],
            // BSH
            ['aspek' => 'motorik_halus', 'nilai' => 'BSH', 'urutan' => 1, 'teks' => 'Mampu memegang pensil/krayon dengan tumpuan tiga jari (tripod grip) secara benar.'],
            ['aspek' => 'motorik_halus', 'nilai' => 'BSH', 'urutan' => 2, 'teks' => 'Rapi dalam menggunting mengikuti pola garis, meronce manik-manik medium, dan menempel.'],
            ['aspek' => 'motorik_halus', 'nilai' => 'BSH', 'urutan' => 3, 'teks' => 'Mampu mewarnai gambar dengan rapi tanpa keluar garis serta variasi warna yang menarik.'],
            ['aspek' => 'motorik_halus', 'nilai' => 'BSH', 'urutan' => 4, 'teks' => 'Terampil membentuk playdough/lempung menjadi figur tertentu sesuai imajinasi.'],
            ['aspek' => 'motorik_halus', 'nilai' => 'BSH', 'urutan' => 5, 'teks' => 'Mampu mengurus diri sendiri seperti mengancingkan baju dan melepaskan tali sepatu.'],
            // BSB
            ['aspek' => 'motorik_halus', 'nilai' => 'BSB', 'urutan' => 1, 'teks' => 'Sangat terampil, halus, dan presisi dalam menggunakan alat tulis, gunting, dan bahan kerajinan.'],
            ['aspek' => 'motorik_halus', 'nilai' => 'BSB', 'urutan' => 2, 'teks' => 'Hasil karya mewarnai, melipat kertas (origami), dan meronce sangat rapi, bersih, dan detail.'],
            ['aspek' => 'motorik_halus', 'nilai' => 'BSB', 'urutan' => 3, 'teks' => 'Mampu membuat bentuk playdough atau lukisan jari (finger painting) yang sangat artistik.'],
            ['aspek' => 'motorik_halus', 'nilai' => 'BSB', 'urutan' => 4, 'teks' => 'Memiliki kontrol motorik halus yang luar biasa saat meniru bentuk silang, huruf, dan angka.'],
            ['aspek' => 'motorik_halus', 'nilai' => 'BSB', 'urutan' => 5, 'teks' => 'Mandiri dan cekatan merapikan kembali alat-alat kerajinan halus tanpa perlu disuruh.'],

            // ══════════════════════════════════════════════════════════════
            // 4. KOGNITIF (5 per nilai = 20 total)
            // ══════════════════════════════════════════════════════════════
            // BB
            ['aspek' => 'kognitif', 'nilai' => 'BB', 'urutan' => 1, 'teks' => 'Belum mampu mengenal warna primer, bentuk geometri dasar, atau angka 1-5.'],
            ['aspek' => 'kognitif', 'nilai' => 'BB', 'urutan' => 2, 'teks' => 'Belum dapat membedakan ukuran (besar/kecil, panjang/pendek) dan kelompok warna.'],
            ['aspek' => 'kognitif', 'nilai' => 'BB', 'urutan' => 3, 'teks' => 'Sulit fokus pada permainan edukatif (puzzle 4 keping) dan perhatian mudah beralih.'],
            ['aspek' => 'kognitif', 'nilai' => 'BB', 'urutan' => 4, 'teks' => 'Belum memahami hubungan sebab-akibat sederhana dalam kegiatan sehari-hari.'],
            ['aspek' => 'kognitif', 'nilai' => 'BB', 'urutan' => 5, 'teks' => 'Masih bingung membedakan konsep posisi (atas/bawah, dalam/luar, depan/belakang).'],
            // MB
            ['aspek' => 'kognitif', 'nilai' => 'MB', 'urutan' => 1, 'teks' => 'Mulai mengenal warna dasar dan bentuk geometri sederhana dengan bimbingan.'],
            ['aspek' => 'kognitif', 'nilai' => 'MB', 'urutan' => 2, 'teks' => 'Mulai mampu membilang angka 1-5 secara berurutan walau terkadang masih terlewat.'],
            ['aspek' => 'kognitif', 'nilai' => 'MB', 'urutan' => 3, 'teks' => 'Mulai bisa membedakan benda besar-kecil atau panjang-pendek dengan peragaan visual.'],
            ['aspek' => 'kognitif', 'nilai' => 'MB', 'urutan' => 4, 'teks' => 'Mulai dapat menyusun puzzle 4 keping sederhana dengan bantuan dan kesabaran.'],
            ['aspek' => 'kognitif', 'nilai' => 'MB', 'urutan' => 5, 'teks' => 'Mulai memahami urutan kegiatan sederhana (seperti cuci tangan sebelum makan) jika diingatkan.'],
            // BSH
            ['aspek' => 'kognitif', 'nilai' => 'BSH', 'urutan' => 1, 'teks' => 'Mampu menyebutkan warna, bentuk geometri, serta menghitung benda 1-10 dengan tepat.'],
            ['aspek' => 'kognitif', 'nilai' => 'BSH', 'urutan' => 2, 'teks' => 'Mampu mengelompokkan benda berdasarkan dua kriteria (warna dan ukuran) secara mandiri.'],
            ['aspek' => 'kognitif', 'nilai' => 'BSH', 'urutan' => 3, 'teks' => 'Cepat menyelesaikan puzzle 6-8 keping dan memecahkan masalah praktis sederhana.'],
            ['aspek' => 'kognitif', 'nilai' => 'BSH', 'urutan' => 4, 'teks' => 'Memahami konsep posisi, pola urutan sederhana (A-B-A-B), dan sebab-akibat.'],
            ['aspek' => 'kognitif', 'nilai' => 'BSH', 'urutan' => 5, 'teks' => 'Memiliki rasa ingin tahu yang tinggi, aktif bertanya, dan senang ber-eksperimen.'],
            // BSB
            ['aspek' => 'kognitif', 'nilai' => 'BSB', 'urutan' => 1, 'teks' => 'Sangat cerdas mengenal matematika awal (angka >10, penjumlahan/pengurangan benda sederhana).'],
            ['aspek' => 'kognitif', 'nilai' => 'BSB', 'urutan' => 2, 'teks' => 'Mampu menganalisis dan mengelompokkan benda berdasarkan beragam kriteria kompleks.'],
            ['aspek' => 'kognitif', 'nilai' => 'BSB', 'urutan' => 3, 'teks' => 'Terampil memecahkan masalah puzzle rumit dan menemukan ide kreatif saat eksplorasi.'],
            ['aspek' => 'kognitif', 'nilai' => 'BSB', 'urutan' => 4, 'teks' => 'Mampu menjelaskan konsep sains sederhana (seperti tenggelam-terapung) secara runtut.'],
            ['aspek' => 'kognitif', 'nilai' => 'BSB', 'urutan' => 5, 'teks' => 'Memiliki daya ingat luar biasa dan sering membantu menjelaskan konsep materi ke teman.'],

            // ══════════════════════════════════════════════════════════════
            // 5. BAHASA (5 per nilai = 20 total)
            // ══════════════════════════════════════════════════════════════
            // BB
            ['aspek' => 'bahasa', 'nilai' => 'BB', 'urutan' => 1, 'teks' => 'Belum mampu menggunakan kalimat sederhana untuk menyatakan keinginan/kebutuhan.'],
            ['aspek' => 'bahasa', 'nilai' => 'BB', 'urutan' => 2, 'teks' => 'Kontak mata dan respon saat dipanggil nama masih sangat minim, sering diam.'],
            ['aspek' => 'bahasa', 'nilai' => 'BB', 'urutan' => 3, 'teks' => 'Belum memahami instruksi 1-2 langkah sederhana dari guru di dalam kelas.'],
            ['aspek' => 'bahasa', 'nilai' => 'BB', 'urutan' => 4, 'teks' => 'Belum tertarik mendengarkan cerita bergambar dan enggan menyebutkan nama benda.'],
            ['aspek' => 'bahasa', 'nilai' => 'BB', 'urutan' => 5, 'teks' => 'Kesulitan menirukan pelafalan vokal atau kata sederhana yang dicontohkan.'],
            // MB
            ['aspek' => 'bahasa', 'nilai' => 'MB', 'urutan' => 1, 'teks' => 'Mulai menggunakan 2-3 kata sederhana untuk berkomunikasi walau lafal belum sempurna.'],
            ['aspek' => 'bahasa', 'nilai' => 'MB', 'urutan' => 2, 'teks' => 'Mulai mau merespon pertanyaan guru dengan jawaban singkat (seperti ya/tidak/mau).'],
            ['aspek' => 'bahasa', 'nilai' => 'MB', 'urutan' => 3, 'teks' => 'Mulai dapat memahami dan melaksanakan 1 perintah sederhana dengan bimbingan.'],
            ['aspek' => 'bahasa', 'nilai' => 'MB', 'urutan' => 4, 'teks' => 'Mulai tertarik melihat buku cerita bergambar dan merespon nama benda yang dikenal.'],
            ['aspek' => 'bahasa', 'nilai' => 'MB', 'urutan' => 5, 'teks' => 'Mulai mau menirukan nyanyian anak atau mengucapkan huruf vokal dasar bersama.'],
            // BSH
            ['aspek' => 'bahasa', 'nilai' => 'BSH', 'urutan' => 1, 'teks' => 'Mampu berkomunikasi dua arah dengan kalimat jelas, runtut, dan mudah dipahami.'],
            ['aspek' => 'bahasa', 'nilai' => 'BSH', 'urutan' => 2, 'teks' => 'Mampu mendengarkan cerita dengan fokus lalu menceritakan kembali secara sederhana.'],
            ['aspek' => 'bahasa', 'nilai' => 'BSH', 'urutan' => 3, 'teks' => 'Memahami dan dapat menjalankan 2-3 instruksi berurutan secara tepat.'],
            ['aspek' => 'bahasa', 'nilai' => 'BSH', 'urutan' => 4, 'teks' => 'Mengenal bentuk huruf, simbol, dan menyebutkan kata berawalan huruf sama.'],
            ['aspek' => 'bahasa', 'nilai' => 'BSH', 'urutan' => 5, 'teks' => 'Aktif bertanya menggunakan kata tanya (apa, siapa, mengapa, di mana) secara tepat.'],
            // BSB
            ['aspek' => 'bahasa', 'nilai' => 'BSB', 'urutan' => 1, 'teks' => 'Sangat komunikatif, artikulasi sangat jelas, dan perbendaharaan kata sangat kaya.'],
            ['aspek' => 'bahasa', 'nilai' => 'BSB', 'urutan' => 2, 'teks' => 'Mampu menceritakan pengalaman pribadi atau cerita rekaan secara runtut dan ekspresif.'],
            ['aspek' => 'bahasa', 'nilai' => 'BSB', 'urutan' => 3, 'teks' => 'Cepat memahami pesan tersirat, instruksi kompleks, serta pandai mengekspresikan pendapat.'],
            ['aspek' => 'bahasa', 'nilai' => 'BSB', 'urutan' => 4, 'teks' => 'Terampil mengenal keaksaraan awal (membaca kata sederhana, menghubungkan gambar tulisan).'],
            ['aspek' => 'bahasa', 'nilai' => 'BSB', 'urutan' => 5, 'teks' => 'Percaya diri tampil di depan kelas untuk bercerita, menjawab pertanyaan, atau memimpin forum.'],

            // ══════════════════════════════════════════════════════════════
            // 6. SOSIAL EMOSIONAL (5 per nilai = 20 total)
            // ══════════════════════════════════════════════════════════════
            // BB
            ['aspek' => 'sosial_emosional', 'nilai' => 'BB', 'urutan' => 1, 'teks' => 'Belum mau berpisah dari orang tua di pagi hari, menangis lama dan sulit ditenangkan.'],
            ['aspek' => 'sosial_emosional', 'nilai' => 'BB', 'urutan' => 2, 'teks' => 'Belum mau berbagi mainan atau giliran bermain, sering merebut benda milik teman.'],
            ['aspek' => 'sosial_emosional', 'nilai' => 'BB', 'urutan' => 3, 'teks' => 'Belum mampu mengendalikan emosi (mudah marah, menjerit, atau mengurung diri).'],
            ['aspek' => 'sosial_emosional', 'nilai' => 'BB', 'urutan' => 4, 'teks' => 'Belum tertarik berinteraksi atau bermain bersama teman, cenderung menyendiri.'],
            ['aspek' => 'sosial_emosional', 'nilai' => 'BB', 'urutan' => 5, 'teks' => 'Belum memahami aturan kelompok dan sering mengabaikan kesepakatan di kelas.'],
            // MB
            ['aspek' => 'sosial_emosional', 'nilai' => 'MB', 'urutan' => 1, 'teks' => 'Mulai mau berpisah dari orang tua di pintu kelas setelah diberikan dorongan semangat.'],
            ['aspek' => 'sosial_emosional', 'nilai' => 'MB', 'urutan' => 2, 'teks' => 'Mulai mau berbagi mainan setelah diberikan bimbingan dan penjelasan guru.'],
            ['aspek' => 'sosial_emosional', 'nilai' => 'MB', 'urutan' => 3, 'teks' => 'Emosi mulai dapat ditenangkan ketika dibujuk atau diberi pengalihan kegiatan.'],
            ['aspek' => 'sosial_emosional', 'nilai' => 'MB', 'urutan' => 4, 'teks' => 'Mulai mau bermain di samping teman (parallel play) dan merespon bila disapa.'],
            ['aspek' => 'sosial_emosional', 'nilai' => 'MB', 'urutan' => 5, 'teks' => 'Mulai mengenal aturan kelas sederhana meski masih perlu sering diingatkan.'],
            // BSH
            ['aspek' => 'sosial_emosional', 'nilai' => 'BSH', 'urutan' => 1, 'teks' => 'Mandiri dan ceria saat datang ke sekolah serta berinteraksi aktif dengan teman.'],
            ['aspek' => 'sosial_emosional', 'nilai' => 'BSH', 'urutan' => 2, 'teks' => 'Terbiasa berbagi mainan, bergantian giliran, dan mampu bekerja sama dalam tim.'],
            ['aspek' => 'sosial_emosional', 'nilai' => 'BSH', 'urutan' => 3, 'teks' => 'Mampu mengendalikan emosi dengan baik dan meredakan konflik kecil secara damai.'],
            ['aspek' => 'sosial_emosional', 'nilai' => 'BSH', 'urutan' => 4, 'teks' => 'Menunjukkan empati, bersikap ramah, dan mau membantu teman yang kesulitan.'],
            ['aspek' => 'sosial_emosional', 'nilai' => 'BSH', 'urutan' => 5, 'teks' => 'Menghargai hak orang lain, menaati kesepakatan bersama, dan bertanggung jawab.'],
            // BSB
            ['aspek' => 'sosial_emosional', 'nilai' => 'BSB', 'urutan' => 1, 'teks' => 'Sangat mandiri, percaya diri, berjiwa kepemimpinan, dan jadi teladan positif teman.'],
            ['aspek' => 'sosial_emosional', 'nilai' => 'BSB', 'urutan' => 2, 'teks' => 'Spontan membantu teman yang kesulitan tanpa diminta dan sangat peka pada sekitar.'],
            ['aspek' => 'sosial_emosional', 'nilai' => 'BSB', 'urutan' => 3, 'teks' => 'Mampu mengelola emosi dengan sangat baik dan bersikap suportif dalam permainan.'],
            ['aspek' => 'sosial_emosional', 'nilai' => 'BSB', 'urutan' => 4, 'teks' => 'Aktif merangkul dan mengajak teman yang pemalu untuk ikut bermain bersama.'],
            ['aspek' => 'sosial_emosional', 'nilai' => 'BSB', 'urutan' => 5, 'teks' => 'Konsisten dan disiplin tinggi menaati aturan kelas serta menjaga keharmonisan.'],

            // ══════════════════════════════════════════════════════════════
            // 7. SENI (5 per nilai = 20 total)
            // ══════════════════════════════════════════════════════════════
            // BB
            ['aspek' => 'seni', 'nilai' => 'BB', 'urutan' => 1, 'teks' => 'Belum tertarik mengikuti kegiatan seni (mewarnai, menggambar, bernyanyi, atau menari).'],
            ['aspek' => 'seni', 'nilai' => 'BB', 'urutan' => 2, 'teks' => 'Ragu atau menolak saat diajak menyentuh bahan seni (cat air, lem, playdough).'],
            ['aspek' => 'seni', 'nilai' => 'BB', 'urutan' => 3, 'teks' => 'Belum mau bergerak mengikuti alunan musik atau menirukan tepukan irama.'],
            ['aspek' => 'seni', 'nilai' => 'BB', 'urutan' => 4, 'teks' => 'Belum mampu menghasilkan karya seni sederhana walau sudah diberikan contoh.'],
            ['aspek' => 'seni', 'nilai' => 'BB', 'urutan' => 5, 'teks' => 'Tidak menunjukkan ekspresi atau antusiasme dalam kegiatan seni kreatif di kelas.'],
            // MB
            ['aspek' => 'seni', 'nilai' => 'MB', 'urutan' => 1, 'teks' => 'Mulai mau mewarnai atau menggambar coretan sederhana dengan dorongan semangat guru.'],
            ['aspek' => 'seni', 'nilai' => 'MB', 'urutan' => 2, 'teks' => 'Mulai berani menyentuh media seni (cat air/lem) walau masih sedikit canggung.'],
            ['aspek' => 'seni', 'nilai' => 'MB', 'urutan' => 3, 'teks' => 'Mulai mau menggerakkan badan atau bertepuk tangan sesuai tempo irama musik.'],
            ['aspek' => 'seni', 'nilai' => 'MB', 'urutan' => 4, 'teks' => 'Mulai mampu menghasilkan karya seni sederhana (seperti cap tangan/meronce besar).'],
            ['aspek' => 'seni', 'nilai' => 'MB', 'urutan' => 5, 'teks' => 'Mulai menunjukkan rasa senang saat mendengarkan musik atau melihat karya sendiri.'],
            // BSH
            ['aspek' => 'seni', 'nilai' => 'BSH', 'urutan' => 1, 'teks' => 'Antusias mengekspresikan diri melalui seni rupa (mewarnai, kolase, menggambar, origami).'],
            ['aspek' => 'seni', 'nilai' => 'BSH', 'urutan' => 2, 'teks' => 'Terampil bernyanyi lagu anak dengan senandung tepat dan mengekspresikan gerakan tari.'],
            ['aspek' => 'seni', 'nilai' => 'BSH', 'urutan' => 3, 'teks' => 'Mampu memadukan berbagai warna dan media bahan untuk karya yang menarik.'],
            ['aspek' => 'seni', 'nilai' => 'BSH', 'urutan' => 4, 'teks' => 'Bangga dan mampu menceritakan makna karya seni yang buatannya kepada guru/teman.'],
            ['aspek' => 'seni', 'nilai' => 'BSH', 'urutan' => 5, 'teks' => 'Mampu menghargai hasil karya seni teman dengan memberikan apresiasi positif.'],
            // BSB
            ['aspek' => 'seni', 'nilai' => 'BSB', 'urutan' => 1, 'teks' => 'Sangat kreatif, orisinal, dan imajinatif dalam menciptakan beragam karya seni rupa.'],
            ['aspek' => 'seni', 'nilai' => 'BSB', 'urutan' => 2, 'teks' => 'Berani tampil memimpin bernyanyi di depan kelas atau menari dengan percaya diri.'],
            ['aspek' => 'seni', 'nilai' => 'BSB', 'urutan' => 3, 'teks' => 'Mampu mengombinasikan berbagai teknik seni (lukis, tempel, bentuk 3D) secara mandiri.'],
            ['aspek' => 'seni', 'nilai' => 'BSB', 'urutan' => 4, 'teks' => 'Memiliki apresiasi seni tinggi, peka keindahan warna, harmoni, serta estetika.'],
            ['aspek' => 'seni', 'nilai' => 'BSB', 'urutan' => 5, 'teks' => 'Aktif menginspirasi dan membantu teman-teman dalam menyelesaikan proyek seni.'],
        ];

        foreach ($data as $item) {
            IndikatorPenilaian::create($item);
        }
    }
}
