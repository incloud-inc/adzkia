<?php

namespace App\Http\Controllers;

use App\Models\SystemSetting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * Display the system, payment gateway, and Cloudflare R2 storage settings page.
     */
    public function index(): View
    {
        $currentDriver = $this->getSettingValue('PAYMENT_GATEWAY_DRIVER', 'payment.default', 'duitku');
        $tripayConfig = [
            'merchant_code' => $this->getSettingValue('TRIPAY_MERCHANT_CODE', 'payment.gateways.tripay.merchant_code', ''),
            'api_key' => $this->getSettingValue('TRIPAY_API_KEY', 'payment.gateways.tripay.api_key', ''),
            'private_key' => $this->getSettingValue('TRIPAY_PRIVATE_KEY', 'payment.gateways.tripay.private_key', ''),
            'sandbox' => filter_var($this->getSettingValue('TRIPAY_SANDBOX', 'payment.gateways.tripay.sandbox', 'true'), FILTER_VALIDATE_BOOLEAN),
        ];
        $duitkuConfig = [
            'merchant_code' => $this->getSettingValue('DUITKU_MERCHANT_CODE', 'payment.gateways.duitku.merchant_code', ''),
            'api_key' => $this->getSettingValue('DUITKU_API_KEY', 'payment.gateways.duitku.api_key', ''),
            'sandbox' => filter_var($this->getSettingValue('DUITKU_SANDBOX', 'payment.gateways.duitku.sandbox', 'true'), FILTER_VALIDATE_BOOLEAN),
        ];
        $midtransConfig = [
            'server_key' => $this->getSettingValue('MIDTRANS_SERVER_KEY', 'payment.gateways.midtrans.server_key', ''),
            'client_key' => $this->getSettingValue('MIDTRANS_CLIENT_KEY', 'payment.gateways.midtrans.client_key', ''),
            'merchant_id' => $this->getSettingValue('MIDTRANS_MERCHANT_ID', 'payment.gateways.midtrans.merchant_id', ''),
            'sandbox' => filter_var($this->getSettingValue('MIDTRANS_SANDBOX', 'payment.gateways.midtrans.sandbox', 'true'), FILTER_VALIDATE_BOOLEAN),
        ];
        $methods = config('payment.methods', []);

        $webhookUrls = [
            'tripay' => route('payment.webhook.tripay'),
            'duitku' => route('payment.webhook.duitku'),
            'midtrans' => route('payment.webhook.midtrans'),
            'generic' => route('payment.webhook.generic'),
        ];

        // 1. Status Real-Time Database
        $defaultConn = config('database.default', 'pgsql');
        $connConfig = config("database.connections.{$defaultConn}", []);
        $dbStatus = [
            'connection' => $defaultConn,
            'driver' => $connConfig['driver'] ?? $defaultConn,
            'host' => $connConfig['host'] ?? '127.0.0.1',
            'port' => $connConfig['port'] ?? 5432,
            'database' => $connConfig['database'] ?? 'adzkia',
            'connected' => false,
            'ping_ms' => null,
            'version' => null,
            'error' => null,
        ];

        try {
            $startDb = microtime(true);
            $pdo = DB::connection()->getPdo();
            $dbStatus['connected'] = true;
            $dbStatus['ping_ms'] = round((microtime(true) - $startDb) * 1000);
            $dbStatus['version'] = $pdo->getAttribute(\PDO::ATTR_SERVER_VERSION);
        } catch (\Throwable $e) {
            $dbStatus['connected'] = false;
            $dbStatus['error'] = $e->getMessage();
        }

        // 2. Status Real-Time Redis
        $redisHost = config('database.redis.default.host');
        $redisPort = config('database.redis.default.port', 6379);
        $redisStatus = [
            'configured' => ! empty($redisHost) && $redisHost !== 'null',
            'client' => config('database.redis.client', 'phpredis'),
            'host' => $redisHost ?? '127.0.0.1',
            'port' => $redisPort,
            'connected' => false,
            'ping' => null,
            'ping_ms' => null,
            'cache_driver' => config('cache.default', 'file'),
            'queue_driver' => config('queue.default', 'database'),
            'error' => null,
        ];

        try {
            if (class_exists(Redis::class)) {
                $startRedis = microtime(true);
                $pong = Redis::connection()->ping();
                $redisStatus['connected'] = ($pong === true || $pong === '+PONG' || $pong === 'PONG');
                $redisStatus['ping'] = is_string($pong) ? $pong : 'PONG';
                $redisStatus['ping_ms'] = round((microtime(true) - $startRedis) * 1000);
            }
        } catch (\Throwable $e) {
            $redisStatus['connected'] = false;
            $redisStatus['error'] = $e->getMessage();
        }

        // 3. Status Real-Time Cloudflare R2 Object Storage
        $uploadDisk = $this->getSettingValue('UPLOAD_DISK', 'filesystems.upload_disk', 'r2');
        $r2Key = $this->getSettingValue('CLOUDFLARE_R2_ACCESS_KEY_ID', 'filesystems.disks.r2.key', '');
        $r2Secret = $this->getSettingValue('CLOUDFLARE_R2_SECRET_ACCESS_KEY', 'filesystems.disks.r2.secret', '');
        $r2Bucket = $this->getSettingValue('CLOUDFLARE_R2_BUCKET', 'filesystems.disks.r2.bucket', 'adzkia');
        $r2Endpoint = $this->getSettingValue('CLOUDFLARE_R2_ENDPOINT', 'filesystems.disks.r2.endpoint', '');
        $r2Url = $this->getSettingValue('CLOUDFLARE_R2_URL', 'filesystems.disks.r2.url', '');
        $r2Region = $this->getSettingValue('CLOUDFLARE_R2_REGION', 'filesystems.disks.r2.region', 'auto');

        $r2Status = [
            'active_upload_disk' => $uploadDisk,
            'configured' => ! empty($r2Key) && ! empty($r2Secret) && ! empty($r2Bucket) && ! empty($r2Endpoint),
            'bucket' => $r2Bucket,
            'endpoint' => $r2Endpoint,
            'url' => $r2Url,
            'region' => $r2Region,
            'has_key' => ! empty($r2Key),
            'key_preview' => ! empty($r2Key) ? substr($r2Key, 0, 4).'...'.substr($r2Key, -4) : null,
            'has_secret' => ! empty($r2Secret),
            'connected' => false,
            'ping_ms' => null,
            'file_count' => null,
            'error' => null,
        ];

        if ($r2Status['configured']) {
            try {
                config([
                    'filesystems.disks.r2.key' => $r2Key,
                    'filesystems.disks.r2.secret' => $r2Secret,
                    'filesystems.disks.r2.bucket' => $r2Bucket,
                    'filesystems.disks.r2.endpoint' => $r2Endpoint,
                    'filesystems.disks.r2.url' => $r2Url,
                    'filesystems.disks.r2.region' => $r2Region,
                ]);

                $startR2 = microtime(true);
                $storage = Storage::disk('r2');
                $files = $storage->files('asesmen');
                if (empty($files)) {
                    $files = $storage->files('tenants/favicons');
                }
                $r2Status['connected'] = true;
                $r2Status['ping_ms'] = round((microtime(true) - $startR2) * 1000);
                $r2Status['file_count'] = count($files);
            } catch (\Throwable $e) {
                $r2Status['connected'] = false;
                $r2Status['error'] = $e->getMessage();
            }
        } else {
            $r2Status['error'] = 'Kredensial Cloudflare R2 belum lengkap (Access Key, Secret Key, Endpoint, atau Bucket kosong).';
        }

        $r2Config = [
            'upload_disk' => $uploadDisk,
            'key' => $r2Key,
            'secret' => $r2Secret,
            'bucket' => $r2Bucket,
            'endpoint' => $r2Endpoint,
            'url' => $r2Url,
            'region' => $r2Region,
        ];

        // 4. Status AI Engines
        $deepseekKey = $this->getSettingValue('DEEPSEEK_API_KEY', 'services.deepseek.api_key', '');
        $geminiKey = $this->getSettingValue('GEMINI_API_KEY', 'services.gemini.api_key', '');
        $aiStatus = [
            'deepseek' => [
                'enabled' => config('services.deepseek.enabled', true),
                'configured' => ! empty($deepseekKey),
                'key_preview' => ! empty($deepseekKey) ? substr($deepseekKey, 0, 6).'...'.substr($deepseekKey, -4) : null,
                'model' => config('services.deepseek.model', 'deepseek-reasoner'),
                'base_url' => config('services.deepseek.base_url', 'https://api.deepseek.com'),
                'timeout' => config('services.deepseek.timeout', 60),
            ],
            'gemini' => [
                'enabled' => config('services.gemini.enabled', true),
                'configured' => ! empty($geminiKey),
                'key_preview' => ! empty($geminiKey) ? substr($geminiKey, 0, 6).'...'.substr($geminiKey, -4) : null,
                'model' => config('services.gemini.model', 'gemini-2.5-flash'),
                'base_url' => config('services.gemini.base_url', 'https://generativelanguage.googleapis.com/v1beta'),
                'timeout' => config('services.gemini.timeout', 120),
            ],
        ];

        $tiers = [
            'starter' => [
                'name' => 'Starter (Gratis)',
                'platform_pct' => 75,
                'tenant_pct' => 25,
                'description' => 'Paket dasar gratis untuk tenant baru. Platform ADZKIA memfasilitasi hosting dan kurasi asesmen penuh.',
            ],
            'pro' => [
                'name' => 'Pro (Premium)',
                'platform_pct' => 50,
                'tenant_pct' => 50,
                'description' => 'Paket profesional dengan custom domain dan branding institusi. Pembagian hasil 50% : 50% seimbang.',
            ],
            'enterprise' => [
                'name' => 'Enterprise (Whitelabel)',
                'platform_pct' => 25,
                'tenant_pct' => 75,
                'description' => 'Paket kustom penuh tanpa embel-embel platform. Hak hasil terbesar (75%) disalurkan langsung ke dompet tenant.',
            ],
        ];

        return view('settings.index', compact(
            'currentDriver',
            'tripayConfig',
            'duitkuConfig',
            'midtransConfig',
            'methods',
            'webhookUrls',
            'dbStatus',
            'redisStatus',
            'r2Status',
            'r2Config',
            'aiStatus',
            'tiers'
        ));
    }

    /**
     * Update payment gateway, storage, and system settings.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            // Payment Gateway
            'payment_driver' => 'required|in:tripay,duitku,midtrans,sandbox',
            'tripay_merchant_code' => 'nullable|string|max:100',
            'tripay_api_key' => 'nullable|string|max:255',
            'tripay_private_key' => 'nullable|string|max:255',
            'tripay_sandbox' => 'nullable|boolean',
            'duitku_merchant_code' => 'nullable|string|max:100',
            'duitku_api_key' => 'nullable|string|max:255',
            'duitku_sandbox' => 'nullable|boolean',
            'midtrans_server_key' => 'nullable|string|max:255',
            'midtrans_client_key' => 'nullable|string|max:255',
            'midtrans_merchant_id' => 'nullable|string|max:100',
            'midtrans_sandbox' => 'nullable|boolean',
            // Storage Cloudflare R2
            'upload_disk' => 'required|in:r2,public',
            'r2_bucket' => 'nullable|string|max:150',
            'r2_endpoint' => 'nullable|string|max:255',
            'r2_access_key_id' => 'nullable|string|max:255',
            'r2_secret_access_key' => 'nullable|string|max:255',
            'r2_url' => 'nullable|string|max:255',
            'r2_region' => 'nullable|string|max:50',
            // AI Keys (Optional)
            'deepseek_api_key' => 'nullable|string|max:255',
            'gemini_api_key' => 'nullable|string|max:255',
        ]);

        $envUpdates = [
            'PAYMENT_GATEWAY_DRIVER' => $validated['payment_driver'],
            'TRIPAY_MERCHANT_CODE' => $validated['tripay_merchant_code'] ?? '',
            'TRIPAY_API_KEY' => $validated['tripay_api_key'] ?? '',
            'TRIPAY_PRIVATE_KEY' => $validated['tripay_private_key'] ?? '',
            'TRIPAY_SANDBOX' => $request->has('tripay_sandbox') ? 'true' : 'false',
            'DUITKU_MERCHANT_CODE' => $validated['duitku_merchant_code'] ?? '',
            'DUITKU_API_KEY' => $validated['duitku_api_key'] ?? '',
            'DUITKU_SANDBOX' => $request->has('duitku_sandbox') ? 'true' : 'false',
            'MIDTRANS_SERVER_KEY' => $validated['midtrans_server_key'] ?? '',
            'MIDTRANS_CLIENT_KEY' => $validated['midtrans_client_key'] ?? '',
            'MIDTRANS_MERCHANT_ID' => $validated['midtrans_merchant_id'] ?? '',
            'MIDTRANS_SANDBOX' => $request->has('midtrans_sandbox') ? 'true' : 'false',
            // Storage
            'UPLOAD_DISK' => $validated['upload_disk'],
            'CLOUDFLARE_R2_BUCKET' => $validated['r2_bucket'] ?? 'adzkia',
            'CLOUDFLARE_R2_ENDPOINT' => $validated['r2_endpoint'] ?? '',
            'CLOUDFLARE_R2_ACCESS_KEY_ID' => $validated['r2_access_key_id'] ?? '',
            'CLOUDFLARE_R2_SECRET_ACCESS_KEY' => $validated['r2_secret_access_key'] ?? '',
            'CLOUDFLARE_R2_URL' => $validated['r2_url'] ?? '',
            'CLOUDFLARE_R2_REGION' => $validated['r2_region'] ?? 'auto',
        ];

        if ($request->filled('deepseek_api_key')) {
            $envUpdates['DEEPSEEK_API_KEY'] = $validated['deepseek_api_key'];
        }
        if ($request->filled('gemini_api_key')) {
            $envUpdates['GEMINI_API_KEY'] = $validated['gemini_api_key'];
        }

        // 1. Simpan ke database SystemSetting agar permanen melintasi restart/redeploy container
        SystemSetting::setMany($envUpdates);

        // 2. Terapkan langsung ke config runtime saat ini
        config([
            'filesystems.upload_disk' => $envUpdates['UPLOAD_DISK'],
            'filesystems.disks.r2.key' => $envUpdates['CLOUDFLARE_R2_ACCESS_KEY_ID'],
            'filesystems.disks.r2.secret' => $envUpdates['CLOUDFLARE_R2_SECRET_ACCESS_KEY'],
            'filesystems.disks.r2.bucket' => $envUpdates['CLOUDFLARE_R2_BUCKET'],
            'filesystems.disks.r2.endpoint' => $envUpdates['CLOUDFLARE_R2_ENDPOINT'],
            'filesystems.disks.r2.url' => $envUpdates['CLOUDFLARE_R2_URL'],
            'filesystems.disks.r2.region' => $envUpdates['CLOUDFLARE_R2_REGION'],
            'payment.default' => $envUpdates['PAYMENT_GATEWAY_DRIVER'],
        ]);

        // 3. Tulis juga ke berkas .env server
        $this->updateEnvFile($envUpdates);

        // 4. Bersihkan dan perbarui config cache Laravel
        try {
            Artisan::call('config:clear');
            Artisan::call('config:cache');
        } catch (\Throwable $e) {
            report($e);
        }

        if (function_exists('opcache_reset')) {
            @opcache_reset();
        }

        $activeTab = $request->input('active_tab', 'storage');

        return redirect()->to(route('settings.index').'#'.$activeTab)
            ->with('success', 'Konfigurasi Sistem, Cloudflare R2, dan Payment Gateway berhasil disimpan secara permanen!');
    }

    /**
     * AJAX endpoint to test specific system connection dynamically.
     */
    public function testConnection(Request $request, string $target): JsonResponse
    {
        $start = microtime(true);

        switch ($target) {
            case 'r2':
                $key = $request->input('r2_access_key_id') ?: $this->getSettingValue('CLOUDFLARE_R2_ACCESS_KEY_ID', 'filesystems.disks.r2.key', '');
                $secret = $request->input('r2_secret_access_key') ?: $this->getSettingValue('CLOUDFLARE_R2_SECRET_ACCESS_KEY', 'filesystems.disks.r2.secret', '');
                $bucket = $request->input('r2_bucket') ?: $this->getSettingValue('CLOUDFLARE_R2_BUCKET', 'filesystems.disks.r2.bucket', 'adzkia');
                $endpoint = $request->input('r2_endpoint') ?: $this->getSettingValue('CLOUDFLARE_R2_ENDPOINT', 'filesystems.disks.r2.endpoint', '');
                $region = $request->input('r2_region') ?: $this->getSettingValue('CLOUDFLARE_R2_REGION', 'filesystems.disks.r2.region', 'auto');

                if (empty($key) || empty($secret) || empty($bucket) || empty($endpoint)) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Kredensial Cloudflare R2 belum lengkap. Mohon lengkapi Access Key ID, Secret Key, Endpoint, dan Nama Bucket.',
                    ], 422);
                }

                try {
                    config([
                        'filesystems.disks.r2_test' => [
                            'driver' => 's3',
                            'key' => $key,
                            'secret' => $secret,
                            'region' => $region,
                            'bucket' => $bucket,
                            'endpoint' => $endpoint,
                            'use_path_style_endpoint' => false,
                            'throw' => true,
                        ],
                    ]);

                    $storage = Storage::disk('r2_test');
                    $files = $storage->files('asesmen');
                    if (empty($files)) {
                        $files = $storage->files('tenants/favicons');
                    }
                    if (empty($files)) {
                        $files = $storage->files('');
                    }
                    $ping = round((microtime(true) - $start) * 1000);

                    return response()->json([
                        'success' => true,
                        'message' => 'Koneksi Cloudflare R2 berhasil! Terhubung ke bucket "'.$bucket.'". Ditemukan '.count($files).' berkas.',
                        'ping_ms' => $ping,
                        'file_count' => count($files),
                    ]);
                } catch (\Throwable $e) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Gagal terhubung ke Cloudflare R2: '.$e->getMessage(),
                    ], 500);
                }

            case 'database':
                try {
                    $pdo = DB::connection()->getPdo();
                    $ping = round((microtime(true) - $start) * 1000);
                    $version = $pdo->getAttribute(\PDO::ATTR_SERVER_VERSION);
                    $driver = DB::connection()->getDriverName();
                    $host = config('database.connections.'.config('database.default').'.host', '127.0.0.1');

                    return response()->json([
                        'success' => true,
                        'message' => "Koneksi Database {$driver} ({$host}) aktif & terhubung! Versi Server: {$version}",
                        'ping_ms' => $ping,
                    ]);
                } catch (\Throwable $e) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Gagal terhubung ke Database: '.$e->getMessage(),
                    ], 500);
                }

            case 'redis':
                try {
                    if (! class_exists(Redis::class)) {
                        throw new \RuntimeException('Ekstensi atau Facade Redis tidak tersedia di lingkungan PHP ini.');
                    }
                    $pong = Redis::connection()->ping();
                    $ping = round((microtime(true) - $start) * 1000);

                    return response()->json([
                        'success' => true,
                        'message' => 'Koneksi Redis aktif & terhubung! Respon: '.(is_string($pong) ? $pong : 'PONG'),
                        'ping_ms' => $ping,
                    ]);
                } catch (\Throwable $e) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Gagal terhubung ke Redis: '.$e->getMessage(),
                    ], 500);
                }

            case 'ai-deepseek':
                $apiKey = $request->input('deepseek_api_key', config('services.deepseek.api_key'));
                if (empty($apiKey)) {
                    return response()->json([
                        'success' => false,
                        'message' => 'DeepSeek API Key belum diisi.',
                    ], 422);
                }
                try {
                    $res = Http::timeout(10)->withToken($apiKey)->get('https://api.deepseek.com/models');
                    $ping = round((microtime(true) - $start) * 1000);
                    if ($res->successful()) {
                        return response()->json([
                            'success' => true,
                            'message' => 'DeepSeek API valid & terhubung! Respon HTTP 200 OK.',
                            'ping_ms' => $ping,
                        ]);
                    }

                    return response()->json([
                        'success' => false,
                        'message' => 'DeepSeek API merespons dengan kode HTTP '.$res->status().': '.$res->body(),
                    ], 500);
                } catch (\Throwable $e) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Gagal menghubungi DeepSeek API: '.$e->getMessage(),
                    ], 500);
                }

            default:
                return response()->json([
                    'success' => false,
                    'message' => 'Layanan target pengujian tidak dikenal.',
                ], 400);
        }
    }

    /**
     * Helper to write keys into .env safely.
     */
    protected function updateEnvFile(array $data): void
    {
        $envPath = base_path('.env');
        if (! File::exists($envPath)) {
            return;
        }

        if (! is_writable($envPath)) {
            @chmod($envPath, 0664);
        }

        $envContent = File::get($envPath);

        foreach ($data as $key => $value) {
            $formattedValue = (str_contains($value, ' ') || str_contains($value, '#') || str_contains($value, '$')) ? "\"{$value}\"" : $value;
            $safeReplacement = str_replace(['\\', '$'], ['\\\\', '\\$'], "{$key}={$formattedValue}");

            if (preg_match("/^{$key}=.*/m", $envContent)) {
                $envContent = preg_replace("/^{$key}=.*/m", $safeReplacement, $envContent);
            } else {
                $envContent .= "\n{$key}={$formattedValue}";
            }

            putenv("{$key}={$value}");
            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
        }

        try {
            File::put($envPath, $envContent);
        } catch (\Throwable $e) {
            report($e);
        }
    }

    /**
     * Helper to get setting value with prioritization:
     * 1. SystemSetting (Database)
     * 2. .env file directly parsed
     * 3. config()
     * 4. env()
     * 5. Default fallback
     */
    protected function getSettingValue(string $envKey, ?string $configKey = null, $default = ''): string
    {
        // 1. Dari database SystemSetting
        $dbVal = SystemSetting::get($envKey);
        if ($dbVal !== null && $dbVal !== '') {
            return (string) $dbVal;
        }

        // 2. Dari .env file langsung (kebal dari config:cache)
        $fileVal = $this->parseEnvFile($envKey);
        if ($fileVal !== null && $fileVal !== '') {
            return (string) $fileVal;
        }

        // 3. Dari config Laravel jika disediakan
        if ($configKey !== null) {
            $cfgVal = config($configKey);
            if ($cfgVal !== null && $cfgVal !== '') {
                return (string) $cfgVal;
            }
        }

        // 4. Dari env()
        $envVal = env($envKey);
        if ($envVal !== null && $envVal !== '') {
            return (string) $envVal;
        }

        return (string) $default;
    }

    /**
     * Parse single key from .env directly without relying on env() or config().
     */
    protected function parseEnvFile(string $key): ?string
    {
        static $parsedEnv = null;
        if ($parsedEnv === null) {
            $parsedEnv = [];
            $envPath = base_path('.env');
            if (File::exists($envPath)) {
                $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                if ($lines !== false) {
                    foreach ($lines as $line) {
                        $line = trim($line);
                        if ($line === '' || str_starts_with($line, '#')) {
                            continue;
                        }
                        if (str_contains($line, '=')) {
                            [$k, $v] = explode('=', $line, 2);
                            $k = trim($k);
                            $v = trim($v, " \t\n\r\0\x0B\"'");
                            $parsedEnv[$k] = $v;
                        }
                    }
                }
            }
        }

        return $parsedEnv[$key] ?? null;
    }
}
