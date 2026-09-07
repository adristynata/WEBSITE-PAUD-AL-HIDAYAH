@extends('layouts.dashboard')
@section('title', 'Dashboard Orang Tua — PAUD Al-Hidayah')
@section('page-title', 'Portal Informasi Wali Murid')

@section('sidebar-menu')
    <div class="nav-section">Menu Utama</div>
    <a href="{{ route('ortu.dashboard') }}" class="nav-link active">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        <span>Dashboard Ortu</span>
    </a>
@endsection

@push('styles')
<style>
    .ortu-hero-banner {
        background: linear-gradient(135deg, #091F0B 0%, #15803D 100%);
        border-radius: 20px;
        padding: 28px;
        color: #FFFFFF;
        margin-bottom: 28px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 25px -5px rgba(21, 128, 61, 0.3);
    }
    .ortu-hero-bg-pattern {
        position: absolute; right: -20px; bottom: -30px; opacity: 0.15; pointer-events: none;
    }
    .ortu-profile-badge {
        display: flex; align-items: center; gap: 16px; flex-wrap: wrap; margin-top: 14px;
    }
    .ortu-avatar-img {
        width: 64px; height: 64px; border-radius: 50%; object-fit: cover; border: 3px solid #4ADE80; box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }
    .ortu-avatar-init {
        width: 64px; height: 64px; border-radius: 50%; background: linear-gradient(135deg, #10B981, #059669); display: flex; align-items: center; justify-content: center; font-size: 1.6rem; font-weight: 800; color: #fff; border: 3px solid #4ADE80; box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }
    .child-card-header {
        background: linear-gradient(135deg, #F8FAFC, #F1F5F9);
        border-bottom: 1px solid var(--border);
        padding: 22px;
        display: flex;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }
    .child-avatar-wrap {
        position: relative;
        flex-shrink: 0;
    }
    .child-photo {
        width: 72px; height: 72px;
        border-radius: 20px;
        object-fit: cover;
        border: 3px solid #16A34A;
        box-shadow: 0 6px 16px rgba(0,0,0,0.1);
    }
    .child-avatar-init {
        width: 72px; height: 72px;
        border-radius: 20px;
        background: linear-gradient(135deg, #16A34A, #15803D);
        display: flex; align-items: center; justify-content: center;
        font-size: 2rem; font-weight: 800; color: #fff;
        box-shadow: 0 6px 16px rgba(0,0,0,0.1);
    }
    .child-name {
        font-size: 1.25rem; font-weight: 800; color: var(--secondary); margin-bottom: 6px;
    }
    .child-chips {
        display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 6px;
    }
    .ortu-inner-grid {
        display: grid;
        grid-template-columns: 1.2fr 1fr;
        gap: 20px;
        padding: 22px;
        border-bottom: 1px solid var(--border);
    }
    .legend-ortu-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 8px;
        font-size: 0.75rem;
    }
    .laporan-grid-box {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 14px;
    }
    .laporan-card-item {
        background: #FFFFFF;
        border: 1px solid var(--border);
        border-radius: 14px;
        padding: 16px 18px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 14px;
        transition: all 0.2s ease;
    }
    .laporan-card-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.06);
        border-color: #16A34A;
    }
    .notes-stream-item {
        padding: 14px 18px;
        border-bottom: 1px solid #F1F5F9;
        display: flex;
        flex-direction: column;
        gap: 6px;
    }
    .notes-stream-item:last-child { border-bottom: none; }

    /* Modal styling */
    .modal-overlay {
        display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 999; backdrop-filter: blur(3px); align-items: center; justify-content: center; padding: 20px;
    }
    .modal-overlay.active { display: flex; }
    .modal-box {
        background: #fff; border-radius: 20px; max-width: 440px; width: 100%; padding: 24px; box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    }

    @media (max-width: 992px) {
        .ortu-inner-grid {
            grid-template-columns: 1fr !important;
            padding: 16px !important;
            gap: 16px !important;
        }
    }

    @media (max-width: 768px) {
        .child-card-header { flex-direction: column; align-items: flex-start; text-align: left; }
        .laporan-grid-box { grid-template-columns: 1fr; }
    }

    @media (max-width: 576px) {
        .ortu-hero-banner { padding: 20px 18px; border-radius: 16px; }
        .ortu-hero-banner h1 { font-size: 1.2rem !important; }
        .child-card-header { padding: 16px; gap: 14px; }
        .child-photo, .child-avatar-init { width: 60px; height: 60px; border-radius: 16px; font-size: 1.6rem; }
        .child-name { font-size: 1.1rem; }
        .legend-ortu-grid { grid-template-columns: 1fr !important; }
        .laporan-card-item { padding: 14px; }
        .laporan-card-actions-box { flex-direction: column; width: 100%; }
        .laporan-card-actions-box .btn { width: 100%; }
    }
</style>
@endpush

@section('content')
<!-- Hero Welcome Banner dengan Foto Profil Ortu -->
<div class="ortu-hero-banner">
    <div class="ortu-hero-bg-pattern">
        <svg viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="1.5" style="width: 260px; height: 260px;"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
    </div>

    <div style="position: relative; z-index: 2;">
        <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.15); backdrop-filter: blur(4px); padding: 4px 14px; border-radius: 20px; font-size: 0.78rem; font-weight: 700; letter-spacing: 0.5px; margin-bottom: 10px;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
            <span>PORTAL WALI MURID TERPADU</span>
        </div>
        
        <div class="ortu-profile-badge">
            @if(Auth::user()->foto)
                <img src="{{ asset('storage/profil/' . Auth::user()->foto) }}" class="ortu-avatar-img" alt="{{ Auth::user()->name }}">
            @else
                <div class="ortu-avatar-init">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
            @endif
            <div>
                <h1 style="font-size: 1.45rem; font-weight: 800; line-height: 1.2; margin-bottom: 4px;">
                    Assalamu'alaikum Warahmatullahi Wabarakatuh, {{ Auth::user()->name }}!
                </h1>
                <p style="font-size: 0.85rem; color: rgba(255,255,255,0.85); line-height: 1.4; max-width: 680px; margin-bottom: 8px;">
                    Selamat datang di Portal Orang Tua KB-PAUD Al-Hidayah. Pantau tumbuh kembang dan laporan belajar Ananda secara transparan.
                </p>
                <button type="button" onclick="openPhotoModal()" class="btn" style="background: rgba(255,255,255,0.2); color: #fff; font-size: 0.76rem; padding: 6px 14px; border-radius: 20px; border: 1px solid rgba(255,255,255,0.3); backdrop-filter: blur(4px); display: inline-flex; align-items: center; gap: 6px; cursor: pointer;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                    <span>Ubah Foto Profil Saya</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Upload Foto Profil Ortu -->
<div class="modal-overlay" id="photoModal">
    <div class="modal-box">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
            <strong style="font-size: 1rem; color: var(--secondary); display: flex; align-items: center; gap: 8px;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 18px; height: 18px; color: #16A34A;"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                <span>Upload Foto Profil Baru</span>
            </strong>
            <button type="button" onclick="closePhotoModal()" style="background: none; border: none; font-size: 1.2rem; cursor: pointer; color: #64748B;">&times;</button>
        </div>
        <form method="POST" action="{{ route('ortu.profil.foto') }}" enctype="multipart/form-data">
            @csrf
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.82rem; font-weight: 700; color: var(--secondary); margin-bottom: 6px;">Pilih File Foto (JPG/PNG, max 2MB):</label>
                <input type="file" name="foto" class="form-control" accept="image/jpg,image/jpeg,image/png" required style="width: 100%; padding: 10px; border: 1.5px solid var(--border); border-radius: 10px;">
            </div>
            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <button type="button" onclick="closePhotoModal()" class="btn btn-secondary btn-sm">Batal</button>
                <button type="submit" class="btn btn-primary btn-sm" style="background: #16A34A;">Simpan Foto</button>
            </div>
        </form>
    </div>
</div>

@php
$months = [1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',5=>'Mei',6=>'Juni',7=>'Juli',8=>'Agustus',9=>'September',10=>'Oktober',11=>'November',12=>'Desember'];
@endphp

@forelse($siswas as $s)
    @php
        $statsCapaian = $capaianStatsPerSiswa[$s->id] ?? ['BSB' => 0, 'BSH' => 0, 'MB' => 0, 'BB' => 0];
        $totalCapaian = array_sum($statsCapaian);
        $totalSafe = $totalCapaian > 0 ? $totalCapaian : 1;
        $pctBSB = round(($statsCapaian['BSB'] / $totalSafe) * 100);
        $pctBSH = round(($statsCapaian['BSH'] / $totalSafe) * 100);
        $pctMB  = round(($statsCapaian['MB'] / $totalSafe) * 100);
        $pctBB  = round(($statsCapaian['BB'] / $totalSafe) * 100);
        $catatansAnak = $latestCatatans[$s->id] ?? collect();
    @endphp

    <div class="card" style="margin-bottom: 28px; overflow: hidden; border-radius: 18px; border: 1px solid var(--border);">
        <!-- Child Header Digital Card -->
        <div class="child-card-header">
            <div class="child-avatar-wrap">
                @if($s->foto)
                    <img src="{{ asset('storage/'.$s->foto) }}" class="child-photo" alt="{{ $s->nama }}">
                @else
                    <div class="child-avatar-init">{{ strtoupper(substr($s->nama, 0, 1)) }}</div>
                @endif
            </div>

            <div style="flex: 1; min-width: 0;">
                <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; margin-bottom: 4px;">
                    <div class="child-name" style="margin-bottom: 0;">{{ $s->nama }}</div>
                    <span class="badge {{ $s->is_aktif ? 'badge-green' : 'badge-red' }}" style="font-weight: 700;">
                        {{ $s->is_aktif ? 'Siswa Aktif Terdaftar' : 'Nonaktif' }}
                    </span>
                </div>

                <div class="child-chips">
                    <span class="badge badge-purple" style="font-weight: 700;">NIS: {{ $s->nis }}</span>
                    @if($s->kelas)
                        <span class="badge badge-blue" style="font-weight: 700;">Kelas: {{ $s->kelas->nama_kelas }} ({{ $s->kelas->tahun_ajaran }})</span>
                        <span class="badge badge-gray" style="font-weight: 700;">Wali Kelas: {{ $s->kelas->guru->name ?? 'Belum Diatur' }}</span>
                    @endif
                </div>

                <div style="display: flex; align-items: center; gap: 16px; font-size: 0.78rem; color: var(--muted); margin-top: 6px; flex-wrap: wrap;">
                    <div style="display: flex; align-items: center; gap: 5px;">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        <span>Lahir: {{ $s->tanggal_lahir->translatedFormat('d F Y') }} ({{ \Carbon\Carbon::parse($s->tanggal_lahir)->age }} Tahun)</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inner Content Grid (Visual Capaian + Catatan Terkini Guru) -->
        <div class="ortu-inner-grid">
            <!-- Left: Visual Analytics Capaian 7 Aspek Perkembangan -->
            <div style="background: #FAF5FF; border: 1px solid #F3E8FF; border-radius: 14px; padding: 18px;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                    <strong style="font-size: 0.88rem; color: #6D28D9; display: flex; align-items: center; gap: 6px;">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 16px; height: 16px; color: #7C3AED;"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        <span>Ringkasan Capaian 7 Aspek Perkembangan</span>
                    </strong>
                    <span style="font-size: 0.72rem; color: #64748B; font-weight: 600;">Total Evaluasi: {{ $totalCapaian }} Indikator</span>
                </div>

                <!-- Stacked Progress Bar -->
                <div style="height: 14px; width: 100%; background: #E2E8F0; border-radius: 8px; overflow: hidden; display: flex; margin-bottom: 14px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);">
                    <div style="width: {{ $pctBSB }}%; background: #16A34A;" title="BSB: {{ $statsCapaian['BSB'] }} ({{ $pctBSB }}%)"></div>
                    <div style="width: {{ $pctBSH }}%; background: #8B5CF6;" title="BSH: {{ $statsCapaian['BSH'] }} ({{ $pctBSH }}%)"></div>
                    <div style="width: {{ $pctMB }}%; background: #F59E0B;" title="MB: {{ $statsCapaian['MB'] }} ({{ $pctMB }}%)"></div>
                    <div style="width: {{ $pctBB }}%; background: #EF4444;" title="BB: {{ $statsCapaian['BB'] }} ({{ $pctBB }}%)"></div>
                </div>

                <!-- Mini Legend Grid -->
                <div class="legend-ortu-grid">
                    <div style="background: #FFFFFF; padding: 8px 10px; border-radius: 8px; border: 1px solid #DCFCE7; display: flex; justify-content: space-between; align-items: center;">
                        <span style="color: #16A34A; font-weight: 700;">● BSB (Sangat Baik)</span>
                        <strong style="color: #15803D;">{{ $statsCapaian['BSB'] }}</strong>
                    </div>
                    <div style="background: #FFFFFF; padding: 8px 10px; border-radius: 8px; border: 1px solid #DDD6FE; display: flex; justify-content: space-between; align-items: center;">
                        <span style="color: #7C3AED; font-weight: 700;">● BSH (Sesuai Harapan)</span>
                        <strong style="color: #6D28D9;">{{ $statsCapaian['BSH'] }}</strong>
                    </div>
                    <div style="background: #FFFFFF; padding: 8px 10px; border-radius: 8px; border: 1px solid #FDE68A; display: flex; justify-content: space-between; align-items: center;">
                        <span style="color: #D97706; font-weight: 700;">● MB (Mulai Berkembang)</span>
                        <strong style="color: #B45309;">{{ $statsCapaian['MB'] }}</strong>
                    </div>
                    <div style="background: #FFFFFF; padding: 8px 10px; border-radius: 8px; border: 1px solid #FECACA; display: flex; justify-content: space-between; align-items: center;">
                        <span style="color: #DC2626; font-weight: 700;">● BB (Belum Berkembang)</span>
                        <strong style="color: #B91C1C;">{{ $statsCapaian['BB'] }}</strong>
                    </div>
                </div>
            </div>

            <!-- Right: Catatan Evaluasi Terbaru dari Guru -->
            <div style="background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 14px; overflow: hidden; display: flex; flex-direction: column;">
                <div style="background: #F1F5F9; padding: 10px 16px; border-bottom: 1px solid #E2E8F0; font-size: 0.82rem; font-weight: 700; color: var(--secondary); display: flex; align-items: center; gap: 6px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 15px; height: 15px; color: #16A34A;"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>
                    <span>Kabar Evaluasi Minggu Ini dari Guru</span>
                </div>
                <div style="flex: 1; overflow-y: auto;">
                    @forelse($catatansAnak as $cn)
                        <div class="notes-stream-item">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <strong style="font-size: 0.78rem; color: #16A34A;">Minggu {{ $cn->minggu_ke }} • Bulan {{ $cn->bulan }}/{{ $cn->tahun }}</strong>
                                <span style="font-size: 0.7rem; color: #64748B;">{{ $cn->updated_at->diffForHumans() }}</span>
                            </div>
                            <p style="font-size: 0.76rem; color: #334155; line-height: 1.4; margin: 0; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $cn->catatan_guru ?? 'Catatan evaluasi perkembangan minggu ini telah diisi oleh wali kelas.' }}
                            </p>
                        </div>
                    @empty
                        <div style="padding: 24px 16px; text-align: center; color: var(--muted); font-size: 0.78rem;">
                            Belum ada catatan evaluasi mingguan terbaru dari wali kelas.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Section Rekapitulasi Rapor Bulanan Diterbitkan -->
        <div style="padding: 22px;">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; flex-wrap: wrap; gap: 10px;">
                <div style="display: flex; align-items: center; gap: 8px; font-weight: 700; font-size: 0.9rem; color: var(--secondary);">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 18px; height: 18px; color: #16A34A;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                    <span>Dokumen Rapor &amp; Rekapitulasi Bulanan</span>
                </div>
                <span class="badge badge-purple" style="font-weight: 700;">{{ $s->laporanBulanans->count() }} Dokumen Terbit</span>
            </div>

            @if($s->laporanBulanans->count() > 0)
                <div class="laporan-grid-box">
                    @foreach($s->laporanBulanans as $laporan)
                        <div class="laporan-card-item">
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 42px; height: 42px; border-radius: 12px; background: #DCFCE7; color: #16A34A; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 20px; height: 20px;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                                </div>
                                <div>
                                    <strong style="font-size: 0.92rem; color: var(--secondary); display: block;">
                                        {{ $months[$laporan->bulan] ?? $laporan->bulan }} {{ $laporan->tahun }}
                                    </strong>
                                    <span style="font-size: 0.72rem; color: var(--muted);">Diterbitkan {{ $laporan->updated_at->format('d M Y') }}</span>
                                </div>
                            </div>

                            <div style="display: flex; gap: 8px;" class="laporan-card-actions-box">
                                <a href="{{ route('ortu.laporan.show', $laporan->id) }}" class="btn btn-secondary btn-sm" style="flex: 1; justify-content: center;">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 13px; height: 13px;"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    <span>Lihat Rapor</span>
                                </a>
                                <a href="{{ route('ortu.laporan.download', $laporan->id) }}" class="btn btn-primary btn-sm" style="flex: 1; justify-content: center; background: #15803D;">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 13px; height: 13px;"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                                    <span>Unduh PDF</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-laporan">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 32px; height: 32px; color: var(--muted);"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="9.5" y1="12.5" x2="14.5" y2="17.5"/><line x1="14.5" y1="12.5" x2="9.5" y2="17.5"/></svg>
                    <p>Belum ada dokumen rapor bulanan yang diterbitkan untuk {{ $s->nama }}.</p>
                </div>
            @endif
        </div>
    </div>
@empty
    <div class="card">
        <div class="card-body">
            <div class="empty-state-full">
                <div class="es-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 32px; height: 32px;"><path d="M9 12h.01"/><path d="M15 12h.01"/><path d="M10 16c.5.3 1.2.5 2 .5s1.5-.2 2-.5"/></svg>
                </div>
                <h3 style="font-weight: 700; font-size: 1.05rem; margin-bottom: 8px;">Belum ada data anak yang ditautkan</h3>
                <p style="font-size: 0.875rem; color: var(--muted);">Akun Anda belum terhubung dengan data siswa. Silakan hubungi pihak sekolah untuk verifikasi data murid.</p>
            </div>
        </div>
    </div>
@endforelse

<script>
    function openPhotoModal() {
        document.getElementById('photoModal').classList.add('active');
    }
    function closePhotoModal() {
        document.getElementById('photoModal').classList.remove('active');
    }
</script>
@endsection
