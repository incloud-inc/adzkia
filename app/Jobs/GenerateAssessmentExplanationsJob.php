<?php

namespace App\Jobs;

use App\Models\Assessment;
use App\Services\Ai\AiExplanationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateAssessmentExplanationsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $timeout = 300;

    public function __construct(
        public readonly int $assessmentId
    ) {}

    public function handle(AiExplanationService $service): void
    {
        $assessment = Assessment::with(['sections.questions'])->find($this->assessmentId);

        if (! $assessment) {
            return;
        }

        if (! $service->isConfigured()) {
            return;
        }

        $queue = config('services.deepseek.queue', 'default');
        $questions = $assessment->sections->flatMap(fn ($s) => $s->questions);

        foreach ($questions as $question) {
            // Only generate if explanation is not yet completed
            if (blank($question->explanation) || $question->explanation_status !== 'completed') {
                $question->update([
                    'explanation_status' => 'pending',
                    'explanation_error' => null,
                ]);

                GenerateQuestionExplanationJob::dispatch($question->id)->onQueue($queue);
            }
        }
    }
}
