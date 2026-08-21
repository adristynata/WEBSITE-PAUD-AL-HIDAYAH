@extends('layouts.dashboard')
@section('title', 'Kelola Indikator Penilaian — Admin')
@section('page-title', 'Kelola Indikator Penilaian')

@section('sidebar-menu')
    @include('admin.partials.sidebar-menu')
@endsection

@section('content')

@if(session('success'))
    <div class="alert alert-success" style="margin-bottom:16px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;display:inline-block;vertical-align:middle;margin-right:6px;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        {{ session('success') }}
    </div>
@endif

{{-- Filter Bar --}}
<div class="card" style="margin-bottom:20px;">
    <div class="card-body" style="padding:16px;">
        <form method="GET" action="{{ route('admin.indikator.index') }}" style="display:flex;gap:12px;flex-wrap:wrap;align-items:flex-end;">
            <div class="form-group" style="margin:0;min-width:180px;">
                <label style="font-size:0.8rem;color:var(--muted);margin-bottom:4px;display:block;">Filter Aspek</label>
                <select name="aspek" class="form-control" style="height:38px;">
                    <option value="">-- Semua Aspek --</option>
                    @foreach($aspekLabels as $key => $label)
                        <option value="{{ $key }}" {{ $aspekFilter === $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="margin:0;min-width:150px;">
                <label style="font-size:0.8rem;color:var(--muted);margin-bottom:4px;display:block;">Filter Nilai</label>
                <select name="nilai" class="form-control" style="height:38px;">
                    <option value="">-- Semua Nilai --</option>
                    @foreach($nilaiLabels as $key => $label)
                        <option value="{{ $key }}" {{ $nilaiFilter === $key ? 'selected' : '' }}>{{ $key }} – {{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-secondary" style="height:38px;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;margin-right:4px;"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>Filter
            </button>
            @if($aspekFilter || $nilaiFilter)
                <a href="{{ route('admin.indikator.index') }}" class="btn btn-secondary" style="height:38px;">Reset</a>
            @endif
            <a href="{{ route('admin.indikator.create') }}" class="btn btn-primary" style="height:38px;margin-left:auto;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;margin-right:4px;"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>Tambah Indikator
            </a>
        </form>
    </div>
</div>

{{-- Table --}}
<div class="card">
    <div class="card-header" style="display:flex;align-items:center;gap:8px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
        Daftar Indikator Penilaian
        <span style="margin-left:auto;font-size:0.78rem;color:var(--muted);font-weight:400;">Total: {{ $indikators->count() }} indikator</span>
    </div>
    <div class="card-body" style="padding:0;">
        <div style="overflow-x:auto;">
            <table style="width:100%;border-collapse:collapse;font-size:0.875rem;">
                <thead>
                    <tr style="background:#F8FAFC;border-bottom:2px solid var(--border);">
                        <th style="padding:12px 16px;text-align:left;font-weight:700;color:var(--secondary);width:180px;">Aspek</th>
                        <th style="padding:12px 16px;text-align:center;font-weight:700;color:var(--secondary);width:80px;">Nilai</th>
                        <th style="padding:12px 16px;text-align:left;font-weight:700;color:var(--secondary);">Teks Indikator</th>
                        <th style="padding:12px 16px;text-align:center;font-weight:700;color:var(--secondary);width:60px;">Urutan</th>
                        <th style="padding:12px 16px;text-align:center;font-weight:700;color:var(--secondary);width:120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($indikators as $item)
                    <tr style="border-bottom:1px solid var(--border);">
                        <td style="padding:12px 16px;color:var(--secondary);font-weight:600;">
                            {{ $aspekLabels[$item->aspek] ?? $item->aspek }}
                        </td>
                        <td style="padding:12px 16px;text-align:center;">
                            @php
                                $nilaiColor = ['BB'=>'#EF4444','MB'=>'#F59E0B','BSH'=>'#3B82F6','BSB'=>'#10B981'];
                            @endphp
                            <span style="background:{{ $nilaiColor[$item->nilai] ?? '#64748B' }}22;color:{{ $nilaiColor[$item->nilai] ?? '#64748B' }};padding:3px 10px;border-radius:20px;font-weight:700;font-size:0.8rem;">
                                {{ $item->nilai }}
                            </span>
                        </td>
                        <td style="padding:12px 16px;color:var(--text);line-height:1.5;">{{ $item->teks }}</td>
                        <td style="padding:12px 16px;text-align:center;color:var(--muted);">{{ $item->urutan }}</td>
                        <td style="padding:12px 16px;text-align:center;">
                            <div style="display:flex;gap:6px;justify-content:center;">
                                <a href="{{ route('admin.indikator.edit', $item->id) }}"
                                   style="display:inline-flex;align-items:center;gap:4px;padding:5px 10px;background:#EFF6FF;color:#3B82F6;border-radius:6px;font-size:0.78rem;font-weight:600;text-decoration:none;border:1px solid #BFDBFE;">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:12px;height:12px;"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>Edit
                                </a>
                                <form method="POST" action="{{ route('admin.indikator.destroy', $item->id) }}" onsubmit="return confirm('Hapus indikator ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        style="display:inline-flex;align-items:center;gap:4px;padding:5px 10px;background:#FEF2F2;color:#EF4444;border-radius:6px;font-size:0.78rem;font-weight:600;border:1px solid #FECACA;cursor:pointer;">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:12px;height:12px;"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4h6v2"/></svg>Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="padding:40px;text-align:center;color:var(--muted);">
                            Belum ada indikator. <a href="{{ route('admin.indikator.create') }}" style="color:var(--primary);">Tambah sekarang</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

