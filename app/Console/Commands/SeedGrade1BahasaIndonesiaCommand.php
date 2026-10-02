<?php

namespace App\Console\Commands;

use Database\Seeders\BahasaIndonesiaGrade1Semester1Seeder;
use Illuminate\Console\Command;

class SeedGrade1BahasaIndonesiaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adzkia:seed-grade1-bahasa';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Masukkan 18 paket asesmen Bahasa Indonesia Kelas 1 SD Semester 1 (Kuis Bab 1-4, ATS 1, AAS 1) ke database ADZKIA.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->newLine();
        $this->info('========================================================================');
        $this->info('  ADZKIA CBT - SEED ASESMEN BAHASA INDONESIA KELAS 1 SD (SEMESTER 1)    ');
        $this->info('========================================================================');
        $this->newLine();

        $seeder = new BahasaIndonesiaGrade1Semester1Seeder;
        $seeder->setCommand($this);
        $seeder->run();

        $this->newLine();
        $this->info('Semua asesmen siap digunakan untuk ujian siswa!');

        return self::SUCCESS;
    }
}
