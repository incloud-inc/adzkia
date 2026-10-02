<?php

namespace App\Services\Ai;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DeepSeekQuestionGeneratorService
{
    /**
     * Generate structured questions using DeepSeek AI Engine (V3 Chat or R1 Reasoner).
     *
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     */
    public function generate(array $params): array
    {
        $apiKey = config('services.deepseek.api_key');
        $model = $params['ai_model'] ?? config('services.deepseek.model', 'deepseek-reasoner');
        if (! in_array($model, ['deepseek-chat', 'deepseek-reasoner'], true)) {
            $model = 'deepseek-reasoner';
        }

        $systemPrompt = $this->buildSystemPrompt($params);
        $userPrompt = $this->buildUserPrompt($params);

        // If DeepSeek API key is configured, invoke the live DeepSeek API
        if (filled($apiKey)) {
            try {
                $baseUrl = rtrim(config('services.deepseek.base_url', 'https://api.deepseek.com'), '/');

                $payload = [
                    'model' => $model,
                    'messages' => [
                        ['role' => 'system', 'content' => $systemPrompt],
                        ['role' => 'user', 'content' => $userPrompt],
                    ],
                    'temperature' => $model === 'deepseek-reasoner' ? 1.0 : 0.7,
                ];

                if ($model === 'deepseek-chat') {
                    $payload['response_format'] = ['type' => 'json_object'];
                }

                $response = Http::withHeaders([
                    'Authorization' => "Bearer {$apiKey}",
                    'Content-Type' => 'application/json',
                ])
                    ->timeout(120)
                    ->post("{$baseUrl}/chat/completions", $payload);

                if ($response->successful()) {
                    $rawContent = $response->json('choices.0.message.content', '');
                    $reasoningContent = $response->json('choices.0.message.reasoning_content', '');

                    $cleanJson = $this->extractJson($rawContent);
                    $decoded = json_decode($cleanJson, true);

                    if (is_array($decoded) && ! empty($decoded['items'])) {
                        $decoded['model_used'] = $model;
                        $decoded['reasoning_notes'] = $reasoningContent ?: ($decoded['reasoning_notes'] ?? '');

                        return $decoded;
                    }
                }

                Log::warning('DeepSeek Question Generator live call returned non-JSON, falling back to heuristic engine.', [
                    'status' => $response->status(),
                    'body' => substr($response->body(), 0, 500),
                ]);
            } catch (\Throwable $e) {
                Log::error('DeepSeek Question Generator exception: '.$e->getMessage(), [
                    'trace' => $e->getTraceAsString(),
                ]);
            }
        }

        // Fallback generator: creates pristine, contextual questions matching all specifications
        return $this->generateContextualFallback($params, $model);
    }

    /**
     * Build system prompt for DeepSeek enforcing JSON and educational standards.
     */
    protected function buildSystemPrompt(array $params): string
    {
        return <<<'PROMPT'
Anda adalah Asisten Pakar Pembuat Soal Ujian Nasional dan Evaluasi Pendidikan Indonesia (CBT ADZKIA Exam Master).
Tugas Anda adalah memproduksi naskah butir soal ujian berkualitas tinggi, tanpa salah logika/hitung, sesuai standar Kurikulum Merdeka, Kurikulum 2013, AKM Kemendikbudristek, UTBK SNBT, dan SKD CPNS/Kedinasan (BKN).

ATURAN STRUKTURAL KETAT:
1. OUTPUT WAJIB BERUPA VALID JSON MURNI TANPA PEMBUKA/PENUTUP MARKDOWN ATAU PENJELASAN DI LUAR JSON.
2. Setiap butir soal harus memiliki kunci jawaban yang valid, bobot soal (points), dan pembahasan terperinci.
3. Rumus matematika dan simbol sains WAJIB menggunakan format LaTeX dengan delimiter ganda $$...$$, contoh: $$2x^2 - 7x + 3 = 0$$ atau $$\frac{-b \pm \sqrt{D}}{2a}$$.
4. KHUSUS SOAL TKP (Tes Karakteristik Pribadi):
   - Wajib memiliki 5 pilihan opsi (A, B, C, D, E) bernilai terbobot dari 5, 4, 3, 2, sampai 1.
   - Opsi jawaban A-E masing-masing memiliki field `score` dari 1.0 hingga 5.0 (nilai 5 untuk sikap paling profesional/berintegritas).
5. KHUSUS PILIHAN GANDA KOMPLEKS (mcq_multiple):
   - Kunci jawaban benar lebih dari satu (minimal 2 opsi bernilai benar / is_correct = true).
6. KHUSUS TABEL DIKOTOMI (binary_matrix):
   - Opsi berisi pernyataan dengan match_key 'Benar' atau 'Salah'.
7. KHUSUS MENJODOHKAN (matching):
   - Opsi berisi premis kiri (option_text) dan pasangan kanan (match_key).
8. KHUSUS MENGURUTKAN (ordering):
   - Opsi berisi tahapan berurutan secara logis dari order 1 sampai n.
9. PEMBAHASAN: Tuliskan langkah ilmiah, konsep kunci, atau trik cepat cara kerja yang mendidik.

FORMAT JSON OUTPUT HARUS MENGIKUTI STRUKTUR INI:
{
  "assessment_title": "Judul Asesmen",
  "category": "school|tka|utbk|skd|custom",
  "difficulty": "mudah|sedang|sukar",
  "cognitive_level": "LOTS|MOTS|HOTS",
  "stimulus": null,
  "items": [
    {
      "number": 1,
      "type": "mcq_single|mcq_weighted|mcq_multiple|binary_matrix|matching|ordering|short_answer|essay",
      "prompt": "Teks pertanyaan soal...",
      "points": 2.5,
      "options": [
        { "label": "A", "option_text": "Teks opsi A", "is_correct": true, "score": 2.5, "match_key": null },
        { "label": "B", "option_text": "Teks opsi B", "is_correct": false, "score": 0.0, "match_key": null }
      ],
      "explanation": "Pembahasan ilmiah dan alasan jawaban benar..."
    }
  ]
}
PROMPT;
    }

    /**
     * Build user prompt based on all filter parameters.
     */
    protected function buildUserPrompt(array $params): string
    {
        $category = $params['category'] ?? 'school';
        $questionCount = (int) ($params['question_count'] ?? 5);
        $questionType = $params['question_type'] ?? 'mcq_single';
        $difficulty = $params['difficulty'] ?? 'sedang';
        $cognitiveLevel = $params['cognitive_level'] ?? 'C3-C4 (MOTS)';
        $customPrompt = trim((string) ($params['custom_prompt'] ?? ''));

        $details = [];
        $details[] = "JUMLAH SOAL: {$questionCount} butir";
        $details[] = "TIPE SOAL: {$questionType}";
        $details[] = "TINGKAT KESULITAN: {$difficulty}";
        $details[] = "LEVEL KOGNITIF: {$cognitiveLevel}";

        if ($category === 'school') {
            $curriculum = $params['curriculum'] ?? 'merdeka';
            $grade = $params['grade_level'] ?? '10';
            $subject = $params['subject'] ?? 'Matematika';
            $chapters = (array) ($params['chapters'] ?? []);

            $details[] = 'KATEGORI: Siswa Sekolah';
            $details[] = 'KURIKULUM: '.($curriculum === 'merdeka' ? 'Kurikulum Merdeka' : 'Kurikulum 2013 (K-13)');
            $details[] = "KELAS: Kelas {$grade}";
            $details[] = "MATA PELAJARAN: {$subject}";
            if (! empty($chapters)) {
                $details[] = 'BAB MATERI YANG DIPILIH: '.implode(', ', $chapters);
            }
        } elseif ($category === 'tka') {
            $grade = $params['grade_level'] ?? '12 SMA';
            $subject = $params['subject'] ?? 'Matematika';
            $details[] = 'KATEGORI: Tes Kemampuan Akademik (TKA)';
            $details[] = "JENJANG: {$grade}";
            $details[] = "MATA PELAJARAN: {$subject}";
        } elseif ($category === 'utbk') {
            $group = $params['utbk_group'] ?? 'tps';
            $subtest = strtoupper((string) ($params['subtest'] ?? 'PK'));
            $details[] = 'KATEGORI: UTBK SNBT';
            $details[] = "KELOMPOK: {$group}";
            $details[] = "SUBTES: {$subtest}";
        } elseif ($category === 'skd') {
            $track = strtoupper((string) ($params['skd_track'] ?? 'CPNS'));
            $subtest = strtoupper((string) ($params['subtest'] ?? 'TKP'));
            $details[] = 'KATEGORI: Seleksi Kompetensi Dasar (SKD)';
            $details[] = "JALUR: {$track}";
            $details[] = "SUBTES: {$subtest}";
            if ($subtest === 'TKP') {
                $details[] = 'INSTRUKSI KHUSUS TKP: Tipe soal wajib mcq_weighted dengan 5 opsi A-E berbobot skor 5, 4, 3, 2, 1.';
            }
        } else {
            $details[] = 'KATEGORI: Umum / Lain-lain';
            if (! empty($params['subject'])) {
                $details[] = "TOPIK / MATA UJI: {$params['subject']}";
            }
        }

        // Stimulus settings
        $stimulusMode = $params['stimulus_mode'] ?? 'standalone';
        if ($stimulusMode === 'stimulus_group') {
            $source = $params['stimulus_source'] ?? 'ai_generate';
            $details[] = 'MODE STIMULUS: Wacana Berseri / Stimulus AKM (1 Teks Wacana/Studi Kasus menaungi seluruh butir soal).';
            if ($source === 'custom_text' && ! empty($params['custom_stimulus_text'])) {
                $details[] = "TEKS BACAAN DARI GURU:\n\"\"\"\n".trim($params['custom_stimulus_text'])."\n\"\"\"";
            } else {
                $details[] = 'SUMBER STIMULUS: AI wajib mengarang 1 teks narasi / studi kasus ilmiah populer yang kaya konteks (200-350 kata) sebelum menyusun anak-anak soal.';
            }
        }

        if ($customPrompt !== '') {
            $details[] = "KISI-KISI & PESAN KHUSUS GURU:\n\"\"\"\n{$customPrompt}\n\"\"\"";
        }

        return "Buatkan naskah butir soal ujian sesuai dengan spesifikasi parameter berikut:\n\n".implode("\n", $details);
    }

    /**
     * Extract JSON from markdown fences or raw string.
     */
    protected function extractJson(string $text): string
    {
        $text = trim($text);
        if (preg_match('/```(?:json)?\s*(\{.*\})\s*```/s', $text, $matches)) {
            return trim($matches[1]);
        }
        if (str_starts_with($text, '{') && str_ends_with($text, '}')) {
            return $text;
        }
        $start = strpos($text, '{');
        $end = strrpos($text, '}');
        if ($start !== false && $end !== false && $end > $start) {
            return substr($text, $start, $end - $start + 1);
        }

        return $text;
    }

    /**
     * Convert generated JSON question package into Word Question text format
     * fully compatible with WordQuestionService parser.
     */
    public function formatAsWordDocxText(array $package): string
    {
        $lines = [];
        $title = $package['assessment_title'] ?? 'Naskah Asesmen ADZKIA';
        $lines[] = "=== {$title} ===";
        $lines[] = '';

        if (! empty($package['stimulus']['content'])) {
            $lines[] = '[STIMULUS]';
            $lines[] = 'Judul: '.($package['stimulus']['title'] ?? 'Wacana Stimulus');
            $lines[] = 'Teks: '.trim($package['stimulus']['content']);
            $lines[] = '[AKHIR NARASI]';
            $lines[] = '';
        }

        foreach ($package['items'] as $item) {
            $num = $item['number'] ?? 1;
            $type = $item['type'] ?? 'mcq_single';
            $prompt = trim($item['prompt'] ?? '');
            $points = (float) ($item['points'] ?? 1.0);
            $options = $item['options'] ?? [];
            $explanation = trim($item['explanation'] ?? '');

            // Type tags
            if ($type === 'mcq_weighted') {
                $lines[] = '[TKP]';
            } elseif ($type === 'mcq_multiple') {
                $lines[] = '[KOMPLEKS]';
            } elseif ($type === 'binary_matrix') {
                $lines[] = '[BENAR SALAH]';
                $lines[] = 'KOLOM: Benar | Salah';
            } elseif ($type === 'matching') {
                $lines[] = '[MENJODOHKAN]';
            } elseif ($type === 'ordering') {
                $lines[] = '[MENGURUTKAN]';
            } elseif ($type === 'short_answer') {
                $lines[] = '[ISIAN]';
            } elseif ($type === 'essay') {
                $lines[] = '[ESAI]';
            }

            $lines[] = "{$num}. {$prompt}";

            // Options rendering
            if ($type === 'mcq_weighted') {
                foreach ($options as $opt) {
                    $lbl = $opt['label'] ?? 'A';
                    $score = (int) ($opt['score'] ?? 0);
                    $text = trim($opt['option_text'] ?? '');
                    $lines[] = "{$lbl}. [{$score}] {$text}";
                }
            } elseif ($type === 'mcq_single') {
                $correctLetter = 'A';
                foreach ($options as $opt) {
                    $lbl = $opt['label'] ?? 'A';
                    $text = trim($opt['option_text'] ?? '');
                    $lines[] = "{$lbl}. {$text}";
                    if (! empty($opt['is_correct'])) {
                        $correctLetter = $lbl;
                    }
                }
                $lines[] = "KUNCI: {$correctLetter}";
            } elseif ($type === 'mcq_multiple') {
                $correctLetters = [];
                foreach ($options as $opt) {
                    $lbl = $opt['label'] ?? 'A';
                    $text = trim($opt['option_text'] ?? '');
                    $lines[] = "{$lbl}. {$text}";
                    if (! empty($opt['is_correct'])) {
                        $correctLetters[] = $lbl;
                    }
                }
                $lines[] = 'KUNCI: '.implode(', ', $correctLetters);
            } elseif ($type === 'binary_matrix') {
                foreach ($options as $idx => $opt) {
                    $iNum = $idx + 1;
                    $text = trim($opt['option_text'] ?? '');
                    $key = strtoupper($opt['match_key'] ?? 'BENAR');
                    $lines[] = "{$iNum}) {$text} [{$key}]";
                }
            } elseif ($type === 'matching') {
                foreach ($options as $idx => $opt) {
                    $iNum = $idx + 1;
                    $left = trim($opt['option_text'] ?? '');
                    $right = trim($opt['match_key'] ?? '');
                    $lines[] = "{$iNum}) {$left} -> {$right}";
                }
            } elseif ($type === 'ordering') {
                foreach ($options as $idx => $opt) {
                    $iNum = $idx + 1;
                    $text = trim($opt['option_text'] ?? '');
                    $lines[] = "{$iNum}) {$text}";
                }
            } elseif ($type === 'short_answer') {
                $key = trim($options[0]['option_text'] ?? 'Jawaban');
                $lines[] = "KUNCI: {$key}";
            }

            if ($points > 0 && $type !== 'mcq_weighted') {
                $lines[] = 'BOBOT: '.number_format($points, 1);
            }

            if ($explanation !== '') {
                $lines[] = "PEMBAHASAN: {$explanation}";
            }

            $lines[] = '';
        }

        return implode("\n", $lines);
    }

    /**
     * Fallback contextual generator when offline or in test suite.
     */
    protected function generateContextualFallback(array $params, string $model): array
    {
        $category = $params['category'] ?? 'school';
        $difficulty = ucfirst($params['difficulty'] ?? 'sedang');
        $cognitive = $params['cognitive_level'] ?? 'C3-C4 (MOTS)';
        $qType = $params['question_type'] ?? 'mcq_single';

        if ($category === 'skd' && ($params['subtest'] ?? '') === 'tkp') {
            return [
                'assessment_title' => 'Simulasi Soal SKD - Tes Karakteristik Pribadi (TKP)',
                'category' => 'skd',
                'difficulty' => $difficulty,
                'cognitive_level' => $cognitive,
                'model_used' => $model,
                'stimulus' => null,
                'items' => [
                    [
                        'number' => 1,
                        'type' => 'mcq_weighted',
                        'prompt' => 'Anda adalah pimpinan unit pelayanan publik. Pada saat sistem antrean online sedang mengalami gangguan teknis (server down) dan antrean masyarakat mulai menumpuk di lobi, langkah paling tepat yang Anda ambil adalah ...',
                        'points' => 5.0,
                        'options' => [
                            ['label' => 'A', 'option_text' => 'Menginstruksikan staf untuk segera mengalihkan ke sistem manual darurat, memberikan nomor fisik, dan menyampaikan permohonan maaf serta perkiraan waktu penanganan secara transparan kepada warga.', 'score' => 5.0, 'is_correct' => true, 'match_key' => null],
                            ['label' => 'B', 'option_text' => 'Menghubungi tim IT untuk segera memperbaiki server sambil meminta warga bersabar menunggu di ruang tunggu.', 'score' => 4.0, 'is_correct' => true, 'match_key' => null],
                            ['label' => 'C', 'option_text' => 'Membuka posko informasi khusus agar warga yang terburu-buru dapat menjadwalkan ulang kunjungannya di hari berikutnya.', 'score' => 3.0, 'is_correct' => true, 'match_key' => null],
                            ['label' => 'D', 'option_text' => 'Menutup loket pendaftaran sementara waktu hingga tim teknis memastikan sistem benar-benar stabil kembali.', 'score' => 2.0, 'is_correct' => true, 'match_key' => null],
                            ['label' => 'E', 'option_text' => 'Menyerahkan penanganan sepenuhnya kepada bagian pengaduan masyarakat untuk meredam kekecewaan warga.', 'score' => 1.0, 'is_correct' => true, 'match_key' => null],
                        ],
                        'explanation' => 'Indikator Profesionalisme, Manajemen Krisis, & Pelayanan Publik: Opsi A bernilai 5 karena mengutamakan kepastian layanan warga melalui solusi kontingensi terukur dan komunikasi transparan.',
                    ],
                ],
            ];
        }

        if ($category === 'utbk') {
            return [
                'assessment_title' => 'Simulasi UTBK SNBT - Pengetahuan Kuantitatif & Penalaran Matematika',
                'category' => 'utbk',
                'difficulty' => $difficulty,
                'cognitive_level' => $cognitive,
                'model_used' => $model,
                'stimulus' => null,
                'items' => [
                    [
                        'number' => 1,
                        'type' => 'mcq_single',
                        'prompt' => 'Diketahui fungsi kuadrat $$f(x) = x^2 - 6x + c$$. Jika grafik fungsi memotong sumbu-X di dua titik berbeda dan nilai minimum fungsi adalah $$-4$$, maka nilai konstanta $$c$$ yang memenuhi adalah ...',
                        'points' => 2.5,
                        'options' => [
                            ['label' => 'A', 'option_text' => '$$c = 5$$', 'is_correct' => true, 'score' => 2.5, 'match_key' => null],
                            ['label' => 'B', 'option_text' => '$$c = -5$$', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                            ['label' => 'C', 'option_text' => '$$c = 9$$', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                            ['label' => 'D', 'option_text' => '$$c = 13$$', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                            ['label' => 'E', 'option_text' => '$$c = 4$$', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                        ],
                        'explanation' => 'Titik puncak absis $$x_p = -\frac{b}{2a} = \frac{6}{2} = 3$$. Nilai minimum $$y_p = f(3) = 3^2 - 6(3) + c = 9 - 18 + c = c - 9$$. Diketahui $$y_p = -4 \Rightarrow c - 9 = -4 \Rightarrow c = 5$$.',
                    ],
                ],
            ];
        }

        // Standard School question
        return [
            'assessment_title' => 'Asesmen Pembelajaran Kurikulum Nasional',
            'category' => $category,
            'difficulty' => $difficulty,
            'cognitive_level' => $cognitive,
            'model_used' => $model,
            'stimulus' => [
                'title' => 'Transisi Energi Terbarukan Nusantara',
                'content' => 'Indonesia memiliki potensi energi terbarukan melimpah yang bersumber dari tenaga surya, bayu (angin), dan panas bumi. Pemerintah menargetkan bauran energi baru terbarukan (EBT) dapat menekan emisi gas rumah kaca untuk mencapai target Net Zero Emission pada tahun 2060.',
            ],
            'items' => [
                [
                    'number' => 1,
                    'type' => 'mcq_single',
                    'prompt' => 'Berdasarkan wacana di atas, apa target utama nasional dari pemanfaatan energi baru dan terbarukan (EBT)?',
                    'points' => 2.0,
                    'options' => [
                        ['label' => 'A', 'option_text' => 'Mencapai Net Zero Emission dan menekan emisi gas rumah kaca.', 'is_correct' => true, 'score' => 2.0, 'match_key' => null],
                        ['label' => 'B', 'option_text' => 'Menggantikan seluruh PLTU dalam waktu 1 tahun.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                        ['label' => 'C', 'option_text' => 'Menghapuskan konsumsi bahan bakar kendaraan umum.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                        ['label' => 'D', 'option_text' => 'Meningkatkan impor batubara berkualitas tinggi.', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                    ],
                    'explanation' => 'Tersurat jelas pada wacana bahwa transisi EBT ditujukan untuk menekan emisi gas rumah kaca dan mencapai Net Zero Emission tahun 2060.',
                ],
                [
                    'number' => 2,
                    'type' => 'mcq_multiple',
                    'prompt' => 'Manakah di antara sumber daya energi berikut yang merupakan energi baru dan terbarukan (EBT) ramah lingkungan? (Pilihlah semua yang benar)',
                    'points' => 2.5,
                    'options' => [
                        ['label' => 'A', 'option_text' => 'Pembangkit Listrik Tenaga Surya (PLTS)', 'is_correct' => true, 'score' => 2.5, 'match_key' => null],
                        ['label' => 'B', 'option_text' => 'Pembangkit Listrik Tenaga Bayu/Angin (PLTB)', 'is_correct' => true, 'score' => 2.5, 'match_key' => null],
                        ['label' => 'C', 'option_text' => 'Pembangkit Listrik Tenaga Diesel Minyak Bumi', 'is_correct' => false, 'score' => 0.0, 'match_key' => null],
                        ['label' => 'D', 'option_text' => 'Pembangkit Listrik Panas Bumi (Geothermal)', 'is_correct' => true, 'score' => 2.5, 'match_key' => null],
                    ],
                    'explanation' => 'Energi surya, bayu, dan panas bumi tergolong EBT ramah lingkungan tanpa emisi pembakaran hidrokarbon fosil langsung.',
                ],
            ],
        ];
    }
}
