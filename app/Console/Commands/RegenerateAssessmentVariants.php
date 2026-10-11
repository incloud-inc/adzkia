<?php

namespace App\Console\Commands;

use App\Services\AssessmentVariantService;
use Illuminate\Console\Command;

class RegenerateAssessmentVariants extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assessments:regenerate-variants {--variant=2 : Nomor varian (1 untuk Quiz 1/#1, 2 untuk Quiz 2/#2)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Regenerasi seluruh soal asesmen untuk varian spesifik agar setiap kuis/paket memiliki butir soal yang 100% berbeda';

    /**
     * Execute the console command.
     */
    public function handle(AssessmentVariantService $service): int
    {
        $variant = (int) $this->option('variant');
        if (! in_array($variant, [1, 2], true)) {
            $this->error('Parameter --variant harus 1 atau 2.');

            return self::FAILURE;
        }

        $this->info("Memulai regenerasi butir soal untuk Asesmen Varian {$variant} (Quiz {$variant} & #{$variant})...");

        $bar = null;

        $results = $service->regenerateVariant($variant, function ($assessment, $qCount, $current, $total) use (&$bar) {
            if ($bar === null) {
                $bar = $this->output->createProgressBar($total);
                $bar->start();
            }
            $bar->advance();
        });

        if ($bar) {
            $bar->finish();
            $this->newLine();
        }

        $this->info("✓ Sukses! Berhasil memperbarui {$results['assessments_updated']} asesmen dan meregenerasi {$results['questions_updated']} butir soal untuk Varian {$variant}.");

        return self::SUCCESS;
    }
}
