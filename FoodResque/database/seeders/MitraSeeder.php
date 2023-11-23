<?php
// database/seeders/MitraSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mitra;

class MitraSeeder extends Seeder
{
    public function run()
    {
        // Clear existing records to start with a fresh database
        Mitra::truncate();

        // Seed the table with 1000 data entries
        for ($i = 1; $i <= 1000; $i++) {
            Mitra::create([
                'username' => 'Syira' . $i,
                'nama_mitra' => 'Panti Asuhan ' . $i,
                'alamat' => 'Alamat ' . $i,
                'no_telp' => '123456789' . $i,
                // Add more attributes as needed
            ]);
        }
    }
}
