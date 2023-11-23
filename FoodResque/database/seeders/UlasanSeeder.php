<?php
// database/seeders/UlasanSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ulasan;
use App\Models\Mitra;
use App\Models\Makanan;

class UlasanSeeder extends Seeder
{
    public function run()
    {
        // Clear existing records to start with a fresh database
        Ulasan::truncate();

        // Seed the table with sample data
        for ($i = 1; $i <= 1000; $i++) {
            $mitra = Mitra::inRandomOrder()->first();
            $makanan = Makanan::inRandomOrder()->first();

            Ulasan::create([
                'mitra_id' => $mitra->id,
                'makanan_id' => $makanan->id,
                'isi_ulasan' => 'Ulasan ' . $i,
                // Add more attributes as needed
            ]);
        }
    }
}
