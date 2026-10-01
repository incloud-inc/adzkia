<?php

namespace App\Http\Controllers;

use App\Models\QuestionBank;
use App\Models\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class QuestionBankController extends Controller
{
    /**
     * Display a listing of the question banks.
     */
    public function index(Request $request): View
    {
        $query = QuestionBank::with(['subject', 'creator'])
            ->withCount(['questions', 'questionGroups']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%");
        }

        if ($request->filled('subject_id')) {
            $query->where('subject_id', $request->subject_id);
        }

        if ($request->filled('grade_level')) {
            $query->where('grade_level', $request->grade_level);
        }

        $questionBanks = $query->latest()->paginate(10)->withQueryString();
        $subjects = Subject::orderBy('name')->get();

        return view('question-banks.index', compact('questionBanks', 'subjects'));
    }

    /**
     * Show the form for creating a new question bank.
     */
    public function create(): View
    {
        $subjects = Subject::orderBy('name')->get();

        return view('question-banks.create', compact('subjects'));
    }

    /**
     * Store a newly created question bank in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'title' => 'required|string|max:255',
            'grade_level' => 'nullable|string|max:50',
            'description' => 'nullable|string|max:1000',
        ]);

        $tenantId = Auth::user()->current_tenant_id ?? Auth::user()->tenants()->first()?->id;

        $questionBank = QuestionBank::create([
            'tenant_id' => $tenantId,
            'subject_id' => $validated['subject_id'],
            'created_by' => Auth::id(),
            'title' => $validated['title'],
            'grade_level' => $validated['grade_level'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('question-banks.show', $questionBank)
            ->with('success', "Bank Soal {$questionBank->title} berhasil dibuat.");
    }

    /**
     * Display the specified question bank.
     */
    public function show(QuestionBank $questionBank): View
    {
        $questionBank->load([
            'subject',
            'creator',
            'questionGroups.questions.options',
            'questions' => fn ($q) => $q->whereNull('question_group_id')->with('options'),
        ]);

        return view('question-banks.show', compact('questionBank'));
    }

    /**
     * Show the form for editing the specified question bank.
     */
    public function edit(QuestionBank $questionBank): View
    {
        $subjects = Subject::orderBy('name')->get();

        return view('question-banks.edit', compact('questionBank', 'subjects'));
    }

    /**
     * Update the specified question bank in storage.
     */
    public function update(Request $request, QuestionBank $questionBank): RedirectResponse
    {
        $validated = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'title' => 'required|string|max:255',
            'grade_level' => 'nullable|string|max:50',
            'description' => 'nullable|string|max:1000',
        ]);

        $questionBank->update($validated);

        return redirect()->route('question-banks.show', $questionBank)
            ->with('success', 'Bank Soal berhasil diperbarui.');
    }

    /**
     * Remove the specified question bank from storage.
     */
    public function destroy(QuestionBank $questionBank): RedirectResponse
    {
        $title = $questionBank->title;
        $questionBank->delete();

        return redirect()->route('question-banks.index')
            ->with('success', "Bank Soal {$title} berhasil dihapus.");
    }
}
