<?php

namespace Database\Seeders;

use App\Models\JenisKendaraan;
use Illuminate\Database\Seeder;

class JenisKendaraanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisKendaraan::create([
            'nama' => 'Motor',
            'tarif' => 2000,
        ]);
        JenisKendaraan::create([
            'nama' => 'Mobil',
            'tarif' => 5000,
        ]);
    }
}
