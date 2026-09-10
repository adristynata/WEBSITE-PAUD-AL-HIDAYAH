@extends('layouts.dashboard')
@section('title', 'Kelola Kelas — Admin')
@section('page-title', 'Kelola Kelas')

@section('sidebar-menu')
    @include('admin.partials.sidebar-menu')
@endsection

@section('content')
<div class="card">
    <div class="card-header" style="display:flex; justify-content:space-between; align-items:center;">
        <div style="display:flex;align-items:center;gap:8px;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg> <span>Daftar Kelas</span></div>
        <a href="{{ route('admin.kelas.create') }}" class="btn btn-primary btn-sm" style="display:inline-flex; align-items:center; gap:6px; font-weight:700;">
            <svg viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="3" style="width:15px;height:15px;color:#FFFFFF;flex-shrink:0;"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            <span>Tambah Kelas</span>
        </a>
    </div>
    <div class="card-body" style="padding:0">
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Kelas</th>
                        <th>Tahun Ajaran</th>
                        <th>Guru Pengampu</th>
                        <th>Jml Siswa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kelas as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $k->nama_kelas }}</strong></td>
                        <td><span class="badge badge-blue">{{ $k->tahun_ajaran }}</span></td>
                        <td>{{ $k->guru?->name ?? '<span style="color:#94A3B8">Belum ditentukan</span>' }}</td>
                        <td><span class="badge badge-orange">{{ $k->siswas_count }} siswa</span></td>
                        <td style="white-space:nowrap">
                            <a href="{{ route('admin.kelas.edit', $k) }}" class="btn btn-secondary btn-sm" style="display:inline-flex;align-items:center;gap:4px;">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>
                                <span>Edit</span>
                            </a>
                            <form method="POST" action="{{ route('admin.kelas.destroy', $k) }}" style="display:inline"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelas {{ $k->nama_kelas }} ({{ $k->tahun_ajaran }})?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="display:inline-flex;align-items:center;gap:4px;" title="Hapus Kelas">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                    <span>Hapus</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align:center; padding:40px; color:#94A3B8;">
                            Belum ada kelas. <a href="{{ route('admin.kelas.create') }}">Tambah sekarang</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
