<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use App\Services\WordQuestionService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AssessmentWizardTest extends TestCase
{
    use RefreshDatabase;

    public function test_teacher_can_access_assessment_wizard(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'SMAN 8 Jakarta', 'subdomain' => 'sman8', 'plan' => 'premium']);
        $teacher = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        $subject = Subject::factory()->create([
            'name' => 'Matematika Wajib',
            'code' => 'MAT-W',
        ]);

        $response = $this->actingAs($teacher)->get(route('assessments.wizard'));

        $response->assertStatus(200);
        $response->assertSee('8 Langkah Pembuatan Ujian (Assessment)');
        $response->assertSee('Penilaian Harian (PH)');
        $response->assertSee('Matematika Wajib');
    }

    public function test_teacher_can_store_assessment_with_all_8_question_types_and_stimulus_narasi(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'SMAN 8 Jakarta', 'subdomain' => 'sman8', 'plan' => 'premium']);
        $teacher = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        $subject = Subject::factory()->create([
            'name' => 'Bahasa Inggris',
            'code' => 'ENG',
        ]);

        $payload = [
            'title' => 'Asesmen Sumatif Bahasa Inggris & Literasi',
            'subject_id' => $subject->id,
            'type' => 'pts',
            'grade_level' => '11',
            'description' => 'Kerjakan dengan teliti dan jujur.',
            'duration_minutes' => 90,
            'scoring_type' => 'standard',
            'status' => 'published',
            'settings' => [
                'token' => 'ENG2026',
                'randomize_questions' => true,
                'randomize_options' => true,
            ],
            'sections' => [
                [
                    'title' => 'Bagian I: Pilihan Ganda & Ragam Soal',
                    'instructions' => 'Pilihlah salah satu jawaban yang benar.',
                    'order' => 1,
                    'duration_minutes' => 45,
                    'items' => [
                        // 1. MCQ Single
                        [
                            'is_group' => false,
                            'type' => 'mcq_single',
                            'prompt' => 'What is the main topic of the conversation?',
                            'explanation' => 'The conversation clearly discusses climate change.',
                            'points' => 2.0,
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Global Warming', 'is_correct' => true, 'score' => 2.0],
                                ['label' => 'B', 'option_text' => 'Economy', 'is_correct' => false, 'score' => 0.0],
                            ],
                        ],
                        // 2. MCQ Multiple
                        [
                            'is_group' => false,
                            'type' => 'mcq_multiple',
                            'prompt' => 'Which of the following statements are correct? (Check all that apply)',
                            'points' => 3.0,
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Option 1 is true', 'is_correct' => true, 'score' => 1.5],
                                ['label' => 'B', 'option_text' => 'Option 2 is true', 'is_correct' => true, 'score' => 1.5],
                                ['label' => 'C', 'option_text' => 'Option 3 is false', 'is_correct' => false, 'score' => 0.0],
                            ],
                        ],
                        // 3. MCQ Weighted
                        [
                            'is_group' => false,
                            'type' => 'mcq_weighted',
                            'prompt' => 'Bagaimana sikap Anda saat menghadapi perbedaan pendapat tim?',
                            'points' => 5.0,
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Mendengarkan dan mencari solusi bersama', 'is_correct' => true, 'score' => 5.0],
                                ['label' => 'B', 'option_text' => 'Menyampaikan argumen secara rasional', 'is_correct' => false, 'score' => 4.0],
                                ['label' => 'C', 'option_text' => 'Meminta pihak ketiga menengahi', 'is_correct' => false, 'score' => 3.0],
                            ],
                        ],
                        // 4. Matching
                        [
                            'is_group' => false,
                            'type' => 'matching',
                            'prompt' => 'Jodohkan sinonim kata berikut dengan benar:',
                            'points' => 4.0,
                            'options' => [
                                ['label' => '1', 'option_text' => 'Ancient', 'match_key' => 'Old', 'is_correct' => true, 'score' => 2.0],
                                ['label' => '2', 'option_text' => 'Rapid', 'match_key' => 'Fast', 'is_correct' => true, 'score' => 2.0],
                            ],
                        ],
                        // 5. Ordering
                        [
                            'is_group' => false,
                            'type' => 'ordering',
                            'prompt' => 'Urutkan tahapan metode ilmiah berikut dari awal hingga akhir:',
                            'points' => 3.0,
                            'options' => [
                                ['label' => '1', 'option_text' => 'Observasi Masalah', 'match_key' => '1', 'is_correct' => true, 'score' => 1.0],
                                ['label' => '2', 'option_text' => 'Menyusun Hipotesis', 'match_key' => '2', 'is_correct' => true, 'score' => 1.0],
                                ['label' => '3', 'option_text' => 'Eksperimen', 'match_key' => '3', 'is_correct' => true, 'score' => 1.0],
                            ],
                        ],
                        // 6. Short Answer
                        [
                            'is_group' => false,
                            'type' => 'short_answer',
                            'prompt' => 'Berapa jumlah kromosom normal pada sel somatik manusia?',
                            'points' => 2.0,
                            'options' => [
                                ['label' => '1', 'option_text' => '46', 'is_correct' => true, 'score' => 2.0],
                            ],
                        ],
                        // 7. Essay
                        [
                            'is_group' => false,
                            'type' => 'essay',
                            'prompt' => 'Jelaskan dampak revolusi industri 4.0 terhadap pergeseran lapangan kerja!',
                            'points' => 10.0,
                            'options' => [],
                        ],
                        // 8. Question Group (Stimulus Narasi) with Binary Matrix Question!
                        [
                            'is_group' => true,
                            'title' => 'Teks Narasi Ilmiah: Konservasi Hutan Bakau',
                            'stimulus_type' => 'text',
                            'stimulus_content' => 'Hutan bakau memiliki peran krusial dalam menahan abrasi gelombang laut dan menyerap karbon...',
                            'questions' => [
                                [
                                    'type' => 'binary_matrix',
                                    'prompt' => 'Berdasarkan teks narasi di atas, tentukan apakah pernyataan berikut Sesuai atau Tidak Sesuai:',
                                    'explanation' => 'Pernyataan 1 sesuai dengan paragraf pertama.',
                                    'points' => 2.0,
                                    'settings' => [
                                        'labels' => ['Sesuai', 'Tidak Sesuai'],
                                        'scoring_method' => 'per_statement',
                                    ],
                                    'options' => [
                                        ['label' => '1', 'option_text' => 'Bakau mampu mencegah abrasi pantai.', 'is_correct' => true, 'match_key' => 'Sesuai', 'score' => 1.0],
                                        ['label' => '2', 'option_text' => 'Bakau tidak mampu menyerap karbon.', 'is_correct' => false, 'match_key' => 'Tidak Sesuai', 'score' => 1.0],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $response = $this->actingAs($teacher)->postJson(route('assessments.store'), $payload);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
        ]);

        $this->assertDatabaseHas('assessments', [
            'tenant_id' => $tenant->id,
            'title' => 'Asesmen Sumatif Bahasa Inggris & Literasi',
            'type' => 'pts',
            'status' => 'published',
        ]);

        $this->assertDatabaseHas('assessment_sections', [
            'title' => 'Bagian I: Pilihan Ganda & Ragam Soal',
        ]);

        $this->assertDatabaseHas('question_groups', [
            'title' => 'Teks Narasi Ilmiah: Konservasi Hutan Bakau',
            'stimulus_type' => 'text',
        ]);

        // Verify Question Types Exist
        $this->assertDatabaseHas('questions', ['type' => 'mcq_single']);
        $this->assertDatabaseHas('questions', ['type' => 'mcq_multiple']);
        $this->assertDatabaseHas('questions', ['type' => 'mcq_weighted']);
        $this->assertDatabaseHas('questions', ['type' => 'matching']);
        $this->assertDatabaseHas('questions', ['type' => 'ordering']);
        $this->assertDatabaseHas('questions', ['type' => 'short_answer']);
        $this->assertDatabaseHas('questions', ['type' => 'essay']);
        $this->assertDatabaseHas('questions', ['type' => 'binary_matrix']);

        // Verify Question Options
        $this->assertDatabaseHas('question_options', [
            'option_text' => 'Global Warming',
            'is_correct' => true,
        ]);
        $this->assertDatabaseHas('question_options', [
            'option_text' => 'Bakau mampu mencegah abrasi pantai.',
            'match_key' => 'Sesuai',
        ]);
    }

    public function test_subject_management_crud(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'SMAN 8 Jakarta', 'subdomain' => 'sman8']);
        $teacher = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        $owner = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $owner->tenants()->attach($tenant->id, ['role' => 'S']);

        // 1. Teacher cannot create subject (403 Forbidden)
        $teacherResponse = $this->actingAs($teacher)->post(route('subjects.store'), [
            'name' => 'Fisika Kuantum',
            'code' => 'FIS-K',
        ]);
        $teacherResponse->assertStatus(403);

        // 2. Owner can create global subject
        $response = $this->actingAs($owner)->post(route('subjects.store'), [
            'name' => 'Fisika Kuantum',
            'code' => 'FIS-K',
            'description' => 'Mata pelajaran peminatan kelas 12',
        ]);

        $response->assertRedirect(route('subjects.index'));
        $this->assertDatabaseHas('subjects', [
            'name' => 'Fisika Kuantum',
            'code' => 'FIS-K',
        ]);

        $subject = Subject::where('name', 'Fisika Kuantum')->first();

        // 3. Teacher cannot update subject (403 Forbidden)
        $this->actingAs($teacher)->put(route('subjects.update', $subject), [
            'name' => 'Fisika Modern',
        ])->assertStatus(403);

        // 4. Owner can update subject
        $this->actingAs($owner)->put(route('subjects.update', $subject), [
            'name' => 'Fisika Modern & Kuantum',
            'code' => 'FIS-MOD',
        ]);

        $this->assertDatabaseHas('subjects', [
            'id' => $subject->id,
            'name' => 'Fisika Modern & Kuantum',
        ]);

        // 5. Teacher cannot delete subject (403 Forbidden)
        $this->actingAs($teacher)->delete(route('subjects.destroy', $subject))->assertStatus(403);

        // 6. Owner can delete subject
        $this->actingAs($owner)->delete(route('subjects.destroy', $subject));
        $this->assertDatabaseMissing('subjects', [
            'id' => $subject->id,
        ]);
    }

    public function test_tenant_isolation_on_assessments(): void
    {
        $tenantA = Tenant::factory()->create(['name' => 'SMAN 8', 'subdomain' => 'sman8']);
        $tenantB = Tenant::factory()->create(['name' => 'SMAN 70', 'subdomain' => 'sman70']);

        $teacherA = User::factory()->create(['current_tenant_id' => $tenantA->id]);
        $teacherA->tenants()->attach($tenantA->id, ['role' => 'T']);

        $teacherB = User::factory()->create(['current_tenant_id' => $tenantB->id]);
        $teacherB->tenants()->attach($tenantB->id, ['role' => 'T']);

        $assessmentA = Assessment::factory()->create([
            'tenant_id' => $tenantA->id,
            'title' => 'Ujian Rahasia SMAN 8',
            'is_mandatory' => false,
            'is_global' => false,
        ]);

        // Teacher A can see Assessment A
        $responseA = $this->actingAs($teacherA)->get(route('assessments.index'));
        $responseA->assertStatus(200);
        $responseA->assertSee('Ujian Rahasia SMAN 8');

        // Teacher B cannot see Assessment A (Tenant Scope)
        $responseB = $this->actingAs($teacherB)->get(route('assessments.index'));
        $responseB->assertStatus(200);
        $responseB->assertDontSee('Ujian Rahasia SMAN 8');
    }

    public function test_user_can_download_word_template(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'SMAN 8 Jakarta', 'subdomain' => 'sman8']);
        $teacher = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        $response = $this->actingAs($teacher)->get(route('assessments.download-template'));

        $response->assertStatus(200);
        $response->assertHeader('content-disposition', 'attachment; filename=Template_Soal_CBT_ADZKIA.docx');
    }

    public function test_user_can_import_questions_from_word_docx(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'SMAN 8 Jakarta', 'subdomain' => 'sman8']);
        $teacher = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        // Generate a valid docx template with WordQuestionService
        $service = new WordQuestionService;
        $tempPath = tempnam(sys_get_temp_dir(), 'test_docx_').'.docx';
        $service->generateTemplate($tempPath);

        $uploadedFile = new UploadedFile(
            $tempPath,
            'Template_Soal_CBT_ADZKIA.docx',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            null,
            true
        );

        $response = $this->actingAs($teacher)->post(route('assessments.import-word'), [
            'word_file' => $uploadedFile,
        ], ['Accept' => 'application/json']);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
        ]);

        $data = $response->json();
        $this->assertNotEmpty($data['items']);

        // Check that standalone math question contains LaTeX formula
        $q1 = collect($data['items'])->first(fn ($item) => ! ($item['is_group'] ?? false) && str_contains($item['prompt'] ?? '', '$$x ='));
        $this->assertNotNull($q1, 'Soal matematika dengan formula LaTeX harus ditemukan.');
        $this->assertStringContainsString('$$x = \frac{-b \pm \sqrt{b^2 - 4ac}}{2a}$$', $q1['prompt']);
        $this->assertStringContainsString('**x^2 - 5x + 6 = 0**', $q1['prompt']);
        $this->assertStringContainsString('<u>a = 1</u>', $q1['prompt']);

        // Check options
        $this->assertCount(4, $q1['options']);
        $this->assertEquals('A', $q1['options'][0]['label']);
        $this->assertTrue($q1['options'][0]['is_correct']);
        $this->assertStringContainsString('$$x_1 = 2$$', $q1['options'][0]['option_text']);

        // Check narrative stimulus group exists
        $narrativeItem = collect($data['items'])->firstWhere('is_group', true);
        $this->assertNotNull($narrativeItem);
        $this->assertNotEmpty($narrativeItem['questions']);

        // Clean up temp file
        if (file_exists($tempPath)) {
            @unlink($tempPath);
        }
    }

    public function test_user_can_view_post_exam_result_simulation(): void
    {
        $tenant = Tenant::create([
            'name' => 'Adzkia Medan Result Test',
            'code' => 'ADZ-RES',
            'is_active' => true,
        ]);

        $teacher = User::factory()->create([
            'email' => 'teacher.result@adzkia.test',
            'current_tenant_id' => $tenant->id,
        ]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        $subject = Subject::create([
            'tenant_id' => $tenant->id,
            'name' => 'Fisika Kuantum Result',
            'code' => 'FIS-RES',
            'is_active' => true,
        ]);

        $assessment = Assessment::create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'created_by' => $teacher->id,
            'title' => 'Ujian Fisika Post-Exam Test',
            'type' => 'ph',
            'grade_level' => '12 SMA',
            'scoring_type' => 'standard',
            'status' => 'published',
            'settings' => [
                'passing_grade' => [
                    'enabled' => true,
                    'min_score' => 75,
                    'pass_label' => 'Lulus / Tuntas',
                    'fail_label' => 'Remedial',
                ],
                'post_exam_policy' => [
                    'teacher_review_required' => true,
                    'show_breakdown' => true,
                    'show_ranking' => true,
                ],
            ],
        ]);

        $section = $assessment->sections()->create([
            'title' => 'Bagian I: Pilihan Ganda',
            'order' => 1,
        ]);

        $section->questions()->create([
            'type' => 'mcq_single',
            'prompt' => 'Berapa konstanta Planck?',
            'points' => 10.0,
            'order' => 1,
        ]);

        $section->questions()->create([
            'type' => 'essay',
            'prompt' => 'Jelaskan efek fotolistrik menurut Einstein!',
            'points' => 20.0,
            'order' => 2,
        ]);

        $response = $this->actingAs($teacher)->get(route('assessments.result-preview', $assessment));

        $response->assertStatus(200);
        $response->assertSee('Ujian Fisika Post-Exam Test');
        $response->assertSee('CBT Post-Exam Result');
        $response->assertSee('Status Ujian: Menunggu Pemeriksaan Guru');
        $response->assertSee('Rincian Hasil Pengerjaan per Bagian (Section)');
        $response->assertSee('Bagian I: Pilihan Ganda');
        $response->assertSee('Ada 1 Soal Essay');
        $response->assertSee('Target KKM');
        $response->assertSee('75');
    }
}
