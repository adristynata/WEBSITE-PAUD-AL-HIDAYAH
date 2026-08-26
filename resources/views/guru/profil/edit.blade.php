@extends('layouts.dashboard')
@section('title', 'Profil & Tanda Tangan Saya — Guru')
@section('page-title', 'Profil & Tanda Tangan Saya')

@section('sidebar-menu')
    @include('guru.partials.sidebar-menu')
@endsection

@section('content')
@if(session('success'))
    <div class="alert alert-success" style="margin-bottom:16px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;display:inline-block;vertical-align:middle;margin-right:6px;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        {{ session('success') }}
    </div>
@endif

<div class="card" style="max-width:700px;">
    <div class="card-header" style="display:flex;align-items:center;gap:8px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        <span>Kelola Profil & Tanda Tangan Digital</span>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('guru.profil.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-grid-2">
                <div class="form-group">
                    <label for="name">Nama Lengkap & Gelar <span style="color:red">*</span></label>
                    <input type="text" id="name" name="name" 
                           class="form-control @error('name') is-invalid @enderror" 
                           value="{{ old('name', $user->name) }}" required>
                    <small style="color:#94A3B8; font-size:0.78rem;">Nama ini yang akan tercetak di bawah tanda tangan PDF laporan.</small>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="email">Alamat Email <span style="color:red">*</span></label>
                    <input type="email" id="email" name="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           value="{{ old('email', $user->email) }}" required>
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="form-grid-2" style="margin-top:8px;">
                <div class="form-group">
                    <label for="password">Password Baru (Opsional)</label>
                    <div style="position: relative; display: flex; align-items: center;">
                        <input type="password" id="password" name="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               placeholder="Kosongkan jika tidak diubah"
                               style="padding-right: 42px;">
                        <button type="button" class="btn-toggle-pwd" onclick="togglePasswordVisibility('password', this)" style="position: absolute; right: 10px; background: none; border: none; cursor: pointer; color: #94A3B8; display: flex; align-items: center; padding: 4px;" title="Tampilkan/Sembunyikan Password">
                            <svg class="eye-open" viewBox="0 0 24 24" style="width:18px;height:18px;stroke:currentColor;fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            <svg class="eye-closed" viewBox="0 0 24 24" style="width:18px;height:18px;stroke:currentColor;fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;display:none;"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                        </button>
                    </div>
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password Baru</label>
                    <div style="position: relative; display: flex; align-items: center;">
                        <input type="password" id="password_confirmation" name="password_confirmation" 
                               class="form-control" placeholder="Ulangi password baru"
                               style="padding-right: 42px;">
                        <button type="button" class="btn-toggle-pwd" onclick="togglePasswordVisibility('password_confirmation', this)" style="position: absolute; right: 10px; background: none; border: none; cursor: pointer; color: #94A3B8; display: flex; align-items: center; padding: 4px;" title="Tampilkan/Sembunyikan Password">
                            <svg class="eye-open" viewBox="0 0 24 24" style="width:18px;height:18px;stroke:currentColor;fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            <svg class="eye-closed" viewBox="0 0 24 24" style="width:18px;height:18px;stroke:currentColor;fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;display:none;"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="form-group" style="margin-top:16px; padding-top:16px; border-top:1px solid #E2E8F0;">
                <label>Tanda Tangan Digital Guru (untuk PDF Laporan)</label>
                @if($user->ttd)
                    <div style="margin-bottom:12px;">
                        <img src="{{ asset('images/' . $user->ttd) }}" 
                             alt="TTD Guru" 
                             style="max-width:180px; max-height:90px; object-fit:contain; background:#fff; padding:6px; border-radius:8px; border:2px dashed #CBD5E1; box-shadow:0 2px 6px rgba(0,0,0,0.04);">
                        <small style="display:block; color:#94A3B8; margin-top:4px;">Tanda tangan Anda saat ini</small>
                    </div>
                @endif

                <!-- Pilihan Mode TTD -->
                <div style="display:flex; gap:8px; margin-bottom:12px;">
                    <button type="button" id="btn-tab-upload-guru" style="background:#4F46E5; color:#fff; border:none; border-radius:6px; font-size:0.8rem; font-weight:600; padding:7px 14px; cursor:pointer;" onclick="switchTtdModeGuru('upload')">
                        📁 Upload Foto/PNG (Remove BG)
                    </button>
                    <button type="button" id="btn-tab-draw-guru" style="background:#F1F5F9; color:#475569; border:1px solid #E2E8F0; border-radius:6px; font-size:0.8rem; font-weight:600; padding:7px 14px; cursor:pointer;" onclick="switchTtdModeGuru('draw')">
                        ✍️ Gambar di Layar
                    </button>
                </div>

                <!-- Mode 1: Upload File Gambar PNG Transparan -->
                <div id="section-ttd-upload-guru" style="display:block; padding:12px; background:#F8FAFC; border-radius:8px; border:1px solid #E2E8F0;">
                    <label for="ttd" style="font-size:0.82rem; font-weight:600; color:#334155; margin-bottom:6px; display:block;">Pilih file gambar TTD Anda:</label>
                    <input type="file" id="ttd" name="ttd" class="form-control" accept="image/png,image/jpeg,image/jpg,image/webp">
                    <small style="color:#64748B; font-size:0.78rem; display:block; margin-top:6px;">
                        💡 <strong>Rekomendasi:</strong> Unggah file gambar format <strong>.PNG transparan</strong> (yang sudah di-<em>remove background</em>) agar hasil cetak PDF bersih tanpa kotak putih/abu-abu. (Maks. 2 MB)
                    </small>
                </div>

                <!-- Mode 2: Signature Pad Canvas -->
                <div id="section-ttd-draw-guru" style="display:none; padding:12px; background:#F8FAFC; border-radius:8px; border:1px solid #E2E8F0;">
                    <div style="border: 2px dashed #CBD5E1; border-radius: 8px; background: #fff; padding: 10px; width: fit-content;">
                        <canvas id="signature-pad-guru" class="signature-pad" width="400" height="180" style="border: 1px solid #E2E8F0; border-radius: 4px; touch-action: none; cursor: crosshair; background:#fff;"></canvas>
                        <div style="margin-top: 8px; display: flex; justify-content: space-between; align-items: center;">
                            <small style="color:#94A3B8;">Buat tanda tangan di atas kotak putih</small>
                            <button type="button" id="clear-signature-guru" style="padding: 4px 8px; font-size: 0.8rem; background: #FEE2E2; color: #EF4444; border: 1px solid #FCA5A5; border-radius: 4px; cursor: pointer;">Hapus Coretan</button>
                        </div>
                    </div>
                    <small style="color:#64748B; font-size:0.78rem; display:block; margin-top:6px;">Goresan tangan otomatis disimpan dengan latar transparan.</small>
                </div>

                <input type="hidden" id="ttd_base64" name="ttd_base64">
                @error('ttd')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
                @error('ttd_base64')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
            </div>

            <div style="margin-top:24px; padding-top:16px; border-top:1px solid #E2E8F0;">
                <button type="submit" class="btn btn-primary" style="font-weight:700;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;display:inline-block;vertical-align:middle;margin-right:4px;"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                    Simpan Perubahan Profil & TTD
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
<script>
    var currentTtdModeGuru = 'upload';
    var signaturePadGuru = null;

    function switchTtdModeGuru(mode) {
        currentTtdModeGuru = mode;
        var btnUpload = document.getElementById('btn-tab-upload-guru');
        var btnDraw = document.getElementById('btn-tab-draw-guru');
        var secUpload = document.getElementById('section-ttd-upload-guru');
        var secDraw = document.getElementById('section-ttd-draw-guru');

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
        var canvas = document.getElementById('signature-pad-guru');
        signaturePadGuru = new SignaturePad(canvas, {
            backgroundColor: 'rgba(255, 255, 255, 0)',
            penColor: 'rgb(0, 0, 0)'
        });

        document.getElementById('clear-signature-guru').addEventListener('click', function () {
            signaturePadGuru.clear();
        });

        document.querySelector('form').addEventListener('submit', function(e) {
            if (currentTtdModeGuru === 'draw' && !signaturePadGuru.isEmpty()) {
                document.getElementById('ttd_base64').value = signaturePadGuru.toDataURL('image/png');
                document.getElementById('ttd').value = ''; // Reset file upload jika menggambar
            }
        });
    });

    function togglePasswordVisibility(inputId, btn) {
        var input = document.getElementById(inputId);
        if (!input) return;
        var eyeOpen = btn.querySelector('.eye-open');
        var eyeClosed = btn.querySelector('.eye-closed');
        if (input.type === 'password') {
            input.type = 'text';
            if (eyeOpen) eyeOpen.style.display = 'none';
            if (eyeClosed) eyeClosed.style.display = 'block';
        } else {
            input.type = 'password';
            if (eyeOpen) eyeOpen.style.display = 'block';
            if (eyeClosed) eyeClosed.style.display = 'none';
        }
    }
</script>
@endsection