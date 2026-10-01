<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\AssessmentSection;
use App\Models\ExamAnswer;
use App\Models\ExamSession;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExamResultAndGradingTest extends TestCase
{
    use RefreshDatabase;

    private Tenant $tenant;

    private User $teacher;

    private User $student;

    private User $otherStudent;

    private Assessment $assessment;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tenant = Tenant::factory()->create();

        $this->teacher = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $this->teacher->tenants()->attach($this->tenant->id, ['role' => 'T']);

        $this->student = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $this->student->tenants()->attach($this->tenant->id, ['role' => 'U']);

        $this->otherStudent = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $this->otherStudent->tenants()->attach($this->tenant->id, ['role' => 'U']);

        $subject = Subject::factory()->create();
        $this->assessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'subject_id' => $subject->id,
            'title' => 'Ujian Akhir Semester IPA',
            'status' => 'published',
            'settings' => [
                'passing_grade' => [
                    'enabled' => true,
                    'min_score' => 70,
                    'pass_label' => 'Tuntas',
                    'fail_label' => 'Remedial',
                ],
            ],
        ]);
    }

    public function test_student_can_view_own_exam_result(): void
    {
        $section = AssessmentSection::factory()->create(['assessment_id' => $this->assessment->id]);
        $question = Question::factory()->create([
            'assessment_section_id' => $section->id,
            'type' => 'mcq_single',
            'points' => 10,
        ]);

        $session = ExamSession::create([
            'assessment_id' => $this->assessment->id,
            'user_id' => $this->student->id,
            'tenant_id' => $this->tenant->id,
            'status' => 'completed',
            'started_at' => now()->subMinutes(30),
            'completed_at' => now(),
            'score' => 10,
            'max_score' => 10,
        ]);

        ExamAnswer::create([
            'exam_session_id' => $session->id,
            'question_id' => $question->id,
            'is_correct' => true,
            'points_awarded' => 10,
            'answered_at' => now(),
        ]);

        $response = $this->actingAs($this->student)->get(route('exam.result', $session));

        $response->assertStatus(200);
        $response->assertSee('Hasil Ujian CBT');
        $response->assertSee('Ujian Akhir Semester IPA');
        $response->assertSee('Pembahasan Resmi');
    }

    public function test_student_cannot_view_other_students_result(): void
    {
        $session = ExamSession::create([
            'assessment_id' => $this->assessment->id,
            'user_id' => $this->student->id,
            'tenant_id' => $this->tenant->id,
            'status' => 'completed',
            'started_at' => now()->subMinutes(30),
            'completed_at' => now(),
        ]);

        $response = $this->actingAs($this->otherStudent)->get(route('exam.result', $session));

        $response->assertStatus(403);
    }

    public function test_result_displays_teacher_review_banner_when_essay_is_pending(): void
    {
        $section = AssessmentSection::factory()->create(['assessment_id' => $this->assessment->id]);
        Question::factory()->create([
            'assessment_section_id' => $section->id,
            'type' => 'essay',
            'points' => 20,
        ]);

        $session = ExamSession::create([
            'assessment_id' => $this->assessment->id,
            'user_id' => $this->student->id,
            'tenant_id' => $this->tenant->id,
            'status' => 'completed',
            'started_at' => now()->subMinutes(20),
            'completed_at' => now(),
            'score' => 0,
            'max_score' => 20,
            'meta' => ['is_score_released' => false],
        ]);

        $response = $this->actingAs($this->student)->get(route('exam.result', $session));

        $response->assertStatus(200);
        $response->assertSee('Essay: Diperiksa Guru');
    }

    public function test_teacher_can_access_grading_index_and_student_cannot(): void
    {
        $teacherResponse = $this->actingAs($this->teacher)->get(route('assessments.grading', $this->assessment));
        $teacherResponse->assertStatus(200);
        $teacherResponse->assertSee('Koreksi & Penilaian');

        $studentResponse = $this->actingAs($this->student)->get(route('assessments.grading', $this->assessment));
        $studentResponse->assertStatus(403);
    }

    public function test_teacher_can_grade_essay_and_release_final_score(): void
    {
        $section = AssessmentSection::factory()->create(['assessment_id' => $this->assessment->id]);
        $essayQuestion = Question::factory()->create([
            'assessment_section_id' => $section->id,
            'type' => 'essay',
            'points' => 25,
        ]);

        $session = ExamSession::create([
            'assessment_id' => $this->assessment->id,
            'user_id' => $this->student->id,
            'tenant_id' => $this->tenant->id,
            'status' => 'completed',
            'started_at' => now()->subMinutes(30),
            'completed_at' => now(),
            'score' => 0,
            'max_score' => 25,
            'meta' => ['is_score_released' => false],
        ]);

        ExamAnswer::create([
            'exam_session_id' => $session->id,
            'question_id' => $essayQuestion->id,
            'answer_payload' => ['text' => 'Ini jawaban essay yang sangat lengkap dari siswa.'],
            'answered_at' => now(),
        ]);

        // 1. Guru membuka lembar koreksi
        $showResponse = $this->actingAs($this->teacher)->get(route('assessments.grading.session', [
            'assessment' => $this->assessment->id,
            'session' => $session->uuid,
        ]));
        $showResponse->assertStatus(200);
        $showResponse->assertSee('Ini jawaban essay yang sangat lengkap dari siswa.');

        // 2. Guru memberikan skor dan merilis nilai
        $gradeResponse = $this->actingAs($this->teacher)->post(route('assessments.grading.grade', [
            'assessment' => $this->assessment->id,
            'session' => $session->uuid,
        ]), [
            'action' => 'release_final',
            'grades' => [
                $essayQuestion->id => 22.5,
            ],
            'feedbacks' => [
                $essayQuestion->id => 'Penjelasan sangat baik dan runtut.',
            ],
        ]);

        $gradeResponse->assertRedirect(route('assessments.grading', $this->assessment));

        $session->refresh();
        $this->assertEquals(22.5, (float) $session->score);
        $this->assertTrue((bool) data_get($session->meta, 'is_score_released'));

        // 3. Siswa sekarang melihat nilai final yang telah dirilis beserta catatan guru
        $studentResultResponse = $this->actingAs($this->student)->get(route('exam.result', $session));
        $studentResultResponse->assertStatus(200);
        $studentResultResponse->assertSee('Penjelasan sangat baik dan runtut.');
    }
}
