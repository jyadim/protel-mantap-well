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

            <div class="mt-7 mb-10 sm:flex items-center max-w-screen-xl">
                <div class="flex justify-center sm:w-4/5 px-16">
                    <div class="flex image object-center justify-center text-center">
                        <img class="rounded-2xl"
                            src="https://www.pme-bandung.com/assets/upload/images/web%202023.jpg">
                    </div>
                </div>
                <div class="sm:w-3/4 p-5">
                    <div class="text">
                        <span class="text-gray-500 border-b-2 border-lime-600 uppercase">About us</span>
                        <h2 class="my-4 font-bold text-3xl  sm:text-4xl ">About <span class="text-lime-600">Our
                                Company</span>
                        </h2>
                        <p class="text-gray-700 text-justify">
                            CV. PROTEL MULTI ENERGY (PME) manufactures and supplies complete micro hydro power
                            equipment, specializing in Crossflow and Pelton turbines with capacities up to 500 kW per
                            unit. Our solutions, which include survey and design, site construction, equipment supply,
                            and installation, are installed worldwide, providing renewable power to remote areas,
                            schools, hospitals, and small businesses. We also offer products related to micro hydro
                            power, such as small hydro laboratories for teaching, spare parts, mechanical and electrical
                            components, and hydromechanical equipment. Notably, our Electronic Load Controller is used
                            in over 1,200 micro hydro schemes globally, with a total capacity of about 15 MW.

                            <br><br>
                            Founded in 2011 by Mr. Komarudin, an electrical engineer with over 18 years of experience in
                            renewable energy, PME is committed to sustainable, long-term cooperation in the micro hydro
                            power field. Our focus on quality, competitiveness, and extensive R&D, in collaboration with
                            leading technical and research institutes in Indonesia, has established us as a leading
                            manufacturer of small hydro power equipment in Southeast Asia. Our mission is to empower
                            rural communities with sustainable energy and technology through close, supportive
                            relationships.
                        </p>
                    </div>
                </div>
            </div>
            <link rel="stylesheet" href="https://cdn.materialdesignicons.com/6.5.95/css/materialdesignicons.min.css">
            <!-- Page Container -->
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
                                <!-- Member #1 -->
                                <div class="w-full md:w-6/12 lg:w-3/12 mb-6 px-6 sm:px-6 lg:px-4">
                                    <div class="flex flex-col">
                                        <!-- Avatar -->
                                        <a href="#" class="mx-auto">
                                            <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100"
                                                src="https://images.unsplash.com/photo-1634926878768-2a5b3c42f139?fit=clamp&w=400&h=400&q=80">
                                        </a>

                                        <!-- Details -->
                                        <div class="text-center mt-6">
                                            <!-- Name -->
                                            <h1 class="text-gray-900 text-xl font-bold mb-1">
                                                Tranter Jaskulski
                                            </h1>

                                            <!-- Title -->
                                            <div class="text-gray-700 font-light mb-2">
                                                Founder & Specialist
                                            </div>

                                            <!-- Social Icons -->
                                            <div
                                                class="flex items-center justify-center opacity-50 hover:opacity-100
                                transition-opacity duration-300">
                                                <!-- Linkedin -->
                                                <a href="#"
                                                    class="flex rounded-full hover:bg-indigo-50 h-10 w-10">
                                                    <i class="mdi mdi-linkedin text-indigo-500 mx-auto mt-2"></i>
                                                </a>

                                                <!-- Twitter -->
                                                <a href="#"
                                                    class="flex rounded-full hover:bg-blue-50 h-10 w-10">
                                                    <i class="mdi mdi-twitter text-blue-300 mx-auto mt-2"></i>
                                                </a>

                                                <!-- Instagram -->
                                                <a href="#"
                                                    class="flex rounded-full hover:bg-orange-50 h-10 w-10">
                                                    <i class="mdi mdi-instagram text-orange-400 mx-auto mt-2"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Member #2 -->
                                <div class="w-full md:w-6/12 lg:w-3/12 mb-6 px-6 sm:px-6 lg:px-4">
                                    <div class="flex flex-col">
                                        <!-- Avatar -->
                                        <a href="#" class="mx-auto">
                                            <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100"
                                                src="https://images.unsplash.com/photo-1634896941598-b6b500a502a7?fit=clamp&w=400&h=400&q=80">
                                        </a>

                                        <!-- Details -->
                                        <div class="text-center mt-6">
                                            <!-- Name -->
                                            <h1 class="text-gray-900 text-xl font-bold mb-1">
                                                Denice Jagna
                                            </h1>

                                            <!-- Title -->
                                            <div class="text-gray-700 font-light mb-2">
                                                Tired & M. Specialist
                                            </div>

                                            <!-- Social Icons -->
                                            <div
                                                class="flex items-center justify-center opacity-50 hover:opacity-100
                                transition-opacity duration-300">
                                                <!-- Linkedin -->
                                                <a href="#"
                                                    class="flex rounded-full hover:bg-indigo-50 h-10 w-10">
                                                    <i class="mdi mdi-linkedin text-indigo-700 mx-auto mt-2"></i>
                                                </a>

                                                <!-- Twitter -->
                                                <a href="#"
                                                    class="flex rounded-full hover:bg-blue-50 h-10 w-10">
                                                    <i class="mdi mdi-twitter text-blue-400 mx-auto mt-2"></i>
                                                </a>

                                                <!-- Instagram -->
                                                <a href="#"
                                                    class="flex rounded-full hover:bg-orange-50 h-10 w-10">
                                                    <i class="mdi mdi-instagram text-orange-400 mx-auto mt-2"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Member #3 -->
                                <div class="w-full md:w-6/12 lg:w-3/12 mb-6 px-6 sm:px-6 lg:px-4">
                                    <div class="flex flex-col">
                                        <!-- Avatar -->
                                        <a href="#" class="mx-auto">
                                            <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100"
                                                src="https://images.unsplash.com/photo-1634193295627-1cdddf751ebf?fit=clamp&w=400&h=400&q=80">
                                        </a>

                                        <!-- Details -->
                                        <div class="text-center mt-6">
                                            <!-- Name -->
                                            <h1 class="text-gray-900 text-xl font-bold mb-1">
                                                Kenji Milton
                                            </h1>

                                            <!-- Title -->
                                            <div class="text-gray-700 font-light mb-2">
                                                Team Memeber
                                            </div>

                                            <!-- Social Icons -->
                                            <div
                                                class="flex items-center justify-center opacity-50 hover:opacity-100
                                transition-opacity duration-300">
                                                <!-- Linkedin -->
                                                <a href="#"
                                                    class="flex rounded-full hover:bg-indigo-50 h-10 w-10">
                                                    <i class="mdi mdi-linkedin text-indigo-700 mx-auto mt-2"></i>
                                                </a>

                                                <!-- Twitter -->
                                                <a href="#"
                                                    class="flex rounded-full hover:bg-blue-50 h-10 w-10">
                                                    <i class="mdi mdi-twitter text-blue-400 mx-auto mt-2"></i>
                                                </a>

                                                <!-- Instagram -->
                                                <a href="#"
                                                    class="flex rounded-full hover:bg-orange-50 h-10 w-10">
                                                    <i class="mdi mdi-instagram text-orange-400 mx-auto mt-2"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Member #4 -->
                                <div class="w-full md:w-6/12 lg:w-3/12 mb-6 px-6 sm:px-6 lg:px-4">
                                    <div class="flex flex-col">
                                        <!-- Avatar -->
                                        <a href="#" class="mx-auto">
                                            <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100"
                                                src="https://images.unsplash.com/photo-1635003913011-95971abba560?fit=clamp&w=400&h=400&q=80">
                                        </a>

                                        <!-- Details -->
                                        <div class="text-center mt-6">
                                            <!-- Name -->
                                            <h1 class="text-gray-900 text-xl font-bold mb-1">
                                                Doesn't matter
                                            </h1>

                                            <!-- Title -->
                                            <div class="text-gray-700 font-light mb-2">
                                                Will be fired
                                            </div>

                                            <!-- Social Icons -->
                                            <div
                                                class="flex items-center justify-center opacity-50 hover:opacity-100
                                transition-opacity duration-300">
                                                <!-- Linkedin -->
                                                <a href="#"
                                                    class="flex rounded-full hover:bg-indigo-50 h-10 w-10">
                                                    <i class="mdi mdi-linkedin text-indigo-700 mx-auto mt-2"></i>
                                                </a>

                                                <!-- Twitter -->
                                                <a href="#"
                                                    class="flex rounded-full hover:bg-blue-50 h-10 w-10">
                                                    <i class="mdi mdi-twitter text-blue-400 mx-auto mt-2"></i>
                                                </a>

                                                <!-- Instagram -->
                                                <a href="#"
                                                    class="flex rounded-full hover:bg-orange-50 h-10 w-10">
                                                    <i class="mdi mdi-instagram text-orange-400 mx-auto mt-2"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
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
