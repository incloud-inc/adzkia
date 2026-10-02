<?php

namespace Tests\Feature;

use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionGeneratorTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected Tenant $tenant;

    protected Subject $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tenant = Tenant::create([
            'name' => 'KEMENTERIAN PENDIDIKAN',
            'subdomain' => 'kemendik',
            'is_active' => true,
        ]);

        $this->user = User::factory()->create([
            'email' => 'teacher.test@adzkia.test',
            'current_tenant_id' => $this->tenant->id,
            'must_change_password' => false,
        ]);
        $this->user->tenants()->attach($this->tenant->id, ['role' => 'T']);

        $this->subject = Subject::create([
            'name' => 'Matematika Wajib',
            'code' => 'MAT-W',
        ]);
    }

    public function test_user_can_access_question_generator_studio(): void
    {
        $response = $this->actingAs($this->user)->get(route('question-generator.index'));

        $response->assertStatus(200);
        $response->assertSee('Studio Pembuat Soal Otomatis (DeepSeek AI)');
        $response->assertSee('Siswa Sekolah');
        $response->assertSee('UTBK SNBT');
        $response->assertSee('SKD CPNS');
    }

    public function test_question_generator_generates_contextual_questions_for_school(): void
    {
        $payload = [
            'category' => 'school',
            'curriculum' => 'merdeka',
            'grade_level' => '10',
            'subject' => 'matematika',
            'chapters' => ['Bab 1: Eksponen dan Logaritma'],
            'difficulty' => 'sedang',
            'cognitive_level' => 'C3-C4 (MOTS)',
            'stimulus_mode' => 'standalone',
            'question_type' => 'mcq_single',
            'question_count' => 2,
            'ai_model' => 'deepseek-reasoner',
        ];

        $response = $this->actingAs($this->user)->postJson(route('question-generator.generate'), $payload);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
        ]);

        $data = $response->json();
        $this->assertNotEmpty($data['package']['items']);
        $this->assertNotEmpty($data['word_text']);

        // Check that word_text format is compatible with WordQuestionService
        $this->assertStringContainsString('KUNCI:', $data['word_text']);
    }

    public function test_question_generator_enforces_tkp_format_2_for_skd_tkp(): void
    {
        $payload = [
            'category' => 'skd',
            'skd_track' => 'cpns',
            'subtest' => 'tkp',
            'difficulty' => 'sukar',
            'cognitive_level' => 'C5-C6 (HOTS)',
            'stimulus_mode' => 'standalone',
            'question_type' => 'mcq_weighted',
            'question_count' => 1,
            'ai_model' => 'deepseek-reasoner',
        ];

        $response = $this->actingAs($this->user)->postJson(route('question-generator.generate'), $payload);

        $response->assertStatus(200);
        $data = $response->json();

        $item = $data['package']['items'][0];
        $this->assertEquals('mcq_weighted', $item['type']);
        $this->assertEquals(5.0, $item['points']);
        $this->assertCount(5, $item['options']);
        $this->assertEquals(5.0, $item['options'][0]['score']);

        // Check word_text has [TKP] and A. [5]
        $this->assertStringContainsString('[TKP]', $data['word_text']);
        $this->assertStringContainsString('A. [5]', $data['word_text']);
    }

    public function test_question_generator_can_export_docx_and_be_parsed(): void
    {
        $package = [
            'assessment_title' => 'Ujian Akhir Semester Fisika Terpadu',
            'stimulus' => [
                'title' => 'Eksperimen Gaya Apung Archimedes',
                'content' => 'Sebuah bejana silinder berisi air raksa dan minyak zaitun...',
            ],
            'items' => [
                [
                    'number' => 1,
                    'type' => 'mcq_single',
                    'prompt' => 'Berapa besar gaya angkat ke atas yang dialami balok besi?',
                    'points' => 2.5,
                    'options' => [
                        ['label' => 'A', 'option_text' => '100 Newton', 'is_correct' => true, 'score' => 2.5],
                        ['label' => 'B', 'option_text' => '50 Newton', 'is_correct' => false, 'score' => 0.0],
                    ],
                    'explanation' => 'Gaya ke atas = rho * g * V.',
                ],
            ],
        ];

        $response = $this->actingAs($this->user)->post(route('question-generator.export-word'), [
            'package' => $package,
        ]);

        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    }

    public function test_question_generator_can_save_to_question_bank(): void
    {
        $package = [
            'assessment_title' => 'Bank Soal Kimia Organik AI',
            'stimulus' => null,
            'items' => [
                [
                    'number' => 1,
                    'type' => 'mcq_single',
                    'prompt' => 'Apakah gugus fungsi dari senyawa alkohol?',
                    'points' => 2.0,
                    'options' => [
                        ['label' => 'A', 'option_text' => '-OH (Hidroksil)', 'is_correct' => true, 'score' => 2.0],
                        ['label' => 'B', 'option_text' => '-COOH (Karboksil)', 'is_correct' => false, 'score' => 0.0],
                    ],
                    'explanation' => 'Gugus fungsi alkohol adalah hidroksil (-OH).',
                ],
            ],
        ];

        $response = $this->actingAs($this->user)->postJson(route('question-generator.save-to-bank'), [
            'package' => $package,
            'subject_id' => $this->subject->id,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
        ]);

        $this->assertDatabaseHas('question_banks', [
            'title' => 'Bank Soal Kimia Organik AI',
            'tenant_id' => $this->tenant->id,
        ]);

        $this->assertDatabaseHas('questions', [
            'prompt' => 'Apakah gugus fungsi dari senyawa alkohol?',
            'points' => 2.0,
        ]);
    }

    public function test_sidebar_shows_studio_ai_for_authorized_roles_and_hides_for_students(): void
    {
        // Teacher
        $responseT = $this->actingAs($this->user)->get(route('dashboard'));
        $responseT->assertStatus(200);
        $responseT->assertSee('Studio AI');

        // Super User
        $superUser = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $superUser->tenants()->attach($this->tenant->id, ['role' => 'S']);
        $responseS = $this->actingAs($superUser)->get(route('dashboard'));
        $responseS->assertStatus(200);
        $responseS->assertSee('Studio AI');

        // Admin
        $admin = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $admin->tenants()->attach($this->tenant->id, ['role' => 'A']);
        $responseA = $this->actingAs($admin)->get(route('dashboard'));
        $responseA->assertStatus(200);
        $responseA->assertSee('Studio AI');

        // Student
        $student = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $student->tenants()->attach($this->tenant->id, ['role' => 'U']);
        $responseU = $this->actingAs($student)->get(route('dashboard'));
        $responseU->assertStatus(200);
        $responseU->assertDontSee('Studio AI');
    }

    public function test_student_cannot_access_question_generator_studio(): void
    {
        $student = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $student->tenants()->attach($this->tenant->id, ['role' => 'U']);

        $response = $this->actingAs($student)->get(route('question-generator.index'));
        $response->assertStatus(403);
    }

    public function test_question_generator_can_export_docx_when_package_is_json_string(): void
    {
        $package = [
            'assessment_title' => 'Ujian Akhir Semester Fisika Terpadu',
            'items' => [
                [
                    'number' => 1,
                    'type' => 'mcq_single',
                    'prompt' => 'Berapa kecepatan cahaya dalam ruang hampa?',
                    'points' => 2.0,
                    'options' => [
                        ['label' => 'A', 'option_text' => '3 x 10^8 m/s', 'is_correct' => true, 'score' => 2.0],
                        ['label' => 'B', 'option_text' => '3 x 10^6 m/s', 'is_correct' => false, 'score' => 0.0],
                    ],
                ],
            ],
        ];

        // Simulate browser hidden form submission where package is JSON string
        $response = $this->actingAs($this->user)->post(route('question-generator.export-word'), [
            'package' => json_encode($package),
        ]);

        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    }

    public function test_question_generator_save_to_bank_auto_creates_subject_when_omitted(): void
    {
        $package = [
            'assessment_title' => 'Bank Soal Astronomi Mandiri',
            'subject' => 'astronomi',
            'grade_level' => '11 SMA',
            'items' => [
                [
                    'number' => 1,
                    'type' => 'mcq_single',
                    'prompt' => 'Planet apakah yang memiliki cincin paling mencolok di tata surya?',
                    'points' => 1.0,
                    'options' => [
                        ['label' => 'A', 'option_text' => 'Saturnus', 'is_correct' => true, 'score' => 1.0],
                        ['label' => 'B', 'option_text' => 'Jupiter', 'is_correct' => false, 'score' => 0.0],
                    ],
                ],
            ],
        ];

        $response = $this->actingAs($this->user)->postJson(route('question-generator.save-to-bank'), [
            'package' => $package,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
        ]);

        $this->assertDatabaseHas('question_banks', [
            'title' => 'Bank Soal Astronomi Mandiri',
        ]);

        $this->assertDatabaseHas('subjects', [
            'name' => 'Astronomi',
        ]);
    }
}
