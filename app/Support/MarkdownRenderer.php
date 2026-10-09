<?php

namespace App\Support;

use Illuminate\Support\Str;

class MarkdownRenderer
{
    /**
     * Render markdown text to HTML while strictly preserving KaTeX / LaTeX math formulas ($...$ and $$...$$).
     * Prevents CommonMark from mangling LaTeX underscores (_ to <em>) and asterisks (* to <em>).
     */
    public static function render(?string $markdown, array $options = []): string
    {
        if ($markdown === null || trim($markdown) === '') {
            return '';
        }

        $placeholders = [];
        $tokenIndex = 0;

        $protect = function (string $rawMath) use (&$placeholders, &$tokenIndex): string {
            $token = '<!--KATEX_MATH_TOKEN_'.$tokenIndex.'_SECURE-->';
            $placeholders[$token] = $rawMath;
            $tokenIndex++;

            return $token;
        };

        $processed = $markdown;

        // 1. Lindungi Display Math ($$...$$)
        $processed = preg_replace_callback('/\$\$([\s\S]*?)\$\$/u', function ($m) use ($protect) {
            return $protect($m[0]);
        }, $processed);

        // 2. Lindungi Inline Math ($...$)
        $processed = preg_replace_callback('/\$([^\$\r\n]+?)\$/u', function ($m) use ($protect) {
            return $protect($m[0]);
        }, $processed);

        // 3. Lindungi LaTeX delimiter standar \(...\) dan \[...\]
        $processed = preg_replace_callback('/\\\\\(([\s\S]*?)\\\\\)/u', function ($m) use ($protect) {
            return $protect($m[0]);
        }, $processed);
        $processed = preg_replace_callback('/\\\\\[([\s\S]*?)\\\\\]/u', function ($m) use ($protect) {
            return $protect($m[0]);
        }, $processed);

        // 4. Render Markdown via CommonMark bawaan Laravel
        $html = Str::markdown($processed, $options);

        // 5. Kembalikan token math yang diproteksi
        if (! empty($placeholders)) {
            $html = strtr($html, $placeholders);
        }

        return $html;
    }
}
