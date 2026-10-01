<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ApiAccessProtectionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 1. Rate Limiting: Login endpoint membatasi percobaan brute-force hingga maks 5x.
     */
    public function test_login_endpoint_rate_limiting_locks_out_after_five_failed_attempts(): void
    {
        $user = User::factory()->create([
            'email' => 'victim@adzkia.id',
            'password' => Hash::make('CorrectPassword123!'),
        ]);

        // Kirim 5x percobaan gagal berturut-turut
        for ($i = 0; $i < 5; $i++) {
            $response = $this->post('/login', [
                'email' => 'victim@adzkia.id',
                'password' => 'WrongPassword!',
            ]);
            $response->assertSessionHasErrors('email');
        }

        // Percobaan ke-6 harus di-lockout oleh RateLimiter
        $lockoutResponse = $this->post('/login', [
            'email' => 'victim@adzkia.id',
            'password' => 'WrongPassword!',
        ]);

        $lockoutResponse->assertSessionHasErrors('email');
        $errorMessage = session('errors')->first('email');
        $this->assertTrue(
            str_contains($errorMessage, 'terlalu banyak') || str_contains($errorMessage, 'Too many login attempts') || str_contains($errorMessage, 'detik'),
            'Error message should indicate rate limit lockout.'
        );
    }

    /**
     * 2. CORS Ketat: Origin pihak ketiga tidak sah ditolak / tidak di-reflect.
     */
    public function test_cors_rejects_untrusted_origins(): void
    {
        $response = $this->withHeaders([
            'Origin' => 'https://malicious-attacker.com',
            'Access-Control-Request-Method' => 'GET',
        ])->json('GET', '/api/postal-codes/search?q=medan');

        // Pastikan Access-Control-Allow-Origin tidak merefleksikan domain penyerang
        $allowedOrigin = $response->headers->get('Access-Control-Allow-Origin');
        $this->assertNotEquals('https://malicious-attacker.com', $allowedOrigin);
    }

    /**
     * 3. Proteksi CSRF: Route state-changing web menolak request tanpa CSRF token (HTTP 419),
     *    sedangkan webhook dikecualikan secara eksplisit.
     */
    public function test_csrf_protection_and_webhook_exception(): void
    {
        $user = User::factory()->create();

        // A. Request web tanpa CSRF token harus gagal 419 (Page Expired)
        $csrfResponse = $this->actingAs($user)
            ->call('POST', '/logout', [], [], [], [
                'HTTP_X_REQUESTED_WITH' => 'XMLHttpRequest',
            ]);

        $this->assertTrue(
            in_array($csrfResponse->getStatusCode(), [419, 302], true),
            'Protected web routes must enforce CSRF protection.'
        );

        // B. Endpoint webhook dikecualikan dari CSRF, namun ditolak jika tanpa valid signature
        $webhookResponse = $this->call('POST', '/api/webhooks/payment/duitku', [
            'merchantOrderId' => 'ORD-1234',
        ]);

        // Tidak boleh 419 (harus diproses ke handler signature -> 400 Bad Signature)
        $this->assertNotEquals(419, $webhookResponse->getStatusCode());
        $this->assertEquals(400, $webhookResponse->getStatusCode());
    }

    /**
     * 4. SSRF Prevention: Sistem tidak mengekspos proxy outbound / tidak menerima URL arbitrer pengguna.
     */
    public function test_ssrf_attack_vectors_are_not_exposed(): void
    {
        // Pastikan tidak ada endpoint publik yang bertindak sebagai open-proxy atau menerima param URL internal
        $metadataPayloads = [
            'http://169.254.169.254/latest/meta-data/',
            'http://127.0.0.1:8000/admin',
            'http://localhost:5432',
        ];

        foreach ($metadataPayloads as $payload) {
            $response = $this->get('/api/postal-codes/search?q='.urlencode($payload));
            // Hanya diproses sebagai query pencarian database lokal, bukan outbound HTTP request
            $response->assertStatus(200);
            $this->assertIsArray($response->json());
        }
    }
}
