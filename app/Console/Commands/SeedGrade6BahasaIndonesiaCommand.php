<?php

namespace App\Console\Commands;

use Database\Seeders\BahasaIndonesiaKurikulumMerdekaKelas6Seeder;
use Illuminate\Console\Command;

class SeedGrade6BahasaIndonesiaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adzkia:seed-grade6-bahasa';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed seluruh 36 paket asesmen Bahasa Indonesia Kelas 6 SD Kurikulum Merdeka (Full Year: Quiz 1-3 Bab 1 s.d 8, ASTS 1-2, ASAS, ASAJ SD) berbobot 40:30:30 pada skala 100.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('');
        $this->info('========================================================================');
        $this->info(' ADZKIA CBT - SEED 36 ASESMEN BAHASA INDONESIA KELAS 6 SD (FULL YEAR) ');
        $this->info('========================================================================');
        $this->newLine();

        $seeder = new BahasaIndonesiaKurikulumMerdekaKelas6Seeder;
        $seeder->setCommand($this);
        $seeder->run();

        $this->newLine();
        $this->info('Semua 36 asesmen Bahasa Indonesia Kelas 6 SD siap digunakan untuk ujian siswa!');

        return Command::SUCCESS;
    }
}
