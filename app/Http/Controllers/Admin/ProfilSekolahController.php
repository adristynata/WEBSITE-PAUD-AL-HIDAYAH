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

        $messages = [
            'hero_slide_1.uploaded' => 'Ukuran file Foto Slide 1 terlalu besar atau gagal diunggah (Maks. 10 MB).',
            'hero_slide_2.uploaded' => 'Ukuran file Foto Slide 2 terlalu besar atau gagal diunggah (Maks. 10 MB).',
            'hero_slide_3.uploaded' => 'Ukuran file Foto Slide 3 terlalu besar atau gagal diunggah (Maks. 10 MB).',
            'hero_slide_4.uploaded' => 'Ukuran file Foto Slide 4 terlalu besar atau gagal diunggah (Maks. 10 MB).',
            'hero_slide_5.uploaded' => 'Ukuran file Foto Slide 5 terlalu besar atau gagal diunggah (Maks. 10 MB).',
            'flyer_foto1.uploaded' => 'Ukuran file Foto Aktivitas SPMB 1 terlalu besar atau gagal diunggah (Maks. 10 MB).',
            'flyer_foto2.uploaded' => 'Ukuran file Foto Aktivitas SPMB 2 terlalu besar atau gagal diunggah (Maks. 10 MB).',
            'flyer_foto3.uploaded' => 'Ukuran file Foto Aktivitas SPMB 3 terlalu besar atau gagal diunggah (Maks. 10 MB).',
            'sambutan_foto.uploaded' => 'Ukuran file Foto Kepala Sekolah terlalu besar (Maks. 10 MB).',
            'ttd_kepsek.uploaded' => 'Ukuran file Tanda Tangan terlalu besar (Maks. 5 MB).',
            'max' => 'Ukuran file :attribute terlalu besar (Maks. :max KB).',
            'image' => 'File :attribute harus berupa gambar yang valid (JPG, JPEG, PNG, WebP).',
            'mimes' => 'Format file :attribute harus berformat JPG, JPEG, PNG, atau WebP.',
        ];

        $request->validate([
            'sambutan_judul' => 'required|string|max:255',
            'sambutan_nama' => 'required|string|max:255',
            'sambutan_jabatan' => 'required|string|max:255',
            'sambutan_teks' => 'required|string',
            'sambutan_foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'alamat_lengkap' => 'nullable|string',
            'no_telepon' => 'nullable|string|max:50',
            'email_sekolah' => 'nullable|string|max:100',
            'maps_embed' => 'nullable|string',
            'hero_slide_1' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'hero_slide_2' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'hero_slide_3' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'hero_slide_4' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'hero_slide_5' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'flyer_foto1' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'flyer_foto2' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'flyer_foto3' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'flyer_program_unggulan' => 'nullable|string',
            'flyer_persyaratan' => 'nullable|string',
            'flyer_ekskul' => 'nullable|string',
            'ttd_kepsek' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'ttd_kepsek_base64' => 'nullable|string',
            'fonnte_token' => 'nullable|string|max:255',
            'fonnte_target' => 'nullable|string|max:100',
            'app_url' => 'nullable|url|max:255',
        ], $messages);

        $profil->sambutan_judul = $request->sambutan_judul;
        $profil->sambutan_nama = $request->sambutan_nama;
        $profil->sambutan_jabatan = $request->sambutan_jabatan;
        $profil->sambutan_teks = $request->sambutan_teks;
        $profil->alamat_lengkap = $request->alamat_lengkap;
        $profil->no_telepon = $request->no_telepon;
        $profil->email_sekolah = $request->email_sekolah;
        $profil->maps_embed = $request->maps_embed;
        $profil->flyer_program_unggulan = $request->flyer_program_unggulan;
        $profil->flyer_persyaratan = $request->flyer_persyaratan;
        $profil->flyer_ekskul = $request->flyer_ekskul;
        $profil->fonnte_token = $request->fonnte_token;
        $profil->fonnte_target = $request->fonnte_target;
        $profil->app_url = $request->app_url;

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

        // Upload Banner Hero Slide 1
        if ($request->hasFile('hero_slide_1')) {
            if ($profil->hero_slide_1 && !in_array($profil->hero_slide_1, ['hero-slide-1.jpg', 'gedung-sekolah.jpg'])) {
                $oldPath = public_path('images/' . $profil->hero_slide_1);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }
            $image = $request->file('hero_slide_1');
            $filename = 'hero_slide1_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $profil->hero_slide_1 = $filename;
        }

        // Upload Banner Hero Slide 2
        if ($request->hasFile('hero_slide_2')) {
            if ($profil->hero_slide_2 && $profil->hero_slide_2 !== 'hero-slide-2.jpg') {
                $oldPath = public_path('images/' . $profil->hero_slide_2);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }
            $image = $request->file('hero_slide_2');
            $filename = 'hero_slide2_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $profil->hero_slide_2 = $filename;
        }

        // Upload Banner Hero Slide 3
        if ($request->hasFile('hero_slide_3')) {
            if ($profil->hero_slide_3 && $profil->hero_slide_3 !== 'hero-slide-3.jpg') {
                $oldPath = public_path('images/' . $profil->hero_slide_3);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }
            $image = $request->file('hero_slide_3');
            $filename = 'hero_slide3_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $profil->hero_slide_3 = $filename;
        }

        // Upload Banner Hero Slide 4
        if ($request->hasFile('hero_slide_4')) {
            if ($profil->hero_slide_4 && $profil->hero_slide_4 !== 'hero-slide-4.jpg') {
                $oldPath = public_path('images/' . $profil->hero_slide_4);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }
            $image = $request->file('hero_slide_4');
            $filename = 'hero_slide4_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $profil->hero_slide_4 = $filename;
        }

        // Upload Banner Hero Slide 5
        if ($request->hasFile('hero_slide_5')) {
            if ($profil->hero_slide_5 && $profil->hero_slide_5 !== 'hero-slide-5.jpg') {
                $oldPath = public_path('images/' . $profil->hero_slide_5);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }
            $image = $request->file('hero_slide_5');
            $filename = 'hero_slide5_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $profil->hero_slide_5 = $filename;
        }

        // Upload Flyer Foto 1 (Polaroid 1 SPMB)
        if ($request->hasFile('flyer_foto1')) {
            if ($profil->flyer_foto1 && !in_array($profil->flyer_foto1, ['hero-slide-2.jpg', 'gedung-sekolah.jpg'])) {
                $oldPath = public_path('images/' . $profil->flyer_foto1);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }
            $image = $request->file('flyer_foto1');
            $filename = 'flyer_foto1_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $profil->flyer_foto1 = $filename;
        }

        // Upload Flyer Foto 2 (Polaroid 2 SPMB)
        if ($request->hasFile('flyer_foto2')) {
            if ($profil->flyer_foto2 && !in_array($profil->flyer_foto2, ['hero-slide-3.jpg', 'gedung-sekolah.jpg'])) {
                $oldPath = public_path('images/' . $profil->flyer_foto2);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }
            $image = $request->file('flyer_foto2');
            $filename = 'flyer_foto2_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $profil->flyer_foto2 = $filename;
        }

        // Upload Flyer Foto 3 (Polaroid 3 SPMB)
        if ($request->hasFile('flyer_foto3')) {
            if ($profil->flyer_foto3 && !in_array($profil->flyer_foto3, ['hero-paud-ceria.jpg', 'gedung-sekolah.jpg'])) {
                $oldPath = public_path('images/' . $profil->flyer_foto3);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }
            $image = $request->file('flyer_foto3');
            $filename = 'flyer_foto3_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $profil->flyer_foto3 = $filename;
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

        return redirect()->route('admin.profil.edit')->with('success', 'Profil Sekolah, Banner Hero, dan Tanda Tangan Kepala Sekolah berhasil diperbarui.');
    }

    public function testFonnte(Request $request)
    {
        $profil = ProfilSekolah::first();
        $token = $request->input('fonnte_token', $profil?->fonnte_token);
        $target = $request->input('fonnte_target', $profil?->fonnte_target);

        if (empty($token)) {
            return back()->with('error', 'Token API Fonnte belum diisi. Silakan isi Token Fonnte terlebih dahulu.')->withInput();
        }

        if (empty($target)) {
            return back()->with('error', 'Nomor Target Uji Coba belum diisi. Silakan isi Nomor Target di form di bawah ini.')->withInput();
        }

        $targetClean = preg_replace('/[^0-9]/', '', $target);
        if (str_starts_with($targetClean, '0')) {
            $targetClean = '62' . substr($targetClean, 1);
        }

        try {
            $response = \Illuminate\Support\Facades\Http::withoutVerifying()
                ->withHeaders(['Authorization' => $token])
                ->post('https://api.fonnte.com/send', [
                    'target' => $targetClean,
                    'message' => "📢 *UJI COBA NOTIFIKASI FONNTE WA*\n\n"
                               . "Pesan ini dikirim dari Dashboard Admin KB-PAUD Al-Hidayah Wedelan.\n"
                               . "Status Koneksi API Fonnte: *TERHUBUNG / AKTIF* ✅\n\n"
                               . "_Waktu Uji Coba: " . date('d-m-Y H:i:s') . "_",
                ]);

            $resData = $response->json();

            if (isset($resData['status']) && $resData['status'] === true) {
                return back()->with('success', '✅ Pesan Uji Coba WhatsApp BERHASIL dikirim ke nomor ' . $targetClean . '!');
            } else {
                $reason = $resData['reason'] ?? 'Tidak diketahui dari Fonnte';
                if (str_contains(strtolower($reason), 'disconnected device')) {
                    $reason = 'Perangkat WhatsApp di akun Fonnte Anda TERPUTUS (Disconnected Device). Silakan login ke fonnte.com dan Scan QR Code WhatsApp Anda terlebih dahulu.';
                }
                return back()->with('error', '⚠️ Fonnte Menolak Pengiriman: ' . $reason);
            }
        } catch (\Exception $e) {
            return back()->with('error', '❌ Gagal Menghubungi Server Fonnte: ' . $e->getMessage());
        }
    }
}
