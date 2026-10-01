<?php

namespace Database\Factories;

use App\Models\QuestionBank;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<QuestionBank>
 */
class QuestionBankFactory extends Factory
{
    public function definition(): array
    {
        return [
            'tenant_id' => Tenant::factory(),
            'subject_id' => Subject::factory(),
            'created_by' => User::factory(),
            'title' => 'Bank Soal '.$this->faker->words(3, true),
            'grade_level' => $this->faker->randomElement(['10', '11', '12']),
            'description' => $this->faker->sentence(),
        ];
    }
}
