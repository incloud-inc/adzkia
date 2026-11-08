<?php

namespace Tests\Feature;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UsernameLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login_using_email_and_password(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'KEMENDIK', 'subdomain' => 'kemendik']);
        $user = User::factory()->create([
            'email' => 'siswa@adzkia.test',
            'username' => 'siswa_adzkia',
            'password' => Hash::make('password123'),
            'current_tenant_id' => $tenant->id,
        ]);
        $user->tenants()->attach($tenant->id, ['role' => 'U']);

        $response = $this->post(route('login'), [
            'email' => 'siswa@adzkia.test',
            'password' => 'password123',
        ]);

        $this->assertAuthenticatedAs($user);
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_user_can_login_using_username_without_at_prefix(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'KEMENDIK', 'subdomain' => 'kemendik']);
        $user = User::factory()->create([
            'name' => 'Budi Santoso',
            'email' => 'budi@adzkia.test',
            'username' => 'budi_santoso',
            'password' => Hash::make('rahasia123'),
            'current_tenant_id' => $tenant->id,
        ]);
        $user->tenants()->attach($tenant->id, ['role' => 'U']);

        $response = $this->post(route('login'), [
            'email' => 'budi_santoso',
            'password' => 'rahasia123',
        ]);

        $this->assertAuthenticatedAs($user);
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_user_can_login_using_username_with_at_prefix(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'KEMENDIK', 'subdomain' => 'kemendik']);
        $user = User::factory()->create([
            'name' => 'Ahmad SNBT',
            'email' => 'ahmad@adzkia.test',
            'username' => 'ahmad_snbt',
            'password' => Hash::make('masuk456'),
            'current_tenant_id' => $tenant->id,
        ]);
        $user->tenants()->attach($tenant->id, ['role' => 'U']);

        // Siswa memasukkan username dengan awalan '@' seperti yang tertera di URL profile /@ahmad_snbt
        $response = $this->post(route('login'), [
            'email' => '@ahmad_snbt',
            'password' => 'masuk456',
        ]);

        $this->assertAuthenticatedAs($user);
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_user_cannot_login_with_incorrect_password_using_username(): void
    {
        $user = User::factory()->create([
            'username' => 'citra_dewi',
            'password' => Hash::make('passwordBenar'),
        ]);

        $response = $this->post(route('login'), [
            'email' => 'citra_dewi',
            'password' => 'passwordSalah',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }

    public function test_user_cannot_login_with_non_existent_username(): void
    {
        $response = $this->post(route('login'), [
            'email' => '@username_tidak_ada',
            'password' => 'apapun',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }

    public function test_user_model_auto_generates_unique_username_on_creation(): void
    {
        // 1. User pertama dibuat dari email
        $user1 = User::create([
            'name' => 'Eko Prasetyo',
            'email' => 'eko.prasetyo@adzkia.test',
            'password' => Hash::make('secret'),
        ]);

        $this->assertNotNull($user1->username);
        $this->assertEquals('eko.prasetyo', $user1->username);

        // 2. User kedua dengan email prefix serupa otomatis mendapatkan counter agar tetap unik
        $user2 = User::create([
            'name' => 'Eko Prasetyo Dua',
            'email' => 'eko.prasetyo@gmail.com',
            'password' => Hash::make('secret'),
        ]);

        $this->assertNotNull($user2->username);
        $this->assertEquals('eko.prasetyo_1', $user2->username);

        // 3. User bisa login menggunakan username yang di-generate otomatis
        $tenant = Tenant::factory()->create(['name' => 'KEMENDIK', 'subdomain' => 'kemendik']);
        $user2->update(['current_tenant_id' => $tenant->id]);
        $user2->tenants()->attach($tenant->id, ['role' => 'U']);

        $response = $this->post(route('login'), [
            'email' => $user2->username,
            'password' => 'secret',
        ]);

        $this->assertAuthenticatedAs($user2);
    }

    public function test_username_login_on_subdomain_authenticates_and_routes_to_tenant_dashboard(): void
    {
        $tenant = Tenant::create([
            'name' => 'SMA Teladan',
            'subdomain' => 'smateladan',
            'plan' => 'premium',
        ]);

        $student = User::factory()->create([
            'name' => 'Dina Amalia',
            'email' => 'dina@smateladan.test',
            'username' => 'dina_amalia',
            'password' => bcrypt('password123'),
        ]);
        $tenant->users()->attach($student->id, ['role' => 'U']);

        $response = $this->post('http://smateladan.localhost:8000/login', [
            'email' => '@dina_amalia',
            'password' => 'password123',
        ]);

        $response->assertRedirect('http://smateladan.localhost:8000/dashboard');
        $this->assertAuthenticatedAs($student);
    }
}
