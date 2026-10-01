<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mandatorySubjects = [
            ['name' => 'Matematika', 'code' => 'MAT', 'description' => 'Mata pelajaran wajib matematika dasar dan lanjutan.'],
            ['name' => 'Bahasa Indonesia', 'code' => 'BIND', 'description' => 'Mata pelajaran wajib tata bahasa, literasi, dan teks sastra.'],
            ['name' => 'Bahasa Inggris', 'code' => 'ENG', 'description' => 'English language skills: reading, writing, listening, and structure.'],
            ['name' => 'Pendidikan Pancasila (PPKn)', 'code' => 'PPKN', 'description' => 'Pendidikan kewarganegaraan, konstitusi, dan ideologi Pancasila.'],
            ['name' => 'Pendidikan Agama & Budi Pekerti', 'code' => 'PABP', 'description' => 'Pendidikan nilai-nilai spiritual, akhlak, dan keagamaan.'],
            ['name' => 'Ilmu Pengetahuan Alam (IPA)', 'code' => 'IPA', 'description' => 'Sains terpadu: biologi, fisika, dan kimia dasar untuk jenjang SD & SMP.'],
            ['name' => 'Ilmu Pengetahuan Sosial (IPS)', 'code' => 'IPS', 'description' => 'Ilmu sosial terpadu: sejarah, geografi, dan ekonomi untuk jenjang SD & SMP.'],
            ['name' => 'Informatika', 'code' => 'INF', 'description' => 'Literasi digital, computational thinking, dan dasar pemrograman.'],
            ['name' => 'Fisika', 'code' => 'FIS', 'description' => 'Mata pelajaran peminatan sains: mekanika, termodinamika, dan optik.'],
            ['name' => 'Kimia', 'code' => 'KIM', 'description' => 'Mata pelajaran peminatan sains: struktur atom, stoikiometri, dan ikatan kimia.'],
            ['name' => 'Biologi', 'code' => 'BIO', 'description' => 'Mata pelajaran peminatan sains: sel, genetika, ekosistem, dan evolusi.'],
            ['name' => 'Ekonomi', 'code' => 'EKO', 'description' => 'Mata pelajaran peminatan sosial: mikro, makroekonomi, dan akuntansi.'],
            ['name' => 'Sosiologi', 'code' => 'SOS', 'description' => 'Mata pelajaran peminatan sosial: interaksi, struktur, dan dinamika sosial.'],
            ['name' => 'Geografi', 'code' => 'GEO', 'description' => 'Mata pelajaran peminatan sosial: litosfer, atmosfer, dan SIG.'],
            ['name' => 'Sejarah', 'code' => 'SEJ', 'description' => 'Sejarah nasional Indonesia dan sejarah peradaban dunia.'],
            ['name' => 'Pendidikan Jasmani (PJOK)', 'code' => 'PJOK', 'description' => 'Kebugaran jasmani, olahraga atletik, dan kesehatan tubuh.'],
            ['name' => 'Seni Budaya', 'code' => 'SBD', 'description' => 'Seni rupa, seni musik, seni tari, dan seni pertunjukan.'],
        ];

        foreach ($mandatorySubjects as $sub) {
            Subject::firstOrCreate(
                [
                    'name' => $sub['name'],
                ],
                [
                    'code' => $sub['code'],
                    'description' => $sub['description'],
                ]
            );
        }
    }
}
