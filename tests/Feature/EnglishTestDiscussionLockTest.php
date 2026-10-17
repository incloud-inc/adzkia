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

class EnglishTestDiscussionLockTest extends TestCase
{
    use RefreshDatabase;

    private Tenant $tenant;

    private User $student;

    private User $teacher;

    private Subject $englishSubject;

    private Subject $mathSubject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tenant = Tenant::factory()->create(['plan' => 'whitelabel']);

        $this->student = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $this->student->tenants()->attach($this->tenant->id, ['role' => 'U']);

        $this->teacher = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $this->teacher->tenants()->attach($this->tenant->id, ['role' => 'T']);

        $this->englishSubject = Subject::factory()->create([
            'name' => 'Bahasa Inggris',
            'code' => 'ENG',
        ]);

        $this->mathSubject = Subject::factory()->create([
            'name' => 'Matematika',
            'code' => 'MTK',
        ]);
    }

    public function test_assessment_is_english_test_detector(): void
    {
        $toeicAssessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'title' => 'Simulasi TOEIC Official Preparation',
            'type' => 'toeic',
        ]);
        $this->assertTrue($toeicAssessment->isEnglishTest());

        $toeflAssessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'title' => 'TOEFL ITP Diagnostic Test',
            'type' => 'exam',
            'scoring_type' => 'toefl',
        ]);
        $this->assertTrue($toeflAssessment->isEnglishTest());

        $subjectEnglishAssessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'subject_id' => $this->englishSubject->id,
            'title' => 'Ujian Akhir Semester Bahasa Inggris',
            'type' => 'exam',
        ]);
        $this->assertTrue($subjectEnglishAssessment->isEnglishTest());

        $mathAssessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'subject_id' => $this->mathSubject->id,
            'title' => 'Ulangan Harian Aljabar Linear',
            'type' => 'exam',
            'scoring_type' => 'standard',
        ]);
        $this->assertFalse($mathAssessment->isEnglishTest());
    }

    public function test_student_is_redirected_to_analysis_when_accessing_discussion_for_english_test(): void
    {
        $assessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'title' => 'Official TOEIC Listening and Reading Test',
            'type' => 'toeic',
            'scoring_type' => 'toeic',
            'status' => 'published',
        ]);

        $section = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Listening Section',
            'order' => 1,
        ]);

        $question = Question::create([
            'assessment_section_id' => $section->id,
            'type' => 'mcq_single',
            'prompt' => 'What is the speaker mainly discussing?',
            'points' => 1.0,
            'order' => 1,
        ]);

        QuestionOption::create([
            'question_id' => $question->id,
            'label' => 'A',
            'option_text' => 'Option A',
            'is_correct' => true,
            'order' => 1,
        ]);

        $session = ExamSession::create([
            'user_id' => $this->student->id,
            'assessment_id' => $assessment->id,
            'tenant_id' => $this->tenant->id,
            'status' => 'completed',
            'started_at' => now()->subMinutes(60),
            'completed_at' => now(),
            'score' => 785.0,
            'total_correct' => 1,
            'total_incorrect' => 0,
            'total_unanswered' => 0,
        ]);

        $response = $this->actingAs($this->student)
            ->get(route('exam.result', ['session' => $session->uuid]));

        $response->assertRedirect(route('exam.analysis', ['session' => $session->uuid]));
        $response->assertSessionHas('warning');
    }

    public function test_student_receives_403_json_when_requesting_english_test_discussion(): void
    {
        $assessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'title' => 'TOEFL ITP Section Practice',
            'type' => 'toefl',
            'status' => 'published',
        ]);

        $session = ExamSession::create([
            'user_id' => $this->student->id,
            'assessment_id' => $assessment->id,
            'tenant_id' => $this->tenant->id,
            'status' => 'completed',
            'started_at' => now()->subMinutes(30),
            'completed_at' => now(),
            'score' => 550.0,
        ]);

        $response = $this->actingAs($this->student)
            ->getJson(route('exam.result', ['session' => $session->uuid]));

        $response->assertStatus(403);
        $response->assertJsonFragment([
            'message' => 'Halaman pembahasan untuk asesmen Bahasa Inggris (English Test) dirahasiakan untuk peserta ujian.',
        ]);
    }

    public function test_student_is_forbidden_from_generating_ai_explanation_on_english_test(): void
    {
        $assessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'title' => 'IELTS Academic Reading Mock Test',
            'type' => 'ielts',
            'status' => 'published',
        ]);

        $section = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Reading Passage 1',
            'order' => 1,
        ]);

        $question = Question::create([
            'assessment_section_id' => $section->id,
            'type' => 'mcq_single',
            'prompt' => 'According to paragraph 2, why did the author conclude this?',
            'points' => 1.0,
            'order' => 1,
        ]);

        $session = ExamSession::create([
            'user_id' => $this->student->id,
            'assessment_id' => $assessment->id,
            'tenant_id' => $this->tenant->id,
            'status' => 'completed',
            'started_at' => now()->subMinutes(30),
            'completed_at' => now(),
            'score' => 6.5,
        ]);

        $response = $this->actingAs($this->student)
            ->postJson("/exam/session/{$session->uuid}/question/{$question->id}/ai-explanation");

        $response->assertStatus(403);
        $response->assertJson([
            'ok' => false,
            'success' => false,
        ]);
    }

    public function test_teacher_can_access_discussion_for_english_test(): void
    {
        $assessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'title' => 'TOEIC Official Simulation',
            'type' => 'toeic',
            'status' => 'published',
        ]);

        $section = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Reading Section',
            'order' => 1,
        ]);

        $question = Question::create([
            'assessment_section_id' => $section->id,
            'type' => 'mcq_single',
            'prompt' => 'Sample Question',
            'points' => 1.0,
            'order' => 1,
        ]);

        QuestionOption::create([
            'question_id' => $question->id,
            'label' => 'A',
            'option_text' => 'Option A',
            'is_correct' => true,
            'order' => 1,
        ]);

        $session = ExamSession::create([
            'user_id' => $this->student->id,
            'assessment_id' => $assessment->id,
            'tenant_id' => $this->tenant->id,
            'status' => 'completed',
            'started_at' => now()->subMinutes(30),
            'completed_at' => now(),
            'score' => 800.0,
        ]);

        $response = $this->actingAs($this->teacher)
            ->get(route('exam.result', ['session' => $session->uuid]));

        $response->assertOk();
    }

    public function test_student_can_access_discussion_for_non_english_exam(): void
    {
        $assessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'subject_id' => $this->mathSubject->id,
            'title' => 'Ujian Akhir Semester Matematika',
            'type' => 'exam',
            'scoring_type' => 'standard',
            'status' => 'published',
        ]);

        $section = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Bagian A',
            'order' => 1,
        ]);

        $question = Question::create([
            'assessment_section_id' => $section->id,
            'type' => 'mcq_single',
            'prompt' => 'Berapa 10 + 25?',
            'points' => 1.0,
            'order' => 1,
        ]);

        QuestionOption::create([
            'question_id' => $question->id,
            'label' => 'A',
            'option_text' => '35',
            'is_correct' => true,
            'order' => 1,
        ]);

        $session = ExamSession::create([
            'user_id' => $this->student->id,
            'assessment_id' => $assessment->id,
            'tenant_id' => $this->tenant->id,
            'status' => 'completed',
            'started_at' => now()->subMinutes(30),
            'completed_at' => now(),
            'score' => 100.0,
        ]);

        $response = $this->actingAs($this->student)
            ->get(route('exam.result', ['session' => $session->uuid]));

        $response->assertOk();
    }

    public function test_workspace_redirects_completed_english_test_directly_to_analysis_for_student(): void
    {
        $assessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'title' => 'TOEIC Placement Test',
            'type' => 'toeic',
            'status' => 'published',
        ]);

        $session = ExamSession::create([
            'user_id' => $this->student->id,
            'assessment_id' => $assessment->id,
            'tenant_id' => $this->tenant->id,
            'status' => 'completed',
            'started_at' => now()->subMinutes(30),
            'completed_at' => now(),
            'score' => 600.0,
        ]);

        $response = $this->actingAs($this->student)
            ->get(route('exam.workspace', ['session' => $session->uuid]));

        $response->assertRedirect(route('exam.analysis', ['session' => $session->uuid]));
    }
}
