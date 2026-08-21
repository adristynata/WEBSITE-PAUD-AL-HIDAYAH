<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with('guru')->withCount('siswas')->latest()->get();
        return view('admin.kelas.index', compact('kelas'));
    }

    public function create()
    {
        $gurus = User::query()->where('role', 'guru')->orderBy('name')->get();
        return view('admin.kelas.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kelas'   => 'required|string|max:100',
            'tahun_ajaran' => 'required|string|max:20',
            'guru_id'      => 'nullable|exists:users,id',
        ]);

        Kelas::create($validated);

        return redirect()->route('admin.kelas.index')
                         ->with('success', 'Kelas berhasil ditambahkan!');
    }

    public function edit(Kelas $kelas)
    {
        $gurus = User::query()->where('role', 'guru')->orderBy('name')->get();
        return view('admin.kelas.edit', compact('kelas', 'gurus'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        $validated = $request->validate([
            'nama_kelas'   => 'required|string|max:100',
            'tahun_ajaran' => 'required|string|max:20',
            'guru_id'      => 'nullable|exists:users,id',
        ]);

        $kelas->update($validated);

        return redirect()->route('admin.kelas.index')
                         ->with('success', 'Kelas berhasil diperbarui!');
    }

    public function destroy(Kelas $kelas)
    {
        Kelas::destroy($kelas->id);
        return redirect()->route('admin.kelas.index')
                         ->with('success', 'Kelas berhasil dihapus!');
    }
}
