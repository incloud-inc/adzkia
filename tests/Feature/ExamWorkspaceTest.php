<?php

namespace Tests\Feature;

use App\Jobs\GradeExamSessionJob;
use App\Models\Assessment;
use App\Models\AssessmentSection;
use App\Models\ExamSession;
use App\Models\Question;
use App\Models\QuestionGroup;
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

    public function test_workspace_keeps_question_group_items_clustered_when_randomize_questions_is_enabled(): void
    {
        $user = User::factory()->create();
        $assessment = Assessment::factory()->create([
            'settings' => ['randomize_questions' => true, 'randomize_options' => true],
            'type' => 'pas',
        ]);
        $section = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Bagian 1',
            'order' => 1,
        ]);

        // Standalone Question 1
        Question::create([
            'assessment_section_id' => $section->id,
            'type' => 'mcq_single',
            'prompt' => 'Mandiri 1',
            'order' => 1,
            'points' => 10,
        ]);

        // Question Group with 3 questions
        $group = QuestionGroup::create([
            'assessment_section_id' => $section->id,
            'title' => 'Wacana Sains',
            'stimulus_content' => 'Teks Wacana Sains',
            'order' => 2,
        ]);
        Question::create([
            'assessment_section_id' => $section->id,
            'question_group_id' => $group->id,
            'type' => 'mcq_single',
            'prompt' => 'Anak Wacana 1',
            'order' => 1,
            'points' => 10,
        ]);
        Question::create([
            'assessment_section_id' => $section->id,
            'question_group_id' => $group->id,
            'type' => 'mcq_single',
            'prompt' => 'Anak Wacana 2',
            'order' => 2,
            'points' => 10,
        ]);
        Question::create([
            'assessment_section_id' => $section->id,
            'question_group_id' => $group->id,
            'type' => 'mcq_single',
            'prompt' => 'Anak Wacana 3',
            'order' => 3,
            'points' => 10,
        ]);

        // Standalone Question 2
        Question::create([
            'assessment_section_id' => $section->id,
            'type' => 'mcq_single',
            'prompt' => 'Mandiri 2',
            'order' => 3,
            'points' => 10,
        ]);

        $session = ExamSession::factory()->create([
            'assessment_id' => $assessment->id,
            'user_id' => $user->id,
            'status' => 'in_progress',
        ]);

        $response = $this->actingAs($user)->get(route('exam.workspace', ['session' => $session->uuid]));
        $response->assertStatus(200);

        $payload = $response->viewData('payload');
        $this->assertNotEmpty($payload['questions']);

        // Check that questions belonging to the group appear consecutively
        $groupIndices = [];
        foreach ($payload['questions'] as $idx => $q) {
            if (($q['question_group_id'] ?? null) === $group->id) {
                $groupIndices[] = $idx;
            }
        }

        $this->assertCount(3, $groupIndices);
        // They must be strictly consecutive: index n, n+1, n+2
        $this->assertEquals($groupIndices[0] + 1, $groupIndices[1]);
        $this->assertEquals($groupIndices[1] + 1, $groupIndices[2]);
    }
}
