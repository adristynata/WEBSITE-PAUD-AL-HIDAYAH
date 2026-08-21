@extends('layouts.dashboard')
@section('title', 'Kelola Profil Sekolah — Admin')
@section('page-title', 'Kelola Profil Sekolah')

@section('sidebar-menu')
    @include('admin.partials.sidebar-menu')
@endsection

@section('content')
<div class="card" style="max-width:800px;">
    <div class="card-header">
        <span>🏫 Edit Profil & Sambutan Kepala Sekolah</span>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.profil.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="sambutan_judul">Judul Sambutan <span style="color:red">*</span></label>
                <input type="text" id="sambutan_judul" name="sambutan_judul" 
                       class="form-control @error('sambutan_judul') is-invalid @enderror" 
                       value="{{ old('sambutan_judul', $profil->sambutan_judul) }}" required>
                @error('sambutan_judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label for="sambutan_nama">Nama Kepala Sekolah <span style="color:red">*</span></label>
                    <input type="text" id="sambutan_nama" name="sambutan_nama" 
                           class="form-control @error('sambutan_nama') is-invalid @enderror" 
                           value="{{ old('sambutan_nama', $profil->sambutan_nama) }}" required>
                    @error('sambutan_nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="sambutan_jabatan">Jabatan <span style="color:red">*</span></label>
                    <input type="text" id="sambutan_jabatan" name="sambutan_jabatan" 
                           class="form-control @error('sambutan_jabatan') is-invalid @enderror" 
                           value="{{ old('sambutan_jabatan', $profil->sambutan_jabatan) }}" required>
                    @error('sambutan_jabatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="form-group">
                <label for="sambutan_teks">Teks Lengkap Sambutan <span style="color:red">*</span></label>
                <textarea id="sambutan_teks" name="sambutan_teks" 
                          class="form-control @error('sambutan_teks') is-invalid @enderror" 
                          style="height:200px; line-height:1.6;" required>{{ old('sambutan_teks', $profil->sambutan_teks) }}</textarea>
                @error('sambutan_teks')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="sambutan_foto">Foto Kepala Sekolah</label>
                @if($profil->sambutan_foto)
                    <div style="margin-bottom:12px;">
                        <img src="{{ asset('images/' . $profil->sambutan_foto) }}" 
                             alt="Foto Kepala Sekolah" 
                             style="width:120px; height:120px; border-radius:16px; object-fit:cover; border:3px solid #E2E8F0; box-shadow:0 4px 10px rgba(0,0,0,0.05);">
                        <small style="display:block; color:#94A3B8; margin-top:4px;">Foto Kepala Sekolah saat ini</small>
                    </div>
                @endif
                <input type="file" id="sambutan_foto" name="sambutan_foto" class="form-control" accept="image/jpg,image/jpeg,image/png,image/webp">
                <small style="color:#94A3B8; font-size:0.78rem;">Kosongkan jika tidak ingin mengubah foto Kepala Sekolah (Maksimal 2 MB)</small>
                @error('sambutan_foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div style="margin-top:24px; padding-top:16px; border-top:1px solid #E2E8F0;">
                <button type="submit" class="btn btn-primary" style="font-weight:700;">💾 Perbarui Profil & Sambutan</button>
            </div>
        </form>
    </div>
</div>
@endsection
