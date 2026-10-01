<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AssessmentImageUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_upload_assessment_image(): void
    {
        $response = $this->postJson(route('assessments.upload-image'), [
            'image' => UploadedFile::fake()->create('soal.jpg', 50, 'image/jpeg'),
        ]);

        $response->assertUnauthorized();
    }

    public function test_authenticated_user_can_upload_image_to_asesmen_folder(): void
    {
        Storage::fake('r2');

        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson(route('assessments.upload-image'), [
            'image' => UploadedFile::fake()->create('diagram_lingkaran.png', 50, 'image/png'),
        ]);

        $response->assertOk()
            ->assertJson([
                'success' => true,
                'filename' => 'diagram_lingkaran.png',
            ]);

        $url = $response->json('url');
        $this->assertNotEmpty($url);
        $this->assertStringContainsString('asesmen/', $url);
    }
}
