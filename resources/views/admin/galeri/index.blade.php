@extends('layouts.dashboard')
@section('title', 'Kelola Galeri Kegiatan — Admin')
@section('page-title', 'Kelola Galeri Kegiatan')

@section('sidebar-menu')
    @include('admin.partials.sidebar-menu')
@endsection

@section('content')
<div class="card">
    <div class="card-header" style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px;">
        <span style="display:inline-flex;align-items:center;gap:6px;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
            <span>Daftar Dokumentasi Galeri Foto &amp; Video</span>
        </span>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary btn-sm" style="display:inline-flex;align-items:center;gap:6px;font-weight:700;">
            <svg viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="3" style="width:14px;height:14px;color:#FFFFFF;flex-shrink:0;"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            <span>Tambah Foto / Video</span>
        </a>
    </div>
    <div class="card-body">
        @if(count($photos) > 0)
            <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(240px, 1fr)); gap:20px;">
                @foreach($photos as $p)
                    <div style="background:#fff; border:1px solid var(--border); border-radius:16px; overflow:hidden; box-shadow:0 4px 10px rgba(0,0,0,0.02); display:flex; flex-direction:column; justify-content:space-between;">
                        <div>
                            <div style="position:relative; width:100%; height:160px; overflow:hidden; background:#0F172A;">
                                <img src="{{ $p->thumbnail_url }}" alt="{{ $p->judul }}" style="width:100%; height:100%; object-fit:cover; display:block;">
                                
                                <!-- BADGE TIPE MEDIA -->
                                @if($p->kategori === 'video')
                                    <span style="position:absolute; top:10px; left:10px; background:#EF4444; color:#FFFFFF; font-size:10px; font-weight:800; padding:4px 8px; border-radius:10px; display:inline-flex; align-items:center; gap:4px; box-shadow:0 2px 6px rgba(0,0,0,0.2);">
                                        <svg viewBox="0 0 24 24" fill="currentColor" style="width:10px;height:10px;"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                                        <span>VIDEO</span>
                                    </span>
                                    <div style="position:absolute; inset:0; background:rgba(0,0,0,0.3); display:flex; align-items:center; justify-content:center;">
                                        <div style="width:40px; height:40px; border-radius:50%; background:rgba(239,68,68,0.9); display:flex; align-items:center; justify-content:center; color:#FFF; box-shadow:0 4px 12px rgba(0,0,0,0.3);">
                                            <svg viewBox="0 0 24 24" fill="currentColor" style="width:18px;height:18px;margin-left:2px;"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                                        </div>
                                    </div>
                                @else
                                    <span style="position:absolute; top:10px; left:10px; background:#10B981; color:#FFFFFF; font-size:10px; font-weight:800; padding:4px 8px; border-radius:10px; display:inline-flex; align-items:center; gap:4px; box-shadow:0 2px 6px rgba(0,0,0,0.2);">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="width:10px;height:10px;"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                                        <span>FOTO</span>
                                    </span>
                                @endif
                            </div>

                            <div style="padding:16px;">
                                <strong style="color:var(--secondary); font-size:0.95rem; display:block; margin-bottom:6px;">{{ $p->judul }}</strong>
                                <p style="color:var(--muted); font-size:0.8rem; line-height:1.4; margin:0;">
                                    {{ Str::limit($p->deskripsi, 80) ?: 'Tidak ada deskripsi.' }}
                                </p>
                            </div>
                        </div>

                        <div style="padding:12px 16px; border-top:1px solid var(--border); background:#FCFDFD; display:flex; justify-content:space-between; align-items:center;">
                            <small style="color:#64748B; font-size:0.78rem; display:inline-flex; align-items:center; gap:5px; font-weight:600;">
                                <svg viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" style="width:14px;height:14px;color:#3B82F6;flex-shrink:0;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                <span>{{ $p->created_at->format('d M Y') }}</span>
                            </small>
                            <form method="POST" action="{{ route('admin.galeri.destroy', $p->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus item galeri ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="padding:6px 12px; font-size:0.78rem; font-weight:700; background:#EF4444; border-color:#EF4444; color:#FFFFFF; display:inline-flex; align-items:center; gap:5px; border-radius:8px;">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2.5" style="width:14px;height:14px;color:#FFFFFF;flex-shrink:0;"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                    <span>Hapus</span>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $photos->links() }}
        @else
            <div style="padding:60px 20px; text-align:center; color:var(--muted); display:flex; flex-direction:column; align-items:center; gap:10px;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="width:48px;height:48px;color:#94A3B8;"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                <span>Belum ada foto atau video di galeri. Klik tombol di atas untuk menambahkannya!</span>
            </div>
        @endif
    </div>
</div>
@endsection
