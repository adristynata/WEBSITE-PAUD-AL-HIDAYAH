@extends('layouts.dashboard')
@section('title', 'Tambah Indikator — Admin')
@section('page-title', 'Tambah Indikator Penilaian')
@section('sidebar-menu')
    @include('admin.partials.sidebar-menu')
@endsection
@section('content')
<div class="card" style="max-width:600px">
    <div class="card-header" style="display:flex;align-items:center;gap:8px;justify-content:space-between">
        <span style="display:flex;align-items:center;gap:8px">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>Tambah Indikator Baru
        </span>
        <a href="{{ route('admin.indikator.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.indikator.store') }}">
            @csrf
            <div class="form-group">
                <label for="aspek">Aspek Perkembangan <span style="color:red">*</span></label>
                <select id="aspek" name="aspek" class="form-control @error('aspek') is-invalid @enderror" required>
                    <option value="">-- Pilih Aspek --</option>
                    @foreach($aspekLabels as $key => $label)
                        <option value="{{ $key }}" {{ old('aspek') === $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('aspek')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label>Nilai <span style="color:red">*</span></label>
                <div style="display:flex;gap:10px;flex-wrap:wrap;">
                    @foreach($nilaiLabels as $key => $label)
                    <label style="display:inline-flex;align-items:center;gap:6px;cursor:pointer;font-weight:normal;font-size:0.875rem;background:#F8FAFC;padding:8px 14px;border-radius:8px;border:1px solid var(--border);">
                        <input type="radio" name="nilai" value="{{ $key }}" {{ old('nilai') === $key ? 'checked' : '' }} required style="accent-color:var(--primary);">
                        <span style="font-weight:700;color:var(--secondary)">{{ $key }}</span>
                        <span style="color:var(--muted);font-size:0.8rem">({{ $label }})</span>
                    </label>
                    @endforeach
                </div>
                @error('nilai')<div class="invalid-feedback" style="display:block">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="teks">Teks Indikator <span style="color:red">*</span></label>
                <textarea id="teks" name="teks" class="form-control @error('teks') is-invalid @enderror" rows="3" maxlength="500" placeholder="Contoh: Mampu berdoa sendiri dan bersikap sopan kepada teman dan guru." required>{{ old('teks') }}</textarea>
                @error('teks')<div class="invalid-feedback">{{ $message }}</div>@enderror
                <small style="color:var(--muted);font-size:0.78rem">Maksimal 500 karakter. Teks ini yang akan muncul sebagai pilihan di form catatan guru.</small>
            </div>
            <div class="form-group">
                <label for="urutan">Urutan Tampil</label>
                <input type="number" id="urutan" name="urutan" class="form-control" value="{{ old('urutan', 0) }}" min="0" max="99" style="width:100px">
                <small style="color:var(--muted);font-size:0.78rem">Angka kecil tampil lebih dulu. Default: 0</small>
            </div>
            <div style="margin-top:16px;padding-top:16px;border-top:1px solid var(--border);display:flex;gap:10px">
                <button type="submit" class="btn btn-primary">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg> Simpan Indikator
                </button>
                <a href="{{ route('admin.indikator.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection