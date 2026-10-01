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

class ProctoringTest extends TestCase
{
    use RefreshDatabase;

    public function test_teacher_can_view_proctoring_with_blue_allow_continue_button(): void
    {
        $tenant = Tenant::factory()->create();
        $teacher = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $subject = Subject::factory()->create();
        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'title' => 'Ujian Tengah Semester',
            'status' => 'published',
        ]);

        $session = ExamSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'status' => 'interrupted_locked',
            'lock_reason' => 'Koneksi internet terputus',
            'started_at' => now()->subMinutes(10),
        ]);

        $response = $this->actingAs($teacher)->get(route('assessments.proctoring', $assessment));

        $response->assertStatus(200);
        $response->assertSee('Izinkan untuk Lanjutkan');
        $response->assertSee('#1c7ed6');
        $response->assertSee('Simulasikan Siswa Terkunci');

        // Test unlocking
        $unlockResponse = $this->actingAs($teacher)->postJson(route('proctoring.sessions.unlock', $session));
        $unlockResponse->assertStatus(200);
        $unlockResponse->assertJson(['success' => true]);

        $session->refresh();
        $this->assertTrue($session->isInProgress());
        $this->assertEquals($teacher->id, $session->unlocked_by);

        // Test simulate lock
        $simulateResponse = $this->actingAs($teacher)->post(route('assessments.proctoring.simulate_lock', $assessment));
        $simulateResponse->assertRedirect();

        $session->refresh();
        $this->assertTrue($session->isLocked());
    }

    public function test_assessment_index_filter_widths_and_search_box(): void
    {
        $tenant = Tenant::factory()->create();
        $admin = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $admin->tenants()->attach($tenant->id, ['role' => 'A']);

        $response = $this->actingAs($admin)->get(route('assessments.index'));

        $response->assertStatus(200);
        $response->assertSee('sm:w-28', false);
        $response->assertSee('sm:w-24', false);
        $response->assertSee('Cari judul ujian...');
    }

    public function test_tenant_assessments_filter_by_branding_grade_checklist(): void
    {
        $adzkia = Tenant::factory()->create(['id' => 1, 'name' => 'KEMENTERIAN PENDIDIKAN']);

        $tenant = Tenant::factory()->create([
            'settings' => [
                'show_grade_sd' => false,
                'show_grade_smp' => false,
                'show_grade_sma' => true,
            ],
        ]);

        $admin = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $admin->tenants()->attach($tenant->id, ['role' => 'A']);

        $subject = Subject::factory()->create();

        // Asesmen SD
        $sdAssessment = Assessment::factory()->create([
            'tenant_id' => 1,
            'subject_id' => $subject->id,
            'title' => 'Asesmen Matematika SD',
            'grade_level' => '1 SD',
            'is_mandatory' => true,
            'status' => 'published',
        ]);

        // Asesmen SMA
        $smaAssessment = Assessment::factory()->create([
            'tenant_id' => 1,
            'subject_id' => $subject->id,
            'title' => 'Asesmen Fisika SMA',
            'grade_level' => '12 SMA',
            'is_mandatory' => true,
            'status' => 'published',
        ]);

        $this->assertFalse($tenant->isAssessmentVisible($sdAssessment));
        $this->assertTrue($tenant->isAssessmentVisible($smaAssessment));

        $response = $this->actingAs($admin)->get(route('assessments.index'));
        $response->assertStatus(200);
        $response->assertSee('Asesmen Fisika SMA');
        $response->assertDontSee('Asesmen Matematika SD');
    }

    public function test_public_profile_is_disabled_for_admin_and_owner_but_active_for_student_and_teacher(): void
    {
        $tenant = Tenant::factory()->create();

        // 1. Owner
        $owner = User::factory()->create(['username' => 'super_owner', 'current_tenant_id' => $tenant->id]);
        $owner->tenants()->attach($tenant->id, ['role' => 'S']);
        $this->assertFalse($owner->hasPublicProfile());
        $this->get(route('global.student.profile', $owner->username))->assertStatus(404);

        // 2. Admin
        $admin = User::factory()->create(['username' => 'school_admin', 'current_tenant_id' => $tenant->id]);
        $admin->tenants()->attach($tenant->id, ['role' => 'A']);
        $this->assertFalse($admin->hasPublicProfile());
        $this->get(route('global.student.profile', $admin->username))->assertStatus(404);

        // 3. Student
        $student = User::factory()->create(['username' => 'smart_student', 'current_tenant_id' => $tenant->id]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);
        $this->assertTrue($student->hasPublicProfile());
        $this->get(route('global.student.profile', $student->username))->assertStatus(200);

        // 4. Teacher
        $teacher = User::factory()->create(['username' => 'good_teacher', 'current_tenant_id' => $tenant->id]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);
        $this->assertTrue($teacher->hasPublicProfile());
        $this->get(route('global.student.profile', $teacher->username))->assertStatus(200);
    }

    public function test_proctor_actions_pin_time_point_reset_cancel_and_verify(): void
    {
        $tenant = Tenant::factory()->create();
        $teacher = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $subject = Subject::factory()->create();
        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'settings' => ['proctoring_mode' => 'proctored'],
        ]);

        $session = ExamSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'status' => 'interrupted_locked',
            'lock_reason' => 'Menunggu keputusan pengawas ujian',
            'started_at' => now()->subMinutes(10),
            'expires_at' => now()->addMinutes(50),
        ]);

        // 1. PIN Action
        $pinRes = $this->actingAs($teacher)->postJson(route('proctoring.sessions.generate_pin', $session));
        $pinRes->assertStatus(200)->assertJson(['success' => true]);
        $generatedPin = $pinRes->json('pin');
        $this->assertNotEmpty($generatedPin);
        $this->assertEquals(6, strlen($generatedPin));

        // Student verifies PIN
        $verifyRes = $this->actingAs($student)->postJson(route('exam.session.verify_pin', $session), ['pin' => $generatedPin]);
        $verifyRes->assertStatus(200)->assertJson(['ok' => true]);
        $session->refresh();
        $this->assertTrue($session->isInProgress());

        // 2. TIME Action (Cut 10 minutes)
        $session->lock('Melanggar keluar tab');
        $oldExpires = $session->expires_at->timestamp;
        $timeRes = $this->actingAs($teacher)->postJson(route('proctoring.sessions.cut_time', $session), ['minutes' => 10]);
        $timeRes->assertStatus(200)->assertJson(['success' => true]);
        $session->refresh();
        $this->assertTrue($session->isInProgress());
        $this->assertLessThan($oldExpires, $session->expires_at->timestamp);
        $this->assertEquals(10, data_get($session->meta, 'time_penalty_minutes'));

        // 3. POINT Action (Cut 5 points)
        $pointRes = $this->actingAs($teacher)->postJson(route('proctoring.sessions.cut_point', $session), ['points' => 5]);
        $pointRes->assertStatus(200)->assertJson(['success' => true]);
        $session->refresh();
        $this->assertEquals(5.0, (float) data_get($session->meta, 'score_penalty'));

        // 4. RESET Action (Delete answers)
        $section = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Bagian 1',
            'order' => 1,
            'duration_minutes' => 60,
        ]);
        $question = Question::factory()->create([
            'assessment_section_id' => $section->id,
        ]);
        ExamAnswer::create([
            'exam_session_id' => $session->id,
            'question_id' => $question->id,
            'answer_payload' => ['option_id' => 1],
        ]);
        $this->assertEquals(1, ExamAnswer::where('exam_session_id', $session->id)->count());
        $resetRes = $this->actingAs($teacher)->postJson(route('proctoring.sessions.reset_questions', $session));
        $resetRes->assertStatus(200)->assertJson(['success' => true]);
        $this->assertEquals(0, ExamAnswer::where('exam_session_id', $session->id)->count());

        // 5. CANCEL Action (Hentikan sesi)
        $cancelRes = $this->actingAs($teacher)->postJson(route('proctoring.sessions.cancel', $session));
        $cancelRes->assertStatus(200)->assertJson(['success' => true]);
        $session->refresh();
        $this->assertEquals('cancelled', $session->status);

        // 6. VERIFY Action (Sahkan sesi)
        $verifySessionRes = $this->actingAs($teacher)->postJson(route('proctoring.sessions.verify', $session));
        $verifySessionRes->assertStatus(200)->assertJson(['success' => true]);
        $session->refresh();
        $this->assertTrue((bool) data_get($session->meta, 'is_verified_by_proctor'));
    }

    public function test_proctor_actions_work_with_integer_session_id_and_cross_tenant_student(): void
    {
        // Tenant A: Guru / Pembuat Asesmen
        $teacherTenant = Tenant::factory()->create(['name' => 'Sekolah Guru']);
        $teacher = User::factory()->create(['current_tenant_id' => $teacherTenant->id]);
        $teacher->tenants()->attach($teacherTenant->id, ['role' => 'T']);

        // Tenant B: Siswa dari institusi berbeda
        $studentTenant = Tenant::factory()->create(['name' => 'Sekolah Siswa']);
        $student = User::factory()->create(['current_tenant_id' => $studentTenant->id]);
        $student->tenants()->attach($studentTenant->id, ['role' => 'U']);

        $subject = Subject::factory()->create();
        $assessment = Assessment::factory()->create([
            'tenant_id' => $teacherTenant->id,
            'created_by' => $teacher->id,
            'subject_id' => $subject->id,
            'settings' => ['proctoring_mode' => 'proctored'],
        ]);

        $session = ExamSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => $student->id,
            'tenant_id' => $studentTenant->id,
            'status' => 'interrupted_locked',
            'lock_reason' => 'Siswa membuka tab lain',
            'started_at' => now()->subMinutes(5),
            'expires_at' => now()->addMinutes(45),
        ]);

        // 1. PIN Action using INTEGER ID (Testing PostgreSQL resolveRouteBinding fix)
        $pinRes = $this->actingAs($teacher)->postJson("/proctoring/sessions/{$session->id}/generate-pin");
        $pinRes->assertStatus(200)->assertJson(['success' => true]);
        $this->assertNotEmpty($pinRes->json('pin'));

        // 2. TIME Action using INTEGER ID
        $timeRes = $this->actingAs($teacher)->postJson("/proctoring/sessions/{$session->id}/cut-time", ['minutes' => 5]);
        $timeRes->assertStatus(200)->assertJson(['success' => true]);

        // 3. POINT Action using INTEGER ID
        $pointRes = $this->actingAs($teacher)->postJson("/proctoring/sessions/{$session->id}/cut-point", ['points' => 2]);
        $pointRes->assertStatus(200)->assertJson(['success' => true]);

        // 4. RESET Action using INTEGER ID
        $resetRes = $this->actingAs($teacher)->postJson("/proctoring/sessions/{$session->id}/reset-questions");
        $resetRes->assertStatus(200)->assertJson(['success' => true]);

        // 5. UNLOCK Action using INTEGER ID
        $unlockRes = $this->actingAs($teacher)->postJson("/proctoring/sessions/{$session->id}/unlock");
        $unlockRes->assertStatus(200)->assertJson(['success' => true]);

        // 6. CANCEL Action using INTEGER ID
        $cancelRes = $this->actingAs($teacher)->postJson("/proctoring/sessions/{$session->id}/cancel");
        $cancelRes->assertStatus(200)->assertJson(['success' => true]);
    }

    public function test_reset_action_empties_score_and_answers_and_keeps_timer_running(): void
    {
        $tenant = Tenant::factory()->create();
        $teacher = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $subject = Subject::factory()->create();
        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'duration_minutes' => 60,
            'settings' => ['proctoring_mode' => 'proctored'],
        ]);

        $section = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Bagian Utama',
            'order' => 1,
            'duration_minutes' => 60,
        ]);

        $question = Question::factory()->create([
            'assessment_section_id' => $section->id,
            'type' => 'mcq_single',
            'prompt' => 'Soal 1',
        ]);

        $futureDeadline = now()->addMinutes(42);

        $session = ExamSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'status' => 'interrupted_locked',
            'lock_reason' => 'Menunggu keputusan pengawas ujian',
            'started_at' => now()->subMinutes(18),
            'expires_at' => $futureDeadline,
            'score' => 75.50,
            'meta' => [
                'score_penalty' => 5.0,
                'expired_sections' => [$section->id],
            ],
        ]);

        ExamAnswer::create([
            'exam_session_id' => $session->id,
            'question_id' => $question->id,
            'answer_payload' => ['option_id' => 1],
            'answered_at' => now(),
        ]);

        $this->assertEquals(1, ExamAnswer::where('exam_session_id', $session->id)->count());
        $this->assertEquals(75.50, (float) $session->score);

        // Pengawas menjalankan aksi RESET
        $response = $this->actingAs($teacher)->postJson(route('proctoring.sessions.reset_questions', $session));
        $response->assertStatus(200)->assertJson([
            'success' => true,
            'reset_count' => 1,
        ]);

        $session->refresh();

        // 1. Jawaban & nilai kosong
        $this->assertEquals(0, ExamAnswer::where('exam_session_id', $session->id)->count());
        $this->assertNull($session->score);
        $this->assertNull($session->completed_at);
        $this->assertTrue($session->isInProgress());
        $this->assertEquals(1, data_get($session->meta, 'reset_count'));
        $this->assertEquals('reset', data_get($session->meta, 'proctor_action'));
        $this->assertNull(data_get($session->meta, 'expired_sections'));

        // 2. Waktu ujian TETAP BERJALAN (tidak reset ke 60 menit, tetap mempertahankan sisa waktu berjalan ~42 menit)
        $this->assertEquals($futureDeadline->timestamp, $session->expires_at->timestamp);
        $this->assertGreaterThan(2400, $session->remainingSeconds()); // ~42 menit = 2520 detik
        $this->assertLessThanOrEqual(2520, $session->remainingSeconds());

        // 3. Polling status dari siswa mendeteksi proctor_action = reset
        $statusRes = $this->actingAs($student)->getJson(route('exam.session.lock_status', $session));
        $statusRes->assertStatus(200)->assertJson([
            'status' => 'in_progress',
            'is_locked' => false,
            'proctor_action' => 'reset',
            'reset_count' => 1,
        ]);
        $this->assertGreaterThan(2400, $statusRes->json('remaining_seconds'));

        // 4. Siswa dapat menjawab kembali soal nomor 1 dari awal
        $saveRes = $this->actingAs($student)->postJson(route('exam.session.answer', $session), [
            'question_id' => $question->id,
            'answer_payload' => ['option_id' => 2],
        ]);
        $saveRes->assertStatus(200)->assertJson(['ok' => true]);
        $this->assertEquals(1, ExamAnswer::where('exam_session_id', $session->id)->count());
    }
}
