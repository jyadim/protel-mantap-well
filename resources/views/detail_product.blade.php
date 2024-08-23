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
    </style>
</head>

<body>
    <div class="min-h-full">
        <x-navbar></x-navbar>
        <div class="video-container">
            <video autoplay muted loop>
                <source src="{{ asset($detail_product['video']) }}" type="video/mp4">
            </video>
        </div>

        <div class="max-w-screen-xl mx-auto px-4 lg:py-10 lg:px-6 mt-20"> <!-- Further reduced top and bottom padding -->
            <hr>
            <div class="text-center mb-20 mt-20"> <!-- Further reduced margin below heading -->
                <h2 class="text-4xl tracking-tight font-bold text-primary-800">Highlighted Features of {{ $detail_product['title'] }}</h2>
            </div>

            <div class="flex flex-col md:flex-row">
                <!-- can help image -->
                <div class="mr-0 md:mr-4 lg:w-[28rem] lg:h-[20rem]"> <!-- Further reduced margin and size -->
                    <img class="w-full h-full" src="{{ asset($detail_product['image']) }}" alt="can_help_banner">
                </div>
                <!-- end can help image -->

                <div class="flex-1 flex flex-col sm:flex-row flex-wrap mt-3 mx-1">
                    <div class="w-full sm:w-1/2 mb-3 px-1">
                        <div class="h-full py-2 px-3 border border-green-500 border-t-0 border-l-0 rounded-br-xl"> <!-- Further reduced padding -->
                            <h3 class="text-xl font-bold text-md mb-3">Dynamic Personalization:</h3> <!-- Further reduced margin below heading -->
                            <p class="text-xs">Our platform leverages user data and behavior to provide a highly personalized experience, with dynamic content and product recommendations that change in real-time.</p>
                        </div>
                    </div>
                    <div class="w-full sm:w-1/2 mb-3 px-1">
                        <div class="h-full py-2 px-3 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                            <h3 class="text-xl font-bold text-md mb-3">Mobile-Optimized Interface</h3>
                            <p class="text-xs">Our website is designed with a mobile-first approach, offering a seamless browsing experience across all devices, including smartphones and tablets.</p>
                        </div>
                    </div>

                    <div class="w-full sm:w-1/2 mb-3 px-1">
                        <div class="h-full py-2 px-3 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                            <h3 class="text-xl font-bold text-md mb-3">24/7 Customer Support</h3>
                            <p class="text-xs">Our U.S.-based customer support team is available around the clock to answer any questions, resolve any issues, and provide helpful solutions. Whether it's through email, phone, or live chat, we're always here to support you.</p>
                        </div>
                    </div>

                    <div class="w-full sm:w-1/2 mb-3 px-1">
                        <div class="h-full py-2 px-3 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                            <h3 class="text-xl font-bold text-md mb-3">Secure Payment Processing</h3>
                            <p class="text-xs">We use cutting-edge security measures to protect our customers' sensitive information and ensure the safety of all transactions made on our site.</p>
                        </div>
                    </div>
                </div>

            </div>
            <hr class="mt-24">
        </div>

        <section class="bg-white">
            <div class="w-full mx-auto max-w-4xl flex flex-col justify-center relative p-4 sm:p-6">
                <div class="prose text-gray-500 prose-sm prose-headings:font-normal prose-headings:text-lg sm:prose-headings:text-xl"> <!-- Ukuran heading lebih kecil pada mobile -->
                    <div>
                        <h1 class="text-base sm:text-lg">Image gallery of {{ $detail_product['title'] }}</h1> <!-- Ukuran teks heading lebih kecil -->
                        <p class="text-xs sm:text-sm text-balance"> <!-- Ukuran teks paragraf lebih kecil -->
                            Click on the image to view it in full screen and click outside the
                            image or press ESC to close it (if using pc/laptop).
                        </p>
                    </div>
                </div>
                <div class="mt-4 border-t pt-4 sm:pt-6"> <!-- Mengurangi padding atas untuk mobile -->
                    <div x-data="{ currentImage: null }" x-init="() => {
                        window.addEventListener('keydown', (event) => {
                            if (event.key === 'Escape') {
                                currentImage = null;
                            }
                        });
                    }">
                        <div class="grid grid-cols-3 sm:grid-cols-3 gap-2 sm:gap-5"> <!-- Mengubah grid untuk mobile -->
                            <div x-on:click="currentImage = 'https://i.pinimg.com/564x/59/41/a0/5941a02c048f6226031a0487451c2651.jpg'"
                                class="cursor-pointer">
                                <img src="https://i.pinimg.com/564x/59/41/a0/5941a02c048f6226031a0487451c2651.jpg"
                                     alt="Image 1"
                                     class="w-full h-auto aspect-[1] object-cover">
                            </div>
                            <div x-on:click="currentImage = 'https://i.pinimg.com/736x/70/25/f6/7025f63ebdd1caa11b47889c4c4d8fcd.jpg'"
                                class="cursor-pointer">
                                <img src="https://i.pinimg.com/736x/70/25/f6/7025f63ebdd1caa11b47889c4c4d8fcd.jpg"
                                     alt="Image 2"
                                     class="w-full h-auto aspect-[1] object-cover">
                            </div>
                            <div x-on:click="currentImage = 'https://i.pinimg.com/564x/4e/a7/ff/4ea7ff230ad9f3bc1c30b1b6cbaccad3.jpg'"
                                class="cursor-pointer">
                                <img src="https://i.pinimg.com/564x/4e/a7/ff/4ea7ff230ad9f3bc1c30b1b6cbaccad3.jpg"
                                     alt="Image 3"
                                     class="w-full h-auto aspect-[1] object-cover">
                            </div>
                        </div>
                        <!-- Modal -->
                        <div x-show="currentImage"
                            class="fixed inset-0 flex items-center justify-center bg-gray-200 bg-opacity-80 transition-opacity duration-300"
                            role="dialog" aria-modal="true" aria-labelledby="modal-title" style="display: none;">
                            <div @click.away="currentImage = null" class="max-w-full max-h-full overflow-auto py-4 sm:py-8"
                                tabindex="-1" aria-labelledby="modal-title" aria-describedby="modal-description">
                                <img :src="currentImage" alt="Full Size Image"
                                    class="max-w-full max-h-full mx-auto mt-10">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
    <x-footer> </x-footer>
</body>

</html>
