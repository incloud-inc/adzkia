<?php

namespace App\Services\Ai;

use App\Models\Question;
use Illuminate\Support\Str;

class AiPromptBuilder
{
    /**
     * Build messages payload for chat completion.
     */
    public function forQuestion(Question $question): array
    {
        return [
            ['role' => 'system', 'content' => $this->system()],
            ['role' => 'user', 'content' => $this->userFor($question)],
        ];
    }

    /**
     * Get system prompt from cached prompt file.
     */
    public function system(): string
    {
        $promptPath = resource_path('prompts/ai-explanation-system.txt');

        if (file_exists($promptPath)) {
            return cache()->rememberForever(
                'ai_explanation.system_prompt',
                fn () => file_get_contents($promptPath)
            );
        }

        return <<<'PROMPT'
Kamu adalah "Kak Tutor" — sosok kakak tutor cerdas, asik, dan ramah yang jago menjelaskan konsep ujian menjadi sangat mudah dipahami.
Tugasmu adalah menulis PEMBAHASAN SOAL untuk siswa platform asesmen & ujian CBT di Indonesia.
Gunakan bahasa santai, lugas, tidak bertele-tele, tidak menggurui.
Untuk soal kuantitatif / matematika / numerasi, wajib sertakan trik/shortcut Cara Cepat.
Format Markdown:
### ✅ Jawaban: ...
### 📝 Langkah Pembahasan:
- ...
### ⚡ Cara Cepat / Trik Praktis: (jika ada hitungan/matematika)
PROMPT;
    }

    /**
     * Build user prompt from question data.
     */
    public function userFor(Question $question): string
    {
        $question->loadMissing(['options', 'assessmentSection.assessment.subject', 'questionGroup']);

        $assessment = $question->assessmentSection?->assessment;
        $subject = $assessment?->subject?->name ?? 'Umum';
        $grade = $assessment?->grade_level ?? 'Semua Jenjang';

        $typeLabel = match ($question->type) {
            'mcq_single' => 'Pilihan Ganda (1 Jawaban Benar)',
            'mcq_multiple' => 'Pilihan Ganda Kompleks (Banyak Jawaban)',
            'mcq_weighted' => 'Pilihan Ganda Berbobot / Skala',
            'binary_matrix' => 'Benar / Salah (Matriks Pernyataan)',
            'matching' => 'Menjodohkan (Premis ↔ Jawaban)',
            'ordering' => 'Mengurutkan Urutan Jawaban',
            'short_answer' => 'Isian Singkat',
            'essay' => 'Uraian / Esai',
            default => $question->type,
        };

        $isQuantitative = $this->detectQuantitative($subject, $question);

        $optionsBlock = '';
        if ($question->options->isNotEmpty()) {
            $optionsBlock = $question->options
                ->sortBy('order')
                ->map(function ($opt) {
                    $mark = $opt->is_correct ? ' ← [KUNCI JAWABAN BENAR]' : '';
                    $label = $opt->label ? "{$opt->label}. " : '- ';

                    return "{$label}{$opt->option_text}{$mark}";
                })
                ->implode("\n");
        } else {
            $optionsBlock = '(Tidak menggunakan pilihan ganda, memerlukan isian/jawaban langsung)';
        }

        $stimulusContent = $this->stimulusSnippet($question);

        $instructionNote = $isQuantitative
            ? 'Ini adalah soal MATEMATIKA / KUANTITATIF. WAJIB sertakan section "### ⚡ Cara Cepat / Trik Praktis" selain langkah pembahasannya.'
            : 'Soal ini non-kuantitatif / hafalan / analisis teks. Jelaskan konsep intinya secara lugas dan santai.';

        return <<<PROMPT
Bahas soal berikut untuk siswa:

**Mata Pelajaran:** {$subject}
**Jenjang / Tingkat Kelas:** {$grade}
**Tipe Soal:** {$typeLabel}
**Bobot Nilai:** {$question->points} poin

**Pertanyaan Soal:**
{$question->prompt}

**Daftar Opsi / Kunci Jawaban:**
{$optionsBlock}

**Teks Stimulus / Wacana (jika ada):**
{$stimulusContent}

**Catatan Khusus:**
{$instructionNote}

Tuliskan pembahasannya sekarang sesuai format yang ditentukan. Lugas, akrab, menyenangkan, dan tidak menggurui.
PROMPT;
    }

    /**
     * Detect whether question involves quantitative / math reasoning.
     */
    private function detectQuantitative(?string $subject, Question $question): bool
    {
        $mathKeywords = ['matematik', 'fisika', 'kimia', 'numerasi', 'kuantitatif', 'penalaran matematika', 'hitung', 'akuntansi', 'statistika'];
        $subjectLower = Str::lower($subject ?? '');

        foreach ($mathKeywords as $keyword) {
            if (str_contains($subjectLower, $keyword)) {
                return true;
            }
        }

        $allText = $question->prompt.' '.$question->options->pluck('option_text')->implode(' ');

        return (bool) preg_match('/\d+\s*[\+\-\*\/\^=]|\$|\\\frac|\\\sqrt|\b(hitunglah|berapakah|kecepatan|luas|volume|persentase)\b/i', $allText);
    }

    /**
     * Extract snippet of stimulus if question belongs to group.
     */
    private function stimulusSnippet(Question $question): string
    {
        $group = $question->questionGroup;
        if (! $group || blank($group->stimulus_content)) {
            return '— (Tidak ada wacana khusus)';
        }

        return Str::limit(strip_tags($group->stimulus_content), 800);
    }
}
