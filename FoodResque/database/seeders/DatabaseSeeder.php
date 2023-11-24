<?php

namespace Database\Seeders;

use App\Models\Ulasan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        $this->call(DonaturSeeder::class);
        $this->call(MitraSeeder::class);
        $this->call(MakananSeeder::class);
        $this->call(UlasanSeeder::class);
    }
}
