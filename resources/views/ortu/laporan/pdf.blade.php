<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Perkembangan Murid — {{ $laporan->siswa->nama }}</title>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; color: #1e293b; line-height: 1.45; font-size: 10.5px; margin: 0; padding: 0; }
        
        .header-table { width: 100%; border-collapse: collapse; margin-bottom: 14px; border-bottom: 3px double #15803d; padding-bottom: 8px; }
        .header-logo { width: 75px; text-align: left; vertical-align: middle; }
        .header-logo img { height: 60px; width: auto; }
        .header-text { text-align: center; vertical-align: middle; }
        .header-text h1 { font-size: 16px; margin: 0 0 2px; font-weight: bold; color: #15803d; text-transform: uppercase; }
        .header-text h2 { font-size: 11.5px; margin: 0 0 4px; font-weight: bold; color: #334155; }
        .header-text p { font-size: 8.5px; margin: 0; color: #64748b; }
        
        .title-box { text-align: center; margin-bottom: 14px; }
        .title-box h3 { font-size: 12px; margin: 0 0 3px; text-transform: uppercase; letter-spacing: 0.5px; color: #0f172a; font-weight: bold; }
        .title-box .periode-badge { display: inline-block; background: #e0e7ff; padding: 3px 12px; border-radius: 6px; font-weight: bold; font-size: 9.5px; color: #3730a3; }

        .meta-table { width: 100%; border-collapse: collapse; margin-bottom: 14px; background: #f8fafc; border: 1px solid #e2e8f0; }
        .meta-table td { padding: 4px 8px; vertical-align: top; font-size: 9.5px; }
        .meta-label { width: 16%; color: #64748b; font-weight: 500; }
        .meta-colon { width: 2%; color: #64748b; }
        .meta-value { width: 32%; font-weight: bold; color: #0f172a; }

        /* Tabel Keterangan Skala Indikator Penilaian */
        .legend-table { width: 100%; border-collapse: collapse; margin-bottom: 16px; border: 1px solid #cbd5e1; }
        .legend-table th { background: #f1f5f9; color: #334155; text-align: left; padding: 4px 8px; font-size: 8.5px; text-transform: uppercase; border-bottom: 1px solid #cbd5e1; }
        .legend-table td { padding: 5px 8px; border: 1px solid #e2e8f0; font-size: 8.5px; vertical-align: top; }
        .badge-scale { display: inline-block; padding: 1px 5px; border-radius: 3px; font-weight: bold; font-size: 8px; color: #fff; text-align: center; min-width: 26px; }
        .bg-bb { background: #ef4444; }
        .bg-mb { background: #f97316; }
        .bg-bsh { background: #8b5cf6; }
        .bg-bsb { background: #16a34a; }

        /* Tabel Utama Penilaian Per Aspek */
        .aspect-table { width: 100%; border-collapse: collapse; margin-bottom: 18px; }
        .aspect-table th { background: #15803d; color: #ffffff; text-align: left; padding: 6px 8px; font-size: 9.5px; text-transform: uppercase; border: 1px solid #15803d; }
        .aspect-table td { padding: 8px; border: 1px solid #cbd5e1; vertical-align: top; font-size: 9.5px; }
        .aspect-num { width: 4%; text-align: center; color: #475569; font-weight: bold; }
        .aspect-title { width: 22%; font-weight: bold; color: #0f172a; }
        .aspect-scale { width: 12%; text-align: center; }
        .aspect-desc { width: 62%; text-align: justify; color: #334155; line-height: 1.4; }

        .section-sub { font-size: 8.5px; font-weight: bold; color: #16a34a; text-transform: uppercase; margin-bottom: 3px; display: block; border-bottom: 1px solid #e2e8f0; padding-bottom: 2px; }
        .section-sub-admin { font-size: 8.5px; font-weight: bold; color: #d97706; text-transform: uppercase; margin-top: 5px; margin-bottom: 3px; display: block; border-bottom: 1px solid #fef3c7; padding-bottom: 2px; }

        .signature-table { width: 100%; border-collapse: collapse; margin-top: 15px; page-break-inside: avoid; }
        .signature-col { width: 50%; text-align: center; font-size: 10px; vertical-align: top; }
        .signature-space { height: 60px; margin: 4px 0; text-align: center; }
        .signature-img { height: 55px; max-height: 55px; width: auto; max-width: 160px; display: inline-block; vertical-align: middle; }
    </style>
</head>
<body>

    <!-- Kop Surat -->
    <table class="header-table">
        <tr>
            <td class="header-logo">
                <img src="{{ public_path('images/logo.png') }}" alt="Logo">
            </td>
            <td class="header-text">
                <h1>KB Al-Hidayah</h1>
                <h2>Pendidikan Anak Usia Dini (PAUD)</h2>
                <p>Alamat: Desa Wedelan, Kecamatan Bangsri, Kabupaten Jepara, Jawa Tengah</p>
                <p>Email: admin@paud-alhidayah.sch.id | Telepon: 0812-3456-7890</p>
            </td>
        </tr>
    </table>

    <div class="title-box">
        <h3>Laporan Perkembangan &amp; Capaian Belajar Anak Usia Dini</h3>
        @php
            $months = [
                1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
            ];
        @endphp
        <div class="periode-badge">Periode: {{ $months[$laporan->bulan] ?? $laporan->bulan }} {{ $laporan->tahun }}</div>
    </div>

    <!-- Student Metadata -->
    <table class="meta-table">
        <tr>
            <td class="meta-label">Nama Murid</td>
            <td class="meta-colon">:</td>
            <td class="meta-value">{{ $laporan->siswa->nama }}</td>
            <td class="meta-label">Kelompok Kelas</td>
            <td class="meta-colon">:</td>
            <td class="meta-value">{{ $laporan->siswa->kelas->nama_kelas }} ({{ $laporan->siswa->kelas->tahun_ajaran }})</td>
        </tr>
        <tr>
            <td class="meta-label">NIS / NISN</td>
            <td class="meta-colon">:</td>
            <td class="meta-value">{{ $laporan->siswa->nis }}</td>
            <td class="meta-label">Wali Kelas</td>
            <td class="meta-colon">:</td>
            <td class="meta-value">{{ $laporan->siswa->kelas->guru->name }}</td>
        </tr>
        <tr>
            <td class="meta-label">Tanggal Lahir</td>
            <td class="meta-colon">:</td>
            <td class="meta-value">{{ $laporan->siswa->tanggal_lahir->translatedFormat('d F Y') }}</td>
            <td class="meta-label">Tanggal Cetak</td>
            <td class="meta-colon">:</td>
            <td class="meta-value">{{ date('d') }} {{ $months[(int)date('n')] }} {{ date('Y') }}</td>
        </tr>
    </table>

    <!-- Tabel Keterangan Skala Penilaian Perkembangan (Legend) -->
    <table class="legend-table">
        <thead>
            <tr>
                <th colspan="4" style="background:#e2e8f0; color:#1e293b; font-weight:bold; font-size:9px;">
                    Panduan &amp; Keterangan Skala Indikator Penilaian Perkembangan (Kurikulum PAUD):
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width:25%;"><span class="badge-scale bg-bb">BB</span> <strong>Belum Berkembang</strong><br><span style="color:#64748b;">Butuh bimbingan penuh dari guru.</span></td>
                <td style="width:25%;"><span class="badge-scale bg-mb">MB</span> <strong>Mulai Berkembang</strong><br><span style="color:#64748b;">Mampu dengan contoh/dorongan guru.</span></td>
                <td style="width:25%;"><span class="badge-scale bg-bsh">BSH</span> <strong>Berkembang Sesuai Harapan</strong><br><span style="color:#64748b;">Mampu secara mandiri &amp; konsisten.</span></td>
                <td style="width:25%;"><span class="badge-scale bg-bsb">BSB</span> <strong>Berkembang Sangat Baik</strong><br><span style="color:#64748b;">Mandiri &amp; dapat membantu teman.</span></td>
            </tr>
        </tbody>
    </table>

    <!-- Tabel Utama Hasil Penilaian & Evaluasi Transparan -->
    <table class="aspect-table">
        <thead>
            <tr>
                <th class="aspect-num">No</th>
                <th class="aspect-title">Aspek Perkembangan</th>
                <th class="aspect-scale">Skala Capaian</th>
                <th class="aspect-desc">Uraian Evaluasi Guru &amp; Rangkuman Resmi Sekolah</th>
            </tr>
        </thead>
        <tbody>
            @php
                $aspeks = [
                    'agama_moral' => ['Nilai Agama & Moral', 'nilai_agama_moral', 'catatan_agama_moral', 'rekap_agama_moral'],
                    'motorik_kasar' => ['Fisik Motorik Kasar', 'motorik_kasar', 'catatan_motorik_kasar', 'rekap_motorik_kasar'],
                    'motorik_halus' => ['Fisik Motorik Halus', 'motorik_halus', 'catatan_motorik_halus', 'rekap_motorik_halus'],
                    'kognitif' => ['Kognitif & Berpikir', 'kognitif', 'catatan_kognitif', 'rekap_kognitif'],
                    'bahasa' => ['Bahasa & Komunikasi', 'bahasa', 'catatan_bahasa', 'rekap_bahasa'],
                    'sosial_emosional' => ['Sosial & Emosional', 'sosial_emosional', 'catatan_sosial_emosional', 'rekap_sosial_emosional'],
                    'seni' => ['Seni & Kreativitas', 'seni', 'catatan_seni', 'rekap_seni']
                ];

                $scaleBadges = [
                    'BB' => ['bg-bb', 'BB'],
                    'MB' => ['bg-mb', 'MB'],
                    'BSH' => ['bg-bsh', 'BSH'],
                    'BSB' => ['bg-bsb', 'BSB']
                ];
                $no = 1;
            @endphp
            @foreach($aspeks as $key => $info)
                @php
                    $lastCatatan = $catatansGuru->whereNotNull($info[1])->last();
                    $nilaiSkala = $lastCatatan ? $lastCatatan->{$info[1]} : null;
                    $badgeClass = $scaleBadges[$nilaiSkala][0] ?? 'bg-mb';
                @endphp
                <tr>
                    <td class="aspect-num">{{ $no++ }}</td>
                    <td class="aspect-title">{{ $info[0] }}</td>
                    <td class="aspect-scale">
                        @if($nilaiSkala)
                            <span class="badge-scale {{ $badgeClass }}">{{ $nilaiSkala }}</span>
                        @else
                            <span style="color:#94A3B8; font-size:8.5px;">-</span>
                        @endif
                    </td>
                    <td class="aspect-desc">
                        <!-- Rincian Catatan Guru (Anak sudah bisa apa) -->
                        @php
                            $guruNotes = [];
                            foreach($catatansGuru as $cg) {
                                if (!empty($cg->{$info[2]})) {
                                    $guruNotes[] = "Minggu " . $cg->minggu_ke . ": " . $cg->{$info[2]};
                                }
                            }
                        @endphp
                        @if(count($guruNotes) > 0)
                            <span class="section-sub">Catatan Evaluasi Guru:</span>
                            <div style="margin-bottom:4px; font-size:9px; color:#334155;">
                                {!! implode('<br>', array_map('e', $guruNotes)) !!}
                            </div>
                        @endif

                        <!-- Rangkuman Resmi Admin -->
                        @if(!empty($laporan->{$info[3]}))
                            <span class="section-sub-admin">Rangkuman Bulanan Sekolah:</span>
                            <div style="font-size:9px; color:#1e293b;">{!! nl2br(e($laporan->{$info[3]})) !!}</div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Signature Block -->
    @php
        $ttdKepsekFile = ($profil && $profil->ttd_kepsek && file_exists(public_path('images/' . $profil->ttd_kepsek))) 
            ? public_path('images/' . $profil->ttd_kepsek) 
            : null;

        $guruUser = $laporan->siswa->kelas->guru ?? null;
        $ttdGuruFile = ($guruUser && $guruUser->ttd && file_exists(public_path('images/' . $guruUser->ttd))) 
            ? public_path('images/' . $guruUser->ttd) 
            : null;

        $stempelFile = file_exists(public_path('images/stempel.png')) 
            ? public_path('images/stempel.png') 
            : (file_exists(public_path('images/stempel.jpg')) ? public_path('images/stempel.jpg') : null);
    @endphp
    <table class="signature-table">
        <tr>
            <td class="signature-col">
                <p>Mengetahui,</p>
                <strong style="display:block; margin-top:2px;">Kepala Sekolah KB Al-Hidayah</strong>
                <div class="signature-space" style="position:relative; width:170px; margin:4px auto;">
                    @if($stempelFile)
                        <img src="{{ $stempelFile }}" style="position:absolute; left:22px; top:-10px; width:85px; height:85px; opacity:0.85; z-index:1;" alt="Stempel Resmi PAUD Al-Hidayah">
                    @endif
                    @if($ttdKepsekFile)
                        <img src="{{ $ttdKepsekFile }}" class="signature-img" style="position:relative; z-index:2; margin-left:15px;" alt="TTD Kepala Sekolah">
                    @endif
                </div>
                <strong style="text-decoration:underline;">{{ $profil->sambutan_nama ?? 'Sri Wahyuni, S.Pd.' }}</strong>
            </td>
            <td class="signature-col">
                <p>Jepara, {{ date('d') }} {{ $months[(int)date('n')] }} {{ date('Y') }}</p>
                <strong style="display:block; margin-top:2px;">Wali Kelas / Guru Pengampu</strong>
                <div class="signature-space">
                    @if($ttdGuruFile)
                        <img src="{{ $ttdGuruFile }}" class="signature-img" alt="TTD Guru">
                    @endif
                </div>
                <strong style="text-decoration:underline;">{{ $guruUser->name ?? 'Guru Pengampu' }}</strong>
            </td>
        </tr>
    </table>

</body>
</html>
