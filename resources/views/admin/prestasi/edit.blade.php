@extends('layouts.dashboard')
@section('title', 'Edit Data Prestasi — Admin')
@section('page-title', 'Edit Data Prestasi')

@section('sidebar-menu')
    @include('admin.partials.sidebar-menu')
@endsection

@section('content')
<div class="card">
    <div class="card-header" style="display:flex; justify-content:space-between; align-items:center;">
        <div style="display:flex;align-items:center;gap:8px">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;color:#F59E0B"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>
            <span style="font-weight:700;">Edit Data Prestasi &amp; Kejuaraan</span>
        </div>
        <a href="{{ route('admin.prestasi.index') }}" class="btn btn-secondary btn-sm">&larr; Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.prestasi.update', $prestasi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div style="display:grid; grid-template-columns: 2fr 1fr; gap:24px;">
                <div>
                    <div style="margin-bottom:16px;">
                        <label class="form-label" style="font-weight:700; display:block; margin-bottom:6px;">Judul Lomba / Kejuaraan <span style="color:red">*</span></label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $prestasi->judul) }}" required>
                        @error('judul')
                            <div class="invalid-feedback" style="color:red; font-size:12px; margin-top:4px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div style="display:grid; grid-template-columns: 1fr 1fr; gap:16px; margin-bottom:16px;">
                        <div>
                            <label class="form-label" style="font-weight:700; display:block; margin-bottom:6px;">Kategori <span style="color:red">*</span></label>
                            <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" required>
                                <option value="seni" {{ old('kategori', $prestasi->kategori) == 'seni' ? 'selected' : '' }}>Seni &amp; Kreativitas</option>
                                <option value="agama" {{ old('kategori', $prestasi->kategori) == 'agama' ? 'selected' : '' }}>Tahfidz &amp; Agama</option>
                                <option value="olahraga" {{ old('kategori', $prestasi->kategori) == 'olahraga' ? 'selected' : '' }}>Olahraga &amp; Motorik</option>
                                <option value="sekolah" {{ old('kategori', $prestasi->kategori) == 'sekolah' ? 'selected' : '' }}>Penghargaan Sekolah</option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback" style="color:red; font-size:12px; margin-top:4px;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label class="form-label" style="font-weight:700; display:block; margin-bottom:6px;">Peringkat / Juara <span style="color:red">*</span></label>
                            <input type="text" name="peringkat" class="form-control @error('peringkat') is-invalid @enderror" value="{{ old('peringkat', $prestasi->peringkat) }}" required>
                            @error('peringkat')
                                <div class="invalid-feedback" style="color:red; font-size:12px; margin-top:4px;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div style="display:grid; grid-template-columns: 1fr 1fr; gap:16px; margin-bottom:16px;">
                        <div>
                            <label class="form-label" style="font-weight:700; display:block; margin-bottom:6px;">Nama Pemenang / Tim <span style="color:red">*</span></label>
                            <input type="text" name="pemenang" class="form-control @error('pemenang') is-invalid @enderror" value="{{ old('pemenang', $prestasi->pemenang) }}" required>
                            @error('pemenang')
                                <div class="invalid-feedback" style="color:red; font-size:12px; margin-top:4px;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label class="form-label" style="font-weight:700; display:block; margin-bottom:6px;">Tahun Perolehan <span style="color:red">*</span></label>
                            <input type="text" name="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun', $prestasi->tahun) }}" required>
                            @error('tahun')
                                <div class="invalid-feedback" style="color:red; font-size:12px; margin-top:4px;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom:16px;">
                        <label class="form-label" style="font-weight:700; display:block; margin-bottom:6px;">Deskripsi / Cerita Singkat Prestasi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4">{{ old('deskripsi', $prestasi->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback" style="color:red; font-size:12px; margin-top:4px;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div style="background:#F8FAFC; border:1px dashed #CBD5E1; padding:20px; border-radius:12px; text-align:center;">
                    <label class="form-label" style="font-weight:700; display:block; margin-bottom:8px;">Foto Dokumen / Piala</label>
                    <div id="previewBox" style="width:100%; height:160px; background:#FFF; border:1px solid #E2E8F0; border-radius:8px; display:flex; align-items:center; justify-content:center; color:#94A3B8; margin-bottom:12px;">
                        @if($prestasi->foto)
                            <img src="{{ asset($prestasi->foto) }}" style="width:100%;height:160px;object-fit:cover;border-radius:8px;">
                        @else
                            Belum Ada Foto
                        @endif
                    </div>
                    <input type="file" name="foto" class="form-control" accept="image/*" onchange="previewImage(this)">
                    <small style="color:#64748B; font-size:11px; display:block; margin-top:6px;">Biarkan kosong jika tidak merubah foto.</small>
                </div>
            </div>

            <div style="margin-top:24px; padding-top:16px; border-top:1px solid #E2E8F0; display:flex; justify-content:flex-end; gap:10px;">
                <a href="{{ route('admin.prestasi.index') }}" class="btn btn-secondary btn-sm">Batal</a>
                <button type="submit" class="btn btn-primary btn-sm" style="font-weight:700;">Update Prestasi</button>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage(input) {
        const previewBox = document.getElementById('previewBox');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewBox.innerHTML = `<img src="${e.target.result}" style="width:100%;height:160px;object-fit:cover;border-radius:8px;">`;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
