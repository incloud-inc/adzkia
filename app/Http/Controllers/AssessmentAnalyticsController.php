<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\ExamSession;
use App\Services\AssessmentExcelExportService;
use App\Services\ItemAnalysisService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AssessmentAnalyticsController extends Controller
{
    public function __construct(
        protected ItemAnalysisService $itemAnalysisService,
        protected AssessmentExcelExportService $excelExportService
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
     * Pratinjau Interaktif Rekap Hasil Asesmen Matriks per Butir Soal.
     */
    public function previewMatrix(Request $request, Assessment $assessment): View
    {
        $user = Auth::user();
        if (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser()) {
            abort(403, 'Akses terbatas untuk Dewan Guru & Pengawas.');
        }

        $currentTenant = $user->currentTenant;
        $tenantId = ($currentTenant && ! $user->isSuperUser()) ? $currentTenant->id : null;

        $matrixData = $this->excelExportService->getMatrixData($assessment, $tenantId);
        $isOwner = $user->isSuperUser();

        return view('assessments.analytics.preview', compact(
            'assessment',
            'matrixData',
            'isOwner',
            'currentTenant'
        ));
    }

    /**
     * Ekspor Rekap Nilai ke Format Excel (.xlsx).
     */
    public function exportExcel(Request $request, Assessment $assessment): BinaryFileResponse|StreamedResponse
    {
        $user = Auth::user();
        if (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser()) {
            abort(403, 'Akses terbatas untuk Dewan Guru & Pengawas.');
        }

        $currentTenant = $user->currentTenant;
        $tenantId = ($currentTenant && ! $user->isSuperUser()) ? $currentTenant->id : null;

        $safeTitle = preg_replace('/[^a-zA-Z0-9_\-]/', '_', $assessment->title);
        $filename = "Rekap_Hasil_{$safeTitle}_".now()->format('Ymd_His').'.xlsx';
        $tmp = tempnam(sys_get_temp_dir(), 'xlsx_rekap_');
        $tmpPath = $tmp.'.xlsx';
        @unlink($tmp);

        $this->excelExportService->exportToXlsx($assessment, $tenantId, $tmpPath);

        return response()->download($tmpPath, $filename, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ])->deleteFileAfterSend(true);
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
