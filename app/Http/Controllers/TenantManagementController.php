<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;

class TenantManagementController extends Controller
{
    /**
     * Display a listing of tenants.
     */
    public function index(Request $request): View
    {
        Gate::authorize('viewAny', Tenant::class);

        $query = Tenant::withCount([
            'users as teachers_count' => fn ($q) => $q->where('role', 'T'),
            'users as students_count' => fn ($q) => $q->where('role', 'U'),
            'users as admins_count' => fn ($q) => $q->where('role', 'A'),
        ]);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('subdomain', 'like', "%{$search}%");
            });
        }

        if ($request->filled('plan')) {
            $query->where('plan', $request->plan);
        }

        $tenants = $query->orderBy('name')->paginate(10)->withQueryString();

        return view('tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new tenant.
     */
    public function create(): View
    {
        Gate::authorize('create', Tenant::class);

        return view('tenants.create');
    }

    /**
     * Store a newly created tenant in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        Gate::authorize('create', Tenant::class);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subdomain' => 'required|string|max:50|alpha_dash|unique:tenants,subdomain',
            'plan' => 'required|string|in:gratis,premium,whitelabel',
            'admin_name' => 'nullable|string|max:255',
            'admin_email' => 'nullable|email|max:255|unique:users,email',
            'admin_password' => 'nullable|string|min:6',
        ]);

        $tenant = Tenant::create([
            'name' => $validated['name'],
            'subdomain' => Str::lower($validated['subdomain']),
            'plan' => $validated['plan'],
        ]);

        if (! empty($validated['admin_email'])) {
            $adminUser = User::create([
                'name' => $validated['admin_name'] ?: 'Admin '.$tenant->name,
                'email' => $validated['admin_email'],
                'password' => Hash::make($validated['admin_password'] ?: 'password'),
                'current_tenant_id' => $tenant->id,
            ]);
            $adminUser->tenants()->attach($tenant->id, ['role' => 'A']);
        }

        // Attach the current Super User so they can administer this tenant
        if (Auth::check() && Auth::user()->isSuperUser()) {
            Auth::user()->tenants()->syncWithoutDetaching([$tenant->id => ['role' => 'S']]);
        }

        return redirect()->route('tenants.index')->with('success', 'Tenant '.$tenant->name.' berhasil ditambahkan.');
    }

    /**
     * Display the specified tenant.
     */
    public function show(Tenant $tenant): View
    {
        Gate::authorize('view', $tenant);

        $tenant->load([
            'users' => fn ($q) => $q->withPivot('role'),
        ]);

        $admins = $tenant->users->filter(fn ($u) => $u->pivot->role === 'A');
        $teachers = $tenant->users->filter(fn ($u) => $u->pivot->role === 'T');
        $students = $tenant->users->filter(fn ($u) => $u->pivot->role === 'U');

        return view('tenants.show', compact('tenant', 'admins', 'teachers', 'students'));
    }

    /**
     * Show the form for editing the specified tenant.
     */
    public function edit(Tenant $tenant): View
    {
        Gate::authorize('update', $tenant);

        return view('tenants.edit', compact('tenant'));
    }

    /**
     * Update the specified tenant in storage.
     */
    public function update(Request $request, Tenant $tenant): RedirectResponse
    {
        Gate::authorize('update', $tenant);

        $rules = [
            'name' => 'required|string|max:255',
            'plan' => 'required|string|in:gratis,premium,whitelabel',
        ];

        // Only Super User can change subdomain
        if (Auth::user()->isSuperUser()) {
            $rules['subdomain'] = 'required|string|max:50|alpha_dash|unique:tenants,subdomain,'.$tenant->id;
        }

        $validated = $request->validate($rules);

        $updateData = [
            'name' => $validated['name'],
            'plan' => $validated['plan'],
        ];

        if (isset($validated['subdomain'])) {
            $updateData['subdomain'] = Str::lower($validated['subdomain']);
        }

        // Simpan Checklist Jenjang Pendidikan (SD, SMP, SMA, TKA, dll) ke settings
        $settings = $tenant->settings ?? [];
        if ($request->has('grade_settings_submitted') || $request->has('show_grade_sd') || $request->has('show_grade_smp') || $request->has('show_grade_sma')) {
            $settings['show_grade_sd'] = (bool) $request->input('show_grade_sd', false);
            $settings['show_grade_smp'] = (bool) $request->input('show_grade_smp', false);
            $settings['show_grade_sma'] = (bool) $request->input('show_grade_sma', false);
            $settings['show_grade_tka_sd'] = (bool) $request->input('show_grade_tka_sd', false);
            $settings['show_grade_tka_smp'] = (bool) $request->input('show_grade_tka_smp', false);
            $settings['show_grade_tka_sma'] = (bool) $request->input('show_grade_tka_sma', false);
            $settings['show_grade_utbk'] = (bool) $request->input('show_grade_utbk', false);
            $settings['show_grade_skd'] = (bool) $request->input('show_grade_skd', false);
            $updateData['settings'] = $settings;
        }

        $tenant->update($updateData);

        if (Auth::user()->isSuperUser()) {
            return redirect()->route('tenants.index')->with('success', 'Informasi tenant '.$tenant->name.' berhasil diperbarui.');
        }

        return redirect()->route('dashboard')->with('success', 'Informasi dan pengaturan jenjang institusi '.$tenant->name.' berhasil diperbarui.');
    }

    /**
     * Remove the specified tenant from storage.
     */
    public function destroy(Tenant $tenant): RedirectResponse
    {
        Gate::authorize('delete', $tenant);

        $name = $tenant->name;
        $tenant->delete();

        return redirect()->route('tenants.index')->with('success', 'Tenant '.$name.' berhasil dihapus.');
    }

    /**
     * Update tenant plan/level directly from table (Inline Switcher).
     */
    public function updatePlan(Request $request, Tenant $tenant)
    {
        Gate::authorize('update', $tenant);

        $validated = $request->validate([
            'plan' => 'required|string|in:gratis,premium,whitelabel',
        ]);

        $tenant->update([
            'plan' => $validated['plan'],
        ]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Level tenant '.$tenant->name.' berhasil diubah ke '.$tenant->level_label.'.',
                'plan' => $tenant->plan,
                'level_label' => $tenant->level_label,
                'revenue_share' => $tenant->revenue_share_ratio,
            ]);
        }

        return redirect()->back()->with('success', 'Level tenant '.$tenant->name.' berhasil diubah ke '.$tenant->level_label.'.');
    }
}
