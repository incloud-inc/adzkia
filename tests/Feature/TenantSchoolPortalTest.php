<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\TenantDomain;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenantSchoolPortalTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Memastikan portal sekolah merender desain prototype pada subdomain.
     */
    public function test_school_portal_renders_prototype_design_on_subdomain(): void
    {
        $tenant = Tenant::factory()->create([
            'name' => 'SMA Negeri 1 Nusantara',
            'subdomain' => 'sman1nusantara',
            'tagline' => 'Sekolah Unggul Berkarakter dan Berdaya Saing Global',
            'settings' => [
                'theme_palette' => 'indigo',
                'school_grade' => 'sma',
                'pro_groups' => ['pro_kelas_10', 'pro_kelas_11', 'pro_kelas_12', 'pro_kedinasan'],
            ],
        ]);

        $response = $this->get("http://{$tenant->subdomain}.localhost/");

        $response->assertStatus(200);
        $response->assertSee('SMA Negeri 1 Nusantara');
        $response->assertSee('Sekolah Unggul Berkarakter dan Berdaya Saing Global');
        $response->assertSee('Pilihan Tema Sekolah');
        $response->assertSee('PRO');
        $response->assertSee('Katalog Mata Pelajaran');
        $response->assertSee('Fase E');
        $response->assertSee('Ruang Guru & Pengajar', false);
        $response->assertSee('Ruang Murid & CBT', false);
        $response->assertSee('bg-[#1c7ed6]', false);
        $response->assertSee('hover:bg-[#1864ab]', false);
    }

    /**
     * Memastikan portal sekolah merender pada custom domain.
     */
    public function test_school_portal_renders_on_custom_domain(): void
    {
        $tenant = Tenant::factory()->create([
            'name' => 'SMA Prestasi Bangsa',
            'subdomain' => 'prestasibangsa',
            'domain' => 'cbt.prestasibangsa.sch.id',
            'plan' => 'whitelabel',
            'settings' => [
                'theme_palette' => 'teal',
                'school_grade' => 'sma',
                'pro_groups' => ['pro_kelas_10', 'pro_kelas_11', 'pro_kelas_12'],
            ],
        ]);

        TenantDomain::create([
            'tenant_id' => $tenant->id,
            'domain' => 'cbt.prestasibangsa.sch.id',
            'is_primary' => true,
            'is_verified' => true,
        ]);

        $response = $this->get('http://cbt.prestasibangsa.sch.id/');

        $response->assertStatus(200);
        $response->assertSee('SMA Prestasi Bangsa');
        $response->assertSee('PRO');
        $response->assertSee('Katalog Mata Pelajaran');
    }

    /**
     * Memastikan jika sekolah memilih jenjang SMP, katalog SMP Fase D yang ditampilkan.
     */
    public function test_school_portal_displays_only_selected_smp_grade(): void
    {
        $tenant = Tenant::factory()->create([
            'name' => 'SMP Negeri 5 Teladan',
            'subdomain' => 'smpn5teladan',
            'settings' => [
                'theme_palette' => 'blue',
                'school_grades' => ['smp'],
                'pro_groups' => ['pro_smp_unggul', 'pro_kedinasan', 'pro_utbk'],
            ],
        ]);

        $response = $this->get("http://{$tenant->subdomain}.localhost/");

        $response->assertStatus(200);
        $response->assertSee('SMP Negeri 5 Teladan');
        $response->assertSee('Fase D');
        $response->assertSee('tabBtnSmp7');
        $response->assertSee('tabBtnSmp8');
        $response->assertSee('tabBtnSmp9');
        $response->assertDontSee('tabBtnSma10');
        $response->assertDontSee('tabBtnSd1');
    }

    /**
     * Memastikan jika sekolah memilih jenjang SD, katalog SD Fase A-C yang ditampilkan.
     */
    public function test_school_portal_displays_only_selected_sd_grade(): void
    {
        $tenant = Tenant::factory()->create([
            'name' => 'SD Teladan Cendikia',
            'subdomain' => 'sdteladan',
            'settings' => [
                'theme_palette' => 'red',
                'school_grades' => ['sd'],
                'pro_groups' => ['pro_sd_olimpiade', 'pro_kelas_10', 'pro_kedinasan'],
            ],
        ]);

        $response = $this->get("http://{$tenant->subdomain}.localhost/");

        $response->assertStatus(200);
        $response->assertSee('SD Teladan Cendikia');
        $response->assertSee('tabBtnSd1');
        $response->assertSee('tabBtnSd6');
        $response->assertDontSee('tabBtnSma10');
        $response->assertDontSee('tabBtnSmp7');
    }

    /**
     * Memastikan portal sekolah dapat menampilkan semua jenjang sekaligus dengan tab switcher utama.
     */
    public function test_school_portal_displays_multi_grades_checklist(): void
    {
        $tenant = Tenant::factory()->create([
            'name' => 'Sekolah Terpadu Nusantara',
            'subdomain' => 'terpadunusantara',
            'settings' => [
                'theme_palette' => 'indigo',
                'school_grades' => ['sma', 'smp', 'sd'],
                'pro_groups' => ['pro_kelas_10', 'pro_kelas_11', 'pro_kelas_12'],
            ],
        ]);

        $response = $this->get("http://{$tenant->subdomain}.localhost/");

        $response->assertStatus(200);
        $response->assertSee('Sekolah Terpadu Nusantara');
        $response->assertSee('Fase E & F');
        $response->assertSee('Fase D');
        $response->assertSee('Fase A, B & C');
        $response->assertSee('tabBtnSma10');
        $response->assertSee('tabBtnSmp7');
        $response->assertSee('tabBtnSd1');
    }

    /**
     * Memastikan form branding memvalidasi minimal 3 pilihan grup PRO.
     */
    public function test_branding_update_fails_if_pro_groups_less_than_three(): void
    {
        $tenant = Tenant::factory()->create(['subdomain' => 'validasitest']);
        $admin = User::factory()->create([
            'current_tenant_id' => $tenant->id,
            'must_change_password' => false,
        ]);
        $admin->tenants()->attach($tenant->id, ['role' => 'A']);

        $response = $this->actingAs($admin)->put(route('tenants.branding.update', $tenant->id), [
            'grade_settings_submitted' => '1',
            'school_grades' => ['sma'],
            'pro_groups' => ['pro_kelas_10', 'pro_kelas_11'], // hanya 2, harus minimal 3
        ]);

        $response->assertSessionHasErrors('pro_groups');
    }

    /**
     * Memastikan form branding memvalidasi kewajiban memilih minimal 1 jenjang sekolah.
     */
    public function test_branding_update_fails_if_school_grades_is_missing(): void
    {
        $tenant = Tenant::factory()->create(['subdomain' => 'validasitest2']);
        $admin = User::factory()->create([
            'current_tenant_id' => $tenant->id,
            'must_change_password' => false,
        ]);
        $admin->tenants()->attach($tenant->id, ['role' => 'A']);

        $response = $this->actingAs($admin)->put(route('tenants.branding.update', $tenant->id), [
            'grade_settings_submitted' => '1',
            'school_grades' => [], // kosong
            'pro_groups' => ['pro_kelas_10', 'pro_kelas_11', 'pro_kelas_12'],
        ]);

        $response->assertSessionHasErrors('school_grades');
    }

    /**
     * Memastikan form branding sukses menyimpan palet warna, jenjang sekolah checklist, dan grup PRO.
     */
    public function test_branding_update_saves_theme_and_groups_successfully(): void
    {
        $tenant = Tenant::factory()->create(['subdomain' => 'suksesbranding']);
        $admin = User::factory()->create([
            'current_tenant_id' => $tenant->id,
            'must_change_password' => false,
        ]);
        $admin->tenants()->attach($tenant->id, ['role' => 'A']);

        $response = $this->actingAs($admin)->put(route('tenants.branding.update', $tenant->id), [
            'grade_settings_submitted' => '1',
            'theme_palette' => 'grape',
            'school_grades' => ['smp', 'sma', 'sd'],
            'pro_groups' => ['PRO', 'TKASD', 'TKASMP', 'TKASMA'],
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $tenant->refresh();
        $this->assertEquals('grape', $tenant->getThemePalette());
        $this->assertEquals(['smp', 'sma', 'sd'], $tenant->getSchoolGrades());
        $this->assertEquals('smp', $tenant->getSchoolGrade());
        $this->assertCount(4, $tenant->getProGroups());
        $this->assertTrue(in_array('PRO', $tenant->getProGroups(), true));
    }

    /**
     * Memastikan halaman gerbang ujian menampilkan deskripsi asesmen dalam bentuk markdown view.
     */
    public function test_exam_gate_displays_markdown_description_view(): void
    {
        $tenant = Tenant::factory()->create(['subdomain' => 'gatedesc']);
        $student = User::factory()->create([
            'current_tenant_id' => $tenant->id,
            'must_change_password' => false,
        ]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'title' => 'Simulasi UTBK Mandiri 2026',
            'description' => "### Petunjuk Ujian\nKerjakan soal dengan **teliti** dan *jujur*.\n- Waktu: 90 Menit\n- Formula: \$E = mc^2\$",
            'status' => 'published',
        ]);

        $response = $this->actingAs($student)->get(route('exam.gate.show', ['assessment' => $assessment->token]));

        $response->assertStatus(200);
        $response->assertSee('Simulasi UTBK Mandiri 2026');
        $response->assertSee('assessment-description-view', false);
        $response->assertSee('Petunjuk Ujian', false);
        $response->assertSee('<strong>teliti</strong>', false);
        $response->assertSee('<em>jujur</em>', false);
    }

    /**
     * Memastikan asesmen di bawah grup dan jenjang PRO tidak ditandai UMUM / UMU pada halaman depan portal tenant.
     */
    public function test_pro_assessments_do_not_display_umum_or_umu_badges_on_school_portal(): void
    {
        $tenant = Tenant::factory()->create([
            'subdomain' => 'proportaltest',
            'settings' => [
                'theme_palette' => 'indigo',
                'school_grade' => 'sma',
                'school_grades' => ['sma'],
                'pro_groups' => ['PRO', 'UTBK', 'SKD'],
            ],
        ]);

        Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'title' => 'UJIAN KHUSUS PROFESI',
            'type' => 'custom',
            'grade_level' => 'PRO',
            'status' => 'published',
            'is_global' => true,
        ]);

        Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'title' => 'UTBK SNBT 2027',
            'type' => 'custom',
            'grade_level' => 'UTBK',
            'status' => 'published',
            'is_global' => true,
        ]);

        $response = $this->get("http://{$tenant->subdomain}.localhost/");

        $response->assertStatus(200);
        $response->assertSee('UJIAN KHUSUS PROFESI');
        $response->assertSee('UTBK SNBT 2027');
        $response->assertDontSee('UMUM • PRO');
        $response->assertDontSee('UMUM • UTBK');
    }

    /**
     * Memastikan card tema warna portal sekolah pada dashboard branding tidak menampilkan 5 nada, pratinjau, atau kode warna bawah/pilih.
     */
    public function test_branding_theme_cards_render_clean_minimal_style_without_swatches_or_previews(): void
    {
        $tenant = Tenant::factory()->create(['subdomain' => 'cleanthemetest']);
        $admin = User::factory()->create([
            'current_tenant_id' => $tenant->id,
            'must_change_password' => false,
        ]);
        $admin->tenants()->attach($tenant->id, ['role' => 'A']);

        $response = $this->actingAs($admin)->get(route('tenants.branding.edit', $tenant->id));

        $response->assertStatus(200);
        $response->assertSee('Tema Warna Portal Sekolah');
        $response->assertDontSee('5 Nada');
        $response->assertDontSee('Portal Siswa');
        $response->assertDontSee('Ujian CBT');
        $response->assertDontSee('Palet Warna');
        $response->assertSee('theme-mini-card');
        $response->assertSee('#228BE6');
        $response->assertSee('#4C6EF5');
        $response->assertSee('#12B886');
        $response->assertSee('#FA5252');
    }

    /**
     * Memastikan icon / badge asesmen mengambil kode mata pelajaran (misal MAT, ENG, BIND, UMUM).
     */
    public function test_assessment_card_badge_takes_code_from_subject(): void
    {
        $tenant = Tenant::factory()->create([
            'subdomain' => 'badgetestportal',
            'settings' => [
                'theme_palette' => 'blue',
                'school_grade' => 'sma',
                'school_grades' => ['sma'],
                'pro_groups' => ['PRO'],
            ],
        ]);

        $subjectMat = Subject::factory()->create([
            'name' => 'Matematika Peminatan',
            'code' => 'MAT',
        ]);

        Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subjectMat->id,
            'title' => 'Simulasi Kalkulus Lanjut',
            'type' => 'custom',
            'grade_level' => 'PRO',
            'status' => 'published',
            'is_global' => true,
        ]);

        $response = $this->get("http://{$tenant->subdomain}.localhost/");

        $response->assertStatus(200);
        $response->assertSee('Simulasi Kalkulus Lanjut');
        $response->assertSee('MAT');
    }
}
