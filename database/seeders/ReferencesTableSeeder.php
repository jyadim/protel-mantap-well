<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reference;
use App\Models\Partner;

class ReferencesTableSeeder extends Seeder
{
    public function run()
    {
        $references = [
            [
                'title' => 'Indonesia Project',
                'slug' => 'indonesia-project',
                'image' => 'img/source/ref/indonesia/1.png',
                'description' => 'Since January 2011 we have succesfully installed over 1000 
                units of Electronic load controller (ELC) In Indonesia and worldwide, ranging
                 from 3-250 kW with total installed capacity of about 15 MW. Our Turbines are 
                 in operation in more than 75 MHP sites worldwide. our equipments are exported 
                 to more than 30 countries worldwide such as Southeast Asia, South Asia, Africa, 
                 Europe, South America and Pacific and Australia.',
                'partners' => []
            ],
            [
                'title' => 'International Project',
                'slug' => 'international-project',
                'image' => 'img/source/ref/inter/6.png',
                'description' => 'Since January 2011 we have 
                succesfully installed over 450 units of Electronic 
                load controller (ELC) In Indonesia and abroad ranging,
                from 3-150 kW with total installed capacity of about 8 MW. 
                Our ELC are supplied to Sumatera, Kalimantan, Java, Sulawesi,
                Papua and all other island all over Indonesia. We have also
                supply ELC, turbines and equipments to South Africa, Kenya,
                Mozambique, Ethiopia, Burundi, Malaysia, Thailand,
                Phillippines, Pakistan, Turkey, Switzerland, France 
                and Australia. Folowing are some of our projects
                references.',
                'partners' => []
            ],
            [
                'slug' => 'partners',
                'image' => 'img/source/ref/indonesia/3.png',
                'title' => '',
                'description' => '',
                'partners' => [
                    [
                        'title' => 'ASEAN Hydro Power Competence Centre',
                        'text' => 'www.hycom.info',
                        'link' => 'https://www.hycom.info/'
                    ],
                    [
                        'title' => 'PT. entec Indonesia / Entec AG',
                        'text' => 'www.entec.ch',
                        'link' => 'http://www.entec.ch'
                    ],
                    [
                        'title' => 'GIZ Indonesia',
                        'text' => 'www.aseanrenewables.info',
                        'link' => 'http://www.aseanrenewables.info'
                    ],
                    [
                        'title' => 'Technical Education Development Center (TEDC)',
                        'text' => 'www.tedcbandung.com.info',
                        'link' => 'http://www.tedcbandung.com.info'
                    ],
                    [
                        'title' => 'Semikron semiconductor',
                        'text' => 'www.semikron.com',
                        'link' => 'http://www.semikron.com'
                    ],
                    [
                        'title' => 'Asosiasi Hidro Bandung (AHB)',
                        'text' => 'www.ahabe.wordpress.com',
                        'link' => 'http://www.ahabe.wordpress.com'
                    ],
                ]
            ]
        ];

        foreach ($references as $refData) {
            $reference = Reference::create([
                'title' => $refData['title'],
                'slug' => $refData['slug'],
                'image' => $refData['image'],
                'description' => $refData['description'],
            ]);

            foreach ($refData['partners'] as $partnerData) {
                $reference->partners()->create($partnerData);
            }
        }
    }
}
