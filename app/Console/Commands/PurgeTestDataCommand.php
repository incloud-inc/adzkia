<?php

namespace App\Console\Commands;

use App\Models\DichotomyPreset;
use App\Models\GradeLevel;
use App\Models\PostalCode;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Database\Seeders\GradeAndPresetSeeder;
use Database\Seeders\PostalCodeSeeder;
use Database\Seeders\SubjectSeeder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PurgeTestDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adzkia:purge-test-data
                            {--force : Jalankan pembersihan tanpa dialog konfirmasi}
                            {--owner-email=owner@adzkia.id : Email akun Owner yang wajib dipertahankan}
                            {--default-password=Masuk123! : Password baru jika akun owner dibuat ulang}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bersihkan seluruh data asesmen, sesi ujian, tenant, dan user testing dengan TETAP MEMPERTAHANKAN Master Kelas, Master Mapel, Master Preset Dikotomi, dan Akun OWNER.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->newLine();
        $this->info('================================================================');
        $this->info('  ADZKIA CBT - CLEAN & PURGE TEST DATA UTILITY (FRESH START)    ');
        $this->info('================================================================');
        $this->newLine();

        $this->warn('PERINGATAN DEVSECOPS:');
        $this->line('Perintah ini akan MENGHAPUS seluruh data operasional testing:');
        $this->line('  [x] Seluruh Asesmen, Bank Soal, Stimulus, dan Opsi Jawaban');
        $this->line('  [x] Seluruh Sesi Pengerjaan Ujian, Log Kecurangan, dan Jawaban Siswa');
        $this->line('  [x] Seluruh Riwayat Pesanan (Orders) & Permintaan Payout Dompet');
        $this->line('  [x] Seluruh Tenant Dummy (Sekolah/Bimbel testing)');
        $this->line('  [x] Seluruh Akun Testing (Admin tenant, Guru dummy, Siswa dummy)');
        $this->newLine();

        $this->info('DATA YANG AMAN DAN PASTI DIPERTAHANKAN:');
        $this->line('  [OK] Master Kelas / Jenjang (Tabel grade_levels)');
        $this->line('  [OK] Master Mata Pelajaran (Tabel subjects)');
        $this->line('  [OK] Master Preset Tabel Dikotomi (Tabel dichotomy_presets)');
        $this->line('  [OK] Master Kodepos (Tabel postal_codes)');
        $this->line('  [OK] Akun OWNER / Super User Platform & Tenant Utamanya');
        $this->newLine();

        if (! $this->option('force')) {
            if (! $this->confirm('Apakah Anda benar-benar yakin ingin membersihkan seluruh data testing di atas?', false)) {
                $this->comment('Operasi pembersihan dibatalkan oleh pengguna.');

                return self::SUCCESS;
            }
        }

        $this->info('[1/4] Mengidentifikasi & Mengamankan Akun Owner...');
        $ownerEmail = (string) $this->option('owner-email');

        /** @var User|null $ownerUser */
        $ownerUser = User::where('email', $ownerEmail)->first();

        if (! $ownerUser) {
            // Fallback: Cari user mana pun yang berstatus Super User (Role S)
            $ownerUser = User::whereHas('tenants', fn ($q) => $q->where('role', 'S'))->first();
        }

        if (! $ownerUser) {
            $this->warn("  -> Akun Owner ({$ownerEmail}) belum ditemukan. Membuat akun Owner baru...");
            $defaultTenant = Tenant::firstOrCreate(
                ['subdomain' => 'kemendik'],
                ['name' => 'KEMENTERIAN PENDIDIKAN', 'plan' => 'gratis']
            );

            $ownerUser = User::create([
                'name' => 'Owner ADZKIA',
                'email' => $ownerEmail,
                'password' => Hash::make((string) $this->option('default-password')),
                'current_tenant_id' => $defaultTenant->id,
            ]);

            $ownerUser->tenants()->syncWithoutDetaching([$defaultTenant->id => ['role' => 'S']]);
        }

        $ownerTenantId = $ownerUser->current_tenant_id ?? $ownerUser->tenants()->first()?->id;

        if (! $ownerTenantId) {
            $defaultTenant = Tenant::firstOrCreate(
                ['subdomain' => 'kemendik'],
                ['name' => 'KEMENTERIAN PENDIDIKAN', 'plan' => 'gratis']
            );
            $ownerTenantId = $defaultTenant->id;
            $ownerUser->update(['current_tenant_id' => $ownerTenantId]);
            $ownerUser->tenants()->syncWithoutDetaching([$ownerTenantId => ['role' => 'S']]);
        }

        $this->info("  [OK] Akun Owner terproteksi: {$ownerUser->email} (ID: {$ownerUser->id}, Tenant ID: {$ownerTenantId})");

        $this->info('[2/4] Mengeksekusi Pembersihan Data Ujian & Akun Dummy (Atomic Transaction)...');

        DB::transaction(function () use ($ownerUser, $ownerTenantId) {
            // 1. Bersihkan Jawaban & Log Ujian
            if (DB::getSchemaBuilder()->hasTable('exam_answers')) {
                DB::table('exam_answers')->delete();
            }
            if (DB::getSchemaBuilder()->hasTable('exam_events')) {
                DB::table('exam_events')->delete();
            }
            if (DB::getSchemaBuilder()->hasTable('exam_sessions')) {
                DB::table('exam_sessions')->delete();
            }

            // 2. Bersihkan Transaksi, Kuota & Paket
            if (DB::getSchemaBuilder()->hasTable('user_assessment_accesses')) {
                DB::table('user_assessment_accesses')->delete();
            }
            if (DB::getSchemaBuilder()->hasTable('orders')) {
                DB::table('orders')->delete();
            }
            if (DB::getSchemaBuilder()->hasTable('payout_requests')) {
                DB::table('payout_requests')->delete();
            }
            if (DB::getSchemaBuilder()->hasTable('assessment_packages')) {
                DB::table('assessment_packages')->delete();
            }

            // 3. Bersihkan Butir Soal & Asesmen
            if (DB::getSchemaBuilder()->hasTable('question_options')) {
                DB::table('question_options')->delete();
            }
            if (DB::getSchemaBuilder()->hasTable('questions')) {
                DB::table('questions')->delete();
            }
            if (DB::getSchemaBuilder()->hasTable('question_groups')) {
                DB::table('question_groups')->delete();
            }
            if (DB::getSchemaBuilder()->hasTable('assessment_sections')) {
                DB::table('assessment_sections')->delete();
            }
            if (DB::getSchemaBuilder()->hasTable('assessments')) {
                DB::table('assessments')->delete();
            }
            if (DB::getSchemaBuilder()->hasTable('question_banks')) {
                DB::table('question_banks')->delete();
            }

            // 4. Bersihkan Dompet Tenant Non-Owner
            if (DB::getSchemaBuilder()->hasTable('tenant_wallets')) {
                DB::table('tenant_wallets')->where('tenant_id', '!=', $ownerTenantId)->delete();
            }

            // 5. Bersihkan Tenant Domains & Undangan
            if (DB::getSchemaBuilder()->hasTable('tenant_domains')) {
                DB::table('tenant_domains')->where('tenant_id', '!=', $ownerTenantId)->delete();
            }
            if (DB::getSchemaBuilder()->hasTable('tenant_invitations')) {
                DB::table('tenant_invitations')->delete();
            }

            // 6. Bersihkan Hubungan Tenant-User Selain Owner
            if (DB::getSchemaBuilder()->hasTable('tenant_user')) {
                DB::table('tenant_user')->where('user_id', '!=', $ownerUser->id)->delete();
            }

            // 7. Bersihkan Users Selain Owner
            DB::table('users')->where('id', '!=', $ownerUser->id)->delete();

            // 8. Bersihkan Tenants Selain Tenant Owner
            DB::table('tenants')->where('id', '!=', $ownerTenantId)->delete();
        });

        $this->info('[3/4] Memverifikasi & Melengkapi Master Data Esensial...');

        // Pastikan Master Kelas & Preset Dikotomi Terisi
        if (GradeLevel::count() === 0 || DichotomyPreset::count() === 0) {
            $this->comment('  -> Mengisi ulang Master Kelas dan Preset Dikotomi dari seeder...');
            (new GradeAndPresetSeeder)->run();
        }

        // Pastikan Master Mapel Terisi
        if (Subject::count() === 0) {
            $this->comment('  -> Mengisi ulang Master Mata Pelajaran dari seeder...');
            (new SubjectSeeder)->run();
        }

        // Pastikan Master Kodepos Terisi
        if (PostalCode::count() === 0) {
            $this->comment('  -> Mengisi ulang Master Kodepos dari seeder...');
            (new PostalCodeSeeder)->run();
        }

        $this->info('[4/4] Rekapitulasi Data Pasca Pembersihan:');
        $this->table(
            ['Kategori Data', 'Status', 'Jumlah Sisa', 'Keterangan'],
            [
                ['Asesmen & Bank Soal', 'DIBERSIHKAN', DB::table('assessments')->count(), 'Siap untuk input asesmen resmi baru'],
                ['Sesi Ujian (Exam Sessions)', 'DIBERSIHKAN', DB::table('exam_sessions')->count(), 'Riwayat ujian dikosongkan'],
                ['Pesanan (Orders)', 'DIBERSIHKAN', DB::table('orders')->count(), 'Tabel penjualan bersih'],
                ['Tenant Dummy', 'DIBERSIHKAN', DB::table('tenants')->where('id', '!=', $ownerTenantId)->count(), 'Hanya tenant owner yang tersisa'],
                ['User Siswa & Guru Dummy', 'DIBERSIHKAN', DB::table('users')->where('id', '!=', $ownerUser->id)->count(), 'Hanya akun Owner yang tersisa'],
                ['Master Kelas / Jenjang', 'DIPERTAHANKAN', GradeLevel::count(), 'Lengkap untuk SD, SMP, SMA, Umum'],
                ['Master Mata Pelajaran', 'DIPERTAHANKAN', Subject::count(), 'Lengkap untuk seluruh mapel wajib & peminatan'],
                ['Master Preset Dikotomi', 'DIPERTAHANKAN', DichotomyPreset::count(), 'Lengkap (Benar/Salah, Ya/Tidak, dll)'],
                ['Master Kodepos', 'DIPERTAHANKAN', PostalCode::count(), 'Data referensi pencarian kodepos aktif'],
                ['Akun OWNER Platform', 'DIPERTAHANKAN', 1, "Email: {$ownerUser->email}"],
            ]
        );

        $this->newLine();
        $this->info('SUKSES: Seluruh data testing telah dibersihkan tanpa mengganggu integritas sistem!');
        $this->info("Anda dapat login menggunakan akun Owner: {$ownerUser->email}");

        return self::SUCCESS;
    }
}
