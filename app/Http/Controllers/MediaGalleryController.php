<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class MediaGalleryController extends Controller
{
    /**
     * Pastikan hanya Owner (Super User) dan Tenant level ENTERPRISE yang bisa mengakses.
     */
    protected function authorizeAccess(): void
    {
        $user = Auth::user();
        if (! $user) {
            abort(401);
        }

        // 1. Super User (Owner) selalu diizinkan
        if ($user->isSuperUser()) {
            return;
        }

        // 2. Siswa tidak memiliki izin
        if ($user->isStudent()) {
            abort(403, 'Akses Galeri Media terbatas untuk Pengelola dan Tenant level ENTERPRISE.');
        }

        // 3. Tenant harus berlevel Enterprise
        $tenant = $user->currentTenant ?? $user->tenants()->first();
        if (! $tenant || ! $tenant->isEnterprise()) {
            abort(403, 'Fitur Galeri Media R2 hanya tersedia untuk Pengelola (Owner) dan Tenant level ENTERPRISE.');
        }
    }

    /**
     * Tampilkan halaman Galeri Media Cloudflare R2 atau respons JSON untuk Media Picker.
     * Hanya mengakses folder 'asesmen' dari bucket R2.
     */
    public function index(Request $request): View|JsonResponse
    {
        $this->authorizeAccess();

        $disk = config('filesystems.upload_disk', 'r2');
        $storage = Storage::disk($disk);

        $rawFiles = [];
        try {
            // Hanya ambil berkas dari folder 'asesmen'
            $rawFiles = $storage->files('asesmen');
        } catch (\Throwable $e) {
            report($e);
        }

        // Pastikan hanya memproses berkas yang berada di dalam folder asesmen/
        $files = collect($rawFiles)
            ->filter(fn (string $path) => str_starts_with($path, 'asesmen/'))
            ->map(function (string $path) use ($storage) {
                $filename = basename($path);
                $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                $isImage = in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'], true);
                $isVideo = in_array($ext, ['mp4', 'webm', 'ogv', 'mov'], true);
                $isAudio = in_array($ext, ['mp3', 'wav', 'ogg', 'm4a', 'aac'], true);

                $sizeBytes = 0;
                $lastModified = 0;

                try {
                    $sizeBytes = $storage->size($path);
                    $lastModified = $storage->lastModified($path);
                } catch (\Throwable) {
                    // Ignore metadata fetch errors
                }

                $url = $storage->url($path);
                if (str_contains($url, '.r2.dev/')) {
                    $url = url('/media/r2/'.$path);
                }

                // Clean human label from filename (e.g. word_20261005_... or random hash)
                $label = pathinfo($filename, PATHINFO_FILENAME);
                if (str_starts_with($label, 'word_')) {
                    $label = 'Ilustrasi Soal '.Str::after($label, 'word_');
                } elseif (strlen($label) > 20) {
                    $label = 'Media '.substr($label, 0, 8);
                }

                return [
                    'path' => $path,
                    'name' => $filename,
                    'filename' => $filename,
                    'label' => $label,
                    'url' => $url,
                    'extension' => $ext,
                    'size' => $sizeBytes,
                    'size_bytes' => $sizeBytes,
                    'size_formatted' => $this->formatBytes($sizeBytes),
                    'last_modified' => $lastModified,
                    'last_modified_formatted' => $lastModified ? date('d M Y, H:i', $lastModified) : '-',
                    'is_image' => $isImage,
                    'is_video' => $isVideo,
                    'is_audio' => $isAudio,
                    'markdown' => "![{$label}]({$url})",
                ];
            })->sortByDesc('last_modified')->values();

        // Filter pencarian
        if ($search = $request->input('search')) {
            $search = strtolower($search);
            $files = $files->filter(function ($item) use ($search) {
                return str_contains(strtolower($item['name']), $search)
                    || str_contains(strtolower($item['label']), $search)
                    || str_contains(strtolower($item['extension']), $search);
            })->values();
        }

        // Filter tipe media
        if ($type = $request->input('type')) {
            if ($type === 'image') {
                $files = $files->filter(fn ($i) => $i['is_image'])->values();
            } elseif ($type === 'audio') {
                $files = $files->filter(fn ($i) => $i['is_audio'])->values();
            } elseif ($type === 'video') {
                $files = $files->filter(fn ($i) => $i['is_video'])->values();
            }
        }

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'total' => $files->count(),
                'count' => $files->count(),
                'files' => $files,
            ]);
        }

        $totalSizeBytes = $files->sum('size_bytes');
        $totalSizeFormatted = $this->formatBytes($totalSizeBytes);

        return view('media.gallery', [
            'files' => $files,
            'totalCount' => $files->count(),
            'totalSizeFormatted' => $totalSizeFormatted,
            'imageCount' => $files->where('is_image', true)->count(),
            'audioCount' => $files->where('is_audio', true)->count(),
            'videoCount' => $files->where('is_video', true)->count(),
        ]);
    }

    /**
     * Endpoint API untuk mengambil daftar file (dipakai oleh modal picker).
     */
    public function getFiles(Request $request): JsonResponse
    {
        $this->authorizeAccess();

        return $this->index($request);
    }

    /**
     * Upload media baru langsung ke bucket Cloudflare R2 folder 'asesmen'.
     */
    public function upload(Request $request): JsonResponse|RedirectResponse
    {
        $this->authorizeAccess();

        $request->validate([
            'media' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,webp,mp3,wav,ogg,m4a,aac,mp4,webm,ogv,mov|max:51200',
            'file' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,webp,mp3,wav,ogg,m4a,aac,mp4,webm,ogv,mov|max:51200',
        ]);

        $file = $request->file('media') ?? $request->file('file');
        if (! $file) {
            if ($request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Berkas tidak ditemukan.'], 422);
            }

            return back()->with('error', 'Berkas tidak ditemukan.');
        }

        $disk = config('filesystems.upload_disk', 'r2');
        // Selalu simpan di dalam folder 'asesmen'
        $path = $file->store('asesmen', $disk);
        $url = Storage::disk($disk)->url($path);
        if (str_contains($url, '.r2.dev/')) {
            $url = url('/media/r2/'.$path);
        }
        $filename = basename($path);
        $label = pathinfo($filename, PATHINFO_FILENAME);

        $fileData = [
            'path' => $path,
            'name' => $file->getClientOriginalName(),
            'filename' => $filename,
            'label' => $label,
            'url' => $url,
            'extension' => strtolower($file->getClientOriginalExtension()),
            'size_bytes' => $file->getSize(),
            'size_formatted' => $this->formatBytes($file->getSize()),
            'markdown' => "![{$file->getClientOriginalName()}]({$url})",
        ];

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Berkas berhasil diunggah ke Cloudflare R2.',
                'file' => $fileData,
            ]);
        }

        return back()->with('success', "Berkas {$filename} berhasil diunggah ke Cloudflare R2.");
    }

    /**
     * Hapus berkas dari Cloudflare R2 (hanya folder 'asesmen').
     */
    public function destroy(Request $request): JsonResponse|RedirectResponse
    {
        $this->authorizeAccess();

        $request->validate([
            'path' => 'required|string',
        ]);

        $rawPath = (string) $request->input('path');
        $filename = basename($rawPath);

        if (empty($filename) || $filename === '.' || $filename === '..') {
            if ($request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Nama berkas tidak valid.'], 422);
            }

            return back()->with('error', 'Nama berkas tidak valid.');
        }

        // Pastikan hanya menghapus berkas yang berada di folder 'asesmen'
        $path = 'asesmen/'.$filename;

        $disk = config('filesystems.upload_disk', 'r2');
        $storage = Storage::disk($disk);

        if ($storage->exists($path)) {
            $storage->delete($path);
        }

        $cachedFilePath = storage_path('app/media_cache/asesmen/'.$filename);
        if (file_exists($cachedFilePath)) {
            @unlink($cachedFilePath);
        }

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Berkas berhasil dihapus dari Cloudflare R2.',
            ]);
        }

        return back()->with('success', 'Berkas berhasil dihapus dari Cloudflare R2.');
    }

    /**
     * Format byte ke satuan yang mudah dibaca.
     */
    protected function formatBytes(int $bytes, int $precision = 1): string
    {
        if ($bytes <= 0) {
            return '0 B';
        }

        $units = ['B', 'KB', 'MB', 'GB'];
        $power = floor(log($bytes, 1024));
        $power = min($power, count($units) - 1);

        return round($bytes / pow(1024, $power), $precision).' '.$units[$power];
    }
}
