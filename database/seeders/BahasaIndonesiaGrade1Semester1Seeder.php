<?php

namespace Database\Seeders;

use App\Models\Assessment;
use App\Models\AssessmentSection;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Database\Seeders\Data\BahasaIndonesiaGrade1AASData;
use Database\Seeders\Data\BahasaIndonesiaGrade1ATSData;
use Database\Seeders\Data\BahasaIndonesiaGrade1Bab1Data;
use Database\Seeders\Data\BahasaIndonesiaGrade1Bab2Data;
use Database\Seeders\Data\BahasaIndonesiaGrade1Bab3Data;
use Database\Seeders\Data\BahasaIndonesiaGrade1Bab4Data;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BahasaIndonesiaGrade1Semester1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Ensure Subject "Bahasa Indonesia" exists
        $subject = Subject::firstOrCreate(
            ['name' => 'Bahasa Indonesia'],
            [
                'code' => 'BIND',
                'description' => 'Mata pelajaran wajib tata bahasa, literasi, dan teks sastra.',
            ]
        );

        // 2. Identify default Tenant & User creator
        $tenant = Tenant::first() ?? Tenant::create([
            'name' => 'KEMENTERIAN PENDIDIKAN',
            'subdomain' => 'kemendik',
            'plan' => 'gratis',
        ]);

        $user = User::first() ?? User::create([
            'name' => 'Administrator',
            'email' => 'admin@adzkia.id',
            'password' => bcrypt('Masuk123!'),
            'current_tenant_id' => $tenant->id,
        ]);

        // 3. Compile all 18 assessments for Grade 1 Semester 1
        $allAssessments = array_merge(
            BahasaIndonesiaGrade1Bab1Data::getAssessments(),
            BahasaIndonesiaGrade1Bab2Data::getAssessments(),
            BahasaIndonesiaGrade1Bab3Data::getAssessments(),
            BahasaIndonesiaGrade1Bab4Data::getAssessments(),
            BahasaIndonesiaGrade1ATSData::getAssessments(),
            BahasaIndonesiaGrade1AASData::getAssessments()
        );

        $titles = array_column($allAssessments, 'title');

        $this->command?->info('Menyiapkan database untuk '.count($allAssessments).' asesmen Bahasa Indonesia Kelas 1 SD (Semester 1)...');

        DB::beginTransaction();

        try {
            // Hapus asesmen lama jika sudah pernah di-seed agar idempotent (tidak duplikat)
            $existing = Assessment::withoutGlobalScopes()
                ->where('tenant_id', $tenant->id)
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
            $createdSummaries = [];

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
                    'price_type' => 'free',
                    'price' => 0.00,
                    'revenue_share_tenant_pct' => 0,
                    'revenue_share_platform_pct' => 100,
                    'settings' => [
                        'token' => $token,
                        'validity_type' => 'forever',
                        'randomize_questions' => false,
                        'randomize_options' => false,
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
                $secCount = 0;
                $qCount = 0;

                foreach ($assData['sections'] as $secData) {
                    $section = AssessmentSection::create([
                        'assessment_id' => $assessment->id,
                        'title' => $secData['title'],
                        'instructions' => $secData['instructions'] ?? '',
                        'order' => $secData['order'],
                        'duration_minutes' => max(5, (int) round($assData['duration_minutes'] / count($assData['sections']))),
                    ]);

                    $totalSections++;
                    $secCount++;

                    foreach ($secData['questions'] as $qData) {
                        $question = Question::create([
                            'assessment_section_id' => $section->id,
                            'type' => $qData['type'],
                            'prompt' => $qData['prompt'],
                            'explanation' => $qData['explanation'] ?? null,
                            'points' => $qData['points'] ?? 1.00,
                            'order' => $qData['order'],
                        ]);

                        $totalQuestions++;
                        $qCount++;

                        if (! empty($qData['options'])) {
                            foreach ($qData['options'] as $idx => $optData) {
                                QuestionOption::create([
                                    'question_id' => $question->id,
                                    'label' => $optData['label'] ?? null,
                                    'option_text' => $optData['option_text'],
                                    'is_correct' => (bool) ($optData['is_correct'] ?? false),
                                    'match_key' => $optData['match_key'] ?? null,
                                    'order' => $optData['order'] ?? ($idx + 1),
                                ]);

                                $totalOptions++;
                            }
                        }
                    }
                }

                $createdSummaries[] = [
                    'title' => $assessment->title,
                    'type' => strtoupper($assessment->type),
                    'token' => $token,
                    'sections' => $secCount,
                    'questions' => $qCount,
                ];
            }

            DB::commit();

            $this->command?->info("BERHASIL! {$totalAssessments} Asesmen, {$totalSections} Bagian, {$totalQuestions} Soal, dan {$totalOptions} Opsi berhasil dimasukkan ke database.");

            if ($this->command) {
                $this->command->table(
                    ['Judul Asesmen', 'Tipe', 'Token CBT', 'Jml Bagian', 'Jml Soal'],
                    array_map(fn ($item) => [
                        $item['title'],
                        $item['type'],
                        $item['token'],
                        $item['sections'],
                        $item['questions'],
                    ], $createdSummaries)
                );
            }
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->command?->error('Gagal memasukkan data asesmen: '.$e->getMessage());
            throw $e;
        }
    }
}
