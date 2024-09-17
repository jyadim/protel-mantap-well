<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>pme-bandung</title>
    <style>
        /* Tambahkan media query untuk layar yang lebih besar */
        @media (min-width: 1400px) {
            /* Membuat kontainer lebih besar */
            .max-w-screen-2xl {
                max-width: 100%;
            }
    
            /* Mengatur padding dan ukuran gambar lebih besar */
            .sm\\:w-4\\/5 {
                width: 70%;
            }
    
            .sm\\:w-3\\/4 {
                width: 60%;
            }
    
            .p-12 {
                padding: 4rem;
            }
    
            /* Gambar yang lebih besar */
            img.rounded-2xl {
                width: 100%;
                height: auto;
                max-width: 700px; /* Ukuran maksimum gambar */
            }
    
            /* Membuat teks lebih besar */
            h2.text-3xl {
                font-size: 3.5rem; /* Ukuran teks judul lebih besar */
            }
    
            h1.text-4xl {
                font-size: 4.5rem; /* Ukuran heading utama lebih besar */
            }
    
            p.text-gray-700 {
                font-size: 1.5rem; /* Ukuran paragraf lebih besar */
            }
    
            /* Ukuran avatar tim yang lebih besar */
            .lg\\:w-3\\/12 {
                width: 20%;
            }
    
            .team img {
                width: 300px;
                height: 300px;
            }
    
            .text-xl {
                font-size: 2rem; /* Ukuran teks nama tim lebih besar */
            }
    
            .mb-1 {
                margin-bottom: 1.5rem;
            }
        }
    
        /* Memperbesar teks di semua layar */
        h2.text-3xl {
            font-size: 2.5rem; /* Membuat ukuran teks judul besar */
        }
    
        h1.text-4xl {
            font-size: 3.5rem; /* Membuat ukuran heading utama lebih besar */
        }
    
        p.text-gray-700 {
            font-size: 1.25rem; /* Membuat paragraf lebih besar */
        }
    
        /* Menambah ukuran teks dalam card tim */
        .text-xl {
            font-size: 1.75rem;
        }
    
        .text-lg {
            font-size: 1.25rem; /* Memperbesar teks deskripsi */
        }
         /* Ukuran default gambar dan tulisan */
    .team img {
        width: 250px;
        height: 250px;
        object-fit: cover; /* Memastikan gambar memenuhi ukuran */
    }

    /* Membuat teks lebih besar secara default */
    h1.text-xl {
        font-size: 1.5rem;
    }

    /* Ukuran gambar dan teks lebih besar di layar lebih besar (min-width 1400px) */
    @media (min-width: 1400px) {
        /* Mengatur ukuran gambar menjadi lebih besar pada layar besar */
        .team img {
            width: 350px;
            height: 350px;
        }

        /* Memperbesar ukuran nama tim */
        h1.text-xl {
            font-size: 2rem; /* Ukuran teks nama lebih besar */
        }

        /* Menambah padding untuk card tim */
        .lg\\:px-4 {
            padding-left: 2rem;
            padding-right: 2rem;
        }

        /* Menambah jarak antar card */
        .mb-6 {
            margin-bottom: 2rem;
        }
    }
    
    </style>
    
</head>

<body>
    <div class="min-h-full">
        <x-navbar></x-navbar>
        <main>
            @foreach ($about as $abt)
                <div class="sm:flex items-center max-w-screen-2xl mt-20 mb-10 lg:mb-0">
                    <div class="flex justify-center sm:w-4/5 px-11">
                        <div class="flex image object-center justify-center text-center">
                            <img class="rounded-3xl" src="{{ asset('storage/image/about/'.$abt->image_path) }}">
                        </div>
                    </div>
                    <div class="sm:w-3/4 p-12">
                        <div class="text">
                            <span class="text-gray-500 border-b-2 border-lime-600 uppercase">About us</span>
                            <h2 class="my-4 font-bold text-3xl  sm:text-4xl ">About <span class="text-lime-600">Our
                                    Company</span>
                            </h2>
                            <p class="text-gray-700 text-justify">
                                {{ $abt->description1 }}
                            </p>
                            <p class="text-gray-700 text-justify">
                                <br><br>
                                {{ $abt->description2}}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach



            <link rel="stylesheet" href="https://cdn.materialdesignicons.com/6.5.95/css/materialdesignicons.min.css">
            <!-- Team Section -->
            <div class="flex items-center justify-center min-h-screen bg-white ">
                <div class="flex flex-col">
                    <div class="flex flex-col mt-8">
                        <!-- Meet the Team -->
                        <div class="container max-w-7xl px-4">
                            <!-- Section Header -->
                            <div class="flex flex-wrap justify-center text-center mb-24">
                                <div class="w-full lg:w-6/12 px-4">
                                    <!-- Header -->
                                    <h1 class="text-gray-900 text-4xl font-bold mb-8">
                                        Meet the Team
                                    </h1>

                                    <!-- Description -->
                                    <p class="text-gray-700 text-lg font-light">
                                        With over 100 years of combined experience, we've got a well-seasoned team at
                                        the helm.
                                    </p>
                                </div>
                            </div>


                            <!-- Team Members -->
                            <div class="flex flex-wrap">
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 p-6">
                                    @foreach ($team as $team)
                                        <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                                            <!-- Avatar -->
                                            <div class="h-64 w-full">
                                                <img class="w-full h-full object-cover"
                                                     src="{{ asset('storage/image/about/'.$team->image_path) }}" alt="{{$team->team_name}}">
                                            </div>
                                
                                            <!-- Details -->
                                            <div class="p-6 text-center">
                                                <!-- Name -->
                                                <h1 class="text-gray-900 text-xl font-bold mb-2">
                                                    {{$team->team_name}}
                                                </h1>
                                                <!-- Optional: Add more information here like position or social media links -->
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <x-footer></x-footer>
</body>

</html>
