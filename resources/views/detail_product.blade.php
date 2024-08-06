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
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            height: 80vh !important;
            /* Adjust as needed */
            width: 100% !important;
            /* Adjust as needed */
            margin-top: 90px !important;
            /* Default value for larger screens */
            background-repeat: no-repeat !important;
            background-blend-mode: multiply !important;
            border-radius: 30px !important;
            /* Border radius */
            overflow: hidden;
            /* To ensure the video respects the border radius */
        }

        @media (max-width: 768px) {
            .video-container {
                height: 20vh !important;
                /* Adjust as needed */
                width: 100% !important;
                /* Adjust as needed */


            }
        }


        .video-container video {
            max-width: 100% !important;
            max-height: 100% !important;
            border-radius: 30px !important;
            /* Optional: apply the same border radius to the video */
        }
    </style>
</head>

<body>
    <div class="min-h-full">
        <x-navbar></x-navbar>
        <div class="video-container ">
            <video autoplay muted loop>
                <source src="{{ asset($detail_product['video']) }}" type="video/mp4">
            </video>
        </div>

        <div class="max-w-screen-xl mx-auto py-8 px-4 lg:py-40 lg:px-6">
            <div class="text-center mb-10">
                <h2 class="text-4xl tracking-tight font-bold text-primary-800">Highlighted Features</h2>
            </div>

            <div class="flex flex-col md:flex-row">
                <!-- can help image -->
                <div class="mr-0 md:mr-8 mb-6 md:mb-0 lg:w-[32rem] lg:h-[25rem] mt-5">
                    <img class="w-full h-full" src="{{ asset($detail_product['image']) }}" alt="can_help_banner">
                </div>
                <!-- end can help image -->

                <div class="flex-1 flex flex-col sm:flex-row flex-wrap mb-4 -mx-2">
                    <div class="w-full sm:w-1/2 mb-4 px-2 ">
                        <div class="h-full py-4 px-6 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                            <h3 class="text-2xl font-bold text-md mb-6">Dynamic Personalization:</h3>
                            <p class="text-sm">Our platform leverages user data and behavior to provide a highly
                                personalized experience, with dynamic content and product recommendations that change in
                                real-time.</p>
                        </div>
                    </div>
                    <div class="w-full sm:w-1/2 mb-4 px-2 ">
                        <div class="h-full py-4 px-6 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                            <h3 class="text-2xl font-bold text-md mb-6">Mobile-Optimized Interface</h3>
                            <p class="text-sm"> Our website is designed with a mobile-first approach, offering a
                                seamless browsing experience across all devices, including smartphones and tablets.</p>
                        </div>
                    </div>

                    <div class="w-full sm:w-1/2 mb-4 px-2 ">
                        <div class="h-full py-4 px-6 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                            <h3 class="text-2xl font-bold text-md mb-6">24/7 Customer Support</h3>
                            <p class="text-sm">Our U.S.-based customer support team is available around the clock to
                                answer any questions, resolve any issues, and provide helpful solutions. Whether it's
                                through email, phone, or live chat, we're always here to support you.</p>
                        </div>
                    </div>

                    <div class="w-full sm:w-1/2 mb-4 px-2 ">
                        <div class="h-full py-4 px-6 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                            <h3 class="text-2xl font-bold text-md mb-6">Secure Payment Processing</h3>
                            <p class="text-sm">We use cutting-edge security measures to protect our customers' sensitive
                                information and ensure the safety of all transactions made on our site.</p>
                        </div>
                    </div>
                </div>

            </div>
            <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

            <section class="bg-white">
                <div class="w-full mx-auto max-w-4xl flex flex-col lg:h-svh justify-center relative p-8">
                    <div class="prose text-gray-500 prose-sm prose-headings:font-normal prose-headings:text-xl">
                        <div>
                            <h1>Image gallery</h1>
                            <p class="text-balance">
                                Click on the image to view it in full screen and click outside the
                                image or press ESC to close it.
                            </p>
                        </div>
                    </div>
                    <div class="mt-6 border-t pt-12">
                        <!-- Starts component -->
                        <div x-data="{ currentImage: null }" x-init="() => {
                            window.addEventListener('keydown', (event) => {
                                if (event.key === 'Escape') {
                                    currentImage = null;
                                }
                            });
                        }">
                            <div class="grid grid-cols-3 gap-4">
                                <div x-on:click="currentImage = 'https://i.pinimg.com/564x/59/41/a0/5941a02c048f6226031a0487451c2651.jpg'"
                                    class="cursor-pointer"> <img
                                        src="https://i.pinimg.com/564x/59/41/a0/5941a02c048f6226031a0487451c2651.jpg"
                                        alt="Image 1" class="w-full h-auto aspect-[3/4] object-cover"> </div>
                                <div x-on:click="currentImage = 'https://i.pinimg.com/736x/70/25/f6/7025f63ebdd1caa11b47889c4c4d8fcd.jpg'"
                                    class="cursor-pointer"> <img
                                        src="https://i.pinimg.com/736x/70/25/f6/7025f63ebdd1caa11b47889c4c4d8fcd.jpg"
                                        alt="Image 2" class="w-full h-auto aspect-[3/4] object-cover"> </div>
                                <div x-on:click="currentImage = 'https://i.pinimg.com/564x/4e/a7/ff/4ea7ff230ad9f3bc1c30b1b6cbaccad3.jpg'"
                                    class="cursor-pointer"> <img
                                        src="https://i.pinimg.com/564x/4e/a7/ff/4ea7ff230ad9f3bc1c30b1b6cbaccad3.jpg"
                                        alt="Image 3" class="w-full h-auto aspect-[3/4] object-cover"> </div>
                                <!-- Add more image placeholders as needed -->
                            </div> <!-- Modal -->
                            <div x-show="currentImage"
                                class="fixed inset-0 flex items-center justify-center bg-gray-200 bg-opacity-80 transition-opacity duration-300"
                                role="dialog" aria-modal="true" aria-labelledby="modal-title" style="display: none;">
                                <div @click.away="currentImage = null" class="max-w-full max-h-full overflow-auto py-12"
                                    tabindex="-1" aria-labelledby="modal-title" aria-describedby="modal-description">
                                   
                                    <img :src="currentImage" alt="Full Size Image"
                                        class="max-w-full max-h-full mx-auto mt-12">
                                </div>
                            </div>
                        </div> <!-- Ends component -->

                    </div>
                </div>
            </section>
        </div>

    </div>
    <x-footer> </x-footer>
</body>

</html>
