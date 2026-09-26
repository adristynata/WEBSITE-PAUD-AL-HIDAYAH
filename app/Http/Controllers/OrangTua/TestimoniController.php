<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{
    /**
     * Menyimpan atau memperbarui review orang tua
     */
    public function store(Request $request)
    {
        $request->validate([
            'rating'     => 'required|integer|min:1|max:5',
            'isi_review' => 'required|string|min:10|max:600',
        ], [
            'rating.required'     => 'Pilih jumlah bintang rating.',
            'isi_review.required' => 'Isi ulasan / kesan pesan wajib diisi.',
            'isi_review.min'      => 'Isi ulasan minimal 10 karakter.',
            'isi_review.max'      => 'Isi ulasan maksimal 600 karakter.',
        ]);

        $user = Auth::user();

        // Cari siswa yang terhubung dengan orang tua untuk menyusun gelar/tipe ortu
        $siswa = $user->siswas()->with('kelas')->first();
        $namaSiswa = $siswa ? $siswa->nama : 'Siswa';
        $namaKelas = ($siswa && $siswa->kelas) ? $siswa->kelas->nama_kelas : 'KB-PAUD Al-Hidayah';
        $tipeOrtuDefault = "Orang Tua dari {$namaSiswa} ({$namaKelas})";

        // Cek apakah user sudah pernah membuat review
        $testimoni = Testimoni::where('user_id', $user->id)->first();

        if (!$testimoni) {
            $testimoni = new Testimoni();
            $testimoni->user_id = $user->id;
        }

        $testimoni->nama_ortu  = $user->name;
        $testimoni->tipe_ortu  = $tipeOrtuDefault;
        $testimoni->foto       = $user->foto; // Menggunakan foto profil akun ortu jika ada
        $testimoni->rating     = $request->rating;
        $testimoni->isi_review = $request->isi_review;
        $testimoni->status     = 'pending'; // Membutuhkan persetujuan Admin
        $testimoni->save();

        return redirect()->back()->with('success', 'Ulasan & kesan pesan Anda berhasil dikirim! Ulasan akan ditinjau terlebih dahulu oleh Admin sebelum ditampilkan di halaman depan.');
    }

    /**
     * Menghapus ulasan orang tua sendiri
     */
    public function destroy($id = null)
    {
        $user = Auth::user();
        
        if ($id) {
            $testimoni = Testimoni::where('user_id', $user->id)->where('id', $id)->first();
        } else {
            $testimoni = Testimoni::where('user_id', $user->id)->first();
        }

        if ($testimoni) {
            $testimoni->delete();
        }

        return redirect()->back()->with('success', 'Ulasan Anda berhasil dihapus.');
    }
}
