<?php

namespace App\Services;

use App\Models\Assessment;
use App\Models\Question;
use App\Models\QuestionGroup;
use App\Models\QuestionOption;
use Illuminate\Support\Facades\DB;

class AssessmentVariantService
{
    /**
     * Regenerate and replace questions for a given variant (1 or 2).
     * Variant 2: Replaces questions for all "Quiz 2", "#2", and "(Paket B)" assessments.
     * Variant 1: Replaces questions for all "Quiz 1", "#1", and "(Paket A)" assessments.
     *
     * @return array{assessments_updated: int, questions_updated: int}
     */
    public function regenerateVariant(int $variant = 2, ?callable $progressCallback = null): array
    {
        $searchTerms = ($variant === 2)
            ? ['Quiz 2', '#2', '(Paket B)']
            : ['Quiz 1', '#1', '(Paket A)'];

        $assessments = Assessment::withoutGlobalScopes()
            ->where(function ($q) use ($searchTerms) {
                foreach ($searchTerms as $term) {
                    $q->orWhere('title', 'like', "%{$term}%");
                }
            })
            ->with(['subject', 'sections.questionGroups', 'sections.questions.options'])
            ->get();

        $assessmentsCount = 0;
        $questionsCount = 0;

        foreach ($assessments as $assessment) {
            DB::beginTransaction();
            try {
                $qCount = $this->transformAssessment($assessment, $variant);
                DB::commit();

                $assessmentsCount++;
                $questionsCount += $qCount;

                if ($progressCallback) {
                    $progressCallback($assessment, $qCount, $assessmentsCount, $assessments->count());
                }
            } catch (\Throwable $e) {
                DB::rollBack();
                throw $e;
            }
        }

        return [
            'assessments_updated' => $assessmentsCount,
            'questions_updated' => $questionsCount,
        ];
    }

    /**
     * Transform an entire assessment and all its questions into distinct variant content.
     */
    public function transformAssessment(Assessment $assessment, int $variant): int
    {
        $subjectName = $assessment->subject?->name ?? 'Umum';
        $gradeLevel = (string) $assessment->grade_level;
        $title = $assessment->title;
        $totalQuestions = 0;

        // 1. Transform Stimulus Groups if any
        foreach ($assessment->sections as $section) {
            foreach ($section->questionGroups as $group) {
                $newStimulus = $this->generateDistinctStimulus($group, $subjectName, $gradeLevel, $title, $variant);
                $group->update([
                    'title' => $newStimulus['title'],
                    'stimulus_content' => $newStimulus['content'],
                ]);
            }

            // 2. Transform Each Question
            foreach ($section->questions as $question) {
                $newQuestionData = $this->generateDistinctQuestion(
                    $question,
                    $section,
                    $assessment,
                    $subjectName,
                    $gradeLevel,
                    $title,
                    $variant
                );

                $question->update([
                    'prompt' => $newQuestionData['prompt'],
                    'explanation' => $newQuestionData['explanation'],
                    'points' => $newQuestionData['points'] ?? $question->points,
                ]);

                // Replace options
                $question->options()->delete();
                $labels = ['A', 'B', 'C', 'D', 'E', 'F'];

                if (! empty($newQuestionData['options'])) {
                    $opts = $newQuestionData['options'];

                    // Shuffle MCQ single choices to randomize answer key across A, B, C, D
                    if ($question->type === 'mcq_single' && count($opts) > 1) {
                        shuffle($opts);
                    }

                    foreach ($opts as $oIdx => $opt) {
                        QuestionOption::create([
                            'question_id' => $question->id,
                            'label' => ($question->type === 'mcq_single' || $question->type === 'mcq_multiple')
                                ? ($labels[$oIdx] ?? (string) ($oIdx + 1))
                                : ($opt['label'] ?? (string) ($oIdx + 1)),
                            'option_text' => $opt['option_text'],
                            'is_correct' => (bool) ($opt['is_correct'] ?? false),
                            'match_key' => $opt['match_key'] ?? null,
                            'score' => (float) ($opt['score'] ?? (! empty($opt['is_correct']) ? $question->points : 0.0)),
                            'order' => $oIdx + 1,
                        ]);
                    }
                }

                $totalQuestions++;
            }
        }

        return $totalQuestions;
    }

    /**
     * Generate fresh stimulus passage for stimulus-based questions.
     *
     * @return array{title: string, content: string}
     */
    protected function generateDistinctStimulus(
        QuestionGroup $group,
        string $subject,
        string $grade,
        string $title,
        int $variant
    ): array {
        if ($subject === 'Bahasa Inggris') {
            if ($variant === 2) {
                return [
                    'title' => 'Stimulus: Weekend Family Camping at Pine Forest (Packet #2)',
                    'content' => "Last Saturday, Kevin and his family spent a memorable weekend camping at Pine Forest Nature Park. The weather was bright and refreshing.\n\nKevin and his older sister, Tiara, were pitching the blue tent near a crystal-clear stream. Their father, Mr. Bram, was preparing firewood for cooking dinner, while their mother was chopping fresh carrots and potatoes on the camping table. In the afternoon, they hiked up the pine hill and took photos of colorful wild birds. Everyone felt joyful and connected with nature.",
                ];
            } else {
                return [
                    'title' => 'Stimulus: School Botanical Garden Exploration (Packet #1)',
                    'content' => "On Friday morning, fourth-grade students visited the regional botanical garden for a science field project. Mrs. Anita guided the students with an interactive nature map.\n\nBayu and Sinta recorded information about rare orchid species in their digital journals. Near the water fountain, Fahri was sketching a giant water lily with oil pastels. The park guide explained how medicinal herbs survive in tropical rainforests. The students learned the importance of protecting endangered plants.",
                ];
            }
        }

        if ($subject === 'Bahasa Indonesia') {
            if (str_contains($grade, '1') || str_contains($grade, '2') || str_contains($grade, '3')) {
                if ($variant === 2) {
                    return [
                        'title' => 'Wacana Literasi: Petualangan Si Kancil dan Katak Hijau (Paket B)',
                        'content' => 'Di tepi sungai yang jernih, Kancil sedang berteduh di bawah pohon rindang. Tiba-tiba, Katak Hijau melompat dari atas daun teratai dan menyapa dengan ramah. Katak memberitahu bahwa ada buah mangga ranum yang jatuh di seberang sungai. Kancil dan Katak bekerja sama mengambil buah mangga tersebut. Kancil memetik ranting untuk meraih buah di air, lalu mereka membaginya bersama teman-teman hutan.',
                    ];
                } else {
                    return [
                        'title' => 'Wacana Literasi: Menanam Bunga di Halaman Sekolah (Paket A)',
                        'content' => 'Setiap hari Jumat pagi, siswa kelas rendah bergotong royong membersihkan halaman sekolah. Siti membawa bibit bunga matahari di dalam pot kecil, sedangkan Danu membawa sekop kecil. Ibu Guru mengajarkan cara menyiram tanah dengan air secukupnya agar akar tanaman tumbuh subur. Setelah selesai, halaman sekolah tampak asri dan harum semerbak.',
                    ];
                }
            } else {
                // Kelas 4, 5, 6 SD
                if ($variant === 2) {
                    return [
                        'title' => 'Wacana Literasi: Konservasi Terumbu Karang dan Keanekaragaman Laut Nusantara (Paket B)',
                        'content' => "Kepulauan Indonesia memiliki kekayaan terumbu karang terluas di kawasan segitiga karang dunia. Terumbu karang bukan sekadar batuan kapur, melainkan kumpulan koloni hewan karang mikroskopis yang bersimbiosis dengan alga zooxanthellae. Ekosistem karang menyediakan tempat berlindung, mencari makan, dan berkembang biak bagi ribuan spesies ikan hias dan penyu laut.\n\nNamun, aktivitas penangkapan ikan dengan bahan peledak serta kenaikan suhu permukaan air laut memicu pemutihan karang (coral bleaching). Oleh karena itu, gerakan transplantasi karang buatan oleh masyarakat pesisir menjadi pilar penting demi menjaga ketahanan ekologi laut masa depan.",
                    ];
                } else {
                    return [
                        'title' => 'Wacana Literasi: Kearifan Lokal Hutan Lindung Desa Adat (Paket A)',
                        'content' => 'Masyarakat adat di pelosok nusantara telah lama menerapkan kearifan lokal dalam menjaga hutan lindung. Mereka menetapkan zona larangan menebang pohon keramat di sekitar mata air desa demi menjaga ketersediaan air bersih sepanjang musim kemarau. Sanksi adat diberlakukan secara tegas bagi siapa saja yang merusak hutan tanpa izin sesepuh desa. Prinsip hidup selaras dengan alam ini membuktikan bahwa kelestarian lingkungan dapat terjaga melalui komitmen budaya bersama.',
                    ];
                }
            }
        }

        // Default
        return [
            'title' => "Stimulus Wacana Edukatif (Varian {$variant})",
            'content' => $group->stimulus_content ?: 'Bacalah wacana informatif berikut dengan saksama untuk menjawab pertanyaan-pertanyaan yang disajikan.',
        ];
    }

    /**
     * Generate a fresh, pedagogically accurate question distinct from other variants.
     */
    protected function generateDistinctQuestion(
        Question $question,
        $section,
        Assessment $assessment,
        string $subject,
        string $grade,
        string $title,
        int $variant
    ): array {
        $order = (int) $question->order;
        $type = (string) $question->type;

        if ($subject === 'Matematika') {
            return $this->generateMathQuestion($order, $type, $grade, $title, $variant, $question->points);
        }

        if ($subject === 'Bahasa Indonesia') {
            return $this->generateIndonesianQuestion($order, $type, $grade, $title, $variant, $question->points);
        }

        if ($subject === 'Bahasa Inggris') {
            return $this->generateEnglishQuestion($order, $type, $grade, $title, $variant, $question->points);
        }

        // Generic fallback for any other subject
        return $this->generateGenericQuestion($order, $type, $variant, $question->points);
    }

    /**
     * Generator Soal Matematika Kurikulum Merdeka (Varian 1 vs Varian 2).
     */
    protected function generateMathQuestion(int $order, string $type, string $grade, string $title, int $variant, float $points): array
    {
        $isV2 = ($variant === 2);

        // Grade 1 SD (Bilangan sampai 10/20, Penjumlahan, Pengurangan, Bentuk Datar)
        if (str_contains($grade, '1')) {
            if ($type === 'mcq_single') {
                $qPoolV2 = [
                    1 => [
                        'prompt' => '[Keterangan Gambar: Enam buah mangga harum manis di keranjang bambu]
Banyak buah mangga pada keranjang di atas adalah ....',
                        'options' => [
                            ['option_text' => '6', 'is_correct' => true],
                            ['option_text' => '5', 'is_correct' => false],
                            ['option_text' => '7', 'is_correct' => false],
                            ['option_text' => '4', 'is_correct' => false],
                        ],
                        'explanation' => 'Hitung jumlah mangga pada gambar: 1, 2, 3, 4, 5, 6.',
                    ],
                    2 => [
                        'prompt' => 'Lambang bilangan dari nama bilangan "sembilan" adalah ....',
                        'options' => [
                            ['option_text' => '9', 'is_correct' => true],
                            ['option_text' => '6', 'is_correct' => false],
                            ['option_text' => '7', 'is_correct' => false],
                            ['option_text' => '8', 'is_correct' => false],
                        ],
                        'explanation' => 'Nama bilangan sembilan dilambangkan dengan angka 9.',
                    ],
                    3 => [
                        'prompt' => 'Ibu memiliki 4 butir telur. Ibu membeli lagi 3 butir telur di warung. Berapa jumlah telur Ibu sekarang?',
                        'options' => [
                            ['option_text' => '7 butir', 'is_correct' => true],
                            ['option_text' => '6 butir', 'is_correct' => false],
                            ['option_text' => '8 butir', 'is_correct' => false],
                            ['option_text' => '5 butir', 'is_correct' => false],
                        ],
                        'explanation' => 'Operasi penjumlahan: 4 + 3 = 7 butir telur.',
                    ],
                    4 => [
                        'prompt' => 'Benda di kelas yang memiliki permukaan berbentuk lingkaran adalah ....',
                        'options' => [
                            ['option_text' => 'jam dinding bulat', 'is_correct' => true],
                            ['option_text' => 'papan tulis', 'is_correct' => false],
                            ['option_text' => 'buku tulis', 'is_correct' => false],
                            ['option_text' => 'penggaris segitiga', 'is_correct' => false],
                        ],
                        'explanation' => 'Jam dinding berbentuk lingkaran bulat tanpa sudut.',
                    ],
                    5 => [
                        'prompt' => 'Bilangan yang terletak tepat sesudah bilangan 7 adalah ....',
                        'options' => [
                            ['option_text' => '8', 'is_correct' => true],
                            ['option_text' => '6', 'is_correct' => false],
                            ['option_text' => '9', 'is_correct' => false],
                            ['option_text' => '5', 'is_correct' => false],
                        ],
                        'explanation' => 'Urutan bilangan: 6, 7, 8. Jadi tepat sesudah 7 adalah 8.',
                    ],
                    6 => [
                        'prompt' => 'Dodi memiliki 8 kelereng. Dodi memberikan 3 kelereng kepada adiknya. Sisa kelereng Dodi adalah ....',
                        'options' => [
                            ['option_text' => '5', 'is_correct' => true],
                            ['option_text' => '4', 'is_correct' => false],
                            ['option_text' => '6', 'is_correct' => false],
                            ['option_text' => '3', 'is_correct' => false],
                        ],
                        'explanation' => 'Operasi pengurangan: 8 - 3 = 5 kelereng.',
                    ],
                    7 => [
                        'prompt' => 'Perhatikan bilangan berikut: 4, 8, 2, 6. Urutan bilangan dari yang paling kecil adalah ....',
                        'options' => [
                            ['option_text' => '2, 4, 6, 8', 'is_correct' => true],
                            ['option_text' => '8, 6, 4, 2', 'is_correct' => false],
                            ['option_text' => '2, 6, 4, 8', 'is_correct' => false],
                            ['option_text' => '4, 2, 6, 8', 'is_correct' => false],
                        ],
                        'explanation' => 'Urutan dari terkecil ke terbesar adalah 2, 4, 6, 8.',
                    ],
                    8 => [
                        'prompt' => 'Benda yang permukaannya berbentuk segitiga memiliki sudut sebanyak ....',
                        'options' => [
                            ['option_text' => '3 sudut', 'is_correct' => true],
                            ['option_text' => '4 sudut', 'is_correct' => false],
                            ['option_text' => '2 sudut', 'is_correct' => false],
                            ['option_text' => '5 sudut', 'is_correct' => false],
                        ],
                        'explanation' => 'Bangun datar segitiga memiliki 3 sisi dan 3 titik sudut.',
                    ],
                    9 => [
                        'prompt' => 'Manakah perbandingan bilangan yang benar di bawah ini?',
                        'options' => [
                            ['option_text' => '9 lebih banyak dari 6', 'is_correct' => true],
                            ['option_text' => '3 lebih banyak dari 8', 'is_correct' => false],
                            ['option_text' => '5 sama dengan 7', 'is_correct' => false],
                            ['option_text' => '4 lebih banyak dari 10', 'is_correct' => false],
                        ],
                        'explanation' => '9 lebih besar/banyak dibandingkan dengan 6.',
                    ],
                    10 => [
                        'prompt' => 'Hasil dari 5 + 5 adalah ....',
                        'options' => [
                            ['option_text' => '10', 'is_correct' => true],
                            ['option_text' => '9', 'is_correct' => false],
                            ['option_text' => '8', 'is_correct' => false],
                            ['option_text' => '11', 'is_correct' => false],
                        ],
                        'explanation' => '5 ditambah 5 menghasilkan 10.',
                    ],
                ];

                $qPoolV1 = [
                    1 => [
                        'prompt' => '[Keterangan Gambar: Tiga buah apel merah segar di piring porselen]
Banyak buah apel pada piring tersebut adalah ....',
                        'options' => [
                            ['option_text' => '3', 'is_correct' => true],
                            ['option_text' => '2', 'is_correct' => false],
                            ['option_text' => '4', 'is_correct' => false],
                            ['option_text' => '5', 'is_correct' => false],
                        ],
                        'explanation' => 'Banyak apel pada piring adalah 3 buah.',
                    ],
                    2 => [
                        'prompt' => 'Lambang bilangan dari nama bilangan "tujuh" adalah ....',
                        'options' => [
                            ['option_text' => '7', 'is_correct' => true],
                            ['option_text' => '6', 'is_correct' => false],
                            ['option_text' => '8', 'is_correct' => false],
                            ['option_text' => '5', 'is_correct' => false],
                        ],
                        'explanation' => 'Nama bilangan tujuh dituliskan dengan lambang angka 7.',
                    ],
                    3 => [
                        'prompt' => 'Beni memiliki 2 pensil warna. Ayah membelikan lagi 3 pensil warna. Berapa jumlah pensil warna Beni sekarang?',
                        'options' => [
                            ['option_text' => '5 pensil', 'is_correct' => true],
                            ['option_text' => '4 pensil', 'is_correct' => false],
                            ['option_text' => '6 pensil', 'is_correct' => false],
                            ['option_text' => '3 pensil', 'is_correct' => false],
                        ],
                        'explanation' => 'Penjumlahan: 2 + 3 = 5 pensil warna.',
                    ],
                    4 => [
                        'prompt' => 'Benda di rumah yang memiliki permukaan berbentuk persegi panjang adalah ....',
                        'options' => [
                            ['option_text' => 'pintu kamar tidur', 'is_correct' => true],
                            ['option_text' => 'kelereng mainan', 'is_correct' => false],
                            ['option_text' => 'roda sepeda', 'is_correct' => false],
                            ['option_text' => 'bola kasti', 'is_correct' => false],
                        ],
                        'explanation' => 'Pintu kamar tidur memiliki permukaan berbentuk persegi panjang.',
                    ],
                ];

                $pool = $isV2 ? $qPoolV2 : $qPoolV1;
                $idx = (($order - 1) % count($pool)) + 1;

                return $pool[$idx];
            }

            if ($type === 'short_answer') {
                return [
                    'prompt' => $isV2
                        ? 'Tuliskan hasil penjumlahan dari 6 + 3!'
                        : 'Tuliskan hasil penjumlahan dari 4 + 2!',
                    'options' => [
                        ['option_text' => $isV2 ? '9' : '6', 'is_correct' => true],
                    ],
                    'explanation' => $isV2 ? '6 + 3 = 9' : '4 + 2 = 6',
                ];
            }

            if ($type === 'essay') {
                return [
                    'prompt' => $isV2
                        ? 'Siti memiliki 7 buah jeruk. Diberikan kepada Lani 2 buah jeruk. Tuliskan kalimat matematikanya dan hitung sisanya!'
                        : 'Budi memiliki 5 buah apel. Diberikan kepada Edo 1 buah apel. Tuliskan kalimat matematikanya dan hitung sisanya!',
                    'options' => [],
                    'explanation' => $isV2
                        ? 'Kalimat matematika: 7 - 2 = 5 buah jeruk.'
                        : 'Kalimat matematika: 5 - 1 = 4 buah apel.',
                ];
            }
        }

        // Higher Grades (Grade 2 to 6 SD)
        return $this->generateAdvancedMathQuestion($order, $type, $grade, $title, $variant, $points);
    }

    /**
     * Generator Soal Matematika Kelas Lanjutan (2 s.d 6 SD).
     */
    protected function generateAdvancedMathQuestion(int $order, string $type, string $grade, string $title, int $variant, float $points): array
    {
        $isV2 = ($variant === 2);
        $gradeNum = preg_replace('/[^0-9]/', '', $grade) ?: '4';

        if ($type === 'mcq_single') {
            $num1 = $isV2 ? (240 + ($order * 15)) : (150 + ($order * 12));
            $num2 = $isV2 ? (130 + ($order * 8)) : (80 + ($order * 7));
            $sum = $num1 + $num2;
            $wrong1 = $sum - 10;
            $wrong2 = $sum + 10;
            $wrong3 = $sum - 20;

            if ((int) $gradeNum >= 4) {
                // Konsep Pecahan / Desimal / Luas Bangun Datar
                $p = $isV2 ? (12 + $order) : (8 + $order);
                $l = $isV2 ? (6 + ($order % 3)) : (4 + ($order % 3));
                $luas = $p * $l;

                return [
                    'prompt' => $isV2
                        ? "Sebuah taman kota berbentuk persegi panjang memiliki panjang {$p} meter dan lebar {$l} meter. Luas taman kota tersebut adalah ...."
                        : "Sebuah pekarangan rumah berbentuk persegi panjang berukuran panjang {$p} meter dan lebar {$l} meter. Luas pekarangan tersebut adalah ....",
                    'options' => [
                        ['option_text' => "{$luas} m²", 'is_correct' => true],
                        ['option_text' => ($luas + 10).' m²', 'is_correct' => false],
                        ['option_text' => ($luas - 8).' m²', 'is_correct' => false],
                        ['option_text' => ($luas + 15).' m²', 'is_correct' => false],
                    ],
                    'explanation' => "Rumus Luas Persegi Panjang = Panjang × Lebar = {$p} m × {$l} m = {$luas} m².",
                ];
            }

            return [
                'prompt' => $isV2
                    ? "Pak RT mengumpulkan sumbangan beras sebanyak {$num1} kg di posko pertama dan {$num2} kg di posko kedua. Total beras yang terkumpul adalah ...."
                    : "Sebuah toko kelontong menerima pasokan gula pasir sebanyak {$num1} kg pada hari Senin dan {$num2} kg pada hari Selasa. Jumlah seluruh pasokan gula adalah ....",
                'options' => [
                    ['option_text' => "{$sum} kg", 'is_correct' => true],
                    ['option_text' => "{$wrong1} kg", 'is_correct' => false],
                    ['option_text' => "{$wrong2} kg", 'is_correct' => false],
                    ['option_text' => "{$wrong3} kg", 'is_correct' => false],
                ],
                'explanation' => "Operasi penjumlahan: {$num1} + {$num2} = {$sum} kg.",
            ];
        }

        if ($type === 'mcq_multiple') {
            return [
                'prompt' => $isV2
                    ? 'Manakah pernyataan yang BENAR mengenai sifat-sifat bangun datar belah ketupat? (Pilih semua jawaban yang benar)'
                    : 'Manakah pernyataan yang BENAR mengenai sifat-sifat bangun datar jajar genjang? (Pilih semua jawaban yang benar)',
                'options' => [
                    ['option_text' => $isV2 ? 'Keempat sisinya sama panjang' : 'Sisi-sisi yang berhadapan sejajar dan sama panjang', 'is_correct' => true],
                    ['option_text' => $isV2 ? 'Kedua diagonalnya berpotongan tegak lurus' : 'Sudut-sudut yang berhadapan sama besar', 'is_correct' => true],
                    ['option_text' => 'Semua sudutnya selalu bernilai 90 derajat siku-siku', 'is_correct' => false],
                    ['option_text' => 'Hanya memiliki tepat satu pasang sisi sejajar', 'is_correct' => false],
                ],
                'explanation' => 'Analisis sifat geometri bangun datar pada Kurikulum Merdeka.',
            ];
        }

        if ($type === 'binary_matrix') {
            return [
                'prompt' => $isV2
                    ? 'Tentukan status kebenaran dari pernyataan matematis berikut (Benar / Salah)!'
                    : 'Analisislah validitas operasi hitung pada setiap pernyataan berikut (Benar / Salah)!',
                'options' => [
                    ['label' => '1', 'option_text' => $isV2 ? 'Bilangan prima terkecil adalah 2' : 'Bilangan prima hanya memiliki tepat 2 faktor pembagi', 'is_correct' => true, 'match_key' => 'Benar'],
                    ['label' => '2', 'option_text' => $isV2 ? 'Sudut tumpul besarnya kurang dari 90 derajat' : 'Sudut siku-siku besarnya 180 derajat', 'is_correct' => true, 'match_key' => 'Salah'],
                    ['label' => '3', 'option_text' => $isV2 ? 'Volume kubus dengan rusuk 5 cm adalah 125 cm³' : 'Keliling persegi dengan sisi 6 cm adalah 24 cm', 'is_correct' => true, 'match_key' => 'Benar'],
                ],
                'explanation' => 'Evaluasi logika dan konsep dasar geometri serta aritmatika.',
            ];
        }

        if ($type === 'matching') {
            return [
                'prompt' => $isV2
                    ? 'Pasangkanlah konsep bangun datar di sebelah kiri dengan rumus kelilingnya yang tepat di sebelah kanan!'
                    : 'Pasangkanlah bangun ruang di sebelah kiri dengan sifat jumlah rusuknya yang tepat di sebelah kanan!',
                'options' => [
                    ['label' => '1', 'option_text' => $isV2 ? 'Persegi' : 'Kubus', 'match_key' => $isV2 ? '4 × sisi' : 'Memiliki 12 rusuk sama panjang', 'is_correct' => true],
                    ['label' => '2', 'option_text' => $isV2 ? 'Persegi Panjang' : 'Balok', 'match_key' => $isV2 ? '2 × (panjang + lebar)' : 'Memiliki 12 rusuk dengan 3 ukuran berbeda', 'is_correct' => true],
                    ['label' => '3', 'option_text' => $isV2 ? 'Segitiga Sama Sisi' : 'Limas Segiempat', 'match_key' => $isV2 ? '3 × sisi' : 'Memiliki 8 rusuk', 'is_correct' => true],
                ],
                'explanation' => 'Menjodohkan konsep bangun dengan rumusan geometri terkait.',
            ];
        }

        if ($type === 'short_answer') {
            return [
                'prompt' => $isV2
                    ? 'Hasil dari 15 × 8 adalah ....'
                    : 'Hasil dari 12 × 9 adalah ....',
                'options' => [
                    ['option_text' => $isV2 ? '120' : '108', 'is_correct' => true],
                ],
                'explanation' => $isV2 ? '15 × 8 = 120' : '12 × 9 = 108',
            ];
        }

        // Essay
        return [
            'prompt' => $isV2
                ? 'Pak Ahmad memiliki sebidang kebun berbentuk persegi dengan panjang sisi 25 meter. Berapakah keliling dan luas kebun Pak Ahmad tersebut? Tuliskan langkah perhitungannya!'
                : 'Sebuah kolam renang berbentuk persegi panjang memiliki panjang 20 meter dan lebar 10 meter. Hitunglah keliling dan luas kolam renang tersebut secara runtut!',
            'options' => [],
            'explanation' => $isV2
                ? 'Keliling = 4 × 25 m = 100 m. Luas = 25 m × 25 m = 625 m².'
                : 'Keliling = 2 × (20 m + 10 m) = 60 m. Luas = 20 m × 10 m = 200 m².',
        ];
    }

    /**
     * Generator Soal Bahasa Indonesia (Varian 1 vs Varian 2).
     */
    protected function generateIndonesianQuestion(int $order, string $type, string $grade, string $title, int $variant, float $points): array
    {
        $isV2 = ($variant === 2);

        if ($type === 'mcq_single') {
            $poolV2 = [
                1 => [
                    'prompt' => '[Keterangan Gambar: Seekor kucing anggora sedang mendengkur di karpet]
Tiruan suara hewan pada gambar di atas adalah ....',
                    'options' => [
                        ['option_text' => 'meong-meong', 'is_correct' => true],
                        ['option_text' => 'kukuruyuk', 'is_correct' => false],
                        ['option_text' => 'kwek-kwek', 'is_correct' => false],
                        ['option_text' => 'guk-guk', 'is_correct' => false],
                    ],
                    'explanation' => 'Tiruan suara kucing adalah meong-meong.',
                ],
                2 => [
                    'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "be" adalah ....',
                    'options' => [
                        ['option_text' => 'bebek', 'is_correct' => true],
                        ['option_text' => 'botol', 'is_correct' => false],
                        ['option_text' => 'buku', 'is_correct' => false],
                        ['option_text' => 'baju', 'is_correct' => false],
                    ],
                    'explanation' => 'Kata bebek diawali suku kata be (be-bek).',
                ],
                3 => [
                    'prompt' => 'Bunyi alam yang terdengar saat hujan badai disertai kilatan petir adalah ....',
                    'options' => [
                        ['option_text' => 'suara petir menggelegar', 'is_correct' => true],
                        ['option_text' => 'suara klakson mobil', 'is_correct' => false],
                        ['option_text' => 'suara peluit wasit', 'is_correct' => false],
                        ['option_text' => 'suara bel pintu rumah', 'is_correct' => false],
                    ],
                    'explanation' => 'Petir menggelegar adalah bunyi alam yang tercipta tanpa mesin buatan.',
                ],
                4 => [
                    'prompt' => 'Kata tanya yang digunakan untuk menanyakan tempat terjadinya peristiwa adalah ....',
                    'options' => [
                        ['option_text' => 'Di mana', 'is_correct' => true],
                        ['option_text' => 'Kapan', 'is_correct' => false],
                        ['option_text' => 'Siapa', 'is_correct' => false],
                        ['option_text' => 'Berapa', 'is_correct' => false],
                    ],
                    'explanation' => 'Kata tanya "Di mana" menanyakan tempat/lokasi.',
                ],
                5 => [
                    'prompt' => 'Kalimat yang mengungkapkan rasa terima kasih dengan santun adalah ....',
                    'options' => [
                        ['option_text' => 'Terima kasih sudah membantuku merapikan buku, Lani.', 'is_correct' => true],
                        ['option_text' => 'Cepat ambilkan tasku di meja sana!', 'is_correct' => false],
                        ['option_text' => 'Jangan berdiri di dekat pintuku!', 'is_correct' => false],
                        ['option_text' => 'Aku tidak suka bermain denganmu.', 'is_correct' => false],
                    ],
                    'explanation' => 'Ungkapan terima kasih diucapkan saat menerima pertolongan atau kebaikan orang lain.',
                ],
                6 => [
                    'prompt' => 'Kata "cangkir" jika diuraikan menurut suku katanya menjadi ....',
                    'options' => [
                        ['option_text' => 'cang - kir', 'is_correct' => true],
                        ['option_text' => 'ca - ngkir', 'is_correct' => false],
                        ['option_text' => 'c - ang - kir', 'is_correct' => false],
                        ['option_text' => 'cangki - r', 'is_correct' => false],
                    ],
                    'explanation' => 'Pemisahan suku kata kata cangkir adalah cang-kir.',
                ],
                7 => [
                    'prompt' => 'Perhatikan kalimat: "Ibu memasak sup di dapur." Subjek pada kalimat tersebut adalah ....',
                    'options' => [
                        ['option_text' => 'Ibu', 'is_correct' => true],
                        ['option_text' => 'memasak', 'is_correct' => false],
                        ['option_text' => 'sup', 'is_correct' => false],
                        ['option_text' => 'di dapur', 'is_correct' => false],
                    ],
                    'explanation' => 'Pelaku (Subjek) pada kalimat adalah Ibu.',
                ],
                8 => [
                    'prompt' => 'Antonim atau lawan kata dari kata "bersih" adalah ....',
                    'options' => [
                        ['option_text' => 'kotor', 'is_correct' => true],
                        ['option_text' => 'wangi', 'is_correct' => false],
                        ['option_text' => 'rapi', 'is_correct' => false],
                        ['option_text' => 'indah', 'is_correct' => false],
                    ],
                    'explanation' => 'Lawan kata dari bersih adalah kotor.',
                ],
            ];

            $poolV1 = [
                1 => [
                    'prompt' => '[Keterangan Gambar: Seekor anjing kecil melompat gembira]
Tiruan suara gonggongan anjing pada gambar di atas adalah ....',
                    'options' => [
                        ['option_text' => 'guk-guk', 'is_correct' => true],
                        ['option_text' => 'meong-meong', 'is_correct' => false],
                        ['option_text' => 'kukuruyuk', 'is_correct' => false],
                        ['option_text' => 'moo-moo', 'is_correct' => false],
                    ],
                    'explanation' => 'Tiruan suara anjing adalah guk-guk.',
                ],
                2 => [
                    'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "ba" adalah ....',
                    'options' => [
                        ['option_text' => 'batu', 'is_correct' => true],
                        ['option_text' => 'buku', 'is_correct' => false],
                        ['option_text' => 'bintang', 'is_correct' => false],
                        ['option_text' => 'becak', 'is_correct' => false],
                    ],
                    'explanation' => 'Kata batu diawali dengan suku kata ba (ba-tu).',
                ],
                3 => [
                    'prompt' => 'Contoh bunyi buatan yang dihasilkan oleh alat manusia adalah suara ....',
                    'options' => [
                        ['option_text' => 'klakson motor', 'is_correct' => true],
                        ['option_text' => 'rintik hujan', 'is_correct' => false],
                        ['option_text' => 'angin bertiup', 'is_correct' => false],
                        ['option_text' => 'ombak pantai', 'is_correct' => false],
                    ],
                    'explanation' => 'Klakson motor adalah bunyi buatan karena dihasilkan oleh mesin manusia.',
                ],
            ];

            $pool = $isV2 ? $poolV2 : $poolV1;
            $idx = (($order - 1) % count($pool)) + 1;

            return $pool[$idx];
        }

        if ($type === 'short_answer') {
            return [
                'prompt' => $isV2
                    ? 'Tanda baca yang wajib diletakkan di akhir kalimat tanya adalah tanda ....'
                    : 'Tanda baca yang digunakan untuk mengakhiri kalimat perintah adalah tanda ....',
                'options' => [
                    ['option_text' => $isV2 ? 'tanya (?)' : 'seru (!)', 'is_correct' => true],
                ],
                'explanation' => $isV2 ? 'Kalimat tanya diakhiri dengan tanda tanya (?)' : 'Kalimat perintah diakhiri dengan tanda seru (!)',
            ];
        }

        if ($type === 'essay') {
            return [
                'prompt' => $isV2
                    ? 'Tuliskan 3 contoh aturan menjaga kebersihan di lingkungan sekolahmu!'
                    : 'Tuliskan 3 contoh tata tertib saat membaca buku di perpustakaan sekolah!',
                'options' => [],
                'explanation' => $isV2
                    ? 'Contoh: membuang sampah pada tempatnya, melaksanakan piket kelas, menyiram toilet setelah digunakan.'
                    : 'Contoh: tidak berisik/tenang, mengembalikan buku ke rak semula, tidak makan dan minum di perpustakaan.',
            ];
        }

        // Multiple, matching, etc.
        return [
            'prompt' => $isV2
                ? 'Tentukan pernyataan yang sesuai dengan isi bacaan teks deskripsi di atas! (Pilih semua yang benar)'
                : 'Pilihlah fakta-fakta yang tertera pada teks wacana literasi di atas! (Pilih semua yang benar)',
            'options' => [
                ['option_text' => $isV2 ? 'Informasi disajikan berdasarkan pengamatan langsung' : 'Data peristiwa disampaikan secara kronologis', 'is_correct' => true],
                ['option_text' => $isV2 ? 'Kosakata baku digunakan secara konsisten' : 'Tokoh utama berperan aktif menyelesaikan masalah', 'is_correct' => true],
                ['option_text' => 'Semua peristiwa hanya rekaan khayalan belaka', 'is_correct' => false],
                ['option_text' => 'Teks bertujuan membingungkan pembaca', 'is_correct' => false],
            ],
            'explanation' => 'Analisis komprehensif struktur dan kaidah kebahasaan teks.',
        ];
    }

    /**
     * Generator Soal Bahasa Inggris (Varian 1 vs Varian 2).
     */
    protected function generateEnglishQuestion(int $order, string $type, string $grade, string $title, int $variant, float $points): array
    {
        $isV2 = ($variant === 2);

        if ($type === 'mcq_single') {
            $poolV2 = [
                1 => [
                    'prompt' => 'A: "Good afternoon, Mrs. Ratna. How are you today?"
B: "...., Kevin. I am feeling very well, thank you."',
                    'options' => [
                        ['option_text' => 'Good afternoon', 'is_correct' => true],
                        ['option_text' => 'Good night', 'is_correct' => false],
                        ['option_text' => 'Goodbye', 'is_correct' => false],
                        ['option_text' => 'See you yesterday', 'is_correct' => false],
                    ],
                    'explanation' => 'Greeting response for "Good afternoon" is "Good afternoon".',
                ],
                2 => [
                    'prompt' => 'Look at the sentence: "Diana and her brother .... reading storybooks in the living room."
The correct to be verb is ....',
                    'options' => [
                        ['option_text' => 'are', 'is_correct' => true],
                        ['option_text' => 'is', 'is_correct' => false],
                        ['option_text' => 'am', 'is_correct' => false],
                        ['option_text' => 'was not', 'is_correct' => false],
                    ],
                    'explanation' => 'Plural subject "Diana and her brother" (they) uses to be "are".',
                ],
                3 => [
                    'prompt' => '[Image Description: A yellow school bag placed under the wooden study desk]
Where is the yellow school bag? It is .... the study desk.',
                    'options' => [
                        ['option_text' => 'under', 'is_correct' => true],
                        ['option_text' => 'on', 'is_correct' => false],
                        ['option_text' => 'in', 'is_correct' => false],
                        ['option_text' => 'between', 'is_correct' => false],
                    ],
                    'explanation' => 'Preposition of place: under means di bawah.',
                ],
                4 => [
                    'prompt' => 'What is the English word for number "seventy"?',
                    'options' => [
                        ['option_text' => '70', 'is_correct' => true],
                        ['option_text' => '17', 'is_correct' => false],
                        ['option_text' => '7', 'is_correct' => false],
                        ['option_text' => '700', 'is_correct' => false],
                    ],
                    'explanation' => 'Seventy is 70.',
                ],
                5 => [
                    'prompt' => 'Father is cooking soup in the kitchen. He is using a stainless .... to stir the broth.',
                    'options' => [
                        ['option_text' => 'spoon', 'is_correct' => true],
                        ['option_text' => 'pillow', 'is_correct' => false],
                        ['option_text' => 'blanket', 'is_correct' => false],
                        ['option_text' => 'wardrobe', 'is_correct' => false],
                    ],
                    'explanation' => 'Kitchen utensil vocabulary: spoon (sendok).',
                ],
            ];

            $poolV1 = [
                1 => [
                    'prompt' => 'A: "Good morning, friends!"
B: "...., Bayu! Nice to see you."',
                    'options' => [
                        ['option_text' => 'Good morning', 'is_correct' => true],
                        ['option_text' => 'Good evening', 'is_correct' => false],
                        ['option_text' => 'Good night', 'is_correct' => false],
                        ['option_text' => 'Farewell', 'is_correct' => false],
                    ],
                    'explanation' => 'Response to "Good morning" is "Good morning".',
                ],
                2 => [
                    'prompt' => 'My sister .... drawing a beautiful butterfly in her sketchbook.',
                    'options' => [
                        ['option_text' => 'is', 'is_correct' => true],
                        ['option_text' => 'are', 'is_correct' => false],
                        ['option_text' => 'am', 'is_correct' => false],
                        ['option_text' => 'were', 'is_correct' => false],
                    ],
                    'explanation' => 'Singular subject "My sister" (she) uses to be "is".',
                ],
                3 => [
                    'prompt' => 'The English word for number "fifty" is ....',
                    'options' => [
                        ['option_text' => '50', 'is_correct' => true],
                        ['option_text' => '15', 'is_correct' => false],
                        ['option_text' => '5', 'is_correct' => false],
                        ['option_text' => '500', 'is_correct' => false],
                    ],
                    'explanation' => 'Fifty is 50.',
                ],
            ];

            $pool = $isV2 ? $poolV2 : $poolV1;
            $idx = (($order - 1) % count($pool)) + 1;

            return $pool[$idx];
        }

        if ($type === 'short_answer') {
            return [
                'prompt' => $isV2
                    ? 'What is the English word for "kamar tidur"?'
                    : 'What is the English word for "ruang tamu"?',
                'options' => [
                    ['option_text' => $isV2 ? 'bedroom' : 'living room', 'is_correct' => true],
                ],
                'explanation' => $isV2 ? 'Kamar tidur = bedroom' : 'Ruang tamu = living room',
            ];
        }

        if ($type === 'essay') {
            return [
                'prompt' => $isV2
                    ? 'Write down 3 simple sentences describing what your family members are doing right now!'
                    : 'Write down 3 school supplies found in your pencil case in English!',
                'options' => [],
                'explanation' => $isV2
                    ? 'Example: My mother is cooking. My brother is studying. My father is working.'
                    : 'Example: pencil, eraser, ruler.',
            ];
        }

        return [
            'prompt' => $isV2
                ? 'Choose the correct action verbs used in Present Continuous Tense! (Select all that apply)'
                : 'Select the correct prepositions of place! (Select all that apply)',
            'options' => [
                ['option_text' => $isV2 ? 'studying' : 'behind', 'is_correct' => true],
                ['option_text' => $isV2 ? 'watering' : 'in front of', 'is_correct' => true],
                ['option_text' => $isV2 ? 'yesterday' : 'purple', 'is_correct' => false],
                ['option_text' => $isV2 ? 'happily' : 'table', 'is_correct' => false],
            ],
            'explanation' => 'Vocabulary and grammar mastery in English Kurikulum Merdeka.',
        ];
    }

    /**
     * Fallback generic question generator.
     */
    protected function generateGenericQuestion(int $order, string $type, int $variant, float $points): array
    {
        return [
            'prompt' => "Pertanyaan butir {$order} asesmen varian {$variant} menguji pemahaman konsep materi.",
            'options' => [
                ['option_text' => "Pilihan analisis materi varian {$variant} yang paling tepat", 'is_correct' => true],
                ['option_text' => 'Pilihan distraktor analisis pertama', 'is_correct' => false],
                ['option_text' => 'Pilihan distraktor analisis kedua', 'is_correct' => false],
                ['option_text' => 'Pilihan distraktor analisis ketiga', 'is_correct' => false],
            ],
            'explanation' => "Pembahasan soal varian {$variant} nomor {$order}.",
        ];
    }
}
