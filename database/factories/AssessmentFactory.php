<?php

namespace Database\Factories;

use App\Models\Assessment;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Assessment>
 */
class AssessmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'tenant_id' => Tenant::factory(),
            'subject_id' => Subject::factory(),
            'created_by' => User::factory(),
            'title' => 'Ujian '.$this->faker->words(3, true),
            'type' => $this->faker->randomElement(['ph', 'pts', 'pas', 'utbk', 'toefl']),
            'grade_level' => $this->faker->randomElement(['10', '11', '12']),
            'description' => $this->faker->paragraph(),
            'duration_minutes' => 90,
            'scoring_type' => 'standard',
            'status' => 'published',
            'settings' => ['randomize_questions' => true, 'randomize_options' => true],
        ];
    }
}
