<?php

namespace App\Console\Commands;

use Database\Seeders\MatematikaKurikulumMerdekaKelas1Seeder;
use Illuminate\Console\Command;

class SeedGrade1MatematikaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adzkia:seed-grade1-matematika';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Masukkan 36 paket asesmen Matematika Kelas 1 SD Kurikulum Merdeka (Kuis Bab 1-8, ASTS 1, ASAS 1, ASTS 2, ASAT) ke database ADZKIA.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->newLine();
        $this->info('========================================================================');
        $this->info('    ADZKIA CBT - SEED 36 ASESMEN MATEMATIKA KELAS 1 SD (FULL YEAR)      ');
        $this->info('========================================================================');
        $this->newLine();

        $seeder = new MatematikaKurikulumMerdekaKelas1Seeder;
        $seeder->setCommand($this);
        $seeder->run();

        $this->newLine();
        $this->info('Semua 36 asesmen Matematika siap digunakan untuk ujian siswa!');

        return self::SUCCESS;
    }
}
