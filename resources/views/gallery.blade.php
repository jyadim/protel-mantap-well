<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>pme-bandung</title>
</head>
<body>
    <x-navbar></x-navbar>

    @foreach ($references as $reference)
    @if ($reference['title'] || $reference['description'])
        <section class="text-gray-700 body-font border-t border-gray-200">
            <div class="container mx-auto px-6 lg:px-12 py-24 lg:py-32 flex flex-col md:flex-row items-center">
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-full mb-10 md:mb-0">
                    <img class="object-cover object-center rounded" alt="{{ $reference['title'] }}" src="{{ asset('storage/image/references/'.$reference['image']) }}">
                </div>
                <div class="lg:flex-grow md:w-1/2 lg:pl-20 flex flex-col md:items-start md:text-left items-center text-justify">
                    <h1 class="title-font sm:text-5xl md:text-4xl text-3xl mb-6 font-medium text-gray-900">{{ $reference['title'] }}</h1>
                    <p class="mb-10 leading-relaxed text-justify text-lg lg:text-xl">{{ $reference['description'] }}</p>
                    <div class="flex justify-center">
                        <a href="/gallery/{{ $reference['slug'] }}" class="inline-flex text-white bg-lime-600 border-0 py-3 px-8 focus:outline-none hover:bg-lime-700 rounded text-lg">See more</a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (isset($reference['partners']) && count($reference['partners']) > 0)
        <section class="text-gray-700 body-font border-t border-gray-200">
            <div class="container mx-auto px-6 lg:px-12 py-12 md:py-24">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-full mb-6 md:mb-0">
                        <img alt="feature" class="object-cover object-center h-full w-full" src="{{ asset('storage/image/references/'.$reference['image']) }}">
                    </div>
                    <div class="md:w-1/2 w-full lg:pl-16">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 lg:gap-8">
                            @foreach ($reference['partners'] as $partner)
                                <div class="flex flex-col items-center md:items-start">
                                    <div class="w-12 h-12 md:w-14 md:h-14 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4 md:mb-5">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                        </svg>
                                    </div>
                                    <div class="text-center md:text-left">
                                        <h2 class="text-gray-900 text-lg md:text-xl title-font font-medium mb-2 md:mb-3">{{ $partner['title'] }}</h2>
                                        <a href="{{ $partner['link'] }}" class="text-blue-500 hover:underline text-base md:text-lg" target="_blank">{{ $partner['text'] }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-8 flex justify-center md:justify-start">
                            <a href="/gallery/{{ $reference['slug'] }}" class="inline-flex text-white bg-lime-600 border-0 py-3 px-6 focus:outline-none hover:bg-lime-700 rounded text-lg">See more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endforeach


    <x-footer></x-footer>
</body>
</html>
