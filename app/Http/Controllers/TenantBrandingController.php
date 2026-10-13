<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\GradeLevel;
use App\Models\Tenant;
use App\Models\TenantDomain;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TenantBrandingController extends Controller
{
    /**
     * Daftar 14 tema Open Color resmi prototype sekolah dengan metadata visual lengkap.
     *
     * @return array<string, array{name: string, hex: string, primary: string, bg: string, card_bg: string, border: string, text: string, subtext: string, is_dark: bool, desc: string}>
     */
    public static function getThemePalettes(): array
    {
        return [
            'light' => [
                'name' => 'Light Clean',
                'hex' => '#f1f3f5',
                'primary' => '#1c7ed6',
                'bg' => '#f1f3f5',
                'card_bg' => '#ffffff',
                'border' => '#dee2e6',
                'text' => '#212529',
                'subtext' => '#495057',
                'is_dark' => false,
                'desc' => 'Tampilan bersih, terang, dan minimalis standar sekolah',
                'swatches' => ['#f8f9fa', '#ffffff', '#dee2e6', '#1c7ed6', '#1864ab'],
            ],
            'gray' => [
                'name' => 'Slate Dark',
                'hex' => '#868e96',
                'primary' => '#adb5bd',
                'bg' => '#343a40',
                'card_bg' => '#212529',
                'border' => '#495057',
                'text' => '#f8f9fa',
                'subtext' => '#ced4da',
                'is_dark' => true,
                'desc' => 'Mode gelap abu-abu netral yang modern dan berwibawa',
                'swatches' => ['#343a40', '#212529', '#495057', '#adb5bd', '#f8f9fa'],
            ],
            'blue' => [
                'name' => 'Ocean Blue',
                'hex' => '#228be6',
                'primary' => '#339af0',
                'bg' => '#071524',
                'card_bg' => '#0c1f33',
                'border' => '#1971c2',
                'text' => '#f8f9fa',
                'subtext' => '#a5d8ff',
                'is_dark' => true,
                'desc' => 'Biru bahari elegan dengan kontras tinggi untuk fokus belajar',
                'swatches' => ['#071524', '#0c1f33', '#1971c2', '#339af0', '#a5d8ff'],
            ],
            'indigo' => [
                'name' => 'Royal Indigo',
                'hex' => '#4c6ef5',
                'primary' => '#5c7cfa',
                'bg' => '#0a0f24',
                'card_bg' => '#121838',
                'border' => '#3b5bdb',
                'text' => '#f8f9fa',
                'subtext' => '#bac8ff',
                'is_dark' => true,
                'desc' => 'Warna indigo akademis yang anggun dan berkelas',
                'swatches' => ['#0a0f24', '#121838', '#3b5bdb', '#5c7cfa', '#bac8ff'],
            ],
            'teal' => [
                'name' => 'Forest Teal',
                'hex' => '#12b886',
                'primary' => '#20c997',
                'bg' => '#051a14',
                'card_bg' => '#092920',
                'border' => '#0ca678',
                'text' => '#f8f9fa',
                'subtext' => '#96f2d7',
                'is_dark' => true,
                'desc' => 'Nuansa hijau toska segar yang menyejukkan pandangan',
                'swatches' => ['#051a14', '#092920', '#0ca678', '#20c997', '#96f2d7'],
            ],
            'cyan' => [
                'name' => 'Cyber Cyan',
                'hex' => '#15aabf',
                'primary' => '#22b8cf',
                'bg' => '#05181c',
                'card_bg' => '#0a262d',
                'border' => '#0c8599',
                'text' => '#f8f9fa',
                'subtext' => '#99e9f2',
                'is_dark' => true,
                'desc' => 'Aksen sian terang yang futuristik dan dinamis',
                'swatches' => ['#05181c', '#0a262d', '#0c8599', '#22b8cf', '#99e9f2'],
            ],
            'green' => [
                'name' => 'Emerald Green',
                'hex' => '#40c057',
                'primary' => '#51cf66',
                'bg' => '#081a0c',
                'card_bg' => '#0f2916',
                'border' => '#2f9e44',
                'text' => '#f8f9fa',
                'subtext' => '#b2f2bb',
                'is_dark' => true,
                'desc' => 'Hijau zamrud alami mencerminkan pertumbuhan dan prestasi',
                'swatches' => ['#081a0c', '#0f2916', '#2f9e44', '#51cf66', '#b2f2bb'],
            ],
            'lime' => [
                'name' => 'Fresh Lime',
                'hex' => '#82c91e',
                'primary' => '#94d82d',
                'bg' => '#121a05',
                'card_bg' => '#1b270a',
                'border' => '#66a80f',
                'text' => '#f8f9fa',
                'subtext' => '#d8f5a2',
                'is_dark' => true,
                'desc' => 'Warna lime cerah yang energik dan membangkitkan semangat',
                'swatches' => ['#121a05', '#1b270a', '#66a80f', '#94d82d', '#d8f5a2'],
            ],
            'yellow' => [
                'name' => 'Solar Yellow',
                'hex' => '#f59f00',
                'primary' => '#fcc419',
                'bg' => '#1f1903',
                'card_bg' => '#2b2205',
                'border' => '#e67700',
                'text' => '#f8f9fa',
                'subtext' => '#ffec99',
                'is_dark' => true,
                'desc' => 'Aksen kuning hangat keemasan yang optimis dan percaya diri',
                'swatches' => ['#1f1903', '#2b2205', '#e67700', '#fcc419', '#ffec99'],
            ],
            'orange' => [
                'name' => 'Sunset Orange',
                'hex' => '#fd7e14',
                'primary' => '#ff922b',
                'bg' => '#1f1003',
                'card_bg' => '#2c1807',
                'border' => '#d9480f',
                'text' => '#f8f9fa',
                'subtext' => '#ffd8a8',
                'is_dark' => true,
                'desc' => 'Oranye hangat penuh energi kreativitas dan antusiasme',
                'swatches' => ['#1f1003', '#2c1807', '#d9480f', '#ff922b', '#ffd8a8'],
            ],
            'red' => [
                'name' => 'Ruby Red',
                'hex' => '#fa5252',
                'primary' => '#ff6b6b',
                'bg' => '#1f0808',
                'card_bg' => '#2b0f0f',
                'border' => '#c92a2a',
                'text' => '#f8f9fa',
                'subtext' => '#ffc9c9',
                'is_dark' => true,
                'desc' => 'Merah ruby berani dan tegas untuk identitas yang kuat',
                'swatches' => ['#1f0808', '#2b0f0f', '#c92a2a', '#ff6b6b', '#ffc9c9'],
            ],
            'pink' => [
                'name' => 'Blossom Pink',
                'hex' => '#e64980',
                'primary' => '#f06595',
                'bg' => '#1f0814',
                'card_bg' => '#2b0d1c',
                'border' => '#a61e4d',
                'text' => '#f8f9fa',
                'subtext' => '#fcc2d7',
                'is_dark' => true,
                'desc' => 'Merah muda anggun yang ramah dan menyenangkan',
                'swatches' => ['#1f0814', '#2b0d1c', '#a61e4d', '#f06595', '#fcc2d7'],
            ],
            'grape' => [
                'name' => 'Velvet Grape',
                'hex' => '#be4bdb',
                'primary' => '#cc5de8',
                'bg' => '#18071f',
                'card_bg' => '#240d2e',
                'border' => '#862e9c',
                'text' => '#f8f9fa',
                'subtext' => '#eebefa',
                'is_dark' => true,
                'desc' => 'Ungu anggur eksklusif dengan sentuhan artistik modern',
                'swatches' => ['#18071f', '#240d2e', '#862e9c', '#cc5de8', '#eebefa'],
            ],
            'violet' => [
                'name' => 'Deep Violet',
                'hex' => '#7950f2',
                'primary' => '#845ef7',
                'bg' => '#10071f',
                'card_bg' => '#190d2e',
                'border' => '#5f3dc4',
                'text' => '#f8f9fa',
                'subtext' => '#d0bfff',
                'is_dark' => true,
                'desc' => 'Violet mistis dan elegan dengan aura futuristik premium',
                'swatches' => ['#10071f', '#190d2e', '#5f3dc4', '#845ef7', '#d0bfff'],
            ],
        ];
    }

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

        $palettes = self::getThemePalettes();

        // Ambil data master kelas untuk kelompok PRO secara dinamis dari tabel grade_levels
        $proGradeLevels = GradeLevel::where(function ($q) {
            $q->where('group', 'PRO')
                ->orWhereNotIn('group', [
                    'Sekolah Dasar (SD)',
                    'Sekolah Menengah Pertama (SMP)',
                    'Sekolah Menengah Atas / Kejuruan (SMA/SMK)',
                ]);
        })
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('tenants.branding', compact('tenant', 'adzkiaAssessments', 'palettes', 'proGradeLevels'));
    }

    public function update(Request $request, Tenant $tenant): RedirectResponse
    {
        Gate::authorize('update', $tenant);

        $rules = [
            'tagline' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'favicon' => 'nullable|mimes:ico,png|max:1024',
            'cover_photo' => 'nullable|image|max:5120',
            'theme_palette' => 'nullable|string|in:light,gray,blue,indigo,teal,cyan,green,lime,yellow,orange,red,pink,grape,violet',
            'grade_settings_submitted' => 'nullable',
            'school_grades' => 'nullable|array',
            'school_grades.*' => 'string|in:sma,smp,sd',
            'school_grade' => 'nullable|string|in:sma,smp,sd',
            'pro_groups' => 'nullable|array',
            'pro_groups.*' => 'string',
            'show_grade_sd' => 'nullable',
            'show_grade_smp' => 'nullable',
            'show_grade_sma' => 'nullable',
        ];

        // Validasi aturan khusus jika grup jenjang & PRO disubmit (wajib minimal 1 jenjang sekolah & minimal 3 grup PRO)
        if ($request->has('grade_settings_submitted')) {
            $rules['school_grades'] = 'required|array|min:1';
            $rules['school_grades.*'] = 'in:sma,smp,sd';
            $rules['pro_groups'] = 'required|array|min:3';
        }

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

        $messages = [
            'school_grades.required' => 'Wajib memilih minimal satu jenjang resmi sekolah (SMA, SMP, atau SD).',
            'school_grades.min' => 'Wajib memilih minimal satu jenjang resmi sekolah.',
            'school_grades.*.in' => 'Pilihan jenjang sekolah tidak valid.',
            'school_grade.required' => 'Wajib memilih minimal satu jenjang resmi sekolah.',
            'school_grade.in' => 'Pilihan jenjang sekolah tidak valid.',
            'pro_groups.required' => 'Wajib memilih minimal 3 grup kelas PRO agar slider interaktif dapat berfungsi.',
            'pro_groups.min' => 'Wajib memilih minimal 3 grup kelas PRO agar slider di bawah cover profil dapat digeser.',
        ];

        $validated = $request->validate($rules, $messages);

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

        // Simpan tema warna Open Color jika dipilih
        if ($request->filled('theme_palette')) {
            $settings['theme_palette'] = $request->input('theme_palette');
        }

        // 1. Simpan konfigurasi pengelompokan jenjang sekolah & kelas group PRO
        if ($request->has('grade_settings_submitted')) {
            $schoolGrades = (array) $request->input('school_grades', []);
            if (empty($schoolGrades) && $request->filled('school_grade')) {
                $schoolGrades = [(string) $request->input('school_grade')];
            }
            if (empty($schoolGrades)) {
                $schoolGrades = ['sma', 'smp', 'sd'];
            }

            $settings['school_grades'] = array_values($schoolGrades);
            $settings['school_grade'] = $schoolGrades[0] ?? 'sma';
            $settings['pro_groups'] = $request->input('pro_groups', []);

            // Sinkronkan kompatibilitas filter jenjang
            $settings['show_grade_sd'] = in_array('sd', $schoolGrades, true);
            $settings['show_grade_smp'] = in_array('smp', $schoolGrades, true);
            $settings['show_grade_sma'] = in_array('sma', $schoolGrades, true);
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
