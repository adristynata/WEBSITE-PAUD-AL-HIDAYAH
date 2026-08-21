<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="PAUD Al-Hidayah — Sekolah usia dini yang menumbuhkan rasa ingin tahu dan kebaikan hati anak dalam lingkungan yang aman, menyenangkan, dan penuh inspirasi.">
<title>PAUD Al-Hidayah — Awal yang Cerah untuk Masa Depan yang Gemilang</title>
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



  /* header */
  header{
    position:absolute;top:0;left:0;right:0;z-index:100;
    padding:14px 0;
    background:transparent;
    border-bottom:none;
    box-shadow:none;
  }
  header .wrap{display:flex;align-items:center;justify-content:space-between;gap:24px;}
  .logo{display:flex;align-items:center;gap:11px;}
  .logo-mark{
    width:42px;height:42px;border-radius:50%;
    background:transparent;
    display:flex;align-items:center;justify-content:center;
  }
  .logo-text{
    display:flex;
    flex-direction:column;
    justify-content:center;
  }
  .logo-text .brand{
    font-size:17px;
    font-weight:800;
    color:#fff;
    line-height:1.2;
    letter-spacing:0.5px;
  }
  .logo-text .sub{
    font-size:9.5px;
    font-weight:700;
    color:rgba(255,255,255,0.8);
    line-height:1.2;
    letter-spacing:0.8px;
    margin-top:1px;
    text-transform:uppercase;
  }
  nav{display:flex;gap:30px;}
  nav a{
    font-size:15px;font-weight:700;color:#fff;
    position:relative;padding-bottom:4px;
    transition:color .15s;
  }
  nav a:hover{color:var(--gold);}
  nav a::after{
    content:"";position:absolute;left:0;bottom:0;width:100%;height:3px;
    background:var(--gold);border-radius:2px;
    transform:scaleX(0);
    transform-origin:right;
    transition:transform .25s ease-out;
  }
  nav a:hover::after, nav a.active::after{
    transform:scaleX(1);
    transform-origin:left;
  }
  .btn{
    display:inline-flex;align-items:center;justify-content:center;
    font-weight:800;font-size:14px;
    padding:12px 28px;border-radius:30px;
    cursor:pointer;transition:transform .15s ease, background-color .15s ease;
    white-space:nowrap;font-family:'Poppins',sans-serif;
    border:none;
  }
  .btn:hover{transform:translateY(-2px);}
  .btn-masuk{
    background:#143818; /* Dark green matching screenshot */
    color:#fff;
  }
  .btn-masuk:hover{
    background:#0a1e0d;
  }
  
  /* Hamburger Menu Toggle */
  .header-actions{
    display:flex;
    align-items:center;
    gap:12px;
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
    background-color: #fff;
    border-radius: 3px;
    transition: all 0.3s ease;
  }
  .btn-lihat-selengkapnya{
    background:#fff;
    color:#1B2B4B;
    font-size:13px;
    letter-spacing: 0.5px;
    font-weight: 800;
    padding: 14px 36px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
  }
  .btn-lihat-selengkapnya:hover{
    background:#f5efe0;
  }

  /* hero — full-width banner */
  .hero{position:relative;padding:0;overflow:hidden;}
  .hero-banner{
    width:100%;height:680px;object-fit:cover;object-position:center;
    display:block;
  }
  .hero-overlay{
    position:absolute;inset:0;
    background:rgba(0, 0, 0, 0.45); /* Dark vignette */
    display:flex;flex-direction:column;align-items:center;justify-content:center;
    padding:0 32px;
    text-align:center;
  }
  .hero-overlay h1{
    font-size:52px;line-height:1.2;color:#fff;
    margin-bottom:18px;font-weight:800;
    text-shadow:0 2px 20px rgba(0,0,0,0.3);
    text-align:center;
  }
  .hero-overlay p.lead{
    font-size:18px;color:rgba(255,255,255,.9);max-width:720px;
    margin:0 auto 32px;
    line-height:1.65;
    text-shadow:0 1px 8px rgba(0,0,0,0.25);
    text-align:center;
  }
  .hero-ctas{display:flex;gap:14px;flex-wrap:wrap;justify-content:center;width:100%;}

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
  .sambutan-text p{
    font-size:15px;line-height:1.85;color:#4b4b55;
    margin-bottom:14px;
  }
  .sambutan-text p:last-child{margin-bottom:0;}
  .sambutan-text .wassalam{font-weight:800;color:var(--navy);margin-top:10px;}

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
  }
  .card-content p {
    margin-bottom: 12px;
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

  /* programs */
  .programs{padding:80px 0 100px;}
  .programs-inner{
    background:var(--cream-soft);border:1px solid var(--line);
    border-radius:28px;padding:56px 44px;
  }
  .programs-head{text-align:center;margin-bottom:40px;}
  .programs-head h2{font-size:30px;color:var(--navy);margin-top:10px;}
  .eyebrow-green{color:#5FA05F;}
  .program-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:20px;}
  .program-card{
    border-radius:18px;padding:26px 22px;min-height:230px;
    display:flex;flex-direction:column;
  }
  .program-card .p-icon{
    width:46px;height:46px;border-radius:12px;background:#fff;
    display:flex;align-items:center;justify-content:center;margin-bottom:18px;
    font-weight:800;font-size:14px;
  }
  .program-card .p-eyebrow{font-size:11px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;margin-bottom:4px;}
  .program-card h4{font-size:18px;color:var(--navy);margin-bottom:10px;font-family:'Baloo 2',sans-serif;}
  .program-card p{font-size:13px;color:#63636c;line-height:1.55;flex-grow:1;}
  .program-card .p-link{font-size:12.5px;font-weight:800;margin-top:14px;display:inline-flex;align-items:center;gap:6px;}
  .p-1{background:#E7F2E9;}
  .p-1 .p-eyebrow{color:#4D8F5A;}
  .p-1 .p-link{color:#4D8F5A;}
  .p-2{background:#FDF1DC;}
  .p-2 .p-eyebrow{color:#C98A17;}
  .p-2 .p-link{color:#C98A17;}
  .p-3{background:#E7EDF9;}
  .p-3 .p-eyebrow{color:#5470B8;}
  .p-3 .p-link{color:#5470B8;}
  .p-4{background:#FBE8E8;}
  .p-4 .p-eyebrow{color:#C6626E;}
  .p-4 .p-link{color:#C6626E;}

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

    nav {
      position: fixed;
      top: 0;
      right: -100%;
      width: 280px;
      height: 100vh;
      background: #143818;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 24px;
      padding: 80px 32px;
      box-shadow: -5px 0 25px rgba(0,0,0,0.15);
      transition: right 0.3s ease;
      z-index: 105;
    }
    nav.active {
      right: 0;
    }
    nav a {
      font-size: 17px;
      color: #fff !important;
      width: 100%;
      text-align: center;
      padding: 10px 0;
    }
    nav a::after {
      content: "";
      position: absolute;
      width: 40px;
      left: calc(50% - 20px);
      bottom: 4px;
      background: var(--gold);
      height: 3px;
      border-radius: 2px;
      transform: scaleX(0);
      transform-origin: center;
      transition: transform 0.25s ease-out;
    }
    nav a:hover::after, nav a.active::after {
      transform: scaleX(1);
    }
    .btn-masuk-mobile {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background: var(--gold);
      color: #143818 !important;
      font-weight: 800;
      font-size: 14px;
      padding: 12px 24px;
      border-radius: 30px;
      margin-top: 16px;
      width: 100%;
      text-shadow: none;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
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
    .hero-banner { height: 500px; }
    .hero-overlay { padding-top: 80px; }
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

    /* Tentang Kami (Profil) */
    .profil-section { padding: 60px 0 50px; }
    .profil-card { padding: 28px 24px; }
    .profil-head h2 { font-size: 28px; }

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
    .hero-banner { height: 440px; }
    .hero-overlay h1 { font-size: 24px; text-align: center; }
    .hero-overlay p.lead { font-size: 13px; line-height: 1.6; margin: 0 auto 20px; text-align: center; }

    /* Features Strip */
    .features-card { grid-template-columns: 1fr; gap: 12px; }
    .feature-item:nth-child(5) { grid-column: span 1; }
    
    /* Program Grid */
    .programs { padding: 50px 0; }
    .programs-inner { padding: 28px 16px; }
    .program-grid { grid-template-columns: 1fr; gap: 12px; }

    /* Tentang Kami (Profil) */
    .profil-card { padding: 24px 20px; }
    .card-header-row h3 { font-size: 18px; }
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
  }
  .gallery-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 20px rgba(0,0,0,0.06);
  }
  .gallery-img-wrapper {
    width: 100%;
    height: 200px;
    overflow: hidden;
    background: #eee;
  }
  .gallery-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .3s ease;
  }
  .gallery-card:hover .gallery-img-wrapper img {
    transform: scale(1.05);
  }
  .gallery-info {
    padding: 16px 20px;
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
    line-height: 1.5;
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

    <nav>
      <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
      <a href="#tentang">Tentang</a>
      <a href="#galeri">Galeri</a>
      <a href="#kontak">Kontak</a>
      <a href="#program">Program</a>
      <a href="{{ route('login') }}" class="btn-masuk-mobile">Masuk Portal</a>
    </nav>

    <div class="header-actions">
      <a href="{{ route('login') }}" class="btn btn-masuk">Masuk</a>
      <button class="menu-toggle" id="menuToggle" aria-label="Buka Menu">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
  </div>
</header>

{{-- ── HERO ─────────────────────────────────────────────────────────────── --}}
<section class="hero" id="beranda">
  <img
    class="hero-banner"
    src="{{ asset('images/gedung-sekolah.jpg') }}"
    alt="Gedung PAUD Al-Hidayah">

  <div class="hero-overlay">
    <h1>Selamat Datang di<br>PAUD Al Hidayah</h1>
    <p class="lead">Membentuk generasi cerdas, mandiri, dan berakhlakul karimah melalui pendidikan usia dini yang menyenangkan dan terarah.</p>
    <div class="hero-ctas">
      <a href="#tentang" class="btn btn-lihat-selengkapnya">LIHAT SELENGKAPNYA</a>
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
            {!! nl2br(e($profil->sambutan_teks)) !!}
          @else
            <p>Assalamu'alaikum Warahmatullahi Wabarakatuh,</p>
            <p>Selamat datang di keluarga besar PAUD Al Hidayah. Kami percaya bahwa setiap anak adalah bintang yang memiliki cahaya masing-masing. Di sini, kami hadir untuk menjaga cahaya tersebut tetap bersinar melalui kasih sayang dan bimbingan yang tepat.</p>
            <p>Terima kasih atas kepercayaan yang Anda berikan kepada kami untuk mendampingi masa-masing emas (golden age) buah hati Anda. Mari bersama-sama kita tuntun langkah awal mereka menuju masa depan yang gemilang.</p>
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
      <h2></h2> 
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
            <strong>PAUD Al-Hidayah</strong> merupakan lembaga pendidikan anak usia dini yang berbasis Islami di Desa Wedelan, Kecamatan Bangsri, Kabupaten Jepara. Kami berkomitmen untuk menyelenggarakan pendidikan anak usia dini yang berlandaskan nilai-nilai keagamaan, kemandirian, serta kreativitas.
          </p>
          <p>
            Melalui pendekatan belajar sambil bermain, kami mempersiapkan anak-anak untuk tumbuh dan berkembang secara holistik (fisik-motorik, kognitif, bahasa, sosial-emosional, serta nilai agama dan moral) guna menyongsong masa depan yang cerah, cerdas, dan berkarakter mulia sejak dini.
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
          <p style="font-size: 17px; font-weight: 700; color: var(--navy); font-family: 'Baloo 2', sans-serif; line-height: 1.5; margin-bottom: 8px;">
            "Membentuk anak yang cerdas,baik dan terampil,berakhlak mulia,sholih/sholihah sehingga terwujud anak yang kreatif dan mandiri."
          </p>
          <p>
            Visi ini menjadi arah dasar kami dalam membimbing tumbuh kembang buah hati Anda agar menjadi pribadi unggul yang cerdas intelektualnya, mantap kemandiriannya, serta mulia akhlaknya.
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
            <li>Melaksanakan pembelajaran aktif,kreatif,efektif,dan inovatif.</li>
            <li>Mendidik anak secara optimal sesuai kemampuan anak.</li>
            <li>Menyiapkan anak didik ke jenjang pendidikan dasar dengan ketercapaian Kompetensi Dasar sesuai tahap perkembangan anak.</li>
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
            <li>Memberikan layanan pendidikan yang berkualitas agar anak tumbuh  dan berkembang secara optimal.</li>
            <li>Memberikan pembinaan yang seimbang dan berkesinambungan sebagai upaya dalam meningkatkan mutu pendidikan.</li>
            <li>Memenuhi standar kualifikasi pendidikan sebagai upaya dalam meningkatkan profesionalitas pendidikan.</li>
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

{{-- ── PROGRAM ─────────────────────────────────────────────────────────── --}}
<section class="programs" id="program">
  <div class="wrap">
    <div class="programs-inner">
      <div class="programs-head">
        <div class="eyebrow eyebrow-green">PROGRAM KAMI</div>
        <h2>Program untuk Setiap Tahap Pertumbuhan</h2>
      </div>
      <div class="program-grid">
        <div class="program-card p-1">
          <div class="p-icon" style="color:#4D8F5A">ABC</div>
          <div class="p-eyebrow">KELOMPOK BAYI</div>
          <h4>6 Minggu &ndash; 18 Bulan</h4>
          <p>Perawatan penuh kasih dan stimulasi belajar dini di lingkungan yang hangat dan terpercaya.</p>
          <a href="#program" class="p-link">SELENGKAPNYA →</a>
        </div>
        <div class="program-card p-2">
          <div class="p-icon" style="color:#C98A17">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M6 21V5a2 2 0 012-2h10v18H8a2 2 0 01-2-2z"/><path d="M6 17h12"/>
            </svg>
          </div>
          <div class="p-eyebrow">KELOMPOK BERMAIN</div>
          <h4>18 Bulan &ndash; 3 Tahun</h4>
          <p>Menjelajahi dunia melalui bermain, penemuan, dan imajinasi yang penuh warna.</p>
          <a href="#program" class="p-link">SELENGKAPNYA →</a>
        </div>
        <div class="program-card p-3">
          <div class="p-icon" style="color:#5470B8">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M12 20h9M16.5 3.5a2.1 2.1 0 013 3L7 19l-4 1 1-4 12.5-12.5z"/>
            </svg>
          </div>
          <div class="p-eyebrow">TK A</div>
          <h4>4 &ndash; 5 Tahun</h4>
          <p>Membangun keterampilan, rasa percaya diri, dan kecintaan belajar melalui aktivitas menyenangkan.</p>
          <a href="#program" class="p-link">SELENGKAPNYA →</a>
        </div>
        <div class="program-card p-4">
          <div class="p-icon" style="color:#C6626E">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M4 7V5a2 2 0 012-2h4l2 2h6a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V7z"/>
            </svg>
          </div>
          <div class="p-eyebrow">TK B</div>
          <h4>5 &ndash; 6 Tahun</h4>
          <p>Mempersiapkan anak menuju sekolah dasar dengan keterampilan akademik dan sosial yang matang.</p>
          <a href="#program" class="p-link">SELENGKAPNYA →</a>
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
    </div>
    <div class="gallery-grid">
      @forelse($galeris as $galeri)
        <div class="gallery-card">
          <div class="gallery-img-wrapper">
            <img src="{{ asset($galeri->foto) }}" alt="{{ $galeri->judul }}" loading="lazy">
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
            <span>📍</span> <span>Desa Wedelan, Kecamatan Bangsri, Kabupaten Jepara, Jawa Tengah</span>
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
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31693.4159512345!2d110.7650!3d-6.5200!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e711867c464c205%3A0x4027a76e352f200!2sWedelan%2C%20Bangsri%2C%20Jepara%20Regency%2C%20Central%20Java!5e0!3m2!1sen!2sid!4v1620000000000!5m2!1sen!2sid"
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
  const navMenu = document.querySelector('nav');

  menuToggle.addEventListener('click', () => {
    menuToggle.classList.toggle('active');
    navMenu.classList.toggle('active');
  });

  // Close menu when a link is clicked
  const navLinks = document.querySelectorAll('nav a');
  navLinks.forEach(link => {
    link.addEventListener('click', () => {
      menuToggle.classList.remove('active');
      navMenu.classList.remove('active');
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
  });
</script>
</body>
</html>
