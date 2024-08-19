<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('homepage', [
        'prodhome' => [
            [
                'id' => '1',
                'slug' => 'crossflow-turbine',
                'title' => 'PME Bandung ',
                'name' => 'Crossflow Turbine',
                'image' => 'img/product/crossflow-wm.png'
            ],
            [
                'id' => '2',
                'slug' => 'pelton-turbine',
                'title' => 'PME Bandung ',
                'name' => 'Pelton Turbine',
                'image' => 'img/product/peltonturbine-wm.png'
            ],
            [
                'id' => '3',
                'slug' => 'electronic-load-controller',
                'title' => 'PME Bandung ',
                'name' => 'Electronic Load Controller',
                'image' => 'img/product/elc2-wm.png'
            ],
            [
                'id' => '4',
                'slug' => 'micro-hydro-trainer',
                'title' => 'PME Bandung ',
                'name' => 'Micro Hydro Trainer',
                'image' => 'img/product/simulator-wm.png'
            ],
            [
                'id' => '5',
                'slug' => 'mechanical-electrical',
                'title' => 'PME Bandung ',
                'name' => 'Mechanical & Electrical',
                'image' => 'img/source/product/mechanical/6.png'
            ],
        ],
        'quickaccess' => [
            [
                'id' => '1',
                'slug' => 'about-us',
                'title' => 'About Us',
                'image' => 'img/source/about/1.png',
                'detail' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
            ],
            [
                'id' => '2',
                'slug' => 'products',
                'title' => 'Products',
                'image' => 'img/source/product/cross/3.png',
                'detail' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
            ],
            [
                'id' => '3',
                'slug' => 'project-references',
                'title' => 'References',
                'image' => 'img/source/ref/inter/1.png',
                'detail' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
            ],
        ],
        'news' => [
            [
                'id' => '1',
                'slug' => 'micro-hydro-in-jakarta-area',
                'title' => 'MICRO HYDRO IN JAKARTA AREA',
                'date' => 'July 9, 2024',
                'link' => 'https://www.youtube.com/embed/36LhTxd4n7s',
                'author' => 'PME Bandung'
            ],
            [
                'id' => '2',
                'slug' => 'simulator-hydro-laboratory-for-polytechnic',
                'title' => 'SIMULATOR HYDRO LABORATORY FOR POLYTECHNIC',
                'date' => 'June 21, 2024',
                'link' => 'https://www.youtube.com/embed/aqs4O1g0srU',
                'author' => 'PME Bandung '
            ],
            [
                'id' => '3',
                'slug' => 'mikro-hydro-dari-irigasi-desa-poltek-negeri-semarang',
                'title' => 'MIKRO HIDRO DARI IRIGASI DESA POLTEK NEGERI SEMARANG',
                'date' => 'June 6, 2024',
                'link' => 'https://www.youtube.com/embed/KIgqwrzrO5A',
                'author' => 'PME Bandung'
            ],
        ],
        'banner' => [
            [
                'title' => 'CV. Protel Multi Energy',
                'image' => 'img/source/ref/inter/3.png',
                'subtitle' => 'Specialized in Manufacturing of Electronic Load Controller, Crossflow and Pelton turbines'
            ]
        ]
    ]);
});
Route::get('/about', function () {
    return view('about', [
        'about' => [
            [
                'id' => '1',
                'image' => 'img/source/about/3.png',
                'detail1' => ' CV. PROTEL MULTI ENERGY (PME) manufactures and supplies complete micro hydro power
                            equipment, specializing in Crossflow and Pelton turbines with capacities up to 500 kW per
                            unit. Our solutions, which include survey and design, site construction, equipment supply,
                            and installation, are installed worldwide, providing renewable power to remote areas,
                            schools, hospitals, and small businesses. We also offer products related to micro hydro
                            power, such as small hydro laboratories for teaching, spare parts, mechanical and electrical
                            components, and hydromechanical equipment. Notably, our Electronic Load Controller is used
                            in over 1,200 micro hydro schemes globally, with a total capacity of about 15 MW.
                            ',
                'detail2' => 'Founded in 2011 by Mr. Komarudin, an electrical engineer with over 18 years of experience in
                            renewable energy, PME is committed to sustainable, long-term cooperation in the micro hydro
                            power field. Our focus on quality, competitiveness, and extensive R&D, in collaboration with
                            leading technical and research institutes in Indonesia, has established us as a leading
                            manufacturer of small hydro power equipment in Southeast Asia. Our mission is to empower
                            rural communities with sustainable energy and technology through close, supportive
                            relationships.'
            ]
        ],
        'team' => [
            [
                'id' => '1',
                'image' => 'https://images.unsplash.com/photo-1634926878768-2a5b3c42f139?fit=clamp&w=400&h=400&q=80',
                'name' => 'Tranter Jaskulski',
                'position' => 'Founder & Specialist'
            ],
            [
                'id' => '2',
                'image' => 'https://images.unsplash.com/photo-1634926878768-2a5b3c42f139?fit=clamp&w=400&h=400&q=80',
                'name' => 'Tranter Jaskulski',
                'position' => 'Founder & Specialist'
            ],
            [
                'id' => '3',
                'image' => 'https://images.unsplash.com/photo-1634926878768-2a5b3c42f139?fit=clamp&w=400&h=400&q=80',
                'name' => 'Tranter Jaskulski',
                'position' => 'Founder & Specialist'
            ],
            [
                'id' => '4',
                'image' => 'https://images.unsplash.com/photo-1634926878768-2a5b3c42f139?fit=clamp&w=400&h=400&q=80',
                'name' => 'Tranter Jaskulski',
                'position' => 'Founder & Specialist'
            ],
        ]
    ]);
});
Route::get('/contact', function () {
    return view('contactus', [
       'contact_info' => [
            'id' => '1',
            'email' => 'admin@pme-bandung.com',
            'mobile' => '0813-9555-6300',
            'address' => 'Gg.Awibitung No. 40 Ciawitali Selatan Cimahi 40152 Jawa Barat, Indonesia',
            'land_line' => '(022) 6631608'
        ]
    ]);
});
Route::get('/ services', function () {
    return view('services', [
        'services' => [
            [
                'id' => '1',
                'title' => 'Survey, Planning & Design (Feasibility Study) of MHP',
                'detail' => 'We can support you from initial development
                                        of
                                        a small hydro project such as reconnaissance visit, flow and head measurement,
                                        topographic and demographic survey, detailed engineering design and budgeting.',
                'image' => 'img/'
            ],
            [
                'id' => '2',
                'title' => 'Supervision & Quality Assurance of MHP',
                'detail' => 'We have qualified and experienced technical
                                        team to monitor the construction work and to ensure quality control during
                                        construction and operation of a small hydro project.',
                'image' => 'p balap'
            ],
            [
                'id' => '3',
                'title' => 'Power Evacuation & Grid Connection',
                'detail' => 'We provide service to design power
                                        evacuation
                                        system, grid connection facilities and necessary coordination for obtaining
                                        power
                                        purchase agreement.',
                'image' => 'iinn'
            ],
            [
                'id' => '4',
                'title' => 'Project Management & Consultancy',
                'detail' => 'Our experienced team provides comprehensive
                                        project management services, ensuring your project is completed on time and
                                        within budget.',
                'image' => 'p balap'
            ],
            [
                'id' => '5',
                'title' => 'Environmental Impact Assessment',
                'detail' => 'We conduct thorough environmental impact
                                        assessments to ensure your project complies with all environmental regulations
                                        and standards.',
                'image' => 'p balap'

            ],
        ]
    ]);
});
Route::get('/gallery', function () {
    return view('gallery', [
        'references' => [
            [
                'id' => '1',
                'title' => 'Indonesia Project',
                'slug' => 'indonesia-project',
                'image' => 'img/source/ref/inter/2.png',
                'description' => 'Since January 2011 we have succesfully installed over 1000 
                units of Electronic load controller (ELC) In Indonesia and worldwide, ranging
                 from 3-250 kW with total installed capacity of about 15 MW. Our Turbines are 
                 in operation in more than 75 MHP sites worldwide. our equipments are exported 
                 to more than 30 countries worldwide such as Southeast Asia, South Asia, Africa, 
                 Europe, South America and Pacific and Australia.',
            ],
            [
                'id' => '2',
                'title' => 'International Project',
                'slug' => 'international-project',
                'image' => 'img/source/ref/inter/2.png',
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
                references',
            ],
            [
                'id' => '3',
                'slug' => 'partners',
                'image' => 'img/source/ref/inter/2.png',
                'title' => '',
                'description' => '',
                'partners' => [
                    [
                        'id' => '1',
                        'title' => 'ASEAN Hydro Power Competence Centre',
                        'text' => 'www.hycom.info',
                        'link' => 'https://www.hycom.info/'
                    ],
                    [
                        'id' => '2',
                        'title' => 'PT. entec Indonesia / Entec AG',
                        'text' => 'www.entec.ch',
                        'link' => 'http://www.entec.ch'
                    ],
                    [
                        'id' => '3',
                        'title' => 'GIZ Indonesia',
                        'text' => 'www.aseanrenewables.info',
                        'link' => 'http://www.aseanrenewables.info'
                    ], [
                        'id' => '4',
                        'title' => 'Technical Education Development Center (TEDC)',
                        'text' => 'www.tedcbandung.com.info',
                        'link' => 'http://www.tedcbandung.com.info'
                    ],
                    [
                        'id' => '5',
                        'title' => 'Semikron semiconductor',
                        'text' => 'www.semikron.com',
                        'link' => 'http://www.semikron.com'
                    ],
                    [
                        'id' => '6',
                        'title' => 'Asosiasi Hidro Bandung (AHB)',
                        'text' => 'www.ahabe.wordpress.com',
                        'link' => 'http://www.ahabe.wordpress.com'
                    ],
                ]
            ]
        ],

    ]);
});
Route::get('/product', function () {
    return view('product', [
        'product' => [
            [
                'id' => '1',
                'slug' => 'crossflow-turbine',
                'name' => 'Crossflow Turbine',
                'image' => 'img/product/crossflow2-remove.png',
                'detailprod' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, incidunt!'
            ],
            [
                'id' => '2',
                'slug' => 'pelton-turbine',
                'name' => 'Pelton Turbine',
                'image' => 'img/product/pelton.png',
                'detailprod' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, incidunt!'
            ],
            [
                'id' => '3',
                'slug' => 'electronic-load-controller',
                'name' => 'Electronic Load Controller',
                'image' => 'img/product/elc2-remove.png',
                'detailprod' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, incidunt!'
            ],
            [
                'id' => '4',
                'slug' => 'mechanical-electrical',
                'name' => 'Mechanical & Electrical',
                'image' => 'img/source/product/mechanical/4.png',
                'detailprod' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, incidunt!'
            ],
            [
                'id' => '5',
                'slug' => 'micro-hydro-trainer-simulator',
                'name' => 'Micro Hydro Simulator',
                'image' => 'img/product/trainer-remove.png',
                'detailprod' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, incidunt!'
            ]
        ]
    ]);
});
Route::get('/product/{slug}', function ($slug) {
    $detproduct = [
        [
            'id' => '1',
            'title' => 'Crossflow Turbine',
            'slug' => 'crossflow-turbine',
            'video' => 'mp4/crossflowturbine-wm.mp4',
            'image' => 'img/product/crossflow-wm.png',
        ],
        [
            'id' => '2',
            'slug' => 'pelton-turbine',
            'title' => 'Pelton Turbine',
            'video' => 'mp4/peltonturbine-wm.mp4',
            'image' => 'img/product/peltonturbine-wm.png',
        ],
        [
            'id' => '3',
            'slug' => 'electronic-load-controller',
            'title' => 'Electronic Load Controller',
            'video' => 'mp4/peltonturbine-wm.mp4',
            'image' => 'img/product/elc-wm.png',
        ],
        [
            'id' => '4',
            'slug' => 'mechanical-electrical',
            'title' => 'Mechanical & Electrical',
            'video' => 'mp4/peltonturbine-wm.mp4',
            'image' => 'img/source/product/mechanical/3.png
            ',
        ],
        [
            'id' => '5',
            'slug' => 'micro-hydro-trainer-simulator',
            'title' => 'Micro Hydro Trainer Simulator',
            'video' => 'mp4/peltonturbine-wm.mp4',
            'image' => 'img/product/trainer-remove.png',
        ]
    ];

    $detproduct = Arr::first($detproduct, function ($detproduct) use ($slug) {
        return $detproduct['slug'] == $slug;
    });
    return view('detail_product', ['detail_product' => $detproduct]);
});
Route::get('/gallery/{slug}', function ($slug) {
    $detgallery = [
        [
            'id' => '1',
            'title' => 'Indonesia Project',
            'slug' => 'indonesia-project',
            'pict' => [
                [
                    'id' => '1',
                    'title' => '2x150kW ELC and Synchronizer',
                    'region' => 'Papua',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/eeG5zNHL2G8AkR4i8'
                ],
                [
                    'id' => '2',
                    'title' => '30kW Mechanical Electrical',
                    'region' => 'Raja Ampat, Papua',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/tkNF1J3ho3NHQ7tX7'
                ],
                [
                    'id' => '3',
                    'title' => '30kW Pelton Turbine',
                    'region' => 'Borneo',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/8myfkgJH4RRJ8t9o6'
                ],
                [
                    'id' => '4',
                    'title' => 'Complete ME Supply 15 kW',
                    'region' => 'East Nusa Tenggara',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/FN29kemGT1XGi8qw6'
                ],
                [
                    'id' => '5',
                    'title' => 'Complete Water to Wire, 75kW',
                    'region' => 'Sulawesi',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/j1MbmGhsCLhPjMr89'
                ],
                [
                    'id' => '6',
                    'title' => 'Crossflow turbine for training institution',
                    'region' => 'Sulawesi',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/j1MbmGhsCLhPjMr89'
                ],
                [
                    'id' => '7',
                    'title' => 'MHP Kasiala 40kW',
                    'region' => 'Una-una district, Sulawesi Tengah',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/xDnW6wi9zCaizjji7'
                ],
                [
                    'id' => '8',
                    'title' => 'MHP Lembor 30kW',
                    'region' => 'Komodo Flores, Nusa Tenggara Timur',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/zucj35BqQYvwaAxRA'
                ],
                [
                    'id' => '9',
                    'title' => 'Off Grid 2kwp Solar Power',
                    'region' => 'Sulawesi',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/j1MbmGhsCLhPjMr89'
                ],
                [
                    'id' => '10',
                    'title' => 'Supply of Electronic Load Controller (ELC) for various sites',
                    'region' => 'Sulawesi',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/j1MbmGhsCLhPjMr89'
                ],
                [
                    'id' => '11',
                    'title' => 'Supply Over 25 Units Of ELC, Prowater',
                    'region' => 'Padang',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/ybast16RSp8MSUzd7'
                ],
                [
                    'id' => '12',
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
            'id' => '2',
            'title' => 'International Project',
            'slug' => 'international-project',
            'pict' => [
                [
                    'id' => '1',
                    'title' => '10-40kW ELC for MHP',
                    'region' => 'Europe, Kosovo, Romania, Norway, France, Swiss',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/eeG5zNHL2G8AkR4i8'
                ],
                [
                    'id' => '2',
                    'title' => '130kW MHP for Hospital and School, with Heksa Hydro',
                    'region' => 'Burundi',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/Pja2XDJ2eegR3hED7'
                ],
                [
                    'id' => '3',
                    'title' => '130kW MHP for irrigation and farm MHP, with Heksa Hydro',
                    'region' => 'South Africa',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/UJCM82RsYWtn4zat7'
                ],
                [
                    'id' => '4',
                    'title' => '2x10kW Complete ME Project 2020',
                    'region' => 'Thailand',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/wh3RG5K3D1FRtfth7'
                ],
                [
                    'id' => '5',
                    'title' => '2x75 kW ELC',
                    'region' => 'Guatemala, South America',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/j1MbmGhsCLhPjMr89'
                ],
                [
                    'id' => '6',
                    'title' => 'Complete M&E Equipments 25kW',
                    'region' => 'Sarawak, Malaysia',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/HA6XraAbvBRQGKcJ8'
                ],
                [
                    'id' => '7',
                    'title' => 'ELC & water heater dummy load',
                    'region' => 'Pakistan',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/DvyVJ9bzD9Brg9279'
                ],
                [
                    'id' => '8',
                    'title' => 'ELC for 90 kW MHP plant',
                    'region' => 'Turkey',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/vCDJwBcdAStfc4zZ8'
                ],
                [
                    'id' => '9',
                    'title' => 'Electro Mechanic Supply 32 kW',
                    'region' => 'Thailand',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/wh3RG5K3D1FRtfth7'
                ],
                [
                    'id' => '10',
                    'title' => 'Electronic Load Controller for 50 MHP sites',
                    'region' => 'North Pakistani',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/xSt5BX1CNNt29dv18'
                ],
                [
                    'id' => '11',
                    'title' => 'Several ELC supply for MHP',
                    'region' => 'Philippines',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/xrkfcTUUAjgbqsh89'
                ],
                [
                    'id' => '12',
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
           'id' => '3',
           'title' => 'Partners',
            'slug' => 'partners',
            'pict' => [
                [
                    'id' => '1',
                    'title' => 'Trainees from Tanzania in our Office',
                    'region' => 'Indonesia',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/o1XqMEqwsn2ErvGE8'
                ],
                [
                    'id' => '2',
                    'title' => 'Training and Visit from Pakistan turbine manufacturer',
                    'region' => 'Indonesia',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/o1XqMEqwsn2ErvGE8'
                ],
                [
                    'id' => '3',
                    'title' => 'Training on ELC for local turbine manufacturer',
                    'region' => 'Indonesia',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/o1XqMEqwsn2ErvGE8'
                ],
                [
                    'id' => '4',
                    'title' => 'Training Participants from ASEAN countries',
                    'region' => 'Indonesia',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/o1XqMEqwsn2ErvGE8'
                ],
                [
                    'id' => '5',
                    'title' => 'Training with Mining and Energy Staff',
                    'region' => 'Indonesia',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/o1XqMEqwsn2ErvGE8'
                ],
                [
                    'id' => '6',
                    'title' => 'Visit UNIDO Representative (Austria) & Entec AG Swiss',
                    'region' => 'Indonesia',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/o1XqMEqwsn2ErvGE8'
                ],
                [
                    'id' => '7',
                    'title' => 'Workshop Visit from Crystal Power Malaysia',
                    'region' => 'Indonesia',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/o1XqMEqwsn2ErvGE8'
                ],
                [
                    'id' => '8',
                    'title' => 'Workshop Visit from German and Swiss Colleagues',
                    'region' => 'Indonesia',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/o1XqMEqwsn2ErvGE8'
                ],
                [
                    'id' => '9',
                    'title' => 'Commissioning with villagers and local manufacturers',
                    'region' => 'Indonesia',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/o1XqMEqwsn2ErvGE8'
                ],
                [
                    'id' => '10',
                    'title' => 'Partners and friends from German and Swiss',
                    'region' => 'Indonesia',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/o1XqMEqwsn2ErvGE8'
                ],
                [
                    'id' => '11',
                    'title' => 'Site Visit with our partners from South Africa',
                    'region' => 'Indonesia',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed auctor, mi sed egestas tincidunt, libero dolor bibendum nisl, non aliquam quam massa id lacus.',
                    'image' => 'img/source/ref/indonesia/1.png',
                    'maps' => 'https://maps.app.goo.gl/o1XqMEqwsn2ErvGE8'
                ],
                [
                    'id' => '12',
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

    $detgallery = Arr::first($detgallery, function ($detgallery) use ($slug) {
        return $detgallery['slug'] == $slug;
    });
    return view('detail_gallery', ['detail_gallery' => $detgallery]);
});

Route::get('/adminhome', function () {
    return view('admin');
});
Route::get('/a', function () {
    return view('adminproduct');
});
Route::get('/b', function () {
    return view('admindatailproduct');
    });
    Route::get('/c', function () {
        return view('adminaboutus');
    });
    Route::get('/d', function () {
        return view('admincontactus');
    });
    Route::get('/e', function () {
        return view('adminservices');
    });
    Route::get('/f', function () {
        return view('adminreferences');
    });
    Route::get('/g', function () {
        return view('adminindoproject');
    });

