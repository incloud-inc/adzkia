<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Command\Command as CommandStatus;

class RestoreDatabaseDumpCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:restore-dump 
                            {--file= : Path ke file SQL dump (default: database/adzkia_postgres_dump.sql)}
                            {--skip-migrate : Lewati proses php artisan migrate --force}
                            {--truncate : Kosongkan tabel sebelum import}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import dan pulihkan seluruh data database dari file dump SQL ke database aktif';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $filePath = $this->option('file') ?: database_path('adzkia_postgres_dump.sql');

        if (! file_exists($filePath)) {
            $this->error("File dump SQL tidak ditemukan di: {$filePath}");

            return CommandStatus::FAILURE;
        }

        $connection = config('database.default');
        $driver = config("database.connections.{$connection}.driver");
        $database = config("database.connections.{$connection}.database");
        $host = config("database.connections.{$connection}.host");

        $this->info('====================================================');
        $this->info('   ADZKIA CBT - Database Restore Tool');
        $this->info('====================================================');
        $this->line("Target Database : <comment>{$database}</comment> ({$driver} @ {$host})");
        $this->line("File Dump       : <comment>{$filePath}</comment> (".number_format(filesize($filePath) / 1024 / 1024, 2).' MB)');
        $this->newLine();

        if (! $this->option('skip-migrate')) {
            $this->info('>> Menjalankan migrasi tabel (php artisan migrate --force)...');
            try {
                Artisan::call('migrate', ['--force' => true], $this->output);
                $this->info('✓ Migrasi tabel selesai.');
            } catch (\Throwable $e) {
                $this->warn('! Peringatan saat migrasi: '.$e->getMessage());
            }
            $this->newLine();
        }

        $this->info('>> Membaca dan menganalisis file SQL dump...');
        $fileHandle = fopen($filePath, 'r');
        if (! $fileHandle) {
            $this->error("Gagal membuka file: {$filePath}");

            return CommandStatus::FAILURE;
        }

        $currentTable = null;
        $tableStatements = [];
        $headerStatements = [];
        $footerStatements = [];
        $allTables = [];

        $isHeader = true;

        while (($line = fgets($fileHandle)) !== false) {
            $trimmed = trim($line);

            if ($trimmed === '' || str_starts_with($trimmed, '-- -')) {
                continue;
            }

            if (preg_match('/^-- Table:\s+([a-zA-Z0-9_]+)/', $trimmed, $matches)) {
                $isHeader = false;
                $currentTable = $matches[1];
                $allTables[] = $currentTable;
                if (! isset($tableStatements[$currentTable])) {
                    $tableStatements[$currentTable] = [];
                }

                continue;
            }

            if (str_starts_with($trimmed, '-- Re-enable FK') || str_starts_with($trimmed, '-- Reset PostgreSQL serial')) {
                $currentTable = null;
            }

            if (str_starts_with($trimmed, '--')) {
                continue;
            }

            if ($currentTable !== null) {
                $tableStatements[$currentTable][] = $line;
            } elseif ($isHeader) {
                $headerStatements[] = $line;
            } else {
                $footerStatements[] = $line;
            }
        }
        fclose($fileHandle);

        $allTables = array_unique($allTables);
        $this->info('Ditemukan '.count($allTables).' tabel dengan data siap diimport.');

        try {
            if ($driver === 'pgsql') {
                $this->line('>> Menonaktifkan Foreign Key sementara (session_replication_role = replica)...');
                DB::statement("SET session_replication_role = 'replica';");
            }

            if ($this->option('truncate')) {
                $this->info('>> Mengosongkan data lama pada tabel target (--truncate)...');
                if ($driver === 'pgsql') {
                    $quotedTables = implode(', ', array_map(fn ($t) => "\"{$t}\"", $allTables));
                    DB::statement("TRUNCATE TABLE {$quotedTables} CASCADE;");
                } else {
                    foreach (array_reverse($allTables) as $table) {
                        DB::table($table)->truncate();
                    }
                }
                $this->info('✓ Data tabel lama berhasil dikosongkan.');
            }

            if (! empty($headerStatements)) {
                $headerSql = implode('', $headerStatements);
                if (trim($headerSql) !== '') {
                    DB::unprepared($headerSql);
                }
            }

            $this->newLine();
            $this->info('>> Memulai import data tabel...');

            $batchSize = 250;
            $tableCount = count($allTables);
            $index = 0;

            foreach ($allTables as $table) {
                $index++;
                $lines = $tableStatements[$table] ?? [];
                $totalStatements = count($lines);

                $this->output->write(sprintf('[%02d/%02d] Import <comment>%-28s</comment> (%s baris)... ', $index, $tableCount, $table, number_format($totalStatements)));

                if ($totalStatements > 0) {
                    $chunks = array_chunk($lines, $batchSize);
                    foreach ($chunks as $chunk) {
                        $chunkSql = implode('', $chunk);
                        DB::unprepared($chunkSql);
                    }
                }

                $this->line('<info>✓ Selesai</info>');
            }

            if ($driver === 'pgsql') {
                $this->newLine();
                $this->info('>> Mengembalikan Foreign Key constraints...');
                DB::statement("SET session_replication_role = 'origin';");

                $this->info('>> Memperbarui sequence auto-increment PostgreSQL...');
                if (! empty($footerStatements)) {
                    $footerSql = implode('', $footerStatements);
                    if (trim($footerSql) !== '') {
                        DB::unprepared($footerSql);
                    }
                }
                $this->info('✓ Sequence berhasil diperbarui.');
            }

            $this->newLine();
            $this->info('====================================================');
            $this->info('   HASIL VERIFIKASI DATA DATABASE AKTIF');
            $this->info('====================================================');

            $summaryRows = [];
            $totalRows = 0;
            foreach ($allTables as $table) {
                try {
                    $count = DB::table($table)->count();
                    $totalRows += $count;
                    $summaryRows[] = [$table, number_format($count)];
                } catch (\Throwable) {
                    $summaryRows[] = [$table, '<fg=yellow>N/A</>'];
                }
            }

            $this->table(['Nama Tabel', 'Total Baris di Database'], $summaryRows);
            $this->info('✓ Sukses! Total baris data terverifikasi: '.number_format($totalRows));

            return CommandStatus::SUCCESS;
        } catch (\Throwable $e) {
            $this->newLine();
            $this->error('Terjadi error saat import: '.$e->getMessage());

            if ($driver === 'pgsql') {
                try {
                    DB::statement("SET session_replication_role = 'origin';");
                } catch (\Throwable) {
                    // ignore
                }
            }

            return CommandStatus::FAILURE;
        }
    }
}
