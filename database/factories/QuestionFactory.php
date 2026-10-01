<?php

namespace Database\Factories;

use App\Models\AssessmentSection;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Question>
 */
class QuestionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'assessment_section_id' => AssessmentSection::factory(),
            'question_group_id' => null,
            'question_bank_id' => null,
            'type' => 'mcq_single',
            'prompt' => $this->faker->paragraph().'?',
            'explanation' => $this->faker->sentence(),
            'points' => 1.00,
            'settings' => null,
            'order' => 1,
        ];
    }
}
