<?php

use App\Models\Assessment;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('assessments:insert-grade12-image', function () {
    $imageMarkdown = "\n\n![segitiga siku-siku.webp](https://pub-aeb2ed90015841b3aa9346f044e853a9.r2.dev/asesmen/YQqjHBJTCflSIP1XktU3a3kwHa7kjt0Tk1pikv0h.webp)\n\n";

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
