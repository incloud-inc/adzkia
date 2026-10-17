<?php

namespace Tests\Feature;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageTitleRenderTest extends TestCase
{
    use RefreshDatabase;

    public function test_exam_history_page_renders_clean_title_without_double_amp_entity(): void
    {
        $tenant = Tenant::factory()->create([
            'subdomain' => 'dikdasmen',
            'name' => 'Dikdasmen Muhammadiyah',
            'plan' => 'gratis',
        ]);

        $student = User::factory()->create([
            'current_tenant_id' => $tenant->id,
        ]);
        $tenant->users()->attach($student->id, ['role' => 'U']);

        $response = $this->actingAs($student)
            ->get('http://dikdasmen.localhost:8000/exam-history');

        $response->assertOk();
        // HTML <title> should escape ampersand once to &amp;, never &amp;amp;
        $response->assertSee('<title>Riwayat Ujian &amp; Hasil Belajar Siswa - ADZKIA</title>', false);
        $response->assertDontSee('&amp;amp;', false);
    }

    public function test_settings_page_renders_clean_title_without_double_amp_entity(): void
    {
        $tenant = Tenant::factory()->create([
            'subdomain' => 'dikdasmen',
            'name' => 'Dikdasmen Muhammadiyah',
            'plan' => 'gratis',
        ]);

        $owner = User::factory()->create([
            'current_tenant_id' => $tenant->id,
        ]);
        $tenant->users()->attach($owner->id, ['role' => 'S']);

        $response = $this->actingAs($owner)
            ->get('http://dikdasmen.localhost:8000/settings');

        $response->assertOk();
        $response->assertSee('<title>Pengaturan Sistem &amp; Payment Gateway - ADZKIA</title>', false);
        $response->assertDontSee('&amp;amp;', false);
    }
}
