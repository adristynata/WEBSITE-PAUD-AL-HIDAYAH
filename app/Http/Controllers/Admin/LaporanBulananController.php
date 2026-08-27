<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\CatatanMingguan;
use App\Models\LaporanBulanan;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanBulananController extends Controller
{
    public function index(Request $request)
    {
        $kelases = Kelas::query()->get();
        $kelas_id = $request->input('kelas_id', $kelases->first()?->id);
        $bulan = (int) $request->input('bulan', date('m'));
        $tahun = (int) $request->input('tahun', date('Y'));

        $siswas = null;
        if ($kelas_id) {
            $siswas = Siswa::query()->where('kelas_id', $kelas_id)
                ->where('is_aktif', true)
                ->with(['laporanBulanans' => function($q) use ($bulan, $tahun) {
                    $q->where('bulan', $bulan)->where('tahun', $tahun);
                }])
                ->orderBy('nama')
                ->paginate(10)
                ->withQueryString();
        }

        return view('admin.laporan.index', compact('kelases', 'kelas_id', 'bulan', 'tahun', 'siswas'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'bulan' => 'required|numeric|between:1,12',
            'tahun' => 'required|numeric',
        ]);

        $siswa = Siswa::findOrFail($request->siswa_id);
        $bulan = (int) $request->bulan;
        $tahun = (int) $request->tahun;

        // Ambil catatan mingguan siswa pada bulan/tahun tersebut untuk dipajang side-by-side
        $catatans = CatatanMingguan::query()->where('siswa_id', $siswa->id)
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->orderBy('minggu_ke', 'asc')
            ->get();

        return view('admin.laporan.create', compact('siswa', 'bulan', 'tahun', 'catatans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'bulan' => 'required|numeric|between:1,12',
            'tahun' => 'required|numeric',
            'rekap_agama_moral' => 'required|string',
            'rekap_motorik_kasar' => 'required|string',
            'rekap_motorik_halus' => 'required|string',
            'rekap_kognitif' => 'required|string',
            'rekap_bahasa' => 'required|string',
            'rekap_sosial_emosional' => 'required|string',
            'rekap_seni' => 'required|string',
            'status' => 'required|in:draft,published',
        ]);

        // Cek duplikasi
        $exists = LaporanBulanan::query()->where('siswa_id', $request->siswa_id)
            ->where('bulan', $request->bulan)
            ->where('tahun', $request->tahun)
            ->exists();

        if ($exists) {
            return back()->withErrors(['duplikat' => 'Laporan bulanan siswa ini sudah ada.'])->withInput();
        }

        $validated['disunting_oleh'] = Auth::id();

        $laporan = LaporanBulanan::query()->create($validated);

        // Jika status published, buat notifikasi untuk orang tua
        if ($request->status === 'published') {
            $this->createNotification($laporan);
        }

        return redirect()->route('admin.laporan.index', [
            'kelas_id' => $laporan->siswa->kelas_id,
            'bulan' => $laporan->bulan,
            'tahun' => $laporan->tahun
        ])->with('success', 'Laporan bulanan berhasil disimpan.');
    }

    public function edit($id)
    {
        $laporan = LaporanBulanan::query()->with('siswa')->findOrFail($id);
        $siswa = $laporan->siswa;
        $bulan = $laporan->bulan;
        $tahun = $laporan->tahun;

        // Ambil catatan mingguan
        $catatans = CatatanMingguan::query()->where('siswa_id', $siswa->id)
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->orderBy('minggu_ke', 'asc')
            ->get();

        return view('admin.laporan.edit', compact('laporan', 'siswa', 'bulan', 'tahun', 'catatans'));
    }

    public function update(Request $request, $id)
    {
        $laporan = LaporanBulanan::findOrFail($id);

        $request->validate([
            'rekap_agama_moral' => 'required|string',
            'rekap_motorik_kasar' => 'required|string',
            'rekap_motorik_halus' => 'required|string',
            'rekap_kognitif' => 'required|string',
            'rekap_bahasa' => 'required|string',
            'rekap_sosial_emosional' => 'required|string',
            'rekap_seni' => 'required|string',
            'status' => 'required|in:draft,published',
        ]);

        $oldStatus = $laporan->status;
        $laporan->update($request->only([
            'rekap_agama_moral', 'rekap_motorik_kasar', 'rekap_motorik_halus',
            'rekap_kognitif', 'rekap_bahasa', 'rekap_sosial_emosional', 'rekap_seni', 'status'
        ]));

        // Kirim notifikasi jika status baru dipublish
        if ($oldStatus === 'draft' && $request->status === 'published') {
            $this->createNotification($laporan);
        }

        return redirect()->route('admin.laporan.index', [
            'kelas_id' => $laporan->siswa->kelas_id,
            'bulan' => $laporan->bulan,
            'tahun' => $laporan->tahun
        ])->with('success', 'Laporan bulanan berhasil diperbarui.');
    }

    private function createNotification(LaporanBulanan $laporan)
    {
        // Cari user orang tua dari siswa ini
        $parentUsers = $laporan->siswa->orangTuas;
        
        $months = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];
        $namaBulan = $months[$laporan->bulan] ?? $laporan->bulan;

        foreach ($parentUsers as $parent) {
            Notifikasi::query()->create([
                'user_id' => $parent->id,
                'judul' => 'Laporan Bulanan Baru Terbit! 📊',
                'pesan' => 'Laporan perkembangan anak Anda ' . $laporan->siswa->nama . ' untuk periode ' . $namaBulan . ' ' . $laporan->tahun . ' telah diterbitkan. Silakan lihat selengkapnya.',
                'link' => route('ortu.dashboard'),
                'is_read' => false
            ]);
        }
    }
}
