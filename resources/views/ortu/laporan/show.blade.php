@extends('layouts.dashboard')
@section('title', 'Laporan Perkembangan Murid — PAUD Al-Hidayah')
@section('page-title', 'Detail Laporan Perkembangan')

@section('sidebar-menu')
    <div class="nav-section">Menu Utama</div>
    <a href="{{ route('ortu.dashboard') }}" class="nav-link active">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Dashboard Ortu</span>
    </a>
@endsection

@section('content')
<div style="margin-bottom:20px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px;">
    <a href="{{ route('ortu.dashboard') }}" class="btn btn-secondary" style="font-weight:700;text-decoration:none;display:inline-flex;align-items:center;gap:6px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
        <span>Kembali ke Dashboard</span>
    </a>
    <a href="{{ route('ortu.laporan.download', $laporan->id) }}" class="btn btn-primary" style="font-weight:700;text-decoration:none;display:inline-flex;align-items:center;gap:6px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2.5" style="width:15px;height:15px;color:#FFFFFF;flex-shrink:0;"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
        <span>Unduh Laporan PDF</span>
    </a>
</div>

<!-- Laporan Header Card -->
<div class="card" style="margin-bottom:24px; border-top:5px solid var(--primary);">
    <div class="card-body">
        <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:20px; border-bottom:1px solid var(--border); padding-bottom:16px; margin-bottom:16px;">
            <div style="display:flex; align-items:center; gap:12px;">
                <img src="{{ asset('images/logo.png') }}" alt="Logo KB Al Hidayah" style="height:48px;width:auto;">
                <div>
                    <h2 style="font-size:1.15rem; font-weight:800; color:var(--secondary); line-height:1.2;">KB AL HIDAYAH</h2>
                    <span style="font-size:0.75rem; color:var(--muted); font-weight:600;">Laporan Perkembangan &amp; Capaian Belajar Anak Usia Dini</span>
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
                <span class="badge badge-purple" style="font-size:0.85rem; padding:8px 16px; font-weight:800;">
                    Periode: {{ $months[$laporan->bulan] ?? $laporan->bulan }} {{ $laporan->tahun }}
                </span>
            </div>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:16px; font-size:0.85rem;">
            <div>
                <span style="color:var(--muted); display:block; margin-bottom:2px;">Nama Lengkap Murid:</span>
                <strong style="font-size:1rem; color:var(--secondary);">{{ $laporan->siswa->nama }}</strong>
            </div>
            <div>
                <span style="color:var(--muted); display:block; margin-bottom:2px;">NIS (Nomor Induk Siswa):</span>
                <code style="color:#7C3AED; font-weight:700; font-size:0.9rem;">{{ $laporan->siswa->nis }}</code>
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

<!-- Tabel Referensi Keterangan Skala Indikator -->
<div class="card" style="margin-bottom:24px; background:#F8FAFC; border:1px solid #E2E8F0;">
    <div class="card-header" style="background:#F1F5F9; border-bottom:1px solid #E2E8F0; padding:10px 16px;">
        <strong style="font-size:0.85rem; color:#334155; display:inline-flex; align-items:center; gap:6px;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:15px;height:15px;"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
            <span>Keterangan Skala Indikator Penilaian Perkembangan:</span>
        </strong>
    </div>
    <div class="card-body" style="padding:12px 16px;">
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:10px; font-size:0.78rem;">
            <div style="background:#FFF; padding:8px 10px; border-radius:6px; border:1px solid #FCA5A5;">
                <span class="badge badge-red" style="font-size:0.75rem; margin-bottom:4px; display:inline-block;">BB — Belum Berkembang</span>
                <p style="margin:0; color:#475569; line-height:1.3;">Anak masih membutuhkan bimbingan dan dorongan penuh dari guru.</p>
            </div>
            <div style="background:#FFF; padding:8px 10px; border-radius:6px; border:1px solid #FDBA74;">
                <span class="badge badge-orange" style="font-size:0.75rem; margin-bottom:4px; display:inline-block;">MB — Mulai Berkembang</span>
                <p style="margin:0; color:#475569; line-height:1.3;">Anak mulai dapat melakukan kegiatan dengan petunjuk/contoh guru.</p>
            </div>
            <div style="background:#FFF; padding:8px 10px; border-radius:6px; border:1px solid #C084FC;">
                <span class="badge badge-purple" style="font-size:0.75rem; margin-bottom:4px; display:inline-block;">BSH — Berkembang Sesuai Harapan</span>
                <p style="margin:0; color:#475569; line-height:1.3;">Anak sudah mampu melakukan kegiatan secara mandiri &amp; konsisten.</p>
            </div>
            <div style="background:#FFF; padding:8px 10px; border-radius:6px; border:1px solid #86EFAC;">
                <span class="badge badge-green" style="font-size:0.75rem; margin-bottom:4px; display:inline-block;">BSB — Berkembang Sangat Baik</span>
                <p style="margin:0; color:#475569; line-height:1.3;">Anak sangat mandiri serta mampu membantu dan menginspirasi teman.</p>
            </div>
        </div>
    </div>
</div>

<!-- Laporan Rincian Per Aspek -->
<div style="display:flex; flex-direction:column; gap:24px; margin-bottom:32px;">
    @php
        $aspeks = [
            'agama_moral' => ['Agama & Moral', 'nilai_agama_moral', 'catatan_agama_moral', 'rekap_agama_moral', '#7C3AED'],
            'motorik_kasar' => ['Motorik Kasar', 'motorik_kasar', 'catatan_motorik_kasar', 'rekap_motorik_kasar', '#EF4444'],
            'motorik_halus' => ['Motorik Halus', 'motorik_halus', 'catatan_motorik_halus', 'rekap_motorik_halus', '#F59E0B'],
            'kognitif' => ['Kognitif', 'kognitif', 'catatan_kognitif', 'rekap_kognitif', '#10B981'],
            'bahasa' => ['Bahasa', 'bahasa', 'catatan_bahasa', 'rekap_bahasa', '#3B82F6'],
            'sosial_emosional' => ['Sosial Emosional', 'sosial_emosional', 'catatan_sosial_emosional', 'rekap_sosial_emosional', '#EC4899'],
            'seni' => ['Seni', 'seni', 'catatan_seni', 'rekap_seni', '#8B5CF6']
        ];

        $scaleBadges = [
            'BB' => ['badge-red', 'Belum Berkembang'],
            'MB' => ['badge-orange', 'Mulai Berkembang'],
            'BSH' => ['badge-purple', 'Berkembang Sesuai Harapan'],
            'BSB' => ['badge-green', 'Berkembang Sangat Baik']
        ];
    @endphp

    @foreach($aspeks as $key => $info)
        @php
            // Ambil nilai skala terbaru minggu terakhir yang diisi
            $lastCatatan = $catatansGuru->whereNotNull($info[1])->last();
            $nilaiSkala = $lastCatatan ? $lastCatatan->{$info[1]} : null;
            $badgeInfo = $scaleBadges[$nilaiSkala] ?? ['badge-secondary', 'Belum Ada Penilaian'];
        @endphp

        <div class="card" style="border-left:5px solid {{ $info[4] }}; box-shadow:0 2px 8px rgba(0,0,0,0.03);">
            <div class="card-header" style="background:#FCFDFD; border-bottom:1px solid var(--border); padding:14px 20px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:10px;">
                <div style="display:flex; align-items:center; gap:8px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="{{ $info[4] }}" stroke-width="2.2" style="width:18px;height:18px;"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
                    <strong style="color:var(--secondary); font-size:1.05rem;">Aspek {{ $info[0] }}</strong>
                </div>
                <div>
                    <span style="font-size:0.75rem; color:var(--muted); margin-right:6px;">Capaian Skala:</span>
                    <span class="badge {{ $badgeInfo[0] }}" style="font-weight:700; padding:6px 12px; font-size:0.8rem;">
                        {{ $nilaiSkala ? $nilaiSkala . ' — ' . $badgeInfo[1] : 'Belum Diisi' }}
                    </span>
                </div>
            </div>

            <div class="card-body" style="padding:20px;">
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                    <!-- Sisi Kiri: Catatan & Perkembangan Riil dari Guru (Anaknya sudah bisa apa) -->
                    <div style="background:#F8FAFC; padding:16px; border-radius:10px; border:1px solid #E2E8F0;">
                        <h4 style="font-size:0.8rem; font-weight:800; color:#475569; margin-bottom:10px; text-transform:uppercase; display:inline-flex; align-items:center; gap:6px;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>
                            <span>Evaluasi &amp; Catatan Guru Per Minggu</span>
                        </h4>

                        @if($catatansGuru->count() > 0)
                            <div style="display:flex; flex-direction:column; gap:10px; font-size:0.8rem;">
                                @foreach($catatansGuru as $cg)
                                    @if($cg->{$info[2]})
                                        <div style="padding-bottom:8px; border-bottom:1px dashed #CBD5E1;">
                                            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:3px;">
                                                <strong style="color:var(--secondary);">Minggu {{ $cg->minggu_ke }}</strong>
                                                <span class="badge {{ $scaleBadges[$cg->{$info[1]}][0] ?? 'badge-secondary' }}" style="font-size:0.7rem; padding:2px 6px;">
                                                    {{ $cg->{$info[1]} }}
                                                </span>
                                            </div>
                                            <p style="margin:0; color:#334155; line-height:1.4;">{{ $cg->{$info[2]} }}</p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @else
                            <p style="font-size:0.8rem; color:#94A3B8; font-style:italic; margin:0;">Belum ada rincian evaluasi guru untuk bulan ini.</p>
                        @endif
                    </div>

                    <!-- Sisi Kanan: Rangkuman Bulanan Admin -->
                    <div style="background:#FFFDF5; padding:16px; border-radius:10px; border:1px solid #FDE68A;">
                        <h4 style="font-size:0.8rem; font-weight:800; color:#D97706; margin-bottom:10px; text-transform:uppercase; display:inline-flex; align-items:center; gap:6px;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                            <span>Rangkuman Bulanan Resmi Sekolah</span>
                        </h4>
                        <div style="font-size:0.85rem; line-height:1.6; color:#451A03; white-space:pre-line;">{!! nl2br(e($laporan->{$info[3]})) !!}</div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
