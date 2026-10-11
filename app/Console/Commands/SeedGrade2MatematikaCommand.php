<?php

namespace App\Console\Commands;

use Database\Seeders\MatematikaKurikulumMerdekaKelas2Seeder;
use Illuminate\Console\Command;

class SeedGrade2MatematikaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adzkia:seed-grade2-matematika';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Masukkan 30 paket asesmen Matematika Kelas 2 SD Kurikulum Merdeka (Kuis Bab 1-6, ASTS 1, ASAS 1, ASTS 2, ASAT) ke database ADZKIA.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->newLine();
        $this->info('========================================================================');
        $this->info('    ADZKIA CBT - SEED 30 ASESMEN MATEMATIKA KELAS 2 SD (FULL YEAR)      ');
        $this->info('========================================================================');
        $this->newLine();

        $seeder = new MatematikaKurikulumMerdekaKelas2Seeder;
        $seeder->setCommand($this);
        $seeder->run();

        $this->newLine();
        $this->info('Semua 30 asesmen siap digunakan untuk ujian siswa!');

        return self::SUCCESS;
    }
}
