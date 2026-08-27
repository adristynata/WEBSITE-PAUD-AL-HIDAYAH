@extends('layouts.dashboard')
@section('title', 'Rekap Laporan Bulanan — Admin')
@section('page-title', 'Rekap Laporan Bulanan')

@section('sidebar-menu')
    @include('admin.partials.sidebar-menu')
@endsection

@section('content')
<div class="card" style="margin-bottom:20px">
    <div class="card-header">
        <span>🔍 Filter Kelas & Periode</span>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('admin.laporan.index') }}" style="display:flex; gap:16px; align-items:flex-end; flex-wrap:wrap;">
            <div class="form-group" style="margin:0; min-width:180px;">
                <label for="kelas_id" style="display:block; margin-bottom:6px; font-size:0.8rem; font-weight:700;">Kelas</label>
                <select id="kelas_id" name="kelas_id" class="form-control" style="width:100%; max-width:none;" required>
                    <option value="">-- Pilih Kelas --</option>
                    @foreach($kelases as $k)
                        <option value="{{ $k->id }}" {{ $kelas_id == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kelas }} ({{ $k->tahun_ajaran }})
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group" style="margin:0; min-width:140px;">
                <label for="bulan" style="display:block; margin-bottom:6px; font-size:0.8rem; font-weight:700;">Bulan</label>
                <select id="bulan" name="bulan" class="form-control" style="width:100%; max-width:none;" required>
                    @php
                        $months = [
                            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                        ];
                    @endphp
                    @foreach($months as $num => $name)
                        <option value="{{ $num }}" {{ $bulan == $num ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" style="margin:0; min-width:120px;">
                <label for="tahun" style="display:block; margin-bottom:6px; font-size:0.8rem; font-weight:700;">Tahun</label>
                <select id="tahun" name="tahun" class="form-control" style="width:100%; max-width:none;" required>
                    @for($y = date('Y') - 1; $y <= date('Y') + 2; $y++)
                        <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>{{ $y }}</option>
                    @endfor
                </select>
            </div>

            <button type="submit" class="btn btn-primary" style="height:38px;">🔍 Tampilkan</button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <span>📋 Daftar Siswa & Status Laporan Bulanan</span>
    </div>
    <div class="card-body" style="padding:0">
        @if($siswas && $siswas->count() > 0)
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th style="width:80px">NIS</th>
                            <th>Nama Siswa</th>
                            <th style="width:150px; text-align:center;">Status Laporan</th>
                            <th style="width:180px; text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($siswas as $s)
                            @php
                                $laporan = $s->laporanBulanans->first();
                            @endphp
                            <tr>
                                <td><code>{{ $s->nis }}</code></td>
                                <td><strong>{{ $s->nama }}</strong></td>
                                <td style="text-align:center;">
                                    @if($laporan)
                                        @if($laporan->status === 'published')
                                            <span class="badge badge-green">Terbit (Published)</span>
                                        @else
                                            <span class="badge badge-orange">Draft</span>
                                        @endif
                                    @else
                                        <span class="badge badge-red" style="background:#F3F4F6; color:#9CA3AF; border:1px solid #E5E7EB;">Belum Dibuat</span>
                                    @endif
                                </td>
                                <td style="text-align:center;">
                                    @if($laporan)
                                        <a href="{{ route('admin.laporan.edit', $laporan->id) }}" class="btn btn-secondary btn-sm">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px;"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>
                                            Edit Rekap
                                        </a>
                                    @else
                                        <a href="{{ route('admin.laporan.create', ['siswa_id' => $s->id, 'bulan' => $bulan, 'tahun' => $tahun]) }}" class="btn btn-primary btn-sm">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px;"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                            Buat Rekap
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $siswas->links() }}
        @else
            <div style="padding:40px; text-align:center; color:var(--muted);">
                🏫 Silakan pilih kelas dan klik Tampilkan untuk memuat data siswa.
            </div>
        @endif
    </div>
</div>
@endsection
