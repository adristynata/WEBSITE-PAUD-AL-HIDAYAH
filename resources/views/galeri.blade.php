<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galeri Kegiatan - KB-PAUD Al-Hidayah Wedelan</title>
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
    .menu-toggle.active span:nth-child(1) {
      transform: translateY(7.5px) rotate(45deg);
    }
    .menu-toggle.active span:nth-child(2) {
      opacity: 0;
    }
    .menu-toggle.active span:nth-child(3) {
      transform: translateY(-7.5px) rotate(-45deg);
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
        background: rgba(15, 23, 42, 0.65);
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
      nav#mobileNav {
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
      nav#mobileNav.active {
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
      .header-actions .btn-masuk {
        padding: 8px 18px;
        font-size: 13px;
      }
    }

    @media (max-width: 576px) {
      .logo img { height: 32px !important; }
      .logo-text .brand { font-size: 15px; }
      .logo-text .sub { display: none; }
      header { padding: 10px 0; }
    }

    /* ── HERO GALERI ── */
    .hero-galeri {
      margin-top: 72px;
      background: linear-gradient(135deg, #0284C7 0%, #0D9488 40%, #059669 100%);
      color: #FFFFFF;
      padding: 70px 0 90px;
      position: relative;
      overflow: hidden;
      text-align: center;
    }
    .hero-galeri-bg {
      position: absolute;
      inset: 0;
      background: radial-gradient(circle at 15% 20%, rgba(251, 191, 36, 0.25) 0%, transparent 45%),
                  radial-gradient(circle at 85% 75%, rgba(244, 114, 182, 0.25) 0%, transparent 45%),
                  radial-gradient(circle at 50% 50%, rgba(52, 211, 153, 0.15) 0%, transparent 60%);
      pointer-events: none;
    }
    .badge-hero-galeri {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: linear-gradient(135deg, rgba(245, 158, 11, 0.3), rgba(217, 119, 6, 0.4));
      border: 1.5px solid rgba(251, 191, 36, 0.6);
      color: #FEF08A;
      font-weight: 800;
      font-size: 12px;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      padding: 6px 18px;
      border-radius: 20px;
      margin-bottom: 16px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    .hero-galeri h1 {
      font-family: 'Baloo 2', sans-serif;
      font-size: 42px;
      font-weight: 900;
      line-height: 1.2;
      margin-bottom: 12px;
      color: #FFFFFF;
      text-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }
    .hero-galeri p {
      font-size: 16px;
      color: #E2E8F0;
      max-width: 680px;
      margin: 0 auto;
    }

    /* ── GALERI MAIN SECTION ── */
    .galeri-section {
      padding: 60px 0 90px;
      background: linear-gradient(180deg, #F0FDF4 0%, #FEFCE8 40%, #F0F9FF 70%, #F8FAFC 100%);
    }

    /* FILTER TABS GALERI */
    .btn-gtab {
      padding: 10px 24px;
      border-radius: 25px;
      font-weight: 800;
      font-size: 13.5px;
      cursor: pointer;
      transition: all 0.25s ease;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      box-shadow: 0 3px 10px rgba(0,0,0,0.04);
    }
    .btn-gtab.btn-gall {
      background: #F0FDF4;
      border: 1.5px solid #A7F3D0;
      color: #047857;
    }
    .btn-gtab.btn-gall:hover, .btn-gtab.btn-gall.active {
      background: linear-gradient(135deg, #10B981, #059669);
      color: #FFFFFF;
      border-color: transparent;
      box-shadow: 0 6px 18px rgba(16, 185, 129, 0.35);
    }
    .btn-gtab.btn-gfoto {
      background: #FEF3C7;
      border: 1.5px solid #FDE68A;
      color: #B45309;
    }
    .btn-gtab.btn-gfoto:hover, .btn-gtab.btn-gfoto.active {
      background: linear-gradient(135deg, #F59E0B, #D97706);
      color: #FFFFFF;
      border-color: transparent;
      box-shadow: 0 6px 18px rgba(245, 158, 11, 0.35);
    }
    .btn-gtab.btn-gvideo {
      background: #FEF2F2;
      border: 1.5px solid #FECACA;
      color: #991B1B;
    }
    .btn-gtab.btn-gvideo:hover, .btn-gtab.btn-gvideo.active {
      background: linear-gradient(135deg, #EF4444, #DC2626);
      color: #FFFFFF;
      border-color: transparent;
      box-shadow: 0 6px 18px rgba(239, 68, 68, 0.35);
    }

    .galeri-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 28px;
      margin-bottom: 48px;
    }
    .galeri-card {
      background: #FFFFFF;
      border-radius: 22px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0,0,0,0.04);
      border: 1px solid #E2E8F0;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
      cursor: pointer;
      display: flex;
      flex-direction: column;
    }
    .galeri-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 20px 40px rgba(20, 56, 24, 0.12);
    }
    .galeri-img-wrapper {
      width: 100%;
      height: 230px;
      position: relative;
      overflow: hidden;
      background: #E2E8F0;
    }
    .galeri-img-wrapper img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.4s ease;
    }
    .galeri-card:hover .galeri-img-wrapper img {
      transform: scale(1.08);
    }
    .galeri-date-badge {
      position: absolute;
      top: 14px;
      left: 14px;
      background: rgba(20, 56, 24, 0.85);
      color: #FFFFFF;
      font-size: 11px;
      font-weight: 800;
      padding: 5px 12px;
      border-radius: 14px;
      backdrop-filter: blur(4px);
    }
    .galeri-zoom-icon {
      position: absolute;
      inset: 0;
      background: rgba(20, 56, 24, 0.4);
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: opacity 0.3s ease;
      color: #FFFFFF;
    }
    .galeri-card:hover .galeri-zoom-icon {
      opacity: 1;
    }
    .galeri-info {
      padding: 20px;
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .galeri-title {
      font-family: 'Baloo 2', sans-serif;
      font-size: 19px;
      font-weight: 800;
      color: #143818;
      line-height: 1.3;
      margin-bottom: 6px;
    }
    .galeri-desc {
      font-size: 13px;
      color: #64748B;
      line-height: 1.55;
    }

    /* PAGINATION STYLING */
    .pagination-wrapper {
      display: flex;
      justify-content: center;
      margin-top: 36px;
    }

    /* ── LIGHTBOX MODAL FULLSCREEN ── */
    .modal-overlay {
      position: fixed;
      inset: 0;
      background: rgba(15, 23, 42, 0.9);
      backdrop-filter: blur(10px);
      z-index: 2000;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 24px;
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
    }
    .modal-overlay.active {
      opacity: 1;
      visibility: visible;
    }
    .modal-content-box {
      background: #FFFFFF;
      border-radius: 24px;
      max-width: 800px;
      width: 100%;
      overflow: hidden;
      box-shadow: 0 25px 50px rgba(0,0,0,0.3);
      position: relative;
      transform: scale(0.9);
      transition: transform 0.3s ease;
    }
    .modal-overlay.active .modal-content-box {
      transform: scale(1);
    }
    .modal-close-btn {
      position: absolute;
      top: 16px;
      right: 16px;
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: rgba(0, 0, 0, 0.5);
      color: #FFF;
      border: none;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      z-index: 10;
      transition: background 0.2s ease;
    }
    .modal-close-btn:hover { background: rgba(0,0,0,0.8); }
    .modal-img-container {
      width: 100%;
      max-height: 420px;
      overflow: hidden;
      background: #0F172A;
    }
    .modal-img-container img {
      width: 100%;
      height: 100%;
      max-height: 420px;
      object-fit: contain;
      display: block;
    }
    .modal-body-text {
      padding: 24px 28px;
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
      .galeri-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 576px) {
      .galeri-grid { grid-template-columns: 1fr; }
      .hero-galeri h1 { font-size: 30px; }
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
              <span>Program Unggulan</span>
            </div>
            <span class="nav-item-arrow">›</span>
          </a>

          <a href="{{ route('prestasi') }}" class="nav-link-item">
            <div class="nav-item-left">
              <div class="nav-item-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.45 1-1 1H7v3h10v-3h-2c-.55 0-1-.45-1-1v-2.34"/><path d="M18 4H6v7a6 6 0 0 0 12 0V4z"/></svg>
              </div>
              <span>Prestasi</span>
            </div>
            <span class="nav-item-arrow">›</span>
          </a>

          <a href="{{ route('galeri.publik') }}" class="nav-link-item {{ request()->routeIs('galeri.publik') ? 'active' : '' }}">
            <div class="nav-item-left">
              <div class="nav-item-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
              </div>
              <span>Kegiatan</span>
            </div>
            <span class="nav-item-arrow">›</span>
          </a>

          <a href="{{ route('home') }}#kontak" class="nav-link-item">
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

  <!-- HERO GALERI -->
  <section class="hero-galeri">
    <div class="hero-galeri-bg"></div>
    <div class="wrap">
      <div class="badge-hero-galeri" style="display:inline-flex;align-items:center;gap:6px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:15px;height:15px;color:#FEE2E2;"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
        <span>DOKUMENTASI KEGIATAN SEKOLAH</span>
      </div>
      <h1>Galeri Momen Ceria KB-PAUD Al-Hidayah</h1>
      <p>Kumpulan foto dokumentasi aktivitas belajar, bermain, outbond, cooking class, pentas seni, dan hari apresiasi siswa-siswi PAUD Al-Hidayah.</p>
    </div>
  </section>

  <!-- GALERI MAIN SECTION -->
  <section class="galeri-section">
    <div class="wrap">

      <!-- FILTER TABS -->
      <div style="display:flex; justify-content:center; gap:12px; margin-bottom:36px; flex-wrap:wrap;">
        <button type="button" class="btn-gtab btn-gall active" onclick="filterGaleri('all', this)">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
          <span>Semua Media</span>
        </button>
        <button type="button" class="btn-gtab btn-gfoto" onclick="filterGaleri('foto', this)">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
          <span>Foto Kegiatan</span>
        </button>
        <button type="button" class="btn-gtab btn-gvideo" onclick="filterGaleri('video', this)">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
          <span>Video Dokumentasi</span>
        </button>
      </div>

      <!-- GRID GALERI FOTO & VIDEO -->
      <div class="galeri-grid" id="galeriGrid">
        @forelse($galeris as $g)
          @php
            $isVideo = ($g->kategori === 'video');
            $mediaType = $isVideo ? ($g->video_url ? 'video_url' : 'video_file') : 'foto';
            $mediaUrl = $isVideo ? ($g->embed_url) : asset($g->foto);
          @endphp
          <div class="galeri-card galeri-item-card" data-kat="{{ $g->kategori }}" onclick="openModalMedia('{{ $mediaType }}', '{{ $mediaUrl }}', '{{ $g->thumbnail_url }}', '{{ addslashes($g->judul) }}', '{{ addslashes($g->deskripsi ?? 'Dokumentasi kegiatan siswa PAUD Al-Hidayah.') }}', '{{ $g->created_at->format('d M Y') }}')">
            <div class="galeri-img-wrapper">
              <span class="galeri-date-badge" style="display:inline-flex;align-items:center;gap:4px;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:12px;height:12px;color:#FFF;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                <span>{{ $g->created_at->format('d M Y') }}</span>
              </span>
              
              <img src="{{ $g->thumbnail_url }}" alt="{{ $g->judul }}" onerror="this.src='{{ asset('images/gedung-sekolah.jpg') }}'">
              
              @if($isVideo)
                <div style="position:absolute; top:14px; right:14px; background:#EF4444; color:#FFF; font-size:10px; font-weight:800; padding:4px 10px; border-radius:12px; letter-spacing:0.05em; display:inline-flex; align-items:center; gap:4px; box-shadow:0 4px 10px rgba(0,0,0,0.3);">
                  <svg viewBox="0 0 24 24" fill="currentColor" style="width:10px;height:10px;"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                  <span>VIDEO</span>
                </div>
                <div class="galeri-zoom-icon" style="opacity:0.95; background:rgba(0,0,0,0.35);">
                  <div style="width:52px; height:52px; border-radius:50%; background:rgba(239,68,68,0.95); display:flex; align-items:center; justify-content:center; color:#FFF; box-shadow:0 6px 20px rgba(239,68,68,0.5); transition:transform 0.3s ease;" class="play-btn-circle">
                    <svg viewBox="0 0 24 24" fill="currentColor" style="width:24px;height:24px;margin-left:3px;"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                  </div>
                </div>
              @else
                <div class="galeri-zoom-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:28px;height:28px;"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
                </div>
              @endif
            </div>
            <div class="galeri-info">
              <h3 class="galeri-title">{{ $g->judul }}</h3>
              <p class="galeri-desc">{{ Str::limit($g->deskripsi, 80) ?: 'Dokumentasi momen kegiatan siswa.' }}</p>
            </div>
          </div>
        @empty
          <div style="grid-column: span 3; text-align:center; padding: 60px 0; color:#64748B;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="width:48px;height:48px;color:#143818;margin-bottom:12px;"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
            <div style="font-size:18px;font-weight:800;color:var(--navy);">Belum Ada Galeri</div>
            <div style="font-size:14px;">Foto dan video dokumentasi kegiatan belum diunggah.</div>
          </div>
        @endforelse
      </div>

      <!-- PAGINATION BUTTONS -->
      <div class="pagination-wrapper">
        {{ $galeris->links() }}
      </div>

    </div>
  </section>

  <!-- LIGHTBOX MODAL FULLSCREEN -->
  <div class="modal-overlay" id="galleryModal" onclick="closeModal()">
    <div class="modal-content-box" onclick="event.stopPropagation()">
      <button class="modal-close-btn" onclick="closeModal()" aria-label="Tutup">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="width:20px;height:20px;"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
      <div class="modal-img-container" id="modalMediaContainer" style="background:#0F172A; min-height:280px; display:flex; align-items:center; justify-content:center;">
        <!-- Dynamic Photo or Video Player injected via JS -->
      </div>
      <div class="modal-body-text">
        <div id="modalDate" style="font-size:12px;font-weight:800;color:var(--green-dark);margin-bottom:4px;"></div>
        <h3 id="modalTitle" style="font-family:'Baloo 2',sans-serif;font-size:22px;font-weight:800;color:var(--navy);margin-bottom:8px;"></h3>
        <p id="modalDesc" style="font-size:14px;color:#475569;line-height:1.6;"></p>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  @include('partials.footer')

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
    const menuToggle = document.getElementById('menuToggle');
    const navMenu = document.getElementById('mobileNav') || document.querySelector('nav');
    const navBackdrop = document.getElementById('navBackdrop');

    function toggleMobileNav() {
      if (navMenu && navMenu.classList.contains('active')) {
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

    // Filter Tab Function
    function filterGaleri(kat, btn) {
      document.querySelectorAll('.btn-gtab').forEach(b => {
        b.style.background = '#fff';
        b.style.color = '#475569';
        b.style.borderColor = '#CBD5E1';
      });
      btn.style.background = '#143818';
      btn.style.color = '#fff';
      btn.style.borderColor = '#143818';

      const items = document.querySelectorAll('.galeri-item-card');
      items.forEach(item => {
        if (kat === 'all' || item.dataset.kat === kat) {
          item.style.display = 'flex';
        } else {
          item.style.display = 'none';
        }
      });
    }

    // Lightbox Modal for Photo & Video
    function openModalMedia(type, mediaUrl, thumbUrl, title, desc, date) {
      const container = document.getElementById('modalMediaContainer');
      document.getElementById('modalTitle').innerText = title;
      document.getElementById('modalDesc').innerText = desc;
      document.getElementById('modalDate').innerText = date;

      if (type === 'video_url') {
        container.innerHTML = `<iframe src="${mediaUrl}" style="width:100%; height:450px; border:none;" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
      } else if (type === 'video_file') {
        container.innerHTML = `<video controls autoplay style="width:100%; max-height:450px; background:#000;"><source src="${mediaUrl}" type="video/mp4">Browser Anda tidak mendukung pemutar video.</video>`;
      } else {
        container.innerHTML = `<img src="${mediaUrl}" alt="${title}" style="width:100%; height:100%; max-height:450px; object-fit:contain; display:block;">`;
      }

      document.getElementById('galleryModal').classList.add('active');
    }

    function closeModal() {
      document.getElementById('galleryModal').classList.remove('active');
      document.getElementById('modalMediaContainer').innerHTML = '';
    }
  </script>
</body>
</html>
