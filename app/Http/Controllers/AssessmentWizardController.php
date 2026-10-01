<?php

namespace App\Http\Controllers;

use App\Jobs\GenerateAssessmentExplanationsJob;
use App\Models\Assessment;
use App\Models\AssessmentSection;
use App\Models\DichotomyPreset;
use App\Models\ExamSession;
use App\Models\GradeLevel;
use App\Models\Question;
use App\Models\QuestionGroup;
use App\Models\QuestionOption;
use App\Models\Subject;
use App\Models\Tenant;
use App\Services\WordQuestionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AssessmentWizardController extends Controller
{
    /**
     * Display a listing of assessments.
     */
    public function index(Request $request): View
    {
        $query = Assessment::with(['subject', 'creator'])
            ->withCount(['sections', 'questions']);

        $user = Auth::user();
        $isStaff = $user && ($user->isTeacher() || $user->isAdmin() || $user->isSuperUser());
        $currentTenant = $user?->currentTenant;

        if ($user) {
            $query->with(['accesses' => fn ($q) => $q->where('user_id', $user->id)]);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%");
        }

        if ($request->filled('subject_id')) {
            $query->where('subject_id', $request->subject_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        } elseif (! $isStaff) {
            $query->where('status', 'published');
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('grade_level')) {
            $grade = $request->grade_level;
            $query->where(function ($q) use ($grade) {
                $q->where('grade_level', $grade)
                    ->orWhereRaw('LOWER(grade_level) = ?', [strtolower($grade)]);
            });
        }

        if ($user && ! $isStaff) {
            $userId = $user->id;
            $query->leftJoin('user_assessment_accesses', function ($join) use ($userId) {
                $join->on('user_assessment_accesses.assessment_id', '=', 'assessments.id')
                    ->where('user_assessment_accesses.user_id', '=', $userId);
            })
                ->select('assessments.*')
                ->orderByRaw('CASE WHEN user_assessment_accesses.id IS NOT NULL THEN 0 ELSE 1 END ASC')
                ->orderByRaw('CASE WHEN user_assessment_accesses.expires_at IS NULL THEN 1 ELSE 0 END ASC')
                ->orderBy('user_assessment_accesses.expires_at', 'desc')
                ->orderByRaw('(COALESCE(user_assessment_accesses.quota_attempts, 0) - COALESCE(user_assessment_accesses.attempts_used, 0)) DESC')
                ->orderBy('assessments.id', 'desc');
        } else {
            $query->latest();
        }

        $assessments = $query->paginate(10)->withQueryString();
        $subjects = Subject::orderBy('name')->get();
        $gradeLevels = GradeLevel::orderBy('order')->get();

        $pendingGradingPerAssessment = [];
        if ($isStaff) {
            $assessmentIds = $assessments->pluck('id')->all();
            if (! empty($assessmentIds)) {
                $tenantId = $user->current_tenant_id ?? $currentTenant?->id ?? $user->tenants()->first()?->id;

                $pQuery = ExamSession::where('status', 'completed')
                    ->whereIn('assessment_id', $assessmentIds)
                    ->whereHas('answers', function ($q) {
                        $q->whereNull('points_awarded')
                            ->whereHas('question', function ($q2) {
                                $q2->where('type', 'essay');
                            });
                    });

                if (! $user->isSuperUser()) {
                    if ($tenantId) {
                        $pQuery->where(function ($q) use ($tenantId) {
                            $q->where('tenant_id', $tenantId)
                                ->orWhereHas('user.tenants', fn ($t) => $t->where('tenants.id', $tenantId));
                        });
                    } else {
                        $pQuery->whereRaw('1 = 0');
                    }
                }

                $pendingGradingPerAssessment = $pQuery->selectRaw('assessment_id, count(*) as total')
                    ->groupBy('assessment_id')
                    ->pluck('total', 'assessment_id')
                    ->all();
            }
        }

        return view('assessments.index', compact('assessments', 'subjects', 'gradeLevels', 'pendingGradingPerAssessment'));
    }

    /**
     * Show the 8-Step Wizard form for creating an assessment.
     */
    public function create(): View|RedirectResponse
    {
        $user = Auth::user();
        $currentTenant = $user?->currentTenant;
        if ($currentTenant && ! $user->isSuperUser() && ! $currentTenant->canCreateAssessments()) {
            return redirect()->route('assessments.index')->with('error', 'Institusi Anda berada pada paket STARTER. Guru pada paket ini berfokus sebagai Pengawas Ujian kurasi ADZKIA. Upgrade ke paket PRO untuk membuat asesmen dan bank soal mandiri.');
        }

        $subjects = Subject::orderBy('name')->get();

        // Preset templates for Step 1
        $assessmentTypes = [
            [
                'id' => 'ph',
                'name' => 'Penilaian Harian (PH)',
                'desc' => 'Ujian rutin per topik/bab materi untuk evaluasi formatif harian.',
                'badge' => 'Formatif',
                'icon' => 'file-text',
            ],
            [
                'id' => 'pts',
                'name' => 'Penilaian Tengah Semester (PTS)',
                'desc' => 'Evaluasi capaian belajar paruh semester dengan komposisi soal terpadu.',
                'badge' => 'Sumatif',
                'icon' => 'timer',
            ],
            [
                'id' => 'pas',
                'name' => 'Penilaian Akhir Semester (PAS / PAT)',
                'desc' => 'Asesmen komprehensif semester ganjil/genap seluruh pokok bahasan.',
                'badge' => 'Sumatif',
                'icon' => 'badge',
            ],
            [
                'id' => 'tka',
                'name' => 'TKA (Tes Kemampuan Akademik)',
                'desc' => 'Ujian TKA dengan standar UTBK, menguji pemahaman materi akademik secara mendalam.',
                'badge' => 'Seleksi',
                'icon' => 'bar-chart',
            ],
            [
                'id' => 'utbk',
                'name' => 'UTBK SNBT',
                'desc' => 'Ujian TPS dan Literasi berbasis bobot butir Item Response Theory (IRT).',
                'badge' => 'Seleksi',
                'icon' => 'bar-chart',
            ],
            [
                'id' => 'toeic',
                'name' => 'TOEIC',
                'desc' => 'Test of English for International Communication standar industri global.',
                'badge' => 'Standar',
                'icon' => 'backpack',
            ],
            [
                'id' => 'toefl',
                'name' => 'TOEFL',
                'desc' => 'Listening, Structure & Reading dengan konversi skala nilai standar 310-677.',
                'badge' => 'Standar',
                'icon' => 'backpack',
            ],
            [
                'id' => 'ielts',
                'name' => 'IELTS',
                'desc' => 'International English Language Testing System (coming soon).',
                'badge' => 'Standar',
                'icon' => 'backpack',
            ],
            [
                'id' => 'custom',
                'name' => 'Ujian Kustom Fleksibel',
                'desc' => 'Struktur bebas dengan konfigurasi pembobotan dan tipe soal mandiri.',
                'badge' => 'Kustom',
                'icon' => 'gear',
            ],
        ];

        // Question types for Step 4
        $questionTypes = [
            ['id' => 'mcq_single', 'name' => 'Pilihan Ganda (Single Choice)', 'icon' => 'check-circled'],
            ['id' => 'mcq_multiple', 'name' => 'Pilihan Ganda Multiple Answer (Checkbox)', 'icon' => 'checkbox'],
            ['id' => 'mcq_weighted', 'name' => 'Pilihan Ganda Berbobot (Skala Likert / TKP)', 'icon' => 'slider'],
            ['id' => 'binary_matrix', 'name' => 'Tabel Dikotomi / Benar-Salah Fleksibel', 'icon' => 'table'],
            ['id' => 'matching', 'name' => 'Menjodohkan (Matching Pairs)', 'icon' => 'link-2'],
            ['id' => 'ordering', 'name' => 'Mengurutkan (Sequencing)', 'icon' => 'rows'],
            ['id' => 'short_answer', 'name' => 'Isian Singkat / Numerik', 'icon' => 'text'],
            ['id' => 'essay', 'name' => 'Essay / Uraian Bebas', 'icon' => 'file-text'],
        ];

        // Presets for Binary Matrix from Database
        $binaryMatrixPresets = DichotomyPreset::where('is_active', true)->orderBy('order')->get()->map(function ($preset) {
            return [
                'label_a' => $preset->label_a,
                'label_b' => $preset->label_b,
            ];
        })->toArray();

        // Grade Levels grouped by group from Database
        $gradeLevels = GradeLevel::where('is_active', true)->orderBy('order')->get()->groupBy('group');

        return view('assessments.wizard', compact('subjects', 'assessmentTypes', 'questionTypes', 'binaryMatrixPresets', 'gradeLevels'));
    }

    /**
     * Store the complete assessment built from the 8-step wizard.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $user = Auth::user();
        $currentTenant = $user?->currentTenant;
        if ($currentTenant && ! $user->isSuperUser() && ! $currentTenant->canCreateAssessments()) {
            abort(403, 'Akses ditolak: Pembuatan asesmen mandiri hanya tersedia untuk paket PRO atau ENTERPRISE.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'type' => 'required|string|max:50',
            'grade_level' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'duration_minutes' => 'nullable|integer|min:1',
            'scoring_type' => 'nullable|string|max:50',
            'status' => 'nullable|string|in:draft,published,archived',
            'settings' => 'nullable|array',
            'price_type' => 'nullable|string|in:free,paid',
            'price' => 'nullable|numeric|min:0',
            'max_attempts' => 'nullable|integer|min:1',
            'access_validity_days' => 'nullable|integer|min:1',
            'packages' => 'nullable|array',
            'packages.*.name' => 'required|string|max:100',
            'packages.*.price' => 'required|numeric|min:0',
            'packages.*.attempts' => 'required|integer|min:1',
            'packages.*.validity_days' => 'nullable|integer|min:1',
            'sections' => 'required|array|min:1',
            'sections.*.title' => 'required|string|max:255',
            'sections.*.instructions' => 'nullable|string',
            'sections.*.order' => 'nullable|integer',
            'sections.*.duration_minutes' => 'nullable|integer|min:1',
            'sections.*.items' => 'nullable|array',
        ]);

        $tenantId = Auth::user()->current_tenant_id ?? Auth::user()->tenants()->first()?->id;

        $assessment = DB::transaction(function () use ($validated, $tenantId) {
            $revenueSharePlatform = 100;
            $revenueShareTenant = 0;

            $priceType = $validated['price_type'] ?? 'free';
            $price = $validated['price'] ?? 0;

            if ($priceType === 'paid') {
                $tenant = $tenantId ? Tenant::find($tenantId) : null;
                $revenueSharePlatform = $tenant ? $tenant->getRevenueSharePlatformPct() : 50;
                $revenueShareTenant = $tenant ? $tenant->getRevenueShareTenantPct() : 50;

                if (! empty($validated['packages'])) {
                    $minPrice = collect($validated['packages'])->min('price');
                    if ($minPrice !== null && (float) $price <= 0) {
                        $price = (float) $minPrice;
                    }
                }
            }

            // 1. Create Assessment
            $assessment = Assessment::create([
                'tenant_id' => $tenantId,
                'subject_id' => $validated['subject_id'],
                'created_by' => Auth::id(),
                'title' => $validated['title'],
                'type' => $validated['type'],
                'grade_level' => $validated['grade_level'] ?? null,
                'description' => $validated['description'] ?? null,
                'duration_minutes' => $validated['duration_minutes'] ?? 90,
                'scoring_type' => $validated['scoring_type'] ?? 'standard',
                'status' => $validated['status'] ?? 'draft',
                'settings' => $validated['settings'] ?? [],
                'price_type' => $priceType,
                'price' => $price,
                'max_attempts' => ! empty($validated['max_attempts']) ? (int) $validated['max_attempts'] : null,
                'access_validity_days' => ! empty($validated['access_validity_days']) ? (int) $validated['access_validity_days'] : 35,
                'revenue_share_tenant_pct' => $revenueShareTenant,
                'revenue_share_platform_pct' => $revenueSharePlatform,
                'is_mandatory' => true,
                'is_global' => true,
            ]);

            // Create assessment packages if paid
            if ($priceType === 'paid' && ! empty($validated['packages'])) {
                foreach ($validated['packages'] as $pkgIdx => $pkgData) {
                    $assessment->packages()->create([
                        'name' => $pkgData['name'],
                        'price' => (float) $pkgData['price'],
                        'attempts' => (int) $pkgData['attempts'],
                        'validity_days' => ! empty($pkgData['validity_days']) ? (int) $pkgData['validity_days'] : 35,
                        'is_active' => true,
                        'sort_order' => $pkgIdx + 1,
                    ]);
                }
            }

            // 2. Iterate Sections
            foreach ($validated['sections'] as $sIndex => $secData) {
                $section = AssessmentSection::create([
                    'assessment_id' => $assessment->id,
                    'title' => $secData['title'],
                    'instructions' => $secData['instructions'] ?? null,
                    'order' => $secData['order'] ?? ($sIndex + 1),
                    'duration_minutes' => ! empty($secData['duration_minutes']) ? (int) $secData['duration_minutes'] : null,
                ]);

                if (! empty($secData['items']) && is_array($secData['items'])) {
                    foreach ($secData['items'] as $itemIndex => $item) {
                        // Case A: Item is QuestionGroup (Stimulus / Narasi Berseri)
                        if (! empty($item['is_group']) && $item['is_group']) {
                            $group = QuestionGroup::create([
                                'assessment_section_id' => $section->id,
                                'title' => $item['title'] ?? 'Stimulus Narasi',
                                'stimulus_type' => $item['stimulus_type'] ?? 'text',
                                'stimulus_content' => $item['stimulus_content'] ?? '',
                                'order' => $itemIndex + 1,
                            ]);

                            if (! empty($item['questions']) && is_array($item['questions'])) {
                                foreach ($item['questions'] as $qIndex => $qData) {
                                    $this->createQuestionRecord($section->id, $group->id, $qData, $qIndex + 1);
                                }
                            }
                        } else {
                            // Case B: Item is a Standalone Question (Soal Tunggal)
                            $this->createQuestionRecord($section->id, null, $item, $itemIndex + 1);
                        }
                    }
                }
            }

            return $assessment;
        });

        // Trigger AI Explanation generation automatically when assessment is created
        if (config('services.deepseek.auto_on_create', true)) {
            GenerateAssessmentExplanationsJob::dispatch($assessment->id)
                ->onQueue(config('services.deepseek.queue', 'default'));
        }

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => "Assessment {$assessment->title} berhasil disimpan!",
                'assessment_id' => $assessment->id,
                'redirect_url' => route('assessments.show', $assessment),
            ]);
        }

        return redirect()->route('assessments.show', $assessment)
            ->with('success', "Assessment {$assessment->title} berhasil dibuat dan disimpan.");
    }

    /**
     * Helper to create Question and QuestionOptions records.
     */
    private function createQuestionRecord(int $sectionId, ?int $groupId, array $qData, int $order): Question
    {
        $question = Question::create([
            'assessment_section_id' => $sectionId,
            'question_group_id' => $groupId,
            'type' => $qData['type'] ?? 'mcq_single',
            'prompt' => $qData['prompt'] ?? '',
            'explanation' => $qData['explanation'] ?? null,
            'points' => $qData['points'] ?? 1.00,
            'settings' => $qData['settings'] ?? null,
            'order' => $order,
        ]);

        if (! empty($qData['options']) && is_array($qData['options'])) {
            foreach ($qData['options'] as $optIndex => $optData) {
                QuestionOption::create([
                    'question_id' => $question->id,
                    'label' => $optData['label'] ?? null,
                    'option_text' => $optData['option_text'] ?? '',
                    'is_correct' => (bool) ($optData['is_correct'] ?? false),
                    'score' => $optData['score'] ?? 0.00,
                    'match_key' => $optData['match_key'] ?? null,
                    'order' => $optIndex + 1,
                ]);
            }
        }

        return $question;
    }

    /**
     * Display the specified assessment details.
     */
    public function show(Assessment $assessment): View
    {
        $assessment->load([
            'subject',
            'creator',
            'sections.questionGroups.questions.options',
            'sections.questions' => fn ($q) => $q->whereNull('question_group_id')->with('options'),
        ]);

        // Leaderboard lintas tenant: diaktifkan jika asesmen sudah dikerjakan minimal 10 kali
        $completedSessionsQuery = ExamSession::query()
            ->where('assessment_id', $assessment->id)
            ->where('status', 'completed')
            ->whereNotNull('score')
            ->with(['user', 'tenant'])
            ->orderByDesc('score')
            ->orderBy('completed_at');

        $totalCompletedCount = (clone $completedSessionsQuery)->count();
        $isLeaderboardActive = $totalCompletedCount >= 10;

        $top10Sessions = collect();
        $remainingSessions = collect();

        if ($isLeaderboardActive) {
            $top10Sessions = (clone $completedSessionsQuery)->limit(10)->get();
            $remainingSessions = (clone $completedSessionsQuery)->skip(10)->take(100)->get();
        }

        return view('assessments.show', compact(
            'assessment',
            'isLeaderboardActive',
            'totalCompletedCount',
            'top10Sessions',
            'remainingSessions'
        ));
    }

    /**
     * Download sample Microsoft Word (.docx) question template.
     */
    public function downloadTemplate(WordQuestionService $service): BinaryFileResponse
    {
        $tmp = tempnam(sys_get_temp_dir(), 'docx_tpl_');
        $filePath = $tmp.'.docx';
        @unlink($tmp);

        $service->generateTemplate($filePath);

        return response()->download($filePath, 'Template_Soal_CBT_ADZKIA.docx', [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ])->deleteFileAfterSend(true);
    }

    /**
     * Import questions from uploaded Microsoft Word (.docx) document.
     */
    public function importWord(Request $request, WordQuestionService $service): JsonResponse
    {
        $request->validate([
            'word_file' => 'required|file|max:10240',
        ]);

        try {
            $file = $request->file('word_file');
            $items = $service->parseDocx($file->getRealPath());

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil mengimpor '.count($items).' butir soal/stimulus dari dokumen Word.',
                'items' => $items,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal membaca dokumen Word: '.$e->getMessage(),
            ], 422);
        }
    }

    /**
     * Display the post-exam completion and result simulation view.
     */
    public function resultPreview(Assessment $assessment): View
    {
        $assessment->load([
            'subject',
            'creator',
            'sections.questionGroups.questions',
            'sections.questions',
        ]);

        $settings = $assessment->settings ?? [];
        $passingGradeSettings = $settings['passing_grade'] ?? [
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

        $hasEssayOverall = false;
        $sectionsData = [];
        $totalQuestionsOverall = 0;
        $totalCorrectOverall = 0;
        $totalIncorrectOverall = 0;
        $totalUnansweredOverall = 0;
        $totalPointsOverall = 0.0;
        $earnedPointsOverall = 0.0;

        foreach ($assessment->sections as $section) {
            $questions = collect();
            foreach ($section->questions as $q) {
                $questions->push($q);
            }
            foreach ($section->questionGroups as $grp) {
                foreach ($grp->questions as $gq) {
                    $questions->push($gq);
                }
            }

            $count = $questions->count();
            $essayCount = $questions->where('type', 'essay')->count();
            if ($essayCount > 0) {
                $hasEssayOverall = true;
            }

            // Realistic simulation numbers for preview:
            $objectiveCount = $count - $essayCount;
            $correct = $objectiveCount > 0 ? (int) round($objectiveCount * 0.75) : 0;
            $incorrect = $objectiveCount > 0 ? (int) round($objectiveCount * 0.15) : 0;
            $unanswered = max(0, $objectiveCount - $correct - $incorrect);

            $sectionPoints = (float) $questions->sum('points');
            $earnedPoints = $objectiveCount > 0 && $count > 0 ? ($sectionPoints * ($correct / $count)) : 0;

            $totalQuestionsOverall += $count;
            $totalCorrectOverall += $correct;
            $totalIncorrectOverall += $incorrect;
            $totalUnansweredOverall += $unanswered;
            $totalPointsOverall += $sectionPoints;
            $earnedPointsOverall += $earnedPoints;

            $sectionsData[] = [
                'id' => $section->id,
                'title' => $section->title,
                'instructions' => $section->instructions,
                'total_questions' => $count,
                'objective_count' => $objectiveCount,
                'essay_count' => $essayCount,
                'correct' => $correct,
                'incorrect' => $incorrect,
                'unanswered' => $unanswered,
                'total_points' => $sectionPoints,
                'earned_points' => round($earnedPoints, 1),
                'score_percentage' => $sectionPoints > 0 ? round(($earnedPoints / $sectionPoints) * 100, 1) : 0,
            ];
        }

        // Calculate final score percentage
        $finalScore = $totalPointsOverall > 0 ? round(($earnedPointsOverall / $totalPointsOverall) * 100, 1) : 0;
        $isPassed = ($passingGradeSettings['enabled'] ?? true) ? ($finalScore >= ($passingGradeSettings['min_score'] ?? 75)) : true;

        $summary = [
            'total_questions' => $totalQuestionsOverall,
            'total_correct' => $totalCorrectOverall,
            'total_incorrect' => $totalIncorrectOverall,
            'total_unanswered' => $totalUnansweredOverall,
            'total_points' => $totalPointsOverall,
            'earned_points' => round($earnedPointsOverall, 1),
            'final_score' => $finalScore,
            'has_essay' => $hasEssayOverall,
            'teacher_review_required' => $hasEssayOverall || ($postExamPolicy['teacher_review_required'] ?? true),
            'passing_grade' => $passingGradeSettings,
            'is_passed' => $isPassed,
            'post_exam_policy' => $postExamPolicy,
            'ranking' => 3,
            'total_participants' => 45,
            'percentile' => 93.3,
        ];

        return view('assessments.result', compact('assessment', 'sectionsData', 'summary'));
    }

    /**
     * Remove the specified assessment from storage.
     */
    public function destroy(Assessment $assessment): RedirectResponse
    {
        $title = $assessment->title;
        $assessment->delete();

        return redirect()->route('assessments.index')
            ->with('success', "Assessment {$title} berhasil dihapus.");
    }

    /**
     * Toggle status wajib tayang nasional (Hak Prerogatif Owner).
     */
    public function toggleMandatory(Request $request, Assessment $assessment): RedirectResponse
    {
        if (! Auth::user()->isSuperUser()) {
            abort(403, 'Hanya Owner ADZKIA yang memiliki hak prerogatif menetapkan asesmen wajib tayang.');
        }

        $newStatus = $request->has('is_mandatory')
            ? (bool) $request->input('is_mandatory')
            : ! $assessment->is_mandatory;

        $assessment->update([
            'is_mandatory' => $newStatus,
            'is_global' => true,
        ]);

        $statusMsg = $newStatus
            ? "Asesmen '{$assessment->title}' telah ditetapkan sebagai WAJIB TAYANG NASIONAL. Seluruh tenant dipaksa menayangkan ujian ini."
            : "Asesmen '{$assessment->title}' kini berstatus PILIHAN. Tenant Enterprise bebas mengaktifkan atau menonaktifkannya.";

        return redirect()->back()->with('success', $statusMsg);
    }

    /**
     * Upload assessment media (image, audio, video) to Cloudflare R2 bucket in folder 'asesmen'.
     */
    public function uploadMedia(Request $request): JsonResponse
    {
        $request->validate([
            'media' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,webp,mp3,wav,ogg,m4a,aac,mp4,webm,ogv,mov|max:51200',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,webp,mp3,wav,ogg,m4a,aac,mp4,webm,ogv,mov|max:51200',
            'file' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,webp,mp3,wav,ogg,m4a,aac,mp4,webm,ogv,mov|max:51200',
        ]);

        $file = $request->file('media') ?? $request->file('image') ?? $request->file('file');
        if (! $file) {
            return response()->json([
                'success' => false,
                'message' => 'Berkas media tidak ditemukan.',
            ], 422);
        }

        $disk = config('filesystems.upload_disk', 'r2');

        $mime = strtolower((string) $file->getMimeType());
        $ext = strtolower($file->getClientOriginalExtension());

        $type = 'image';
        if (str_starts_with($mime, 'audio/') || in_array($ext, ['mp3', 'wav', 'ogg', 'm4a', 'aac'], true)) {
            $type = 'audio';
        } elseif (str_starts_with($mime, 'video/') || in_array($ext, ['mp4', 'webm', 'ogv', 'mov'], true)) {
            $type = 'video';
        }

        // Automatic compression & resize if GD is available on the server and file is an image
        if ($type === 'image' && extension_loaded('gd') && in_array($ext, ['jpg', 'jpeg', 'png', 'webp'], true)) {
            $optimizedPath = $this->optimizeAndStoreImage($file, $disk);
            if ($optimizedPath) {
                return response()->json([
                    'success' => true,
                    'url' => Storage::disk($disk)->url($optimizedPath),
                    'type' => 'image',
                    'filename' => $file->getClientOriginalName(),
                ]);
            }
        }

        $path = $file->store('asesmen', $disk);
        $url = Storage::disk($disk)->url($path);

        return response()->json([
            'success' => true,
            'url' => $url,
            'type' => $type,
            'filename' => $file->getClientOriginalName(),
        ]);
    }

    /**
     * Resize and compress image using GD before storing.
     */
    protected function optimizeAndStoreImage($file, string $disk): ?string
    {
        try {
            $srcPath = $file->getRealPath();
            $mime = (string) $file->getMimeType();

            $img = match ($mime) {
                'image/jpeg' => imagecreatefromjpeg($srcPath),
                'image/png' => imagecreatefrompng($srcPath),
                'image/webp' => function_exists('imagecreatefromwebp') ? imagecreatefromwebp($srcPath) : false,
                default => false,
            };

            if (! $img) {
                return null;
            }

            $w = imagesx($img);
            $h = imagesy($img);
            $maxDim = 1200;

            if ($w > $maxDim || $h > $maxDim) {
                $ratio = min($maxDim / $w, $maxDim / $h);
                $nw = (int) round($w * $ratio);
                $nh = (int) round($h * $ratio);

                $dst = imagecreatetruecolor($nw, $nh);
                imagealphablending($dst, false);
                imagesavealpha($dst, true);
                imagecopyresampled($dst, $img, 0, 0, 0, 0, $nw, $nh, $w, $h);
                imagedestroy($img);
                $img = $dst;
            }

            $tmpFile = tempnam(sys_get_temp_dir(), 'img_opt_');
            if (function_exists('imagewebp')) {
                imagewebp($img, $tmpFile, 82);
                $storedExt = 'webp';
            } else {
                imagejpeg($img, $tmpFile, 82);
                $storedExt = 'jpg';
            }
            imagedestroy($img);

            $targetName = 'asesmen/'.Str::uuid().'.'.$storedExt;
            Storage::disk($disk)->put($targetName, file_get_contents($tmpFile));
            @unlink($tmpFile);

            return $targetName;
        } catch (\Throwable $e) {
            report($e);

            return null;
        }
    }

    /**
     * Alias for backward compatibility.
     */
    public function uploadImage(Request $request): JsonResponse
    {
        return $this->uploadMedia($request);
    }
}
