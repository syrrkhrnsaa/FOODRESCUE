<?php
// database/seeders/MakananSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Makanan;
use App\Models\Donatur;
use App\Models\Mitra;
use Carbon\Carbon;

class MakananSeeder extends Seeder
{
    public function run()
    {
        $statuses = ['pending', 'approved', 'rejected'];
        // Clear existing records to start with a fresh database
        Makanan::truncate();

        // Seed the table with 1000 data entries
        for ($i = 1; $i <= 1000; $i++) {
            $donatur = Donatur::inRandomOrder()->first();
            $mitra = Mitra::inRandomOrder()->first();

            Makanan::create([
                'nama_menu' => 'menu ' . $i,
                'jumlah_makanan' => rand(1, 100),
                'tanggal_expired' => Carbon::now()->addDays(rand(1, 30)),
                'waktu' => Carbon::now(),
                'status' => 'ready',
                'donatur_id' => $donatur->id,
                'mitra_id' => $mitra->id,
                'foto' => 'path/to/your/image.jpg', // Provide a value for 'foto'
                // Add more attributes as needed
            ]);
        }
    }
}
