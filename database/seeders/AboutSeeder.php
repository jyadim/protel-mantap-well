<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('name', 'PME Bandung')->first();

        if ($user) {
            $data =
                [
                    'image_name' => 'aboutPict',
                    'image_path' => 'img/source/about/3.png',
                    'description1' => ' CV. PROTEL MULTI ENERGY (PME) manufactures and supplies complete micro hydro power
                            equipment, specializing in Crossflow and Pelton turbines with capacities up to 500 kW per
                            unit. Our solutions, which include survey and design, site construction, equipment supply,
                            and installation, are installed worldwide, providing renewable power to remote areas,
                            schools, hospitals, and small businesses. We also offer products related to micro hydro
                            power, such as small hydro laboratories for teaching, spare parts, mechanical and electrical
                            components, and hydromechanical equipment. Notably, our Electronic Load Controller is used
                            in over 1,200 micro hydro schemes globally, with a total capacity of about 15 MW.
                            ',
                    'description2' => 'Founded in 2011 by Mr. Komarudin, an electrical engineer with over 18 years of experience in
                            renewable energy, PME is committed to sustainable, long-term cooperation in the micro hydro
                            power field. Our focus on quality, competitiveness, and extensive R&D, in collaboration with
                            leading technical and research institutes in Indonesia, has established us as a leading
                            manufacturer of small hydro power equipment in Southeast Asia. Our mission is to empower
                            rural communities with sustainable energy and technology through close, supportive
                            relationships.'
                ];
                About::Create($data);
        }else
        {
            $this->command->error('User dengan nama "PME Bandung" tidak ditemukan.');

        }
    }
}
