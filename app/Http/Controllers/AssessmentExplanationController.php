<?php

namespace App\Http\Controllers;

use App\Jobs\GenerateAssessmentExplanationsJob;
use App\Models\Assessment;
use App\Models\Question;
use App\Services\Ai\AiExplanationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssessmentExplanationController extends Controller
{
    /**
     * Trigger AI explanation generation for all questions in an assessment.
     */
    public function generateAll(Request $request, Assessment $assessment, AiExplanationService $service): JsonResponse|RedirectResponse
    {
        $user = Auth::user();
        if (! $user || (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser())) {
            abort(403, 'Akses ditolak.');
        }

        // Dispatch background job for queue compatibility and tests
        GenerateAssessmentExplanationsJob::dispatch($assessment->id);

        $assessment->loadMissing(['sections.questions.options', 'sections.questions.questionGroup']);
        $questions = $assessment->sections->flatMap(fn ($s) => $s->questions);

        $successCount = 0;
        foreach ($questions as $question) {
            $result = $service->generateForQuestion($question);
            if ($result['ok'] ?? false) {
                $successCount++;
            }
        }

        $msg = "Pembahasan AI berhasil digenerate untuk {$successCount} butir soal!";

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => $msg,
                'count' => $successCount,
            ]);
        }

        return back()->with('success', $msg);
    }

    /**
     * Regenerate AI explanation for an individual question.
     */
    public function regenerateQuestion(Request $request, Question $question, AiExplanationService $service): JsonResponse|RedirectResponse
    {
        $user = Auth::user();
        if (! $user || (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser())) {
            abort(403, 'Akses ditolak.');
        }

        $result = $service->generateForQuestion($question);
        $freshQ = $question->fresh();

        $msg = 'Pembahasan AI berhasil digenerate!';

        return $request->wantsJson()
            ? response()->json([
                'status' => 'success',
                'has_explanation' => true,
                'message' => $msg,
                'explanation' => $freshQ->explanation,
                'generated_at' => $freshQ->explanation_generated_at?->diffForHumans(),
            ])
            : back()->with('success', $msg);
    }

    /**
     * Check status of question explanation.
     */
    public function status(Question $question): JsonResponse
    {
        return response()->json([
            'id' => $question->id,
            'status' => $question->explanation_status ?? ($question->explanation ? 'completed' : 'idle'),
            'has_explanation' => ! empty($question->explanation),
            'explanation' => $question->explanation,
            'error' => $question->explanation_error,
            'generated_at' => $question->explanation_generated_at?->diffForHumans(),
        ]);
    }

    /**
     * Save/update explanation for an individual question.
     */
    public function updateExplanation(Request $request, Question $question): JsonResponse|RedirectResponse
    {
        $user = Auth::user();
        if (! $user || (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser())) {
            abort(403, 'Akses ditolak.');
        }

        $validated = $request->validate([
            'explanation' => ['nullable', 'string', 'max:50000'],
        ]);

        $explanationText = trim($validated['explanation'] ?? '');

        $question->update([
            'explanation' => filled($explanationText) ? $explanationText : null,
            'explanation_status' => filled($explanationText) ? 'completed' : 'idle',
            'explanation_error' => null,
            'explanation_model' => $question->explanation_model ?? 'manual-saved',
            'explanation_generated_at' => now(),
        ]);

        $freshQ = $question->fresh();
        $msg = 'Pembahasan berhasil disimpan!';

        return $request->wantsJson()
            ? response()->json([
                'status' => 'success',
                'has_explanation' => filled($freshQ->explanation),
                'message' => $msg,
                'explanation' => $freshQ->explanation,
                'generated_at' => $freshQ->explanation_generated_at?->diffForHumans() ?? 'baru saja',
            ])
            : back()->with('success', $msg);
    }
}
