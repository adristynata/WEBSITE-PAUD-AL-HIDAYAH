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

            <div class="form-grid-2">
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
                    <small style="color:#94A3B8; font-size:0.78rem;">Kosongkan jika tidak ingin mengubah foto (Maks. 2 MB)</small>
                    @error('sambutan_foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label>Tanda Tangan Digital Kepala Sekolah (untuk PDF)</label>
                    @if($profil->ttd_kepsek)
                        <div style="margin-bottom:12px;">
                            <img src="{{ asset('images/' . $profil->ttd_kepsek) }}" 
                                 alt="TTD Kepala Sekolah" 
                                 style="max-width:160px; max-height:80px; object-fit:contain; background:#fff; padding:6px; border-radius:8px; border:2px dashed #CBD5E1; box-shadow:0 2px 6px rgba(0,0,0,0.04);">
                            <small style="display:block; color:#94A3B8; margin-top:4px;">Tanda tangan saat ini</small>
                        </div>
                    @endif

                    <!-- Pilihan Mode TTD -->
                    <div style="display:flex; gap:8px; margin-bottom:12px;">
                        <button type="button" id="btn-tab-upload" style="background:#4F46E5; color:#fff; border:none; border-radius:6px; font-size:0.8rem; font-weight:600; padding:7px 14px; cursor:pointer;" onclick="switchTtdMode('upload')">
                            📁 Upload Foto/PNG (Remove BG)
                        </button>
                        <button type="button" id="btn-tab-draw" style="background:#F1F5F9; color:#475569; border:1px solid #E2E8F0; border-radius:6px; font-size:0.8rem; font-weight:600; padding:7px 14px; cursor:pointer;" onclick="switchTtdMode('draw')">
                            ✍️ Gambar di Layar
                        </button>
                    </div>

                    <!-- Mode 1: Upload File Gambar PNG Transparan -->
                    <div id="section-ttd-upload" style="display:block; padding:12px; background:#F8FAFC; border-radius:8px; border:1px solid #E2E8F0;">
                        <label for="ttd_kepsek" style="font-size:0.82rem; font-weight:600; color:#334155; margin-bottom:6px; display:block;">Pilih file gambar TTD:</label>
                        <input type="file" id="ttd_kepsek" name="ttd_kepsek" class="form-control" accept="image/png,image/jpeg,image/jpg,image/webp">
                        <small style="color:#64748B; font-size:0.78rem; display:block; margin-top:6px;">
                            💡 <strong>Rekomendasi:</strong> Unggah file gambar format <strong>.PNG transparan</strong> (yang sudah di-<em>remove background</em>) agar hasil cetak PDF bersih tanpa kotak putih/abu-abu. (Maks. 2 MB)
                        </small>
                    </div>

                    <!-- Mode 2: Signature Pad Canvas -->
                    <div id="section-ttd-draw" style="display:none; padding:12px; background:#F8FAFC; border-radius:8px; border:1px solid #E2E8F0;">
                        <div style="border: 2px dashed #CBD5E1; border-radius: 8px; background: #fff; padding: 10px; width: fit-content;">
                            <canvas id="signature-pad" class="signature-pad" width="400" height="180" style="border: 1px solid #E2E8F0; border-radius: 4px; touch-action: none; cursor: crosshair; background:#fff;"></canvas>
                            <div style="margin-top: 8px; display: flex; justify-content: space-between; align-items: center;">
                                <small style="color:#94A3B8;">Buat tanda tangan di atas kotak putih</small>
                                <button type="button" id="clear-signature" style="padding: 4px 8px; font-size: 0.8rem; background: #FEE2E2; color: #EF4444; border: 1px solid #FCA5A5; border-radius: 4px; cursor: pointer;">Hapus Coretan</button>
                            </div>
                        </div>
                        <small style="color:#64748B; font-size:0.78rem; display:block; margin-top:6px;">Goresan tangan otomatis disimpan dengan latar transparan.</small>
                    </div>

                    <input type="hidden" id="ttd_kepsek_base64" name="ttd_kepsek_base64">
                    @error('ttd_kepsek')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
                    @error('ttd_kepsek_base64')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
                </div>
            </div>

            <!-- ── HERO SLIDER BANNER SECTION ── -->
            <div style="margin-top:32px; padding-top:20px; border-top:2px dashed #CBD5E1;">
                <div style="display:flex; align-items:center; gap:8px; margin-bottom:14px;">
                    <div style="width:32px; height:32px; border-radius:8px; background:#10B981; display:flex; align-items:center; justify-content:center; color:#fff;">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                    </div>
                    <div>
                        <h4 style="margin:0; font-size:16px; color:#1E293B; font-weight:700;">Foto Banner Hero Slider (Beranda)</h4>
                        <small style="color:#64748B;">Kelola foto-foto yang berganti otomatis di bagian atas beranda website (Maks. 4 MB per foto)</small>
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:18px; margin-bottom:12px;">
                    <!-- Slide 1 -->
                    <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:14px;">
                        <label style="font-weight:700; font-size:13px; color:#334155; display:block; margin-bottom:8px;">
                            🌄 Banner Slide 1 (Utama)
                        </label>
                        <div style="margin-bottom:10px;">
                            <img src="{{ asset('images/' . ($profil->hero_slide_1 ?? 'hero-slide-1.jpg')) }}" 
                                 alt="Slide 1" 
                                 onerror="this.src='{{ asset('images/gedung-sekolah.jpg') }}'"
                                 style="width:100%; height:120px; border-radius:8px; object-fit:cover; border:1px solid #CBD5E1;">
                        </div>
                        <input type="file" name="hero_slide_1" class="form-control" accept="image/jpg,image/jpeg,image/png,image/webp" style="font-size:12px;">
                        <small style="color:#94A3B8; font-size:11px; display:block; margin-top:4px;">Kosongkan jika tidak ingin mengubah</small>
                        @error('hero_slide_1')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
                    </div>

                    <!-- Slide 2 -->
                    <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:14px;">
                        <label style="font-weight:700; font-size:13px; color:#334155; display:block; margin-bottom:8px;">
                            🎨 Banner Slide 2 (Aktivitas/Kelas)
                        </label>
                        <div style="margin-bottom:10px;">
                            <img src="{{ asset('images/' . ($profil->hero_slide_2 ?? 'hero-slide-2.jpg')) }}" 
                                 alt="Slide 2" 
                                 onerror="this.src='{{ asset('images/hero-slide-2.jpg') }}'"
                                 style="width:100%; height:120px; border-radius:8px; object-fit:cover; border:1px solid #CBD5E1;">
                        </div>
                        <input type="file" name="hero_slide_2" class="form-control" accept="image/jpg,image/jpeg,image/png,image/webp" style="font-size:12px;">
                        <small style="color:#94A3B8; font-size:11px; display:block; margin-top:4px;">Kosongkan jika tidak ingin mengubah</small>
                        @error('hero_slide_2')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
                    </div>

                    <!-- Slide 3 -->
                    <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:14px;">
                        <label style="font-weight:700; font-size:13px; color:#334155; display:block; margin-bottom:8px;">
                            🕌 Banner Slide 3 (Gedung/Fasilitas)
                        </label>
                        <div style="margin-bottom:10px;">
                            <img src="{{ asset('images/' . ($profil->hero_slide_3 ?? 'hero-slide-3.jpg')) }}" 
                                 alt="Slide 3" 
                                 onerror="this.src='{{ asset('images/hero-slide-3.jpg') }}'"
                                 style="width:100%; height:120px; border-radius:8px; object-fit:cover; border:1px solid #CBD5E1;">
                        </div>
                        <input type="file" name="hero_slide_3" class="form-control" accept="image/jpg,image/jpeg,image/png,image/webp" style="font-size:12px;">
                        <small style="color:#94A3B8; font-size:11px; display:block; margin-top:4px;">Kosongkan jika tidak ingin mengubah</small>
                        @error('hero_slide_3')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>

            <div style="margin-top:24px; padding-top:16px; border-top:1px solid #E2E8F0;">
                <button type="submit" class="btn btn-primary" style="font-weight:700;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;display:inline-block;vertical-align:middle;margin-right:4px;"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                    Simpan Perubahan Profil & Banner
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
<script>
    var currentTtdMode = 'upload';
    var signaturePad = null;

    function switchTtdMode(mode) {
        currentTtdMode = mode;
        var btnUpload = document.getElementById('btn-tab-upload');
        var btnDraw = document.getElementById('btn-tab-draw');
        var secUpload = document.getElementById('section-ttd-upload');
        var secDraw = document.getElementById('section-ttd-draw');

        if (mode === 'upload') {
            btnUpload.style.background = '#4F46E5';
            btnUpload.style.color = '#fff';
            btnUpload.style.border = 'none';

            btnDraw.style.background = '#F1F5F9';
            btnDraw.style.color = '#475569';
            btnDraw.style.border = '1px solid #E2E8F0';

            secUpload.style.display = 'block';
            secDraw.style.display = 'none';
        } else {
            btnDraw.style.background = '#4F46E5';
            btnDraw.style.color = '#fff';
            btnDraw.style.border = 'none';

            btnUpload.style.background = '#F1F5F9';
            btnUpload.style.color = '#475569';
            btnUpload.style.border = '1px solid #E2E8F0';

            secDraw.style.display = 'block';
            secUpload.style.display = 'none';
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        var canvas = document.getElementById('signature-pad');
        signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgba(255, 255, 255, 0)',
            penColor: 'rgb(0, 0, 0)'
        });

        document.getElementById('clear-signature').addEventListener('click', function () {
            signaturePad.clear();
        });

        document.querySelector('form').addEventListener('submit', function(e) {
            if (currentTtdMode === 'draw' && !signaturePad.isEmpty()) {
                document.getElementById('ttd_kepsek_base64').value = signaturePad.toDataURL('image/png');
                document.getElementById('ttd_kepsek').value = ''; // Reset file upload jika menggambar
            }
        });
    });
</script>
@endsection
