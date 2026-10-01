<?php

namespace App\Http\Controllers;

use App\Models\GradeLevel;
use Illuminate\Http\Request;

class GradeLevelController extends Controller
{
    public function index()
    {
        $gradeLevels = GradeLevel::orderBy('order')->get();

        return view('grade-levels.index', compact('gradeLevels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'group' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'value' => 'required|string|max:255|unique:grade_levels,value',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        GradeLevel::create($request->all());

        return redirect()->route('grade-levels.index')->with('success', 'Tingkat Kelas berhasil ditambahkan.');
    }

    public function update(Request $request, GradeLevel $gradeLevel)
    {
        $request->validate([
            'group' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'value' => 'required|string|max:255|unique:grade_levels,value,'.$gradeLevel->id,
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $gradeLevel->update($request->all());

        return redirect()->route('grade-levels.index')->with('success', 'Tingkat Kelas berhasil diperbarui.');
    }

    public function destroy(GradeLevel $gradeLevel)
    {
        $gradeLevel->delete();

        return redirect()->route('grade-levels.index')->with('success', 'Tingkat Kelas berhasil dihapus.');
    }
}
