<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenantWhatsAppShareTest extends TestCase
{
    use RefreshDatabase;

    private Tenant $tenant;

    private User $tenantAdmin;

    private User $tenantTeacher;

    private User $superUser;

    private User $student;

    private Assessment $assessment;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tenant = Tenant::factory()->create([
            'name' => 'SMA Teladan Bangsa',
        ]);

        $this->tenantAdmin = User::factory()->create([
            'current_tenant_id' => $this->tenant->id,
        ]);
        $this->tenantAdmin->tenants()->attach($this->tenant->id, ['role' => 'A']);

        $this->tenantTeacher = User::factory()->create([
            'current_tenant_id' => $this->tenant->id,
        ]);
        $this->tenantTeacher->tenants()->attach($this->tenant->id, ['role' => 'T']);

        $this->superUser = User::factory()->create([
            'current_tenant_id' => $this->tenant->id,
        ]);
        $this->superUser->tenants()->attach($this->tenant->id, ['role' => 'S']);

        $this->student = User::factory()->create([
            'current_tenant_id' => $this->tenant->id,
        ]);
        $this->student->tenants()->attach($this->tenant->id, ['role' => 'U']);

        $subject = Subject::factory()->create(['name' => 'Matematika Peminatan']);

        $this->assessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'subject_id' => $subject->id,
            'title' => 'Simulasi UTBK SNBT 2026',
            'status' => 'published',
            'grade_level' => '12',
            'duration_minutes' => 90,
            'price_type' => 'free',
            'price' => 0,
            'settings' => [
                'token' => 'ADZ888',
                'randomize_questions' => false,
                'randomize_options' => false,
            ],
        ]);
    }

    public function test_assessment_to_whatsapp_payload_structure(): void
    {
        $payload = $this->assessment->toWhatsAppPayload($this->tenant);

        $this->assertSame($this->assessment->id, $payload['id']);
        $this->assertSame('Simulasi UTBK SNBT 2026', $payload['title']);
        $this->assertSame('SMA Teladan Bangsa', $payload['tenant_name']);
        $this->assertSame('Matematika Peminatan', $payload['subject']);
        $this->assertSame('Kelas 12', $payload['grade']);
        $this->assertSame(90, $payload['duration']);
        $this->assertSame('ADZ888', $payload['token']);
        $this->assertStringContainsString('/exam/ADZ888', $payload['url']);
        $this->assertSame('Gratis', $payload['price_formatted']);
    }

    public function test_tenant_admin_and_teacher_see_whatsapp_share_button_in_table(): void
    {
        // 1. Tenant Admin
        $responseAdmin = $this->actingAs($this->tenantAdmin)->get(route('assessments.index'));
        $responseAdmin->assertStatus(200);
        $responseAdmin->assertSee('open-share-whatsapp-modal');
        $responseAdmin->assertSee('Bagikan ke WhatsApp');
        $responseAdmin->assertSee('ADZ888');

        // 2. Tenant Teacher
        $responseTeacher = $this->actingAs($this->tenantTeacher)->get(route('assessments.index'));
        $responseTeacher->assertStatus(200);
        $responseTeacher->assertSee('open-share-whatsapp-modal');
        $responseTeacher->assertSee('Bagikan ke WhatsApp');
    }

    public function test_owner_super_user_does_not_see_whatsapp_share_button(): void
    {
        $response = $this->actingAs($this->superUser)->get(route('assessments.index'));
        $response->assertStatus(200);
        $response->assertDontSee('open-share-whatsapp-modal');
        $response->assertDontSee('Bagikan ke WhatsApp');
    }

    public function test_student_does_not_see_whatsapp_share_button(): void
    {
        $response = $this->actingAs($this->student)->get(route('assessments.index'));
        $response->assertStatus(200);
        $response->assertDontSee('open-share-whatsapp-modal');
        $response->assertDontSee('Bagikan ke WhatsApp');
    }

    public function test_unauthenticated_visitor_or_whatsapp_crawler_can_resolve_and_view_gate_with_opengraph_tags(): void
    {
        // 1. Resolve /exam/ADZ888 redirects to /exam/start/ADZ888
        $resolveResponse = $this->get('/exam/ADZ888');
        $resolveResponse->assertStatus(302);
        $resolveResponse->assertRedirect('/exam/start/ADZ888');

        // 2. Access /exam/start/ADZ888 as guest (HTTP 200, no 302 login redirect)
        $gateResponse = $this->get('/exam/start/ADZ888');
        $gateResponse->assertStatus(200);

        // OpenGraph Meta Tags
        $gateResponse->assertSee('<meta property="og:type" content="website">', false);
        $gateResponse->assertSee('og:site_name', false);
        $gateResponse->assertSee('og:title', false);
        $gateResponse->assertSee('og:description', false);
        $gateResponse->assertSee('og:image', false);
        $gateResponse->assertSee('twitter:card', false);

        // Guest UI
        $gateResponse->assertSee('Akses Tamu / Belum Masuk Akun');
        $gateResponse->assertSee('Masuk untuk Memulai Ujian');
        $gateResponse->assertSee(route('login'));
    }

    public function test_unauthenticated_user_cannot_start_exam(): void
    {
        $response = $this->post('/exam/start/ADZ888', [
            'agree' => '1',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }
}
