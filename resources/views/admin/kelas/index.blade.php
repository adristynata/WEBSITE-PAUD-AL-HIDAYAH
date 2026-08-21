@extends('layouts.dashboard')
@section('title', 'Kelola Kelas — Admin')
@section('page-title', 'Kelola Kelas')

@section('sidebar-menu')
    @include('admin.partials.sidebar-menu')
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div style="display:flex;align-items:center;gap:8px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg> Daftar Kelas</div>
        <a href="{{ route('admin.kelas.create') }}" class="btn btn-primary btn-sm"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg> Tambah Kelas</a>
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
                        <td>
                            <a href="{{ route('admin.kelas.edit', $k) }}" class="btn btn-secondary btn-sm"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg> Edit</a>
                            <form method="POST" action="{{ route('admin.kelas.destroy', $k) }}" style="display:inline"
                                  onsubmit="return confirm('Hapus kelas {{ $k->nama_kelas }}?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg></button>
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
