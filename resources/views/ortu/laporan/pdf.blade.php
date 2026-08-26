<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Perkembangan Murid</title>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; color: #333; line-height: 1.4; font-size: 11px; margin: 0; padding: 0; }
        .header-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; border-bottom: 3px double #333; padding-bottom: 10px; }
        .header-logo { width: 80px; text-align: left; }
        .header-logo img { height: 64px; width: auto; }
        .header-text { text-align: center; }
        .header-text h1 { font-size: 16px; margin: 0 0 2px; font-weight: bold; color: #15803d; text-transform: uppercase; }
        .header-text h2 { font-size: 12px; margin: 0 0 4px; font-weight: bold; color: #333; }
        .header-text p { font-size: 8.5px; margin: 0; color: #555; }
        
        .title-box { text-align: center; margin-bottom: 15px; }
        .title-box h3 { font-size: 12.5px; margin: 0 0 4px; text-transform: uppercase; letter-spacing: 0.5px; color: #1f2937; }
        .title-box .periode-badge { display: inline-block; background: #f3f4f6; padding: 3px 10px; border-radius: 8px; font-weight: bold; font-size: 10px; color: #4b5563; }

        .meta-table { width: 100%; border-collapse: collapse; margin-bottom: 18px; }
        .meta-table td { padding: 3px 0; vertical-align: top; }
        .meta-label { width: 18%; color: #4b5563; }
        .meta-colon { width: 2%; color: #4b5563; }
        .meta-value { width: 30%; font-weight: bold; color: #1f2937; }

        .aspect-table { width: 100%; border-collapse: collapse; margin-bottom: 24px; }
        .aspect-table th { background: #7cb68b; color: #ffffff; text-align: left; padding: 6px 8px; font-size: 10px; text-transform: uppercase; border: 1px solid #7cb68b; }
        .aspect-table td { padding: 10px 8px; border: 1px solid #e5e7eb; vertical-align: top; }
        .aspect-num { width: 5%; text-align: center; color: #4b5563; }
        .aspect-title { width: 25%; font-weight: bold; color: #1f2937; }
        .aspect-rekap { width: 70%; text-align: justify; color: #374151; }

        .signature-table { width: 100%; border-collapse: collapse; margin-top: 20px; page-break-inside: avoid; }
        .signature-col { width: 50%; text-align: center; font-size: 11px; vertical-align: top; }
        .signature-space { height: 75px; margin: 4px 0; text-align: center; }
        .signature-img { height: 70px; max-height: 70px; width: auto; max-width: 180px; display: inline-block; vertical-align: middle; }
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
        <h3>Laporan Perkembangan Anak</h3>
        @php
            $months = [
                1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
            ];
        @endphp
        <div class="periode-badge">Bulan: {{ $months[$laporan->bulan] ?? $laporan->bulan }} {{ $laporan->tahun }}</div>
    </div>

    <!-- Student Metadata -->
    <table class="meta-table">
        <tr>
            <td class="meta-label">Nama Siswa</td>
            <td class="meta-colon">:</td>
            <td class="meta-value">{{ $laporan->siswa->nama }}</td>
            <td class="meta-label">Kelas</td>
            <td class="meta-colon">:</td>
            <td class="meta-value">{{ $laporan->siswa->kelas->nama_kelas }}</td>
        </tr>
        <tr>
            <td class="meta-label">NIS</td>
            <td class="meta-colon">:</td>
            <td class="meta-value">{{ $laporan->siswa->nis }}</td>
            <td class="meta-label">Tahun Ajaran</td>
            <td class="meta-colon">:</td>
            <td class="meta-value">{{ $laporan->siswa->kelas->tahun_ajaran }}</td>
        </tr>
        <tr>
            <td class="meta-label">Tanggal Lahir</td>
            <td class="meta-colon">:</td>
            <td class="meta-value">{{ $laporan->siswa->tanggal_lahir->translatedFormat('d F Y') }}</td>
            <td class="meta-label">Wali Kelas</td>
            <td class="meta-colon">:</td>
            <td class="meta-value">{{ $laporan->siswa->kelas->guru->name }}</td>
        </tr>
    </table>

    <!-- Table of Aspects -->
    <table class="aspect-table">
        <thead>
            <tr>
                <th class="aspect-num">No</th>
                <th class="aspect-title">Aspek Perkembangan</th>
                <th class="aspect-rekap">Rangkuman Capaian Bulanan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $aspeks = [
                    'rekap_agama_moral' => 'Nilai Agama & Moral',
                    'rekap_motorik_kasar' => 'Motorik Kasar',
                    'rekap_motorik_halus' => 'Motorik Halus',
                    'rekap_kognitif' => 'Kognitif',
                    'rekap_bahasa' => 'Bahasa',
                    'rekap_sosial_emosional' => 'Sosial Emosional'
                ];
                $no = 1;
            @endphp
            @foreach($aspeks as $field => $label)
            <tr>
                <td class="aspect-num">{{ $no++ }}</td>
                <td class="aspect-title">{{ $label }}</td>
                <td class="aspect-rekap">{!! nl2br(e($laporan->$field)) !!}</td>
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
    @endphp
    <table class="signature-table">
        <tr>
            <td class="signature-col">
                <p>Mengetahui,</p>
                <strong style="display:block; margin-top:2px;">Kepala Sekolah KB Al-Hidayah</strong>
                <div class="signature-space">
                    @if($ttdKepsekFile)
                        <img src="{{ $ttdKepsekFile }}" class="signature-img" alt="TTD Kepala Sekolah">
                    @endif
                </div>
                <strong style="text-decoration:underline;">{{ $profil->sambutan_nama ?? 'Sri Wahyuni, S.Pd.' }}</strong>
            </td>
            <td class="signature-col">
                <p>Jepara, {{ date('d') }} {{ $months[date('n')] }} {{ date('Y') }}</p>
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
