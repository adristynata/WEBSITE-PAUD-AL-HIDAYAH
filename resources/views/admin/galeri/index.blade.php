@extends('layouts.dashboard')
@section('title', 'Kelola Galeri Kegiatan — Admin')
@section('page-title', 'Kelola Galeri Kegiatan')

@section('sidebar-menu')
    @include('admin.partials.sidebar-menu')
@endsection

@section('content')
<div class="card">
    <div class="card-header" style="display:flex; justify-content:space-between; align-items:center;">
        <span>🖼️ Daftar Dokumentasi Galeri</span>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary btn-sm">+ Unggah Foto</a>
    </div>
    <div class="card-body">
        @if(count($photos) > 0)
            <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(240px, 1fr)); gap:20px;">
                @foreach($photos as $p)
                    <div style="background:#fff; border:1px solid var(--border); border-radius:16px; overflow:hidden; box-shadow:0 4px 10px rgba(0,0,0,0.02); display:flex; flex-direction:column; justify-content:space-between;">
                        <div>
                            <img src="{{ asset($p->foto) }}" alt="{{ $p->judul }}" style="width:100%; height:160px; object-fit:cover; display:block;">
                            <div style="padding:16px;">
                                <strong style="color:var(--secondary); font-size:0.95rem; display:block; margin-bottom:6px;">{{ $p->judul }}</strong>
                                <p style="color:var(--muted); font-size:0.8rem; line-height:1.4; margin:0;">
                                    {{ $p->deskripsi ?? 'Tidak ada deskripsi.' }}
                                </p>
                            </div>
                        </div>
                        <div style="padding:12px 16px; border-top:1px solid var(--border); background:#FCFDFD; display:flex; justify-content:space-between; align-items:center;">
                            <small style="color:#94A3B8; font-size:0.75rem;">📅 {{ $p->created_at->format('d M Y') }}</small>
                            <form method="POST" action="{{ route('admin.galeri.destroy', $p->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto kegiatan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="padding:4px 10px; font-size:0.75rem; background:#EF4444; border-color:#EF4444;">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $photos->links() }}
        @else
            <div style="padding:60px 20px; text-align:center; color:var(--muted);">
                📸 Belum ada foto kegiatan di galeri. Klik tombol di atas untuk mengunggah foto pertamamu!
            </div>
        @endif
    </div>
</div>
@endsection
