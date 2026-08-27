<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\CatatanMingguan;
use App\Models\IndikatorPenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatatanMingguanController extends Controller
{
    public function index()
    {
        // Ambil kelas yang diampu oleh guru ini
        $kelas = Kelas::where('guru_id', Auth::id())->get();
        return view('guru.catatan.index', compact('kelas'));
    }

    public function showSiswa($kelas_id)
    {
        $kelas = Kelas::where('id', $kelas_id)->where('guru_id', Auth::id())->firstOrFail();
        $siswas = Siswa::where('kelas_id', $kelas_id)->where('is_aktif', true)->get();
        return view('guru.catatan.siswa', compact('kelas', 'siswas'));
    }

    public function listCatatan($siswa_id)
    {
        $siswa = Siswa::where('id', $siswa_id)->where('is_aktif', true)->firstOrFail();
        // Cek apakah kelas siswa diampu oleh guru ini
        if (!$siswa->kelas || $siswa->kelas->guru_id !== Auth::id()) {
            abort(403, 'Anda tidak berwenang mengakses data siswa ini.');
        }

        $catatans = CatatanMingguan::where('siswa_id', $siswa_id)
            ->orderBy('tahun', 'desc')
            ->orderBy('bulan', 'desc')
            ->orderBy('minggu_ke', 'desc')
            ->paginate(8);

        return view('guru.catatan.list', compact('siswa', 'catatans'));
    }

    public function create($siswa_id)
    {
        $siswa = Siswa::where('id', $siswa_id)->where('is_aktif', true)->firstOrFail();
        if (!$siswa->kelas || $siswa->kelas->guru_id !== Auth::id()) {
            abort(403, 'Anda tidak berwenang mengakses data siswa ini.');
        }
        // Ambil semua indikator, kelompokkan per aspek dan nilai
        $indikators = IndikatorPenilaian::orderBy('aspek')->orderBy('nilai')->orderBy('urutan')->get()
            ->groupBy(['aspek', 'nilai']);
        return view('guru.catatan.create', compact('siswa', 'indikators'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'minggu_ke' => 'required|integer|between:1,4',
            'bulan' => 'required|integer|between:1,12',
            'tahun' => 'required|integer|min:2020|max:2100',
            
            'nilai_agama_moral' => 'required|in:BB,MB,BSH,BSB',
            'catatan_agama_moral' => 'required|string',
            
            'motorik_kasar' => 'required|in:BB,MB,BSH,BSB',
            'catatan_motorik_kasar' => 'required|string',
            
            'motorik_halus' => 'required|in:BB,MB,BSH,BSB',
            'catatan_motorik_halus' => 'required|string',
            
            'kognitif' => 'required|in:BB,MB,BSH,BSB',
            'catatan_kognitif' => 'required|string',
            
            'bahasa' => 'required|in:BB,MB,BSH,BSB',
            'catatan_bahasa' => 'required|string',
            
            'sosial_emosional' => 'required|in:BB,MB,BSH,BSB',
            'catatan_sosial_emosional' => 'required|string',

            'seni' => 'required|in:BB,MB,BSH,BSB',
            'catatan_seni' => 'required|string',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'in' => 'Format penilaian :attribute tidak valid.',
            'between' => 'Pilihan :attribute harus di antara :min sampai :max.'
        ]);

        $siswa = Siswa::findOrFail($request->siswa_id);
        if (!$siswa->kelas || $siswa->kelas->guru_id !== Auth::id()) {
            abort(403, 'Anda tidak berwenang mengakses data siswa ini.');
        }

        // Cek duplikasi
        $exists = CatatanMingguan::where('siswa_id', $request->siswa_id)
            ->where('minggu_ke', $request->minggu_ke)
            ->where('bulan', $request->bulan)
            ->where('tahun', $request->tahun)
            ->exists();

        if ($exists) {
            return back()->withErrors(['duplikat' => 'Catatan untuk siswa ini pada Minggu ' . $request->minggu_ke . ' Bulan ' . $request->bulan . ' Tahun ' . $request->tahun . ' sudah ada. Silakan edit catatan yang ada.'])->withInput();
        }

        $data = $request->all();
        $data['guru_id'] = Auth::id();

        CatatanMingguan::create($data);

        return redirect()->route('guru.catatan.list', $request->siswa_id)
            ->with('success', 'Catatan mingguan berhasil disimpan.');
    }

    public function edit($id)
    {
        $catatan = CatatanMingguan::with('siswa')->findOrFail($id);
        if (!$catatan->siswa->kelas || $catatan->siswa->kelas->guru_id !== Auth::id()) {
            abort(403, 'Anda tidak berwenang mengedit catatan ini.');
        }
        $siswa = $catatan->siswa;
        $indikators = IndikatorPenilaian::orderBy('aspek')->orderBy('nilai')->orderBy('urutan')->get()
            ->groupBy(['aspek', 'nilai']);
        return view('guru.catatan.edit', compact('catatan', 'siswa', 'indikators'));
    }

    public function update(Request $request, $id)
    {
        $catatan = CatatanMingguan::findOrFail($id);
        if (!$catatan->siswa->kelas || $catatan->siswa->kelas->guru_id !== Auth::id()) {
            abort(403, 'Anda tidak berwenang mengedit catatan ini.');
        }

        $request->validate([
            'nilai_agama_moral' => 'required|in:BB,MB,BSH,BSB',
            'catatan_agama_moral' => 'required|string',
            
            'motorik_kasar' => 'required|in:BB,MB,BSH,BSB',
            'catatan_motorik_kasar' => 'required|string',
            
            'motorik_halus' => 'required|in:BB,MB,BSH,BSB',
            'catatan_motorik_halus' => 'required|string',
            
            'kognitif' => 'required|in:BB,MB,BSH,BSB',
            'catatan_kognitif' => 'required|string',
            
            'bahasa' => 'required|in:BB,MB,BSH,BSB',
            'catatan_bahasa' => 'required|string',
            
            'sosial_emosional' => 'required|in:BB,MB,BSH,BSB',
            'catatan_sosial_emosional' => 'required|string',

            'seni' => 'required|in:BB,MB,BSH,BSB',
            'catatan_seni' => 'required|string',
        ]);

        $catatan->update($request->only([
            'nilai_agama_moral', 'catatan_agama_moral',
            'motorik_kasar', 'catatan_motorik_kasar',
            'motorik_halus', 'catatan_motorik_halus',
            'kognitif', 'catatan_kognitif',
            'bahasa', 'catatan_bahasa',
            'sosial_emosional', 'catatan_sosial_emosional',
            'seni', 'catatan_seni'
        ]));

        return redirect()->route('guru.catatan.list', $catatan->siswa_id)
            ->with('success', 'Catatan mingguan berhasil diperbarui.');
    }
}
