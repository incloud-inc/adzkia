<?php

namespace Tests\Feature;

use App\Jobs\GenerateAssessmentExplanationsJob;
use App\Jobs\GenerateQuestionExplanationJob;
use App\Models\Assessment;
use App\Models\AssessmentSection;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use App\Services\Ai\AiExplanationService;
use App\Services\Ai\AiPromptBuilder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class AiExplanationTest extends TestCase
{
    use RefreshDatabase;

    public function test_prompt_builder_constructs_deepseek_prompt_with_cara_cepat_for_math(): void
    {
        $builder = new AiPromptBuilder;

        $subject = Subject::factory()->create(['name' => 'Penalaran Matematika']);
        $assessment = Assessment::factory()->create(['subject_id' => $subject->id]);
        $section = AssessmentSection::factory()->create([
            'assessment_id' => $assessment->id,
            'title' => 'Subtes Penalaran Matematika',
        ]);

        $question = Question::factory()->create([
            'assessment_section_id' => $section->id,
            'type' => 'mcq_single',
            'prompt' => 'Jika 2x + 4 = 10, berapakah nilai x?',
            'points' => 2.0,
        ]);

        QuestionOption::create([
            'question_id' => $question->id,
            'label' => 'A',
            'option_text' => '3',
            'is_correct' => true,
            'score' => 2.0,
            'order' => 1,
        ]);

        QuestionOption::create([
            'question_id' => $question->id,
            'label' => 'B',
            'option_text' => '4',
            'is_correct' => false,
            'score' => 0.0,
            'order' => 2,
        ]);

        $systemPrompt = $builder->system();
        $this->assertStringContainsString('Kak Tutor', $systemPrompt);
        $this->assertStringContainsString('Cara Cepat', $systemPrompt);

        $userPrompt = $builder->userFor($question);
        $this->assertStringContainsString('Jika 2x + 4 = 10', $userPrompt);
        $this->assertStringContainsString('[KUNCI JAWABAN BENAR]', $userPrompt);
        $this->assertStringContainsString('Penalaran Matematika', $userPrompt);
        $this->assertStringContainsString('WAJIB sertakan section "### ⚡ Cara Cepat / Trik Praktis"', $userPrompt);
    }

    public function test_ai_explanation_service_handles_successful_api_response(): void
    {
        config(['services.deepseek.api_key' => 'mock-deepseek-api-key']);

        Http::fake([
            'https://api.deepseek.com/chat/completions' => Http::response([
                'choices' => [
                    [
                        'message' => [
                            'content' => "### ✅ Jawaban: **A**\n\n### 📝 Langkah Pembahasan\n2x + 4 = 10\n2x = 6\nx = 3\n\n### ⚡ Cara Cepat / Trik Praktis\nLangsung kurangi 10 dengan 4 dapat 6, bagi 2 hasilnya 3.",
                        ],
                    ],
                ],
            ], 200),
        ]);

        $service = app(AiExplanationService::class);

        $section = AssessmentSection::factory()->create();
        $question = Question::factory()->create([
            'assessment_section_id' => $section->id,
            'prompt' => 'Jika 2x + 4 = 10, berapakah nilai x?',
        ]);

        QuestionOption::create([
            'question_id' => $question->id,
            'label' => 'A',
            'option_text' => '3',
            'is_correct' => true,
            'order' => 1,
        ]);

        $result = $service->generateForQuestion($question);

        $this->assertTrue($result['ok']);
        $this->assertEquals('completed', $result['status']);
        $this->assertStringContainsString('Cara Cepat', $result['content']);

        $question->refresh();
        $this->assertEquals('completed', $question->explanation_status);
        $this->assertNotNull($question->explanation_generated_at);
        $this->assertStringContainsString('Cara Cepat', $question->explanation);
    }

    public function test_generate_question_explanation_job_executes_service(): void
    {
        config(['services.deepseek.api_key' => 'mock-deepseek-api-key']);

        Http::fake([
            'https://api.deepseek.com/chat/completions' => Http::response([
                'choices' => [
                    [
                        'message' => [
                            'content' => '### ✅ Jawaban: **B**\n\nPenjelasan singkat dan jelas.',
                        ],
                    ],
                ],
            ], 200),
        ]);

        $section = AssessmentSection::factory()->create();
        $question = Question::factory()->create([
            'assessment_section_id' => $section->id,
            'prompt' => 'Ibu kota Indonesia saat ini adalah?',
        ]);

        QuestionOption::create([
            'question_id' => $question->id,
            'label' => 'A',
            'option_text' => 'Surabaya',
            'is_correct' => false,
            'order' => 1,
        ]);
        QuestionOption::create([
            'question_id' => $question->id,
            'label' => 'B',
            'option_text' => 'Jakarta',
            'is_correct' => true,
            'order' => 2,
        ]);

        $job = new GenerateQuestionExplanationJob($question->id);
        $job->handle(app(AiExplanationService::class));

        $question->refresh();
        $this->assertEquals('completed', $question->explanation_status);
        $this->assertStringContainsString('Jawaban: **B**', $question->explanation);
    }

    public function test_generate_assessment_explanations_dispatches_jobs_for_all_questions(): void
    {
        config(['services.deepseek.api_key' => 'mock-deepseek-api-key']);
        Queue::fake();

        $tenant = Tenant::factory()->create();
        $teacher = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'created_by' => $teacher->id,
        ]);

        $section = AssessmentSection::factory()->create(['assessment_id' => $assessment->id]);
        Question::factory()->create(['assessment_section_id' => $section->id, 'explanation' => null]);
        Question::factory()->create(['assessment_section_id' => $section->id, 'explanation' => null]);

        $job = new GenerateAssessmentExplanationsJob($assessment->id);
        $job->handle(app(AiExplanationService::class));

        Queue::assertPushed(GenerateQuestionExplanationJob::class, 2);
    }

    public function test_teacher_can_trigger_batch_explanation_generation_from_controller(): void
    {
        config(['services.deepseek.api_key' => 'mock-deepseek-api-key']);
        Queue::fake();

        $tenant = Tenant::factory()->create();
        $teacher = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'created_by' => $teacher->id,
        ]);

        $response = $this->actingAs($teacher)->post(route('assessments.generate-explanations', $assessment));

        $response->assertRedirect();
        $response->assertSessionHas('success');

        Queue::assertPushed(GenerateAssessmentExplanationsJob::class);
    }

    public function test_teacher_can_check_status_and_regenerate_single_question_explanation(): void
    {
        config(['services.deepseek.api_key' => 'mock-deepseek-api-key']);

        Http::fake([
            'https://api.deepseek.com/chat/completions' => Http::response([
                'choices' => [
                    [
                        'message' => [
                            'content' => "### ✅ Jawaban: C\n\nPenjelasan regenerasi cepat.",
                        ],
                    ],
                ],
            ], 200),
        ]);

        $tenant = Tenant::factory()->create();
        $teacher = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'created_by' => $teacher->id,
        ]);

        $section = AssessmentSection::factory()->create(['assessment_id' => $assessment->id]);
        $question = Question::factory()->create([
            'assessment_section_id' => $section->id,
            'explanation' => null,
            'explanation_status' => 'pending',
        ]);

        // Status check
        $statusResponse = $this->actingAs($teacher)->getJson(route('questions.explanation-status', $question));
        $statusResponse->assertOk();
        $statusResponse->assertJson([
            'status' => 'pending',
            'has_explanation' => false,
        ]);

        // Regenerate synchronously via ?sync=1
        $regenResponse = $this->actingAs($teacher)->postJson(route('questions.regenerate-explanation', [
            'question' => $question,
            'sync' => 1,
        ]));

        $regenResponse->assertOk();
        $regenResponse->assertJson([
            'status' => 'success',
            'has_explanation' => true,
        ]);

        $question->refresh();
        $this->assertEquals('completed', $question->explanation_status);
        $this->assertStringContainsString('Penjelasan regenerasi cepat', $question->explanation);
    }

    public function test_teacher_can_save_and_update_question_explanation(): void
    {
        $tenant = Tenant::factory()->create();
        $teacher = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        $assessment = Assessment::factory()->create(['tenant_id' => $tenant->id]);
        $section = AssessmentSection::factory()->create(['assessment_id' => $assessment->id]);
        $question = Question::factory()->create([
            'assessment_section_id' => $section->id,
            'prompt' => 'Uji Coba Simpan Pembahasan',
            'explanation' => 'Draf lama',
            'explanation_status' => 'completed',
        ]);

        $newExplanation = "### ✅ Jawaban: **A**\n\nPembahasan telah direvisi dan disimpan manual oleh guru.";

        $response = $this->actingAs($teacher)->postJson(route('questions.explanation.update', $question), [
            'explanation' => $newExplanation,
        ]);

        $response->assertOk();
        $response->assertJson([
            'status' => 'success',
            'explanation' => $newExplanation,
        ]);

        $question->refresh();
        $this->assertEquals($newExplanation, $question->explanation);
        $this->assertEquals('completed', $question->explanation_status);
        $this->assertNotNull($question->explanation_generated_at);
    }
}
