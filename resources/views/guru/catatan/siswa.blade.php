@extends('layouts.dashboard')
@section('title', 'Daftar Siswa — PAUD Al-Hidayah')
@section('page-title', 'Kelola Catatan: ' . $kelas->nama_kelas . ' (' . $kelas->tahun_ajaran . ')')

@section('sidebar-menu')
    @include('guru.partials.sidebar-menu')
@endsection

@section('content')
<div style="margin-bottom:20px;">
    <a href="{{ route('guru.catatan.index') }}" class="btn btn-secondary" style="font-weight:700;text-decoration:none;display:inline-flex;align-items:center;gap:6px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
        <span>Kembali ke Pilih Kelas</span>
    </a>
</div>

<div class="card" style="margin-bottom:20px">
    <div class="card-body">
        <h2 style="font-size:1.2rem;font-weight:800;margin-bottom:4px;display:flex;align-items:center;gap:8px;">
            <span>Siswa Kelas {{ $kelas->nama_kelas }} ({{ $kelas->tahun_ajaran }})</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:20px;height:20px;color:var(--primary);"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        </h2>
        <p style="color:#64748B;font-size:0.9rem">Pilih siswa di bawah ini untuk melihat riwayat penilaian atau menginput evaluasi mingguan baru.</p>
    </div>
</div>

<div class="card">
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th style="width:60px;text-align:center;">Foto</th>
                    <th>NIS</th>
                    <th>Nama Lengkap</th>
                    <th style="text-align:center;">Status</th>
                    <th style="width:260px;text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($siswas as $s)
                <tr>
                    <td style="text-align:center; vertical-align:middle;">
                        @if($s->foto)
                            <img src="{{ asset('storage/'.$s->foto) }}" alt="{{ $s->nama }}" style="width:40px;height:40px;border-radius:50%;object-fit:cover;border:2px solid var(--primary);">
                        @else
                            <div style="width:40px;height:40px;border-radius:50%;background:linear-gradient(135deg, var(--primary), var(--secondary));color:#fff;font-weight:800;font-size:1rem;display:flex;align-items:center;justify-content:center;margin:0 auto;">
                                {{ strtoupper(substr($s->nama, 0, 1)) }}
                            </div>
                        @endif
                    </td>
                    <td style="vertical-align:middle;"><code style="color:#7C3AED;font-weight:700;">{{ $s->nis }}</code></td>
                    <td style="vertical-align:middle;"><strong>{{ $s->nama }}</strong></td>
                    <td style="text-align:center; vertical-align:middle;">
                        <span class="badge badge-green">Aktif</span>
                    </td>
                    <td style="text-align:center; vertical-align:middle;">
                        <a href="{{ route('guru.catatan.list', $s->id) }}" class="btn btn-primary btn-sm" style="text-decoration:none;font-weight:700;display:inline-flex;align-items:center;gap:6px;padding:8px 14px;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2.5" style="width:14px;height:14px;color:#FFFFFF;flex-shrink:0;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                            <span>Kelola Catatan Perkembangan &rarr;</span>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center;padding:32px;color:var(--muted);">Belum ada siswa aktif terdaftar di kelas ini.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
