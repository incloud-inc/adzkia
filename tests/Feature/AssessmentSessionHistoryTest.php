<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\ExamSession;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AssessmentSessionHistoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_super_user_can_access_assessment_sessions_history(): void
    {
        $tenant1 = Tenant::factory()->create(['name' => 'SMA 1 Jakarta']);
        $tenant2 = Tenant::factory()->create(['name' => 'SMA 2 Bandung']);

        $superUser = User::factory()->create();
        $superUser->tenants()->attach($tenant1->id, ['role' => 'S']);

        $assessment1 = Assessment::factory()->create(['title' => 'Matematika Dasar', 'tenant_id' => $tenant1->id]);
        $assessment2 = Assessment::factory()->create(['title' => 'Fisika Kuantum', 'tenant_id' => $tenant2->id]);

        $student1 = User::factory()->create(['name' => 'Ahmad Siswa', 'email' => 'ahmad@sma1.sch.id']);
        $student1->tenants()->attach($tenant1->id, ['role' => 'U']);

        $student2 = User::factory()->create(['name' => 'Budi Santoso', 'email' => 'budi@sma2.sch.id']);
        $student2->tenants()->attach($tenant2->id, ['role' => 'U']);

        ExamSession::create([
            'assessment_id' => $assessment1->id,
            'user_id' => $student1->id,
            'tenant_id' => $tenant1->id,
            'status' => 'completed',
            'started_at' => now()->subHours(2),
            'completed_at' => now()->subHour(),
            'score' => 85.00,
            'max_score' => 100.00,
        ]);

        ExamSession::create([
            'assessment_id' => $assessment2->id,
            'user_id' => $student2->id,
            'tenant_id' => $tenant2->id,
            'status' => 'in_progress',
            'started_at' => now()->subMinutes(30),
        ]);

        $response = $this->actingAs($superUser)->get(route('assessment-sessions.index'));

        $response->assertOk();
        $response->assertSee('Monitoring &amp; Riwayat Sesi Asesmen', false);
        $response->assertSee('Ahmad Siswa');
        $response->assertSee('Budi Santoso');
        $response->assertSee('Matematika Dasar');
        $response->assertSee('Fisika Kuantum');
    }

    public function test_tenant_admin_only_sees_sessions_affiliated_with_their_tenant(): void
    {
        $tenant1 = Tenant::factory()->create(['name' => 'SMA 1 Jakarta']);
        $tenant2 = Tenant::factory()->create(['name' => 'SMA 2 Bandung']);

        $adminTenant1 = User::factory()->create(['current_tenant_id' => $tenant1->id]);
        $adminTenant1->tenants()->attach($tenant1->id, ['role' => 'A']);

        $assessment1 = Assessment::factory()->create(['title' => 'Kimia Organik', 'tenant_id' => $tenant1->id]);
        $assessment2 = Assessment::factory()->create(['title' => 'Biologi Sel', 'tenant_id' => $tenant2->id]);

        $student1 = User::factory()->create(['name' => 'Siswa SMA 1']);
        $student1->tenants()->attach($tenant1->id, ['role' => 'U']);

        $student2 = User::factory()->create(['name' => 'Siswa SMA 2']);
        $student2->tenants()->attach($tenant2->id, ['role' => 'U']);

        ExamSession::create([
            'assessment_id' => $assessment1->id,
            'user_id' => $student1->id,
            'tenant_id' => $tenant1->id,
            'status' => 'completed',
            'started_at' => now()->subHours(1),
        ]);

        ExamSession::create([
            'assessment_id' => $assessment2->id,
            'user_id' => $student2->id,
            'tenant_id' => $tenant2->id,
            'status' => 'completed',
            'started_at' => now()->subHours(1),
        ]);

        $response = $this->actingAs($adminTenant1)->get(route('assessment-sessions.index'));

        $response->assertOk();
        $response->assertSee('Siswa SMA 1');
        $response->assertSee('Kimia Organik');
        $response->assertDontSee('Siswa SMA 2');
        $response->assertDontSee('Biologi Sel');
    }

    public function test_teacher_can_access_sessions_history_for_their_tenant(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'SMA 3 Padang']);

        $teacher = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        $assessment = Assessment::factory()->create(['title' => 'Sejarah Nasional', 'tenant_id' => $tenant->id]);
        $student = User::factory()->create(['name' => 'Siswa Sejarah']);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        ExamSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'status' => 'interrupted_locked',
            'lock_reason' => 'Pergantian perangkat terdeteksi',
            'started_at' => now()->subMinutes(15),
        ]);

        $response = $this->actingAs($teacher)->get(route('assessment-sessions.index'));

        $response->assertOk();
        $response->assertSee('Siswa Sejarah');
        $response->assertSee('Terkunci');
        $response->assertSee('Buka Kunci');
    }

    public function test_student_cannot_access_assessment_sessions_history(): void
    {
        $tenant = Tenant::factory()->create();
        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $response = $this->actingAs($student)->get(route('assessment-sessions.index'));

        $response->assertStatus(403);
    }

    public function test_filter_by_status_and_search_works_correctly(): void
    {
        $tenant = Tenant::factory()->create();
        $superUser = User::factory()->create();
        $superUser->tenants()->attach($tenant->id, ['role' => 'S']);

        $assessment = Assessment::factory()->create(['tenant_id' => $tenant->id]);
        $studentA = User::factory()->create(['name' => 'Citra Lestari']);
        $studentB = User::factory()->create(['name' => 'Doni Pratama']);

        ExamSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => $studentA->id,
            'tenant_id' => $tenant->id,
            'status' => 'completed',
            'started_at' => now()->subHour(),
        ]);

        ExamSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => $studentB->id,
            'tenant_id' => $tenant->id,
            'status' => 'in_progress',
            'started_at' => now()->subMinutes(10),
        ]);

        // Filter status = in_progress
        $responseStatus = $this->actingAs($superUser)->get(route('assessment-sessions.index', ['status' => 'in_progress']));
        $responseStatus->assertOk();
        $responseStatus->assertSee('Doni Pratama');
        $responseStatus->assertDontSee('Citra Lestari');

        // Search name = Citra
        $responseSearch = $this->actingAs($superUser)->get(route('assessment-sessions.index', ['search' => 'Citra']));
        $responseSearch->assertOk();
        $responseSearch->assertSee('Citra Lestari');
        $responseSearch->assertDontSee('Doni Pratama');
    }

    public function test_ajax_search_assessments_returns_json_and_enforces_tenant_isolation(): void
    {
        $tenant1 = Tenant::factory()->create();
        $tenant2 = Tenant::factory()->create();

        $admin1 = User::factory()->create(['current_tenant_id' => $tenant1->id]);
        $admin1->tenants()->attach($tenant1->id, ['role' => 'A']);

        $asm1 = Assessment::factory()->create(['title' => 'Geografi Benua Asia', 'tenant_id' => $tenant1->id]);
        $asm2 = Assessment::factory()->create(['title' => 'Geografi Benua Eropa', 'tenant_id' => $tenant2->id]);

        $response = $this->actingAs($admin1)->getJson(route('assessment-sessions.search-assessments', ['q' => 'Geografi']));

        $response->assertOk();
        $response->assertJsonFragment(['id' => (string) $asm1->id, 'title' => 'Geografi Benua Asia']);
        $response->assertJsonMissing(['title' => 'Geografi Benua Eropa']);
    }

    public function test_ajax_search_tenants_only_accessible_by_super_user(): void
    {
        $tenant1 = Tenant::factory()->create(['name' => 'SMA Kusuma Bangsa']);
        $tenant2 = Tenant::factory()->create(['name' => 'SMP Cendekia']);

        $superUser = User::factory()->create();
        $superUser->tenants()->attach($tenant1->id, ['role' => 'S']);

        $teacher = User::factory()->create(['current_tenant_id' => $tenant1->id]);
        $teacher->tenants()->attach($tenant1->id, ['role' => 'T']);

        // Super User can search tenants
        $responseSuper = $this->actingAs($superUser)->getJson(route('assessment-sessions.search-tenants', ['q' => 'Kusuma']));
        $responseSuper->assertOk();
        $responseSuper->assertJsonFragment(['id' => (string) $tenant1->id, 'title' => 'SMA Kusuma Bangsa']);
        $responseSuper->assertJsonMissing(['title' => 'SMP Cendekia']);

        // Teacher is forbidden (403)
        $responseTeacher = $this->actingAs($teacher)->getJson(route('assessment-sessions.search-tenants', ['q' => 'Kusuma']));
        $responseTeacher->assertStatus(403);
    }
}
