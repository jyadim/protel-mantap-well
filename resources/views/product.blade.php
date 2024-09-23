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

    <section class="container mx-auto p-5 md:py-12 px-0 md:p-8 md:px-0 mt-10 md:mt-16">
    <!-- Title Section -->
    <div class="w-full mb-6 lg:mb-0 text-center">
        <h1 class="text-3xl sm:text-4xl md:text-5xl xl:text-6xl font-medium title-font mb-2 text-gray-900">
            Product Gallery
        </h1>
        <div class="h-1 w-24 md:w-64 bg-lime-500 rounded mx-auto"></div>
    </div>

    <!-- Product Grid -->
    <section class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-6 md:gap-8 xl:gap-10 items-start mt-8">
        @foreach ($product as $product)
        <section
            class="p-4 md:p-6 xl:p-8 py-8 bg-blue-50 text-center transform duration-500 hover:-translate-y-2 cursor-pointer w-full md:w-auto flex flex-col justify-between">
            <!-- Product Image -->
            <img class="mx-auto w-full md:w-80 xl:w-96 object-cover h-48 md:h-64" src="{{ asset('storage/image/product/'.$product->image_path) }}" alt="{{ $product->title }}">

            <!-- Product Title -->
            <h1 class="text-2xl md:text-2xl lg:text-3xl font-semibold my-4">{{ $product->title }}</h1>

            <!-- Product Description -->
            <p class="mb-4 text-gray-700 text-base md:text-lg xl:text-xl h-30 overflow-hidden">{{ $product->desc }}</p>

            <!-- Product Link -->
            <a class="p-2 px-4 md:px-6 bg-blue-500 text-white rounded-md hover:bg-blue-600 xl:text-lg mt-auto" href="/product/{{ $product->slug }}">Detail</a>
        </section>
        @endforeach
    </section>
</section>



        <x-footer></x-footer>
</body>

</html>
