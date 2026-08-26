<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfilSekolahController extends Controller
{
    public function edit()
    {
        $profil = ProfilSekolah::first();
        
        if (!$profil) {
            $profil = ProfilSekolah::create([
                'sambutan_judul' => 'Mewujudkan Generasi Berakhlak Mulia & Kreatif',
                'sambutan_nama' => 'Sri Wahyuni, S.Pd.',
                'sambutan_jabatan' => 'Kepala Sekolah PAUD Al-Hidayah',
                'sambutan_teks' => "Selamat datang di keluarga besar PAUD Al Hidayah. Kami percaya bahwa setiap anak adalah bintang yang memiliki cahaya masing-masing. Di sini, kami hadir untuk menjaga cahaya tersebut tetap bersinar melalui kasih sayang dan bimbingan yang tepat.\n\nTerima kasih atas kepercayaan yang Anda berikan kepada kami untuk mendampingi masa-masa emas (golden age) buah hati Anda. Mari bersama-sama kita tuntun langkah awal mereka menuju masa depan yang gemilang.",
                'sambutan_foto' => 'foto kepsek1.jpg'
            ]);
        }

        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = ProfilSekolah::first();
        if (!$profil) {
            $profil = new ProfilSekolah();
        }

        $request->validate([
            'sambutan_judul' => 'required|string|max:255',
            'sambutan_nama' => 'required|string|max:255',
            'sambutan_jabatan' => 'required|string|max:255',
            'sambutan_teks' => 'required|string',
            'sambutan_foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'ttd_kepsek' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'ttd_kepsek_base64' => 'nullable|string',
        ]);

        $profil->sambutan_judul = $request->sambutan_judul;
        $profil->sambutan_nama = $request->sambutan_nama;
        $profil->sambutan_jabatan = $request->sambutan_jabatan;
        $profil->sambutan_teks = $request->sambutan_teks;

        if ($request->hasFile('sambutan_foto')) {
            // Delete old photo if exists and is not the default seeder file
            if ($profil->sambutan_foto && $profil->sambutan_foto !== 'foto kepsek1.jpg') {
                $oldPath = public_path('images/' . $profil->sambutan_foto);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }

            $image = $request->file('sambutan_foto');
            $filename = 'kepsek_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $profil->sambutan_foto = $filename;
        }

        // Simpan TTD dari Upload File jika ada
        if ($request->hasFile('ttd_kepsek')) {
            if ($profil->ttd_kepsek) {
                $oldTtd = public_path('images/' . $profil->ttd_kepsek);
                if (File::exists($oldTtd)) {
                    File::delete($oldTtd);
                }
            }

            $image = $request->file('ttd_kepsek');
            $filename = 'ttd_kepsek_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            \App\Helpers\ImageHelper::trimSignature(public_path('images/' . $filename));
            $profil->ttd_kepsek = $filename;
        } 
        // Jika tidak upload file tapi menggambar di kanvas
        elseif ($request->filled('ttd_kepsek_base64')) {
            if ($profil->ttd_kepsek) {
                $oldTtd = public_path('images/' . $profil->ttd_kepsek);
                if (File::exists($oldTtd)) {
                    File::delete($oldTtd);
                }
            }

            $image_parts = explode(";base64,", $request->ttd_kepsek_base64);
            if (count($image_parts) === 2) {
                $image_base64 = base64_decode($image_parts[1]);
                $filename = 'ttd_kepsek_' . time() . '.png';
                $file_path = public_path('images/' . $filename);
                file_put_contents($file_path, $image_base64);
                \App\Helpers\ImageHelper::trimSignature($file_path);
                $profil->ttd_kepsek = $filename;
            }
        }

        $profil->save();

        return redirect()->route('admin.profil.edit')->with('success', 'Profil Sekolah dan Tanda Tangan Kepala Sekolah berhasil diperbarui.');
    }
}
