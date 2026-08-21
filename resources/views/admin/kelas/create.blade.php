@extends('layouts.dashboard')
@section('title', 'Tambah Kelas — Admin')
@section('page-title', 'Tambah Kelas Baru')

@section('sidebar-menu')
    @include('admin.partials.sidebar-menu')
@endsection

@section('content')
<div class="card" style="max-width:600px">
    <div class="card-header">
        <div style="display:flex;align-items:center;gap:8px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg> Form Tambah Kelas</div>
        <a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.kelas.store') }}">
            @csrf
            <div class="form-group">
                <label for="nama_kelas">Nama Kelas <span style="color:red">*</span></label>
                <input type="text" id="nama_kelas" name="nama_kelas"
                       class="form-control {{ $errors->has('nama_kelas') ? 'is-invalid' : '' }}"
                       value="{{ old('nama_kelas') }}" placeholder="Contoh: Kelompok A" required>
                @error('nama_kelas')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="tahun_ajaran">Tahun Ajaran <span style="color:red">*</span></label>
                <input type="text" id="tahun_ajaran" name="tahun_ajaran"
                       class="form-control {{ $errors->has('tahun_ajaran') ? 'is-invalid' : '' }}"
                       value="{{ old('tahun_ajaran', '2025/2026') }}" placeholder="2025/2026" required>
                @error('tahun_ajaran')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="guru_id">Guru Pengampu</label>
                <select id="guru_id" name="guru_id" class="form-control">
                    <option value="">-- Pilih Guru --</option>
                    @foreach($gurus as $guru)
                        <option value="{{ $guru->id }}" {{ old('guru_id') == $guru->id ? 'selected' : '' }}>
                            {{ $guru->name }}
                        </option>
                    @endforeach
                </select>
                @error('guru_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg> Simpan Kelas</button>
        </form>
    </div>
</div>
@endsection
