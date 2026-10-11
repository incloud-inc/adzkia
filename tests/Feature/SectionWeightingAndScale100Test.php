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

class SectionWeightingAndScale100Test extends TestCase
{
    use RefreshDatabase;

    private Tenant $tenant;

    private User $teacher;

    private User $student;

    private Subject $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $this->teacher = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $this->teacher->tenants()->attach($this->tenant->id, ['role' => 'T']);

        $this->student = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $this->student->tenants()->attach($this->tenant->id, ['role' => 'U']);

        $this->subject = Subject::factory()->create(['name' => 'Matematika']);
    }

    public function test_it_grades_exam_session_with_section_weights_40_30_30_on_scale_100(): void
    {
        // 1. Buat asesmen dengan 3 seksi
        $assessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'subject_id' => $this->subject->id,
            'title' => 'Kuis Pembobotan Uji Coba',
            'grade_level' => '4 SD',
            'scoring_type' => 'formula',
            'status' => 'published',
            'settings' => [
                'formula_type' => 'weighted_percentage',
                'passing_grade' => [
                    'enabled' => true,
                    'min_score' => 75,
                ],
            ],
        ]);

        $sec1 = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Bagian 1: Pilihan Ganda (Bobot 40%)',
            'order' => 1,
        ]);
        $sec2 = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Bagian 2: Isian Singkat (Bobot 30%)',
            'order' => 2,
        ]);
        $sec3 = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Bagian 3: Uraian (Bobot 30%)',
            'order' => 3,
        ]);

        // Simpan section_weights pada settings: 40%, 30%, 30%
        $settings = $assessment->settings;
        $settings['section_weights'] = [
            $sec1->id => 40,
            $sec2->id => 30,
            $sec3->id => 30,
        ];
        $assessment->update(['settings' => $settings]);

        // 2. Buat soal pada masing-masing seksi
        // Seksi 1: 2 soal PG @ 1 poin (total 2 poin)
        $q1 = Question::create([
            'assessment_section_id' => $sec1->id,
            'type' => 'mcq_single',
            'prompt' => 'Soal PG 1',
            'points' => 1.0,
            'order' => 1,
        ]);
        $opt1Correct = QuestionOption::create([
            'question_id' => $q1->id,
            'label' => 'A',
            'option_text' => 'Benar',
            'is_correct' => true,
        ]);
        QuestionOption::create([
            'question_id' => $q1->id,
            'label' => 'B',
            'option_text' => 'Salah',
            'is_correct' => false,
        ]);

        $q2 = Question::create([
            'assessment_section_id' => $sec1->id,
            'type' => 'mcq_single',
            'prompt' => 'Soal PG 2',
            'points' => 1.0,
            'order' => 2,
        ]);
        $opt2Correct = QuestionOption::create([
            'question_id' => $q2->id,
            'label' => 'A',
            'option_text' => 'Benar',
            'is_correct' => true,
        ]);

        // Seksi 2: 2 soal isian singkat @ 2 poin (total 4 poin)
        $q3 = Question::create([
            'assessment_section_id' => $sec2->id,
            'type' => 'short_answer',
            'prompt' => 'Soal Isian 1',
            'points' => 2.0,
            'order' => 1,
        ]);
        QuestionOption::create([
            'question_id' => $q3->id,
            'option_text' => 'Jakarta',
            'is_correct' => true,
        ]);

        $q4 = Question::create([
            'assessment_section_id' => $sec2->id,
            'type' => 'short_answer',
            'prompt' => 'Soal Isian 2',
            'points' => 2.0,
            'order' => 2,
        ]);
        QuestionOption::create([
            'question_id' => $q4->id,
            'option_text' => 'Bandung',
            'is_correct' => true,
        ]);

        // Seksi 3: 1 soal uraian / essay @ 5 poin (total 5 poin)
        $q5 = Question::create([
            'assessment_section_id' => $sec3->id,
            'type' => 'essay',
            'prompt' => 'Soal Uraian 1',
            'points' => 5.0,
            'order' => 1,
        ]);

        // 3. Skenario Jawaban Siswa:
        // Seksi 1: Menjawab benar q1 dan q2 -> 2/2 = 100% -> Kontribusi: 100% * 40% = 40.0 poin
        // Seksi 2: Menjawab benar q3 (2 poin), q4 salah (0 poin) -> 2/4 = 50% -> Kontribusi: 50% * 30% = 15.0 poin
        // Seksi 3: Guru memberi nilai 5.0 pada essay -> 5/5 = 100% -> Kontribusi: 100% * 30% = 30.0 poin
        // Ekspektasi Total Nilai Akhir: 40.0 + 15.0 + 30.0 = 85.0 (Skala 100)

        $session = ExamSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => $this->student->id,
            'tenant_id' => $this->tenant->id,
            'status' => 'completed',
            'started_at' => now()->subMinutes(30),
            'completed_at' => now(),
        ]);

        ExamAnswer::create([
            'exam_session_id' => $session->id,
            'question_id' => $q1->id,
            'answer_payload' => ['option_id' => $opt1Correct->id],
        ]);
        ExamAnswer::create([
            'exam_session_id' => $session->id,
            'question_id' => $q2->id,
            'answer_payload' => ['option_id' => $opt2Correct->id],
        ]);
        ExamAnswer::create([
            'exam_session_id' => $session->id,
            'question_id' => $q3->id,
            'answer_payload' => ['value' => 'jakarta'],
        ]);
        ExamAnswer::create([
            'exam_session_id' => $session->id,
            'question_id' => $q4->id,
            'answer_payload' => ['value' => 'surabaya'], // salah
        ]);
        ExamAnswer::create([
            'exam_session_id' => $session->id,
            'question_id' => $q5->id,
            'answer_payload' => ['essay_text' => 'Penjelasan lengkap...'],
            'points_awarded' => 5.0, // dinilai guru 5 poin
            'is_correct' => true,
        ]);

        // 4. Jalankan auto-grade optimized
        ExamGradingService::autoGradeSessionOptimized($session);

        $session->refresh();

        // 5. Verifikasi nilai akhir tepat 85.0 dan max_score tepat 100.0
        $this->assertEquals(85.0, $session->score, 'Skor akhir harus 85.0 pada skala 100.');
        $this->assertEquals(100.0, $session->max_score, 'Max score harus 100.0 pada formula pembobotan bagian.');
    }

    public function test_artisan_command_applies_weighting_to_all_assessments(): void
    {
        $assessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'subject_id' => $this->subject->id,
            'title' => 'Asesmen Tanpa Bobot',
            'settings' => ['formula_type' => 'raw_sum'],
        ]);

        AssessmentSection::create(['assessment_id' => $assessment->id, 'title' => 'Bagian 1', 'order' => 1]);
        AssessmentSection::create(['assessment_id' => $assessment->id, 'title' => 'Bagian 2', 'order' => 2]);
        AssessmentSection::create(['assessment_id' => $assessment->id, 'title' => 'Bagian 3', 'order' => 3]);

        $this->artisan('adzkia:apply-section-weighting', ['--w1' => 40, '--w2' => 30, '--w3' => 30])
            ->assertExitCode(0);

        $assessment->refresh();
        $this->assertEquals('weighted_percentage', data_get($assessment->settings, 'formula_type'));
        $this->assertNotEmpty(data_get($assessment->settings, 'section_weights'));

        $weights = data_get($assessment->settings, 'section_weights');
        $this->assertCount(3, $weights);
        $this->assertEquals(100, array_sum($weights));
    }

    public function test_it_creates_assessment_with_weighted_sections_via_wizard_store(): void
    {
        $payload = [
            'title' => 'Asesmen Wizard Bobot Terpadu',
            'subject_id' => $this->subject->id,
            'type' => 'ph',
            'grade_level' => '4 SD',
            'duration_minutes' => 60,
            'status' => 'published',
            'settings' => [
                'formula_type' => 'weighted_percentage',
                'section_weights' => [
                    'sec_temp_1' => 40,
                    'sec_temp_2' => 30,
                    'sec_temp_3' => 30,
                ],
            ],
            'sections' => [
                [
                    'id' => 'sec_temp_1',
                    'title' => 'Bagian 1: PG',
                    'order' => 1,
                    'items' => [
                        [
                            'type' => 'mcq_single',
                            'prompt' => 'Soal 1',
                            'points' => 1.0,
                            'options' => [
                                ['label' => 'A', 'text' => 'Ya', 'correct' => true],
                                ['label' => 'B', 'text' => 'Tidak', 'correct' => false],
                            ],
                        ],
                    ],
                ],
                [
                    'id' => 'sec_temp_2',
                    'title' => 'Bagian 2: Isian',
                    'order' => 2,
                    'items' => [
                        [
                            'type' => 'short_answer',
                            'prompt' => 'Soal 2',
                            'points' => 2.0,
                            'options' => [
                                ['text' => 'Jawaban', 'correct' => true],
                            ],
                        ],
                    ],
                ],
                [
                    'id' => 'sec_temp_3',
                    'title' => 'Bagian 3: Uraian',
                    'order' => 3,
                    'items' => [
                        [
                            'type' => 'essay',
                            'prompt' => 'Soal 3',
                            'points' => 5.0,
                        ],
                    ],
                ],
            ],
        ];

        $response = $this->actingAs($this->teacher)
            ->postJson(route('assessments.store'), $payload);

        $response->assertStatus(200);

        $created = Assessment::where('title', 'Asesmen Wizard Bobot Terpadu')->first();
        $this->assertNotNull($created);
        $this->assertEquals('weighted_percentage', data_get($created->settings, 'formula_type'));

        $mappedWeights = data_get($created->settings, 'section_weights');
        $this->assertIsArray($mappedWeights);
        $this->assertCount(3, $mappedWeights);

        $realSectionIds = $created->sections->pluck('id')->all();
        foreach ($realSectionIds as $sid) {
            $this->assertArrayHasKey($sid, $mappedWeights);
        }

        $this->assertEquals(100, array_sum($mappedWeights));
    }
}
