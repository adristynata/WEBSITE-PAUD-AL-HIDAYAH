@extends('layouts.dashboard')
@section('title', 'Dashboard Orang Tua — PAUD Al-Hidayah')
@section('page-title', 'Dashboard Orang Tua')

@section('sidebar-menu')
    <div class="nav-section">Menu Utama</div>
    <a href="{{ route('ortu.dashboard') }}" class="nav-link active">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        <span>Dashboard</span>
    </a>
@endsection

@push('styles')
<style>
    .ortu-welcome { background: linear-gradient(135deg, #0d2b1a, #1a4a2a); border-radius: 16px; padding: 26px 30px; margin-bottom: 24px; position: relative; overflow: hidden; }
    .ortu-welcome::before { content: ''; position: absolute; top: -40px; right: -40px; width: 180px; height: 180px; border-radius: 50%; background: rgba(74,222,128,0.07); }
    .ortu-welcome-inner { position: relative; z-index: 1; }
    .ortu-welcome h2 { font-size: 1.3rem; font-weight: 800; color: #fff; margin-bottom: 4px; }
    .ortu-welcome p { font-size: 0.875rem; color: rgba(255,255,255,0.6); }
    .child-photo { width: 68px; height: 68px; border-radius: 16px; object-fit: cover; border: 3px solid #dcfce7; }
    .child-avatar-init { width: 68px; height: 68px; border-radius: 16px; background: linear-gradient(135deg, #f97316, #8b5cf6); display: flex; align-items: center; justify-content: center; font-size: 1.8rem; font-weight: 800; color: #fff; }
    .child-name { font-size: 1.2rem; font-weight: 800; color: var(--text); margin-bottom: 8px; }
    .child-chips { display: flex; gap: 6px; flex-wrap: wrap; margin-bottom: 6px; }
    .child-meta { font-size: 0.78rem; color: var(--muted); display: flex; align-items: center; gap: 6px; }
    .child-meta svg { width: 13px; height: 13px; flex-shrink: 0; }
    .laporan-section { padding: 20px 22px; }
    .laporan-section-title { display: flex; align-items: center; gap: 8px; font-weight: 700; font-size: 0.9rem; color: var(--text); margin-bottom: 16px; }
    .laporan-section-title svg { width: 17px; height: 17px; color: var(--green-600); }
    .laporan-item { display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 14px 16px; background: #f9fafb; border: 1px solid var(--border); border-radius: 11px; margin-bottom: 10px; flex-wrap: wrap; }
    .laporan-period-icon { width: 40px; height: 40px; border-radius: 10px; background: #dcfce7; color: #16a34a; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .laporan-period-icon svg { width: 18px; height: 18px; }
    .laporan-period { font-weight: 700; font-size: 0.9rem; color: var(--text); }
    .laporan-published { font-size: 0.73rem; color: var(--muted); margin-top: 2px; }
    .laporan-item-actions { display: flex; gap: 8px; }
    .empty-laporan { text-align: center; padding: 32px 16px; background: #f9fafb; border: 1.5px dashed var(--border); border-radius: 12px; }
    .empty-laporan p { font-size: 0.85rem; color: var(--muted); margin-top: 8px; }
    .empty-state-full { text-align: center; padding: 72px 24px; }
    .es-icon { width: 72px; height: 72px; border-radius: 20px; background: #f3f4f6; display: inline-flex; align-items: center; justify-content: center; color: var(--muted); margin-bottom: 18px; }
    .es-icon svg { width: 32px; height: 32px; }
</style>
@endpush

@section('content')
<div class="ortu-welcome">
    <div class="ortu-welcome-inner">
        <h2>Selamat datang, {{ auth()->user()->name }}!</h2>
        <p>Pantau perkembangan dan laporan bulanan putra/putri Anda di sini.</p>
    </div>
</div>

@php
$months = [1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',5=>'Mei',6=>'Juni',7=>'Juli',8=>'Agustus',9=>'September',10=>'Oktober',11=>'November',12=>'Desember'];
@endphp

@forelse($siswas as $s)
<div class="card" style="margin-bottom:24px">
    <div style="display:flex;align-items:center;gap:18px;padding:22px;border-bottom:1px solid var(--border)">
        @if($s->foto)
            <img src="{{ asset('storage/'.$s->foto) }}" class="child-photo" alt="{{ $s->nama }}">
        @else
            <div class="child-avatar-init">{{ strtoupper(substr($s->nama, 0, 1)) }}</div>
        @endif
        <div style="flex:1;min-width:0">
            <div class="child-name">{{ $s->nama }}</div>
            <div class="child-chips">
                <span class="badge badge-purple">NIS: {{ $s->nis }}</span>
                @if($s->kelas)
                    <span class="badge badge-blue">{{ $s->kelas->nama_kelas }} ({{ $s->kelas->tahun_ajaran }})</span>
                    <span class="badge badge-gray">Wali: {{ $s->kelas->guru->name }}</span>
                @endif
                <span class="badge {{ $s->is_aktif ? 'badge-green' : 'badge-red' }}">{{ $s->is_aktif ? 'Aktif' : 'Nonaktif' }}</span>
            </div>
            <div class="child-meta">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                <span>{{ $s->tanggal_lahir->translatedFormat('d F Y') }}</span>
            </div>
        </div>
    </div>
    <div class="laporan-section">
        <div class="laporan-section-title">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="12" y1="18" x2="12" y2="12"/></svg>
            <span>Laporan Perkembangan Bulanan</span>
        </div>
        @forelse($s->laporanBulanans as $laporan)
            <div class="laporan-item">
                <div style="display:flex;align-items:center;gap:12px">
                    <div class="laporan-period-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                    </div>
                    <div>
                        <div class="laporan-period">{{ $months[$laporan->bulan] ?? $laporan->bulan }} {{ $laporan->tahun }}</div>
                        <div class="laporan-published">Diterbitkan {{ $laporan->updated_at->format('d M Y, H:i') }} WIB</div>
                    </div>
                </div>
                <div class="laporan-item-actions">
                    <a href="{{ route('ortu.laporan.show', $laporan->id) }}" class="btn btn-secondary btn-sm">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        Lihat
                    </a>
                    <a href="{{ route('ortu.laporan.download', $laporan->id) }}" class="btn btn-primary btn-sm">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                        PDF
                    </a>
                </div>
            </div>
        @empty
            <div class="empty-laporan">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:28px;height:28px;color:var(--muted)"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="9.5" y1="12.5" x2="14.5" y2="17.5"/><line x1="14.5" y1="12.5" x2="9.5" y2="17.5"/></svg>
                <p>Belum ada laporan bulanan yang diterbitkan untuk {{ $s->nama }}.</p>
            </div>
        @endforelse
    </div>
</div>
@empty
<div class="card">
    <div class="card-body">
        <div class="empty-state-full">
            <div class="es-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:32px;height:32px"><path d="M9 12h.01"/><path d="M15 12h.01"/><path d="M10 16c.5.3 1.2.5 2 .5s1.5-.2 2-.5"/></svg>
            </div>
            <h3 style="font-weight:700;font-size:1.05rem;margin-bottom:8px">Belum ada data anak</h3>
            <p style="font-size:0.875rem;color:var(--muted)">Akun Anda belum ditautkan dengan data anak. Silakan hubungi pihak sekolah untuk verifikasi.</p>
        </div>
    </div>
</div>
@endforelse
@endsection
