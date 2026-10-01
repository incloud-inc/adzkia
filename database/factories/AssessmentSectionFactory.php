<?php

namespace Database\Factories;

use App\Models\Assessment;
use App\Models\AssessmentSection;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AssessmentSection>
 */
class AssessmentSectionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'assessment_id' => Assessment::factory(),
            'title' => 'Section '.$this->faker->words(2, true),
            'instructions' => $this->faker->sentence(),
            'order' => 1,
            'duration_minutes' => 45,
        ];
    }
}
