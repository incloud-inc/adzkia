<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\AssessmentSection;
use App\Models\ExamSession;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Tests\TestCase;

class StudentDashboardAndProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_student_dashboard_renders_with_cbt_exams_and_active_sidebar(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'Adzkia Smart School', 'subdomain' => 'adzkiasmart']);
        $user = User::factory()->create([
            'current_tenant_id' => $tenant->id,
            'username' => 'siswa_adzkia',
        ]);
        $user->tenants()->attach($tenant->id, ['role' => 'U']);

        $subject = Subject::create(['name' => 'Matematika']);
        $assessment = Assessment::create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'created_by' => $user->id,
            'title' => 'Simulasi UTBK CBT',
            'type' => 'pts',
            'grade_level' => '12 SMA',
            'duration_minutes' => 60,
            'status' => 'published',
            'settings' => ['token' => 'UTBK01'],
        ]);

        $response = $this->actingAs($user)->get("http://{$tenant->subdomain}.localhost/dashboard");

        $response->assertStatus(200);
        $response->assertSee('Dashboard Siswa');
        $response->assertSee('Ujian Aktif / CBT');
        $response->assertSee('Riwayat Ujian');
        $response->assertDontSee('Hasil &amp; Sertifikat', false);
        $response->assertSee('Simulasi UTBK CBT');
        $response->assertSee(route('exam.gate.show', $assessment));
        $response->assertSee(route('assessments.show', $assessment));
    }

    public function test_student_can_view_assessment_details_and_exam_gate(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'Adzkia Smart School', 'subdomain' => 'adzkiasmart']);
        $user = User::factory()->create([
            'current_tenant_id' => $tenant->id,
        ]);
        $user->tenants()->attach($tenant->id, ['role' => 'U']);

        $subject = Subject::create(['name' => 'Fisika']);
        $assessment = Assessment::create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'created_by' => $user->id,
            'title' => 'Ujian Tengah Semester Fisika',
            'type' => 'pts',
            'grade_level' => '11 SMA',
            'duration_minutes' => 90,
            'status' => 'published',
            'settings' => ['token' => 'FSK101'],
        ]);

        // Detail screen
        $responseDetail = $this->actingAs($user)->get(route('assessments.show', $assessment));
        $responseDetail->assertStatus(200);
        $responseDetail->assertSee('Ujian Tengah Semester Fisika');

        // CBT Gate screen
        $responseGate = $this->actingAs($user)->get(route('exam.gate.show', $assessment));
        $responseGate->assertStatus(200);
        $responseGate->assertSee('Gerbang Ujian');

        // Assessments index screen has "Ikuti Ujian" button directed to exam gate
        $responseIndex = $this->actingAs($user)->get(route('assessments.index'));
        $responseIndex->assertStatus(200);
        $responseIndex->assertSee('Ikuti Ujian');
        $responseIndex->assertSee(route('exam.gate.show', $assessment));
    }

    public function test_student_can_view_exam_history_page(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'Adzkia Smart School', 'subdomain' => 'adzkiasmart']);
        $user = User::factory()->create([
            'current_tenant_id' => $tenant->id,
        ]);
        $user->tenants()->attach($tenant->id, ['role' => 'U']);

        $response = $this->actingAs($user)->get(route('exam.history'));

        $response->assertStatus(200);
        $response->assertSee('Riwayat &amp; Hasil Ujian Siswa', false);
    }

    public function test_user_can_update_profile_with_dot_dash_and_underscore_in_username(): void
    {
        $user = User::factory()->create([
            'name' => 'Siswa Baru',
            'username' => 'siswa_lama',
        ]);

        $response = $this->actingAs($user)->put(route('profile.update'), [
            'name' => 'Siswa Baru Update',
            'username' => 'siswa.pintar-2026_id',
            'bio' => 'Semangat belajar setiap hari.',
            'whatsapp_number' => '081234567890',
        ]);

        $response->assertRedirect(route('profile.edit'));
        $response->assertSessionHas('success');

        $user->refresh();
        $this->assertEquals('siswa.pintar-2026_id', $user->username);
        $this->assertEquals('Siswa Baru Update', $user->name);
    }

    public function test_user_can_save_biolink_social_links(): void
    {
        $user = User::factory()->create([
            'name' => 'Siswa Medsos',
            'username' => 'siswa_medsos',
        ]);

        $response = $this->actingAs($user)->put(route('profile.update'), [
            'name' => 'Siswa Medsos',
            'username' => 'siswa_medsos',
            'social_links' => [
                'instagram' => 'https://instagram.com/siswa_keren',
                'tiktok' => 'https://tiktok.com/@siswa_keren',
                'whatsapp' => 'https://wa.me/6281234567890',
                'youtube' => 'https://youtube.com/@siswabelajar',
                'twitter' => '',
            ],
        ]);

        $response->assertRedirect(route('profile.edit'));
        $user->refresh();

        $socials = $user->getBiolinkSocials();
        $this->assertEquals('https://instagram.com/siswa_keren', $socials['instagram']);
        $this->assertEquals('https://tiktok.com/@siswa_keren', $socials['tiktok']);
        $this->assertEquals('https://wa.me/6281234567890', $socials['whatsapp']);
        $this->assertEquals('https://youtube.com/@siswabelajar', $socials['youtube']);
        $this->assertArrayNotHasKey('twitter', $socials);

        // Akses halaman profile.edit dan pastikan media sosial dirender
        $pageResponse = $this->actingAs($user)->get(route('profile.edit'));
        $pageResponse->assertStatus(200);
        $pageResponse->assertSee('Media Sosial Biolink');
        $pageResponse->assertSee('social-icons-grid');
    }

    public function test_user_can_change_password_with_valid_current_password(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('password123'),
        ]);

        $response = $this->actingAs($user)->put(route('profile.password.update'), [
            'current_password' => 'password123',
            'password' => 'newpassword456',
            'password_confirmation' => 'newpassword456',
        ]);

        $response->assertRedirect(route('profile.edit'));
        $response->assertSessionHas('success_password');

        $user->refresh();
        $this->assertTrue(Hash::check('newpassword456', $user->password));
    }

    public function test_user_cannot_change_password_with_wrong_current_password(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('password123'),
        ]);

        $response = $this->actingAs($user)->put(route('profile.password.update'), [
            'current_password' => 'salah12345',
            'password' => 'newpassword456',
            'password_confirmation' => 'newpassword456',
        ]);

        $response->assertSessionHasErrors(['current_password']);
    }

    public function test_user_can_verify_and_unverify_whatsapp_and_email(): void
    {
        $user = User::factory()->create([
            'whatsapp_number' => '081234567890',
            'whatsapp_verified_at' => null,
            'email_verified_at' => null,
        ]);

        // Verify WA
        $this->actingAs($user)->post(route('profile.verify.whatsapp'));
        $user->refresh();
        $this->assertNotNull($user->whatsapp_verified_at);

        // Verify Email
        $this->actingAs($user)->post(route('profile.verify.email'));
        $user->refresh();
        $this->assertNotNull($user->email_verified_at);

        // Unverify
        $this->actingAs($user)->post(route('profile.unverify.contact'), ['type' => 'whatsapp']);
        $user->refresh();
        $this->assertNull($user->whatsapp_verified_at);
        $this->assertNotNull($user->email_verified_at);
    }

    public function test_student_can_start_exam_without_403_forbidden_error(): void
    {
        $tenantA = Tenant::factory()->create(['name' => 'Adzkia Pusat', 'plan' => 'premium']);
        $tenantB = Tenant::factory()->create(['name' => 'Sekolah Mitra', 'plan' => 'gratis']);

        $student = User::factory()->create([
            'current_tenant_id' => $tenantB->id,
            'name' => 'Budi Santoso',
        ]);
        $student->tenants()->attach($tenantB->id, ['role' => 'U']);

        $subject = Subject::create(['name' => 'Biologi']);
        $assessment = Assessment::create([
            'tenant_id' => $tenantA->id,
            'subject_id' => $subject->id,
            'created_by' => $student->id,
            'title' => 'Simulasi CBT Biologi Nasional',
            'type' => 'utbk',
            'duration_minutes' => 45,
            'status' => 'published',
            'is_global' => false,
            'settings' => ['token' => 'BIO45'],
        ]);

        // 1. Akses halaman gate show
        $gateResponse = $this->actingAs($student)->get(route('exam.gate.show', $assessment));
        $gateResponse->assertStatus(200);
        $gateResponse->assertSee('Gerbang Ujian');
        $gateResponse->assertSee('Mulai Pengerjaan Ujian');

        // 2. Klik Mulai Ujian (POST exam.start dengan agree=1)
        $this->withoutMiddleware(ThrottleRequests::class);
        $startResponse = $this->actingAs($student)->post(route('exam.start', $assessment), [
            'agree' => '1',
        ]);

        // Harusnya TIDAK 403, melainkan redirect ke workspace
        $startResponse->assertStatus(302);
        $startResponse->assertRedirect();
        $this->assertDatabaseHas('exam_sessions', [
            'assessment_id' => $assessment->id,
            'user_id' => $student->id,
            'status' => 'in_progress',
        ]);
    }

    public function test_student_dashboard_displays_tenant_level_badge_not_raw_premium(): void
    {
        $tenant = Tenant::factory()->create([
            'name' => 'SMA Teladan',
            'plan' => 'premium',
        ]);

        $student = User::factory()->create([
            'current_tenant_id' => $tenant->id,
            'username' => 'siswa_pro',
        ]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $response = $this->actingAs($student)->get(route('dashboard'));

        $response->assertStatus(200);
        $response->assertSee('PRO');
        $response->assertDontSee('Level PRO');
        $response->assertDontSee('PREMIUM');
        $response->assertSee('Lihat Profil Publik');
        $response->assertSee('Edit Profil &amp; Foto', false);
        $response->assertSee('Portal Sekolah ↗');
    }

    public function test_assessment_show_has_working_start_exam_link(): void
    {
        $tenant = Tenant::factory()->create();
        $user = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $user->tenants()->attach($tenant->id, ['role' => 'U']);

        $subject = Subject::create(['name' => 'Biologi']);
        $assessment = Assessment::create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'created_by' => $user->id,
            'title' => 'Simulasi CBT Biologi',
            'type' => 'utbk',
            'duration_minutes' => 60,
            'status' => 'published',
            'settings' => ['token' => 'BIO60'],
        ]);

        $response = $this->actingAs($user)->get(route('assessments.show', $assessment));
        $response->assertStatus(200);
        $response->assertSee(route('exam.gate.show', $assessment));
        $response->assertDontSee("alert('Memulai pengerjaan ujian CBT");
    }

    public function test_exam_workspace_renders_a5d8ff_background_and_cbt_payload(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'Adzkia Smart', 'plan' => 'gratis']);
        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $subject = Subject::create(['name' => 'Fisika']);
        $assessment = Assessment::create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'created_by' => $student->id,
            'title' => 'CBT Fisika Terpadu',
            'type' => 'utbk',
            'duration_minutes' => 60,
            'status' => 'published',
            'settings' => ['token' => 'FSK60'],
        ]);

        $section = $assessment->sections()->create([
            'title' => 'Fisika Kuantum',
            'order' => 1,
        ]);

        $question = $section->questions()->create([
            'type' => 'mcq_single',
            'prompt' => 'Berapakah konstanta Planck?',
            'points' => 1.0,
            'order' => 1,
        ]);

        $question->options()->create([
            'label' => 'A',
            'option_text' => '6.626 x 10^-34 J.s',
            'is_correct' => true,
            'order' => 1,
        ]);

        $startResponse = $this->actingAs($student)->post(route('exam.start', $assessment), [
            'agree' => '1',
        ]);
        $startResponse->assertStatus(302);

        $session = ExamSession::where('assessment_id', $assessment->id)
            ->where('user_id', $student->id)
            ->firstOrFail();

        $workspaceResponse = $this->actingAs($student)->get(route('exam.workspace', $session->uuid));
        $workspaceResponse->assertStatus(200);
        $workspaceResponse->assertSee('#a5d8ff');
        $workspaceResponse->assertSee('ADZKIA');
        $workspaceResponse->assertSee('SUBMIT');
        $workspaceResponse->assertSee('window.__cbtPayload', false);
        $workspaceResponse->assertSee('Berapakah konstanta Planck?');
    }

    public function test_all_question_types_render_and_can_be_answered_and_graded(): void
    {
        $this->withoutMiddleware(ThrottleRequests::class);

        $tenant = Tenant::factory()->create();
        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $subject = Subject::create(['name' => 'Bahasa & Sains']);
        $assessment = Assessment::create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'created_by' => $student->id,
            'title' => 'Asesmen Komprehensif Multi Tipe',
            'type' => 'custom',
            'duration_minutes' => 90,
            'status' => 'published',
            'settings' => ['token' => 'ALLTYPES'],
        ]);

        $section = $assessment->sections()->create(['title' => 'Bagian Utama', 'order' => 1]);

        // 1. mcq_single
        $qMcqSingle = $section->questions()->create(['type' => 'mcq_single', 'prompt' => 'Soal MCQ Single', 'points' => 10, 'order' => 1]);
        $optSingleA = $qMcqSingle->options()->create(['label' => 'A', 'option_text' => 'Kunci A', 'is_correct' => true, 'order' => 1]);
        $optSingleB = $qMcqSingle->options()->create(['label' => 'B', 'option_text' => 'Opsi B', 'is_correct' => false, 'order' => 2]);

        // 2. mcq_multiple
        $qMcqMulti = $section->questions()->create(['type' => 'mcq_multiple', 'prompt' => 'Soal MCQ Multi', 'points' => 10, 'order' => 2]);
        $optMultiA = $qMcqMulti->options()->create(['label' => 'A', 'option_text' => 'Benar 1', 'is_correct' => true, 'order' => 1]);
        $optMultiB = $qMcqMulti->options()->create(['label' => 'B', 'option_text' => 'Salah 1', 'is_correct' => false, 'order' => 2]);
        $optMultiC = $qMcqMulti->options()->create(['label' => 'C', 'option_text' => 'Benar 2', 'is_correct' => true, 'order' => 3]);

        // 3. mcq_weighted
        $qWeighted = $section->questions()->create(['type' => 'mcq_weighted', 'prompt' => 'Soal Skala Likert', 'points' => 10, 'order' => 3]);
        $optWeightA = $qWeighted->options()->create(['label' => 'A', 'option_text' => 'Sangat Baik', 'score' => 10, 'order' => 1]);

        // 4. short_answer
        $qShort = $section->questions()->create(['type' => 'short_answer', 'prompt' => 'Ibukota Indonesia baru adalah...', 'points' => 10, 'order' => 4]);
        $qShort->options()->create(['label' => 'Kunci', 'option_text' => 'Nusantara', 'is_correct' => true, 'order' => 1]);

        // 5. binary_matrix
        $qBinary = $section->questions()->create(['type' => 'binary_matrix', 'prompt' => 'Tentukan Benar/Salah', 'points' => 10, 'order' => 5]);
        $optBin1 = $qBinary->options()->create(['label' => '1', 'option_text' => 'Bumi itu bulat', 'match_key' => 'Benar', 'is_correct' => true, 'order' => 1]);
        $optBin2 = $qBinary->options()->create(['label' => '2', 'option_text' => 'Matahari terbit dari barat', 'match_key' => 'Salah', 'is_correct' => true, 'order' => 2]);

        // 6. matching
        $qMatching = $section->questions()->create(['type' => 'matching', 'prompt' => 'Jodohkan istilah', 'points' => 10, 'order' => 6]);
        $optMatch1 = $qMatching->options()->create(['label' => '1', 'option_text' => 'Oksigen', 'match_key' => 'Gas pernapasan', 'is_correct' => true, 'order' => 1]);
        $optMatch2 = $qMatching->options()->create(['label' => '2', 'option_text' => 'Klorofil', 'match_key' => 'Zat hijau daun', 'is_correct' => true, 'order' => 2]);

        // 7. ordering
        $qOrdering = $section->questions()->create(['type' => 'ordering', 'prompt' => 'Urutkan metamorfosis kupu-kupu', 'points' => 10, 'order' => 7]);
        $step1 = $qOrdering->options()->create(['label' => '1', 'option_text' => 'Telur', 'order' => 1, 'is_correct' => true]);
        $step2 = $qOrdering->options()->create(['label' => '2', 'option_text' => 'Ulat', 'order' => 2, 'is_correct' => true]);
        $step3 = $qOrdering->options()->create(['label' => '3', 'option_text' => 'Kepompong', 'order' => 3, 'is_correct' => true]);
        $step4 = $qOrdering->options()->create(['label' => '4', 'option_text' => 'Kupu-kupu', 'order' => 4, 'is_correct' => true]);

        // 8. essay
        $qEssay = $section->questions()->create(['type' => 'essay', 'prompt' => 'Jelaskan konsep fotosintesis!', 'points' => 10, 'order' => 8]);

        // Start exam
        $this->actingAs($student)->post(route('exam.start', $assessment), ['agree' => '1'])->assertStatus(302);
        $session = ExamSession::where('assessment_id', $assessment->id)->where('user_id', $student->id)->firstOrFail();

        // 1. Simpan jawaban mcq_single
        $this->actingAs($student)->postJson(route('exam.session.answer', $session->uuid), [
            'question_id' => $qMcqSingle->id,
            'answer_payload' => ['option_id' => $optSingleA->id],
        ])->assertOk();

        // 2. Simpan jawaban mcq_multiple
        $this->actingAs($student)->postJson(route('exam.session.answer', $session->uuid), [
            'question_id' => $qMcqMulti->id,
            'answer_payload' => ['option_ids' => [$optMultiA->id, $optMultiC->id]],
        ])->assertOk();

        // 3. Simpan jawaban mcq_weighted
        $this->actingAs($student)->postJson(route('exam.session.answer', $session->uuid), [
            'question_id' => $qWeighted->id,
            'answer_payload' => ['option_id' => $optWeightA->id],
        ])->assertOk();

        // 4. Simpan jawaban short_answer
        $this->actingAs($student)->postJson(route('exam.session.answer', $session->uuid), [
            'question_id' => $qShort->id,
            'answer_payload' => ['value' => 'nusantara'],
        ])->assertOk();

        // 5. Simpan jawaban binary_matrix
        $this->actingAs($student)->postJson(route('exam.session.answer', $session->uuid), [
            'question_id' => $qBinary->id,
            'answer_payload' => [
                'answers' => [
                    $optBin1->id => true,
                    $optBin2->id => false,
                ],
            ],
        ])->assertOk();

        // 6. Simpan jawaban matching
        $this->actingAs($student)->postJson(route('exam.session.answer', $session->uuid), [
            'question_id' => $qMatching->id,
            'answer_payload' => [
                'pairs' => [
                    $optMatch1->id => 'Gas pernapasan',
                    $optMatch2->id => 'Zat hijau daun',
                ],
            ],
        ])->assertOk();

        // 7. Simpan jawaban ordering
        $this->actingAs($student)->postJson(route('exam.session.answer', $session->uuid), [
            'question_id' => $qOrdering->id,
            'answer_payload' => [
                'order' => [$step1->id, $step2->id, $step3->id, $step4->id],
            ],
        ])->assertOk();

        // 8. Simpan jawaban essay
        $this->actingAs($student)->postJson(route('exam.session.answer', $session->uuid), [
            'question_id' => $qEssay->id,
            'answer_payload' => ['text' => 'Fotosintesis adalah proses pembentukan karbohidrat dengan bantuan cahaya matahari.'],
        ])->assertOk();

        // Submit exam
        $submitRes = $this->actingAs($student)->postJson(route('exam.session.submit', $session->uuid), []);
        $submitRes->assertOk();

        $session->refresh();
        $this->assertEquals('completed', $session->status);
        // 7 soal objektif dijawab benar masing-masing 10 poin = 70.0
        $this->assertEquals(70.0, (float) $session->score);

        // Akses halaman pembahasan
        $reviewResponse = $this->actingAs($student)->get(route('exam.result', $session->uuid));
        $reviewResponse->assertStatus(200);
        $reviewResponse->assertSee('ANALISA UJIAN');
        $reviewResponse->assertSee('KEMBALI KE DASHBOARD');
        $reviewResponse->assertSee('window.__reviewData', false);
    }

    public function test_header_renders_profile_photo_for_authenticated_student(): void
    {
        $user = User::factory()->create([
            'name' => 'Ahmad Dahlan',
            'profile_photo_path' => 'avatars/ahmad.jpg',
        ]);

        $response = $this->actingAs($user)->get(route('dashboard'));

        $response->assertStatus(200);
        $response->assertSee($user->profile_photo_url);
    }

    public function test_student_can_view_exam_analysis_and_history_action_button(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'Adzkia Smart School', 'subdomain' => 'adzkiasmart']);
        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $subject = Subject::create(['name' => 'Kimia']);
        $assessment = Assessment::create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'created_by' => $student->id,
            'title' => 'Simulasi Kimia Analitik',
            'type' => 'pts',
            'grade_level' => '12 SMA',
            'duration_minutes' => 60,
            'status' => 'published',
            'settings' => ['token' => 'KIM123'],
        ]);

        $section = $assessment->sections()->create([
            'title' => 'Stoikiometri & Larutan',
            'order' => 1,
        ]);

        $question = $section->questions()->create([
            'assessment_id' => $assessment->id,
            'type' => 'mcq_single',
            'prompt' => 'Berapa massa molar NaCl?',
            'points' => 10,
        ]);

        $optA = $question->options()->create(['label' => 'A', 'option_text' => '58.5 g/mol', 'is_correct' => true]);

        $session = ExamSession::create([
            'tenant_id' => $tenant->id,
            'assessment_id' => $assessment->id,
            'user_id' => $student->id,
            'status' => 'completed',
            'score' => 10.0,
            'max_score' => 10.0,
            'started_at' => now()->subMinutes(15),
            'completed_at' => now(),
        ]);

        $session->answers()->create([
            'question_id' => $question->id,
            'answer_payload' => ['option_id' => $optA->id],
            'is_correct' => true,
            'points_awarded' => 10.0,
        ]);

        // 1. History shows Analisa Ujian button in AKSI column
        $historyRes = $this->actingAs($student)->get(route('exam.history'));
        $historyRes->assertStatus(200);
        $historyRes->assertSee('Analisa Ujian');
        $historyRes->assertSee(route('exam.analysis', $session->uuid));

        // 2. Student can access exam analysis page
        $analysisRes = $this->actingAs($student)->get(route('exam.analysis', $session->uuid));
        $analysisRes->assertStatus(200);
        $analysisRes->assertSee('Analisa Hasil: Simulasi Kimia Analitik');
        $analysisRes->assertSee('Skor Akhir');
        $analysisRes->assertSee('Tingkat Akurasi');
        $analysisRes->assertSee('Stoikiometri &amp; Larutan', false);
        $analysisRes->assertSee('Pilihan Ganda Tunggal');
        $analysisRes->assertSee(route('exam.result', $session->uuid));
    }

    public function test_expired_section_questions_cannot_be_saved(): void
    {
        $tenant = Tenant::factory()->create();
        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $student->tenants()->attach($tenant->id, ['role' => 'S']);

        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'title' => 'Ujian Multi Section',
        ]);

        $section1 = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Bagian 1',
            'order' => 1,
            'duration_minutes' => 10,
        ]);

        $section2 = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Bagian 2',
            'order' => 2,
            'duration_minutes' => 15,
        ]);

        $q1 = Question::create([
            'assessment_section_id' => $section1->id,
            'type' => 'mcq_single',
            'prompt' => 'Soal Bagian 1',
            'points' => 10,
            'order' => 1,
        ]);

        $q2 = Question::create([
            'assessment_section_id' => $section2->id,
            'type' => 'mcq_single',
            'prompt' => 'Soal Bagian 2',
            'points' => 10,
            'order' => 2,
        ]);

        $session = ExamSession::create([
            'uuid' => (string) Str::uuid(),
            'assessment_id' => $assessment->id,
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'status' => 'in_progress',
            'started_at' => now(),
            'expires_at' => now()->addMinutes(60),
            'question_count' => 2,
        ]);

        // 1. Simpan jawaban soal Bagian 1 sebelum expired -> OK
        $saveBefore = $this->actingAs($student)->postJson(route('exam.session.answer', $session->uuid), [
            'question_id' => $q1->id,
            'answer_payload' => ['option_id' => 1],
        ]);
        $saveBefore->assertOk();

        // 2. Kirim sinyal bahwa Bagian 1 telah expired
        $eventRes = $this->actingAs($student)->postJson(route('exam.session.event', $session->uuid), [
            'event_type' => 'section_expired',
            'payload' => ['section_id' => $section1->id],
        ]);
        $eventRes->assertOk();

        $session->refresh();
        $this->assertContains($section1->id, (array) data_get($session->meta, 'expired_sections', []));

        // 3. Simpan jawaban soal Bagian 1 setelah expired -> DITOLAK (403 Forbidden)
        $saveAfterExpired = $this->actingAs($student)->postJson(route('exam.session.answer', $session->uuid), [
            'question_id' => $q1->id,
            'answer_payload' => ['option_id' => 2],
        ]);
        $saveAfterExpired->assertStatus(403);

        // 4. Simpan jawaban soal Bagian 2 yang belum expired -> TETAP BISA (200 OK)
        $saveSection2 = $this->actingAs($student)->postJson(route('exam.session.answer', $session->uuid), [
            'question_id' => $q2->id,
            'answer_payload' => ['option_id' => 3],
        ]);
        $saveSection2->assertOk();
    }

    public function test_sidebar_renders_adzkia_brand_and_does_not_error_for_tenant_admin(): void
    {
        $tenant = Tenant::factory()->create([
            'name' => 'PENDIDIKAN DASAR DAN MENENGAH',
            'subdomain' => 'dikdasmen-test',
            'logo_path' => 'tenants/logos/custom.png',
            'favicon_path' => 'tenants/favicons/custom.png',
        ]);

        $admin = User::factory()->create([
            'current_tenant_id' => $tenant->id,
        ]);
        $admin->tenants()->attach($tenant->id, ['role' => 'A']);

        $response = $this->actingAs($admin)->get("http://{$tenant->subdomain}.localhost/dashboard");

        $response->assertOk();
        $response->assertSee('APLIKASI UJIAN.png');
        $response->assertSee('Aplikasi Ujian ADZKIA');
        $response->assertSee($tenant->favicon_url);
    }

    public function test_student_and_teacher_under_tenant_use_tenant_favicon(): void
    {
        $tenant = Tenant::factory()->create([
            'name' => 'SMA Taruna Bangsa',
            'subdomain' => 'taruna',
            'favicon_path' => 'tenants/favicons/taruna.png',
        ]);

        $student = User::factory()->create([
            'current_tenant_id' => $tenant->id,
        ]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $response = $this->actingAs($student)->get("http://{$tenant->subdomain}.localhost/dashboard");

        $response->assertOk();
        $response->assertSee($tenant->favicon_url);
        $response->assertSee('APLIKASI UJIAN.png');
    }

    public function test_exam_workspace_auto_finalizes_session_older_than_one_day(): void
    {
        $student = User::factory()->create();
        $assessment = Assessment::factory()->create([
            'status' => 'published',
            'duration_minutes' => 60,
        ]);

        $session = ExamSession::create([
            'uuid' => (string) Str::uuid(),
            'user_id' => $student->id,
            'assessment_id' => $assessment->id,
            'status' => 'in_progress',
            'started_at' => now()->subDays(2),
            'created_at' => now()->subDays(2),
            'expires_at' => now()->subDays(2)->addHours(1),
        ]);

        $response = $this->actingAs($student)->get(route('exam.workspace', $session->uuid));

        $response->assertRedirect(route('exam.analysis', ['session' => $session->uuid]));
        $session->refresh();
        $this->assertEquals('completed', $session->status);
    }

    public function test_profile_renders_biolink_page_with_real_stats_and_theme(): void
    {
        $student = User::factory()->create([
            'username' => 'test_group_student',
            'biolink_settings' => [
                'theme' => 'blue',
                'target' => [
                    'category' => 'utbk',
                    'field_1' => 'Pendidikan Dokter',
                    'field_2' => 'Universitas Indonesia',
                    'field_3' => '740',
                ],
            ],
        ]);
        $assessment = Assessment::factory()->create([
            'status' => 'published',
            'title' => 'Try Out Fisika Kuantum',
        ]);

        ExamSession::create([
            'uuid' => (string) Str::uuid(),
            'user_id' => $student->id,
            'assessment_id' => $assessment->id,
            'status' => 'completed',
            'score' => 70.0,
            'created_at' => now()->subDays(3),
            'completed_at' => now()->subDays(3)->addMinutes(45),
        ]);

        ExamSession::create([
            'uuid' => (string) Str::uuid(),
            'user_id' => $student->id,
            'assessment_id' => $assessment->id,
            'status' => 'completed',
            'score' => 95.0,
            'created_at' => now()->subDay(),
            'completed_at' => now()->subDay()->addMinutes(40),
        ]);

        $response = $this->actingAs($student)->get('/@'.$student->username);

        $response->assertOk();
        $response->assertSee('Biolink Profil Siswa');
        $response->assertSee('Try Out Fisika Kuantum');
        $response->assertSee('95');
        $response->assertSee('Rapor Kilat &amp; Pencapaian', false);
        $response->assertSee('Pendidikan Dokter');
        $response->assertSee('Universitas Indonesia');
        $response->assertSee("themeKey: 'blue'", false);
    }

    public function test_guest_can_view_student_biolink_profile(): void
    {
        $student = User::factory()->create([
            'username' => 'tatag_private',
            'name' => 'Tatag Permana',
        ]);

        $response = $this->get('/@'.$student->username);

        $response->assertOk();
        $response->assertSee('Tatag Permana');
        $response->assertSee('Bagikan');
        $response->assertSee('Hasil Ujian');
        $response->assertSee('Rapor Kilat &amp; Pencapaian', false);
    }

    public function test_student_can_upload_and_edit_cover_photo(): void
    {
        $disk = config('filesystems.upload_disk', 'public');
        if ($disk === 'r2' && (! config('filesystems.disks.r2.key') || ! config('filesystems.disks.r2.secret'))) {
            $disk = 'public';
        }
        Storage::fake($disk);

        $student = User::factory()->create();
        $cover = UploadedFile::fake()->createWithContent(
            'my_cover.jpg',
            base64_decode('/9j/4AAQSkZJRgABAQEASABIAAD/2wBDAP//////////////////////////////////////////////////////////////////////////////////////wgALCAABAAEBAREA/8QAFBABAAAAAAAAAAAAAAAAAAAAAP/aAAgBAQABPxA=')
        );

        $response = $this->actingAs($student)->put(route('profile.update'), [
            'name' => 'Tatag Siswa',
            'cover_photo' => $cover,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Profil berhasil diperbarui.');

        $student->refresh();
        $this->assertNotNull($student->cover_photo_path);
        Storage::disk($disk)->assertExists($student->cover_photo_path);
    }

    public function test_history_tab_shows_all_sessions_in_biolink(): void
    {
        $student = User::factory()->create([
            'username' => 'tatag_multi_history',
        ]);

        for ($i = 1; $i <= 6; $i++) {
            $asm = Assessment::factory()->create([
                'title' => "Ujian Variasi Ke-{$i}",
                'status' => 'published',
            ]);
            ExamSession::create([
                'uuid' => (string) Str::uuid(),
                'user_id' => $student->id,
                'assessment_id' => $asm->id,
                'status' => 'completed',
                'score' => 80 + $i,
                'created_at' => now()->subDays($i),
                'completed_at' => now()->subDays($i)->addMinutes(30),
            ]);
        }

        $response = $this->actingAs($student)->get('/@'.$student->username);

        $response->assertOk();
        $response->assertSee('Ujian Variasi Ke-1');
        $response->assertSee('Ujian Variasi Ke-6');
    }

    public function test_student_can_update_biolink_theme_and_target_settings(): void
    {
        $student = User::factory()->create([
            'username' => 'siswa_target_test',
        ]);

        $response = $this->actingAs($student)->put(route('profile.update'), [
            'name' => 'Siswa Target Test',
            'username' => 'siswa_target_test',
            'biolink_theme' => 'grape',
            'target_category' => 'skd',
            'target_field_1' => 'Auditor Ahli Pertama',
            'target_field_2' => 'Badan Pemeriksa Keuangan',
            'target_field_3' => '450',
            'target_label_1' => 'Jabatan / Formasi',
            'target_label_2' => 'Instansi',
            'target_label_3' => 'Target Nilai SKD',
        ]);

        $response->assertRedirect(route('profile.edit'));
        $student->refresh();

        $this->assertEquals('grape', $student->getBiolinkTheme());
        $target = $student->getBiolinkTarget();
        $this->assertEquals('skd', $target['category']);
        $this->assertEquals('Auditor Ahli Pertama', $target['field_1']);
        $this->assertEquals('Badan Pemeriksa Keuangan', $target['field_2']);
        $this->assertEquals('450', $target['field_3']);

        $viewResponse = $this->actingAs($student)->get('/@'.$student->username);
        $viewResponse->assertOk();
        $viewResponse->assertSee("themeKey: 'grape'", false);
        $viewResponse->assertSee('Auditor Ahli Pertama');
        $viewResponse->assertSee('Badan Pemeriksa Keuangan');
    }

    public function test_biolink_renders_certificate_with_tenant_name_and_theme(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'SMA Prestasi Prima', 'subdomain' => 'smaprestasi']);
        $student = User::factory()->create([
            'name' => 'Budi Santoso',
            'username' => 'budisantoso',
            'current_tenant_id' => $tenant->id,
            'biolink_settings' => [
                'theme' => 'teal',
            ],
        ]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $response = $this->get("http://{$tenant->subdomain}.localhost/@{$student->username}");

        $response->assertOk();
        $response->assertSee('Sertifikat Kelulusan Evaluasi CBT Siswa SMA Prestasi Prima');
        $response->assertDontSee('Murid SMA Prestasi Prima');
        $response->assertDontSee('Dewan Evaluasi SMA Prestasi Prima');
        $response->assertDontSee('LEMBAGA EVALUASI &amp; ASESMEN AKADEMIK RESMI', false);
        $response->assertSee('certBgStyle', false);
    }

    public function test_student_profile_update_sets_passing_target_100_when_regular_grade_selected(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'SMP Cendekia', 'subdomain' => 'smpcendekia']);
        $student = User::factory()->create([
            'name' => 'Ahmad Siswa',
            'username' => 'ahmad_siswa',
            'current_tenant_id' => $tenant->id,
        ]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $response = $this->actingAs($student)->from(route('profile.edit'))->put(route('profile.update'), [
            'name' => 'Ahmad Siswa',
            'username' => 'ahmad_siswa',
            'target_category' => '8', // Kelas 8 SMP
            'target_field_1' => 'Kelas 8 Unggulan',
            'target_field_2' => 'Matematika dan IPA',
            'target_field_3' => '85', // Murid input 85, tapi sistem harus otomatis set 100
        ]);

        $response->assertRedirect(route('profile.edit'));
        $student->refresh();

        $target = $student->getBiolinkTarget();
        $this->assertEquals('8', $target['category']);
        $this->assertEquals('100', $target['field_3'], 'Passing target must automatically be 100 for regular grades 1-12');

        // Check Biolink site title: Nama - Nama Tenant
        $biolinkResponse = $this->actingAs($student)->get("http://{$tenant->subdomain}.localhost/@{$student->username}");
        $biolinkResponse->assertOk();
        $biolinkResponse->assertSee('<title>Ahmad Siswa - SMP Cendekia</title>', false);
        $biolinkResponse->assertSee('Target Kelas 8');
        $biolinkResponse->assertSee('100');
    }

    public function test_tenant_portal_filters_catalog_when_student_has_regular_grade_target(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'Sekolah Karakter', 'subdomain' => 'sekolahkarakter']);
        $settings = $tenant->settings ?? [];
        $settings['school_grades'] = ['sd', 'smp', 'sma'];
        $tenant->update(['settings' => $settings]);

        // Assessment for Kelas 2
        $subject = Subject::create(['name' => 'Tematik SD']);
        Assessment::create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'created_by' => $tenant->users()->first()?->id ?? User::factory()->create()->id,
            'title' => 'Asesmen Harian Tematik 2',
            'type' => 'pts',
            'grade_level' => '2',
            'duration_minutes' => 45,
            'status' => 'published',
            'price_type' => 'free',
        ]);

        // Assessment for Kelas 7
        Assessment::create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'created_by' => $tenant->users()->first()?->id ?? User::factory()->create()->id,
            'title' => 'Asesmen Harian Matematika 7',
            'type' => 'pts',
            'grade_level' => '7',
            'duration_minutes' => 60,
            'status' => 'published',
            'price_type' => 'paid',
            'price' => 50000,
        ]);

        // Student with target Kelas 2
        $student = User::factory()->create([
            'name' => 'Bintang Kelas',
            'username' => 'bintang_sd',
            'current_tenant_id' => $tenant->id,
            'biolink_settings' => [
                'target' => [
                    'category' => '2',
                    'field_1' => 'Kelas 2 SD',
                    'field_2' => 'Tematik',
                    'field_3' => '100',
                ],
            ],
        ]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $portalResponse = $this->actingAs($student)->get("http://{$tenant->subdomain}.localhost/");
        $portalResponse->assertOk();
        $portalResponse->assertSee('<title>Portal Asesmen Sekolah Karakter</title>', false);
        $portalResponse->assertSee('Asesmen Harian Tematik 2');
        $portalResponse->assertDontSee('Asesmen Harian Matematika 7');

        // Now test student with PRO group target (e.g. UTBK)
        $student->update([
            'biolink_settings' => [
                'target' => [
                    'category' => 'utbk',
                    'field_1' => 'Kedokteran',
                    'field_2' => 'UI',
                    'field_3' => '750',
                ],
            ],
        ]);

        $proPortalResponse = $this->actingAs($student->fresh())->get("http://{$tenant->subdomain}.localhost/");
        $proPortalResponse->assertOk();
        $proPortalResponse->assertSee('Asesmen Harian Tematik 2');
        $proPortalResponse->assertSee('Asesmen Harian Matematika 7');
    }
}
