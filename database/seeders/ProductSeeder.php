<?php

namespace Database\Seeders;
use App\Models\Products;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mendapatkan user berdasarkan nama
        $user = User::where('name', 'PME Bandung')->first(); // Pastikan pengguna ini sudah ada di database

        // Pastikan user ditemukan
        if ($user) {
            // Array data berita yang akan dimasukkan ke database
            $products = [
                [
                    'slug' => 'crossflow-turbine',
                    'title' => 'Crossflow Turbine',
                    'image_path' => 'img/product/crossflow2-remove.png',
                    'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, incidunt!'
                ],
                [
                    'slug' => 'pelton-turbine',
                    'title' => 'Pelton Turbine',
                    'image_path' => 'img/product/pelton.png',
                    'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, incidunt!'
                ],
                [
                    'slug' => 'electronic-load-controller',
                    'title' => 'Electronic Load Controller',
                    'image_path' => 'img/product/elc2-remove.png',
                    'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, incidunt!'
                ],
                [
                    'slug' => 'mechanical-electrical',
                    'title' => 'Mechanical & Electrical',
                    'image_path' => 'img/source/product/mechanical/4.png',
                    'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, incidunt!'
                ],
                [
                    'slug' => 'micro-hydro-trainer-simulator',
                    'title' => 'Micro Hydro Simulator',
                    'image_path' => 'img/product/trainer-remove.png',
                    'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, incidunt!'
                ]
            ];

            // Menyimpan setiap berita ke dalam database
            foreach ($products as $asu) {
                Products::factory()->create($asu);
            }
        } else {
            // Tindakan alternatif jika user tidak ditemukan
            $this->command->error('User PME Bandung tidak ditemukan.');
        }
    }
}
