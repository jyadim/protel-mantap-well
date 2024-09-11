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
                    <div class="max-w-7xl mx-auto p-8 bg-white shadow-lg rounded-lg">
                        <div class="max-w-2xl mb-12">
                            <h2 class="text-4xl font-bold tracking-tight text-gray-900">Project Gallery</h2>
                        </div>
                        <div class="flex flex-wrap -mx-6">
                            @if (isset($project->pictures) && count($project->pictures) > 0)
                                @foreach ($project->pictures as $pict)
                                    <!-- Update Form -->
                                    <form action="{{ route('gallery.update', $pict->id) }}" method="POST" enctype="multipart/form-data" class="w-full md:w-6/12 lg:w-4/12 px-6 mb-8">
                                        @csrf
                                        @method('PUT')
                    
                                        <!-- Picture Card -->
                                        <div class="flex flex-col items-center bg-gray-100 p-8 rounded-lg shadow-lg">
                                            <!-- Image Preview -->
                                            <div class="relative">
                                                <label for="photo-preview-{{ $pict->id }}" class="cursor-pointer">
                                                    <div id="avatar-preview-{{ $pict->id }}" class="bg-no-repeat bg-cover bg-gray-200 border border-gray-300"
                                                         style="background-image: url('{{ asset('storage/image/references/'.$pict->image) }}'); background-position: center; height: 300px; width: 300px;">
                                                    </div>
                                                </label>
                                                <input type="file" id="photo-preview-{{ $pict->id }}" name="image" accept=".png, .jpg, .jpeg"
                                                       class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewImage(event, 'avatar-preview-{{ $pict->id }}')">
                                            </div>
                    
                                            <!-- Details -->
                                            <div class="text-center mt-6">
                                                <!-- Title -->
                                                <input type="hidden" name="project_id" value="{{ $pict->project_id }}"> <!-- Hidden field for project_id -->

                                                <input type="text" name="title" value="{{ $pict->title }}"
                                                       class="text-gray-900 text-xl font-semibold bg-transparent border-b border-gray-300 focus:border-gray-500 focus:outline-none px-4 py-2 w-full max-w-xs"
                                                       placeholder="Title">
                                                <!-- Region -->
                                                <input type="text" name="region" value="{{ $pict->region }}"
                                                       class="text-gray-900 text-sm bg-transparent border-b border-gray-300 focus:border-gray-500 focus:outline-none px-4 py-2 mt-2 w-full max-w-xs"
                                                       placeholder="Location">
                                                <input type="text" name="maps" value="{{ $pict->maps }}"
                                                       class="text-gray-900 text-sm bg-transparent border-b border-gray-300 focus:border-gray-500 focus:outline-none px-4 py-2 mt-2 w-full max-w-xs"
                                                       placeholder="Maps Link">
                                            </div>
                    
                                            <textarea name="description" class="w-full mt-6 mb-4 border border-gray-300 rounded px-4 py-2"
                                                      placeholder="Description">{{ $pict->description }}</textarea>
                    
                                            <div class="flex justify-between mt-6 w-full">
                                                <!-- Update Button -->
                                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded-lg transition-colors">
                                                    Update
                                                </button>
                                            </form>
                                                <form action="{{ route('gallery.destroy', $pict->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-8 py-3 rounded-lg transition-colors">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                   
                                @endforeach
                            @endif
                    
                            <!-- Create New Picture Form -->
                            <form action="{{ route('gallery.store', $pict->slug) }}" method="POST" enctype="multipart/form-data" class="w-full md:w-6/12 lg:w-4/12 px-6 mb-8">
                                @csrf
                    
                                <!-- New Picture Card -->
                                <div class="flex flex-col items-center bg-gray-100 p-8 rounded-lg shadow-lg">
                                    <!-- Image Preview -->
                                    <div class="relative">
                                        <label for="photo-preview-new" class="cursor-pointer">
                                            <div id="avatar-preview-new" class="bg-no-repeat bg-cover bg-gray-200 border border-gray-300"
                                                 style="background-image: url('{{ asset('default-avatar.jpg') }}'); background-position: center; height: 300px; width: 300px;">
                                            </div>
                                        </label>
                                        <input type="file" id="photo-preview-new" name="image" accept=".png, .jpg, .jpeg"
                                               class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewImage(event, 'avatar-preview-new')">
                                    </div>
                    
                                    <!-- Details -->
                                    <div class="text-center mt-6">
                                        <!-- Title -->
                                        <input type="hidden" name="project_id" value="{{ $project->id }}"> <!-- Hidden field for project_id -->

                                        <input type="text" name="title"
                                               class="text-gray-900 text-xl font-semibold bg-transparent border-b border-gray-300 focus:border-gray-500 focus:outline-none px-4 py-2 w-full max-w-xs"
                                               placeholder="Title">
                                        <!-- Region -->
                                        <input type="text" name="region"
                                               class="text-gray-900 text-sm bg-transparent border-b border-gray-300 focus:border-gray-500 focus:outline-none px-4 py-2 mt-2 w-full max-w-xs"
                                               placeholder="Location">
                                               <input type="text" name="maps" value=""
                                               class="text-gray-900 text-sm bg-transparent border-b border-gray-300 focus:border-gray-500 focus:outline-none px-4 py-2 mt-2 w-full max-w-xs"
                                               placeholder="Maps Link">
                                    </div>
                    
                                    <textarea name="description" class="w-full mt-6 mb-4 border border-gray-300 rounded px-4 py-2"
                                              placeholder="Description"></textarea>
                    
                                    <!-- Submit Button -->
                                    <div class="flex justify-end mt-6">
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded-lg transition-colors">
                                            Add Picture
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <script>
                        function previewImage(event, previewId) {
                            var input = event.target;
                            var preview = document.getElementById(previewId);
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    preview.style.backgroundImage = 'url(' + e.target.result + ')';
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                    

                </body>

                </html>
                