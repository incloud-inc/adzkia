<?php

namespace App\Console\Commands;

use Database\Seeders\MatematikaKurikulumMerdekaKelas5Seeder;
use Illuminate\Console\Command;

class SeedGrade5MatematikaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adzkia:seed-grade5-matematika';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed seluruh 30 paket asesmen Matematika Kelas 5 SD Kurikulum Merdeka (Full Year: Quiz 1-3 Bab 1 s.d 6, ASTS 1-2, ASAS, ASAT) berbobot 40:30:30 pada skala 100.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('');
        $this->info('========================================================================');
        $this->info(' ADZKIA CBT - SEED 30 ASESMEN MATEMATIKA KELAS 5 SD (FULL YEAR) ');
        $this->info('========================================================================');
        $this->newLine();

        $seeder = new MatematikaKurikulumMerdekaKelas5Seeder;
        $seeder->setCommand($this);
        $seeder->run();

        $this->newLine();
        $this->info('Semua 30 asesmen Matematika Kelas 5 SD siap digunakan untuk ujian siswa!');

        return Command::SUCCESS;
    }
}
