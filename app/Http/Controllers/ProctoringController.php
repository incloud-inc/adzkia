<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\ExamAnswer;
use App\Models\ExamSession;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProctoringController extends Controller
{
    /**
     * Tampilkan live dashboard pengawasan ujian bagi guru/pengawas.
     * Pengawas hanya dapat memantau murid yang terafiliasi dengan tenant yang sama.
     */
    public function index(Request $request, Assessment $assessment): View
    {
        /** @var User $user */
        $user = Auth::user();
        if (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser()) {
            abort(403, 'Akses terbatas untuk Pengawas / Guru.');
        }

        $currentTenant = $user->currentTenant ?? $user->tenants()->first();
        $currentTenantId = $currentTenant?->id;

        $query = ExamSession::with([
            'user',
            'proctor',
            'events' => fn ($q) => $q->whereIn('event_type', ['tab_hidden', 'window_blur', 'fullscreen_exit', 'page_exit', 'offline', 'copy', 'contextmenu'])
                ->latest('id')
                ->take(10),
        ])->where('assessment_id', $assessment->id);

        // AKTIFKAN FILTER ISOLASI TENANT (Mencegah Kebocoran Data Antar Sekolah/Tenant)
        if (! $user->isSuperUser()) {
            if (! $currentTenantId) {
                // Pengawas tanpa tenant tidak berhak melihat sesi manapun
                $query->whereRaw('1 = 0');
            } else {
                $query->affiliatedWithTenant($currentTenantId);
            }
        }

        $sessions = $query->latest('updated_at')->get();

        $lockedCount = $sessions->where('status', 'interrupted_locked')->count();
        $inProgressCount = $sessions->where('status', 'in_progress')->count();
        $completedCount = $sessions->where('status', 'completed')->count();
        $violationStudentsCount = $sessions->filter(function ($s) {
            $isVerified = (bool) data_get($s->meta, 'is_verified_by_proctor', false);

            return ! $isVerified && ((int) data_get($s->meta, 'violation_count', 0) > 0 || $s->events->isNotEmpty());
        })->count();

        return view('proctoring.index', compact(
            'assessment',
            'sessions',
            'lockedCount',
            'inProgressCount',
            'completedCount',
            'violationStudentsCount',
            'currentTenant'
        ));
    }

    /**
     * Simulasikan siswa terkunci (koneksi putus/ganti device) agar pengawas bisa mencoba fitur izin lanjut.
     * Hanya berlaku pada murid dalam tenant yang sama.
     */
    public function simulateLock(Request $request, Assessment $assessment): RedirectResponse|JsonResponse
    {
        /** @var User $user */
        $user = Auth::user();
        if (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser()) {
            abort(403, 'Hanya pengawas yang berwenang.');
        }

        $currentTenant = $user->currentTenant ?? $user->tenants()->first();
        $currentTenantId = $currentTenant?->id;

        $query = ExamSession::where('assessment_id', $assessment->id);

        if (! $user->isSuperUser()) {
            if (! $currentTenantId) {
                abort(403, 'Anda tidak terafiliasi dengan tenant pengawas.');
            }
            $query->affiliatedWithTenant($currentTenantId);
        }

        $session = (clone $query)->where('status', '!=', 'interrupted_locked')->first()
            ?? $query->first();

        if ($session) {
            $session->lock('Koneksi internet terputus saat pengerjaan soal (Simulasi Gangguan)');
        }

        $studentName = $session?->user?->name ?? 'Siswa';
        $message = $session
            ? "Simulasi aktif: Sesi {$studentName} berhasil dikunci. Silakan coba tekan tombol biru 'Izinkan untuk Lanjutkan'."
            : 'Tidak ada sesi murid di tenant Anda untuk disimulasikan.';

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => (bool) $session,
                'message' => $message,
                'session' => $session?->fresh(['user']),
            ]);
        }

        return redirect()->back()->with($session ? 'success' : 'error', $message);
    }

    /**
     * Buka kunci sesi ujian siswa yang terputus jaringan / ganti device.
     */
    public function unlock(Request $request, ExamSession $session): JsonResponse|RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();
        if (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser()) {
            abort(403, 'Hanya pengawas yang berwenang membuka kunci sesi ujian.');
        }

        $this->authorizeProctorSession($user, $session);

        $session->unlockBy($user);

        $studentName = $session->user->name ?? 'Siswa';
        $message = "Sesi ujian {$studentName} berhasil dibuka kembali. Siswa dapat melanjutkan pengerjaan tanpa kehilangan progres.";

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'session' => $session->fresh(['user', 'proctor']),
            ]);
        }

        return redirect()->back()->with('success', $message);
    }

    /**
     * Kunci sesi siswa jika terjadi anomali / pelanggaran / koneksi putus.
     */
    public function lock(Request $request, ExamSession $session): JsonResponse|RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();
        if (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser()) {
            abort(403, 'Hanya pengawas yang berwenang mengunci sesi ujian.');
        }

        $this->authorizeProctorSession($user, $session);

        $reason = $request->input('reason', 'Koneksi terputus / pergantian perangkat');
        $session->lock($reason);

        $studentName = $session->user->name ?? 'Siswa';
        $message = "Sesi ujian {$studentName} telah dikunci ({$reason}).";

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'session' => $session->fresh(['user']),
            ]);
        }

        return redirect()->back()->with('success', $message);
    }

    /**
     * 1. PIN: Generate 6-digit unlock PIN untuk sesi siswa.
     */
    public function generatePin(Request $request, ExamSession $session): JsonResponse|RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();
        if (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser()) {
            abort(403, 'Hanya pengawas yang berwenang mengambil tindakan.');
        }

        $this->authorizeProctorSession($user, $session);

        $pin = str_pad((string) random_int(100000, 999999), 6, '0', STR_PAD_LEFT);
        $meta = (array) ($session->meta ?? []);
        $meta['unlock_pin'] = $pin;
        $meta['unlock_pin_created_at'] = now()->toIso8601String();
        $meta['proctor_action'] = 'pin_generated';
        $meta['last_proctor_action_at'] = now()->toIso8601String();

        $session->forceFill(['meta' => $meta])->save();

        $studentName = $session->user->name ?? 'Siswa';
        $message = "PIN buka kunci untuk {$studentName} berhasil dibuat: {$pin}";

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'pin' => $pin,
                'message' => $message,
            ]);
        }

        return redirect()->back()->with('success', $message);
    }

    /**
     * 2. TIME: Potong waktu ujian siswa dan buka kunci layar.
     */
    public function cutTime(Request $request, ExamSession $session): JsonResponse|RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();
        if (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser()) {
            abort(403, 'Hanya pengawas yang berwenang mengambil tindakan.');
        }

        $this->authorizeProctorSession($user, $session);

        $minutes = max(1, (int) $request->input('minutes', 5));
        $meta = (array) ($session->meta ?? []);
        $meta['time_penalty_minutes'] = (int) ($meta['time_penalty_minutes'] ?? 0) + $minutes;
        $meta['last_penalty_minutes'] = $minutes;
        $meta['proctor_action'] = 'time_cut';
        $meta['last_proctor_action_at'] = now()->toIso8601String();
        unset($meta['is_violated_locked'], $meta['unlock_pin']);

        if ($session->expires_at) {
            $newExpires = $session->expires_at->subMinutes($minutes);
            $session->expires_at = $newExpires->isPast() ? now() : $newExpires;
        }

        $session->status = 'in_progress';
        $session->lock_reason = null;
        $session->unlocked_by = $user->id;
        $session->unlocked_at = now();
        $session->meta = $meta;
        $session->save();

        $studentName = $session->user->name ?? 'Siswa';
        $message = "Waktu ujian {$studentName} berhasil dipotong {$minutes} menit dan layar siswa dibuka kembali.";

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'remaining_seconds' => $session->remainingSeconds(),
            ]);
        }

        return redirect()->back()->with('success', $message);
    }

    /**
     * 3. POINT: Potong nilai ujian siswa dan buka kunci layar.
     */
    public function cutPoint(Request $request, ExamSession $session): JsonResponse|RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();
        if (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser()) {
            abort(403, 'Hanya pengawas yang berwenang mengambil tindakan.');
        }

        $this->authorizeProctorSession($user, $session);

        $points = max(0.5, (float) $request->input('points', 5));
        $meta = (array) ($session->meta ?? []);
        $meta['score_penalty'] = (float) ($meta['score_penalty'] ?? 0) + $points;
        $meta['last_penalty_points'] = $points;
        $meta['proctor_action'] = 'point_cut';
        $meta['last_proctor_action_at'] = now()->toIso8601String();
        unset($meta['is_violated_locked'], $meta['unlock_pin']);

        if ($session->score !== null) {
            $session->score = max(0.0, (float) $session->score - $points);
        }

        $session->status = 'in_progress';
        $session->lock_reason = null;
        $session->unlocked_by = $user->id;
        $session->unlocked_at = now();
        $session->meta = $meta;
        $session->save();

        $studentName = $session->user->name ?? 'Siswa';
        $message = "Poin nilai {$studentName} berhasil dipotong {$points} poin. Layar siswa dibuka dan sanksi pengurangan nilai akan diterapkan.";

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'score_penalty' => $meta['score_penalty'],
            ]);
        }

        return redirect()->back()->with('success', $message);
    }

    /**
     * 4. RESET: Kosongkan semua jawaban siswa dan kembalikan ke soal nomor 1. Waktu tetap berlanjut.
     */
    public function resetQuestions(Request $request, ExamSession $session): JsonResponse|RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();
        if (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser()) {
            abort(403, 'Hanya pengawas yang berwenang mengambil tindakan.');
        }

        $this->authorizeProctorSession($user, $session);

        // 1. Hapus semua jawaban tersimpan untuk sesi ini
        ExamAnswer::where('exam_session_id', $session->id)->delete();

        // 2. Kosongkan nilai & data submit jika ada
        $session->score = null;
        $session->completed_at = null;
        $session->submitted_ip = null;

        // 3. Update metadata sesi pengawasan
        $meta = (array) ($session->meta ?? []);
        $meta['proctor_action'] = 'reset';
        $meta['last_proctor_action_at'] = now()->toIso8601String();
        $meta['reset_count'] = ((int) ($meta['reset_count'] ?? 0)) + 1;
        unset($meta['is_violated_locked'], $meta['unlock_pin'], $meta['expired_sections'], $meta['score_penalty'], $meta['last_penalty_points']);

        // 4. Pastikan status in_progress dan kunci dibuka
        $session->status = 'in_progress';
        $session->lock_reason = null;
        $session->unlocked_by = $user->id;
        $session->unlocked_at = now();
        $session->meta = $meta;

        // 5. Pastikan waktu tetap berjalan: jika belum kadaluarsa, expires_at TIDAK DIUBAH!
        // Hanya jika sesi sebelumnya sudah kadaluarsa (isPast), berikan perpanjangan sesuai durasi asesmen
        if (! $session->expires_at || $session->expires_at->isPast()) {
            $duration = (int) ($session->assessment->duration_minutes ?: 60);
            $session->expires_at = now()->addMinutes($duration);
        }

        $session->save();

        $studentName = $session->user->name ?? 'Siswa';
        $message = "Nilai dan seluruh jawaban {$studentName} berhasil dikosongkan dan soal dikembalikan ke nomor 1. Waktu ujian tetap berjalan.";

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'reset_count' => $meta['reset_count'],
                'remaining_seconds' => $session->remainingSeconds(),
            ]);
        }

        return redirect()->back()->with('success', $message);
    }

    /**
     * 5. CANCEL: Hentikan sesi ujian siswa dan lempar kembali ke Gerbang Ujian.
     */
    public function cancelSession(Request $request, ExamSession $session): JsonResponse|RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();
        if (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser()) {
            abort(403, 'Hanya pengawas yang berwenang mengambil tindakan.');
        }

        $this->authorizeProctorSession($user, $session);

        $meta = (array) ($session->meta ?? []);
        $meta['proctor_action'] = 'cancelled';
        $meta['cancelled_at'] = now()->toIso8601String();
        $meta['cancelled_by'] = $user->id;

        $session->status = 'cancelled';
        $session->lock_reason = 'Sesi ujian dihentikan oleh pengawas ujian.';
        $session->meta = $meta;
        $session->save();

        $studentName = $session->user->name ?? 'Siswa';
        $message = "Sesi ujian {$studentName} telah dihentikan. Siswa dilempar kembali ke Gerbang Ujian.";

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'redirect_url' => route('exam.gate.show', ['assessment' => $session->assessment_id]),
            ]);
        }

        return redirect()->back()->with('success', $message);
    }

    /**
     * Verifikasi / Sahkan sesi yang sudah selesai (hapus flag peringatan).
     */
    public function verifySession(Request $request, ExamSession $session): JsonResponse|RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();
        if (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser()) {
            abort(403, 'Hanya pengawas yang berwenang mengambil tindakan.');
        }

        $this->authorizeProctorSession($user, $session);

        $meta = (array) ($session->meta ?? []);
        $meta['is_verified_by_proctor'] = true;
        $meta['verified_by'] = $user->id;
        $meta['verified_at'] = now()->toIso8601String();

        $session->meta = $meta;
        $session->save();

        $studentName = $session->user->name ?? 'Siswa';
        $message = "Sesi {$studentName} telah diverifikasi dan disahkan oleh pengawas.";

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $message,
            ]);
        }

        return redirect()->back()->with('success', $message);
    }

    /**
     * Validasi kepemilikan tenant: Pengawas non-superuser dilarang mengawasi/mengubah sesi murid luar tenant.
     */
    private function authorizeProctorSession(User $user, ExamSession $session): void
    {
        if ($user->isSuperUser()) {
            return;
        }

        // Pembuat asesmen berhak penuh mengawasi seluruh siswa di asesmennya
        if ($session->assessment && (int) $session->assessment->created_by === (int) $user->id) {
            return;
        }

        $currentTenant = $user->currentTenant ?? $user->tenants()->first();
        $currentTenantId = $currentTenant?->id;

        // Pengawas dari tenant penyelenggara asesmen berhak mengawasi seluruh peserta ujian
        if ($currentTenantId && $session->assessment && (int) $session->assessment->tenant_id === (int) $currentTenantId) {
            return;
        }

        if (! $currentTenantId) {
            abort(403, 'Akses ditolak: Anda tidak terafiliasi dengan tenant manapun.');
        }

        // Cek apakah sesi ini milik tenant pengawas ATAU siswa terafiliasi dengan tenant pengawas
        $sessionTenantId = $session->tenant_id;
        $studentTenantIds = $session->user?->tenants->pluck('id')->all() ?? [];
        if ($session->user?->current_tenant_id) {
            $studentTenantIds[] = $session->user->current_tenant_id;
        }

        $isAffiliated = ($sessionTenantId && (int) $sessionTenantId === (int) $currentTenantId)
            || in_array((int) $currentTenantId, array_map('intval', $studentTenantIds), true);

        abort_unless($isAffiliated, 403, 'Akses ditolak: Murid tidak terafiliasi dengan institusi/tenant Anda.');
    }
}
