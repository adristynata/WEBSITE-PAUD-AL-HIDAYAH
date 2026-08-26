<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aktivasi PIN Orang Tua — PAUD Al-Hidayah</title>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #143818 0%, #7CB68B 60%, #F4B93E 100%);
            display: flex; align-items: center; justify-content: center; padding: 20px;
        }
        .login-wrap {
            width: 100%; max-width: 960px;
            display: grid; grid-template-columns: 1fr 1.1fr;
            background: #fff; border-radius: 28px; overflow: hidden;
            box-shadow: 0 30px 70px rgba(0,0,0,0.3);
        }

        /* ── Left Panel ── */
        .login-left {
            background: linear-gradient(160deg, #143818 0%, #7CB68B 100%);
            padding: 48px 40px; display: flex; flex-direction: column; justify-content: center; color: #fff;
        }
        .login-left .logo { display: flex; align-items: center; gap: 12px; margin-bottom: 36px; }
        .brand { font-family: 'Baloo 2', sans-serif; font-size: 20px; font-weight: 700; line-height: 1.2; }
        .brand small { display: block; font-family: 'Poppins', sans-serif; font-size: 10px; letter-spacing: 0.15em; color: rgba(255,255,255,0.6); font-weight: 700; margin-top: 2px; }

        .login-left h2 { font-family: 'Baloo 2', sans-serif; font-size: 1.5rem; font-weight: 800; margin-bottom: 12px; line-height: 1.3; }
        .login-left p { color: rgba(255,255,255,0.75); font-size: 0.9rem; line-height: 1.7; margin-bottom: 28px; }

        /* ── Right Panel ── */
        .login-right { padding: 48px 40px; display: flex; flex-direction: column; justify-content: center; }
        .login-right h3 { font-family: 'Baloo 2', sans-serif; font-size: 1.6rem; font-weight: 800; color: #143818; margin-bottom: 6px; }
        .login-right .subtitle { font-size: 0.875rem; color: #64748B; margin-bottom: 28px; line-height: 1.6; }

        /* ── Form ── */
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-size: 0.82rem; font-weight: 800; color: #374151; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.05em; }
        .form-control {
            width: 100%; padding: 12px 14px;
            border: 2px solid #E5E7EB; border-radius: 12px;
            font-family: 'Poppins', sans-serif; font-size: 0.95rem; color: #1E293B;
            transition: border-color 0.2s; background: #FAFAFA;
        }
        .form-control:focus { outline: none; border-color: #7CB68B; background: #fff; box-shadow: 0 0 0 3px rgba(124, 182, 139, 0.15); }
        .form-control.is-invalid { border-color: #EF4444; }
        .invalid-feedback { color: #EF4444; font-size: 0.8rem; margin-top: 4px; font-weight: 600; }

        .btn-submit {
            width: 100%; padding: 14px;
            border: none; border-radius: 12px;
            font-family: 'Poppins', sans-serif; font-size: 1rem; font-weight: 800;
            cursor: pointer; transition: all 0.2s; margin-top: 8px;
            background: linear-gradient(135deg, #F4B93E, #E8A317); color: #143818; box-shadow: 0 4px 0 #d4920f;
        }
        .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 6px 0 #d4920f; }

        .alert-danger {
            background: #FEF2F2; border: 1px solid #FECACA; color: #DC2626;
            padding: 10px 14px; border-radius: 10px; font-size: 0.85rem; font-weight: 600; margin-bottom: 16px;
        }

        .back-link {
            display: block; text-align: center; margin-top: 24px;
            font-size: 0.825rem; color: #94A3B8; text-decoration: none;
        }
        .back-link:hover { color: #64748B; }

        @media (max-width: 680px) {
            .login-wrap { grid-template-columns: 1fr; }
            .login-left { display: none; }
            .login-right { padding: 36px 28px; }
        }
    </style>
</head>
<body>
<div class="login-wrap">

    {{-- ── Left Panel ── --}}
    <div class="login-left">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo KB Al Hidayah" style="height:54px;width:auto;display:block;">
            <div class="brand">
                KB AL HIDAYAH
                <small>SEKOLAH USIA DINI</small>
            </div>
        </div>

        <h2>Aktivasi Akun Keamanan</h2>
        <p>Langkah pengamanan untuk memastikan bahwa hanya orang tua sah yang dapat memantau catatan perkembangan anak secara periodik.</p>
    </div>

    {{-- ── Right Panel ── --}}
    <div class="login-right">
        <h3>Buat PIN Login Baru 🔐</h3>
        <p class="subtitle">Silakan buat 6-digit PIN angka. PIN ini akan digunakan sebagai kunci keamanan login Anda selanjutnya.</p>

        @if($errors->any())
            <div class="alert-danger">
                @foreach ($errors->all() as $error)
                    <div>❌ {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login.setup-pin.post') }}">
            @csrf
            <div class="form-group">
                <label for="pin">PIN Baru (6-Digit Angka)</label>
                <div style="position: relative; display: flex; align-items: center;">
                    <input type="password" id="pin" name="pin"
                           class="form-control @error('pin') is-invalid @enderror"
                           placeholder="••••••" maxlength="6" inputmode="numeric" pattern="[0-9]*" required autofocus
                           style="padding-right: 44px;">
                    <button type="button" class="btn-toggle-pwd" onclick="togglePasswordVisibility('pin', this)" style="position: absolute; right: 12px; background: none; border: none; cursor: pointer; color: #94A3B8; display: flex; align-items: center; padding: 4px;" title="Tampilkan/Sembunyikan PIN">
                        <svg class="eye-open" viewBox="0 0 24 24" style="width:20px;height:20px;stroke:currentColor;fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        <svg class="eye-closed" viewBox="0 0 24 24" style="width:20px;height:20px;stroke:currentColor;fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;display:none;"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                    </button>
                </div>
            </div>
            <div class="form-group">
                <label for="pin_confirmation">Konfirmasi PIN Baru</label>
                <div style="position: relative; display: flex; align-items: center;">
                    <input type="password" id="pin_confirmation" name="pin_confirmation"
                           class="form-control"
                           placeholder="••••••" maxlength="6" inputmode="numeric" pattern="[0-9]*" required
                           style="padding-right: 44px;">
                    <button type="button" class="btn-toggle-pwd" onclick="togglePasswordVisibility('pin_confirmation', this)" style="position: absolute; right: 12px; background: none; border: none; cursor: pointer; color: #94A3B8; display: flex; align-items: center; padding: 4px;" title="Tampilkan/Sembunyikan PIN">
                        <svg class="eye-open" viewBox="0 0 24 24" style="width:20px;height:20px;stroke:currentColor;fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        <svg class="eye-closed" viewBox="0 0 24 24" style="width:20px;height:20px;stroke:currentColor;fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;display:none;"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                    </button>
                </div>
            </div>
            <button type="submit" class="btn-submit">💾 Simpan PIN &amp; Masuk Ke Dashboard →</button>
        </form>

        <a href="{{ route('login') }}" class="back-link">Batal dan kembali ke Login</a>
    </div>
</div>

<script>
function togglePasswordVisibility(inputId, btn) {
    const input = document.getElementById(inputId);
    if (!input) return;
    const eyeOpen = btn.querySelector('.eye-open');
    const eyeClosed = btn.querySelector('.eye-closed');
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
</body>
</html>
