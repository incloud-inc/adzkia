<?php

namespace Database\Seeders;

use App\Models\Assessment;
use App\Models\AssessmentSection;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Database\Seeders\Data\MatematikaGrade2ASASSemester1Data;
use Database\Seeders\Data\MatematikaGrade2ASATData;
use Database\Seeders\Data\MatematikaGrade2ASTSSemester1Data;
use Database\Seeders\Data\MatematikaGrade2ASTSSemester2Data;
use Database\Seeders\Data\MatematikaGrade2Bab1Data;
use Database\Seeders\Data\MatematikaGrade2Bab2Data;
use Database\Seeders\Data\MatematikaGrade2Bab3Data;
use Database\Seeders\Data\MatematikaGrade2Bab4Data;
use Database\Seeders\Data\MatematikaGrade2Bab5Data;
use Database\Seeders\Data\MatematikaGrade2Bab6Data;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatematikaKurikulumMerdekaKelas2Seeder extends Seeder
{
    /**
     * Run the database seeds for all 30 assessments of Matematika Kelas 2 SD.
     */
    public function run(): void
    {
        // 1. Ensure Subject "Matematika" exists
        $subject = Subject::firstOrCreate(
            ['name' => 'Matematika'],
            [
                'code' => 'MTK',
                'description' => 'Mata pelajaran Matematika Kurikulum Merdeka Fase A (Kelas 2 SD): bilangan cacah sampai 100, penjumlahan & pengurangan 100, pengukuran panjang (cm, m), perkalian & pembagian sederhana, pengukuran berat & waktu, serta bangun datar dan pola bilangan.',
            ]
        );

        // 2. Identify default Tenant & User creator
        $tenant = Tenant::first() ?? Tenant::create([
            'name' => 'PENDIDIKAN DASAR DAN MENENGAH',
            'subdomain' => 'dikdasmen',
            'plan' => 'gratis',
        ]);

        $user = User::first() ?? User::create([
            'name' => 'Administrator',
            'email' => 'admin@adzkia.id',
            'password' => bcrypt('Masuk123!'),
            'current_tenant_id' => $tenant->id,
        ]);

        // 3. Compile all 30 assessments for Grade 2
        $allAssessments = array_merge(
            MatematikaGrade2Bab1Data::getAssessments(),
            MatematikaGrade2Bab2Data::getAssessments(),
            MatematikaGrade2ASTSSemester1Data::getAssessments(),
            MatematikaGrade2Bab3Data::getAssessments(),
            MatematikaGrade2ASASSemester1Data::getAssessments(),
            MatematikaGrade2Bab4Data::getAssessments(),
            MatematikaGrade2Bab5Data::getAssessments(),
            MatematikaGrade2ASTSSemester2Data::getAssessments(),
            MatematikaGrade2Bab6Data::getAssessments(),
            MatematikaGrade2ASATData::getAssessments()
        );

        $titles = array_column($allAssessments, 'title');

        $this->command?->info('Menyiapkan database untuk '.count($allAssessments).' asesmen Matematika Kelas 2 SD Kurikulum Merdeka...');

        DB::beginTransaction();

        try {
            // Hapus asesmen lama dengan judul yang sama dan grade_level 2 SD agar idempotent
            $existing = Assessment::withoutGlobalScopes()
                ->where('subject_id', $subject->id)
                ->where('grade_level', '2 SD')
                ->whereIn('title', $titles)
                ->get();

            foreach ($existing as $oldAssessment) {
                foreach ($oldAssessment->sections as $sec) {
                    foreach ($sec->questions as $q) {
                        $q->options()->delete();
                        $q->delete();
                    }
                    $sec->delete();
                }
                $oldAssessment->delete();
            }

            $totalAssessments = 0;
            $totalSections = 0;
            $totalQuestions = 0;
            $totalOptions = 0;

            foreach ($allAssessments as $assData) {
                $token = Assessment::generateUniqueToken();

                $assessment = Assessment::create([
                    'tenant_id' => $tenant->id,
                    'subject_id' => $subject->id,
                    'created_by' => $user->id,
                    'title' => $assData['title'],
                    'type' => $assData['type'],
                    'grade_level' => '2 SD',
                    'description' => $assData['description'],
                    'duration_minutes' => $assData['duration_minutes'],
                    'scoring_type' => 'standard',
                    'status' => 'published',
                    'is_global' => true,
                    'is_mandatory' => true,
                    'price_type' => 'free',
                    'price' => 0.00,
                    'revenue_share_tenant_pct' => 0,
                    'revenue_share_platform_pct' => 100,
                    'settings' => [
                        'token' => $token,
                        'validity_type' => 'forever',
                        'randomize_questions' => true,
                        'randomize_options' => true,
                        'passing_grade' => [
                            'enabled' => true,
                            'min_score' => 70,
                            'pass_label' => 'Tuntas / Kompeten',
                            'fail_label' => 'Perlu Pendampingan',
                        ],
                        'scoring_template' => 'standard',
                        'formula_type' => 'raw_sum',
                        'post_exam_policy' => [
                            'teacher_review_required' => false,
                            'show_breakdown' => true,
                            'show_ranking' => true,
                            'show_instant_score' => true,
                            'release_mode' => 'immediate',
                        ],
                    ],
                ]);

                $totalAssessments++;

                foreach ($assData['sections'] as $secData) {
                    $section = AssessmentSection::create([
                        'assessment_id' => $assessment->id,
                        'title' => $secData['title'],
                        'instructions' => $secData['instructions'] ?? null,
                        'order' => $secData['order'],
                    ]);

                    $totalSections++;

                    foreach ($secData['questions'] as $qData) {
                        $question = Question::create([
                            'assessment_section_id' => $section->id,
                            'type' => $qData['type'],
                            'prompt' => $qData['prompt'],
                            'explanation' => $qData['explanation'] ?? null,
                            'points' => $qData['points'] ?? 1.0,
                            'order' => $qData['order'],
                        ]);

                        $totalQuestions++;

                        if (! empty($qData['options'])) {
                            $optsToInsert = $qData['options'];
                            if (in_array($qData['type'], ['mcq_single', 'mcq_multiple', 'mcq_weighted'], true) && count($optsToInsert) > 1) {
                                shuffle($optsToInsert);
                            }
                            $labels = ['A', 'B', 'C', 'D', 'E', 'F'];
                            foreach ($optsToInsert as $oIdx => $optData) {
                                QuestionOption::create([
                                    'question_id' => $question->id,
                                    'label' => $labels[$oIdx] ?? ($optData['label'] ?? null),
                                    'option_text' => $optData['option_text'],
                                    'is_correct' => (bool) $optData['is_correct'],
                                    'order' => $oIdx + 1,
                                ]);
                                $totalOptions++;
                            }
                        }
                    }
                }
            }

            DB::commit();

            $this->command?->info('Sukses men-seed Matematika Kelas 2 SD Kurikulum Merdeka!');
            $this->command?->info("Ringkasan: {$totalAssessments} Asesmen, {$totalSections} Section, {$totalQuestions} Butir Soal, {$totalOptions} Opsi Jawaban.");

        } catch (\Throwable $e) {
            DB::rollBack();
            $this->command?->error('Gagal seeding Matematika Kelas 2 SD: '.$e->getMessage());
            throw $e;
        }
    }
}
