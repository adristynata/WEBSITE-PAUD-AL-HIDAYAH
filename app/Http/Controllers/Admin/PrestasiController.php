<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Prestasi::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('pemenang', 'like', "%{$search}%")
                  ->orWhere('peringkat', 'like', "%{$search}%");
            });
        }

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $prestasis = $query->orderBy('tahun', 'desc')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.prestasi.index', compact('prestasis'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|in:seni,agama,olahraga,sekolah',
            'peringkat' => 'required|string|max:100',
            'tahun' => 'required|string|max:10',
            'pemenang' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('prestasi', 'public');
            $validated['foto'] = 'storage/' . $path;
        }

        Prestasi::create($validated);

        return redirect()->route('admin.prestasi.index')->with('success', 'Data prestasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|in:seni,agama,olahraga,sekolah',
            'peringkat' => 'required|string|max:100',
            'tahun' => 'required|string|max:10',
            'pemenang' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        if ($request->hasFile('foto')) {
            // Delete old foto if stored in public storage
            if ($prestasi->foto && str_contains($prestasi->foto, 'storage/')) {
                $oldPath = str_replace('storage/', '', $prestasi->foto);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('foto')->store('prestasi', 'public');
            $validated['foto'] = 'storage/' . $path;
        }

        $prestasi->update($validated);

        return redirect()->route('admin.prestasi.index')->with('success', 'Data prestasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);

        if ($prestasi->foto && str_contains($prestasi->foto, 'storage/')) {
            $oldPath = str_replace('storage/', '', $prestasi->foto);
            Storage::disk('public')->delete($oldPath);
        }

        $prestasi->delete();

        return redirect()->route('admin.prestasi.index')->with('success', 'Data prestasi berhasil dihapus!');
    }
}
