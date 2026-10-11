<?php

namespace App\Console\Commands;

use Database\Seeders\BahasaInggrisKurikulumMerdekaKelas3Seeder;
use Illuminate\Console\Command;

class SeedGrade3BahasaInggrisCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adzkia:seed-grade3-inggris';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Masukkan 24 paket asesmen Bahasa Inggris Kelas 3 SD Kurikulum Merdeka (Kuis Unit 1-4, ASTS 1, ASAS 1, ASTS 2, ASAT) ke database ADZKIA.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->newLine();
        $this->info('========================================================================');
        $this->info('  ADZKIA CBT - SEED 24 ASESMEN BAHASA INGGRIS KELAS 3 SD (FULL YEAR)    ');
        $this->info('========================================================================');
        $this->newLine();

        $seeder = new BahasaInggrisKurikulumMerdekaKelas3Seeder;
        $seeder->setCommand($this);
        $seeder->run();

        $this->newLine();
        $this->info('Semua 24 asesmen Bahasa Inggris Kelas 3 SD siap digunakan untuk ujian siswa!');

        return self::SUCCESS;
    }
}
