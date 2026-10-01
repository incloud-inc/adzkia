<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Tenant;
use App\Models\TenantDomain;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TenantBrandingController extends Controller
{
    public function edit(Tenant $tenant): View
    {
        Gate::authorize('update', $tenant);

        $tenant->load('domains');

        // Asesmen kurasi Adzkia untuk konfigurasi ON/OFF (Level 3 Enterprise)
        $adzkiaAssessments = Assessment::withoutGlobalScopes()
            ->whereIn('status', ['published', 'active'])
            ->with('subject')
            ->orderBy('is_mandatory', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        return view('tenants.branding', compact('tenant', 'adzkiaAssessments'));
    }

    public function update(Request $request, Tenant $tenant): RedirectResponse
    {
        Gate::authorize('update', $tenant);

        $rules = [
            'tagline' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'favicon' => 'nullable|mimes:ico,png|max:1024',
            'cover_photo' => 'nullable|image|max:5120',
            'grade_settings_submitted' => 'nullable',
            'show_grade_sd' => 'nullable',
            'show_grade_smp' => 'nullable',
            'show_grade_sma' => 'nullable',
        ];

        // Validasi Custom Domain (Level 2 Pro & Level 3 Enterprise)
        if ($tenant->allowsCustomDomain() && $request->has('custom_domain')) {
            $rules['custom_domain'] = 'nullable|string|max:255';
        }

        // Validasi Eksklusif Level 3 Enterprise (Full White Label)
        if ($tenant->isEnterprise()) {
            $rules['app_name'] = 'nullable|string|max:100';
            $rules['theme_color'] = ['nullable', 'string', 'regex:/^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/'];
            $rules['sender_name'] = 'nullable|string|max:100';
            $rules['sender_email'] = 'nullable|email|max:150';
            $rules['certificate_title'] = 'nullable|string|max:150';
            $rules['certificate_subtitle'] = 'nullable|string|max:255';
            $rules['white_label_submitted'] = 'nullable';
            $rules['hide_adzkia_branding'] = 'nullable';
            $rules['adzkia_toggles_submitted'] = 'nullable';
            $rules['adzkia_assessments'] = 'nullable|array';
        }

        $validated = $request->validate($rules);

        $disk = config('filesystems.upload_disk', 'public');

        if ($request->hasFile('logo')) {
            if ($tenant->logo_path) {
                if (Storage::disk($disk)->exists($tenant->logo_path)) {
                    Storage::disk($disk)->delete($tenant->logo_path);
                } elseif (Storage::disk('public')->exists($tenant->logo_path)) {
                    Storage::disk('public')->delete($tenant->logo_path);
                }
            }
            $validated['logo_path'] = $request->file('logo')->store('tenants/logos', $disk);
        }

        if ($request->hasFile('favicon')) {
            if ($tenant->favicon_path) {
                if (Storage::disk($disk)->exists($tenant->favicon_path)) {
                    Storage::disk($disk)->delete($tenant->favicon_path);
                } elseif (Storage::disk('public')->exists($tenant->favicon_path)) {
                    Storage::disk('public')->delete($tenant->favicon_path);
                }
            }
            $validated['favicon_path'] = $request->file('favicon')->store('tenants/favicons', $disk);
        }

        if ($request->hasFile('cover_photo')) {
            if ($tenant->cover_photo_path) {
                if (Storage::disk($disk)->exists($tenant->cover_photo_path)) {
                    Storage::disk($disk)->delete($tenant->cover_photo_path);
                } elseif (Storage::disk('public')->exists($tenant->cover_photo_path)) {
                    Storage::disk('public')->delete($tenant->cover_photo_path);
                }
            }
            $validated['cover_photo_path'] = $request->file('cover_photo')->store('tenants/covers', $disk);
        }

        $settings = $tenant->settings ?? [];

        // 1. Simpan konfigurasi visibilitas kartu asesmen jenjang (SD, SMP, SMA)
        if ($request->has('grade_settings_submitted')) {
            $settings['show_grade_sd'] = $request->boolean('show_grade_sd');
            $settings['show_grade_smp'] = $request->boolean('show_grade_smp');
            $settings['show_grade_sma'] = $request->boolean('show_grade_sma');
        }

        // 2. Simpan 1 Custom Domain untuk Level 2 Pro
        if ($tenant->isPro() && $request->has('custom_domain')) {
            $cleanDomain = strtolower(trim($request->input('custom_domain')));
            $cleanDomain = preg_replace('#^https?://#i', '', $cleanDomain);
            $cleanDomain = explode('/', $cleanDomain)[0];

            $tenant->domain = ! empty($cleanDomain) ? $cleanDomain : null;

            if ($tenant->domain) {
                TenantDomain::updateOrCreate(
                    ['tenant_id' => $tenant->id, 'is_primary' => true],
                    ['domain' => $tenant->domain, 'is_verified' => true]
                );
            } else {
                $tenant->domains()->where('is_primary', true)->delete();
            }
        }

        // 3. Simpan Pengaturan Eksklusif Level 3 Enterprise (Full White Label)
        if ($tenant->isEnterprise()) {
            if ($request->has('app_name')) {
                $settings['app_name'] = trim($request->input('app_name'));
            }
            if ($request->has('theme_color')) {
                $settings['theme_color'] = trim($request->input('theme_color'));
            }
            if ($request->has('sender_name')) {
                $settings['sender_name'] = trim($request->input('sender_name'));
            }
            if ($request->has('sender_email')) {
                $settings['sender_email'] = trim($request->input('sender_email'));
            }
            if ($request->has('certificate_title')) {
                $settings['certificate_title'] = trim($request->input('certificate_title'));
            }
            if ($request->has('certificate_subtitle')) {
                $settings['certificate_subtitle'] = trim($request->input('certificate_subtitle'));
            }

            // Status White Label (Sembunyikan Adzkia)
            if ($request->has('white_label_submitted')) {
                $settings['hide_adzkia_branding'] = $request->boolean('hide_adzkia_branding');
            }

            // ON / OFF Asesmen Adzkia (Kecuali yang wajib dari Owner)
            if ($request->has('adzkia_toggles_submitted')) {
                $toggles = $request->input('adzkia_assessments', []);
                $enabledMap = [];
                foreach ($toggles as $assessmentId => $val) {
                    $enabledMap[(int) $assessmentId] = (bool) $val;
                }
                $settings['adzkia_assessments_enabled'] = $enabledMap;
            }
        }

        $validated['settings'] = $settings;
        $tenant->update($validated);

        return redirect()->back()->with('success', 'Pengaturan branding dan fitur tenant '.$tenant->name.' berhasil disimpan.');
    }

    /**
     * Tambah custom domain baru (Khusus Level 3 Enterprise).
     */
    public function addDomain(Request $request, Tenant $tenant): RedirectResponse
    {
        Gate::authorize('update', $tenant);

        if (! $tenant->allowsMultipleCustomDomains()) {
            return redirect()->back()->withErrors(['domain' => 'Paket Anda hanya mendukung 1 domain kustom. Upgrade ke Enterprise untuk mengelola beberapa domain.']);
        }

        $request->validate([
            'domain' => 'required|string|max:255',
        ]);

        $cleanDomain = strtolower(trim($request->input('domain')));
        $cleanDomain = preg_replace('#^https?://#i', '', $cleanDomain);
        $cleanDomain = explode('/', $cleanDomain)[0];

        // Cek duplikasi
        $exists = TenantDomain::where('domain', $cleanDomain)->exists();
        if ($exists) {
            return redirect()->back()->withErrors(['domain' => "Domain '{$cleanDomain}' sudah digunakan oleh tenant lain."]);
        }

        $tenant->domains()->create([
            'domain' => $cleanDomain,
            'is_primary' => $tenant->domains()->count() === 0,
            'is_verified' => true,
        ]);

        return redirect()->back()->with('success', "Domain kustom '{$cleanDomain}' berhasil ditambahkan ke daftar domain tenant.");
    }

    /**
     * Hapus custom domain (Khusus Level 3 Enterprise).
     */
    public function deleteDomain(Request $request, Tenant $tenant, TenantDomain $domain): RedirectResponse
    {
        Gate::authorize('update', $tenant);

        if ($domain->tenant_id !== $tenant->id) {
            abort(403);
        }

        $domainName = $domain->domain;
        $domain->delete();

        return redirect()->back()->with('success', "Domain '{$domainName}' berhasil dihapus dari tenant.");
    }
}
