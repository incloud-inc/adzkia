<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class MediaProxyTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // Bersihkan cache media untuk pengujian
        $baseCacheDir = storage_path('app/media_cache');
        if (is_dir($baseCacheDir)) {
            $this->cleanDirectory($baseCacheDir);
        }
    }

    protected function cleanDirectory(string $dir): void
    {
        $items = glob($dir.'/*');
        if (! $items) {
            return;
        }
        foreach ($items as $item) {
            if (is_dir($item)) {
                $this->cleanDirectory($item);
                @rmdir($item);
            } elseif (is_file($item)) {
                @unlink($item);
            }
        }
    }

    public function test_can_serve_media_from_r2_and_caches_locally(): void
    {
        Storage::fake('r2');
        Storage::disk('r2')->put('asesmen/sample_test_image.png', 'fake_png_data');

        $response = $this->get('/media/r2/asesmen/sample_test_image.png');

        $response->assertOk();
        $response->assertHeader('Content-Type', 'image/png');
        $response->assertHeader('Cache-Control', 'immutable, max-age=31536000, public');

        $cachedFile = storage_path('app/media_cache/asesmen/sample_test_image.png');
        $this->assertFileExists($cachedFile);
        $this->assertEquals('fake_png_data', file_get_contents($cachedFile));
    }

    public function test_can_serve_media_without_asesmen_prefix_in_url(): void
    {
        Storage::fake('r2');
        Storage::disk('r2')->put('asesmen/another_image.webp', 'fake_webp_data');

        $response = $this->get('/media/r2/another_image.webp');

        $response->assertOk();
        $response->assertHeader('Content-Type', 'image/webp');
    }

    public function test_can_serve_tenant_branding_logo_and_cover_from_r2(): void
    {
        Storage::fake('r2');
        Storage::disk('r2')->put('tenants/logos/logo_test.png', 'fake_logo_content');
        Storage::disk('r2')->put('tenants/covers/cover_test.jpg', 'fake_cover_content');
        Storage::disk('r2')->put('tenants/favicons/favicon_test.ico', 'fake_favicon_content');

        $logoRes = $this->get('/media/r2/tenants/logos/logo_test.png');
        $logoRes->assertOk();
        $logoRes->assertHeader('Content-Type', 'image/png');

        $coverRes = $this->get('/media/r2/tenants/covers/cover_test.jpg');
        $coverRes->assertOk();
        $coverRes->assertHeader('Content-Type', 'image/jpeg');

        $favRes = $this->get('/media/r2/tenants/favicons/favicon_test.ico');
        $favRes->assertOk();
        $favRes->assertHeader('Content-Type', 'image/x-icon');

        $cachedLogo = storage_path('app/media_cache/tenants/logos/logo_test.png');
        $this->assertFileExists($cachedLogo);
        $this->assertEquals('fake_logo_content', file_get_contents($cachedLogo));
    }

    public function test_can_serve_user_profile_photo_and_cover_from_r2(): void
    {
        Storage::fake('r2');
        Storage::disk('r2')->put('profiles/user_avatar.png', 'fake_avatar');
        Storage::disk('r2')->put('covers/user_biolink_cover.png', 'fake_biolink_cover');

        $avatarRes = $this->get('/media/r2/profiles/user_avatar.png');
        $avatarRes->assertOk();
        $avatarRes->assertHeader('Content-Type', 'image/png');

        $coverRes = $this->get('/media/r2/covers/user_biolink_cover.png');
        $coverRes->assertOk();
        $coverRes->assertHeader('Content-Type', 'image/png');
    }

    public function test_rejects_directory_traversal(): void
    {
        $response = $this->get('/media/r2/../secret.env');
        $response->assertStatus(400);
    }

    public function test_rejects_unsupported_extensions(): void
    {
        $response = $this->get('/media/r2/malicious.php');
        $response->assertStatus(403);
    }

    public function test_returns_404_when_file_not_found(): void
    {
        Storage::fake('r2');
        Storage::fake('public');

        $response = $this->get('/media/r2/asesmen/non_existent.png');
        $response->assertNotFound();
    }
}
