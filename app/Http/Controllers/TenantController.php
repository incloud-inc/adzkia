<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Tenant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TenantController extends Controller
{
    /**
     * Show the public profile / portal page of a tenant by subdomain.
     */
    public function showPublic(Request $request, ?string $subdomain = null): View
    {
        $subdomain = $subdomain ?? $request->route('subdomain');
        if (! $subdomain) {
            $host = $request->getHost();
            $baseDomain = config('app.url_base_domain', 'localhost');
            $subdomain = str_replace('.'.$baseDomain, '', $host);
        }

        $tenant = Tenant::where('subdomain', $subdomain)->firstOrFail();

        // 1. Ambil asesmen terkelompok dari database
        $assessmentGroups = Assessment::getGroupedAssessments($tenant);

        // 2. Guru & Siswa di tenant ini
        $teachersQuery = $tenant->users()->wherePivot('role', 'T')->latest('id');
        $studentsQuery = $tenant->users()->wherePivot('role', 'U')->latest('id');

        $totalTeachers = $teachersQuery->count();
        $totalStudents = $studentsQuery->count();

        // Data Guru (terbaru lebih dulu)
        $teachers = $teachersQuery->get()->map(function ($teacher) {
            return [
                'id' => $teacher->id,
                'name' => $teacher->name,
                'photo_url' => $teacher->profile_photo_url,
                'bio' => $teacher->bio ?: 'Tenaga Pendidik & Pengajar',
                'username' => $teacher->username,
                'profile_url' => route('global.student.profile', $teacher->username ?: $teacher->id),
            ];
        });

        // Data Siswa (terbaru lebih dulu)
        $students = $studentsQuery->get()->map(function ($student) {
            return [
                'id' => $student->id,
                'name' => $student->name,
                'photo_url' => $student->profile_photo_url,
                'bio' => $student->bio ?: 'Peserta Didik Aktif',
                'username' => $student->username,
                'profile_url' => route('global.student.profile', $student->username ?: $student->id),
            ];
        });

        // Deteksi jenjang tenant untuk Card 1
        $tenantNameUpper = strtoupper($tenant->name);
        $jenjangLabel = 'Asesmen';
        if (str_contains($tenantNameUpper, 'SMA') || str_contains($tenantNameUpper, 'SMK') || str_contains($tenantNameUpper, 'MA')) {
            $jenjangAssessmentsCount = count($assessmentGroups['sma']);
        } elseif (str_contains($tenantNameUpper, 'SMP') || str_contains($tenantNameUpper, 'MTS')) {
            $jenjangAssessmentsCount = count($assessmentGroups['smp']);
        } elseif (str_contains($tenantNameUpper, 'SD') || str_contains($tenantNameUpper, 'MI')) {
            $jenjangAssessmentsCount = count($assessmentGroups['sd']);
        } else {
            $jenjangAssessmentsCount = count($assessmentGroups['umum']) + count($assessmentGroups['sma']);
        }

        // ON/OFF Jenjang dari setting tenant
        $showGradeSd = $tenant->showGrade('sd');
        $showGradeSmp = $tenant->showGrade('smp');
        $showGradeSma = $tenant->showGrade('sma');

        return view('tenants.public', [
            'tenant' => $tenant,
            'jenjangLabel' => $jenjangLabel,
            'jenjangAssessmentsCount' => $jenjangAssessmentsCount,
            'totalTeachers' => $totalTeachers,
            'totalStudents' => $totalStudents,
            'allTeachers' => $teachers,
            'allStudents' => $students,
            'umumAssessments' => $assessmentGroups['umum'],
            'sdAssessments' => $assessmentGroups['sd'],
            'smpAssessments' => $assessmentGroups['smp'],
            'smaAssessments' => $assessmentGroups['sma'],
            'showGradeSd' => $showGradeSd,
            'showGradeSmp' => $showGradeSmp,
            'showGradeSma' => $showGradeSma,
        ]);
    }

    /**
     * Show the tenant selection screen.
     */
    public function select(): View|RedirectResponse
    {
        $user = Auth::user();

        // Super User / OWNER does not need to select tenant
        if ($user->isSuperUser()) {
            return redirect()->route('dashboard');
        }

        $tenants = $user->tenants;

        return view('auth.select-tenant', compact('tenants'));
    }

    /**
     * Switch to a specific tenant or global overview.
     */
    public function switch(Request $request, string $tenant): RedirectResponse
    {
        $user = Auth::user();

        // Allow Super User to switch back to global overview
        if ($tenant === 'global' && $user->isSuperUser()) {
            $user->update(['current_tenant_id' => null]);

            return redirect()->route('dashboard');
        }

        $tenantModel = Tenant::findOrFail($tenant);

        // Ensure the user actually belongs to this tenant, or is Super User
        if (! $user->isSuperUser() && ! $user->tenants()->where('tenant_id', $tenantModel->id)->exists()) {
            abort(403, 'Unauthorized access to this tenant.');
        }

        $user->switchTenant($tenantModel);

        return redirect()->route('dashboard');
    }
}
