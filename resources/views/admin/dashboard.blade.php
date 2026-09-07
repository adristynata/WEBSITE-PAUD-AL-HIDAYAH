@extends('layouts.dashboard')
@section('title', 'Dashboard Admin — PAUD Al-Hidayah')
@section('page-title', 'Dashboard Utama Administrator')

@section('sidebar-menu')
    @include('admin.partials.sidebar-menu')
@endsection

@push('styles')
<style>
    .admin-dashboard-grid {
        display: grid;
        grid-template-columns: 1.4fr 1fr;
        gap: 24px;
        margin-bottom: 28px;
    }
    .hero-banner-box {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
        position: relative;
        z-index: 2;
    }
    .hero-stats-box {
        display: flex;
        gap: 14px;
        background: rgba(0,0,0,0.2);
        padding: 16px 20px;
        border-radius: 16px;
        border: 1px solid rgba(255,255,255,0.12);
    }
    .legend-mini-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
        font-size: 0.78rem;
    }
    .chart-container-box {
        position: relative;
        height: 220px;
        width: 100%;
        margin-bottom: 20px;
    }

    @media (max-width: 992px) {
        .admin-dashboard-grid {
            grid-template-columns: 1fr !important;
            gap: 18px !important;
        }
    }

    @media (max-width: 640px) {
        .hero-banner-box {
            flex-direction: column;
            align-items: flex-start;
        }
        .hero-stats-box {
            width: 100%;
            justify-content: space-around;
        }
        .legend-mini-grid {
            grid-template-columns: 1fr !important;
        }
        .chart-container-box {
            height: 190px !important;
        }
    }
</style>
@endpush

@section('content')
<!-- Hero Welcome Banner -->
<div style="background: linear-gradient(135deg, #0D1F10 0%, #15803D 100%); border-radius: 18px; padding: 24px 28px; color: #fff; margin-bottom: 28px; position: relative; overflow: hidden; box-shadow: 0 10px 25px -5px rgba(21, 128, 61, 0.3);">
    <div style="position: absolute; right: -20px; bottom: -30px; opacity: 0.15; pointer-events: none;">
        <svg viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="1.5" style="width: 280px; height: 280px;"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
    </div>

    <div class="hero-banner-box">
        <div style="max-width: 580px;">
            <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.15); backdrop-filter: blur(4px); padding: 4px 14px; border-radius: 20px; font-size: 0.78rem; font-weight: 700; letter-spacing: 0.5px; margin-bottom: 12px;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                <span>PANEL KONTROL SEKOLAH TERPADU</span>
            </div>
            <h1 style="font-size: 1.6rem; font-weight: 800; line-height: 1.25; margin-bottom: 8px; display: flex; align-items: center; gap: 8px;">
                <span>Selamat Datang Kembali, {{ Auth::user()->name }}!</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="#4ADE80" stroke-width="2.2" style="width: 26px; height: 26px; flex-shrink: 0;"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg>
            </h1>
            <p style="font-size: 0.88rem; color: rgba(255,255,255,0.85); line-height: 1.5; margin-bottom: 18px;">
                Pantau tren perkembangan anak usia dini, kelola data kelas, serta publikasikan rekapitulasi laporan bulanan secara transparan.
            </p>
            <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                <a href="{{ route('admin.siswa.create') }}" class="btn" style="background: #FFFFFF; color: #15803D; font-weight: 800; text-decoration: none; padding: 10px 18px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.15); display: inline-flex; align-items: center; gap: 6px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="width: 15px; height: 15px; flex-shrink: 0;"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    <span>Tambah Siswa Baru</span>
                </a>
                <a href="{{ route('admin.laporan.index') }}" class="btn" style="background: rgba(255,255,255,0.18); color: #FFFFFF; font-weight: 700; text-decoration: none; padding: 10px 18px; border-radius: 10px; border: 1px solid rgba(255,255,255,0.3); backdrop-filter: blur(4px); display: inline-flex; align-items: center; gap: 6px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 15px; height: 15px;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                    <span>Kelola Rekap Laporan</span>
                </a>
            </div>
        </div>

        <div class="hero-stats-box">
            <div style="text-align: center; padding: 0 10px;">
                <div style="font-size: 1.6rem; font-weight: 800; color: #4ADE80;">{{ $stats['total_siswa'] }}</div>
                <div style="font-size: 0.72rem; color: rgba(255,255,255,0.75); text-transform: uppercase; font-weight: 600;">Siswa</div>
            </div>
            <div style="width: 1px; background: rgba(255,255,255,0.15);"></div>
            <div style="text-align: center; padding: 0 10px;">
                <div style="font-size: 1.6rem; font-weight: 800; color: #60A5FA;">{{ $stats['total_kelas'] }}</div>
                <div style="font-size: 0.72rem; color: rgba(255,255,255,0.75); text-transform: uppercase; font-weight: 600;">Kelas</div>
            </div>
            <div style="width: 1px; background: rgba(255,255,255,0.15);"></div>
            <div style="text-align: center; padding: 0 10px;">
                <div style="font-size: 1.6rem; font-weight: 800; color: #FBBF24;">{{ $stats['total_guru'] }}</div>
                <div style="font-size: 0.72rem; color: rgba(255,255,255,0.75); text-transform: uppercase; font-weight: 600;">Guru</div>
            </div>
        </div>
    </div>
</div>

<!-- Key Stat Cards -->
<div class="stats-grid" style="margin-bottom: 28px;">
    <div class="stat-card" style="border-left: 4px solid #16A34A;">
        <div class="stat-icon green">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        </div>
        <div class="stat-body">
            <div class="stat-value">{{ $stats['total_siswa'] }}</div>
            <div class="stat-label">Siswa Aktif Terdaftar</div>
            <div class="stat-trend" style="color: #16A34A;">● Terdaftar di kelompok kelas</div>
        </div>
    </div>

    <div class="stat-card" style="border-left: 4px solid #2563EB;">
        <div class="stat-icon blue">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        </div>
        <div class="stat-body">
            <div class="stat-value">{{ $stats['total_kelas'] }}</div>
            <div class="stat-label">Kelompok Kelas</div>
            <div class="stat-trend" style="color: #2563EB;">● Aktif tahun ajaran ini</div>
        </div>
    </div>

    <div class="stat-card" style="border-left: 4px solid #7C3AED;">
        <div class="stat-icon purple">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </div>
        <div class="stat-body">
            <div class="stat-value">{{ $stats['total_guru'] }}</div>
            <div class="stat-label">Guru &amp; Wali Kelas</div>
            <div class="stat-trend" style="color: #7C3AED;">● Pengampu kelas PAUD</div>
        </div>
    </div>

    <div class="stat-card" style="border-left: 4px solid #EA580C;">
        <div class="stat-icon orange">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><polyline points="17 11 19 13 23 9"/></svg>
        </div>
        <div class="stat-body">
            <div class="stat-value">{{ $stats['total_ortu'] }}</div>
            <div class="stat-label">Wali Murid (Ortu)</div>
            <div class="stat-trend" style="color: #EA580C;">● Akun orang tua terhubung</div>
        </div>
    </div>
</div>

<!-- Visual Analytics & Line Charts Section -->
<div class="admin-dashboard-grid">
    <!-- Chart 1: Grafik Garis Tren Capaian Evaluasi Perkembangan Anak (Line Chart) -->
    <div class="card">
        <div class="card-header" style="background: #F8FAFC; border-bottom: 1px solid var(--border);">
            <div class="card-header-left">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: #16A34A;"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                <span>Tren Capaian Evaluasi 7 Aspek (Per Minggu)</span>
            </div>
            <span class="badge badge-purple" style="font-weight: 700;">Grafik Garis Interaktif</span>
        </div>
        <div class="card-body">
            <!-- Canvas tempat Chart.js dirender -->
            <div class="chart-container-box">
                <canvas id="capaianLineChart"></canvas>
            </div>

            <!-- Legend Grid Mini -->
            <div class="legend-mini-grid">
                <div style="background: #F0FDF4; padding: 8px 12px; border-radius: 8px; border: 1px solid #DCFCE7; display: flex; justify-content: space-between; align-items: center;">
                    <span style="color: #16A34A; font-weight: 700;">● BSB (Berkembang Sangat Baik)</span>
                    <strong style="color: #15803D; font-size: 0.95rem;">{{ $capaianStats['BSB'] }}</strong>
                </div>
                <div style="background: #F5F3FF; padding: 8px 12px; border-radius: 8px; border: 1px solid #DDD6FE; display: flex; justify-content: space-between; align-items: center;">
                    <span style="color: #7C3AED; font-weight: 700;">● BSH (Berkembang Sesuai Harapan)</span>
                    <strong style="color: #6D28D9; font-size: 0.95rem;">{{ $capaianStats['BSH'] }}</strong>
                </div>
                <div style="background: #FFFBEB; padding: 8px 12px; border-radius: 8px; border: 1px solid #FDE68A; display: flex; justify-content: space-between; align-items: center;">
                    <span style="color: #D97706; font-weight: 700;">● MB (Mulai Berkembang)</span>
                    <strong style="color: #B45309; font-size: 0.95rem;">{{ $capaianStats['MB'] }}</strong>
                </div>
                <div style="background: #FEF2F2; padding: 8px 12px; border-radius: 8px; border: 1px solid #FECACA; display: flex; justify-content: space-between; align-items: center;">
                    <span style="color: #DC2626; font-weight: 700;">● BB (Belum Berkembang)</span>
                    <strong style="color: #B91C1C; font-size: 0.95rem;">{{ $capaianStats['BB'] }}</strong>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart 2: Persebaran Siswa Per Kelompok Kelas & Status Laporan -->
    <div style="display: flex; flex-direction: column; gap: 24px;">
        <div class="card" style="flex: 1;">
            <div class="card-header" style="background: #F8FAFC; border-bottom: 1px solid var(--border);">
                <div class="card-header-left">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: #2563EB;"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
                    <span>Persebaran Siswa Per Kelas</span>
                </div>
            </div>
            <div class="card-body" style="display: flex; flex-direction: column; gap: 12px;">
                @foreach($kelases as $k)
                    @php
                        $maxSiswa = max($stats['total_siswa'], 1);
                        $pctKelas = round(($k->siswas_count / $maxSiswa) * 100);
                    @endphp
                    <div>
                        <div style="display: flex; justify-content: space-between; font-size: 0.8rem; font-weight: 700; margin-bottom: 4px;">
                            <span style="color: var(--secondary);">{{ $k->nama_kelas }} ({{ $k->guru->name ?? 'Belum ada guru' }})</span>
                            <span style="color: #2563EB;">{{ $k->siswas_count }} Siswa</span>
                        </div>
                        <div style="height: 8px; width: 100%; background: #F1F5F9; border-radius: 4px; overflow: hidden;">
                            <div style="height: 100%; width: {{ $pctKelas }}%; background: linear-gradient(90deg, #3B82F6, #60A5FA); border-radius: 4px;"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="card" style="background: #FAF5FF; border: 1px solid #E9D5FF;">
            <div class="card-body" style="padding: 16px 20px; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <strong style="font-size: 0.85rem; color: #6D28D9; display: block; margin-bottom: 2px;">Rekapitulasi Laporan Bulanan Ortu</strong>
                    <span style="font-size: 0.75rem; color: #64748B;">{{ $laporanStats['published'] }} Terbit | {{ $laporanStats['draft'] }} Draft</span>
                </div>
                <a href="{{ route('admin.laporan.index') }}" class="btn btn-sm" style="background: #7C3AED; color: #FFF; font-weight: 700; text-decoration: none;">
                    Kelola Laporan
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Bottom Section: Live Activity Stream & Quick Access Modules -->
<div class="admin-dashboard-grid">
    <!-- Live Activity Stream (Catatan Evaluasi Guru Terkini) -->
    <div class="card">
        <div class="card-header" style="background: #FCFDFD; border-bottom: 1px solid var(--border);">
            <div class="card-header-left">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: #F59E0B;"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                <span>Aktivitas Evaluasi Mingguan Terbaru</span>
            </div>
            <a href="{{ route('admin.siswa.index') }}" style="font-size: 0.78rem; font-weight: 700; color: #16A34A; text-decoration: none;">Lihat Semua Siswa &rarr;</a>
        </div>
        <div class="card-body" style="padding: 0;">
            @if($recentCatatans->count() > 0)
                <div style="display: flex; flex-direction: column;">
                    @foreach($recentCatatans as $rc)
                        <div style="padding: 14px 20px; border-bottom: 1px solid #F1F5F9; display: flex; align-items: center; justify-content: space-between; gap: 12px; transition: background 0.15s ease;">
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 38px; height: 38px; border-radius: 10px; background: #DCFCE7; color: #16A34A; font-weight: 800; display: flex; align-items: center; justify-content: center; font-size: 0.9rem; flex-shrink: 0;">
                                    {{ strtoupper(substr($rc->siswa->nama ?? 'S', 0, 1)) }}
                                </div>
                                <div>
                                    <strong style="font-size: 0.88rem; color: var(--secondary); display: block;">{{ $rc->siswa->nama ?? 'Siswa' }}</strong>
                                    <span style="font-size: 0.75rem; color: var(--muted);">
                                        Minggu {{ $rc->minggu_ke }} • Bulan {{ $rc->bulan }}/{{ $rc->tahun }} (Kelas {{ $rc->siswa->kelas->nama_kelas ?? '-' }})
                                    </span>
                                </div>
                            </div>
                            <span class="badge badge-purple" style="font-size: 0.72rem; padding: 4px 10px; white-space: nowrap;">
                                Updated {{ $rc->updated_at->diffForHumans() }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <div style="padding: 32px; text-align: center; color: var(--muted); font-size: 0.85rem;">
                    Belum ada catatan evaluasi mingguan terbaru dari guru.
                </div>
            @endif
        </div>
    </div>

    <!-- Modul Akses Cepat Modern -->
    <div class="card">
        <div class="card-header" style="background: #FCFDFD; border-bottom: 1px solid var(--border);">
            <div class="card-header-left">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: #7C3AED;"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                <span>Akses Pintar Modul Admin</span>
            </div>
        </div>
        <div class="card-body" style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; padding: 20px;">
            <a href="{{ route('admin.siswa.index') }}" style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 16px 12px; background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 12px; text-decoration: none; transition: all 0.2s ease; text-align: center;">
                <svg viewBox="0 0 24 24" fill="none" stroke="#16A34A" stroke-width="2" style="width: 24px; height: 24px; margin-bottom: 6px;"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                <strong style="font-size: 0.82rem; color: var(--secondary);">Data Siswa</strong>
                <span style="font-size: 0.7rem; color: var(--muted);">Kelola biodata</span>
            </a>

            <a href="{{ route('admin.kelas.index') }}" style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 16px 12px; background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 12px; text-decoration: none; transition: all 0.2s ease; text-align: center;">
                <svg viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="2" style="width: 24px; height: 24px; margin-bottom: 6px;"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                <strong style="font-size: 0.82rem; color: var(--secondary);">Kelola Kelas</strong>
                <span style="font-size: 0.7rem; color: var(--muted);">Atur wali kelas</span>
            </a>

            <a href="{{ route('admin.profil.edit') }}" style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 16px 12px; background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 12px; text-decoration: none; transition: all 0.2s ease; text-align: center;">
                <svg viewBox="0 0 24 24" fill="none" stroke="#7C3AED" stroke-width="2" style="width: 24px; height: 24px; margin-bottom: 6px;"><rect x="2" y="7" width="20" height="15" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                <strong style="font-size: 0.82rem; color: var(--secondary);">Profil Sekolah</strong>
                <span style="font-size: 0.7rem; color: var(--muted);">CMS Sambutan</span>
            </a>

            <a href="{{ route('admin.galeri.index') }}" style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 16px 12px; background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 12px; text-decoration: none; transition: all 0.2s ease; text-align: center;">
                <svg viewBox="0 0 24 24" fill="none" stroke="#EA580C" stroke-width="2" style="width: 24px; height: 24px; margin-bottom: 6px;"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                <strong style="font-size: 0.82rem; color: var(--secondary);">Galeri Kegiatan</strong>
                <span style="font-size: 0.7rem; color: var(--muted);">Upload foto</span>
            </a>
        </div>
    </div>
</div>

<!-- Load Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('capaianLineChart').getContext('2d');
        const weeklyData = @json($weeklyLineData);

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: weeklyData.labels,
                datasets: [
                    {
                        label: 'BSB (Sangat Baik)',
                        data: weeklyData.BSB,
                        borderColor: '#16A34A',
                        backgroundColor: 'rgba(22, 163, 74, 0.08)',
                        fill: true,
                        tension: 0.38,
                        borderWidth: 3,
                        pointRadius: 4,
                        pointHoverRadius: 6
                    },
                    {
                        label: 'BSH (Sesuai Harapan)',
                        data: weeklyData.BSH,
                        borderColor: '#8B5CF6',
                        backgroundColor: 'rgba(139, 92, 246, 0.08)',
                        fill: true,
                        tension: 0.38,
                        borderWidth: 3,
                        pointRadius: 4,
                        pointHoverRadius: 6
                    },
                    {
                        label: 'MB (Mulai Berkembang)',
                        data: weeklyData.MB,
                        borderColor: '#F59E0B',
                        backgroundColor: 'rgba(245, 158, 11, 0.08)',
                        fill: true,
                        tension: 0.38,
                        borderWidth: 3,
                        pointRadius: 4,
                        pointHoverRadius: 6
                    },
                    {
                        label: 'BB (Belum Berkembang)',
                        data: weeklyData.BB,
                        borderColor: '#EF4444',
                        backgroundColor: 'rgba(239, 68, 68, 0.08)',
                        fill: true,
                        tension: 0.38,
                        borderWidth: 3,
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: { family: 'Plus Jakarta Sans', size: 11, weight: '600' },
                            usePointStyle: true,
                            boxWidth: 8
                        }
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        padding: 10,
                        cornerRadius: 8,
                        titleFont: { family: 'Plus Jakarta Sans', size: 12, weight: '700' },
                        bodyFont: { family: 'Plus Jakarta Sans', size: 11 }
                    }
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { font: { family: 'Plus Jakarta Sans', size: 11, weight: '600' }, color: '#64748B' }
                    },
                    y: {
                        beginAtZero: true,
                        grid: { color: '#F1F5F9' },
                        ticks: { font: { family: 'Plus Jakarta Sans', size: 11 }, color: '#64748B', precision: 0 }
                    }
                }
            }
        });
    });
</script>
@endsection
