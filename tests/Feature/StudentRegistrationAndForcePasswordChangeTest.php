<?php

namespace Tests\Feature;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User as SocialiteUser;
use Mockery;
use Tests\TestCase;

class StudentRegistrationAndForcePasswordChangeTest extends TestCase
{
    use RefreshDatabase;

    protected Tenant $tenant1;

    protected Tenant $tenantSmp;

    protected Tenant $tenantEnterprise;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tenant1 = Tenant::create([
            'id' => 1,
            'name' => 'ADZKIA Pusat',
            'subdomain' => 'pusat',
            'plan' => 'gratis',
        ]);

        $this->tenantSmp = Tenant::create([
            'name' => 'SMP Negeri 1 Padang',
            'subdomain' => 'smpn1',
            'plan' => 'premium',
        ]);

        $this->tenantEnterprise = Tenant::create([
            'name' => 'SMA Unggul Enterprise',
            'subdomain' => 'smaunggul',
            'plan' => 'whitelabel',
            'settings' => [
                'theme_color' => '#8b5cf6',
            ],
        ]);
    }

    public function test_student_can_register_on_main_domain_and_is_assigned_to_tenant_1(): void
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('Pendaftaran Siswa Baru di');
        $response->assertSee('ADZKIA Pusat');

        $registerResponse = $this->post('/register', [
            'name' => 'Siswa Baru Utama',
            'email' => 'siswa.utama@example.com',
            'password' => 'RahasiaBaru123!',
            'password_confirmation' => 'RahasiaBaru123!',
        ]);

        $registerResponse->assertRedirect(route('dashboard'));

        $user = User::where('email', 'siswa.utama@example.com')->first();
        $this->assertNotNull($user);
        $this->assertEquals('Siswa Baru Utama', $user->name);
        $this->assertFalse((bool) $user->must_change_password);
        $this->assertEquals(1, $user->current_tenant_id);
        $this->assertTrue($user->tenants()->where('tenant_id', 1)->exists());
        $this->assertEquals('U', $user->tenants()->where('tenant_id', 1)->first()->pivot->role);
    }

    public function test_student_can_register_on_subdomain_and_is_assigned_to_subdomain_tenant(): void
    {
        $response = $this->get('http://smpn1.adzkia.test/register');
        $response->assertStatus(200);
        $response->assertSee('Pendaftaran Siswa Baru di');
        $response->assertSee('SMP Negeri 1 Padang');

        $registerResponse = $this->post('http://smpn1.adzkia.test/register', [
            'name' => 'Siswa SMP 1',
            'email' => 'siswa.smp@example.com',
            'password' => 'RahasiaBaru123!',
            'password_confirmation' => 'RahasiaBaru123!',
        ]);

        $registerResponse->assertRedirect(route('dashboard'));

        $user = User::where('email', 'siswa.smp@example.com')->first();
        $this->assertNotNull($user);
        $this->assertEquals($this->tenantSmp->id, $user->current_tenant_id);
        $this->assertTrue($user->tenants()->where('tenant_id', $this->tenantSmp->id)->exists());
        $this->assertEquals('U', $user->tenants()->where('tenant_id', $this->tenantSmp->id)->first()->pivot->role);
    }

    public function test_student_registered_by_admin_must_change_password_before_accessing_anything(): void
    {
        $admin = User::factory()->create([
            'current_tenant_id' => $this->tenant1->id,
        ]);
        $admin->tenants()->attach($this->tenant1->id, ['role' => 'A']);

        // Admin menambahkan siswa tunggal
        $this->actingAs($admin)->post(route('dashboard.users.store'), [
            'name' => 'Budi Siswa',
            'email' => 'budi@sekolah.sch.id',
            'role' => 'U',
            'tenant_id' => $this->tenant1->id,
        ])->assertRedirect(route('dashboard'));

        $student = User::where('email', 'budi@sekolah.sch.id')->first();
        $this->assertNotNull($student);
        $this->assertTrue((bool) $student->must_change_password);
        $this->assertTrue(Hash::check('Masuk123!', $student->password));

        // Siswa login
        $this->actingAs($student);

        // Akses dashboard di-intercept dan diarahkan ke force-change-password
        $dashboardResponse = $this->get(route('dashboard'));
        $dashboardResponse->assertRedirect(route('password.force_change'));

        // Halaman force-change-password dapat diakses
        $forcePage = $this->get(route('password.force_change'));
        $forcePage->assertStatus(200);
        $forcePage->assertSee('Wajib Ganti Password');

        // Gagal jika menginput password bawaan (Masuk123!) kembali
        $failResponse = $this->post(route('password.force_change.update'), [
            'password' => 'Masuk123!',
            'password_confirmation' => 'Masuk123!',
        ]);
        $failResponse->assertSessionHasErrors(['password']);

        // Sukses ganti password baru -> otomatis logout (relogin required)
        $successResponse = $this->post(route('password.force_change.update'), [
            'password' => 'PasswordAman999!',
            'password_confirmation' => 'PasswordAman999!',
        ]);

        $successResponse->assertRedirect(route('login'));
        $this->assertGuest();

        $student->refresh();
        $this->assertFalse((bool) $student->must_change_password);
        $this->assertTrue(Hash::check('PasswordAman999!', $student->password));

        // Siswa relogin dengan password baru dan kini bisa akses dashboard
        $this->actingAs($student)->get(route('dashboard'))->assertStatus(200);
    }

    public function test_bulk_add_users_by_admin(): void
    {
        $admin = User::factory()->create([
            'current_tenant_id' => $this->tenant1->id,
        ]);
        $admin->tenants()->attach($this->tenant1->id, ['role' => 'A']);

        $bulkEmails = 'andi@sekolah.id, rina@gmail.com, joko@yahoo.com';

        $response = $this->actingAs($admin)->post(route('dashboard.users.store'), [
            'add_type' => 'bulk',
            'bulk_emails' => $bulkEmails,
            'role' => 'U',
            'tenant_id' => $this->tenant1->id,
        ]);

        $response->assertRedirect(route('dashboard'));
        $response->assertSessionHas('success');

        foreach (['andi@sekolah.id', 'rina@gmail.com', 'joko@yahoo.com'] as $email) {
            $user = User::where('email', $email)->first();
            $this->assertNotNull($user, "User {$email} should exist");
            $this->assertEquals($email, $user->name, 'Name should be equal to email');
            $this->assertTrue((bool) $user->must_change_password);
            $this->assertTrue($user->tenants()->where('tenant_id', $this->tenant1->id)->exists());
            $this->assertEquals('U', $user->tenants()->where('tenant_id', $this->tenant1->id)->first()->pivot->role);
        }
    }

    public function test_tenant_subdomain_cover_displays_login_button(): void
    {
        // Tenant Standard / Pro
        $response = $this->get('http://smpn1.localhost/');
        $response->assertStatus(200);
        $response->assertSee('LOGIN');
        $response->assertSee('#16a34a'); // Default green color

        // Tenant Enterprise
        $responseEnt = $this->get('http://smaunggul.localhost/');
        $responseEnt->assertStatus(200);
        $responseEnt->assertSee('LOGIN');
        $responseEnt->assertSee('#8b5cf6'); // Enterprise custom theme color
    }

    public function test_google_login_on_subdomain_and_main_domain(): void
    {
        $abstractUser = Mockery::mock(SocialiteUser::class);
        $abstractUser->shouldReceive('getId')->andReturn('google-id-12345');
        $abstractUser->shouldReceive('getEmail')->andReturn('google.user@example.com');
        $abstractUser->shouldReceive('getName')->andReturn('Google Student');
        $abstractUser->shouldReceive('getNickname')->andReturn(null);
        $abstractUser->shouldReceive('getAvatar')->andReturn('https://lh3.googleusercontent.com/avatar.jpg');

        $provider = Mockery::mock('Laravel\Socialite\Two\GoogleProvider');
        $provider->shouldReceive('user')->andReturn($abstractUser);

        Socialite::shouldReceive('driver')->with('google')->andReturn($provider);

        // Simulasi Google Callback di subdomain
        $response = $this->get('http://smpn1.adzkia.test/auth/google/callback');
        $response->assertRedirect(route('dashboard'));

        $user = User::where('email', 'google.user@example.com')->first();
        $this->assertNotNull($user);
        $this->assertEquals('Google Student', $user->name);
        $this->assertEquals('google-id-12345', $user->google_id);
        $this->assertEquals($this->tenantSmp->id, $user->current_tenant_id);
        $this->assertTrue($user->tenants()->where('tenant_id', $this->tenantSmp->id)->exists());
        $this->assertFalse((bool) $user->must_change_password);
    }
}
