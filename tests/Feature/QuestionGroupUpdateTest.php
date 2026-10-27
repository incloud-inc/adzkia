<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\AssessmentSection;
use App\Models\QuestionGroup;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionGroupUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_assessment_detail_displays_edit_stimulus_button_for_owner(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $owner = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $owner->tenants()->attach($tenant->id, ['role' => 'S']);

        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'title' => 'Ujian Bahasa Indonesia Literasi',
        ]);

        $section = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Bagian Wacana',
            'order' => 1,
        ]);

        $group = QuestionGroup::create([
            'assessment_section_id' => $section->id,
            'title' => 'Teks Bacaan 1',
            'stimulus_content' => 'Ini adalah teks wacana tentang konservasi laut.',
            'order' => 1,
        ]);

        $response = $this->actingAs($owner)->get(route('assessments.show', $assessment));

        $response->assertStatus(200);
        $response->assertSee('Stimulus Narasi: Teks Bacaan 1');
        $response->assertSee('Edit Stimulus');
        $response->assertSee('open-edit-stimulus-modal');
        $response->assertSee('Ini adalah teks wacana tentang konservasi laut.');
    }

    public function test_tenant_teacher_does_not_see_questions_or_stimulus_on_assessment_detail(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $teacher = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'title' => 'Ujian Bahasa Indonesia Literasi',
        ]);

        $section = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Bagian Wacana',
            'order' => 1,
        ]);

        QuestionGroup::create([
            'assessment_section_id' => $section->id,
            'title' => 'Teks Bacaan 1',
            'stimulus_content' => 'Ini adalah teks wacana tentang konservasi laut.',
            'order' => 1,
        ]);

        $response = $this->actingAs($teacher)->get(route('assessments.show', $assessment));

        $response->assertStatus(200);
        $response->assertDontSee('Stimulus Narasi: Teks Bacaan 1');
        $response->assertDontSee('Edit Stimulus');
        $response->assertDontSee('Ini adalah teks wacana tentang konservasi laut.');
        $response->assertDontSee('Struktur Bagian & Butir Soal Ujian');
        $response->assertSee('Kerahasiaan Naskah Soal Terproteksi');
    }

    public function test_student_does_not_see_edit_stimulus_button(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'title' => 'Ujian Siswa',
            'status' => 'published',
        ]);

        $section = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Bagian Wacana',
            'order' => 1,
        ]);

        QuestionGroup::create([
            'assessment_section_id' => $section->id,
            'title' => 'Teks Wacana Siswa',
            'stimulus_content' => 'Narasi wacana tanpa izin edit.',
            'order' => 1,
        ]);

        $response = $this->actingAs($student)->get(route('assessments.show', $assessment));

        $response->assertStatus(200);
        $response->assertDontSee('Edit Stimulus');
    }

    public function test_teacher_can_update_stimulus_via_json(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $teacher = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'title' => 'Ujian Bahasa',
        ]);

        $section = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Bagian Wacana',
            'order' => 1,
        ]);

        $group = QuestionGroup::create([
            'assessment_section_id' => $section->id,
            'title' => 'Judul Awal',
            'stimulus_content' => 'Teks narasi awal sebelum diedit.',
            'order' => 1,
        ]);

        $response = $this->actingAs($teacher)->putJson(route('question-groups.update', $group), [
            'title' => 'Judul Baru Setelah Diedit',
            'stimulus_content' => 'Teks narasi yang telah disempurnakan dengan **markdown**.',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Stimulus narasi berhasil diperbarui!',
        ]);

        $group->refresh();
        $this->assertSame('Judul Baru Setelah Diedit', $group->title);
        $this->assertSame('Teks narasi yang telah disempurnakan dengan **markdown**.', $group->stimulus_content);
    }

    public function test_teacher_can_update_stimulus_via_web_redirect(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $teacher = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'title' => 'Ujian Bahasa',
        ]);

        $section = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Bagian Wacana',
            'order' => 1,
        ]);

        $group = QuestionGroup::create([
            'assessment_section_id' => $section->id,
            'title' => 'Judul Lama',
            'stimulus_content' => 'Konten lama.',
            'order' => 1,
        ]);

        $response = $this->actingAs($teacher)->put(route('question-groups.update', $group), [
            'title' => 'Judul Baru',
            'stimulus_content' => 'Konten wacana terupdate.',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Stimulus narasi berhasil diperbarui!');

        $group->refresh();
        $this->assertSame('Judul Baru', $group->title);
        $this->assertSame('Konten wacana terupdate.', $group->stimulus_content);
    }

    public function test_stimulus_update_validation_requires_content(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $teacher = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
        ]);

        $section = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Bagian Wacana',
            'order' => 1,
        ]);

        $group = QuestionGroup::create([
            'assessment_section_id' => $section->id,
            'title' => 'Judul',
            'stimulus_content' => 'Konten awal.',
            'order' => 1,
        ]);

        $response = $this->actingAs($teacher)->putJson(route('question-groups.update', $group), [
            'title' => 'Judul Baru',
            'stimulus_content' => '',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['stimulus_content']);
    }

    public function test_teacher_from_other_tenant_cannot_update_stimulus(): void
    {
        $tenantA = Tenant::factory()->create(['plan' => 'whitelabel']);
        $tenantB = Tenant::factory()->create(['plan' => 'whitelabel']);

        $teacherB = User::factory()->create(['current_tenant_id' => $tenantB->id]);
        $teacherB->tenants()->attach($tenantB->id, ['role' => 'T']);

        $assessmentA = Assessment::factory()->create([
            'tenant_id' => $tenantA->id,
        ]);

        $sectionA = AssessmentSection::create([
            'assessment_id' => $assessmentA->id,
            'title' => 'Bagian Wacana A',
            'order' => 1,
        ]);

        $groupA = QuestionGroup::create([
            'assessment_section_id' => $sectionA->id,
            'title' => 'Wacana A',
            'stimulus_content' => 'Teks Wacana Tenant A.',
            'order' => 1,
        ]);

        $response = $this->actingAs($teacherB)->putJson(route('question-groups.update', $groupA), [
            'title' => 'Percobaan Hack',
            'stimulus_content' => 'Hacked content.',
        ]);

        $response->assertStatus(403);
    }
}
