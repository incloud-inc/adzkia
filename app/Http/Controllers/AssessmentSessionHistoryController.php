<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\ExamSession;
use App\Models\Tenant;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AssessmentSessionHistoryController extends Controller
{
    /**
     * Display a master listing of all assessment sessions across students and assessments.
     */
    public function index(Request $request): View
    {
        $user = Auth::user();

        if (! $user || (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser())) {
            abort(403, 'Akses terbatas untuk Pengawas, Guru, atau Administrator.');
        }

        $isSuperUser = $user->isSuperUser();
        $currentTenant = $user->currentTenant ?? $user->tenants()->first();
        $currentTenantId = $currentTenant?->id;

        $query = ExamSession::with([
            'assessment.subject',
            'user',
            'tenant',
            'proctor',
        ]);

        // Tenancy Isolation Scope
        if (! $isSuperUser) {
            if (! $currentTenantId) {
                $query->whereRaw('1 = 0');
            } else {
                $query->affiliatedWithTenant($currentTenantId);
            }
        } elseif ($request->filled('tenant_id') && $request->tenant_id !== 'all') {
            $query->affiliatedWithTenant((int) $request->tenant_id);
        }

        // Filter: Search student name, email, username, or assessment title
        if ($request->filled('search')) {
            $search = trim((string) $request->search);
            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($uq) use ($search) {
                    $uq->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('username', 'like', "%{$search}%");
                })->orWhereHas('assessment', function ($aq) use ($search) {
                    $aq->where('title', 'like', "%{$search}%");
                });
            });
        }

        // Filter: Specific Assessment
        if ($request->filled('assessment_id') && $request->assessment_id !== 'all') {
            $query->where('assessment_id', $request->assessment_id);
        }

        // Filter: Session Status
        if ($request->filled('status') && $request->status !== 'all') {
            if ($request->status === 'pending_grading') {
                $query->where(function ($sub) {
                    $sub->where('grading_status', 'pending_manual')
                        ->orWhereHas('answers', function ($q) {
                            $q->whereNull('points_awarded')
                                ->whereHas('question', fn ($q2) => $q2->where('type', 'essay'));
                        });
                });
            } else {
                $query->where('status', $request->status);
            }
        }

        // Filter: Date Range
        if ($request->filled('start_date')) {
            $query->whereDate('started_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('started_at', '<=', $request->end_date);
        }

        // Base query for metric cards (respecting tenant and assessment filter, but independent of status filter)
        $baseScopeQuery = ExamSession::query();
        if (! $isSuperUser) {
            if (! $currentTenantId) {
                $baseScopeQuery->whereRaw('1 = 0');
            } else {
                $baseScopeQuery->affiliatedWithTenant($currentTenantId);
            }
        } elseif ($request->filled('tenant_id') && $request->tenant_id !== 'all') {
            $baseScopeQuery->affiliatedWithTenant((int) $request->tenant_id);
        }
        if ($request->filled('assessment_id') && $request->assessment_id !== 'all') {
            $baseScopeQuery->where('assessment_id', $request->assessment_id);
        }

        $totalSessions = (clone $baseScopeQuery)->count();
        $inProgressCount = (clone $baseScopeQuery)->where('status', 'in_progress')->count();
        $lockedCount = (clone $baseScopeQuery)->where('status', 'interrupted_locked')->count();
        $completedCount = (clone $baseScopeQuery)->where('status', 'completed')->count();

        // Selected Assessment details (for initial combobox display)
        $selectedAssessment = null;
        if ($request->filled('assessment_id') && $request->assessment_id !== 'all') {
            $selectedAssessment = Assessment::withoutGlobalScopes()->with('subject:id,name')->find($request->assessment_id);
        }

        // Selected Tenant details (for initial combobox display)
        $selectedTenant = null;
        if ($isSuperUser && $request->filled('tenant_id') && $request->tenant_id !== 'all') {
            $selectedTenant = Tenant::find($request->tenant_id);
        }

        $sessions = $query->latest('started_at')
            ->latest('id')
            ->paginate(15)
            ->withQueryString();

        return view('assessments.sessions.index', compact(
            'sessions',
            'totalSessions',
            'inProgressCount',
            'lockedCount',
            'completedCount',
            'selectedAssessment',
            'selectedTenant',
            'isSuperUser'
        ));
    }

    /**
     * Search assessments via AJAX for combobox filter (scalable for thousands of records).
     */
    public function searchAssessments(Request $request): JsonResponse
    {
        $user = Auth::user();
        if (! $user || (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser())) {
            return response()->json([], 403);
        }

        $isSuperUser = $user->isSuperUser();
        $currentTenant = $user->currentTenant ?? $user->tenants()->first();
        $currentTenantId = $currentTenant?->id;

        $query = Assessment::withoutGlobalScopes()
            ->with('subject:id,name')
            ->select(['id', 'tenant_id', 'subject_id', 'title', 'grade_level', 'type']);

        if (! $isSuperUser) {
            if (! $currentTenantId) {
                return response()->json([]);
            }
            $query->where(function ($q) use ($currentTenantId) {
                $q->where('tenant_id', $currentTenantId)
                    ->orWhereHas('examSessions', function ($sq) use ($currentTenantId) {
                        $sq->affiliatedWithTenant($currentTenantId);
                    });
            });
        } elseif ($request->filled('tenant_id') && $request->tenant_id !== 'all') {
            $query->where('tenant_id', (int) $request->tenant_id);
        }

        if ($request->filled('q')) {
            $search = trim((string) $request->q);
            $query->where('title', 'like', "%{$search}%");
        }

        $assessments = $query->orderBy('title')
            ->take(15)
            ->get();

        $results = $assessments->map(function ($asm) {
            $parts = [];
            if ($asm->subject?->name) {
                $parts[] = $asm->subject->name;
            }
            if ($asm->grade_level) {
                $parts[] = 'Kelas '.$asm->grade_level;
            }
            if ($asm->type) {
                $parts[] = strtoupper($asm->type);
            }

            return [
                'id' => (string) $asm->id,
                'title' => $asm->title,
                'subtitle' => implode(' • ', $parts),
            ];
        });

        return response()->json($results);
    }

    /**
     * Search tenants via AJAX for combobox filter (scalable for thousands of records).
     */
    public function searchTenants(Request $request): JsonResponse
    {
        $user = Auth::user();
        if (! $user || ! $user->isSuperUser()) {
            return response()->json([], 403);
        }

        $query = Tenant::query()
            ->select(['id', 'name', 'slug', 'domain', 'plan']);

        if ($request->filled('q')) {
            $search = trim((string) $request->q);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('domain', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        $tenants = $query->orderBy('name')
            ->take(15)
            ->get();

        $results = $tenants->map(function ($t) {
            return [
                'id' => (string) $t->id,
                'title' => $t->name,
                'subtitle' => ($t->domain ?? $t->slug).' • '.$t->level_label,
                'badge' => $t->level_label,
                'is_inactive' => $t->isInactive(),
            ];
        });

        return response()->json($results);
    }
}
