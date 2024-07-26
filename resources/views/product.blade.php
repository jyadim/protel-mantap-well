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

        <div class="bg-white py-16">
            <div class="container mx-auto px-4">
                <center>
                    <h2 class="text-3xl font-bold text-black mb-8">Introducing Our Product</h2>
                </center>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <div class="relative overflow-hidden">
                            <img class="object-cover w-full h-72 rounded-md" src="img/microhydro.jpg" alt="Product">                           
                        </div>
                        <h3 class="text-xl text-gray-900 mt-4">Crossflow Turbine</h3>
                        <div class="flex items-center justify-between mt-4">
                            <button
                                class="bg-lime-600 text-white py-2 px-4 rounded-xl font-bold hover:bg-lime-700">Detail
                                Product</button>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <div class="relative overflow-hidden">
                            <img class="object-cover w-full h-72 rounded-md"
                                src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" alt="Product">
                        </div>
                        <h3 class="text-xl text-gray-900 mt-4">Pelton Turbine</h3>
                        <div class="flex items-center justify-between mt-4">
                            <button
                                class="bg-lime-600 text-white py-2 px-4 rounded-xl font-bold hover:bg-lime-700">Detail
                                Product</button>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <div class="relative overflow-hidden">
                            <img class="object-cover w-full h-72 rounded-md"
                                src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" alt="Product">
                        </div>
                        <h3 class="text-xl text-gray-900 mt-4">Electronic Load Controller</h3>
                        <div class="flex items-center justify-between mt-4">
                            <button
                                class="bg-lime-600 text-white py-2 px-4 rounded-xl font-bold hover:bg-lime-700">Detail
                                Product</button>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <div class="relative overflow-hidden">
                            <img class="object-cover w-full h-72 rounded-md" src="img/microhydro.jpg" alt="Product">
                        </div>
                        <h3 class="text-xl text-gray-900 mt-4">Mechanical & Electrical</h3>
                        <div class="flex items-center justify-between mt-4">
                            <button
                                class="bg-lime-600 text-white py-2 px-4 rounded-xl font-bold hover:bg-lime-700">Detail
                                Product</button>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <div class="relative overflow-hidden">
                            <img class="object-cover w-full h-72 rounded-md"
                                src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" alt="Product">
                        </div>
                        <h3 class="text-xl text-gray-900 mt-4">Micro Hydro Trainer Simulator</h3>
                        <div class="flex items-center justify-between mt-4">
                            <button
                                class="bg-lime-600 text-white py-2 px-4 rounded-xl font-bold hover:bg-lime-700">Detail
                                Product</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <x-footer></x-footer>
</body>

</html>
