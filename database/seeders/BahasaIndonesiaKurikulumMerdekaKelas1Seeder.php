<?php

namespace Database\Seeders;

use App\Models\Assessment;
use App\Models\AssessmentSection;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Database\Seeders\Data\BahasaIndonesiaASASSemester1Data;
use Database\Seeders\Data\BahasaIndonesiaASATData;
use Database\Seeders\Data\BahasaIndonesiaASTSSemester1Data;
use Database\Seeders\Data\BahasaIndonesiaASTSSemester2Data;
use Database\Seeders\Data\BahasaIndonesiaBab1Data;
use Database\Seeders\Data\BahasaIndonesiaBab2Data;
use Database\Seeders\Data\BahasaIndonesiaBab3Data;
use Database\Seeders\Data\BahasaIndonesiaBab4Data;
use Database\Seeders\Data\BahasaIndonesiaBab5Data;
use Database\Seeders\Data\BahasaIndonesiaBab6Data;
use Database\Seeders\Data\BahasaIndonesiaBab7Data;
use Database\Seeders\Data\BahasaIndonesiaBab8Data;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BahasaIndonesiaKurikulumMerdekaKelas1Seeder extends Seeder
{
    /**
     * Run the database seeds for all 36 assessments of Bahasa Indonesia Kelas 1 SD.
     */
    public function run(): void
    {
        // 1. Ensure Subject "Bahasa Indonesia" exists
        $subject = Subject::firstOrCreate(
            ['name' => 'Bahasa Indonesia'],
            [
                'code' => 'BIND',
                'description' => 'Mata pelajaran wajib tata bahasa, literasi, membaca suku kata, dan teks sastra Kurikulum Merdeka.',
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

        // 3. Compile all 36 assessments for Grade 1
        $allAssessments = array_merge(
            BahasaIndonesiaBab1Data::getAssessments(),
            BahasaIndonesiaBab2Data::getAssessments(),
            BahasaIndonesiaASTSSemester1Data::getAssessments(),
            BahasaIndonesiaBab3Data::getAssessments(),
            BahasaIndonesiaBab4Data::getAssessments(),
            BahasaIndonesiaASASSemester1Data::getAssessments(),
            BahasaIndonesiaBab5Data::getAssessments(),
            BahasaIndonesiaBab6Data::getAssessments(),
            BahasaIndonesiaASTSSemester2Data::getAssessments(),
            BahasaIndonesiaBab7Data::getAssessments(),
            BahasaIndonesiaBab8Data::getAssessments(),
            BahasaIndonesiaASATData::getAssessments()
        );

        $titles = array_column($allAssessments, 'title');

        $this->command?->info('Menyiapkan database untuk '.count($allAssessments).' asesmen Bahasa Indonesia Kelas 1 SD Kurikulum Merdeka...');

        DB::beginTransaction();

        try {
            // Hapus asesmen lama dengan judul yang sama agar idempotent (tidak duplikat)
            $existing = Assessment::withoutGlobalScopes()
                ->where('subject_id', $subject->id)
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
                    'grade_level' => '1 SD',
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
                            'question_group_id' => null,
                            'type' => $qData['type'],
                            'prompt' => $qData['prompt'],
                            'explanation' => $qData['explanation'] ?? null,
                            'points' => $qData['points'] ?? 1.00,
                            'order' => $qData['order'],
                        ]);

                        $totalQuestions++;

                        if (! empty($qData['options']) && is_array($qData['options'])) {
                            $optsToInsert = $qData['options'];
                            if (in_array($qData['type'], ['mcq_single', 'mcq_multiple', 'mcq_weighted'], true) && count($optsToInsert) > 1) {
                                shuffle($optsToInsert);
                            }
                            $labels = ['A', 'B', 'C', 'D', 'E', 'F'];
                            foreach ($optsToInsert as $oIdx => $opt) {
                                QuestionOption::create([
                                    'question_id' => $question->id,
                                    'label' => $labels[$oIdx] ?? ($opt['label'] ?? null),
                                    'option_text' => $opt['option_text'] ?? '',
                                    'is_correct' => (bool) ($opt['is_correct'] ?? false),
                                    'order' => $oIdx + 1,
                                ]);
                                $totalOptions++;
                            }
                        }
                    }
                }
            }

            DB::commit();

            $this->command?->info("✓ Sukses mengimpor {$totalAssessments} asesmen lengkap (36 paket), {$totalSections} bagian, {$totalQuestions} butir soal, dan {$totalOptions} opsi jawaban!");
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->command?->error('Gagal melakukan seed: '.$e->getMessage());
            throw $e;
        }
    }
}
