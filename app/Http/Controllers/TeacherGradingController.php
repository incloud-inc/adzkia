<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\ExamAnswer;
use App\Models\ExamSession;
use App\Models\Question;
use App\Models\Tenant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class TeacherGradingController extends Controller
{
    /**
     * Daftar Peserta Ujian & Status Pengerjaan untuk Asesmen Tertentu.
     */
    public function index(Request $request, Assessment $assessment): View
    {
        $user = Auth::user();
        if (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser()) {
            abort(403, 'Akses terbatas untuk Dewan Guru & Pengawas.');
        }

        $currentTenant = $user->currentTenant;

        // Ambil semua soal untuk mendeteksi keberadaan soal essay
        $questions = Question::query()
            ->whereHas('assessmentSection', fn ($q) => $q->where('assessment_id', $assessment->id))
            ->get();

        $essayCount = $questions->where('type', 'essay')->count();
        $hasEssay = $essayCount > 0;

        // Ambil semua sesi ujian untuk asesmen ini
        $query = ExamSession::with(['user', 'answers'])
            ->where('assessment_id', $assessment->id);

        if ($currentTenant && ! $user->isSuperUser()) {
            $query->where('tenant_id', $currentTenant->id);
        }

        $allSessions = $query->latest('updated_at')->get();

        // Cari peserta yang belum mengerjakan jika dalam konteks tenant
        $targetTenant = $currentTenant ?? $assessment->tenant;
        $unstartedStudents = collect();
        if ($targetTenant) {
            $allStudentIds = $allSessions->pluck('user_id')->unique()->all();
            $unstartedStudents = $targetTenant->users()
                ->wherePivot('role', 'U')
                ->whereNotIn('users.id', $allStudentIds)
                ->get();
        }

        // Klasifikasikan status pengerjaan
        $kkm = (int) data_get($assessment->settings, 'passing_grade.min_score', 75);
        $kkmEnabled = (bool) data_get($assessment->settings, 'passing_grade.enabled', true);

        $mappedSessions = $allSessions->map(function (ExamSession $session) use ($hasEssay, $kkm, $kkmEnabled) {
            $isScoreReleased = (bool) data_get($session->meta, 'is_score_released', ! $hasEssay);

            // Periksa apakah ada jawaban essay yang belum dinilai
            $hasUngradedEssay = false;
            if ($hasEssay && $session->isCompleted()) {
                $hasUngradedEssay = $session->answers
                    ->whereNull('points_awarded')
                    ->whereIn('question_id', Question::whereHas('assessmentSection', fn ($q) => $q->where('assessment_id', $session->assessment_id))->where('type', 'essay')->pluck('id'))
                    ->isNotEmpty();
            }

            $category = match (true) {
                $session->isInProgress() || $session->isLocked() => 'in_progress',
                $session->isCompleted() && ($hasUngradedEssay || ! $isScoreReleased) => 'needs_review',
                default => 'final_released',
            };

            $scorePct = 0;
            if ($session->max_score > 0) {
                $scorePct = round(($session->score / $session->max_score) * 100, 1);
            }

            $isPassed = $kkmEnabled ? ($scorePct >= $kkm) : true;

            return [
                'session' => $session,
                'category' => $category,
                'is_score_released' => $isScoreReleased,
                'has_ungraded_essay' => $hasUngradedEssay,
                'score_pct' => $scorePct,
                'is_passed' => $isPassed,
            ];
        });

        // Tab Filter
        $tab = $request->query('tab', 'all');
        $search = strtolower(trim((string) $request->query('search', '')));

        $filteredList = $mappedSessions;

        if ($search !== '') {
            $filteredList = $filteredList->filter(function ($item) use ($search) {
                $name = strtolower($item['session']->user?->name ?? '');
                $email = strtolower($item['session']->user?->email ?? '');

                return str_contains($name, $search) || str_contains($email, $search);
            });
        }

        if ($tab === 'needs_review') {
            $filteredList = $filteredList->where('category', 'needs_review');
        } elseif ($tab === 'in_progress') {
            $filteredList = $filteredList->where('category', 'in_progress');
        } elseif ($tab === 'final_released') {
            $filteredList = $filteredList->where('category', 'final_released');
        }

        // Summary Stats
        $needsReviewCount = $mappedSessions->where('category', 'needs_review')->count();
        $inProgressCount = $mappedSessions->where('category', 'in_progress')->count();
        $finalCount = $mappedSessions->where('category', 'final_released')->count();
        $completedSessions = $mappedSessions->whereIn('category', ['needs_review', 'final_released']);

        $avgScore = $completedSessions->isNotEmpty()
            ? round($completedSessions->avg('score_pct'), 1)
            : 0;

        $passedCount = $completedSessions->where('is_passed', true)->count();
        $passRate = $completedSessions->isNotEmpty()
            ? round(($passedCount / $completedSessions->count()) * 100, 1)
            : 0;

        return view('teacher.grading.index', compact(
            'assessment',
            'filteredList',
            'unstartedStudents',
            'hasEssay',
            'essayCount',
            'tab',
            'search',
            'needsReviewCount',
            'inProgressCount',
            'finalCount',
            'avgScore',
            'passRate',
            'kkm',
            'kkmEnabled'
        ));
    }

    /**
     * Tampilan Antarmuka Koreksi Lembar Jawaban Essay Guru.
     */
    public function show(Request $request, Assessment $assessment, ExamSession $session): View
    {
        $user = Auth::user();
        if (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser()) {
            abort(403, 'Akses terbatas untuk Dewan Guru & Pengawas.');
        }

        abort_unless($session->assessment_id === $assessment->id, 404, 'Sesi tidak cocok dengan asesmen.');

        $session->load(['user', 'answers']);

        // Ambil semua soal dan kelompokkan
        $allQuestions = Question::query()
            ->whereHas('assessmentSection', fn ($q) => $q->where('assessment_id', $assessment->id))
            ->with(['questionGroup', 'options', 'assessmentSection'])
            ->orderBy('assessment_section_id')
            ->orderBy('order')
            ->get();

        $essayQuestions = $allQuestions->where('type', 'essay')->values();
        $objectiveQuestions = $allQuestions->where('type', '!=', 'essay')->values();

        $answersMap = $session->answers->keyBy('question_id');

        // Hitung total skor objektif yang sudah dikalkulasi otomatis
        $objectivePointsEarned = 0.0;
        $objectivePointsMax = 0.0;
        foreach ($objectiveQuestions as $objQ) {
            $objectivePointsMax += (float) ($objQ->points ?? 1);
            $ans = $answersMap->get($objQ->id);
            if ($ans && $ans->points_awarded !== null) {
                $objectivePointsEarned += (float) $ans->points_awarded;
            }
        }

        // Siapkan data soal essay untuk dikoreksi
        $essayItems = $essayQuestions->map(function (Question $q, int $index) use ($answersMap) {
            $ans = $answersMap->get($q->id);
            $payload = $ans?->answer_payload ?? [];

            // Cari kunci jawaban referensi atau rubrik
            $rubricGuide = null;
            if ($q->options->isNotEmpty()) {
                $rubricGuide = $q->options->first()->option_text;
            }

            $essayMaxPoints = (float) ($q->points ?? 1);
            $rawStudentAnswer = $payload['text'] ?? null;
            $markdownOptions = ['renderer' => ['soft_break' => "<br />\n"]];

            return [
                'index' => $index + 1,
                'question' => $q,
                'section_title' => $q->assessmentSection?->title ?? 'Section',
                'stimulus' => $q->questionGroup?->stimulus_content,
                'stimulus_rendered' => filled($q->questionGroup?->stimulus_content) ? Str::markdown($q->questionGroup->stimulus_content, $markdownOptions) : null,
                'stimulus_title' => $q->questionGroup?->title,
                'prompt' => $q->prompt,
                'prompt_rendered' => filled($q->prompt) ? Str::markdown($q->prompt, $markdownOptions) : null,
                'max_points' => $essayMaxPoints,
                'student_answer' => $rawStudentAnswer,
                'student_rendered' => filled($rawStudentAnswer) ? Str::markdown($rawStudentAnswer, $markdownOptions) : null,
                'points_awarded' => $ans?->points_awarded,
                'teacher_feedback' => $payload['teacher_feedback'] ?? null,
                'rubric_guide' => $rubricGuide,
                'answered_at' => $ans?->answered_at?->translatedFormat('H:i:s, d M Y'),
            ];
        });

        $isScoreReleased = (bool) data_get($session->meta, 'is_score_released', false);

        return view('teacher.grading.show', compact(
            'assessment',
            'session',
            'essayItems',
            'objectiveQuestions',
            'objectivePointsEarned',
            'objectivePointsMax',
            'isScoreReleased'
        ));
    }

    /**
     * Simpan Skor Essay & Catatan Guru, atau Rilis Nilai Final ke Siswa.
     */
    public function grade(Request $request, Assessment $assessment, ExamSession $session): RedirectResponse
    {
        $user = Auth::user();
        if (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser()) {
            abort(403, 'Akses terbatas untuk Dewan Guru & Pengawas.');
        }

        abort_unless($session->assessment_id === $assessment->id, 404, 'Sesi tidak valid.');

        $data = $request->validate([
            'action' => ['required', 'string', 'in:save_draft,release_final'],
            'grades' => ['nullable', 'array'],
            'grades.*' => ['nullable', 'numeric', 'min:0'],
            'feedbacks' => ['nullable', 'array'],
            'feedbacks.*' => ['nullable', 'string', 'max:2500'],
        ]);

        $grades = $data['grades'] ?? [];
        $feedbacks = $data['feedbacks'] ?? [];
        $action = $data['action'];

        DB::transaction(function () use ($session, $assessment, $grades, $feedbacks, $action, $user) {
            $questions = Question::query()
                ->whereHas('assessmentSection', fn ($q) => $q->where('assessment_id', $assessment->id))
                ->get()
                ->keyBy('id');

            // Perbarui setiap jawaban essay
            foreach ($grades as $questionId => $scoreInput) {
                $q = $questions->get($questionId);
                if (! $q) {
                    continue;
                }

                $maxPoints = (float) (($q->points && $q->points > 1) ? $q->points : 10.0);
                $awarded = $scoreInput !== null ? min((float) $scoreInput, $maxPoints) : null;
                $feedbackText = $feedbacks[$questionId] ?? null;

                $answer = ExamAnswer::query()->firstOrNew([
                    'exam_session_id' => $session->id,
                    'question_id' => $questionId,
                ]);

                $payload = (array) ($answer->answer_payload ?? []);
                if ($feedbackText !== null) {
                    $payload['teacher_feedback'] = $feedbackText;
                }
                $payload['graded_by'] = $user->id;
                $payload['graded_at'] = now()->toIso8601String();

                $answer->answer_payload = $payload;
                $answer->points_awarded = $awarded;
                $answer->is_correct = ($awarded !== null && $awarded > 0);
                $answer->save();
            }

            // Hitung ulang total skor sesi (Objektif + Essay)
            $allAnswers = ExamAnswer::where('exam_session_id', $session->id)->get();
            $totalPointsEarned = $allAnswers->sum(fn ($a) => (float) ($a->points_awarded ?? 0));
            $totalMaxPoints = (float) $questions->sum(fn ($q) => (float) ($q->points ?? 1));

            $meta = (array) ($session->meta ?? []);
            if ($action === 'release_final') {
                $meta['is_score_released'] = true;
                $meta['score_released_at'] = now()->toIso8601String();
                $meta['graded_by'] = $user->id;
                $meta['graded_by_name'] = $user->name;
            }

            $scorePenalty = (float) data_get($meta, 'score_penalty', 0);
            $session->forceFill([
                'score' => max(0.0, $totalPointsEarned - $scorePenalty),
                'max_score' => $totalMaxPoints > 0 ? $totalMaxPoints : $session->max_score,
                'meta' => $meta,
            ])->save();
        });

        $studentName = $session->user?->name ?? 'Siswa';
        $message = $action === 'release_final'
            ? "Nilai ujian resmi untuk {$studentName} telah berhasil difinalisasi dan dirilis ke portal siswa!"
            : "Draf skor dan umpan balik koreksi essay untuk {$studentName} berhasil disimpan.";

        return redirect()->route('assessments.grading', $assessment)->with('success', $message);
    }
}
