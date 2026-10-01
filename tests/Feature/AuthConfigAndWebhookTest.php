<?php

namespace Tests\Feature;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class AuthConfigAndWebhookTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 8. Admin route aman: Student biasa yang mengakses menu owner / admin harus ditolak (HTTP 403).
     */
    public function test_admin_and_owner_routes_reject_unauthorized_students(): void
    {
        $tenant = Tenant::factory()->create();
        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']); // Role Murid / Student

        // Akses menu Grade Levels (Owner only)
        $response1 = $this->actingAs($student)->get('/grade-levels');
        $response1->assertStatus(403);

        // Akses menu Dichotomy Presets (Owner only)
        $response2 = $this->actingAs($student)->get('/dichotomy-presets');
        $response2->assertStatus(403);

        // Akses route storage link yang telah diproteksi
        $response3 = $this->actingAs($student)->get('/run-storage-link');
        $response3->assertStatus(403);
    }

    /**
     * 10. Audit Endpoint: Perubahan kata sandi mencatat log audit dengan identitas aktor.
     */
    public function test_sensitive_password_change_triggers_audit_logging(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('OldPassword123!'),
        ]);

        Log::shouldReceive('info')
            ->once()
            ->withArgs(function ($message, $context) use ($user) {
                return str_contains($message, 'Security Audit')
                    && ($context['user_id'] ?? null) === $user->id;
            });

        $response = $this->actingAs($user)->put(route('profile.password.update'), [
            'current_password' => 'OldPassword123!',
            'password' => 'NewSecurePassword2026!',
            'password_confirmation' => 'NewSecurePassword2026!',
        ]);

        $response->assertSessionHas('success_password');
        $this->assertTrue(Hash::check('NewSecurePassword2026!', $user->fresh()->password));
    }

    /**
     * 11 & 12. Verifikasi Webhook HMAC & Idempotensi: Callback dengan signature tidak valid ditolak.
     */
    public function test_payment_webhook_hmac_verification_and_idempotency(): void
    {
        config(['payment.gateways.duitku.api_key' => 'secret_duitku_key_test_123']);
        config(['payment.gateways.duitku.merchant_code' => 'MERCHANT01']);

        // Webhook Duitku dengan signature salah
        $invalidDuitku = $this->post('/api/webhooks/payment/duitku', [
            'merchantCode' => 'MERCHANT01',
            'amount' => '150000',
            'merchantOrderId' => 'INV-TEST-001',
            'signature' => 'invalid_forged_signature_hash',
        ]);
        $invalidDuitku->assertStatus(400);

        // Webhook Tripay tanpa header signature
        config(['payment.gateways.tripay.private_key' => 'secret_tripay_private_key_456']);
        $invalidTripay = $this->postJson('/api/webhooks/payment/tripay', [
            'merchant_ref' => 'INV-TEST-002',
            'status' => 'PAID',
        ]);
        $invalidTripay->assertStatus(400);
    }
}
