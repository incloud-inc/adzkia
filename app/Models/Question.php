<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'assessment_section_id',
        'question_group_id',
        'question_bank_id',
        'type',
        'prompt',
        'explanation',
        'explanation_status',
        'explanation_error',
        'explanation_model',
        'explanation_generated_at',
        'points',
        'settings',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'settings' => 'array',
            'points' => 'decimal:2',
            'order' => 'integer',
            'explanation_generated_at' => 'datetime',
        ];
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(AssessmentSection::class, 'assessment_section_id');
    }

    public function assessmentSection(): BelongsTo
    {
        return $this->belongsTo(AssessmentSection::class);
    }

    public function questionGroup(): BelongsTo
    {
        return $this->belongsTo(QuestionGroup::class);
    }

    public function questionBank(): BelongsTo
    {
        return $this->belongsTo(QuestionBank::class);
    }

    public function options(): HasMany
    {
        return $this->hasMany(QuestionOption::class)->orderBy('order');
    }
}
