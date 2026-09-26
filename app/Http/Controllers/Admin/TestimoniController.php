<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    /**
     * Tampilkan semua ulasan orang tua untuk moderasi admin
     */
    public function index(Request $request)
    {
        $query = Testimoni::query()->with('user')->orderBy('created_at', 'desc');

        if ($request->has('status') && in_array($request->status, ['pending', 'approved', 'rejected'])) {
            $query->where('status', $request->status);
        }

        $testimonis = $query->paginate(10);
        $countPending = Testimoni::where('status', 'pending')->count();

        return view('admin.testimoni.index', compact('testimonis', 'countPending'));
    }

    /**
     * Update status ulasan (approved, rejected, pending)
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $testimoni = Testimoni::findOrFail($id);
        $testimoni->status = $request->status;
        $testimoni->save();

        $statusText = [
            'approved' => 'disetujui dan akan ditampilkan di halaman utama.',
            'rejected' => 'ditolak.',
            'pending'  => 'dikembalikan ke status pending.',
        ];

        return redirect()->back()->with('success', "Ulasan dari {$testimoni->nama_ortu} berhasil " . ($statusText[$request->status] ?? 'diperbarui.'));
    }

    /**
     * Simpan ulasan manual buatan Admin
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_ortu'  => 'required|string|max:255',
            'tipe_ortu'  => 'required|string|max:255',
            'rating'     => 'required|integer|min:1|max:5',
            'isi_review' => 'required|string',
            'status'     => 'required|in:pending,approved,rejected',
        ]);

        Testimoni::create([
            'user_id'    => null,
            'nama_ortu'  => $request->nama_ortu,
            'tipe_ortu'  => $request->tipe_ortu,
            'rating'     => $request->rating,
            'isi_review' => $request->isi_review,
            'status'     => $request->status,
        ]);

        return redirect()->back()->with('success', 'Review orang tua berhasil ditambahkan secara manual.');
    }

    /**
     * Hapus ulasan
     */
    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();

        return redirect()->back()->with('success', 'Review berhasil dihapus.');
    }
}
