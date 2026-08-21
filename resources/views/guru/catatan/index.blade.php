@extends('layouts.dashboard')
@section('title', 'Pilih Kelas — PAUD Al-Hidayah')
@section('page-title', 'Pilih Kelas')

@section('sidebar-menu')
    @include('guru.partials.sidebar-menu')
@endsection

@section('content')
<div class="card" style="margin-bottom:20px">
    <div class="card-body">
        <h2 style="font-size:1.2rem;font-weight:800;margin-bottom:4px">
            Pilih Kelas 🏫
        </h2>
        <p style="color:#64748B;font-size:0.9rem">Silakan pilih kelas yang ingin Anda kelola catatan perkembangan siswanya.</p>
    </div>
</div>

<div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(280px, 1fr));gap:16px;">
    @forelse($kelas as $k)
    <div class="card" style="transition:transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='none'">
        <div class="card-header" style="background:#FFF8F2;border-bottom:1px solid var(--border);">
            <strong style="color:var(--secondary);font-size:1.1rem;">🏫 {{ $k->nama_kelas }}</strong>
        </div>
        <div class="card-body">
            <p style="font-size:0.88rem;color:var(--muted);margin-bottom:16px;">Tahun Ajaran: <strong>{{ $k->tahun_ajaran }}</strong></p>
            <a href="{{ route('guru.catatan.siswa', $k->id) }}" class="btn btn-primary" style="display:block;text-align:center;font-weight:700;text-decoration:none;">
                Lihat Daftar Siswa ➔
            </a>
        </div>
    </div>
    @empty
    <div class="card" style="grid-column:1/-1;">
        <div class="card-body" style="text-align:center;padding:48px">
            <div style="font-size:3rem;margin-bottom:12px">🏫</div>
            <h3 style="color:#64748B">Belum ada kelas yang ditugaskan</h3>
            <p style="color:#94A3B8;font-size:0.9rem">Hubungi admin jika Anda merasa ini adalah kesalahan.</p>
        </div>
    </div>
    @endforelse
</div>
@endsection
