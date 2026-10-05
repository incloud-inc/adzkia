<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Jobs\GradeExamSessionJob;
use App\Models\ExamAnswer;
use App\Models\ExamEvent;
use App\Models\ExamSession;
use App\Models\Question;
use App\Models\UserAssessmentAccess;
use App\Services\ExamGradingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ExamWorkspaceController extends Controller
{
    /* ============================================================
     *  SHOW — Ruang Ujian
     * ============================================================ */
    public function show(Request $request, ExamSession $session): View|RedirectResponse
    {
        $this->authorizeSession($request, $session);

        // Guard: status machine
        if ($session->isCompleted()) {
            return redirect()->route('exam.result', ['session' => $session->uuid]);
        }

        if ($session->status === 'cancelled') {
            return redirect()->route('exam.gate.show', ['assessment' => $session->assessment])
                ->with('error', 'Sesi ujian Anda telah dihentikan oleh pengawas ujian.');
        }

        if ($session->isExpired()) {
            $this->finalizeSession($session, 'auto_expired');

            return redirect()->route('exam.analysis', ['session' => $session->uuid])
                ->with('info', 'Waktu ujian telah berakhir. Jawaban Anda otomatis terkumpul.');
        }

        // Touch last_activity (best-effort)
        try {
            $session->forceFill(['last_activity_at' => now()])->save();
        } catch (\Throwable $e) {
            Log::debug('Best-effort: Gagal memperbarui last_activity_at di workspace', [
                'session_uuid' => $session->uuid,
                'error' => $e->getMessage(),
            ]);
        }

        $payload = $this->buildPayload($session);

        return view('exam.workspace', [
            'session' => $session,
            'assessment' => $session->assessment,
            'payload' => $payload,
        ]);
    }

    /* ============================================================
     *  SAVE ANSWER — Auto-save per soal
     * ============================================================ */
    public function saveAnswer(Request $request, ExamSession $session): JsonResponse
    {
        $this->authorizeSession($request, $session);
        abort_unless($session->isInProgress(), 409, 'Sesi tidak aktif.');
        abort_if($session->isExpired(), 410, 'Waktu ujian telah berakhir.');

        $data = $request->validate([
            'question_id' => ['required', 'integer', 'exists:questions,id'],
            'answer_payload' => ['nullable', 'array'],
            'is_flagged' => ['sometimes', 'boolean'],
        ]);

        // Verifikasi soal milik assessment ini (baik direct section maupun via questionGroup)
        $question = Question::query()
            ->with(['assessmentSection', 'questionGroup'])
            ->whereKey($data['question_id'])
            ->where(function ($query) use ($session) {
                $query->whereHas('assessmentSection', fn ($q) => $q->where('assessment_id', $session->assessment_id))
                    ->orWhereHas('questionGroup.assessmentSection', fn ($q) => $q->where('assessment_id', $session->assessment_id));
            })
            ->first();

        abort_unless($question, 422, 'Soal tidak valid untuk sesi ini.');

        // Guard: Jika section ini sudah habis waktunya, tolak perubahan jawaban
        $expiredSections = (array) data_get($session->meta, 'expired_sections', []);
        $secId = $question->assessment_section_id ?? $question->questionGroup?->assessment_section_id;
        if ($secId && (in_array($secId, $expiredSections, false) || in_array((int) $secId, $expiredSections, false) || in_array((string) $secId, $expiredSections, false))) {
            abort(403, 'Waktu pengerjaan untuk bagian ini telah berakhir.');
        }

        $answer = ExamAnswer::query()->updateOrCreate(
            [
                'exam_session_id' => $session->id,
                'question_id' => $data['question_id'],
            ],
            [
                'answer_payload' => $data['answer_payload'] ?? null,
                'is_flagged' => (bool) ($data['is_flagged'] ?? false),
                'answered_at' => now(),
            ]
        );

        try {
            $session->forceFill(['last_activity_at' => now()])->save();
        } catch (\Throwable $e) {
            Log::debug('Best-effort: Gagal memperbarui last_activity_at di saveAnswer', [
                'session_uuid' => $session->uuid,
                'error' => $e->getMessage(),
            ]);
        }

        return response()->json([
            'ok' => true,
            'answer_id' => $answer->id,
            'saved_at' => $answer->answered_at?->toIso8601String(),
            'answered' => $this->countAnswered($session),
            'total' => $session->question_count,
        ]);
    }

    /* ============================================================
     *  LOG EVENT — Anti-cheat & telemetry
     * ============================================================ */
    public function logEvent(Request $request, ExamSession $session): JsonResponse
    {
        $this->authorizeSession($request, $session);

        $data = $request->validate([
            'event_type' => ['required', 'string', 'in:tab_hidden,tab_visible,window_blur,window_focus,fullscreen_exit,fullscreen_enter,offline,online,copy,contextmenu,key_combo,heartbeat,resume,suspend,section_expired,page_exit'],
            'payload' => ['nullable', 'array'],
            'occurred_at' => ['nullable', 'string', 'max:40'],
        ]);

        try {
            ExamEvent::create([
                'exam_session_id' => $session->id,
                'event_type' => $data['event_type'],
                'payload' => $data['payload'] ?? null,
                'ip' => $request->ip(),
                'occurred_at' => $data['occurred_at'] ?? now(),
            ]);
        } catch (\Throwable $e) {
            Log::channel('exam')->warning('Gagal mencatat event pengawasan ujian', [
                'session_uuid' => $session->uuid,
                'event_type' => $data['event_type'],
                'error' => $e->getMessage(),
            ]);
        }

        // Catat pelanggaran aktif untuk pengawasan real-time
        $violationTypes = ['tab_hidden', 'window_blur', 'fullscreen_exit', 'page_exit', 'offline', 'copy', 'contextmenu'];
        if (in_array($data['event_type'], $violationTypes, true)) {
            $meta = (array) ($session->meta ?? []);
            $meta['violation_count'] = ((int) ($meta['violation_count'] ?? 0)) + 1;
            $meta['last_violation_type'] = $data['event_type'];
            $meta['last_violation_at'] = now()->toIso8601String();

            $isProctored = data_get($session->assessment->settings, 'proctoring_mode') === 'proctored';
            if ($isProctored && in_array($data['event_type'], ['tab_hidden', 'window_blur', 'fullscreen_exit', 'page_exit'], true)) {
                $session->lock('Menunggu keputusan pengawas ujian');
                $meta['is_violated_locked'] = true;
                $meta['proctor_action'] = 'locked';
            }

            try {
                $session->forceFill(['meta' => $meta])->save();
            } catch (\Throwable $e) {
                Log::channel('exam')->warning('Gagal memperbarui metadata pelanggaran ujian', [
                    'session_uuid' => $session->uuid,
                    'error' => $e->getMessage(),
                ]);
            }
        }

        // Catat section yang sudah kedaluwarsa ke metadata sesi
        if ($data['event_type'] === 'section_expired') {
            $secId = data_get($data['payload'], 'section_id');
            if ($secId) {
                $meta = (array) ($session->meta ?? []);
                $expiredSections = (array) ($meta['expired_sections'] ?? []);
                if (! in_array($secId, $expiredSections, false)) {
                    $expiredSections[] = $secId;
                    $meta['expired_sections'] = array_values(array_unique($expiredSections));
                    try {
                        $session->forceFill(['meta' => $meta])->save();
                    } catch (\Throwable $e) {
                        Log::channel('exam')->warning('Gagal memperbarui status section kedaluwarsa', [
                            'session_uuid' => $session->uuid,
                            'error' => $e->getMessage(),
                        ]);
                    }
                }
            }
        }

        // Update activity for positive signals
        if (in_array($data['event_type'], ['heartbeat', 'resume', 'tab_visible', 'window_focus', 'online'], true)) {
            try {
                $session->forceFill(['last_activity_at' => now()])->save();
            } catch (\Throwable $e) {
                Log::debug('Best-effort: Gagal memperbarui heartbeat/last_activity_at', [
                    'session_uuid' => $session->uuid,
                    'error' => $e->getMessage(),
                ]);
            }
        }

        $meta = (array) ($session->meta ?? []);

        return response()->json([
            'ok' => true,
            'status' => $session->status,
            'is_locked' => $session->isLocked(),
            'lock_reason' => $session->lock_reason,
            'proctor_action' => $meta['proctor_action'] ?? null,
            'reset_count' => (int) ($meta['reset_count'] ?? 0),
            'last_proctor_action_at' => $meta['last_proctor_action_at'] ?? null,
            'score_penalty' => (float) ($meta['score_penalty'] ?? 0),
            'time_penalty_minutes' => (int) ($meta['time_penalty_minutes'] ?? 0),
            'remaining_seconds' => $session->remainingSeconds(),
            'server_time' => now()->toIso8601String(),
        ]);
    }

    /* ============================================================
     *  SUBMIT — Finalisasi sesi (via AJAX)
     * ============================================================ */
    public function submit(Request $request, ExamSession $session): JsonResponse
    {
        $this->authorizeSession($request, $session);

        $reason = $request->input('reason', 'student_submit');
        $isTimeUp = $reason === 'time_up' || $session->isExpired();
        $targetRoute = $isTimeUp ? 'exam.analysis' : 'exam.result';

        if ($session->isCompleted()) {
            return response()->json([
                'ok' => true,
                'redirect' => route($targetRoute, ['session' => $session->uuid]),
                'info' => 'Sudah disubmit sebelumnya.',
            ]);
        }

        try {
            $this->fastFinalizeSession($session, $reason, $request->ip());

            // Dispatch Background Job untuk Penilaian (High Priority Queue)
            GradeExamSessionJob::dispatch($session->id)
                ->onQueue('grading')
                ->afterCommit();

        } catch (\Throwable $e) {
            Log::channel('exam')->error('fastFinalizeSession error on submit', [
                'session_uuid' => $session->uuid,
                'error' => $e->getMessage(),
            ]);

            // Emergency fallback jika transaksi gagal
            try {
                $session->forceFill([
                    'status' => 'completed',
                    'grading_status' => 'pending',
                    'completed_at' => now(),
                    'submitted_ip' => $request->ip() ?? $session->ip_address,
                    'meta' => array_merge((array) $session->meta, [
                        'finalize_reason' => $reason,
                        'finalized_at' => now()->toIso8601String(),
                        'submit_fallback' => true,
                    ]),
                ])->save();

                GradeExamSessionJob::dispatch($session->id)
                    ->onQueue('grading')
                    ->afterCommit();
            } catch (\Throwable $fallbackEx) {
                Log::channel('exam')->emergency('Emergency fallback finalize failed', [
                    'session_uuid' => $session->uuid,
                    'error' => $fallbackEx->getMessage(),
                ]);
            }
        }

        Log::channel('exam')->info('exam.session.submitted_fastpath', [
            'session_uuid' => $session->uuid,
            'user_id' => $session->user_id,
            'ip' => $request->ip(),
            'reason' => $reason,
        ]);

        return response()->json([
            'ok' => true,
            'redirect' => route($targetRoute, ['session' => $session->uuid]),
        ]);
    }

    /* ============================================================
     *  HELPERS
     * ============================================================ */

    private function authorizeSession(Request $request, ExamSession $session): void
    {
        abort_if($session->user_id !== $request->user()->id, 403, 'Sesi bukan milik Anda.');
    }

    /**
     * Bangun payload JSON yang dikirim ke Alpine.js.
     * Semua soal dimuat sekaligus untuk offline resilience & instant navigation.
     *
     * @return array<string, mixed>
     */
    private function buildPayload(ExamSession $session): array
    {
        $assessment = $session->assessment;
        $randomizeQ = (bool) data_get($session->schedule_snapshot, 'randomize_questions', false);
        $randomizeO = (bool) data_get($session->schedule_snapshot, 'randomize_options', false);

        // 1. Ambil sections terurut rapi (urutan section TIDAK BOLEH diacak!)
        $sections = $assessment->sections()->orderBy('order')->orderBy('id')->get();

        // 2. Ambil semua questions
        $questions = Question::query()
            ->where(function ($query) use ($assessment) {
                $query->whereHas('assessmentSection', fn ($q) => $q->where('assessment_id', $assessment->id))
                    ->orWhereHas('questionGroup.assessmentSection', fn ($q) => $q->where('assessment_id', $assessment->id));
            })
            ->with([
                'assessmentSection',
                'options' => fn ($q) => $q->orderBy('order'),
                'questionGroup' => fn ($q) => $q->select(['id', 'assessment_section_id', 'stimulus_content', 'stimulus_type', 'title', 'order']),
                'questionGroup.assessmentSection',
            ])
            ->orderBy('assessment_section_id')
            ->orderBy('order')
            ->orderBy('id')
            ->get();

        // 3. Pastikan setiap section memiliki durasi (jika durasi section kosong, alokasikan dari durasi asesmen)
        $totalAssessmentDuration = (int) ($assessment->duration_minutes ?: 60);
        $totalQuestionsCount = max(1, $questions->count());

        $sectionDurations = [];
        foreach ($sections as $sec) {
            if ($sec->duration_minutes && $sec->duration_minutes > 0) {
                $sectionDurations[$sec->id] = (int) $sec->duration_minutes;
            } else {
                $secQCount = $questions->filter(fn ($q) => ($q->assessment_section_id ?? $q->questionGroup?->assessment_section_id) == $sec->id)->count();
                if ($totalQuestionsCount > 0 && $secQCount > 0) {
                    $sectionDurations[$sec->id] = max(1, (int) round(($secQCount / $totalQuestionsCount) * $totalAssessmentDuration));
                } else {
                    $sectionDurations[$sec->id] = max(1, (int) round($totalAssessmentDuration / max(1, $sections->count())));
                }
            }
        }

        // 4. Urutkan soal PER SECTION (hanya mengacak soal dalam section, jangan acak section)
        $seed = crc32($session->uuid);
        $orderedQuestions = collect();

        foreach ($sections as $sec) {
            $secQuestions = $questions->filter(fn ($q) => ($q->assessment_section_id ?? $q->questionGroup?->assessment_section_id) == $sec->id);

            if ($randomizeQ) {
                // Acak HANYA di dalam section ini
                $secOrdered = $secQuestions->sortBy(fn ($q) => crc32($q->id.':'.$seed))->values();
            } else {
                // Urutan sekuensial absolut (jaga hierarki item grup wacana dan soal standalone tanpa collision)
                $secOrdered = $secQuestions->sortBy(function ($q) {
                    if ($q->question_group_id && $q->questionGroup) {
                        return sprintf('%06d_%06d_%09d', (int) ($q->questionGroup->order ?? 1), (int) ($q->order ?? 1), (int) $q->id);
                    }

                    return sprintf('%06d_000000_%09d', (int) ($q->order ?? 1), (int) $q->id);
                })->values();
            }

            $orderedQuestions = $orderedQuestions->concat($secOrdered);
        }

        // Jika ada soal yang belum terpetakan ke section (fallback), tambahkan di akhir
        $mappedIds = $orderedQuestions->pluck('id')->all();
        $unmappedQuestions = $questions->reject(fn ($q) => in_array($q->id, $mappedIds));
        if ($unmappedQuestions->isNotEmpty()) {
            $orderedQuestions = $orderedQuestions->concat($unmappedQuestions->values());
        }

        $questions = $orderedQuestions->values();

        // Jawaban yang sudah ada → map by question_id
        $existingAnswers = ExamAnswer::query()
            ->where('exam_session_id', $session->id)
            ->get()
            ->keyBy('question_id');

        $mapped = $questions->map(function (Question $q, int $idx) use ($randomizeO, $existingAnswers, $session, $sectionDurations, $sections) {
            $options = $q->options;

            $alwaysShuffleTypes = ['ordering', 'reorder', 'matching'];
            $randomShuffleTypes = ['mcq_single', 'mcq_multiple', 'mcq_weighted'];

            $shouldShuffle = in_array($q->type, $alwaysShuffleTypes, true)
                || ($randomizeO && in_array($q->type, $randomShuffleTypes, true));

            $matchingTargets = [];
            if ($q->type === 'matching') {
                // Ambil semua target unik sebelah kanan
                $allTargets = $options->map(fn ($o) => trim((string) ($o->match_key ?? '')))->filter()->unique()->values();

                // Acak pilihan target sebelah kanan secara independen dengan seed kanan
                $rightSeed = crc32($session->uuid.':right:'.$q->id);
                $shuffledTargets = $allTargets->sortBy(fn ($t) => crc32($t.':'.$rightSeed))->values();

                // Pastikan urutan target kanan tidak persis sama dengan target urutan awal jika lebih dari 1
                if ($allTargets->count() > 1 && $allTargets->all() === $shuffledTargets->all()) {
                    $shuffledTargets = $shuffledTargets->reverse()->values();
                }

                $matchingTargets = $shuffledTargets->all();
            }

            if ($shouldShuffle && $options->isNotEmpty()) {
                // Untuk matching, gunakan seed kiri khusus
                $optSeed = ($q->type === 'matching')
                    ? crc32($session->uuid.':left:'.$q->id)
                    : crc32($session->uuid.':'.$q->id);

                $shuffled = $options->sortBy(fn ($o) => crc32($o->id.':'.$optSeed))->values();

                // Pastikan untuk tipe ordering/reorder/matching urutan TIDAK SAMA PERSIS dengan urutan awal kunci jika opsi > 1
                if (in_array($q->type, $alwaysShuffleTypes, true) && $options->count() > 1) {
                    $originalIds = $options->pluck('id')->all();
                    $shuffledIds = $shuffled->pluck('id')->all();
                    if ($originalIds === $shuffledIds) {
                        $shuffled = $shuffled->reverse()->values();
                    }
                }
                $options = $shuffled;
            } else {
                $options = $options->values();
            }

            $existing = $existingAnswers->get($q->id);

            $section = $q->assessmentSection ?? $q->questionGroup?->assessmentSection;
            $sectionId = $q->assessment_section_id ?? $q->questionGroup?->assessment_section_id ?? $section?->id;
            $sectionDuration = $sectionDurations[$sectionId] ?? ($section?->duration_minutes !== null ? (int) $section->duration_minutes : null);
            $sectionTitle = $section?->title;
            $sectionIdx = $sections->search(fn ($s) => $s->id == $sectionId);
            $sectionNumber = $sectionIdx !== false ? $sectionIdx + 1 : 1;

            return [
                'id' => $q->id,
                'number' => $idx + 1,
                'type' => $q->type,
                'stem' => $q->prompt ?? '',
                'rendered_stem' => filled($q->prompt) ? Str::markdown($q->prompt) : '',
                'points' => (float) ($q->points ?? 1),
                'section_id' => $sectionId,
                'section_number' => $sectionNumber,
                'section_title' => $sectionTitle,
                'section_duration_minutes' => $sectionDuration,
                'matching_targets' => $matchingTargets,
                'question_group_id' => $q->question_group_id,
                'stimulus' => $q->questionGroup ? [
                    'id' => $q->questionGroup->id,
                    'title' => $q->questionGroup->title,
                    'type' => $q->questionGroup->stimulus_type ?? 'text',
                    'content' => $q->questionGroup->stimulus_content ?? '',
                    'rendered' => filled($q->questionGroup->stimulus_content) ? Str::markdown($q->questionGroup->stimulus_content) : '',
                ] : null,
                'options' => $options->map(fn ($o) => [
                    'id' => $o->id,
                    'label' => $o->label ?? '',
                    'content' => $o->option_text ?? '',
                    'rendered_content' => filled($o->option_text) ? Str::markdown($o->option_text) : '',
                    'meta' => ['match_key' => $o->match_key ?? null, 'score' => $o->score ?? null],
                ])->values()->all(),
                'meta' => $q->settings ?? null,
                'existing' => [
                    'answer_payload' => $existing?->answer_payload,
                    'is_flagged' => (bool) ($existing?->is_flagged ?? false),
                    'answered_at' => $existing?->answered_at?->toIso8601String(),
                ],
            ];
        })->all();

        $activeTenant = $session->tenant ?? $assessment->tenant ?? auth()->user()->currentTenant;

        $sectionsPayload = $sections->values()->map(function ($s, $i) use ($sectionDurations) {
            return [
                'id' => $s->id,
                'number' => $i + 1,
                'title' => $s->title,
                'duration_minutes' => $sectionDurations[$s->id] ?? (int) ($s->duration_minutes ?: 15),
            ];
        })->all();

        return [
            'session' => [
                'uuid' => $session->uuid,
                'status' => $session->status,
                'is_locked' => $session->isLocked(),
                'lock_reason' => $session->lock_reason,
                'question_count' => count($mapped),
                'expires_at' => optional($session->expires_at)->toIso8601String(),
                'server_time' => now()->toIso8601String(),
                'remaining_seconds' => $session->remainingSeconds(),
                'randomize_questions' => $randomizeQ,
                'randomize_options' => $randomizeO,
                'reset_count' => (int) data_get($session->meta, 'reset_count', 0),
                'proctor_action' => data_get($session->meta, 'proctor_action'),
                'expired_sections' => (array) data_get($session->meta, 'expired_sections', []),
            ],
            'assessment' => [
                'id' => $assessment->id,
                'title' => $assessment->title,
                'duration_minutes' => (int) $assessment->duration_minutes,
                'passing_grade' => (int) data_get($assessment->settings, 'passing_grade.min_score', 0),
                'proctoring_mode' => data_get($assessment->settings, 'proctoring_mode', 'unproctored'),
            ],
            'sections' => $sectionsPayload,
            'user' => [
                'name' => auth()->user()?->name ?? $session->user?->name ?? 'Peserta',
                'photo_url' => auth()->user()?->profile_photo_url ?? $session->user?->profile_photo_url,
                'tenant' => optional($activeTenant)->name,
                'tenant_logo' => optional($activeTenant)->logo_url,
            ],
            'endpoints' => [
                'save' => route('exam.session.answer', ['session' => $session->uuid]),
                'event' => route('exam.session.event', ['session' => $session->uuid]),
                'submit' => route('exam.session.submit', ['session' => $session->uuid]),
                'result' => route('exam.result', ['session' => $session->uuid]),
                'analysis' => route('exam.analysis', ['session' => $session->uuid]),
                'lock_status' => route('exam.session.lock_status', ['session' => $session->uuid]),
                'verify_pin' => route('exam.session.verify_pin', ['session' => $session->uuid]),
            ],
            'questions' => $mapped,
        ];
    }

    private function countAnswered(ExamSession $session): int
    {
        return ExamAnswer::query()
            ->where('exam_session_id', $session->id)
            ->whereNotNull('answer_payload')
            ->count();
    }

    private function fastFinalizeSession(ExamSession $session, string $reason, ?string $ip = null): void
    {
        DB::transaction(function () use ($session, $reason, $ip) {
            $affected = ExamSession::query()
                ->where('id', $session->id)
                ->where('status', '!=', 'completed')
                ->update([
                    'status' => 'completed',
                    'grading_status' => 'pending',
                    'completed_at' => now(),
                    'submitted_ip' => $ip ?? $session->ip_address,
                    'meta' => array_merge((array) $session->meta, [
                        'finalize_reason' => $reason,
                        'finalized_at' => now()->toIso8601String(),
                    ]),
                    'updated_at' => now(),
                ]);

            if ($affected > 0) {
                // Increment attempts_used if student has paid assessment access
                try {
                    UserAssessmentAccess::where('user_id', $session->user_id)
                        ->where('assessment_id', $session->assessment_id)
                        ->increment('attempts_used');
                } catch (\Throwable $e) {
                    Log::warning('Failed incrementing attempts_used in fastFinalizeSession: '.$e->getMessage());
                }
            }
        });
    }

    /**
     * Polling status lock & tindakan pengawas (TIME, POINT, RESET, CANCEL).
     */
    public function checkLockStatus(Request $request, ExamSession $session): JsonResponse
    {
        $this->authorizeSession($request, $session);

        if ($session->status === 'cancelled') {
            return response()->json([
                'status' => 'cancelled',
                'is_locked' => true,
                'redirect_url' => route('exam.gate.show', ['assessment' => $session->assessment]),
                'message' => 'Sesi ujian Anda dihentikan oleh pengawas ujian.',
            ]);
        }

        $meta = (array) ($session->meta ?? []);

        return response()->json([
            'status' => $session->status,
            'is_locked' => $session->isLocked(),
            'lock_reason' => $session->lock_reason ?? 'Menunggu keputusan pengawas ujian',
            'proctor_action' => $meta['proctor_action'] ?? null,
            'reset_count' => (int) ($meta['reset_count'] ?? 0),
            'last_proctor_action_at' => $meta['last_proctor_action_at'] ?? null,
            'score_penalty' => (float) ($meta['score_penalty'] ?? 0),
            'time_penalty_minutes' => (int) ($meta['time_penalty_minutes'] ?? 0),
            'remaining_seconds' => $session->remainingSeconds(),
            'server_time' => now()->toIso8601String(),
        ]);
    }

    /**
     * Micro-polling status grading untuk halaman Result.
     */
    public function checkGradingStatus(Request $request, ExamSession $session): JsonResponse
    {
        $this->authorizeSession($request, $session);

        $fresh = ExamSession::query()->select(['id', 'grading_status', 'score', 'max_score'])->find($session->id);

        if ($fresh && $fresh->grading_status !== 'completed') {
            app(ExamGradingService::class)->autoGradeSessionOptimized($session);
            $fresh = ExamSession::query()->select(['id', 'grading_status', 'score', 'max_score'])->find($session->id);
            Cache::forget("exam_session:grading_status:{$session->id}");
        }

        $statusData = [
            'status' => $fresh->grading_status ?? 'completed',
            'is_ready' => ($fresh->grading_status === 'completed'),
            'score' => $fresh->score ?? 0,
        ];

        return response()->json($statusData)
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');
    }

    /**
     * Verifikasi PIN buka kunci yang diinput siswa atau pengawas di layar ujian.
     */
    public function verifyPin(Request $request, ExamSession $session): JsonResponse
    {
        $this->authorizeSession($request, $session);

        $pin = trim((string) $request->input('pin'));
        $meta = (array) ($session->meta ?? []);
        $expectedPin = trim((string) ($meta['unlock_pin'] ?? ''));

        if (empty($pin) || empty($expectedPin) || $pin !== $expectedPin) {
            return response()->json([
                'ok' => false,
                'message' => 'PIN Buka Kunci salah. Silakan tanyakan PIN yang benar ke pengawas.',
            ], 422);
        }

        unset($meta['unlock_pin'], $meta['is_violated_locked']);
        $meta['proctor_action'] = 'pin_unlocked';
        $meta['last_proctor_action_at'] = now()->toIso8601String();

        $session->forceFill([
            'status' => 'in_progress',
            'lock_reason' => null,
            'meta' => $meta,
            'unlocked_at' => now(),
        ])->save();

        return response()->json([
            'ok' => true,
            'message' => 'PIN benar! Layar ujian berhasil dibuka. Silakan lanjutkan pengerjaan.',
            'remaining_seconds' => $session->remainingSeconds(),
        ]);
    }
}
