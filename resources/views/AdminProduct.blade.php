<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AdminProtel</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" />

</head>

<body>
    <div class="min-h-screen">
        <div class="fixed bg-white text-blue-800 px-10 py-1 z-10 w-full border-b-2">
            <div class="flex items-center justify-between py-2 text-5x1">
                <div class="font-bold text-blue-600 text-xl">Admin<span class="text-lime-600">Protel</span></div>
            </div>
        </div>

        <div class="flex flex-row pt-24 px-10 pb-4">
            <x-sidebar :product="$product" :ref="$ref"></x-sidebar>
            <section class="container mx-auto p-10 md:py-12 px-0 md:p-8 md:px-0">
                <div class="w-full mb-6 lg:mb-0">
                    <h2 class="text-3xl font-bold mb-6">Edit Product's Home Section</h2>
                </div>
                <section class="p-5 md:p-0 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-10 items-start mt-10">
                    @foreach ($product as $prod)
                    <div class="w-96 bg-white shadow-md rounded-xl hover:shadow-xl items-center mx-auto mb-4">
                        <form action="{{ route('product.update', $prod->slug) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="file" name="image_path" class="hidden" id="image-upload-{{ $prod->slug }}"
                                onchange="previewCardPhoto(event, 'card-preview-{{ $prod->slug }}')" accept=".png, .jpg, .jpeg" />
                            <label for="image-upload-{{ $prod->slug }}">
                                <img src="{{ asset('storage/image/product/' . $prod->image_path) }}" alt="Product"
                                    class="h-80 w-96 object-cover rounded-t-xl cursor-pointer"
                                    id="card-preview-{{ $prod->slug }}" />
                            </label>
                            <div class="px-4 py-3">
                                <input type="text" name="title" value="{{ $prod->title }}"
                                    class="text-lg font-bold text-black truncate block capitalize w-full border border-gray-300 rounded px-2 py-1 mb-2"
                                    placeholder="Update Title">
                                <textarea name="desc" placeholder="Update Description"
                                    class="text-gray-600 block w-full border border-gray-300 rounded px-2 py-1 mb-2 h-40">{{ $prod->desc }}</textarea>
                                <div class="flex justify-between items-center">
                                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded">Update</button>
                                </div>
                            
                        </form>
            
                        <form action="{{ route('product.destroy', $prod->slug) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this product?');" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <div class="flex justify-between items-center">
                                <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded">Delete</button>
                            </div>
                        </form>
                    </div>
                    
                    </div>
                    @endforeach
                    <div class="w-96 bg-white shadow-md rounded-xl hover:shadow-xl items-center mx-auto mb-4">
                        <form action="{{ route('prod.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image_path" class="hidden" id="image-upload-new"
                                onchange="previewCardPhoto(event, 'card-preview-new')" accept=".png, .jpg, .jpeg" />
                            <label for="image-upload-new">
                                <img src="{{ asset('storage/default-placeholder.png') }}" alt="Product"
                                    class="h-80 w-96 object-cover rounded-t-xl cursor-pointer"
                                    id="card-preview-new" />
                            </label>
                        
                            <div class="px-4 py-3">
                                <input type="text" name="name" value=""
                                    class="text-lg font-bold text-black truncate block capitalize w-full border border-gray-300 rounded px-2 py-1 mb-2"
                                    placeholder="Enter Product Name">
                                <textarea name="description" placeholder="Enter Product Description"
                                    class="text-gray-600 block w-full border border-gray-300 rounded px-2 py-1 mb-2 h-40"></textarea>
                        
                                <div class="flex justify-between items-center">
                                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded">Create</button>
                                </div>
                            </div>
                        </form>
                        
                        
                    </div>
                    
                            
                        </form>
                    </div>
                </section>
            </section>
            
            <script>
                function previewCardPhoto(event, previewId) {
                    var reader = new FileReader();
                    reader.onload = function () {
                        var output = document.getElementById(previewId);
                        output.src = reader.result;
                    };
                    reader.readAsDataURL(event.target.files[0]);
                }
            </script>
            
            
</body>

</html>
