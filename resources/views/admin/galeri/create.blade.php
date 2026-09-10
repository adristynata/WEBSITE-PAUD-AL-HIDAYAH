@extends('layouts.dashboard')
@section('title', 'Tambah Media Galeri — Admin')
@section('page-title', 'Tambah Media Galeri')

@section('sidebar-menu')
    @include('admin.partials.sidebar-menu')
@endsection

@section('content')
<div class="card" style="max-width:680px;">
    <div class="card-header" style="display:flex; justify-content:space-between; align-items:center;">
        <span style="display:inline-flex;align-items:center;gap:6px;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;color:#10B981;"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
            <span>Tambah Dokumentasi Foto / Video Kegiatan</span>
        </span>
        <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.galeri.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- PILIH TIPE MEDIA: FOTO ATAU VIDEO -->
            <div class="form-group" style="margin-bottom:20px;">
                <label style="font-weight:700; color:#1E293B; margin-bottom:8px; display:block;">Jenis Media Galeri <span style="color:red">*</span></label>
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                    <label id="tab-type-foto" style="display:flex; align-items:center; justify-content:center; gap:8px; padding:12px; border:2px solid #10B981; background:#F0FDF4; border-radius:12px; cursor:pointer; font-weight:700; color:#065F46;" onclick="switchKategori('foto')">
                        <input type="radio" name="kategori" value="foto" checked style="display:none;">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                        <span>Foto Kegiatan</span>
                    </label>
                    <label id="tab-type-video" style="display:flex; align-items:center; justify-content:center; gap:8px; padding:12px; border:1px solid #CBD5E1; background:#F8FAFC; border-radius:12px; cursor:pointer; font-weight:700; color:#475569;" onclick="switchKategori('video')">
                        <input type="radio" name="kategori" value="video" style="display:none;">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;color:#EF4444;"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
                        <span>Video Dokumentasi</span>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="judul">Judul Kegiatan / Video <span style="color:red">*</span></label>
                <input type="text" id="judul" name="judul" 
                       class="form-control @error('judul') is-invalid @enderror" 
                       placeholder="Contoh: Senam Ceria Pagi Siswa PAUD Al-Hidayah"
                       value="{{ old('judul') }}" required>
                @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="deskripsi">Keterangan / Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" 
                          class="form-control @error('deskripsi') is-invalid @enderror" 
                          style="height:100px; line-height:1.5;" 
                          placeholder="Ceritakan singkat tentang kemeriahan kegiatan ini...">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <!-- SECTION INPUT FOTO -->
            <div id="section-foto" style="display:block;">
                <div class="form-group">
                    <label for="foto">File Foto Kegiatan <span style="color:red">*</span></label>
                    <input type="file" id="foto" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/jpg,image/jpeg,image/png,image/webp">
                    <small style="color:#94A3B8; font-size:0.78rem;">Format foto: JPG, JPEG, PNG, WEBP (Maksimal 5 MB)</small>
                    @error('foto')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
                </div>
            </div>

            <!-- SECTION INPUT VIDEO -->
            <div id="section-video" style="display:none; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:14px; padding:16px; margin-bottom:16px;">
                <label style="font-weight:700; color:#1E293B; margin-bottom:10px; display:block;">Sumber Video</label>
                <div style="display:flex; gap:16px; margin-bottom:14px;">
                    <label style="display:inline-flex; align-items:center; gap:6px; font-size:13px; font-weight:600; cursor:pointer;">
                        <input type="radio" name="video_source" value="url" checked onclick="switchVideoSource('url')">
                        <span>Link YouTube / YouTube Shorts</span>
                    </label>
                    <label style="display:inline-flex; align-items:center; gap:6px; font-size:13px; font-weight:600; cursor:pointer;">
                        <input type="radio" name="video_source" value="file" onclick="switchVideoSource('file')">
                        <span>Unggah File Video (MP4)</span>
                    </label>
                </div>

                <!-- Input Link YouTube -->
                <div id="vsource-url" style="display:block;">
                    <div class="form-group" style="margin-bottom:8px;">
                        <label for="video_url" style="font-size:13px; font-weight:600;">Link URL YouTube <span style="color:red">*</span></label>
                        <input type="url" id="video_url" name="video_url" class="form-control @error('video_url') is-invalid @enderror" placeholder="Contoh: https://www.youtube.com/watch?v=dQw4w9WgXcQ atau https://youtu.be/..." value="{{ old('video_url') }}">
                        <small style="color:#64748B; font-size:11px; display:block; margin-top:4px;">
                            Thumbnail akan otomatis diambil dari YouTube secara gratis!
                        </small>
                        @error('video_url')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
                    </div>
                </div>

                <!-- Input File Video Upload -->
                <div id="vsource-file" style="display:none;">
                    <div class="form-group" style="margin-bottom:8px;">
                        <label for="video_file" style="font-size:13px; font-weight:600;">Unggah File Video MP4 <span style="color:red">*</span></label>
                        <input type="file" id="video_file" name="video_file" class="form-control @error('video_file') is-invalid @enderror" accept="video/mp4,video/webm,video/quicktime">
                        <small style="color:#94A3B8; font-size:11px; display:block; margin-top:4px;">Format: MP4, WebM, MOV (Maksimal 50 MB)</small>
                        @error('video_file')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
                    </div>
                </div>

                <!-- Custom Thumbnail untuk Video (Opsional) -->
                <div class="form-group" style="margin-top:14px; padding-top:12px; border-top:1px dashed #CBD5E1;">
                    <label for="foto_thumbnail" style="font-size:13px; font-weight:600;">Foto Sampul / Thumbnail Video (Opsional)</label>
                    <input type="file" id="foto_thumbnail" class="form-control" accept="image/jpg,image/jpeg,image/png,image/webp">
                    <small style="color:#94A3B8; font-size:11px;">Kosongkan untuk menggunakan thumbnail otomatis dari YouTube</small>
                </div>
            </div>

            <div style="margin-top:24px; padding-top:16px; border-top:1px solid #E2E8F0; display:flex; gap:10px;">
                <button type="submit" class="btn btn-primary" style="font-weight:700;display:inline-flex;align-items:center;gap:6px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2.5" style="width:15px;height:15px;color:#FFFFFF;flex-shrink:0;"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                    <span>Simpan &amp; Publikasikan</span>
                </button>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<script>
    function switchKategori(kat) {
        const tabFoto = document.getElementById('tab-type-foto');
        const tabVideo = document.getElementById('tab-type-video');
        const secFoto = document.getElementById('section-foto');
        const secVideo = document.getElementById('section-video');

        const inputFotoFile = document.getElementById('foto');
        const thumbInput = document.getElementById('foto_thumbnail');

        if (kat === 'foto') {
            tabFoto.style.border = '2px solid #10B981';
            tabFoto.style.background = '#F0FDF4';
            tabFoto.style.color = '#065F46';

            tabVideo.style.border = '1px solid #CBD5E1';
            tabVideo.style.background = '#F8FAFC';
            tabVideo.style.color = '#475569';

            secFoto.style.display = 'block';
            secVideo.style.display = 'none';

            if (inputFotoFile) {
                inputFotoFile.name = 'foto';
                inputFotoFile.required = true;
            }
            if (thumbInput) {
                thumbInput.removeAttribute('name');
                thumbInput.required = false;
            }
        } else {
            tabVideo.style.border = '2px solid #EF4444';
            tabVideo.style.background = '#FEF2F2';
            tabVideo.style.color = '#991B1B';

            tabFoto.style.border = '1px solid #CBD5E1';
            tabFoto.style.background = '#F8FAFC';
            tabFoto.style.color = '#475569';

            secFoto.style.display = 'none';
            secVideo.style.display = 'block';

            if (inputFotoFile) {
                inputFotoFile.removeAttribute('name');
                inputFotoFile.required = false;
            }
            if (thumbInput) {
                thumbInput.name = 'foto';
                thumbInput.required = false;
            }
        }
    }

    function switchVideoSource(source) {
        const vsUrl = document.getElementById('vsource-url');
        const vsFile = document.getElementById('vsource-file');
        const inputUrl = document.getElementById('video_url');
        const inputFile = document.getElementById('video_file');

        if (source === 'url') {
            vsUrl.style.display = 'block';
            vsFile.style.display = 'none';
            inputUrl.required = true;
            inputFile.required = false;
        } else {
            vsUrl.style.display = 'none';
            vsFile.style.display = 'block';
            inputUrl.required = false;
            inputFile.required = true;
        }
    }

    async function compressImageFile(file, maxWidth = 1920, quality = 0.82) {
        if (file.size < 1.5 * 1024 * 1024) return file;
        return new Promise((resolve) => {
            const img = new Image();
            img.src = URL.createObjectURL(file);
            img.onload = () => {
                let width = img.width;
                let height = img.height;
                if (width > maxWidth) {
                    height = Math.round((height * maxWidth) / width);
                    width = maxWidth;
                }
                const canvas = document.createElement('canvas');
                canvas.width = width;
                canvas.height = height;
                const ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0, width, height);
                canvas.toBlob((blob) => {
                    if (blob) {
                        const newFile = new File([blob], file.name.replace(/\.[^/.]+$/, ".jpg"), {
                            type: 'image/jpeg',
                            lastModified: Date.now()
                        });
                        resolve(newFile);
                    } else {
                        resolve(file);
                    }
                }, 'image/jpeg', quality);
            };
            img.onerror = () => resolve(file);
        });
    }

    document.addEventListener("DOMContentLoaded", function() {
        const checkedKategori = document.querySelector('input[name="kategori"]:checked');
        switchKategori(checkedKategori ? checkedKategori.value : 'foto');

        const videoFileInput = document.getElementById('video_file');
        if (videoFileInput) {
            videoFileInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const fileSizeMB = (this.files[0].size / (1024 * 1024)).toFixed(1);
                    if (this.files[0].size > 2 * 1024 * 1024) {
                        alert(`⚠️ File Video Melebihi Batas Max Upload Server (2 MB)!\n\nUkuran file video yang Anda pilih adalah ${fileSizeMB} MB.\n\n💡 Rekomendasi Utama: Pilih opsi "Link YouTube / YouTube Shorts" lalu tempelkan link video YouTube Anda. Video dari YouTube diputar instan, jernih, dan tidak membebani server!`);
                    }
                }
            });
        }

        const form = document.querySelector('form');
        let isSubmitting = false;

        form.addEventListener('submit', async function(e) {
            if (isSubmitting) return;

            const selectedKategori = document.querySelector('input[name="kategori"]:checked')?.value || 'foto';
            const targetInput = selectedKategori === 'foto' ? document.getElementById('foto') : document.getElementById('foto_thumbnail');

            if (targetInput && targetInput.files && targetInput.files[0] && targetInput.files[0].size > 1.5 * 1024 * 1024) {
                e.preventDefault();
                const submitBtn = form.querySelector('button[type="submit"]');
                submitBtn.disabled = true;
                submitBtn.innerHTML = '⏳ Mengompresi Foto & Mengunggah...';

                try {
                    const compressed = await compressImageFile(targetInput.files[0]);
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(compressed);
                    targetInput.files = dataTransfer.files;
                } catch (err) {
                    console.error("Compression error:", err);
                }

                isSubmitting = true;
                form.submit();
            }
        });
    });
</script>
@endsection
