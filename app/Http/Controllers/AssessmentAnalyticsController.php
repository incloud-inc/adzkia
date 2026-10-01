<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\ExamSession;
use App\Services\ItemAnalysisService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AssessmentAnalyticsController extends Controller
{
    public function __construct(
        protected ItemAnalysisService $itemAnalysisService
    ) {}

    /**
     * Dashboard Analisis Butir Soal & Rekap Nilai Asesmen.
     */
    public function index(Request $request, Assessment $assessment): View
    {
        $user = Auth::user();
        if (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser()) {
            abort(403, 'Akses terbatas untuk Dewan Guru & Pengawas.');
        }

        $currentTenant = $user->currentTenant;
        $tenantId = ($currentTenant && ! $user->isSuperUser()) ? $currentTenant->id : null;

        // 1. Ambil data analisis butir soal dari service
        $analysis = $this->itemAnalysisService->analyzeAssessment($assessment, $tenantId);

        // 2. Ambil sesi ujian untuk rekap nilai peserta
        $query = ExamSession::with(['user', 'tenant'])
            ->where('assessment_id', $assessment->id);

        if ($tenantId) {
            $query->where('tenant_id', $tenantId);
        }

        $sessions = $query->latest('completed_at')->get();

        // 3. Metrik & KKM
        $kkm = (float) data_get($assessment->settings, 'passing_grade.min_score', 75);
        $kkmEnabled = (bool) data_get($assessment->settings, 'passing_grade.enabled', true);

        $completedList = $sessions->where('status', 'completed');
        $scores = $completedList->map(function ($s) {
            $max = (float) ($s->max_score > 0 ? $s->max_score : 100);

            return round(((float) $s->score / $max) * 100, 1);
        });

        $avgScore = $scores->count() > 0 ? round($scores->avg(), 1) : 0;
        $maxScore = $scores->count() > 0 ? $scores->max() : 0;
        $minScore = $scores->count() > 0 ? $scores->min() : 0;
        $stdDev = $scores->count() > 1 ? round($this->calculateStdDev($scores->all()), 1) : 0;

        $passedCount = $scores->filter(fn ($score) => $kkmEnabled ? ($score >= $kkm) : true)->count();
        $passRate = $scores->count() > 0 ? round(($passedCount / $scores->count()) * 100, 1) : 0;

        return view('assessments.analytics.index', compact(
            'assessment',
            'analysis',
            'sessions',
            'kkm',
            'kkmEnabled',
            'avgScore',
            'maxScore',
            'minScore',
            'stdDev',
            'passedCount',
            'passRate'
        ));
    }

    /**
     * Ekspor Rekap Nilai ke Format Excel / CSV.
     */
    public function exportExcel(Request $request, Assessment $assessment): StreamedResponse
    {
        $user = Auth::user();
        if (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser()) {
            abort(403, 'Akses terbatas untuk Dewan Guru & Pengawas.');
        }

        $currentTenant = $user->currentTenant;
        $tenantId = ($currentTenant && ! $user->isSuperUser()) ? $currentTenant->id : null;

        $query = ExamSession::with(['user', 'tenant'])
            ->where('assessment_id', $assessment->id);

        if ($tenantId) {
            $query->where('tenant_id', $tenantId);
        }

        $sessions = $query->orderByDesc('score')->get();

        $kkm = (float) data_get($assessment->settings, 'passing_grade.min_score', 75);
        $kkmEnabled = (bool) data_get($assessment->settings, 'passing_grade.enabled', true);

        $safeTitle = preg_replace('/[^a-zA-Z0-9_\-]/', '_', $assessment->title);
        $filename = "Rekap_Nilai_{$safeTitle}_".now()->format('Ymd_His').'.csv';

        return response()->streamDownload(function () use ($assessment, $sessions, $kkm, $kkmEnabled) {
            $out = fopen('php://output', 'w');
            // Tulis BOM UTF-8 agar Microsoft Excel mengenali karakter khusus dan format teks dengan benar
            fwrite($out, "\xEF\xBB\xBF");

            // Header Informasi Asesmen
            fputcsv($out, ['REKAPITULASI HASIL UJIAN CBT']);
            fputcsv($out, ['Judul Asesmen', $assessment->title]);
            fputcsv($out, ['Mata Pelajaran', $assessment->subject?->name ?? 'Umum']);
            fputcsv($out, ['Tingkat / Kelas', $assessment->grade_level ?? 'Semua']);
            fputcsv($out, ['Standar KKM', $kkmEnabled ? $kkm : 'Tidak Diberlakukan']);
            fputcsv($out, ['Tanggal Unduh', now()->translatedFormat('d F Y, H:i:s').' WIB']);
            fputcsv($out, []); // Baris Kosong

            // Baris Judul Kolom Tabel
            fputcsv($out, [
                'Peringkat',
                'Nama Siswa / Peserta',
                'Email Akun',
                'Tenant / Lembaga',
                'Status Pengerjaan',
                'Waktu Mulai',
                'Waktu Selesai',
                'Durasi (Menit)',
                'Skor Diperoleh',
                'Skor Maksimal',
                'Nilai Akhir (Skala 100)',
                'Keterangan KKM',
            ]);

            $rank = 1;
            foreach ($sessions as $s) {
                $maxScore = (float) ($s->max_score > 0 ? $s->max_score : 100);
                $finalScore = round(((float) $s->score / $maxScore) * 100, 1);

                $durationMin = ($s->started_at && $s->completed_at)
                    ? round($s->completed_at->diffInMinutes($s->started_at))
                    : '-';

                $kkmStatus = '-';
                if ($s->status === 'completed') {
                    if ($kkmEnabled) {
                        $kkmStatus = $finalScore >= $kkm ? 'LULUS KKM' : 'REMIDIAL / BELUM TERCAPAI';
                    } else {
                        $kkmStatus = 'SELESAI';
                    }
                } elseif ($s->status === 'in_progress') {
                    $kkmStatus = 'SEDANG MENGERJAKAN';
                }

                fputcsv($out, [
                    $rank++,
                    $s->user?->name ?? 'Anonim',
                    $s->user?->email ?? '-',
                    $s->tenant?->name ?? '-',
                    strtoupper($s->status),
                    $s->started_at ? $s->started_at->format('Y-m-d H:i:s') : '-',
                    $s->completed_at ? $s->completed_at->format('Y-m-d H:i:s') : '-',
                    $durationMin,
                    $s->score,
                    $maxScore,
                    $finalScore,
                    $kkmStatus,
                ]);
            }

            fclose($out);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ]);
    }

    /**
     * Lembar Cetak Rekapitulasi Nilai & Analisis (Print / PDF View).
     */
    public function printPdf(Request $request, Assessment $assessment): View
    {
        $user = Auth::user();
        if (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser()) {
            abort(403, 'Akses terbatas untuk Dewan Guru & Pengawas.');
        }

        $currentTenant = $user->currentTenant;
        $tenantId = ($currentTenant && ! $user->isSuperUser()) ? $currentTenant->id : null;

        $analysis = $this->itemAnalysisService->analyzeAssessment($assessment, $tenantId);

        $query = ExamSession::with(['user', 'tenant'])
            ->where('assessment_id', $assessment->id);

        if ($tenantId) {
            $query->where('tenant_id', $tenantId);
        }

        $sessions = $query->orderByDesc('score')->get();

        $kkm = (float) data_get($assessment->settings, 'passing_grade.min_score', 75);
        $kkmEnabled = (bool) data_get($assessment->settings, 'passing_grade.enabled', true);

        return view('assessments.analytics.print', compact(
            'assessment',
            'analysis',
            'sessions',
            'kkm',
            'kkmEnabled'
        ));
    }

    /**
     * Hitung standar deviasi populasi/sampel.
     */
    protected function calculateStdDev(array $values): float
    {
        $count = count($values);
        if ($count <= 1) {
            return 0.0;
        }

        $mean = array_sum($values) / $count;
        $sumSquares = 0.0;
        foreach ($values as $val) {
            $sumSquares += pow($val - $mean, 2);
        }

        return sqrt($sumSquares / ($count - 1));
    }
}
