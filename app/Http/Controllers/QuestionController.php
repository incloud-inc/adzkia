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
            'correct_option' => 'nullable',
        ]);

        DB::transaction(function () use ($question, $validated, $request) {
            $question->update([
                'prompt' => $validated['prompt'],
                'points' => $validated['points'] ?? $question->points,
                'explanation' => array_key_exists('explanation', $validated) ? $validated['explanation'] : $question->explanation,
            ]);

            // Handling based on question type
            if ($question->type === 'short_answer') {
                $ansText = trim((string) ($validated['short_answer'] ?? ''));
                if ($ansText !== '') {
                    $opt = $question->options()->first();
                    if ($opt) {
                        $opt->update([
                            'option_text' => $ansText,
                            'is_correct' => true,
                        ]);
                    } else {
                        $question->options()->create([
                            'option_text' => $ansText,
                            'is_correct' => true,
                            'order' => 1,
                        ]);
                    }
                }
            } elseif (in_array($question->type, ['mcq_single', 'mcq_multiple', 'mcq_weighted'], true)) {
                if (! empty($validated['options']) && is_array($validated['options'])) {
                    $correctChoice = $request->input('correct_option');
                    $receivedIds = [];

                    foreach ($validated['options'] as $idx => $optData) {
                        $label = $optData['label'] ?? chr(65 + $idx);
                        $optText = $optData['option_text'] ?? '';

                        $isCorrect = false;
                        if ($question->type === 'mcq_single') {
                            if ($correctChoice !== null) {
                                $isCorrect = ((string) $correctChoice === (string) $idx)
                                    || (strtoupper((string) $correctChoice) === strtoupper((string) $label))
                                    || (! empty($optData['id']) && (string) $correctChoice === (string) $optData['id']);
                            } else {
                                $isCorrect = ! empty($optData['is_correct']);
                            }
                        } else {
                            $isCorrect = ! empty($optData['is_correct']);
                        }

                        if (! empty($optData['id'])) {
                            $opt = QuestionOption::where('question_id', $question->id)->find($optData['id']);
                            if ($opt) {
                                $opt->update([
                                    'label' => $label,
                                    'option_text' => $optText,
                                    'is_correct' => (bool) $isCorrect,
                                    'order' => $idx + 1,
                                ]);
                                $receivedIds[] = $opt->id;

                                continue;
                            }
                        }

                        $newOpt = $question->options()->create([
                            'label' => $label,
                            'option_text' => $optText,
                            'is_correct' => (bool) $isCorrect,
                            'order' => $idx + 1,
                        ]);
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
