<?php

namespace App\Console\Commands;

use Database\Seeders\BahasaInggrisKurikulumMerdekaKelas6Seeder;
use Illuminate\Console\Command;

class SeedGrade6BahasaInggrisCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adzkia:seed-grade6-inggris';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed seluruh 24 paket asesmen Bahasa Inggris Kelas 6 SD Kurikulum Merdeka (Full Year: Quiz 1-3 Unit 1 s.d 4, ASTS 1-2, ASAS, ASAJ SD) berbobot 40:30:30 pada skala 100.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('');
        $this->info('========================================================================');
        $this->info(' ADZKIA CBT - SEED 24 ASESMEN BAHASA INGGRIS KELAS 6 SD (FULL YEAR) ');
        $this->info('========================================================================');
        $this->newLine();

        $seeder = new BahasaInggrisKurikulumMerdekaKelas6Seeder;
        $seeder->setCommand($this);
        $seeder->run();

        $this->newLine();
        $this->info('Semua 24 asesmen Bahasa Inggris Kelas 6 SD siap digunakan untuk ujian siswa!');

        return Command::SUCCESS;
    }
}
