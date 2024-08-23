<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Memeriksa apakah pengguna dengan nama 'PME Bandung' sudah ada
       
        $this->call([
            UserSeeder::class,
            QuickAccessSeeder::class,
            HomeProductSeeder::class,
            NewsSeeder::class,
            BannerSeeder::class,
            AboutSeeder::class,
            TeamSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
