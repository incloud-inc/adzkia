<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionBank;
use App\Models\QuestionGroup;
use App\Models\Subject;
use App\Services\Ai\DeepSeekQuestionGeneratorService;
use App\Services\WordQuestionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class QuestionGeneratorController extends Controller
{
    /**
     * Authorize that the authenticated user is a teacher, admin, or superuser.
     */
    protected function authorizeStaffAccess(): void
    {
        $user = Auth::user();
        if ($user && $user->isStudent()) {
            abort(403, 'Akses Studio AI terbatas untuk Guru dan Administrator.');
        }
    }

    /**
     * Display the AI Question Generator Studio.
     */
    public function index(): View
    {
        $this->authorizeStaffAccess();

        $syllabus = config('curriculum_syllabus');
        $subjects = Subject::orderBy('name')->get();
        $isDeepSeekConfigured = filled(config('services.deepseek.api_key'));
        $defaultModel = config('services.deepseek.model', 'deepseek-reasoner');

        return view('question-generator.index', compact(
            'syllabus',
            'subjects',
            'isDeepSeekConfigured',
            'defaultModel'
        ));
    }

    /**
     * Generate questions using DeepSeek AI.
     */
    public function generate(Request $request, DeepSeekQuestionGeneratorService $aiService): JsonResponse
    {
        $this->authorizeStaffAccess();

        $validated = $request->validate([
            'category' => 'required|string|in:school,tka,utbk,skd,custom',
            'curriculum' => 'nullable|string',
            'grade_level' => 'nullable|string',
            'subject' => 'nullable|string',
            'chapters' => 'nullable|array',
            'utbk_group' => 'nullable|string',
            'skd_track' => 'nullable|string',
            'subtest' => 'nullable|string',
            'difficulty' => 'nullable|string|in:mudah,sedang,sukar',
            'cognitive_level' => 'nullable|string',
            'stimulus_mode' => 'nullable|string|in:standalone,stimulus_group',
            'stimulus_source' => 'nullable|string|in:ai_generate,custom_text',
            'custom_stimulus_text' => 'nullable|string|max:5000',
            'question_type' => 'nullable|string',
            'question_count' => 'nullable|integer|min:1|max:20',
            'custom_prompt' => 'nullable|string|max:2000',
            'ai_model' => 'nullable|string|in:deepseek-chat,deepseek-reasoner',
        ]);

        try {
            $package = $aiService->generate($validated);
            $wordText = $aiService->formatAsWordDocxText($package);

            return response()->json([
                'status' => 'success',
                'message' => 'Soal berhasil di-generate menggunakan DeepSeek AI.',
                'package' => $package,
                'word_text' => $wordText,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal membuat soal: '.$e->getMessage(),
            ], 500);
        }
    }

    /**
     * Download generated questions as a Microsoft Word (.docx) document.
     */
    public function exportWord(Request $request, WordQuestionService $wordService): BinaryFileResponse|JsonResponse
    {
        $this->authorizeStaffAccess();

        if (is_string($request->input('package'))) {
            $decoded = json_decode($request->input('package'), true);
            if (is_array($decoded)) {
                $request->merge(['package' => $decoded]);
            }
        }

        $request->validate([
            'package' => 'required|array',
        ]);

        try {
            $package = $request->input('package');
            $tmp = tempnam(sys_get_temp_dir(), 'gen_docx_');
            $filePath = $tmp.'.docx';
            @unlink($tmp);

            $wordService->generateDocxFromPackage($package, $filePath);

            $cleanTitle = preg_replace('/[^A-Za-z0-9_\-]/', '_', $package['assessment_title'] ?? 'Naskah_Soal_ADZKIA');

            return response()->download($filePath, "{$cleanTitle}.docx", [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            ])->deleteFileAfterSend(true);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengekspor file Word: '.$e->getMessage(),
            ], 500);
        }
    }

    /**
     * Save generated questions directly to a Question Bank.
     */
    public function saveToBank(Request $request): JsonResponse
    {
        $this->authorizeStaffAccess();

        if (is_string($request->input('package'))) {
            $decoded = json_decode($request->input('package'), true);
            if (is_array($decoded)) {
                $request->merge(['package' => $decoded]);
            }
        }

        $request->validate([
            'package' => 'required|array',
            'bank_title' => 'nullable|string|max:255',
            'subject_id' => 'nullable|exists:subjects,id',
        ]);

        $user = Auth::user();
        $tenantId = $user->current_tenant_id ?? $user->tenants()->first()?->id ?? 1;
        $package = $request->input('package');

        DB::beginTransaction();
        try {
            $subjectId = $request->input('subject_id');
            if (! $subjectId) {
                $subjectName = $package['subject'] ?? null;
                if ($subjectName) {
                    $matchedSubject = Subject::where('name', 'like', "%{$subjectName}%")->first();
                    if ($matchedSubject) {
                        $subjectId = $matchedSubject->id;
                    } else {
                        $newSubject = Subject::create([
                            'name' => ucfirst($subjectName),
                            'code' => strtoupper(substr(preg_replace('/[^A-Za-z0-9]/', '', $subjectName), 0, 8)) ?: 'SUB',
                            'description' => 'Mata pelajaran otomatis dari AI',
                        ]);
                        $subjectId = $newSubject->id;
                    }
                }

                if (! $subjectId) {
                    $subjectId = Subject::first()?->id;
                }

                if (! $subjectId) {
                    $newSubject = Subject::create([
                        'name' => 'Umum / Campuran',
                        'code' => 'UMUM',
                        'description' => 'Mata pelajaran umum',
                    ]);
                    $subjectId = $newSubject->id;
                }
            }

            $bank = QuestionBank::create([
                'tenant_id' => $tenantId,
                'created_by' => $user->id,
                'subject_id' => $subjectId,
                'title' => $request->input('bank_title') ?: ($package['assessment_title'] ?? 'Bank Soal DeepSeek AI'),
                'grade_level' => $package['grade_level'] ?? 'Umum',
                'description' => 'Hasil generate DeepSeek AI (Model: '.($package['model_used'] ?? 'DeepSeek').').',
            ]);

            $groupId = null;
            if (! empty($package['stimulus']['content'])) {
                $group = QuestionGroup::create([
                    'question_bank_id' => $bank->id,
                    'title' => $package['stimulus']['title'] ?? 'Wacana Stimulus',
                    'stimulus_type' => 'text',
                    'stimulus_content' => $package['stimulus']['content'],
                ]);
                $groupId = $group->id;
            }

            foreach ($package['items'] as $item) {
                $type = $item['type'] ?? 'mcq_single';
                $points = (float) ($item['points'] ?? 1.0);

                $question = Question::create([
                    'question_bank_id' => $bank->id,
                    'question_group_id' => $groupId,
                    'type' => $type,
                    'prompt' => $item['prompt'],
                    'explanation' => $item['explanation'] ?? null,
                    'points' => $points,
                    'order' => $item['number'] ?? 1,
                    'settings' => $type === 'binary_matrix' ? ['labels' => ['Benar', 'Salah']] : null,
                ]);

                foreach ($item['options'] as $idx => $opt) {
                    $question->options()->create([
                        'label' => $opt['label'] ?? (string) ($idx + 1),
                        'option_text' => $opt['option_text'] ?? '',
                        'is_correct' => ! empty($opt['is_correct']),
                        'score' => (float) ($opt['score'] ?? 0.0),
                        'match_key' => $opt['match_key'] ?? null,
                        'order' => $idx + 1,
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menyimpan '.count($package['items']).' butir soal ke Bank Soal: '.$bank->title,
                'bank_id' => $bank->id,
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menyimpan ke Bank Soal: '.$e->getMessage(),
            ], 500);
        }
    }
}
