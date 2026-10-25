<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionOption;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Update the specified question from the assessment detail view.
     */
    public function update(Request $request, Question $question): JsonResponse|RedirectResponse
    {
        $user = Auth::user();
        if (! $user || (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser())) {
            abort(403, 'Akses ditolak: Anda tidak memiliki wewenang untuk mengedit butir soal.');
        }

        $validated = $request->validate([
            'prompt' => 'required|string',
            'points' => 'nullable|numeric|min:0',
            'explanation' => 'nullable|string',
            'type' => 'nullable|string',
            'short_answer' => 'nullable|string',
            'options' => 'nullable|array',
            'options.*.id' => 'nullable|integer',
            'options.*.label' => 'nullable|string|max:10',
            'options.*.option_text' => 'nullable|string',
            'options.*.is_correct' => 'nullable',
            'options.*.score' => 'nullable|numeric|min:0',
            'correct_option' => 'nullable',
        ]);

        DB::transaction(function () use ($question, $validated, $request) {
            $updateData = [
                'prompt' => $validated['prompt'],
                'points' => $validated['points'] ?? $question->points,
                'explanation' => array_key_exists('explanation', $validated) ? $validated['explanation'] : $question->explanation,
            ];

            if (! empty($validated['type'])) {
                $updateData['type'] = $validated['type'];
                $question->type = $validated['type'];
            }

            $question->update($updateData);

            // Handling based on question type
            if ($question->type === 'short_answer') {
                $ansText = trim((string) ($validated['short_answer'] ?? ''));
                if ($ansText !== '') {
                    $opt = $question->options()->first();
                    if ($opt) {
                        $opt->update([
                            'label' => 'A',
                            'option_text' => $ansText,
                            'is_correct' => true,
                            'score' => $question->points ?? 1.0,
                        ]);
                        $question->options()->where('id', '!=', $opt->id)->delete();
                    } else {
                        $question->options()->create([
                            'label' => 'A',
                            'option_text' => $ansText,
                            'is_correct' => true,
                            'score' => $question->points ?? 1.0,
                            'order' => 1,
                        ]);
                    }
                }
            } elseif ($question->type === 'essay') {
                $question->options()->delete();
            } elseif (in_array($question->type, ['mcq_single', 'mcq_multiple', 'mcq_weighted'], true)) {
                if (! empty($validated['options']) && is_array($validated['options'])) {
                    $correctChoice = $request->input('correct_option');
                    $receivedIds = [];

                    foreach ($validated['options'] as $idx => $optData) {
                        $label = $optData['label'] ?? chr(65 + $idx);
                        $optText = $optData['option_text'] ?? '';
                        $score = isset($optData['score']) ? (float) $optData['score'] : 0.0;

                        $isCorrect = false;
                        if ($question->type === 'mcq_single') {
                            if ($correctChoice !== null) {
                                $isCorrect = ((string) $correctChoice === (string) $idx)
                                    || (strtoupper((string) $correctChoice) === strtoupper((string) $label))
                                    || (! empty($optData['id']) && (string) $correctChoice === (string) $optData['id']);
                            } else {
                                $isCorrect = ! empty($optData['is_correct']);
                            }
                            $score = $isCorrect ? (float) ($question->points ?? 1.0) : 0.0;
                        } elseif ($question->type === 'mcq_weighted') {
                            $isCorrect = $score > 0.0;
                        } else {
                            $isCorrect = ! empty($optData['is_correct']);
                            $score = $isCorrect ? (float) ($question->points ?? 1.0) : 0.0;
                        }

                        $optPayload = [
                            'label' => $label,
                            'option_text' => $optText,
                            'is_correct' => (bool) $isCorrect,
                            'score' => $score,
                            'order' => $idx + 1,
                        ];

                        if (! empty($optData['id'])) {
                            $opt = QuestionOption::where('question_id', $question->id)->find($optData['id']);
                            if ($opt) {
                                $opt->update($optPayload);
                                $receivedIds[] = $opt->id;

                                continue;
                            }
                        }

                        $newOpt = $question->options()->create($optPayload);
                        $receivedIds[] = $newOpt->id;
                    }

                    if (! empty($receivedIds)) {
                        $question->options()->whereNotIn('id', $receivedIds)->delete();
                    }
                }
            }
        });

        $question->load('options');

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Butir soal berhasil diperbarui!',
                'question' => $question,
            ]);
        }

        return redirect()->back()->with('success', 'Butir soal berhasil diperbarui.');
    }
}
