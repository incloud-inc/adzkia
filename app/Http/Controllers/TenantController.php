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

        // ON/OFF Jenjang dari setting tenant
        $showGradeSd = $tenant->showGrade('sd');
        $showGradeSmp = $tenant->showGrade('smp');
        $showGradeSma = $tenant->showGrade('sma');
        $showGradeTkaSd = $tenant->showGrade('tka_sd');
        $showGradeTkaSmp = $tenant->showGrade('tka_smp');
        $showGradeTkaSma = $tenant->showGrade('tka_sma');
        $showGradeUtbk = $tenant->showGrade('utbk');
        $showGradeSkd = $tenant->showGrade('skd');

        // Hitung total asesmen unik yang aktif dan tampil pada portal publik tenant ini
        $portalAssessmentIds = collect($assessmentGroups['umum'])->pluck('id');
        if ($showGradeSd) {
            $portalAssessmentIds = $portalAssessmentIds->merge(collect($assessmentGroups['sd'])->pluck('id'));
        }
        if ($showGradeSmp) {
            $portalAssessmentIds = $portalAssessmentIds->merge(collect($assessmentGroups['smp'])->pluck('id'));
        }
        if ($showGradeSma) {
            $portalAssessmentIds = $portalAssessmentIds->merge(collect($assessmentGroups['sma'])->pluck('id'));
        }
        if ($showGradeTkaSd) {
            $portalAssessmentIds = $portalAssessmentIds->merge(collect($assessmentGroups['tka_sd'])->pluck('id'));
        }
        if ($showGradeTkaSmp) {
            $portalAssessmentIds = $portalAssessmentIds->merge(collect($assessmentGroups['tka_smp'])->pluck('id'));
        }
        if ($showGradeTkaSma) {
            $portalAssessmentIds = $portalAssessmentIds->merge(collect($assessmentGroups['tka_sma'])->pluck('id'));
        }
        if ($showGradeUtbk) {
            $portalAssessmentIds = $portalAssessmentIds->merge(collect($assessmentGroups['utbk'])->pluck('id'));
        }
        if ($showGradeSkd) {
            $portalAssessmentIds = $portalAssessmentIds->merge(collect($assessmentGroups['skd'])->pluck('id'));
        }

        $totalAssessmentsCount = $portalAssessmentIds->filter()->unique()->count();

        return view('tenants.public', [
            'tenant' => $tenant,
            'jenjangLabel' => 'Asesmen',
            'jenjangAssessmentsCount' => $totalAssessmentsCount,
            'totalAssessments' => $totalAssessmentsCount,
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
