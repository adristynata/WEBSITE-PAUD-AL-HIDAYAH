@extends('layouts.dashboard')
@section('title', 'Kelola Profil Sekolah — Admin')
@section('page-title', 'Kelola Profil Sekolah')

@section('sidebar-menu')
    @include('admin.partials.sidebar-menu')
@endsection

@section('content')
<div class="card" style="max-width:800px;">
    <div class="card-header">
        <span style="display:inline-flex;align-items:center;gap:6px;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            <span>Edit Profil &amp; Sambutan Kepala Sekolah</span>
        </span>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div style="background:#DCFCE7;border:1px solid #86EFAC;color:#166534;padding:12px 16px;border-radius:8px;margin-bottom:20px;font-size:14px;display:flex;align-items:center;gap:8px;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;flex-shrink:0;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div style="background:#FEE2E2;border:1px solid #FCA5A5;color:#991B1B;padding:12px 16px;border-radius:8px;margin-bottom:20px;font-size:14px;display:flex;align-items:center;gap:8px;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;flex-shrink:0;"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

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
                        <button type="button" id="btn-tab-upload" style="background:#4F46E5; color:#fff; border:none; border-radius:6px; font-size:0.8rem; font-weight:600; padding:7px 14px; cursor:pointer; display:inline-flex; align-items:center; gap:6px;" onclick="switchTtdMode('upload')">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                            <span>Upload Foto/PNG (Remove BG)</span>
                        </button>
                        <button type="button" id="btn-tab-draw" style="background:#F1F5F9; color:#475569; border:1px solid #E2E8F0; border-radius:6px; font-size:0.8rem; font-weight:600; padding:7px 14px; cursor:pointer; display:inline-flex; align-items:center; gap:6px;" onclick="switchTtdMode('draw')">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>
                            <span>Gambar di Layar</span>
                        </button>
                    </div>

                    <!-- Mode 1: Upload File Gambar PNG Transparan -->
                    <div id="section-ttd-upload" style="display:block; padding:12px; background:#F8FAFC; border-radius:8px; border:1px solid #E2E8F0;">
                        <label for="ttd_kepsek" style="font-size:0.82rem; font-weight:600; color:#334155; margin-bottom:6px; display:block;">Pilih file gambar TTD:</label>
                        <input type="file" id="ttd_kepsek" name="ttd_kepsek" class="form-control" accept="image/png,image/jpeg,image/jpg,image/webp">
                        <small style="color:#64748B; font-size:0.78rem; display:flex; align-items:flex-start; gap:6px; margin-top:6px;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:15px;height:15px;color:#F59E0B;flex-shrink:0;"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                            <span><strong>Rekomendasi:</strong> Unggah file gambar format <strong>.PNG transparan</strong> (yang sudah di-<em>remove background</em>) agar hasil cetak PDF bersih tanpa kotak putih/abu-abu. (Maks. 2 MB)</span>
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

                <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:16px; margin-bottom:12px;">
                    <!-- Slide 1 -->
                    <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:14px;">
                        <label style="font-weight:700; font-size:13px; color:#334155; display:inline-flex; align-items:center; gap:6px; margin-bottom:8px;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;color:#10B981;"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                            <span>Banner Slide 1 (Utama)</span>
                        </label>
                        <div style="margin-bottom:10px;">
                            <img id="preview_hero_slide_1" 
                                 src="{{ asset('images/' . ($profil->hero_slide_1 ?? 'hero-slide-1.jpg')) }}" 
                                 alt="Slide 1" 
                                 onerror="this.src='{{ asset('images/gedung-sekolah.jpg') }}'"
                                 style="width:100%; height:120px; border-radius:8px; object-fit:cover; border:1px solid #CBD5E1;">
                        </div>
                        <input type="file" id="hero_slide_1" name="hero_slide_1" class="form-control" accept="image/jpg,image/jpeg,image/png,image/webp" style="font-size:12px;" onchange="previewImage(this, 'preview_hero_slide_1')">
                        <small style="color:#94A3B8; font-size:11px; display:block; margin-top:4px;">Kosongkan jika tidak ingin mengubah</small>
                        @error('hero_slide_1')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
                    </div>

                    <!-- Slide 2 -->
                    <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:14px;">
                        <label style="font-weight:700; font-size:13px; color:#334155; display:inline-flex; align-items:center; gap:6px; margin-bottom:8px;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;color:#F59E0B;"><circle cx="12" cy="12" r="10"/><path d="M12 2a10 10 0 0 0 0 20c1.5 0 2.5-1 2.5-2.5 0-.7-.3-1.3-.7-1.7-.4-.4-.7-1-.7-1.8 0-1.4 1.1-2.5 2.5-2.5H18a4 4 0 0 0 4-4c0-4.4-4.5-8-10-8z"/></svg>
                            <span>Banner Slide 2 (Aktivitas/Kelas)</span>
                        </label>
                        <div style="margin-bottom:10px;">
                            <img id="preview_hero_slide_2" 
                                 src="{{ asset('images/' . ($profil->hero_slide_2 ?? 'hero-slide-2.jpg')) }}" 
                                 alt="Slide 2" 
                                 onerror="this.src='{{ asset('images/hero-slide-2.jpg') }}'"
                                 style="width:100%; height:120px; border-radius:8px; object-fit:cover; border:1px solid #CBD5E1;">
                        </div>
                        <input type="file" id="hero_slide_2" name="hero_slide_2" class="form-control" accept="image/jpg,image/jpeg,image/png,image/webp" style="font-size:12px;" onchange="previewImage(this, 'preview_hero_slide_2')">
                        <small style="color:#94A3B8; font-size:11px; display:block; margin-top:4px;">Kosongkan jika tidak ingin mengubah</small>
                        @error('hero_slide_2')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
                    </div>

                    <!-- Slide 3 -->
                    <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:14px;">
                        <label style="font-weight:700; font-size:13px; color:#334155; display:inline-flex; align-items:center; gap:6px; margin-bottom:8px;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;color:#3B82F6;"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                            <span>Banner Slide 3 (Gedung/Fasilitas)</span>
                        </label>
                        <div style="margin-bottom:10px;">
                            <img id="preview_hero_slide_3" 
                                 src="{{ asset('images/' . ($profil->hero_slide_3 ?? 'hero-slide-3.jpg')) }}" 
                                 alt="Slide 3" 
                                 onerror="this.src='{{ asset('images/hero-slide-3.jpg') }}'"
                                 style="width:100%; height:120px; border-radius:8px; object-fit:cover; border:1px solid #CBD5E1;">
                        </div>
                        <input type="file" id="hero_slide_3" name="hero_slide_3" class="form-control" accept="image/jpg,image/jpeg,image/png,image/webp" style="font-size:12px;" onchange="previewImage(this, 'preview_hero_slide_3')">
                        <small style="color:#94A3B8; font-size:11px; display:block; margin-top:4px;">Kosongkan jika tidak ingin mengubah</small>
                        @error('hero_slide_3')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
                    </div>

                    <!-- Slide 4 -->
                    <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:14px;">
                        <label style="font-weight:700; font-size:13px; color:#334155; display:inline-flex; align-items:center; gap:6px; margin-bottom:8px;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;color:#8B5CF6;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <span>Banner Slide 4 (Kreativitas)</span>
                        </label>
                        <div style="margin-bottom:10px;">
                            <img id="preview_hero_slide_4" 
                                 src="{{ asset('images/' . ($profil->hero_slide_4 ?? 'hero-slide-4.jpg')) }}" 
                                 alt="Slide 4" 
                                 onerror="this.src='{{ asset('images/hero-paud-ceria.jpg') }}'"
                                 style="width:100%; height:120px; border-radius:8px; object-fit:cover; border:1px solid #CBD5E1;">
                        </div>
                        <input type="file" id="hero_slide_4" name="hero_slide_4" class="form-control" accept="image/jpg,image/jpeg,image/png,image/webp" style="font-size:12px;" onchange="previewImage(this, 'preview_hero_slide_4')">
                        <small style="color:#94A3B8; font-size:11px; display:block; margin-top:4px;">Kosongkan jika tidak ingin mengubah</small>
                        @error('hero_slide_4')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
                    </div>

                    <!-- Slide 5 -->
                    <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:14px;">
                        <label style="font-weight:700; font-size:13px; color:#334155; display:inline-flex; align-items:center; gap:6px; margin-bottom:8px;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;color:#EC4899;"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            <span>Banner Slide 5 (Kebersamaan)</span>
                        </label>
                        <div style="margin-bottom:10px;">
                            <img id="preview_hero_slide_5" 
                                 src="{{ asset('images/' . ($profil->hero_slide_5 ?? 'hero-slide-5.jpg')) }}" 
                                 alt="Slide 5" 
                                 onerror="this.src='{{ asset('images/gedung-sekolah.jpg') }}'"
                                 style="width:100%; height:120px; border-radius:8px; object-fit:cover; border:1px solid #CBD5E1;">
                        </div>
                        <input type="file" id="hero_slide_5" name="hero_slide_5" class="form-control" accept="image/jpg,image/jpeg,image/png,image/webp" style="font-size:12px;" onchange="previewImage(this, 'preview_hero_slide_5')">
                        <small style="color:#94A3B8; font-size:11px; display:block; margin-top:4px;">Kosongkan jika tidak ingin mengubah</small>
                        @error('hero_slide_5')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>

            <!-- ── FOTO AKTIVITAS CERIA SPMB (FLYER POLAROID) SECTION ── -->
            <div style="margin-top:32px; padding-top:20px; border-top:2px dashed #CBD5E1;">
                <div style="display:flex; align-items:center; gap:8px; margin-bottom:14px;">
                    <div style="width:32px; height:32px; border-radius:8px; background:#F59E0B; display:flex; align-items:center; justify-content:center; color:#fff;">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                    </div>
                    <div>
                        <h4 style="margin:0; font-size:16px; color:#1E293B; font-weight:700;">Foto Aktivitas Ceria SPMB (Flyer Beranda)</h4>
                        <small style="color:#64748B;">Kelola 3 foto Polaroid Aktivitas Ceria Siswa di poster SPMB beranda website (Maks. 4 MB per foto)</small>
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:16px; margin-bottom:12px;">
                    <!-- Foto Flyer 1 -->
                    <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:14px;">
                        <label style="font-weight:700; font-size:13px; color:#334155; display:inline-flex; align-items:center; gap:6px; margin-bottom:8px;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;color:#F59E0B;"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                            <span>Foto Aktivitas 1</span>
                        </label>
                        <div style="margin-bottom:10px;">
                            <img id="preview_flyer_foto1" 
                                 src="{{ asset('images/' . ($profil->flyer_foto1 ?? 'hero-slide-2.jpg')) }}" 
                                 alt="Foto Flyer 1" 
                                 onerror="this.src='{{ asset('images/gedung-sekolah.jpg') }}'"
                                 style="width:100%; height:120px; border-radius:8px; object-fit:cover; border:1px solid #CBD5E1;">
                        </div>
                        <input type="file" id="flyer_foto1" name="flyer_foto1" class="form-control" accept="image/jpg,image/jpeg,image/png,image/webp" style="font-size:12px;" onchange="previewImage(this, 'preview_flyer_foto1')">
                        <small style="color:#94A3B8; font-size:11px; display:block; margin-top:4px;">Kosongkan jika tidak ingin mengubah</small>
                        @error('flyer_foto1')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
                    </div>

                    <!-- Foto Flyer 2 -->
                    <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:14px;">
                        <label style="font-weight:700; font-size:13px; color:#334155; display:inline-flex; align-items:center; gap:6px; margin-bottom:8px;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;color:#3B82F6;"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                            <span>Foto Aktivitas 2</span>
                        </label>
                        <div style="margin-bottom:10px;">
                            <img id="preview_flyer_foto2" 
                                 src="{{ asset('images/' . ($profil->flyer_foto2 ?? 'hero-slide-3.jpg')) }}" 
                                 alt="Foto Flyer 2" 
                                 onerror="this.src='{{ asset('images/gedung-sekolah.jpg') }}'"
                                 style="width:100%; height:120px; border-radius:8px; object-fit:cover; border:1px solid #CBD5E1;">
                        </div>
                        <input type="file" id="flyer_foto2" name="flyer_foto2" class="form-control" accept="image/jpg,image/jpeg,image/png,image/webp" style="font-size:12px;" onchange="previewImage(this, 'preview_flyer_foto2')">
                        <small style="color:#94A3B8; font-size:11px; display:block; margin-top:4px;">Kosongkan jika tidak ingin mengubah</small>
                        @error('flyer_foto2')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
                    </div>

                    <!-- Foto Flyer 3 -->
                    <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:14px;">
                        <label style="font-weight:700; font-size:13px; color:#334155; display:inline-flex; align-items:center; gap:6px; margin-bottom:8px;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;color:#10B981;"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                            <span>Foto Aktivitas 3</span>
                        </label>
                        <div style="margin-bottom:10px;">
                            <img id="preview_flyer_foto3" 
                                 src="{{ asset('images/' . ($profil->flyer_foto3 ?? 'hero-paud-ceria.jpg')) }}" 
                                 alt="Foto Flyer 3" 
                                 onerror="this.src='{{ asset('images/gedung-sekolah.jpg') }}'"
                                 style="width:100%; height:120px; border-radius:8px; object-fit:cover; border:1px solid #CBD5E1;">
                        </div>
                        <input type="file" id="flyer_foto3" name="flyer_foto3" class="form-control" accept="image/jpg,image/jpeg,image/png,image/webp" style="font-size:12px;" onchange="previewImage(this, 'preview_flyer_foto3')">
                        <small style="color:#94A3B8; font-size:11px; display:block; margin-top:4px;">Kosongkan jika tidak ingin mengubah</small>
                        @error('flyer_foto3')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
                    </div>
                </div>

                <!-- Textarea Konten Teks SPMB Flyer -->
                <div style="margin-top:20px; padding:16px; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px;">
                    <h5 style="margin:0 0 6px 0; font-size:14px; font-weight:700; color:#1E293B;">Daftar Poin Teks Poster SPMB (Isi 1 Poin per Baris)</h5>
                    <small style="color:#64748B; display:block; margin-bottom:14px;">Masukkan daftar item yang akan ditampilkan pada poster SPMB di halaman depan website. Tuliskan 1 item per baris.</small>

                    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:16px;">
                        <!-- Program Unggulan -->
                        <div class="form-group" style="margin-bottom:0;">
                            <label for="flyer_program_unggulan" style="font-weight:700; font-size:13px; color:#BE185D; display:flex; align-items:center; gap:6px;">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;color:#EC4899;"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                <span>Program Unggulan</span>
                            </label>
                            <textarea id="flyer_program_unggulan" name="flyer_program_unggulan" class="form-control" rows="5" style="font-size:13px; line-height:1.5;" placeholder="Pendidikan Karakter & Islami&#10;Pengenalan Huruf & Angka Ceria&#10;Motorik & Seni Kreatif&#10;Kunjungan Edukasi (Field Trip)&#10;Pemeriksaan Kesehatan Rutin">{{ old('flyer_program_unggulan', $profil->flyer_program_unggulan ?? "Pendidikan Karakter & Islami\nPengenalan Huruf & Angka Ceria\nMotorik & Seni Kreatif\nKunjungan Edukasi (Field Trip)\nPemeriksaan Kesehatan Rutin") }}</textarea>
                            @error('flyer_program_unggulan')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
                        </div>

                        <!-- Persyaratan Pendaftaran -->
                        <div class="form-group" style="margin-bottom:0;">
                            <label for="flyer_persyaratan" style="font-weight:700; font-size:13px; color:#B45309; display:flex; align-items:center; gap:6px;">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;color:#F59E0B;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                                <span>Persyaratan Pendaftaran</span>
                            </label>
                            <textarea id="flyer_persyaratan" name="flyer_persyaratan" class="form-control" rows="5" style="font-size:13px; line-height:1.5;" placeholder="Usia 3 - 6 Tahun&#10;Fotokopi Akta Kelahiran (2 Lembar)&#10;Fotokopi Kartu Keluarga (2 Lembar)&#10;Pas Foto Anak 3x4 (4 Lembar)&#10;Mengisi Formulir Pendaftaran">{{ old('flyer_persyaratan', $profil->flyer_persyaratan ?? "Usia 3 - 6 Tahun\nFotokopi Akta Kelahiran (2 Lembar)\nFotokopi Kartu Keluarga (2 Lembar)\nPas Foto Anak 3x4 (4 Lembar)\nMengisi Formulir Pendaftaran") }}</textarea>
                            @error('flyer_persyaratan')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
                        </div>

                        <!-- Ekstrakurikuler -->
                        <div class="form-group" style="margin-bottom:0;">
                            <label for="flyer_ekskul" style="font-weight:700; font-size:13px; color:#6D28D9; display:flex; align-items:center; gap:6px;">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;color:#8B5CF6;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <span>Ekstrakurikuler</span>
                            </label>
                            <textarea id="flyer_ekskul" name="flyer_ekskul" class="form-control" rows="5" style="font-size:13px; line-height:1.5;" placeholder="Tari & Seni Suara&#10;Mewarnai & Menggambar&#10;Berenang & Senam Ceria&#10;Hafalan Surah Pendek & Doa">{{ old('flyer_ekskul', $profil->flyer_ekskul ?? "Tari & Seni Suara\nMewarnai & Menggambar\nBerenang & Senam Ceria\nHafalan Surah Pendek & Doa") }}</textarea>
                            @error('flyer_ekskul')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bagian 3: Informasi Kontak & Google Maps -->
            <div style="margin-top:28px; padding-top:20px; border-top:1px solid #E2E8F0;">
                <div style="display:flex; align-items:center; gap:10px; margin-bottom:16px;">
                    <div style="width:32px; height:32px; border-radius:8px; background:#3B82F6; display:flex; align-items:center; justify-content:center; color:#fff;">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <div>
                        <h4 style="margin:0; font-size:16px; color:#1E293B; font-weight:700;">Informasi Kontak &amp; Titik Lokasi Google Maps</h4>
                        <small style="color:#64748B;">Atur alamat, kontak WhatsApp/Telepon, serta peta lokasi sekolah di beranda</small>
                    </div>
                </div>

                <div class="row" style="display:flex; flex-wrap:wrap; gap:16px; margin-bottom:16px;">
                    <div style="flex:1; min-width:280px;">
                        <div class="form-group" style="margin-bottom:16px;">
                            <label class="form-label" style="font-weight:600; color:#334155; display:inline-flex; align-items:center; gap:6px;">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:15px;height:15px;color:#EF4444;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                <span>Alamat Lengkap Sekolah</span>
                            </label>
                            <textarea name="alamat_lengkap" class="form-control" rows="2" placeholder="Contoh: Desa Wedelan RT 01 / RW 09, Kec. Bangsri, Kab. Jepara, Jawa Tengah 59453">{{ old('alamat_lengkap', $profil->alamat_lengkap ?? 'Desa Wedelan RT 01 / RW 09, Kec. Bangsri, Kab. Jepara, Jawa Tengah 59453') }}</textarea>
                        </div>
                    </div>
                    <div style="flex:1; min-width:240px;">
                        <div class="form-group" style="margin-bottom:12px;">
                            <label class="form-label" style="font-weight:600; color:#334155; display:inline-flex; align-items:center; gap:6px;">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:15px;height:15px;color:#10B981;"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                <span>Nomor Telepon / WhatsApp</span>
                            </label>
                            <input type="text" name="no_telepon" class="form-control" value="{{ old('no_telepon', $profil->no_telepon ?? '0812-2922-2804') }}" placeholder="Contoh: 0812-2922-2804">
                        </div>
                        <div class="form-group">
                            <label class="form-label" style="font-weight:600; color:#334155; display:inline-flex; align-items:center; gap:6px;">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:15px;height:15px;color:#3B82F6;"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                <span>Email Sekolah</span>
                            </label>
                            <input type="email" name="email_sekolah" class="form-control" value="{{ old('email_sekolah', $profil->email_sekolah ?? 'fatimatuzzahraalhidayah@gmail.com') }}" placeholder="Contoh: fatimatuzzahraalhidayah@gmail.com">
                        </div>
                    </div>
                </div>

                <div class="form-group" style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:16px;">
                    <label class="form-label" style="font-weight:700; color:#1E293B; display:flex; align-items:center; justify-content:space-between;">
                        <span style="display:inline-flex; align-items:center; gap:6px;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;color:#3B82F6;"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"/><line x1="8" y1="2" x2="8" y2="18"/><line x1="16" y1="6" x2="16" y2="22"/></svg>
                            <span>Titik Lokasi / Link Embed Google Maps</span>
                        </span>
                        <a href="https://www.google.com/maps/search/?api=1&query=-6.5163,110.7823" target="_blank" style="font-size:12px; color:#3B82F6; text-decoration:none; font-weight:600;">Lihat di Google Maps &nearr;</a>
                    </label>
                    <input type="text" name="maps_embed" class="form-control" value="{{ old('maps_embed', $profil->maps_embed ?? '') }}" placeholder="Kosongkan untuk menggunakan titik koordinat resmi (-6.5163, 110.7823) atau tempel link embed/iframe Google Maps baru">
                    <small style="color:#64748B; font-size:12px; display:block; margin-top:6px;">
                        Secara default sistem menggunakan koordinat resmi Kemendikbud: <strong>Lintang: -6.5163, Bujur: 110.7823</strong> (Desa Wedelan RT 01 RW 09). Jika Anda memiliki link bagikan iframe dari Google Maps, Anda dapat menempelkannya di sini.
                    </small>
                </div>
            </div>

            {{-- ════ PENGATURAN NOTIFIKASI WHATSAPP (FONNTE) ════ --}}
            <div style="margin-top:32px; border-top:2px solid #E2E8F0; padding-top:28px;">
                <div style="display:flex;align-items:center;gap:10px;margin-bottom:20px;">
                    <div style="width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,#25D366,#128C7E);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <svg viewBox="0 0 24 24" fill="currentColor" style="width:18px;height:18px;color:#fff;">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                            <path d="M12 0C5.373 0 0 5.373 0 12c0 2.136.564 4.136 1.545 5.875L.057 23.99l6.267-1.641A11.945 11.945 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 0 1-5.071-1.41l-.364-.216-3.721.975.994-3.636-.235-.374A9.772 9.772 0 0 1 2.182 12C2.182 6.565 6.565 2.182 12 2.182S21.818 6.565 21.818 12 17.435 21.818 12 21.818z"/>
                        </svg>
                    </div>
                    <div>
                        <div style="font-weight:800;font-size:1rem;color:#0F172A;">Pengaturan Notifikasi WhatsApp (Fonnte)</div>
                        <div style="font-size:12px;color:#64748B;margin-top:1px;">Konfigurasi API Fonnte untuk pengiriman notifikasi otomatis ke orang tua saat laporan bulanan diterbitkan.</div>
                    </div>
                </div>

                <div style="background:#F0FDF4;border:1px solid #BBF7D0;border-radius:10px;padding:14px 16px;margin-bottom:20px;font-size:13px;color:#14532D;">
                    <strong>Cara Mendapatkan Token Fonnte:</strong><br>
                    1. Daftar akun di <a href="https://fonnte.com" target="_blank" style="color:#15803D;font-weight:700;">fonnte.com</a> &rarr; Login &rarr; Buka menu <strong>Devices</strong><br>
                    2. Tambahkan perangkat &rarr; Scan QR Code dengan nomor WA pengirim<br>
                    3. Salin <strong>API Token</strong> yang tampil dan tempelkan di kolom di bawah<br>
                    4. Isi kolom <strong>URL Website</strong> dengan alamat domain resmi PAUD Al-Hidayah
                </div>

                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="fonnte_token">
                            API Token Fonnte
                            <span style="color:#64748B;font-weight:500;font-size:11px;"> (dari portal fonnte.com)</span>
                        </label>
                        <input type="text" id="fonnte_token" name="fonnte_token"
                               class="form-control @error('fonnte_token') is-invalid @enderror"
                               value="{{ old('fonnte_token', $profil->fonnte_token ?? '') }}"
                               placeholder="Contoh: abcxyz123...">
                        <small style="color:#64748B;font-size:12px;margin-top:4px;display:block;">Token autentikasi dari akun Fonnte Anda. Jaga kerahasiaannya.</small>
                        @error('fonnte_token')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="fonnte_target">
                            Nomor Tujuan / ID Grup WhatsApp
                            <span style="color:#64748B;font-weight:500;font-size:11px;"> (opsional — kosongkan untuk kirim per ortu)</span>
                        </label>
                        <input type="text" id="fonnte_target" name="fonnte_target"
                               class="form-control @error('fonnte_target') is-invalid @enderror"
                               value="{{ old('fonnte_target', $profil->fonnte_target ?? '') }}"
                               placeholder="Contoh: 628123456789 atau ID Grup">
                        <small style="color:#64748B;font-size:12px;margin-top:4px;display:block;">Jika dikosongkan, notifikasi dikirim ke <strong>nomor HP masing-masing orang tua</strong>. Isi jika ingin dikirim ke satu nomor/grup tertentu.</small>
                        @error('fonnte_target')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="app_url">
                        URL Website Resmi PAUD
                        <span style="color:#64748B;font-weight:500;font-size:11px;"> (disertakan dalam pesan WA ke orang tua)</span>
                    </label>
                    <input type="url" id="app_url" name="app_url"
                           class="form-control @error('app_url') is-invalid @enderror"
                           value="{{ old('app_url', $profil->app_url ?? config('app.url')) }}"
                           placeholder="Contoh: https://paud-alhidayah.sch.id">
                    <small style="color:#64748B;font-size:12px;margin-top:4px;display:block;">URL ini akan dicantumkan di pesan WhatsApp notifikasi laporan sehingga orang tua dapat langsung membuka website.</small>
                    @error('app_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                {{-- Uji Coba WhatsApp --}}
                <div style="margin-bottom:16px; display:flex; align-items:center; justify-content:space-between; background:#F0FDF4; border:1px solid #86EFAC; border-radius:10px; padding:12px 16px; gap:12px; flex-wrap:wrap;">
                    <div>
                        <strong style="font-size:13px; color:#14532D; display:flex; align-items:center; gap:6px;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;color:#16A34A;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            Uji Coba Koneksi Fonnte WhatsApp
                        </strong>
                        <div style="font-size:12px; color:#166534; margin-top:2px;">Klik tombol di kanan untuk mencoba mengirim pesan tes langsung dan memastikan status WhatsApp Fonnte Anda Aktif/Connected.</div>
                    </div>
                    <button type="submit" form="form-test-fonnte" class="btn" style="background:#16A34A; color:#fff; font-weight:700; border:none; display:inline-flex; align-items:center; gap:6px; font-size:13px; padding:8px 16px; border-radius:8px; cursor:pointer; box-shadow:0 2px 4px rgba(22,163,74,0.2);">
                        <svg viewBox="0 0 24 24" fill="currentColor" style="width:16px;height:16px;"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                        <span>Tes Kirim WA</span>
                    </button>
                </div>

                {{-- Preview Template Pesan WA --}}
                <div style="background:#1F2937;border-radius:12px;padding:20px;margin-top:4px;">
                    <div style="font-size:12px;color:#9CA3AF;font-weight:700;letter-spacing:0.5px;text-transform:uppercase;margin-bottom:12px;">Pratinjau Pesan WhatsApp yang Dikirimkan:</div>
                    <div style="background:#075E54;border-radius:10px 10px 0 0;padding:8px 16px;font-size:11px;font-weight:700;color:#E5E7EB;">KB-PAUD Al-Hidayah</div>
                    <div style="background:#DCF8C6;border-radius:0 0 10px 10px;padding:14px 16px;font-size:13px;color:#1F2937;white-space:pre-line;line-height:1.6;">📢 *PEMBERITAHUAN RESMI*
*KB-PAUD AL-HIDAYAH WEDELAN*

Yth. Bapak/Ibu Orang Tua/Wali dari *[Nama Anak]*,

Laporan perkembangan anak Anda untuk periode *[Bulan Tahun]* telah diterbitkan oleh wali kelas.

📋 *Data Akses Portal Orang Tua:*
• NIS Anak: *[NIS]*
• Password Login: *[Password Awal / NIS]*

🌐 Silakan buka website resmi kami:
*[URL Website]*

Masuk menggunakan NIS dan PIN yang sudah Anda daftarkan. Jika belum memiliki PIN, gunakan Tanggal Lahir anak (format: DDMMYYYY) sebagai password awal.

Terima kasih atas kepercayaan Bapak/Ibu kepada kami.

_KB-PAUD Al-Hidayah Wedelan_</div>
                </div>
            </div>

            <div style="margin-top:24px; padding-top:16px; border-top:1px solid #E2E8F0;">
                <button type="submit" class="btn btn-primary" style="font-weight:700;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;display:inline-block;vertical-align:middle;margin-right:4px;"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                    Simpan Semua Perubahan
                </button>
        </form>

        {{-- Hidden Form Uji Coba Fonnte --}}
        <form id="form-test-fonnte" method="POST" action="{{ route('admin.profil.test-fonnte') }}" onsubmit="document.getElementById('test_fonnte_token').value = document.getElementById('fonnte_token').value; document.getElementById('test_fonnte_target').value = document.getElementById('fonnte_target').value;">
            @csrf
            <input type="hidden" name="fonnte_token" id="test_fonnte_token">
            <input type="hidden" name="fonnte_target" id="test_fonnte_target">
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
<script>
    var currentTtdMode = 'upload';
    var signaturePad = null;

    // Pratinjau langsung saat memilih file gambar
    function previewImage(input, previewId) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var previewImg = document.getElementById(previewId);
                if (previewImg) {
                    previewImg.src = e.target.result;
                }
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

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

    // Helper kompresi gambar otomatis jika ukuran file kamera HP terlalu besar (> 2MB)
    async function compressImageFile(file, maxWidth = 1920, quality = 0.85) {
        if (file.size < 1.5 * 1024 * 1024) return file; // Jika < 1.5 MB tidak perlu kompres
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
        var canvas = document.getElementById('signature-pad');
        if (canvas) {
            signaturePad = new SignaturePad(canvas, {
                backgroundColor: 'rgba(255, 255, 255, 0)',
                penColor: 'rgb(0, 0, 0)'
            });

            document.getElementById('clear-signature').addEventListener('click', function () {
                signaturePad.clear();
            });
        }

        const form = document.querySelector('form');
        let isSubmitting = false;

        form.addEventListener('submit', async function(e) {
            if (isSubmitting) return;

            if (currentTtdMode === 'draw' && signaturePad && !signaturePad.isEmpty()) {
                document.getElementById('ttd_kepsek_base64').value = signaturePad.toDataURL('image/png');
                document.getElementById('ttd_kepsek').value = '';
            }

            // Kompres foto-foto slide secara otomatis jika ukuran file besar
            const fileInputs = form.querySelectorAll('input[type="file"]:not(#ttd_kepsek)');
            let hasLargeFiles = false;
            for (const input of fileInputs) {
                if (input.files && input.files[0] && input.files[0].size > 2 * 1024 * 1024) {
                    hasLargeFiles = true;
                    break;
                }
            }

            if (hasLargeFiles) {
                e.preventDefault();
                const submitBtn = form.querySelector('button[type="submit"]');
                const origBtnText = submitBtn.innerHTML;
                submitBtn.disabled = true;
                submitBtn.innerHTML = '⏳ Mengoptimalkan & Menyimpan Foto...';

                try {
                    for (const input of fileInputs) {
                        if (input.files && input.files[0] && input.files[0].size > 1.5 * 1024 * 1024) {
                            const compressed = await compressImageFile(input.files[0]);
                            const dataTransfer = new DataTransfer();
                            dataTransfer.items.add(compressed);
                            input.files = dataTransfer.files;
                        }
                    }
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
