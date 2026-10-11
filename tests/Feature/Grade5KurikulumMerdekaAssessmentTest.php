<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\Question;
use App\Models\QuestionGroup;
use App\Models\Subject;
use Database\Seeders\BahasaIndonesiaKurikulumMerdekaKelas5Seeder;
use Database\Seeders\BahasaInggrisKurikulumMerdekaKelas5Seeder;
use Database\Seeders\MatematikaKurikulumMerdekaKelas5Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class Grade5KurikulumMerdekaAssessmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_seeds_and_validates_all_grade_5_matematika_assessments(): void
    {
        $this->seed(MatematikaKurikulumMerdekaKelas5Seeder::class);

        $subject = Subject::where('name', 'Matematika')->first();
        $this->assertNotNull($subject);

        $assessments = Assessment::withoutGlobalScopes()
            ->where('subject_id', $subject->id)
            ->where('grade_level', '5 SD')
            ->get();

        // 30 assessments total: 18 Quiz (6 Bab x 3) + 12 Sumatif (ASTS 1, ASAS 1, ASTS 2, ASAT x 3)
        $this->assertCount(30, $assessments);

        $assessmentIds = $assessments->pluck('id');
        $totalQuestions = Question::whereHas('assessmentSection', function ($q) use ($assessmentIds) {
            $q->whereIn('assessment_id', $assessmentIds);
        })->count();

        // 18 Quiz * 30 questions = 540
        // 12 Sumatif * 50 questions = 600
        // Total = 1.140 butir soal
        $this->assertEquals(1140, $totalQuestions);

        foreach ($assessments as $asm) {
            $this->assertEquals(75, data_get($asm->settings, 'passing_grade.min_score'));
            $this->assertEquals('weighted_percentage', data_get($asm->settings, 'formula_type'));
            $this->assertCount(3, $asm->sections);

            // Section weights verification (40:30:30)
            $weights = data_get($asm->settings, 'section_weights', []);
            $this->assertCount(3, $weights);
            $this->assertEquals(100, array_sum($weights));

            $qCount = $asm->sections->sum(fn ($s) => $s->questions()->count());
            if ($asm->type === 'quiz') {
                $this->assertEquals(60, $asm->duration_minutes);
                $this->assertEquals(30, $qCount);
            } else {
                $this->assertEquals(90, $asm->duration_minutes);
                $this->assertEquals(50, $qCount);
            }
        }
    }

    public function test_it_seeds_and_validates_all_grade_5_bahasa_indonesia_assessments(): void
    {
        $this->seed(BahasaIndonesiaKurikulumMerdekaKelas5Seeder::class);

        $subject = Subject::where('name', 'Bahasa Indonesia')->first();
        $this->assertNotNull($subject);

        $assessments = Assessment::withoutGlobalScopes()
            ->where('subject_id', $subject->id)
            ->where('grade_level', '5 SD')
            ->get();

        // 36 assessments total: 24 Quiz (8 Bab x 3) + 12 Sumatif (ASTS 1, ASAS 1, ASTS 2, ASAT x 3)
        $this->assertCount(36, $assessments);

        $assessmentIds = $assessments->pluck('id');
        $totalQuestions = Question::whereHas('assessmentSection', function ($q) use ($assessmentIds) {
            $q->whereIn('assessment_id', $assessmentIds);
        })->count();

        // 24 Quiz * 30 questions = 720
        // 12 Sumatif * 50 questions = 600
        // Total = 1.320 butir soal
        $this->assertEquals(1320, $totalQuestions);

        foreach ($assessments as $asm) {
            $this->assertEquals(75, data_get($asm->settings, 'passing_grade.min_score'));
            $this->assertEquals('weighted_percentage', data_get($asm->settings, 'formula_type'));
            $this->assertCount(3, $asm->sections);

            // Section weights verification (40:30:30)
            $weights = data_get($asm->settings, 'section_weights', []);
            $this->assertCount(3, $weights);
            $this->assertEquals(100, array_sum($weights));

            $qCount = $asm->sections->sum(fn ($s) => $s->questions()->count());
            if ($asm->type === 'quiz') {
                $this->assertEquals(45, $asm->duration_minutes);
                $this->assertEquals(30, $qCount);
            } else {
                $this->assertEquals(75, $asm->duration_minutes);
                $this->assertEquals(50, $qCount);
            }
        }
    }

    public function test_it_seeds_and_validates_all_grade_5_bahasa_inggris_assessments(): void
    {
        $this->seed(BahasaInggrisKurikulumMerdekaKelas5Seeder::class);

        $subject = Subject::where('name', 'Bahasa Inggris')->first();
        $this->assertNotNull($subject);

        $assessments = Assessment::withoutGlobalScopes()
            ->where('subject_id', $subject->id)
            ->where('grade_level', '5 SD')
            ->get();

        // 24 assessments total: 12 Quiz (4 Unit x 3) + 12 Sumatif (ASTS 1, ASAS 1, ASTS 2, ASAT x 3)
        $this->assertCount(24, $assessments);

        $assessmentIds = $assessments->pluck('id');
        $totalQuestions = Question::whereHas('assessmentSection', function ($q) use ($assessmentIds) {
            $q->whereIn('assessment_id', $assessmentIds);
        })->count();

        // 12 Quiz * 30 questions = 360
        // 12 Sumatif * 50 questions = 600
        // Total = 960 butir soal
        $this->assertEquals(960, $totalQuestions);

        foreach ($assessments as $asm) {
            $this->assertEquals(75, data_get($asm->settings, 'passing_grade.min_score'));
            $this->assertEquals('weighted_percentage', data_get($asm->settings, 'formula_type'));
            $this->assertCount(3, $asm->sections);

            // Section weights verification (40:30:30)
            $weights = data_get($asm->settings, 'section_weights', []);
            $this->assertCount(3, $weights);
            $this->assertEquals(100, array_sum($weights));

            $qCount = $asm->sections->sum(fn ($s) => $s->questions()->count());
            if ($asm->type === 'quiz') {
                $this->assertEquals(45, $asm->duration_minutes);
                $this->assertEquals(30, $qCount);
            } else {
                $this->assertEquals(75, $asm->duration_minutes);
                $this->assertEquals(50, $qCount);
            }
        }
    }

    public function test_it_validates_mcq_and_stimulus_structure_for_grade_5(): void
    {
        $this->seed(MatematikaKurikulumMerdekaKelas5Seeder::class);

        // Check MCQ questions have 4 choices (A, B, C, D) and exactly 1 correct answer
        $mcqQuestions = Question::where('type', 'mcq_single')->with('options')->take(50)->get();

        foreach ($mcqQuestions as $q) {
            $this->assertCount(4, $q->options, "MCQ {$q->id} must have 4 options");
            $this->assertEquals(['A', 'B', 'C', 'D'], $q->options->pluck('label')->all());
            $this->assertEquals(1, $q->options->where('is_correct', true)->count());
        }

        // Check QuestionGroup associations exist
        $groupsCount = QuestionGroup::count();
        $this->assertGreaterThan(0, $groupsCount);

        $groupedQuestions = Question::whereNotNull('question_group_id')->count();
        $this->assertGreaterThan(0, $groupedQuestions);
    }
}
