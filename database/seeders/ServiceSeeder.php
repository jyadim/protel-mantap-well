<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Mendapatkan user berdasarkan nama
        $user = User::where('name', 'PME Bandung')->first(); // Pastikan pengguna ini sudah ada di database

        // Pastikan user ditemukan
        if ($user) {
            // Array data service yang akan dimasukkan ke database
            $services = [
                [
                    'title' => 'MHP Survey, Planning, and Design (Feasibility Study)',
                    'desc' => 'We offer comprehensive support from the initial stages of small hydro project development. Our services include reconnaissance visits, flow and head measurements, topographic and demographic surveys, detailed engineering design, and budgeting.'
                ],
                [
                    'title' => 'MHP Rehabilitation',
                    'desc' => 'We specialize in the rehabilitation and upgrade of small hydro power plants that are abandoned, damaged, or operating inefficiently. Our services ensure optimized output and efficient operation through improvements in civil structures, mechanical and electrical components, and transmission systems.',
                ],
                [
                    'title' => 'MHP Installation and Commissioning',
                    'desc' => 'Our team manages the installation of equipment on-site, followed by comprehensive testing and commissioning procedures. This ensures the safety and reliable operation of the hydro power plant.'
                ],
                [
                    'title' => 'MHP Training and Consultation',
                    'desc' => 'In collaboration with leading technical institutions and industry experts, we offer specialized training in various aspects of micro hydro power, including feasibility studies, control systems, turbine manufacturing, and operation and maintenance.',
                ],
                [
                    'title' => 'MHP Project Implementation (Water to Wire)',
                    'desc' => 'We provide end-to-end project implementation services for small hydro projects, offering a complete water-to-wire solution. Our services encompass everything from site surveys and design to construction and operational deployment.',
                ],
            ];

            // Menyimpan setiap service ke dalam database
            foreach ($services as $service) {
                Service::create($service);
            }
        } else {
            // Tindakan alternatif jika user tidak ditemukan
            $this->command->error('User PME Bandung tidak ditemukan.');
        }
    }
}
