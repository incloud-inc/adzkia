<?php

namespace Database\Seeders;

use App\Models\Assessment;
use App\Models\AssessmentSection;
use App\Models\Question;
use App\Models\QuestionGroup;
use App\Models\QuestionOption;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Database\Seeders\Data\MatematikaGrade5ASASSemester1Data;
use Database\Seeders\Data\MatematikaGrade5ASATData;
use Database\Seeders\Data\MatematikaGrade5ASTSSemester1Data;
use Database\Seeders\Data\MatematikaGrade5ASTSSemester2Data;
use Database\Seeders\Data\MatematikaGrade5Bab1Data;
use Database\Seeders\Data\MatematikaGrade5Bab2Data;
use Database\Seeders\Data\MatematikaGrade5Bab3Data;
use Database\Seeders\Data\MatematikaGrade5Bab4Data;
use Database\Seeders\Data\MatematikaGrade5Bab5Data;
use Database\Seeders\Data\MatematikaGrade5Bab6Data;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatematikaKurikulumMerdekaKelas5Seeder extends Seeder
{
    /**
     * Run the database seeds for all 30 assessments of Matematika Kelas 5 SD.
     */
    public function run(): void
    {
        // 1. Ensure Subject "Matematika" exists
        $subject = Subject::firstOrCreate(
            ['name' => 'Matematika'],
            [
                'code' => 'MTK',
                'description' => 'Mata pelajaran Matematika Kurikulum Merdeka Fase C (Kelas 5 SD): Bilangan Cacah s.d 100.000 & Desimal, KPK dan FPB, Operasi Hitung Pecahan & Desimal, Keliling & Luas Bangun Datar, Bangun Ruang Kubus & Balok, serta Penyajian & Pengolahan Data.',
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

        // 3. Compile all 30 assessments for Grade 5
        $allAssessments = array_merge(
            MatematikaGrade5Bab1Data::getAssessments(),
            MatematikaGrade5Bab2Data::getAssessments(),
            MatematikaGrade5ASTSSemester1Data::getAssessments(),
            MatematikaGrade5Bab3Data::getAssessments(),
            MatematikaGrade5ASASSemester1Data::getAssessments(),
            MatematikaGrade5Bab4Data::getAssessments(),
            MatematikaGrade5Bab5Data::getAssessments(),
            MatematikaGrade5ASTSSemester2Data::getAssessments(),
            MatematikaGrade5Bab6Data::getAssessments(),
            MatematikaGrade5ASATData::getAssessments()
        );

        $titles = array_column($allAssessments, 'title');

        $this->command?->info('Menyiapkan database untuk '.count($allAssessments).' asesmen Matematika Kelas 5 SD Kurikulum Merdeka...');

        DB::beginTransaction();

        try {
            // Hapus asesmen lama dengan judul yang sama dan grade_level 5 SD agar idempotent
            $existing = Assessment::withoutGlobalScopes()
                ->where('subject_id', $subject->id)
                ->where('grade_level', '5 SD')
                ->whereIn('title', $titles)
                ->get();

            foreach ($existing as $oldAssessment) {
                foreach ($oldAssessment->sections as $sec) {
                    foreach ($sec->questions as $q) {
                        $q->options()->delete();
                        $q->delete();
                    }
                    $sec->questionGroups()->delete();
                    $sec->delete();
                }
                $oldAssessment->delete();
            }

            $totalAssessments = 0;
            $totalSections = 0;
            $totalGroups = 0;
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
                    'grade_level' => '5 SD',
                    'description' => $assData['description'],
                    'duration_minutes' => $assData['duration_minutes'],
                    'scoring_type' => 'formula',
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
                            'min_score' => 75,
                            'pass_label' => 'Kompeten / Sangat Baik',
                            'fail_label' => 'Perlu Remedial',
                        ],
                        'scoring_template' => 'formula',
                        'formula_type' => 'weighted_percentage',
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
                $createdSections = [];

                foreach ($assData['sections'] as $sIdx => $secData) {
                    $section = AssessmentSection::create([
                        'assessment_id' => $assessment->id,
                        'title' => $secData['title'],
                        'instructions' => $secData['instructions'],
                        'order' => $secData['order'],
                    ]);

                    $createdSections[] = $section;
                    $totalSections++;

                    $createdGroupIds = [];
                    if (! empty($secData['question_groups'])) {
                        foreach ($secData['question_groups'] as $idx => $gData) {
                            $group = QuestionGroup::create([
                                'assessment_section_id' => $section->id,
                                'title' => $gData['title'],
                                'stimulus_type' => $gData['stimulus_type'] ?? 'text',
                                'stimulus_content' => $gData['stimulus_content'],
                                'order' => $gData['order'] ?? ($idx + 1),
                            ]);
                            $createdGroupIds[$idx] = $group->id;
                            $totalGroups++;
                        }
                    }

                    foreach ($secData['questions'] as $qData) {
                        $groupId = null;
                        if (isset($qData['group_index']) && $qData['group_index'] !== null && isset($createdGroupIds[$qData['group_index']])) {
                            $groupId = $createdGroupIds[$qData['group_index']];
                        }

                        $question = Question::create([
                            'assessment_section_id' => $section->id,
                            'question_group_id' => $groupId,
                            'type' => $qData['type'],
                            'order' => $qData['order'],
                            'points' => $qData['points'],
                            'prompt' => $qData['prompt'],
                            'settings' => $qData['settings'] ?? null,
                            'explanation' => $qData['explanation'] ?? null,
                        ]);

                        $totalQuestions++;

                        if (! empty($qData['options'])) {
                            $optsToInsert = $qData['options'];
                            if (in_array($qData['type'], ['mcq_single', 'mcq_multiple', 'mcq_weighted'], true) && count($optsToInsert) > 1) {
                                shuffle($optsToInsert);
                            }
                            $labels = ['A', 'B', 'C', 'D', 'E', 'F'];
                            foreach ($optsToInsert as $optIdx => $optData) {
                                QuestionOption::create([
                                    'question_id' => $question->id,
                                    'label' => $labels[$optIdx] ?? ($optData['label'] ?? null),
                                    'option_text' => $optData['option_text'],
                                    'is_correct' => $optData['is_correct'] ?? false,
                                    'match_key' => $optData['match_key'] ?? null,
                                    'order' => $optIdx + 1,
                                ]);

                                $totalOptions++;
                            }
                        }
                    }
                }

                // Terapkan pembobotan per bagian (40% : 30% : 30%)
                if (count($createdSections) >= 3) {
                    $assSettings = (array) ($assessment->settings ?? []);
                    $assSettings['formula_type'] = 'weighted_percentage';
                    $assSettings['section_weights'] = [
                        $createdSections[0]->id => 40,
                        $createdSections[1]->id => 30,
                        $createdSections[2]->id => 30,
                    ];
                    $assessment->forceFill(['settings' => $assSettings])->save();
                }
            }

            DB::commit();

            $this->command?->info("Sukses menyimpan {$totalAssessments} asesmen, {$totalSections} seksi, {$totalGroups} stimulus question groups, {$totalQuestions} butir soal, dan {$totalOptions} opsi pilihan!");
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->command?->error('Terjadi kesalahan saat seeding: '.$e->getMessage());
            throw $e;
        }
    }
}
