<?php

namespace App\Console\Commands;

use App\Models\Assessment;
use App\Models\ExamSession;
use App\Services\ExamGradingService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ApplySectionWeightingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adzkia:apply-section-weighting 
                            {--grade= : Filter specific grade level (e.g. "4 SD")}
                            {--w1=40 : Weight percentage for Section 1 (default 40)}
                            {--w2=30 : Weight percentage for Section 2 (default 30)}
                            {--w3=30 : Weight percentage for Section 3 (default 30)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Terapkan pembobotan per bagian (Bagian 1: 40%, Bagian 2: 30%, Bagian 3: 30%) dan skala 100 pada semua asesmen dan kuis.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $w1 = (int) $this->option('w1');
        $w2 = (int) $this->option('w2');
        $w3 = (int) $this->option('w3');

        if (($w1 + $w2 + $w3) !== 100) {
            $this->error("Total bobot harus tepat 100%. Saat ini: {$w1} + {$w2} + {$w3} = ".($w1 + $w2 + $w3).'%');

            return Command::FAILURE;
        }

        $query = Assessment::withoutGlobalScopes()->with(['sections' => fn ($q) => $q->orderBy('order')]);

        if ($grade = $this->option('grade')) {
            $query->where('grade_level', $grade);
        }

        $assessments = $query->get();

        $this->info("Menemukan {$assessments->count()} asesmen untuk diperbarui konfigurasi pembobotan bagian...");

        $updatedAssessmentsCount = 0;
        $updatedSessionsCount = 0;

        DB::beginTransaction();

        try {
            foreach ($assessments as $assessment) {
                $sections = $assessment->sections;

                if ($sections->count() < 3) {
                    continue;
                }

                $sec1 = $sections->get(0);
                $sec2 = $sections->get(1);
                $sec3 = $sections->get(2);

                $weights = [
                    $sec1->id => $w1,
                    $sec2->id => $w2,
                    $sec3->id => $w3,
                ];

                $settings = (array) ($assessment->settings ?? []);
                $settings['formula_type'] = 'weighted_percentage';
                $settings['section_weights'] = $weights;

                $assessment->forceFill(['settings' => $settings])->save();
                $updatedAssessmentsCount++;

                // Perbarui sesi ujian yang sudah ada jika ada
                $sessions = ExamSession::where('assessment_id', $assessment->id)->get();
                if ($sessions->isNotEmpty()) {
                    $questionMap = ExamGradingService::getAssessmentQuestions($assessment->id);

                    foreach ($sessions as $session) {
                        $answers = $session->answers;
                        $scorePenalty = (float) data_get($session->meta, 'score_penalty', 0);

                        [$newFinalScore, $newMaxScore] = ExamGradingService::calculateFinalScores(
                            $assessment,
                            $questionMap,
                            $answers,
                            $scorePenalty
                        );

                        $session->forceFill([
                            'score' => $newFinalScore,
                            'max_score' => $newMaxScore,
                        ])->save();

                        $updatedSessionsCount++;
                    }
                }
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->error("Gagal menerapkan pembobotan bagian: {$e->getMessage()}");

            return Command::FAILURE;
        }

        $this->newLine();
        $this->info('========================================================================');
        $this->info(' SUKSES MENERAPKAN PEMBOBOTAN BAGIAN & SKALA 100 PADA ASESMEN ');
        $this->info('========================================================================');
        $this->line("Total Asesmen Diperbarui : <info>{$updatedAssessmentsCount}</info>");
        $this->line("Bobot Bagian 1 (Objektif) : <info>{$w1}%</info>");
        $this->line("Bobot Bagian 2 (Isian)    : <info>{$w2}%</info>");
        $this->line("Bobot Bagian 3 (Uraian)   : <info>{$w3}%</info>");
        $this->line("Total Sesi Siswa Diupdate : <info>{$updatedSessionsCount}</info>");
        $this->info('Semua kuis dan asesmen kini dinilai secara otomatis pada skala 100!');

        return Command::SUCCESS;
    }
}
