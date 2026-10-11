<?php

namespace Database\Seeders;

use App\Models\Assessment;
use App\Models\AssessmentSection;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Database\Seeders\Data\BahasaInggrisGrade3ASASSemester1Data;
use Database\Seeders\Data\BahasaInggrisGrade3ASATData;
use Database\Seeders\Data\BahasaInggrisGrade3ASTSSemester1Data;
use Database\Seeders\Data\BahasaInggrisGrade3ASTSSemester2Data;
use Database\Seeders\Data\BahasaInggrisGrade3Bab1Data;
use Database\Seeders\Data\BahasaInggrisGrade3Bab2Data;
use Database\Seeders\Data\BahasaInggrisGrade3Bab3Data;
use Database\Seeders\Data\BahasaInggrisGrade3Bab4Data;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BahasaInggrisKurikulumMerdekaKelas3Seeder extends Seeder
{
    /**
     * Run the database seeds for all 24 assessments of Bahasa Inggris Kelas 3 SD.
     */
    public function run(): void
    {
        // 1. Ensure Subject "Bahasa Inggris" exists
        $subject = Subject::firstOrCreate(
            ['name' => 'Bahasa Inggris'],
            [
                'code' => 'BING',
                'description' => 'Mata pelajaran Bahasa Inggris Kurikulum Merdeka Fase B (Kelas 3 SD): sports vocabulary & can/cannot, rooms at home & prepositions of place, telling time & daily schedules, serta weather and seasons.',
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

        // 3. Compile all 24 assessments for Grade 3
        $allAssessments = array_merge(
            BahasaInggrisGrade3Bab1Data::getAssessments(),
            BahasaInggrisGrade3ASTSSemester1Data::getAssessments(),
            BahasaInggrisGrade3Bab2Data::getAssessments(),
            BahasaInggrisGrade3ASASSemester1Data::getAssessments(),
            BahasaInggrisGrade3Bab3Data::getAssessments(),
            BahasaInggrisGrade3ASTSSemester2Data::getAssessments(),
            BahasaInggrisGrade3Bab4Data::getAssessments(),
            BahasaInggrisGrade3ASATData::getAssessments()
        );

        $titles = array_column($allAssessments, 'title');

        $this->command?->info('Menyiapkan database untuk '.count($allAssessments).' asesmen Bahasa Inggris Kelas 3 SD Kurikulum Merdeka...');

        DB::beginTransaction();

        try {
            // Hapus asesmen lama dengan judul yang sama dan grade_level 3 SD agar idempotent
            $existing = Assessment::withoutGlobalScopes()
                ->where('subject_id', $subject->id)
                ->where('grade_level', '3 SD')
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
                    'grade_level' => '3 SD',
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
                        'instructions' => $secData['instructions'],
                        'order' => $secData['order'],
                    ]);

                    $totalSections++;

                    foreach ($secData['questions'] as $qData) {
                        $question = Question::create([
                            'assessment_section_id' => $section->id,
                            'type' => $qData['type'],
                            'order' => $qData['order'],
                            'points' => $qData['points'],
                            'prompt' => $qData['prompt'],
                            'explanation' => $qData['explanation'] ?? null,
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
                                    'is_correct' => $optData['is_correct'],
                                    'order' => $oIdx + 1,
                                ]);

                                $totalOptions++;
                            }
                        }
                    }
                }
            }

            DB::commit();

            $this->command?->info('Sukses melakukan seeding Bahasa Inggris Kelas 3 SD:');
            $this->command?->info("- Asesmen: {$totalAssessments} paket");
            $this->command?->info("- Bagian: {$totalSections} section");
            $this->command?->info("- Soal: {$totalQuestions} butir");
            $this->command?->info("- Opsi Jawaban: {$totalOptions} opsi");

        } catch (\Throwable $e) {
            DB::rollBack();
            $this->command?->error('Gagal melakukan seeding Bahasa Inggris Kelas 3 SD: '.$e->getMessage());
            throw $e;
        }
    }
}
