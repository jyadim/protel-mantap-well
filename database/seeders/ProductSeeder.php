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
                    'home_slug' => 'crossflow-turbine',
                    'title' => 'Crossflow Turbine',
                    'image_path' => 'img/product/crossflow2-remove.png',
                    'desc' => 'Crossflow turbine is a water turbine with a drum-shaped rotor that allows water to flow through it twice. Its efficient for small hydro projects due to its ability to handle varying flow rates.'
                ],
                [
                    'slug' => 'pelton-turbine',
                    'home_slug' => 'pelton-turbine',
                    'title' => 'Pelton Turbine',
                    'image_path' => 'img/product/pelton.png',
                    'desc' => 'Pelton turbine is a high-head impulse turbine with a wheel and buckets. It converts high-pressure water jets into mechanical energy, suitable for high-head hydroelectric projects.'
                ],
                [
                    'slug' => 'electronic-load-controller',
                    'home_slug' => 'electronic-load-controller',
                    'title' => 'Electronic Load Controller',
                    'image_path' => 'img/product/elc2-remove.png',
                    'desc' => 'Electronic Load Controller (ELC) manages excess electricity in micro-hydro systems by diverting it to a dump load, ensuring stable operation and protecting the generator.'
                ],
                [
                    'slug' => 'mechanical-electrical',
                    'home_slug' => 'mechanical-electrical',
                    'title' => 'Mechanical & Electrical',
                    'image_path' => 'img/source/product/mechanical/4.png',
                    'desc' => 'Mechanical & Electrical (M&E) involves the design and management of systems like power, lighting, and HVAC in buildings and infrastructure to ensure efficient operation.'
                ],
                [
                    'slug' => 'micro-hydro-trainer-simulator',
                    'home_slug' => 'micro-hydro-trainer-simulator',
                    'title' => 'Micro Hydro Simulator',
                    'image_path' => 'img/product/trainer-remove.png',
                    'desc' => 'Micro Hydro Trainer is a device used for training on micro-hydro power systems, simulating turbine, generator, and control operations for educational purposes.'
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
