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
use Database\Seeders\Data\BahasaIndonesiaGrade4ASASSemester1Data;
use Database\Seeders\Data\BahasaIndonesiaGrade4ASATData;
use Database\Seeders\Data\BahasaIndonesiaGrade4ASTSSemester1Data;
use Database\Seeders\Data\BahasaIndonesiaGrade4ASTSSemester2Data;
use Database\Seeders\Data\BahasaIndonesiaGrade4Bab1Data;
use Database\Seeders\Data\BahasaIndonesiaGrade4Bab2Data;
use Database\Seeders\Data\BahasaIndonesiaGrade4Bab3Data;
use Database\Seeders\Data\BahasaIndonesiaGrade4Bab4Data;
use Database\Seeders\Data\BahasaIndonesiaGrade4Bab5Data;
use Database\Seeders\Data\BahasaIndonesiaGrade4Bab6Data;
use Database\Seeders\Data\BahasaIndonesiaGrade4Bab7Data;
use Database\Seeders\Data\BahasaIndonesiaGrade4Bab8Data;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BahasaIndonesiaKurikulumMerdekaKelas4Seeder extends Seeder
{
    /**
     * Run the database seeds for all 36 assessments of Bahasa Indonesia Kelas 4 SD.
     */
    public function run(): void
    {
        // 1. Ensure Subject "Bahasa Indonesia" exists
        $subject = Subject::firstOrCreate(
            ['name' => 'Bahasa Indonesia'],
            [
                'code' => 'BIN',
                'description' => 'Mata pelajaran Bahasa Indonesia Kurikulum Merdeka Fase B (Kelas 4 SD): Teks Narasi, Fobia, Kalimat Transitif/Intransitif, Tugas di Rumah, Homonim, Kalimat Majemuk, Rambu Lalu Lintas, Paragraf Argumentasi, Kata Berimbuhan, Wawancara, Majas Personifikasi, Ide Pokok, Sejarah Uang, Teks Prosedur, Menabung, Teks Deskripsi, Puisi, Kalimat Efektif, Asal-Usul, Konjungsi, Teks Eksplanasi Berita, serta Fakta & Opini.',
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

        // 3. Compile all 36 assessments for Grade 4
        $allAssessments = array_merge(
            BahasaIndonesiaGrade4Bab1Data::getAssessments(),
            BahasaIndonesiaGrade4Bab2Data::getAssessments(),
            BahasaIndonesiaGrade4ASTSSemester1Data::getAssessments(),
            BahasaIndonesiaGrade4Bab3Data::getAssessments(),
            BahasaIndonesiaGrade4Bab4Data::getAssessments(),
            BahasaIndonesiaGrade4ASASSemester1Data::getAssessments(),
            BahasaIndonesiaGrade4Bab5Data::getAssessments(),
            BahasaIndonesiaGrade4Bab6Data::getAssessments(),
            BahasaIndonesiaGrade4ASTSSemester2Data::getAssessments(),
            BahasaIndonesiaGrade4Bab7Data::getAssessments(),
            BahasaIndonesiaGrade4Bab8Data::getAssessments(),
            BahasaIndonesiaGrade4ASATData::getAssessments()
        );

        $titles = array_column($allAssessments, 'title');

        $this->command?->info('Menyiapkan database untuk '.count($allAssessments).' asesmen Bahasa Indonesia Kelas 4 SD Kurikulum Merdeka...');

        DB::beginTransaction();

        try {
            // Hapus asesmen lama dengan judul yang sama dan grade_level 4 SD agar idempotent
            $existing = Assessment::withoutGlobalScopes()
                ->where('subject_id', $subject->id)
                ->where('grade_level', '4 SD')
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
                    'grade_level' => '4 SD',
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
                            'min_score' => 75,
                            'pass_label' => 'Kompeten / Sangat Baik',
                            'fail_label' => 'Perlu Remedial',
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

                $sections = $assessment->sections()->orderBy('order')->get();
                if ($sections->count() >= 3) {
                    $assSettings = (array) ($assessment->settings ?? []);
                    $assSettings['formula_type'] = 'weighted_percentage';
                    $assSettings['section_weights'] = [
                        $sections[0]->id => 40,
                        $sections[1]->id => 30,
                        $sections[2]->id => 30,
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
