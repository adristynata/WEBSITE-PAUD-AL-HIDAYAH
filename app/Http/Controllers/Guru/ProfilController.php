<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('guru.profil.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'ttd' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'ttd_base64' => 'nullable|string',
        ], [
            'password.confirmed' => 'Konfirmasi password baru tidak cocok.',
            'password.min' => 'Password minimal 6 karakter.',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Simpan TTD dari Upload File jika ada
        if ($request->hasFile('ttd')) {
            if ($user->ttd) {
                $oldTtd = public_path('images/' . $user->ttd);
                if (File::exists($oldTtd)) {
                    File::delete($oldTtd);
                }
            }

            $image = $request->file('ttd');
            $filename = 'ttd_guru_' . $user->id . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            \App\Helpers\ImageHelper::trimSignature(public_path('images/' . $filename));
            $user->ttd = $filename;
        } 
        // Jika tidak upload file tapi menggambar di kanvas
        elseif ($request->filled('ttd_base64')) {
            if ($user->ttd) {
                $oldTtd = public_path('images/' . $user->ttd);
                if (File::exists($oldTtd)) {
                    File::delete($oldTtd);
                }
            }

            $image_parts = explode(";base64,", $request->ttd_base64);
            if (count($image_parts) === 2) {
                $image_base64 = base64_decode($image_parts[1]);
                $filename = 'ttd_guru_' . $user->id . '_' . time() . '.png';
                $file_path = public_path('images/' . $filename);
                file_put_contents($file_path, $image_base64);
                \App\Helpers\ImageHelper::trimSignature($file_path);
                $user->ttd = $filename;
            }
        }

        $user->save();

        return redirect()->route('guru.profil.edit')->with('success', 'Profil dan Tanda Tangan Digital berhasil diperbarui.');
    }
}