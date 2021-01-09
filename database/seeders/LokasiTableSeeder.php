<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use Illuminate\Database\Seeder;

class LokasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lokasi::create([
            'nama' => 'Mall Plaza Indonesia',
            'alamat' => 'Jakarta',
            'foto' => NULL
        ]);
        Lokasi::create([
            'nama' => 'Mall Pacific Place',
            'alamat' => 'Jakarta',
            'foto' => NULL
        ]);
        Lokasi::create([
            'nama' => 'Mall Pondok Indah',
            'alamat' => 'Jakarta',
            'foto' => NULL
        ]);
        Lokasi::create([
            'nama' => 'Mall Grand Indonesia',
            'alamat' => 'Jakarta',
            'foto' => NULL
        ]);
    }
}
