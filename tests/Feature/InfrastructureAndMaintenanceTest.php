<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\AssessmentPackage;
use App\Models\Order;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InfrastructureAndMaintenanceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 13. Harga Anti-Tamper: Parameter harga dari client diabaikan; server mengambil harga master.
     */
    public function test_price_cannot_be_tampered_by_client_request(): void
    {
        $tenant = Tenant::factory()->create();
        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'price_type' => 'paid',
            'price' => 150000,
        ]);

        $package = AssessmentPackage::create([
            'assessment_id' => $assessment->id,
            'name' => 'Paket Tryout Intensif',
            'price' => 150000,
            'attempts' => 3,
            'validity_days' => 30,
            'is_active' => true,
        ]);

        // Attacker mengirimkan payload memodifikasi price menjadi Rp 1
        $response = $this->actingAs($student)->post(route('orders.store', $assessment), [
            'payment_method' => 'VA_BCA',
            'package_id' => $package->id,
            'price' => 1,
            'total_amount' => 1,
            'amount' => 1,
        ]);

        $order = Order::where('user_id', $student->id)->latest('id')->first();
        $this->assertNotNull($order);
        // Pastikan harga tersimpan adalah harga master Rp 150.000, bukan Rp 1
        $this->assertEquals(150000, (float) $order->price_amount);
        $this->assertGreaterThan(1, (float) $order->total_amount);
        $this->assertNotEquals(1, (float) $order->total_amount);
    }

    /**
     * 14. Cek IDOR: Siswa lain tidak dapat melihat atau mengecek status pesanan milik siswa berbeda.
     */
    public function test_order_idor_protection_blocks_other_students(): void
    {
        $tenant = Tenant::factory()->create();
        $studentA = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $studentA->tenants()->attach($tenant->id, ['role' => 'U']);

        $studentB = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $studentB->tenants()->attach($tenant->id, ['role' => 'U']);

        $assessment = Assessment::factory()->create(['tenant_id' => $tenant->id]);
        $order = Order::create([
            'order_number' => Order::generateOrderNumber(),
            'user_id' => $studentA->id,
            'tenant_id' => $tenant->id,
            'assessment_id' => $assessment->id,
            'price_amount' => 100000,
            'total_amount' => 100000,
            'payment_method' => 'VA_BCA',
            'status' => 'pending',
        ]);

        // Student B mencoba melihat halaman pembayaran milik Student A -> 403
        $showResponse = $this->actingAs($studentB)->get(route('orders.show', $order));
        $showResponse->assertStatus(403);

        // Student B mencoba polling status order milik Student A -> 403
        $statusResponse = $this->actingAs($studentB)->get(route('orders.status', $order));
        $statusResponse->assertStatus(403);
    }
}
