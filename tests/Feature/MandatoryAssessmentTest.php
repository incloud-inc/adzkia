<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\AssessmentSection;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MandatoryAssessmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_owner_can_toggle_mandatory_assessment_status(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $owner = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $owner->tenants()->attach($tenant->id, ['role' => 'S']);

        $subject = Subject::factory()->create(['name' => 'Fisika Wajib']);
        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'created_by' => $owner->id,
            'is_mandatory' => false,
        ]);

        $response = $this->actingAs($owner)->patch(route('assessments.toggle-mandatory', $assessment));
        $response->assertRedirect();

        $assessment->refresh();
        $this->assertTrue($assessment->is_mandatory);

        // Toggle back
        $response2 = $this->actingAs($owner)->patch(route('assessments.toggle-mandatory', $assessment));
        $response2->assertRedirect();

        $assessment->refresh();
        $this->assertFalse($assessment->is_mandatory);
    }

    public function test_teacher_cannot_toggle_mandatory_status(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'premium']);
        $teacher = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        $subject = Subject::factory()->create();
        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'created_by' => $teacher->id,
            'is_mandatory' => false,
        ]);

        $response = $this->actingAs($teacher)->patch(route('assessments.toggle-mandatory', $assessment));
        $response->assertStatus(403);
    }

    public function test_console_command_inserts_grade12_triangle_image(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'premium']);
        $user = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $subject = Subject::factory()->create();

        $assessment12 = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'created_by' => $user->id,
            'grade_level' => '12',
            'title' => 'Ujian Fisika Kelas 12',
        ]);

        $section = AssessmentSection::create([
            'assessment_id' => $assessment12->id,
            'title' => 'Bagian A',
            'order' => 1,
        ]);

        $question1 = Question::create([
            'assessment_section_id' => $section->id,
            'type' => 'mcq_single',
            'prompt' => 'Hitunglah panjang sisi miring dari segitiga berikut:',
            'order' => 1,
            'points' => 1.0,
        ]);

        $this->artisan('assessments:insert-grade12-image')
            ->assertExitCode(0);

        $question1->refresh();
        $this->assertStringContainsString('YQqjHBJTCflSIP1XktU3a3kwHa7kjt0Tk1pikv0h.webp', $question1->prompt);
        $this->assertStringContainsString('![segitiga siku-siku.webp]', $question1->prompt);
    }
}
