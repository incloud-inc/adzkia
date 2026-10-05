<?php

use App\Http\Controllers\AssessmentAnalyticsController;
use App\Http\Controllers\AssessmentExplanationController;
use App\Http\Controllers\AssessmentWizardController;
use App\Http\Controllers\Auth\ForceChangePasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DichotomyPresetController;
use App\Http\Controllers\Exam\ExamGateController;
use App\Http\Controllers\Exam\ExamResultController;
use App\Http\Controllers\Exam\ExamWorkspaceController;
use App\Http\Controllers\GradeLevelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentWebhookController;
use App\Http\Controllers\PostalCodeController;
use App\Http\Controllers\ProctoringController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionBankController;
use App\Http\Controllers\QuestionGeneratorController;
use App\Http\Controllers\SalesReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherGradingController;
use App\Http\Controllers\TenantBrandingController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\TenantManagementController;
use App\Http\Controllers\TenantWalletController;
use App\Http\Middleware\CheckOwnerRole;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Route;

// 1. Sub-Domain Routing (Portal Tenant & Profil Publik)
$domain = config('app.url_base_domain', 'localhost');
Route::domain('{subdomain}.'.$domain)->middleware('web')->group(function () {
    Route::get('/', [TenantController::class, 'showPublic'])->name('tenant.portal');

    Route::get('/@{username}', [ProfileController::class, 'showPublicTenant'])->name('tenant.student.profile');
});

// 2. Global Publik (Redirect Hybrid / Global View)
Route::middleware('web')->group(function () {
    Route::get('/@{username}', [ProfileController::class, 'redirectPublicGlobal'])->name('global.student.profile');
    Route::get('/portal/{subdomain}', [TenantController::class, 'showPublic'])->name('tenant.portal.direct');
});

// 3. API Pencarian Kodepos Lokal (AJAX Throttled)
Route::get('/api/postal-codes/search', [PostalCodeController::class, 'search'])->middleware('throttle:60,1')->name('api.postal-codes');

// 4. Payment Gateway Webhooks (B2B2C, No CSRF)
Route::post('api/webhooks/payment/duitku', [PaymentWebhookController::class, 'duitku'])->name('payment.webhook.duitku');
Route::post('api/webhooks/payment/tripay', [PaymentWebhookController::class, 'tripay'])->name('payment.webhook.tripay');
Route::post('api/webhooks/payment/generic', [PaymentWebhookController::class, 'generic'])->name('payment.webhook.generic');

Route::middleware(['auth'])->group(function () {
    Route::get('/run-storage-link', function () {
        abort_unless(auth()->user()?->isSuperUser(), 403, 'Akses ditolak.');
        $kernel = app()->make(Kernel::class);
        $kernel->call('storage:link');

        return response()->json(['output' => $kernel->output()]);
    });
});

// ─── Guest Routes (Unauthenticated) ───────────────────────────
Route::middleware('guest')->group(function () {
    // Login
    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);

    // Register (invite-only)
    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);

    // Password Reset
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

// ─── Google OAuth (accessible for both guest & auth) ──────────
Route::get('auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [SocialiteController::class, 'handleGoogleCallback'])->name('auth.google.callback');

// ─── Email Verification (Disabled - Redirect to Dashboard) ────
Route::middleware('auth')->group(function () {
    Route::get('verify-email', fn () => redirect()->route('dashboard'))->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', fn () => redirect()->route('dashboard'))->name('verification.verify');
    Route::post('email/verification-notification', fn () => redirect()->route('dashboard'))->name('verification.send');
});

// ─── Authenticated Routes (Email Verification Disabled) ───────
Route::middleware(['auth'])->group(function () {
    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');

    // Wajib Ganti Password Bawaan (Force Change Password)
    Route::get('force-change-password', [ForceChangePasswordController::class, 'show'])->name('password.force_change');
    Route::post('force-change-password', [ForceChangePasswordController::class, 'update'])->name('password.force_change.update');

    Route::get('select-tenant', [TenantController::class, 'select'])->name('tenant.select');
    Route::post('switch-tenant/{tenant}', [TenantController::class, 'switch'])->name('tenant.switch');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard', [DashboardController::class, 'index']);

    // Dashboard User CRUD (Admin manages guru/siswa/admin within tenant)
    Route::post('dashboard/users', [DashboardUserController::class, 'store'])->name('dashboard.users.store');
    Route::get('dashboard/users/{user}', [DashboardUserController::class, 'show'])->name('dashboard.users.show');
    Route::put('dashboard/users/{user}', [DashboardUserController::class, 'update'])->name('dashboard.users.update');
    Route::delete('dashboard/users/{user}', [DashboardUserController::class, 'destroy'])->name('dashboard.users.destroy');

    Route::patch('tenants/{tenant}/plan', [TenantManagementController::class, 'updatePlan'])->name('tenants.update-plan');
    Route::resource('tenants', TenantManagementController::class);
    Route::get('tenants/{tenant}/branding', [TenantBrandingController::class, 'edit'])->name('tenants.branding.edit');
    Route::put('tenants/{tenant}/branding', [TenantBrandingController::class, 'update'])->name('tenants.branding.update');
    Route::post('tenants/{tenant}/domains', [TenantBrandingController::class, 'addDomain'])->name('tenants.domains.store');
    Route::delete('tenants/{tenant}/domains/{domain}', [TenantBrandingController::class, 'deleteDomain'])->name('tenants.domains.destroy');

    // Pengaturan Profil Pribadi & Keamanan
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::post('profile/verify-whatsapp', [ProfileController::class, 'verifyWhatsapp'])->name('profile.verify.whatsapp');
    Route::post('profile/verify-email', [ProfileController::class, 'verifyEmail'])->name('profile.verify.email');
    Route::post('profile/unverify-contact', [ProfileController::class, 'unverifyContact'])->name('profile.unverify.contact');

    // Sidebar Menus (Owner)
    Route::middleware([CheckOwnerRole::class])->group(function () {
        Route::resource('grade-levels', GradeLevelController::class)->except(['create', 'show', 'edit']);
        Route::resource('dichotomy-presets', DichotomyPresetController::class)->except(['create', 'show', 'edit']);
    });

    // Mata Pelajaran (Subjects)
    Route::resource('subjects', SubjectController::class)->except(['create', 'show', 'edit']);

    // Bank Soal (Question Banks)
    Route::resource('question-banks', QuestionBankController::class);

    // AI Question Generator Studio (DeepSeek AI)
    Route::get('question-generator', [QuestionGeneratorController::class, 'index'])->name('question-generator.index');
    Route::post('question-generator/generate', [QuestionGeneratorController::class, 'generate'])->name('question-generator.generate');
    Route::post('question-generator/export-word', [QuestionGeneratorController::class, 'exportWord'])->name('question-generator.export-word');
    Route::post('question-generator/save-to-bank', [QuestionGeneratorController::class, 'saveToBank'])->name('question-generator.save-to-bank');
    Route::post('question-generator/to-wizard', [QuestionGeneratorController::class, 'toWizard'])->name('question-generator.to-wizard');

    // Assessment Engine & 8-Step Wizard
    Route::get('assessments/wizard', [AssessmentWizardController::class, 'create'])->name('assessments.wizard');
    Route::post('assessments/upload-image', [AssessmentWizardController::class, 'uploadImage'])->name('assessments.upload-image');
    Route::post('assessments/upload-media', [AssessmentWizardController::class, 'uploadMedia'])->name('assessments.upload-media');
    Route::get('assessments/download-template', [AssessmentWizardController::class, 'downloadTemplate'])->name('assessments.download-template');
    Route::post('assessments/import-word', [AssessmentWizardController::class, 'importWord'])->name('assessments.import-word');
    Route::get('assessments/{assessment}/result-preview', [AssessmentWizardController::class, 'resultPreview'])->name('assessments.result-preview');
    Route::patch('assessments/{assessment}/toggle-mandatory', [AssessmentWizardController::class, 'toggleMandatory'])->name('assessments.toggle-mandatory');

    // AI Explanation Generator (DeepSeek)
    Route::post('assessments/{assessment}/generate-explanations', [AssessmentExplanationController::class, 'generateAll'])->name('assessments.generate-explanations');
    Route::post('questions/{question}/regenerate-explanation', [AssessmentExplanationController::class, 'regenerateQuestion'])->name('questions.regenerate-explanation');
    Route::match(['put', 'patch', 'post'], 'questions/{question}/explanation', [AssessmentExplanationController::class, 'updateExplanation'])->name('questions.explanation.update');
    Route::get('questions/{question}/explanation-status', [AssessmentExplanationController::class, 'status'])->name('questions.explanation-status');

    Route::resource('assessments', AssessmentWizardController::class);

    // Proctoring & Pengawasan Ujian Guru
    Route::get('assessments/{assessment}/proctoring', [ProctoringController::class, 'index'])->name('assessments.proctoring');
    Route::post('assessments/{assessment}/proctoring/simulate-lock', [ProctoringController::class, 'simulateLock'])->name('assessments.proctoring.simulate_lock');
    Route::post('proctoring/sessions/{session}/unlock', [ProctoringController::class, 'unlock'])->name('proctoring.sessions.unlock');
    Route::post('proctoring/sessions/{session}/lock', [ProctoringController::class, 'lock'])->name('proctoring.sessions.lock');
    Route::post('proctoring/sessions/{session}/generate-pin', [ProctoringController::class, 'generatePin'])->name('proctoring.sessions.generate_pin');
    Route::post('proctoring/sessions/{session}/cut-time', [ProctoringController::class, 'cutTime'])->name('proctoring.sessions.cut_time');
    Route::post('proctoring/sessions/{session}/cut-point', [ProctoringController::class, 'cutPoint'])->name('proctoring.sessions.cut_point');
    Route::post('proctoring/sessions/{session}/reset-questions', [ProctoringController::class, 'resetQuestions'])->name('proctoring.sessions.reset_questions');
    Route::post('proctoring/sessions/{session}/cancel', [ProctoringController::class, 'cancelSession'])->name('proctoring.sessions.cancel');
    Route::post('proctoring/sessions/{session}/verify', [ProctoringController::class, 'verifySession'])->name('proctoring.sessions.verify');

    // Panel Penilaian & Koreksi Guru (Teacher Grading & Final Score Release)
    Route::get('assessments/{assessment}/grading', [TeacherGradingController::class, 'index'])->name('assessments.grading');
    Route::get('assessments/{assessment}/grading/{session}', [TeacherGradingController::class, 'show'])->name('assessments.grading.session');
    Route::post('assessments/{assessment}/grading/{session}', [TeacherGradingController::class, 'grade'])->name('assessments.grading.grade');

    // Analisis Butir Soal & Rekap Nilai Asesmen (Reporting & Analytics)
    Route::get('assessments/{assessment}/analytics', [AssessmentAnalyticsController::class, 'index'])->name('assessments.analytics');
    Route::get('assessments/{assessment}/analytics/preview', [AssessmentAnalyticsController::class, 'previewMatrix'])->name('assessments.analytics.preview');
    Route::get('assessments/{assessment}/analytics/export', [AssessmentAnalyticsController::class, 'exportExcel'])->name('assessments.analytics.export');

    // ─── CBT Exam Engine ────────────────────────────────────────
    // Token shortcut: /exam/ADZ456 → resolve ke gate
    Route::get('/exam/{token}', [ExamGateController::class, 'resolve'])
        ->name('exam.resolve')
        ->where('token', '[A-Za-z0-9\-]{4,64}');

    // Gate: tampilkan halaman verifikasi peserta
    Route::get('/exam/start/{assessment}', [ExamGateController::class, 'show'])
        ->name('exam.gate.show');

    // Mulai / resume ujian
    Route::post('/exam/start/{assessment}', [ExamGateController::class, 'start'])
        ->name('exam.start')
        ->middleware('throttle:exam-start');

    // Workspace: Ruang Ujian CBT (Sprint C)
    Route::get('/exam/workspace/{session}', [ExamWorkspaceController::class, 'show'])
        ->name('exam.workspace');

    // API: Auto-save jawaban (debounce dari client)
    Route::post('/exam/session/{session}/answer', [ExamWorkspaceController::class, 'saveAnswer'])
        ->name('exam.session.answer')
        ->middleware('throttle:exam-answer');

    // API: Log event anti-cheat
    Route::post('/exam/session/{session}/event', [ExamWorkspaceController::class, 'logEvent'])
        ->name('exam.session.event')
        ->middleware('throttle:exam-event');

    // API: Kumpulkan (submit) ujian
    Route::post('/exam/session/{session}/submit', [ExamWorkspaceController::class, 'submit'])
        ->name('exam.session.submit')
        ->middleware('throttle:exam-submit');

    // API: Cek status kunci ujian & polling aksi pengawas
    Route::get('/exam/session/{session}/lock-status', [ExamWorkspaceController::class, 'checkLockStatus'])
        ->name('exam.session.lock_status');

    // API: Polling status auto-grading (Phase 2)
    Route::get('/exam/session/{session}/grading-status', [ExamWorkspaceController::class, 'checkGradingStatus'])
        ->name('exam.session.grading_status');

    // API: Verifikasi PIN buka kunci siswa
    Route::post('/exam/session/{session}/verify-pin', [ExamWorkspaceController::class, 'verifyPin'])
        ->name('exam.session.verify_pin');

    // Riwayat Ujian & Hasil Siswa
    Route::get('/exam-history', [ExamResultController::class, 'history'])
        ->name('exam.history');

    // Halaman Pasca Ujian & Rekap Hasil Siswa (Sprint D)
    Route::get('/exam/result/{session}', [ExamResultController::class, 'show'])
        ->name('exam.result');

    // Halaman Analisa Ujian Siswa (Exam Analytics)
    Route::get('/exam/analysis/{session}', [ExamResultController::class, 'analysis'])
        ->name('exam.analysis');

    // On-demand AI Explanation Generator untuk Siswa
    Route::post('/exam/session/{session}/question/{question}/ai-explanation', [ExamResultController::class, 'generateAiExplanation'])
        ->name('exam.question.ai-explanation');

    // ─── Orders & Assessment Purchases (B2B2C) ────────────────────
    Route::get('assessments/{assessment}/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
    Route::post('assessments/{assessment}/checkout', [OrderController::class, 'store'])->name('orders.store');
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('orders/{order}/status', [OrderController::class, 'checkStatus'])->name('orders.status');
    Route::post('orders/{order}/simulate-pay', [OrderController::class, 'simulatePayment'])->name('orders.simulate-pay');

    // ─── Dompet & Payout Tenant ──────────────────────────────────
    Route::get('wallet', [TenantWalletController::class, 'index'])->name('wallet.index');
    Route::post('wallet/payout', [TenantWalletController::class, 'requestPayout'])->name('wallet.payout.request');
    Route::get('admin/payouts', [TenantWalletController::class, 'adminPayouts'])->name('wallet.admin.payouts');
    Route::post('admin/payouts/{payoutRequest}/approve', [TenantWalletController::class, 'approvePayout'])->name('wallet.admin.approve');
    Route::post('admin/payouts/{payoutRequest}/reject', [TenantWalletController::class, 'rejectPayout'])->name('wallet.admin.reject');

    // ─── Laporan Penjualan & Pembagian Hasil ─────────────────────
    Route::get('reports/sales', [SalesReportController::class, 'index'])->name('reports.sales');
    Route::get('reports/sales/export', [SalesReportController::class, 'exportCsv'])->name('reports.sales.export');

    // ─── Pengaturan Sistem & Payment Gateway (Owner Only) ────────
    Route::middleware([CheckOwnerRole::class])->group(function () {
        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
    });
});
