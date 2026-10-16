<?php

use App\Models\Assessment;
use App\Models\ExamSession;
use App\Models\Question;
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
    $this->info('Memperbaiki URL Cloudflare R2 (*.r2.dev) ke media proxy (/media/r2/) pada bank soal dan opsi...');

    $questionCount = 0;
    Question::withoutGlobalScopes()
        ->where('prompt', 'like', '%r2.dev%')
        ->chunk(100, function ($questions) use (&$questionCount) {
            foreach ($questions as $q) {
                $newPrompt = preg_replace(
                    '/https:\/\/[a-zA-Z0-9_-]+\.r2\.dev\/(asesmen\/[^\s\)\"\']+)/i',
                    '/media/r2/$1',
                    $q->prompt
                );
                if ($newPrompt !== $q->prompt) {
                    $q->forceFill(['prompt' => $newPrompt])->save();
                    $questionCount++;
                }
            }
        });

    $optionCount = 0;
    QuestionOption::where('option_text', 'like', '%r2.dev%')
        ->chunk(100, function ($options) use (&$optionCount) {
            foreach ($options as $opt) {
                $newText = preg_replace(
                    '/https:\/\/[a-zA-Z0-9_-]+\.r2\.dev\/(asesmen\/[^\s\)\"\']+)/i',
                    '/media/r2/$1',
                    $opt->option_text
                );
                if ($newText !== $opt->option_text) {
                    $opt->forceFill(['option_text' => $newText])->save();
                    $optionCount++;
                }
            }
        });

    $this->info("Selesai! {$questionCount} soal dan {$optionCount} opsi jawaban berhasil dialihkan ke /media/r2/.");
})->purpose('Perbaiki URL R2 terblokir menjadi media proxy lokal');

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
