<?php

namespace App\Http\Controllers;

use App\Models\DichotomyPreset;
use Illuminate\Http\Request;

class DichotomyPresetController extends Controller
{
    public function index()
    {
        $presets = DichotomyPreset::orderBy('order')->get();

        return view('dichotomy-presets.index', compact('presets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'label_a' => 'required|string|max:255',
            'label_b' => 'required|string|max:255',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        DichotomyPreset::create($request->all());

        return redirect()->route('dichotomy-presets.index')->with('success', 'Preset berhasil ditambahkan.');
    }

    public function update(Request $request, DichotomyPreset $dichotomyPreset)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'label_a' => 'required|string|max:255',
            'label_b' => 'required|string|max:255',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $dichotomyPreset->update($request->all());

        return redirect()->route('dichotomy-presets.index')->with('success', 'Preset berhasil diperbarui.');
    }

    public function destroy(DichotomyPreset $dichotomyPreset)
    {
        $dichotomyPreset->delete();

        return redirect()->route('dichotomy-presets.index')->with('success', 'Preset berhasil dihapus.');
    }
}
