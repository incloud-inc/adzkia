<?php

namespace Database\Factories;

use App\Models\ExamSession;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ExamSession>
 */
class ExamSessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => (string) \Illuminate\Support\Str::uuid(),
            'assessment_id' => \App\Models\Assessment::factory(),
            'user_id' => \App\Models\User::factory(),
            'status' => 'in_progress',
            'question_count' => 10,
            'started_at' => now(),
            'expires_at' => now()->addMinutes(60),
            'last_activity_at' => now(),
            'ip_address' => $this->faker->ipv4,
        ];
    }
}
