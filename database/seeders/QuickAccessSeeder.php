<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuickAccess;
use App\Models\User;

class QuickAccessSeeder extends Seeder
{
    public function run()
    {
        // Mengambil user
        $user = User::where('name', 'PME Bandung')->first();

        // Memeriksa apakah user dan picture ditemukan
        if ($user) {
            $quickAccessData = [
                ['slug' => 'about', 'title' => 'About Us', 'image_name' => 'AboutUsQA_pict', 'image_path' => 'img/source/about/4.png', 'detail' => 'CV. PROTEL MULTI ENERGY (PME) manufactures and supplies complete micro hydro power
                            equipment, specializing in Crossflow and Pelton turbines with capacities up to 500 kW per
                            unit. Our solutions, which include survey and design, site construction, equipment supply,
                            and installation, are installed worldwide, providing renewable power to remote areas,
                            schools, hospitals, and small businesses. We also offer products related to micro hydro
                            power, such as small hydro laboratories for teaching, spare parts, mechanical and electrical
                            components, and hydromechanical equipment. Notably, our Electronic Load Controller is used
                            in over 1,200 micro hydro schemes globally, with a total capacity of about 15 MW.'],
                ['slug' => 'product', 'title' => 'Products', 'image_name' => 'ProductQA_pict', 'image_path' => 'img/source/product/cross/7.png', 'detail' => 'Our product lineup features a diverse range of cutting-edge solutions designed to meet the needs of various industries.'],
                ['slug' => 'gallery', 'title' => 'References', 'image_name' => 'ReferenceQA_pict', 'image_path' => 'img/source/ref/indonesia/3.png', 'detail' => 'Our Project and Partnership'],
            ];

            // Menggunakan factory untuk membuat data QuickAccess
            foreach ($quickAccessData as $data) {
                QuickAccess::create($data);
            }
        } else {
            // Menampilkan pesan jika user atau picture tidak ditemukan
            $this->command->error('User PME Bandung atau Picture QaPict tidak ditemukan.');
        }
    }
}
