@extends('layouts.dashboard')
@section('title', 'Data Siswa — Admin')
@section('page-title', 'Data Siswa')

@section('sidebar-menu')
    @include('admin.partials.sidebar-menu')
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div style="display:flex;align-items:center;gap:8px">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px;color:#16a34a"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            <span>Daftar Siswa</span>
        </div>
        <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary btn-sm">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Tambah Siswa
        </a>
    </div>
    <div class="card-body" style="padding-bottom:0">
        <form method="GET" class="search-bar">
            <input type="text" name="search" class="form-control"
                   placeholder="Cari nama / NIS..." value="{{ request('search') }}">
            <select name="kelas_id" class="form-control">
                <option value="">Semua Kelas</option>
                @foreach($kelasList as $k)
                    <option value="{{ $k->id }}" {{ request('kelas_id') == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kelas }}
                    </option>
                @endforeach
            </select>
            <select name="status" class="form-control">
                <option value="">Semua Status</option>
                <option value="aktif"    {{ request('status') === 'aktif'    ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ request('status') === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
            <button type="submit" class="btn btn-secondary">Filter</button>
            @if(request()->hasAny(['search','kelas_id','status']))
                <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">Reset</a>
            @endif
        </form>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Tgl Lahir</th>
                    <th>Kontak Ortu</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($siswas as $s)
                <tr>
                    <td>{{ $siswas->firstItem() + $loop->index }}</td>
                    <td>
                        @if($s->foto)
                            <img src="{{ asset('storage/'.$s->foto) }}" style="width:38px;height:38px;border-radius:50%;object-fit:cover;">
                        @else
                            <div style="width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,#F97316,#8B5CF6);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;font-size:0.9rem;">
                                {{ strtoupper(substr($s->nama, 0, 1)) }}
                            </div>
                        @endif
                    </td>
                    <td><code style="font-size:0.85rem;color:#7C3AED">{{ $s->nis }}</code></td>
                    <td><strong>{{ $s->nama }}</strong></td>
                    <td>
                        @if($s->kelas)
                            <span class="badge badge-purple">{{ $s->kelas->nama_kelas }}</span>
                        @else
                            <span style="color:#94A3B8">—</span>
                        @endif
                    </td>
                    <td>{{ $s->tanggal_lahir->format('d M Y') }}</td>
                    <td>{{ $s->kontak_ortu ?? '—' }}</td>
                    <td>
                        @if($s->is_aktif)
                            <span class="badge badge-green">Aktif</span>
                        @else
                            <span class="badge badge-red">Nonaktif</span>
                        @endif
                    </td>
                    <td style="white-space:nowrap">
                        <a href="{{ route('admin.siswa.edit', $s) }}" class="btn btn-secondary btn-sm" title="Edit">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>
                        </a>
                        <form method="POST" action="{{ route('admin.siswa.toggle-aktif', $s) }}" style="display:inline">
                            @csrf @method('PATCH')
                            <button type="submit" class="btn btn-sm {{ $s->is_aktif ? 'btn-danger' : 'btn-success' }}"
                                    title="{{ $s->is_aktif ? 'Nonaktifkan' : 'Aktifkan' }}">
                                @if($s->is_aktif)
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg>
                                @else
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                @endif
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" style="text-align:center;padding:40px;color:#94A3B8">
                        Tidak ada data siswa.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-body" style="padding-top:12px">
        {{ $siswas->links() }}
    </div>
</div>
@endsection
