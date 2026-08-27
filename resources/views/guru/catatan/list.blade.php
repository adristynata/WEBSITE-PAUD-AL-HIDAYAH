@extends('layouts.dashboard')
@section('title', 'Riwayat Catatan — PAUD Al-Hidayah')
@section('page-title', 'Histori Catatan: ' . $siswa->nama)

@section('sidebar-menu')
    @include('guru.partials.sidebar-menu')
@endsection

@section('content')
<div style="margin-bottom:20px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px;">
    <a href="{{ route('guru.catatan.siswa', $siswa->kelas_id) }}" class="btn btn-secondary" style="font-weight:700;text-decoration:none;display:inline-flex;align-items:center;gap:6px;">
        <span>⬅</span> Kembali ke Daftar Siswa
    </a>
    <a href="{{ route('guru.catatan.create', $siswa->id) }}" class="btn btn-primary" style="font-weight:700;text-decoration:none;display:inline-flex;align-items:center;gap:6px;">
        <span>➕</span> Tambah Catatan Mingguan Baru
    </a>
</div>

<!-- Student Profile Info Card -->
<div class="card" style="margin-bottom:24px;">
    <div class="card-body" style="display:flex; align-items:center; gap:20px; flex-wrap:wrap;">
        @if($siswa->foto)
            <img src="{{ asset('storage/'.$siswa->foto) }}" alt="{{ $siswa->nama }}" style="width:64px;height:64px;border-radius:12px;object-fit:cover;border:2px solid var(--primary);">
        @else
            <div style="width:64px;height:64px;border-radius:12px;background:linear-gradient(135deg, var(--primary), var(--secondary));color:#fff;font-weight:800;font-size:1.5rem;display:flex;align-items:center;justify-content:center;">
                {{ strtoupper(substr($siswa->nama, 0, 1)) }}
            </div>
        @endif
        <div>
            <h2 style="font-size:1.15rem;font-weight:800;color:var(--secondary);margin-bottom:4px;">{{ $siswa->nama }}</h2>
            <div style="display:flex; gap:8px; flex-wrap:wrap; font-size:0.75rem;">
                <span class="badge badge-purple">NIS: {{ $siswa->nis }}</span>
                <span class="badge badge-orange">Kelas: {{ $siswa->kelas->nama_kelas }}</span>
                <span class="badge badge-blue">Wali Kelas: {{ $siswa->kelas->guru->name }}</span>
            </div>
        </div>
    </div>
</div>

<!-- Weekly Records History Table -->
<div class="card">
    <div class="card-header" style="background:#FFF8F2;border-bottom:1px solid var(--border);">
        <strong>📋 Riwayat Evaluasi Mingguan</strong>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th style="width:120px;text-align:center;">Periode</th>
                    <th>Ringkasan Hasil Penilaian (6 Aspek)</th>
                    <th style="width:120px;text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $months = [
                        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                        5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                    ];
                @endphp
                @forelse($catatans as $c)
                <tr>
                    <td style="text-align:center; vertical-align:middle;">
                        <div style="font-weight:800;color:var(--secondary);">Minggu {{ $c->minggu_ke }}</div>
                        <div style="font-size:0.8rem;color:var(--muted);margin-top:2px;">{{ $months[$c->bulan] ?? $c->bulan }} {{ $c->tahun }}</div>
                    </td>
                    <td style="vertical-align:middle;">
                        <div style="display:flex; gap:6px; flex-wrap:wrap; margin-bottom:8px;">
                            <span class="badge badge-purple" style="font-size:0.7rem;padding:2px 8px;">NAM: <strong>{{ $c->nilai_agama_moral }}</strong></span>
                            <span class="badge badge-purple" style="font-size:0.7rem;padding:2px 8px;">FMK: <strong>{{ $c->motorik_kasar }}</strong></span>
                            <span class="badge badge-purple" style="font-size:0.7rem;padding:2px 8px;">FMH: <strong>{{ $c->motorik_halus }}</strong></span>
                            <span class="badge badge-purple" style="font-size:0.7rem;padding:2px 8px;">KOG: <strong>{{ $c->kognitif }}</strong></span>
                            <span class="badge badge-purple" style="font-size:0.7rem;padding:2px 8px;">BHS: <strong>{{ $c->bahasa }}</strong></span>
                            <span class="badge badge-purple" style="font-size:0.7rem;padding:2px 8px;">SOSEM: <strong>{{ $c->sosial_emosional }}</strong></span>
                            @if($c->seni)
                            <span class="badge badge-purple" style="font-size:0.7rem;padding:2px 8px;">SNI: <strong>{{ $c->seni }}</strong></span>
                            @endif
                        </div>
                        <div style="font-size:0.82rem;color:var(--muted);line-height:1.4;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;text-overflow:ellipsis;">
                            📝 <em>{{ $c->catatan_kognitif }}</em>
                        </div>
                    </td>
                    <td style="text-align:center; vertical-align:middle;">
                        <a href="{{ route('guru.catatan.edit', $c->id) }}" class="btn btn-secondary btn-sm" style="text-decoration:none;font-weight:700;display:inline-block;">
                            ✏ Edit Catatan
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" style="text-align:center;padding:48px;color:var(--muted);">
                        <div style="font-size:2.5rem;margin-bottom:8px;">📋</div>
                        <strong>Belum ada catatan evaluasi mingguan.</strong><br>
                        <span style="font-size:0.85rem;">Mulai dengan mengklik tombol "Tambah Catatan Mingguan Baru" di atas.</span>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $catatans->links() }}
</div>
@endsection
