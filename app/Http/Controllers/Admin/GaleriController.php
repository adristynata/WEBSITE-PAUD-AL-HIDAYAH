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
        $kategori = $request->input('kategori', 'foto');

        $messages = [
            'video_file.uploaded' => 'Ukuran file video terlalu besar (melebihi batas maksimal server 2 MB). Disarankan memilih opsi "Link YouTube / YouTube Shorts" agar video dapat ditonton lancar tanpa hambatan server.',
            'video_file.max' => 'Ukuran file video terlalu besar (Maksimal 50 MB).',
            'video_file.mimes' => 'Format file video harus MP4, WebM, MOV, atau AVI.',
            'foto.uploaded' => 'Ukuran file foto terlalu besar (melebihi batas upload server 2 MB). Mohon pilih foto yang ukurannya lebih kecil atau kompres foto.',
            'foto.max' => 'Ukuran file foto/thumbnail terlalu besar (Maksimal 5 MB).',
            'foto.image' => 'File foto harus berupa gambar yang valid (JPG, JPEG, PNG, WebP).',
            'video_url.required_if' => 'Link URL YouTube wajib diisi jika memilih sumber Link YouTube.',
            'video_url.url' => 'Format link URL YouTube tidak valid.',
        ];

        if ($kategori === 'video') {
            $request->validate([
                'judul' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
                'video_source' => 'required|in:url,file',
                'video_url' => 'required_if:video_source,url|nullable|url',
                'video_file' => 'required_if:video_source,file|nullable|file|mimes:mp4,webm,mov,avi|max:51200',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            ], $messages);
        } else {
            $request->validate([
                'judul' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
                'foto' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            ], $messages);
        }

        $item = new Galeri();
        $item->judul = $request->judul;
        $item->deskripsi = $request->deskripsi;
        $item->kategori = $kategori;

        // Custom Thumbnail / Foto Upload
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $destPath = public_path('images/galeri');
            if (!File::isDirectory($destPath)) {
                File::makeDirectory($destPath, 0755, true, true);
            }
            $filename = 'galeri_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($destPath, $filename);
            $item->foto = 'images/galeri/' . $filename;
        }

        if ($kategori === 'video') {
            if ($request->video_source === 'url') {
                $item->video_url = $request->video_url;
            } else if ($request->hasFile('video_file')) {
                $video = $request->file('video_file');
                $vDestPath = public_path('videos/galeri');
                if (!File::isDirectory($vDestPath)) {
                    File::makeDirectory($vDestPath, 0755, true, true);
                }
                $vFilename = 'video_' . time() . '_' . uniqid() . '.' . $video->getClientOriginalExtension();
                $video->move($vDestPath, $vFilename);
                $item->video_file = 'videos/galeri/' . $vFilename;
            }
        }

        $item->save();

        $msg = ($kategori === 'video') ? 'Video kegiatan berhasil ditambahkan ke galeri.' : 'Foto kegiatan berhasil diunggah ke galeri.';
        return redirect()->route('admin.galeri.index')->with('success', $msg);
    }

    public function destroy($id)
    {
        $item = Galeri::findOrFail($id);
        
        if ($item->foto) {
            $filePath = public_path($item->foto);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        if ($item->video_file) {
            $vPath = public_path($item->video_file);
            if (File::exists($vPath)) {
                File::delete($vPath);
            }
        }

        $item->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Item galeri berhasil dihapus.');
    }
}
