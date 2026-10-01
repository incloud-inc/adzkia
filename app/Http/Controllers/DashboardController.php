<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\QuestionBank;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the main application dashboard.
     */
    public function index(Request $request): View
    {
        $user = Auth::user();
        $isOwner = $user->isSuperUser();

        // 1. OWNER / SUPER USER DASHBOARD (Platform-wide mode)
        if ($isOwner && ! $user->current_tenant_id) {
            $tenants = Tenant::withCount([
                'users as teachers_count' => fn ($q) => $q->where('role', 'T'),
                'users as students_count' => fn ($q) => $q->where('role', 'U'),
                'users as admins_count' => fn ($q) => $q->where('role', 'A'),
            ])->get();

            $teachers = User::whereHas('tenants', fn ($q) => $q->where('role', 'T'))
                ->with(['tenants' => fn ($q) => $q->where('role', 'T')])
                ->get();

            $students = User::whereHas('tenants', fn ($q) => $q->where('role', 'U'))
                ->with(['tenants' => fn ($q) => $q->where('role', 'U')])
                ->get();

            $admins = User::whereHas('tenants', fn ($q) => $q->where('role', 'A'))
                ->with(['tenants' => fn ($q) => $q->where('role', 'A')])
                ->get();

            $stats = [
                'total_tenants' => $tenants->count(),
                'total_teachers' => $teachers->count(),
                'total_students' => $students->count(),
                'total_admins' => $admins->count(),
            ];

            return view('dashboard', compact('isOwner', 'tenants', 'teachers', 'students', 'admins', 'stats'));
        }

        // 2. TENANT-BOUND DASHBOARD (Student, Teacher, or Tenant Admin)
        $tenant = $user->currentTenant ?? $user->tenants()->first();
        if (! $user->current_tenant_id && $tenant) {
            $user->update(['current_tenant_id' => $tenant->id]);
        }

        $isTeacher = $user->isTeacher();
        $isAdmin = $user->isAdmin() || $isOwner;
        $isStudent = (! $isTeacher && ! $isAdmin);

        // A. SISI MURID / SISWA
        if ($isStudent) {
            $userId = $user->id;
            $availableAssessments = Assessment::where('status', 'published')
                ->with([
                    'subject',
                    'creator',
                    'accesses' => fn ($q) => $q->where('user_id', $userId),
                ])
                ->withCount(['sections', 'questions'])
                ->leftJoin('user_assessment_accesses', function ($join) use ($userId) {
                    $join->on('user_assessment_accesses.assessment_id', '=', 'assessments.id')
                        ->where('user_assessment_accesses.user_id', '=', $userId);
                })
                ->select('assessments.*')
                ->orderByRaw('CASE WHEN user_assessment_accesses.id IS NOT NULL THEN 0 ELSE 1 END ASC')
                ->orderByRaw('CASE WHEN user_assessment_accesses.expires_at IS NULL THEN 1 ELSE 0 END ASC')
                ->orderBy('user_assessment_accesses.expires_at', 'desc')
                ->orderByRaw('(COALESCE(user_assessment_accesses.quota_attempts, 0) - COALESCE(user_assessment_accesses.attempts_used, 0)) DESC')
                ->orderBy('assessments.id', 'desc')
                ->take(6)
                ->get();

            $totalAvailable = Assessment::where('status', 'published')->count();
            $subjectsCount = Subject::count();

            return view('dashboard', [
                'isOwner' => false,
                'role' => 'student',
                'tenant' => $tenant,
                'availableAssessments' => $availableAssessments,
                'totalAvailable' => $totalAvailable,
                'subjectsCount' => $subjectsCount,
            ]);
        }

        // B. SISI GURU / TENAGA PENDIDIK
        if ($isTeacher) {
            $myAssessments = Assessment::where('created_by', $user->id)
                ->with(['subject'])
                ->withCount(['sections', 'questions'])
                ->latest()
                ->take(6)
                ->get();

            $totalMyAssessments = Assessment::where('created_by', $user->id)->count();
            $questionBanksCount = QuestionBank::count();
            $studentsCount = $tenant ? $tenant->users()->wherePivot('role', 'U')->count() : 0;
            $allTenantAssessments = Assessment::with(['subject', 'creator'])->latest()->take(5)->get();

            return view('dashboard', [
                'isOwner' => false,
                'role' => 'teacher',
                'tenant' => $tenant,
                'myAssessments' => $myAssessments,
                'totalMyAssessments' => $totalMyAssessments,
                'questionBanksCount' => $questionBanksCount,
                'studentsCount' => $studentsCount,
                'allTenantAssessments' => $allTenantAssessments,
            ]);
        }

        // C. SISI ADMINISTRATOR TENANT
        $teachers = $tenant ? $tenant->users()->wherePivot('role', 'T')->get() : collect();
        $students = $tenant ? $tenant->users()->wherePivot('role', 'U')->get() : collect();
        $admins = $tenant ? $tenant->users()->wherePivot('role', 'A')->get() : collect();
        $teachersCount = $teachers->count();
        $studentsCount = $students->count();

        $allAssessments = Assessment::withoutGlobalScopes()
            ->with('subject')
            ->withCount(['sections', 'questions'])
            ->latest()
            ->get();

        $visibleAssessments = $tenant
            ? $allAssessments->filter(fn ($item) => $tenant->isAssessmentVisible($item))
            : $allAssessments;

        $assessmentsCount = $visibleAssessments->count();
        $recentAssessments = $visibleAssessments->take(10);
        $questionBanksCount = QuestionBank::count();

        $allTenants = Tenant::all();

        return view('dashboard', [
            'isOwner' => false,
            'role' => 'admin',
            'tenant' => $tenant,
            'tenants' => $allTenants,
            'teachers' => $teachers,
            'students' => $students,
            'admins' => $admins,
            'teachersCount' => $teachersCount,
            'studentsCount' => $studentsCount,
            'assessmentsCount' => $assessmentsCount,
            'questionBanksCount' => $questionBanksCount,
            'recentAssessments' => $recentAssessments,
        ]);
    }
}
