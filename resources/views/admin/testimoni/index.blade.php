@extends('layouts.dashboard')
@section('title', 'Moderasi Review Orang Tua — Admin')
@section('page-title', 'Moderasi Review & Kesan Pesan Wali Murid')

@section('sidebar-menu')
    @include('admin.partials.sidebar-menu')
@endsection

@section('content')
<div class="card" style="margin-bottom: 24px;">
    <div class="card-header" style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px;">
        <span style="display:inline-flex;align-items:center;gap:8px;font-size:16px;font-weight:800;color:var(--navy);">
            <svg viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2" style="width:20px;height:20px;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            <span>Daftar Review Orang Tua / Wali Murid</span>
            @if($countPending > 0)
                <span class="badge bg-warning text-dark" style="font-size:11px;padding:4px 10px;border-radius:20px;font-weight:800;">{{ $countPending }} Menunggu Persetujuan</span>
            @endif
        </span>

        <!-- Tab Filter Status -->
        <div style="display:flex;gap:6px;flex-wrap:wrap;">
            <a href="{{ route('admin.testimoni.index') }}" class="btn btn-sm {{ !request('status') ? 'btn-primary' : 'btn-outline-secondary' }}" style="font-weight:700;">Semua</a>
            <a href="{{ route('admin.testimoni.index', ['status' => 'pending']) }}" class="btn btn-sm {{ request('status') === 'pending' ? 'btn-warning' : 'btn-outline-warning' }}" style="font-weight:700;">Pending</a>
            <a href="{{ route('admin.testimoni.index', ['status' => 'approved']) }}" class="btn btn-sm {{ request('status') === 'approved' ? 'btn-success' : 'btn-outline-success' }}" style="font-weight:700;">Disetujui (Tampil)</a>
            <a href="{{ route('admin.testimoni.index', ['status' => 'rejected']) }}" class="btn btn-sm {{ request('status') === 'rejected' ? 'btn-danger' : 'btn-outline-danger' }}" style="font-weight:700;">Ditolak</a>
        </div>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius:12px;">
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(count($testimonis) > 0)
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead style="background:#F8FAFC;">
                        <tr>
                            <th style="width:50px;">No</th>
                            <th>Wali Murid &amp; Gelar</th>
                            <th style="width:110px;">Rating</th>
                            <th>Isi Ulasan / Kesan Pesan</th>
                            <th style="width:120px;">Status</th>
                            <th style="width:150px;" class="text-end">Aksi Moderasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testimonis as $index => $t)
                            <tr>
                                <td>{{ $testimonis->firstItem() + $index }}</td>
                                <td>
                                    <div style="display:flex;align-items:center;gap:10px;">
                                        @if($t->foto)
                                            <img src="{{ asset('storage/' . $t->foto) }}" alt="{{ $t->nama_ortu }}" style="width:40px;height:40px;border-radius:50%;object-fit:cover;">
                                        @else
                                            <div style="width:40px;height:40px;border-radius:50%;background:#10B981;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:15px;">
                                                {{ strtoupper(substr($t->nama_ortu, 0, 1)) }}
                                            </div>
                                        @endif
                                        <div>
                                            <div style="font-weight:800;color:var(--navy);font-size:14px;">{{ $t->nama_ortu }}</div>
                                            <div style="font-size:11.5px;color:#64748B;">{{ $t->tipe_ortu ?? 'Wali Murid' }}</div>
                                            <div style="font-size:10.5px;color:#94A3B8;">{{ $t->created_at->format('d M Y, H:i') }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div style="color:#F59E0B;font-weight:800;letter-spacing:1px;font-size:13px;">
                                        @for($i = 1; $i <= 5; $i++)
                                            {{ $i <= $t->rating ? '★' : '☆' }}
                                        @endfor
                                    </div>
                                    <span style="font-size:11px;color:#64748B;">({{ $t->rating }}/5 Bintang)</span>
                                </td>
                                <td>
                                    <div style="font-size:13.5px;color:#334155;line-height:1.5;max-width:380px;white-space:pre-line;">
                                        &ldquo;{{ $t->isi_review }}&rdquo;
                                    </div>
                                </td>
                                <td>
                                    @if($t->status === 'approved')
                                        <span class="badge bg-success" style="padding:6px 12px;border-radius:20px;font-weight:700;">
                                            ✔ Approved
                                        </span>
                                    @elseif($t->status === 'pending')
                                        <span class="badge bg-warning text-dark" style="padding:6px 12px;border-radius:20px;font-weight:700;">
                                            ⏳ Pending
                                        </span>
                                    @else
                                        <span class="badge bg-danger" style="padding:6px 12px;border-radius:20px;font-weight:700;">
                                            ✖ Rejected
                                        </span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div style="display:inline-flex;gap:4px;">
                                        @if($t->status !== 'approved')
                                            <form action="{{ route('admin.testimoni.update-status', $t->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="approved">
                                                <button type="submit" class="btn btn-sm btn-success" title="Setujui (Tampilkan Publik)" style="padding:4px 8px;font-size:11.5px;font-weight:700;">
                                                    Approve
                                                </button>
                                            </form>
                                        @endif

                                        @if($t->status !== 'rejected')
                                            <form action="{{ route('admin.testimoni.update-status', $t->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="rejected">
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Tolak Ulasan" style="padding:4px 8px;font-size:11.5px;font-weight:700;">
                                                    Reject
                                                </button>
                                            </form>
                                        @endif

                                        <form action="{{ route('admin.testimoni.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus review ini secara permanen?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light text-danger" title="Hapus Permanen" style="padding:4px 8px;font-size:11.5px;">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px;"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div style="margin-top:20px;">
                {{ $testimonis->links() }}
            </div>
        @else
            <div style="text-align:center;padding:48px;background:#F8FAFC;border:1px dashed #CBD5E1;border-radius:16px;">
                <svg viewBox="0 0 24 24" fill="none" stroke="#94A3B8" stroke-width="1.8" style="width:48px;height:48px;margin-bottom:12px;"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                <h4 style="color:var(--navy);font-weight:800;margin-bottom:6px;">Belum Ada Review Orang Tua</h4>
                <p style="color:#64748B;font-size:14px;max-width:500px;margin:0 auto;">Ulasan dari wali murid yang dikirim melalui Portal Orang Tua akan muncul di sini untuk Anda tinjau sebelum ditampilkan secara publik.</p>
            </div>
        @endif
    </div>
</div>
@endsection
