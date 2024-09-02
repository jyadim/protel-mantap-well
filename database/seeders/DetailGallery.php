<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Picture;
use App\Models\User;
class DetailGallery extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('name', 'PME Bandung')->first(); // Pastikan picture ini ada di database

        // Pastikan picture ditemukan
        if ($user) {
            // Data yang akan dimasukkan ke database
            $detgallery = [
                [
                    'title' => 'Indonesia Project',
                    'slug' => 'indonesia-project',
                    'pict' => [
                        [
                            'title' => '2x150kW ELC and Synchronizer',
                            'region' => 'Papua',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/eeG5zNHL2G8AkR4i8'
                        ],
                        [
                    
                            'title' => '30kW Mechanical Electrical',
                            'region' => 'Raja Ampat, Papua',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/tkNF1J3ho3NHQ7tX7'
                        ],
                        [
                            
                            'title' => '30kW Pelton Turbine',
                            'region' => 'Borneo',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/8myfkgJH4RRJ8t9o6'
                        ],
                        [
                            
                            'title' => 'Complete ME Supply 15 kW',
                            'region' => 'East Nusa Tenggara',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/FN29kemGT1XGi8qw6'
                        ],
                        [
                           
                            'title' => 'Complete Water to Wire, 75kW',
                            'region' => 'Sulawesi',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/j1MbmGhsCLhPjMr89'
                        ],
                        [
                            
                            'title' => 'Crossflow turbine for training institution',
                            'region' => 'Sulawesi',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/j1MbmGhsCLhPjMr89'
                        ],
                        [
                            'title' => 'MHP Kasiala 40kW',
                            'region' => 'Una-una district, Sulawesi Tengah',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/xDnW6wi9zCaizjji7'
                        ],
                        [
                            'title' => 'MHP Lembor 30kW',
                            'region' => 'Komodo Flores, Nusa Tenggara Timur',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/zucj35BqQYvwaAxRA'
                        ],
                        [
                            'title' => 'Off Grid 2kwp Solar Power',
                            'region' => 'Sulawesi',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/j1MbmGhsCLhPjMr89'
                        ],
                        [
                            'title' => 'Supply of Electronic Load Controller (ELC) for various sites',
                            'region' => 'Sulawesi',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/j1MbmGhsCLhPjMr89'
                        ],
                        [
                            'title' => 'Supply Over 25 Units Of ELC, Prowater',
                            'region' => 'Padang',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/ybast16RSp8MSUzd7'
                        ],
                        [
                            'title' => 'Water to Wire Project, MHP',
                            'region' => 'Masewe, Sulawesi Tengah',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/JgUuwQimmAqAXL1Z7'
                        ],
                    ]
        
                ],
                [
            
                    'title' => 'International Project',
                    'slug' => 'international-project',
                    'pict' => [
                        [
    
                            'title' => '10-40kW ELC for MHP',
                            'region' => 'Europe, Kosovo, Romania, Norway, France, Swiss',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/eeG5zNHL2G8AkR4i8'
                        ],
                        [
                    
                            'title' => '130kW MHP for Hospital and School, with Heksa Hydro',
                            'region' => 'Burundi',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/Pja2XDJ2eegR3hED7'
                        ],
                        [
                            
                            'title' => '130kW MHP for irrigation and farm MHP, with Heksa Hydro',
                            'region' => 'South Africa',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/UJCM82RsYWtn4zat7'
                        ],
                        [
                            
                            'title' => '2x10kW Complete ME Project 2020',
                            'region' => 'Thailand',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/wh3RG5K3D1FRtfth7'
                        ],
                        [
                           
                            'title' => '2x75 kW ELC',
                            'region' => 'Guatemala, South America',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/j1MbmGhsCLhPjMr89'
                        ],
                        [
                            
                            'title' => 'Complete M&E Equipments 25kW',
                            'region' => 'Sarawak, Malaysia',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/HA6XraAbvBRQGKcJ8'
                        ],
                        [
                            'title' => 'ELC & water heater dummy load',
                            'region' => 'Pakistan',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/DvyVJ9bzD9Brg9279'
                        ],
                        [
                            'title' => 'ELC for 90 kW MHP plant',
                            'region' => 'Turkey',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/vCDJwBcdAStfc4zZ8'
                        ],
                        [
                            'title' => 'Electro Mechanic Supply 32 kW',
                            'region' => 'Thailand',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/wh3RG5K3D1FRtfth7'
                        ],
                        [
                            'title' => 'Electronic Load Controller for 50 MHP sites',
                            'region' => 'North Pakistani',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/xSt5BX1CNNt29dv18'
                        ],
                        [
                            'title' => 'Several ELC supply for MHP',
                            'region' => 'Philippines',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/xrkfcTUUAjgbqsh89'
                        ],
                        [
                            'title' => 'Supply 120kW for MHP Mozambique & with Heksa Hydro',
                            'region' => 'South Africa',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/UJCM82RsYWtn4zat7'
                        ],
                    ]
                ],
                [
                    
                    'title' => 'Partners',
                    'slug' => 'partners',
                    'pict' => [
                        [
    
                            'title' => 'Trainees from Tanzania in our Office',
                            'region' => 'Indonesia',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/o1XqMEqwsn2ErvGE8'
                        ],
                        [
                    
                            'title' => 'Training and Visit from Pakistan turbine manufacturer',
                            'region' => 'Indonesia',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/o1XqMEqwsn2ErvGE8'
                        ],
                        [
                            
                            'title' => 'Training on ELC for local turbine manufacturer',
                            'region' => 'Indonesia',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/o1XqMEqwsn2ErvGE8'
                        ],
                        [
                            
                            'title' => 'Training Participants from ASEAN countries',
                            'region' => 'Indonesia',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/o1XqMEqwsn2ErvGE8'
                        ],
                        [
                           
                            'title' => 'Training with Mining and Energy Staff',
                            'region' => 'Indonesia',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/o1XqMEqwsn2ErvGE8'
                        ],
                        [
                            
                            'title' => 'Visit UNIDO Representative (Austria) & Entec AG Swiss',
                            'region' => 'Indonesia',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/o1XqMEqwsn2ErvGE8'
                        ],
                        [
                            'title' => 'Workshop Visit from Crystal Power Malaysia',
                            'region' => 'Indonesia',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/o1XqMEqwsn2ErvGE8'
                        ],
                        [
                            'title' => 'Workshop Visit from German and Swiss Colleagues',
                            'region' => 'Indonesia',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/o1XqMEqwsn2ErvGE8'
                        ],
                        [
                            'title' => 'Commissioning with villagers and local manufacturers',
                            'region' => 'Indonesia',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/o1XqMEqwsn2ErvGE8'
                        ],
                        [
                            'title' => 'Partners and friends from German and Swiss',
                            'region' => 'Indonesia',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/o1XqMEqwsn2ErvGE8'
                        ],
                        [
                            'title' => 'Site Visit with our partners from South Africa',
                            'region' => 'Indonesia',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/o1XqMEqwsn2ErvGE8'
                        ],
                        [
                            'title' => 'Trainees from Jawa Power Office',
                            'region' => 'Indonesia',
                            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                            'image' => 'img/source/ref/indonesia/1.png',
                            'maps' => 'https://maps.app.goo.gl/o1XqMEqwsn2ErvGE8'
                        ],
                    ]
                ],
            ];

            // Menyimpan data ke dalam database
            foreach ($detgallery as $projectData) {
                // Create the project
                $project = Project::create([
                    'title' => $projectData['title'],
                    'slug' => $projectData['slug'],
                ]);

                // Create related pictures
                foreach ($projectData['pict'] as $pictData) {
                    Picture::create([
                        'project_id' => $project->id, // Assuming project_id is a foreign key in the pictures table
                        'title' => $pictData['title'],
                        'region' => $pictData['region'],
                        'description' => $pictData['description'],
                        'image' => $pictData['image'],
                        'maps' => $pictData['maps'],
                    ]);
                }
            }
        } else {
            // Tindakan alternatif jika picture tidak ditemukan
            $this->command->error('User dengan nama "PME Bandung" tidak ditemukan.');
        }
    }
}
