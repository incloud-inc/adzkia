<?php

use App\Models\Assessment;
use App\Models\ExamSession;
use App\Models\Question;
use App\Models\QuestionGroup;
use App\Models\QuestionOption;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('assessments:insert-grade12-image', function () {
    $imageMarkdown = "\n\n![segitiga siku-siku.webp](/media/r2/asesmen/YQqjHBJTCflSIP1XktU3a3kwHa7kjt0Tk1pikv0h.webp)\n\n";

    $assessments = Assessment::withoutGlobalScopes()
        ->where(function ($query) {
            $query->where('grade_level', '12')
                ->orWhere('grade_level', 'like', '%12%');
        })
        ->with('sections.questions')
        ->get();

    $updatedCount = 0;

    foreach ($assessments as $assessment) {
        foreach ($assessment->sections as $section) {
            $q1 = $section->questions()->where('order', 1)->first()
                ?? $section->questions()->orderBy('id')->first();

            if ($q1 && ! str_contains($q1->prompt, 'YQqjHBJTCflSIP1XktU3a3kwHa7kjt0Tk1pikv0h.webp')) {
                $q1->update([
                    'prompt' => $q1->prompt.$imageMarkdown,
                ]);
                $updatedCount++;
            }
        }
    }

    $this->info("Berhasil menyisipkan gambar segitiga siku-siku ke {$updatedCount} butir soal nomor 1 asesmen kelas 12.");
})->purpose('Sisipkan gambar Cloudflare R2 ke butir soal nomor 1 kelas 12');

Artisan::command('assessments:fix-r2-urls', function () {
    $this->info('Memperbaiki URL Cloudflare R2 / localhost dan kata rusak (\sqrt) pada bank soal, opsi, dan stimulus...');

    $repairText = function (?string $text): ?string {
        if (! $text) {
            return $text;
        }

        // 1. Perbaiki URL media hardcoded localhost / 127.0.0.1 / r2.dev ke relative /media/r2/
        $text = preg_replace(
            '/https?:\/\/(?:localhost|127\.0\.0\.1)(?::\d+)?\/media\/r2\/([^\s\)\"\']+)/i',
            '/media/r2/$1',
            $text
        );
        $text = preg_replace(
            '/https:\/\/[a-zA-Z0-9_-]+\.r2\.dev\/(asesmen\/[^\s\)\"\']+)/i',
            '/media/r2/$1',
            $text
        );

        // 2. Perbaiki kata-kata kota / nama yang sebelumnya rusak terpotong simbol akar (\sqrt)
        $replacements = [
            'Yogy$\\sqrt{ta}$' => 'Yogyakarta',
            'Yogy\\sqrt{ta}' => 'Yogyakarta',
            'J$\\sqrt{ta}$' => 'Jakarta',
            'J\\sqrt{ta}' => 'Jakarta',
            'Sur$\\sqrt{ta}$' => 'Surakarta',
            'Sur\\sqrt{ta}' => 'Surakarta',
            'Suk$\\sqrt{ya}$' => 'Sukakarya',
            'Suk\\sqrt{ya}' => 'Sukakarya',
            'Lok$\\sqrt{ya}$' => 'Lokakarya',
            'Lok\\sqrt{ya}' => 'Lokakarya',
            'M$\\sqrt{im}$' => 'Makarim',
            'M\\sqrt{im}' => 'Makarim',
            'keb$\\sqrt{an}$' => 'kebakaran',
            'keb\\sqrt{an}' => 'kebakaran',
            'pemb$\\sqrt{an}$' => 'pembakaran',
            'pemb\\sqrt{an}' => 'pembakaran',
            '$\\sqrt{kuadrat}$' => 'akar kuadrat',
            '\\sqrt{kuadrat}' => 'akar kuadrat',
            '$\\sqrt{masalah}$' => 'akar masalah',
            '\\sqrt{masalah}' => 'akar masalah',
        ];
        $text = str_replace(array_keys($replacements), array_values($replacements), $text);

        // 3. Perbaiki pola "bakar <kata>" dan "pakar <kata>"
        $text = preg_replace('/b\$?\\\\sqrt\{([a-zA-Z]+)\}\$?/u', 'bakar $1', $text);
        $text = preg_replace('/p\$?\\\\sqrt\{([a-zA-Z]+)\}\$?/u', 'pakar $1', $text);

        return $text;
    };

    $questionCount = 0;
    Question::withoutGlobalScopes()
        ->chunk(100, function ($questions) use (&$questionCount, $repairText) {
            foreach ($questions as $q) {
                $newPrompt = $repairText($q->prompt);
                $newExp = $repairText($q->explanation);
                if ($newPrompt !== $q->prompt || $newExp !== $q->explanation) {
                    $q->forceFill([
                        'prompt' => $newPrompt,
                        'explanation' => $newExp,
                    ])->save();
                    $questionCount++;
                }
            }
        });

    $optionCount = 0;
    QuestionOption::chunk(100, function ($options) use (&$optionCount, $repairText) {
        foreach ($options as $opt) {
            $newText = $repairText($opt->option_text);
            if ($newText !== $opt->option_text) {
                $opt->forceFill(['option_text' => $newText])->save();
                $optionCount++;
            }
        }
    });

    $groupCount = 0;
    QuestionGroup::chunk(100, function ($groups) use (&$groupCount, $repairText) {
        foreach ($groups as $g) {
            $newStim = $repairText($g->stimulus_content);
            if ($newStim !== $g->stimulus_content) {
                $g->forceFill(['stimulus_content' => $newStim])->save();
                $groupCount++;
            }
        }
    });

    $assessmentCount = 0;
    Assessment::withoutGlobalScopes()->chunk(100, function ($assessments) use (&$assessmentCount, $repairText) {
        foreach ($assessments as $a) {
            $newDesc = $repairText($a->description);
            if ($newDesc !== $a->description) {
                $a->forceFill(['description' => $newDesc])->save();
                $assessmentCount++;
            }
        }
    });

    $this->info("Selesai! {$questionCount} butir soal, {$optionCount} opsi jawaban, {$groupCount} grup stimulus, dan {$assessmentCount} asesmen berhasil diperbaiki.");
})->purpose('Perbaiki URL media menjadi proxy lokal dan pulihkan kata rusak simbol akar');

Artisan::command('assessments:randomize-options', function () {
    $this->info('Mengaktifkan randomize_questions & randomize_options pada seluruh asesmen...');

    $assessmentCount = 0;
    Assessment::withoutGlobalScopes()->chunk(100, function ($assessments) use (&$assessmentCount) {
        foreach ($assessments as $a) {
            $settings = (array) ($a->settings ?? []);
            $settings['randomize_questions'] = true;
            $settings['randomize_options'] = true;
            $a->forceFill(['settings' => $settings])->save();
            $assessmentCount++;
        }
    });
    $this->info("Berhasil mengaktifkan setting acak pada {$assessmentCount} asesmen.");

    $sessionCount = 0;
    ExamSession::withoutGlobalScopes()->chunk(100, function ($sessions) use (&$sessionCount) {
        foreach ($sessions as $s) {
            $snapshot = (array) ($s->schedule_snapshot ?? []);
            $snapshot['randomize_questions'] = true;
            $snapshot['randomize_options'] = true;
            $s->forceFill(['schedule_snapshot' => $snapshot])->save();
            $sessionCount++;
        }
    });
    $this->info("Berhasil memperbarui snapshot pada {$sessionCount} sesi ujian aktif.");

    $this->info('Mengacak urutan dan label opsi pada butir soal pilihan ganda (mcq_single, mcq_multiple, mcq_weighted)...');
    $labels = ['A', 'B', 'C', 'D', 'E', 'F'];
    $questionCount = 0;

    Question::whereIn('type', ['mcq_single', 'mcq_multiple', 'mcq_weighted'])
        ->with('options')
        ->chunk(200, function ($questions) use (&$questionCount, $labels) {
            foreach ($questions as $q) {
                $options = $q->options;
                if ($options->count() > 1) {
                    $shuffled = $options->shuffle()->values();
                    foreach ($shuffled as $idx => $opt) {
                        $opt->update([
                            'order' => $idx + 1,
                            'label' => $labels[$idx] ?? (string) ($idx + 1),
                        ]);
                    }
                    $questionCount++;
                }
            }
        });

    $this->info("Berhasil mengacak urutan dan label opsi pada {$questionCount} butir soal.");
})->purpose('Aktifkan acak soal & acak opsi pada seluruh asesmen serta acak posisi opsi di database');
