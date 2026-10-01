<?php

namespace App\Providers;

use App\Models\ExamSession;
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
            if ($user && ($user->isTeacher() || $user->isAdmin() || $user->isSuperUser())) {
                $tenantId = $user->current_tenant_id ?? $user->currentTenant?->id ?? $user->tenants()->first()?->id;

                $query = ExamSession::where('status', 'completed')
                    ->whereHas('answers', function ($q) {
                        $q->whereNull('points_awarded')
                            ->whereHas('question', function ($q2) {
                                $q2->where('type', 'essay');
                            });
                    });

                if (! $user->isSuperUser()) {
                    if ($tenantId) {
                        $query->where(function ($q) use ($tenantId) {
                            $q->where('tenant_id', $tenantId)
                                ->orWhereHas('user.tenants', fn ($t) => $t->where('tenants.id', $tenantId));
                        });
                    } else {
                        $query->whereRaw('1 = 0');
                    }
                }

                $pendingGradingCount = $query->count();
            }

            $view->with('pendingGradingCount', $pendingGradingCount);
        });
    }
}
