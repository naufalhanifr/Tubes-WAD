<?php

namespace Database\Seeders;

use App\Models\StatusTransaksi;
use Illuminate\Database\Seeder;

class StatusTransaksiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusTransaksi::create([
            'nama' => 'booking'
        ]);
        StatusTransaksi::create([
            'nama' => 'pembayaran sukses'
        ]);
        StatusTransaksi::create([
            'nama' => 'parkir selesai'
        ]);
        StatusTransaksi::create([
            'nama' => 'peringatan'
        ]);
        StatusTransaksi::create([
            'nama' => 'gagal'
        ]);
        StatusTransaksi::create([
            'nama' => 'Menunggu Valdasi'
        ]);
    }
}
