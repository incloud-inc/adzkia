<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdzkiaScenarioSeeder extends Seeder
{
    public function run(): void
    {
        $password = 'Masuk123!';

        // 1. KEMENTERIAN PENDIDIKAN (Tenant 1 - Default for Independent)
        $kemendik = Tenant::updateOrCreate(['subdomain' => 'kemendik'], [
            'name' => 'KEMENTERIAN PENDIDIKAN',
            'plan' => 'gratis',
        ]);

        // 0. Super User (Pemilik ADZKIA)
        $superUser = User::updateOrCreate(['email' => 'owner@adzkia.id'], [
            'name' => 'Owner ADZKIA',
            'password' => $password,
            'current_tenant_id' => $kemendik->id,
        ]);
        $superUser->tenants()->syncWithoutDetaching([$kemendik->id => ['role' => 'S']]);

        // Independent Student (User / Murid)
        $indieStudent = User::updateOrCreate(['email' => 'indie@adzkia.id'], [
            'name' => 'Murid Independen',
            'password' => $password,
            'current_tenant_id' => $kemendik->id,
        ]);
        $indieStudent->tenants()->syncWithoutDetaching([$kemendik->id => ['role' => 'U']]);

        // 2. 5 Sekolah
        $sekolahNames = ['SMAN 8 Jakarta', 'SMAN 70 Jakarta', 'SMAN 28 Jakarta', 'SMAN 81 Jakarta', 'SMAN 68 Jakarta'];
        $sekolahTenants = [];
        foreach ($sekolahNames as $i => $name) {
            $slug = 'sman'.[8, 70, 28, 81, 68][$i];
            $schoolTenant = Tenant::updateOrCreate(['subdomain' => $slug], [
                'name' => $name,
                'plan' => 'gratis',
            ]);
            $sekolahTenants[] = $schoolTenant;

            // Admin Sekolah
            $admin = User::updateOrCreate(['email' => $slug.'@adzkia.id'], [
                'name' => 'Admin '.$name,
                'password' => $password,
                'current_tenant_id' => $schoolTenant->id,
            ]);
            $admin->tenants()->syncWithoutDetaching([$schoolTenant->id => ['role' => 'A']]);

            // Teacher / Guru (Pengawas Ujian)
            $teacher = User::updateOrCreate(['email' => 'guru.'.$slug.'@adzkia.id'], [
                'name' => 'Guru '.$name,
                'password' => $password,
                'current_tenant_id' => $schoolTenant->id,
            ]);
            $teacher->tenants()->syncWithoutDetaching([$schoolTenant->id => ['role' => 'T']]);

            // Give Super User membership to schools as well
            $superUser->tenants()->syncWithoutDetaching([$schoolTenant->id => ['role' => 'S']]);
        }

        // 3. 5 Bimbel
        $bimbelNames = ['Nurul Fikri', 'Ganesha Operation', 'Newtron', 'Primagama', 'Zenius'];
        $bimbelSlugs = ['nf', 'go', 'newtron', 'primagama', 'zenius'];
        $bimbelTenants = [];
        foreach ($bimbelNames as $i => $name) {
            $slug = $bimbelSlugs[$i];
            $bimbelTenant = Tenant::updateOrCreate(['subdomain' => $slug], [
                'name' => $name,
                'plan' => 'gratis',
            ]);
            $bimbelTenants[] = $bimbelTenant;

            // Admin Bimbel
            $admin = User::updateOrCreate(['email' => $slug.'@adzkia.id'], [
                'name' => 'Admin '.$name,
                'password' => $password,
                'current_tenant_id' => $bimbelTenant->id,
            ]);
            $admin->tenants()->syncWithoutDetaching([$bimbelTenant->id => ['role' => 'A']]);

            // Teacher / Pengajar Bimbel
            $teacher = User::updateOrCreate(['email' => 'tutor.'.$slug.'@adzkia.id'], [
                'name' => 'Tutor '.$name,
                'password' => $password,
                'current_tenant_id' => $bimbelTenant->id,
            ]);
            $teacher->tenants()->syncWithoutDetaching([$bimbelTenant->id => ['role' => 'T']]);

            // Give Super User membership to bimbels as well
            $superUser->tenants()->syncWithoutDetaching([$bimbelTenant->id => ['role' => 'S']]);
        }

        // 4. Create 10 Students (User / Murid) per school and set 2 as double members
        foreach ($sekolahTenants as $sIdx => $school) {
            for ($i = 1; $i <= 10; $i++) {
                $studentEmail = 'murid'.$i.'.'.$school->subdomain.'@adzkia.id';
                $student = User::updateOrCreate(['email' => $studentEmail], [
                    'name' => 'Siswa '.$i.' '.$school->name,
                    'password' => $password,
                    'current_tenant_id' => $school->id,
                ]);

                // Add to school as User (U)
                $student->tenants()->syncWithoutDetaching([$school->id => ['role' => 'U']]);

                // The first 2 students in each school also join a Bimbel as User (U)
                if ($i <= 2) {
                    $assignedBimbel = $bimbelTenants[$sIdx];
                    $student->tenants()->syncWithoutDetaching([$assignedBimbel->id => ['role' => 'U']]);
                }
            }
        }

        // 5. Seed Mata Pelajaran Wajib untuk seluruh tenant
        $this->call(SubjectSeeder::class);
    }
}
