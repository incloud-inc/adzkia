<?php

namespace App\Jobs;

use App\Models\Question;
use App\Services\Ai\AiExplanationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use Throwable;

class GenerateQuestionExplanationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 2;

    public int $timeout = 120;

    /**
     * @var array<int, int>
     */
    public array $backoff = [15, 60];

    public function __construct(
        public readonly int $questionId
    ) {}

    public function handle(AiExplanationService $service): void
    {
        $question = Question::find($this->questionId);

        if (! $question) {
            return;
        }

        $result = $service->generateForQuestion($question);

        if ($result['ok'] || $result['status'] === 'skipped') {
            return;
        }

        // If attempts exceeded, don't rethrow to avoid endless failure loops
        if ($this->attempts() >= $this->tries) {
            return;
        }
    }

    public function failed(Throwable $e): void
    {
        Question::whereKey($this->questionId)->update([
            'explanation_status' => 'failed',
            'explanation_error' => Str::limit($e->getMessage(), 500),
        ]);
    }
}
