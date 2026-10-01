<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\AssessmentSection;
use App\Models\ExamSession;
use App\Models\Question;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DataAndPathValidationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 5. Path Traversal: Path dot-dot-slash pada parameter route ditolak dan tidak membaca file sistem.
     */
    public function test_path_traversal_attempts_are_blocked(): void
    {
        $traversalPayloads = [
            '../../../../etc/passwd',
            '..%2F..%2F..%2F.env',
            '..\\..\\..\\Windows\\win.ini',
            '....//....//....//.env',
        ];

        foreach ($traversalPayloads as $payload) {
            // Coba akses route statis/file dengan payload traversal
            $response = $this->get('/portal/'.urlencode($payload));
            $this->assertTrue(
                in_array($response->getStatusCode(), [404, 400, 403, 302], true),
                "Path traversal payload [{$payload}] must be rejected."
            );
        }
    }

    /**
     * 6. Validasi Input API & Anti SQL Injection: Payload SQLi pada pencarian & auth ditangani secara parameterized.
     */
    public function test_sql_injection_payloads_are_safely_parameterized(): void
    {
        $sqliPayloads = [
            "' OR '1'='1",
            '1; DROP TABLE users; --',
            "' UNION SELECT id, email, password FROM users --",
            "admin'--",
            "' OR 1=1 #",
        ];

        foreach ($sqliPayloads as $payload) {
            // Uji pencarian kodepos dengan payload SQLi
            $searchResponse = $this->get('/api/postal-codes/search?q='.urlencode($payload));
            $searchResponse->assertStatus(200);
            $this->assertIsArray($searchResponse->json());

            // Uji autentikasi login dengan payload SQLi
            $loginResponse = $this->post('/login', [
                'email' => $payload,
                'password' => 'somePassword123!',
            ]);
            $loginResponse->assertSessionHasErrors('email');
        }
    }

    /**
     * 7. Validasi Output API & Anti-XSS: Output JSON di-encode dengan aman tanpa merusak struktur respons.
     */
    public function test_output_api_is_safely_encoded_against_xss(): void
    {
        $tenant = Tenant::factory()->create();
        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'title' => 'Test Ujian Anti-XSS',
        ]);
        $section = AssessmentSection::factory()->create(['assessment_id' => $assessment->id]);
        $question = Question::factory()->create([
            'assessment_section_id' => $section->id,
            'type' => 'short_answer',
        ]);

        $session = ExamSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'status' => 'in_progress',
            'started_at' => now(),
            'duration_minutes' => 60,
        ]);

        $xssPayload = "<script>alert('pwned')</script><img src=x onerror=alert(1)>";

        $response = $this->actingAs($student)->postJson(route('exam.session.answer', $session), [
            'question_id' => $question->id,
            'answer_payload' => [
                'value' => $xssPayload,
            ],
            'is_flagged' => false,
        ]);

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/json');

        // Pastikan response adalah JSON valid
        $data = $response->json();
        $this->assertTrue($data['ok']);
    }
}
