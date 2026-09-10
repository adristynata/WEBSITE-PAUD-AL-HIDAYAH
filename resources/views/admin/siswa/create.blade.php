@extends('layouts.dashboard')
@section('title', 'Tambah Siswa — Admin')
@section('page-title', 'Tambah Siswa Baru')

@section('sidebar-menu')
    @include('admin.partials.sidebar-menu')
@endsection

@section('content')
<div class="card" style="max-width:700px">
    <div class="card-header">
        <div style="display:flex;align-items:center;gap:8px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg> Form Tambah Siswa</div>
        <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.siswa.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-grid-2">
                <div class="form-group">
                    <label for="nis" class="form-label">NIS (Nomor Induk Siswa) <span style="color:red">*</span></label>
                    <input type="text" id="nis" name="nis"
                           class="form-control {{ $errors->has('nis') ? 'is-invalid' : '' }}"
                           value="{{ old('nis', $nisPreview) }}" placeholder="Nomor Induk Siswa" required>
                    <small style="color:#94A3B8;font-size:0.78rem">
                        Rekomendasi NIS otomatis: <strong>{{ $nisPreview }}</strong>
                    </small>
                    @error('nis')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="nama" class="form-label">Nama Lengkap <span style="color:red">*</span></label>
                    <input type="text" id="nama" name="nama"
                           class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}"
                           value="{{ old('nama') }}" placeholder="Nama lengkap siswa" required>
                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span style="color:red">*</span></label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                           class="form-control {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}"
                           value="{{ old('tanggal_lahir') }}" required>
                    @error('tanggal_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="kelas_id" class="form-label">Kelas</label>
                    <select id="kelas_id" name="kelas_id" class="form-control">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach($kelasList as $k)
                            <option value="{{ $k->id }}" {{ old('kelas_id') == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kelas }} ({{ $k->tahun_ajaran }})
                            </option>
                        @endforeach
                    </select>
                    @error('kelas_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="kontak_ortu" class="form-label">No. HP Orang Tua</label>
                    <input type="text" id="kontak_ortu" name="kontak_ortu"
                           class="form-control {{ $errors->has('kontak_ortu') ? 'is-invalid' : '' }}"
                           value="{{ old('kontak_ortu') }}" placeholder="08xxxxxxxxxx">
                    @error('kontak_ortu')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="foto" class="form-label">Foto Siswa</label>
                    <input type="file" id="foto" name="foto"
                           class="form-control {{ $errors->has('foto') ? 'is-invalid' : '' }}"
                           accept="image/jpg,image/jpeg,image/png">
                    <small style="color:#94A3B8;font-size:0.78rem">JPG/PNG, maks. 2MB</small>
                    @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div style="margin-top:8px;padding-top:16px;border-top:1px solid #E2E8F0;display:flex;gap:10px">
                <button type="submit" class="btn btn-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg> Simpan Data Siswa</button>
                <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
