<?php

namespace Tests\Feature;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class MediaGalleryTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_media_gallery(): void
    {
        $response = $this->get(route('media.gallery.index'));
        $response->assertRedirect(route('login'));
    }

    public function test_student_cannot_access_media_gallery(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $response = $this->actingAs($student)->get(route('media.gallery.index'));
        $response->assertForbidden();
    }

    public function test_non_enterprise_tenant_user_cannot_access_media_gallery(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'gratis']);
        $admin = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $admin->tenants()->attach($tenant->id, ['role' => 'A']);

        $response = $this->actingAs($admin)->get(route('media.gallery.index'));
        $response->assertForbidden();
    }

    public function test_enterprise_tenant_admin_can_access_media_gallery(): void
    {
        Storage::fake('r2');

        $tenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $admin = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $admin->tenants()->attach($tenant->id, ['role' => 'A']);

        $response = $this->actingAs($admin)->get(route('media.gallery.index'));
        $response->assertOk()
            ->assertSee('Galeri Media Cloudflare R2');
    }

    public function test_owner_super_user_can_access_media_gallery_regardless_of_tenant_plan(): void
    {
        Storage::fake('r2');

        $tenant = Tenant::factory()->create(['plan' => 'gratis']);
        $owner = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $owner->tenants()->attach($tenant->id, ['role' => 'S']);

        $response = $this->actingAs($owner)->get(route('media.gallery.index'));
        $response->assertOk()
            ->assertSee('Galeri Media Cloudflare R2');
    }

    public function test_gallery_only_accesses_files_inside_asesmen_folder(): void
    {
        Storage::fake('r2');
        // File di dalam folder asesmen
        Storage::disk('r2')->put('asesmen/gambar_soal_1.jpg', 'gambar soal');
        // File di luar folder asesmen (misal folder lain)
        Storage::disk('r2')->put('avatars/user_avatar.jpg', 'avatar');

        $tenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $admin = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $admin->tenants()->attach($tenant->id, ['role' => 'A']);

        $response = $this->actingAs($admin)->getJson(route('media.gallery.files'));
        $response->assertOk();

        $files = $response->json('files');
        $this->assertCount(1, $files);
        $this->assertEquals('gambar_soal_1.jpg', $files[0]['name']);
        $this->assertStringStartsWith('asesmen/', $files[0]['path']);
    }

    public function test_upload_strictly_saves_to_asesmen_folder_in_r2(): void
    {
        Storage::fake('r2');

        $tenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $admin = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $admin->tenants()->attach($tenant->id, ['role' => 'A']);

        $file = UploadedFile::fake()->create('diagram_batang.png', 100, 'image/png');

        $response = $this->actingAs($admin)->postJson(route('media.gallery.upload'), [
            'file' => $file,
        ]);

        $response->assertOk()
            ->assertJson([
                'success' => true,
            ]);

        $path = $response->json('file.path');
        $this->assertStringStartsWith('asesmen/', $path);
        $this->assertTrue(Storage::disk('r2')->exists($path));
    }

    public function test_delete_strictly_removes_from_asesmen_folder_and_cannot_escape(): void
    {
        Storage::fake('r2');
        Storage::disk('r2')->put('asesmen/sample_soal.jpg', 'content');
        Storage::disk('r2')->put('avatars/secret.jpg', 'secret content');

        $tenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $admin = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $admin->tenants()->attach($tenant->id, ['role' => 'A']);

        // Hapus file valid di asesmen
        $response = $this->actingAs($admin)->deleteJson(route('media.gallery.delete'), [
            'path' => 'sample_soal.jpg',
        ]);

        $response->assertOk();
        $this->assertFalse(Storage::disk('r2')->exists('asesmen/sample_soal.jpg'));

        // Coba manipulasi path untuk menghapus file di luar asesmen (directory traversal attempt)
        $this->actingAs($admin)->deleteJson(route('media.gallery.delete'), [
            'path' => '../avatars/secret.jpg',
        ]);

        // File di folder avatars tetap aman dan tidak terhapus
        $this->assertTrue(Storage::disk('r2')->exists('avatars/secret.jpg'));
    }
}
