<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminTableSeeder::class,
            StatusTransaksiTableSeeder::class,
            LokasiTableSeeder::class,
            JenisKendaraanTableSeeder::class,
            KendaraanTableSeeder::class,
            SpotTableSeeder::class,
        ]);
    }
}
