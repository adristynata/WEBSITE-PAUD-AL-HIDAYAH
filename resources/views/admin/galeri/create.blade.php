@extends('layouts.dashboard')
@section('title', 'Unggah Foto Galeri — Admin')
@section('page-title', 'Unggah Foto Galeri')

@section('sidebar-menu')
    @include('admin.partials.sidebar-menu')
@endsection

@section('content')
<div class="card" style="max-width:650px;">
    <div class="card-header" style="display:flex; justify-content:space-between; align-items:center;">
        <span>📸 Unggah Foto Kegiatan Baru</span>
        <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.galeri.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="judul">Judul Kegiatan <span style="color:red">*</span></label>
                <input type="text" id="judul" name="judul" 
                       class="form-control @error('judul') is-invalid @enderror" 
                       placeholder="Contoh: Lomba Mewarnai HUT RI ke-81"
                       value="{{ old('judul') }}" required>
                @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="deskripsi">Keterangan / Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" 
                          class="form-control @error('deskripsi') is-invalid @enderror" 
                          style="height:120px; line-height:1.5;" 
                          placeholder="Ceritakan singkat tentang kemeriahan kegiatan ini...">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="foto">Foto Kegiatan <span style="color:red">*</span></label>
                <input type="file" id="foto" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/jpg,image/jpeg,image/png,image/webp" required>
                <small style="color:#94A3B8; font-size:0.78rem;">Format foto: JPG, JPEG, PNG, WEBP (Maksimal 3 MB)</small>
                @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div style="margin-top:24px; padding-top:16px; border-top:1px solid #E2E8F0; display:flex; gap:10px;">
                <button type="submit" class="btn btn-primary" style="font-weight:700;">💾 Unggah & Publikasikan</button>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
