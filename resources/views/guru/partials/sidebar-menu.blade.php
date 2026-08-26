{{-- ══ Guru Sidebar Menu — menggunakan inline SVG ══ --}}
<div class="nav-section">Menu Utama</div>
<a href="{{ route('guru.dashboard') }}" class="nav-link {{ request()->routeIs('guru.dashboard') ? 'active' : '' }}">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
    <span>Dashboard</span>
</a>
<a href="{{ route('guru.catatan.index') }}" class="nav-link {{ request()->routeIs('guru.catatan.*') ? 'active' : '' }}">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>
    <span>Input Catatan</span>
</a>
<div class="nav-section" style="margin-top:8px">Pengaturan</div>
<a href="{{ route('guru.profil.edit') }}" class="nav-link {{ request()->routeIs('guru.profil.*') ? 'active' : '' }}">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
    <span>Profil & TTD Saya</span>
</a>
