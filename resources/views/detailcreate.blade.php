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

                    <!-- Create Product Section -->
                    <div class="max-w-2xl mb-10">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900">Create New Product</h2>
                    </div>

                    <div class="bg-white shadow-md rounded-lg p-6 mb-10">
                        <form action="{{ route('detailproduct.store', $detailProduct->slug) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700">Product
                                        Title</label>
                                    <input type="text" name="title" id="title"
                                        class="mt-1 block w-full border-gray-300 rounded-lg" required
                                        placeholder="Enter product title" value="{{ $detailProduct->title }}">
                                </div>
                            </div>

                            <!-- Video Upload Section -->
                           

                            <!-- Image Upload Sections -->
                            <div class="max-w-2xl mb-10 mt-16">
                                <h2 class="text-3xl font-bold tracking-tight text-gray-900">Add Product Description </h2>
                                <h6>(for images and video can be updated after this, Please fill in all required fields before submitting. )</h6>
                            </div>

                            <div class="space-y-10">
                                <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
                                   
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                                        @php
                                            // Number of description points to display. Adjust as needed or set dynamically.
                                            $numDescriptionPoints = 8;
                                            $descriptionPoints = $detailProduct->descriptionPoints; // Adjust according to your relationship
                                            $numDescriptionPoints = max(count($descriptionPoints), 8); // Ensure at least 8 fields
                                        @endphp


                                        @for ($i = 0; $i < $numDescriptionPoints; $i++)
                                            @php
                                                // Retrieve existing values or set default empty values
                                                $title = isset($descriptionPoints[$i])
                                                    ? $descriptionPoints[$i]->title
                                                    : '';
                                                $description = isset($descriptionPoints[$i])
                                                    ? $descriptionPoints[$i]->desc
                                                    : '';
                                            @endphp
                                            <div class="form-group p-4 border border-gray-300 rounded-lg shadow-sm">
                                                <label for="title{{ $i }}"
                                                    class="block text-lg font-semibold text-gray-800 mb-2">
                                                    Description {{ $i + 1 }}
                                                </label>
                                                <textarea id="title{{ $i }}" name="titledesc[]" rows="1"
                                                    class="form-input w-full text-lg font-bold p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                    placeholder="Enter description title here">{{ old('titledesc.' . $i, $title) }}</textarea>
                                                <textarea id="description{{ $i }}" name="descriptions[]" rows="6"
                                                    class="form-input w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                    placeholder="Enter description here">{{ old('descriptions.' . $i, $description) }}</textarea>
                                            </div>
                                        @endfor

                                    </div>


                                </div>

                                <div class="mt-4">
                                    <button type="submit"
                                        class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Create
                                        Product</button>
                                </div>
                        </form>

                        <!-- Gallery Section -->

                    </div>
                </div>


            </div>
    </div>
    </main>
    </div>

    <script>
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
    </script>
</body>

</html>
