<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aktivasi PIN Orang Tua — KB-PAUD Al-Hidayah</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}?v={{ time() }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v={{ time() }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}?v={{ time() }}">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        
        :root {
            --green-dark: #0F2E12;
            --green-primary: #143818;
            --green-medium: #1D5323;
            --green-accent: #10B981;
            --gold: #F4B93E;
            --gold-hover: #E5A82E;
            --line: #E2E8F0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #091F0B 0%, #143818 50%, #0F2E12 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 16px;
            position: relative;
        }

        .main-card {
            width: 100%;
            max-width: 980px;
            display: grid;
            grid-template-columns: 1fr 1.15fr;
            background: #FFFFFF;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 35px 80px rgba(0, 0, 0, 0.35), 0 0 0 1px rgba(255, 255, 255, 0.2);
            position: relative;
            z-index: 10;
        }

        /* ── LEFT PANEL (HERO VISUAL) ── */
        .left-panel {
            background: linear-gradient(160deg, #0F2E12 0%, #143818 60%, #1D5323 100%);
            padding: 52px 42px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: #FFFFFF;
            position: relative;
            overflow: hidden;
        }
        .left-panel::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Ccircle cx='3' cy='3' r='1.5'/%3E%3C/g%3E%3C/svg%3E");
            pointer-events: none;
        }

        .left-header { position: relative; z-index: 2; }
        .logo-row {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 32px;
        }
        .logo-row img {
            height: 52px;
            width: auto;
            filter: drop-shadow(0 4px 10px rgba(0,0,0,0.25));
        }
        .brand-info .brand-name {
            font-family: 'Baloo 2', sans-serif;
            font-size: 22px;
            font-weight: 800;
            line-height: 1.1;
            color: #FFFFFF;
            letter-spacing: 0.02em;
        }
        .brand-info .brand-sub {
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 0.18em;
            color: #F4B93E;
            margin-top: 2px;
            text-transform: uppercase;
        }

        .badge-step {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(16, 185, 129, 0.2);
            border: 1px solid rgba(16, 185, 129, 0.4);
            color: #34D399;
            padding: 5px 14px;
            border-radius: 20px;
            font-size: 11.5px;
            font-weight: 800;
            letter-spacing: 0.06em;
            margin-bottom: 18px;
            text-transform: uppercase;
        }

        .left-body { position: relative; z-index: 2; margin: auto 0; padding: 20px 0; }
        .left-body h2 {
            font-family: 'Baloo 2', sans-serif;
            font-size: 28px;
            font-weight: 800;
            line-height: 1.25;
            color: #FFFFFF;
            margin-bottom: 12px;
        }
        .left-body p {
            color: #CBD5E1;
            font-size: 13.5px;
            line-height: 1.65;
            margin-bottom: 24px;
        }

        /* Security Feature List */
        .feature-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 13px;
            color: #E2E8F0;
            font-weight: 500;
            background: rgba(255, 255, 255, 0.06);
            padding: 10px 14px;
            border-radius: 14px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .feature-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: rgba(16, 185, 129, 0.25);
            color: #34D399;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .left-footer {
            position: relative; z-index: 2;
            padding-top: 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 11.5px;
            color: #94A3B8;
        }

        /* ── RIGHT PANEL (FORM AREA) ── */
        .right-panel {
            padding: 52px 46px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #FFFFFF;
        }

        .form-header {
            margin-bottom: 30px;
        }
        .form-header h3 {
            font-family: 'Baloo 2', sans-serif;
            font-size: 26px;
            font-weight: 800;
            color: var(--green-primary);
            line-height: 1.2;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .form-header .subtitle {
            font-size: 13.5px;
            color: #64748B;
            line-height: 1.6;
        }

        /* Form Group & Input Styling */
        .form-group {
            margin-bottom: 22px;
        }
        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 800;
            color: #334155;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }
        .form-control {
            width: 100%;
            height: 52px;
            padding: 0 46px 0 18px;
            border: 2px solid #E2E8F0;
            border-radius: 14px;
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            font-weight: 800;
            letter-spacing: 6px;
            color: #0F172A;
            background: #F8FAFC;
            transition: all 0.25s ease;
        }
        .form-control::placeholder {
            letter-spacing: 4px;
            color: #CBD5E1;
            font-weight: 600;
        }
        .form-control:focus {
            outline: none;
            border-color: #10B981;
            background: #FFFFFF;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.15);
        }
        .form-control.is-invalid {
            border-color: #EF4444;
            background: #FEF2F2;
        }

        .btn-toggle-pwd {
            position: absolute;
            right: 14px;
            background: none;
            border: none;
            cursor: pointer;
            color: #94A3B8;
            padding: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: color 0.2s ease;
        }
        .btn-toggle-pwd:hover {
            color: #10B981;
        }

        /* Error Alert */
        .alert-danger {
            background: #FEF2F2;
            border: 1px solid #FCA5A5;
            color: #B91C1C;
            padding: 12px 16px;
            border-radius: 14px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 22px;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        /* Submit Button */
        .btn-submit {
            width: 100%;
            height: 54px;
            border: none;
            border-radius: 16px;
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            background: linear-gradient(135deg, #F4B93E 0%, #E5A82E 100%);
            color: #0F2E12;
            box-shadow: 0 8px 20px rgba(244, 185, 62, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(244, 185, 62, 0.45);
            background: linear-gradient(135deg, #F5C252 0%, #EAB308 100%);
        }
        .btn-submit:active {
            transform: translateY(-1px);
        }

        .back-link-box {
            text-align: center;
            margin-top: 24px;
        }
        .back-link {
            font-size: 13px;
            font-weight: 700;
            color: #64748B;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 16px;
            border-radius: 20px;
            transition: all 0.2s ease;
        }
        .back-link:hover {
            color: #0F2E12;
            background: #F1F5F9;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 820px) {
            .main-card {
                grid-template-columns: 1fr;
                border-radius: 24px;
            }
            .left-panel {
                padding: 36px 28px;
            }
            .right-panel {
                padding: 36px 24px;
            }
            .left-body h2 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>

    <div class="main-card">

        <!-- ── LEFT PANEL (HERO VISUAL) ── -->
        <div class="left-panel">
            <div class="left-header">
                <div class="logo-row">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo KB Al Hidayah">
                    <div class="brand-info">
                        <div class="brand-name">KB AL-HIDAYAH</div>
                        <div class="brand-sub">SEKOLAH USIA DINI</div>
                    </div>
                </div>

                <div class="badge-step">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="width:14px;height:14px;"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    <span>Langkah 2 dari 2 • Aktivasi PIN</span>
                </div>
            </div>

            <div class="left-body">
                <h2>Proteksi Keamanan Portal Orang Tua</h2>
                <p>Buat PIN 6-digit rahasia sebagai kunci akses pribadi Anda untuk melihat perkembangan belajar &amp; laporan bulanan buah hati.</p>

                <div class="feature-list">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="width:13px;height:13px;"><polyline points="20 6 9 17 4 12"/></svg>
                        </div>
                        <span>Akses laporan perkembangan anak 100% aman</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="width:13px;height:13px;"><polyline points="20 6 9 17 4 12"/></svg>
                        </div>
                        <span>Login cepat &amp; praktis dengan 6-digit PIN</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="width:13px;height:13px;"><polyline points="20 6 9 17 4 12"/></svg>
                        </div>
                        <span>Privasi data siswa &amp; wali murid terjaga</span>
                    </div>
                </div>
            </div>

            <div class="left-footer">
                &copy; {{ date('Y') }} KB-PAUD Al-Hidayah Wedelan Jepara.
            </div>
        </div>

        <!-- ── RIGHT PANEL (FORM AREA) ── -->
        <div class="right-panel">
            <div class="form-header">
                <h3>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" style="width:26px;height:26px;color:#10B981;"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    <span>Buat PIN Login Baru</span>
                </h3>
                <p class="subtitle">Silakan buat 6-digit PIN angka. PIN ini akan digunakan sebagai kata sandi login Anda selanjutnya.</p>
            </div>

            @if($errors->any())
                <div class="alert-danger">
                    @foreach ($errors->all() as $error)
                        <div style="display:flex;align-items:center;gap:8px;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:15px;height:15px;flex-shrink:0;"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
                            <span>{{ $error }}</span>
                        </div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login.setup-pin.post') }}">
                @csrf
                
                {{-- PIN BARU --}}
                <div class="form-group">
                    <label for="pin">PIN Baru (6-Digit Angka)</label>
                    <div class="input-wrapper">
                        <input type="password" id="pin" name="pin"
                               class="form-control @error('pin') is-invalid @enderror"
                               placeholder="••••••" maxlength="6" inputmode="numeric" pattern="[0-9]*"
                               autocomplete="new-password" data-1p-ignore="true" data-lpignore="true" required autofocus>
                        <button type="button" class="btn-toggle-pwd" onclick="togglePasswordVisibility('pin', this)" title="Tampilkan/Sembunyikan PIN">
                            <svg class="eye-open" viewBox="0 0 24 24" style="width:20px;height:20px;stroke:currentColor;fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            <svg class="eye-closed" viewBox="0 0 24 24" style="width:20px;height:20px;stroke:currentColor;fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;display:none;"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                        </button>
                    </div>
                </div>

                {{-- KONFIRMASI PIN --}}
                <div class="form-group">
                    <label for="pin_confirmation">Konfirmasi PIN Baru</label>
                    <div class="input-wrapper">
                        <input type="password" id="pin_confirmation" name="pin_confirmation"
                               class="form-control"
                               placeholder="••••••" maxlength="6" inputmode="numeric" pattern="[0-9]*"
                               autocomplete="new-password" data-1p-ignore="true" data-lpignore="true" required>
                        <button type="button" class="btn-toggle-pwd" onclick="togglePasswordVisibility('pin_confirmation', this)" title="Tampilkan/Sembunyikan PIN">
                            <svg class="eye-open" viewBox="0 0 24 24" style="width:20px;height:20px;stroke:currentColor;fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            <svg class="eye-closed" viewBox="0 0 24 24" style="width:20px;height:20px;stroke:currentColor;fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;display:none;"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" style="width:19px;height:19px;"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                    <span>Simpan PIN &amp; Masuk Ke Dashboard →</span>
                </button>
            </form>

            <div class="back-link-box">
                <a href="{{ route('login') }}" class="back-link">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                    <span>Batal dan kembali ke halaman Login</span>
                </a>
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
    </script>
</body>
</html>
