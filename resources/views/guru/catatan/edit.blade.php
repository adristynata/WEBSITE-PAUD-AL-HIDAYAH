@extends('layouts.dashboard')
@section('title', 'Edit Catatan Perkembangan — PAUD Al-Hidayah')
@section('page-title', 'Edit Catatan Perkembangan')

@section('sidebar-menu')
    @include('guru.partials.sidebar-menu')
@endsection

@section('content')
<div style="margin-bottom:20px;">
    <a href="{{ route('guru.catatan.list', $siswa->id) }}" class="btn btn-secondary" style="font-weight:700;text-decoration:none;display:inline-flex;align-items:center;gap:6px;">
        <span>⬅</span> Batal &amp; Kembali
    </a>
</div>

<!-- Student Profile Info Card -->
<div class="card" style="margin-bottom:24px;">
    <div class="card-body" style="display:flex; align-items:center; gap:20px; flex-wrap:wrap; padding:16px;">
        @if($siswa->foto)
            <img src="{{ asset('storage/'.$siswa->foto) }}" alt="{{ $siswa->nama }}" style="width:52px;height:52px;border-radius:10px;object-fit:cover;border:2px solid var(--primary);">
        @else
            <div style="width:52px;height:52px;border-radius:10px;background:linear-gradient(135deg, var(--primary), var(--secondary));color:#fff;font-weight:800;font-size:1.3rem;display:flex;align-items:center;justify-content:center;">
                {{ strtoupper(substr($siswa->nama, 0, 1)) }}
            </div>
        @endif
        <div>
            <h2 style="font-size:1.1rem;font-weight:800;color:var(--secondary);margin-bottom:2px;">{{ $siswa->nama }}</h2>
            <p style="font-size:0.75rem;color:var(--muted);">NIS: {{ $siswa->nis }} | Kelas: {{ $siswa->kelas->nama_kelas }}</p>
        </div>
    </div>
</div>

<form action="{{ route('guru.catatan.update', $catatan->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Period Info Card (Read-only since period shouldn't change to prevent duplicates) -->
    <div class="card" style="margin-bottom:24px;">
        <div class="card-header" style="background:#FFF8F2;border-bottom:1px solid var(--border);">
            <strong>📅 Periode Penilaian</strong>
        </div>
        <div class="card-body">
            @php
                $months = [
                    1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                    5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                    9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                ];
            @endphp
            <div style="display:flex; gap:32px; flex-wrap:wrap;">
                <div>
                    <span style="color:var(--muted); font-size:0.8rem; display:block;">Minggu Ke:</span>
                    <strong style="font-size:1.1rem; color:var(--secondary);">Minggu {{ $catatan->minggu_ke }}</strong>
                </div>
                <div>
                    <span style="color:var(--muted); font-size:0.8rem; display:block;">Bulan:</span>
                    <strong style="font-size:1.1rem; color:var(--secondary);">{{ $months[$catatan->bulan] ?? $catatan->bulan }}</strong>
                </div>
                <div>
                    <span style="color:var(--muted); font-size:0.8rem; display:block;">Tahun:</span>
                    <strong style="font-size:1.1rem; color:var(--secondary);">{{ $catatan->tahun }}</strong>
                </div>
            </div>
        </div>
    </div>

    {{-- Aspek-Aspek Perkembangan --}}
    <div style="display:flex; flex-direction:column; gap:24px; margin-bottom:24px;">
        @php
            $aspeks = [
                'nilai_agama_moral' => ['Agama & Moral', 'catatan_agama_moral', 'agama_moral', 'Ketaatan ibadah, doa, sopan santun, akhlak kepada sesama.'],
                'motorik_kasar'     => ['Motorik Kasar', 'catatan_motorik_kasar', 'motorik_kasar', 'Kemampuan fisik kasar: melompat, berlari, melempar, keseimbangan.'],
                'motorik_halus'     => ['Motorik Halus', 'catatan_motorik_halus', 'motorik_halus', 'Keterampilan tangan: menulis, menggambar, menggunting, meronce.'],
                'kognitif'          => ['Kognitif', 'catatan_kognitif', 'kognitif', 'Pemecahan masalah, mengenal bentuk, angka, logika sederhana.'],
                'bahasa'            => ['Bahasa', 'catatan_bahasa', 'bahasa', 'Kosakata, berbicara, mendengarkan cerita, memahami instruksi.'],
                'sosial_emosional'  => ['Sosial Emosional', 'catatan_sosial_emosional', 'sosial_emosional', 'Kemandirian, berbagi, empati, mengendalikan emosi, kerja sama.'],
                'seni'              => ['Seni', 'catatan_seni', 'seni', 'Kemampuan mengekspresikan diri melalui seni: mewarnai, menggambar, bernyanyi, karya kreasi.'],
            ];
        @endphp

        @foreach($aspeks as $field => $info)
        <div class="card" style="border-left:5px solid var(--primary);">
            <div class="card-header" style="background:#FCFDFD; border-bottom:1px solid var(--border);">
                <strong style="color:var(--secondary); font-size:1.05rem;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;display:inline-block;vertical-align:middle;margin-right:4px;"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    Aspek {{ $info[0] }}
                </strong>
                <p style="font-size:0.78rem; color:var(--muted); font-weight:normal; margin-top:2px;">{{ $info[3] }}</p>
            </div>
            <div class="card-body">
                {{-- Radio scale --}}
                <div class="form-group">
                    <label style="margin-bottom:10px; display:block;">Hasil Penilaian Aspek:</label>
                    <div style="display:flex; gap:16px; flex-wrap:wrap;">
                        @foreach(['BB' => 'Belum Berkembang', 'MB' => 'Mulai Berkembang', 'BSH' => 'Berkembang Sesuai Harapan', 'BSB' => 'Berkembang Sangat Baik'] as $code => $desc)
                            <label style="display:inline-flex; align-items:center; gap:6px; cursor:pointer; font-weight:normal; font-size:0.875rem; background:#F8FAFC; padding:8px 14px; border-radius:8px; border:1px solid var(--border);">
                                <input type="radio"
                                    name="{{ $field }}"
                                    value="{{ $code }}"
                                    {{ old($field, $catatan->$field) === $code ? 'checked' : '' }}
                                    required
                                    style="accent-color:var(--primary);"
                                    onchange="showIndikator('{{ $info[2] }}', '{{ $code }}', '{{ $info[1] }}')">
                                <span style="font-weight:700; color:var(--secondary);">{{ $code }}</span>
                                <span style="color:var(--muted); font-size:0.8rem;">({{ $desc }})</span>
                            </label>
                        @endforeach
                    </div>
                    @error($field)
                        <div class="invalid-feedback" style="display:block;">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Dropdown Indikator --}}
                <div id="indikator-box-{{ $info[2] }}" style="display:none; margin-top:12px;">
                    <label style="font-size:0.82rem; color:var(--muted); margin-bottom:6px; display:block;">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px;display:inline-block;vertical-align:middle;margin-right:3px;"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
                        Pilih saran indikator (opsional — klik untuk mengisi otomatis):
                    </label>
                    <select id="sel-{{ $info[2] }}"
                            onchange="applyIndikator('{{ $info[2] }}', '{{ $info[1] }}')"
                            class="form-control"
                            style="background:#F0FDF4; border-color:#86EFAC;">
                        <option value="">-- Pilih saran indikator --</option>
                    </select>
                </div>

                {{-- Catatan Anekdot --}}
                <div class="form-group" style="margin-top:16px;">
                    <label for="{{ $info[1] }}">Catatan Anekdot:</label>
                    <textarea name="{{ $info[1] }}" id="{{ $info[1] }}"
                        class="form-control @error($info[1]) is-invalid @enderror"
                        rows="3"
                        placeholder="Tuliskan kejadian/momen menarik yang diamati pada anak minggu ini..."
                        required>{{ old($info[1], $catatan->{$info[1]}) }}</textarea>
                    @error($info[1])
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small style="color:var(--muted);font-size:0.75rem;">Catatan anekdot dapat berisi kejadian tidak terduga, momen unik, atau perilaku khas anak yang perlu didokumentasikan.</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Submit Area --}}
    <div class="card" style="margin-bottom:32px;">
        <div class="card-body" style="display:flex; justify-content:flex-end; gap:12px;">
            <a href="{{ route('guru.catatan.list', $siswa->id) }}" class="btn btn-secondary" style="font-weight:700;text-decoration:none;">Batal</a>
            <button type="submit" class="btn btn-primary" style="font-weight:700;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                Simpan Perubahan Catatan
            </button>
        </div>
    </div>
</form>

@push('scripts')
<script>
const indikatorData = @json($indikators ?? []);

function showIndikator(aspek, nilai, catatanId) {
    const box = document.getElementById('indikator-box-' + aspek);
    const sel = document.getElementById('sel-' + aspek);
    if (!box || !sel) return;
    sel.innerHTML = '<option value="">-- Pilih saran indikator --</option>';
    const items = indikatorData[aspek]?.[nilai] ?? [];
    if (items.length > 0) {
        items.forEach(function(item) {
            const opt = document.createElement('option');
            opt.value = item.teks;
            opt.textContent = item.teks;
            sel.appendChild(opt);
        });
        box.style.display = 'block';
    } else {
        box.style.display = 'none';
    }
}

function applyIndikator(aspek, catatanId) {
    const sel = document.getElementById('sel-' + aspek);
    const textarea = document.getElementById(catatanId);
    if (sel && textarea && sel.value) {
        textarea.value = sel.value;
        textarea.focus();
    }
}
</script>
@endpush
@endsection
