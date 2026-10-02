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

class AssessmentTokenUrlTest extends TestCase
{
    use RefreshDatabase;

    private Tenant $tenant;

    private User $student;

    private Assessment $assessment;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tenant = Tenant::factory()->create();

        $this->student = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $this->student->tenants()->attach($this->tenant->id, ['role' => 'U']);

        $subject = Subject::factory()->create();

        // Buat assessment dengan token eksplisit
        $this->assessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'subject_id' => $subject->id,
            'title' => 'Tryout Akbar SNBT Token URL',
            'status' => 'published',
            'duration_minutes' => 60,
            'price_type' => 'free',
            'settings' => [
                'token' => 'ADZ777',
                'randomize_questions' => false,
                'randomize_options' => false,
            ],
        ]);

        $section = AssessmentSection::factory()->create([
            'assessment_id' => $this->assessment->id,
            'title' => 'Section Utama',
            'duration_minutes' => 60,
        ]);

        Question::factory()->create([
            'assessment_section_id' => $section->id,
            'type' => 'mcq_single',
            'prompt' => 'Soal Uji Coba Token',
        ]);
    }

    public function test_route_exam_gate_generates_url_using_token_instead_of_id(): void
    {
        $url = route('exam.gate.show', $this->assessment);

        // Pastikan URL mengandung token ADZ777 dan TIDAK menggunakan ID numerik murni di ujung URL
        $this->assertStringContainsString('/exam/start/ADZ777', $url);
        $this->assertStringNotContainsString('/exam/start/'.$this->assessment->id, $url);
    }

    public function test_student_can_access_exam_gate_using_token_url(): void
    {
        $response = $this->actingAs($this->student)
            ->get('/exam/start/ADZ777');

        $response->assertStatus(200);
        $response->assertSee('Tryout Akbar SNBT Token URL');
        $response->assertSee('Gerbang Ujian');
    }

    public function test_student_can_start_exam_using_token_url(): void
    {
        $response = $this->actingAs($this->student)
            ->post('/exam/start/ADZ777', [
                'agree' => '1',
            ]);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('exam_sessions', [
            'assessment_id' => $this->assessment->id,
            'user_id' => $this->student->id,
            'status' => 'in_progress',
        ]);
    }

    public function test_exam_shortcut_redirects_to_token_url(): void
    {
        $response = $this->actingAs($this->student)
            ->get('/exam/ADZ777');

        $response->assertStatus(302);
        $response->assertRedirect('/exam/start/ADZ777');
    }

    public function test_legacy_numeric_id_url_still_resolves_cleanly(): void
    {
        $response = $this->actingAs($this->student)
            ->get('/exam/start/'.$this->assessment->id);

        $response->assertStatus(200);
        $response->assertSee('Tryout Akbar SNBT Token URL');
    }

    public function test_automatic_token_generation_when_created_without_token(): void
    {
        $newAssessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'subject_id' => $this->assessment->subject_id,
            'title' => 'Asesmen Tanpa Token Manual',
            'status' => 'published',
            'type' => 'utbk',
            'settings' => [],
        ]);

        $this->assertNotEmpty($newAssessment->token);
        $this->assertMatchesRegularExpression('/^ADZ\d{3}$/', $newAssessment->token);

        // URL otomatis memakai token baru ini
        $url = route('exam.gate.show', $newAssessment);
        $this->assertStringContainsString('/exam/start/'.$newAssessment->token, $url);
    }
}
