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
            <section
                class="bg-[center_30%] bg-no-repeat bg-[url('https://www.pme-bandung.com/assets/upload/images/web%202023_2.jpg')] bg-gray-700 bg-blend-multiply h-svh">
                <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
                    <h1
                        class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                        CV. Protel Multi Energy</h1>
                    <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Specialized in
                        Manufacturing of Electronic Load Controller, Cross flow and Pelton turbines</p>
                    <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                        <a href="#"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-lime-700 hover:bg-lime-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                            Get started
                            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                        <a href="#"
                            class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                            Learn more
                        </a>
                    </div>
                </div>
            </section>

            <div class="bg-white">
                <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Our Products</h2>

                    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                        <div class="group relative">
                            <div
                                class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                <img src="https://www.pme-bandung.com/assets/upload/images/MICRO%203.jpg"
                                    alt="Micro Hydro Unit"
                                    class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                            </div>
                            <div class="mt-4 flex justify-between">
                                <div>
                                    <h3 class="text-base text-gray-700">
                                        <a href="#">
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            Micro Hydro Unit
                                        </a>
                                    </h3>
                                </div>

                            </div>
                        </div>
                        <div class="group relative">
                            <div
                                class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                <img src="https://www.pme-bandung.com/assets/images/product/micro-hydro-turbine-crossflow-turbine-electronic-load-controller-load-control-micro-hydro-control-pelton-turbine.jpg"
                                    alt="Pelton Turbine"
                                    class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                            </div>
                            <div class="mt-4 flex justify-between">
                                <div>
                                    <h3 class="text-base text-gray-700">
                                        <a href="#">
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            Pelton Turbine
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="group relative">
                            <div
                                class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                <img src="https://www.pme-bandung.com/assets/upload/images/PICO%20TURBINE%20ONLY.jpg"
                                    alt="Pico Hydro Unit"
                                    class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                            </div>
                            <div class="mt-4 flex justify-between">
                                <div>
                                    <h3 class="text-base text-gray-700">
                                        <a href="#">
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            Pico Hydro Unit
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="group relative">
                            <div
                                class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                <img src="https://www.pme-bandung.com/assets/upload/images/panel%20elc.jpg"
                                    alt="Electronic Load Controller"
                                    class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                            </div>
                            <div class="mt-4 flex justify-between">
                                <div>
                                    <h3 class="text-base text-gray-700">
                                        <a href="#">
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            Electronic Load Controller
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- More products... -->
                    </div>
                </div>
            </div>

            <div class="container mx-auto p-4 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-4">
                <a href="/about" class="text-sm ">
                    <div class="relative rounded overflow-hidden shadow-lg hover:opacity-75">
                        <img src="https://www.pme-bandung.com/assets/upload/images/web%202023.jpg" alt="About Us"
                            class="w-full h-64 object-cover">
                        <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 text-white p-4 w-full">
                            <h3 class="text-xl font-bold">About Us</h3>
                            <p>detail</p>
                        </div>
                    </div>
                </a>
                <a href="#" class="text-sm ">
                    <div class="relative rounded overflow-hidden shadow-lg hover:opacity-75">
                        <img src="https://www.pme-bandung.com/assets/images/gallery/cover-micro-hydro-turbine-crossflow-turbine-electronic-load-controller-load-control-micro-hydro-control-indonesia-projects.jpg"
                            alt="Gallery" class="w-full h-64 object-cover">
                        <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 text-white p-4 w-full">
                            <h3 class="text-xl font-bold">Gallery</h3>
                            <p>detail</p>
                        </div>
                    </div>
                </a>
                <a href="#" class="text-sm ">
                    <div class="relative rounded overflow-hidden shadow-lg hover:opacity-75">
                        <img src="https://www.pme-bandung.com/assets/images/product/micro-hydro-turbine-crossflow-turbine-electronic-load-controller-load-control-micro-hydro-control-pico-hydro-unit.jpg"
                            alt="Products" class="w-full h-64 object-cover">
                        <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 text-white p-4 w-full">
                            <h3 class="text-xl font-bold">Products</h3>
                            <p>detail</p>
                        </div>
                    </div>
                </a>

                <a href="/services">
                    <div class="relative rounded overflow-hidden shadow-lg hover:opacity-75">
                        <img src="https://www.pme-bandung.com/assets/upload/images/training%201.jpg" alt="Services"
                            class="w-full h-64 object-cover">
                        <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 text-white p-4 w-full">
                            <h3 class="text-xl font-bold">Services</h3>
                            <p>detail</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="bg-white">
                <section class="text-gray-600 body-font">
                    <div class="container py-24 mx-auto max-w-7x1">
                        <div class="flex flex-wrap w-full mb-4 p-4">
                            <div class="w-full mb-6 lg:mb-0">
                                <h1 class="sm:text-4xl text-5xl font-medium font-bold title-font mb-2 text-gray-900">
                                    News</h1>
                                <div class="h-1 w-20 bg-lime-500 rounded"></div>
                            </div>
                        </div>
                        <div class="flex flex-wrap -m-4">
                            <div class="xl:w-2/4  md:w-1/2 p-4">
                                <div class="bg-white p-6 rounded-lg">
                                    <iframe
                                        class="lg:h-60 xl:h-96 md:h-64 sm:h-72 xs:h-72 h-72  rounded w-full object-cover object-center mb-6"
                                        src="https://www.youtube.com/embed/aqs4O1g0srU" frameborder="0"></iframe>
                                </div>
                            </div>
                            <div class="xl:w-2/4 md:w-1/2 p-4">
                                <div class="bg-white p-6 rounded-lg">
                                    <iframe
                                        class="lg:h-60 xl:h-96 md:h-64 sm:h-72 xs:h-72 h-72 rounded w-full object-cover object-center mb-6"
                                        src="https://www.youtube.com/embed/36LhTxd4n7s" frameborder="0"></iframe>
                                </div>
                            </div>
                </section>
        </main>
        <x-footer></x-footer>
</body>

</html>
