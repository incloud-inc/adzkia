<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            SubjectSeeder::class,
            GradeAndPresetSeeder::class,
            BahasaIndonesiaGrade1Semester1Seeder::class,
        ]);
    }
}
