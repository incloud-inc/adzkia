<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\AssessmentSection;
use App\Models\ExamSession;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SectionTimerAndOrderingTest extends TestCase
{
    use RefreshDatabase;

    private Tenant $tenant;

    private User $student;

    private User $teacher;

    private Assessment $assessment;

    private AssessmentSection $section;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tenant = Tenant::factory()->create(['plan' => 'premium']);

        $this->teacher = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $this->teacher->tenants()->attach($this->tenant->id, ['role' => 'T']);

        $this->student = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $this->student->tenants()->attach($this->tenant->id, ['role' => 'U']);

        $subject = Subject::factory()->create();
        $this->assessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'subject_id' => $subject->id,
            'title' => 'Simulasi Tes Sains dan Logika',
            'status' => 'published',
            'duration_minutes' => 90,
        ]);

        $this->section = AssessmentSection::create([
            'assessment_id' => $this->assessment->id,
            'title' => 'Bagian 1: Logika Urutan dan Algoritma',
            'order' => 1,
            'duration_minutes' => 15,
        ]);
    }

    public function test_ordering_questions_are_always_shuffled_in_workspace(): void
    {
        $orderingQ = Question::create([
            'assessment_section_id' => $this->section->id,
            'type' => 'ordering',
            'prompt' => 'Urutkan tahapan metamorfosis kupu-kupu berikut ini dengan benar:',
            'points' => 10,
            'order' => 1,
        ]);

        $stages = ['Telur', 'Ulat (Larva)', 'Kepompong (Pupa)', 'Kupu-kupu Dewasa'];
        foreach ($stages as $idx => $stage) {
            QuestionOption::create([
                'question_id' => $orderingQ->id,
                'label' => (string) ($idx + 1),
                'option_text' => $stage,
                'order' => $idx + 1,
            ]);
        }

        $session = ExamSession::create([
            'tenant_id' => $this->tenant->id,
            'user_id' => $this->student->id,
            'assessment_id' => $this->assessment->id,
            'status' => 'in_progress',
            'started_at' => now(),
            'expires_at' => now()->addMinutes(90),
            'schedule_snapshot' => [
                'randomize_questions' => false,
                'randomize_options' => false, // Opsi dimatikan, tapi ordering HARUS tetap teracak
            ],
            'question_count' => 1,
            'total_points' => 10,
        ]);

        $response = $this->actingAs($this->student)
            ->get(route('exam.workspace', ['session' => $session->uuid]));

        $response->assertOk();
        $payload = $response->viewData('payload');

        $this->assertNotEmpty($payload['questions']);
        $firstQ = $payload['questions'][0];
        $this->assertSame('ordering', $firstQ['type']);
        $this->assertSame(15, $firstQ['section_duration_minutes']);
        $this->assertSame($this->section->id, $firstQ['section_id']);

        $options = $firstQ['options'];
        $this->assertCount(4, $options);

        // Ambil urutan teks opsi yang disajikan ke siswa
        $optionTexts = array_map(fn ($o) => $o['content'], $options);

        // Harus TIDAK sama persis dengan urutan kunci jawaban awal
        $this->assertNotSame($stages, $optionTexts);
    }

    public function test_section_duration_minutes_is_saved_in_wizard_and_loaded(): void
    {
        $payload = [
            'title' => 'Asesmen Baru dengan Section Duration',
            'subject_id' => $this->assessment->subject_id,
            'type' => 'custom',
            'grade_level' => '10 SMA',
            'duration_minutes' => 60,
            'price_type' => 'free',
            'sections' => [
                [
                    'title' => 'Bagian A: Pemahaman Konsep',
                    'instructions' => 'Jawab dengan teliti',
                    'order' => 1,
                    'duration_minutes' => 20,
                    'items' => [
                        [
                            'type' => 'mcq_single',
                            'prompt' => 'Apa ibukota Indonesia?',
                            'points' => 10,
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Jakarta', 'is_correct' => true, 'score' => 10],
                                ['label' => 'B', 'option_text' => 'Bandung', 'is_correct' => false, 'score' => 0],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $response = $this->actingAs($this->teacher)
            ->postJson(route('assessments.store'), $payload);

        $response->assertOk();
        $assessmentId = $response->json('assessment_id');
        $createdSection = AssessmentSection::where('assessment_id', $assessmentId)->first();

        $this->assertNotNull($createdSection);
        $this->assertSame(20, $createdSection->duration_minutes);
    }

    public function test_saving_answer_for_expired_section_is_rejected(): void
    {
        $question = Question::create([
            'assessment_section_id' => $this->section->id,
            'type' => 'mcq_single',
            'prompt' => 'Pertanyaan uji section expired',
            'points' => 5,
            'order' => 1,
        ]);

        $session = ExamSession::create([
            'tenant_id' => $this->tenant->id,
            'user_id' => $this->student->id,
            'assessment_id' => $this->assessment->id,
            'status' => 'in_progress',
            'started_at' => now(),
            'expires_at' => now()->addMinutes(90),
            'meta' => [
                'expired_sections' => [$this->section->id],
            ],
            'question_count' => 1,
            'total_points' => 5,
        ]);

        $response = $this->actingAs($this->student)
            ->postJson(route('exam.session.answer', ['session' => $session->uuid]), [
                'question_id' => $question->id,
                'answer_payload' => ['selected_option_id' => 123],
            ]);

        $response->assertStatus(403);
    }
}
