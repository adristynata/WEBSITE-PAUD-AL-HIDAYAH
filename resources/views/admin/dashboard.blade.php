@extends('layouts.dashboard')

@section('title', 'Dashboard Admin — PAUD Al-Hidayah')
@section('page-title', 'Dashboard')

@section('sidebar-menu')
    @include('admin.partials.sidebar-menu')
@endsection

@push('styles')
<style>
    .welcome-hero {
        background: linear-gradient(135deg, #0d2b1a 0%, #1a4a2a 50%, #0f3d21 100%);
        border-radius: 16px;
        padding: 32px 36px;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
        overflow: hidden;
        position: relative;
    }
    .welcome-hero::before {
        content: '';
        position: absolute;
        top: -60px; right: -40px;
        width: 220px; height: 220px;
        border-radius: 50%;
        background: rgba(74, 222, 128, 0.07);
    }
    .hero-text { position: relative; z-index: 1; }
    .hero-greeting {
        font-size: 0.78rem;
        font-weight: 700;
        color: rgba(74, 222, 128, 0.85);
        letter-spacing: 0.5px;
        text-transform: uppercase;
        margin-bottom: 6px;
    }
    .hero-name {
        font-size: 1.7rem;
        font-weight: 800;
        color: #fff;
        margin-bottom: 8px;
        line-height: 1.2;
    }
    .hero-desc {
        font-size: 0.875rem;
        color: rgba(255,255,255,0.6);
        line-height: 1.6;
        max-width: 420px;
        margin-bottom: 20px;
    }
    .hero-actions { display: flex; gap: 10px; flex-wrap: wrap; }
    .hero-btn {
        display: inline-flex; align-items: center; gap: 7px;
        padding: 9px 18px;
        border-radius: 9px;
        font-size: 0.85rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.18s;
    }
    .hero-btn svg { width: 15px; height: 15px; }
    .hero-btn-primary { background: #22c55e; color: #fff; }
    .hero-btn-primary:hover { background: #16a34a; box-shadow: 0 4px 14px rgba(34,197,94,0.45); }
    .hero-btn-ghost { background: rgba(255,255,255,0.1); color: rgba(255,255,255,0.85); border: 1px solid rgba(255,255,255,0.18); }
    .hero-btn-ghost:hover { background: rgba(255,255,255,0.18); color: #fff; }
    .hero-stats-wrap { position: relative; z-index: 1; display: flex; gap: 16px; }
    .hero-stat-bubble {
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.12);
        border-radius: 14px;
        padding: 18px 22px;
        text-align: center;
        min-width: 88px;
    }
    .hsb-val { font-size: 1.9rem; font-weight: 800; color: #fff; line-height: 1; margin-bottom: 4px; }
    .hsb-label { font-size: 0.68rem; font-weight: 600; color: rgba(255,255,255,0.5); text-transform: uppercase; letter-spacing: 0.5px; }
    @media (max-width: 992px) {
        .welcome-hero { flex-direction: column; align-items: flex-start; }
        .hero-stats-wrap { flex-wrap: wrap; }
    }
    .quick-actions-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
        margin-bottom: 24px;
    }
    @media (max-width: 900px) { .quick-actions-grid { grid-template-columns: repeat(2, 1fr); } }
    .quick-action-card {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
        padding: 20px;
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 14px;
        text-decoration: none;
        color: var(--text);
        transition: all 0.2s ease;
        box-shadow: 0 1px 4px rgba(0,0,0,0.04);
    }
    .quick-action-card:hover { transform: translateY(-3px); box-shadow: 0 8px 24px rgba(0,0,0,0.09); border-color: #d1fae5; }
    .qa-icon { width: 44px; height: 44px; border-radius: 11px; display: flex; align-items: center; justify-content: center; }
    .qa-icon svg { width: 20px; height: 20px; }
    .qa-label { font-size: 0.85rem; font-weight: 700; }
    .qa-sub { font-size: 0.75rem; color: var(--muted); margin-top: 2px; }
    .qa-arrow { color: var(--muted); }
    .qa-arrow svg { width: 16px; height: 16px; }
    .info-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 20px; }
    @media (max-width: 900px) { .info-grid { grid-template-columns: 1fr; } }
</style>
@endpush

@section('content')
{{-- Hero Welcome --}}
<div class="welcome-hero">
    <div class="hero-text">
        <div class="hero-greeting">Selamat Datang Kembali</div>
        <h1 class="hero-name">{{ auth()->user()->name }}</h1>
        <p class="hero-desc">Kelola data siswa, kelas, dan pantau laporan perkembangan anak usia dini dari satu panel terpadu.</p>
        <div class="hero-actions">
            <a href="{{ route('admin.siswa.index') }}" class="hero-btn hero-btn-primary">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                Tambah Siswa
            </a>
            <a href="{{ route('admin.laporan.index') }}" class="hero-btn hero-btn-ghost">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="12" y1="18" x2="12" y2="12"/></svg>
                Lihat Laporan
            </a>
        </div>
    </div>
    <div class="hero-stats-wrap">
        <div class="hero-stat-bubble">
            <div class="hsb-val">{{ $stats['total_siswa'] }}</div>
            <div class="hsb-label">Siswa</div>
        </div>
        <div class="hero-stat-bubble">
            <div class="hsb-val">{{ $stats['total_kelas'] }}</div>
            <div class="hsb-label">Kelas</div>
        </div>
        <div class="hero-stat-bubble">
            <div class="hsb-val">{{ $stats['total_guru'] }}</div>
            <div class="hsb-label">Guru</div>
        </div>
    </div>
</div>

{{-- Stat Cards --}}
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon green">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
        </div>
        <div class="stat-body">
            <div class="stat-value">{{ $stats['total_siswa'] }}</div>
            <div class="stat-label">Siswa Aktif</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon blue">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        </div>
        <div class="stat-body">
            <div class="stat-value">{{ $stats['total_kelas'] }}</div>
            <div class="stat-label">Total Kelas</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon purple">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><polyline points="17 11 19 13 23 9"/></svg>
        </div>
        <div class="stat-body">
            <div class="stat-value">{{ $stats['total_guru'] }}</div>
            <div class="stat-label">Guru & Staff</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon orange">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        </div>
        <div class="stat-body">
            <div class="stat-value">{{ $stats['total_ortu'] }}</div>
            <div class="stat-label">Orang Tua</div>
        </div>
    </div>
</div>

{{-- Quick Actions --}}
<div class="quick-actions-grid">
    <a href="{{ route('admin.siswa.index') }}" class="quick-action-card">
        <div class="qa-icon" style="background:#dcfce7;color:#16a34a">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
        </div>
        <div><div class="qa-label">Tambah Siswa</div><div class="qa-sub">Daftarkan siswa baru</div></div>
        <div class="qa-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></div>
    </a>
    <a href="{{ route('admin.kelas.index') }}" class="quick-action-card">
        <div class="qa-icon" style="background:#dbeafe;color:#2563eb">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        </div>
        <div><div class="qa-label">Kelola Kelas</div><div class="qa-sub">Atur kelas & wali kelas</div></div>
        <div class="qa-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></div>
    </a>
    <a href="{{ route('admin.laporan.index') }}" class="quick-action-card">
        <div class="qa-icon" style="background:#ede9fe;color:#7c3aed">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="12" y1="18" x2="12" y2="12"/><line x1="9" y1="18" x2="9" y2="15"/><line x1="15" y1="18" x2="15" y2="10"/></svg>
        </div>
        <div><div class="qa-label">Rekap Laporan</div><div class="qa-sub">Lihat semua laporan</div></div>
        <div class="qa-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></div>
    </a>
    <a href="{{ route('admin.galeri.index') }}" class="quick-action-card">
        <div class="qa-icon" style="background:#ffedd5;color:#ea580c">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
        </div>
        <div><div class="qa-label">Galeri Kegiatan</div><div class="qa-sub">Kelola foto kegiatan</div></div>
        <div class="qa-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></div>
    </a>
</div>

{{-- Info + Quick Access --}}
<div class="info-grid">
    <div class="card">
        <div class="card-header">
            <div class="card-header-left">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;color:#16a34a"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                <span>Informasi Sistem</span>
            </div>
        </div>
        <div class="card-body" style="display:flex;flex-direction:column;gap:14px">
            <div style="display:flex;align-items:center;gap:14px;padding-bottom:14px;border-bottom:1px solid var(--border)">
                <div style="width:40px;height:40px;border-radius:10px;background:#dcfce7;display:flex;align-items:center;justify-content:center;color:#16a34a;flex-shrink:0">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                </div>
                <div style="flex:1">
                    <div style="font-weight:700;font-size:0.875rem">Modul Manajemen Siswa</div>
                    <div style="font-size:0.78rem;color:var(--muted);margin-top:2px">CRUD data siswa & status aktif berhasil diimplementasi</div>
                </div>
                <span class="badge badge-green">Aktif</span>
            </div>
            <div style="display:flex;align-items:center;gap:14px;padding-bottom:14px;border-bottom:1px solid var(--border)">
                <div style="width:40px;height:40px;border-radius:10px;background:#dcfce7;display:flex;align-items:center;justify-content:center;color:#16a34a;flex-shrink:0">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                </div>
                <div style="flex:1">
                    <div style="font-weight:700;font-size:0.875rem">Login Orang Tua (NIS + PIN)</div>
                    <div style="font-size:0.78rem;color:var(--muted);margin-top:2px">Sistem autentikasi wali murid dinamis aktif</div>
                </div>
                <span class="badge badge-green">Aktif</span>
            </div>
            <div style="display:flex;align-items:center;gap:14px">
                <div style="width:40px;height:40px;border-radius:10px;background:#dbeafe;display:flex;align-items:center;justify-content:center;color:#2563eb;flex-shrink:0">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <div style="flex:1">
                    <div style="font-weight:700;font-size:0.875rem">Catatan Perkembangan Mingguan</div>
                    <div style="font-size:0.78rem;color:var(--muted);margin-top:2px">Modul input catatan oleh guru wali kelas</div>
                </div>
                <span class="badge badge-blue">Berjalan</span>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="card-header-left">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;color:#16a34a"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                <span>Akses Cepat</span>
            </div>
        </div>
        <div class="card-body" style="display:flex;flex-direction:column;gap:10px">
            <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary" style="justify-content:flex-start">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:15px;height:15px"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                Daftar Semua Siswa
            </a>
            <a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary" style="justify-content:flex-start">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:15px;height:15px"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                Daftar Kelas
            </a>
            <a href="{{ route('admin.profil.edit') }}" class="btn btn-secondary" style="justify-content:flex-start">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:15px;height:15px"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                Edit Profil Sekolah
            </a>
            <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary" style="justify-content:flex-start">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:15px;height:15px"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                Kelola Galeri
            </a>
        </div>
    </div>
</div>
@endsection
