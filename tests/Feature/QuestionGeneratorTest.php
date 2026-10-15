<?php

namespace Tests\Feature;

use App\Models\QuestionGroup;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use App\Services\Ai\DeepSeekQuestionGeneratorService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
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
            'plan' => 'whitelabel',
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

        config([
            'services.deepseek.api_key' => '',
            'services.gemini.api_key' => '',
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
        $tenantUrl = 'http://'.$this->tenant->getPrimaryHost().'/dashboard';

        // Teacher
        $responseT = $this->actingAs($this->user)->get($tenantUrl);
        $responseT->assertStatus(200);
        $responseT->assertSee('Studio AI');

        // Super User
        $superUser = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $superUser->tenants()->attach($this->tenant->id, ['role' => 'S']);
        $responseS = $this->actingAs($superUser)->get($tenantUrl);
        $responseS->assertStatus(200);
        $responseS->assertSee('Studio AI');

        // Admin
        $admin = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $admin->tenants()->attach($this->tenant->id, ['role' => 'A']);
        $responseA = $this->actingAs($admin)->get($tenantUrl);
        $responseA->assertStatus(200);
        $responseA->assertSee('Studio AI');

        // Student
        $student = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $student->tenants()->attach($this->tenant->id, ['role' => 'U']);
        $responseU = $this->actingAs($student)->get($tenantUrl);
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

    public function test_question_generator_to_wizard_creates_sections_by_question_type(): void
    {
        $package = [
            'assessment_title' => 'Simulasi Asesmen Campuran Terpadu',
            'subject' => 'Matematika',
            'grade_level' => '10 SMA',
            'items' => [
                [
                    'number' => 1,
                    'type' => 'mcq_single',
                    'prompt' => 'Nilai dari 2^3 adalah...',
                    'points' => 1.0,
                    'options' => [
                        ['label' => 'A', 'option_text' => '8', 'is_correct' => true, 'score' => 1.0],
                        ['label' => 'B', 'option_text' => '6', 'is_correct' => false, 'score' => 0.0],
                    ],
                ],
                [
                    'number' => 2,
                    'type' => 'essay',
                    'prompt' => 'Jelaskan sifat-sifat eksponensial!',
                    'points' => 5.0,
                    'options' => [],
                ],
            ],
        ];

        $response = $this->actingAs($this->user)->postJson(route('question-generator.to-wizard'), [
            'package' => $package,
        ]);

        $response->assertStatus(200);
        $response->assertJson(['status' => 'success']);

        $wizardData = session('wizard_prefill');
        $this->assertNotEmpty($wizardData);
        $this->assertArrayHasKey('sections', $wizardData);
        $this->assertCount(2, $wizardData['sections']);

        // Section 1: MCQ Single
        $this->assertStringContainsString('Pilihan Ganda', $wizardData['sections'][0]['title']);
        $this->assertNotEmpty($wizardData['sections'][0]['instructions']);
        $this->assertCount(1, $wizardData['sections'][0]['items']);
        $this->assertEquals('mcq_single', $wizardData['sections'][0]['items'][0]['type']);

        // Section 2: Essay
        $this->assertStringContainsString('Uraian / Esai', $wizardData['sections'][1]['title']);
        $this->assertNotEmpty($wizardData['sections'][1]['instructions']);
        $this->assertCount(1, $wizardData['sections'][1]['items']);
        $this->assertEquals('essay', $wizardData['sections'][1]['items'][0]['type']);
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

    public function test_question_generator_can_prefill_wizard_session(): void
    {
        $package = [
            'assessment_title' => 'Asesmen Sumatif Matematika Kelas 10',
            'subject' => 'Matematika',
            'grade_level' => '10',
            'stimulus' => [
                'title' => 'Wacana Eksponen',
                'content' => 'Pertumbuhan bakteri membelah diri setiap 20 menit...',
            ],
            'items' => [
                [
                    'number' => 1,
                    'type' => 'mcq_single',
                    'prompt' => 'Berapakah jumlah bakteri setelah 1 jam?',
                    'points' => 2.0,
                    'options' => [
                        ['label' => 'A', 'option_text' => '8', 'is_correct' => true, 'score' => 2.0],
                        ['label' => 'B', 'option_text' => '4', 'is_correct' => false, 'score' => 0.0],
                    ],
                ],
                [
                    'number' => 2,
                    'type' => 'essay',
                    'prompt' => 'Jelaskan model matematika dari pertumbuhan eksponensial di atas!',
                    'points' => 4.0,
                    'options' => [],
                ],
            ],
        ];

        $response = $this->actingAs($this->user)->postJson(route('question-generator.to-wizard'), [
            'package' => $package,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
            'redirect_url' => route('assessments.wizard'),
        ]);

        $sessionData = session('wizard_prefill');
        $this->assertNotNull($sessionData);
        $this->assertCount(2, $sessionData['sections']);
        $this->assertStringContainsString('Pilihan Ganda', $sessionData['sections'][0]['title']);
        $this->assertStringContainsString('Uraian / Esai', $sessionData['sections'][1]['title']);
        $this->assertCount(1, $sessionData['sections'][0]['items']);
        $this->assertCount(1, $sessionData['sections'][1]['items']);

        // Test that visiting the wizard consumes the prefill
        $wizardResponse = $this->actingAs($this->user)->get(route('assessments.wizard'));
        $wizardResponse->assertStatus(200);
        $wizardResponse->assertSee('Asesmen Sumatif Matematika Kelas 10');
    }

    public function test_question_generator_supports_multi_type_distributions(): void
    {
        $payload = [
            'category' => 'school',
            'curriculum' => 'k13',
            'grade_level' => '11',
            'subject' => 'fisika',
            'chapters' => ['Dinamika Rotasi', 'Keseimbangan Benda Tegar'],
            'difficulty' => 'sedang',
            'cognitive_level' => 'C3-C4 (MOTS)',
            'stimulus_mode' => 'standalone',
            'question_type' => 'mcq_single',
            'question_count' => 6,
            'type_distributions' => [
                [
                    'type' => 'mcq_single',
                    'standalone_count' => 2,
                    'stimulus_count' => 0,
                    'stimulus_questions' => 0,
                ],
                [
                    'type' => 'mcq_multiple',
                    'standalone_count' => 2,
                    'stimulus_count' => 0,
                    'stimulus_questions' => 0,
                ],
                [
                    'type' => 'essay',
                    'standalone_count' => 2,
                    'stimulus_count' => 0,
                    'stimulus_questions' => 0,
                ],
            ],
            'ai_model' => 'deepseek-reasoner',
        ];

        $response = $this->actingAs($this->user)->postJson(route('question-generator.generate'), $payload);
        $response->assertStatus(200);
        $data = $response->json();

        $this->assertEquals('success', $data['status']);
        $this->assertGreaterThanOrEqual(1, count($data['package']['items']));
    }

    public function test_starter_tenant_cannot_access_studio_ai(): void
    {
        $starterTenant = Tenant::create([
            'name' => 'SD Starter School',
            'subdomain' => 'sd-starter',
            'plan' => 'gratis',
            'is_active' => true,
        ]);

        $teacher = User::factory()->create([
            'current_tenant_id' => $starterTenant->id,
            'must_change_password' => false,
        ]);
        $teacher->tenants()->attach($starterTenant->id, ['role' => 'T']);

        $response = $this->actingAs($teacher)->get(route('question-generator.index'));
        $response->assertStatus(403);
    }

    public function test_pro_tenant_cannot_access_studio_ai(): void
    {
        $proTenant = Tenant::create([
            'name' => 'SMP Pro School',
            'subdomain' => 'smp-pro',
            'plan' => 'premium',
            'is_active' => true,
        ]);

        $teacher = User::factory()->create([
            'current_tenant_id' => $proTenant->id,
            'must_change_password' => false,
        ]);
        $teacher->tenants()->attach($proTenant->id, ['role' => 'T']);

        $response = $this->actingAs($teacher)->get(route('question-generator.index'));
        $response->assertStatus(403);

        $generateResponse = $this->actingAs($teacher)->postJson(route('question-generator.generate'), [
            'category' => 'school',
            'question_count' => 1,
        ]);
        $generateResponse->assertStatus(403);
    }

    public function test_question_generator_generates_and_normalizes_stimulus_group(): void
    {
        $payload = [
            'category' => 'school',
            'curriculum' => 'merdeka',
            'grade_level' => '10',
            'subject' => 'ekonomi',
            'difficulty' => 'sedang',
            'cognitive_level' => 'C3-C4 (MOTS)',
            'stimulus_mode' => 'stimulus_group',
            'stimulus_source' => 'custom_text',
            'custom_stimulus_text' => 'Tingkat inflasi di kota X melonjak akibat disrupsi rantai pasok pangan.',
            'question_type' => 'mcq_single',
            'question_count' => 2,
            'type_distributions' => [
                [
                    'type' => 'mcq_single',
                    'standalone_count' => 0,
                    'stimulus_count' => 1,
                    'stimulus_questions' => 2,
                ],
            ],
            'ai_model' => 'deepseek-chat',
        ];

        $response = $this->actingAs($this->user)->postJson(route('question-generator.generate'), $payload);
        $response->assertStatus(200);
        $data = $response->json();

        $this->assertEquals('success', $data['status']);
        $this->assertNotNull($data['package']['stimulus']);
        $this->assertNotEmpty($data['package']['stimulus']['content']);
        $this->assertStringContainsString('inflasi', $data['package']['stimulus']['content']);

        // Check Word text has [STIMULUS] and [AKHIR NARASI]
        $this->assertStringContainsString('[STIMULUS]', $data['word_text']);
        $this->assertStringContainsString('[AKHIR NARASI]', $data['word_text']);
    }

    public function test_question_generator_saves_string_stimulus_as_question_group_in_bank(): void
    {
        $package = [
            'assessment_title' => 'Bank Soal Sosiologi Wacana',
            'subject' => 'Sosiologi',
            'stimulus' => 'Interaksi sosial di era digital mengalami perubahan drastis akibat dominasi media sosial.',
            'items' => [
                [
                    'number' => 1,
                    'type' => 'mcq_single',
                    'prompt' => 'Berdasarkan wacana di atas, fenomena apa yang dimaksud?',
                    'points' => 2.0,
                    'options' => [
                        ['label' => 'A', 'option_text' => 'Cultural lag', 'is_correct' => true, 'score' => 2.0],
                        ['label' => 'B', 'option_text' => 'Asimilasi', 'is_correct' => false, 'score' => 0.0],
                    ],
                ],
            ],
        ];

        $response = $this->actingAs($this->user)->postJson(route('question-generator.save-to-bank'), [
            'package' => $package,
        ]);

        $response->assertStatus(200);
        $response->assertJson(['status' => 'success']);

        $this->assertDatabaseHas('question_groups', [
            'stimulus_type' => 'text',
            'stimulus_content' => 'Interaksi sosial di era digital mengalami perubahan drastis akibat dominasi media sosial.',
        ]);

        $group = QuestionGroup::where('stimulus_content', 'like', '%Interaksi sosial%')->first();
        $this->assertNotNull($group);

        $this->assertDatabaseHas('questions', [
            'question_group_id' => $group->id,
            'prompt' => 'Berdasarkan wacana di atas, fenomena apa yang dimaksud?',
        ]);
    }

    public function test_question_generator_to_wizard_wraps_string_stimulus_as_group(): void
    {
        $package = [
            'assessment_title' => 'Asesmen Geografi Lingkungan',
            'subject' => 'Geografi',
            'stimulus' => 'Alih fungsi lahan mangrove di pesisir utara memicu abrasi pantai.',
            'items' => [
                [
                    'number' => 1,
                    'type' => 'mcq_single',
                    'prompt' => 'Dampak ekologis utama dari peristiwa pada stimulus adalah...',
                    'points' => 2.0,
                    'options' => [
                        ['label' => 'A', 'option_text' => 'Abrasi pesisir pantai', 'is_correct' => true, 'score' => 2.0],
                    ],
                ],
            ],
        ];

        $response = $this->actingAs($this->user)->postJson(route('question-generator.to-wizard'), [
            'package' => $package,
        ]);

        $response->assertStatus(200);
        $wizardData = session('wizard_prefill');
        $this->assertNotNull($wizardData);

        $firstSection = $wizardData['sections'][0];
        $this->assertCount(1, $firstSection['items']);
        $groupItem = $firstSection['items'][0];

        $this->assertTrue($groupItem['is_group']);
        $this->assertEquals('Alih fungsi lahan mangrove di pesisir utara memicu abrasi pantai.', $groupItem['stimulus_content']);
        $this->assertCount(1, $groupItem['questions']);
    }

    public function test_question_generator_generates_multi_stimuli_package_and_maps_questions(): void
    {
        $payload = [
            'category' => 'school',
            'curriculum' => 'merdeka',
            'grade_level' => '10',
            'subject' => 'biologi',
            'chapters' => ['Bab 1: Keanekaragaman Hayati dan Ekosistem'],
            'difficulty' => 'sedang',
            'cognitive_level' => 'C3-C4 (MOTS)',
            'stimulus_mode' => 'stimulus_group',
            'question_type' => 'mcq_single',
            'question_count' => 20,
            'type_distributions' => [
                [
                    'type' => 'mcq_single',
                    'standalone_count' => 0,
                    'stimulus_count' => 4,
                    'stimulus_questions' => 5,
                ],
            ],
            'ai_model' => 'deepseek-chat',
        ];

        $response = $this->actingAs($this->user)->postJson(route('question-generator.generate'), $payload);
        $response->assertStatus(200);
        $data = $response->json();

        $this->assertEquals('success', $data['status']);
        $this->assertArrayHasKey('stimuli', $data['package']);
        $this->assertCount(4, $data['package']['stimuli']);

        // Pastikan setiap wacana memiliki index 1-4 dan konten unik
        $indices = array_column($data['package']['stimuli'], 'index');
        $this->assertEquals([1, 2, 3, 4], $indices);

        $this->assertCount(20, $data['package']['items']);

        // Cek pemetaan stimulus_index pada butir soal
        $item1 = $data['package']['items'][0];
        $this->assertEquals(1, $item1['stimulus_index']);

        $item6 = $data['package']['items'][5];
        $this->assertEquals(2, $item6['stimulus_index']);

        $item11 = $data['package']['items'][10];
        $this->assertEquals(3, $item11['stimulus_index']);

        $item16 = $data['package']['items'][15];
        $this->assertEquals(4, $item16['stimulus_index']);

        // Cek Word Text memiliki 4 blok [STIMULUS]
        $this->assertEquals(4, substr_count($data['word_text'], '[STIMULUS]'));
        $this->assertEquals(4, substr_count($data['word_text'], '[AKHIR NARASI]'));
    }

    public function test_question_generator_saves_multi_stimuli_as_distinct_question_groups_in_bank(): void
    {
        $package = [
            'assessment_title' => 'Asesmen Multi-Stimulus Biologi',
            'subject' => 'Biologi',
            'stimuli' => [
                ['index' => 1, 'title' => 'Wacana 1: Terumbu Karang', 'content' => 'Terumbu karang di Raja Ampat mengalami pemulihan pesat...'],
                ['index' => 2, 'title' => 'Wacana 2: Hutan Mangrove', 'content' => 'Hutan mangrove berfungsi menahan laju intrusi air laut...'],
                ['index' => 3, 'title' => 'Wacana 3: Gambut Tropis', 'content' => 'Lahan gambut menyimpan cadangan karbon terestrial terbesar...'],
                ['index' => 4, 'title' => 'Wacana 4: Satwa Endemik', 'content' => 'Populasi komodo di pulau Rinca menunjukkan dinamika stabil...'],
            ],
            'items' => [],
        ];

        for ($i = 1; $i <= 20; $i++) {
            $stimIdx = (int) ceil($i / 5);
            $package['items'][] = [
                'number' => $i,
                'stimulus_index' => $stimIdx,
                'type' => 'mcq_single',
                'prompt' => "Pertanyaan butir nomor {$i} berbasis wacana {$stimIdx}",
                'points' => 1.0,
                'options' => [
                    ['label' => 'A', 'option_text' => 'Opsi A', 'is_correct' => true, 'score' => 1.0],
                    ['label' => 'B', 'option_text' => 'Opsi B', 'is_correct' => false, 'score' => 0.0],
                ],
            ];
        }

        $response = $this->actingAs($this->user)->postJson(route('question-generator.save-to-bank'), [
            'package' => $package,
        ]);

        $response->assertStatus(200);
        $response->assertJson(['status' => 'success']);

        // Verifikasi ada 4 QuestionGroup terpisah
        $groups = QuestionGroup::where('title', 'like', '%Wacana %')->get();
        $this->assertCount(4, $groups);

        // Verifikasi setiap butir soal terikat ke grup wacana yang sesuai
        foreach ($package['items'] as $item) {
            $expectedGroup = $groups->first(fn ($g) => str_contains($g->title, 'Wacana '.$item['stimulus_index']));
            $this->assertNotNull($expectedGroup);
            $this->assertDatabaseHas('questions', [
                'question_group_id' => $expectedGroup->id,
                'prompt' => $item['prompt'],
            ]);
        }
    }

    public function test_question_generator_to_wizard_creates_separate_groups_for_multi_stimuli(): void
    {
        $package = [
            'assessment_title' => 'Simulasi Multi Stimulus Fisika',
            'subject' => 'Fisika',
            'stimuli' => [
                ['index' => 1, 'title' => 'Stimulus Termodinamika', 'content' => 'Siklus Carnot efisiensi mesin pendingin...'],
                ['index' => 2, 'title' => 'Stimulus Elektromagnetik', 'content' => 'Induksi Faraday pada kumparan generator...'],
            ],
            'items' => [
                [
                    'number' => 1,
                    'stimulus_index' => 1,
                    'type' => 'mcq_single',
                    'prompt' => 'Soal 1 siklus Carnot',
                    'points' => 2.0,
                    'options' => [['label' => 'A', 'option_text' => 'Benar', 'is_correct' => true]],
                ],
                [
                    'number' => 2,
                    'stimulus_index' => 2,
                    'type' => 'mcq_single',
                    'prompt' => 'Soal 2 induksi Faraday',
                    'points' => 2.0,
                    'options' => [['label' => 'A', 'option_text' => 'Benar', 'is_correct' => true]],
                ],
            ],
        ];

        $response = $this->actingAs($this->user)->postJson(route('question-generator.to-wizard'), [
            'package' => $package,
        ]);

        $response->assertStatus(200);
        $wizardData = session('wizard_prefill');
        $this->assertNotNull($wizardData);

        $this->assertCount(1, $wizardData['sections']);
        $section = $wizardData['sections'][0];
        $this->assertCount(2, $section['items']);

        $this->assertTrue($section['items'][0]['is_group']);
        $this->assertEquals('Siklus Carnot efisiensi mesin pendingin...', $section['items'][0]['stimulus_content']);
        $this->assertTrue($section['items'][1]['is_group']);
        $this->assertEquals('Induksi Faraday pada kumparan generator...', $section['items'][1]['stimulus_content']);
    }

    public function test_word_export_handles_multi_stimuli_package(): void
    {
        $package = [
            'assessment_title' => 'Asesmen Multi-Stimulus Kimia',
            'stimuli' => [
                ['index' => 1, 'title' => 'Wacana 1: Larutan Asam Basa', 'content' => 'Titrasi HCl dengan NaOH menggunakan indikator PP...'],
                ['index' => 2, 'title' => 'Wacana 2: Termokimia', 'content' => 'Reaksi pembakaran gas metana dalam kalorimeter bom...'],
            ],
            'items' => [
                [
                    'number' => 1,
                    'stimulus_index' => 1,
                    'type' => 'mcq_single',
                    'prompt' => 'Berapa titik ekivalen titrasi?',
                    'points' => 2.0,
                    'options' => [['label' => 'A', 'option_text' => 'pH 7', 'is_correct' => true]],
                ],
                [
                    'number' => 2,
                    'stimulus_index' => 2,
                    'type' => 'mcq_single',
                    'prompt' => 'Berapa entalpi pembakaran?',
                    'points' => 2.0,
                    'options' => [['label' => 'A', 'option_text' => '-890 kJ/mol', 'is_correct' => true]],
                ],
            ],
        ];

        $response = $this->actingAs($this->user)->post(route('question-generator.export-word'), [
            'package' => $package,
        ]);

        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    }

    public function test_ipas_syllabus_chapters_available_for_grades_4_5_6_sd_merdeka(): void
    {
        $syllabus = config('curriculum_syllabus.merdeka');

        $this->assertArrayHasKey('4', $syllabus);
        $this->assertArrayHasKey('ipas', $syllabus['4']);
        $this->assertEquals('Ilmu Pengetahuan Alam & Sosial (IPAS)', $syllabus['4']['ipas']['name']);
        $this->assertCount(8, $syllabus['4']['ipas']['chapters']);

        $this->assertArrayHasKey('5', $syllabus);
        $this->assertArrayHasKey('ipas', $syllabus['5']);
        $this->assertEquals('Ilmu Pengetahuan Alam & Sosial (IPAS)', $syllabus['5']['ipas']['name']);
        $this->assertCount(8, $syllabus['5']['ipas']['chapters']);

        $this->assertArrayHasKey('6', $syllabus);
        $this->assertArrayHasKey('ipas', $syllabus['6']);
        $this->assertEquals('Ilmu Pengetahuan Alam & Sosial (IPAS)', $syllabus['6']['ipas']['name']);
        $this->assertCount(8, $syllabus['6']['ipas']['chapters']);
    }

    public function test_question_generator_can_generate_ipas_questions_for_sd(): void
    {
        $payload = [
            'category' => 'school',
            'curriculum' => 'merdeka',
            'grade_level' => '5',
            'subject' => 'ipas',
            'chapters' => ['Bab 2: Harmoni dalam Ekosistem (Rantai Makanan & Jaring-Jaring Kehidupan)'],
            'difficulty' => 'mudah',
            'cognitive_level' => 'C1-C2 (LOTS)',
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
        $this->assertEquals('ipas', $data['package']['subject'] ?? $payload['subject']);
    }

    public function test_explanation_sanitization_removes_rigid_prefix_and_aligns_key_letter(): void
    {
        $aiService = app(DeepSeekQuestionGeneratorService::class);

        $options = [
            ['label' => 'A', 'option_text' => 'Karbondioksida', 'is_correct' => false],
            ['label' => 'B', 'option_text' => 'Air tanah', 'is_correct' => false],
            ['label' => 'C', 'option_text' => 'Klorofil pada daun', 'is_correct' => true],
            ['label' => 'D', 'option_text' => 'Oksigen bebas', 'is_correct' => false],
        ];

        // Case 1: Explanation has rigid "KUNCI: A." prefix and ends with contradictory "jadi jawaban yang benar adalah A"
        $rawExplanation = 'KUNCI: A. Daun merupakan organ fotosintesis karena mengandung klorofil untuk menangkap cahaya. Jadi jawaban yang benar adalah A';
        $sanitized = $aiService->sanitizeExplanation($rawExplanation, $options, 'mcq_single');

        // Verify "KUNCI: A." is removed and concluding sentence is corrected to C
        $this->assertStringStartsNotWith('KUNCI:', $sanitized);
        $this->assertStringContainsString('jawaban yang benar adalah C (Klorofil pada daun)', $sanitized);

        // Case 2: Natural explanation without rigid templates is preserved and unaltered
        $cleanExplanation = 'Klorofil berfungsi mengonversi energi foton matahari menjadi energi kimia dalam reaksi terang fotosintesis.';
        $cleanResult = $aiService->sanitizeExplanation($cleanExplanation, $options, 'mcq_single');
        $this->assertEquals($cleanExplanation, $cleanResult);
    }

    public function test_gemini_models_are_recognized_and_supported_by_generator(): void
    {
        $supportedModels = DeepSeekQuestionGeneratorService::getSupportedModels();
        $this->assertArrayHasKey('gemini-2.5-pro', $supportedModels);
        $this->assertArrayHasKey('gemini-2.5-flash', $supportedModels);
        $this->assertArrayHasKey('gemini-2.0-flash', $supportedModels);
        $this->assertArrayHasKey('gemini-2.0-flash-lite', $supportedModels);
        $this->assertArrayHasKey('gemini-2.0-flash-thinking-exp-01-21', $supportedModels);
        $this->assertArrayHasKey('gemini-1.5-pro', $supportedModels);
        $this->assertArrayHasKey('gemini-1.5-flash', $supportedModels);
        $this->assertArrayHasKey('gemini-argon', $supportedModels);

        $modelsByProvider = DeepSeekQuestionGeneratorService::getModelsByProvider();
        $this->assertArrayHasKey('deepseek', $modelsByProvider);
        $this->assertArrayHasKey('gemini', $modelsByProvider);
        $this->assertCount(2, $modelsByProvider['deepseek']);
        $this->assertCount(8, $modelsByProvider['gemini']);

        $aiService = app(DeepSeekQuestionGeneratorService::class);
        $this->assertTrue($aiService->isGeminiModel('gemini-2.5-flash'));
        $this->assertTrue($aiService->isGeminiModel('gemini-argon'));
        $this->assertFalse($aiService->isGeminiModel('deepseek-reasoner'));
    }

    public function test_question_generator_can_generate_with_gemini_model(): void
    {
        $this->actingAs($this->user);

        $payload = [
            'category' => 'school',
            'curriculum' => 'merdeka',
            'grade_level' => '5',
            'subject' => 'ipas',
            'difficulty' => 'sedang',
            'cognitive_level' => 'C3-C4 (MOTS)',
            'question_type' => 'mcq_single',
            'question_count' => 3,
            'ai_model' => 'gemini-2.5-flash',
            'type_distributions' => [
                [
                    'type' => 'mcq_single',
                    'standalone_count' => 3,
                    'stimulus_count' => 0,
                    'stimulus_questions' => 0,
                ],
            ],
        ];

        $response = $this->postJson(route('question-generator.generate'), $payload);
        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
        ]);

        $data = $response->json();
        $this->assertNotEmpty($data['package']['items']);
        $this->assertEquals('gemini-2.5-flash', $data['package']['model_used']);
    }

    public function test_question_generator_can_generate_with_gemini_argon(): void
    {
        $this->actingAs($this->user);

        $payload = [
            'category' => 'school',
            'curriculum' => 'merdeka',
            'grade_level' => '4',
            'subject' => 'ipas',
            'difficulty' => 'mudah',
            'cognitive_level' => 'C1-C2 (LOTS)',
            'question_type' => 'mcq_single',
            'question_count' => 2,
            'ai_model' => 'gemini-argon',
            'type_distributions' => [
                [
                    'type' => 'mcq_single',
                    'standalone_count' => 2,
                    'stimulus_count' => 0,
                    'stimulus_questions' => 0,
                ],
            ],
        ];

        $response = $this->postJson(route('question-generator.generate'), $payload);
        $response->assertStatus(200);
        $this->assertEquals('gemini-argon', $response->json('package.model_used'));
    }

    public function test_gemini_live_api_call_is_handled_when_api_key_configured(): void
    {
        config(['services.gemini.api_key' => 'test-gemini-key-123']);

        $mockGeminiResponse = [
            'candidates' => [
                [
                    'content' => [
                        'parts' => [
                            [
                                'text' => json_encode([
                                    'assessment_title' => 'Asesmen IPAS Kelas 5 SD - Ekosistem',
                                    'category' => 'school',
                                    'difficulty' => 'sedang',
                                    'cognitive_level' => 'C3-C4 (MOTS)',
                                    'stimuli' => [],
                                    'stimulus' => null,
                                    'items' => [
                                        [
                                            'number' => 1,
                                            'type' => 'mcq_single',
                                            'prompt' => 'Dalam suatu ekosistem sawah, peran katak adalah sebagai...',
                                            'points' => 2.0,
                                            'options' => [
                                                ['label' => 'A', 'option_text' => 'Produsen pertama', 'is_correct' => false, 'score' => 0.0],
                                                ['label' => 'B', 'option_text' => 'Konsumen tingkat II', 'is_correct' => true, 'score' => 2.0],
                                                ['label' => 'C', 'option_text' => 'Pengurai utama', 'is_correct' => false, 'score' => 0.0],
                                                ['label' => 'D', 'option_text' => 'Konsumen puncak', 'is_correct' => false, 'score' => 0.0],
                                            ],
                                            'explanation' => 'Katak memakan serangga herbivora (konsumen I), sehingga katak berkedudukan sebagai konsumen tingkat II (sekunder) dalam rantai makanan.',
                                        ],
                                    ],
                                ]),
                            ],
                        ],
                    ],
                ],
            ],
        ];

        Http::fake([
            'https://generativelanguage.googleapis.com/*' => Http::response($mockGeminiResponse, 200),
        ]);

        $aiService = app(DeepSeekQuestionGeneratorService::class);
        $result = $aiService->generate([
            'category' => 'school',
            'subject' => 'ipas',
            'grade_level' => '5',
            'ai_model' => 'gemini-2.5-flash',
        ]);

        $this->assertEquals('gemini-2.5-flash', $result['model_used']);
        $this->assertEquals('google-gemini', $result['provider']);
        $this->assertCount(1, $result['items']);
        $this->assertEquals('Dalam suatu ekosistem sawah, peran katak adalah sebagai...', $result['items'][0]['prompt']);
        $this->assertTrue($result['items'][0]['options'][1]['is_correct']);
    }

    public function test_gemini_prompting_strictly_enforces_teacher_kisi_kisi_and_custom_prompt(): void
    {
        config(['services.gemini.api_key' => 'test-gemini-key-123']);

        $mockGeminiResponse = [
            'candidates' => [
                [
                    'content' => [
                        'parts' => [
                            [
                                'text' => json_encode([
                                    'assessment_title' => 'Asesmen Siklus Nitrogen - Petani Sukamaju',
                                    'category' => 'school',
                                    'difficulty' => 'sedang',
                                    'cognitive_level' => 'C3-C4 (MOTS)',
                                    'stimuli' => [],
                                    'stimulus' => null,
                                    'items' => [
                                        [
                                            'number' => 1,
                                            'type' => 'mcq_single',
                                            'prompt' => 'Berdasarkan studi kasus petani Desa Sukamaju, bakteri yang berperan penting dalam mengikat nitrogen bebas di udara adalah ...',
                                            'points' => 2.0,
                                            'options' => [
                                                ['label' => 'A', 'option_text' => 'Rhizobium yang bersimbiosis dengan akar tanaman polong', 'is_correct' => true, 'score' => 2.0],
                                                ['label' => 'B', 'option_text' => 'Lactobacillus bulgaricus', 'is_correct' => false, 'score' => 0.0],
                                                ['label' => 'C', 'option_text' => 'Escherichia coli usus', 'is_correct' => false, 'score' => 0.0],
                                                ['label' => 'D', 'option_text' => 'Streptomyces griceus', 'is_correct' => false, 'score' => 0.0],
                                            ],
                                            'explanation' => 'Bakteri Rhizobium mengikat nitrogen bebas dari atmosfer menjadi senyawa nitrat yang menyuburkan tanah pertanian.',
                                        ],
                                    ],
                                ]),
                            ],
                        ],
                    ],
                ],
            ],
        ];

        Http::fake([
            'https://generativelanguage.googleapis.com/*' => Http::response($mockGeminiResponse, 200),
        ]);

        $customKisiKisi = 'Fokuskan pada siklus nitrogen tanah dan studi kasus petani Desa Sukamaju';

        $aiService = app(DeepSeekQuestionGeneratorService::class);
        $result = $aiService->generate([
            'category' => 'school',
            'subject' => 'ipas',
            'grade_level' => '5',
            'custom_prompt' => $customKisiKisi,
            'ai_model' => 'gemini-2.5-flash',
        ]);

        $this->assertEquals('gemini-2.5-flash', $result['model_used']);

        Http::assertSent(function (Request $request) use ($customKisiKisi) {
            $systemText = data_get($request->data(), 'systemInstruction.parts.0.text', '');
            $userText = data_get($request->data(), 'contents.0.parts.0.text', '');

            return str_contains($systemText, 'INSTRUKSI PRIORITAS TERTINGGI (KISI-KISI / PESAN KHUSUS DARI GURU)')
                && str_contains($systemText, $customKisiKisi)
                && str_contains($userText, 'PERINTAH UTAMA: KISI-KISI & PESAN KHUSUS DARI GURU')
                && str_contains($userText, $customKisiKisi);
        });
    }

    public function test_bahasa_indonesia_grade_1_generates_distinct_child_friendly_questions_without_duplicates(): void
    {
        $aiService = app(DeepSeekQuestionGeneratorService::class);
        $result = $aiService->generate([
            'category' => 'school',
            'curriculum' => 'merdeka',
            'grade_level' => '1',
            'subject' => 'bahasa_indonesia',
            'question_type' => 'mcq_single',
            'question_count' => 10,
        ]);

        $this->assertNotEmpty($result['items']);
        $items = $result['items'];
        $this->assertCount(10, $items);

        $prompts = array_map(fn ($item) => $item['prompt'], $items);
        $uniquePrompts = array_unique($prompts);
        $this->assertCount(10, $uniquePrompts, 'Semua 10 butir soal harus unik dan tidak boleh ada duplikasi teks!');

        $wordText = $aiService->formatAsWordDocxText($result);
        $this->assertStringNotContainsString('disrupsi global', $wordText);
        $this->assertStringNotContainsString('falsifiabilitas', $wordText);
        $this->assertStringNotContainsString('hukum ilmiah', $wordText);

        $keys = [];
        foreach ($items as $item) {
            foreach ($item['options'] as $opt) {
                if ($opt['is_correct']) {
                    $keys[] = $opt['label'];
                }
            }
        }
        $uniqueKeys = array_unique($keys);
        $this->assertGreaterThan(1, count($uniqueKeys), 'Kunci jawaban tidak boleh seragam satu huruf melainkan bervariasi A, B, C, D.');
    }

    public function test_grade_1_short_answer_and_essay_are_calibrated_for_children(): void
    {
        $aiService = app(DeepSeekQuestionGeneratorService::class);

        // Test Short Answer for Grade 1
        $shortResult = $aiService->generate([
            'category' => 'school',
            'curriculum' => 'merdeka',
            'grade_level' => '1',
            'subject' => 'bahasa_indonesia',
            'question_type' => 'short_answer',
            'question_count' => 3,
        ]);

        $shortItems = $shortResult['items'];
        $this->assertCount(3, $shortItems);
        foreach ($shortItems as $item) {
            $this->assertStringNotContainsString('Hukum ilmiah', $item['short_answer_key'] ?? '');
            $this->assertStringNotContainsString('Falsifiabilitas', $item['short_answer_key'] ?? '');
            $this->assertStringNotContainsString('Observasi', $item['short_answer_key'] ?? '');
        }

        // Test Essay for Grade 1
        $essayResult = $aiService->generate([
            'category' => 'school',
            'curriculum' => 'merdeka',
            'grade_level' => '1',
            'subject' => 'bahasa_indonesia',
            'question_type' => 'essay',
            'question_count' => 2,
        ]);

        $essayItems = $essayResult['items'];
        $this->assertCount(2, $essayItems);
        foreach ($essayItems as $item) {
            $this->assertStringNotContainsString('perspektif yang berbeda dalam memahami dinamika Bahasa Indonesia', $item['prompt']);
            $this->assertStringNotContainsString('komprehensif', $item['prompt']);
        }
    }

    public function test_truncated_json_repair_recovers_items_and_complements_package(): void
    {
        config(['services.deepseek.api_key' => 'fake-key']);

        // Incomplete/cut-off JSON where 2 questions are complete and the 3rd is sliced in the middle
        $truncatedApiResponse = '{
            "package_title": "Asesmen Bahasa Indonesia Kelas 1 SD",
            "items": [
                {
                    "number": 1,
                    "type": "mcq_single",
                    "prompt": "Huruf pertama pada kata \\"bola\\" adalah huruf ...",
                    "points": 2.0,
                    "options": [
                        {"label": "A", "option_text": "b", "is_correct": true, "score": 2.0},
                        {"label": "B", "option_text": "d", "is_correct": false, "score": 0.0},
                        {"label": "C", "option_text": "p", "is_correct": false, "score": 0.0},
                        {"label": "D", "option_text": "m", "is_correct": false, "score": 0.0}
                    ],
                    "explanation": "Kata bola diawali dengan huruf b."
                },
                {
                    "number": 2,
                    "type": "mcq_single",
                    "prompt": "Suku kata untuk kata \\"buku\\" adalah ...",
                    "points": 2.0,
                    "options": [
                        {"label": "A", "option_text": "bu - ku", "is_correct": true, "score": 2.0},
                        {"label": "B", "option_text": "buk - u", "is_correct": false, "score": 0.0},
                        {"label": "C", "option_text": "b - uku", "is_correct": false, "score": 0.0},
                        {"label": "D", "option_text": "buku - a", "is_correct": false, "score": 0.0}
                    ],
                    "explanation": "Buku tersusun dari suku kata bu dan ku."
                },
                {
                    "number": 3,
                    "type": "mcq_single",
                    "prompt": "Sebelum makan kita harus mencuci tangan dengan ...",
                    "points": 2.0,
                    "options": [
                        {"label": "A", "option_text": "sabun", "is_correct": true';

        Http::fake([
            'https://api.deepseek.com/*' => Http::response([
                'choices' => [
                    [
                        'message' => [
                            'content' => $truncatedApiResponse,
                        ],
                    ],
                ],
            ], 200),
        ]);

        $aiService = app(DeepSeekQuestionGeneratorService::class);
        $result = $aiService->generate([
            'category' => 'school',
            'curriculum' => 'merdeka',
            'grade_level' => '1',
            'subject' => 'bahasa_indonesia',
            'question_type' => 'mcq_single',
            'question_count' => 4,
            'ai_model' => 'deepseek-reasoner',
        ]);

        $this->assertEquals('deepseek-reasoner', $result['model_used']);
        $items = $result['items'];

        // Should recover items 1 and 2, and complement items 3 and 4 to fulfill the 4 requested items
        $this->assertCount(4, $items);
        $this->assertEquals('Huruf pertama pada kata "bola" adalah huruf ...', $items[0]['prompt']);
        $this->assertEquals('Suku kata untuk kata "buku" adalah ...', $items[1]['prompt']);
        $this->assertNotEmpty($items[2]['prompt']);
        $this->assertNotEmpty($items[3]['prompt']);
    }
}
