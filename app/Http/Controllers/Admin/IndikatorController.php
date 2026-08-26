<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IndikatorPenilaian;
use Illuminate\Http\Request;

class IndikatorController extends Controller
{
    public function index(Request $request)
    {
        $aspekFilter = $request->input('aspek', []);
        if (is_string($aspekFilter)) {
            $aspekFilter = array_filter(explode(',', $aspekFilter));
        }
        $aspekFilter = array_filter((array) $aspekFilter);

        $nilaiFilter = $request->input('nilai', []);
        if (is_string($nilaiFilter)) {
            $nilaiFilter = array_filter(explode(',', $nilaiFilter));
        }
        $nilaiFilter = array_filter((array) $nilaiFilter);

        $query = IndikatorPenilaian::query()->orderBy('aspek')->orderBy('nilai')->orderBy('urutan');

        if (!empty($aspekFilter)) {
            $query->whereIn('aspek', $aspekFilter);
        }
        if (!empty($nilaiFilter)) {
            $query->whereIn('nilai', $nilaiFilter);
        }

        $indikators = $query->get();

        return view('admin.indikator.index', [
            'indikators'   => $indikators,
            'aspekLabels'  => IndikatorPenilaian::$aspekLabels,
            'nilaiLabels'  => IndikatorPenilaian::$nilaiLabels,
            'aspekFilter'  => $aspekFilter,
            'nilaiFilter'  => $nilaiFilter,
        ]);
    }

    public function create()
    {
        return view('admin.indikator.create', [
            'aspekLabels' => IndikatorPenilaian::$aspekLabels,
            'nilaiLabels' => IndikatorPenilaian::$nilaiLabels,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'aspek'  => 'required|in:' . implode(',', array_keys(IndikatorPenilaian::$aspekLabels)),
            'nilai'  => 'required|in:BB,MB,BSH,BSB',
            'teks'   => 'required|string|max:500',
            'urutan' => 'nullable|integer|min:0',
        ]);

        IndikatorPenilaian::create([
            'aspek'  => $request->aspek,
            'nilai'  => $request->nilai,
            'teks'   => $request->teks,
            'urutan' => $request->urutan ?? 0,
        ]);

        return redirect()->route('admin.indikator.index')
            ->with('success', 'Indikator berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $indikator = IndikatorPenilaian::findOrFail($id);
        return view('admin.indikator.edit', [
            'indikator'   => $indikator,
            'aspekLabels' => IndikatorPenilaian::$aspekLabels,
            'nilaiLabels' => IndikatorPenilaian::$nilaiLabels,
        ]);
    }

    public function update(Request $request, $id)
    {
        $indikator = IndikatorPenilaian::findOrFail($id);

        $request->validate([
            'aspek'  => 'required|in:' . implode(',', array_keys(IndikatorPenilaian::$aspekLabels)),
            'nilai'  => 'required|in:BB,MB,BSH,BSB',
            'teks'   => 'required|string|max:500',
            'urutan' => 'nullable|integer|min:0',
        ]);

        $indikator->update([
            'aspek'  => $request->aspek,
            'nilai'  => $request->nilai,
            'teks'   => $request->teks,
            'urutan' => $request->urutan ?? 0,
        ]);

        return redirect()->route('admin.indikator.index')
            ->with('success', 'Indikator berhasil diperbarui.');
    }

    public function destroy($id)
    {
        IndikatorPenilaian::findOrFail($id)->delete();
        return redirect()->route('admin.indikator.index')
            ->with('success', 'Indikator berhasil dihapus.');
    }
}
