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

        // 0. Otomatis alihkan URL Cloudflare R2 *.r2.dev ke media proxy lokal /media/r2
        // Mengatasi pemblokiran DNS / TrustPositif oleh ISP Indonesia terhadap subdomain gratis r2.dev
        $r2BaseUrl = '/media/r2';
        if (function_exists('app') && app()->has('config')) {
            $configuredUrl = config('filesystems.disks.r2.url');
            if (! empty($configuredUrl) && ! str_contains($configuredUrl, 'r2.dev')) {
                $r2BaseUrl = $configuredUrl;
            } elseif (function_exists('url')) {
                $r2BaseUrl = url('/media/r2');
            }
        }
        $processed = preg_replace(
            '/https:\/\/[a-zA-Z0-9_-]+\.r2\.dev\/(asesmen\/[^\s\)\"\']+)/i',
            rtrim($r2BaseUrl, '/').'/$1',
            $processed
        );

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

        // 6. Hilangkan atribut autoplay pada tag <audio> dan <video> agar tidak memutar suara otomatis secara bersamaan
        $html = preg_replace_callback('/<(audio|video)\b([^>]*?)>/i', function ($m) {
            $tag = $m[1];
            $attrs = $m[2];
            // Hapus atribut autoplay (autoplay, autoplay="true", autoplay="autoplay", dll)
            $attrs = preg_replace('/\bautoplay(?:\s*=\s*(?:["\'][^"\']*["\']|[^\s>]+))?/i', '', $attrs);
            // Tambahkan preload="metadata" jika belum memiliki atribut preload
            if (! preg_match('/\bpreload\s*=/i', $attrs)) {
                $attrs .= ' preload="metadata"';
            }

            return "<{$tag}{$attrs}>";
        }, $html);

        return $html;
    }
}
