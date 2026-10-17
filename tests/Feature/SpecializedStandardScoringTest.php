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

class SpecializedStandardScoringTest extends TestCase
{
    use RefreshDatabase;

    private Tenant $tenant;

    private User $student;

    private User $teacher;

    private Subject $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $this->student = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $this->student->tenants()->attach($this->tenant->id, ['role' => 'U']);

        $this->teacher = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $this->teacher->tenants()->attach($this->tenant->id, ['role' => 'T']);

        $this->subject = Subject::factory()->create(['name' => 'Matematika', 'code' => 'MTK']);

        ExamGradingService::clearMemoryCache();
    }

    protected function tearDown(): void
    {
        ExamGradingService::clearMemoryCache();
        parent::tearDown();
    }

    public function test_standard_school_assessment_remains_on_scale_100(): void
    {
        // 1. Asesmen reguler (PH/PTS/PAS/Kuis harian)
        $assessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'subject_id' => $this->subject->id,
            'title' => 'Penilaian Harian Matematika',
            'type' => 'ph',
            'scoring_type' => 'standard',
            'status' => 'published',
            'settings' => [
                'formula_type' => 'sum',
                'passing_grade' => ['enabled' => true, 'min_score' => 75],
            ],
        ]);

        $section = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Bagian Utama',
            'order' => 1,
        ]);

        $q1 = Question::create([
            'assessment_section_id' => $section->id,
            'type' => 'mcq_single',
            'prompt' => 'Soal 1',
            'points' => 1.0,
            'order' => 1,
        ]);
        $opt1Correct = QuestionOption::create([
            'question_id' => $q1->id,
            'label' => 'A',
            'option_text' => 'Benar',
            'is_correct' => true,
        ]);

        $q2 = Question::create([
            'assessment_section_id' => $section->id,
            'type' => 'mcq_single',
            'prompt' => 'Soal 2',
            'points' => 1.0,
            'order' => 2,
        ]);
        QuestionOption::create([
            'question_id' => $q2->id,
            'label' => 'A',
            'option_text' => 'Kunci',
            'is_correct' => true,
        ]);

        $session = ExamSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => $this->student->id,
            'status' => 'completed',
            'started_at' => now()->subMinutes(10),
            'completed_at' => now(),
            'max_score' => 2.0,
            'grading_status' => 'pending',
        ]);

        // Jawab 1 benar dari 2 soal
        ExamAnswer::create([
            'exam_session_id' => $session->id,
            'question_id' => $q1->id,
            'answer_payload' => ['option_id' => $opt1Correct->id],
            'is_correct' => true,
            'points_awarded' => 1.0,
        ]);

        ExamGradingService::autoGradeSessionOptimized($session);
        $session->refresh();

        // Skor mentah 1.0 dari total 2.0
        $this->assertEquals(1.0, (float) $session->score);
        $this->assertNull(data_get($session->meta, 'scale_result'));

        // Cek via ExamResultController show
        $response = $this->actingAs($this->student)->get(route('exam.result', $session));
        $response->assertOk();
        $response->assertViewHas('summary', function ($summary) {
            // Skala reguler dikonversi ke persentase 50 / 100
            return (float) $summary['final_score'] === 50.0
                && (int) $summary['total_points'] === 100
                && $summary['is_specialized'] === false;
        });
    }

    public function test_toeic_assessment_scoring_converts_to_10_to_990_scale_and_assigns_cefr(): void
    {
        // 1. Asesmen TOEIC
        $assessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'subject_id' => $this->subject->id,
            'title' => 'TOEIC Official Simulation Test',
            'scoring_type' => 'toeic',
            'status' => 'published',
            'settings' => [
                'scoring_template' => 'toeic',
                'formula_type' => 'sum',
                'passing_grade' => ['enabled' => true, 'min_score' => 600],
            ],
        ]);

        $secListening = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Section 1: Listening Comprehension',
            'order' => 1,
        ]);
        $secReading = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Section 2: Reading Comprehension',
            'order' => 2,
        ]);

        // Buat 2 soal di Listening & 2 soal di Reading
        $qL1 = Question::create([
            'assessment_section_id' => $secListening->id,
            'type' => 'mcq_single',
            'prompt' => 'Listening Q1',
            'points' => 1.0,
            'order' => 1,
        ]);
        $optL1 = QuestionOption::create([
            'question_id' => $qL1->id,
            'label' => 'A',
            'option_text' => 'Benar',
            'is_correct' => true,
        ]);

        $qL2 = Question::create([
            'assessment_section_id' => $secListening->id,
            'type' => 'mcq_single',
            'prompt' => 'Listening Q2',
            'points' => 1.0,
            'order' => 2,
        ]);
        $optL2 = QuestionOption::create([
            'question_id' => $qL2->id,
            'label' => 'B',
            'option_text' => 'Benar',
            'is_correct' => true,
        ]);

        $qR1 = Question::create([
            'assessment_section_id' => $secReading->id,
            'type' => 'mcq_single',
            'prompt' => 'Reading Q1',
            'points' => 1.0,
            'order' => 3,
        ]);
        $optR1 = QuestionOption::create([
            'question_id' => $qR1->id,
            'label' => 'C',
            'option_text' => 'Benar',
            'is_correct' => true,
        ]);

        $qR2 = Question::create([
            'assessment_section_id' => $secReading->id,
            'type' => 'mcq_single',
            'prompt' => 'Reading Q2',
            'points' => 1.0,
            'order' => 4,
        ]);
        $optR2 = QuestionOption::create([
            'question_id' => $qR2->id,
            'label' => 'D',
            'option_text' => 'Benar',
            'is_correct' => true,
        ]);

        // Skenario A: 100% Benar -> Harus mendapat nilai TOEIC sempurna 990 (L: 495, R: 495) dan CEFR C1
        $session100 = ExamSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => $this->student->id,
            'started_at' => now()->subMinutes(30),
            'completed_at' => now(),
            'max_score' => 990.0,
            'grading_status' => 'pending',
        ]);

        ExamAnswer::create(['exam_session_id' => $session100->id, 'question_id' => $qL1->id, 'answer_payload' => ['option_id' => $optL1->id]]);
        ExamAnswer::create(['exam_session_id' => $session100->id, 'question_id' => $qL2->id, 'answer_payload' => ['option_id' => $optL2->id]]);
        ExamAnswer::create(['exam_session_id' => $session100->id, 'question_id' => $qR1->id, 'answer_payload' => ['option_id' => $optR1->id]]);
        ExamAnswer::create(['exam_session_id' => $session100->id, 'question_id' => $qR2->id, 'answer_payload' => ['option_id' => $optR2->id]]);

        ExamGradingService::autoGradeSessionOptimized($session100);
        $session100->refresh();

        $this->assertEquals(990.0, (float) $session100->score);
        $this->assertEquals(990.0, (float) $session100->max_score);
        $this->assertEquals('C1', data_get($session100->meta, 'scale_result.cefr'));
        $this->assertEquals(495, data_get($session100->meta, 'scale_result.breakdown.listening.scaled_score'));
        $this->assertEquals(495, data_get($session100->meta, 'scale_result.breakdown.reading.scaled_score'));

        // Skenario B: 0% Benar -> Harus mendapat skor minimum TOEIC 10 (L: 5, R: 5) dan CEFR A1
        $session0 = ExamSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => $this->student->id,
            'started_at' => now()->subMinutes(30),
            'completed_at' => now(),
            'max_score' => 990.0,
            'grading_status' => 'pending',
        ]);

        ExamGradingService::autoGradeSessionOptimized($session0);
        $session0->refresh();

        $this->assertEquals(10.0, (float) $session0->score);
        $this->assertEquals(990.0, (float) $session0->max_score);
        $this->assertEquals('A1', data_get($session0->meta, 'scale_result.cefr'));
        $this->assertEquals(5, data_get($session0->meta, 'scale_result.breakdown.listening.scaled_score'));
        $this->assertEquals(5, data_get($session0->meta, 'scale_result.breakdown.reading.scaled_score'));

        // Skenario C: Nilai Parsial (L: 2/2 = 495, R: 0/2 = 5) -> Total: 500
        $sessionPartial = ExamSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => $this->student->id,
            'started_at' => now()->subMinutes(30),
            'completed_at' => now(),
            'max_score' => 990.0,
            'grading_status' => 'pending',
        ]);
        ExamAnswer::create(['exam_session_id' => $sessionPartial->id, 'question_id' => $qL1->id, 'answer_payload' => ['option_id' => $optL1->id]]);
        ExamAnswer::create(['exam_session_id' => $sessionPartial->id, 'question_id' => $qL2->id, 'answer_payload' => ['option_id' => $optL2->id]]);

        ExamGradingService::autoGradeSessionOptimized($sessionPartial);
        $sessionPartial->refresh();

        $this->assertEquals(500.0, (float) $sessionPartial->score);
        $this->assertEquals(495, data_get($sessionPartial->meta, 'scale_result.breakdown.listening.scaled_score'));
        $this->assertEquals(5, data_get($sessionPartial->meta, 'scale_result.breakdown.reading.scaled_score'));
    }

    public function test_toefl_assessment_scoring_converts_to_310_to_677_scale(): void
    {
        // Asesmen TOEFL
        $assessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'subject_id' => $this->subject->id,
            'title' => 'TOEFL ITP Diagnostic Test',
            'scoring_type' => 'toefl',
            'status' => 'published',
            'settings' => [
                'scoring_template' => 'toefl',
                'formula_type' => 'sum',
            ],
        ]);

        $secListening = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Section 1: Listening Comprehension',
            'order' => 1,
        ]);
        $secStructure = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Section 2: Structure & Written Expression',
            'order' => 2,
        ]);
        $secReading = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Section 3: Reading Comprehension',
            'order' => 3,
        ]);

        // 1 Soal per seksi
        $qL = Question::create(['assessment_section_id' => $secListening->id, 'type' => 'mcq_single', 'prompt' => 'L1', 'points' => 1.0, 'order' => 1]);
        $optL = QuestionOption::create(['question_id' => $qL->id, 'label' => 'A', 'option_text' => 'Benar', 'is_correct' => true]);

        $qS = Question::create(['assessment_section_id' => $secStructure->id, 'type' => 'mcq_single', 'prompt' => 'S1', 'points' => 1.0, 'order' => 2]);
        $optS = QuestionOption::create(['question_id' => $qS->id, 'label' => 'A', 'option_text' => 'Benar', 'is_correct' => true]);

        $qR = Question::create(['assessment_section_id' => $secReading->id, 'type' => 'mcq_single', 'prompt' => 'R1', 'points' => 1.0, 'order' => 3]);
        $optR = QuestionOption::create(['question_id' => $qR->id, 'label' => 'A', 'option_text' => 'Benar', 'is_correct' => true]);

        // 100% Benar -> Nilai TOEFL 677
        $session100 = ExamSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => $this->student->id,
            'started_at' => now()->subMinutes(30),
            'completed_at' => now(),
            'max_score' => 677.0,
            'grading_status' => 'pending',
        ]);
        ExamAnswer::create(['exam_session_id' => $session100->id, 'question_id' => $qL->id, 'answer_payload' => ['option_id' => $optL->id]]);
        ExamAnswer::create(['exam_session_id' => $session100->id, 'question_id' => $qS->id, 'answer_payload' => ['option_id' => $optS->id]]);
        ExamAnswer::create(['exam_session_id' => $session100->id, 'question_id' => $qR->id, 'answer_payload' => ['option_id' => $optR->id]]);

        ExamGradingService::autoGradeSessionOptimized($session100);
        $session100->refresh();

        $this->assertEquals(677.0, (float) $session100->score);
        $this->assertEquals(677.0, (float) $session100->max_score);
        $this->assertEquals('C1', data_get($session100->meta, 'scale_result.cefr'));

        // 0% Benar -> Nilai TOEFL 310
        $session0 = ExamSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => $this->student->id,
            'started_at' => now()->subMinutes(30),
            'completed_at' => now(),
            'max_score' => 677.0,
            'grading_status' => 'pending',
        ]);

        ExamGradingService::autoGradeSessionOptimized($session0);
        $session0->refresh();

        $this->assertEquals(310.0, (float) $session0->score);
        $this->assertEquals(677.0, (float) $session0->max_score);
        $this->assertEquals('Below A2', data_get($session0->meta, 'scale_result.cefr'));
    }

    public function test_utbk_assessment_scoring_converts_to_200_to_1000_scale(): void
    {
        // Asesmen UTBK SNBT
        $assessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'subject_id' => $this->subject->id,
            'title' => 'Simulasi Try Out UTBK-SNBT 2026',
            'type' => 'utbk',
            'scoring_type' => 'utbk',
            'status' => 'published',
            'settings' => [
                'scoring_template' => 'utbk',
            ],
        ]);

        $section = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Tes Potensi Skolastik (TPS)',
            'order' => 1,
        ]);

        $q1 = Question::create(['assessment_section_id' => $section->id, 'type' => 'mcq_single', 'prompt' => 'TPS 1', 'points' => 1.0, 'order' => 1]);
        $opt1 = QuestionOption::create(['question_id' => $q1->id, 'label' => 'A', 'option_text' => 'Benar', 'is_correct' => true]);

        $q2 = Question::create(['assessment_section_id' => $section->id, 'type' => 'mcq_single', 'prompt' => 'TPS 2', 'points' => 1.0, 'order' => 2]);
        $opt2 = QuestionOption::create(['question_id' => $q2->id, 'label' => 'A', 'option_text' => 'Benar', 'is_correct' => true]);

        // 100% Benar -> Skor 1000
        $session100 = ExamSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => $this->student->id,
            'started_at' => now()->subMinutes(15),
            'completed_at' => now(),
            'max_score' => 1000.0,
            'grading_status' => 'pending',
        ]);
        ExamAnswer::create(['exam_session_id' => $session100->id, 'question_id' => $q1->id, 'answer_payload' => ['option_id' => $opt1->id]]);
        ExamAnswer::create(['exam_session_id' => $session100->id, 'question_id' => $q2->id, 'answer_payload' => ['option_id' => $opt2->id]]);

        ExamGradingService::autoGradeSessionOptimized($session100);
        $session100->refresh();

        $this->assertEquals(1000.0, (float) $session100->score);
        $this->assertEquals(1000.0, (float) $session100->max_score);

        // 50% Benar -> Skor 200 + (0.5 * 800) = 600
        $session50 = ExamSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => $this->student->id,
            'started_at' => now()->subMinutes(15),
            'completed_at' => now(),
            'max_score' => 1000.0,
            'grading_status' => 'pending',
        ]);
        ExamAnswer::create(['exam_session_id' => $session50->id, 'question_id' => $q1->id, 'answer_payload' => ['option_id' => $opt1->id]]);

        ExamGradingService::autoGradeSessionOptimized($session50);
        $session50->refresh();

        $this->assertEquals(600.0, (float) $session50->score);
        $this->assertEquals(1000.0, (float) $session50->max_score);

        // 0% Benar -> Skor Minimum 200
        $session0 = ExamSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => $this->student->id,
            'started_at' => now()->subMinutes(15),
            'completed_at' => now(),
            'max_score' => 1000.0,
            'grading_status' => 'pending',
        ]);

        ExamGradingService::autoGradeSessionOptimized($session0);
        $session0->refresh();

        $this->assertEquals(200.0, (float) $session0->score);
        $this->assertEquals(1000.0, (float) $session0->max_score);
    }

    public function test_exam_result_and_analysis_views_render_authentic_scale_without_compressing_to_100(): void
    {
        // Buat Asesmen TOEIC
        $assessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'subject_id' => $this->subject->id,
            'title' => 'TOEIC Official Simulation',
            'scoring_type' => 'toeic',
            'status' => 'published',
            'settings' => [
                'scoring_template' => 'toeic',
                'passing_grade' => ['enabled' => true, 'min_score' => 700],
            ],
        ]);

        $section = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Section 1: Listening Comprehension',
            'order' => 1,
        ]);
        $q = Question::create(['assessment_section_id' => $section->id, 'type' => 'mcq_single', 'prompt' => 'Test Q', 'points' => 1.0, 'order' => 1]);

        $session = ExamSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => $this->student->id,
            'status' => 'completed',
            'started_at' => now()->subMinutes(20),
            'completed_at' => now(),
            'score' => 850.0,
            'max_score' => 990.0,
            'grading_status' => 'completed',
            'meta' => [
                'scale_result' => [
                    'scale_type' => 'toeic',
                    'scale_label' => 'Skala Standar TOEIC ETS (10 - 990)',
                    'score' => 850.0,
                    'max_score' => 990.0,
                    'min_score' => 10.0,
                    'cefr' => 'B2',
                    'proficiency' => 'Independent User / Vantage',
                    'breakdown' => [
                        'listening' => ['title' => 'Listening Comprehension', 'raw_score' => 85, 'scaled_score' => 430, 'max_scaled' => 495],
                        'reading' => ['title' => 'Reading Comprehension', 'raw_score' => 83, 'scaled_score' => 420, 'max_scaled' => 495],
                    ],
                ],
            ],
        ]);

        // 1. Cek Result View (Guru berhak mengakses lembar pembahasan TOEIC)
        $resResult = $this->actingAs($this->teacher)->get(route('exam.result', $session));
        $resResult->assertOk();
        $resResult->assertViewHas('summary', function ($summary) {
            return (float) $summary['final_score'] === 850.0
                && (int) $summary['total_points'] === 990
                && $summary['is_specialized'] === true;
        });
        $resResult->assertSee('850');
        $resResult->assertSee('/ 990');

        // Murid dikunci dari pembahasan English Test dan dialihkan ke Analisa
        $resStudentResult = $this->actingAs($this->student)->get(route('exam.result', $session));
        $resStudentResult->assertRedirect(route('exam.analysis', $session));

        // 2. Cek Analytics View
        $resAnalysis = $this->actingAs($this->student)->get(route('exam.analysis', $session));
        $resAnalysis->assertOk();
        $resAnalysis->assertViewHas('summary', function ($summary) {
            return (float) $summary['final_score'] === 850.0
                && (int) $summary['total_points'] === 990
                && $summary['is_specialized'] === true;
        });
        $resAnalysis->assertSee('850');
        $resAnalysis->assertSee('/ 990');
        $resAnalysis->assertSee('CEFR: B2');
    }

    public function test_utbk_assessment_scores_3_subtests_literasi_and_numerasi_accurately(): void
    {
        // 1. Buat asesmen UTBK Paket Literasi & Numerasi (3 Subtes)
        $assessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'subject_id' => $this->subject->id,
            'title' => 'Simulasi UTBK SNBT - Literasi & Penalaran Matematika',
            'type' => 'utbk',
            'scoring_type' => 'utbk',
            'status' => 'published',
            'settings' => [
                'scoring_template' => 'utbk',
            ],
        ]);

        $secLbi = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Subtes 1: Literasi dalam Bahasa Indonesia',
            'order' => 1,
        ]);
        $secLbe = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Subtes 2: Literasi dalam Bahasa Inggris',
            'order' => 2,
        ]);
        $secPm = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Subtes 3: Penalaran Matematika',
            'order' => 3,
        ]);

        // Buat 2 soal per subtes
        // LBI: 2 soal
        $qLbi1 = Question::create(['assessment_section_id' => $secLbi->id, 'type' => 'mcq_single', 'prompt' => 'LBI 1', 'points' => 1.0, 'order' => 1]);
        $optLbi1 = QuestionOption::create(['question_id' => $qLbi1->id, 'label' => 'A', 'option_text' => 'Kunci', 'is_correct' => true]);
        $qLbi2 = Question::create(['assessment_section_id' => $secLbi->id, 'type' => 'mcq_single', 'prompt' => 'LBI 2', 'points' => 1.0, 'order' => 2]);
        $optLbi2 = QuestionOption::create(['question_id' => $qLbi2->id, 'label' => 'A', 'option_text' => 'Kunci', 'is_correct' => true]);

        // LBE: 2 soal
        $qLbe1 = Question::create(['assessment_section_id' => $secLbe->id, 'type' => 'mcq_single', 'prompt' => 'LBE 1', 'points' => 1.0, 'order' => 3]);
        $optLbe1 = QuestionOption::create(['question_id' => $qLbe1->id, 'label' => 'A', 'option_text' => 'Kunci', 'is_correct' => true]);
        $qLbe2 = Question::create(['assessment_section_id' => $secLbe->id, 'type' => 'mcq_single', 'prompt' => 'LBE 2', 'points' => 1.0, 'order' => 4]);
        QuestionOption::create(['question_id' => $qLbe2->id, 'label' => 'A', 'option_text' => 'Kunci', 'is_correct' => true]);

        // PM: 2 soal
        $qPm1 = Question::create(['assessment_section_id' => $secPm->id, 'type' => 'mcq_single', 'prompt' => 'PM 1', 'points' => 1.0, 'order' => 5]);
        QuestionOption::create(['question_id' => $qPm1->id, 'label' => 'A', 'option_text' => 'Kunci', 'is_correct' => true]);
        $qPm2 = Question::create(['assessment_section_id' => $secPm->id, 'type' => 'mcq_single', 'prompt' => 'PM 2', 'points' => 1.0, 'order' => 6]);
        QuestionOption::create(['question_id' => $qPm2->id, 'label' => 'A', 'option_text' => 'Kunci', 'is_correct' => true]);

        // Skenario Pengerjaan:
        // LBI: 2/2 Benar (100%) -> Subtes Scaled Score = 1000
        // LBE: 1/2 Benar (50%)  -> Subtes Scaled Score = 600
        // PM:  0/2 Benar (0%)   -> Subtes Scaled Score = 200
        // Skor Rata-rata Komposit UTBK: (1000 + 600 + 200) / 3 = 600.0
        $session = ExamSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => $this->student->id,
            'status' => 'completed',
            'started_at' => now()->subMinutes(60),
            'completed_at' => now(),
            'max_score' => 1000.0,
            'grading_status' => 'pending',
        ]);

        ExamAnswer::create(['exam_session_id' => $session->id, 'question_id' => $qLbi1->id, 'answer_payload' => ['option_id' => $optLbi1->id]]);
        ExamAnswer::create(['exam_session_id' => $session->id, 'question_id' => $qLbi2->id, 'answer_payload' => ['option_id' => $optLbi2->id]]);
        ExamAnswer::create(['exam_session_id' => $session->id, 'question_id' => $qLbe1->id, 'answer_payload' => ['option_id' => $optLbe1->id]]);

        ExamGradingService::autoGradeSessionOptimized($session);
        $session->refresh();

        // 1. Verifikasi Skor Komposit
        $this->assertEquals(600.0, (float) $session->score);
        $this->assertEquals(1000.0, (float) $session->max_score);

        // 2. Verifikasi Rincian Subtes 1: Literasi Bahasa Indonesia
        $lbiBreakdown = data_get($session->meta, "scale_result.breakdown.{$secLbi->id}");
        $this->assertNotNull($lbiBreakdown);
        $this->assertEquals('LBI', $lbiBreakdown['subtest_code']);
        $this->assertEquals('Literasi dalam Bahasa Indonesia', $lbiBreakdown['title']);
        $this->assertEquals('literasi_numerasi', $lbiBreakdown['subtest_group']);
        $this->assertEquals(2, $lbiBreakdown['raw_score']);
        $this->assertEquals(1000.0, (float) $lbiBreakdown['scaled_score']);

        // 3. Verifikasi Rincian Subtes 2: Literasi Bahasa Inggris
        $lbeBreakdown = data_get($session->meta, "scale_result.breakdown.{$secLbe->id}");
        $this->assertNotNull($lbeBreakdown);
        $this->assertEquals('LBE', $lbeBreakdown['subtest_code']);
        $this->assertEquals('Literasi dalam Bahasa Inggris', $lbeBreakdown['title']);
        $this->assertEquals('literasi_numerasi', $lbeBreakdown['subtest_group']);
        $this->assertEquals(1, $lbeBreakdown['raw_score']);
        $this->assertEquals(600.0, (float) $lbeBreakdown['scaled_score']);

        // 4. Verifikasi Rincian Subtes 3: Penalaran Matematika
        $pmBreakdown = data_get($session->meta, "scale_result.breakdown.{$secPm->id}");
        $this->assertNotNull($pmBreakdown);
        $this->assertEquals('PM', $pmBreakdown['subtest_code']);
        $this->assertEquals('Penalaran Matematika (Numerasi)', $pmBreakdown['title']);
        $this->assertEquals('literasi_numerasi', $pmBreakdown['subtest_group']);
        $this->assertEquals(0, $pmBreakdown['raw_score']);
        $this->assertEquals(200.0, (float) $pmBreakdown['scaled_score']);

        // 5. Verifikasi Rata-rata Rumpun Literasi & Numerasi
        $this->assertEquals(600.0, data_get($session->meta, 'scale_result.rumpun_averages.literasi_numerasi'));

        // 6. Verifikasi Tampilan Halaman Hasil & Analisa Siswa
        $resResult = $this->actingAs($this->student)->get(route('exam.result', $session));
        $resResult->assertOk();
        $resResult->assertSee('600');
        $resResult->assertSee('/ 1000');

        $resAnalysis = $this->actingAs($this->student)->get(route('exam.analysis', $session));
        $resAnalysis->assertOk();
        $resAnalysis->assertSee('Literasi dalam Bahasa Indonesia');
        $resAnalysis->assertSee('Literasi dalam Bahasa Inggris');
        $resAnalysis->assertSee('Penalaran Matematika (Numerasi)');
    }
}
