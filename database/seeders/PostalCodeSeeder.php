<?php

namespace Database\Seeders;

use App\Models\PostalCode;
use Illuminate\Database\Seeder;

class PostalCodeSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['postal_code' => '40115', 'urban_village' => 'Citarum', 'sub_district' => 'Bandung Wetan', 'district_city' => 'Kota Bandung', 'province' => 'Jawa Barat'],
            ['postal_code' => '40111', 'urban_village' => 'Babakan Ciamis', 'sub_district' => 'Sumur Bandung', 'district_city' => 'Kota Bandung', 'province' => 'Jawa Barat'],
            ['postal_code' => '10110', 'urban_village' => 'Gambir', 'sub_district' => 'Gambir', 'district_city' => 'Kota Jakarta Pusat', 'province' => 'DKI Jakarta'],
            ['postal_code' => '12190', 'urban_village' => 'Melawai', 'sub_district' => 'Kebayoran Baru', 'district_city' => 'Kota Jakarta Selatan', 'province' => 'DKI Jakarta'],
            ['postal_code' => '60271', 'urban_village' => 'Gubeng', 'sub_district' => 'Gubeng', 'district_city' => 'Kota Surabaya', 'province' => 'Jawa Timur'],
            ['postal_code' => '50131', 'urban_village' => 'Tanjung Mas', 'sub_district' => 'Semarang Utara', 'district_city' => 'Kota Semarang', 'province' => 'Jawa Tengah'],
            ['postal_code' => '25115', 'urban_village' => 'Belakang Pondok', 'sub_district' => 'Padang Selatan', 'district_city' => 'Kota Padang', 'province' => 'Sumatera Barat'],
        ];

        foreach ($data as $item) {
            PostalCode::firstOrCreate(
                ['postal_code' => $item['postal_code'], 'urban_village' => $item['urban_village']],
                $item
            );
        }
    }
}
