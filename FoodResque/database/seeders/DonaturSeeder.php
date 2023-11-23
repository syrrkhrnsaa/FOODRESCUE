<?php

// database/seeders/DonaturSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Donatur;

class DonaturSeeder extends Seeder
{
    public function run()
    {
        // Clear existing records to start with a fresh database
        Donatur::truncate();

        // Seed the table with 1000 data entries
        for ($i = 1; $i <= 1000; $i++) {
            Donatur::create([
                'username' => 'afyar' . $i,
                'nama_donatur' => 'Donatur ' . $i,
                'alamat' => 'Alamat ' . $i,
                'no_telp' => '123456789' . $i,
                // Add more attributes as needed
            ]);
        }
    }
}

