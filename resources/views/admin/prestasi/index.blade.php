@extends('layouts.dashboard')
@section('title', 'Kelola Data Prestasi — Admin')
@section('page-title', 'Kelola Data Prestasi')

@section('sidebar-menu')
    @include('admin.partials.sidebar-menu')
@endsection

@section('content')
<div class="card">
    <div class="card-header" style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px;">
        <div style="display:flex;align-items:center;gap:8px">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:20px;height:20px;color:#F59E0B"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.45 1-1 1H7v3h10v-3h-2c-.55 0-1-.45-1-1v-2.34"/><path d="M18 4H6v7a6 6 0 0 0 12 0V4z"/></svg>
            <span style="font-weight:700;font-size:1.05rem;">Daftar Prestasi &amp; Kejuaraan Lomba</span>
        </div>
        <a href="{{ route('admin.prestasi.create') }}" class="btn btn-primary btn-sm" style="display:inline-flex; align-items:center; gap:6px; font-weight:700; padding:8px 16px;">
            <svg viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="3" style="width:15px;height:15px;color:#FFFFFF;flex-shrink:0;"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            <span>Tambah Prestasi Baru</span>
        </a>
    </div>
    <div class="card-body">
        
        <!-- Filter & Search -->
        <form method="GET" action="{{ route('admin.prestasi.index') }}" style="display:flex; gap:10px; margin-bottom:20px; flex-wrap:wrap;">
            <input type="text" name="search" class="form-control" style="max-width:280px;" placeholder="Cari lomba, pemenang, atau peringkat..." value="{{ request('search') }}">
            <select name="kategori" class="form-control" style="max-width:220px;" onchange="this.form.submit()">
                <option value="">-- Semua Kategori --</option>
                <option value="seni" {{ request('kategori') == 'seni' ? 'selected' : '' }}>Seni &amp; Kreativitas</option>
                <option value="agama" {{ request('kategori') == 'agama' ? 'selected' : '' }}>Tahfidz &amp; Agama</option>
                <option value="olahraga" {{ request('kategori') == 'olahraga' ? 'selected' : '' }}>Olahraga &amp; Motorik</option>
                <option value="sekolah" {{ request('kategori') == 'sekolah' ? 'selected' : '' }}>Penghargaan Sekolah</option>
            </select>
            <button type="submit" class="btn btn-secondary btn-sm" style="display:inline-flex;align-items:center;gap:4px;font-weight:600;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <span>Filter</span>
            </button>
            @if(request('search') || request('kategori'))
                <a href="{{ route('admin.prestasi.index') }}" class="btn btn-outline-secondary btn-sm">Reset</a>
            @endif
        </form>

        <div class="table-responsive">
            <table class="table" style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr>
                        <th style="width:70px;">Foto</th>
                        <th>Peringkat &amp; Kategori</th>
                        <th>Judul Lomba / Kejuaraan</th>
                        <th>Pemenang</th>
                        <th style="width:80px;">Tahun</th>
                        <th style="width:110px; text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($prestasis as $item)
                        <tr>
                            <td>
                                @if($item->foto)
                                    <img src="{{ asset($item->foto) }}" alt="Foto" style="width:50px; height:40px; object-fit:cover; border-radius:8px;">
                                @else
                                    <div style="width:50px; height:40px; background:#FEF3C7; border-radius:8px; display:flex; align-items:center; justify-content:center; color:#D97706;">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:20px;height:20px;"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.45 1-1 1H7v3h10v-3h-2c-.55 0-1-.45-1-1v-2.34"/><path d="M18 4H6v7a6 6 0 0 0 12 0V4z"/></svg>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <span style="background:#FEF3C7; color:#D97706; font-weight:800; padding:4px 10px; border-radius:12px; font-size:11px; display:inline-block;">
                                    {{ $item->peringkat }}
                                </span>
                                <div style="font-size:12px; color:#475569; margin-top:4px; display:inline-flex; align-items:center; gap:5px; font-weight:600;">
                                    @if($item->kategori == 'seni')
                                        <svg viewBox="0 0 24 24" fill="none" stroke="#8B5CF6" stroke-width="2" style="width:14px;height:14px;color:#8B5CF6;"><circle cx="12" cy="12" r="10"/><path d="M12 2a10 10 0 0 0 0 20c1.5 0 2.5-1 2.5-2.5 0-.7-.3-1.3-.7-1.7-.4-.4-.7-1-.7-1.8 0-1.4 1.1-2.5 2.5-2.5H18a4 4 0 0 0 4-4c0-4.4-4.5-8-10-8z"/></svg>
                                        <span>Seni &amp; Kreativitas</span>
                                    @elseif($item->kategori == 'agama')
                                        <svg viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2" style="width:14px;height:14px;color:#10B981;"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20M4 19.5A2.5 2.5 0 0 0 6.5 22H20M4 19.5V3A2.5 2.5 0 0 1 6.5 .5H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5z"/></svg>
                                        <span>Tahfidz &amp; Agama</span>
                                    @elseif($item->kategori == 'olahraga')
                                        <svg viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" style="width:14px;height:14px;color:#3B82F6;"><circle cx="12" cy="5" r="3"/><path d="M12 8v8M8 12l4-2 4 2M9 20l3-4 3 4"/></svg>
                                        <span>Olahraga &amp; Motorik</span>
                                    @else
                                        <svg viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2" style="width:14px;height:14px;color:#F59E0B;"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                                        <span>Penghargaan Sekolah</span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <strong style="color:#1E293B;">{{ $item->judul }}</strong>
                                <div style="font-size:12px; color:#64748B;">{{ Str::limit($item->deskripsi, 60) }}</div>
                            </td>
                            <td>
                                <span style="font-weight:700; color:var(--primary);">{{ $item->pemenang }}</span>
                            </td>
                            <td>
                                <span style="background:#E2E8F0; color:#334155; font-size:12px; font-weight:700; padding:3px 8px; border-radius:10px;">{{ $item->tahun }}</span>
                            </td>
                            <td style="text-align:center;">
                                <div style="display:flex; justify-content:center; gap:6px;">
                                    <a href="{{ route('admin.prestasi.edit', $item->id) }}" class="btn btn-warning btn-sm" style="padding:6px 10px; font-size:12px; background:#4F46E5; border-color:#4F46E5; color:#FFFFFF; border-radius:8px; display:inline-flex; align-items:center; justify-content:center;" title="Edit">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2.5" style="width:14px;height:14px;color:#FFFFFF;flex-shrink:0;"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.prestasi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data prestasi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" style="padding:6px 10px; font-size:12px; background:#EF4444; border-color:#EF4444; color:#FFFFFF; border-radius:8px; display:inline-flex; align-items:center; justify-content:center;" title="Hapus">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2.5" style="width:14px;height:14px;color:#FFFFFF;flex-shrink:0;"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center; padding:40px 20px; color:#64748B;">
                                <div style="display:flex; align-items:center; justify-content:center; gap:8px;">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;color:#D97706;"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.45 1-1 1H7v3h10v-3h-2c-.55 0-1-.45-1-1v-2.34"/><path d="M18 4H6v7a6 6 0 0 0 12 0V4z"/></svg>
                                    <span>Belum ada data prestasi. Klik tombol "Tambah Prestasi Baru" di atas untuk menambahkan!</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top:20px;">
            {{ $prestasis->links() }}
        </div>
    </div>
</div>
@endsection
