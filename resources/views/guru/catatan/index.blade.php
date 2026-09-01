@extends('layouts.dashboard')
@section('title', 'Pilih Kelas — PAUD Al-Hidayah')
@section('page-title', 'Pilih Kelas')

@section('sidebar-menu')
    @include('guru.partials.sidebar-menu')
@endsection

@section('content')
<div class="card" style="margin-bottom:20px">
    <div class="card-body">
        <h2 style="font-size:1.2rem;font-weight:800;margin-bottom:4px;display:flex;align-items:center;gap:8px;">
            <span>Pilih Kelas</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:20px;height:20px;color:var(--primary);"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        </h2>
        <p style="color:#64748B;font-size:0.9rem">Silakan pilih kelas yang ingin Anda kelola catatan perkembangan siswanya.</p>
    </div>
</div>

<div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(280px, 1fr));gap:16px;">
    @forelse($kelas as $k)
    <div class="card" style="transition:transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='none'">
        <div class="card-header" style="background:#FFF8F2;border-bottom:1px solid var(--border);">
            <strong style="color:var(--secondary);font-size:1.1rem;display:inline-flex;align-items:center;gap:6px;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                <span>{{ $k->nama_kelas }}</span>
            </strong>
        </div>
        <div class="card-body">
            <p style="font-size:0.88rem;color:var(--muted);margin-bottom:16px;">Tahun Ajaran: <strong>{{ $k->tahun_ajaran }}</strong></p>
            <a href="{{ route('guru.catatan.siswa', $k->id) }}" class="btn btn-primary" style="display:inline-flex;align-items:center;justify-content:center;gap:6px;width:100%;font-weight:700;text-decoration:none;">
                <span>Lihat Daftar Siswa &rarr;</span>
            </a>
        </div>
    </div>
    @empty
    <div class="card" style="grid-column:1/-1;">
        <div class="card-body" style="text-align:center;padding:48px">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="width:48px;height:48px;color:#94A3B8;margin-bottom:12px;"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            <h3 style="color:#64748B">Belum ada kelas yang ditugaskan</h3>
            <p style="color:#94A3B8;font-size:0.9rem">Hubungi admin jika Anda merasa ini adalah kesalahan.</p>
        </div>
    </div>
    @endforelse
</div>
@endsection
