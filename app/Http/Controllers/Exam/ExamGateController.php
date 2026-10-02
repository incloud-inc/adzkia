<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\ExamEvent;
use App\Models\ExamSession;
use App\Models\User;
use App\Models\UserAssessmentAccess;
use App\Services\ExamGradingService;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ExamGateController extends Controller
{
    /** Default duration if assessment has none set. */
    private const DEFAULT_DURATION_MINUTES = 60;

    /**
     * Entry point: /exam/{token}
     * Token bisa berupa token ujian dari settings ATAU uuid sesi (untuk resume langsung).
     */
    public function resolve(Request $request, string $token): RedirectResponse
    {
        // 1) Cek apakah token adalah uuid sesi aktif milik user → resume
        $session = ExamSession::query()
            ->where('uuid', $token)
            ->where('user_id', Auth::id())
            ->first();

        if ($session) {
            return redirect()->route('exam.gate.show', ['assessment' => $session->assessment]);
        }

        // 2) Cari assessment berdasarkan token di dalam settings JSON
        $assessment = Assessment::query()
            ->where('status', 'published')
            ->where('settings->token', strtoupper($token))
            ->first();

        if (! $assessment) {
            return redirect()->route('dashboard')
                ->with('error', 'Token ujian tidak valid atau sudah tidak aktif.');
        }

        return redirect()->route('exam.gate.show', ['assessment' => $assessment]);
    }

    /**
     * Tampilkan halaman gerbang & verifikasi peserta.
     */
    public function show(Request $request, Assessment $assessment): View|RedirectResponse
    {
        $user = $request->user();

        // ── Validasi publikasi ───────────────────────────────────────
        if ($assessment->status !== 'published') {
            return $this->bail('Ujian belum dipublikasikan atau sudah diarsipkan.');
        }

        // ── Tenant scoping & hak partisipasi ────────────────────────
        $this->ensureParticipantAuthorized($user, $assessment);

        // ── Validasi periode aktif ───────────────────────────────────
        $window = $this->resolveWindow($assessment);
        if (! $window['active']) {
            return $this->bail($window['message'] ?? 'Ujian sedang di luar periode aktif.');
        }

        // ── Validasi Pembelian Asesmen Berbayar ──────────────────────
        $isStaff = $user->isSuperUser() || $user->isAdmin() || $user->isTeacher();
        if ($assessment->price_type === 'paid' && (float) $assessment->price > 0 && ! $isStaff) {
            $access = $user->getAssessmentAccess($assessment);

            if (! $access) {
                $lastSettledOrder = $user->orders()
                    ->where('assessment_id', $assessment->id)
                    ->where('status', 'settled')
                    ->latest('paid_at')
                    ->first();

                if ($lastSettledOrder) {
                    $validityDays = $lastSettledOrder->package_validity_days ?: ($assessment->access_validity_days ?: 35);
                    $paidAt = $lastSettledOrder->paid_at ?: now();
                    $access = UserAssessmentAccess::create([
                        'user_id' => $user->id,
                        'assessment_id' => $assessment->id,
                        'quota_attempts' => $lastSettledOrder->package_attempts ?: ($assessment->max_attempts ?: 1),
                        'attempts_used' => 0,
                        'expires_at' => $paidAt->copy()->addDays($validityDays),
                        'last_purchased_at' => $paidAt,
                        'last_order_id' => $lastSettledOrder->id,
                    ]);
                }
            }

            if (! $access || ! $access->isValid()) {
                $msg = ($access && $access->isExpired())
                    ? 'Masa aktif akses ujian Anda (35 hari) telah berakhir. Silakan beli paket baru untuk memperpanjang dan mengakumulasikan kuota Anda.'
                    : ($access && $access->availableAttempts() <= 0
                        ? 'Kuota kesempatan percobaan ujian Anda telah habis. Silakan beli paket kuota baru untuk melanjutkan.'
                        : 'Asesmen ini berbayar (Rp '.number_format($assessment->price, 0, ',', '.').'). Silakan selesaikan pembayaran untuk mulai mengerjakan ujian CBT.');

                return redirect()->route('orders.checkout', $assessment)->with('info', $msg);
            }
        }

        // ── Sesi yang sudah ada ──────────────────────────────────────
        $session = ExamSession::query()
            ->where('assessment_id', $assessment->id)
            ->where('user_id', $user->id)
            ->latest('id')
            ->first();

        // Habis waktu → expired
        if ($session && $session->isInProgress() && $session->isExpired()) {
            $session->update(['status' => 'completed', 'completed_at' => now()]);
            app(ExamGradingService::class)->autoGradeSession($session);

            $accessRecord = $user->getAssessmentAccess($assessment);
            if ($accessRecord) {
                $accessRecord->increment('attempts_used');
            }

            return redirect()->route('exam.analysis', ['session' => $session->uuid])
                ->with('info', 'Waktu ujian Anda telah habis dan sesi telah dikumpulkan otomatis.');
        }

        // Sesi sudah selesai → cek apakah siswa masih boleh mencoba lagi
        if ($session && $session->isCompleted()) {
            $attemptCheck = $this->canStartNewAttempt($user, $assessment);
            if (! $attemptCheck['allowed']) {
                if (in_array($attemptCheck['reason'], ['expired', 'quota_empty'], true)) {
                    return redirect()->route('orders.checkout', $assessment)->with('info', $attemptCheck['message']);
                }

                return redirect()->route('exam.result', ['session' => $session->uuid])
                    ->with('info', $attemptCheck['message'] ?? 'Anda sudah menyelesaikan ujian ini.');
            }

            // Siswa berhak mencoba kembali (unlimited atau masih ada sisa percobaan)
            $session = null;
        }

        $stats = $this->buildStats($assessment);

        return view('exam.gate', [
            'assessment' => $assessment,
            'session' => $session,
            'locked' => $session?->isLocked() ?? false,
            'stats' => $stats,
            'window' => $window,
        ]);
    }

    /**
     * Mulai atau resume sesi ujian.
     */
    public function start(Request $request, Assessment $assessment): RedirectResponse
    {
        $user = $request->user();

        // Re-validasi (tidak percaya state view)
        if ($assessment->status !== 'published') {
            return $this->bail('Ujian belum dipublikasikan.');
        }

        $this->ensureParticipantAuthorized($user, $assessment);

        $window = $this->resolveWindow($assessment);
        if (! $window['active']) {
            return $this->bail($window['message'] ?? 'Ujian di luar periode aktif.');
        }

        // Cek hak dan kuota memulai percobaan baru
        $attemptCheck = $this->canStartNewAttempt($user, $assessment);
        if (! $attemptCheck['allowed']) {
            if (in_array($attemptCheck['reason'], ['expired', 'quota_empty', 'unpaid'], true)) {
                return redirect()->route('orders.checkout', $assessment)->with('info', $attemptCheck['message']);
            }

            return back()->with('error', $attemptCheck['message'] ?? 'Percobaan ujian tidak diizinkan.');
        }

        if (! $request->boolean('agree')) {
            return back()->with('error', 'Anda harus menyetujui tata tertib sebelum memulai.');
        }

        $session = DB::transaction(function () use ($request, $assessment, $user) {
            /** @var ExamSession|null $existing */
            $existing = ExamSession::query()
                ->where('assessment_id', $assessment->id)
                ->where('user_id', $user->id)
                ->lockForUpdate()
                ->latest('id')
                ->first();

            // In_progress (belum expired) → resume, refresh activity
            if ($existing && $existing->isInProgress() && ! $existing->isExpired()) {
                $existing->update([
                    'last_activity_at' => now(),
                    'ip_address' => $request->ip(),
                ]);

                return $existing;
            }

            // Jika sesi in_progress telah expired, selesaikan
            if ($existing && $existing->isInProgress() && $existing->isExpired()) {
                $existing->update(['status' => 'completed', 'completed_at' => now()]);
                app(ExamGradingService::class)->autoGradeSession($existing);
                $access = $user->getAssessmentAccess($assessment);
                if ($access) {
                    $access->increment('attempts_used');
                }
            }

            // Buat sesi baru (Percobaan baru)
            $durationMinutes = (int) ($assessment->duration_minutes ?: self::DEFAULT_DURATION_MINUTES);
            $questionCount = $this->countQuestions($assessment);
            $nextAttempt = $this->nextAttemptNumber($assessment, $user->id);

            return ExamSession::create([
                'assessment_id' => $assessment->id,
                'user_id' => $user->id,
                'tenant_id' => $user->current_tenant_id ?: $assessment->tenant_id,
                'status' => 'in_progress',
                'device_fingerprint' => $this->fingerprint($request),
                'ip_address' => $request->ip(),
                'started_at' => now(),
                'last_activity_at' => now(),
                'expires_at' => now()->addMinutes($durationMinutes),
                'schedule_snapshot' => [
                    'token' => data_get($assessment->settings, 'token'),
                    'valid_from' => data_get($assessment->settings, 'valid_from'),
                    'valid_to' => data_get($assessment->settings, 'valid_to'),
                    'duration_minutes' => $durationMinutes,
                    'randomize_questions' => (bool) data_get($assessment->settings, 'randomize_questions', false),
                    'randomize_options' => (bool) data_get($assessment->settings, 'randomize_options', false),
                    'question_count' => $questionCount,
                    'captured_at' => now()->toIso8601String(),
                ],
                'question_count' => $questionCount,
                'meta' => [
                    'attempt_number' => $nextAttempt,
                    'agent' => substr((string) $request->userAgent(), 0, 250),
                ],
            ]);
        });

        // Catat event start
        try {
            ExamEvent::create([
                'exam_session_id' => $session->id,
                'event_type' => 'resume',
                'ip' => $request->ip(),
                'occurred_at' => now(),
            ]);
        } catch (\Throwable $e) {
            Log::channel('exam')->warning('Non-blocking: Gagal mencatat event start ujian', [
                'session_uuid' => $session->uuid,
                'error' => $e->getMessage(),
            ]);
        }

        Log::channel('exam')->info('exam.session.started', [
            'session_uuid' => $session->uuid,
            'assessment_id' => $assessment->id,
            'user_id' => $user->id,
            'ip' => $request->ip(),
        ]);

        return redirect()->route('exam.workspace', ['session' => $session->uuid]);
    }

    // ─── Helpers ────────────────────────────────────────────────────────────

    /**
     * Resolve active window for the assessment (based on valid_from / valid_to in settings JSON).
     *
     * @return array{active: bool, message: string|null, from: string|null, to: string|null}
     */
    private function resolveWindow(Assessment $assessment): array
    {
        $validFrom = data_get($assessment->settings, 'valid_from');
        $validTo = data_get($assessment->settings, 'valid_to');

        // No window configured → always active
        if (! $validFrom && ! $validTo) {
            return ['active' => true, 'message' => null, 'from' => null, 'to' => null];
        }

        $now = now()->setTimezone('Asia/Jakarta');

        if ($validFrom) {
            $from = Carbon::parse($validFrom, 'Asia/Jakarta');
            if ($now->lt($from)) {
                return [
                    'active' => false,
                    'message' => 'Ujian belum dimulai. Jadwal mulai: '.$from->translatedFormat('d M Y H:i').' WIB',
                    'from' => $validFrom,
                    'to' => $validTo,
                ];
            }
        }

        if ($validTo) {
            $to = Carbon::parse($validTo, 'Asia/Jakarta');
            if ($now->gt($to)) {
                return [
                    'active' => false,
                    'message' => 'Periode ujian telah berakhir pada '.$to->translatedFormat('d M Y H:i').' WIB',
                    'from' => $validFrom,
                    'to' => $validTo,
                ];
            }
        }

        return ['active' => true, 'message' => null, 'from' => $validFrom, 'to' => $validTo];
    }

    /**
     * Build display stats for the gate view.
     *
     * @return array<string, mixed>
     */
    private function buildStats(Assessment $assessment): array
    {
        return [
            'question_count' => $this->countQuestions($assessment),
            'duration_minutes' => (int) ($assessment->duration_minutes ?: self::DEFAULT_DURATION_MINUTES),
            'passing_grade' => (int) data_get($assessment->settings, 'passing_grade.min_score', 0),
            'pass_label' => data_get($assessment->settings, 'passing_grade.pass_label', 'Lulus'),
            'fail_label' => data_get($assessment->settings, 'passing_grade.fail_label', 'Belum Lulus'),
            'randomize_questions' => (bool) data_get($assessment->settings, 'randomize_questions', false),
            'randomize_options' => (bool) data_get($assessment->settings, 'randomize_options', false),
            'subject_name' => optional($assessment->subject)->name ?? '-',
            'grade_level' => $assessment->grade_level ?? '-',
        ];
    }

    /**
     * Count total questions across all sections of the assessment.
     */
    private function countQuestions(Assessment $assessment): int
    {
        try {
            return (int) $assessment->sections()
                ->withCount('questions')
                ->get()
                ->sum('questions_count');
        } catch (\Throwable $e) {
            Log::channel('exam')->warning('Gagal menghitung jumlah soal asesmen', [
                'assessment_id' => $assessment->id,
                'error' => $e->getMessage(),
            ]);

            return 0;
        }
    }

    /**
     * Determine the next attempt number for this user + assessment.
     */
    private function nextAttemptNumber(Assessment $assessment, int $userId): int
    {
        return (int) ExamSession::query()
            ->where('assessment_id', $assessment->id)
            ->where('user_id', $userId)
            ->count() + 1;
    }

    /**
     * Generate a device fingerprint from IP + user agent + user ID.
     */
    private function fingerprint(Request $request): string
    {
        return hash('sha256', implode('|', [
            $request->ip(),
            substr((string) $request->userAgent(), 0, 200),
            Auth::id(),
        ]));
    }

    /**
     * Memastikan peserta berhak mengakses dan memulai asesmen / ujian ini.
     */
    protected function ensureParticipantAuthorized(User $user, Assessment $assessment): void
    {
        if ($user->isSuperUser()) {
            return;
        }

        // 1. Asesmen Nasional / Global / Milik Pusat ADZKIA / Tanpa Tenant bebas diakses seluruh murid
        $isGlobalCatalog = (bool) (
            $assessment->is_global
            || $assessment->is_mandatory
            || is_null($assessment->tenant_id)
            || $assessment->tenant_id === 1
        );

        if ($isGlobalCatalog) {
            return;
        }

        // 2. Jika asesmen terikat tenant spesifik:
        if ($assessment->tenant_id) {
            // Jika user sudah berada pada tenant yang sama
            if ($user->current_tenant_id === $assessment->tenant_id) {
                return;
            }

            // Jika user terdaftar pada tenant tersebut (pivot tenant_user)
            $belongsToTenant = $user->tenants()->where('tenants.id', $assessment->tenant_id)->exists();
            if ($belongsToTenant) {
                $user->update(['current_tenant_id' => $assessment->tenant_id]);

                return;
            }

            // Jika user belum memiliki tenant aktif sama sekali, daftarkan otomatis ke tenant asesmen
            if (! $user->current_tenant_id && $user->tenants()->count() === 0) {
                $user->tenants()->attach($assessment->tenant_id, ['role' => 'U']);
                $user->update(['current_tenant_id' => $assessment->tenant_id]);

                return;
            }

            // Cek apakah tenant user mengizinkan asesmen ini
            $userTenant = $user->currentTenant ?? $user->tenants()->first();
            if ($userTenant && $userTenant->isAssessmentVisible($assessment)) {
                return;
            }

            // Siswa terdaftar pada ekosistem berhak mengikuti ujian berstatus published
            if (! $user->isTeacher() && ! $user->isAdmin()) {
                if (! $user->tenants()->where('tenants.id', $assessment->tenant_id)->exists()) {
                    $user->tenants()->attach($assessment->tenant_id, ['role' => 'U']);
                }
                if (! $user->current_tenant_id) {
                    $user->update(['current_tenant_id' => $assessment->tenant_id]);
                }

                return;
            }

            abort(403, 'Anda tidak terdaftar pada ujian ini.');
        }
    }

    /**
     * Cek apakah siswa berhak memulai percobaan baru (memeriksa kuota berbayar, masa aktif 35 hari, dan max_attempts).
     *
     * @return array{allowed: bool, reason: string|null, message: string|null}
     */
    private function canStartNewAttempt(User $user, Assessment $assessment): array
    {
        $isStaff = $user->isSuperUser() || $user->isAdmin() || $user->isTeacher();
        if ($isStaff) {
            return ['allowed' => true, 'reason' => null, 'message' => null];
        }

        // 1. Validasi asesmen berbayar (Kuota & Masa Aktif 35 hari)
        if ($assessment->price_type === 'paid' && (float) $assessment->price > 0) {
            $access = $user->getAssessmentAccess($assessment);
            if (! $access) {
                return [
                    'allowed' => false,
                    'reason' => 'unpaid',
                    'message' => 'Silakan lakukan pembelian paket kuota terlebih dahulu untuk mengakses ujian CBT ini.',
                ];
            }

            if ($access->isExpired()) {
                return [
                    'allowed' => false,
                    'reason' => 'expired',
                    'message' => 'Masa aktif akses ujian Anda (35 hari) telah berakhir. Silakan beli paket baru untuk memperpanjang dan mengakumulasikan kuota Anda.',
                ];
            }

            if ($access->availableAttempts() <= 0) {
                return [
                    'allowed' => false,
                    'reason' => 'quota_empty',
                    'message' => 'Kuota kesempatan percobaan Anda telah habis. Silakan beli paket baru untuk melanjutkan.',
                ];
            }
        }

        // 2. Validasi Batas Maksimal Percobaan Asesmen (max_attempts)
        if ($assessment->max_attempts !== null) {
            $completedCount = ExamSession::query()
                ->where('assessment_id', $assessment->id)
                ->where('user_id', $user->id)
                ->where('status', 'completed')
                ->count();

            if ($completedCount >= $assessment->max_attempts) {
                return [
                    'allowed' => false,
                    'reason' => 'limit_reached',
                    'message' => "Anda telah mencapai batas maksimal ({$assessment->max_attempts}x percobaan) untuk ujian ini.",
                ];
            }
        }

        return ['allowed' => true, 'reason' => null, 'message' => null];
    }

    /**
     * Redirect to dashboard with error message.
     */
    private function bail(string $message): RedirectResponse
    {
        return redirect()->route('dashboard')->with('error', $message);
    }
}
