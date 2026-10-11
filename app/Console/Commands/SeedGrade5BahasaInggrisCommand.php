<?php

namespace App\Console\Commands;

use Database\Seeders\BahasaInggrisKurikulumMerdekaKelas5Seeder;
use Illuminate\Console\Command;

class SeedGrade5BahasaInggrisCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adzkia:seed-grade5-inggris';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed seluruh 24 paket asesmen Bahasa Inggris Kelas 5 SD Kurikulum Merdeka (Full Year: Quiz 1-3 Unit 1 s.d 4, ASTS 1-2, ASAS, ASAT) berbobot 40:30:30 pada skala 100.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('');
        $this->info('========================================================================');
        $this->info(' ADZKIA CBT - SEED 24 ASESMEN BAHASA INGGRIS KELAS 5 SD (FULL YEAR) ');
        $this->info('========================================================================');
        $this->newLine();

        $seeder = new BahasaInggrisKurikulumMerdekaKelas5Seeder;
        $seeder->setCommand($this);
        $seeder->run();

        $this->newLine();
        $this->info('Semua 24 asesmen Bahasa Inggris Kelas 5 SD siap digunakan untuk ujian siswa!');

        return Command::SUCCESS;
    }
}
