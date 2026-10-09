<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Jobs\GradeExamSessionJob;
use App\Models\ExamAnswer;
use App\Models\ExamSession;
use App\Models\Question;
use App\Services\Ai\AiExplanationService;
use App\Services\AnswerReviewFormatter;
use App\Services\ExamGradingService;
use App\Support\MarkdownRenderer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExamResultController extends Controller
{
    public function __construct(
        protected ExamGradingService $gradingService,
        protected AnswerReviewFormatter $reviewFormatter
    ) {}

    /**
     * Tampilkan riwayat dan daftar hasil pengerjaan ujian siswa.
     */
    public function history(Request $request): View
    {
        $user = $request->user();

        $query = ExamSession::query()
            ->where('user_id', $user->id)
            ->with(['assessment.subject'])
            ->latest('started_at');

        if ($request->get('filter') === 'completed') {
            $query->where('status', 'completed');
        } elseif ($request->get('filter') === 'in_progress') {
            $query->where('status', 'in_progress');
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('assessment', function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%");
            });
        }

        $sessions = $query->paginate(10)->withQueryString();

        $totalSessions = ExamSession::where('user_id', $user->id)->count();
        $completedSessions = ExamSession::where('user_id', $user->id)->where('status', 'completed')->count();
        $inProgressSessions = ExamSession::where('user_id', $user->id)->where('status', 'in_progress')->count();

        return view('exam.history', compact('sessions', 'totalSessions', 'completedSessions', 'inProgressSessions'));
    }

    /**
     * Tampilkan rekap hasil ujian siswa (Post-Exam Summary Screen).
     */
    public function show(Request $request, ExamSession $session): View|RedirectResponse
    {
        $user = $request->user();

        // Autorisasi: pemilik sesi atau guru/admin/superuser
        $canAccess = ($session->user_id === $user->id) || $user->isTeacher() || $user->isAdmin() || $user->isSuperUser();
        abort_unless($canAccess, 403, 'Anda tidak berhak melihat hasil sesi ujian ini.');

        // Jika sesi belum selesai tapi waktu habis
        if (! $session->isCompleted()) {
            if ($session->isExpired()) {
                $session->forceFill([
                    'status' => 'completed',
                    'grading_status' => 'pending',
                    'completed_at' => now(),
                    'meta' => array_merge((array) $session->meta, [
                        'finalize_reason' => 'auto_expired_on_result_view',
                        'finalized_at' => now()->toIso8601String(),
                    ]),
                ])->save();

                GradeExamSessionJob::dispatch($session->id)
                    ->onQueue('grading')
                    ->afterCommit();
            } else {
                return redirect()->route('exam.workspace', ['session' => $session->uuid]);
            }
        }

        // Auto-grade langsung jika belum completed (menjamin hasil langsung siap tanpa stuck di pending saat queue belum jalan)
        if ($session->grading_status !== 'completed') {
            $this->gradingService->autoGradeSessionOptimized($session);
            $session->refresh();
        }

        // Eager load data asesmen dan relasi pendukung
        $assessment = $session->assessment()
            ->with([
                'subject',
                'sections' => fn ($q) => $q->orderBy('order')->orderBy('id'),
                'sections.questionGroups' => fn ($q) => $q->orderBy('order')->orderBy('id'),
                'sections.questionGroups.questions.options',
                'sections.questions.options',
                'sections.questions.questionGroup',
            ])
            ->firstOrFail();

        $answers = $session->answers()->get()->keyBy('question_id');

        // 1. Hitung durasi pengerjaan
        $durationFormatted = '-';
        if ($session->started_at && $session->completed_at) {
            $diffSeconds = $session->started_at->diffInSeconds($session->completed_at);
            $mins = intdiv($diffSeconds, 60);
            $secs = $diffSeconds % 60;
            $durationFormatted = ($mins > 0 ? "{$mins} Menit " : '')."{$secs} Detik";
        }

        // 2. Kalkulasi statistik per section dan keseluruhan
        $sectionsData = [];
        $totalQuestionsOverall = 0;
        $totalCorrectOverall = 0;
        $totalIncorrectOverall = 0;
        $totalUnansweredOverall = 0;
        $totalEssayOverall = 0;
        $totalEssayPendingOverall = 0;
        $totalPointsOverall = 0.0;
        $earnedPointsOverall = 0.0;

        $globalQuestionNumber = 1;

        foreach ($assessment->sections as $secIndex => $section) {
            // Ambil semua soal pada section (baik soal stimulus narasi/group maupun soal mandiri)
            $allSectionQuestions = $section->questions;
            if ($section->relationLoaded('questionGroups')) {
                foreach ($section->questionGroups as $grp) {
                    if ($grp->relationLoaded('questions')) {
                        $allSectionQuestions = $allSectionQuestions->concat($grp->questions);
                    }
                }
            }

            // Urutkan soal PERSIS sesuai urutan pembuatan awal (jangan pernah memindahkan stimulus ke depan!)
            $questions = $allSectionQuestions->unique('id')->sortBy(function ($q) use ($section) {
                $grp = $q->questionGroup ?? $section->questionGroups->firstWhere('id', $q->question_group_id);
                if ($q->question_group_id && $grp) {
                    return sprintf('%06d_%06d_%09d', (int) ($grp->order ?? 1), (int) ($q->order ?? 1), (int) $q->id);
                }

                return sprintf('%06d_000000_%09d', (int) ($q->order ?? 1), (int) $q->id);
            })->values();

            $count = $questions->count();
            $secEssayCount = 0;
            $secEssayPendingCount = 0;
            $secCorrect = 0;
            $secIncorrect = 0;
            $secUnanswered = 0;
            $secTotalPoints = (float) $questions->sum(fn ($q) => (float) ($q->points ?? 1));
            $secEarnedPoints = 0.0;

            $questionReviewList = [];

            foreach ($questions as $q) {
                $ans = $answers->get($q->id);
                $isEssay = $q->type === 'essay';
                $pointsAwarded = $ans ? (float) ($ans->points_awarded ?? 0) : 0.0;
                $isAnswered = $ans && $ans->isAnswered();

                if ($isEssay) {
                    $secEssayCount++;
                    $totalEssayOverall++;

                    // Cek apakah sudah dinilai guru
                    $isGradedByTeacher = $ans && $ans->points_awarded !== null;
                    if ($isGradedByTeacher) {
                        $secEarnedPoints += $pointsAwarded;
                        if ($pointsAwarded > 0) {
                            $secCorrect++;
                            $totalCorrectOverall++;
                        } else {
                            $secIncorrect++;
                            $totalIncorrectOverall++;
                        }
                    } else {
                        $secEssayPendingCount++;
                        $totalEssayPendingOverall++;
                    }

                    if (! $isAnswered) {
                        $secUnanswered++;
                        $totalUnansweredOverall++;
                    }
                } else {
                    // Soal objektif
                    if (! $isAnswered) {
                        $secUnanswered++;
                        $totalUnansweredOverall++;
                    } elseif ($ans->is_correct) {
                        $secCorrect++;
                        $totalCorrectOverall++;
                        $secEarnedPoints += $pointsAwarded;
                    } else {
                        $secIncorrect++;
                        $totalIncorrectOverall++;
                        $secEarnedPoints += $pointsAwarded;
                    }
                }

                $stimulusData = null;
                $group = $q->questionGroup ?? $section->questionGroups->firstWhere('id', $q->question_group_id);
                if ($group) {
                    $stimulusData = [
                        'title' => $group->title ?? 'Wacana',
                        'type' => $group->stimulus_type ?? 'text',
                        'content' => $group->stimulus_content ?? '',
                        'rendered' => filled($group->stimulus_content) ? MarkdownRenderer::render($group->stimulus_content) : '',
                    ];
                }

                $hasOfficial = filled(trim((string) ($q->explanation ?? '')));
                $officialExplanation = $hasOfficial ? $q->explanation : '';

                // AI explanation: periksa apakah sudah pernah digenerate untuk jawaban ini
                $aiExplanationText = (string) (data_get($ans?->answer_payload, 'ai_explanation') ?: '');
                $hasAiExplanation = filled($aiExplanationText);

                $formattedStudentAnswer = $this->reviewFormatter->formatStudentAnswer($q, $ans);
                $formattedCorrectAnswer = $this->reviewFormatter->formatCorrectAnswer($q);

                $matrixRows = [];
                if (in_array($q->type, ['binary_matrix', 'boolean_matrix'], true)) {
                    $answersGiven = (array) data_get($ans?->answer_payload, 'answers', []);
                    foreach ($q->options->sortBy('order') as $opt) {
                        $given = $answersGiven[$opt->id] ?? null;
                        $expectedKey = strtolower(trim((string) ($opt->match_key ?? '')));
                        $isExpectedTrue = filled($expectedKey)
                            ? in_array($expectedKey, ['benar', 'true', '1', 'yes', 'ya'], true)
                            : (bool) $opt->is_correct;

                        $isGivenTrue = ($given === true || $given === 1 || in_array(strtolower(trim((string) $given)), ['benar', 'true', '1', 'yes', 'ya'], true));
                        $hasGiven = ($given !== null && $given !== '');

                        $matrixRows[] = [
                            'statement' => $opt->option_text ?: ($opt->label ?: "Pernyataan {$opt->order}"),
                            'student_label' => $hasGiven ? ($isGivenTrue ? 'Benar' : 'Salah') : 'Tidak dijawab',
                            'correct_label' => $isExpectedTrue ? 'Benar' : 'Salah',
                            'is_correct' => $hasGiven && ($isGivenTrue === $isExpectedTrue),
                        ];
                    }
                }

                $matchingRows = [];
                if ($q->type === 'matching') {
                    $pairsGiven = (array) data_get($ans?->answer_payload, 'pairs', []);
                    foreach ($q->options->sortBy('order') as $opt) {
                        $left = $opt->option_text ?: ($opt->label ?: "Premis {$opt->order}");
                        $rightExpected = trim((string) ($opt->match_key ?? ''));
                        $rightGiven = isset($pairsGiven[$opt->id]) ? trim((string) $pairsGiven[$opt->id]) : '';

                        $matchingRows[] = [
                            'premise' => $left,
                            'student_pair' => $rightGiven !== '' ? $rightGiven : 'Tidak dijawab',
                            'correct_pair' => $rightExpected,
                            'is_correct' => ($rightGiven !== '' && strcasecmp($rightGiven, $rightExpected) === 0),
                        ];
                    }
                }

                $orderingData = null;
                if (in_array($q->type, ['ordering', 'reorder'], true)) {
                    $optionsById = $q->options->keyBy('id');
                    $givenOrderIds = array_map('intval', (array) data_get($ans?->answer_payload, 'order', []));
                    $expectedOrder = $q->options->sortBy('order')->values();

                    $studentList = [];
                    foreach ($givenOrderIds as $oid) {
                        $opt = $optionsById->get($oid);
                        if ($opt) {
                            $studentList[] = $opt->option_text;
                        }
                    }

                    $correctList = [];
                    foreach ($expectedOrder as $opt) {
                        $correctList[] = $opt->option_text;
                    }

                    $orderingData = [
                        'student_order' => $studentList,
                        'correct_order' => $correctList,
                        'is_correct' => (bool) ($ans?->is_correct ?? false),
                    ];
                }

                // Simpan item ulasan untuk prototype-pembahasan dengan penomoran berurutan (1, 2, 3...)
                $questionReviewList[] = [
                    'id' => $q->id,
                    'answer_id' => $ans?->id,
                    'number' => $globalQuestionNumber++,
                    'section_id' => $section->id,
                    'section_number' => $secIndex + 1,
                    'section_title' => $section->title,
                    'question_group_id' => $q->question_group_id,
                    'prompt' => $q->prompt,
                    'rendered_prompt' => filled($q->prompt) ? MarkdownRenderer::render($q->prompt) : '',
                    'stimulus' => $stimulusData,
                    'explanation' => $officialExplanation,
                    'rendered_explanation' => $hasOfficial ? MarkdownRenderer::render($officialExplanation) : '',
                    'has_official_explanation' => $hasOfficial,
                    'ai_explanation' => $aiExplanationText,
                    'rendered_ai_explanation' => $hasAiExplanation ? MarkdownRenderer::render($aiExplanationText) : '',
                    'has_ai_explanation' => $hasAiExplanation,
                    'ai_model' => data_get($ans?->answer_payload, 'ai_model') ?: 'DEEPSEEK V4 Pro Reasoner',
                    'type' => $q->type,
                    'points' => (float) ($q->points ?? 1),
                    'is_essay' => $isEssay,
                    'is_essay_pending' => $isEssay && ($ans === null || $ans->points_awarded === null),
                    'essay_max_points' => $isEssay ? (float) ($q->points ?? 1) : null,
                    'is_answered' => $isAnswered,
                    'is_correct' => (bool) ($ans?->is_correct ?? false),
                    'points_awarded' => $ans?->points_awarded,
                    'answer_payload' => $ans?->answer_payload,
                    'student_text' => $isEssay ? data_get($ans?->answer_payload, 'text') : null,
                    'student_rendered_text' => ($isEssay && filled(data_get($ans?->answer_payload, 'text')))
                        ? MarkdownRenderer::render(data_get($ans?->answer_payload, 'text'), ['renderer' => ['soft_break' => "<br />\n"]])
                        : null,
                    'teacher_feedback' => data_get($ans?->answer_payload, 'teacher_feedback'),
                    'matrix_rows' => $matrixRows,
                    'matching_rows' => $matchingRows,
                    'ordering_data' => $orderingData,
                    'formatted_student_answer' => $formattedStudentAnswer,
                    'formatted_correct_answer' => $formattedCorrectAnswer,
                    'selected_option' => $formattedStudentAnswer,
                    'options' => $q->options->sortBy('order')->map(fn ($o) => [
                        'id' => $o->id,
                        'label' => $o->label,
                        'content' => $o->option_text,
                        'is_correct' => (bool) $o->is_correct,
                        'match_key' => $o->match_key,
                    ])->values()->all(),
                ];
            }

            $totalQuestionsOverall += $count;
            $totalPointsOverall += $secTotalPoints;
            $earnedPointsOverall += $secEarnedPoints;

            $sectionsData[] = [
                'id' => $section->id,
                'title' => $section->title,
                'instructions' => $section->instructions,
                'total_questions' => $count,
                'essay_count' => $secEssayCount,
                'essay_pending_count' => $secEssayPendingCount,
                'correct' => $secCorrect,
                'incorrect' => $secIncorrect,
                'unanswered' => $secUnanswered,
                'total_points' => $secTotalPoints,
                'earned_points' => round($secEarnedPoints, 1),
                'score_percentage' => $secTotalPoints > 0 ? round(($secEarnedPoints / $secTotalPoints) * 100, 1) : 0,
                'questions' => $questionReviewList,
            ];
        }

        $allQuestionsReview = collect($sectionsData)->flatMap(fn ($s) => $s['questions'])->values()->all();

        // 3. Konfigurasi KKM (Passing Grade) & Post Exam Policy
        $settings = (array) ($assessment->settings ?? []);
        $passingGrade = $settings['passing_grade'] ?? [
            'enabled' => true,
            'min_score' => 75,
            'pass_label' => 'Lulus / Tuntas',
            'fail_label' => 'Belum Tuntas (Remedial)',
        ];

        $postExamPolicy = $settings['post_exam_policy'] ?? [
            'teacher_review_required' => true,
            'show_breakdown' => true,
            'show_ranking' => false,
            'release_mode' => 'teacher_review',
        ];

        // 4. Kalkulasi Skor Akhir
        $hasEssay = $totalEssayOverall > 0;
        $isScoreReleased = (bool) data_get($session->meta, 'is_score_released', ! $hasEssay);

        // Jika score di session sudah diset, gunakan score tersebut; jika belum, gunakan earned points
        $finalEarnedPoints = $session->score !== null ? (float) $session->score : $earnedPointsOverall;
        $finalMaxPoints = $session->max_score !== null ? (float) $session->max_score : $totalPointsOverall;

        $scorePercentage = $finalMaxPoints > 0 ? round(($finalEarnedPoints / $finalMaxPoints) * 100, 1) : 0;
        $isPassed = ($passingGrade['enabled'] ?? true) ? ($scorePercentage >= ($passingGrade['min_score'] ?? 75)) : true;

        $summary = [
            'total_questions' => $totalQuestionsOverall,
            'total_correct' => $totalCorrectOverall,
            'total_incorrect' => $totalIncorrectOverall,
            'total_unanswered' => $totalUnansweredOverall,
            'total_essay' => $totalEssayOverall,
            'total_essay_pending' => $totalEssayPendingOverall,
            'total_points' => $finalMaxPoints,
            'earned_points' => round($finalEarnedPoints, 1),
            'final_score' => $scorePercentage,
            'has_essay' => $hasEssay,
            'is_score_released' => $isScoreReleased,
            'teacher_review_required' => $hasEssay && ! $isScoreReleased,
            'passing_grade' => $passingGrade,
            'is_passed' => $isPassed,
            'post_exam_policy' => $postExamPolicy,
            'duration_formatted' => $durationFormatted,
            'completed_at_formatted' => $session->completed_at ? $session->completed_at->translatedFormat('d F Y, H:i') : null,
        ];

        return view('exam.result', compact('session', 'assessment', 'sectionsData', 'summary', 'allQuestionsReview'));
    }

    /**
     * Tampilkan halaman Analisa Ujian (Exam Analytics) untuk siswa.
     */
    public function analysis(Request $request, ExamSession $session): View|RedirectResponse
    {
        $user = $request->user();

        // Autorisasi: pemilik sesi atau guru/admin/superuser
        $canAccess = ($session->user_id === $user->id) || $user->isTeacher() || $user->isAdmin() || $user->isSuperUser();
        abort_unless($canAccess, 403, 'Anda tidak berhak melihat analisa sesi ujian ini.');

        // Jika sesi belum selesai tapi waktu habis
        if (! $session->isCompleted()) {
            if ($session->isExpired()) {
                $session->forceFill([
                    'status' => 'completed',
                    'completed_at' => now(),
                    'meta' => array_merge((array) $session->meta, [
                        'finalize_reason' => 'auto_expired_on_analysis_view',
                        'finalized_at' => now()->toIso8601String(),
                    ]),
                ])->save();

                $this->gradingService->autoGradeSession($session);
            } else {
                return redirect()->route('exam.workspace', ['session' => $session->uuid]);
            }
        }

        // Pastikan seluruh butir soal objektif dinilai jika belum pernah digrade
        $needsGrading = $session->answers()
            ->whereHas('question', fn ($q) => $q->where('type', '!=', 'essay'))
            ->whereNull('points_awarded')
            ->exists();
        if ($needsGrading || $session->score === null) {
            $this->gradingService->autoGradeSession($session);
            $session->refresh();
        }

        $assessment = $session->assessment()
            ->with([
                'subject',
                'sections' => fn ($q) => $q->orderBy('order')->orderBy('id'),
                'sections.questionGroups' => fn ($q) => $q->orderBy('order')->orderBy('id'),
                'sections.questionGroups.questions.options',
                'sections.questions.options',
                'sections.questions.questionGroup',
            ])
            ->firstOrFail();

        $answers = $session->answers()->get()->keyBy('question_id');

        // Hitung durasi pengerjaan
        $durationFormatted = '-';
        $diffSeconds = 0;
        if ($session->started_at && $session->completed_at) {
            $diffSeconds = $session->started_at->diffInSeconds($session->completed_at);
            $mins = intdiv($diffSeconds, 60);
            $secs = $diffSeconds % 60;
            $durationFormatted = ($mins > 0 ? "{$mins} Menit " : '')."{$secs} Detik";
        }

        $sectionsData = [];
        $totalQuestionsOverall = 0;
        $totalCorrectOverall = 0;
        $totalIncorrectOverall = 0;
        $totalUnansweredOverall = 0;
        $totalPointsOverall = 0.0;
        $earnedPointsOverall = 0.0;
        $allQuestions = [];

        foreach ($assessment->sections as $section) {
            $allSectionQuestions = $section->questions;
            if ($section->relationLoaded('questionGroups')) {
                foreach ($section->questionGroups as $grp) {
                    if ($grp->relationLoaded('questions')) {
                        $allSectionQuestions = $allSectionQuestions->concat($grp->questions);
                    }
                }
            }

            // Urutkan soal PERSIS sesuai urutan pembuatan awal (jangan memindahkan stimulus ke depan!)
            $questions = $allSectionQuestions->unique('id')->sortBy(function ($q) use ($section) {
                $grp = $q->questionGroup ?? $section->questionGroups->firstWhere('id', $q->question_group_id);
                if ($q->question_group_id && $grp) {
                    return sprintf('%06d_%06d_%09d', (int) ($grp->order ?? 1), (int) ($q->order ?? 1), (int) $q->id);
                }

                return sprintf('%06d_000000_%09d', (int) ($q->order ?? 1), (int) $q->id);
            })->values();

            $count = $questions->count();
            $secCorrect = 0;
            $secIncorrect = 0;
            $secUnanswered = 0;
            $secTotalPoints = (float) $questions->sum(fn ($q) => (float) ($q->points ?? 1));
            $secEarnedPoints = 0.0;

            $secQuestionsList = [];

            foreach ($questions as $q) {
                $ans = $answers->get($q->id);
                $isEssay = $q->type === 'essay';
                $pointsAwarded = $ans ? (float) ($ans->points_awarded ?? 0) : 0.0;
                $isAnswered = $ans && $ans->isAnswered();
                $isCorrect = (bool) ($ans?->is_correct ?? false);

                if ($isEssay) {
                    $isGradedByTeacher = $ans && $ans->points_awarded !== null;
                    if ($isGradedByTeacher) {
                        $secEarnedPoints += $pointsAwarded;
                        if ($pointsAwarded > 0) {
                            $secCorrect++;
                            $totalCorrectOverall++;
                            $isCorrect = true;
                        } else {
                            $secIncorrect++;
                            $totalIncorrectOverall++;
                        }
                    }
                    if (! $isAnswered) {
                        $secUnanswered++;
                        $totalUnansweredOverall++;
                    }
                } else {
                    if (! $isAnswered) {
                        $secUnanswered++;
                        $totalUnansweredOverall++;
                    } elseif ($isCorrect) {
                        $secCorrect++;
                        $totalCorrectOverall++;
                        $secEarnedPoints += $pointsAwarded;
                    } else {
                        $secIncorrect++;
                        $totalIncorrectOverall++;
                        $secEarnedPoints += $pointsAwarded;
                    }
                }

                $secQuestionsList[] = [
                    'type' => $q->type,
                    'is_answered' => $isAnswered,
                    'is_correct' => $isCorrect,
                ];

                $allQuestions[] = [
                    'id' => $q->id,
                    'prompt' => $q->prompt,
                    'type' => $q->type,
                    'section_title' => $section->title,
                    'points' => (float) ($q->points ?? 1),
                    'is_answered' => $isAnswered,
                    'is_correct' => $isCorrect,
                ];
            }

            $totalQuestionsOverall += $count;
            $totalPointsOverall += $secTotalPoints;
            $earnedPointsOverall += $secEarnedPoints;

            $secAccuracy = $count > 0 ? round(($secCorrect / $count) * 100, 1) : 0;
            $secStatus = $secAccuracy >= 80 ? 'Kuat' : ($secAccuracy >= 60 ? 'Cukup' : 'Perlu Latihan');

            // Breakdown performa tipe soal di dalam section ini
            $localTypeNames = [
                'mcq_single' => 'PG Tunggal',
                'mcq_multiple' => 'PG Kompleks',
                'mcq_weighted' => 'PG Berbobot',
                'short_answer' => 'Isian Singkat',
                'binary_matrix' => 'Benar / Salah',
                'boolean_matrix' => 'Benar / Salah',
                'matching' => 'Menjodohkan',
                'ordering' => 'Mengurutkan',
                'reorder' => 'Mengurutkan',
                'essay' => 'Esai / Uraian',
            ];

            $secTypeBreakdown = [];
            $secGrouped = collect($secQuestionsList)->groupBy('type');
            foreach ($secGrouped as $t => $items) {
                $tCount = $items->count();
                $tCorr = $items->where('is_correct', true)->count();
                $tIncorr = $items->where('is_correct', false)->where('is_answered', true)->count();
                $tUnans = $items->where('is_answered', false)->count();
                $tAcc = $tCount > 0 ? round(($tCorr / $tCount) * 100) : 0;

                $secTypeBreakdown[] = [
                    'type' => $t,
                    'label' => $localTypeNames[$t] ?? ucfirst(str_replace('_', ' ', $t)),
                    'total' => $tCount,
                    'correct' => $tCorr,
                    'incorrect' => $tIncorr,
                    'unanswered' => $tUnans,
                    'accuracy' => $tAcc,
                ];
            }

            // Rekomendasi & Tindak Lanjut Spesifik Section
            $weakTypes = collect($secTypeBreakdown)->where('accuracy', '<', 70)->pluck('label')->all();
            if ($secAccuracy < 60) {
                $secPriority = 'Tinggi';
                if (! empty($weakTypes)) {
                    $secAdvice = 'Perlu penguatan konsep dasar. Terdeteksi kendala utama pada soal '.implode(', ', $weakTypes).'. Pelajari kembali teori pokok materi ini dan latih pemahaman wacana.';
                } else {
                    $secAdvice = 'Penguasaan materi masih di bawah 60%. Prioritaskan membaca kembali rangkuman materi dan kerjakan latihan soal mandiri secara bertahap.';
                }
            } elseif ($secAccuracy < 80) {
                $secPriority = 'Sedang';
                if (! empty($weakTypes)) {
                    $secAdvice = 'Pemahaman umum sudah baik, namun masih kurang teliti pada soal '.implode(', ', $weakTypes).'. Cermati kembali kata kunci dan teliti jebakan stimulus.';
                } else {
                    $secAdvice = 'Akurasi sudah cukup baik. Cek kembali pembahasan butir soal yang salah untuk memantapkan pemahaman konsep.';
                }
            } else {
                $secPriority = 'Pemantapan';
                $secAdvice = 'Pemahaman materi sangat matang! Pertahankan akurasi dan ketelitian pengerjaan untuk asesmen berikutnya.';
            }

            $sectionsData[] = [
                'id' => $section->id,
                'title' => $section->title,
                'instructions' => $section->instructions,
                'total_questions' => $count,
                'correct' => $secCorrect,
                'incorrect' => $secIncorrect,
                'unanswered' => $secUnanswered,
                'total_points' => $secTotalPoints,
                'earned_points' => round($secEarnedPoints, 1),
                'accuracy' => $secAccuracy,
                'status' => $secStatus,
                'type_breakdown' => $secTypeBreakdown,
                'priority' => $secPriority,
                'advice' => $secAdvice,
            ];
        }

        // Passing Grade
        $settings = (array) ($assessment->settings ?? []);
        $passingGrade = $settings['passing_grade'] ?? [
            'enabled' => true,
            'min_score' => 75,
            'pass_label' => 'Lulus / Tuntas',
            'fail_label' => 'Belum Tuntas (Remedial)',
        ];

        $finalEarnedPoints = $session->score !== null ? (float) $session->score : $earnedPointsOverall;
        $finalMaxPoints = $session->max_score !== null ? (float) $session->max_score : $totalPointsOverall;
        $scorePercentage = $finalMaxPoints > 0 ? round(($finalEarnedPoints / $finalMaxPoints) * 100, 1) : 0;
        $isPassed = ($passingGrade['enabled'] ?? true) ? ($scorePercentage >= ($passingGrade['min_score'] ?? 75)) : true;

        $answeredCount = $totalCorrectOverall + $totalIncorrectOverall;
        $overallAccuracy = $answeredCount > 0 ? round(($totalCorrectOverall / $answeredCount) * 100, 1) : 0;
        $completionRate = $totalQuestionsOverall > 0 ? round(($answeredCount / $totalQuestionsOverall) * 100, 1) : 0;
        $avgSecondsPerQ = $totalQuestionsOverall > 0 ? round($diffSeconds / $totalQuestionsOverall) : 0;

        // Question Types Distribution
        $typeNames = [
            'mcq_single' => 'Pilihan Ganda Tunggal',
            'mcq_multiple' => 'Pilihan Ganda Kompleks',
            'mcq_weighted' => 'Pilihan Ganda Berbobot',
            'short_answer' => 'Isian Singkat',
            'binary_matrix' => 'Benar / Salah (Matriks)',
            'matching' => 'Menjodohkan',
            'ordering' => 'Mengurutkan Urutan',
            'essay' => 'Esai / Uraian Bebas',
        ];

        $typeGroups = collect($allQuestions)->groupBy('type');
        $questionTypesAnalysis = [];
        foreach ($typeGroups as $type => $qItems) {
            $tCount = $qItems->count();
            $tCorrect = $qItems->where('is_correct', true)->count();
            $tIncorrect = $qItems->where('is_correct', false)->where('is_answered', true)->count();
            $tUnanswered = $qItems->where('is_answered', false)->count();
            $tAccuracy = $tCount > 0 ? round(($tCorrect / $tCount) * 100, 1) : 0;

            $questionTypesAnalysis[] = [
                'type' => $type,
                'name' => $typeNames[$type] ?? ucfirst(str_replace('_', ' ', $type)),
                'total' => $tCount,
                'correct' => $tCorrect,
                'incorrect' => $tIncorrect,
                'unanswered' => $tUnanswered,
                'accuracy' => $tAccuracy,
                'status' => $tAccuracy >= 80 ? 'Kuat' : ($tAccuracy >= 60 ? 'Cukup' : 'Perlu Latihan'),
            ];
        }

        // Recommendations
        $recommendations = [];
        foreach ($sectionsData as $sec) {
            if ($sec['accuracy'] < 75 || $sec['incorrect'] > 0) {
                $priority = $sec['accuracy'] < 60 ? 'Tinggi' : 'Sedang';
                $recommendations[] = [
                    'topic' => $sec['title'],
                    'accuracy' => $sec['accuracy'],
                    'total_missed' => $sec['incorrect'] + $sec['unanswered'],
                    'priority' => $priority,
                    'advice' => $sec['accuracy'] < 60
                        ? 'Tingkat penguasaan masih di bawah 60%. Prioritaskan membaca kembali rangkuman materi dan kerjakan latihan soal mandiri secara bertahap.'
                        : 'Akurasi sudah cukup baik namun masih ada beberapa kesalahan konsep. Cek kembali pembahasan butir soal yang salah untuk memantapkan pemahaman.',
                ];
            }
        }

        // Sort recommendations by priority (Tinggi first)
        usort($recommendations, fn ($a, $b) => ($a['priority'] === 'Tinggi' ? 0 : 1) <=> ($b['priority'] === 'Tinggi' ? 0 : 1));

        if (empty($recommendations)) {
            $recommendations[] = [
                'topic' => 'Penguasaan Menyeluruh',
                'accuracy' => 100,
                'total_missed' => 0,
                'priority' => 'Sempurna',
                'advice' => 'Luar biasa! Seluruh materi dan butir soal berhasil dijawab dengan sangat baik. Pertahankan pencapaian ini untuk asesmen berikutnya.',
            ];
        }

        $summary = [
            'final_score' => $scorePercentage,
            'earned_points' => round($finalEarnedPoints, 1),
            'total_points' => round($finalMaxPoints, 1),
            'total_questions' => $totalQuestionsOverall,
            'total_correct' => $totalCorrectOverall,
            'total_incorrect' => $totalIncorrectOverall,
            'total_unanswered' => $totalUnansweredOverall,
            'overall_accuracy' => $overallAccuracy,
            'completion_rate' => $completionRate,
            'duration_formatted' => $durationFormatted,
            'avg_seconds_per_q' => $avgSecondsPerQ,
            'is_passed' => $isPassed,
            'passing_grade' => $passingGrade,
            'completed_at_formatted' => $session->completed_at ? $session->completed_at->translatedFormat('d F Y, H:i') : null,
        ];

        return view('exam.analysis', compact(
            'session',
            'assessment',
            'summary',
            'sectionsData',
            'questionTypesAnalysis',
            'recommendations',
            'allQuestions'
        ));
    }

    /**
     * Resolusi label jawaban siswa untuk review.
     */
    private function resolveAnswerLabel(Question $question, $answer): ?string
    {
        $payload = $answer->answer_payload ?? [];

        if (isset($payload['option_id'])) {
            $opt = $question->options->firstWhere('id', $payload['option_id']);

            return $opt ? ($opt->label ? "{$opt->label}. " : '').$opt->option_text : null;
        }

        if (isset($payload['option_ids']) && is_array($payload['option_ids'])) {
            $opts = $question->options->whereIn('id', $payload['option_ids']);

            return $opts->map(fn ($o) => ($o->label ? "{$o->label}. " : '').$o->option_text)->implode(', ');
        }

        if (isset($payload['value'])) {
            return (string) $payload['value'];
        }

        return null;
    }

    /**
     * Generate Pembahasan AI interaktif untuk siswa (on-demand saat tombol AI diklik).
     */
    public function generateAiExplanation(Request $request, ExamSession $session, Question $question): JsonResponse
    {
        $user = $request->user();
        $canAccess = ($session->user_id === $user->id) || $user->isTeacher() || $user->isAdmin() || $user->isSuperUser();
        abort_unless($canAccess, 403, 'Akses tidak diizinkan.');

        $answer = ExamAnswer::where('exam_session_id', $session->id)
            ->where('question_id', $question->id)
            ->first();

        /** @var AiExplanationService $aiService */
        $aiService = app(AiExplanationService::class);
        $modelName = $aiService->getModelName();

        // Jika sudah pernah digenerate, langsung kembalikan
        $existingAi = (string) (data_get($answer?->answer_payload, 'ai_explanation') ?: '');
        if (filled($existingAi)) {
            $savedModel = data_get($answer?->answer_payload, 'ai_model') ?: $modelName;

            return response()->json([
                'ok' => true,
                'success' => true,
                'content' => $existingAi,
                'ai_explanation' => $existingAi,
                'ai_model' => $savedModel,
                'model' => $savedModel,
                'rendered' => MarkdownRenderer::render($existingAi),
                'rendered_ai_explanation' => MarkdownRenderer::render($existingAi),
            ]);
        }

        $explanationText = $aiService->generateForStudent($question);

        if ($answer) {
            $payload = (array) ($answer->answer_payload ?? []);
            $payload['ai_explanation'] = $explanationText;
            $payload['ai_model'] = $modelName;
            $payload['ai_explanation_at'] = now()->toIso8601String();
            $answer->answer_payload = $payload;
            $answer->save();
        }

        return response()->json([
            'ok' => true,
            'success' => true,
            'content' => $explanationText,
            'ai_explanation' => $explanationText,
            'ai_model' => $modelName,
            'model' => $modelName,
            'rendered' => MarkdownRenderer::render($explanationText),
            'rendered_ai_explanation' => MarkdownRenderer::render($explanationText),
        ]);
    }
}
