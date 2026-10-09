<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\ExamSession;
use App\Models\Question;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        $tenant = $user->currentTenant ?? $user->tenants()->first();
        $assessmentGroups = $this->getProfileAssessments($tenant);

        return view('profile.edit', [
            'user' => $user,
            'tenant' => $tenant,
            'publicAssessments' => $assessmentGroups['umum'],
            'umumAssessments' => $assessmentGroups['umum'],
            'sdAssessments' => $assessmentGroups['sd'],
            'smpAssessments' => $assessmentGroups['smp'],
            'smaAssessments' => $assessmentGroups['sma'],
            'showGradeSd' => $tenant ? $tenant->showGrade('sd') : true,
            'showGradeSmp' => $tenant ? $tenant->showGrade('smp') : true,
            'showGradeSma' => $tenant ? $tenant->showGrade('sma') : true,
            'showGradeTkaSd' => $tenant ? $tenant->showGrade('tka_sd') : true,
            'showGradeTkaSmp' => $tenant ? $tenant->showGrade('tka_smp') : true,
            'showGradeTkaSma' => $tenant ? $tenant->showGrade('tka_sma') : true,
            'showGradeUtbk' => $tenant ? $tenant->showGrade('utbk') : true,
            'showGradeSkd' => $tenant ? $tenant->showGrade('skd') : true,
        ]);
    }

    public function getPublicAssessments(?Tenant $tenant = null)
    {
        return $this->getProfileAssessments($tenant)['umum'];
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        // Bersihkan prefix @ dan whitespace pada input username jika ada
        if ($request->filled('username')) {
            $cleaned = ltrim(trim($request->username), '@');
            $request->merge(['username' => $cleaned]);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => [
                'nullable',
                'string',
                'min:3',
                'max:50',
                'regex:/^[a-zA-Z0-9._-]+$/',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            'whatsapp_number' => 'nullable|string|max:20',
            'postal_code' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:500',
            'bio' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|max:2048',
            'cover_photo' => 'nullable|image|max:5120',
        ], [
            'username.regex' => 'The username field must only contain letters, numbers, dashes, underscores, and dots (tanpa spasi).',
            'username.unique' => 'Username ini sudah digunakan oleh pengguna lain.',
            'username.min' => 'Username minimal 3 karakter.',
            'profile_photo.image' => 'File foto profil harus berupa gambar valid.',
            'profile_photo.max' => 'Ukuran foto profil maksimal 2MB.',
            'cover_photo.image' => 'File gambar cover harus berupa gambar valid.',
            'cover_photo.max' => 'Ukuran gambar cover maksimal 5MB.',
        ]);

        $disk = config('filesystems.upload_disk', 'public');
        if ($disk === 'r2' && (! config('filesystems.disks.r2.key') || ! config('filesystems.disks.r2.secret'))) {
            $disk = 'public';
        }

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo_path) {
                if (Storage::disk($disk)->exists($user->profile_photo_path)) {
                    Storage::disk($disk)->delete($user->profile_photo_path);
                } elseif (Storage::disk('public')->exists($user->profile_photo_path)) {
                    Storage::disk('public')->delete($user->profile_photo_path);
                }
            }
            $validated['profile_photo_path'] = $request->file('profile_photo')->store('profiles', $disk);
        }

        if ($request->hasFile('cover_photo')) {
            if ($user->cover_photo_path) {
                if (Storage::disk($disk)->exists($user->cover_photo_path)) {
                    Storage::disk($disk)->delete($user->cover_photo_path);
                } elseif (Storage::disk('public')->exists($user->cover_photo_path)) {
                    Storage::disk('public')->delete($user->cover_photo_path);
                }
            }
            $validated['cover_photo_path'] = $request->file('cover_photo')->store('covers', $disk);
        }

        // Mock verification toggle strictly for local development
        if (app()->environment('local')) {
            if ($request->has('mock_verify_wa')) {
                $validated['whatsapp_verified_at'] = now();
            } elseif ($request->has('mock_unverify_wa')) {
                $validated['whatsapp_verified_at'] = null;
            }
        }

        $user->update($validated);

        return redirect()->back(fallback: route('profile.edit'))
            ->with('success', 'Profil berhasil diperbarui.')
            ->with('active_tab', 'profile');
    }

    /**
     * Perbarui kata sandi akun pengguna.
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'current_password.required' => 'Kata sandi saat ini wajib diisi.',
            'current_password.current_password' => 'Kata sandi saat ini yang Anda masukkan salah.',
            'password.required' => 'Kata sandi baru wajib diisi.',
            'password.min' => 'Kata sandi baru minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi baru tidak cocok.',
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        Log::info('Security Audit: User password changed', [
            'user_id' => $request->user()->id,
            'ip' => $request->ip(),
            'timestamp' => now()->toIso8601String(),
        ]);

        return redirect()->back(fallback: route('profile.edit'))
            ->with('success_password', 'Kata sandi akun Anda berhasil diperbarui dengan aman.')
            ->with('active_tab', 'profile');
    }

    /**
     * Verifikasi nomor WhatsApp akun pengguna.
     */
    public function verifyWhatsapp(Request $request)
    {
        $user = auth()->user();

        if ($request->filled('whatsapp_number')) {
            $user->update(['whatsapp_number' => $request->whatsapp_number]);
        }

        if (! $user->whatsapp_number) {
            return redirect()->back(fallback: route('profile.edit'))
                ->with('error_contact', 'Silakan masukkan nomor WhatsApp Anda terlebih dahulu sebelum memverifikasi.')
                ->with('active_tab', 'profile');
        }

        $user->update([
            'whatsapp_verified_at' => now(),
        ]);

        return redirect()->back(fallback: route('profile.edit'))
            ->with('success_contact', 'Nomor WhatsApp berhasil diverifikasi.')
            ->with('active_tab', 'profile');
    }

    /**
     * Verifikasi alamat email akun pengguna.
     */
    public function verifyEmail(Request $request)
    {
        $user = auth()->user();

        $user->update([
            'email_verified_at' => now(),
        ]);

        return redirect()->back(fallback: route('profile.edit'))
            ->with('success_contact', 'Alamat email akun Anda berhasil diverifikasi.')
            ->with('active_tab', 'profile');
    }

    /**
     * Reset / batalkan verifikasi kontak untuk kebutuhan pengujian.
     */
    public function unverifyContact(Request $request)
    {
        $user = auth()->user();
        $type = $request->input('type');

        if ($type === 'whatsapp') {
            $user->update(['whatsapp_verified_at' => null]);
            $msg = 'Status verifikasi WhatsApp berhasil di-reset.';
        } elseif ($type === 'email') {
            $user->update(['email_verified_at' => null]);
            $msg = 'Status verifikasi email berhasil di-reset.';
        } else {
            $user->update([
                'whatsapp_verified_at' => null,
                'email_verified_at' => null,
            ]);
            $msg = 'Status verifikasi kontak berhasil di-reset.';
        }

        return redirect()->back(fallback: route('profile.edit'))
            ->with('info_contact', $msg)
            ->with('active_tab', 'profile');
    }

    /**
     * Cari user berdasarkan username, ID numerik, atau email.
     * Kompatibel lintas database (PostgreSQL, MySQL, SQLite) tanpa SQL raw vendor-specific.
     */
    protected function findUserByUsername(string $username): User
    {
        $query = User::where('username', $username);

        if (is_numeric($username)) {
            $query->orWhere('id', (int) $username);
        }

        $query->orWhere('email', $username)
            ->orWhere('email', 'like', $username.'@%');

        $user = $query->first();

        if (! $user) {
            abort(404, 'User tidak ditemukan.');
        }

        if (! $user->username) {
            $prefix = explode('@', $user->email)[0];
            $cleanUsername = Str::slug($prefix, '_');
            $user->updateQuietly(['username' => $cleanUsername]);
        }

        return $user;
    }

    /**
     * Tampilan profil publik ketika diakses dari subdomain tenant.
     * Route: {subdomain}.domain.com/@{username}
     */
    public function showPublicTenant(Request $request, ?string $subdomain = null, ?string $username = null)
    {
        $username = $username ?? $request->route('username');
        $subdomain = $subdomain ?? $request->route('subdomain');

        if (! $subdomain) {
            $host = $request->getHost();
            $baseDomain = config('app.url_base_domain', 'localhost');
            $subdomain = str_replace('.'.$baseDomain, '', $host);
        }

        $user = $this->findUserByUsername((string) $username);

        $tenant = Tenant::where('subdomain', $subdomain)->first();

        if ($tenant) {
            $isMember = $user->tenants()->where('tenant_id', $tenant->id)->exists();
            if (! $isMember) {
                abort(404, 'User tidak terdaftar pada institusi/tenant ini.');
            }
        }

        return $this->renderProfileView($user, $tenant);
    }

    /**
     * Tampilan profil publik ketika diakses dari domain utama.
     * http://localhost:8000/@{username}
     */
    public function redirectPublicGlobal(Request $request, string $username)
    {
        $user = $this->findUserByUsername($username);

        // Cari tenant aktif atau tenant pertama milik user
        $tenant = $user->currentTenant ?? $user->tenants()->first();

        $host = $request->getHost();
        $baseDomain = config('app.url_base_domain', 'localhost');

        // Pada localhost / 127.0.0.1, jangan redirect ke subdomain.localhost karena Windows DNS tidak mendukung wildcard subdomain
        $isLocalhost = in_array($host, ['localhost', '127.0.0.1']) || str_ends_with($host, '.local') || $baseDomain === 'localhost';

        if (! $isLocalhost && $tenant && $tenant->subdomain) {
            $scheme = $request->getScheme();
            $port = ($request->getPort() != 80 && $request->getPort() != 443) ? ':'.$request->getPort() : '';
            $url = "{$scheme}://{$tenant->subdomain}.{$baseDomain}{$port}/@{$user->username}";

            return redirect()->to($url);
        }

        return $this->renderProfileView($user, $tenant);
    }

    /**
     * Render view profil publik dengan payload Card 1, Card 2 (Umum), dan Card 3,4,5 (SD, SMP, SMA).
     */
    protected function renderProfileView(User $user, ?Tenant $tenant)
    {
        if (! $user->hasPublicProfile()) {
            abort(404, 'Halaman profil publik tidak aktif untuk Administrator dan Pemilik Platform (Owner). Halaman profil publik hanya tersedia untuk Guru dan Siswa.');
        }

        $assessmentGroups = $this->getProfileAssessments($tenant);

        // Card 1: Statistik Siswa & Guru (Data Riil)
        $isTeacher = $user->isTeacher();
        $stats = $this->calculateProfileStats($user, $tenant, $isTeacher);
        $completedCount = $stats['completedCount'];
        $totalScore = $stats['totalScore'];
        $rank = $stats['rank'];

        // Fetch paid assessments for the logged-in user if any
        $paidAssessments = collect();
        if (auth()->check()) {
            $authUserId = auth()->id();
            $paidAssessments = Assessment::where('status', 'published')
                ->where('price_type', 'paid')
                ->with(['subject', 'creator', 'accesses' => fn ($q) => $q->where('user_id', $authUserId)])
                ->withCount(['sections', 'questions'])
                ->leftJoin('user_assessment_accesses', function ($join) use ($authUserId) {
                    $join->on('user_assessment_accesses.assessment_id', '=', 'assessments.id')
                        ->where('user_assessment_accesses.user_id', '=', $authUserId);
                })
                ->select('assessments.*')
                ->orderByRaw('CASE WHEN user_assessment_accesses.id IS NOT NULL THEN 0 ELSE 1 END ASC')
                ->orderByRaw('CASE WHEN user_assessment_accesses.expires_at IS NULL THEN 1 ELSE 0 END ASC')
                ->orderBy('user_assessment_accesses.expires_at', 'desc')
                ->orderByRaw('(COALESCE(user_assessment_accesses.quota_attempts, 0) - COALESCE(user_assessment_accesses.attempts_used, 0)) DESC')
                ->orderBy('assessments.id', 'desc')
                ->take(30)
                ->get();

            $historyUserId = (auth()->check() && auth()->id() === $user->id) ? auth()->id() : $user->id;
            $historySessions = ExamSession::with(['assessment', 'assessment.subject'])
                ->where('user_id', $historyUserId)
                ->whereIn('status', ['completed', 'in_progress'])
                ->orderByRaw("CASE WHEN status = 'in_progress' THEN 0 ELSE 1 END ASC")
                ->orderBy('created_at', 'desc')
                ->take(50)
                ->get();
        } else {
            $paidAssessments = Assessment::where('status', 'published')
                ->where('price_type', 'paid')
                ->with(['subject', 'creator'])
                ->withCount(['sections', 'questions'])
                ->orderBy('id', 'desc')
                ->take(30)
                ->get();

            $historySessions = ExamSession::with(['assessment', 'assessment.subject'])
                ->where('user_id', $user->id)
                ->where('status', 'completed')
                ->orderBy('completed_at', 'desc')
                ->take(30)
                ->get();
        }

        // Card 3, 4, 5 ON/OFF dari Tenant Admin
        $showGradeSd = $tenant ? $tenant->showGrade('sd') : true;
        $showGradeSmp = $tenant ? $tenant->showGrade('smp') : true;
        $showGradeSma = $tenant ? $tenant->showGrade('sma') : true;
        $showGradeTkaSd = $tenant ? $tenant->showGrade('tka_sd') : true;
        $showGradeTkaSmp = $tenant ? $tenant->showGrade('tka_smp') : true;
        $showGradeTkaSma = $tenant ? $tenant->showGrade('tka_sma') : true;
        $showGradeUtbk = $tenant ? $tenant->showGrade('utbk') : true;
        $showGradeSkd = $tenant ? $tenant->showGrade('skd') : true;

        return view('profile.public', [
            'user' => $user,
            'tenant' => $tenant,
            'completedCount' => $completedCount,
            'totalScore' => $totalScore,
            'rank' => $rank,
            'isTeacher' => $isTeacher,
            'paidAssessments' => $paidAssessments,
            'historySessions' => $historySessions,
            'umumAssessments' => $assessmentGroups['umum'],
            'sdAssessments' => $assessmentGroups['sd'],
            'smpAssessments' => $assessmentGroups['smp'],
            'smaAssessments' => $assessmentGroups['sma'],
            'showGradeSd' => $showGradeSd,
            'showGradeSmp' => $showGradeSmp,
            'showGradeSma' => $showGradeSma,
            'showGradeTkaSd' => $showGradeTkaSd,
            'showGradeTkaSmp' => $showGradeTkaSmp,
            'showGradeTkaSma' => $showGradeTkaSma,
            'showGradeUtbk' => $showGradeUtbk,
            'showGradeSkd' => $showGradeSkd,
            'tkaSdAssessments' => $assessmentGroups['tka_sd'],
            'tkaSmpAssessments' => $assessmentGroups['tka_smp'],
            'tkaSmaAssessments' => $assessmentGroups['tka_sma'],
            'utbkAssessments' => $assessmentGroups['utbk'],
            'skdAssessments' => $assessmentGroups['skd'],
        ]);
    }

    /**
     * Hitung statistik riil siswa / guru untuk Card 1.
     *
     * @return array{completedCount: int, totalScore: string, rank: ?int}
     */
    protected function calculateProfileStats(User $user, ?Tenant $tenant, bool $isTeacher): array
    {
        if ($isTeacher) {
            $completedCount = $user->assessments()
                ->when($tenant, fn ($q) => $q->where('tenant_id', $tenant->id))
                ->count();

            $totalQuestions = Question::whereHas('assessmentSection.assessment', function ($q) use ($user, $tenant) {
                $q->where('created_by', $user->id)
                    ->when($tenant, fn ($tq) => $tq->where('tenant_id', $tenant->id));
            })->count();

            return [
                'completedCount' => $completedCount,
                'totalScore' => $totalQuestions > 0 ? (string) $totalQuestions : '-',
                'rank' => null,
            ];
        }

        // Statistik Siswa / Murid:
        $sessionsQuery = ExamSession::where('user_id', $user->id)
            ->where('status', 'completed');

        if ($tenant) {
            $hasTenantSessions = (clone $sessionsQuery)->where('tenant_id', $tenant->id)->exists();
            if ($hasTenantSessions) {
                $sessionsQuery->where('tenant_id', $tenant->id);
            }
        }

        $completedCount = (clone $sessionsQuery)->count();
        $rawTotalScore = (float) (clone $sessionsQuery)->sum('score');

        if ($completedCount > 0) {
            $formattedTotalScore = (fmod($rawTotalScore, 1) === 0.0)
                ? (string) (int) $rawTotalScore
                : (string) round($rawTotalScore, 1);
        } else {
            $formattedTotalScore = '0';
        }

        $rank = null;
        if ($completedCount > 0) {
            $scoresSubquery = DB::table('exam_sessions')
                ->select('user_id', DB::raw('SUM(score) as sum_score'))
                ->where('status', 'completed')
                ->when($tenant, fn ($q) => $q->where('tenant_id', $tenant->id))
                ->groupBy('user_id');

            $betterRankCount = DB::query()
                ->fromSub($scoresSubquery, 'student_scores')
                ->where('sum_score', '>', $rawTotalScore)
                ->count();

            $rank = $betterRankCount + 1;
        }

        return [
            'completedCount' => $completedCount,
            'totalScore' => $formattedTotalScore,
            'rank' => $rank,
        ];
    }

    /**
     * Ambil asesmen dan kelompokkan ke UMUM (Card 2), SD (Card 3), SMP (Card 4), SMA (Card 5).
     */
    protected function getProfileAssessments(?Tenant $tenant): array
    {
        return Assessment::getGroupedAssessments($tenant);
    }
}
