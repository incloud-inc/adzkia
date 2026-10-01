<?php

namespace Database\Seeders;

use App\Models\DichotomyPreset;
use App\Models\GradeLevel;
use Illuminate\Database\Seeder;

class GradeAndPresetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = [
            ['group' => 'Sekolah Dasar (SD)', 'name' => 'Kelas 1 SD', 'value' => '1 SD'],
            ['group' => 'Sekolah Dasar (SD)', 'name' => 'Kelas 2 SD', 'value' => '2 SD'],
            ['group' => 'Sekolah Dasar (SD)', 'name' => 'Kelas 3 SD', 'value' => '3 SD'],
            ['group' => 'Sekolah Dasar (SD)', 'name' => 'Kelas 4 SD', 'value' => '4 SD'],
            ['group' => 'Sekolah Dasar (SD)', 'name' => 'Kelas 5 SD', 'value' => '5 SD'],
            ['group' => 'Sekolah Dasar (SD)', 'name' => 'Kelas 6 SD', 'value' => '6 SD'],

            ['group' => 'Sekolah Menengah Pertama (SMP)', 'name' => 'Kelas 7 SMP', 'value' => '7 SMP'],
            ['group' => 'Sekolah Menengah Pertama (SMP)', 'name' => 'Kelas 8 SMP', 'value' => '8 SMP'],
            ['group' => 'Sekolah Menengah Pertama (SMP)', 'name' => 'Kelas 9 SMP', 'value' => '9 SMP'],

            ['group' => 'Sekolah Menengah Atas / Kejuruan (SMA/SMK)', 'name' => 'Kelas 10 SMA/SMK', 'value' => '10 SMA'],
            ['group' => 'Sekolah Menengah Atas / Kejuruan (SMA/SMK)', 'name' => 'Kelas 11 SMA/SMK', 'value' => '11 SMA'],
            ['group' => 'Sekolah Menengah Atas / Kejuruan (SMA/SMK)', 'name' => 'Kelas 12 SMA/SMK', 'value' => '12 SMA'],

            ['group' => 'Lainnya', 'name' => 'Umum / Bimbel / Alumni', 'value' => 'Umum'],
        ];

        $order = 1;
        foreach ($grades as $grade) {
            GradeLevel::firstOrCreate(
                ['value' => $grade['value']],
                [
                    'group' => $grade['group'],
                    'name' => $grade['name'],
                    'order' => $order++,
                    'is_active' => true,
                ]
            );
        }

        $presets = [
            ['name' => 'Benar / Salah', 'label_a' => 'Benar', 'label_b' => 'Salah'],
            ['name' => 'Ya / Tidak', 'label_a' => 'Ya', 'label_b' => 'Tidak'],
            ['name' => 'Fakta / Opini', 'label_a' => 'Fakta', 'label_b' => 'Opini'],
            ['name' => 'Setuju / Tidak Setuju', 'label_a' => 'Setuju', 'label_b' => 'Tidak Setuju'],
            ['name' => 'Sesuai / Tidak Sesuai', 'label_a' => 'Sesuai', 'label_b' => 'Tidak Sesuai'],
            ['name' => 'Mitos / Fakta', 'label_a' => 'Mitos', 'label_b' => 'Fakta'],
            ['name' => 'Pro / Kontra', 'label_a' => 'Pro', 'label_b' => 'Kontra'],
            ['name' => 'Sebab / Akibat', 'label_a' => 'Sebab', 'label_b' => 'Akibat'],
            ['name' => 'Relevan / Tidak Relevan', 'label_a' => 'Relevan', 'label_b' => 'Tidak Relevan'],
        ];

        $order = 1;
        foreach ($presets as $preset) {
            DichotomyPreset::firstOrCreate(
                ['label_a' => $preset['label_a'], 'label_b' => $preset['label_b']],
                [
                    'name' => $preset['name'],
                    'order' => $order++,
                    'is_active' => true,
                ]
            );
        }
    }
}
