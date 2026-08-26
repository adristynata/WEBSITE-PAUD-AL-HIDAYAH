@extends('layouts.dashboard')
@section('title', 'Laporan Perkembangan Murid — PAUD Al-Hidayah')
@section('page-title', 'Detail Laporan Perkembangan')

@section('sidebar-menu')
    <div class="sidebar-section">Menu Utama</div>
    <a href="{{ route('ortu.dashboard') }}" class="active"><span class="icon">🏠</span> Dashboard</a>
@endsection

@section('content')
<div style="margin-bottom:20px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px;">
    <a href="{{ route('ortu.dashboard') }}" class="btn btn-secondary" style="font-weight:700;text-decoration:none;display:inline-flex;align-items:center;gap:6px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg> Kembali ke Dashboard
    </a>
    <a href="{{ route('ortu.laporan.download', $laporan->id) }}" class="btn btn-primary" style="font-weight:700;text-decoration:none;display:inline-flex;align-items:center;gap:6px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg> Unduh Laporan PDF
    </a>
</div>

<!-- Laporan Header -->
<div class="card" style="margin-bottom:24px; border-top:5px solid var(--primary);">
    <div class="card-body">
        <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:20px; border-bottom:1px solid var(--border); padding-bottom:16px; margin-bottom:16px;">
            <div style="display:flex; align-items:center; gap:12px;">
                <img src="{{ asset('images/logo.png') }}" alt="Logo KB Al Hidayah" style="height:48px;width:auto;">
                <div>
                    <h2 style="font-size:1.15rem; font-weight:800; color:var(--secondary); line-height:1.2;">KB AL HIDAYAH</h2>
                    <span style="font-size:0.75rem; color:var(--muted); font-weight:600;">Laporan Perkembangan Anak Usia Dini</span>
                </div>
            </div>
            @php
                $months = [
                    1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                    5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                    9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                ];
            @endphp
            <div style="text-align:right;">
                <span class="badge badge-purple" style="font-size:0.85rem; padding:6px 16px;">
                    Periode: {{ $months[$laporan->bulan] ?? $laporan->bulan }} {{ $laporan->tahun }}
                </span>
            </div>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:16px; font-size:0.85rem;">
            <div>
                <span style="color:var(--muted); display:block; margin-bottom:2px;">Nama Lengkap Murid:</span>
                <strong>{{ $laporan->siswa->nama }}</strong>
            </div>
            <div>
                <span style="color:var(--muted); display:block; margin-bottom:2px;">NIS (Nomor Induk Siswa):</span>
                <code style="color:#7C3AED; font-weight:700;">{{ $laporan->siswa->nis }}</code>
            </div>
            <div>
                <span style="color:var(--muted); display:block; margin-bottom:2px;">Kelompok Kelas:</span>
                <strong>{{ $laporan->siswa->kelas->nama_kelas }} ({{ $laporan->siswa->kelas->tahun_ajaran }})</strong>
            </div>
            <div>
                <span style="color:var(--muted); display:block; margin-bottom:2px;">Wali Kelas / Guru Pengampu:</span>
                <strong>{{ $laporan->siswa->kelas->guru->name }}</strong>
            </div>
        </div>
    </div>
</div>

<!-- Laporan Nilai 6 Aspek -->
<div style="display:flex; flex-direction:column; gap:20px; margin-bottom:32px;">
    @php
        $aspeks = [
            'rekap_agama_moral' => ['Agama & Moral', '#7C3AED', 'Ketaatan ibadah, doa, sopan santun, akhlak kepada sesama.'],
            'rekap_motorik_kasar' => ['Motorik Kasar', '#EF4444', 'Kemampuan fisik kasar: melompat, berlari, melempar, keseimbangan.'],
            'rekap_motorik_halus' => ['Motorik Halus', '#F59E0B', 'Keterampilan tangan: menulis, menggambar, menggunting, meronce.'],
            'rekap_kognitif' => ['Kognitif', '#10B981', 'Pemecahan masalah, mengenal bentuk, angka, logika sederhana.'],
            'rekap_bahasa' => ['Bahasa', '#3B82F6', 'Kosakata, berbicara, mendengarkan cerita, memahami instruksi.'],
            'rekap_sosial_emosional' => ['Sosial Emosional', '#EC4899', 'Kemandirian, berbagi, empati, mengendalikan emosi, kerja sama.'],
            'rekap_seni' => ['Seni', '#8B5CF6', 'Kemampuan mengekspresikan diri melalui seni, kreativitas, karya rupa, dan bernyanyi.']
        ];
    @endphp

    @foreach($aspeks as $field => $info)
        <div class="card" style="border-left:5px solid {{ $info[1] }};">
            <div class="card-header" style="background:#FCFDFD; border-bottom:1px solid var(--border);">
                <strong style="color:var(--secondary); font-size:1.05rem;">🎯 Aspek {{ $info[0] }}</strong>
                <p style="font-size:0.75rem; color:var(--muted); font-weight:normal; margin-top:2px;">{{ $info[2] }}</p>
            </div>
            <div class="card-body">
                <div style="font-size:0.9rem; line-height:1.6; color:var(--text); white-space:pre-line;">{!! nl2br(e($laporan->$field)) !!}</div>
            </div>
        </div>
    @endforeach
</div>
@endsection
