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
        <a href="{{ route('admin.prestasi.create') }}" class="btn btn-primary btn-sm">+ Tambah Prestasi Baru</a>
    </div>
    <div class="card-body">
        
        <!-- Filter & Search -->
        <form method="GET" action="{{ route('admin.prestasi.index') }}" style="display:flex; gap:10px; margin-bottom:20px; flex-wrap:wrap;">
            <input type="text" name="search" class="form-control" style="max-width:280px;" placeholder="Cari lomba, pemenang, atau peringkat..." value="{{ request('search') }}">
            <select name="kategori" class="form-control" style="max-width:220px;" onchange="this.form.submit()">
                <option value="">-- Semua Kategori --</option>
                <option value="seni" {{ request('kategori') == 'seni' ? 'selected' : '' }}>🎨 Seni &amp; Kreativitas</option>
                <option value="agama" {{ request('kategori') == 'agama' ? 'selected' : '' }}>📖 Tahfidz &amp; Agama</option>
                <option value="olahraga" {{ request('kategori') == 'olahraga' ? 'selected' : '' }}>🏃 Olahraga &amp; Motorik</option>
                <option value="sekolah" {{ request('kategori') == 'sekolah' ? 'selected' : '' }}>🏫 Penghargaan Sekolah</option>
            </select>
            <button type="submit" class="btn btn-secondary btn-sm">Filter</button>
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
                                    <div style="width:50px; height:40px; background:#F1F5F9; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:18px;">🏆</div>
                                @endif
                            </td>
                            <td>
                                <span style="background:#FEF3C7; color:#D97706; font-weight:800; padding:4px 10px; border-radius:12px; font-size:11px; display:inline-block;">
                                    {{ $item->peringkat }}
                                </span>
                                <div style="font-size:12px; color:#64748B; margin-top:2px;">
                                    @if($item->kategori == 'seni') 🎨 Seni &amp; Kreativitas
                                    @elseif($item->kategori == 'agama') 📖 Tahfidz &amp; Agama
                                    @elseif($item->kategori == 'olahraga') 🏃 Olahraga &amp; Motorik
                                    @else 🏫 Penghargaan Sekolah
                                    @endif
                                </div>
                            </td>
                            <td>
                                <strong>{{ $item->judul }}</strong>
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
                                    <a href="{{ route('admin.prestasi.edit', $item->id) }}" class="btn btn-warning btn-sm" style="padding:4px 8px; font-size:12px;" title="Edit">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.prestasi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data prestasi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" style="padding:4px 8px; font-size:12px; background:#EF4444; border-color:#EF4444;" title="Hapus">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center; padding:40px 20px; color:#64748B;">
                                🏆 Belum ada data prestasi. Klik tombol "+ Tambah Prestasi Baru" di atas untuk menambahkan!
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
