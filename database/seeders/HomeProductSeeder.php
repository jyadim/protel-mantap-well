<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomeProduct;
use App\Models\User;

class HomeProductSeeder extends Seeder
{
    public function run()
    {
        // Define the image paths and corresponding titles
        $picturePaths = [
            'crossflow-turbine' => ['title' => 'Crossflow Turbine', 'path' => 'img/product/crossflow-wm.png'],
            'pelton-turbine' => ['title' => 'Pelton Turbine', 'path' => 'img/product/peltonturbine-wm.png'],
            'electronic-load-controller' => ['title' => 'Electronic Load Controller', 'path' => 'img/product/elc2-wm.png'],
            'micro-hydro-trainer' => ['title' => 'Micro Hydro Trainer', 'path' => 'img/product/simulator-wm.png'],
            'mechanical-electrical' => ['title' => 'Mechanical Electrical', 'path' => 'img/source/product/mechanical/6.png'],
        ];

        $productData = [];

        // Find the user by name
        $user = User::where('name', 'PME Bandung')->first();

        if ($user) {
            foreach ($picturePaths as $slug => $data) {
                $productData[] = [
                    'user_id' => $user->id, // Link to the user's ID
                    'name' => $data['title'], // Adding the name field
                    'slug' => $slug, 
                    'image_name' => $data['title'], // Using the specific title for image_name
                    'image_path' => $data['path'], // Image path from configuration
                ];
            }

            // Insert all product data into the database
            foreach ($productData as $data) {
                HomeProduct::create($data);
            }
        } else {
            $this->command->error("User with the name 'PME Bandung' not found.");
        }
    }
}
