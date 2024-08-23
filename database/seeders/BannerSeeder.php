<?php
namespace Database\Seeders;

use App\Models\Banner;
use App\Models\User;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    public function run()
    {
        $user = User::where('name', 'PME Bandung')->first(); // Pastikan picture ini ada di database

        // Pastikan picture ditemukan
        if ($user) {
            // Data yang akan dimasukkan ke database
            $bannerData = [
                'title' => 'CV. Protel Multi Energy',
                'subtitle' => 'Specialized in Manufacturing of Electronic Load Controller, Crossflow and Pelton turbines',
                'image_name' => 'Banner_Pict',
                'image_path' => 'img/source/serv/design/2.png'
            ];

            // Menyimpan data ke dalam database
            Banner::create($bannerData);
        } else {
            // Tindakan alternatif jika picture tidak ditemukan
            $this->command->error('User dengan nama "PME Bandung" tidak ditemukan.');
        }
    }
}
