<?php

namespace Database\Seeders;

use App\Models\Assessment;
use App\Models\AssessmentSection;
use App\Models\Question;
use App\Models\QuestionGroup;
use App\Models\QuestionOption;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssessmentDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Ensure Subject "Bahasa Indonesia" exists
        $subject = Subject::firstOrCreate(
            ['name' => 'Bahasa Indonesia'],
            [
                'code' => 'BIND',
                'description' => 'Mata pelajaran wajib tata bahasa, literasi, dan teks sastra.',
            ]
        );

        // 2. Identify default Tenant & User creator
        $tenant = Tenant::first() ?? Tenant::create([
            'name' => 'KEMENTERIAN PENDIDIKAN',
            'subdomain' => 'kemendik',
            'plan' => 'gratis',
        ]);

        $user = User::first() ?? User::create([
            'name' => 'Administrator',
            'email' => 'admin@adzkia.id',
            'password' => bcrypt('Masuk123!'),
            'current_tenant_id' => $tenant->id,
        ]);

        // Clean up previous seeded assessments for Bahasa Indonesia to prevent duplicates if re-run
        $existingAssessments = Assessment::withoutGlobalScopes()
            ->where('subject_id', $subject->id)
            ->where('created_by', $user->id)
            ->get();

        foreach ($existingAssessments as $oldAss) {
            foreach ($oldAss->sections as $sec) {
                foreach ($sec->questionGroups as $grp) {
                    foreach ($grp->questions as $q) {
                        $q->options()->delete();
                        $q->delete();
                    }
                    $grp->delete();
                }
                foreach ($sec->questions as $q) {
                    $q->options()->delete();
                    $q->delete();
                }
                $sec->delete();
            }
            $oldAss->delete();
        }

        $this->command->info('Memulai pembuatan 36 Asesmen Bahasa Indonesia (Kelas 1 s.d 12)...');

        $grades = [
            1 => '1 SD',
            2 => '2 SD',
            3 => '3 SD',
            4 => '4 SD',
            5 => '5 SD',
            6 => '6 SD',
            7 => '7 SMP',
            8 => '8 SMP',
            9 => '9 SMP',
            10 => '10 SMA',
            11 => '11 SMA',
            12 => '12 SMA',
        ];

        DB::beginTransaction();

        try {
            foreach ($grades as $gradeNum => $gradeLabel) {
                // Determine the 3 assessment types for this grade
                // Rules: 1 PH, 1 PTS, and (PAS or TKA for grade 6, 9, 12)
                $examTypes = [
                    ['type' => 'ph', 'label' => 'Penilaian Harian (PH)'],
                    ['type' => 'pts', 'label' => 'Penilaian Tengah Semester (PTS)'],
                ];

                if (in_array($gradeNum, [6, 9, 12])) {
                    $examTypes[] = ['type' => 'tka', 'label' => 'Tes Kemampuan Akademik (TKA)'];
                } else {
                    $examTypes[] = ['type' => 'pas', 'label' => 'Penilaian Akhir Semester (PAS)'];
                }

                foreach ($examTypes as $examInfo) {
                    $typeCode = $examInfo['type'];
                    $typeTitle = $examInfo['label'];
                    $title = "{$typeTitle} Bahasa Indonesia - Kelas {$gradeNum}";

                    $assessment = Assessment::create([
                        'tenant_id' => $tenant->id,
                        'subject_id' => $subject->id,
                        'created_by' => $user->id,
                        'title' => $title,
                        'type' => $typeCode,
                        'grade_level' => $gradeLabel,
                        'description' => "Asesmen resmi {$typeTitle} mata pelajaran Bahasa Indonesia tingkat {$gradeLabel}. Disusun sesuai kurikulum nasional dengan standar uji kompetensi terpadu.",
                        'duration_minutes' => 25,
                        'scoring_type' => 'standard',
                        'status' => 'published',
                        'price_type' => 'free',
                        'price' => 0.00,
                        'revenue_share_tenant_pct' => 0,
                        'revenue_share_platform_pct' => 100,
                        'settings' => [
                            'token' => 'ADZ'.rand(100, 999),
                            'validity_type' => 'forever',
                            'randomize_questions' => false,
                            'randomize_options' => false,
                            'passing_grade' => [
                                'enabled' => true,
                                'min_score' => 75,
                                'pass_label' => 'Tuntas / Kompeten',
                                'fail_label' => 'Remedial / Belum Tuntas',
                            ],
                            'scoring_template' => 'standard',
                            'formula_type' => 'raw_sum',
                            'post_exam_policy' => [
                                'teacher_review_required' => false,
                                'show_breakdown' => true,
                                'show_ranking' => true,
                                'show_instant_score' => true,
                                'release_mode' => 'immediate',
                            ],
                        ],
                    ]);

                    // Generate the 5 sections
                    $this->createAssessmentSections($assessment, $gradeNum, $typeTitle);
                }
            }

            DB::commit();
            $this->command->info('SUKSES! 36 Asesmen, 180 Section, dan 900 Soal berhasil digenerate.');
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->command->error('Terjadi kesalahan saat seeding: '.$e->getMessage());
            throw $e;
        }
    }

    /**
     * Create 5 sections for the assessment:
     * 1. Pilihan Ganda (Single Choice)
     * 2. Pilihan Ganda Multiple Answer (Kompleks)
     * 3. Benar / Salah (Binary Matrix)
     * 4. Menjodohkan (Matching Pairs)
     * 5. Isian Singkat
     */
    private function createAssessmentSections(Assessment $assessment, int $grade, string $typeTitle): void
    {
        $sectionsConfig = [
            [
                'order' => 1,
                'type' => 'mcq_single',
                'title' => 'Bagian I: Pilihan Ganda (Single Choice)',
                'instructions' => 'Pilihlah satu jawaban yang paling tepat untuk setiap pertanyaan berikut.',
            ],
            [
                'order' => 2,
                'type' => 'mcq_multiple',
                'title' => 'Bagian II: Pilihan Ganda Kompleks (Multiple Answer)',
                'instructions' => 'Pilihlah semua pernyataan atau opsi jawaban yang benar (bisa lebih dari satu).',
            ],
            [
                'order' => 3,
                'type' => 'binary_matrix',
                'title' => 'Bagian III: Analisis Pernyataan (Benar / Salah)',
                'instructions' => 'Tentukan status kebenaran dari masing-masing pernyataan berikut berdasarkan pemahaman materi.',
            ],
            [
                'order' => 4,
                'type' => 'matching',
                'title' => 'Bagian IV: Menjodohkan (Matching Pairs)',
                'instructions' => 'Pasangkanlah setiap konsep atau premis di sebelah kiri dengan pasangan yang sesuai di sebelah kanan.',
            ],
            [
                'order' => 5,
                'type' => 'short_answer',
                'title' => 'Bagian V: Isian Singkat',
                'instructions' => 'Jawablah pertanyaan berikut dengan kata, frasa, atau istilah singkat yang tepat.',
            ],
        ];

        foreach ($sectionsConfig as $sec) {
            $section = AssessmentSection::create([
                'assessment_id' => $assessment->id,
                'title' => $sec['title'],
                'instructions' => $sec['instructions'],
                'order' => $sec['order'],
                'duration_minutes' => 5,
            ]);

            // Create narrative stimulus for Q1-Q3
            $stimulusParagraph = $this->generateStimulusParagraph($grade, $sec['order']);

            $group = QuestionGroup::create([
                'assessment_section_id' => $section->id,
                'title' => "Wacana Literasi Bagian {$sec['order']}",
                'stimulus_type' => 'text',
                'stimulus_content' => $stimulusParagraph,
                'order' => 1,
            ]);

            // Questions 1 to 3 belong to QuestionGroup (stimulus-based)
            for ($qNum = 1; $qNum <= 3; $qNum++) {
                $this->createQuestionForSection($section, $group, $sec['type'], $grade, $qNum, true);
            }

            // Questions 4 and 5 are standalone (no stimulus group)
            for ($qNum = 4; $qNum <= 5; $qNum++) {
                $this->createQuestionForSection($section, null, $sec['type'], $grade, $qNum, false);
            }
        }
    }

    /**
     * Generate educational narrative paragraph adapted for grade level.
     */
    private function generateStimulusParagraph(int $grade, int $secOrder): string
    {
        if ($grade <= 3) {
            return 'Kancil dan Burung Pipit selalu bersahabat di tepi hutan rindang. Setiap pagi, mereka saling menyapa dan berbagi biji jagung manis. Suatu hari, angin kencang bertiup merusak sarang Pipit di dahan pohon mangga. Kancil dengan sigap mengumpulkan ranting-ranting kering dan daun ilalang untuk membantu merajut kembali sarang sahabatnya hingga nyaman dan aman.';
        }

        if ($grade <= 6) {
            return 'Hutan mangrove di pesisir utara Jawa memegang peranan krusial dalam menjaga keseimbangan ekosistem laut dan daratan. Selain meredam abrasi akibat hempasan gelombang ombak laut lepas, akar tunjang pohon bakau menyediakan habitat pemijahan yang aman bagi larva kepiting bakau serta aneka ikan karang. Upaya pelestarian vegetasi mangrove secara berkala oleh masyarakat pesisir menjadi langkah nyata dalam memitigasi dampak perubahan iklim global.';
        }

        if ($grade <= 9) {
            return 'Revolusi digital telah mentransformasi pola konsumsi informasi masyarakat secara signifikan. Kehadiran media sosial memungkinkan pertukaran data secara instan melintasi batas geografis, tetapi di sisi lain memicu disrupsi informasi berupa maraknya kabar bohong (hoaks). Oleh sebab itu, penguatan literasi digital kritis dan verifikasi silang terhadap sumber primer menjadi benteng etis yang wajib dikuasai generasi muda.';
        }

        // SMA Grades (10-12)
        return 'Diskursus kebudayaan kontemporer menuntut revitalisasi kearifan lokal di tengah akselerasi modernitas dan arus globalisasi pasar bebas. Tradisi lisan dan manuskrip klasik nusantara menyimpan dialektika kosmologis yang harmonis antara relasi manusia dengan alam. Pengabaian terhadap narasi kultural berisiko mendegradasi identitas nasional, sehingga konversi nilai-nilai kearifan lokal ke dalam medium edukasi digital mutlak diperlukan.';
    }

    /**
     * Build questions & options based on section question type.
     */
    private function createQuestionForSection(
        AssessmentSection $section,
        ?QuestionGroup $group,
        string $type,
        int $grade,
        int $qNum,
        bool $useStimulus
    ): Question {
        $contextPrefix = $useStimulus ? 'Berdasarkan wacana di atas, ' : 'Dalam kaidah bahasa Indonesia, ';

        $prompts = [
            'mcq_single' => [
                1 => "{$contextPrefix}apa gagasan utama yang disampaikan pada teks tersebut?",
                2 => "{$contextPrefix}makna kata kunci yang tersirat dalam wacana adalah...",
                3 => "{$contextPrefix}kesimpulan yang paling tepat dari isi teks adalah...",
                4 => "{$contextPrefix}manakah kalimat berikut yang menggunakan tanda baca dan ejaan (EYD) secara tepat?",
                5 => "{$contextPrefix}imbuhan 'ber-' yang menyatakan perbuatan saling berbalas (resiprokal) terdapat pada kalimat...",
            ],
            'mcq_multiple' => [
                1 => "{$contextPrefix}tentukan fakta atau informasi yang sesuai dengan isi wacana! (Pilih semua yang benar)",
                2 => "{$contextPrefix}karakteristik dan unsur intrinsik apa sajakah yang dapat ditemukan pada bacaan?",
                3 => "{$contextPrefix}manakah pesan moral atau hikmah edukatif yang tersurat maupun tersirat dalam teks?",
                4 => "{$contextPrefix}pilihlah kelompok kata yang termasuk ke dalam kategori frasa nominal yang baku!",
                5 => "{$contextPrefix}manakah pernyataan di bawah ini yang tergolong fakta objektif dalam teks laporan hasil observasi?",
            ],
            'binary_matrix' => [
                1 => "{$contextPrefix}analisislah kebenaran pernyataan-pernyataan berikut berdasarkan isi paragraf!",
                2 => "{$contextPrefix}tentukan validitas dari setiap butir informasi yang disajikan!",
                3 => "{$contextPrefix}evaluasilah argumen dan simpulan berikut sesuai konteks bacaan!",
                4 => "{$contextPrefix}tentukan apakah kaidah kebahasaan pada kalimat berikut tergolong baku atau tidak baku!",
                5 => "{$contextPrefix}analisislah ketepatan konjungsi intrakalimat pada setiap butir pernyataan di bawah ini!",
            ],
            'matching' => [
                1 => "{$contextPrefix}jodohkanlah kata atau istilah dalam teks dengan maknanya yang paling tepat!",
                2 => "{$contextPrefix}pasangkanlah tokoh/unsur wacana dengan peranannya masing-masing!",
                3 => "{$contextPrefix}hubungkanlah hubungan sebab-akibat yang diuraikan di dalam bacaan!",
                4 => "{$contextPrefix}pasangkanlah jenis teks berikut dengan struktur generik pembentuknya!",
                5 => "{$contextPrefix}jodohkanlah majas/gaya bahasa dengan contoh kalimat yang relevan!",
            ],
            'short_answer' => [
                1 => "{$contextPrefix}tuliskan satu kata kunci yang menjadi topik utama bahasan pada paragraf!",
                2 => "{$contextPrefix}sebutkan subjek atau pelaku utama yang diceritakan dalam teks!",
                3 => "{$contextPrefix}apa sinonim baku dari kata yang dicetak tebal dalam wacana?",
                4 => "{$contextPrefix}sebutan bagi teks yang berisi paparan fakta secara sistematis untuk meyakinkan pembaca adalah...",
                5 => "{$contextPrefix}tanda baca yang digunakan untuk memisahkan anak kalimat yang mendahului induk kalimat adalah tanda...",
            ],
        ];

        $promptText = $prompts[$type][$qNum] ?? "Pertanyaan nomor {$qNum} untuk materi bahasa Indonesia kelas {$grade}.";

        if ($grade === 12 && $qNum === 1) {
            $promptText .= "\n\n![segitiga siku-siku.webp](https://pub-aeb2ed90015841b3aa9346f044e853a9.r2.dev/asesmen/YQqjHBJTCflSIP1XktU3a3kwHa7kjt0Tk1pikv0h.webp)\n\n";
        }

        $question = Question::create([
            'assessment_section_id' => $section->id,
            'question_group_id' => $group?->id,
            'type' => $type,
            'prompt' => $promptText,
            'explanation' => "Pembahasan Soal {$qNum}: Kunci jawaban merujuk pada analisis komprehensif struktur teks dan kaidah tata bahasa Indonesia.",
            'points' => 1.00,
            'settings' => ($type === 'binary_matrix') ? ['labels' => ['Benar', 'Salah']] : null,
            'order' => $qNum,
        ]);

        // Build specific options based on type
        switch ($type) {
            case 'mcq_single':
                $labels = ($grade <= 6) ? ['A', 'B', 'C', 'D'] : ['A', 'B', 'C', 'D', 'E'];
                foreach ($labels as $idx => $lbl) {
                    QuestionOption::create([
                        'question_id' => $question->id,
                        'label' => $lbl,
                        'option_text' => "Pilihan jawaban {$lbl} yang mewakili analisis materi butir soal ke-{$qNum}.",
                        'is_correct' => ($idx === 0), // Opsi A selalu benar sebagai kunci seeder
                        'score' => ($idx === 0) ? 1.00 : 0.00,
                        'order' => $idx + 1,
                    ]);
                }
                break;

            case 'mcq_multiple':
                $labels = ['A', 'B', 'C', 'D'];
                foreach ($labels as $idx => $lbl) {
                    $isCorrect = ($idx === 0 || $idx === 2); // A dan C benar
                    QuestionOption::create([
                        'question_id' => $question->id,
                        'label' => $lbl,
                        'option_text' => "Pernyataan analisis opsi {$lbl} mengenai konteks bahasa Indonesia.",
                        'is_correct' => $isCorrect,
                        'score' => $isCorrect ? 0.50 : 0.00,
                        'order' => $idx + 1,
                    ]);
                }
                break;

            case 'binary_matrix':
                $statements = [
                    ['text' => 'Informasi ini selaras secara eksplisit dengan gagasan dalam materi.', 'match' => 'Benar'],
                    ['text' => 'Pernyataan ini bertentangan dengan fakta objektif yang termuat.', 'match' => 'Salah'],
                    ['text' => 'Kaidah tata kalimat yang digunakan telah memenuhi standar kebakuan.', 'match' => 'Benar'],
                ];
                foreach ($statements as $idx => $st) {
                    QuestionOption::create([
                        'question_id' => $question->id,
                        'label' => (string) ($idx + 1),
                        'option_text' => $st['text'],
                        'is_correct' => true,
                        'match_key' => $st['match'],
                        'score' => 1.00,
                        'order' => $idx + 1,
                    ]);
                }
                break;

            case 'matching':
                $pairs = [
                    ['premis' => 'Topik Utama', 'jawaban' => 'Inti sari atau gagasan pokok pembahasan'],
                    ['premis' => 'Kosakata Baku', 'jawaban' => 'Kata yang sesuai dengan pedoman KBBI'],
                    ['premis' => 'Simpulan', 'jawaban' => 'Keputusan akhir yang dirumuskan secara logis'],
                ];
                foreach ($pairs as $idx => $pair) {
                    QuestionOption::create([
                        'question_id' => $question->id,
                        'label' => (string) ($idx + 1),
                        'option_text' => $pair['premis'],
                        'match_key' => $pair['jawaban'],
                        'is_correct' => true,
                        'score' => 1.00,
                        'order' => $idx + 1,
                    ]);
                }
                break;

            case 'short_answer':
                $keys = [
                    1 => 'Literasi',
                    2 => 'Tokoh Utama',
                    3 => 'Cermat',
                    4 => 'Teks Eksposisi',
                    5 => 'Koma',
                ];
                QuestionOption::create([
                    'question_id' => $question->id,
                    'label' => 'Kunci Jawaban',
                    'option_text' => $keys[$qNum] ?? 'Bahasa',
                    'is_correct' => true,
                    'score' => 1.00,
                    'order' => 1,
                ]);
                break;
        }

        return $question;
    }
}
