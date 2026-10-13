<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\GradeLevel;
use App\Models\Tenant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TenantController extends Controller
{
    /**
     * Show the public profile / portal page of a tenant by subdomain.
     */
    public function showPublic(Request $request, ?string $subdomain = null): View
    {
        $subdomain = $subdomain ?? $request->route('subdomain');
        if (! $subdomain) {
            $host = $request->getHost();
            $baseDomain = config('app.url_base_domain', 'localhost');
            $subdomain = str_replace('.'.$baseDomain, '', $host);
        }

        $tenant = Tenant::where('subdomain', $subdomain)->firstOrFail();

        // 1. Ambil asesmen terkelompok dari database
        $rawAssessments = Assessment::withoutGlobalScopes()
            ->whereIn('status', ['published', 'active'])
            ->with('subject')
            ->withCount('questions')
            ->orderBy('id', 'desc')
            ->get();

        $assessmentGroups = Assessment::getGroupedAssessments($tenant);

        // 2. Guru & Siswa di tenant ini
        $teachersQuery = $tenant->users()->wherePivot('role', 'T')->latest('id');
        $studentsQuery = $tenant->users()->wherePivot('role', 'U')->latest('id');

        $totalTeachers = $teachersQuery->count();
        $totalStudents = $studentsQuery->count();

        // Data Guru (terbaru lebih dulu)
        $teachers = $teachersQuery->get()->map(function ($teacher) {
            return [
                'id' => $teacher->id,
                'name' => $teacher->name,
                'photo_url' => $teacher->profile_photo_url,
                'bio' => $teacher->bio ?: 'Tenaga Pendidik & Pengajar',
                'username' => $teacher->username,
                'profile_url' => route('global.student.profile', $teacher->username ?: $teacher->id),
            ];
        });

        // Data Siswa (terbaru lebih dulu)
        $students = $studentsQuery->get()->map(function ($student) {
            return [
                'id' => $student->id,
                'name' => $student->name,
                'photo_url' => $student->profile_photo_url,
                'bio' => $student->bio ?: 'Peserta Didik Aktif',
                'username' => $student->username,
                'profile_url' => route('global.student.profile', $student->username ?: $student->id),
            ];
        });

        // ON/OFF Jenjang dari setting tenant
        $showGradeSd = $tenant->showGrade('sd');
        $showGradeSmp = $tenant->showGrade('smp');
        $showGradeSma = $tenant->showGrade('sma');
        $showGradeTkaSd = $tenant->showGrade('tka_sd');
        $showGradeTkaSmp = $tenant->showGrade('tka_smp');
        $showGradeTkaSma = $tenant->showGrade('tka_sma');
        $showGradeUtbk = $tenant->showGrade('utbk');
        $showGradeSkd = $tenant->showGrade('skd');

        // Total asesmen unik dari database
        $totalAssessmentsCount = $rawAssessments->count() > 0 ? $rawAssessments->count() : 10;

        $schoolGrade = $tenant->getSchoolGrade();
        $schoolGrades = $tenant->getSchoolGrades();
        $proGroups = $tenant->getProGroups();
        $themePalette = $tenant->getThemePalette();

        $studentTargetGrade = null;
        if (auth()->check()) {
            $currentUser = auth()->user();
            if ($currentUser->isStudent()) {
                $targetConfig = $currentUser->getBiolinkTarget();
                $cat = $targetConfig['category'] ?? null;
                if ($cat && (in_array((string) $cat, ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'], true) || preg_match('/^(?:kelas_)?([1-9]|1[0-2])$/', (string) $cat, $m))) {
                    $gradeNum = is_numeric($cat) ? (int) $cat : (int) ($m[1] ?? 0);
                    if ($gradeNum >= 1 && $gradeNum <= 12) {
                        $studentTargetGrade = $gradeNum;
                    }
                }
            }
        }

        $catalogDataset = $this->buildCatalogDataset($rawAssessments, $studentTargetGrade);
        $proCardsData = $this->buildProCards($rawAssessments, $proGroups);

        return view('tenants.public', [
            'tenant' => $tenant,
            'schoolGrade' => $schoolGrade,
            'schoolGrades' => $schoolGrades,
            'studentTargetGrade' => $studentTargetGrade,
            'proGroups' => $proGroups,
            'themePalette' => $themePalette,
            'catalogDataset' => $catalogDataset,
            'proCardsData' => $proCardsData,
            'jenjangLabel' => 'Asesmen',
            'jenjangAssessmentsCount' => $totalAssessmentsCount,
            'totalAssessments' => $totalAssessmentsCount,
            'totalTeachers' => $totalTeachers,
            'totalStudents' => $totalStudents,
            'allTeachers' => $teachers,
            'allStudents' => $students,
            'umumAssessments' => $assessmentGroups['umum'],
            'sdAssessments' => $assessmentGroups['sd'],
            'smpAssessments' => $assessmentGroups['smp'],
            'smaAssessments' => $assessmentGroups['sma'],
            'showGradeSd' => $showGradeSd,
            'showGradeSmp' => $showGradeSmp,
            'showGradeSma' => $showGradeSma,
            'showGradeTkaSd' => $showGradeTkaSd,
            'showGradeTkaSmp' => $showGradeTkaSmp,
            'showGradeTkaSma' => $showGradeTkaSma,
            'showGradeUtbk' => $showGradeUtbk,
            'showGradeSkd' => $showGradeSkd,
            'tkaSdAssessments' => $assessmentGroups['tka_sd'],
            'tkaSmpAssessments' => $assessmentGroups['tka_smp'],
            'tkaSmaAssessments' => $assessmentGroups['tka_sma'],
            'utbkAssessments' => $assessmentGroups['utbk'],
            'skdAssessments' => $assessmentGroups['skd'],
        ]);
    }

    /**
     * Susun dataset katalog mata pelajaran per jenjang dan kelas dengan data asesmen riil.
     */
    protected function buildCatalogDataset($assessments, ?int $studentTargetGrade = null): array
    {
        $dataset = [
            'sma' => [
                '10' => [],
                '11' => [],
                '12' => [],
            ],
            'smp' => [
                '7' => [],
                '8' => [],
                '9' => [],
            ],
            'sd' => [
                '1' => [],
                '2' => [],
                '3' => [],
                '4' => [],
                '5' => [],
                '6' => [],
            ],
        ];

        // Format asesmen riil menjadi card
        $formatCard = function ($a) {
            $subjectName = $a->subject?->name ?? 'Umum';
            $badge = $a->subject?->code ?: strtoupper(substr(preg_replace('/[^a-zA-Z]/', '', $subjectName) ?: 'UMU', 0, 3));
            $soal = $a->questions_count ?: 20;
            $durasi = $a->duration_minutes ?: 60;

            return [
                'id' => $a->id,
                'badge' => $badge,
                'title' => $a->title,
                'subject' => $subjectName,
                'count' => "{$soal} Soal • {$durasi} Mnt",
                'url' => route('exam.gate.show', ['assessment' => $a->token ?: $a->id]),
                'token' => $a->token,
                'price_type' => $a->price_type ?? 'free',
                'price' => $a->price ?? 0,
            ];
        };

        foreach ($assessments as $a) {
            $grade = strtoupper(trim((string) $a->grade_level));

            // Cek SD (1-6)
            if (str_contains($grade, 'SD') || in_array($grade, ['1', '2', '3', '4', '5', '6'])) {
                if (preg_match('/[1-6]/', $grade, $m)) {
                    $dataset['sd'][$m[0]][] = $formatCard($a);
                }
            } elseif ($grade === 'TKASD') {
                $dataset['sd']['1'][] = $formatCard($a);
            }

            // Cek SMP (7-9)
            if (str_contains($grade, 'SMP') || in_array($grade, ['7', '8', '9'])) {
                if (preg_match('/[7-9]/', $grade, $m)) {
                    $dataset['smp'][$m[0]][] = $formatCard($a);
                }
            } elseif ($grade === 'TKASMP') {
                $dataset['smp']['7'][] = $formatCard($a);
            }

            // Cek SMA (10-12)
            if (str_contains($grade, 'SMA') || in_array($grade, ['10', '11', '12'])) {
                if (preg_match('/10|11|12/', $grade, $m)) {
                    $dataset['sma'][$m[0]][] = $formatCard($a);
                }
            } elseif ($grade === 'TKASMA') {
                $dataset['sma']['10'][] = $formatCard($a);
            } elseif (in_array($grade, ['UTBK', 'SKD'])) {
                $dataset['sma']['12'][] = $formatCard($a);
            }
        }

        // Lengkapi dengan fallback kurikulum jika kelas tertentu belum memiliki asesmen
        $standardFallback = [
            'sma' => [
                '10' => [
                    ['badge' => 'BIO', 'title' => 'Keanekaragaman Hayati', 'subject' => 'Biologi SMA', 'count' => '40 Soal • 60 Mnt', 'url' => '#'],
                    ['badge' => 'MTK', 'title' => 'Fungsi Kuadrat & Logaritma', 'subject' => 'Matematika Wajib', 'count' => '30 Soal • 45 Mnt', 'url' => '#'],
                    ['badge' => 'FIS', 'title' => 'Hukum Newton & Gravitasi', 'subject' => 'Fisika SMA', 'count' => '25 Soal • 50 Mnt', 'url' => '#'],
                ],
                '11' => [
                    ['badge' => 'KIM', 'title' => 'Termokimia & Laju Reaksi', 'subject' => 'Kimia SMA', 'count' => '30 Soal • 50 Mnt', 'url' => '#'],
                    ['badge' => 'FIS', 'title' => 'Dinamika Rotasi & Fluida', 'subject' => 'Fisika SMA', 'count' => '25 Soal • 50 Mnt', 'url' => '#'],
                    ['badge' => 'MTK', 'title' => 'Trigonometri Lanjut & Polinomial', 'subject' => 'Matematika Peminatan', 'count' => '30 Soal • 60 Mnt', 'url' => '#'],
                ],
                '12' => [
                    ['badge' => 'MTK', 'title' => 'Limit Fungsi & Turunan Aljabar', 'subject' => 'Matematika Kelas 12', 'count' => '35 Soal • 60 Mnt', 'url' => '#'],
                    ['badge' => 'FIS', 'title' => 'Rangkaian Arus Bolak-Balik', 'subject' => 'Fisika Kelas 12', 'count' => '30 Soal • 55 Mnt', 'url' => '#'],
                    ['badge' => 'KIM', 'title' => 'Sifat Koligatif Larutan & Redoks', 'subject' => 'Kimia Kelas 12', 'count' => '30 Soal • 50 Mnt', 'url' => '#'],
                ],
            ],
            'smp' => [
                '7' => [
                    ['badge' => 'MTK', 'title' => 'Operasi Bilangan Bulat & Pecahan', 'subject' => 'Matematika SMP', 'count' => '30 Soal • 45 Mnt', 'url' => '#'],
                    ['badge' => 'IPA', 'title' => 'Klasifikasi Makhluk Hidup', 'subject' => 'IPA Terpadu', 'count' => '25 Soal • 40 Mnt', 'url' => '#'],
                ],
                '8' => [
                    ['badge' => 'MTK', 'title' => 'Pola Bilangan & Teorema Pythagoras', 'subject' => 'Matematika SMP', 'count' => '30 Soal • 45 Mnt', 'url' => '#'],
                    ['badge' => 'IPA', 'title' => 'Sistem Gerak & Pencernaan Makanan', 'subject' => 'IPA Terpadu', 'count' => '30 Soal • 45 Mnt', 'url' => '#'],
                ],
                '9' => [
                    ['badge' => 'MTK', 'title' => 'Perpangkatan & Transformasi Geometri', 'subject' => 'Matematika SMP', 'count' => '30 Soal • 50 Mnt', 'url' => '#'],
                    ['badge' => 'IPA', 'title' => 'Listrik Statis & Kemagnetan', 'subject' => 'IPA Terpadu', 'count' => '35 Soal • 50 Mnt', 'url' => '#'],
                ],
            ],
            'sd' => [
                '1' => [
                    ['badge' => 'MAT', 'title' => 'Mengenal Angka & Penjumlahan 1-20', 'subject' => 'Matematika Dasar', 'count' => '15 Soal • 25 Mnt', 'url' => '#'],
                ],
                '2' => [
                    ['badge' => 'MAT', 'title' => 'Pengurangan, Waktu & Panjang', 'subject' => 'Matematika Dasar', 'count' => '20 Soal • 30 Mnt', 'url' => '#'],
                ],
                '3' => [
                    ['badge' => 'MAT', 'title' => 'Perkalian & Pembagian Dasar', 'subject' => 'Matematika Kelas 3', 'count' => '20 Soal • 30 Mnt', 'url' => '#'],
                ],
                '4' => [
                    ['badge' => 'MAT', 'title' => 'KPK, FPB & Keliling Bangun Datar', 'subject' => 'Matematika Kelas 4', 'count' => '25 Soal • 40 Mnt', 'url' => '#'],
                ],
                '5' => [
                    ['badge' => 'MAT', 'title' => 'Pecahan Campuran & Desimal', 'subject' => 'Matematika Kelas 5', 'count' => '25 Soal • 40 Mnt', 'url' => '#'],
                ],
                '6' => [
                    ['badge' => 'MAT', 'title' => 'Operasi Hitung Campuran & Lingkaran', 'subject' => 'Matematika Kelas 6', 'count' => '30 Soal • 45 Mnt', 'url' => '#'],
                ],
            ],
        ];

        foreach ($dataset as $jenjang => $grades) {
            foreach ($grades as $gradeNum => $items) {
                if ($studentTargetGrade !== null) {
                    $allowedJenjang = match (true) {
                        $studentTargetGrade >= 10 && $studentTargetGrade <= 12 => 'sma',
                        $studentTargetGrade >= 7 && $studentTargetGrade <= 9 => 'smp',
                        default => 'sd',
                    };
                    if ($jenjang !== $allowedJenjang || (string) $gradeNum !== (string) $studentTargetGrade) {
                        continue;
                    }
                }
                if (empty($items) && isset($standardFallback[$jenjang][$gradeNum])) {
                    $dataset[$jenjang][$gradeNum] = $standardFallback[$jenjang][$gradeNum];
                }
            }
        }

        if ($studentTargetGrade !== null) {
            $allowedJenjang = match (true) {
                $studentTargetGrade >= 10 && $studentTargetGrade <= 12 => 'sma',
                $studentTargetGrade >= 7 && $studentTargetGrade <= 9 => 'smp',
                default => 'sd',
            };
            $targetGradeStr = (string) $studentTargetGrade;

            foreach ($dataset as $jenjang => $grades) {
                if ($jenjang !== $allowedJenjang) {
                    $dataset[$jenjang] = [];
                } else {
                    foreach (array_keys($grades) as $gradeNum) {
                        if ((string) $gradeNum !== $targetGradeStr) {
                            $dataset[$jenjang][$gradeNum] = [];
                        }
                    }
                }
            }
        }

        return $dataset;
    }

    /**
     * Susun kartu-kartu PRO dengan data asesmen riil dari database dan master kelas GradeLevel.
     */
    protected function buildProCards($assessments, array $activeProGroups): array
    {
        $mapItem = function ($a) {
            $subjectName = $a->subject?->name ?? 'Umum';
            $soal = $a->questions_count ?: 2;
            $durasi = $a->duration_minutes ?: 90;

            // Mengambil icon/badge dari kode mata pelajaran
            $badge = $a->subject?->code ?: strtoupper(substr(preg_replace('/[^a-zA-Z]/', '', $subjectName) ?: 'UMU', 0, 3));

            return [
                'id' => $a->id,
                'name' => $a->title,
                'desc' => "{$subjectName} • {$a->grade_level}",
                'count' => "{$soal} Soal • {$durasi} Mnt",
                'url' => route('exam.gate.show', ['assessment' => $a->token ?: $a->id]),
                'token' => $a->token,
                'badge' => $badge,
                'price_type' => $a->price_type ?? 'free',
                'price' => $a->price ?? 0,
            ];
        };

        $byGrade = function ($keywords) use ($assessments) {
            return $assessments->filter(function ($a) use ($keywords) {
                $gl = strtoupper(trim((string) $a->grade_level));
                $type = strtolower((string) $a->type);
                $title = strtoupper((string) $a->title);

                foreach ((array) $keywords as $kw) {
                    $uKw = strtoupper($kw);
                    $lKw = strtolower($kw);
                    if ($gl === $uKw || str_contains($gl, $uKw) || $type === $lKw || str_contains($title, $uKw)) {
                        return true;
                    }
                }

                return false;
            })->values();
        };

        // Ambil data master kelas non-sekolah reguler dari database
        $masterGrades = GradeLevel::where(function ($q) {
            $q->where('group', 'PRO')
                ->orWhereNotIn('group', [
                    'Sekolah Dasar (SD)',
                    'Sekolah Menengah Pertama (SMP)',
                    'Sekolah Menengah Atas / Kejuruan (SMA/SMK)',
                ]);
        })->get()->keyBy('value');

        // Preset metadata & fallback untuk jenjang PRO yang umum
        $presetMetadata = [
            'PRO' => [
                'tag' => 'PRO',
                'title' => 'Soal Asli dan Prediksi untuk PROFESIONAL',
                'badge' => '',
                'filter' => ['PRO'],
                'defaults' => [
                    ['name' => 'Simulasi Skolastik Lanjut', 'desc' => 'Penalaran Analitis & Pemecahan Masalah', 'badge' => 'TPS'],
                    ['name' => 'Drill Logika & Numerasi Cepat', 'desc' => 'Trik Algoritma & Aritmetika Praktis', 'badge' => 'NUM'],
                    ['name' => 'Literasi Analisis Komprehensif', 'desc' => 'Interpretasi Teks & Data Statistik', 'badge' => 'LIT'],
                ],
            ],
            'UTBK' => [
                'tag' => 'UTBK SNBT',
                'title' => 'Soal ASLI dan PEMBAHASAN Sejak 2019',
                'badge' => '',
                'filter' => ['UTBK', 'SNBT'],
                'defaults' => [
                    ['name' => 'Penalaran Umum (PU)', 'desc' => 'Silogisme, Induktif & Penalaran Analitis', 'badge' => 'PU'],
                    ['name' => 'Pengetahuan Kuantitatif', 'desc' => 'Aljabar, Bilangan, Geometri & Peluang', 'badge' => 'PK'],
                    ['name' => 'Literasi B. Indonesia & Inggris', 'desc' => 'Pemahaman Bacaan Kritis & Literasi Analitis', 'badge' => 'LIT'],
                ],
            ],
            'SKD' => [
                'tag' => 'SKD KEDINASAN & CPNS',
                'title' => 'Soal ASLI dan PREDIKSI dilengkapi PEMBAHASAN',
                'badge' => '',
                'filter' => ['SKD', 'CPNS'],
                'defaults' => [
                    ['name' => 'Tes Wawasan Kebangsaan (TWK)', 'desc' => 'Pancasila, UUD 1945, NKRI & Bhinneka Tunggal Ika', 'badge' => 'TWK'],
                    ['name' => 'Tes Inteligensi Umum (TIU)', 'desc' => 'Kemampuan Verbal, Numerik & Figural Sistem CAT', 'badge' => 'TIU'],
                    ['name' => 'Tes Karakteristik Pribadi (TKP)', 'desc' => 'Pelayanan Publik, Jejaring Kerja & Profesionalisme', 'badge' => 'TKP'],
                ],
            ],
            'TKASD' => [
                'tag' => 'TKA SD',
                'title' => 'Tes Kemampuan Akademik (TKA) SD',
                'badge' => '',
                'filter' => ['TKASD', 'TKA SD'],
                'defaults' => [
                    ['name' => 'Olimpiade Sains Kuark SD', 'desc' => 'Eksperimen & Konsep Alam Sekitar', 'badge' => 'IPA'],
                    ['name' => 'Matematika Nalaria Realistik', 'desc' => 'Problem Solving & Logika Matematika', 'badge' => 'MTK'],
                    ['name' => 'Literasi Membaca Ceria', 'desc' => 'Pemahaman Wacana & Cerita Naratif', 'badge' => 'IND'],
                ],
            ],
            'TKASMP' => [
                'tag' => 'TKA SMP',
                'title' => 'Tes Kemampuan Akademik (TKA) SMP',
                'badge' => '',
                'filter' => ['TKASMP', 'TKA SMP'],
                'defaults' => [
                    ['name' => 'Matematika Olimpiade SMP', 'desc' => 'Teori Bilangan & Kombinatorika', 'badge' => 'MTK'],
                    ['name' => 'IPA Terpadu Lanjut', 'desc' => 'Mekanika Fisika & Sel Tubuh', 'badge' => 'IPA'],
                    ['name' => 'English Proficiency Junior', 'desc' => 'Grammar, Listening & Vocabulary Prep', 'badge' => 'ENG'],
                ],
            ],
            'TKASMA' => [
                'tag' => 'TKA SMA',
                'title' => 'Tes Kemampuan Akademik (TKA) SMA',
                'badge' => '',
                'filter' => ['TKASMA', 'TKA SMA'],
                'defaults' => [
                    ['name' => 'Fisika Modern & Termodinamika', 'desc' => 'Mekanika Kuantum & Fluida Bergerak', 'badge' => 'FIS'],
                    ['name' => 'Kimia Larutan & Organik', 'desc' => 'Termokimia, Laju & Kesetimbangan', 'badge' => 'KIM'],
                    ['name' => 'Kalkulus Terapan & Aljabar', 'desc' => 'Limit Fungsi, Turunan & Integral', 'badge' => 'MTK'],
                ],
            ],
        ];

        // Legacy mapping jika tenant masih memakai key lama (pro_kelas_10, pro_kedinasan, dll)
        $legacyKeyMap = [
            'pro_kelas_10' => 'TKASMA',
            'pro_kelas_11' => 'TKASMA',
            'pro_kelas_12' => 'UTBK',
            'pro_kedinasan' => 'SKD',
            'pro_utbk' => 'UTBK',
            'pro_tka' => 'TKASMA',
            'pro_smp_unggul' => 'TKASMP',
            'pro_sd_olimpiade' => 'TKASD',
        ];

        $gradPalette = [
            'from-blue-600 via-indigo-600 to-purple-600',
            'from-emerald-500 via-teal-600 to-cyan-700',
            'from-amber-500 via-orange-600 to-rose-600',
            'from-violet-600 to-indigo-700',
            'from-rose-600 via-red-600 to-amber-600',
        ];

        $proCards = [];

        foreach ($activeProGroups as $pKey) {
            // Normalkan key jika legacy
            $normKey = $legacyKeyMap[$pKey] ?? $pKey;

            // Cari di master kelas atau di preset metadata
            $gl = $masterGrades->get($normKey);
            $preset = $presetMetadata[$normKey] ?? null;

            if (! $gl && ! $preset) {
                continue;
            }

            $tag = $preset['tag'] ?? ($gl ? strtoupper($gl->name) : strtoupper($normKey));
            $title = $preset['title'] ?? ($gl ? "Paket Ujian {$gl->name}" : "Simulasi {$normKey}");
            $badge = $preset['badge'] ?? ($gl ? ($gl->group ?: 'Program PRO') : 'Program Pilihan');
            $filterKeywords = $preset['filter'] ?? [$normKey, $gl?->value, $gl?->name];

            $matchedAssessments = $byGrade(array_filter($filterKeywords));

            $cardItems = [];
            $idx = 0;
            foreach ($matchedAssessments as $a) {
                $cardItems[] = $mapItem($a);
                if (count($cardItems) >= 3) {
                    break;
                }
            }

            // Lengkapi jika asesmen riil kurang dari 3
            if (count($cardItems) < 3) {
                $fallbacks = $preset['defaults'] ?? [
                    ['name' => "TryOut Utama {$tag}", 'desc' => 'Simulasi & Evaluasi Standar Nasional', 'badge' => 'TO'],
                    ['name' => "Drill Soal Intensif {$tag}", 'desc' => 'Bank Soal Latihan & Pembahasan Mendalam', 'badge' => 'CBT'],
                    ['name' => "Uji Kompetensi Mandiri {$tag}", 'desc' => 'Pengukuran Pemahaman & Rekap Analitis', 'badge' => 'TRY'],
                ];

                foreach ($fallbacks as $fallbackItem) {
                    if (count($cardItems) >= 3) {
                        break;
                    }
                    $cardItems[] = $fallbackItem;
                }
            }

            $readyCount = max(count($matchedAssessments), 3);

            $proCards[$pKey] = [
                'tag' => $tag,
                'title' => $title,
                'badge' => $badge,
                'ready' => "{$readyCount} Paket Siap",
                'items' => $cardItems,
            ];
        }

        return $proCards;
    }

    /**
     * Show the tenant selection screen.
     */
    public function select(): View|RedirectResponse
    {
        $user = Auth::user();

        // Super User / OWNER does not need to select tenant
        if ($user->isSuperUser()) {
            return redirect()->route('dashboard');
        }

        $tenants = $user->tenants;

        return view('auth.select-tenant', compact('tenants'));
    }

    /**
     * Switch to a specific tenant or global overview.
     */
    public function switch(Request $request, string $tenant): RedirectResponse
    {
        $user = Auth::user();

        // Allow Super User to switch back to global overview
        if ($tenant === 'global' && $user->isSuperUser()) {
            $user->update(['current_tenant_id' => null]);

            return redirect()->route('dashboard');
        }

        $tenantModel = Tenant::findOrFail($tenant);

        // Ensure the user actually belongs to this tenant, or is Super User
        if (! $user->isSuperUser() && ! $user->tenants()->where('tenant_id', $tenantModel->id)->exists()) {
            abort(403, 'Unauthorized access to this tenant.');
        }

        $user->switchTenant($tenantModel);

        return redirect()->route('dashboard');
    }
}
