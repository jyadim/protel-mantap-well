<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>pme-bandung</title>
</head>

<body>
    <div class="min-h-full">
        <x-navbar></x-navbar>
        <main>
            @foreach ($about as $abt)
                <div class="sm:flex items-center max-w-screen-2xl mt-32 mb-10">
                    <div class="flex justify-center sm:w-4/5 px-11">
                        <div class="flex image object-center justify-center text-center">
                            <img class="rounded-2xl" src="{{ $abt['image'] }}">
                        </div>
                    </div>
                    <div class="sm:w-3/4 p-12">
                        <div class="text">
                            <span class="text-gray-500 border-b-2 border-lime-600 uppercase">About us</span>
                            <h2 class="my-4 font-bold text-3xl  sm:text-4xl ">About <span class="text-lime-600">Our
                                    Company</span>
                            </h2>
                            <p class="text-gray-700 text-justify">
                                {{ $abt['detail1'] }}
                            </p>
                            <p class="text-gray-700 text-justify">
                                <br><br>
                                {{ $abt['detail2'] }}
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

                                @foreach ($team as $team)
                                    <div class="w-full md:w-6/12 lg:w-3/12 mb-6 px-6 sm:px-6 lg:px-4">
                                        <div class="flex flex-col">
                                            <!-- Avatar -->
                                            <a href="#" class="mx-auto">
                                                <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100"
                                                    src="{{ $team['image'] }}">
                                            </a>

                                            <!-- Details -->
                                            <div class="text-center mt-6">
                                                <!-- Name -->
                                                <h1 class="text-gray-900 text-xl font-bold mb-1">
                                                   {{$team['name']}}
                                                </h1>

                                                <!-- Title -->
                                                <div class="text-gray-700 font-light mb-2">
                                                    {{ $team['position'] }}
                                                </div>

                                                <!-- Social Icons -->

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <x-footer></x-footer>
</body>

</html>
