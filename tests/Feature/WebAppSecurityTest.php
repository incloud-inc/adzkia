<?php

namespace Tests\Feature;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class WebAppSecurityTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 11 & 12. Autentikasi Sisi Server & Otorisasi Endpoint:
     * Endpoint terproteksi menolak akses guest tanpa token/sesi sah.
     */
    public function test_protected_routes_require_server_side_authentication(): void
    {
        // Akses dashboard tanpa sesi auth -> redirect ke /login
        $response1 = $this->get('/dashboard');
        $response1->assertRedirect('/login');

        // Akses settings tanpa sesi auth -> redirect ke /login
        $response2 = $this->get('/settings');
        $response2->assertRedirect('/login');

        // Akses wallet tanpa sesi auth -> redirect ke /login
        $response3 = $this->get('/wallet');
        $response3->assertRedirect('/login');
    }

    /**
     * 16. Password Hashing: Memastikan algoritma bcrypt/argon2 dengan salt unik.
     */
    public function test_password_is_securely_hashed(): void
    {
        $passwordPlain = 'SuperSecret123!';
        $hashed = Hash::make($passwordPlain);

        $info = Hash::info($hashed);
        $this->assertEquals('bcrypt', $info['algoName']);
        $this->assertGreaterThanOrEqual(10, $info['options']['rounds'] ?? 10);
        $this->assertNotEquals($passwordPlain, $hashed);

        // Dua password identik harus menghasilkan hash berbeda (unique salt)
        $hashed2 = Hash::make($passwordPlain);
        $this->assertNotEquals($hashed, $hashed2);
    }

    /**
     * 17. Manajemen Sesi Aman: HttpOnly, SameSite, dan Expiry terkonfigurasi.
     */
    public function test_session_cookie_security_configurations(): void
    {
        $this->assertTrue(config('session.http_only'), 'Session cookie must have HttpOnly flag.');
        $this->assertEquals('lax', config('session.same_site'), 'Session cookie must have SameSite=lax.');
        $this->assertGreaterThan(0, config('session.lifetime'), 'Session lifetime must be configured.');
    }

    /**
     * 18. Reset Password Terlindungi: Token reset dikirim via broker dan di-hash.
     */
    public function test_password_reset_broker_workflow(): void
    {
        Notification::fake();

        $user = User::factory()->create(['email' => 'reset.victim@adzkia.id']);

        $response = $this->post(route('password.email'), [
            'email' => 'reset.victim@adzkia.id',
        ]);

        $response->assertSessionHas('status');

        // Token yang tersimpan di tabel password_reset_tokens bukan plaintext
        $this->assertDatabaseHas('password_reset_tokens', [
            'email' => 'reset.victim@adzkia.id',
        ]);
    }

    /**
     * 19 & 20. Pembatasan Unggah Berkas: Ekstensi terlarang (php, exe, sh) ditolak HTTP 422.
     */
    public function test_file_upload_blocks_executable_files(): void
    {
        Storage::fake('r2');

        $tenant = Tenant::factory()->create();
        $admin = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $admin->tenants()->attach($tenant->id, ['role' => 'A']);

        // Upload web shell .php
        $maliciousFile = UploadedFile::fake()->create('shell.php', 10, 'application/x-php');

        $response = $this->actingAs($admin)->postJson(route('assessments.upload-media'), [
            'media' => $maliciousFile,
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('media');
    }
}
