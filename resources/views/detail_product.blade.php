<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Products | PME Bandung</title>
    <style>
        .video-container {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 75vh;
            width: 100%;
            margin-top: 80px;
            background-repeat: no-repeat;
            background-blend-mode: multiply;
            border-radius: 30px;
            overflow: hidden;
        }

        @media (max-width: 768px) {
            .video-container {
                height: 18vh;
                width: 100%;
            }
        }

        .video-container video {
            max-width: 100%;
            max-height: 100%;
            border-radius: 30px;
        }

        @media (min-width: 768px) {
            .carousel-images {
                display: none;
                /* Hide the carousel on larger screens */
            }
        }
    </style>
</head>

<body>
    <div class="min-h-full">
        <x-navbar></x-navbar>

        <div class="video-container">

            @if ($detailProducts->video)
                <video autoplay muted>
                    <source src="{{ asset('storage/video/' . $detailProducts->video) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @else
                <h2 class="text-xl text-red-700 tracking-tight text-primary-800">We're Sorry, No Video Available Right
                    Now</h2>
            @endif

        </div>

        <div class="max-w-screen-xl mx-auto px-4 lg:py-10 lg:px-6 mt-20">
            <hr class="mb-8">
            @if (Session::has('success'))
                <div class="bg-lime-700 text-white p-3 rounded mt-4 mb-2">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="bg-red-500 text-white p-3 rounded mt-4 mb-2">
                    {{ Session::get('error') }}
                </div>
            @endif
            <div class="text-center mb-20">
                <h2 class="text-4xl tracking-tight font-bold text-primary-800">Highlighted Features of
                    {{ $detailProducts->title }}</h2>
            </div>

            <div class="container mx-auto px-4 lg:px-8" >

                <!-- First Section: 1 Picture and 4 Description Points -->
                <div class="flex flex-col mt-8 lg:mt-12">
                    <div id="carousel1" class="relative max-w-xl xl:max-w-3xl 2xl:max-w-4xl mx-auto block lg:hidden mb-10">
                        <div class="carousel-images-1">
                            <!-- Image 1 -->
                            <img id="carousel-image-1" class="carousel-item w-full h-auto object-cover rounded-lg shadow-md"
                                src="{{ asset('storage/image/product/' . $detailProducts->image1) }}" alt="Product Image 1">
                            <!-- Image 2 -->
                            <img id="carousel-image-2" class="carousel-item hidden w-full h-auto object-cover rounded-lg shadow-md"
                                src="{{ asset('storage/image/product/' . $detailProducts->image2) }}" alt="Product Image 2">
                        </div>
                    
                        <!-- Navigation Buttons -->
                        <div class="absolute inset-y-0 left-0 flex items-center">
                            <button id="prevBtn1" class="bg-gray-800 text-white p-2 rounded-l-lg hover:bg-gray-700" disabled>
                                &#10094; <!-- Left arrow -->
                            </button>
                        </div>
                        <div class="absolute inset-y-0 right-0 flex items-center">
                            <button id="nextBtn1" class="bg-gray-800 text-white p-2 rounded-r-lg hover:bg-gray-700">
                                &#10095; <!-- Right arrow -->
                            </button>
                        </div>
                    </div>
                    
                    <script>
                        let currentIndex1 = parseInt(localStorage.getItem('carouselIndex1')) || 0; // Unik untuk carousel pertama
                        const images1 = document.querySelectorAll('#carousel1 .carousel-item');
                        const totalImages1 = images1.length;
                    
                        function updateCarousel1() {
                            images1.forEach((img, index) => {
                                img.classList.toggle('hidden', index !== currentIndex1);
                            });
                    
                            document.getElementById('prevBtn1').disabled = currentIndex1 === 0;
                            document.getElementById('nextBtn1').disabled = currentIndex1 === totalImages1 - 1;
                    
                            localStorage.setItem('carouselIndex1', currentIndex1); // Unik untuk carousel pertama
                        }
                    
                        document.getElementById('nextBtn1').addEventListener('click', () => {
                            if (currentIndex1 < totalImages1 - 1) {
                                currentIndex1++;
                                updateCarousel1();
                            }
                        });
                    
                        document.getElementById('prevBtn1').addEventListener('click', () => {
                            if (currentIndex1 > 0) {
                                currentIndex1--;
                                updateCarousel1();
                            }
                        });
                    
                        updateCarousel1();
                    </script>
                    
                
                <div class="hidden mb-6 lg:w-1/2 lg:flex gap-4 justify-start"> <!-- Centered and Increased width -->
                    <img class="w-full h-auto object-cover rounded-lg shadow-md"
                        src="{{ asset('storage/image/product/' . $detailProducts->image1) }}" alt="Product Image">
                    <img class="w-full h-auto object-cover rounded-lg shadow-md"
                        src="{{ asset('storage/image/product/' . $detailProducts->image2) }}" alt="Product Image">
                </div>
                <!-- Picture Display for Laptop and Desktop -->





                <!-- Descriptions -->
                <div class="flex flex-col sm:flex-row flex-wrap lg:ml-4">
                    @foreach ($detailProducts->descriptionPoints->take(4) as $det)
                        <div class="w-full sm:w-1/2 mb-4 px-2 lg:px-4">
                            <div class="h-full py-3 px-4 border border-green-500 rounded-lg shadow-sm">
                                <h3 class="text-lg lg:text-xl font-bold mb-3">{{ $det->title }}:</h3>
                                <p class="text-sm lg:text-lg">{{ $det->desc }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <hr class="mt-24 mb-8">

            <!-- Second Section: 1 Picture and Remaining Description Points -->
            <div class="flex flex-col mt-16 lg:mt-20" >
                <!-- Picture -->
                <div id="carousel2" class="relative max-w-xl xl:max-w-3xl 2xl:max-w-4xl mx-auto block lg:hidden mb-10">
                    <div class="carousel-images-2">
                        <!-- Image 3 -->
                        <img id="carousel-image-3" class="carousel-item w-full h-auto object-cover rounded-lg shadow-md"
                            src="{{ asset('storage/image/product/' . $detailProducts->image3) }}" alt="Product Image">
                        <!-- Image 4 -->
                        <img id="carousel-image-4" class="carousel-item hidden w-full h-auto object-cover rounded-lg shadow-md"
                            src="{{ asset('storage/image/product/' . $detailProducts->image4) }}" alt="Product Image">
                    </div>
                
                    <!-- Navigation Buttons -->
                    <div class="absolute inset-y-0 left-0 flex items-center">
                        <button id="prevBtn2" class="bg-gray-800 text-white p-2 rounded-l-lg hover:bg-gray-700" disabled>
                            &#10094; <!-- Left arrow -->
                        </button>
                    </div>
                    <div class="absolute inset-y-0 right-0 flex items-center">
                        <button id="nextBtn2" class="bg-gray-800 text-white p-2 rounded-r-lg hover:bg-gray-700">
                            &#10095; <!-- Right arrow -->
                        </button>
                    </div>
                </div>
                
                <script>
                    let currentIndex2 = parseInt(localStorage.getItem('carouselIndex2')) || 0; // Unik untuk carousel kedua
                    const images2 = document.querySelectorAll('#carousel2 .carousel-item');
                    const totalImages2 = images2.length;
                
                    function updateCarousel2() {
                        images2.forEach((img, index) => {
                            img.classList.toggle('hidden', index !== currentIndex2);
                        });
                
                        document.getElementById('prevBtn2').disabled = currentIndex2 === 0;
                        document.getElementById('nextBtn2').disabled = currentIndex2 === totalImages2 - 1;
                
                        localStorage.setItem('carouselIndex2', currentIndex2); // Unik untuk carousel kedua
                    }
                
                    document.getElementById('nextBtn2').addEventListener('click', () => {
                        if (currentIndex2 < totalImages2 - 1) {
                            currentIndex2++;
                            updateCarousel2();
                        }
                    });
                
                    document.getElementById('prevBtn2').addEventListener('click', () => {
                        if (currentIndex2 > 0) {
                            currentIndex2--;
                            updateCarousel2();
                        }
                    });
                
                    updateCarousel2();
                </script>
                


                <div class="hidden mb-6 lg:w-1/2 lg:flex gap-4 justify-start"> <!-- Centered and Increased width -->
                    <img class="w-full h-auto object-cover rounded-lg shadow-md"
                        src="{{ asset('storage/image/product/' . $detailProducts->image3) }}" alt="Product Image">
                    <img class="w-full h-auto object-cover rounded-lg shadow-md"
                        src="{{ asset('storage/image/product/' . $detailProducts->image4) }}" alt="Product Image">
                </div>

                <!-- Descriptions -->
                <div class="flex flex-col sm:flex-row flex-wrap lg:ml-4">
                    @foreach ($detailProducts->descriptionPoints->skip(4) as $det)
                        <div class="w-full sm:w-1/2 mb-4 px-2 lg:px-4">
                            <div class="h-full py-3 px-4 border border-green-500 rounded-lg shadow-sm">
                                <h3 class="text-lg lg:text-xl font-bold mb-3">{{ $det->title }}:</h3>
                                <p class="text-sm lg:text-lg">{{ $det->desc }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <hr class="mt-24 mb-8">
    </div>

    <!-- Image Gallery -->
    <section class="bg-white py-10">
        <div class="w-full mx-auto max-w-4xl flex flex-col justify-center relative p-4 sm:p-6">
            <div
                class="prose text-gray-500 prose-sm prose-headings:font-normal prose-headings:text-lg sm:prose-headings:text-xl">
                <h1 class="text-base sm:text-lg">Image gallery of {{ $detailProducts['title'] }}</h1>
                <p class="text-xs sm:text-sm">Click on the image to view it in full screen and click outside the
                    image or press ESC to close it.</p>
            </div>
            <div class="mt-4 border-t pt-4 sm:pt-6">
                <div x-data="{ currentImage: null }" x-init="() => {
                    window.addEventListener('keydown', (event) => {
                        if (event.key === 'Escape') {
                            currentImage = null;
                        }
                    });
                }">
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4"> <!-- Changed grid-cols-3 to grid-cols-2 -->
                        @foreach ($detailProducts->productgallery as $image)
                            <div x-on:click="currentImage = '{{ asset('storage/image/product/' . $image->image) }}'"
                                class="cursor-pointer">
                                <img src="{{ asset('storage/image/product/' . $image->image) }}"
                                    alt="Image {{ $loop->index + 1 }}"
                                    class="w-full h-auto object-cover rounded-lg shadow-md">
                            </div>
                        @endforeach
                    </div>

                    <!-- Modal -->
                    <div x-show="currentImage"
                        class="fixed inset-0 flex items-center justify-center bg-gray-200 bg-opacity-80 transition-opacity duration-300"
                        role="dialog" aria-modal="true" aria-labelledby="modal-title" style="display: none;">
                        <div @click.away="currentImage = null" class="max-w-full max-h-full overflow-auto py-4 sm:py-8"
                            tabindex="-1" aria-labelledby="modal-title" aria-describedby="modal-description">
                            <img :src="currentImage" alt="Full Size Image"
                                class="max-w-full max-h-full mx-auto mt-10 rounded-lg shadow-md">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    <div class="fixed bottom-4 right-4">
        <form action="{{ route('pdf.download', $detailProducts->slug) }}" method="GET"
            onclick="showNotification()>
            <input type="hidden" name="product_id"
            value="{{ $detailProducts->id }}">
            <button type="submit"
                class="max-w-[140px] py-2 px-4 flex justify-center items-center bg-lime-600 hover:bg-lime-700 focus:ring-lime-500 focus:ring-offset-lime-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                <svg width="20" height="20" fill="currentColor" class="mr-2" viewBox="0 0 1792 1792"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1344 1472q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm256 0q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm128-224v320q0 40-28 68t-68 28h-1472q-40 0-68-28t-28-68v-320q0-40 28-68t68-28h427q21 56 70.5 92t110.5 36h256q61 0 110.5-36t70.5-92h427q40 0 68 28t28 68zm-325-648q-17 40-59 40h-256v448q0 26-19 45t-45 19h-256q-26 0-45-19t-19-45v-448h-256q-42 0-59-40-17-39 14-69l448-448q18-19 45-19t45 19l448 448q31 30 14 69z">
                    </path>
                </svg>
                Download Brochure
            </button>
        </form>

    </div>
    <script>
        function showNotification() {
            // Notification logic
            alert('Your download will start soon.');
        }
    </script>

    <x-footer> </x-footer>


</body>

</html>
