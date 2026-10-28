<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;

class MediaProxyController extends Controller
{
    /**
     * Layani dan cache berkas media dari Cloudflare R2 secara lokal.
     * Mengatasi pemblokiran DNS / TrustPositif pada domain bawaan *.r2.dev di Indonesia,
     * serta mendukung aset media asesmen, branding tenant (logo/cover/favicon), dan profil siswa/biolink.
     */
    public function show(Request $request, string $path): Response
    {
        // 1. Bersihkan path dari karakter berbahaya
        $cleanPath = ltrim(str_replace('\\', '/', $path), '/');

        // Cegah directory traversal
        if (str_contains($cleanPath, '..') || str_contains($cleanPath, "\0")) {
            abort(400, 'Invalid media path.');
        }

        $filename = basename($cleanPath);
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        $allowedExtensions = [
            'jpg', 'jpeg', 'png', 'gif', 'svg', 'webp', 'ico',
            'mp3', 'wav', 'ogg', 'm4a', 'aac',
            'mp4', 'webm', 'ogv', 'mov',
        ];

        if (! in_array($ext, $allowedExtensions, true)) {
            abort(403, 'Tipe berkas tidak didukung.');
        }

        // 2. Cek apakah berkas sudah ada di cache lokal (berdasarkan path langsung atau dengan prefix asesmen/)
        $baseCacheDir = storage_path('app/media_cache');
        $directCachePath = $baseCacheDir.DIRECTORY_SEPARATOR.str_replace('/', DIRECTORY_SEPARATOR, $cleanPath);
        $asesmenCachePath = $baseCacheDir.DIRECTORY_SEPARATOR.'asesmen'.DIRECTORY_SEPARATOR.str_replace('/', DIRECTORY_SEPARATOR, $cleanPath);

        if (file_exists($directCachePath) && filesize($directCachePath) > 0) {
            return $this->sendFileResponse($directCachePath, $ext);
        }

        if (file_exists($asesmenCachePath) && filesize($asesmenCachePath) > 0) {
            return $this->sendFileResponse($asesmenCachePath, $ext);
        }

        // 3. Cari berkas di Cloudflare R2 atau Public disk
        $disk = config('filesystems.upload_disk', 'r2');
        $storage = Storage::disk($disk);

        $resolvedPath = null;
        $resolvedDisk = $disk;

        try {
            if ($storage->exists($cleanPath)) {
                $resolvedPath = $cleanPath;
                $resolvedDisk = $disk;
            } elseif (! str_starts_with($cleanPath, 'asesmen/') && $storage->exists('asesmen/'.$cleanPath)) {
                $resolvedPath = 'asesmen/'.$cleanPath;
                $resolvedDisk = $disk;
            }
        } catch (\Throwable $e) {
            report($e);
        }

        if (! $resolvedPath) {
            try {
                if (Storage::disk('public')->exists($cleanPath)) {
                    $resolvedPath = $cleanPath;
                    $resolvedDisk = 'public';
                } elseif (! str_starts_with($cleanPath, 'asesmen/') && Storage::disk('public')->exists('asesmen/'.$cleanPath)) {
                    $resolvedPath = 'asesmen/'.$cleanPath;
                    $resolvedDisk = 'public';
                }
            } catch (\Throwable $e) {
                report($e);
            }
        }

        if (! $resolvedPath) {
            abort(404, 'Berkas media tidak ditemukan.');
        }

        // Jika ada di public disk lokal, sajikan langsung
        if ($resolvedDisk === 'public') {
            $publicPath = Storage::disk('public')->path($resolvedPath);

            return $this->sendFileResponse($publicPath, $ext);
        }

        // 4. Unduh dari R2 dan simpan ke media_cache
        $targetCachePath = $baseCacheDir.DIRECTORY_SEPARATOR.str_replace('/', DIRECTORY_SEPARATOR, $resolvedPath);
        $targetDir = dirname($targetCachePath);
        if (! is_dir($targetDir)) {
            @mkdir($targetDir, 0755, true);
        }

        try {
            $stream = $storage->readStream($resolvedPath);
            if ($stream) {
                $targetFile = fopen($targetCachePath, 'wb');
                stream_copy_to_stream($stream, $targetFile);
                fclose($targetFile);
                if (is_resource($stream)) {
                    fclose($stream);
                }
            } else {
                $content = $storage->get($resolvedPath);
                file_put_contents($targetCachePath, $content);
            }
        } catch (\Throwable $e) {
            report($e);
            abort(502, 'Gagal mengambil berkas dari Cloudflare R2.');
        }

        if (file_exists($targetCachePath) && filesize($targetCachePath) > 0) {
            return $this->sendFileResponse($targetCachePath, $ext);
        }

        abort(500, 'Gagal menyimpan cache berkas media.');
    }

    /**
     * Kirim berkas dengan header cache yang optimal dan dukungan Range Request.
     */
    protected function sendFileResponse(string $filePath, string $ext): BinaryFileResponse
    {
        $mimeTypes = [
            'webp' => 'image/webp',
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
            'ico' => 'image/x-icon',
            'mp3' => 'audio/mpeg',
            'wav' => 'audio/wav',
            'ogg' => 'audio/ogg',
            'm4a' => 'audio/mp4',
            'aac' => 'audio/aac',
            'mp4' => 'video/mp4',
            'webm' => 'video/webm',
            'ogv' => 'video/ogg',
            'mov' => 'video/quicktime',
        ];

        $contentType = $mimeTypes[$ext] ?? 'application/octet-stream';

        return response()->file($filePath, [
            'Content-Type' => $contentType,
            'Cache-Control' => 'public, max-age=31536000, immutable',
            'Access-Control-Allow-Origin' => '*',
        ]);
    }
}
