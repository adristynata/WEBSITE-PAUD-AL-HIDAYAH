<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tautkan Akun — PAUD Al-Hidayah</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Nunito', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #7C3AED 0%, #F97316 100%);
            display: flex; align-items: center; justify-content: center; padding: 20px;
        }
        .wrap {
            width: 100%; max-width: 480px;
            background: #fff; border-radius: 24px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.25);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #7C3AED, #F97316);
            padding: 36px 32px; text-align: center; color: #fff;
        }
        .header .emoji { font-size: 3rem; margin-bottom: 12px; }
        .header h1 { font-size: 1.4rem; font-weight: 900; margin-bottom: 6px; }
        .header p { font-size: 0.9rem; color: rgba(255,255,255,0.85); line-height: 1.5; }

        .body { padding: 32px; }
        .info-box {
            background: #FFF7ED; border: 1px solid #FED7AA;
            border-radius: 12px; padding: 14px 16px; margin-bottom: 24px;
            font-size: 0.875rem; color: #9A3412; line-height: 1.6;
        }
        .info-box strong { display: block; margin-bottom: 4px; }

        .form-group { margin-bottom: 18px; }
        .form-group label { display: block; font-size: 0.85rem; font-weight: 700; color: #374151; margin-bottom: 6px; }
        .form-control {
            width: 100%; padding: 12px 16px;
            border: 2px solid #E5E7EB; border-radius: 12px;
            font-family: inherit; font-size: 0.95rem; color: #1E293B;
            transition: border-color 0.2s; background: #FAFAFA;
        }
        .form-control:focus { outline: none; border-color: #F97316; background: #fff; }
        .form-control.is-invalid { border-color: #EF4444; }
        .invalid-feedback { color: #EF4444; font-size: 0.8rem; margin-top: 5px; font-weight: 600; }

        .btn-submit {
            width: 100%; padding: 14px;
            background: linear-gradient(135deg, #F97316, #EA580C);
            color: #fff; border: none; border-radius: 12px;
            font-family: inherit; font-size: 1rem; font-weight: 800;
            cursor: pointer; transition: all 0.2s; margin-top: 8px;
        }
        .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(249,115,22,0.4); }

        .logout-link {
            display: block; text-align: center; margin-top: 20px;
            font-size: 0.85rem; color: #94A3B8; text-decoration: none;
        }
        .logout-link:hover { color: #64748B; }
    </style>
</head>
<body>
<div class="wrap">
    <div class="header">
        <div class="emoji">🔗</div>
        <h1>Tautkan Akun ke Data Anak</h1>
        <p>Masukkan NIS dan tanggal lahir anak Anda untuk menghubungkan akun ini.</p>
    </div>
    <div class="body">
        @if(session('success'))
            <div style="background:#DCFCE7;border:1px solid #BBF7D0;color:#16A34A;padding:12px 16px;border-radius:10px;margin-bottom:20px;font-weight:600;font-size:0.875rem">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="info-box">
            <strong>ℹ️ Cara pengisian:</strong>
            NIS dan tanggal lahir ada di buku laporan atau dapat ditanyakan langsung ke pihak sekolah.
        </div>

        <form method="POST" action="{{ route('ortu.tautkan.store') }}">
            @csrf
            <div class="form-group">
                <label for="nis">NIS (Nomor Induk Siswa) <span style="color:red">*</span></label>
                <input type="text" id="nis" name="nis"
                       class="form-control {{ $errors->has('nis') ? 'is-invalid' : '' }}"
                       value="{{ old('nis') }}" placeholder="Contoh: 2025001" required>
                @error('nis')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir Anak <span style="color:red">*</span></label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                       class="form-control {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}"
                       value="{{ old('tanggal_lahir') }}" required>
                @error('tanggal_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn-submit">🔗 Tautkan Sekarang</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-link" style="background:none;border:none;cursor:pointer;width:100%;font-family:inherit">
                Keluar dari akun ini
            </button>
        </form>
    </div>
</div>
</body>
</html>
