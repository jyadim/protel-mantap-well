<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AdminProtel</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet" />

    <div class="min-h-screen">
        <!-- Header -->
        <header class="fixed bg-white text-blue-800 px-10 py-2 z-10 w-full border-b-2">
            <div class="flex items-center justify-between text-xl">
                <div class="font-bold text-blue-600">Admin<span class="text-lime-600">Protel</span></div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="pt-24 px-10 pb-4">
            <div class="flex">
                <x-sidebar :product="$product" :ref="$ref"></x-sidebar>

                <!-- Content Area -->
                <div class="w-full md:w-10/12">
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

                    <!-- Update Video Section -->
                    <div class="max-w-2xl mb-10">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900">Update Video</h2>
                    </div>

                    <div class="bg-white shadow-md rounded-lg p-6 mb-10">
                        <form action="{{ route('detailproduct.update', $detailProduct->slug) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700">Product
                                        Title</label>
                                    <input type="text" name="title" id="title"
                                        class="mt-1 block w-full border-gray-300 rounded-lg" required
                                        value="{{ $detailProduct->title }}">
                                </div>


                            </div>

                            <!-- Video Preview -->
                            <div class="mt-6">
                                <label class="block text-sm font-medium text-gray-700">Video Preview</label>
                                <div class="mt-2">
                                    <video id="videoPreview" controls
                                        class="w-full h-auto border border-gray-300 rounded-lg">
                                        <source id="videoSource"
                                            src="{{ asset('storage/video/' . $detailProduct->video) }}"
                                            type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>

                            <!-- Video Upload Section -->
                            <div class="mt-6">
                                <label for="videoUpload" class="block text-sm font-medium text-gray-700">Upload
                                    Video</label>
                                <input type="file" name="video_upload" id="videoUpload"
                                    class="mt-1 block w-full border-gray-300 rounded-lg" accept="video/mp4"
                                    onchange="updateVideoPreviewFromFile()">
                            </div>



                    </div>

                    <!-- Gallery Section -->

                    <!-- Existing Detail Products Section -->
                    <div class="max-w-2xl mb-10 mt-16">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900">Update Detail Product</h2>
                    </div>

                    <div class="space-y-10">
                        <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">

                            <div class="flex space-x-4">
                                <!-- Image 1 Upload Section -->
                                <div class="form-group flex-1">
                                    <input type="file" name="image1" class="hidden"
                                        id="image-upload-{{ $detailProduct->slug }}-1"
                                        onchange="previewImage(event, 'card-preview-{{ $detailProduct->slug }}-1')"
                                        accept=".png, .jpg, .jpeg" />
                                    <label for="image-upload-{{ $detailProduct->slug }}-1">
                                        <img src="{{ $detailProduct->image1 ? asset('storage/image/product/' . $detailProduct->image1) : 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><rect width="100%" height="100%" fill="#e0e0e0"/><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#b0b0b0" font-size="20">No Image</text></svg>') }}"
                                            alt="Product" class="h-80 w-full object-cover rounded-t-xl cursor-pointer"
                                            id="card-preview-{{ $detailProduct->slug }}-1" />
                                    </label>
                                </div>

                                <!-- Image 2 Upload Section -->
                                <div class="form-group flex-1">
                                    <input type="file" name="image2" class="hidden"
                                        id="image-upload-{{ $detailProduct->slug }}-2"
                                        onchange="previewImage(event, 'card-preview-{{ $detailProduct->slug }}-2')"
                                        accept=".png, .jpg, .jpeg" />
                                    <label for="image-upload-{{ $detailProduct->slug }}-2">
                                        <img src="{{ $detailProduct->image2 ? asset('storage/image/product/' . $detailProduct->image2) : 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><rect width="100%" height="100%" fill="#e0e0e0"/><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#b0b0b0" font-size="20">No Image</text></svg>') }}"
                                            alt="Product" class="h-80 w-full object-cover rounded-t-xl cursor-pointer"
                                            id="card-preview-{{ $detailProduct->slug }}-2" />
                                    </label>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                                @foreach ($detailProduct->descriptionPoints as $index => $det)
                                    <div class="form-group p-4 border border-gray-300 rounded-lg shadow-sm">
                                        <label for="description{{ $index }}"
                                            class="block text-lg font-semibold text-gray-800 mb-2">
                                            Description {{ $index + 1 }}
                                        </label>
                                        <textarea id="description{{ $index }}" name="descriptions[]" rows="6"
                                            class="form-input w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            placeholder="Enter description here">{{ $det->desc }}</textarea>
                                    </div>
                                @endforeach
                            </div>


                            <div class="mt-4">
                                <button type="submit"
                                    class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Update
                                    Product</button>
                            </div>

                            </form>

                            <section class="bg-white">
                                <div class="w-full mx-auto max-w-4xl flex flex-col justify-center relative p-4 sm:p-6">
                                    <div
                                        class="prose text-gray-500 prose-sm prose-headings:font-normal prose-headings:text-lg sm:prose-headings:text-xl">
                                        <div>
                                            <h1 class="text-base sm:text-lg">Manage Image Gallery of
                                                {{ $detailProduct->title }}</h1>
                                            <p class="text-xs sm:text-sm text-balance">Upload, update, or delete images.
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Image upload form -->
                                    <!-- Image upload form -->
                                    <form action="{{ route('productgallery.store', $detailProduct->id) }}"
                                        method="POST" enctype="multipart/form-data" class="mt-4 border-t pt-4 sm:pt-6">
                                        @csrf
                                        <div class="mb-4">
                                            <label for="imageUpload"
                                                class="block text-sm font-medium text-gray-700">Upload New
                                                Images</label>
                                            <input type="file" name="images[]" id="imageUpload" multiple
                                                class="mt-1 block w-full text-sm text-gray-500"
                                                accept=".png, .jpg, .jpeg">
                                            <button type="submit"
                                                class="mt-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                                Upload Images
                                            </button>
                                        </div>
                                    </form>

                                    <div id="imagePreviews"
                                        class="grid grid-cols-3 sm:grid-cols-3 gap-2 sm:gap-5 mt-4">
                                        <!-- Previews will be shown here -->
                                    </div>

                                    <!-- Preview Images Container -->
                                    <div id="imagePreviews"
                                        class="grid grid-cols-3 sm:grid-cols-3 gap-2 sm:gap-5 mt-4"></div>

                                    <!-- Existing Images Section -->
                                    <div class="grid grid-cols-3 sm:grid-cols-3 gap-2 sm:gap-5 mt-4">
                                        @foreach ($detailProduct->productgallery as $gallery)
                                            <div class="cursor-pointer">
                                                <img src="{{ asset('storage/image/product/' . $gallery->image) }}"
                                                    alt="Image {{ $loop->index + 1 }}"
                                                    class="w-full h-auto object-cover">

                                                <!-- Update Image -->
                                                <!-- Update Image -->
                                                <form action="{{ route('productgallery.update', $gallery->id) }}"
                                                    method="POST" enctype="multipart/form-data" class="mt-2">
                                                    @csrf
                                                    @method('PUT')
                                                    <label for="image_update_{{ $gallery->id }}"
                                                        class="block text-sm font-medium text-gray-700">Update
                                                        Image</label>
                                                    <input type="file" name="image"
                                                        id="image_update_{{ $gallery->id }}"
                                                        class="mt-1 block w-full text-sm text-gray-500"
                                                        accept=".png, .jpg, .jpeg"
                                                        onchange="previewUpdateImage(event, '{{ $gallery->id }}')">
                                                    <div id="image-preview-update-{{ $gallery->id }}"
                                                        class="mt-2"></div>
                                                    <button type="submit"
                                                        class="mt-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                                                        Update Image
                                                    </button>
                                                </form>


                                                <!-- Delete Image -->
                                                <form action="{{ route('productgallery.destroy', $gallery->id) }}"
                                                    method="POST" class="mt-2">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700">
                                                        Delete Image
                                                    </button>
                                                </form>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>



                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function updateVideoPreview() {
            const videoLink = document.getElementById('video').value;
            const videoPreview = document.getElementById('videoPreview');
            const videoSource = document.getElementById('videoSource');

            if (videoLink) {
                videoSource.src = videoLink;
                videoPreview.load();
            } else {
                videoSource.src = '';
            }
        }

        function updateVideoPreviewFromFile() {
            const videoUpload = document.getElementById('videoUpload');
            const videoPreview = document.getElementById('videoPreview');
            const videoSource = document.getElementById('videoSource');

            if (videoUpload.files && videoUpload.files[0]) {
                const file = videoUpload.files[0];
                const fileURL = URL.createObjectURL(file);

                videoSource.src = fileURL;
                videoPreview.load();
            }
        }

        function previewImage(event, previewId) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById(previewId);
                preview.src = reader.result;
            };
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        }
        // Handle multiple image previews for the file input
        document.getElementById('imageUpload').addEventListener('change', function(event) {
        const files = event.target.files;
        const previewsContainer = document.getElementById('imagePreviews');
        previewsContainer.innerHTML = ''; // Clear previous previews

        Array.from(files).forEach(file => {
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('w-full', 'h-auto', 'object-cover', 'aspect-[1]'); // Add classes for styling
                    previewsContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    });
        // Handle image preview for individual image updates
        function previewUpdateImage(event, id) {
            const previewContainer = document.getElementById('image-preview-update-' + id);
            previewContainer.innerHTML = ''; // Clear previous preview

            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'w-full h-auto aspect-[1] object-cover';
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        }
    </script>

</body>

</html>
