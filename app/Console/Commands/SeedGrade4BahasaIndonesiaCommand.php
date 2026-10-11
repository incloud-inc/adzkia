<?php

namespace App\Console\Commands;

use Database\Seeders\BahasaIndonesiaKurikulumMerdekaKelas4Seeder;
use Illuminate\Console\Command;

class SeedGrade4BahasaIndonesiaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adzkia:seed-grade4-bahasa';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Masukkan 36 paket asesmen Bahasa Indonesia Kelas 4 SD Kurikulum Merdeka (Kuis Bab 1-8, ASTS 1, ASAS 1, ASTS 2, ASAT) ke database ADZKIA.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->newLine();
        $this->info('========================================================================');
        $this->info('  ADZKIA CBT - SEED 36 ASESMEN BAHASA INDONESIA KELAS 4 SD (FULL YEAR)   ');
        $this->info('========================================================================');
        $this->newLine();

        $seeder = new BahasaIndonesiaKurikulumMerdekaKelas4Seeder;
        $seeder->setCommand($this);
        $seeder->run();

        $this->newLine();
        $this->info('Semua 36 asesmen Bahasa Indonesia Kelas 4 SD siap digunakan untuk ujian siswa!');

        return self::SUCCESS;
    }
}
