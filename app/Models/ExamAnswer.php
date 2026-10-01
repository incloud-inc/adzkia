<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamAnswer extends Model
{
    protected $fillable = [
        'exam_session_id',
        'question_id',
        'answer_payload',
        'is_flagged',
        'is_correct',
        'points_awarded',
        'time_spent_seconds',
        'answered_at',
    ];

    protected function casts(): array
    {
        return [
            'answer_payload' => 'array',
            'is_flagged' => 'boolean',
            'is_correct' => 'boolean',
            'points_awarded' => 'decimal:2',
            'answered_at' => 'datetime',
        ];
    }

    public function session(): BelongsTo
    {
        return $this->belongsTo(ExamSession::class, 'exam_session_id');
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Check if the student has actually answered this question (not just flagged/empty).
     */
    public function isAnswered(): bool
    {
        $payload = $this->answer_payload;
        if (empty($payload)) {
            return false;
        }

        // Essay
        if (isset($payload['text'])) {
            return trim((string) $payload['text']) !== '';
        }

        // short_answer / fill_blank
        if (isset($payload['value'])) {
            return trim((string) $payload['value']) !== '';
        }

        // mcq_single / mcq_weighted
        if (isset($payload['option_id'])) {
            return $payload['option_id'] !== null && $payload['option_id'] !== '';
        }

        // mcq_multiple
        if (isset($payload['option_ids'])) {
            return ! empty($payload['option_ids']);
        }

        // boolean_matrix / binary_matrix
        if (isset($payload['answers'])) {
            return ! empty($payload['answers']);
        }

        // matching
        if (isset($payload['pairs'])) {
            return ! empty($payload['pairs']);
        }

        // ordering / reorder
        if (isset($payload['order'])) {
            return ! empty($payload['order']);
        }

        return false;
    }
}
