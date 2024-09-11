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
                    
                    <!-- Create Service Section -->
                    <div class="max-w-2xl mb-10">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900">Create Service Content Section</h2>
                    </div>

                    <div class="bg-white shadow-md rounded-lg p-6 mb-10">
                        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700">Service Title</label>
                                    <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-lg" required>
                                </div>
                                <div>
                                    <label for="desc" class="block text-sm font-medium text-gray-700">Service Description</label>
                                    <textarea name="desc" id="desc" class="mt-1 block w-full h-60 border-gray-300 rounded-lg" required></textarea>
                                </div>
                            </div>

                            <div class="mt-4">
                                <label for="pictures" class="block text-sm font-medium text-gray-700">Upload Pictures</label>
                                <input type="file" name="pictures[]" id="pictures" class="mt-1 block w-full border-gray-300 rounded-lg" multiple required onchange="previewImages(event)">
                                <div id="preview-container" class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4"></div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Create Service</button>
                            </div>
                        </form>
                    </div>

                    <!-- Update Service Section -->
                    <div class="max-w-2xl mb-10 mt-16">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900">Update Service Content Section</h2>
                    </div>
                    
                    <div class="space-y-10">
                        @foreach ($services as $service)
                            <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
                                <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="title_{{ $service->id }}" class="block text-sm font-medium text-gray-700">Service Title</label>
                                            <input type="text" name="title" id="title_{{ $service->id }}" class="mt-1 block w-full border-gray-300 rounded-lg" value="{{ $service->title }}" required>
                                        </div>
                                        <div>
                                            <label for="desc_{{ $service->id }}" class="block text-sm font-medium text-gray-700">Service Description</label>
                                            <textarea name="desc" id="desc_{{ $service->id }}" class="mt-1 block w-full h-60 border-gray-300 rounded-lg" required>{{ $service->desc }}</textarea>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Update Service</button>
                                </form>
                                
                                <!-- Display Pictures -->
                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-gray-700">Uploaded Pictures</label>
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-2">
                                        @if ($service->pictures->isNotEmpty())
                                            @foreach ($service->pictures as $picture)
                                                <div class="border p-2 rounded-lg flex flex-col items-center justify-center">
                                                    <form action="{{ route('picture.update', $picture->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="file" name="image_path" class="hidden" 
                                                            id="image-upload-{{ $picture->id }}" 
                                                            onchange="previewCardPhoto(event, 'card-preview-{{ $picture->id }}')" 
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="image-upload-{{ $picture->id }}">
                                                            <img src="{{ asset('storage/image/service_image/'.$picture->image_path) }}" alt="Picture" 
                                                                class="w-full h-48 object-cover rounded-lg cursor-pointer" 
                                                                id="card-preview-{{ $picture->id }}" />
                                                        </label>
                                                        <p class="text-center text-sm mt-2">Image {{ $loop->index + 1 }}</p>
                                                        <button type="submit" class="px-2 py-1 mt-2 bg-lime-600 text-white rounded text-xs">Update</button>
                                                    </form>
                                                    <form action="{{ route('picture.destroy', $picture->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="px-2 py-1 mt-2 bg-red-600 text-white rounded text-xs">Delete</button>
                                                    </form>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No pictures available for this service.</p>
                                        @endif

                                        <form action="{{ route('picture.store', $service->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            <div class="border p-2 rounded-lg flex flex-col items-center justify-center">
                                                <input type="file" name="image_path" class="hidden" 
                                                    id="image-upload-new-{{ $service->id }}" 
                                                    onchange="previewCardPhoto(event, 'new-card-preview-{{ $service->id }}')" 
                                                    accept=".png, .jpg, .jpeg" />
                                                <label for="image-upload-new-{{ $service->id }}">
                                                    <img src="{{ asset('images/default-placeholder.png') }}" alt="New Picture" 
                                                        class="w-72 h-48 object-cover rounded-lg cursor-pointer" 
                                                        id="new-card-preview-{{ $service->id }}" />
                                                </label>
                                                <p class="text-center text-sm mt-2">New Image</p>
                                                <button type="submit" class="px-2 py-1 mt-2 bg-lime-500 text-white rounded text-xs">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                                <!-- Delete Service Button -->
                                <div class="mt-4 flex justify-between">
                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Delete Service</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function previewImages(event) {
            const files = event.target.files;
            const previewContainer = document.getElementById('preview-container');

            Array.from(files).forEach(file => {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const card = document.createElement('div');
                    card.classList.add('border', 'p-2', 'rounded-lg', 'flex', 'flex-col', 'items-center', 'justify-center');
                    
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = file.name;
                    img.classList.add('w-full', 'h-48', 'object-cover', 'rounded-lg', 'cursor-pointer');
                    
                    const fileName = document.createElement('p');
                    fileName.textContent = file.name;
                    fileName.classList.add('text-center', 'text-sm', 'mt-2');
                    
                    card.appendChild(img);
                    card.appendChild(fileName);
                    
                    previewContainer.appendChild(card);
                };
                
                reader.readAsDataURL(file);
            });
        }

        function previewCardPhoto(event, previewId) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById(previewId);
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>
