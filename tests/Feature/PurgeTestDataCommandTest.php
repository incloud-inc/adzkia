<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\AssessmentSection;
use App\Models\DichotomyPreset;
use App\Models\ExamSession;
use App\Models\GradeLevel;
use App\Models\PostalCode;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PurgeTestDataCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_purge_command_removes_test_data_while_preserving_master_records_and_owner(): void
    {
        // 1. Setup Tenant & Akun Owner
        $ownerTenant = Tenant::factory()->create(['subdomain' => 'kemendik', 'name' => 'Kementerian Pendidikan']);
        $owner = User::factory()->create([
            'email' => 'owner@adzkia.id',
            'current_tenant_id' => $ownerTenant->id,
        ]);
        $owner->tenants()->attach($ownerTenant->id, ['role' => 'S']);

        // 2. Setup Dummy Tenant & Akun Siswa & Guru
        $dummyTenant = Tenant::factory()->create(['subdomain' => 'sman8']);
        $student = User::factory()->create([
            'email' => 'siswa@adzkia.id',
            'current_tenant_id' => $dummyTenant->id,
        ]);
        $student->tenants()->attach($dummyTenant->id, ['role' => 'U']);

        $teacher = User::factory()->create([
            'email' => 'guru@adzkia.id',
            'current_tenant_id' => $dummyTenant->id,
        ]);
        $teacher->tenants()->attach($dummyTenant->id, ['role' => 'A']);

        // 3. Setup Dummy Assessment & Exam Session
        $subject = Subject::factory()->create(['name' => 'Matematika']);
        $assessment = Assessment::factory()->create([
            'tenant_id' => $dummyTenant->id,
            'subject_id' => $subject->id,
        ]);
        $section = AssessmentSection::factory()->create(['assessment_id' => $assessment->id]);
        Question::factory()->create(['assessment_section_id' => $section->id]);

        ExamSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => $student->id,
            'tenant_id' => $dummyTenant->id,
            'status' => 'completed',
            'duration_minutes' => 60,
            'question_count' => 1,
        ]);

        // 4. Setup Master Data (Kelas, Mapel, Preset Dikotomi)
        GradeLevel::create(['group' => 'SMA', 'name' => '12 SMA', 'value' => '12 SMA', 'order' => 1, 'is_active' => true]);
        DichotomyPreset::create(['name' => 'Benar / Salah', 'label_a' => 'Benar', 'label_b' => 'Salah', 'order' => 1]);
        PostalCode::create([
            'postal_code' => '10110',
            'urban_village' => 'Gambir',
            'sub_district' => 'Gambir',
            'district_city' => 'Jakarta Pusat',
            'province' => 'DKI Jakarta',
        ]);

        // Pastikan sebelum purge data dummy ada
        $this->assertDatabaseHas('assessments', ['id' => $assessment->id]);
        $this->assertDatabaseHas('users', ['id' => $student->id]);
        $this->assertDatabaseHas('tenants', ['id' => $dummyTenant->id]);

        // 5. Jalankan Purge Command
        $exitCode = Artisan::call('adzkia:purge-test-data', [
            '--force' => true,
            '--owner-email' => 'owner@adzkia.id',
        ]);

        $this->assertEquals(0, $exitCode);

        // 6. Verifikasi Data Dummy Telah Bersih
        $this->assertDatabaseEmpty('assessments');
        $this->assertDatabaseEmpty('questions');
        $this->assertDatabaseEmpty('exam_sessions');
        $this->assertDatabaseMissing('users', ['id' => $student->id]);
        $this->assertDatabaseMissing('users', ['id' => $teacher->id]);
        $this->assertDatabaseMissing('tenants', ['id' => $dummyTenant->id]);

        // 7. Verifikasi Data Penting DIPERTAHANKAN
        $this->assertDatabaseHas('users', [
            'id' => $owner->id,
            'email' => 'owner@adzkia.id',
        ]);
        $this->assertDatabaseHas('tenants', [
            'id' => $ownerTenant->id,
        ]);
        $this->assertDatabaseHas('subjects', [
            'name' => 'Matematika',
        ]);
        $this->assertDatabaseHas('grade_levels', [
            'value' => '12 SMA',
        ]);
        $this->assertDatabaseHas('dichotomy_presets', [
            'name' => 'Benar / Salah',
        ]);
        $this->assertDatabaseHas('postal_codes', [
            'postal_code' => '10110',
        ]);
    }
}
