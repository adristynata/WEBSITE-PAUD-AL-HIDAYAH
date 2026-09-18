{{-- ══ FOOTER PAUD AL-HIDAYAH ══ --}}
<style>
  .main-footer {
    background: linear-gradient(180deg, #0d2610 0%, #061708 100%);
    color: #e2e8f0;
    font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    position: relative;
    overflow: hidden;
    border-top: 3px solid #eab308;
    padding-top: 32px;
    padding-bottom: 20px;
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
    grid-template-columns: 1.8fr 1.5fr 1.2fr 1.6fr;
    gap: 28px;
    margin-bottom: 24px;
    align-items: start;
  }
  .footer-brand {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 12px;
  }
  .footer-logo {
    width: 42px;
    height: 42px;
    object-fit: contain;
    filter: drop-shadow(0 3px 6px rgba(0,0,0,0.3));
  }
  .footer-brand-title {
    font-family: 'Baloo 2', sans-serif;
    font-size: 18px;
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
    font-size: 12.5px;
    color: #94a3b8;
    line-height: 1.55;
    margin: 0;
  }
  .footer-title {
    font-family: 'Baloo 2', sans-serif;
    font-size: 15.5px;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 14px;
    position: relative;
    display: inline-block;
  }
  .footer-title::after {
    content: '';
    position: absolute;
    bottom: -4px;
    left: 0;
    width: 28px;
    height: 2.5px;
    background: #eab308;
    border-radius: 2px;
  }
  .footer-contact-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-bottom: 10px;
    color: #cbd5e1;
    font-size: 12.5px;
    line-height: 1.45;
  }
  .footer-contact-icon {
    width: 28px;
    height: 28px;
    border-radius: 6px;
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
    gap: 8px;
  }
  .sosmed-btn {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 14px;
    border-radius: 10px;
    text-decoration: none;
    color: #ffffff;
    font-size: 12px;
    font-weight: 700;
    transition: all 0.28s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 3px 10px rgba(0,0,0,0.2);
    border: 1px solid rgba(255,255,255,0.1);
  }
  .sosmed-btn.ig {
    background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
  }
  .sosmed-btn.ig:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(220, 39, 67, 0.4);
  }
  .sosmed-btn.tiktok {
    background: #000000;
    border: 1px solid rgba(255, 255, 255, 0.18);
    position: relative;
    overflow: hidden;
  }
  .sosmed-btn.tiktok:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(37, 244, 238, 0.3);
  }
  .sosmed-icon {
    width: 18px;
    height: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }
  .sosmed-text {
    display: flex;
    flex-direction: column;
    line-height: 1.15;
  }
  .sosmed-handle {
    font-size: 10px;
    opacity: 0.85;
    font-weight: 500;
  }
  .footer-map-container {
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid rgba(255,255,255,0.15);
    height: 130px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.25);
    background: #061708;
  }
  .footer-map-container iframe {
    width: 100% !important;
    height: 130px !important;
    border: 0 !important;
  }
  .footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.08);
    padding-top: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    font-size: 12px;
    color: #94a3b8;
  }

  @media (max-width: 992px) {
    .footer-grid {
      grid-template-columns: 1fr 1fr;
      gap: 24px;
    }
  }
  @media (max-width: 576px) {
    .footer-grid {
      grid-template-columns: 1fr;
      gap: 20px;
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
          Lembaga pendidikan anak usia dini terpadu yang berkarakter, kreatif, dan berakhlak mulia. Menghadirkan lingkungan belajar yang aman &amp; ceria bagi si kecil.
        </p>
      </div>

      {{-- Col 2: Alamat & Kontak --}}
      <div>
        <div class="footer-title">Kontak &amp; Alamat</div>
        
        <div class="footer-contact-item">
          <div class="footer-contact-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
          </div>
          <div>
            <strong>Alamat Sekolah:</strong><br>
            {{ $profil->alamat_lengkap ?? 'Desa Wedelan RT 01 / RW 09, Kec. Bangsri, Kab. Jepara, Jawa Tengah 59453' }}
          </div>
        </div>

        <div class="footer-contact-item">
          <div class="footer-contact-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          </div>
          <div>
            <strong>Telepon / WhatsApp:</strong><br>
            {{ $profil->no_telepon ?? '0812-2922-2804' }}
          </div>
        </div>
      </div>

      {{-- Col 3: Media Sosial --}}
      <div>
        <div class="footer-title">Media Sosial</div>
        <div class="footer-sosmed-buttons">
          {{-- Instagram --}}
          <a href="https://www.instagram.com/kb_paudalhidayah?stkn=OXpuYXphNmJ6a3hz" target="_blank" rel="noopener noreferrer" class="sosmed-btn ig" title="Ikuti kami di Instagram">
            <div class="sosmed-icon">
              <svg viewBox="0 0 24 24" fill="currentColor" style="width:18px;height:18px;">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
              </svg>
            </div>
            <div class="sosmed-text">
              <span>Instagram</span>
              <span class="sosmed-handle">@kb_paudalhidayah</span>
            </div>
          </a>

          {{-- TikTok --}}
          <a href="https://www.tiktok.com/@kb.al.hidayah49?_r=1&amp;_t=ZS-99bj1TczGTg" target="_blank" rel="noopener noreferrer" class="sosmed-btn tiktok" title="Ikuti kami di TikTok">
            <div class="sosmed-icon">
              <svg viewBox="0 0 24 24" fill="currentColor" style="width:18px;height:18px;">
                <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64c.29 0 .56.04.82.12V9.33a6.33 6.33 0 0 0-1-.08 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34V9.05a8.3 8.3 0 0 0 5.02 1.66V7.27a4.85 4.85 0 0 1-1.06-.58z"/>
              </svg>
            </div>
            <div class="sosmed-text">
              <span>TikTok</span>
              <span class="sosmed-handle">@kb.al.hidayah49</span>
            </div>
          </a>
        </div>
      </div>

      {{-- Col 4: Peta Lokasi Sekolah --}}
      <div>
        <div class="footer-title">Lokasi Peta</div>
        <div class="footer-map-container">
          @if(!empty($profil->maps_embed) && str_contains($profil->maps_embed, 'src='))
            {!! preg_replace('/height="[^"]*"/', 'height="130"', $profil->maps_embed) !!}
          @elseif(!empty($profil->maps_embed))
            <iframe src="{{ $profil->maps_embed }}" width="100%" height="130" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          @else
            <iframe src="https://maps.google.com/maps?q=-6.5163,110.7823+(KB-PAUD+Al-Hidayah+Wedelan)&t=&z=17&ie=UTF8&iwloc=&output=embed" width="100%" height="130" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          @endif
        </div>
      </div>

    </div>

    {{-- Bottom Bar --}}
    <div class="footer-bottom" style="justify-content: center; text-align: center;">
      <div>
        &copy; {{ date('Y') }} <strong>KB-PAUD Al-Hidayah Wedelan</strong>. Hak Cipta Dilindungi.
      </div>
    </div>
  </div>
</footer>
