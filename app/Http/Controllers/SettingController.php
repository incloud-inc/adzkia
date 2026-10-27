<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redis;
use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * Display the system and payment gateway settings page.
     */
    public function index(): View
    {
        $currentDriver = config('payment.default', 'duitku');
        $tripayConfig = config('payment.gateways.tripay', []);
        $duitkuConfig = config('payment.gateways.duitku', []);
        $midtransConfig = config('payment.gateways.midtrans', []);
        $methods = config('payment.methods', []);

        $webhookUrls = [
            'tripay' => route('payment.webhook.tripay'),
            'duitku' => route('payment.webhook.duitku'),
            'midtrans' => route('payment.webhook.midtrans'),
            'generic' => route('payment.webhook.generic'),
        ];

        // Status Redis untuk Tab Status Sistem
        $redisStatus = [
            'configured' => config('database.redis.default.host') !== null,
            'client' => config('database.redis.client', 'phpredis'),
            'host' => config('database.redis.default.host', '127.0.0.1'),
            'port' => config('database.redis.default.port', 6379),
            'connected' => false,
            'ping' => null,
            'cache_driver' => config('cache.default', 'file'),
            'queue_driver' => config('queue.default', 'database'),
            'error' => null,
        ];

        try {
            if (class_exists(Redis::class)) {
                $pong = Redis::connection()->ping();
                $redisStatus['connected'] = ($pong === true || $pong === '+PONG' || $pong === 'PONG');
                $redisStatus['ping'] = is_string($pong) ? $pong : 'PONG';
            }
        } catch (\Throwable $e) {
            $redisStatus['connected'] = false;
            $redisStatus['error'] = $e->getMessage();
        }

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
            'redisStatus',
            'tiers'
        ));
    }

    /**
     * Update payment gateway & system settings.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
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
        ];

        $this->updateEnvFile($envUpdates);

        return redirect()->route('settings.index')->with('success', 'Konfigurasi Payment Gateway & Sistem berhasil disimpan!');
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

        $envContent = File::get($envPath);

        foreach ($data as $key => $value) {
            $formattedValue = (str_contains($value, ' ') || str_contains($value, '#')) ? "\"{$value}\"" : $value;

            if (preg_match("/^{$key}=.*/m", $envContent)) {
                $envContent = preg_replace("/^{$key}=.*/m", "{$key}={$formattedValue}", $envContent);
            } else {
                $envContent .= "\n{$key}={$formattedValue}";
            }
        }

        File::put($envPath, $envContent);
    }
}
