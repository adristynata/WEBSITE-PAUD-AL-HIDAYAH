<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::with('kelas');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('nis', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('kelas_id')) {
            $query->where('kelas_id', $request->kelas_id);
        }

        if ($request->filled('status')) {
            $query->where('is_aktif', $request->status === 'aktif');
        }

        $siswas = $query->orderBy('nama')->paginate(10)->withQueryString();
        $kelasList = Kelas::orderBy('tahun_ajaran', 'desc')->orderBy('nama_kelas')->get();

        return view('admin.siswa.index', compact('siswas', 'kelasList'));
    }

    public function create()
    {
        $kelasList  = Kelas::orderBy('tahun_ajaran', 'desc')->orderBy('nama_kelas')->get();
        $nisPreview = $this->generateNis(); // preview NIS yang akan dibuat
        return view('admin.siswa.create', compact('kelasList', 'nisPreview'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis'           => 'required|string|unique:siswa,nis|max:20',
            'nama'          => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'kelas_id'      => 'nullable|exists:kelas,id',
            'kontak_ortu'   => 'nullable|string|max:20',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('siswa', 'public');
        }

        $siswa = Siswa::create($validated);

        return redirect()->route('admin.siswa.index')
                         ->with('success', "Data siswa berhasil ditambahkan! NIS: {$siswa->nis}");
    }

    public function edit(Siswa $siswa)
    {
        $kelasList = Kelas::orderBy('tahun_ajaran', 'desc')->orderBy('nama_kelas')->get();
        return view('admin.siswa.edit', compact('siswa', 'kelasList'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'nis'           => 'required|string|unique:siswa,nis,' . $siswa->id . '|max:20',
            'nama'          => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'kelas_id'      => 'nullable|exists:kelas,id',
            'kontak_ortu'   => 'nullable|string|max:20',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->input('hapus_foto') == '1') {
            if ($siswa->foto) {
                Storage::disk('public')->delete($siswa->foto);
            }
            $validated['foto'] = null;
        } elseif ($request->hasFile('foto')) {
            if ($siswa->foto) {
                Storage::disk('public')->delete($siswa->foto);
            }
            $validated['foto'] = $request->file('foto')->store('siswa', 'public');
        }

        $siswa->update($validated);

        return redirect()->route('admin.siswa.index')
                         ->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function toggleAktif(Siswa $siswa)
    {
        $siswa->update(['is_aktif' => !$siswa->is_aktif]);
        $status = $siswa->is_aktif ? 'diaktifkan' : 'dinonaktifkan';

        return redirect()->route('admin.siswa.index')
                         ->with('success', "Siswa berhasil {$status}!");
    }

    // ── Generate NIS otomatis: format TAHUN + 3 digit urutan ────────────────
    // Contoh: 2025001, 2025002, 2026001 (reset tiap tahun ajaran)
    private function generateNis(): string
    {
        $tahun = date('Y');

        $lastSiswa = Siswa::where('nis', 'like', $tahun . '%')
                          ->orderBy('nis', 'desc')
                          ->first();

        if ($lastSiswa) {
            $lastNumber = (int) substr($lastSiswa->nis, 4);
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        return $tahun . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
    }
}
