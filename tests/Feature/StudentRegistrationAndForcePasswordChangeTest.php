<?php

namespace Tests\Feature;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
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

    public function test_public_registration_is_closed_on_main_domain(): void
    {
        $response = $this->get('/register');
        $response->assertRedirect(route('login'));
        $response->assertSessionHas('error');

        $registerResponse = $this->post('/register', [
            'name' => 'Siswa Baru Utama',
            'email' => 'siswa.utama@example.com',
            'password' => 'RahasiaBaru123!',
            'password_confirmation' => 'RahasiaBaru123!',
        ]);

        $registerResponse->assertRedirect(route('login'));
        $registerResponse->assertSessionHas('error');

        $user = User::where('email', 'siswa.utama@example.com')->first();
        $this->assertNull($user);
    }

    public function test_public_registration_is_closed_on_subdomain(): void
    {
        $response = $this->get('http://smpn1.adzkia.test/register');
        $response->assertRedirect(route('login'));
        $response->assertSessionHas('error');

        $registerResponse = $this->post('http://smpn1.adzkia.test/register', [
            'name' => 'Siswa SMP 1',
            'email' => 'siswa.smp@example.com',
            'password' => 'RahasiaBaru123!',
            'password_confirmation' => 'RahasiaBaru123!',
        ]);

        $registerResponse->assertRedirect(route('login'));
        $registerResponse->assertSessionHas('error');

        $user = User::where('email', 'siswa.smp@example.com')->first();
        $this->assertNull($user);
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

        // Bersihkan sesi admin
        Auth::logout();
        session()->flush();

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

        // Siswa relogin dengan password baru dan kini bisa akses dashboard pada host tenant miliknya
        $this->actingAs($student)->get('http://pusat.localhost/dashboard')->assertStatus(200);
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

    public function test_google_login_rejects_unregistered_user_and_does_not_create_account(): void
    {
        $abstractUser = Mockery::mock(SocialiteUser::class);
        $abstractUser->shouldReceive('getId')->andReturn('google-unregistered-999');
        $abstractUser->shouldReceive('getEmail')->andReturn('unknown@stranger.com');
        $abstractUser->shouldReceive('getName')->andReturn('Unknown Stranger');
        $abstractUser->shouldReceive('getNickname')->andReturn(null);
        $abstractUser->shouldReceive('getAvatar')->andReturn(null);

        $provider = Mockery::mock('Laravel\Socialite\Two\GoogleProvider');
        $provider->shouldReceive('user')->andReturn($abstractUser);

        Socialite::shouldReceive('driver')->with('google')->andReturn($provider);

        $response = $this->get('/auth/google/callback');
        $response->assertRedirect(route('login'));
        $response->assertSessionHas('error');

        $this->assertNull(User::where('email', 'unknown@stranger.com')->first());
    }

    public function test_registered_student_google_login_redirects_to_force_change_password_then_dashboard_on_subsequent_login(): void
    {
        // 1. Admin tenant mendaftarkan siswa
        $student = User::create([
            'name' => 'Siswa SMP Terdaftar',
            'email' => 'student.google@smpn1.sch.id',
            'password' => Hash::make('Masuk123!'),
            'must_change_password' => true,
            'current_tenant_id' => $this->tenantSmp->id,
            'email_verified_at' => now(),
        ]);
        $student->tenants()->attach($this->tenantSmp->id, ['role' => 'U']);

        $abstractUser = Mockery::mock(SocialiteUser::class);
        $abstractUser->shouldReceive('getId')->andReturn('google-student-777');
        $abstractUser->shouldReceive('getEmail')->andReturn('student.google@smpn1.sch.id');
        $abstractUser->shouldReceive('getName')->andReturn('Siswa SMP Terdaftar');
        $abstractUser->shouldReceive('getNickname')->andReturn(null);
        $abstractUser->shouldReceive('getAvatar')->andReturn('https://lh3.googleusercontent.com/avatar.jpg');

        $provider = Mockery::mock('Laravel\Socialite\Two\GoogleProvider');
        $provider->shouldReceive('user')->andReturn($abstractUser);

        Socialite::shouldReceive('driver')->with('google')->andReturn($provider);

        // 2. Siswa login pertama kali dengan Google
        $response = $this->get('http://smpn1.adzkia.test/auth/google/callback');
        $response->assertRedirect(route('password.force_change'));

        $student->refresh();
        $this->assertEquals('google-student-777', $student->google_id);
        $this->assertTrue((bool) $student->must_change_password);

        // 3. Siswa mengganti password bawaan Masuk123!
        $this->actingAs($student)->post(route('password.force_change.update'), [
            'password' => 'SiswaKeren2026!',
            'password_confirmation' => 'SiswaKeren2026!',
        ])->assertRedirect(route('login'));

        $student->refresh();
        $this->assertFalse((bool) $student->must_change_password);

        // Bersihkan session
        Auth::logout();
        session()->flush();

        // 4. Login berikutnya via Google langsung diarahkan ke Dashboard
        $subsequentResponse = $this->get('http://smpn1.adzkia.test/auth/google/callback');
        $subsequentResponse->assertRedirect(route('dashboard'));
    }
}
