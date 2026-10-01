<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DichotomyPreset extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'label_a',
        'label_b',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
