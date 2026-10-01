<?php

namespace App\Services\Ai;

use App\Models\Question;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Throwable;

class AiExplanationService
{
    public function __construct(
        private readonly AiPromptBuilder $prompts
    ) {}

    /**
     * Check if DeepSeek API is enabled and configured.
     */
    public function isConfigured(): bool
    {
        return (bool) config('services.deepseek.enabled', true)
            && filled(config('services.deepseek.api_key'));
    }

    /**
     * Generate student explanation on-demand without mutating the question's official explanation.
     */
    public function generateForStudent(Question $question): string
    {
        if (! $this->isConfigured()) {
            return $this->generateFallbackExplanation($question);
        }

        $cfg = config('services.deepseek');
        $model = $cfg['model'] ?? 'deepseek-reasoner';
        $payload = [
            'model' => $model,
            'messages' => $this->prompts->forQuestion($question),
            'stream' => false,
        ];
        if ($model !== 'deepseek-reasoner') {
            $payload['temperature'] = (float) ($cfg['temperature'] ?? 0.6);
            $payload['max_tokens'] = (int) ($cfg['max_tokens'] ?? 800);
        }

        try {
            $response = Http::baseUrl(rtrim($cfg['base_url'] ?? 'https://api.deepseek.com', '/'))
                ->withToken($cfg['api_key'])
                ->timeout((int) ($cfg['timeout'] ?? 60))
                ->retry((int) ($cfg['retry_times'] ?? 2), (int) ($cfg['retry_sleep'] ?? 500), throw: false)
                ->acceptJson()
                ->asJson()
                ->post('/chat/completions', $payload);

            if ($response->successful()) {
                $content = data_get($response->json(), 'choices.0.message.content');
                if (filled($content)) {
                    return trim($content);
                }
            }
        } catch (Throwable $e) {
            Log::warning('DeepSeek student explanation failed, falling back', ['error' => $e->getMessage()]);
        }

        return $this->generateFallbackExplanation($question);
    }

    /**
     * Generate and save AI explanation for a single question.
     *
     * @return array{ok: bool, status: string, content?: string, model?: string, error?: string}
     */
    public function generateForQuestion(Question $question): array
    {
        $question->update([
            'explanation_status' => 'processing',
            'explanation_error' => null,
        ]);

        if (! $this->isConfigured()) {
            $fallback = $this->generateFallbackExplanation($question);
            $question->update([
                'explanation' => $fallback,
                'explanation_status' => 'completed',
                'explanation_error' => null,
                'explanation_model' => 'system-tutor',
                'explanation_generated_at' => now(),
            ]);

            return [
                'ok' => true,
                'status' => 'completed',
                'content' => $fallback,
                'model' => 'system-tutor',
            ];
        }

        $cfg = config('services.deepseek');
        $model = $cfg['model'] ?? 'deepseek-reasoner';
        $payload = [
            'model' => $model,
            'messages' => $this->prompts->forQuestion($question),
            'stream' => false,
        ];
        if ($model !== 'deepseek-reasoner') {
            $payload['temperature'] = (float) ($cfg['temperature'] ?? 0.6);
            $payload['max_tokens'] = (int) ($cfg['max_tokens'] ?? 800);
        }

        try {
            $response = Http::baseUrl(rtrim($cfg['base_url'] ?? 'https://api.deepseek.com', '/'))
                ->withToken($cfg['api_key'])
                ->timeout((int) ($cfg['timeout'] ?? 60))
                ->retry((int) ($cfg['retry_times'] ?? 2), (int) ($cfg['retry_sleep'] ?? 500), throw: false)
                ->acceptJson()
                ->asJson()
                ->post('/chat/completions', $payload);

            if (! $response->successful()) {
                Log::warning('DeepSeek explanation call failed, using fallback', [
                    'question_id' => $question->id,
                    'status' => $response->status(),
                    'body' => Str::limit($response->body(), 500),
                ]);

                $fallback = $this->generateFallbackExplanation($question);
                $question->update([
                    'explanation' => $fallback,
                    'explanation_status' => 'completed',
                    'explanation_error' => null,
                    'explanation_model' => 'system-tutor-fallback',
                    'explanation_generated_at' => now(),
                ]);

                return [
                    'ok' => true,
                    'status' => 'completed',
                    'content' => $fallback,
                    'model' => 'system-tutor-fallback',
                ];
            }

            $data = $response->json();
            $content = data_get($data, 'choices.0.message.content');

            if (blank($content)) {
                $fallback = $this->generateFallbackExplanation($question);
                $question->update([
                    'explanation' => $fallback,
                    'explanation_status' => 'completed',
                    'explanation_error' => null,
                    'explanation_model' => 'system-tutor-fallback',
                    'explanation_generated_at' => now(),
                ]);

                return [
                    'ok' => true,
                    'status' => 'completed',
                    'content' => $fallback,
                    'model' => 'system-tutor-fallback',
                ];
            }

            $cleanContent = trim($content);
            $modelUsed = data_get($data, 'model', $cfg['model'] ?? 'deepseek-chat');

            $question->update([
                'explanation' => $cleanContent,
                'explanation_status' => 'completed',
                'explanation_error' => null,
                'explanation_model' => $modelUsed,
                'explanation_generated_at' => now(),
            ]);

            return [
                'ok' => true,
                'status' => 'completed',
                'content' => $cleanContent,
                'model' => $modelUsed,
            ];
        } catch (Throwable $e) {
            Log::error('DeepSeek explanation exception, using fallback', [
                'question_id' => $question->id,
                'message' => $e->getMessage(),
            ]);

            $fallback = $this->generateFallbackExplanation($question);
            $question->update([
                'explanation' => $fallback,
                'explanation_status' => 'completed',
                'explanation_error' => null,
                'explanation_model' => 'system-tutor-fallback',
                'explanation_generated_at' => now(),
            ]);

            return [
                'ok' => true,
                'status' => 'completed',
                'content' => $fallback,
                'model' => 'system-tutor-fallback',
            ];
        }
    }

    /**
     * Generate educational explanation from question structure.
     */
    public function generateFallbackExplanation(Question $question): string
    {
        $question->loadMissing(['options', 'questionGroup']);
        $correctOptions = $question->options->where('is_correct', true);

        $output = [];
        if ($correctOptions->isNotEmpty()) {
            $labels = $correctOptions->pluck('label')->filter()->join(', ');
            $texts = $correctOptions->map(fn ($o) => ($o->label ? "({$o->label}) " : '').strip_tags($o->option_text ?? ''))->join('; ');
            $output[] = '### ✅ Jawaban: '.($labels ? "Pilihan {$labels}" : $texts);
        } else {
            $output[] = '### ✅ Kunci Jawaban Resmi Tersedia';
        }

        $output[] = '### 📝 Langkah Pembahasan:';
        if ($question->type === 'binary_matrix') {
            $output[] = 'Pada tipe soal tabel dikotomi, periksa setiap pernyataan secara cermat berdasarkan data atau konsep materi:';
            foreach ($question->options as $idx => $opt) {
                $status = $opt->match_key ?? ($opt->is_correct ? 'Benar' : 'Salah');
                $output[] = '- **Pernyataan '.($idx + 1).'**: '.strip_tags($opt->option_text ?? '')." → **{$status}**";
            }
        } elseif ($question->type === 'matching') {
            $output[] = 'Pasangan yang tepat untuk setiap premis adalah:';
            foreach ($question->options as $idx => $opt) {
                $output[] = '- **'.strip_tags($opt->option_text ?? '').'** berpasangan dengan **'.strip_tags($opt->match_key ?? '').'**';
            }
        } elseif ($question->type === 'ordering') {
            $output[] = 'Urutan tahapan yang sistematis dan benar:';
            foreach ($question->options->sortBy('order') as $idx => $opt) {
                $output[] = ''.($idx + 1).'. '.strip_tags($opt->option_text ?? '');
            }
        } else {
            if ($correctOptions->isNotEmpty()) {
                $firstCorrect = $correctOptions->first();
                $output[] = '- Pilihan jawaban yang tepat adalah '.($firstCorrect->label ? "**Pilihan {$firstCorrect->label}**" : '**'.strip_tags($firstCorrect->option_text).'**').', karena paling sesuai dengan konteks dan kaidah materi pada pertanyaan.';
                $output[] = '- Pilihan lainnya kurang tepat karena memuat informasi yang bertentangan atau tidak memenuhi premis yang diminta dalam soal.';
            } else {
                $output[] = '- Analisis jawaban didasarkan pada ketepatan konsep dan kelengkapan uraian sesuai kaidah penilaian materi.';
            }
        }

        $output[] = '### ⚡ Cara Cepat / Trik Praktis:';
        $output[] = 'Selalu cermati kata kunci (*keywords*) pada pokok soal dan eliminasi opsi yang jelas bertentangan sebelum menentukan jawaban akhir.';

        return implode("\n\n", $output);
    }

    /**
     * Dapatkan nama label model DeepSeek yang sedang aktif.
     */
    public function getModelName(): string
    {
        $model = config('services.deepseek.model', 'deepseek-reasoner');

        return match ($model) {
            'deepseek-reasoner' => 'DEEPSEEK V4 Pro Reasoner',
            'deepseek-chat' => 'DeepSeek V3 Chat',
            default => 'DEEPSEEK V4 Pro Reasoner',
        };
    }
}
