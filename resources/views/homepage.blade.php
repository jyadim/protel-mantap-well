<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>pme-bandung</title>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
</head>

<body>
    <div class="min-h-full">
        <x-navbar></x-navbar>
        <main>
            @foreach($banner as $head)
            <section class="relative bg-cover bg-center bg-no-repeat bg-gray-500 bg-blend-multiply h-[100vh] mt-16" style="background-image: url('{{ asset($head['image']) }}');">
                <div class="flex flex-col justify-center items-center h-full text-center px-4 mx-auto max-w-screen-xl py-24 lg:py-56">
                    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                        {{$head['title']}}
                    </h1>
                    <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">
                        {{$head['subtitle']}}
                    </p>
                    <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                        <a href="/services"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-lime-700 hover:bg-lime-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                            Get started
                            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                        <a href="/about"
                            class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                            Learn more
                        </a>
                    </div>
                </div>
            </section>
            @endforeach
            
            

            <!-- Grid Section -->
            <div class="mx-auto max-w-2xl text-center mb-5 p-10">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 ">Introducing Our Product's</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">check our signature product's</p>
            </div>

            <section class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center gap-y-10 gap-x-10 mt-10">
                @foreach ($prodhome as $prod)
                  <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl items-center">
                    <a href="/product/{{ $prod['slug'] }}">
                      <img src="{{ $prod['image'] }}" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
                      <div class="px-4 py-3 w-72">
                        <span class="text-gray-400 mr-3 uppercase text-xs">{{ $prod['title'] }}</span>
                        <p class="text-lg font-bold text-black truncate block capitalize">{{ $prod['name'] }}</p>
                        <div class="flex items-center">
                          <p class="text-base font-semibold text-black">Detail</p>
                        </div>
                      </div>
                    </a>
                  </div>
                @endforeach
              </section>
              
              
         
              
            
            <!-- Quick Access Section -->
            <section>
                <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl mt-20">
                    <div class="grid w-full grid-cols-1 gap-6 mx-auto lg:grid-cols-3">
                        @foreach ($quickaccess as $qa)
                        <div class="p-6">
                            <img class="object-cover object-center w-full mb-8 lg:h-48 md:h-36 rounded-xl" src=" {{ $qa['image'] }} " alt="blog">
                            <h1 class="mx-auto mb-8 text-2xl font-semibold leading-none tracking-tighter text-neutral-600 lg:text-3xl hover:underline">{{ $qa['title'] }}</h1>
                            <p class="mx-auto text-base leading-relaxed text-gray-500">{{ Str::limit($qa['detail'], '100') }}</p>
                            <div class="mt-4">
                                <a href="#" class="inline-flex items-center mt-4 font-semibold text-lime-600 lg:mb-0 hover:text-lime-700 hover:underline" title="read more"> Read More » </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- News Section -->
            <div class="bg-white">
                <section class="text-gray-600 body-font">
                    <div class="container py-24 mx-auto max-w-7x1">
                        <div class="flex flex-wrap w-full mb-4 p-4">
                            <div class="w-full mb-6 lg:mb-0">
                                <h1 class="sm:text-4xl text-5xl font-medium title-font mb-2 text-gray-900">News</h1>
                                <div class="h-1 w-20 bg-lime-500 rounded"></div>
                            </div>
                            <div class="w-full">
                                <div class="mx-auto max-w-7xl px-6 lg:px-8 pt-8">
                                    <div class="mx-auto mt-8 grid max-w-2xl auto-rows-fr grid-cols-1 gap-8 sm:mt-12 lg:mx-0 lg:max-w-none lg:grid-cols-3 ">
                                        @foreach ($news as $yt)
                                        <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 py-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
                                            <iframe src="{{ $yt['link'] }}" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover"></iframe>
                                            <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                                            <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                                            <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm leading-6 text-gray-300">
                                                <time datetime="{{ $yt['date'] }}" class="mr-8">{{ $yt['date'] }}</time>
                                                <div class="-ml-4 flex items-center gap-x-4">
                                                    <svg viewBox="0 0 2 2" class="-ml-0.5 h-0.5 w-0.5 flex-none fill-white/50">
                                                        <circle cx="1" cy="1" r="1"></circle>
                                                    </svg>
                                                    <div class="flex gap-x-2.5">
                                                        <p>{{ $yt['author'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class="mt-3 text-lg font-semibold leading-6 text-white">
                                                <a href="{{ $yt['link'] }}"><span class="absolute inset-0"></span>{{ $yt['title'] }}</a>
                                            </h3>
                                        </article>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
        <x-footer></x-footer>
    </div>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            },
        });
    </script>
</body>

</html>
