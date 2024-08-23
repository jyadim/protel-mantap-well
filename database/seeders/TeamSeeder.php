<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;

class TeamSeeder extends Seeder
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
            $teams = [
                [
                    'image_path' => 'img/source/about/2.png',
                    'image_name' => 'TeamPict',
                    'team_name' => 'Test Team',
                ],
                [
                    'image_path' => 'img/source/about/7.png',
                    'image_name' => 'TeamPict',
                    'team_name' => 'Test Team',
                ],
                [
                    'image_path' => 'img/source/about/8.png',
                    'image_name' => 'TeamPict',
                    'team_name' => 'Test Team',
                ],
                [
                    'image_path' => 'img/source/about/5.png',
                    'image_name' => 'TeamPict',
                    'team_name' => 'Test Team',
                ],
            ];

            // Menyimpan setiap berita ke dalam database
            foreach ($teams as $item) {
                Team::create($item);
            }
        } else {
            // Tindakan alternatif jika user tidak ditemukan
            $this->command->error('User PME Bandung tidak ditemukan.');
        }
    }
}
