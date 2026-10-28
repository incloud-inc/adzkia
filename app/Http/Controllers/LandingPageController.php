<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\ExamSession;
use App\Models\GradeLevel;
use App\Models\Question;
use App\Models\QuestionBank;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;
use Throwable;

class LandingPageController extends Controller
{
    /**
     * Display the public landing page for ADZKIA.
     */
    public function index(Request $request): View
    {
        if (app()->has('currentTenant')) {
            return app(TenantController::class)->showPublic($request, app('currentTenant')->subdomain);
        }
        $realTenants = 0;
        $realStudents = 0;
        $realGradeLevels = 0;
        $realQuestionBanks = 0;
        $realQuestions = 0;
        $realTotalExams = 0;
        $realMonthExams = 0;
        $realWeekExams = 0;
        $realAssessments = 0;

        try {
            if (Schema::hasTable('tenants')) {
                $realTenants = Tenant::count();
            }
            if (Schema::hasTable('tenant_user')) {
                $realStudents = DB::table('tenant_user')
                    ->where('role', 'U')
                    ->distinct('user_id')
                    ->count('user_id');
            } elseif (Schema::hasTable('users')) {
                $realStudents = User::count();
            }
            if (Schema::hasTable('grade_levels')) {
                $realGradeLevels = GradeLevel::count();
            }
            if (Schema::hasTable('question_banks')) {
                $realQuestionBanks = QuestionBank::count();
            }
            if (Schema::hasTable('questions')) {
                $realQuestions = Question::count();
            }
            if (Schema::hasTable('exam_sessions')) {
                $realTotalExams = ExamSession::count();
                $realMonthExams = ExamSession::where('created_at', '>=', now()->startOfMonth())->count();
                $realWeekExams = ExamSession::where('created_at', '>=', now()->startOfWeek())->count();
            }
            if (Schema::hasTable('assessments')) {
                $realAssessments = Assessment::count();
            }
        } catch (Throwable $e) {
            // Graceful fallback jika dalam in-memory testing atau environment belum migrate
        }

        // Format statistik menggunakan data aktual database
        $stats = [
            'tenants' => [
                'count' => number_format($realTenants, 0, ',', '.'),
                'label' => 'Sekolah dan BIMBEL Menggunakan ADZKIA',
                'badge' => 'Mitra Terpercaya',
            ],
            'students' => [
                'count' => number_format($realStudents, 0, ',', '.'),
                'label' => 'Murid/Pelajar melaksanakan Asesmen di ADZKIA',
                'badge' => 'Peserta Didik',
            ],
            'assessments' => [
                'count' => number_format($realAssessments, 0, ',', '.').' Asesmen',
                'label' => 'Siap digunakan untuk Murid, Mahasiswa, Profesional',
                'badge' => 'Free & PRO',
            ],
            'grade_levels' => [
                'count' => number_format($realGradeLevels, 0, ',', '.').' Jenjang',
                'label' => 'Mulai SD, SMP, SMA, hingga Perguruan Tinggi & Kedinasan',
                'badge' => 'Jenjang Lengkap',
            ],
            'curriculums' => [
                'count' => 'TKA • UTBK • SKD',
                'label' => 'Soal Asli TKA, UTBK (Sejak 2019), dan SKD Kedinasan & CPNS lengkap dengan PEMBAHASAN',
                'badge' => 'Seleksi Nasional',
            ],
            'languages' => [
                'count' => 'Global Test',
                'label' => 'TOEIC Simulation, TOEFL Preparation, dan IELTS Mock Test.',
                'badge' => 'Sertifikasi Bahasa',
            ],
            'question_bank' => [
                'count' => number_format($realQuestions, 0, ',', '.').' Butir',
                'label' => 'Bank Soal Tersedia di ADZKIA',
                'badge' => 'Repositori Soal',
            ],
            'total_exams' => [
                'count' => number_format($realTotalExams, 0, ',', '.'),
                'label' => 'Sesi Asesmen dilaksanakan',
                'badge' => 'Akumulasi CBT',
            ],
            'month_exams' => [
                'count' => number_format($realMonthExams, 0, ',', '.'),
                'label' => 'Sesi Asesmen dilaksanakan bulan ini',
                'badge' => 'Aktivitas Bulanan',
            ],
            'week_exams' => [
                'count' => number_format($realWeekExams, 0, ',', '.'),
                'label' => 'Sesi Asesmen dilaksanakan pekan ini',
                'badge' => 'Aktivitas Pekanan',
            ],
        ];

        return view('welcome', compact('stats'));
    }
}
