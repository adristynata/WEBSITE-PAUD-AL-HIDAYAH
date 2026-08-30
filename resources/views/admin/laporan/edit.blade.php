@extends('layouts.dashboard')
@section('title', 'Edit Rekap Laporan Bulanan — Admin')
@section('page-title', 'Edit Rekap Laporan Bulanan')

@section('sidebar-menu')
    @include('admin.partials.sidebar-menu')
@endsection

@section('content')
<div style="margin-bottom:20px;">
    <a href="{{ route('admin.laporan.index', ['kelas_id' => $siswa->kelas_id, 'bulan' => $bulan, 'tahun' => $tahun]) }}" class="btn btn-secondary" style="text-decoration:none;">
        ⬅ Kembali ke Daftar
    </a>
</div>

<!-- Student Identity Card -->
<div class="card" style="margin-bottom:24px;">
    <div class="card-body" style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:16px;">
        <div>
            <h2 style="font-size:1.2rem; font-weight:800; color:var(--secondary); margin-bottom:4px;">{{ $siswa->nama }}</h2>
            <span style="font-size:0.8rem; color:var(--muted); font-weight:600;">NIS: <code>{{ $siswa->nis }}</code> | Kelas: {{ $siswa->kelas->nama_kelas }} ({{ $siswa->kelas->tahun_ajaran }})</span>
        </div>
        @php
            $months = [
                1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
            ];
        @endphp
        <div>
            <span class="badge badge-purple" style="font-size:0.85rem; padding:8px 16px;">
                Periode: {{ $months[$bulan] }} {{ $tahun }}
            </span>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.laporan.update', $laporan->id) }}">
    @csrf
    @method('PUT')

    @php
        $aspeks = [
            'agama_moral' => ['Agama & Moral', 'nilai_agama_moral', 'catatan_agama_moral', '#7C3AED', 'rekap_agama_moral'],
            'motorik_kasar' => ['Motorik Kasar', 'motorik_kasar', 'catatan_motorik_kasar', '#EF4444', 'rekap_motorik_kasar'],
            'motorik_halus' => ['Motorik Halus', 'motorik_halus', 'catatan_motorik_halus', '#F59E0B', 'rekap_motorik_halus'],
            'kognitif' => ['Kognitif', 'kognitif', 'catatan_kognitif', '#10B981', 'rekap_kognitif'],
            'bahasa' => ['Bahasa', 'bahasa', 'catatan_bahasa', '#3B82F6', 'rekap_bahasa'],
            'sosial_emosional' => ['Sosial Emosional', 'sosial_emosional', 'catatan_sosial_emosional', '#EC4899', 'rekap_sosial_emosional'],
            'seni' => ['Seni', 'seni', 'catatan_seni', '#8B5CF6', 'rekap_seni']
        ];

        $scaleBadges = [
            'BB' => 'badge-red',
            'MB' => 'badge-orange',
            'BSH' => 'badge-purple',
            'BSB' => 'badge-green'
        ];
    @endphp

    @foreach($aspeks as $key => $info)
        <div class="card" style="margin-bottom:24px; border-left:5px solid {{ $info[3] }};">
            <div class="card-header" style="background:#FCFDFD;">
                <strong style="color:var(--secondary); font-size:1.05rem;">🎯 Aspek {{ $info[0] }}</strong>
            </div>
            <div class="card-body" style="padding:20px;">
                <!-- Split Grid: Left is reference weeks from teacher, Right is Admin compile text area -->
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px;">
                    <!-- Left side: Teacher logs for weeks 1-4 -->
                    <div style="background:#F8FAFC; padding:16px; border-radius:12px; border:1px solid var(--border); overflow-y:auto; max-height:220px;">
                        <h4 style="font-size:0.82rem; font-weight:800; color:var(--muted); margin-bottom:12px; text-transform:uppercase;">📝 Catatan Guru (Mingguan)</h4>
                        
                        <div style="display:flex; flex-direction:column; gap:12px;">
                            @for($w = 1; $w <= 4; $w++)
                                @php
                                    $catMinggu = $catatans->where('minggu_ke', $w)->first();
                                    $skalaVal = $catMinggu ? $catMinggu->{$info[1]} : null;
                                    $catText = $catMinggu ? $catMinggu->{$info[2]} : null;
                                @endphp
                                <div style="padding-bottom:10px; border-bottom:1px solid #E2E8F0; font-size:0.8rem;">
                                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:4px;">
                                        <strong>Minggu {{ $w }}</strong>
                                        @if($skalaVal)
                                            <span class="badge {{ $scaleBadges[$skalaVal] ?? 'badge-secondary' }}">{{ $skalaVal }}</span>
                                        @else
                                            <span style="color:#94A3B8; font-size:0.75rem;">(Belum Diisi)</span>
                                        @endif
                                    </div>
                                    <div style="color:#475569; line-height:1.4;">
                                        {{ $catText ?? 'Tidak ada catatan untuk minggu ini.' }}
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <!-- Right side: Admin compile text area -->
                    <div class="form-group" style="margin:0;">
                        <label for="rekap_{{ $key }}" style="font-weight:700; color:var(--secondary); font-size:0.82rem; display:block; margin-bottom:8px; text-transform:uppercase;">📊 Rangkuman Bulanan Admin</label>
                        <textarea id="rekap_{{ $key }}" name="rekap_{{ $key }}" class="form-control" style="width:100%; height:220px; font-size:0.85rem; line-height:1.5; resize:none;" placeholder="Tuliskan rangkuman capaian aspek {{ $info[0] }} murid untuk bulan ini berdasarkan catatan guru..." required>{{ old('rekap_'.$key, $laporan->{$info[4]}) }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Bottom Actions Card -->
    <div class="card" style="margin-bottom:32px;">
        <div class="card-body" style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:16px;">
            <div style="display:flex; align-items:center; gap:12px;">
                <label for="status" style="font-weight:700; font-size:0.85rem; color:var(--secondary);">Status Publikasi:</label>
                <select id="status" name="status" class="form-control" style="min-width:140px; max-width:none;">
                    <option value="draft" {{ old('status', $laporan->status) === 'draft' ? 'selected' : '' }}>📁 Simpan Draft</option>
                    <option value="published" {{ old('status', $laporan->status) === 'published' ? 'selected' : '' }}>🚀 Terbitkan (Publish)</option>
                </select>
            </div>
            <div style="display:flex; gap:12px;">
                <button type="submit" class="btn btn-primary" style="font-weight:700;">💾 Perbarui Rekap Bulanan</button>
                <a href="{{ route('admin.laporan.index', ['kelas_id' => $siswa->kelas_id, 'bulan' => $bulan, 'tahun' => $tahun]) }}" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </div>
</form>
@endsection
