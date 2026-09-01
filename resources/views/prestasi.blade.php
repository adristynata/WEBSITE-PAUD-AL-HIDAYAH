<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prestasi &amp; Kejuaraan - KB-PAUD Al-Hidayah Wedelan</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}?v={{ time() }}">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v={{ time() }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <style>
    :root {
      --green: #10B981;
      --green-dark: #059669;
      --navy: #1B2B4B;
      --cream: #FFFFFF;
      --cream-soft: #F4F9F4;
      --yellow: #F4B93E;
      --pink: #EC4899;
      --purple: #8B5CF6;
      --blue: #3B82F6;
      --ink: #2B2B33;
      --line: #E2EFE4;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Poppins', sans-serif;
      color: var(--ink);
      background-color: #F8FAFC;
      line-height: 1.6;
      -webkit-font-smoothing: antialiased;
    }
    h1, h2, h3, .brand { font-family: 'Baloo 2', sans-serif; }
    a { text-decoration: none; color: inherit; }

    .wrap { max-width: 1200px; margin: 0 auto; padding: 0 32px; }

    /* ── HEADER NAVBAR 100% PERSIS LANDING PAGE ── */
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
      font-family: 'Poppins', sans-serif;
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

    /* ── MOBILE RESPONSIVE NAVIGATION DRAWER ── */
    @media (max-width: 992px) {
      .menu-toggle {
        display: flex;
      }
      .nav-backdrop {
        display: block;
        position: fixed;
        inset: 0;
        background: rgba(15, 23, 42, 0.55);
        backdrop-filter: blur(4px);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 1050;
      }
      .nav-backdrop.active {
        opacity: 1;
        visibility: visible;
      }
      nav#mobileNav {
        position: fixed;
        top: 0;
        right: -320px;
        width: 300px;
        height: 100vh;
        background: #FFFFFF;
        box-shadow: -8px 0 32px rgba(15, 23, 42, 0.18);
        z-index: 1100;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 0;
        transition: right 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        overflow-y: auto;
      }
      nav#mobileNav.active {
        right: 0;
      }
      .nav-drawer-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 24px;
        border-bottom: 1px solid #F1F5F9;
        background: #FAFAFA;
      }
      .drawer-brand {
        display: flex;
        align-items: center;
        gap: 10px;
      }
      .nav-drawer-close {
        background: #F1F5F9;
        border: none;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #475569;
        cursor: pointer;
      }
      .nav-menu-list {
        display: flex;
        flex-direction: column;
        gap: 4px;
        padding: 16px 16px 0;
        align-items: stretch;
      }
      nav a.nav-link-item {
        padding: 12px 16px;
        border-radius: 12px;
        justify-content: space-between;
        color: #334155;
        font-size: 14.5px;
        font-weight: 700;
      }
      nav a.nav-link-item:hover,
      nav a.nav-link-item.active {
        background: #F0FDF4;
        color: #143818;
      }
      nav a.nav-link-item::after { display: none; }
      .nav-item-left {
        display: flex;
        align-items: center;
        gap: 12px;
      }
      .nav-item-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 8px;
        background: #F1F5F9;
        color: #475569;
      }
      .nav-item-icon svg { width: 16px; height: 16px; }
      .nav-item-arrow {
        display: block;
        font-size: 18px;
        color: #94A3B8;
        font-weight: 400;
      }
      .nav-drawer-footer {
        display: flex;
        flex-direction: column;
        gap: 12px;
        padding: 20px 24px 28px;
        border-top: 1px solid #F1F5F9;
        background: #FAFAFA;
      }
      .btn-masuk-drawer {
        background: #143818;
        color: #FFFFFF;
        font-weight: 800;
        font-size: 14px;
        padding: 12px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        box-shadow: 0 4px 12px rgba(20, 56, 24, 0.2);
        text-decoration: none;
      }
      .header-actions .btn-masuk {
        padding: 8px 18px;
        font-size: 13px;
      }
    }

    /* ── HERO PRESTASI ── */
    .hero-prestasi {
      margin-top: 72px;
      background: linear-gradient(135deg, #0F172A 0%, #1E293B 50%, #064E3B 100%);
      color: #FFFFFF;
      padding: 70px 0 90px;
      position: relative;
      overflow: hidden;
      text-align: center;
    }
    .hero-prestasi-cloud {
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: radial-gradient(circle at 10% 20%, rgba(16,185,129,0.15) 0%, transparent 40%),
                  radial-gradient(circle at 90% 80%, rgba(245,158,11,0.15) 0%, transparent 40%);
      pointer-events: none;
    }
    .badge-hero-trophy {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(245, 158, 11, 0.2);
      border: 1px solid rgba(245, 158, 11, 0.4);
      color: #FBBF24;
      font-weight: 800;
      font-size: 12px;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      padding: 6px 18px;
      border-radius: 20px;
      margin-bottom: 16px;
    }
    .hero-prestasi h1 {
      font-family: 'Baloo 2', sans-serif;
      font-size: 42px;
      font-weight: 900;
      line-height: 1.2;
      margin-bottom: 12px;
      color: #FFFFFF;
    }
    .hero-prestasi p {
      font-size: 16px;
      color: #94A3B8;
      max-width: 680px;
      margin: 0 auto 36px;
    }

    /* STATS COUNTER */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 16px;
      max-width: 900px;
      margin: 0 auto;
    }
    .stat-card {
      background: rgba(255, 255, 255, 0.06);
      border: 1px solid rgba(255, 255, 255, 0.12);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 20px;
      text-align: center;
    }
    .stat-number {
      font-family: 'Baloo 2', sans-serif;
      font-size: 32px;
      font-weight: 900;
      color: #FBBF24;
      line-height: 1;
      margin-bottom: 4px;
    }
    .stat-label {
      font-size: 12px;
      font-weight: 700;
      color: #CBD5E1;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    /* ── SECTION PRESTASI MAIN ── */
    .prestasi-section {
      padding: 60px 0 90px;
    }
    
    /* FILTER TABS */
    .filter-tabs {
      display: flex;
      justify-content: center;
      gap: 10px;
      flex-wrap: wrap;
      margin-bottom: 40px;
    }
    .filter-btn {
      background: #FFFFFF;
      border: 1px solid #CBD5E1;
      color: #475569;
      font-weight: 800;
      font-size: 13.5px;
      padding: 10px 22px;
      border-radius: 25px;
      cursor: pointer;
      transition: all 0.25s ease;
      box-shadow: 0 2px 6px rgba(0,0,0,0.03);
    }
    .filter-btn:hover, .filter-btn.active {
      background: var(--green-dark);
      color: #FFFFFF;
      border-color: var(--green-dark);
      box-shadow: 0 6px 16px rgba(5, 150, 105, 0.25);
    }

    /* PRESTASI GRID */
    .prestasi-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 28px;
    }
    .prestasi-card {
      background: #FFFFFF;
      border-radius: 22px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0,0,0,0.05);
      border: 1px solid #E2E8F0;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      display: flex;
      flex-direction: column;
    }
    .prestasi-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 20px 40px rgba(15, 23, 42, 0.12);
    }
    .prestasi-img-box {
      width: 100%;
      height: 220px;
      position: relative;
      overflow: hidden;
      background: #CBD5E1;
    }
    .prestasi-img-box img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.4s ease;
    }
    .prestasi-card:hover .prestasi-img-box img {
      transform: scale(1.06);
    }
    .prestasi-rank-badge {
      position: absolute;
      top: 14px;
      left: 14px;
      background: linear-gradient(135deg, #F59E0B, #D97706);
      color: #FFFFFF;
      font-weight: 900;
      font-size: 11px;
      letter-spacing: 0.05em;
      text-transform: uppercase;
      padding: 6px 14px;
      border-radius: 20px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }
    .prestasi-rank-badge.silver {
      background: linear-gradient(135deg, #94A3B8, #64748B);
    }
    .prestasi-rank-badge.bronze {
      background: linear-gradient(135deg, #D97706, #78350F);
    }
    .prestasi-rank-badge.green {
      background: linear-gradient(135deg, #10B981, #047857);
    }
    .prestasi-year-tag {
      position: absolute;
      bottom: 12px;
      right: 14px;
      background: rgba(15, 23, 42, 0.85);
      color: #FFFFFF;
      font-size: 11px;
      font-weight: 800;
      padding: 4px 12px;
      border-radius: 12px;
      backdrop-filter: blur(4px);
    }
    .prestasi-content {
      padding: 22px;
      display: flex;
      flex-direction: column;
      flex: 1;
      justify-content: space-between;
    }
    .prestasi-category {
      font-size: 11px;
      font-weight: 800;
      color: var(--green-dark);
      text-transform: uppercase;
      letter-spacing: 0.08em;
      margin-bottom: 6px;
    }
    .prestasi-title {
      font-family: 'Baloo 2', sans-serif;
      font-size: 20px;
      font-weight: 800;
      color: var(--navy);
      line-height: 1.3;
      margin-bottom: 8px;
    }
    .prestasi-desc {
      font-size: 13px;
      color: #64748B;
      line-height: 1.55;
      margin-bottom: 16px;
    }
    .prestasi-winner {
      display: flex;
      align-items: center;
      gap: 10px;
      padding-top: 14px;
      border-top: 1px dashed #E2E8F0;
    }
    .winner-avatar {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background: #FEF3C7;
      color: #D97706;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 900;
      font-size: 14px;
    }
    .winner-info {
      display: flex;
      flex-direction: column;
    }
    .winner-name {
      font-size: 13px;
      font-weight: 800;
      color: var(--navy);
    }
    .winner-event {
      font-size: 11px;
      color: #64748B;
    }

    /* FOOTER */
    footer {
      background: #0F172A;
      color: #94A3B8;
      padding: 40px 0 24px;
      text-align: center;
      font-size: 13px;
      border-top: 1px solid #1E293B;
    }

    /* RESPONSIVE */
    @media (max-width: 992px) {
      .prestasi-grid { grid-template-columns: repeat(2, 1fr); }
      .stats-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 576px) {
      .prestasi-grid { grid-template-columns: 1fr; }
      .hero-prestasi h1 { font-size: 30px; }
      .stats-grid { grid-template-columns: 1fr 1fr; }
    }
  </style>
</head>
<body>

  <!-- HEADER NAVBAR 100% PERSIS LANDING PAGE -->
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
          <a href="{{ route('home') }}" class="nav-link-item">
            <div class="nav-item-left">
              <div class="nav-item-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
              </div>
              <span>Beranda</span>
            </div>
            <span class="nav-item-arrow">›</span>
          </a>

          <a href="{{ route('home') }}#tentang" class="nav-link-item">
            <div class="nav-item-left">
              <div class="nav-item-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20M4 19.5A2.5 2.5 0 0 0 6.5 22H20M4 19.5V3A2.5 2.5 0 0 1 6.5 .5H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5z"/></svg>
              </div>
              <span>Tentang Kami</span>
            </div>
            <span class="nav-item-arrow">›</span>
          </a>

          <a href="{{ route('home') }}#program" class="nav-link-item">
            <div class="nav-item-left">
              <div class="nav-item-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
              </div>
              <span>Program Belajar</span>
            </div>
            <span class="nav-item-arrow">›</span>
          </a>

          <a href="{{ route('prestasi') }}" class="nav-link-item active">
            <div class="nav-item-left">
              <div class="nav-item-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.45 1-1 1H7v3h10v-3h-2c-.55 0-1-.45-1-1v-2.34"/><path d="M18 4H6v7a6 6 0 0 0 12 0V4z"/></svg>
              </div>
              <span>Prestasi</span>
            </div>
            <span class="nav-item-arrow">›</span>
          </a>

          <a href="{{ route('galeri.publik') }}" class="nav-link-item">
            <div class="nav-item-left">
              <div class="nav-item-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
              </div>
              <span>Galeri Kegiatan</span>
            </div>
            <span class="nav-item-arrow">›</span>
          </a>

          <a href="{{ route('home') }}#kontak" class="nav-link-item">
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
            KB-PAUD Al-Hidayah • Wedelan Jepara
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

  <!-- HERO PRESTASI -->
  <section class="hero-prestasi">
    <div class="hero-prestasi-cloud"></div>
    <div class="wrap">
      <div class="badge-hero-trophy" style="display:inline-flex;align-items:center;gap:6px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:15px;height:15px;color:#FBBF24;"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.45 1-1 1H7v3h10v-3h-2c-.55 0-1-.45-1-1v-2.34"/><path d="M18 4H6v7a6 6 0 0 0 12 0V4z"/></svg>
        <span>KEJUARAAN &amp; APRESIASI ANANDA</span>
      </div>
      <h1>Prestasi &amp; Penjurian Terbaik KB-PAUD Al-Hidayah</h1>
      <p>Deretan trofi kejuaraan, sertifikat penghargaan, dan prestasi membanggakan yang diraih oleh siswa-siswi serta sekolah dalam mengasah kreativitas, keberanian, dan akhlak Sejak Dini.</p>

      <!-- COUNTER STATS -->
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-number">12+</div>
          <div class="stat-label">Juara 1 &amp; Utama</div>
        </div>
        <div class="stat-card">
          <div class="stat-number">8+</div>
          <div class="stat-label">Juara 2 &amp; Harapan</div>
        </div>
        <div class="stat-card">
          <div class="stat-number">15+</div>
          <div class="stat-label">Trofi Kejuaraan</div>
        </div>
        <div class="stat-card">
          <div class="stat-number">100%</div>
          <div class="stat-label">Apresiasi Siswa</div>
        </div>
      </div>
    </div>
  </section>

  <!-- PRESTASI CONTENT -->
  <section class="prestasi-section">
    <div class="wrap">

      <!-- FILTER TABS -->
      <div class="filter-tabs">
        <button class="filter-btn active" onclick="filterPrestasi('all', this)">Semua Prestasi</button>
        <button class="filter-btn" onclick="filterPrestasi('seni', this)" style="display:inline-flex;align-items:center;gap:6px;">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><circle cx="12" cy="12" r="10"/><path d="M12 2a10 10 0 0 0 0 20c1.5 0 2.5-1 2.5-2.5 0-.7-.3-1.3-.7-1.7-.4-.4-.7-1-.7-1.8 0-1.4 1.1-2.5 2.5-2.5H18a4 4 0 0 0 4-4c0-4.4-4.5-8-10-8z"/></svg>
          <span>Seni &amp; Kreativitas</span>
        </button>
        <button class="filter-btn" onclick="filterPrestasi('agama', this)" style="display:inline-flex;align-items:center;gap:6px;">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20M4 19.5A2.5 2.5 0 0 0 6.5 22H20M4 19.5V3A2.5 2.5 0 0 1 6.5 .5H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5z"/></svg>
          <span>Tahfidz &amp; Agama</span>
        </button>
        <button class="filter-btn" onclick="filterPrestasi('olahraga', this)" style="display:inline-flex;align-items:center;gap:6px;">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><circle cx="12" cy="5" r="3"/><path d="M12 8v8M8 12l4-2 4 2M9 20l3-4 3 4"/></svg>
          <span>Olahraga &amp; Motorik</span>
        </button>
        <button class="filter-btn" onclick="filterPrestasi('sekolah', this)" style="display:inline-flex;align-items:center;gap:6px;">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          <span>Penghargaan Sekolah</span>
        </button>
      </div>

      <!-- PRESTASI CARDS GRID (DINAMIS DARI DATABASE) -->
      <div class="prestasi-grid">

        @forelse($prestasis as $item)
          <div class="prestasi-card" data-cat="{{ $item->kategori }}">
            <div class="prestasi-img-box">
              <span class="prestasi-rank-badge @if(str_contains(strtolower($item->peringkat), '2')) silver @elseif(str_contains(strtolower($item->peringkat), '3')) bronze @elseif($item->kategori == 'sekolah' || $item->kategori == 'agama') green @endif">
                {{ strtoupper($item->peringkat) }}
              </span>
              <span class="prestasi-year-tag">{{ $item->tahun }}</span>
              <img src="{{ asset($item->foto ?: 'images/gedung-sekolah.jpg') }}" alt="{{ $item->judul }}" onerror="this.src='{{ asset('images/gedung-sekolah.jpg') }}'">
            </div>
            <div class="prestasi-content">
              <div>
                <div class="prestasi-category" style="display:inline-flex;align-items:center;gap:5px;">
                  @if($item->kategori == 'seni')
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:12px;height:12px;"><circle cx="12" cy="12" r="10"/><path d="M12 2a10 10 0 0 0 0 20c1.5 0 2.5-1 2.5-2.5 0-.7-.3-1.3-.7-1.7-.4-.4-.7-1-.7-1.8 0-1.4 1.1-2.5 2.5-2.5H18a4 4 0 0 0 4-4c0-4.4-4.5-8-10-8z"/></svg>
                    <span>Seni &amp; Kreativitas</span>
                  @elseif($item->kategori == 'agama')
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:12px;height:12px;"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20M4 19.5A2.5 2.5 0 0 0 6.5 22H20M4 19.5V3A2.5 2.5 0 0 1 6.5 .5H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5z"/></svg>
                    <span>Tahfidz &amp; Agama</span>
                  @elseif($item->kategori == 'olahraga')
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:12px;height:12px;"><circle cx="12" cy="5" r="3"/><path d="M12 8v8M8 12l4-2 4 2M9 20l3-4 3 4"/></svg>
                    <span>Olahraga &amp; Motorik</span>
                  @else
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:12px;height:12px;"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    <span>Penghargaan Sekolah</span>
                  @endif
                </div>
                <h3 class="prestasi-title">{{ $item->judul }}</h3>
                <p class="prestasi-desc">{{ $item->deskripsi }}</p>
              </div>
              <div class="prestasi-winner">
                <div class="winner-avatar">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;color:#D97706;"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.45 1-1 1H7v3h10v-3h-2c-.55 0-1-.45-1-1v-2.34"/><path d="M18 4H6v7a6 6 0 0 0 12 0V4z"/></svg>
                </div>
                <div class="winner-info">
                  <span class="winner-name">{{ $item->pemenang }}</span>
                  <span class="winner-event">Tahun {{ $item->tahun }}</span>
                </div>
              </div>
            </div>
          </div>
        @empty
          <div style="grid-column: span 3; text-align:center; padding: 60px 0; color:#64748B;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="width:48px;height:48px;color:#D97706;margin-bottom:12px;"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.45 1-1 1H7v3h10v-3h-2c-.55 0-1-.45-1-1v-2.34"/><path d="M18 4H6v7a6 6 0 0 0 12 0V4z"/></svg>
            <div style="font-size:18px;font-weight:800;color:var(--navy);">Belum Ada Data Prestasi</div>
            <div style="font-size:14px;">Data prestasi belum ditambahkan. Silakan tambahkan melalui Panel Admin.</div>
          </div>
        @endforelse

      </div>

    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    <div class="wrap">
      <p>&copy; {{ date('Y') }} KB-PAUD Al-Hidayah Wedelan. Seluruh Hak Cipta Dilindungi.</p>
    </div>
  </footer>

  <script>
    // Header scroll background effect
    window.addEventListener('scroll', function() {
      const header = document.querySelector('header');
      if (window.scrollY > 30) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });

    // Mobile Navigation Drawer Toggle
    function toggleMobileNav() {
      const nav = document.getElementById('mobileNav');
      const backdrop = document.getElementById('navBackdrop');
      const toggle = document.getElementById('menuToggle');
      nav.classList.toggle('active');
      backdrop.classList.toggle('active');
      toggle.classList.toggle('active');
    }

    function closeMobileNav() {
      const nav = document.getElementById('mobileNav');
      const backdrop = document.getElementById('navBackdrop');
      const toggle = document.getElementById('menuToggle');
      nav.classList.remove('active');
      backdrop.classList.remove('active');
      toggle.classList.remove('active');
    }

    // Filter Prestasi Categories
    function filterPrestasi(category, btn) {
      document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const cards = document.querySelectorAll('.prestasi-card');
      cards.forEach(card => {
        if (category === 'all' || card.getAttribute('data-cat') === category) {
          card.style.display = 'flex';
        } else {
          card.style.display = 'none';
        }
      });
    }
  </script>
</body>
</html>
