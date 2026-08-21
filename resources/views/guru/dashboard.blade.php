@extends('layouts.dashboard')
@section('title', 'Dashboard Guru — PAUD Al-Hidayah')
@section('page-title', 'Dashboard Guru')

@section('sidebar-menu')
    @include('guru.partials.sidebar-menu')
@endsection

@push('styles')
<style>
    .guru-welcome {
        background: linear-gradient(135deg, #0d2b1a 0%, #1a4a2a 100%);
        border-radius: 16px;
        padding: 28px 32px;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        position: relative;
        overflow: hidden;
    }
    .guru-welcome::before {
        content: ''; position: absolute; top: -50px; right: -30px;
        width: 180px; height: 180px; border-radius: 50%;
        background: rgba(74,222,128,0.07);
    }
    .gwt { position: relative; z-index: 1; }
    .gwt h2 { font-size: 1.4rem; font-weight: 800; color: #fff; margin-bottom: 6px; }
    .gwt p { font-size: 0.875rem; color: rgba(255,255,255,0.6); margin-bottom: 16px; }
    .gws { display: flex; gap: 14px; position: relative; z-index: 1; flex-shrink: 0; }
    .gws-item { background: rgba(255,255,255,0.09); border: 1px solid rgba(255,255,255,0.12); border-radius: 12px; padding: 16px 20px; text-align: center; min-width: 80px; }
    .gws-val { font-size: 1.7rem; font-weight: 800; color: #fff; line-height: 1; }
    .gws-label { font-size: 0.68rem; color: rgba(255,255,255,0.55); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-top: 4px; }
    @media (max-width: 768px) { .guru-welcome { flex-direction: column; align-items: flex-start; } }
    .kelas-name { font-size: 1rem; font-weight: 700; color: var(--text); }
    .kelas-tahun { font-size: 0.78rem; color: var(--muted); margin-top: 1px; }
    .stu-avatar { width: 30px; height: 30px; border-radius: 50%; background: linear-gradient(135deg, #22c55e, #15803d); display: inline-flex; align-items: center; justify-content: center; font-size: 0.75rem; font-weight: 700; color: #fff; flex-shrink: 0; }
    .stu-photo { width: 30px; height: 30px; border-radius: 50%; object-fit: cover; }
    .stu-name-cell { display: flex; align-items: center; gap: 10px; }
    .stu-name-text { font-weight: 600; font-size: 0.875rem; }
    code.nis-code { font-family: 'Courier New', monospace; font-size: 0.8rem; color: #7c3aed; background: #ede9fe; padding: 2px 8px; border-radius: 5px; font-weight: 700; }
    .empty-state { text-align: center; padding: 64px 24px; }
    .empty-icon { width: 64px; height: 64px; border-radius: 16px; background: #f3f4f6; display: inline-flex; align-items: center; justify-content: center; color: var(--muted); margin-bottom: 16px; }
    .empty-icon svg { width: 28px; height: 28px; }
    .empty-title { font-weight: 700; font-size: 1rem; color: var(--text); margin-bottom: 6px; }
    .empty-desc { font-size: 0.875rem; color: var(--muted); }
</style>
@endpush

@section('content')
<div class="guru-welcome">
    <div class="gwt">
        <h2>Halo, {{ auth()->user()->name }}!</h2>
        <p>Berikut ringkasan kelas yang Anda ampu hari ini.</p>
        <a href="{{ route('guru.catatan.index') }}" class="btn btn-primary" style="font-size:0.85rem">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:15px;height:15px"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>
            Input Catatan Siswa
        </a>
    </div>
    <div class="gws">
        <div class="gws-item">
            <div class="gws-val">{{ $kelas->count() }}</div>
            <div class="gws-label">Kelas</div>
        </div>
        <div class="gws-item">
            <div class="gws-val">{{ $kelas->sum(fn($k) => $k->siswas->count()) }}</div>
            <div class="gws-label">Siswa</div>
        </div>
    </div>
</div>

@forelse($kelas as $k)
<div class="card" style="margin-bottom:20px">
    <div class="card-header">
        <div style="display:flex;align-items:center;gap:10px">
            <div style="width:36px;height:36px;border-radius:9px;background:#dcfce7;color:#16a34a;display:flex;align-items:center;justify-content:center">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            </div>
            <div>
                <div class="kelas-name">{{ $k->nama_kelas }}</div>
                <div class="kelas-tahun">Tahun Ajaran {{ $k->tahun_ajaran }}</div>
            </div>
        </div>
        <div style="display:flex;align-items:center;gap:10px">
            <span class="badge badge-blue">{{ $k->siswas->count() }} Siswa</span>
            <a href="{{ route('guru.catatan.index') }}" class="btn btn-primary btn-sm">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>
                Input Catatan
            </a>
        </div>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th style="width:48px">#</th>
                    <th>Siswa</th>
                    <th>NIS</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($k->siswas as $s)
                <tr>
                    <td style="color:var(--muted);font-size:0.8rem">{{ $loop->iteration }}</td>
                    <td>
                        <div class="stu-name-cell">
                            @if($s->foto)
                                <img src="{{ asset('storage/'.$s->foto) }}" class="stu-photo" alt="">
                            @else
                                <div class="stu-avatar">{{ strtoupper(substr($s->nama, 0, 1)) }}</div>
                            @endif
                            <span class="stu-name-text">{{ $s->nama }}</span>
                        </div>
                    </td>
                    <td><code class="nis-code">{{ $s->nis }}</code></td>
                    <td>
                        @if($s->is_aktif)
                            <span class="badge badge-green">Aktif</span>
                        @else
                            <span class="badge badge-red">Nonaktif</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="4"><div class="empty-state" style="padding:24px"><div class="empty-desc">Belum ada siswa di kelas ini.</div></div></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@empty
<div class="card">
    <div class="card-body">
        <div class="empty-state">
            <div class="empty-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:28px;height:28px"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
            </div>
            <div class="empty-title">Belum ada kelas yang ditugaskan</div>
            <div class="empty-desc">Hubungi admin untuk mendapatkan penugasan kelas Anda.</div>
        </div>
    </div>
</div>
@endforelse
@endsection
