<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userExists = User::where('name', 'PME Bandung')->exists();

        // Jika pengguna belum ada, maka buat pengguna tersebut
        if (!$userExists) {
            User::factory()->create([
                'name' => 'PME Bandung',
                'username' => 'pme118704',
                'password' => bcrypt('1sampai10'), // Pastikan untuk mengenkripsi password
                'is_admin' => true,
            ]);
        } else {
            $this->command->info('User PME Bandung sudah ada di database, tidak perlu ditambahkan lagi.');
        }
    }
}
