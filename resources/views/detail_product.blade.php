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
            @if($detailProducts->video)
            <video autoplay muted>
                <source src="{{ asset('storage/video/'.$detailProducts->video) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        @else
        <h2 class="text-xl text-red-700 tracking-tight text-primary-800">We're Sorry, No Video Available Right Now</h2>
        @endif
        </div>

        <div class="max-w-screen-xl mx-auto px-4 lg:py-10 lg:px-6 mt-20"> <!-- Further reduced top and bottom padding -->
            <hr>
            <div class="text-center mb-20 mt-20"> <!-- Further reduced margin below heading -->
                <h2 class="text-4xl tracking-tight font-bold text-primary-800">Highlighted Features of {{ $detailProducts->title }}</h2>
            </div>

            <div class="container mx-auto px-4 lg:px-8">

                <!-- First Section: 4 Description Points and 1 Picture -->
                <div class="flex flex-col md:flex-row mt-8 lg:mt-12">
                    <!-- Picture -->
                    <div class="mb-6 md:mb-0 md:mr-4 lg:w-[32rem]">
                        <img class="w-full h-full rounded-xl" src="{{ asset('storage/image/product/'.$detailProducts->image1) }}" alt="can_help_banner">
                    </div>
                    
                    <!-- Descriptions -->
                    <div class="flex-1 flex flex-col sm:flex-row flex-wrap lg:ml-4">
                        @foreach ($detailProducts->descriptionPoints->take(4) as $det)
                            <div class="w-full sm:w-1/2 mb-4 px-2 lg:px-4">
                                <div class="h-full py-3 px-4 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                                    <h3 class="text-lg lg:text-xl font-bold mb-3">{{ $det->title }}:</h3>
                                    <p class="text-sm lg:text-lg">{{ $det->desc }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
            
                <!-- Second Section: Remaining Description Points and 1 Picture -->
                <div class="flex flex-col md:flex-row mt-16 lg:mt-20">
                    <!-- Descriptions -->
                    <div class="flex-1 flex flex-col sm:flex-row flex-wrap lg:mr-4">
                        @foreach ($detailProducts->descriptionPoints->skip(4) as $det)
                            <div class="w-full sm:w-1/2 mb-4 px-2 lg:px-4">
                                <div class="h-full py-3 px-4 border border-green-500 border-t-0 border-r-0 rounded-bl-xl">
                                    <h3 class="text-lg lg:text-xl font-bold mb-3">{{ $det->title }}:</h3>
                                    <p class="text-sm lg:text-lg">{{ $det->desc }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                
                    <!-- Picture -->
                    <div class="mt-6 md:mt-0 lg:ml-4 lg:w-[32rem]">
                        <img class="w-full h-full rounded-xl" src="{{ asset('storage/image/product/'.$detailProducts->image2) }}" alt="can_help_banner">
                    </div>
                </div>
                
            
            </div>
            
            
            <hr class="mt-24">
        </div>

        <section class="bg-white">
            <div class="w-full mx-auto max-w-4xl flex flex-col justify-center relative p-4 sm:p-6">
                <div class="prose text-gray-500 prose-sm prose-headings:font-normal prose-headings:text-lg sm:prose-headings:text-xl"> <!-- Ukuran heading lebih kecil pada mobile -->
                    <div>
                        <h1 class="text-base sm:text-lg">Image gallery of {{ $detailProducts['title'] }}</h1> <!-- Ukuran teks heading lebih kecil -->
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
                    <div class="grid grid-cols-3 sm:grid-cols-3 gap-2 sm:gap-5">
                        @foreach($detailProducts->productgallery as $image)
                            <div x-on:click="currentImage = '{{ asset('storage/image/product/' . $image->image) }}'" class="cursor-pointer">
                                <img src="{{ asset('storage/image/product/' . $image->image) }}" alt="Image {{ $loop->index + 1 }}"
                                     class="w-full h-auto aspect-[1] object-cover">
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
