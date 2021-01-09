<?php

namespace Database\Seeders;

use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'level' => 'administrator',
            'phone_number' => '081919923412',
            'avatar' => NULL
        ]);

        Pembayaran::create([
            'nama' => 'Mandiri',
            'nomor' => 1780123412321,
            'deskripsi' => 'a/n Smart Parkir'
        ]);
    }
}
