<?php

namespace Database\Factories;

use App\Models\AssessmentSection;
use App\Models\QuestionGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<QuestionGroup>
 */
class QuestionGroupFactory extends Factory
{
    public function definition(): array
    {
        return [
            'assessment_section_id' => AssessmentSection::factory(),
            'question_bank_id' => null,
            'title' => 'Wacana/Narasi '.$this->faker->words(3, true),
            'stimulus_type' => 'text',
            'stimulus_content' => $this->faker->paragraphs(3, true),
            'order' => 1,
        ];
    }
}
