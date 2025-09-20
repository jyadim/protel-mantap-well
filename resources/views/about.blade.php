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
                max-width: 700px;
                /* Ukuran maksimum gambar */
            }

            /* Membuat teks lebih besar */
            h2.text-3xl {
                font-size: 3.5rem;
                /* Ukuran teks judul lebih besar */
            }

            h1.text-4xl {
                font-size: 4.5rem;
                /* Ukuran heading utama lebih besar */
            }

            p.text-gray-700 {
                font-size: 1.5rem;
                /* Ukuran paragraf lebih besar */
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
                font-size: 2rem;
                /* Ukuran teks nama tim lebih besar */
            }

            .mb-1 {
                margin-bottom: 1.5rem;
            }
        }

        /* Memperbesar teks di semua layar */
        h2.text-3xl {
            font-size: 2.5rem;
            /* Membuat ukuran teks judul besar */
        }

        h1.text-4xl {
            font-size: 3.5rem;
            /* Membuat ukuran heading utama lebih besar */
        }

        p.text-gray-700 {
            font-size: 1.25rem;
            /* Membuat paragraf lebih besar */
        }

        /* Menambah ukuran teks dalam card tim */
        .text-xl {
            font-size: 1.75rem;
        }

        .text-lg {
            font-size: 1.25rem;
            /* Memperbesar teks deskripsi */
        }

        /* Ukuran default gambar dan tulisan */
        .team img {
            width: 250px;
            height: 250px;
            object-fit: cover;
            /* Memastikan gambar memenuhi ukuran */
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
                font-size: 2rem;
                /* Ukuran teks nama lebih besar */
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
                <div
                    class="sm:flex flex-col-reverse sm:flex-row items-center max-w-screen-2xl mt-16 mb-12 sm:mb-16 lg:mb-20">
                    <!-- Image Section -->
                    <div class="w-full sm:w-4/5 flex justify-center px-6 sm:px-11 mb-8 sm:mb-0">
                        <div class="flex image object-center justify-center text-center">
                            <img class="rounded-3xl w-full sm:w-auto"
                                src="{{ asset('storage/image/about/' . $abt->image_path) }}">
                        </div>
                    </div>

                    <!-- Text Section -->
                    <div class="w-full sm:w-3/4 p-8 sm:p-14">
                        @if (Session::has('success'))
                            <div class="bg-lime-700 text-white p-3 rounded mt-4 mb-2">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (Session::has('error'))
                            <div class="bg-red-500 text-white p-3 rounded mt-4 mb-2">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        <div class="text">
                            <!-- "About Us" Tag -->
                            <span
                                class="text-gray-500 border-b-2 border-lime-600 uppercase text-sm sm:text-base inline-block">About
                                us</span>
                            <!-- Header -->
                            <h2 class="my-4 font-bold text-2xl sm:text-3xl lg:text-4xl">
                                About <span class="text-lime-600">Our Company</span>
                            </h2>
                            <!-- Description Paragraph 1 -->
                            <p class="text-gray-700 text-justify text-xl leading-relaxed sm:text-lg">
                                {{ $abt->description1 }}
                            </p>
                            <!-- Description Paragraph 2 -->
                            <p class="text-gray-700 text-justify text-xl leading-relaxed sm:text-lg mt-6">
                                {{ $abt->description2 }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach



            <link rel="stylesheet" href="https://cdn.materialdesignicons.com/6.5.95/css/materialdesignicons.min.css">
            <!-- Team Section -->
            <div class="flex items-center justify-center  bg-white">
                <div class="flex flex-col w-full max-w-7xl">
                    <!-- Meet the Team -->
                    <div class="text-center mb-8">
                        <!-- Header -->
                        <h1 class="text-gray-900 text-3xl md:text-4xl font-bold mb-4 md:mb-8">
                            Meet the Team
                        </h1>

                        <!-- Description -->
                        <p class="text-gray-700 text-sm md:text-lg font-light">
                            With over 100 years of combined experience, we've got a well-seasoned team at
                            the helm.
                        </p>
                    </div>

                    <!-- Team Members -->
                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-8 p-4 md:p-6 justify-center">
                        @foreach ($team as $team)
                            <div
                                class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform transform hover:scale-105 mx-auto">
                                <!-- Avatar -->
                                <div class="h-48 md:h-64 w-full">
                                    <img class="w-full h-full object-cover"
                                        src="{{ asset('storage/image/about/' . $team->image_path) }}"
                                        alt="{{ $team->team_name }}">
                                </div>

                                <!-- Details -->
                                <div class="p-4 md:p-6 text-center">
                                    <!-- Name -->
                                    <h1 class="text-gray-900 text-lg md:text-xl font-bold mb-1 md:mb-2">
                                        {{ $team->team_name }}
                                    </h1>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

    </div>
    <div class="fixed bottom-4 right-4">
        @foreach ($about as $item)
            <form action="{{ route('about.pdf.download', $item->id) }}" method="GET"
                onclick="showNotification()>
                    <input type="hidden" name="id"
                value="{{ $item->id }}">
                <button type="submit"
                    class="fixed bottom-4 right-4 max-w-[140px] py-2 px-4 flex justify-center items-center bg-lime-600 hover:bg-lime-700 focus:ring-lime-500 focus:ring-offset-lime-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                    <svg width="20" height="20" fill="currentColor" class="mr-2" viewBox="0 0 1792 1792"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1344 1472q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm256 0q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm128-224v320q0 40-28 68t-68 28h-1472q-40 0-68-28t-28-68v-320q0-40 28-68t68-28h427q21 56 70.5 92t110.5 36h256q61 0 110.5-36t70.5-92h427q40 0 68 28t28 68zm-325-648q-17 40-59 40h-256v448q0 26-19 45t-45 19h-256q-26 0-45-19t-19-45v-448h-256q-42 0-59-40-17-39 14-69l448-448q18-19 45-19t45 19l448 448q31 30 14 69z">
                        </path>
                    </svg>
                    Download Brochure
                </button>
            </form>
        @endforeach

    </div>
    <script>
        function showNotification() {
            // Notification logic
            alert('Your download will start soon.');
        }
    </script>

    </main>
    <x-footer></x-footer>
</body>

</html>
