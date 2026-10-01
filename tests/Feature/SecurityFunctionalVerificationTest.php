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
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SecurityFunctionalVerificationTest extends TestCase
{
    use RefreshDatabase;

    private Tenant $tenant;

    private User $student;

    private User $otherStudent;

    private Assessment $assessment;

    private AssessmentSection $section;

    private Question $question;

    private QuestionOption $correctOption;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tenant = Tenant::factory()->create();

        $this->student = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $this->student->tenants()->attach($this->tenant->id, ['role' => 'U']);

        $this->otherStudent = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $this->otherStudent->tenants()->attach($this->tenant->id, ['role' => 'U']);

        $subject = Subject::factory()->create();
        $this->assessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'subject_id' => $subject->id,
            'title' => 'Tryout Akbar UTBK SNBT Keamanan',
            'status' => 'published',
            'duration_minutes' => 60,
        ]);

        $this->section = AssessmentSection::factory()->create([
            'assessment_id' => $this->assessment->id,
            'title' => 'Kemampuan Penalaran Umum',
            'duration_minutes' => 30,
        ]);

        $this->question = Question::factory()->create([
            'assessment_section_id' => $this->section->id,
            'type' => 'mcq_single',
            'points' => 5,
        ]);

        $this->correctOption = QuestionOption::create([
            'question_id' => $this->question->id,
            'option_text' => 'Pilihan Jawaban Benar A',
            'is_correct' => true,
            'order' => 1,
        ]);
    }

    /**
     * 1. Happy Path: Siswa sah dapat menyimpan jawaban ujian dan data terpersist.
     */
    public function test_happy_path_student_saves_valid_answer(): void
    {
        $session = ExamSession::create([
            'assessment_id' => $this->assessment->id,
            'user_id' => $this->student->id,
            'tenant_id' => $this->tenant->id,
            'status' => 'in_progress',
            'started_at' => now(),
            'duration_minutes' => 60,
            'question_count' => 1,
        ]);

        $payload = [
            'question_id' => $this->question->id,
            'answer_payload' => [
                'option_id' => $this->correctOption->id,
            ],
            'is_flagged' => false,
        ];

        $response = $this->actingAs($this->student)
            ->postJson(route('exam.session.answer', $session), $payload);

        $response->assertStatus(200);
        $response->assertJson([
            'ok' => true,
            'answered' => 1,
            'total' => 1,
        ]);

        $this->assertDatabaseHas('exam_answers', [
            'exam_session_id' => $session->id,
            'question_id' => $this->question->id,
            'is_flagged' => false,
        ]);
    }

    /**
     * 2. Input Ilegal: Request dengan input tidak valid harus ditolak (HTTP 422).
     */
    public function test_illegal_input_rejected_with_validation_error(): void
    {
        $session = ExamSession::create([
            'assessment_id' => $this->assessment->id,
            'user_id' => $this->student->id,
            'tenant_id' => $this->tenant->id,
            'status' => 'in_progress',
            'started_at' => now(),
            'duration_minutes' => 60,
        ]);

        // Kasus: ID bukan integer / string acak
        $response1 = $this->actingAs($this->student)
            ->postJson(route('exam.session.answer', $session), [
                'question_id' => 'malicious-string-id',
                'answer_payload' => ['option_id' => 1],
            ]);
        $response1->assertStatus(422);

        // Kasus: ID soal tidak ada di database
        $response2 = $this->actingAs($this->student)
            ->postJson(route('exam.session.answer', $session), [
                'question_id' => 9999999,
                'answer_payload' => ['option_id' => 1],
            ]);
        $response2->assertStatus(422);

        // Kasus: answer_payload bertipe ilegal (string bukan array)
        $response3 = $this->actingAs($this->student)
            ->postJson(route('exam.session.answer', $session), [
                'question_id' => $this->question->id,
                'answer_payload' => 'illegal-string-payload',
            ]);
        $response3->assertStatus(422);
    }

    /**
     * 3. Boundary (0 / Negatif / Karakter Unicode 4-byte & Emoji).
     */
    public function test_boundary_values_and_unicode_handling(): void
    {
        $session = ExamSession::create([
            'assessment_id' => $this->assessment->id,
            'user_id' => $this->student->id,
            'tenant_id' => $this->tenant->id,
            'status' => 'in_progress',
            'started_at' => now(),
            'duration_minutes' => 60,
        ]);

        // Boundary: 0 dan negatif pada question_id
        $zeroResponse = $this->actingAs($this->student)
            ->postJson(route('exam.session.answer', $session), [
                'question_id' => 0,
            ]);
        $zeroResponse->assertStatus(422);

        $negativeResponse = $this->actingAs($this->student)
            ->postJson(route('exam.session.answer', $session), [
                'question_id' => -1,
            ]);
        $negativeResponse->assertStatus(422);

        // Boundary Unicode: teks panjang dengan karakter 4-byte, emoji, dan RTL
        $unicodePayload = [
            'question_id' => $this->question->id,
            'answer_payload' => [
                'option_id' => $this->correctOption->id,
                'notes' => '⚡️🎯 Ujian Tryout Adzkia 2026! 🚀 \u{1F600} مَرْحَبًا بِكُمْ <script>alert(1)</script>',
            ],
            'is_flagged' => true,
        ];

        $unicodeResponse = $this->actingAs($this->student)
            ->postJson(route('exam.session.answer', $session), $unicodePayload);

        $unicodeResponse->assertStatus(200);
        $this->assertDatabaseHas('exam_answers', [
            'exam_session_id' => $session->id,
            'question_id' => $this->question->id,
            'is_flagged' => true,
        ]);
    }

    /**
     * 4. Error & Authorization Resilience (IDOR & State Machine Guards).
     */
    public function test_error_and_authorization_guards(): void
    {
        $session = ExamSession::create([
            'assessment_id' => $this->assessment->id,
            'user_id' => $this->student->id,
            'tenant_id' => $this->tenant->id,
            'status' => 'in_progress',
            'started_at' => now(),
            'duration_minutes' => 60,
        ]);

        // IDOR: Siswa lain tidak boleh mengubah jawaban sesi ini (HTTP 403)
        $idorResponse = $this->actingAs($this->otherStudent)
            ->postJson(route('exam.session.answer', $session), [
                'question_id' => $this->question->id,
                'answer_payload' => ['option_id' => $this->correctOption->id],
            ]);
        $idorResponse->assertStatus(403);

        // State guard: Sesi berstatus completed menolak perubahan jawaban (HTTP 409)
        $session->update(['status' => 'completed', 'completed_at' => now()]);
        $completedResponse = $this->actingAs($this->student)
            ->postJson(route('exam.session.answer', $session), [
                'question_id' => $this->question->id,
                'answer_payload' => ['option_id' => $this->correctOption->id],
            ]);
        $completedResponse->assertStatus(409);

        // State guard: Sesi berstatus expired menolak perubahan jawaban (HTTP 410)
        $expiredSession = ExamSession::create([
            'assessment_id' => $this->assessment->id,
            'user_id' => $this->student->id,
            'tenant_id' => $this->tenant->id,
            'status' => 'in_progress',
            'started_at' => now()->subHours(5),
            'duration_minutes' => 60,
            'expires_at' => now()->subHours(4), // Sudah lewat 4 jam
        ]);

        $expiredResponse = $this->actingAs($this->student)
            ->postJson(route('exam.session.answer', $expiredSession), [
                'question_id' => $this->question->id,
                'answer_payload' => ['option_id' => $this->correctOption->id],
            ]);
        $expiredResponse->assertStatus(410);
    }

    /**
     * 5. Concurrency / Idempotency: Submit ganda harus dihandle secara anggun tanpa duplicate crash.
     */
    public function test_concurrency_and_idempotent_submission(): void
    {
        $session = ExamSession::create([
            'assessment_id' => $this->assessment->id,
            'user_id' => $this->student->id,
            'tenant_id' => $this->tenant->id,
            'status' => 'in_progress',
            'started_at' => now()->subMinutes(10),
            'duration_minutes' => 60,
        ]);

        // Simpan jawaban awal
        ExamAnswer::create([
            'exam_session_id' => $session->id,
            'question_id' => $this->question->id,
            'answer_payload' => ['option_id' => $this->correctOption->id],
            'answered_at' => now(),
        ]);

        // Submit pertama
        $response1 = $this->actingAs($this->student)
            ->postJson(route('exam.session.submit', $session), [
                'reason' => 'student_submit',
            ]);

        $response1->assertStatus(200);
        $response1->assertJson(['ok' => true]);

        $session->refresh();
        $this->assertEquals('completed', $session->status);

        // Submit kedua (simulasi duplicate request / rapid double click oleh user)
        $response2 = $this->actingAs($this->student)
            ->postJson(route('exam.session.submit', $session), [
                'reason' => 'student_submit',
            ]);

        // Harus idempotently mengembalikan status OK dan route redirect tanpa exception
        $response2->assertStatus(200);
        $response2->assertJson([
            'ok' => true,
            'info' => 'Sudah disubmit sebelumnya.',
        ]);
    }
}
