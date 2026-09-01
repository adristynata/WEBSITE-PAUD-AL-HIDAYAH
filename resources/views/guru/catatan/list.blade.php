@extends('layouts.dashboard')
@section('title', 'Riwayat Catatan — PAUD Al-Hidayah')
@section('page-title', 'Histori Catatan: ' . $siswa->nama)

@section('sidebar-menu')
    @include('guru.partials.sidebar-menu')
@endsection

@section('content')
<div style="margin-bottom:20px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px;">
    <a href="{{ route('guru.catatan.siswa', $siswa->kelas_id) }}" class="btn btn-secondary" style="font-weight:700;text-decoration:none;display:inline-flex;align-items:center;gap:6px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
        <span>Kembali ke Daftar Siswa</span>
    </a>
    <a href="{{ route('guru.catatan.create', $siswa->id) }}" class="btn btn-primary" style="font-weight:700;text-decoration:none;display:inline-flex;align-items:center;gap:6px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2.5" style="width:15px;height:15px;color:#FFFFFF;flex-shrink:0;"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        <span>Tambah Catatan Mingguan Baru</span>
    </a>
</div>

<!-- Student Profile Info Card -->
<div class="card" style="margin-bottom:20px;">
    <div class="card-body" style="display:flex; align-items:center; gap:16px; padding:16px 20px;">
        @if($siswa->foto)
            <img src="{{ asset('storage/'.$siswa->foto) }}" alt="{{ $siswa->nama }}" style="width:52px;height:52px;border-radius:10px;object-fit:cover;border:2px solid var(--primary);">
        @else
            <div style="width:52px;height:52px;border-radius:10px;background:linear-gradient(135deg, var(--primary), var(--secondary));color:#fff;font-weight:800;font-size:1.3rem;display:flex;align-items:center;justify-content:center;">
                {{ strtoupper(substr($siswa->nama, 0, 1)) }}
            </div>
        @endif
        <div>
            <h2 style="font-size:1.1rem;font-weight:800;color:var(--secondary);margin-bottom:4px;">{{ $siswa->nama }}</h2>
            <div style="display:flex; gap:8px; flex-wrap:wrap; font-size:0.75rem;">
                <span class="badge badge-purple">NIS: {{ $siswa->nis }}</span>
                <span class="badge badge-orange">Kelas: {{ $siswa->kelas->nama_kelas }} ({{ $siswa->kelas->tahun_ajaran }})</span>
                <span class="badge badge-blue">Wali Kelas: {{ $siswa->kelas->guru->name }}</span>
            </div>
        </div>
    </div>
</div>

@php
    $months = [
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
        5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
    ];
@endphp

@forelse($monthPeriods as $period)
    @php
        $y = (int)$period->tahun;
        $m = (int)$period->bulan;
        $monthName = $months[$m] ?? $m;
        
        $recordsThisMonth = $allCatatans->filter(function($c) use ($y, $m) {
            return (int)$c->tahun === $y && (int)$c->bulan === $m;
        });
        $countFilled = $recordsThisMonth->count();
    @endphp

    <!-- Card Per Bulan Ringkas -->
    <div class="card" style="margin-bottom:20px; border-top:3px solid var(--primary);">
        <div class="card-header" style="background:#F8FAFC; border-bottom:1px solid var(--border); padding:12px 20px; display:flex; justify-content:space-between; align-items:center;">
            <div style="display:flex; align-items:center; gap:10px;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;color:var(--primary);"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                <strong style="font-size:1rem; font-weight:800; color:var(--secondary);">
                    Periode Evaluasi: {{ $monthName }} {{ $y }}
                </strong>
            </div>
            <span class="badge badge-purple" style="font-weight:700; padding:4px 12px; font-size:0.78rem;">
                Terisi {{ $countFilled }} dari 4 Minggu
            </span>
        </div>

        <div class="table-wrap">
            <table style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr style="background:#F1F5F9; font-size:0.75rem; text-transform:uppercase; color:#475569; letter-spacing:0.5px;">
                        <th style="width:100px; text-align:center; padding:10px 12px;">Minggu</th>
                        <th style="padding:10px 12px;">Hasil Penilaian 7 Aspek Perkembangan</th>
                        <th style="width:140px; text-align:center; padding:10px 12px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @for($w = 1; $w <= 4; $w++)
                        @php
                            $c = $recordsThisMonth->firstWhere('minggu_ke', $w);
                        @endphp
                        <tr style="border-bottom:1px solid #E2E8F0;">
                            <td style="text-align:center; vertical-align:middle; padding:10px 12px; background:#FAFBFD;">
                                <strong style="font-weight:800; font-size:0.88rem; color:var(--secondary);">Minggu {{ $w }}</strong>
                            </td>
                            <td style="padding:8px 12px; vertical-align:middle;">
                                @if($c)
                                    <div style="display:flex; flex-wrap:wrap; gap:6px; font-size:0.78rem;">
                                        <span style="background:#F1F5F9; border:1px solid #E2E8F0; padding:3px 8px; border-radius:5px;">
                                            Agama: <strong style="color:#7C3AED;">{{ $c->nilai_agama_moral ?? '-' }}</strong>
                                        </span>
                                        <span style="background:#F1F5F9; border:1px solid #E2E8F0; padding:3px 8px; border-radius:5px;">
                                            Mot. Kasar: <strong style="color:#EF4444;">{{ $c->motorik_kasar ?? '-' }}</strong>
                                        </span>
                                        <span style="background:#F1F5F9; border:1px solid #E2E8F0; padding:3px 8px; border-radius:5px;">
                                            Mot. Halus: <strong style="color:#F59E0B;">{{ $c->motorik_halus ?? '-' }}</strong>
                                        </span>
                                        <span style="background:#F1F5F9; border:1px solid #E2E8F0; padding:3px 8px; border-radius:5px;">
                                            Kognitif: <strong style="color:#10B981;">{{ $c->kognitif ?? '-' }}</strong>
                                        </span>
                                        <span style="background:#F1F5F9; border:1px solid #E2E8F0; padding:3px 8px; border-radius:5px;">
                                            Bahasa: <strong style="color:#3B82F6;">{{ $c->bahasa ?? '-' }}</strong>
                                        </span>
                                        <span style="background:#F1F5F9; border:1px solid #E2E8F0; padding:3px 8px; border-radius:5px;">
                                            Sosem: <strong style="color:#EC4899;">{{ $c->sosial_emosional ?? '-' }}</strong>
                                        </span>
                                        <span style="background:#F1F5F9; border:1px solid #E2E8F0; padding:3px 8px; border-radius:5px;">
                                            Seni: <strong style="color:#8B5CF6;">{{ $c->seni ?? '-' }}</strong>
                                        </span>
                                    </div>
                                @else
                                    <span style="color:#94A3B8; font-size:0.8rem; font-style:italic;">
                                        Catatan evaluasi Minggu {{ $w }} {{ $monthName }} belum diisi.
                                    </span>
                                @endif
                            </td>
                            <td style="text-align:center; vertical-align:middle; padding:8px 12px;">
                                @if($c)
                                    <a href="{{ route('guru.catatan.edit', $c->id) }}" class="btn btn-secondary btn-sm" style="text-decoration:none; font-weight:700; padding:5px 12px; font-size:0.78rem; display:inline-flex; align-items:center; gap:5px; white-space:nowrap;">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px;"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>
                                        <span>Edit Catatan</span>
                                    </a>
                                @else
                                    <a href="{{ route('guru.catatan.create', ['siswa_id' => $siswa->id, 'minggu_ke' => $w, 'bulan' => $m, 'tahun' => $y]) }}" class="btn btn-primary btn-sm" style="text-decoration:none; font-weight:700; padding:5px 12px; font-size:0.78rem; display:inline-flex; align-items:center; gap:5px; white-space:nowrap;">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2.5" style="width:13px;height:13px;color:#FFFFFF;flex-shrink:0;"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                        <span>Isi Minggu {{ $w }}</span>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
@empty
    <div class="card">
        <div class="card-body" style="text-align:center; padding:36px; color:var(--muted);">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="width:40px;height:40px;color:#94A3B8;margin-bottom:8px;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
            <h3 style="color:var(--secondary); font-size:1rem; font-weight:700; margin-bottom:4px;">Belum ada catatan evaluasi mingguan</h3>
            <p style="font-size:0.83rem; color:var(--muted); margin-bottom:12px;">Mulai menginput catatan mingguan murid dengan mengklik tombol di bawah ini.</p>
            <a href="{{ route('guru.catatan.create', $siswa->id) }}" class="btn btn-primary btn-sm" style="font-weight:700; text-decoration:none; display:inline-flex; align-items:center; gap:6px;">
                <svg viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2.5" style="width:14px;height:14px;color:#FFFFFF;flex-shrink:0;"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                <span>Tambah Catatan Mingguan Pertama</span>
            </a>
        </div>
    </div>
@endforelse

<!-- Pagination Bulan -->
<div style="margin-top:16px; display:flex; justify-content:center;">
    {{ $monthPeriods->links() }}
</div>

@endsection
