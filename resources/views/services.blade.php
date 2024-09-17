<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>pme-bandung</title>
    <style>
        .content {
            display: none;
        }

        .expandable {
            cursor: pointer;
        }

        .details {
            display: none;
            margin-top: 10px;
            border: 1px solid #ddd;
            padding: 20px;
            /* Increased padding for larger content area */
            background-color: #f9f9f9;
            /* Light background color for contrast */
            border-radius: 8px;
            /* Rounded corners for the details section */
            position: relative;

        }

        .card-container {
            position: relative;
            margin-bottom: 20px;
            /* Spacing between cards and their details */
        }

        .expandable:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Subtle shadow on hover */
        }
    </style>
</head>

<body>
    <div class="min-h-full">
        <x-navbar></x-navbar>
        <main>
            <section id="features" class="container mx-auto px-4 space-y-6 py-10 md:py-12 lg:py-20 mt-10">
                <div class="mx-auto flex max-w-[70rem] xl:max-w-[80rem] 2xl:max-w-[90rem] flex-col items-center space-y-4 text-center">
                    <h2 class="font-bold text-3xl leading-[1.1] sm:text-3xl md:text-6xl xl:text-5xl 2xl:text-6xl">Services</h2>
                    <p class="max-w-[85%] leading-normal text-muted-foreground sm:text-lg sm:leading-7 xl:text-lg 2xl:text-xl">
                        With our experiences, resources and extensive networks, we can support your project from early stage to final operation. We provide the following services:
                    </p>
                </div>
            
                <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v1.9.5/dist/alpine.js"></script>
            
                <div class="mx-auto grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($services as $service)
                    <div class="card-container">
                        <div class="relative overflow-hidden rounded-lg border bg-white select-none hover:shadow hover:shadow-lime-200 p-4 expandable w-full"
                            data-target="service-{{ $service->id }}">
                            <div class="flex h-[350px] xl:h-[380px] 2xl:h-[400px] flex-col justify-between rounded-md p-6 xl:p-8 2xl:p-8">
                                <div class="space-y-4">
                                    <h3 class="font-bold text-lg xl:text-lg 2xl:text-2xl">{{ $service->title }}</h3>
                                    <p class="text-base xl:text-base 2xl:text-lg text-muted-foreground">{{ $service->desc }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Expanded Content -->
                        <div id="service-{{ $service->id }}" class="details" style="display: none;">
                            <div class="relative">
                                <div class="space-y-2 mb-5 text-sm xl:text-base 2xl:text-lg">
                                    <h3 class="font-bold">Some Photos of {{ $service->title }}</h3>
                                </div>
                                <div class="carousel max-w-xl xl:max-w-3xl 2xl:max-w-4xl flex">
                                    @if ($service->pictures->isNotEmpty())
                                    @foreach ($service->pictures as $picture)
                                    <div class="carousel-item">
                                        <img src="{{ asset('storage/image/service_image/' . $picture->image_path) }}" alt="Carousel Image {{ $loop->index + 1 }}" class="w-full h-[420px] xl:h-[450px] 2xl:h-[500px] object-cover">
                                    </div>
                                    @endforeach
                                    @else
                                    <p>No pictures available for this service.</p>
                                    @endif
                                </div>
                                <div class="absolute inset-y-0 left-0 flex items-center justify-start pl-4">
                                    <button class="carousel-control-prev bg-gray-800 hover:bg-gray-700 text-white rounded-full p-2 focus:outline-none">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="absolute inset-y-0 right-0 flex items-center justify-end pr-4">
                                    <button class="carousel-control-next bg-gray-800 hover:bg-gray-700 text-white rounded-full p-2 focus:outline-none">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle expandable content
            var expandables = document.querySelectorAll('.expandable');
            expandables.forEach(function(expandable) {
                expandable.addEventListener('click', function() {
                    var targetId = this.getAttribute('data-target');
                    var content = document.getElementById(targetId);
                    if (content.style.display === 'none' || content.style.display === '') {
                        content.style.display = 'block';
                    } else {
                        content.style.display = 'none';
                    }
                });
            });

            // Handle carousels
            const carousels = document.querySelectorAll('.carousel');
            carousels.forEach(carousel => {
                const prevButton = carousel.parentElement.querySelector('.carousel-control-prev');
                const nextButton = carousel.parentElement.querySelector('.carousel-control-next');

                prevButton.addEventListener('click', () => {
                    carousel.scrollBy({
                        left: -carousel.offsetWidth,
                        behavior: 'smooth'
                    });
                });

                nextButton.addEventListener('click', () => {
                    carousel.scrollBy({
                        left: carousel.offsetWidth,
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>


    </main>
    <x-footer></x-footer>
</body>

</html>
