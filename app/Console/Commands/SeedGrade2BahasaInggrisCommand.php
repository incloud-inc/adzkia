<?php

namespace App\Console\Commands;

use Database\Seeders\BahasaInggrisKurikulumMerdekaKelas2Seeder;
use Illuminate\Console\Command;

class SeedGrade2BahasaInggrisCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adzkia:seed-grade2-inggris';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Masukkan 24 paket asesmen Bahasa Inggris Kelas 2 SD Kurikulum Merdeka (Kuis Unit 1-4, ASTS 1, ASAS 1, ASTS 2, ASAT) ke database ADZKIA.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->newLine();
        $this->info('========================================================================');
        $this->info('  ADZKIA CBT - SEED 24 ASESMEN BAHASA INGGRIS KELAS 2 SD (FULL YEAR)    ');
        $this->info('========================================================================');
        $this->newLine();

        $seeder = new BahasaInggrisKurikulumMerdekaKelas2Seeder;
        $seeder->setCommand($this);
        $seeder->run();

        $this->newLine();
        $this->info('Semua 24 asesmen siap digunakan untuk ujian siswa!');

        return self::SUCCESS;
    }
}
