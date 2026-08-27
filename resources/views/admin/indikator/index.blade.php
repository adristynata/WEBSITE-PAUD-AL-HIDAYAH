@extends('layouts.dashboard')
@section('title', 'Kelola Indikator Penilaian — Admin')
@section('page-title', 'Kelola Indikator Penilaian')

@section('sidebar-menu')
    @include('admin.partials.sidebar-menu')
@endsection

@section('content')

@if(session('success'))
    <div class="alert alert-success" style="margin-bottom:20px; display:flex; align-items:center; gap:8px; border-radius:12px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;flex-shrink:0;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        <span>{{ session('success') }}</span>
    </div>
@endif

<style>
/* Modern Filter UI */
.filter-card-modern {
    background: #ffffff;
    border: 1px solid #E2E8F0;
    border-radius: 16px;
    padding: 24px;
    margin-bottom: 24px;
    box-shadow: 0 4px 20px -4px rgba(0, 0, 0, 0.05);
}

.filter-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 20px;
    padding-bottom: 16px;
    border-bottom: 1px solid #F1F5F9;
}

.filter-title {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--secondary);
}

.filter-title-icon {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    background: #F0FDF4;
    color: #166534;
    display: flex;
    align-items: center;
    justify-content: center;
}

.filter-section {
    margin-bottom: 20px;
}

.filter-section:last-of-type {
    margin-bottom: 16px;
}

.filter-section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.filter-label {
    font-size: 0.84rem;
    font-weight: 700;
    color: #334155;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.filter-quick-btn {
    font-size: 0.75rem;
    color: #64748B;
    background: #F8FAFC;
    border: 1px solid #E2E8F0;
    padding: 3px 8px;
    border-radius: 6px;
    cursor: pointer;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.15s ease;
}

.filter-quick-btn:hover {
    background: #E2E8F0;
    color: #0F172A;
}

/* Chip Checkbox Grid */
.chip-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.chip-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 7px 14px;
    background: #F8FAFC;
    border: 1.5px solid #E2E8F0;
    border-radius: 10px;
    font-size: 0.84rem;
    color: #475569;
    font-weight: 600;
    cursor: pointer;
    user-select: none;
    transition: all 0.18s ease;
}

.chip-label:hover {
    background: #F1F5F9;
    border-color: #CBD5E1;
    color: #1E293B;
    transform: translateY(-1px);
}

.chip-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    display: inline-block;
}

/* Aspek Active Styles */
.chip-label.active-aspek {
    background: #143818;
    border-color: #143818;
    color: #FFFFFF;
    box-shadow: 0 4px 12px rgba(20, 56, 24, 0.25);
    transform: translateY(-1px);
}

.chip-label.active-aspek .chip-dot {
    background: #F4B93E !important;
}

/* Scale Checkbox Custom Colors */
.chip-label.scale-BB.active-scale {
    background: #EF4444;
    border-color: #DC2626;
    color: #FFFFFF;
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
}

.chip-label.scale-MB.active-scale {
    background: #F59E0B;
    border-color: #D97706;
    color: #FFFFFF;
    box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
}

.chip-label.scale-BSH.active-scale {
    background: #3B82F6;
    border-color: #2563EB;
    color: #FFFFFF;
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
}

.chip-label.scale-BSB.active-scale {
    background: #10B981;
    border-color: #059669;
    color: #FFFFFF;
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
}

.chip-checkbox {
    width: 15px;
    height: 15px;
    accent-color: #F4B93E;
    cursor: pointer;
    margin: 0;
}

/* Filter Footer */
.filter-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
    padding-top: 18px;
    border-top: 1px solid #F1F5F9;
}

.btn-filter-apply {
    background: #143818;
    color: #FFFFFF;
    border: none;
    padding: 10px 24px;
    border-radius: 10px;
    font-weight: 700;
    font-size: 0.88rem;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    transition: all 0.2s ease;
    box-shadow: 0 4px 12px rgba(20, 56, 24, 0.2);
}

.btn-filter-apply:hover {
    background: #1C4D22;
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(20, 56, 24, 0.3);
}

.btn-filter-reset {
    background: #F8FAFC;
    color: #64748B;
    border: 1px solid #E2E8F0;
    padding: 10px 18px;
    border-radius: 10px;
    font-weight: 600;
    font-size: 0.88rem;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    text-decoration: none;
    transition: all 0.2s ease;
}

.btn-filter-reset:hover {
    background: #F1F5F9;
    color: #0F172A;
    border-color: #CBD5E1;
}

.badge-active-count {
    background: #F0FDF4;
    color: #15803D;
    border: 1px solid #BBF7D0;
    padding: 3px 10px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 700;
}
</style>

{{-- Filter Card --}}
<div class="filter-card-modern">
    <form method="GET" action="{{ route('admin.indikator.index') }}" id="filterForm">
        
        {{-- Header Filter --}}
        <div class="filter-header">
            <div class="filter-title">
                <div class="filter-title-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" style="width:16px;height:16px;"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg>
                </div>
                <div>
                    <div>Filter Indikator Penilaian</div>
                    <div style="font-size:0.75rem; color:#64748B; font-weight:normal; margin-top:2px;">Centang satu atau lebih opsi untuk menyaring data indikator</div>
                </div>
            </div>

            @php
                $totalActiveFilter = count($aspekFilter) + count($nilaiFilter);
            @endphp

            @if($totalActiveFilter > 0)
                <span class="badge-active-count">
                    ✓ {{ $totalActiveFilter }} Filter Aktif
                </span>
            @endif
        </div>

        @php
            $aspekThemeColors = [
                'agama_moral'      => '#7C3AED',
                'motorik_kasar'    => '#EF4444',
                'motorik_halus'    => '#F59E0B',
                'kognitif'         => '#10B981',
                'bahasa'           => '#3B82F6',
                'sosial_emosional' => '#EC4899',
                'seni'             => '#8B5CF6',
            ];
        @endphp

        {{-- 1. Filter Aspek --}}
        <div class="filter-section">
            <div class="filter-section-header">
                <span class="filter-label">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;color:#143818;"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    Aspek Perkembangan ({{ count($aspekLabels) }})
                </span>
                <div style="display:flex; gap:6px;">
                    <button type="button" class="filter-quick-btn" onclick="selectAll('aspek')">Pilih Semua</button>
                    <button type="button" class="filter-quick-btn" onclick="clearAll('aspek')">Kosongkan</button>
                </div>
            </div>

            <div class="chip-grid">
                @foreach($aspekLabels as $key => $label)
                    @php $isChecked = in_array($key, $aspekFilter); @endphp
                    <label class="chip-label {{ $isChecked ? 'active-aspek' : '' }}" id="chip-aspek-{{ $key }}">
                        <input type="checkbox" name="aspek[]" value="{{ $key }}" class="chip-checkbox aspek-checkbox"
                               {{ $isChecked ? 'checked' : '' }}
                               onchange="toggleChip(this, 'chip-aspek-{{ $key }}', 'active-aspek')">
                        <span class="chip-dot" style="background:{{ $aspekThemeColors[$key] ?? '#64748B' }};"></span>
                        <span>{{ $label }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        {{-- 2. Filter Nilai --}}
        <div class="filter-section" style="padding-top:14px; border-top:1px dashed #F1F5F9;">
            <div class="filter-section-header">
                <span class="filter-label">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;color:#F59E0B;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    Skala Penilaian ({{ count($nilaiLabels) }})
                </span>
                <div style="display:flex; gap:6px;">
                    <button type="button" class="filter-quick-btn" onclick="selectAll('nilai')">Pilih Semua</button>
                    <button type="button" class="filter-quick-btn" onclick="clearAll('nilai')">Kosongkan</button>
                </div>
            </div>

            <div class="chip-grid">
                @foreach($nilaiLabels as $key => $label)
                    @php $isChecked = in_array($key, $nilaiFilter); @endphp
                    <label class="chip-label scale-{{ $key }} {{ $isChecked ? 'active-scale' : '' }}" id="chip-nilai-{{ $key }}">
                        <input type="checkbox" name="nilai[]" value="{{ $key }}" class="chip-checkbox nilai-checkbox"
                               {{ $isChecked ? 'checked' : '' }}
                               onchange="toggleChip(this, 'chip-nilai-{{ $key }}', 'active-scale')">
                        <span><strong>{{ $key }}</strong> – {{ $label }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        {{-- Footer Actions --}}
        <div class="filter-footer">
            <div style="display:flex; gap:10px; align-items:center;">
                <button type="submit" class="btn-filter-apply">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    Terapkan Filter
                </button>

                @if($totalActiveFilter > 0)
                    <a href="{{ route('admin.indikator.index') }}" class="btn-filter-reset">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/></svg>
                        Reset Filter
                    </a>
                @endif
            </div>

            <a href="{{ route('admin.indikator.create') }}" class="btn btn-primary" style="padding:10px 20px; border-radius:10px; font-weight:700; display:inline-flex; align-items:center; gap:6px; text-decoration:none;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Tambah Indikator Baru
            </a>
        </div>
    </form>
</div>

{{-- Data Table Card --}}
<div class="card" style="border-radius:16px; overflow:hidden; border:1px solid #E2E8F0;">
    <div class="card-header" style="background:#FCFDFD; border-bottom:1px solid #E2E8F0; padding:16px 20px; display:flex; align-items:center; justify-content:space-between;">
        <div style="display:flex; align-items:center; gap:8px; font-weight:700; color:var(--secondary); font-size:1rem;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;color:#143818;"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
            Daftar Indikator Penilaian
        </div>
        <span style="font-size:0.8rem; color:#64748B; background:#F1F5F9; padding:4px 12px; border-radius:20px; font-weight:600;">
            Total: {{ $indikators->total() }} indikator
        </span>
    </div>
    
    <div class="card-body" style="padding:0;">
        <div style="overflow-x:auto;">
            <table style="width:100%; border-collapse:collapse; font-size:0.875rem;">
                <thead>
                    <tr style="background:#F8FAFC; border-bottom:2px solid #E2E8F0;">
                        <th style="padding:14px 20px; text-align:left; font-weight:700; color:#475569; width:190px; text-transform:uppercase; font-size:0.75rem; letter-spacing:0.5px;">Aspek</th>
                        <th style="padding:14px 20px; text-align:center; font-weight:700; color:#475569; width:90px; text-transform:uppercase; font-size:0.75rem; letter-spacing:0.5px;">Nilai</th>
                        <th style="padding:14px 20px; text-align:left; font-weight:700; color:#475569; text-transform:uppercase; font-size:0.75rem; letter-spacing:0.5px;">Teks Rekomendasi Indikator</th>
                        <th style="padding:14px 20px; text-align:center; font-weight:700; color:#475569; width:70px; text-transform:uppercase; font-size:0.75rem; letter-spacing:0.5px;">Urutan</th>
                        <th style="padding:14px 20px; text-align:center; font-weight:700; color:#475569; width:130px; text-transform:uppercase; font-size:0.75rem; letter-spacing:0.5px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($indikators as $item)
                    <tr style="border-bottom:1px solid #F1F5F9; transition:background 0.15s ease;" onmouseover="this.style.background='#F8FAFC'" onmouseout="this.style.background='#FFFFFF'">
                        <td style="padding:14px 20px; color:var(--secondary); font-weight:600;">
                            <div style="display:flex; align-items:center; gap:8px;">
                                <span style="width:8px; height:8px; border-radius:50%; background:{{ $aspekThemeColors[$item->aspek] ?? '#64748B' }}; display:inline-block;"></span>
                                <span>{{ $aspekLabels[$item->aspek] ?? $item->aspek }}</span>
                            </div>
                        </td>
                        <td style="padding:14px 20px; text-align:center;">
                            @php
                                $badgeStyle = [
                                    'BB'  => 'background:#FEF2F2; color:#DC2626; border:1px solid #FECACA;',
                                    'MB'  => 'background:#FFFBEB; color:#D97706; border:1px solid #FDE68A;',
                                    'BSH' => 'background:#EFF6FF; color:#2563EB; border:1px solid #BFDBFE;',
                                    'BSB' => 'background:#ECFDF5; color:#059669; border:1px solid #A7F3D0;',
                                ];
                            @endphp
                            <span style="{{ $badgeStyle[$item->nilai] ?? 'background:#F1F5F9; color:#64748B;' }} padding:4px 12px; border-radius:20px; font-weight:800; font-size:0.8rem; display:inline-block;">
                                {{ $item->nilai }}
                            </span>
                        </td>
                        <td style="padding:14px 20px; color:#334155; line-height:1.55;">
                            {{ $item->teks }}
                        </td>
                        <td style="padding:14px 20px; text-align:center; color:#64748B; font-weight:600;">
                            {{ $item->urutan }}
                        </td>
                        <td style="padding:14px 20px; text-align:center;">
                            <div style="display:flex; gap:6px; justify-content:center;">
                                <a href="{{ route('admin.indikator.edit', $item->id) }}"
                                   style="display:inline-flex; align-items:center; gap:4px; padding:6px 10px; background:#EFF6FF; color:#2563EB; border-radius:8px; font-size:0.78rem; font-weight:700; text-decoration:none; border:1px solid #BFDBFE; transition:all 0.15s ease;">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:12px;height:12px;"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('admin.indikator.destroy', $item->id) }}" onsubmit="return confirm('Hapus indikator ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        style="display:inline-flex; align-items:center; gap:4px; padding:6px 10px; background:#FEF2F2; color:#DC2626; border-radius:8px; font-size:0.78rem; font-weight:700; border:1px solid #FECACA; cursor:pointer; transition:all 0.15s ease;">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:12px;height:12px;"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4h6v2"/></svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="padding:48px 20px; text-align:center; color:#64748B;">
                            <div style="width:48px; height:48px; border-radius:50%; background:#F1F5F9; color:#94A3B8; display:flex; align-items:center; justify-content:center; margin:0 auto 12px;">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="width:24px;height:24px;"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                            </div>
                            <strong style="color:var(--secondary); font-size:0.95rem; display:block; margin-bottom:4px;">Tidak ada indikator yang sesuai dengan filter.</strong>
                            <span style="font-size:0.84rem;">Coba centang opsi lain atau <a href="{{ route('admin.indikator.index') }}" style="color:var(--primary); font-weight:700; text-decoration:none;">Reset Filter</a></span>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        {{-- Pagination Bar --}}
        {{ $indikators->links() }}
    </div>
</div>

@push('scripts')
<script>
function toggleChip(checkbox, chipId, activeClass) {
    const chip = document.getElementById(chipId);
    if (!chip) return;
    if (checkbox.checked) {
        chip.classList.add(activeClass);
    } else {
        chip.classList.remove(activeClass);
    }
}

function selectAll(type) {
    const activeClass = type === 'aspek' ? 'active-aspek' : 'active-scale';
    document.querySelectorAll('.' + type + '-checkbox').forEach(cb => {
        cb.checked = true;
        const chip = cb.closest('.chip-label');
        if (chip) chip.classList.add(activeClass);
    });
}

function clearAll(type) {
    const activeClass = type === 'aspek' ? 'active-aspek' : 'active-scale';
    document.querySelectorAll('.' + type + '-checkbox').forEach(cb => {
        cb.checked = false;
        const chip = cb.closest('.chip-label');
        if (chip) chip.classList.remove(activeClass);
    });
}
</script>
@endpush
@endsection
