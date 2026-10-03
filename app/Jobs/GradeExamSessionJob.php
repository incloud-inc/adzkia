<?php

namespace App\Jobs;

use App\Models\ExamSession;
use App\Services\ExamGradingService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class GradeExamSessionJob implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $timeout = 60;
    public int $uniqueFor = 3600;

    public function __construct(public int $examSessionId) {}

    public function uniqueId(): string
    {
        return (string) $this->examSessionId;
    }

    public function handle(): void
    {
        $session = ExamSession::query()->find($this->examSessionId);
        
        if (! $session || $session->grading_status === 'completed') {
            return;
        }

        // Tandai status 'processing'
        $session->update([
            'grading_status' => 'processing',
            'grading_started_at' => now(),
        ]);

        try {
            // Jalankan grading dengan Master Cache + Bulk Upsert
            ExamGradingService::autoGradeSessionOptimized($session);

            // Update status dan invalidasi cache status polling
            Cache::put("exam_session:grading_status:{$session->id}", [
                'status' => 'completed',
                'is_ready' => true,
                'score' => $session->fresh()->score,
            ], 600);

            Log::channel('exam')->info("Grading completed for session ID: {$session->id}");
        } catch (\Throwable $e) {
            $session->update([
                'grading_status' => 'failed',
                'grading_error' => substr($e->getMessage(), 0, 1000),
            ]);

            Log::channel('exam')->error("Grading failed for session ID: {$session->id}", [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            throw $e; // Memungkinkan queue retry secara otomatis
        }
    }
}
