<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\User;

class NewsSeeder extends Seeder
{
    public function run()
    {
        // Mendapatkan user berdasarkan nama
        $user = User::where('name', 'PME Bandung')->first(); // Pastikan pengguna ini sudah ada di database

        // Pastikan user ditemukan
        if ($user) {
            // Array data berita yang akan dimasukkan ke database
            $newsItems = [
                ['slug' => 'micro-hydro-in-jakarta-area', 'title' => 'MICRO HYDRO IN JAKARTA AREA', 'date' => '2024-07-09', 'link' => 'https://www.youtube.com/embed/36LhTxd4n7s', 'user_id' => $user->id],
                ['slug' => 'simulator-hydro-laboratory-for-polytechnic', 'title' => 'SIMULATOR HYDRO LABORATORY FOR POLYTECHNIC', 'date' => '2024-06-21', 'link' => 'https://www.youtube.com/embed/aqs4O1g0srU', 'user_id' => $user->id],
                ['slug' => 'mikro-hydro-dari-irigasi-desa-poltek-negeri-semarang', 'title' => 'MIKRO HIDRO DARI IRIGASI DESA POLTEK NEGERI SEMARANG', 'date' => '2024-06-06', 'link' => 'https://www.youtube.com/embed/KIgqwrzrO5A', 'user_id' => $user->id],
            ];

            // Menyimpan setiap berita ke dalam database
            foreach ($newsItems as $newsItem) {
                News::factory()->create($newsItem);
            }
        } else {
            // Tindakan alternatif jika user tidak ditemukan
            $this->command->error('User PME Bandung tidak ditemukan.');
        }
    }
}
