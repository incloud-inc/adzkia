<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SubjectController extends Controller
{
    /**
     * Display a listing of the subjects for Owner (Super User).
     */
    public function index(Request $request): View
    {
        if (! Auth::user()->isSuperUser()) {
            abort(403, 'Hanya Owner yang memiliki hak akses untuk mengelola mata pelajaran.');
        }

        $query = Subject::withCount(['assessments', 'questionBanks']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('code', 'like', "%{$search}%");
            });
        }

        $subjects = $query->orderBy('name')->paginate(10)->withQueryString();

        return view('subjects.index', compact('subjects'));
    }

    /**
     * Store a newly created global subject in storage (Owner only).
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        if (! Auth::user()->isSuperUser()) {
            abort(403, 'Hanya Owner yang memiliki hak akses untuk menambahkan mata pelajaran.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'nullable|string|max:50',
            'description' => 'nullable|string|max:1000',
        ]);

        $subject = Subject::create([
            'name' => $validated['name'],
            'code' => $validated['code'],
            'description' => $validated['description'],
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'subject' => $subject,
            ]);
        }

        return redirect()->route('subjects.index')->with('success', 'Mata Pelajaran berhasil ditambahkan.');
    }

    /**
     * Update the specified subject in storage (Owner only).
     */
    public function update(Request $request, Subject $subject): RedirectResponse
    {
        if (! Auth::user()->isSuperUser()) {
            abort(403, 'Hanya Owner yang memiliki hak akses untuk memperbarui mata pelajaran.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'nullable|string|max:50',
            'description' => 'nullable|string|max:1000',
        ]);

        $subject->update($validated);

        return redirect()->route('subjects.index')->with('success', 'Mata Pelajaran berhasil diperbarui.');
    }

    /**
     * Remove the specified subject from storage (Owner only).
     */
    public function destroy(Subject $subject): RedirectResponse
    {
        if (! Auth::user()->isSuperUser()) {
            abort(403, 'Hanya Owner yang memiliki hak akses untuk menghapus mata pelajaran.');
        }

        $name = $subject->name;
        $subject->delete();

        return redirect()->route('subjects.index')->with('success', "Mata Pelajaran {$name} berhasil dihapus.");
    }
}
