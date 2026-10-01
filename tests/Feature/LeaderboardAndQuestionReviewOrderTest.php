<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\AssessmentSection;
use App\Models\ExamSession;
use App\Models\Question;
use App\Models\QuestionGroup;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LeaderboardAndQuestionReviewOrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_leaderboard_inactive_when_less_than_10_completed_sessions(): void
    {
        $tenant = Tenant::factory()->create();
        $user = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $subject = Subject::factory()->create();

        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'title' => 'Tryout Matematika',
            'status' => 'published',
        ]);

        // Buat 5 sesi selesai (kurang dari 10)
        for ($i = 1; $i <= 5; $i++) {
            ExamSession::create([
                'assessment_id' => $assessment->id,
                'user_id' => $user->id,
                'tenant_id' => $tenant->id,
                'status' => 'completed',
                'score' => 70 + $i,
                'started_at' => now()->subMinutes(30),
                'completed_at' => now(),
            ]);
        }

        $response = $this->actingAs($user)->get(route('assessments.show', $assessment));
        $response->assertStatus(200);
        $response->assertSee('Leaderboard Belum Aktif');
        $response->assertSee('5 / 10 Pengerjaan Selesai');
        $response->assertDontSee('10 Besar (Top 10)');
    }

    public function test_leaderboard_active_with_top_10_and_rank_11_across_tenants(): void
    {
        $tenantA = Tenant::factory()->create(['name' => 'Bimbel Adzkia Medan', 'subdomain' => 'medan']);
        $tenantB = Tenant::factory()->create(['name' => 'Bimbel Adzkia Jakarta', 'subdomain' => 'jakarta']);
        $user = User::factory()->create(['current_tenant_id' => $tenantA->id]);
        $subject = Subject::factory()->create();

        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenantA->id,
            'subject_id' => $subject->id,
            'title' => 'Tryout Akbar Nasional',
            'status' => 'published',
        ]);

        // Buat 12 sesi selesai dari 2 tenant berbeda
        for ($i = 1; $i <= 12; $i++) {
            $student = User::factory()->create([
                'name' => "Siswa Juara {$i}",
                'username' => "siswa{$i}",
                'current_tenant_id' => ($i % 2 === 0) ? $tenantA->id : $tenantB->id,
            ]);

            ExamSession::create([
                'assessment_id' => $assessment->id,
                'user_id' => $student->id,
                'tenant_id' => ($i % 2 === 0) ? $tenantA->id : $tenantB->id,
                'status' => 'completed',
                'score' => 60 + ($i * 3), // Siswa 12 tertinggi (96), Siswa 1 terendah (63)
                'started_at' => now()->subMinutes(30),
                'completed_at' => now()->subMinutes(13 - $i),
            ]);
        }

        $response = $this->actingAs($user)->get(route('assessments.show', $assessment));
        $response->assertStatus(200);
        $response->assertSee('Leaderboard Asesmen Nasional');
        $response->assertSee('10 Besar (Top 10)');
        $response->assertSee('Peringkat Lanjutan (Rank 11+)');
        $response->assertSee('12 Sesi Selesai (Lintas Tenant)');
        $response->assertSee('Siswa Juara 12'); // Top 1
        $response->assertSee('Bimbel Adzkia Medan');
        $response->assertSee('Bimbel Adzkia Jakarta');
    }

    public function test_pembahasan_preserves_question_creation_order_without_shifting_stimulus(): void
    {
        $tenant = Tenant::factory()->create();
        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $subject = Subject::factory()->create();

        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'title' => 'Ujian Urutan Stimulus',
            'status' => 'published',
        ]);

        $section = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Bagian Utama',
            'order' => 1,
            'duration_minutes' => 60,
        ]);

        // Item 1: Standalone Question (Order = 1)
        $q1 = Question::create([
            'assessment_section_id' => $section->id,
            'type' => 'mcq_single',
            'prompt' => 'Pertanyaan Pembuka Mandiri',
            'order' => 1,
            'points' => 10,
        ]);

        // Item 2: QuestionGroup (Order = 2) with 2 questions
        $group = QuestionGroup::create([
            'assessment_section_id' => $section->id,
            'title' => 'Wacana Perjalanan',
            'stimulus_content' => 'Ini teks wacana tentang perjalanan sejarah.',
            'order' => 2,
        ]);

        $q2 = Question::create([
            'assessment_section_id' => $section->id,
            'question_group_id' => $group->id,
            'type' => 'mcq_single',
            'prompt' => 'Anak Soal Stimulus Pertama',
            'order' => 1,
            'points' => 10,
        ]);

        $q3 = Question::create([
            'assessment_section_id' => $section->id,
            'question_group_id' => $group->id,
            'type' => 'mcq_single',
            'prompt' => 'Anak Soal Stimulus Kedua',
            'order' => 2,
            'points' => 10,
        ]);

        // Item 3: Standalone Question (Order = 3)
        $q4 = Question::create([
            'assessment_section_id' => $section->id,
            'type' => 'mcq_single',
            'prompt' => 'Pertanyaan Penutup Mandiri',
            'order' => 3,
            'points' => 10,
        ]);

        $session = ExamSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'status' => 'completed',
            'score' => 40,
            'started_at' => now()->subMinutes(20),
            'completed_at' => now(),
        ]);

        $response = $this->actingAs($student)->get(route('exam.result', ['session' => $session->uuid]));
        $response->assertStatus(200);

        // Ambil data review questions dari payload JavaScript
        $reviewData = $response->viewData('allQuestionsReview');
        $this->assertCount(4, $reviewData);

        // Pastikan urutan nomor soal: Q1 (1), Q2 (2), Q3 (3), Q4 (4)
        $this->assertEquals($q1->id, $reviewData[0]['id']);
        $this->assertEquals(1, $reviewData[0]['number']);
        $this->assertNull($reviewData[0]['question_group_id']);

        $this->assertEquals($q2->id, $reviewData[1]['id']);
        $this->assertEquals(2, $reviewData[1]['number']);
        $this->assertEquals($group->id, $reviewData[1]['question_group_id']);

        $this->assertEquals($q3->id, $reviewData[2]['id']);
        $this->assertEquals(3, $reviewData[2]['number']);
        $this->assertEquals($group->id, $reviewData[2]['question_group_id']);

        $this->assertEquals($q4->id, $reviewData[3]['id']);
        $this->assertEquals(4, $reviewData[3]['number']);
        $this->assertNull($reviewData[3]['question_group_id']);
    }
}
