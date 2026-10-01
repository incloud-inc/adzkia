<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AssessmentSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'assessment_id',
        'title',
        'instructions',
        'order',
        'duration_minutes',
    ];

    protected function casts(): array
    {
        return [
            'order' => 'integer',
            'duration_minutes' => 'integer',
        ];
    }

    public function assessment(): BelongsTo
    {
        return $this->belongsTo(Assessment::class);
    }

    public function questionGroups(): HasMany
    {
        return $this->hasMany(QuestionGroup::class)->orderBy('order');
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class)->orderBy('order');
    }
}
