{{-- ══ FOOTER PAUD AL-HIDAYAH ══ --}}
<style>
  .main-footer {
    background: linear-gradient(180deg, #0d2610 0%, #061708 100%);
    color: #e2e8f0;
    font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    position: relative;
    overflow: hidden;
    border-top: 4px solid #eab308;
    padding-top: 60px;
    padding-bottom: 30px;
  }
  .main-footer::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0; height: 1px;
    background: linear-gradient(90deg, transparent, rgba(234, 179, 8, 0.4), transparent);
  }
  .footer-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
  }
  .footer-grid {
    display: grid;
    grid-template-columns: 2fr 1.2fr 1.5fr 1.3fr;
    gap: 40px;
    margin-bottom: 50px;
  }
  .footer-brand {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-bottom: 18px;
  }
  .footer-logo {
    width: 48px;
    height: 48px;
    object-fit: contain;
    filter: drop-shadow(0 4px 8px rgba(0,0,0,0.3));
  }
  .footer-brand-title {
    font-family: 'Baloo 2', sans-serif;
    font-size: 20px;
    font-weight: 800;
    color: #ffffff;
    line-height: 1.2;
    letter-spacing: 0.3px;
  }
  .footer-brand-sub {
    font-size: 10px;
    font-weight: 700;
    color: #fbbf24;
    letter-spacing: 1px;
    text-transform: uppercase;
  }
  .footer-desc {
    font-size: 13.5px;
    color: #94a3b8;
    line-height: 1.65;
    margin-bottom: 22px;
  }
  .footer-title {
    font-family: 'Baloo 2', sans-serif;
    font-size: 17px;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 20px;
    position: relative;
    display: inline-block;
  }
  .footer-title::after {
    content: '';
    position: absolute;
    bottom: -6px;
    left: 0;
    width: 32px;
    height: 3px;
    background: #eab308;
    border-radius: 2px;
  }
  .footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  .footer-links li {
    margin-bottom: 12px;
  }
  .footer-links a {
    color: #cbd5e1;
    text-decoration: none;
    font-size: 13.5px;
    font-weight: 500;
    transition: all 0.22s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
  }
  .footer-links a:hover {
    color: #fbbf24;
    transform: translateX(4px);
  }
  .footer-contact-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 16px;
    color: #cbd5e1;
    font-size: 13.5px;
    line-height: 1.5;
  }
  .footer-contact-icon {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    background: rgba(255, 255, 255, 0.07);
    color: #fbbf24;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    margin-top: 2px;
  }
  .footer-sosmed-buttons {
    display: flex;
    flex-direction: column;
    gap: 12px;
  }
  .sosmed-btn {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 11px 18px;
    border-radius: 12px;
    text-decoration: none;
    color: #ffffff;
    font-size: 13.5px;
    font-weight: 700;
    transition: all 0.28s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 14px rgba(0,0,0,0.25);
    border: 1px solid rgba(255,255,255,0.1);
  }
  .sosmed-btn.ig {
    background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
  }
  .sosmed-btn.ig:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 8px 24px rgba(220, 39, 67, 0.45);
    border-color: rgba(255,255,255,0.3);
  }
  .sosmed-btn.tiktok {
    background: #000000;
    border: 1px solid rgba(255, 255, 255, 0.18);
    position: relative;
    overflow: hidden;
  }
  .sosmed-btn.tiktok::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(37, 244, 238, 0.2), rgba(254, 44, 85, 0.2));
    opacity: 0;
    transition: opacity 0.3s ease;
  }
  .sosmed-btn.tiktok:hover::before {
    opacity: 1;
  }
  .sosmed-btn.tiktok:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 8px 24px rgba(37, 244, 238, 0.35);
    border-color: #25f4ee;
  }
  .sosmed-icon {
    width: 22px;
    height: 22px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }
  .sosmed-text {
    display: flex;
    flex-direction: column;
    line-height: 1.2;
  }
  .sosmed-handle {
    font-size: 11px;
    opacity: 0.85;
    font-weight: 500;
  }
  .footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.08);
    padding-top: 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 16px;
    font-size: 13px;
    color: #94a3b8;
  }
  .footer-bottom-links {
    display: flex;
    gap: 20px;
  }
  .footer-bottom-links a {
    color: #94a3b8;
    text-decoration: none;
    transition: color 0.2s;
  }
  .footer-bottom-links a:hover {
    color: #fbbf24;
  }

  @media (max-width: 992px) {
    .footer-grid {
      grid-template-columns: 1fr 1fr;
      gap: 32px;
    }
  }
  @media (max-width: 576px) {
    .footer-grid {
      grid-template-columns: 1fr;
      gap: 28px;
    }
    .footer-bottom {
      flex-direction: column;
      text-align: center;
      justify-content: center;
    }
  }
</style>

<footer class="main-footer">
  <div class="footer-container">
    <div class="footer-grid">
      
      {{-- Col 1: Profil & Brand --}}
      <div>
        <div class="footer-brand">
          <img src="{{ asset('images/logo.png') }}" alt="Logo KB-PAUD Al Hidayah" class="footer-logo">
          <div>
            <div class="footer-brand-title">KB-PAUD AL-HIDAYAH</div>
            <div class="footer-brand-sub">Wedelan • Bangsri • Jepara</div>
          </div>
        </div>
        <p class="footer-desc">
          Lembaga pendidikan anak usia dini terpadu yang berkarakter, kreatif, dan berakhlak mulia. Kami berkomitmen menghadirkan lingkungan belajar yang aman, nyaman, dan ceria bagi tumbuh kembang si kecil.
        </p>
      </div>

      {{-- Col 2: Tautan Cepat --}}
      <div>
        <div class="footer-title">Navigasi Utama</div>
        <ul class="footer-links">
          <li><a href="{{ route('home') }}">Beranda Sekolah</a></li>
          <li><a href="{{ route('home') }}#profil">Profil &amp; Visi Misi</a></li>
          <li><a href="{{ route('home') }}#program">Program Kelas</a></li>
          <li><a href="{{ route('prestasi') }}">Prestasi Siswa</a></li>
          <li><a href="{{ route('galeri.publik') }}">Galeri Kegiatan</a></li>
          <li><a href="{{ route('login') }}">Portal Login Ortu &amp; Guru</a></li>
        </ul>
      </div>

      {{-- Col 3: Alamat & Kontak --}}
      <div>
        <div class="footer-title">Kontak &amp; Alamat</div>
        
        <div class="footer-contact-item">
          <div class="footer-contact-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
          </div>
          <div>
            <strong>Alamat Sekolah:</strong><br>
            {{ $profil->alamat_lengkap ?? 'Desa Wedelan RT 01 / RW 09, Kec. Bangsri, Kab. Jepara, Jawa Tengah 59453' }}
          </div>
        </div>

        <div class="footer-contact-item">
          <div class="footer-contact-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          </div>
          <div>
            <strong>Telepon / WhatsApp:</strong><br>
            {{ $profil->no_telepon ?? '0812-2922-2804' }}
          </div>
        </div>
      </div>

      {{-- Col 4: Sosial Media --}}
      <div>
        <div class="footer-title">Media Sosial</div>
        <p style="font-size:13px;color:#94a3b8;margin-bottom:16px;">
          Ikuti akun resmi kami untuk update kegiatan &amp; dokumentasi keseruan belajar anak:
        </p>

        <div class="footer-sosmed-buttons">
          {{-- Instagram --}}
          <a href="https://www.instagram.com/kb_paudalhidayah?stkn=OXpuYXphNmJ6a3hz" target="_blank" rel="noopener noreferrer" class="sosmed-btn ig" title="Ikuti kami di Instagram">
            <div class="sosmed-icon">
              <svg viewBox="0 0 24 24" fill="currentColor" style="width:20px;height:20px;">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
              </svg>
            </div>
            <div class="sosmed-text">
              <span>Instagram Official</span>
              <span class="sosmed-handle">@kb_paudalhidayah</span>
            </div>
          </a>

          {{-- TikTok --}}
          <a href="https://www.tiktok.com/@kb.al.hidayah49?_r=1&amp;_t=ZS-99bj1TczGTg" target="_blank" rel="noopener noreferrer" class="sosmed-btn tiktok" title="Ikuti kami di TikTok">
            <div class="sosmed-icon">
              <svg viewBox="0 0 24 24" fill="currentColor" style="width:20px;height:20px;">
                <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64c.29 0 .56.04.82.12V9.33a6.33 6.33 0 0 0-1-.08 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34V9.05a8.3 8.3 0 0 0 5.02 1.66V7.27a4.85 4.85 0 0 1-1.06-.58z"/>
              </svg>
            </div>
            <div class="sosmed-text">
              <span>TikTok Official</span>
              <span class="sosmed-handle">@kb.al.hidayah49</span>
            </div>
          </a>
        </div>
      </div>

    </div>

    {{-- Bottom Bar --}}
    <div class="footer-bottom">
      <div>
        &copy; {{ date('Y') }} <strong>KB-PAUD Al-Hidayah Wedelan</strong>. Hak Cipta Dilindungi.
      </div>
      <div class="footer-bottom-links">
        <a href="{{ route('home') }}">Beranda</a>
        <a href="{{ route('prestasi') }}">Prestasi</a>
        <a href="{{ route('galeri.publik') }}">Galeri</a>
        <a href="{{ route('login') }}">Login Portal</a>
      </div>
    </div>
  </div>
</footer>
