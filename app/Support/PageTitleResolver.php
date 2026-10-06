<?php

namespace App\Support;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\Route;

class PageTitleResolver
{
    /**
     * Map nama route ke judul halaman bahasa Indonesia yang representatif.
     *
     * @var array<string, string>
     */
    protected static array $routeTitles = [
        'dashboard' => 'Dashboard',
        'dashboard.users.index' => 'Manajemen Pengguna',
        'assessments.index' => 'Katalog Asesmen',
        'assessments.create' => 'Buat Asesmen Baru',
        'assessments.wizard' => 'Wizard Pembuatan Asesmen',
        'assessments.show' => 'Detail Asesmen',
        'assessments.result' => 'Hasil Evaluasi Asesmen',
        'assessments.analytics.index' => 'Analisis Butir Soal & Daya Serap',
        'assessments.analytics.preview' => 'Pratinjau Analisis Asesmen',
        'question-banks.index' => 'Bank Soal',
        'question-banks.create' => 'Tambah Bank Soal',
        'question-banks.show' => 'Detail Bank Soal',
        'question-banks.edit' => 'Edit Bank Soal',
        'question-generator.index' => 'Studio Pembuat Soal AI',
        'subjects.index' => 'Mata Pelajaran',
        'grade-levels.index' => 'Tingkat & Jenjang Kelas',
        'dichotomy-presets.index' => 'Preset Dikotomi',
        'proctoring.index' => 'Pengawasan Ujian (Proctoring)',
        'teacher.grading.index' => 'Daftar Penilaian Ujian',
        'teacher.grading.show' => 'Koreksi Lembar Jawaban Siswa',
        'tenants.index' => 'Manajemen Institusi (Tenant)',
        'tenants.create' => 'Tambah Tenant Baru',
        'tenants.edit' => 'Edit Data Tenant',
        'tenants.show' => 'Detail Institusi',
        'tenants.branding.edit' => 'Branding & Kustomisasi Portal',
        'sales-reports.index' => 'Laporan Penjualan Paket Soal',
        'wallet.index' => 'Dompet & Pendapatan',
        'wallet.admin-payouts' => 'Kelola Penarikan Dana (Payout)',
        'profile.edit' => 'Pengaturan Profil & Keamanan',
        'settings.index' => 'Pengaturan Sistem',
        'exam.history' => 'Riwayat Ujian Siswa',
        'exam.analysis' => 'Analisa Hasil Ujian',
        'orders.checkout' => 'Checkout Paket Ujian',
        'orders.show' => 'Detail Pesanan',
        'login' => 'Masuk Akun',
        'register' => 'Daftar Akun Siswa',
        'password.request' => 'Lupa Kata Sandi',
        'password.reset' => 'Atur Ulang Kata Sandi',
        'password.force_change' => 'Ganti Kata Sandi',
        'tenant.select' => 'Pilih Institusi',
    ];

    /**
     * Resolve judul halaman lengkap dengan aturan Enterprise.
     */
    public static function resolve(?string $customTitle = null, ?Tenant $tenant = null, ?User $user = null): string
    {
        $user = $user ?? auth()->user();
        $isOwner = $user?->isSuperUser();
        $tenant = $tenant ?? ($user?->currentTenant ?? ($isOwner ? null : $user?->tenants()->first()));

        // 1. Tentukan judul halaman mentah (Raw Title)
        if (filled($customTitle)) {
            $rawTitle = trim($customTitle);
        } else {
            $routeName = Route::currentRouteName();
            if ($routeName === 'dashboard' && $user) {
                if ($user->isSuperUser()) {
                    $rawTitle = 'Dashboard Platform';
                } elseif ($user->isAdmin()) {
                    $rawTitle = 'Dashboard Lembaga';
                } elseif ($user->isTeacher()) {
                    $rawTitle = 'Dashboard Guru';
                } else {
                    $rawTitle = 'Dashboard Siswa';
                }
            } else {
                $rawTitle = self::$routeTitles[$routeName] ?? 'Aplikasi Ujian';
            }
        }

        // 2. Bersihkan sufiks "- ADZKIA" atau "| ADZKIA" atau "Laravel" yang mungkin terbawa
        $cleanedTitle = preg_replace('/\s*[-|]\s*(ADZKIA|Laravel)\s*$/i', '', $rawTitle);
        $cleanedTitle = trim($cleanedTitle);

        // 3. Cek apakah Tenant berlevel ENTERPRISE (atau Siswa di bawah Tenant Enterprise)
        $isEnterprise = $tenant && $tenant->isEnterprise();

        if ($isEnterprise) {
            // Jika levelnya ENTERPRISE, hapus "- ADZKIA"
            return $cleanedTitle;
        }

        // Untuk non-enterprise atau tanpa tenant, tambahkan "- ADZKIA" di belakang
        return "{$cleanedTitle} - ADZKIA";
    }
}
