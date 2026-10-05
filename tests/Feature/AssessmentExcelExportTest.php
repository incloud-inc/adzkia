<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\AssessmentSection;
use App\Models\ExamAnswer;
use App\Models\ExamSession;
use App\Models\Question;
use App\Models\Tenant;
use App\Models\User;
use App\Services\AssessmentExcelExportService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use ZipArchive;

class AssessmentExcelExportTest extends TestCase
{
    use RefreshDatabase;

    protected Tenant $tenant1;

    protected Tenant $tenant2;

    protected User $owner;

    protected User $teacher1;

    protected User $student1;

    protected User $student2;

    protected Assessment $assessment;

    protected AssessmentSection $section1;

    protected AssessmentSection $section2;

    protected Question $q1;

    protected Question $q2;

    protected Question $q3;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tenant1 = Tenant::factory()->create(['name' => 'Cabang Medan', 'subdomain' => 'medan']);
        $this->tenant2 = Tenant::factory()->create(['name' => 'Cabang Padang', 'subdomain' => 'padang']);

        // Owner (Super User - 'S')
        $this->owner = User::factory()->create(['current_tenant_id' => $this->tenant1->id]);
        $this->owner->tenants()->attach($this->tenant1->id, ['role' => 'S']);

        // Teacher in Tenant 1 ('T')
        $this->teacher1 = User::factory()->create(['current_tenant_id' => $this->tenant1->id]);
        $this->teacher1->tenants()->attach($this->tenant1->id, ['role' => 'T']);

        // Student in Tenant 1 ('U')
        $this->student1 = User::factory()->create(['name' => 'Budi Santoso', 'current_tenant_id' => $this->tenant1->id]);
        $this->student1->tenants()->attach($this->tenant1->id, ['role' => 'U']);

        // Student in Tenant 2 ('U')
        $this->student2 = User::factory()->create(['name' => 'Siti Rahma', 'current_tenant_id' => $this->tenant2->id]);
        $this->student2->tenants()->attach($this->tenant2->id, ['role' => 'U']);

        // Assessment in Tenant 1
        $this->assessment = Assessment::factory()->create([
            'tenant_id' => $this->tenant1->id,
            'title' => 'Tryout Akbar UTBK 2026',
        ]);

        // Sections
        $this->section1 = AssessmentSection::create([
            'assessment_id' => $this->assessment->id,
            'title' => 'Penalaran Umum',
            'order' => 1,
            'duration_minutes' => 30,
        ]);

        $this->section2 = AssessmentSection::create([
            'assessment_id' => $this->assessment->id,
            'title' => 'Literasi Bahasa Indonesia',
            'order' => 2,
            'duration_minutes' => 30,
        ]);

        // Questions
        $this->q1 = Question::create([
            'assessment_id' => $this->assessment->id,
            'assessment_section_id' => $this->section1->id,
            'prompt' => 'Soal 1 Penalaran',
            'points' => 10,
            'type' => 'multiple_choice_single',
            'order' => 1,
        ]);

        $this->q2 = Question::create([
            'assessment_id' => $this->assessment->id,
            'assessment_section_id' => $this->section1->id,
            'prompt' => 'Soal 2 Penalaran',
            'points' => 10,
            'type' => 'multiple_choice_single',
            'order' => 2,
        ]);

        $this->q3 = Question::create([
            'assessment_id' => $this->assessment->id,
            'assessment_section_id' => $this->section2->id,
            'prompt' => 'Soal 1 Literasi',
            'points' => 15,
            'type' => 'multiple_choice_single',
            'order' => 1,
        ]);

        // Exam Session for Student 1 (Tenant 1)
        $session1 = ExamSession::create([
            'assessment_id' => $this->assessment->id,
            'user_id' => $this->student1->id,
            'tenant_id' => $this->tenant1->id,
            'status' => 'completed',
            'score' => 25,
            'max_score' => 35,
            'started_at' => now()->subMinutes(60),
            'completed_at' => now()->subMinutes(10),
        ]);

        // Answers for Student 1
        ExamAnswer::create([
            'exam_session_id' => $session1->id,
            'question_id' => $this->q1->id,
            'answer_data' => ['selected' => 'A'],
            'is_correct' => true,
            'points_awarded' => 10,
        ]);
        ExamAnswer::create([
            'exam_session_id' => $session1->id,
            'question_id' => $this->q2->id,
            'answer_data' => ['selected' => 'B'],
            'is_correct' => false,
            'points_awarded' => 0,
        ]);
        ExamAnswer::create([
            'exam_session_id' => $session1->id,
            'question_id' => $this->q3->id,
            'answer_data' => ['selected' => 'C'],
            'is_correct' => true,
            'points_awarded' => 15,
        ]);

        // Exam Session for Student 2 (Tenant 2)
        $session2 = ExamSession::create([
            'assessment_id' => $this->assessment->id,
            'user_id' => $this->student2->id,
            'tenant_id' => $this->tenant2->id,
            'status' => 'completed',
            'score' => 10,
            'max_score' => 35,
            'started_at' => now()->subMinutes(60),
            'completed_at' => now()->subMinutes(5),
        ]);

        // Answers for Student 2 (only answered Q1)
        ExamAnswer::create([
            'exam_session_id' => $session2->id,
            'question_id' => $this->q1->id,
            'answer_data' => ['selected' => 'A'],
            'is_correct' => true,
            'points_awarded' => 10,
        ]);
    }

    public function test_owner_can_view_preview_matrix_with_all_tenants(): void
    {
        $response = $this->actingAs($this->owner)
            ->get(route('assessments.analytics.preview', $this->assessment));

        $response->assertOk();
        $response->assertViewIs('assessments.analytics.preview');
        $response->assertSee('Tryout Akbar UTBK 2026');
        $response->assertSee('Penalaran Umum');
        $response->assertSee('Literasi Bahasa Indonesia');
        // Owner sees both students
        $response->assertSee('Budi Santoso');
        $response->assertSee('Siti Rahma');
    }

    public function test_teacher_can_view_preview_matrix_scoped_to_tenant(): void
    {
        $response = $this->actingAs($this->teacher1)
            ->get(route('assessments.analytics.preview', $this->assessment));

        $response->assertOk();
        $response->assertViewIs('assessments.analytics.preview');
        // Teacher 1 only sees student in Tenant 1
        $response->assertSee('Budi Santoso');
        $response->assertDontSee('Siti Rahma');
    }

    public function test_student_cannot_access_preview_or_export(): void
    {
        $response = $this->actingAs($this->student1)
            ->get(route('assessments.analytics.preview', $this->assessment));
        $response->assertForbidden();

        $responseExport = $this->actingAs($this->student1)
            ->get(route('assessments.analytics.export', $this->assessment));
        $responseExport->assertForbidden();
    }

    public function test_export_generates_valid_xlsx_spreadsheet(): void
    {
        $response = $this->actingAs($this->owner)
            ->get(route('assessments.analytics.export', $this->assessment));

        $response->assertOk();
        $response->assertHeader('content-type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $this->assertStringContainsString('.xlsx', $response->headers->get('content-disposition'));
    }

    public function test_excel_export_service_creates_valid_openxml_structure(): void
    {
        $service = app(AssessmentExcelExportService::class);
        $tempFile = tempnam(sys_get_temp_dir(), 'test_xlsx_').'.xlsx';

        $service->exportToXlsx($this->assessment, null, $tempFile);

        $this->assertFileExists($tempFile);
        $this->assertGreaterThan(0, filesize($tempFile));

        $zip = new ZipArchive;
        $this->assertTrue($zip->open($tempFile));
        $this->assertNotEmpty($zip->getFromName('[Content_Types].xml'));
        $this->assertNotEmpty($zip->getFromName('xl/workbook.xml'));
        $this->assertNotEmpty($zip->getFromName('xl/styles.xml'));
        $this->assertNotEmpty($zip->getFromName('xl/worksheets/sheet1.xml'));

        $stylesXml = $zip->getFromName('xl/styles.xml');
        $this->assertStringContainsString('FF2B8A3E', $stylesXml);
        $this->assertStringContainsString('FF51CF66', $stylesXml);

        $sheetXml = $zip->getFromName('xl/worksheets/sheet1.xml');
        $this->assertStringContainsString('Rank', $sheetXml);
        $this->assertStringContainsString('Nama Siswa', $sheetXml);
        $this->assertStringContainsString('Penalaran Umum', $sheetXml);
        $this->assertStringContainsString('Literasi Bahasa Indonesia', $sheetXml);

        $zip->close();
        @unlink($tempFile);
    }
}
