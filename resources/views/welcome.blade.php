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
  .sambutan{padding:80px 0;background:var(--cream-soft);border-top:1px solid var(--line);border-bottom:1px solid var(--line);}
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

  /* ── Tentang / Profil Section (SMAN 1 Bangsri style) ── */
  .profil-section {
    padding: 100px 0 90px;
    background: #f8faf9;
    border-top: 1px solid var(--line);
    border-bottom: 1px solid var(--line);
  }
  .profil-head {
    text-align: center;
    margin-bottom: 56px;
    padding: 0 16px;
  }
  .profil-head .eyebrow {
    color: var(--green);
    margin-bottom: 8px;
  }
  .profil-head h2 {
    font-size: 34px;
    color: var(--navy);
    font-weight: 800;
  }
  .profil-cards {
    display: flex;
    flex-direction: column;
    gap: 28px;
    max-width: 900px;
    margin: 0 auto;
    padding: 0 16px;
  }
  .profil-card {
    background: #ffffff;
    border: 1px solid #eef2ef;
    border-radius: 20px;
    padding: 36px 40px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.015);
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    gap: 16px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .profil-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(27, 43, 75, 0.05);
  }
  .card-header-row {
    display: flex;
    align-items: center;
    gap: 16px;
    position: relative;
    z-index: 2;
  }
  .card-icon {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }
  .card-icon svg {
    width: 22px;
    height: 22px;
    stroke: #fff;
    fill: none;
    stroke-width: 2.2;
    stroke-linecap: round;
    stroke-linejoin: round;
  }
  .card-header-row h3 {
    font-size: 22px;
    color: var(--navy);
    font-weight: 800;
    font-family: 'Baloo 2', sans-serif;
  }
  .card-content {
    font-size: 15px;
    line-height: 1.8;
    color: #475569;
    position: relative;
    z-index: 2;
    text-align: justify;
    text-justify: inter-word;
  }
  .card-content p {
    margin-bottom: 12px;
    text-align: justify;
    text-justify: inter-word;
  }
  .card-content p:last-child {
    margin-bottom: 0;
  }
  .card-content ul {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin-top: 12px;
  }
  .card-content li {
    position: relative;
    padding-left: 24px;
    text-align: left;
  }
  .card-content li::before {
    content: "✔";
    position: absolute;
    left: 0;
    color: var(--green);
    font-weight: bold;
    font-size: 14px;
  }

  /* Watermark icon decoration */
  .card-watermark {
    position: absolute;
    right: 28px;
    top: 50%;
    transform: translateY(-50%);
    width: 120px;
    height: 120px;
    color: rgba(27, 43, 75, 0.02);
    display: flex;
    align-items: center;
    justify-content: center;
    pointer-events: none;
    z-index: 1;
  }
  .card-watermark svg {
    width: 100px;
    height: 100px;
    fill: none;
    stroke: currentColor;
    stroke-width: 1.5;
    stroke-linecap: round;
    stroke-linejoin: round;
  }

  /* Theme-specific styles */
  .card-blue {
    border-left: 5px solid var(--blue);
  }
  .card-blue .card-icon {
    background: var(--blue);
  }
  
  .card-green {
    border-left: 5px solid var(--green);
  }
  .card-green .card-icon {
    background: var(--green);
  }

  .card-gold {
    border-left: 5px solid var(--gold);
  }
  .card-gold .card-icon {
    background: var(--gold);
  }

  .card-purple {
    border-left: 5px solid var(--purple);
  }
  .card-purple .card-icon {
    background: var(--purple);
  }

  /* ── PROGRAM PEMBELAJARAN 1 TAHUN ── */
  .programs { padding: 90px 0 100px; }
  .programs-inner {
    background: var(--cream-soft);
    border: 1px solid var(--line);
    border-radius: 28px;
    padding: 56px 44px;
  }
  .programs-head { text-align: center; margin-bottom: 36px; }
  .programs-head .eyebrow { color: #5FA05F; margin-bottom: 6px; }
  .programs-head h2 { font-size: 32px; color: var(--navy); margin-top: 6px; font-weight: 800; font-family: 'Baloo 2', sans-serif; }
  .programs-head p { font-size: 15px; color: #64748B; max-width: 720px; margin: 10px auto 0; line-height: 1.65; }
  
  /* Program Tabs */
  .program-tabs {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-bottom: 36px;
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
    padding:80px 0;
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
    .sambutan { padding: 50px 0; }
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
    .profil-section { padding: 50px 0 40px; }
    .profil-head { margin-bottom: 28px; }
    .profil-head h2 { font-size: 26px; }
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
    .portal-ortu { padding: 50px 0; }
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
    .programs { padding: 50px 0; }
    .programs-inner { padding: 28px 16px; }
    .programs-head h2 { font-size: 24px; }
    .program-semester-grid { grid-template-columns: 1fr; gap: 14px; }
    .pbox-header h4 { font-size: 16.5px; }
    .pbox-body {
      font-size: 13px;
      line-height: 1.6;
      text-align: justify;
      text-justify: inter-word;
    }

    /* Tentang Kami (Profil) */
    .profil-section { padding: 40px 0 30px; }
    .profil-cards { gap: 14px; padding: 0 8px; }
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
  }

  /* Gallery Section */
  .gallery-sec {
    padding: 80px 0;
    background: var(--cream);
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
            <span>Program Belajar</span>
          </div>
          <span class="nav-item-arrow">›</span>
        </a>

        <a href="#galeri" class="nav-link-item">
          <div class="nav-item-left">
            <div class="nav-item-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
            </div>
            <span>Galeri Kegiatan</span>
          </div>
          <span class="nav-item-arrow">›</span>
        </a>

        <a href="#kontak" class="nav-link-item">
          <div class="nav-item-left">
            <div class="nav-item-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            </div>
            <span>Kontak &amp; Lokasi</span>
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
    <div class="profil-head">
      <div class="eyebrow">TENTANG KAMI</div>
      <h2>Profil PAUD Al-Hidayah</h2>
    </div>
    
    <div class="profil-cards">
      <!-- CARD 1: TENTANG KAMI -->
      <div class="profil-card card-blue">
        <div class="card-header-row">
          <div class="card-icon">
            <svg viewBox="0 0 24 24">
              <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20M4 19.5A2.5 2.5 0 0 0 6.5 22H20M4 19.5V3A2.5 2.5 0 0 1 6.5 .5H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5z"/>
            </svg>
          </div>
          <h3>Tentang Kami</h3>
        </div>
        <div class="card-content">
          <p>
            <strong>PAUD Al-Hidayah</strong> merupakan lembaga pendidikan anak usia dini berbasis Islami di Desa Wedelan, Kecamatan Bangsri, Kabupaten Jepara. Kami berkomitmen menyelenggarakan pendidikan berkualitas yang berlandaskan nilai-nilai keagamaan, kemandirian, dan kreativitas.
          </p>
          <p>
            Melalui pendekatan belajar sambil bermain, kami membimbing anak-anak untuk tumbuh dan berkembang secara holistik (agama &amp; moral, fisik-motorik, kognitif, bahasa, sosial-emosional, dan seni) guna menyongsong masa depan yang cerdas dan berkarakter mulia.
          </p>
        </div>
        <div class="card-watermark">
          <svg viewBox="0 0 24 24">
            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20M4 19.5A2.5 2.5 0 0 0 6.5 22H20M4 19.5V3A2.5 2.5 0 0 1 6.5 .5H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5z"/>
          </svg>
        </div>
      </div>

      <!-- CARD 2: VISI -->
      <div class="profil-card card-green">
        <div class="card-header-row">
          <div class="card-icon">
            <svg viewBox="0 0 24 24">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
              <circle cx="12" cy="12" r="3"/>
            </svg>
          </div>
          <h3>Visi</h3>
        </div>
        <div class="card-content">
          <p style="font-size: 16px; font-weight: 700; color: var(--navy); font-family: 'Baloo 2', sans-serif; line-height: 1.5; margin-bottom: 8px;">
            "Membentuk anak yang cerdas, baik, terampil, berakhlak mulia, sholih/sholihah, kreatif, dan mandiri."
          </p>
          <p>
            Visi ini menjadi arah dasar kami dalam membimbing tumbuh kembang buah hati Anda agar menjadi pribadi unggul yang cerdas intelektualnya, santun perilakunya, dan kokoh kemandiriannya.
          </p>
        </div>
        <div class="card-watermark">
          <svg viewBox="0 0 24 24">
            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
            <circle cx="12" cy="12" r="3"/>
          </svg>
        </div>
      </div>

      <!-- CARD 3: MISI -->
      <div class="profil-card card-gold">
        <div class="card-header-row">
          <div class="card-icon">
            <svg viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="10"/>
              <circle cx="12" cy="12" r="6"/>
              <circle cx="12" cy="12" r="2"/>
            </svg>
          </div>
          <h3>Misi</h3>
        </div>
        <div class="card-content">
          <p>Untuk mewujudkan visi sekolah, PAUD Al-Hidayah menetapkan misi-misi berikut:</p>
          <ul>
            <li>Melaksanakan pembelajaran aktif, kreatif, efektif, dan inovatif.</li>
            <li>Mendidik dan menstimulasi anak secara optimal sesuai tahap perkembangan.</li>
            <li>Menyiapkan anak didik menuju jenjang pendidikan dasar dengan ketercapaian kompetensi dasar yang matang.</li>
          </ul>
        </div>
        <div class="card-watermark">
          <svg viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10"/>
            <circle cx="12" cy="12" r="6"/>
            <circle cx="12" cy="12" r="2"/>
          </svg>
        </div>
      </div>

      <!-- CARD 4: TUJUAN PENDIDIKAN -->
      <div class="profil-card card-purple">
        <div class="card-header-row">
          <div class="card-icon">
            <svg viewBox="0 0 24 24">
              <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
            </svg>
          </div>
          <h3>Tujuan Pendidikan</h3>
        </div>
        <div class="card-content">
          <p>Tujuan pendidikan PAUD Al-Hidayah dirancang untuk mendukung perkembangan holistik anak:</p>
          <ul>
            <li>Memberikan layanan pendidikan yang berkualitas agar anak tumbuh dan berkembang secara optimal.</li>
            <li>Memberikan pembinaan karakter dan keimanan yang seimbang serta berkesinambungan.</li>
            <li>Memenuhi standar mutu pendidikan demi meningkatkan profesionalitas dan dedikasi pendidik.</li>
          </ul>
        </div>
        <div class="card-watermark">
          <svg viewBox="0 0 24 24">
            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
          </svg>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ── PROGRAM PEMBELAJARAN 1 TAHUN ────────────────────────────────────── --}}
<section class="programs" id="program">
  <div class="wrap">
    <div class="programs-inner">
      <div class="programs-head">
        <div class="eyebrow">PROGRAM PEMBELAJARAN 1 TAHUN</div>
        <h2>Kurikulum Tematik &amp; Agenda Belajar 1 Tahun Ajaran</h2>
        <p>Program pembelajaran terpadu berbasis bermain yang bermakna dan berakhlakul karimah, dirancang terstruktur dalam 2 semester untuk menstimulasi 6 aspek perkembangan anak (Agama &amp; Moral, Fisik Motorik, Kognitif, Bahasa, Sosial Emosional, dan Seni).</p>
      </div>

      <!-- Tab Switcher -->
      <div class="program-tabs">
        <button type="button" class="p-tab-btn active" onclick="switchProgramTab('sem1', this)">
          <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
          Semester 1 (Ganjil: Juli – Des)
        </button>
        <button type="button" class="p-tab-btn" onclick="switchProgramTab('sem2', this)">
          <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          Semester 2 (Genap: Jan – Jun)
        </button>
        <button type="button" class="p-tab-btn" onclick="switchProgramTab('karakter', this)">
          <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          Program Karakter &amp; Pembiasaan
        </button>
      </div>

      <!-- ── TAB 1: SEMESTER 1 ── -->
      <div class="program-tab-content active" id="prog-sem1">
        <div class="program-semester-grid">
          
          <!-- Tema 1 -->
          <div class="program-box">
            <div class="pbox-header">
              <div class="pbox-icon" style="background:#4D8F5A">
                <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
              </div>
              <div>
                <div class="pbox-badge" style="color:#4D8F5A">Bulan 1 &amp; 2 • Juli – Agustus</div>
                <h4>Tema: Aku &amp; Diriku Sendiri</h4>
              </div>
            </div>
            <div class="pbox-body">
              Mengenalkan identitas diri, jenis kelamin, panca indra, anggota tubuh, serta menumbuhkan rasa percaya diri dan kemandirian anak di lingkungan sekolah baru.
            </div>
            <div class="pbox-highlights">
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Masa Pengenalan Lingkungan Sekolah (MPLS) Ramah Anak</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Praktik Cuci Tangan 6 Langkah &amp; Toilet Training Mandiri</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span><strong>Puncak Tema:</strong> Kreasi Kolase "Wajah &amp; Tubuh Ceria Ciptaan Allah"</span></div>
            </div>
          </div>

          <!-- Tema 2 -->
          <div class="program-box">
            <div class="pbox-header">
              <div class="pbox-icon" style="background:#C98A17">
                <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
              </div>
              <div>
                <div class="pbox-badge" style="color:#C98A17">Bulan 3 • September</div>
                <h4>Tema: Keluargaku &amp; Lingkunganku</h4>
              </div>
            </div>
            <div class="pbox-body">
              Mengenal peran anggota keluarga (ayah, ibu, kakak, adik, kakek, nenek), adab berbakti kepada orang tua, serta mengenal fungsi ruangan di rumah dan lingkungan sekolah.
            </div>
            <div class="pbox-highlights">
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Bercerita Silsilah Keluarga &amp; Doa Untuk Kedua Orang Tua</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Bermain Peran (Role Play): "Rumahku Surgaku &amp; Gotong Royong"</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span><strong>Puncak Tema:</strong> Hari Apresiasi &amp; Kasih Sayang Ayah Bunda (Parenting Day)</span></div>
            </div>
          </div>

          <!-- Tema 3 -->
          <div class="program-box">
            <div class="pbox-header">
              <div class="pbox-icon" style="background:#5470B8">
                <svg viewBox="0 0 24 24"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg>
              </div>
              <div>
                <div class="pbox-badge" style="color:#5470B8">Bulan 4 • Oktober</div>
                <h4>Tema: Kebutuhanku (Makanan &amp; Pakaian)</h4>
              </div>
            </div>
            <div class="pbox-body">
              Mengenalkan makanan dan minuman halal, sehat bergizi seimbang (4 Sehat 5 Sempurna), adab makan/minum sesuai sunnah Nabi, serta fungsi pakaian menutup aurat.
            </div>
            <div class="pbox-highlights">
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span><em>Cooking Class Cilik:</em> Membuat Salad Buah / Jus Sehat Bersama</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Edukasi Kebersihan Gigi &amp; Mulut Bersama Tenaga Kesehatan</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span><strong>Puncak Tema:</strong> Lomba Makan Sayur Ceria &amp; Kerapian Busana Islami</span></div>
            </div>
          </div>

          <!-- Tema 4 -->
          <div class="program-box">
            <div class="pbox-header">
              <div class="pbox-icon" style="background:#C6626E">
                <svg viewBox="0 0 24 24"><path d="M12 2a9 9 0 0 1 9 9c0 4.97-4.03 9-9 9s-9-4.03-9-9a9 9 0 0 1 9-9z"/><path d="M12 6v6l4 2"/></svg>
              </div>
              <div>
                <div class="pbox-badge" style="color:#C6626E">Bulan 5 &amp; 6 • November – Desember</div>
                <h4>Tema: Binatang &amp; Tanaman Ciptaan Allah</h4>
              </div>
            </div>
            <div class="pbox-body">
              Mengeksplorasi keanekaragaman flora dan fauna, membedakan habitat hewan darat, air, dan udara, serta belajar menyayangi dan merawat ciptaan Allah SWT.
            </div>
            <div class="pbox-highlights">
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Praktik Menanam Biji &amp; Menyiram Tanaman Hias Sekolah</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Menirukan Gerak &amp; Suara Hewan Serta Pengenalan Huruf Awal</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span><strong>Puncak Tema:</strong> Kunjungan Edukatif (Mini Zoo) &amp; Pembagian Rapor Semester 1</span></div>
            </div>
          </div>

        </div>
      </div>

      <!-- ── TAB 2: SEMESTER 2 ── -->
      <div class="program-tab-content" id="prog-sem2">
        <div class="program-semester-grid">
          
          <!-- Tema 5 -->
          <div class="program-box">
            <div class="pbox-header">
              <div class="pbox-icon" style="background:#4338CA">
                <svg viewBox="0 0 24 24"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
              </div>
              <div>
                <div class="pbox-badge" style="color:#4338CA">Bulan 7 &amp; 8 • Januari – Februari</div>
                <h4>Tema: Kendaraan &amp; Rekreasi (Transportasi)</h4>
              </div>
            </div>
            <div class="pbox-body">
              Mengenal berbagai macam alat transportasi darat, laut, dan udara, pengemudi kendaraan, rambu-rambu lalu lintas dasar, serta etika keselamatan dalam berkendara.
            </div>
            <div class="pbox-highlights">
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Simulasi Tertib Lalu Lintas &amp; Program "Polisi Sahabat Anak"</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Kreasi Membuat Miniatur Mobil &amp; Perahu dari Bahan Daur Ulang</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span><strong>Puncak Tema:</strong> <em>Outing Class</em> Edukasi Transportasi &amp; Keliling Kota</span></div>
            </div>
          </div>

          <!-- Tema 6 -->
          <div class="program-box">
            <div class="pbox-header">
              <div class="pbox-icon" style="background:#D97706">
                <svg viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
              </div>
              <div>
                <div class="pbox-badge" style="color:#D97706">Bulan 9 • Maret</div>
                <h4>Tema: Pekerjaan &amp; Profesi Mulia</h4>
              </div>
            </div>
            <div class="pbox-body">
              Menumbuhkan rasa hormat terhadap berbagai jenis profesi yang bermanfaat (guru, dokter, polisi, pemadam kebakaran, petani, koki) serta memupuk cita-cita anak sejak dini.
            </div>
            <div class="pbox-highlights">
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span><em>Career Day / Kostum Profesi Cilik:</em> Bercerita Cita-Citaku</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Simulasi Pemeriksaan Kesehatan &amp; Petugas Pemadam Cilik</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span><strong>Puncak Tema:</strong> Kunjungan Lapangan ke Pos Pemadam Kebakaran / Balai Desa</span></div>
            </div>
          </div>

          <!-- Tema 7 -->
          <div class="program-box">
            <div class="pbox-header">
              <div class="pbox-icon" style="background:#059669">
                <svg viewBox="0 0 24 24"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="4" y1="22" x2="4" y2="15"/></svg>
              </div>
              <div>
                <div class="pbox-badge" style="color:#059669">Bulan 10 • April</div>
                <h4>Tema: Negaraku, Budaya &amp; Ramadhan Ceria</h4>
              </div>
            </div>
            <div class="pbox-body">
              Mengenalkan lambang negara Garuda Pancasila, bendera Merah Putih, lagu kebangsaan, keragaman budaya nusantara, serta menyemarakkan amalan di bulan suci Ramadhan.
            </div>
            <div class="pbox-highlights">
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Pesantren Kilat Cilik: Latihan Puasa &amp; Berbagi Takjil Ramadhan</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Peringatan Hari Kartini: Parade Baju Adat Nusantara</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span><strong>Puncak Tema:</strong> Gebyar Ramadhan &amp; Santunan Cilik Ramah Berbagi</span></div>
            </div>
          </div>

          <!-- Tema 8 -->
          <div class="program-box">
            <div class="pbox-header">
              <div class="pbox-icon" style="background:#7C3AED">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
              </div>
              <div>
                <div class="pbox-badge" style="color:#7C3AED">Bulan 11 &amp; 12 • Mei – Juni</div>
                <h4>Tema: Alam Semesta &amp; Gebyar Kelulusan</h4>
              </div>
            </div>
            <div class="pbox-body">
              Mempelajari benda-benda langit (matahari, bulan, bintang, bumi), fenomena alam (siang/malam, hujan, pelangi), serta mempersiapkan pelepasan siswa menuju jenjang Sekolah Dasar.
            </div>
            <div class="pbox-highlights">
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Eksperimen Sains Sederhana: "Terjadinya Hujan &amp; Warna Pelangi"</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Latihan Kesiapan Masuk SD: Kemandirian, Calistung Dasar &amp; Emosional</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span><strong>Puncak Tema:</strong> Panggung Kreasi Seni, Wisuda &amp; Pembagian Laporan Akhir Tahun</span></div>
            </div>
          </div>

        </div>
      </div>

      <!-- ── TAB 3: PROGRAM PEMBIASAAN KARAKTER (ONGOING) ── -->
      <div class="program-tab-content" id="prog-karakter">
        <div class="program-semester-grid">
          
          <!-- Karakter 1 -->
          <div class="program-box">
            <div class="pbox-header">
              <div class="pbox-icon" style="background:#0D6B3E">
                <svg viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
              </div>
              <div>
                <div class="pbox-badge" style="color:#0D6B3E">Program Harian • Rutin</div>
                <h4>Tahfidz &amp; Tahsin Al-Qur'an Cilik</h4>
              </div>
            </div>
            <div class="pbox-body">
              Membiasakan anak akrab dengan Al-Qur'an sejak dini dengan metode talaqqi yang ceria, pengucapan makharijul huruf yang tepat, dan menghafal surat-surat pendek Juz 'Amma.
            </div>
            <div class="pbox-highlights">
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Target Hafalan: Surat An-Nas sampai At-Takatsur / An-Naba bertahap</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Hafalan Doa Sehari-hari (Doa Makan, Tidur, Masuk Masjid, Belajar)</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Mengenal Hadits Adab: Senyum, Menuntut Ilmu, Menghormati Teman</span></div>
            </div>
          </div>

          <!-- Karakter 2 -->
          <div class="program-box">
            <div class="pbox-header">
              <div class="pbox-icon" style="background:#0284C7">
                <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
              </div>
              <div>
                <div class="pbox-badge" style="color:#0284C7">Program Pagi • Harian</div>
                <h4>Sholat Dhuha Ceria &amp; Bimbingan Ibadah</h4>
              </div>
            </div>
            <div class="pbox-body">
              Pendidikan ibadah aplikatif yang membimbing anak melakukan wudhu mandiri secara berurutan dan melaksanakan sholat dhuha berjamaah setiap pagi dengan khusyuk dan gembira.
            </div>
            <div class="pbox-highlights">
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Praktik Tata Cara Wudhu yang Tertib &amp; Doa Setelah Wudhu</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Latihan Bacaan &amp; Gerakan Sholat Berjamaah</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Infaq Subuh / Kotak Amal Cilik untuk Melatih Empati Sosial</span></div>
            </div>
          </div>

          <!-- Karakter 3 -->
          <div class="program-box">
            <div class="pbox-header">
              <div class="pbox-icon" style="background:#E11D48">
                <svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20M4 19.5A2.5 2.5 0 0 0 6.5 22H20M4 19.5V3A2.5 2.5 0 0 1 6.5 .5H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5z"/></svg>
              </div>
              <div>
                <div class="pbox-badge" style="color:#E11D48">Kesiapan Literasi • Akademik</div>
                <h4>Fun Calistung &amp; Eksplorasi Kognitif</h4>
              </div>
            </div>
            <div class="pbox-body">
              Pembelajaran membaca, menulis, dan berhitung dasar tanpa paksaan melalui metode bermain kartu huruf, flashcard, pasir kinetik, balok geometri, dan logika matematika awal.
            </div>
            <div class="pbox-highlights">
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Fonik Huruf Abjad &amp; Pengenalan Kata Bermakna</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Konsep Bilangan 1-20, Pola Warna, Bentuk, &amp; Perbandingan Ukuran</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Sudut Baca &amp; Mendengarkan Dongeng Edukatif (Storytelling)</span></div>
            </div>
          </div>

          <!-- Karakter 4 -->
          <div class="program-box">
            <div class="pbox-header">
              <div class="pbox-icon" style="background:#7E22CE">
                <svg viewBox="0 0 24 24"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
              </div>
              <div>
                <div class="pbox-badge" style="color:#7E22CE">Motorik &amp; Kreativitas • Mingguan</div>
                <h4>Senam Sehat, Motorik &amp; Seni Rupa</h4>
              </div>
            </div>
            <div class="pbox-body">
              Menyeimbangkan keterampilan motorik kasar melalui senam irama anak ceria setiap Jumat, melatih motorik halus lewat kolase, melukis, melipat origami, dan menyanyi lagu anak.
            </div>
            <div class="pbox-highlights">
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Senam Irama Ceria &amp; Permainan Tradisional Edukatif</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Mewarnai, Menggunting, Meronce &amp; Finger Painting</span></div>
              <div class="pbox-hl-item"><span class="bullet">✔</span> <span>Pembagian Makanan Sehat Tambahan (PMT) Bergizi</span></div>
            </div>
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
        <span>🏫 KB-PAUD Al-Hidayah Jepara</span>
        <span style="font-size:11px;">Gunakan tombol panah ⬅️ ➡️ pada keyboard</span>
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
        <div class="icon">📊</div>
        <h4>Laporan Perkembangan</h4>
        <p>Lihat laporan bulanan per aspek: kognitif, motorik, bahasa, sosial-emosional, dan nilai agama-moral.</p>
      </div>
      <div class="portal-card">
        <div class="icon">🔔</div>
        <h4>Notifikasi Laporan Baru</h4>
        <p>Dapatkan notifikasi otomatis saat guru mempublikasikan laporan perkembangan terbaru anak Anda.</p>
      </div>
      <div class="portal-card">
        <div class="icon">📄</div>
        <h4>Unduh PDF Laporan</h4>
        <p>Simpan dan cetak laporan perkembangan anak dalam format PDF kapan saja Anda butuhkan.</p>
      </div>
    </div>
    <div class="portal-footer">
      <a href="{{ route('login') }}" class="btn btn-masuk" style="font-size:15px;padding:15px 32px;">🔐 Masuk untuk Lihat Laporan Anak →</a>
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
        <div style="display:flex;flex-direction:column;gap:10px;margin-top:6px">
          <div style="display:flex;align-items:flex-start;gap:10px;font-size:13.5px;color:#c7cde0">
            <span>📍</span> <span>FQMJ+FVG, Jl. Jepara - Bangsri, Batosari, Wedelan, Kec. Bangsri, Jepara, Jawa Tengah 59453</span>
          </div>
          <div style="display:flex;align-items:center;gap:10px;font-size:13.5px;color:#c7cde0">
            <span>📞</span> <span>0812-3456-7890</span>
          </div>
          <div style="display:flex;align-items:center;gap:10px;font-size:13.5px;color:#c7cde0">
            <span>✉️</span> <span>admin@paud-alhidayah.sch.id</span>
          </div>
        </div>
        <a href="{{ route('login') }}" class="btn btn-gold">🔐 Portal Laporan Anak →</a>
      </div>

      {{-- Google Maps Card --}}
      <div class="map-card">
        <iframe
          src="https://maps.google.com/maps?q=FQMJ%2BFVG%2C+Jl.+Jepara+-+Bangsri%2C+Batosari%2C+Wedelan%2C+Kec.+Bangsri%2C+Kabupaten+Jepara%2C+Jawa+Tengah+59453&t=&z=16&ie=UTF8&iwloc=&output=embed"
          width="100%"
          height="100%"
          style="border:0;"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
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
      } else if (href.includes(current) && current !== '') {
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
