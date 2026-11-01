<?php

namespace Tests\Feature;

use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GoogleOAuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_redirect_to_google_redirects_to_login_when_credentials_missing(): void
    {
        config([
            'services.google.client_id' => null,
            'services.google.client_secret' => null,
        ]);

        $response = $this->get(route('auth.google'));

        $response->assertRedirect(route('login'));
        $response->assertSessionHas('error');
    }

    public function test_redirect_to_google_redirects_to_google_when_credentials_present(): void
    {
        config([
            'services.google.client_id' => '1080393938692-mock.apps.googleusercontent.com',
            'services.google.client_secret' => 'GOCSPX-mock-secret',
            'services.google.redirect' => 'https://adzkia.id/auth/google/callback',
        ]);

        $response = $this->get(route('auth.google'));

        $response->assertRedirect();
        $targetUrl = $response->headers->get('Location');
        $this->assertStringContainsString('accounts.google.com', $targetUrl);
        $this->assertStringContainsString('1080393938692-mock.apps.googleusercontent.com', $targetUrl);
        $this->assertStringContainsString('https%3A%2F%2Fadzkia.id%2Fauth%2Fgoogle%2Fcallback', $targetUrl);
    }

    public function test_google_oauth_preserves_tenant_in_session_on_subdomain(): void
    {
        config([
            'services.google.client_id' => '1080393938692-mock.apps.googleusercontent.com',
            'services.google.client_secret' => 'GOCSPX-mock-secret',
            'services.google.redirect' => 'https://adzkia.id/auth/google/callback',
        ]);

        $tenant = Tenant::factory()->create([
            'subdomain' => 'bina-insan',
        ]);

        $response = $this->get('http://bina-insan.adzkia.test/auth/google');

        $response->assertSessionHas('google_oauth_tenant_id', $tenant->id);
    }
}
