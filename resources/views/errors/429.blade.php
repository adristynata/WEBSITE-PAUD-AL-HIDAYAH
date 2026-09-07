<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Keamanan — KB Al-Hidayah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #16A34A;
            --primary-dark: #15803D;
            --secondary: #0D1F10;
            --muted: #64748B;
            --bg: #F4F6F5;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #0F172A;
            background-image: 
                radial-gradient(at 0% 0%, rgba(22, 163, 74, 0.25) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(13, 31, 16, 0.4) 0px, transparent 50%),
                radial-gradient(at 50% 50%, rgba(30, 41, 59, 0.5) 0px, transparent 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 20px;
            color: #1E293B;
        }
        .error-card {
            background: #FFFFFF;
            width: 100%;
            max-width: 480px;
            border-radius: 24px;
            padding: 40px 36px;
            text-align: center;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
        }
        .error-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 6px;
            background: linear-gradient(90deg, #EF4444, #F59E0B, #16A34A);
        }
        .brand-header {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 24px;
            background: #F8FAFC;
            padding: 8px 16px;
            border-radius: 30px;
            border: 1px solid #E2E8F0;
        }
        .brand-header img {
            height: 28px;
            width: auto;
        }
        .brand-header span {
            font-size: 0.85rem;
            font-weight: 800;
            color: #0F172A;
            letter-spacing: 0.3px;
        }
        .icon-circle {
            width: 76px;
            height: 76px;
            background: #FEF2F2;
            color: #EF4444;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            border: 3px solid #FEE2E2;
            box-shadow: 0 8px 20px rgba(239, 68, 68, 0.15);
            animation: pulse-red 2s infinite;
        }
        @keyframes pulse-red {
            0% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.4); }
            70% { box-shadow: 0 0 0 14px rgba(239, 68, 68, 0); }
            100% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
        }
        h1 {
            font-size: 1.4rem;
            font-weight: 800;
            color: #0F172A;
            margin-bottom: 8px;
            line-height: 1.3;
        }
        p.subtitle {
            font-size: 0.88rem;
            color: #64748B;
            line-height: 1.5;
            margin-bottom: 24px;
        }
        
        /* Interactive Timer Box */
        .timer-box {
            background: #F8FAFC;
            border: 1.5px solid #E2E8F0;
            border-radius: 16px;
            padding: 18px 20px;
            margin-bottom: 24px;
        }
        .timer-title {
            font-size: 0.78rem;
            font-weight: 700;
            color: #64748B;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }
        .countdown-display {
            font-size: 2.2rem;
            font-weight: 800;
            color: #EF4444;
            font-variant-numeric: tabular-nums;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }
        .countdown-unit {
            font-size: 0.9rem;
            font-weight: 600;
            color: #64748B;
        }

        .btn-home {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            background: #16A34A;
            color: #FFFFFF;
            font-weight: 700;
            font-size: 0.95rem;
            padding: 14px 24px;
            border-radius: 14px;
            text-decoration: none;
            transition: all 0.25s ease;
            box-shadow: 0 4px 14px rgba(22, 163, 74, 0.3);
        }
        .btn-home:hover {
            background: #15803D;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(22, 163, 74, 0.4);
        }
        .btn-home.disabled {
            background: #CBD5E1;
            color: #64748B;
            cursor: not-allowed;
            box-shadow: none;
            transform: none;
            pointer-events: none;
        }
    </style>
</head>
<body>

<div class="error-card">
    <div class="brand-header">
        <img src="{{ asset('images/logo.png') }}" alt="Logo KB Al Hidayah">
        <span>KB AL HIDAYAH</span>
    </div>

    <div class="icon-circle">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" style="width:36px;height:36px;"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
    </div>
    
    <h1>Terlalu Banyak Percobaan Login</h1>
    
    <p class="subtitle">Demi keamanan akun, sistem mengunci sementara percobaan masuk karena kesalahan pengisian PIN/password 5 kali berturut-turut.</p>

    <!-- Timer Countdown Card -->
    <div class="timer-box">
        <div class="timer-title">Silakan Tunggu Sebelum Mencoba Lagi</div>
        <div class="countdown-display">
            <span id="seconds">60</span>
            <span class="countdown-unit">detik</span>
        </div>
    </div>

    <a href="{{ route('login') }}" id="btn-login" class="btn-home disabled">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;"><path d="M19 12H5"/><polyline points="12 19 5 12 12 5"/></svg>
        <span id="btn-text">Menunggu Waktu Hitung Mundur...</span>
    </a>
</div>

<script>
    let timeLeft = 60;
    const secondsEl = document.getElementById('seconds');
    const btnLogin = document.getElementById('btn-login');
    const btnText = document.getElementById('btn-text');

    const timer = setInterval(() => {
        timeLeft--;
        if (timeLeft > 0) {
            secondsEl.textContent = timeLeft;
        } else {
            clearInterval(timer);
            secondsEl.textContent = "0";
            secondsEl.style.color = "#16A34A";
            
            // Enable button when countdown completes
            btnLogin.classList.remove('disabled');
            btnText.textContent = "Kembali ke Halaman Login Sekarang";
        }
    }, 1000);
</script>

</body>
</html>
