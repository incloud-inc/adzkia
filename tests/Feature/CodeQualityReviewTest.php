<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\AssessmentSection;
use App\Models\ExamAnswer;
use App\Models\ExamSession;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use App\Services\ExamGradingService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CodeQualityReviewTest extends TestCase
{
    use RefreshDatabase;

    private Tenant $tenant;

    private User $student;

    private Assessment $assessment;

    private AssessmentSection $section;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tenant = Tenant::factory()->create();

        $this->student = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $this->student->tenants()->attach($this->tenant->id, ['role' => 'U']);

        $subject = Subject::factory()->create();
        $this->assessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'subject_id' => $subject->id,
            'title' => 'Tryout Kualitas Kode',
            'status' => 'published',
            'duration_minutes' => 60,
        ]);

        $this->section = AssessmentSection::factory()->create([
            'assessment_id' => $this->assessment->id,
            'title' => 'Bagian Logika Penalaran',
            'duration_minutes' => 30,
        ]);
    }

    public function test_no_unresolved_todo_or_fixme_in_app_directory(): void
    {
        $appPath = app_path();
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($appPath));

        $foundTodos = [];
        /** @var \SplFileInfo $file */
        foreach ($files as $file) {
            if ($file->isDir() || $file->getExtension() !== 'php') {
                continue;
            }

            $content = file_get_contents($file->getRealPath());
            if (preg_match('/\b(TODO|FIXME|XXX)\b/i', $content, $matches)) {
                $foundTodos[] = $file->getFilename();
            }
        }

        $this->assertEmpty($foundTodos, 'Ditemukan TODO/FIXME yang belum diselesaikan pada file: '.implode(', ', $foundTodos));
    }

    public function test_exam_grading_service_auto_grades_accurately_and_idempotently(): void
    {
        // 1. Soal MCQ Single
        $mcq = Question::factory()->create([
            'assessment_section_id' => $this->section->id,
            'type' => 'mcq_single',
            'points' => 5,
        ]);
        $mcqCorrect = QuestionOption::factory()->create([
            'question_id' => $mcq->id,
            'is_correct' => true,
            'order' => 1,
        ]);
        $mcqWrong = QuestionOption::factory()->create([
            'question_id' => $mcq->id,
            'is_correct' => false,
            'order' => 2,
        ]);

        // 2. Soal Short Answer
        $shortAns = Question::factory()->create([
            'assessment_section_id' => $this->section->id,
            'type' => 'short_answer',
            'points' => 10,
        ]);
        QuestionOption::factory()->create([
            'question_id' => $shortAns->id,
            'option_text' => 'Jakarta',
            'is_correct' => true,
        ]);

        // Buat ExamSession
        $session = ExamSession::create([
            'assessment_id' => $this->assessment->id,
            'user_id' => $this->student->id,
            'tenant_id' => $this->tenant->id,
            'status' => 'in_progress',
            'started_at' => now(),
            'duration_minutes' => 60,
            'question_count' => 2,
        ]);

        // Berikan jawaban benar untuk MCQ dan short answer
        ExamAnswer::create([
            'exam_session_id' => $session->id,
            'question_id' => $mcq->id,
            'answer_payload' => ['option_id' => $mcqCorrect->id],
        ]);

        ExamAnswer::create([
            'exam_session_id' => $session->id,
            'question_id' => $shortAns->id,
            'answer_payload' => ['value' => 'jakarta '], // tes case-insensitive & trim
        ]);

        // Eksekusi autoGradeSession
        ExamGradingService::autoGradeSession($session);
        $session->refresh();

        $this->assertEquals(15.0, (float) $session->score);
        $this->assertEquals(15.0, (float) $session->max_score);

        // Uji idempotency: Jalankan grading kedua kali, skor tidak boleh berubah atau terakumulasi ganda
        ExamGradingService::autoGradeSession($session);
        $session->refresh();

        $this->assertEquals(15.0, (float) $session->score);
    }
}
