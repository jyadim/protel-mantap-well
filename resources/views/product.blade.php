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

        <section class="container mx-auto p-10 md:py-12 px-0 md:p-8 md:px-0 mt-16">
            <div class="w-full mb-6 lg:mb-0">
                <h1 class="sm:text-4xl text-5xl font-medium  title-font mb-2 text-gray-900">
                    Product Gallery</h1>
                <div class="h-1 w-64 bg-lime-500 rounded"></div>
            </div>
            <section
                class="p-5 md:p-0 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-10 items-start mt-10 ">
                @foreach ($product as $product)
                    <section
                        class="p-5 py-10 bg-blue-50 text-center transform duration-500 hover:-translate-y-2 cursor-pointer">
                        <img src="{{ $product->image_path }}" alt="">

                        <h1 class="text-3xl my-5">{{ $product->title }}</h1>
                        <p class="mb-5">{{ $product->desc }}
                        </p>
                        <a class="p-2 px-6 bg-blue-500 text-white rounded-md hover:bg-blue-600" href="/product/{{ $product->slug }}">Detail</a>
                    </section>
                @endforeach
            </section>
        </section>

        <x-footer></x-footer>
</body>

</html>
