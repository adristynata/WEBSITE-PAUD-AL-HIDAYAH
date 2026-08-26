<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — PAUD Al-Hidayah</title>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html, body { height: 100%; }
        body {
            font-family: 'Poppins', sans-serif;
            background: #fff;
        }

        /* ── Full-screen split layout ── */
        .login-container {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        /* ════════════════════════════════════════
           LEFT PANEL — mint green with photo
           ════════════════════════════════════════ */
        .login-left {
            background: #dff0e8;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 60px 48px;
            text-align: center;
        }
        .photo-frame {
            width: 85%;
            max-width: 380px;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 12px 40px rgba(0,0,0,.08);
            margin-bottom: 24px;
        }
        .photo-frame img {
            width: 100%;
            height: 440px;
            object-fit: cover;
            display: block;
        }
        .login-left h2 {
            font-family: 'Baloo 2', sans-serif;
            font-size: 1.9rem;
            font-weight: 800;
            color: #0d6b3e;
            margin-bottom: 10px;
        }
        .login-left p {
            font-size: .92rem;
            color: #3d7556;
            max-width: 380px;
            line-height: 1.65;
        }

        /* ════════════════════════════════════════
           RIGHT PANEL — white form area
           ════════════════════════════════════════ */
        .login-right {
            display: flex;
            flex-direction: column;
            padding: 48px 64px;
            overflow-y: auto;
        }

        /* back link — sits at top, separate from main content */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: .88rem;
            font-weight: 700;
            color: #0d6b3e;
            text-decoration: none;
            margin-bottom: 48px;
            flex-shrink: 0;
        }
        .back-link:hover { opacity: .75; }
        .back-link svg {
            width: 18px; height: 18px;
            stroke: currentColor; fill: none;
            stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round;
        }

        /* main content wrapper — vertically centered */
        .right-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-width: 440px;
            width: 100%;
        }
        .right-body .heading h3 {
            font-family: 'Baloo 2', sans-serif;
            font-size: 1.75rem;
            font-weight: 800;
            color: #0d6b3e;
            margin-bottom: 6px;
        }
        .right-body .heading p {
            font-size: .92rem;
            color: #64748b;
            margin-bottom: 36px;
            line-height: 1.55;
        }

        /* ── Login card ── */
        .login-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 36px 32px 32px;
            box-shadow: 0 4px 24px rgba(0,0,0,.04);
        }

        /* ── Tabs ── */
        .tabs {
            display: flex;
            border-bottom: 2px solid #f1f5f9;
            margin-bottom: 32px;
        }
        .tab-btn {
            flex: 1;
            padding: 0 0 14px;
            border: none;
            background: transparent;
            font-family: 'Poppins', sans-serif;
            font-size: .92rem;
            font-weight: 700;
            color: #a3b0a6;
            cursor: pointer;
            position: relative;
            transition: color .2s;
        }
        .tab-btn:hover { color: #0d6b3e; }
        .tab-btn.active { color: #0d6b3e; }
        .tab-btn.active::after {
            content: '';
            position: absolute;
            left: 10%; right: 10%; bottom: -2px;
            height: 3px;
            background: #0d6b3e;
            border-radius: 99px;
        }

        /* ── Panels ── */
        .tab-panel { display: none; }
        .tab-panel.active { display: block; }

        /* ── Form elements ── */
        .form-group { margin-bottom: 22px; }
        .form-group label {
            display: block;
            font-size: .82rem;
            font-weight: 700;
            color: #475569;
            margin-bottom: 8px;
        }
        .input-box {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #fff;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 0 16px;
            transition: border-color .2s, box-shadow .2s;
        }
        .input-box:focus-within {
            border-color: #0d6b3e;
            box-shadow: 0 0 0 3px rgba(13, 107, 62, .08);
        }
        .input-box.is-invalid {
            border-color: #ef4444;
            background: #fef2f2;
        }
        .input-box .icon {
            flex-shrink: 0;
            color: #94a3b8;
            display: flex;
        }
        .input-box .icon svg {
            width: 18px; height: 18px;
            stroke: currentColor; fill: none;
            stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;
        }
        .input-box input {
            flex: 1;
            padding: 14px 0;
            border: none;
            background: transparent;
            font-family: 'Poppins', sans-serif;
            font-size: .9rem;
            color: #1e293b;
            outline: none;
            width: 100%;
        }
        .input-box input::placeholder { color: #b0b8c1; }

        .btn-toggle-pwd {
            background: none;
            border: none;
            padding: 4px 6px;
            cursor: pointer;
            color: #94a3b8;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color .2s;
        }
        .btn-toggle-pwd:hover { color: #1e293b; }
        .btn-toggle-pwd svg {
            width: 18px;
            height: 18px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .invalid-feedback {
            color: #ef4444;
            font-size: .78rem;
            margin-top: 6px;
            font-weight: 600;
        }

        /* ── Button ── */
        .btn-submit {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 12px;
            background: #0d6b3e;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            font-size: .95rem;
            font-weight: 700;
            cursor: pointer;
            transition: background .2s, transform .1s;
            margin-top: 8px;
        }
        .btn-submit:hover { background: #095c33; }
        .btn-submit:active { transform: scale(.98); }

        /* ── Alert ── */
        .alert-danger {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            padding: 11px 14px;
            border-radius: 14px;
            font-size: .84rem;
            font-weight: 600;
            margin-bottom: 18px;
        }

        /* ── Ortu hint box ── */
        .ortu-hint {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 14px;
            padding: 12px 14px;
            margin-bottom: 22px;
            font-size: .84rem;
            color: #166534;
            line-height: 1.6;
        }
        .ortu-hint strong { display: block; margin-bottom: 2px; }

        /* ── Trouble link ── */
        .trouble-link {
            text-align: center;
            margin-top: 20px;
            font-size: .85rem;
            color: #64748b;
        }
        .trouble-link a {
            color: #0d6b3e;
            font-weight: 700;
            text-decoration: none;
        }
        .trouble-link a:hover { text-decoration: underline; }

        /* ── Footer badges ── */
        .login-footer {
            display: flex;
            justify-content: center;
            gap: 24px;
            margin-top: 28px;
            color: #94a3b8;
            font-size: .76rem;
            font-weight: 600;
            letter-spacing: .06em;
        }
        .footer-badge {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .footer-badge svg {
            width: 14px; height: 14px;
            stroke: currentColor; fill: none;
            stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round;
        }

        /* ════ Responsive ════ */
        @media (max-width: 860px) {
            .login-container { grid-template-columns: 1fr; }
            .login-left { display: none; }
            .login-right { padding: 32px 24px; }
            .back-link { margin-bottom: 32px; }
        }
    </style>
</head>
<body>
<div class="login-container">

    {{-- ══ LEFT PANEL ══ --}}
    <div class="login-left">
        <div class="photo-frame">
            <img src="{{ asset('images/paud2.jpeg') }}"
                 alt="Foto PAUD Al Hidayah">
        </div>
        <h2>Pusat Belajar &amp; Tumbuh</h2>
        <p>Membentuk generasi qur'ani yang cerdas dan berkarakter sejak dini di PAUD Al Hidayah.</p>
    </div>

    {{-- ══ RIGHT PANEL ══ --}}
    <div class="login-right">

        <a href="{{ route('home') }}" class="back-link">
            <svg viewBox="0 0 24 24"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            Kembali ke Beranda
        </a>

        <div class="right-body">
            <div class="heading">
                <h3>Portal Akademik</h3>
                <p>Silakan masuk untuk mengakses dashboard PAUD Al Hidayah.</p>
            </div>

            <div class="login-card">
                {{-- Tabs --}}
                <div class="tabs">
                    <button type="button" class="tab-btn {{ session('tab') === 'ortu' ? '' : 'active' }}"
                            onclick="switchTab('staff')" id="tab-staff">Login Admin / Guru</button>
                    <button type="button" class="tab-btn {{ session('tab') === 'ortu' ? 'active' : '' }}"
                            onclick="switchTab('ortu')" id="tab-ortu">Login Orang Tua</button>
                </div>

                {{-- ── Tab: Admin / Guru ── --}}
                <div class="tab-panel {{ session('tab') === 'ortu' ? '' : 'active' }}" id="panel-staff">
                    @if($errors->has('email'))
                        <div class="alert-danger">{{ $errors->first('email') }}</div>
                    @endif
                    <form method="POST" action="{{ route('login.post') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="input-box {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                <span class="icon"><svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></span>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="email@sekolah.id" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-box">
                                <span class="icon"><svg viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></span>
                                <input type="password" id="password" name="password" placeholder="••••••••" required>
                                <button type="button" class="btn-toggle-pwd" onclick="togglePasswordVisibility('password', this)" title="Tampilkan/Sembunyikan Password">
                                    <svg class="eye-open" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    <svg class="eye-closed" viewBox="0 0 24 24" style="display:none;"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="btn-submit">Masuk Dashboard Staf</button>
                    </form>
                </div>

                {{-- ── Tab: Orang Tua ── --}}
                <div class="tab-panel {{ session('tab') === 'ortu' ? 'active' : '' }}" id="panel-ortu">
                    @if($errors->has('nis'))
                        <div class="alert-danger">{{ $errors->first('nis') }}</div>
                    @endif

                    <div class="ortu-hint" id="ortu-hint-text">
                        <strong>ℹ️ Cara masuk untuk Orang Tua</strong>
                        Masukkan <strong>NIS anak</strong> dan <strong>tanggal lahir anak</strong> yang terdaftar di sekolah.
                    </div>

                    <form method="POST" action="{{ route('login.ortu') }}" id="form-login-ortu">
                        @csrf
                        <div class="form-group">
                            <label for="nis">Nomor Induk Siswa (NIS)</label>
                            <div class="input-box {{ $errors->has('nis') ? 'is-invalid' : '' }}">
                                <span class="icon"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg></span>
                                <input type="text" id="nis" name="nis" value="{{ old('nis') }}" placeholder="Masukkan NIS Siswa" required>
                            </div>
                            @error('nis')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group" id="group-dob">
                            <label for="tanggal_lahir">Tanggal Lahir Siswa</label>
                            <div class="input-box {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}">
                                <span class="icon"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></span>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                            </div>
                            @error('tanggal_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group" id="group-pin" style="display:none;">
                            <label for="pin">PIN Orang Tua (6-Digit)</label>
                            <div class="input-box {{ $errors->has('pin') ? 'is-invalid' : '' }}">
                                <span class="icon"><svg viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></span>
                                <input type="password" id="pin" name="pin" placeholder="Masukkan 6-digit PIN" maxlength="6" inputmode="numeric" pattern="[0-9]*">
                                <button type="button" class="btn-toggle-pwd" onclick="togglePasswordVisibility('pin', this)" title="Tampilkan/Sembunyikan PIN">
                                    <svg class="eye-open" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    <svg class="eye-closed" viewBox="0 0 24 24" style="display:none;"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                                </button>
                            </div>
                            @error('pin')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <button type="submit" class="btn-submit" id="btn-submit-ortu">Masuk Dashboard Orang Tua</button>
                    </form>
                </div>

                <div class="trouble-link">
                    Kesulitan masuk? <a href="https://wa.me/6281234567890" target="_blank">Hubungi Admin Sekolah</a>
                </div>
            </div>
        </div>
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

function switchTab(tab) {
    document.getElementById('tab-staff').classList.toggle('active', tab === 'staff');
    document.getElementById('tab-ortu').classList.toggle('active', tab === 'ortu');
    document.getElementById('panel-staff').classList.toggle('active', tab === 'staff');
    document.getElementById('panel-ortu').classList.toggle('active', tab === 'ortu');
}

// ── Orang Tua NIS Dynamic Toggle ──
let debounceTimer;
const nisInput = document.getElementById('nis');
const groupDob = document.getElementById('group-dob');
const groupPin = document.getElementById('group-pin');
const dobField = document.getElementById('tanggal_lahir');
const pinField = document.getElementById('pin');
const hintText = document.getElementById('ortu-hint-text');
const btnSubmit = document.getElementById('btn-submit-ortu');

function checkNis(nis) {
    if (!nis || nis.length < 3) return;
    fetch(`/login/check-nis/${nis}`)
        .then(r => r.json())
        .then(data => {
            if (data.exists) {
                if (data.has_pin) {
                    groupDob.style.display = 'none';
                    dobField.removeAttribute('required');
                    groupPin.style.display = 'block';
                    pinField.setAttribute('required', 'required');
                    hintText.innerHTML = '<strong>ℹ️ Masuk dengan PIN</strong>Masukkan <strong>NIS anak</strong> dan <strong>PIN 6-digit</strong> yang sudah Anda daftarkan.';
                    btnSubmit.textContent = 'Masuk Dashboard Orang Tua';
                } else {
                    groupDob.style.display = 'block';
                    dobField.setAttribute('required', 'required');
                    groupPin.style.display = 'none';
                    pinField.removeAttribute('required');
                    hintText.innerHTML = '<strong>ℹ️ Aktivasi Akun Orang Tua</strong>Masukkan <strong>NIS anak</strong> dan <strong>tanggal lahir anak</strong> untuk verifikasi dan membuat PIN baru.';
                    btnSubmit.textContent = 'Lanjutkan & Buat PIN';
                }
            } else {
                groupDob.style.display = 'block';
                dobField.setAttribute('required', 'required');
                groupPin.style.display = 'none';
                pinField.removeAttribute('required');
                hintText.innerHTML = '<strong>ℹ️ Cara masuk untuk Orang Tua</strong>Masukkan <strong>NIS anak</strong> dan <strong>tanggal lahir anak</strong> yang terdaftar di sekolah.';
                btnSubmit.textContent = 'Masuk Dashboard Orang Tua';
            }
        })
        .catch(err => console.error('Error checking NIS:', err));
}

nisInput.addEventListener('input', function() {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(() => checkNis(this.value), 400);
});
nisInput.addEventListener('blur', function() { checkNis(this.value); });
if (nisInput.value) checkNis(nisInput.value);
</script>
</body>
</html>
