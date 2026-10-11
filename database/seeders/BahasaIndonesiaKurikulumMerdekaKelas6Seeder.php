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
use Database\Seeders\Data\BahasaIndonesiaGrade6ASAJData;
use Database\Seeders\Data\BahasaIndonesiaGrade6ASASSemester1Data;
use Database\Seeders\Data\BahasaIndonesiaGrade6ASTSSemester1Data;
use Database\Seeders\Data\BahasaIndonesiaGrade6ASTSSemester2Data;
use Database\Seeders\Data\BahasaIndonesiaGrade6Bab1Data;
use Database\Seeders\Data\BahasaIndonesiaGrade6Bab2Data;
use Database\Seeders\Data\BahasaIndonesiaGrade6Bab3Data;
use Database\Seeders\Data\BahasaIndonesiaGrade6Bab4Data;
use Database\Seeders\Data\BahasaIndonesiaGrade6Bab5Data;
use Database\Seeders\Data\BahasaIndonesiaGrade6Bab6Data;
use Database\Seeders\Data\BahasaIndonesiaGrade6Bab7Data;
use Database\Seeders\Data\BahasaIndonesiaGrade6Bab8Data;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BahasaIndonesiaKurikulumMerdekaKelas6Seeder extends Seeder
{
    /**
     * Run the database seeds for all 36 assessments of Bahasa Indonesia Kelas 6 SD.
     */
    public function run(): void
    {
        // 1. Ensure Subject "Bahasa Indonesia" exists
        $subject = Subject::firstOrCreate(
            ['name' => 'Bahasa Indonesia'],
            [
                'code' => 'BIN',
                'description' => 'Mata pelajaran Bahasa Indonesia Kurikulum Merdeka Fase C (Kelas 6 SD): Bab 1 (Bangga Menjadi Anak Indonesia), Bab 2 (Musisi Indonesia di Pentas Dunia), Bab 3 (Taman Nasional dan Situs Warisan Dunia), Bab 4 (Jeda untuk Iklim), Bab 5 (Anak-Anak Pengubah Dunia), Bab 6 (Liburan Perpisahan Kelas), Bab 7 (Aku Bisa Berempati), Bab 8 (Aman di Dunia Maya), dan Asesmen Akhir Jenjang SD (ASAJ).',
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

        // 3. Compile all 36 assessments for Grade 6
        $allAssessments = array_merge(
            BahasaIndonesiaGrade6Bab1Data::getAssessments(),
            BahasaIndonesiaGrade6Bab2Data::getAssessments(),
            BahasaIndonesiaGrade6ASTSSemester1Data::getAssessments(),
            BahasaIndonesiaGrade6Bab3Data::getAssessments(),
            BahasaIndonesiaGrade6Bab4Data::getAssessments(),
            BahasaIndonesiaGrade6ASASSemester1Data::getAssessments(),
            BahasaIndonesiaGrade6Bab5Data::getAssessments(),
            BahasaIndonesiaGrade6Bab6Data::getAssessments(),
            BahasaIndonesiaGrade6ASTSSemester2Data::getAssessments(),
            BahasaIndonesiaGrade6Bab7Data::getAssessments(),
            BahasaIndonesiaGrade6Bab8Data::getAssessments(),
            BahasaIndonesiaGrade6ASAJData::getAssessments()
        );

        $titles = array_column($allAssessments, 'title');

        $this->command?->info('Menyiapkan database untuk '.count($allAssessments).' asesmen Bahasa Indonesia Kelas 6 SD Kurikulum Merdeka...');

        DB::beginTransaction();

        try {
            // Hapus asesmen lama dengan judul yang sama dan grade_level 6 SD agar idempotent
            $existing = Assessment::withoutGlobalScopes()
                ->where('subject_id', $subject->id)
                ->where('grade_level', '6 SD')
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
                    'grade_level' => '6 SD',
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

                foreach ($assData['sections'] as $secData) {
                    $section = AssessmentSection::create([
                        'assessment_id' => $assessment->id,
                        'title' => $secData['title'],
                        'instructions' => $secData['instructions'] ?? null,
                        'order' => $secData['order'],
                    ]);

                    $totalSections++;
                    $createdSections[] = $section;

                    $groupMap = [];
                    if (! empty($secData['question_groups'])) {
                        foreach ($secData['question_groups'] as $gIdx => $gData) {
                            $qGroup = QuestionGroup::create([
                                'assessment_section_id' => $section->id,
                                'title' => $gData['title'],
                                'stimulus_type' => $gData['stimulus_type'] ?? 'text',
                                'stimulus_content' => $gData['stimulus_content'] ?? ($gData['content'] ?? ''),
                                'order' => $gIdx + 1,
                            ]);
                            $groupMap[$gIdx] = $qGroup->id;
                            $totalGroups++;
                        }
                    }

                    foreach ($secData['questions'] as $qData) {
                        $groupId = null;
                        if (isset($qData['group_index']) && isset($groupMap[$qData['group_index']])) {
                            $groupId = $groupMap[$qData['group_index']];
                        }

                        $question = Question::create([
                            'assessment_section_id' => $section->id,
                            'question_group_id' => $groupId,
                            'type' => $qData['type'],
                            'order' => $qData['order'],
                            'prompt' => $qData['prompt'],
                            'explanation' => $qData['explanation'] ?? null,
                            'points' => $qData['points'] ?? 1.0,
                            'settings' => $qData['settings'] ?? null,
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

                // Petakan pembobotan per bagian dinamis (40:30:30)
                if (count($createdSections) === 3) {
                    $sec0 = $createdSections[0];
                    $sec1 = $createdSections[1];
                    $sec2 = $createdSections[2];

                    $assSettings = $assessment->settings ?? [];
                    $assSettings['section_weights'] = [
                        $sec0->id => 40,
                        $sec1->id => 30,
                        $sec2->id => 30,
                    ];
                    $assSettings['formula_type'] = 'weighted_percentage';

                    $assessment->settings = $assSettings;
                    $assessment->save();
                }
            }

            DB::commit();

            $this->command?->info("Sukses menyimpan {$totalAssessments} asesmen, {$totalSections} seksi, {$totalGroups} stimulus question groups, {$totalQuestions} butir soal, dan {$totalOptions} opsi pilihan!");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->command?->error('Gagal melakukan seed Bahasa Indonesia Kelas 6 SD: '.$e->getMessage());
            throw $e;
        }
    }
}
