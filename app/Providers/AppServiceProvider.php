<?php

namespace App\Providers;

use App\Models\ExamSession;
use App\Models\PayoutRequest;
use App\Models\SystemSetting;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ── Muat Pengaturan Sistem Dinamis (R2, Payment, AI) dari Database ──
        try {
            $sysSettings = SystemSetting::allSettings();
            if (! empty($sysSettings)) {
                $configUpdates = [];
                if (! empty($sysSettings['UPLOAD_DISK'])) {
                    $configUpdates['filesystems.upload_disk'] = $sysSettings['UPLOAD_DISK'];
                }
                if (! empty($sysSettings['CLOUDFLARE_R2_ACCESS_KEY_ID'])) {
                    $configUpdates['filesystems.disks.r2.key'] = $sysSettings['CLOUDFLARE_R2_ACCESS_KEY_ID'];
                }
                if (! empty($sysSettings['CLOUDFLARE_R2_SECRET_ACCESS_KEY'])) {
                    $configUpdates['filesystems.disks.r2.secret'] = $sysSettings['CLOUDFLARE_R2_SECRET_ACCESS_KEY'];
                }
                if (! empty($sysSettings['CLOUDFLARE_R2_BUCKET'])) {
                    $configUpdates['filesystems.disks.r2.bucket'] = $sysSettings['CLOUDFLARE_R2_BUCKET'];
                }
                if (! empty($sysSettings['CLOUDFLARE_R2_ENDPOINT'])) {
                    $configUpdates['filesystems.disks.r2.endpoint'] = $sysSettings['CLOUDFLARE_R2_ENDPOINT'];
                }
                if (! empty($sysSettings['CLOUDFLARE_R2_URL'])) {
                    $configUpdates['filesystems.disks.r2.url'] = $sysSettings['CLOUDFLARE_R2_URL'];
                }
                if (! empty($sysSettings['CLOUDFLARE_R2_REGION'])) {
                    $configUpdates['filesystems.disks.r2.region'] = $sysSettings['CLOUDFLARE_R2_REGION'];
                }
                if (! empty($sysSettings['PAYMENT_GATEWAY_DRIVER'])) {
                    $configUpdates['payment.default'] = $sysSettings['PAYMENT_GATEWAY_DRIVER'];
                }
                // TriPay Gateway Settings
                if (! empty($sysSettings['TRIPAY_MERCHANT_CODE'])) {
                    $configUpdates['payment.gateways.tripay.merchant_code'] = $sysSettings['TRIPAY_MERCHANT_CODE'];
                }
                if (! empty($sysSettings['TRIPAY_API_KEY'])) {
                    $configUpdates['payment.gateways.tripay.api_key'] = $sysSettings['TRIPAY_API_KEY'];
                }
                if (! empty($sysSettings['TRIPAY_PRIVATE_KEY'])) {
                    $configUpdates['payment.gateways.tripay.private_key'] = $sysSettings['TRIPAY_PRIVATE_KEY'];
                }
                if (isset($sysSettings['TRIPAY_SANDBOX']) && $sysSettings['TRIPAY_SANDBOX'] !== '') {
                    $isTripaySandbox = filter_var($sysSettings['TRIPAY_SANDBOX'], FILTER_VALIDATE_BOOLEAN);
                    $configUpdates['payment.gateways.tripay.sandbox'] = $isTripaySandbox;
                    $configUpdates['payment.gateways.tripay.base_url'] = $isTripaySandbox
                        ? 'https://tripay.co.id/api-sandbox/'
                        : 'https://tripay.co.id/api/';
                }
                // iPaymu Gateway Settings
                if (! empty($sysSettings['IPAYMU_VA'])) {
                    $configUpdates['payment.gateways.ipaymu.va'] = $sysSettings['IPAYMU_VA'];
                }
                if (! empty($sysSettings['IPAYMU_API_KEY'])) {
                    $configUpdates['payment.gateways.ipaymu.api_key'] = $sysSettings['IPAYMU_API_KEY'];
                }
                if (isset($sysSettings['IPAYMU_SANDBOX']) && $sysSettings['IPAYMU_SANDBOX'] !== '') {
                    $isIpaymuSandbox = filter_var($sysSettings['IPAYMU_SANDBOX'], FILTER_VALIDATE_BOOLEAN);
                    $configUpdates['payment.gateways.ipaymu.sandbox'] = $isIpaymuSandbox;
                    $configUpdates['payment.gateways.ipaymu.base_url'] = $isIpaymuSandbox
                        ? 'https://sandbox.ipaymu.com/api/v2/'
                        : 'https://my.ipaymu.com/api/v2/';
                }
                if (! empty($sysSettings['DEEPSEEK_API_KEY'])) {
                    $configUpdates['services.deepseek.api_key'] = $sysSettings['DEEPSEEK_API_KEY'];
                }
                if (! empty($sysSettings['GEMINI_API_KEY'])) {
                    $configUpdates['services.gemini.api_key'] = $sysSettings['GEMINI_API_KEY'];
                }
                if (! empty($sysSettings['GOOGLE_CLIENT_ID'])) {
                    $configUpdates['services.google.client_id'] = $sysSettings['GOOGLE_CLIENT_ID'];
                }
                if (! empty($sysSettings['GOOGLE_CLIENT_SECRET'])) {
                    $configUpdates['services.google.client_secret'] = $sysSettings['GOOGLE_CLIENT_SECRET'];
                }
                if (! empty($sysSettings['GOOGLE_REDIRECT_URI'])) {
                    $configUpdates['services.google.redirect'] = $sysSettings['GOOGLE_REDIRECT_URI'];
                }
                if (! empty($configUpdates)) {
                    config($configUpdates);
                    if ($this->app->resolved('filesystem')) {
                        $this->app->forgetInstance('filesystem');
                    }
                }
            }
        } catch (\Throwable $e) {
            // Abaikan jika tabel belum siap
        }

        // ── Rate Limiters Khusus CBT (High-Concurrency Anti-429) ──
        RateLimiter::for('exam-start', function (Request $request) {
            $key = $request->user()?->id ?: $request->ip();

            return Limit::perMinute(60)->by('exam-start:'.$key);
        });

        RateLimiter::for('exam-submit', function (Request $request) {
            $key = $request->user()?->id
                ?: ($request->route('session')?->uuid ?? ($request->route('session')?->id ?? ($request->session()->getId() ?: $request->ip())));

            return Limit::perMinute(60)->by('exam-submit:'.$key);
        });

        RateLimiter::for('exam-answer', function (Request $request) {
            $key = $request->user()?->id
                ?: ($request->route('session')?->uuid ?? ($request->route('session')?->id ?? ($request->session()->getId() ?: $request->ip())));

            return Limit::perMinute(300)->by('exam-answer:'.$key);
        });

        RateLimiter::for('exam-event', function (Request $request) {
            $key = $request->user()?->id
                ?: ($request->route('session')?->uuid ?? ($request->route('session')?->id ?? ($request->session()->getId() ?: $request->ip())));

            return Limit::perMinute(300)->by('exam-event:'.$key);
        });
        View::composer('components.sidebar', function ($view) {
            $user = Auth::user();
            $pendingGradingCount = 0;
            $activeExamCount = 0;
            $pendingPayoutCount = 0;
            if ($user && ($user->isTeacher() || $user->isAdmin() || $user->isSuperUser())) {
                $tenantId = $user->current_tenant_id ?? $user->currentTenant?->id ?? $user->tenants()->first()?->id;
                $pendingGradingCount = ExamSession::pendingManualGradingQuery($tenantId, $user)->count();
                $activeExamCount = ExamSession::activeExamQuery($tenantId, $user)->count();
                if ($user->isSuperUser()) {
                    $pendingPayoutCount = PayoutRequest::where('status', 'pending')->count();
                }
            }

            $view->with([
                'pendingGradingCount' => $pendingGradingCount,
                'activeExamCount' => $activeExamCount,
                'pendingPayoutCount' => $pendingPayoutCount,
            ]);
        });
    }
}
