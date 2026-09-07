<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="PAUD Al-Hidayah — Sekolah usia dini yang menumbuhkan rasa ingin tahu dan kebaikan hati anak dalam lingkungan yang aman, menyenangkan, dan penuh inspirasi.">
<title>PAUD Al-Hidayah</title>
<link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}?v={{ time() }}">
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v={{ time() }}">
<link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}?v={{ time() }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  :root{
    --cream:#FFFFFF;
    --cream-soft:#F4F9F4;
    --navy:#1B2B4B;
    --gold:#F4B93E;
    --gold-dark:#E8A317;
    --green:#7CB68B;
    --pink:#F0A6A6;
    --blue:#7A93D6;
    --purple:#9B8BC4;
    --ink:#2B2B33;
    --line:#E2EFE4;
  }
  *{box-sizing:border-box;margin:0;padding:0;}
  html{scroll-behavior:smooth;}
  body{
    font-family:'Poppins',sans-serif;
    color:var(--ink);
    background:var(--cream);
    -webkit-font-smoothing:antialiased;
    overflow-x:hidden;
  }
  h1,h2,h3,.brand{font-family:'Baloo 2',sans-serif;}
  a{text-decoration:none;color:inherit;}
  img{max-width:100%;display:block;}
  .wrap{max-width:1200px;margin:0 auto;padding:0 32px;}
  .eyebrow{
    text-transform:uppercase;
    letter-spacing:.14em;
    font-weight:800;
    font-size:12.5px;
  }



  /* ── HEADER (Clean Modern Sticky White Navbar) ── */
  header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    padding: 14px 0;
    background: rgba(255, 255, 255, 0.96);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border-bottom: 1px solid #E2E8F0;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }
  header.scrolled {
    padding: 10px 0;
    background: #FFFFFF;
    box-shadow: 0 4px 25px rgba(0, 0, 0, 0.08);
    border-bottom: 1px solid #CBD5E1;
  }
  header .wrap {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
  }
  .logo {
    display: flex;
    align-items: center;
    gap: 12px;
    text-decoration: none;
  }
  .logo-text {
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  .logo-text .brand {
    font-size: 17px;
    font-weight: 800;
    color: #143818;
    line-height: 1.2;
    letter-spacing: 0.5px;
  }
  .logo-text .sub {
    font-size: 9.5px;
    font-weight: 700;
    color: #5FA05F;
    line-height: 1.2;
    letter-spacing: 0.8px;
    margin-top: 1px;
    text-transform: uppercase;
  }
  nav {
    display: flex;
    gap: 32px;
    align-items: center;
  }
  .nav-drawer-header,
  .nav-drawer-footer,
  .nav-backdrop,
  .nav-item-icon,
  .nav-item-arrow {
    display: none;
  }
  .nav-menu-list {
    display: flex;
    gap: 32px;
    align-items: center;
  }
  nav a.nav-link-item {
    font-size: 14.5px;
    font-weight: 700;
    color: #334155;
    position: relative;
    padding-bottom: 4px;
    transition: color .2s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
  }
  nav a.nav-link-item:hover, nav a.nav-link-item.active {
    color: #143818;
  }
  nav a.nav-link-item::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 3px;
    background: #143818;
    border-radius: 2px;
    transform: scaleX(0);
    transform-origin: right;
    transition: transform .25s ease-out;
  }
  nav a.nav-link-item:hover::after, nav a.nav-link-item.active::after {
    transform: scaleX(1);
    transform-origin: left;
  }
  .btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    font-size: 14px;
    padding: 10px 26px;
    border-radius: 30px;
    cursor: pointer;
    transition: all .2s ease;
    white-space: nowrap;
    font-family: 'Poppins', sans-serif;
    border: none;
  }
  .btn:hover {
    transform: translateY(-2px);
  }
  .btn-masuk {
    background: #143818;
    color: #fff;
    box-shadow: 0 4px 12px rgba(20, 56, 24, 0.2);
  }
  .btn-masuk:hover {
    background: #0d2610;
    box-shadow: 0 6px 16px rgba(20, 56, 24, 0.3);
    color: #fff;
  }
  
  /* Hamburger Menu Toggle */
  .header-actions {
    display: flex;
    align-items: center;
    gap: 12px;
  }
  .menu-toggle {
    display: none;
    flex-direction: column;
    justify-content: space-between;
    width: 28px;
    height: 18px;
    background: transparent;
    border: none;
    cursor: pointer;
    padding: 0;
    z-index: 120;
  }
  .menu-toggle span {
    width: 100%;
    height: 3px;
    background-color: #143818;
    border-radius: 3px;
    transition: all 0.3s ease;
  }
  .btn-lihat-selengkapnya {
    background: #fff;
    color: #1B2B4B;
    font-size: 13px;
    letter-spacing: 0.5px;
    font-weight: 800;
    padding: 14px 36px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
  }
  .btn-lihat-selengkapnya:hover {
    background: #f5efe0;
  }

  /* ── HERO BANNER SLIDER (Auto-Crossfade & Controls) ── */
  .hero {
    position: relative;
    padding: 0;
    overflow: hidden;
    margin-top: 72px;
    height: 680px;
  }
  .hero-slider {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
  }
  .hero-slide {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    visibility: hidden;
    transition: opacity 1.2s cubic-bezier(0.4, 0, 0.2, 1), transform 6s linear;
    transform: scale(1.05);
  }
  .hero-slide.active {
    opacity: 1;
    visibility: visible;
    transform: scale(1);
  }
  .hero-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
    filter: brightness(1.04) contrast(1.02);
  }
  .hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(20, 56, 24, 0.42) 0%, rgba(20, 56, 24, 0.12) 45%, rgba(14, 38, 17, 0.72) 100%);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 0 32px;
    text-align: center;
    z-index: 2;
    pointer-events: none;
  }
  .hero-overlay * {
    pointer-events: auto;
  }
  
  .hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.22);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.45);
    color: #FFFFFF;
    font-size: 13px;
    font-weight: 700;
    padding: 6px 20px;
    border-radius: 30px;
    margin-bottom: 18px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.12);
    letter-spacing: 0.3px;
  }
  .hero-overlay h1 {
    font-size: 52px;
    line-height: 1.18;
    color: #fff;
    margin-bottom: 16px;
    font-weight: 800;
    text-shadow: 0 3px 20px rgba(0, 0, 0, 0.45);
    text-align: center;
  }
  .hero-title-highlight {
    color: #F4B93E;
    text-shadow: 0 3px 18px rgba(0, 0, 0, 0.5);
  }
  .hero-overlay p.lead {
    font-size: 17.5px;
    color: rgba(255, 255, 255, 0.95);
    max-width: 720px;
    margin: 0 auto 30px;
    line-height: 1.65;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);
    text-align: center;
  }
  .hero-ctas {
    display: flex;
    gap: 16px;
    flex-wrap: wrap;
    justify-content: center;
    width: 100%;
  }
  .btn-hero-gold {
    background: #F4B93E;
    color: #143818;
    font-weight: 800;
    font-size: 14px;
    padding: 13px 30px;
    border-radius: 30px;
    box-shadow: 0 6px 20px rgba(244, 185, 62, 0.35);
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.25s ease;
    text-decoration: none;
  }
  .btn-hero-gold:hover {
    background: #E8A317;
    color: #0A1E0D;
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(244, 185, 62, 0.45);
  }
  .btn-hero-outline {
    background: rgba(255, 255, 255, 0.18);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1.5px solid rgba(255, 255, 255, 0.6);
    color: #FFFFFF;
    font-weight: 700;
    font-size: 14px;
    padding: 13px 26px;
    border-radius: 30px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.25s ease;
    text-decoration: none;
  }
  .btn-hero-outline:hover {
    background: rgba(255, 255, 255, 0.3);
    border-color: #FFFFFF;
    color: #FFFFFF;
    transform: translateY(-3px);
  }

  /* sambutan kepala sekolah */
  .sambutan{padding:35px 0;background:var(--cream-soft);border-top:1px solid var(--line);border-bottom:1px solid var(--line);}
  .sambutan-grid{display:grid;grid-template-columns:260px 1fr;gap:56px;align-items:center;}
  .sambutan-photo{
    border-radius: 16px; /* Elegant rounded rectangle */
    border: 4px solid #fff;
    box-shadow: 0 10px 25px rgba(27, 43, 75, 0.08);
    outline: 3px solid var(--green);
    aspect-ratio: 3/4; /* Formal portrait ratio */
    object-fit: cover;
    width: 100%;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .sambutan-photo:hover{
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(124, 182, 139, 0.25);
  }
  .sambutan-photo-placeholder{
    width:100%;aspect-ratio:3/4;border-radius:16px;
    background:linear-gradient(135deg,#7CB68B,#5FA05F);
    display:flex;align-items:center;justify-content:center;
    font-size:3rem;
    box-shadow:0 8px 30px rgba(124, 182, 139, 0.25);
  }
  .sambutan-content .eyebrow{color:var(--green);margin-bottom:10px;}
  .sambutan-content h2{
    font-family:'Baloo 2',sans-serif;
    font-size:34px;color:var(--navy);
    margin-bottom:6px;line-height:1.15;
  }
  .ks-name{font-size:19px;font-weight:800;color:var(--navy);margin-top:18px;}
  .ks-title{
    font-size:11px;letter-spacing:.14em;font-weight:800;
    color:#7CB68B;text-transform:uppercase;margin-bottom:20px;
    padding-bottom:16px;border-bottom:2px dashed var(--line);
  }
  .sambutan-text {
    font-size:15px;
    line-height:1.85;
    color:#4b4b55;
    text-align: justify;
    text-justify: inter-word;
  }
  .sambutan-text p{
    font-size:15px;line-height:1.85;color:#4b4b55;
    margin-bottom:14px;
    text-align: justify;
    text-justify: inter-word;
  }
  .sambutan-text p:last-child{margin-bottom:0;}
  .sambutan-text .wassalam{font-weight:800;color:var(--navy);margin-top:12px;text-align:left;}

  /* features strip */
  .features{position:relative;z-index:3;margin-top:0;padding-top:0;}
  .features-card{
    background:#ffffff;
    border:none;
    border-radius:0;
    padding:34px 10%;
    display:grid;grid-template-columns:repeat(5,1fr);gap:10px;
    box-shadow:0 12px 35px rgba(124, 182, 139, 0.18);
    position:relative;
    z-index:5;
  }
  .feature-item{text-align:center;padding:0 8px;border-right:none;}
  .feature-item:last-child{border-right:none;}
  .feature-icon{
    width:52px;height:52px;border-radius:50%;
    display:flex;align-items:center;justify-content:center;
    margin:0 auto 14px;
  }
  .feature-icon svg{width:24px;height:24px;stroke:#fff;}
  .feature-item h4{font-size:14px;color:var(--navy);margin-bottom:6px;font-weight:700;}
  .feature-item p{font-size:12px;color:#7c7c85;line-height:1.5;}

  /* ── Tentang / Profil Section (UI Persis Section Program) ── */
  .profil-section {
    padding: 32px 0 24px;
  }
  .profil-inner {
    background: var(--cream-soft);
    border: 1px solid var(--line);
    border-radius: 28px;
    padding: 32px 28px;
  }
  .profil-head {
    text-align: center;
    margin-bottom: 24px;
  }
  .profil-head .eyebrow {
    color: #5FA05F;
    margin-bottom: 6px;
  }
  .profil-head h2 {
    font-size: 32px;
    color: var(--navy);
    margin-top: 6px;
    font-weight: 800;
    font-family: 'Baloo 2', sans-serif;
  }
  .profil-head p {
    font-size: 15px;
    color: #64748B;
    max-width: 720px;
    margin: 10px auto 0;
    line-height: 1.65;
  }
  .profil-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
  }
  .profil-box {
    background: #ffffff;
    border: 1px solid #E2E8F0;
    border-radius: 20px;
    padding: 26px 28px;
    transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    display: flex;
    flex-direction: column;
  }
  .profil-box:hover {
    transform: translateY(-4px);
    box-shadow: 0 16px 32px rgba(27, 43, 75, 0.06);
    border-color: #CBD5E1;
  }

  /* ── PROGRAM PEMBELAJARAN 1 TAHUN ── */
  .programs { padding: 32px 0 24px; }
  .programs-inner {
    background: var(--cream-soft);
    border: 1px solid var(--line);
    border-radius: 28px;
    padding: 32px 28px;
  }
  .programs-head { text-align: center; margin-bottom: 24px; }
  .programs-head .eyebrow { color: #5FA05F; margin-bottom: 6px; }
  .programs-head h2 { font-size: 32px; color: var(--navy); margin-top: 6px; font-weight: 800; font-family: 'Baloo 2', sans-serif; }
  .programs-head p { font-size: 15px; color: #64748B; max-width: 720px; margin: 10px auto 0; line-height: 1.65; }
  
  /* Program Tabs */
  .program-tabs {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-bottom: 24px;
    flex-wrap: wrap;
  }
  .p-tab-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 11px 24px;
    border-radius: 30px;
    background: #fff;
    border: 1.5px solid var(--line);
    color: #475569;
    font-size: 13.5px;
    font-weight: 700;
    cursor: pointer;
    font-family: 'Poppins', sans-serif;
    transition: all 0.25s ease;
  }
  .p-tab-btn:hover {
    border-color: var(--green);
    color: var(--navy);
    transform: translateY(-2px);
  }
  .p-tab-btn.active {
    background: #143818;
    border-color: #143818;
    color: #fff;
    box-shadow: 0 6px 18px rgba(20, 56, 24, 0.2);
  }
  .p-tab-btn svg {
    width: 16px;
    height: 16px;
    stroke: currentColor;
    fill: none;
    stroke-width: 2.2;
    stroke-linecap: round;
    stroke-linejoin: round;
  }
  .p-tab-btn.active svg {
    stroke: var(--gold);
  }

  .program-tab-content {
    display: none;
    animation: fadeInProg .3s ease;
  }
  .program-tab-content.active {
    display: block;
  }
  @keyframes fadeInProg {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }

  /* Grid Layout for Program Themes */
  .program-semester-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 22px;
  }
  .program-box {
    background: #fff;
    border-radius: 20px;
    border: 1px solid var(--line);
    padding: 28px 24px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.02);
    display: flex;
    flex-direction: column;
    gap: 12px;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
  }
  .program-box:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 28px rgba(27, 43, 75, 0.07);
  }
  .pbox-header {
    display: flex;
    align-items: center;
    gap: 14px;
  }
  .pbox-icon {
    width: 50px;
    height: 50px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }
  .pbox-icon svg {
    width: 24px;
    height: 24px;
    stroke: #fff;
    fill: none;
    stroke-width: 2.2;
    stroke-linecap: round;
    stroke-linejoin: round;
  }
  .pbox-badge {
    font-size: 11px;
    font-weight: 800;
    letter-spacing: .08em;
    text-transform: uppercase;
    margin-bottom: 2px;
  }
  .pbox-header h4 {
    font-size: 18px;
    color: var(--navy);
    font-family: 'Baloo 2', sans-serif;
    line-height: 1.25;
  }
  .pbox-body {
    font-size: 13.5px;
    color: #555;
    line-height: 1.65;
  }
  .pbox-highlights {
    margin-top: 6px;
    padding-top: 12px;
    border-top: 1px dashed var(--line);
    display: flex;
    flex-direction: column;
    gap: 6px;
    font-size: 12.5px;
  }
  .pbox-hl-item {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    color: #475569;
    line-height: 1.5;
  }
  .pbox-hl-item span.bullet {
    color: var(--green);
    font-weight: bold;
    font-size: 14px;
    line-height: 1;
  }

  /* ── FLYER BROSUR REALISTIC SPLIT LAYOUT (PERSIS GAMBAR CONTOH) ── */
  .flyer-split-grid {
    display: grid;
    grid-template-columns: 1fr 1.1fr;
    gap: 28px;
    align-items: stretch;
  }

  .flyer-agenda-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
  }

  /* SISI KIRI: POSTER VISUAL FLYER CERIA PAUD */
  .flyer-poster-card {
    background: linear-gradient(180deg, #38BDF8 0%, #0284C7 60%, #0369A1 100%);
    border-radius: 24px;
    padding: 32px 24px 28px;
    color: #FFFFFF;
    position: relative;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(2, 132, 199, 0.25);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    border: 4px solid #FFFFFF;
  }
  .flyer-poster-cloud-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 120px;
    background: radial-gradient(circle at 20% 20%, rgba(255,255,255,0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 30%, rgba(255,255,255,0.25) 0%, transparent 60%);
    pointer-events: none;
  }
  .flyer-poster-badge-top {
    background: #FFD700;
    color: #0F172A;
    font-weight: 900;
    font-size: 12px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    padding: 6px 16px;
    border-radius: 20px;
    display: inline-block;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    margin-bottom: 8px;
  }
  .flyer-poster-title {
    font-family: 'Baloo 2', sans-serif;
    font-size: 38px;
    font-weight: 900;
    line-height: 1;
    color: #FFFFFF;
    text-shadow: 0 3px 6px rgba(0,0,0,0.3), 0 0 12px rgba(255,255,255,0.4);
    margin-bottom: 6px;
  }
  .flyer-poster-subtitle {
    font-size: 13px;
    font-weight: 800;
    background: rgba(255,255,255,0.2);
    backdrop-filter: blur(4px);
    padding: 4px 12px;
    border-radius: 8px;
    display: inline-block;
    letter-spacing: 0.05em;
    margin-bottom: 20px;
    border: 1px solid rgba(255,255,255,0.3);
  }
  .flyer-single-age-badge {
    background: #FFFFFF;
    border-radius: 20px;
    padding: 14px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    margin-bottom: 20px;
    border: 2px solid rgba(255, 255, 255, 0.9);
  }
  .flyer-age-badge-pill {
    display: flex;
    align-items: center;
    gap: 8px;
    background: #ECFDF5;
    padding: 6px 14px;
    border-radius: 12px;
    border: 1px solid #A7F3D0;
  }
  .flyer-age-title {
    font-size: 13px;
    font-weight: 900;
    color: #047857;
    letter-spacing: 0.04em;
  }
  .flyer-age-number-box {
    display: flex;
    align-items: baseline;
    gap: 5px;
    background: #0284C7;
    color: #FFFFFF;
    padding: 6px 16px;
    border-radius: 14px;
    box-shadow: 0 4px 10px rgba(2, 132, 199, 0.3);
  }
  .flyer-age-num {
    font-family: 'Baloo 2', sans-serif;
    font-size: 22px;
    font-weight: 900;
    line-height: 1;
  }
  .flyer-age-lbl {
    font-size: 11px;
    font-weight: 800;
    opacity: 0.9;
    text-transform: uppercase;
  }
  .flyer-age-chips {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
    background: #FFFFFF;
    border-radius: 16px;
    padding: 14px 10px;
    color: #0F172A;
    text-align: center;
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    margin-bottom: 20px;
  }
  .flyer-age-chip {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  .flyer-age-tag {
    background: #0284C7;
    color: #FFFFFF;
    font-size: 11px;
    font-weight: 900;
    padding: 2px 10px;
    border-radius: 10px;
    margin-bottom: 4px;
    text-transform: uppercase;
  }
  .flyer-age-val {
    font-size: 16px;
    font-weight: 900;
    color: #0F172A;
    line-height: 1.1;
  }
  .flyer-age-unit {
    font-size: 11px;
    color: #64748B;
    font-weight: 700;
  }
  .flyer-poster-features-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 20px;
  }
  .flyer-feature-block {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 14px;
    padding: 12px;
    color: #0F172A;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
  }
  .flyer-feature-head {
    background: #EC4899;
    color: #FFFFFF;
    font-size: 11px;
    font-weight: 900;
    padding: 3px 8px;
    border-radius: 6px;
    display: inline-block;
    margin-bottom: 8px;
    text-transform: uppercase;
  }
  .flyer-feature-head.yellow {
    background: #EAB308;
    color: #0F172A;
  }
  .flyer-feature-head.purple {
    background: #8B5CF6;
    color: #FFFFFF;
  }
  .flyer-feature-list {
    list-style: none;
    padding: 0;
    margin: 0;
    font-size: 11.5px;
    color: #334155;
    line-height: 1.45;
    font-weight: 700;
  }
  .flyer-feature-list li {
    margin-bottom: 4px;
    position: relative;
    padding-left: 14px;
  }
  .flyer-feature-list li::before {
    content: "•";
    position: absolute;
    left: 4px;
    color: #0284C7;
    font-weight: bold;
  }
  /* POLAROID GALLERY STACK IN FLYER POSTER */
  .flyer-polaroid-stack {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-top: 10px;
  }
  .flyer-polaroid-item {
    background: #FFFFFF;
    padding: 5px 5px 14px 5px;
    border-radius: 8px;
    box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    width: 31%;
    transform: rotate(-4deg);
    transition: transform 0.3s ease;
  }
  .flyer-polaroid-item:nth-child(2) {
    transform: rotate(3deg) translateY(-6px);
  }
  .flyer-polaroid-item:nth-child(3) {
    transform: rotate(-2deg);
  }
  .flyer-polaroid-item:hover {
    transform: scale(1.08) rotate(0deg);
    z-index: 10;
  }
  .flyer-polaroid-item img {
    width: 100%;
    height: 65px;
    object-fit: cover;
    border-radius: 5px;
  }

  /* SISI KANAN: DETAIL TEKS FLYER BROSUR (KREM / KUNING LEMBUT) */
  .flyer-detail-card {
    background: #FFFBEB;
    border: 2px solid #FDE68A;
    border-radius: 24px;
    padding: 32px 30px;
    box-shadow: 0 16px 35px rgba(217, 119, 6, 0.08);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  .flyer-detail-head h3 {
    font-family: 'Baloo 2', sans-serif;
    font-size: 26px;
    font-weight: 900;
    color: #B45309;
    line-height: 1.25;
    margin-bottom: 20px;
    text-align: center;
  }
  .flyer-section-title {
    font-size: 16px;
    font-weight: 900;
    color: #78350F;
    margin-top: 16px;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .flyer-detail-text {
    font-size: 13.5px;
    color: #451A03;
    line-height: 1.6;
  }
  .flyer-detail-list {
    margin: 4px 0 14px 18px;
    padding: 0;
    font-size: 13px;
    color: #78350F;
    line-height: 1.6;
  }
  .flyer-detail-list li {
    margin-bottom: 4px;
  }

  /* testimonial + cta */
  .bottom-row{padding:0 0 90px;}
  .bottom-grid{display:grid;grid-template-columns:1fr 1fr 1.2fr;gap:24px;}
  .testi-card{
    background:var(--cream-soft);border:1px solid var(--line);
    border-radius:22px;padding:34px;display:flex;flex-direction:column;justify-content:center;gap:18px;
  }
  .testi-avatar{display:flex;align-items:center;gap:14px;}
  .testi-avatar img{width:52px;height:52px;border-radius:50%;object-fit:cover;}
  .quote-mark{font-family:'Baloo 2',sans-serif;font-size:34px;color:var(--gold);line-height:.4;}
  .testi-card p{font-size:15px;line-height:1.65;color:#4b4b55;font-style:italic;}
  .testi-name{font-size:13px;font-weight:800;color:var(--navy);}
  .cta-card{
    background:var(--navy);border-radius:22px;color:#fff;
    padding:34px 28px;display:flex;flex-direction:column;justify-content:center;gap:16px;
    position:relative;overflow:hidden;
  }
  .cta-card h3{font-size:27px;font-family:'Baloo 2',sans-serif;}
  .cta-card p{font-size:14px;color:#c7cde0;line-height:1.6;}
  .cta-card .btn-gold{width:fit-content;margin-top:6px;font-size:12px;padding:10px 20px;}
  .map-card{
    border-radius:22px;overflow:hidden;border:1px solid var(--line);
    height:100%;min-height:300px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
  }

  /* footer strip */
  footer{padding:44px 0 60px;position:relative;}
  .foot-top{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:16px;margin-bottom:36px;}
  .foot-copy{font-size:12px;color:#8b8672;}
  .foot-strip{
    display:grid;grid-template-columns:repeat(4,1fr);gap:20px;
    padding-top:36px;border-top:1px solid var(--line);
  }
  .foot-item{display:flex;align-items:center;gap:12px;}
  .foot-item .fi-icon{
    width:38px;height:38px;border-radius:10px;background:var(--cream-soft);
    display:flex;align-items:center;justify-content:center;flex-shrink:0;
  }
  .foot-item .fi-icon svg{width:18px;height:18px;stroke:var(--navy);}
  .foot-item h5{font-size:13px;color:var(--navy);font-weight:800;margin-bottom:2px;}
  .foot-item p{font-size:11.5px;color:#8b8b93;}

  /* Portal Ortu CMS Classes */
  .portal-ortu{
    padding:35px 0;
    background:var(--cream-soft);
    border-top:1px solid var(--line);
    border-bottom:1px solid var(--line);
  }
  .portal-header{
    text-align:center;
    margin-bottom:48px;
  }
  .portal-header .eyebrow{
    color:var(--blue);
  }
  .portal-header h2{
    font-size:30px;
    color:var(--navy);
    margin-top:10px;
  }
  .portal-header p{
    color:#5b5c66;
    font-size:15px;
    max-width:520px;
    margin:12px auto 0;
    line-height:1.7;
  }
  .portal-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;
    margin-bottom:40px;
  }
  .portal-card{
    background:#fff;
    border-radius:18px;
    padding:28px 24px;
    border:1px solid var(--line);
    text-align:center;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }
  .portal-card:hover{
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(27,43,75,0.06);
  }
  .portal-card .icon{
    font-size:2rem;
    margin-bottom:12px;
  }
  .portal-card h4{
    font-family:'Baloo 2',sans-serif;
    color:var(--navy);
    font-size:16px;
    margin-bottom:8px;
  }
  .portal-card p{
    font-size:13px;
    color:#7c7c85;
    line-height:1.55;
  }
  .portal-footer{
    text-align:center;
  }
  .portal-footer p{
    margin-top:14px;
    font-size:12.5px;
    color:#8b8b93;
  }

  /* Mobile Masuk Button in Nav Drawer */
  .btn-masuk-mobile {
    display: none;
  }

  /* ── RESPONSIVE DESIGN ────────────────────────────────────────────────── */
  @media (max-width: 1024px) {
    .wrap { padding: 0 24px; }
    .sambutan-grid { gap: 40px; }
    .valued-grid { gap: 40px; }
    .program-grid { grid-template-columns: repeat(2, 1fr); gap: 16px; }
    .bottom-grid { grid-template-columns: 1fr 1fr; }
    .map-card { grid-column: span 2; min-height: 320px; }
  }

  @media (max-width: 768px) {
    /* Header & Navigation */
    header { padding: 12px 0; }
    header .btn-masuk { display: none; } /* Hide desktop button */
    
    .logo img { height: 34px !important; }
    .logo-text .brand { font-size: 18px; }
    .logo-text .sub { font-size: 8px; }

    /* Mobile Drawer Backdrop */
    .nav-backdrop {
      display: block;
      position: fixed;
      inset: 0;
      background: rgba(15, 23, 42, 0.6);
      backdrop-filter: blur(6px);
      -webkit-backdrop-filter: blur(6px);
      z-index: 1050;
      opacity: 0;
      visibility: hidden;
      transition: opacity 0.3s ease, visibility 0.3s ease;
    }
    .nav-backdrop.active {
      opacity: 1;
      visibility: visible;
    }

    /* Mobile Drawer Nav Container */
    nav {
      position: fixed;
      top: 0;
      right: 0;
      width: 320px;
      max-width: 86vw;
      height: 100vh;
      background: #FFFFFF;
      flex-direction: column;
      align-items: stretch;
      justify-content: space-between;
      gap: 0;
      padding: 0;
      box-shadow: -10px 0 35px rgba(0, 0, 0, 0.18);
      transform: translateX(100%);
      transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1);
      z-index: 1060;
      border-top-left-radius: 24px;
      border-bottom-left-radius: 24px;
      overflow-y: auto;
    }
    nav.active {
      transform: translateX(0);
    }

    /* Drawer Header */
    .nav-drawer-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 18px 20px;
      border-bottom: 1px solid #EEF2F6;
      background: #FAFDFB;
      border-top-left-radius: 24px;
    }
    .drawer-brand {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .nav-drawer-close {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: #F1F5F9;
      display: flex;
      align-items: center;
      justify-content: center;
      border: none;
      cursor: pointer;
      color: #64748B;
      transition: all 0.2s ease;
    }
    .nav-drawer-close:hover {
      background: #EF4444;
      color: #FFFFFF;
      transform: rotate(90deg);
    }

    /* Menu List */
    .nav-menu-list {
      display: flex;
      flex-direction: column;
      gap: 8px;
      padding: 18px 16px;
      flex: 1;
    }
    nav a.nav-link-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 12px 14px;
      border-radius: 14px;
      font-size: 15px;
      font-weight: 700;
      color: #334155;
      text-align: left;
      transition: all 0.2s ease;
      background: transparent;
      width: 100%;
      border: 1px solid transparent;
      box-sizing: border-box;
    }
    nav a.nav-link-item::after { display: none !important; }
    nav a.nav-link-item:hover, nav a.nav-link-item.active {
      background: #EBF5EE;
      color: #143818;
      border-color: #D1E7D6;
    }
    .nav-item-left {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .nav-item-icon {
      display: flex;
      width: 36px;
      height: 36px;
      border-radius: 10px;
      background: #F4F9F4;
      color: #143818;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      transition: all 0.2s ease;
    }
    .nav-item-icon svg {
      width: 18px;
      height: 18px;
    }
    nav a.nav-link-item:hover .nav-item-icon, nav a.nav-link-item.active .nav-item-icon {
      background: #143818;
      color: #F4B93E;
    }
    .nav-item-arrow {
      display: block;
      font-size: 18px;
      color: #94A3B8;
      font-weight: 400;
      transition: transform 0.2s ease;
    }
    nav a.nav-link-item:hover .nav-item-arrow, nav a.nav-link-item.active .nav-item-arrow {
      color: #143818;
      transform: translateX(3px);
    }

    /* Drawer Footer */
    .nav-drawer-footer {
      display: flex;
      padding: 16px 18px 24px;
      border-top: 1px solid #EEF2F6;
      background: #FAFDFB;
      flex-direction: column;
      gap: 10px;
      border-bottom-left-radius: 24px;
    }
    .btn-masuk-drawer {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      background: #143818;
      color: #FFFFFF !important;
      font-weight: 800;
      font-size: 14px;
      padding: 12px 18px;
      border-radius: 30px;
      box-shadow: 0 4px 14px rgba(20, 56, 24, 0.25);
      transition: all 0.2s ease;
      width: 100%;
      text-decoration: none;
      box-sizing: border-box;
    }
    .btn-masuk-drawer:hover {
      background: #0d2610;
      transform: translateY(-2px);
    }

    .menu-toggle {
      display: flex;
    }
    /* Hamburger to X transition */
    .menu-toggle.active span:nth-child(1) {
      transform: translateY(7.5px) rotate(45deg);
    }
    .menu-toggle.active span:nth-child(2) {
      opacity: 0;
    }
    .menu-toggle.active span:nth-child(3) {
      transform: translateY(-7.5px) rotate(-45deg);
    }
    
    /* Hero Section */
    .hero { margin-top: 60px; }
    .hero-banner { height: 500px; }
    .hero-overlay { padding-top: 20px; }
    .hero-overlay h1 { font-size: 32px; line-height: 1.25; text-align: center; }
    .hero-overlay p.lead { font-size: 14px; margin: 0 auto 20px; max-width: 100%; text-align: center; }
    .btn-lihat-selengkapnya { padding: 12px 28px; }

    /* Features Strip */
    .features-card { grid-template-columns: repeat(2, 1fr); padding: 24px 16px; gap: 16px; }
    .feature-item { padding: 8px; border-right: none; }
    .feature-item:nth-child(5) { grid-column: span 2; }

    /* Sambutan Kepala Sekolah */
    .sambutan { padding: 28px 0; }
    .sambutan-grid { grid-template-columns: 1fr; text-align: center; gap: 28px; }
    .sambutan-photo { max-width: 180px; margin: 0 auto; aspect-ratio: 3/4; }
    .ks-title { justify-content: center; margin-bottom: 12px; padding-bottom: 10px; }
    .sambutan-text p {
      font-size: 14px;
      line-height: 1.7;
      text-align: justify;
      text-justify: inter-word;
    }
    .sambutan-text .wassalam {
      text-align: left;
    }

    /* Tentang Kami (Profil) */
    .profil-section { padding: 28px 0 20px; }
    .profil-head { margin-bottom: 20px; }
    .profil-head h2 { font-size: 24px; }
    .profil-cards { gap: 16px; padding: 0 12px; }
    .profil-card {
      padding: 22px 20px;
      border-radius: 16px;
      gap: 12px;
    }
    .card-header-row { gap: 12px; }
    .card-icon { width: 40px; height: 40px; }
    .card-icon svg { width: 20px; height: 20px; }
    .card-header-row h3 { font-size: 19px; }
    .card-content {
      font-size: 14px;
      line-height: 1.7;
      text-align: justify;
      text-justify: inter-word;
    }
    .card-content p {
      margin-bottom: 10px;
      text-align: justify;
      text-justify: inter-word;
    }
    .card-content ul { margin-top: 8px; gap: 6px; }
    .card-content li {
      padding-left: 20px;
      font-size: 13.5px;
      line-height: 1.55;
      text-align: left;
    }

    /* Portal Orang Tua */
    .portal-ortu { padding: 28px 0; }
    .portal-grid { grid-template-columns: 1fr; gap: 16px; }
    .portal-header h2 { font-size: 24px; }
  }

  @media (max-width: 576px) {
    /* Header logo resize */
    .logo img { height: 28px !important; }
    .logo-text .brand { font-size: 15px; }
    .logo-text .sub { display: none; } /* Hide subtitle to fit small screens */
    header { padding: 10px 0; }
    
    /* Hero text sizing */
    .hero { margin-top: 54px; }
    .hero-banner { height: 440px; }
    .hero-overlay h1 { font-size: 24px; text-align: center; }
    .hero-overlay p.lead { font-size: 13px; line-height: 1.6; margin: 0 auto 20px; text-align: center; }

    /* Features Strip */
    .features-card { grid-template-columns: 1fr; gap: 12px; }
    .feature-item:nth-child(5) { grid-column: span 1; }
    
    /* Sambutan Kepala Sekolah */
    .sambutan-text p {
      font-size: 13.5px;
      line-height: 1.65;
      text-align: justify;
      text-justify: inter-word;
    }

    /* Program Grid */
    .programs { padding: 28px 0; }
    .programs-inner { padding: 20px 14px; }
    .programs-head h2 { font-size: 22px; }
    .program-semester-grid { grid-template-columns: 1fr; gap: 14px; }
    .pbox-header h4 { font-size: 16.5px; }
    .pbox-body {
      font-size: 13px;
      line-height: 1.6;
      text-align: justify;
      text-justify: inter-word;
    }

    /* Tentang Kami (Profil) */
    .profil-section { padding: 28px 0; }
    .profil-inner { padding: 20px 14px; }
    .profil-inner { padding: 28px 16px; }
    .profil-head h2 { font-size: 24px; }
    .profil-grid { grid-template-columns: 1fr; gap: 14px; }
    .profil-card {
      padding: 20px 18px;
      border-radius: 14px;
      gap: 10px;
    }
    .card-header-row { gap: 10px; }
    .card-icon { width: 36px; height: 36px; }
    .card-icon svg { width: 18px; height: 18px; }
    .card-header-row h3 { font-size: 17.5px; }
    .card-content {
      font-size: 13.5px;
      line-height: 1.65;
      text-align: justify;
      text-justify: inter-word;
    }
    .card-content p {
      margin-bottom: 8px;
      text-align: justify;
      text-justify: inter-word;
    }
    .card-content li {
      padding-left: 18px;
      font-size: 13px;
      line-height: 1.5;
      text-align: left;
    }
    .card-watermark { display: none; }

    /* Testimonial & Contact */
    .bottom-row { padding-bottom: 60px; }
    .bottom-grid { grid-template-columns: 1fr; gap: 16px; }
    .testi-card { padding: 24px; }
    .cta-card { padding: 28px; }
    .cta-card h3 { font-size: 22px; }
    .map-card { grid-column: span 1; min-height: 280px; }

    /* Footer structure */
    .foot-strip { grid-template-columns: 1fr; gap: 16px; }
    .foot-top { flex-direction: column; text-align: center; gap: 12px; }

    /* Flyer Brosur Responsive HP & Tablet */
    .flyer-split-grid {
      grid-template-columns: 1fr !important;
      gap: 24px !important;
    }
    .flyer-poster-card, .flyer-detail-card {
      padding: 22px 16px !important;
      border-radius: 20px !important;
    }
    .flyer-poster-title {
      font-size: 26px !important;
    }
    .flyer-detail-head h3 {
      font-size: 20px !important;
    }
    .flyer-poster-features-grid {
      grid-template-columns: 1fr !important;
      gap: 10px !important;
    }
    .flyer-agenda-grid {
      grid-template-columns: 1fr !important;
      gap: 10px !important;
    }
  }

  /* Gallery Section */
  .gallery-sec {
    padding: 80px 0;
    background: var(--cream);
  }
  .btn-lihat-semua-galeri {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: #143818;
    color: #FFFFFF;
    font-size: 15px;
    font-weight: 800;
    padding: 14px 36px;
    border-radius: 30px;
    box-shadow: 0 4px 16px rgba(20, 56, 24, 0.22);
    transition: all 0.3s ease;
    text-decoration: none;
  }
  .btn-lihat-semua-galeri:hover {
    background: #0D2610;
    transform: translateY(-3px);
    box-shadow: 0 8px 24px rgba(20, 56, 24, 0.35);
    color: #FFFFFF;
  }
  .gallery-head {
    text-align: center;
    margin-bottom: 48px;
  }
  .gallery-head h2 {
    font-size: 32px;
    color: var(--navy);
    margin-top: 8px;
  }
  .gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 24px;
  }
  .gallery-card {
    background: var(--cream-soft);
    border: 1px solid var(--line);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0,0,0,0.02);
    transition: transform .25s ease, box-shadow .25s ease;
    cursor: pointer;
    position: relative;
  }
  .gallery-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 28px rgba(27,43,75,0.12);
  }
  .gallery-img-wrapper {
    width: 100%;
    height: 220px;
    overflow: hidden;
    background: #eee;
    position: relative;
  }
  .gallery-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .35s ease;
  }
  .gallery-card:hover .gallery-img-wrapper img {
    transform: scale(1.08);
  }
  .gallery-overlay-badge {
    position: absolute;
    bottom: 12px;
    right: 12px;
    background: rgba(20, 56, 24, 0.85);
    color: #fff;
    font-size: 11px;
    font-weight: 700;
    padding: 5px 12px;
    border-radius: 20px;
    backdrop-filter: blur(6px);
    display: flex;
    align-items: center;
    gap: 5px;
    opacity: 0;
    transform: translateY(6px);
    transition: all 0.25s ease;
  }
  .gallery-card:hover .gallery-overlay-badge {
    opacity: 1;
    transform: translateY(0);
  }
  .gallery-info {
    padding: 18px 20px;
  }
  .gallery-info h4 {
    font-size: 16px;
    color: var(--navy);
    margin-bottom: 6px;
    font-weight: 700;
  }
  .gallery-info p {
    font-size: 13px;
    color: #666;
    line-height: 1.55;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .gallery-empty {
    grid-column: 1 / -1;
    text-align: center;
    padding: 48px;
    background: var(--cream-soft);
    border: 1px dashed var(--line);
    border-radius: 20px;
    color: #777;
  }

  /* ── FULLSCREEN GALLERY LIGHTBOX MODAL ── */
  .lightbox-modal {
    position: fixed;
    inset: 0;
    z-index: 99999;
    background: rgba(10, 15, 29, 0.96);
    backdrop-filter: blur(16px);
    display: none;
    flex-direction: column;
    justify-content: space-between;
    opacity: 0;
    transition: opacity 0.3s ease;
    padding: 20px;
  }
  .lightbox-modal.active {
    display: flex;
    opacity: 1;
  }
  .lightbox-topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #fff;
    width: 100%;
    max-width: 1200px;
    margin: 0 auto 10px;
    z-index: 10;
  }
  .lightbox-counter {
    background: rgba(255,255,255,0.12);
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.5px;
    color: #E2E8F0;
  }
  .lightbox-actions {
    display: flex;
    gap: 10px;
    align-items: center;
  }
  .lightbox-btn {
    background: rgba(255,255,255,0.12);
    border: 1px solid rgba(255,255,255,0.2);
    color: #fff;
    padding: 8px 16px;
    border-radius: 30px;
    cursor: pointer;
    font-size: 13px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s ease;
    text-decoration: none;
  }
  .lightbox-btn:hover {
    background: rgba(255,255,255,0.25);
    color: #F4B93E;
    transform: scale(1.05);
  }
  .lightbox-close-btn {
    background: rgba(239, 68, 68, 0.2);
    border: 1px solid rgba(239, 68, 68, 0.4);
    color: #FCA5A5;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
  }
  .lightbox-close-btn:hover {
    background: #EF4444;
    color: #fff;
    transform: rotate(90deg);
  }
  .lightbox-body {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    max-width: 1200px;
    width: 100%;
    margin: 0 auto;
    gap: 30px;
  }
  .lightbox-image-container {
    flex: 1.4;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    max-height: 68vh;
  }
  .lightbox-image-container img {
    max-width: 100%;
    max-height: 68vh;
    object-fit: contain;
    border-radius: 14px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.6);
    transition: transform 0.3s ease;
  }
  .lightbox-detail-panel {
    flex: 0.9;
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 20px;
    padding: 28px 24px;
    color: #fff;
    backdrop-filter: blur(10px);
    display: flex;
    flex-direction: column;
    gap: 16px;
    max-height: 68vh;
    overflow-y: auto;
  }
  .lightbox-detail-panel h3 {
    font-size: 22px;
    color: #FFFFFF;
    font-family: 'Baloo 2', sans-serif;
    line-height: 1.3;
  }
  .lightbox-date-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(244, 185, 62, 0.15);
    color: #F4B93E;
    border: 1px solid rgba(244, 185, 62, 0.3);
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    width: fit-content;
  }
  .lightbox-desc {
    font-size: 14.5px;
    color: #CBD5E1;
    line-height: 1.7;
    white-space: pre-line;
  }
  .lightbox-nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255,255,255,0.12);
    border: 1px solid rgba(255,255,255,0.25);
    color: #fff;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
    z-index: 10;
  }
  .lightbox-nav-btn:hover {
    background: #143818;
    border-color: #F4B93E;
    color: #F4B93E;
    transform: translateY(-50%) scale(1.1);
  }
  .lightbox-prev { left: -24px; }
  .lightbox-next { right: -24px; }

  @media (max-width: 900px) {
    .lightbox-body {
      flex-direction: column;
      overflow-y: auto;
      gap: 16px;
    }
    .lightbox-image-container {
      max-height: 45vh;
      width: 100%;
    }
    .lightbox-image-container img {
      max-height: 45vh;
    }
    .lightbox-detail-panel {
      width: 100%;
      max-height: none;
      padding: 20px;
    }
    .lightbox-prev { left: 10px; }
    .lightbox-next { right: 10px; }
  }
</style>
</head>
<body>



{{-- ── HEADER ──────────────────────────────────────────────────────────── --}}
<header>
  <div class="wrap">
    <a href="{{ route('home') }}" class="logo">
      <img src="{{ asset('images/logo.png') }}" alt="Logo KB Al Hidayah" style="height:44px;width:auto;display:block;">
      <div class="logo-text">
        <div class="brand">PAUD AL HIDAYAH</div>
        <div class="sub">SEKOLAH USIA DINI</div>
      </div>
    </a>

    <!-- Backdrop Dimmer for Mobile Drawer -->
    <div class="nav-backdrop" id="navBackdrop" onclick="closeMobileNav()"></div>

    <nav id="mobileNav">
      <!-- Mobile Drawer Header -->
      <div class="nav-drawer-header">
        <div class="drawer-brand">
          <img src="{{ asset('images/logo.png') }}" alt="Logo PAUD" style="height:34px;width:auto;">
          <div>
            <div style="font-size:15px;font-weight:800;color:var(--navy);line-height:1.2;">PAUD AL HIDAYAH</div>
            <div style="font-size:9.5px;font-weight:700;color:var(--green);text-transform:uppercase;letter-spacing:0.5px;">Menu Navigasi</div>
          </div>
        </div>
        <button type="button" class="nav-drawer-close" onclick="closeMobileNav()" aria-label="Tutup Menu">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="width:18px;height:18px;"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>
      </div>

      <!-- Navigation Links with Icons -->
      <div class="nav-menu-list">
        <a href="{{ route('home') }}" class="nav-link-item {{ request()->routeIs('home') ? 'active' : '' }}">
          <div class="nav-item-left">
            <div class="nav-item-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            </div>
            <span>Beranda</span>
          </div>
          <span class="nav-item-arrow">›</span>
        </a>

        <a href="#tentang" class="nav-link-item">
          <div class="nav-item-left">
            <div class="nav-item-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20M4 19.5A2.5 2.5 0 0 0 6.5 22H20M4 19.5V3A2.5 2.5 0 0 1 6.5 .5H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5z"/></svg>
            </div>
            <span>Tentang Kami</span>
          </div>
          <span class="nav-item-arrow">›</span>
        </a>

        <a href="#program" class="nav-link-item">
          <div class="nav-item-left">
            <div class="nav-item-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            </div>
            <span>Program Unggulan</span>
          </div>
          <span class="nav-item-arrow">›</span>
        </a>

        <a href="{{ route('prestasi') }}" class="nav-link-item {{ request()->routeIs('prestasi') ? 'active' : '' }}">
          <div class="nav-item-left">
            <div class="nav-item-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.45 1-1 1H7v3h10v-3h-2c-.55 0-1-.45-1-1v-2.34"/><path d="M18 4H6v7a6 6 0 0 0 12 0V4z"/></svg>
            </div>
            <span>Prestasi</span>
          </div>
          <span class="nav-item-arrow">›</span>
        </a>

        <a href="#galeri" class="nav-link-item">
          <div class="nav-item-left">
            <div class="nav-item-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
            </div>
            <span> Kegiatan</span>
          </div>
          <span class="nav-item-arrow">›</span>
        </a>

        <a href="#kontak" class="nav-link-item">
          <div class="nav-item-left">
            <div class="nav-item-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            </div>
            <span>Kontak</span>
          </div>
          <span class="nav-item-arrow">›</span>
        </a>
      </div>

      <!-- Mobile Drawer Footer -->
      <div class="nav-drawer-footer">
        <a href="{{ route('login') }}" class="btn-masuk-drawer">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" style="width:16px;height:16px;"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
          <span>Masuk Portal Orang Tua</span>
        </a>
        <div style="font-size:11px;color:#94A3B8;text-align:center;">
          KB-PAUD Al-Hidayah • Bangsri Jepara
        </div>
      </div>
    </nav>

    <div class="header-actions">
      <a href="{{ route('login') }}" class="btn btn-masuk">Masuk</a>
      <button class="menu-toggle" id="menuToggle" aria-label="Buka Menu" onclick="toggleMobileNav()">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
  </div>
</header>

{{-- ── HERO SLIDER ─────────────────────────────────────────────────────── --}}
<section class="hero" id="beranda">
  <div class="hero-slider">
    <!-- Slide 1: Outdoor Playground & Building -->
    <div class="hero-slide active">
      <img src="{{ asset('images/' . ($profil->hero_slide_1 ?? 'hero-slide-1.jpg')) }}" 
           alt="Gedung & Taman Bermain PAUD Al Hidayah"
           onerror="this.src='{{ asset('images/gedung-sekolah.jpg') }}'">
    </div>
    <!-- Slide 2: Classroom Learning & Arts -->
    <div class="hero-slide">
      <img src="{{ asset('images/' . ($profil->hero_slide_2 ?? 'hero-slide-2.jpg')) }}" 
           alt="Aktivitas Belajar Ceria Kelas PAUD Al Hidayah"
           onerror="this.src='{{ asset('images/hero-slide-2.jpg') }}'">
    </div>
    <!-- Slide 3: Islamic School Building -->
    <div class="hero-slide">
      <img src="{{ asset('images/' . ($profil->hero_slide_3 ?? 'hero-slide-3.jpg')) }}" 
           alt="Gedung Islami PAUD Al Hidayah"
           onerror="this.src='{{ asset('images/hero-slide-3.jpg') }}'">
    </div>
    <!-- Slide 4: Creativity & Early Learning -->
    <div class="hero-slide">
      <img src="{{ asset('images/' . ($profil->hero_slide_4 ?? 'hero-slide-4.jpg')) }}" 
           alt="Kreativitas dan Keceriaan Belajar PAUD Al Hidayah"
           onerror="this.src='{{ asset('images/hero-paud-ceria.jpg') }}'">
    </div>
    <!-- Slide 5: Friendship & Holistic Growth -->
    <div class="hero-slide">
      <img src="{{ asset('images/' . ($profil->hero_slide_5 ?? 'hero-slide-5.jpg')) }}" 
           alt="Kebersamaan & Tumbuh Kembang PAUD Al Hidayah"
           onerror="this.src='{{ asset('images/gedung-sekolah.jpg') }}'">
    </div>
  </div>

  <div class="hero-overlay">
    <h1>Selamat Datang di<br><span class="hero-title-highlight">PAUD Al Hidayah</span></h1>
    <p class="lead">Membentuk generasi cerdas, mandiri, dan berakhlakul karimah melalui lingkungan belajar yang ceria, aman, dan penuh kasih sayang.</p>
    <div class="hero-ctas">
      <a href="#tentang" class="btn btn-hero-gold">
        <span>Lihat Selengkapnya</span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="width:16px;height:16px;"><polyline points="9 18 15 12 9 6"/></svg>
      </a>
    </div>
  </div>
</section>

{{-- ── FEATURE STRIP ────────────────────────────────────────────────────── --}}
<section class="features">
  <div class="features-card">
      <div class="feature-item">
        <div class="feature-icon" style="background:var(--green)">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 2l8 4v6c0 5-3.5 8.5-8 10-4.5-1.5-8-5-8-10V6l8-4z"/>
          </svg>
        </div>
        <h4>Lingkungan Aman<br>dan Penuh Kasih</h4>
        <p>Ruang yang aman dan hangat untuk setiap anak.</p>
      </div>
      <div class="feature-item">
        <div class="feature-icon" style="background:var(--gold-dark)">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 6.5C10 5 6.5 4 3 4v13c3.5 0 7 1 9 2.5M12 6.5C14 5 17.5 4 21 4v13c-3.5 0-7 1-9 2.5V6.5z"/>
          </svg>
        </div>
        <h4>Belajar Sambil<br>Bermain</h4>
        <p>Metode praktik yang membangkitkan rasa ingin tahu.</p>
      </div>
      <div class="feature-item">
        <div class="feature-icon" style="background:var(--blue)">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 17.3l-6.16 3.6 1.64-7-5.4-4.7 7.14-.6L12 2l2.78 6.6 7.14.6-5.4 4.7 1.64 7z"/>
          </svg>
        </div>
        <h4>Guru yang<br>Berpengalaman</h4>
        <p>Pendidik yang berdedikasi pada tumbuh kembang anak.</p>
      </div>
      <div class="feature-item">
        <div class="feature-icon" style="background:var(--pink)">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 21s-7-4.35-9.5-8.5C.7 9 2 5.5 5.5 5c2-.3 3.5.7 4.5 2 1-1.3 2.5-2.3 4.5-2 3.5.5 4.8 4 3 7.5C19 16.65 12 21 12 21z"/>
          </svg>
        </div>
        <h4>Perkembangan<br>Holistik</h4>
        <p>Mendukung tumbuh kembang akademik, sosial, emosional.</p>
      </div>
      <div class="feature-item">
        <div class="feature-icon" style="background:var(--purple)">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 2l8 3.5v5c0 5.2-3.4 9.4-8 11.5-4.6-2.1-8-6.3-8-11.5v-5L12 2z"/>
          </svg>
        </div>
        <h4>Kemitraan<br>Orang Tua yang Kuat</h4>
        <p>Bersama membangun fondasi kokoh untuk kesuksesan.</p>
      </div>
    </div>
</section>

{{-- ── SAMBUTAN KEPALA SEKOLAH ─────────────────────────────────────────── --}}
<section class="sambutan" id="sambutan">
  <div class="wrap">
    <div class="sambutan-grid">
      <img
        class="sambutan-photo"
        src="{{ ($profil && $profil->sambutan_foto) ? asset('images/' . $profil->sambutan_foto) : asset('images/foto kepsek1.jpg') }}"
        alt="Kepala Sekolah PAUD Al-Hidayah"
        onerror="this.src='https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=600'">
      
      <div class="sambutan-content">
        <div class="eyebrow">Sambutan Kepala Sekolah</div>
        <h2>{{ $profil ? $profil->sambutan_judul : 'Mewujudkan Generasi Berakhlak Mulia & Kreatif' }}</h2>
        <div class="ks-name">{{ $profil ? $profil->sambutan_nama : 'Sri Wahyuni, S.Pd.' }}</div>
        <div class="ks-title">{{ $profil ? $profil->sambutan_jabatan : 'Kepala Sekolah PAUD Al-Hidayah' }}</div>
        
        <div class="sambutan-text">
          @if($profil && $profil->sambutan_teks)
            @foreach(explode("\n", str_replace("\r", "", $profil->sambutan_teks)) as $paragraph)
              @if(trim($paragraph) != '')
                <p class="{{ str_contains(strtolower($paragraph), 'wassalamu') ? 'wassalam' : '' }}">{{ $paragraph }}</p>
              @endif
            @endforeach
          @else
            <p>Assalamu'alaikum Warahmatullahi Wabarakatuh,</p>
            <p>Puji syukur senantiasa kita panjatkan ke hadirat Allah SWT yang telah melimpahkan rahmat, taufik, serta hidayah-Nya kepada kita semua. Shalawat beserta salam semoga selalu tercurahkan kepada junjungan kita Nabi Muhammad SAW, keluarga, para sahabat, dan pengikutnya hingga akhir zaman.</p>
            <p>Selamat datang di website resmi KB-PAUD Al-Hidayah Wedelan, Kecamatan Bangsri, Kabupaten Jepara. Website ini kami hadirkan sebagai sarana informasi, komunikasi, serta transparansi perkembangan belajar anak didik kepada orang tua siswa dan masyarakat luas.</p>
            <p>Kami percaya bahwa setiap anak terlahir dengan anugerah potensi emasnya masing-masing. Bersama tenaga pendidik yang berdedikasi dan penuh kasih sayang, kami berkomitmen mendampingi tumbuh kembang buah hati Anda menjadi generasi yang cerdas, mandiri, dan berakhlakul karimah.</p>
            <p class="wassalam">Wassalamu'alaikum Warahmatullahi Wabarakatuh,</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ── TENTANG KAMI / PROFIL SEKOLAH ────────────────────────────────────── --}}
<section class="profil-section" id="tentang">
  <div class="wrap">
    <div class="profil-inner">
      
      <div class="profil-head">
        <div class="eyebrow">TENTANG KAMI &amp; PROFIL SEKOLAH</div>
        <h2>Profil KB-PAUD Al-Hidayah</h2>
        <p>Lembaga Pendidikan Anak Usia Dini berbasis Islami yang berkomitmen membimbing tumbuh kembang anak secara holistik, cerdas, mandiri, dan berakhlakul karimah di Desa Wedelan, Jepara.</p>
      </div>
      
      <div class="profil-grid">
        
        <!-- BOX 1: TENTANG KAMI -->
        <div class="profil-box">
          <div class="pbox-header">
            <div class="pbox-icon" style="background:#5470B8">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20M4 19.5A2.5 2.5 0 0 0 6.5 22H20M4 19.5V3A2.5 2.5 0 0 1 6.5 .5H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5z"/></svg>
            </div>
            <div>
              <div class="pbox-badge" style="color:#5470B8">Lembaga Pendidikan Islami</div>
              <h4>Tentang Kami</h4>
            </div>
          </div>
          <div class="pbox-body">
            <strong>PAUD Al-Hidayah</strong> merupakan lembaga pendidikan anak usia dini berbasis Islami di Desa Wedelan, Kecamatan Bangsri, Kabupaten Jepara. Kami berkomitmen menyelenggarakan pendidikan berkualitas yang berlandaskan nilai-nilai keagamaan, kemandirian, dan kreativitas.
          </div>
          <div class="pbox-highlights">
            <div class="pbox-hl-item"><span class="bullet" style="display:inline-flex;align-items:center;justify-content:center;width:20px;height:20px;border-radius:50%;background:#DCFCE7;color:#16A34A;flex-shrink:0;margin-right:6px;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="width:12px;height:12px;"><polyline points="20 6 9 17 4 12"/></svg></span> <span>Pendidikan Berbasis Agama &amp; Moral Islami</span></div>
            <div class="pbox-hl-item"><span class="bullet" style="display:inline-flex;align-items:center;justify-content:center;width:20px;height:20px;border-radius:50%;background:#DCFCE7;color:#16A34A;flex-shrink:0;margin-right:6px;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="width:12px;height:12px;"><polyline points="20 6 9 17 4 12"/></svg></span> <span>Metode Praktik Belajar Sambil Bermain Ceria</span></div>
            <div class="pbox-hl-item"><span class="bullet" style="display:inline-flex;align-items:center;justify-content:center;width:20px;height:20px;border-radius:50%;background:#DCFCE7;color:#16A34A;flex-shrink:0;margin-right:6px;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="width:12px;height:12px;"><polyline points="20 6 9 17 4 12"/></svg></span> <span>Pengembangan Holistik (Agama, Kognitif, Motorik, Bahasa, Seni)</span></div>
          </div>
        </div>

        <!-- BOX 2: VISI SEKOLAH -->
        <div class="profil-box">
          <div class="pbox-header">
            <div class="pbox-icon" style="background:#4D8F5A">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </div>
            <div>
              <div class="pbox-badge" style="color:#4D8F5A">Arah &amp; Cita-Cita Sekolah</div>
              <h4>Visi Sekolah</h4>
            </div>
          </div>
          <div class="pbox-body">
            <p style="font-size: 15px; font-weight: 700; color: var(--navy); line-height: 1.5; margin-bottom: 8px; font-family: 'Baloo 2', sans-serif;">
              "Membentuk anak yang cerdas, baik, terampil, berakhlak mulia, sholih/sholihah, kreatif, dan mandiri."
            </p>
            Visi ini menjadi arah dasar kami dalam membimbing tumbuh kembang buah hati Anda agar menjadi pribadi unggul yang cerdas intelektualnya, santun perilakunya, dan kokoh kemandiriannya.
          </div>
        </div>

        <!-- BOX 3: MISI SEKOLAH -->
        <div class="profil-box">
          <div class="pbox-header">
            <div class="pbox-icon" style="background:#C98A17">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
            </div>
            <div>
              <div class="pbox-badge" style="color:#C98A17">Langkah Nyata Pembelajaran</div>
              <h4>Misi Sekolah</h4>
            </div>
          </div>
          <div class="pbox-body">
            Untuk mewujudkan visi unggul sekolah, PAUD Al-Hidayah menjalankan misi-misi strategis berikut dalam setiap kegiatan belajar mengajar:
          </div>
          <div class="pbox-highlights">
            <div class="pbox-hl-item"><span class="bullet" style="display:inline-flex;align-items:center;justify-content:center;width:20px;height:20px;border-radius:50%;background:#DCFCE7;color:#16A34A;flex-shrink:0;margin-right:6px;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="width:12px;height:12px;"><polyline points="20 6 9 17 4 12"/></svg></span> <span>Melaksanakan pembelajaran aktif, kreatif, efektif, dan inovatif.</span></div>
            <div class="pbox-hl-item"><span class="bullet" style="display:inline-flex;align-items:center;justify-content:center;width:20px;height:20px;border-radius:50%;background:#DCFCE7;color:#16A34A;flex-shrink:0;margin-right:6px;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="width:12px;height:12px;"><polyline points="20 6 9 17 4 12"/></svg></span> <span>Mendidik dan menstimulasi anak secara optimal sesuai tahap perkembangan.</span></div>
            <div class="pbox-hl-item"><span class="bullet" style="display:inline-flex;align-items:center;justify-content:center;width:20px;height:20px;border-radius:50%;background:#DCFCE7;color:#16A34A;flex-shrink:0;margin-right:6px;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="width:12px;height:12px;"><polyline points="20 6 9 17 4 12"/></svg></span> <span>Menyiapkan anak didik menuju jenjang pendidikan dasar dengan matang.</span></div>
          </div>
        </div>

        <!-- BOX 4: TUJUAN PENDIDIKAN -->
        <div class="profil-box">
          <div class="pbox-header">
            <div class="pbox-icon" style="background:#7C3AED">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
            <div>
              <div class="pbox-badge" style="color:#7C3AED">Fokus Tumbuh Kembang</div>
              <h4>Tujuan Pendidikan</h4>
            </div>
          </div>
          <div class="pbox-body">
            Tujuan pendidikan PAUD Al-Hidayah dirancang secara komprehensif untuk mendukung perkembangan anak dan mutu sekolah:
          </div>
          <div class="pbox-highlights">
            <div class="pbox-hl-item"><span class="bullet" style="display:inline-flex;align-items:center;justify-content:center;width:20px;height:20px;border-radius:50%;background:#DCFCE7;color:#16A34A;flex-shrink:0;margin-right:6px;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="width:12px;height:12px;"><polyline points="20 6 9 17 4 12"/></svg></span> <span>Layanan pendidikan berkualitas agar anak tumbuh dan berkembang secara optimal.</span></div>
            <div class="pbox-hl-item"><span class="bullet" style="display:inline-flex;align-items:center;justify-content:center;width:20px;height:20px;border-radius:50%;background:#DCFCE7;color:#16A34A;flex-shrink:0;margin-right:6px;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="width:12px;height:12px;"><polyline points="20 6 9 17 4 12"/></svg></span> <span>Pembinaan karakter &amp; keimanan yang seimbang serta berkesinambungan.</span></div>
            <div class="pbox-hl-item"><span class="bullet" style="display:inline-flex;align-items:center;justify-content:center;width:20px;height:20px;border-radius:50%;background:#DCFCE7;color:#16A34A;flex-shrink:0;margin-right:6px;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="width:12px;height:12px;"><polyline points="20 6 9 17 4 12"/></svg></span> <span>Memenuhi standar mutu pendidikan demi meningkatkan profesionalitas pendidik.</span></div>
          </div>
        </div>

      </div>

    </div>
  </div>
</section>

{{-- ── PROGRAM PEMBELAJARAN 1 TAHUN (BROSUR & FLYER SPLIT LAYOUT SEPERTI CONTOH GAMBAR) ── --}}
<section class="programs" id="program">
  <div class="wrap">
    
    <div class="flyer-split-grid">
      
      <!-- SISI KIRI: POSTER VISUAL FLYER CERIA PAUD -->
      <div class="flyer-poster-card">
        <div class="flyer-poster-cloud-bg"></div>
        
        <!-- Header Poster Flyer -->
        <div style="position:relative;z-index:2;text-align:center;">
          <div class="flyer-poster-badge-top">TELAH DIBUKA!</div>
          <div class="flyer-poster-title">SPMB &amp; PROGRAM</div>
          <div style="font-family:'Baloo 2',sans-serif;font-size:18px;font-weight:900;letter-spacing:0.05em;color:#FEF08A;text-shadow:0 2px 4px rgba(0,0,0,0.3);margin-bottom:4px;">
            SISTEM PENERIMAAN MURID BARU &amp; AGENDA BELAJAR
          </div>
          <div class="flyer-poster-subtitle">
            TAHUN PELAJARAN 2026/2027 • KB-PAUD AL-HIDAYAH
          </div>
        </div>

        <!-- Kelompok Usia Badge KB Cantik & Rapi -->
        <div class="flyer-single-age-badge">
          <div class="flyer-age-badge-pill">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" style="width:16px;height:16px;color:#047857;flex-shrink:0;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            <span class="flyer-age-title">KELOMPOK BERMAIN (KB)</span>
          </div>
          <div class="flyer-age-number-box">
            <span class="flyer-age-num">3 – 4</span>
            <span class="flyer-age-lbl">TAHUN</span>
          </div>
        </div>

        <!-- Features Grid (Program Unggulan, Persyaratan & Ekskul) -->
        <div class="flyer-poster-features-grid">
          <div class="flyer-feature-block">
            <span class="flyer-feature-head">Program Unggulan</span>
            <ul class="flyer-feature-list">
              <li>Nilai Agama &amp; Budi Pekerti</li>
              <li>Belajar Bermakna (Deep Learning)</li>
              <li>Read Aloud &amp; Dongeng</li>
              <li>Cooking Class Cilik</li>
              <li>Praktek Ibadah &amp; Wudhu</li>
            </ul>
          </div>
          <div class="flyer-feature-block">
            <span class="flyer-feature-head yellow">Persyaratan &amp; Ekskul</span>
            <ul class="flyer-feature-list">
              <li>FC Akta Kelahiran &amp; KK</li>
              <li>Pas Foto 3x4 (2 lembar)</li>
              <li>FC KMS &amp; Formulir</li>
              <li><strong>Ekskul:</strong> Seni Tari &amp; Melukis</li>
              <li><strong>Ekskul:</strong> Renang &amp; Bahasa Inggris</li>
            </ul>
          </div>
        </div>

        <!-- Stack Foto Polaroid Miring di Bagian Bawah Poster Flyer -->
        <div>
          <div style="font-size:11px;font-weight:800;text-align:center;color:#E0F2FE;margin-bottom:6px;text-transform:uppercase;letter-spacing:0.05em;display:flex;align-items:center;justify-content:center;gap:5px;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px;color:#E0F2FE;"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
            <span>Aktivitas Ceria Siswa PAUD Al-Hidayah</span>
          </div>
          <div class="flyer-polaroid-stack">
            <div class="flyer-polaroid-item">
              <img src="{{ asset('images/hero-slide-2.jpg') }}" alt="Renang / Aktivitas Ceria" onerror="this.src='{{ asset('images/gedung-sekolah.jpg') }}'">
            </div>
            <div class="flyer-polaroid-item">
              <img src="{{ asset('images/hero-slide-3.jpg') }}" alt="Belajar Bermain" onerror="this.src='{{ asset('images/gedung-sekolah.jpg') }}'">
            </div>
            <div class="flyer-polaroid-item">
              <img src="{{ asset('images/hero-paud-ceria.jpg') }}" alt="Kreativitas Seni" onerror="this.src='{{ asset('images/gedung-sekolah.jpg') }}'">
            </div>
          </div>
        </div>

      </div>

      <!-- SISI KANAN: DETAIL SYARAT, BROSUR & KURIKULUM 1 TAHUN -->
      <div class="flyer-detail-card">
        <div class="flyer-detail-head">
          <h3>SPMB &amp; Kurikulum KB-PAUD Al-Hidayah<br>Tahun Pelajaran 2026/2027</h3>
        </div>

        <!-- Bagian A: Syarat Umum -->
        <div>
          <div class="flyer-section-title">
            <span style="background:#B45309;color:#FFF;width:22px;height:22px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:12px;">A</span>
            Syarat Umum
          </div>
          <ol class="flyer-detail-list">
            <li>Beragama Islam &amp; Berkelakuan baik.</li>
            <li>Sehat jasmani dan rohani.</li>
            <li>Sanggup mentaati peraturan dan tata tertib sekolah.</li>
          </ol>
        </div>

        <!-- Bagian B: Syarat Khusus -->
        <div>
          <div class="flyer-section-title">
            <span style="background:#B45309;color:#FFF;width:22px;height:22px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:12px;">B</span>
            Syarat Khusus Usia Calon Anak Didik
          </div>
          <ul class="flyer-detail-list">
            <li><strong>KB (Kelompok Bermain):</strong> Usia 3 – 4 Tahun (per 1 Juli 2026).</li>
          </ul>
        </div>

        <!-- Bagian C: Agenda Kurikulum 1 Tahun Ajaran -->
        <div>
          <div class="flyer-section-title">
            <span style="background:#B45309;color:#FFF;width:22px;height:22px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:12px;">C</span>
            Kurikulum &amp; Program Pembelajaran 1 Tahun
          </div>

          <!-- Tab Switcher -->
          <div class="program-tabs" style="justify-content:flex-start;margin-bottom:14px;gap:6px;">
            <button type="button" class="p-tab-btn active" style="padding:6px 14px;font-size:12px;" onclick="switchProgramTab('sem1', this)">
              Semester 1 (Ganjil)
            </button>
            <button type="button" class="p-tab-btn" style="padding:6px 14px;font-size:12px;" onclick="switchProgramTab('sem2', this)">
              Semester 2 (Genap)
            </button>
            <button type="button" class="p-tab-btn" style="padding:6px 14px;font-size:12px;" onclick="switchProgramTab('karakter', this)">
              Program Karakter
            </button>
          </div>

          <!-- Content Tab 1: Semester 1 -->
          <div class="program-tab-content active" id="prog-sem1">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;">
              <div style="background:#FFF;padding:10px 12px;border-radius:12px;border:1px solid #FDE68A;font-size:12px;">
                <strong style="color:#059669;display:block;margin-bottom:2px;">Bulan 1-2 • Jul-Agust</strong>
                <div style="font-weight:800;color:#0F172A;">Tema 1: Aku &amp; Diriku</div>
                <div style="color:#64748B;font-size:11px;margin-top:2px;">MPLS Ramah Anak, Cuci Tangan, Toilet Training &amp; Kolase.</div>
              </div>
              <div style="background:#FFF;padding:10px 12px;border-radius:12px;border:1px solid #FDE68A;font-size:12px;">
                <strong style="color:#D97706;display:block;margin-bottom:2px;">Bulan 3 • Sept</strong>
                <div style="font-weight:800;color:#0F172A;">Tema 2: Keluargaku</div>
                <div style="color:#64748B;font-size:11px;margin-top:2px;">Roleplay Rumahku Surgaku &amp; Hari Apresiasi Ayah Bunda.</div>
              </div>
              <div style="background:#FFF;padding:10px 12px;border-radius:12px;border:1px solid #FDE68A;font-size:12px;">
                <strong style="color:#2563EB;display:block;margin-bottom:2px;">Bulan 4 • Okt</strong>
                <div style="font-weight:800;color:#0F172A;">Tema 3: Kebutuhanku</div>
                <div style="color:#64748B;font-size:11px;margin-top:2px;">Cooking Class Cilik, Edukasi Gigi &amp; Busana Islami.</div>
              </div>
              <div style="background:#FFF;padding:10px 12px;border-radius:12px;border:1px solid #FDE68A;font-size:12px;">
                <strong style="color:#BE123C;display:block;margin-bottom:2px;">Bulan 5-6 • Nov-Des</strong>
                <div style="font-weight:800;color:#0F172A;">Tema 4: Fauna &amp; Flora</div>
                <div style="color:#64748B;font-size:11px;margin-top:2px;">Menanam Biji, Mini Zoo &amp; Pembagian Rapor Semester 1.</div>
              </div>
            </div>
          </div>

          <!-- Content Tab 2: Semester 2 -->
          <div class="program-tab-content" id="prog-sem2">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;">
              <div style="background:#FFF;padding:10px 12px;border-radius:12px;border:1px solid #FDE68A;font-size:12px;">
                <strong style="color:#4F46E5;display:block;margin-bottom:2px;">Bulan 7-8 • Jan-Feb</strong>
                <div style="font-weight:800;color:#0F172A;">Tema 5: Transportasi</div>
                <div style="color:#64748B;font-size:11px;margin-top:2px;">Polisi Sahabat Anak, Miniatur Mobil &amp; Outing Class.</div>
              </div>
              <div style="background:#FFF;padding:10px 12px;border-radius:12px;border:1px solid #FDE68A;font-size:12px;">
                <strong style="color:#B45309;display:block;margin-bottom:2px;">Bulan 9 • Mar</strong>
                <div style="font-weight:800;color:#0F172A;">Tema 6: Profesi Mulia</div>
                <div style="color:#64748B;font-size:11px;margin-top:2px;">Career Day Profesi Cilik &amp; Kunjungan Pemadam.</div>
              </div>
              <div style="background:#FFF;padding:10px 12px;border-radius:12px;border:1px solid #FDE68A;font-size:12px;">
                <strong style="color:#047857;display:block;margin-bottom:2px;">Bulan 10 • Apr</strong>
                <div style="font-weight:800;color:#0F172A;">Tema 7: Negaraku &amp; Ramadhan</div>
                <div style="color:#64748B;font-size:11px;margin-top:2px;">Pesantren Kilat Cilik, Hari Kartini &amp; Santunan.</div>
              </div>
              <div style="background:#FFF;padding:10px 12px;border-radius:12px;border:1px solid #FDE68A;font-size:12px;">
                <strong style="color:#7C3AED;display:block;margin-bottom:2px;">Bulan 11-12 • Mei-Jun</strong>
                <div style="font-weight:800;color:#0F172A;">Tema 8: Alam &amp; Kelulusan</div>
                <div style="color:#64748B;font-size:11px;margin-top:2px;">Eksperimen Pelangi, Kesiapan SD &amp; Wisuda Kelulusan.</div>
              </div>
            </div>
          </div>

          <!-- Content Tab 3: Karakter -->
          <div class="program-tab-content" id="prog-karakter">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;">
              <div style="background:#FFF;padding:10px 12px;border-radius:12px;border:1px solid #FDE68A;font-size:12px;">
                <strong style="color:#0D6B3E;display:block;margin-bottom:2px;">Program Harian</strong>
                <div style="font-weight:800;color:#0F172A;">Tahfidz &amp; Tahsin Cilik</div>
                <div style="color:#64748B;font-size:11px;margin-top:2px;">Hafalan Juz 'Amma (An-Nas s/d At-Takatsur) &amp; Doa Harian.</div>
              </div>
              <div style="background:#FFF;padding:10px 12px;border-radius:12px;border:1px solid #FDE68A;font-size:12px;">
                <strong style="color:#0284C7;display:block;margin-bottom:2px;">Program Pagi</strong>
                <div style="font-weight:800;color:#0F172A;">Sholat Dhuha Ceria</div>
                <div style="color:#64748B;font-size:11px;margin-top:2px;">Wudhu Mandiri, Sholat Berjamaah &amp; Infaq Subuh.</div>
              </div>
              <div style="background:#FFF;padding:10px 12px;border-radius:12px;border:1px solid #FDE68A;font-size:12px;">
                <strong style="color:#E11D48;display:block;margin-bottom:2px;">Akademik</strong>
                <div style="font-weight:800;color:#0F172A;">Fun Calistung &amp; Dongeng</div>
                <div style="color:#64748B;font-size:11px;margin-top:2px;">Mengenal Huruf, Angka 1-20, Pasir Kinetik &amp; Storytelling.</div>
              </div>
              <div style="background:#FFF;padding:10px 12px;border-radius:12px;border:1px solid #FDE68A;font-size:12px;">
                <strong style="color:#7E22CE;display:block;margin-bottom:2px;">Motorik &amp; Seni</strong>
                <div style="font-weight:800;color:#0F172A;">Senam &amp; Makanan Sehat</div>
                <div style="color:#64748B;font-size:11px;margin-top:2px;">Senam Irama Jumat, Origami, Finger Painting &amp; PMT Sehat.</div>
              </div>
            </div>
          </div>

        </div>

        <!-- Bagian D: Prosedur Pendaftaran & Akses Cetak Flyer -->
        <div style="margin-top:18px;padding-top:14px;border-top:1px dashed #F59E0B;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;">
          <div>
            <div style="font-size:12px;font-weight:800;color:#B45309;">Informasi Pendaftaran / WhatsApp:</div>
            <div style="font-size:14px;font-weight:900;color:#78350F;display:flex;align-items:center;gap:6px;"><svg viewBox="0 0 24 24" fill="none" stroke="#E11D48" stroke-width="2.5" style="width:16px;height:16px;flex-shrink:0;"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg><span>{{ $profil && $profil->no_telepon ? $profil->no_telepon : '0812-3456-7890' }}</div>
          </div>
          <div style="display:flex;gap:8px;">
            <button type="button" onclick="window.print()" class="btn btn-secondary" style="font-size:12px;padding:8px 14px;font-weight:700;">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:15px;height:15px;flex-shrink:0;"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg><span>Cetak Brosur</span>
            </button>
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profil->no_telepon ?? '081234567890') }}?text=Halo%20Admin%20KB-PAUD%20Al-Hidayah,%20saya%20ingin%20bertanya%20informasi%20pendaftaran%20siswa%20baru" target="_blank" class="btn btn-primary" style="font-size:12px;padding:8px 14px;font-weight:700;background:#25D366;border-color:#25D366;">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:15px;height:15px;flex-shrink:0;"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg><span>Hubungi Kami</span>
            </a>
          </div>
        </div>

      </div>

    </div>

  </div>
</section>

{{-- ── GALERI KEGIATAN SEKOLAH ─────────────────────────────────────────── --}}
<section class="gallery-sec" id="galeri">
  <div class="wrap">
    <div class="gallery-head">
      <div class="eyebrow eyebrow-green">GALERI KEGIATAN</div>
      <h2>Dokumentasi &amp; Aktivitas Belajar Siswa</h2>
      <p style="color:#64748B; font-size:14px; max-width:600px; margin:8px auto 0;">Klik pada salah satu foto untuk melihat dokumentasi kegiatan secara layar penuh (fullscreen) beserta cerita lengkapnya.</p>
    </div>
    <div class="gallery-grid">
      @forelse($galeris as $index => $galeri)
        <div class="gallery-card" onclick="openLightbox({{ $index }})" title="Klik untuk lihat foto dan detail">
          <div class="gallery-img-wrapper">
            <img src="{{ asset($galeri->foto) }}" alt="{{ $galeri->judul }}" loading="lazy">
            <div class="gallery-overlay-badge">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="width:13px;height:13px;"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
              <span>Lihat Detail</span>
            </div>
          </div>
          <div class="gallery-info">
            <h4>{{ $galeri->judul }}</h4>
            <p>{{ $galeri->deskripsi }}</p>
          </div>
        </div>
      @empty
        <div class="gallery-empty">
          <p>Belum ada dokumentasi kegiatan saat ini. Kunjungi kembali nanti untuk melihat galeri foto kegiatan belajar siswa kami.</p>
        </div>
      @endforelse
    </div>

    <!-- Tombol Lihat Selengkapnya -->
    <div style="text-align: center; margin-top: 44px;">
      <a href="{{ route('galeri.publik') }}" class="btn-lihat-semua-galeri">
        <span>Lihat Selengkapnya</span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="width:18px;height:18px;"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>
    </div>
  </div>
</section>

{{-- ── FULLSCREEN GALLERY LIGHTBOX MODAL ── --}}
<div class="lightbox-modal" id="galleryLightbox" onclick="handleLightboxBackdrop(event)">
  {{-- Topbar --}}
  <div class="lightbox-topbar">
    <div class="lightbox-counter" id="lightboxCounter">
      Foto 1 dari {{ count($galeris) }}
    </div>
    <div class="lightbox-actions">
      <a href="#" id="lightboxDownloadBtn" download class="lightbox-btn" title="Unduh Foto HD">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:15px;height:15px;"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
        <span>Unduh Foto</span>
      </a>
      <button type="button" class="lightbox-close-btn" onclick="closeLightbox()" title="Tutup (Esc)">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="width:20px;height:20px;"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
    </div>
  </div>

  {{-- Body with Image and Detail Panel --}}
  <div class="lightbox-body" onclick="event.stopPropagation()">
    {{-- Prev Button --}}
    @if(count($galeris) > 1)
      <button type="button" class="lightbox-nav-btn lightbox-prev" onclick="prevLightbox()" title="Foto Sebelumnya (Panah Kiri)">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="width:24px;height:24px;"><polyline points="15 18 9 12 15 6"/></svg>
      </button>
    @endif

    {{-- Main Image Area --}}
    <div class="lightbox-image-container">
      <img id="lightboxImg" src="" alt="Dokumentasi Kegiatan">
    </div>

    {{-- Detail Panel --}}
    <div class="lightbox-detail-panel">
      <div class="lightbox-date-badge" id="lightboxDateBadge">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
        <span id="lightboxDate">Dokumentasi PAUD</span>
      </div>

      <h3 id="lightboxTitle">Judul Kegiatan</h3>
      
      <div class="lightbox-desc" id="lightboxDesc">
        Deskripsi lengkap cerita kegiatan dokumentasi sekolah...
      </div>

      <div style="margin-top:auto; padding-top:16px; border-top:1px solid rgba(255,255,255,0.1); font-size:12px; color:#94A3B8; display:flex; align-items:center; justify-content:space-between;">
        <span>KB-PAUD Al-Hidayah Jepara</span>
        <span style="font-size:11px;">Gunakan tombol panah panah Kiri / Kanan pada keyboard</span>
      </div>
    </div>

    {{-- Next Button --}}
    @if(count($galeris) > 1)
      <button type="button" class="lightbox-nav-btn lightbox-next" onclick="nextLightbox()" title="Foto Selanjutnya (Panah Kanan)">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="width:24px;height:24px;"><polyline points="9 18 15 12 9 6"/></svg>
      </button>
    @endif
  </div>

  <div style="height:10px;"></div>
</div>

{{-- ── PORTAL ORANG TUA ────────────────────────────────────────────────── --}}
<section class="portal-ortu" id="portal-ortu">
  <div class="wrap">
    <div class="portal-header">
      <div class="eyebrow">PORTAL ORANG TUA</div>
      <h2>Pantau Perkembangan Anak dari Mana Saja</h2>
      <p>Masuk ke portal orang tua untuk melihat laporan perkembangan anak secara lengkap — dari aspek kognitif, motorik, bahasa, hingga sosial-emosional.</p>
    </div>
    <div class="portal-grid">
      <div class="portal-card">
        <div class="icon">
          <div style="width:52px;height:52px;border-radius:16px;background:#F0FDF4;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;color:#10B981;box-shadow:0 4px 12px rgba(16,185,129,0.12);">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="width:26px;height:26px;"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
          </div>
        </div>
        <h4>Laporan Perkembangan</h4>
        <p>Lihat laporan bulanan per aspek: kognitif, motorik, bahasa, sosial-emosional, dan nilai agama-moral.</p>
      </div>
      <div class="portal-card">
        <div class="icon">
          <div style="width:52px;height:52px;border-radius:16px;background:#FEF3C7;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;color:#F59E0B;box-shadow:0 4px 12px rgba(245,158,11,0.12);">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="width:26px;height:26px;"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
          </div>
        </div>
        <h4>Notifikasi Laporan Baru</h4>
        <p>Dapatkan notifikasi otomatis saat guru mempublikasikan laporan perkembangan terbaru anak Anda.</p>
      </div>
      <div class="portal-card">
        <div class="icon">
          <div style="width:52px;height:52px;border-radius:16px;background:#EFF6FF;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;color:#3B82F6;box-shadow:0 4px 12px rgba(59,130,246,0.12);">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="width:26px;height:26px;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="12" y1="18" x2="12" y2="12"/><polyline points="9 15 12 18 15 15"/></svg>
          </div>
        </div>
        <h4>Unduh PDF Laporan</h4>
        <p>Simpan dan cetak laporan perkembangan anak dalam format PDF kapan saja Anda butuhkan.</p>
      </div>
    </div>
    <div class="portal-footer">
      <a href="{{ route('login') }}" class="btn btn-masuk" style="font-size:15px;padding:14px 34px;display:inline-flex;align-items:center;gap:10px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" style="width:18px;height:18px;"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
        <span>Masuk untuk Lihat Laporan Anak &rarr;</span>
      </a>
      <p>Belum punya akun? Hubungi pihak sekolah untuk mendaftarkan akun orang tua.</p>
    </div>
  </div>
</section>

{{-- ── TESTIMONIAL + CTA + MAPS ─────────────────────────────────────────── --}}
<section class="bottom-row" id="kontak">
  <div class="wrap">
    <div class="bottom-grid">
      {{-- Testimonial Card --}}
      <div class="testi-card">
        <div class="quote-mark">&ldquo;</div>
        <p>PAUD Al-Hidayah adalah keputusan terbaik untuk keluarga kami. Para guru benar-benar peduli, dan anak kami selalu menantikan sekolah setiap hari.</p>
        <div class="testi-avatar">
          <img
            src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=200&auto=format&fit=crop"
            alt="Wali murid PAUD Al-Hidayah">
          <div>
            <div class="testi-name">Ibu Siti R. &mdash; Wali Murid</div>
            <div style="font-size:11.5px;color:#8b8b93;margin-top:2px">Orang tua siswa Kelompok B</div>
          </div>
        </div>
      </div>

      {{-- Contact Card --}}
      <div class="cta-card">
        <h3>Hubungi Kami</h3>
        <p>Kami dengan senang hati menyambut Anda dan buah hati untuk bergabung bersama keluarga besar PAUD Al-Hidayah.</p>
        <div style="display:flex;flex-direction:column;gap:12px;margin-top:10px">
          <div style="display:flex;align-items:flex-start;gap:10px;font-size:13.5px;color:#c7cde0">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;color:#F4B93E;flex-shrink:0;margin-top:3px;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            <span>{{ $profil->alamat_lengkap ?? 'Desa Wedelan RT 01 / RW 09, Kec. Bangsri, Kab. Jepara, Jawa Tengah 59453' }}</span>
          </div>
          <div style="display:flex;align-items:center;gap:10px;font-size:13.5px;color:#c7cde0">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;color:#F4B93E;flex-shrink:0;"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            <span>{{ $profil->no_telepon ?? '0812-2922-2804' }}</span>
          </div>
          <div style="display:flex;align-items:center;gap:10px;font-size:13.5px;color:#c7cde0">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;color:#F4B93E;flex-shrink:0;"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            <span>{{ $profil->email_sekolah ?? 'fatimatuzzahraalhidayah@gmail.com' }}</span>
          </div>
        </div>
        <a href="{{ route('login') }}" class="btn btn-gold" style="display:inline-flex;align-items:center;gap:8px;margin-top:14px;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" style="width:16px;height:16px;"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg><span>Portal Laporan Anak &rarr;</span></a>
      </div>

      {{-- Google Maps Card --}}
      <div class="map-card">
        @if(!empty($profil->maps_embed) && str_contains($profil->maps_embed, 'src='))
          {!! $profil->maps_embed !!}
        @elseif(!empty($profil->maps_embed))
          <iframe
            src="{{ $profil->maps_embed }}"
            width="100%"
            height="100%"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        @else
          <iframe
            src="https://maps.google.com/maps?q=-6.5163,110.7823+(KB-PAUD+Al-Hidayah+Wedelan)&t=&z=17&ie=UTF8&iwloc=&output=embed"
            width="100%"
            height="100%"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        @endif
      </div>
    </div>
  </div>
</section>

{{-- ── FOOTER ──────────────────────────────────────────────────────────── --}}
<footer>
  <div class="wrap">
    <div class="foot-top">
      <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo KB-PAUD Al Hidayah" style="height:42px;width:auto;display:block;">
        <div class="logo-text">
          <div class="brand" style="font-size:16px;font-weight:800;line-height:1.2;color:var(--navy);">KB-PAUD AL HIDAYAH</div>
          <div class="sub" style="font-size:9.5px;font-weight:700;color:#8b8672;line-height:1.2;letter-spacing:0.5px;text-transform:uppercase;">SEKOLAH USIA DINI</div>
        </div>
      </div>
      <div class="foot-copy">&copy; {{ date('Y') }} KB-PAUD Al-Hidayah. Hak cipta dilindungi.</div>
    </div>
    <div class="foot-strip">
      <div class="foot-item">
        <div class="fi-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 21s-7-4.35-9.5-8.5C.7 9 2 5.5 5.5 5c2-.3 3.5.7 4.5 2 1-1.3 2.5-2.3 4.5-2 3.5.5 4.8 4 3 7.5C19 16.65 12 21 12 21z"/>
          </svg>
        </div>
        <div><h5>Bersih, Aman &amp; Terjaga</h5><p>Keamanan anak Anda adalah prioritas utama kami.</p></div>
      </div>
      <div class="foot-item">
        <div class="fi-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="9" cy="8" r="3"/><path d="M2 21c0-3.3 3-6 7-6s7 2.7 7 6"/>
            <circle cx="17" cy="9" r="2.5"/><path d="M17 12.5c2.3 0 4.5 1.6 4.8 5"/>
          </svg>
        </div>
        <div><h5>Makanan Bergizi</h5><p>Makanan dan camilan sehat untuk tubuh yang berkembang.</p></div>
      </div>
      <div class="foot-item">
        <div class="fi-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="7" width="18" height="13" rx="2"/>
            <path d="M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2"/>
            <circle cx="12" cy="13" r="3"/>
          </svg>
        </div>
        <div><h5>Laporan Berkala</h5><p>Pantau perkembangan anak lewat portal digital.</p></div>
      </div>
      <div class="foot-item">
        <div class="fi-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="4" width="18" height="17" rx="2"/>
            <path d="M3 9h18M8 3v3M16 3v3"/>
          </svg>
        </div>
        <div><h5>Jadwal Fleksibel</h5><p>Pilihan waktu yang sesuai untuk keluarga Anda.</p></div>
      </div>
    </div>
  </div>
</footer>

<script>
  const menuToggle = document.getElementById('menuToggle');
  const navMenu = document.getElementById('mobileNav') || document.querySelector('nav');
  const navBackdrop = document.getElementById('navBackdrop');

  function toggleMobileNav() {
    if (navMenu.classList.contains('active')) {
      closeMobileNav();
    } else {
      openMobileNav();
    }
  }

  function openMobileNav() {
    if (menuToggle) menuToggle.classList.add('active');
    if (navMenu) navMenu.classList.add('active');
    if (navBackdrop) navBackdrop.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeMobileNav() {
    if (menuToggle) menuToggle.classList.remove('active');
    if (navMenu) navMenu.classList.remove('active');
    if (navBackdrop) navBackdrop.classList.remove('active');
    document.body.style.overflow = '';
  }

  // Close menu when a link is clicked
  const navLinks = document.querySelectorAll('nav a');
  navLinks.forEach(link => {
    link.addEventListener('click', () => {
      closeMobileNav();
    });
  });

  // Scroll Spy for active menu underlines
  const sections = document.querySelectorAll('section[id], header[id]');
  
  window.addEventListener('scroll', () => {
    let current = '';
    const scrollY = window.pageYOffset;
    
    sections.forEach(section => {
      const sectionHeight = section.offsetHeight;
      const sectionTop = section.offsetTop - 120; // Offset for header height
      if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
        current = section.getAttribute('id');
      }
    });

    navLinks.forEach(item => {
      item.classList.remove('active');
      const href = item.getAttribute('href');
      // If we scroll to the very top, make "Beranda" active
      if (scrollY < 150) {
        if (href.includes('home') || href === '#beranda') {
          item.classList.add('active');
        }
      } else if (href.includes(current) && current !== '' && current !== 'galeri') {
        item.classList.add('active');
      }
    });

    // Sticky Header Scroll Transition
    const mainHeader = document.querySelector('header');
    if (mainHeader) {
      if (scrollY > 30) {
        mainHeader.classList.add('scrolled');
      } else {
        mainHeader.classList.remove('scrolled');
      }
    }
  });

  // Program Tabs Switcher
  function switchProgramTab(tabName, btn) {
    document.querySelectorAll('.p-tab-btn').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.program-tab-content').forEach(c => c.classList.remove('active'));
    
    btn.classList.add('active');
    const target = document.getElementById('prog-' + tabName);
    if (target) {
      target.classList.add('active');
    }
  }

  // ── GALLERY FULLSCREEN LIGHTBOX CONTROLLER ──
  @php
    $galleryList = $galeris->map(function($g) {
        return [
            'judul' => $g->judul,
            'deskripsi' => $g->deskripsi,
            'foto' => asset($g->foto),
            'tanggal' => $g->created_at ? $g->created_at->translatedFormat('d F Y') : 'Dokumentasi Sekolah'
        ];
    });
  @endphp
  const galleryData = @json($galleryList);

  let currentGalleryIndex = 0;

  function openLightbox(index) {
      if (!galleryData || galleryData.length === 0) return;
      currentGalleryIndex = index;
      updateLightboxContent();
      const modal = document.getElementById('galleryLightbox');
      modal.classList.add('active');
      document.body.style.overflow = 'hidden';
  }

  function closeLightbox() {
      const modal = document.getElementById('galleryLightbox');
      modal.classList.remove('active');
      document.body.style.overflow = '';
  }

  function handleLightboxBackdrop(e) {
      if (e.target.id === 'galleryLightbox') {
          closeLightbox();
      }
  }

  function updateLightboxContent() {
      const item = galleryData[currentGalleryIndex];
      if (!item) return;

      document.getElementById('lightboxImg').src = item.foto;
      document.getElementById('lightboxTitle').textContent = item.judul;
      document.getElementById('lightboxDesc').textContent = item.deskripsi || 'Dokumentasi kegiatan pembelajaran dan kreativitas anak di KB-PAUD Al-Hidayah.';
      document.getElementById('lightboxDate').textContent = item.tanggal;
      document.getElementById('lightboxCounter').textContent = `Foto ${currentGalleryIndex + 1} dari ${galleryData.length}`;
      
      const downloadBtn = document.getElementById('lightboxDownloadBtn');
      downloadBtn.href = item.foto;
      downloadBtn.setAttribute('download', item.judul.toLowerCase().replace(/[^a-z0-9]/g, '_') + '.jpg');
  }

  function nextLightbox() {
      if (galleryData.length <= 1) return;
      currentGalleryIndex = (currentGalleryIndex + 1) % galleryData.length;
      updateLightboxContent();
  }

  function prevLightbox() {
      if (galleryData.length <= 1) return;
      currentGalleryIndex = (currentGalleryIndex - 1 + galleryData.length) % galleryData.length;
      updateLightboxContent();
  }

  // ── HERO BANNER AUTO SLIDER CONTROLLER ──
  let heroSlideIndex = 0;
  const heroSlides = document.querySelectorAll('.hero-slide');
  let heroSlideTimer = null;

  function showHeroSlide(index) {
    if (!heroSlides || heroSlides.length === 0) return;
    if (index >= heroSlides.length) heroSlideIndex = 0;
    else if (index < 0) heroSlideIndex = heroSlides.length - 1;
    else heroSlideIndex = index;

    heroSlides.forEach((slide, idx) => {
      slide.classList.toggle('active', idx === heroSlideIndex);
    });
  }

  function startHeroTimer() {
    heroSlideTimer = setInterval(() => {
      showHeroSlide(heroSlideIndex + 1);
    }, 5000); // 5 detik per slide berganti otomatis
  }

  if (heroSlides.length > 1) {
    startHeroTimer();
  }

  // Keyboard navigation for Lightbox
  document.addEventListener('keydown', (e) => {
      const modal = document.getElementById('galleryLightbox');
      if (modal && modal.classList.contains('active')) {
          if (e.key === 'Escape') closeLightbox();
          if (e.key === 'ArrowRight') nextLightbox();
          if (e.key === 'ArrowLeft') prevLightbox();
      }
  });
</script>
</body>
</html>
