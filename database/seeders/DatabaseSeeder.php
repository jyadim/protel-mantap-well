<?php

namespace Database\Seeders;

use App\Models\PictService;
use App\Models\Service;
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
            ServiceSeeder::class,
            PictServiceSeeder::class,
            ReferencesTableSeeder::class,
            ContactInfoSeeder::class,
            DetailProductSeeder::class,
            DetailGallery::class,
        ]);
    }
}
