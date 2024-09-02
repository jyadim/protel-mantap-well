<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PictService;
use App\Models\Service;

class PictServiceSeeder extends Seeder
{
    public function run()
    {
        
        // Ambil semua layanan untuk menghubungkan gambar dengan layanan
        $services = Service::all();

        // Daftar gambar yang berbeda untuk setiap layanan
        $serviceImages = [
            1 => ['img/source/serv/design/1.png', 'img/source/serv/design/2.png', 'img/source/serv/design/3.png', 'img/source/serv/design/5.png', 'img/source/serv/design/6.png'],
            2 => ['img/source/serv/aftersales/4.png','img/source/serv/aftersales/3.png','img/source/serv/aftersales/2.png','img/source/serv/aftersales/1.png',],
            3 => ['img/source/serv/site/1.png', 'img/source/serv/site/6.png', 'img/source/serv/site/7.png', 'img/source/serv/site/8.png', 'img/source/serv/site/9.png'],
            4 => ['img/source/serv/training/16.png', 'img/source/serv/training/14.png', 'img/source/serv/training/10.png', 'img/source/serv/training/12.png', 'img/source/serv/training/8.png'],
            5 => ['img/source/serv/training/20.png', 'img/source/serv/training/4.png', 'img/source/serv/training/7.png', 'img/source/serv/training/15.png', 'img/source/serv/training/14.png'],
        ];

        // Loop untuk setiap layanan
        foreach ($services as $service) {
            // Cek apakah service memiliki gambar yang telah didefinisikan
            if (isset($serviceImages[$service->id])) {
                // Tambahkan gambar-gambar untuk layanan tersebut
                foreach ($serviceImages[$service->id] as $image) {
                    PictService::create([
                        'service_id' => $service->id,  // ID layanan
                        'image_path' => $image,  // Path gambar spesifik
                    ]);
                }
            }
        }
    }
}
