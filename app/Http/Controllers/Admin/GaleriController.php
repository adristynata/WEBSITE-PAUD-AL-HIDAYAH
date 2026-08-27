<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    public function index()
    {
        $photos = Galeri::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.galeri.index', compact('photos'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        $photo = new Galeri();
        $photo->judul = $request->judul;
        $photo->deskripsi = $request->deskripsi;

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            
            // Buat folder jika belum ada
            $destPath = public_path('images/galeri');
            if (!File::isDirectory($destPath)) {
                File::makeDirectory($destPath, 0755, true, true);
            }

            $filename = 'galeri_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($destPath, $filename);
            $photo->foto = 'images/galeri/' . $filename;
        }

        $photo->save();

        return redirect()->route('admin.galeri.index')->with('success', 'Foto kegiatan berhasil diunggah ke galeri.');
    }

    public function destroy($id)
    {
        $photo = Galeri::findOrFail($id);
        
        $filePath = public_path($photo->foto);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        $photo->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Foto kegiatan berhasil dihapus.');
    }
}
