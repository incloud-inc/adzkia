<?php

namespace App\Services;

use App\Models\ExamAnswer;
use App\Models\Question;

class AnswerReviewFormatter
{
    /**
     * Format string jawaban siswa yang mudah dipahami manusia.
     */
    public function formatStudentAnswer(Question $question, ?ExamAnswer $answer): string
    {
        if (! $answer || ! $answer->isAnswered()) {
            return 'Tidak dijawab.';
        }

        $payload = (array) ($answer->answer_payload ?? []);

        if ($question->type === 'essay') {
            return (string) ($payload['text'] ?? '(Tidak ada teks jawaban)');
        }

        $options = $question->options->keyBy('id');

        switch ($question->type) {
            case 'mcq_single':
            case 'mcq_weighted':
                $optId = $payload['option_id'] ?? null;
                $opt = $options->get($optId);

                return $opt ? ($opt->label ? "{$opt->label}. " : '').$opt->option_text : '-';

            case 'mcq_multiple':
                $optIds = (array) ($payload['option_ids'] ?? []);
                $selected = [];
                foreach ($optIds as $id) {
                    $opt = $options->get($id);
                    if ($opt) {
                        $selected[] = ($opt->label ? "{$opt->label}. " : '').$opt->option_text;
                    }
                }

                return ! empty($selected) ? implode(', ', $selected) : '-';

            case 'short_answer':
            case 'fill_blank':
                return (string) ($payload['value'] ?? '-');

            case 'binary_matrix':
            case 'boolean_matrix':
                $answers = (array) ($payload['answers'] ?? []);
                $parts = [];
                foreach ($question->options->sortBy('order') as $opt) {
                    if (! array_key_exists($opt->id, $answers)) {
                        continue;
                    }
                    $val = $answers[$opt->id];
                    $isTrue = ($val === true || $val === 1 || in_array(strtolower(trim((string) $val)), ['benar', 'true', '1', 'yes', 'ya'], true));
                    $text = $opt->option_text ?: ($opt->label ?: "Pernyataan {$opt->order}");
                    $parts[] = "{$text}: ".($isTrue ? 'Benar' : 'Salah');
                }

                return ! empty($parts) ? implode(' | ', $parts) : '-';

            case 'matching':
                $pairs = (array) ($payload['pairs'] ?? []);
                $parts = [];
                foreach ($question->options->sortBy('order') as $opt) {
                    if (! array_key_exists($opt->id, $pairs)) {
                        continue;
                    }
                    $right = $pairs[$opt->id];
                    if ($right === null || $right === '') {
                        continue;
                    }
                    $left = $opt->option_text ?: ($opt->label ?: "Premis {$opt->order}");
                    $parts[] = "{$left} ➔ {$right}";
                }

                return ! empty($parts) ? implode(' | ', $parts) : '-';

            case 'ordering':
            case 'reorder':
                $orderIds = array_map('intval', (array) ($payload['order'] ?? []));
                $parts = [];
                foreach ($orderIds as $idx => $id) {
                    $opt = $options->get($id);
                    $text = $opt ? $opt->option_text : (string) $id;
                    $parts[] = ($idx + 1).". {$text}";
                }

                return ! empty($parts) ? implode(' → ', $parts) : '-';

            default:
                if (isset($payload['value'])) {
                    return (string) $payload['value'];
                }

                return 'Jawaban tersimpan.';
        }
    }

    /**
     * Format kunci jawaban resmi sistem.
     */
    public function formatCorrectAnswer(Question $question): string
    {
        $options = $question->options->sortBy('order');

        switch ($question->type) {
            case 'mcq_single':
            case 'mcq_weighted':
                $correct = $options->firstWhere('is_correct', true);

                return $correct ? ($correct->label ? "{$correct->label}. " : '').$correct->option_text : 'Sesuai kunci sistem.';

            case 'mcq_multiple':
                $corrects = $options->where('is_correct', true)->map(fn ($o) => ($o->label ? "{$o->label}. " : '').$o->option_text)->all();

                return ! empty($corrects) ? implode(', ', $corrects) : 'Sesuai kunci sistem.';

            case 'short_answer':
            case 'fill_blank':
                $valid = $options->pluck('option_text')
                    ->map(fn ($t) => trim((string) $t))
                    ->filter(fn ($t) => $t !== '')
                    ->unique()
                    ->all();

                return ! empty($valid) ? implode(', ', $valid) : 'Sesuai kunci sistem.';

            case 'binary_matrix':
            case 'boolean_matrix':
                $parts = [];
                foreach ($options as $opt) {
                    $expectedKey = strtolower(trim((string) ($opt->match_key ?? '')));
                    if (filled($expectedKey)) {
                        $isExpectedTrue = in_array($expectedKey, ['benar', 'true', '1', 'yes', 'ya'], true);
                    } else {
                        $isExpectedTrue = (bool) $opt->is_correct;
                    }
                    $text = $opt->option_text ?: ($opt->label ?: "Pernyataan {$opt->order}");
                    $parts[] = "{$text}: ".($isExpectedTrue ? 'Benar' : 'Salah');
                }

                return implode(' | ', $parts);

            case 'matching':
                $parts = [];
                foreach ($options as $opt) {
                    $left = $opt->option_text ?: ($opt->label ?: "Premis {$opt->order}");
                    $right = trim((string) ($opt->match_key ?? ''));
                    $parts[] = "{$left} ➔ {$right}";
                }

                return implode(' | ', $parts);

            case 'ordering':
            case 'reorder':
                $parts = [];
                foreach ($options as $idx => $opt) {
                    $parts[] = ($idx + 1).". {$opt->option_text}";
                }

                return implode(' → ', $parts);

            default:
                return 'Sesuai kunci sistem.';
        }
    }
}
