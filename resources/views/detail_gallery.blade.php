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
        <section class="bg-center bg-no-repeat bg-none bg-white-700 bg-blend-multiply mt-24">
            <div class="px-4 mx-auto max-w-screen-xl text-center py-8 lg:py-8">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-black md:text-5xl lg:text-6xl">
                    {{ $detail_gallery->title }}
                </h1>
            </div>
        </section>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-10 md:px-20">
            @if (isset($detail_gallery->pictures) && count($detail_gallery->pictures) > 0)
                @foreach ($detail_gallery->pictures as $pict)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="relative">
                            <img alt="{{ $pict->title }}" class="w-full h-48 object-cover" src="{{ asset('storage/image/references/'.$pict->image) }}">
                        </div>
                        <div class="p-4">
                            <div class="text-lg font-medium text-gray-800 mb-2">{{ $pict->title }}
                                <div class="text-sm">
                                    <a href="{{ $pict->maps }}" class="text-gray-500 font-semibold leading-none hover:text-indigo-600">{{ $pict->region }}</a>
                                </div>
                            </div>
                            <p class="text-gray-500 text-sm">{{ $pict->description }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        

        <x-navbar></x-navbar>
    </div>
</body>

</html>
