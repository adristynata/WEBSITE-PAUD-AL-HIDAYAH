@extends('layouts.dashboard')
@section('title', 'Edit Siswa — Admin')
@section('page-title', 'Edit Data Siswa')

@section('sidebar-menu')
    @include('admin.partials.sidebar-menu')
@endsection

@section('content')
<div class="card" style="max-width:700px">
    <div class="card-header">
        <div style="display:flex;align-items:center;gap:8px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg> Edit: {{ $siswa->nama }}</div>
        <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.siswa.update', $siswa) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="form-grid-2">
                <div class="form-group">
                    <label for="nis">NIS <span style="color:red">*</span></label>
                    <input type="text" id="nis" name="nis"
                           class="form-control {{ $errors->has('nis') ? 'is-invalid' : '' }}"
                           value="{{ old('nis', $siswa->nis) }}" required>
                    @error('nis')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap <span style="color:red">*</span></label>
                    <input type="text" id="nama" name="nama"
                           class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}"
                           value="{{ old('nama', $siswa->nama) }}" required>
                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir <span style="color:red">*</span></label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                           class="form-control {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}"
                           value="{{ old('tanggal_lahir', $siswa->tanggal_lahir->format('Y-m-d')) }}" required>
                    @error('tanggal_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="kelas_id">Kelas</label>
                    <select id="kelas_id" name="kelas_id" class="form-control">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach($kelasList as $k)
                            <option value="{{ $k->id }}" {{ old('kelas_id', $siswa->kelas_id) == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kelas }} ({{ $k->tahun_ajaran }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kontak_ortu">No. HP Orang Tua</label>
                    <input type="text" id="kontak_ortu" name="kontak_ortu"
                           class="form-control"
                           value="{{ old('kontak_ortu', $siswa->kontak_ortu) }}" placeholder="08xxxxxxxxxx">
                </div>
                <div class="form-group">
                    <label for="foto">Foto Siswa</label>
                    <input type="hidden" name="hapus_foto" id="hapus_foto" value="0">
                    @if($siswa->foto)
                        <div style="margin-bottom:8px;">
                            <div id="foto-preview-container" style="position:relative; display:inline-block; vertical-align:top;">
                                <img src="{{ asset('storage/'.$siswa->foto) }}"
                                     style="width:64px;height:64px;border-radius:12px;object-fit:cover;border:2px solid #E2E8F0; display:block;">
                                <span onclick="removeStudentPhoto()"
                                      style="position:absolute; top:-8px; right:-8px; background:#EF4444; color:#fff; width:20px; height:20px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:10px; cursor:pointer; border:2px solid #fff; font-weight:bold; box-shadow:0 2px 4px rgba(0,0,0,0.2);"
                                      title="Hapus Foto">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="width:12px;height:12px;display:inline-block;"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                                </span>
                            </div>
                            <small style="display:block;color:#94A3B8;margin-top:4px;">Klik tombol hapus untuk menghapus foto</small>
                        </div>
                    @endif
                    <input type="file" id="foto" name="foto" class="form-control" accept="image/jpg,image/jpeg,image/png">
                    <small style="color:#94A3B8;font-size:0.78rem">Kosongkan jika tidak ingin mengubah foto</small>
                    @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div style="margin-top:8px;padding-top:16px;border-top:1px solid #E2E8F0;display:flex;gap:10px">
                <button type="submit" class="btn btn-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg> Perbarui Data</button>
                <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<script>
function removeStudentPhoto() {
    var container = document.getElementById('foto-preview-container');
    if (container) {
        container.style.display = 'none';
    }
    document.getElementById('hapus_foto').value = '1';
}
</script>
@endsection
