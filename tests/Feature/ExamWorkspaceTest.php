<?php

namespace Tests\Feature;

use App\Jobs\GradeExamSessionJob;
use App\Models\ExamSession;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class ExamWorkspaceTest extends TestCase
{
    use RefreshDatabase;

    public function test_fast_path_submit_dispatches_job_and_updates_status(): void
    {
        Queue::fake();

        $user = User::factory()->create();
        $session = ExamSession::factory()->create([
            'user_id' => $user->id,
            'status' => 'in_progress',
        ]);

        $response = $this->actingAs($user)->postJson(route('exam.session.submit', ['session' => $session->uuid]), [
            'reason' => 'student_submit',
        ]);

        $response->assertStatus(200)
            ->assertJson(['ok' => true]);

        $this->assertDatabaseHas('exam_sessions', [
            'id' => $session->id,
            'status' => 'completed',
            'grading_status' => 'pending',
        ]);

        Queue::assertPushed(GradeExamSessionJob::class, function ($job) use ($session) {
            return $job->examSessionId === $session->id;
        });
    }

    public function test_check_grading_status_returns_correct_json(): void
    {
        $user = User::factory()->create();
        $session = ExamSession::factory()->create([
            'user_id' => $user->id,
            'status' => 'completed',
            'grading_status' => 'pending',
            'score' => null,
        ]);

        $response = $this->actingAs($user)->getJson(route('exam.session.grading_status', ['session' => $session->uuid]));

        $response->assertStatus(200)
            ->assertJson([
                'status' => 'completed',
                'is_ready' => true,
            ]);
    }

    public function test_completed_session_cannot_be_locked_by_event(): void
    {
        $user = User::factory()->create();
        $session = ExamSession::factory()->create([
            'user_id' => $user->id,
            'status' => 'completed',
            'completed_at' => now(),
            'grading_status' => 'pending',
        ]);

        $response = $this->actingAs($user)->postJson(route('exam.session.event', ['session' => $session->uuid]), [
            'event_type' => 'tab_hidden',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'ok' => true,
                'status' => 'completed',
                'is_locked' => false,
            ]);

        $this->assertEquals('completed', $session->fresh()->status);
        $this->assertNull($session->fresh()->lock_reason);
    }

    public function test_active_exam_query_scopes(): void
    {
        $user = User::factory()->create();
        $sessionActive = ExamSession::factory()->create([
            'user_id' => $user->id,
            'status' => 'in_progress',
            'completed_at' => null,
        ]);

        $sessionLocked = ExamSession::factory()->create([
            'user_id' => $user->id,
            'status' => 'interrupted_locked',
            'completed_at' => null,
        ]);

        $sessionDone = ExamSession::factory()->create([
            'user_id' => $user->id,
            'status' => 'completed',
            'completed_at' => now(),
        ]);

        $activeSessions = ExamSession::activeExamQuery()->pluck('id');

        $this->assertTrue($activeSessions->contains($sessionActive->id));
        $this->assertTrue($activeSessions->contains($sessionLocked->id));
        $this->assertFalse($activeSessions->contains($sessionDone->id));
    }
}
