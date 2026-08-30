@extends('layouts.dashboard')
@section('title', 'Daftar Siswa — PAUD Al-Hidayah')
@section('page-title', 'Kelola Catatan: ' . $kelas->nama_kelas . ' (' . $kelas->tahun_ajaran . ')')

@section('sidebar-menu')
    @include('guru.partials.sidebar-menu')
@endsection

@section('content')
<div style="margin-bottom:20px;">
    <a href="{{ route('guru.catatan.index') }}" class="btn btn-secondary" style="font-weight:700;text-decoration:none;display:inline-flex;align-items:center;gap:6px;">
        <span>⬅</span> Kembali ke Pilih Kelas
    </a>
</div>

<div class="card" style="margin-bottom:20px">
    <div class="card-body">
        <h2 style="font-size:1.2rem;font-weight:800;margin-bottom:4px">
            Siswa Kelas {{ $kelas->nama_kelas }} ({{ $kelas->tahun_ajaran }}) 👧👦
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
                    <th style="width:240px;text-align:center;">Aksi</th>
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
                        <a href="{{ route('guru.catatan.list', $s->id) }}" class="btn btn-primary btn-sm" style="text-decoration:none;font-weight:700;">
                            Kelola Catatan Perkembangan ➔
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
