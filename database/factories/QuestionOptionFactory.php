<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\QuestionOption;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<QuestionOption>
 */
class QuestionOptionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'question_id' => Question::factory(),
            'label' => 'A',
            'option_text' => $this->faker->sentence(),
            'is_correct' => false,
            'score' => 0.00,
            'match_key' => null,
            'order' => 1,
        ];
    }
}
