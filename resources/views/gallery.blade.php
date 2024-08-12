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
                <div class="container mx-auto flex px-5 py-24 flex-col md:flex-row items-center">
                    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                        <img class="object-cover object-center rounded" alt="{{ $reference['title'] }}" src="{{ $reference['image'] }}">
                    </div>
                    <div class="lg:flex-grow md:w-1/2 lg:pl-20 flex flex-col md:items-start md:text-left items-center text-justify">
                        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $reference['title'] }}</h1>
                        <p class="mb-8 leading-relaxed text-justify">{{ $reference['description'] }}</p>
                        <div class="flex justify-center">
                            <a href="/gallery/{{ $reference['slug'] }}" class="inline-flex text-white bg-lime-600 border-0 py-2 px-6 focus:outline-none hover:bg-lime-700 rounded text-lg">See more</a>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if (isset($reference['partners']) && count($reference['partners']) > 0)
        <section class="text-gray-700 body-font border-t border-gray-200">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-24">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-full mb-6 md:mb-0">
                        <img alt="feature" class="object-cover object-center h-full w-full" src="{{ $reference['image'] }}">
                    </div>
                    <div class="md:w-1/2 w-full lg:pl-16">
                        <div class="grid grid-cols-2 gap-4">
                            @foreach ($reference['partners'] as $partner)
                                <div class="flex flex-col items-center md:items-start">
                                    <div class="w-10 h-10 md:w-12 md:h-12 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4 md:mb-5">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 md:w-6 md:h-6" viewBox="0 0 24 24">
                                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                        </svg>
                                    </div>
                                    <div class="text-center md:text-left">
                                        <h2 class="text-gray-900 text-md md:text-lg title-font font-medium mb-2 md:mb-3">{{ $partner['title'] }}</h2>
                                        <a href="{{ $partner['link'] }}" class="text-blue-500 hover:underline text-sm md:text-base" target="_blank">{{ $partner['text'] }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-6 md:mt-7 flex justify-center md:justify-start">
                            <a href="/gallery/{{ $reference['slug'] }}" class="inline-flex text-white bg-lime-600 border-0 py-2 px-4 md:py-2 md:px-6 focus:outline-none hover:bg-lime-700 rounded text-sm md:text-lg">See more</a>
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
