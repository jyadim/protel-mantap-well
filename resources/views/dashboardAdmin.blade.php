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
    <!-- source https://gist.github.com/dsursulino/369a0998c0fc8c25e19962bce729674f -->

    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet" />

    <div class="min-h-screen">
        <div class="fixed bg-white text-blue-800 px-10 py-1 z-10 w-full border-b-2">
            <div class="flex items-center justify-between py-2 text-5x1">
                <div class="font-bold text-blue-600 text-xl">Admin<span class="text-lime-600">Protel</span></div>

            </div>
        </div>

        <div class="flex flex-row pt-24 px-10 pb-4">

            <x-sidebar :product="$product" :ref="$ref"></x-sidebar>
            <!------------------------------- sidebar ------------------------------------->

            <div class="w-10/12">
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
                <div class="max-w-2xl  mb-10">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 ">Edit Banner Home Section</h2>
                </div>

                <div class="flex flex-wrap">
                    @foreach ($banner as $skibidi)
                        <form action="{{ route('banner.update', $skibidi->id) }}" method="POST"
                            enctype="multipart/form-data" class="flex flex-col w-full sm:w-1/2 lg:w-1/3 p-2">
                            @csrf
                            @method('PUT')
                            <label for="photo-preview-{{ $skibidi->id }}" class="cursor-pointer">
                                <div id="photo-div-{{ $skibidi->id }}"
                                    class="bg-no-repeat bg-gray-200 border border-gray-300 rounded-xl w-7/12 mr-2 p-6 mb-5"
                                    style="background-image: url('{{ asset('storage/image/home_image/' . $skibidi->image_path) }}'); background-position: 90% center; height: 500px; width: 1200px;">
                                </div>
                            </label>
                            <input type="file" id="photo-preview-{{ $skibidi->id }}" name="image_path"
                                accept=".png, .jpg, .jpeg" class="hidden"
                                onchange="previewPhoto(event, 'photo-div-{{ $skibidi->id }}')">

                            <div class="bg-no-repeat bg-orange-200 border border-orange-300 rounded-xl w-full p-4"
                                style="background-image: url(https://previews.dropbox.com/p/thumb/AAuwpqWfUgs9aC5lRoM_f-yi7OPV4txbpW1makBEj5l21sDbEGYsrC9sb6bwUFXTSsekeka5xb7_IHCdyM4p9XCUaoUjpaTSlKK99S_k4L5PIspjqKkiWoaUYiAeQIdnaUvZJlgAGVUEJoy-1PA9i6Jj0GHQTrF_h9MVEnCyPQ-kg4_p7kZ8Yk0TMTL7XDx4jGJFkz75geOdOklKT3GqY9U9JtxxvRRyo1Un8hOObbWQBS1eYE-MowAI5rNqHCE_e-44yXKY6AKJocLPXz_U4xp87K4mVGehFKC6dgk_i5Ur7gspuD7gRBDvd0sanJ9Ybr_6s2hZhrpad-2WFwWqSNkh/p.png?fv_content=true&size_mode=5); background-position: 100% 40%; height: 350px; width: 900px">
                                <p class="text-xl text-indigo-900 mb-2"><strong>Change Title</strong></p>
                                <input type="text" name="title" value="{{ $skibidi->title }}" id="title-input"
                                    class="mb-4 p-4 border border-gray-300 rounded text-lg w-full h-16 text-gray-500">
                                <p class="text-xl text-indigo-900 mb-2"><strong>Change Subtitle</strong></p>
                                <input type="text" name="subtitle" value="{{ $skibidi->subtitle }}"
                                    id="subtitle-input"
                                    class="p-4 border border-gray-300 rounded text-lg w-full h-16 text-gray-500">
                                <div class="flex justify-between items-center mt-4">
                                    <button type="submit"
                                        class="bg-blue-600 text-white py-2 px-4 rounded">Update</button>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>

                <div class="max-w-2xl  pt-14 mb-20">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 ">Edit Product's Home Section</h2>
                </div>


                <section
                    class="w-fit grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center gap-y-10 gap-x-10 mt-4">

                    @foreach ($prodhome as $prod)
                        <div class="w-72 bg-white shadow-md rounded-xl hover:shadow-xl items-center">

                            <form action="{{ route('homeproduct.update', $prod->slug) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="file" name="image_path" class="hidden"
                                    id="image-upload-{{ $prod->slug }}"
                                    onchange="previewCardPhoto(event, 'card-preview-{{ $prod->slug }}')"
                                    accept=".png, .jpg, .jpeg" />
                                <label for="image-upload-{{ $prod->slug }}">
                                    <img src="{{ asset('storage/image/home_image/' . $prod->image_path) }}" alt="Product"
                                        class="h-80 w-72 object-cover rounded-t-xl cursor-pointer"
                                        id="card-preview-{{ $prod->slug }}" />
                                </label>
                                <div class="px-4 py-3 w-72">
                                    <select name="author_name"
                                        class="text-gray-400 mr-3 uppercase text-xs w-full border border-gray-300 rounded px-2 py-1 mb-2">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="name" value="{{ $prod->name }}"
                                        class="text-lg font-bold text-black truncate block capitalize w-full border border-gray-300 rounded px-2 py-1 mb-2">
                                    <div class="flex justify-between items-center">
                                        <button type="submit"
                                            class="bg-blue-600 text-white py-2 px-4 rounded">Update</button>
                                    </div>
                            </form>

                            <form action="{{ route('homeproduct.destroy', $prod->slug) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this product?');"
                                class="mt-2">
                                @csrf
                                @method('DELETE')
                                <div class="flex justify-between items-center">
                                    <button type="submit"
                                        class="bg-red-600 text-white py-2 px-4 rounded">Delete</button>
                                </div>
                            </form>
                        </div>
            </div>
                    @endforeach
                    <div class="w-72 bg-white shadow-md rounded-xl hover:shadow-xl items-center">
                        <form action="{{ route('homeproduct.create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image_path" class="hidden" id="image-upload-new" 
                                   onchange="previewCardPhoto(event, 'card-preview-new')" accept=".png, .jpg, .jpeg" />
                            <label for="image-upload-new">
                                <img src="{{ asset('storage/image/default-placeholder.png') }}" alt="Product"
                                     class="h-80 w-72 object-cover rounded-t-xl cursor-pointer" id="card-preview-new" />
                            </label>
                            <div class="px-4 py-3 w-72">
                                <select name="author_name"
                                class="text-gray-400 mr-3 uppercase text-xs w-full border border-gray-300 rounded px-2 py-1 mb-2">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                                <select name="name"
                                        class="text-gray-400 mr-3 uppercase text-xs w-full border border-gray-300 rounded px-2 py-1 mb-2">
                                    <option value="" disabled selected>Select a product</option>
                                    @foreach ($availableProducts as $product)
                                        <option value="{{ $product->title }}">{{ $product->title }}</option>
                                    @endforeach
                                </select>
                                <div class="flex justify-between items-center">
                                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded">Add Product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <script>
                        function previewCardPhoto(event, previewId) {
                            const reader = new FileReader();
                            reader.onload = function(){
                                const output = document.getElementById(previewId);
                                output.src = reader.result;
                            };
                            reader.readAsDataURL(event.target.files[0]);
                        }
                    </script>
                    


          

            </section>
            <div class="max-w-2xl pt-14 mb-10">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 ">Edit QuickAccess Section</h2>
            </div>
            <section>
                <div class="relative items-center w-full max-w-7xl">
                    <div class="grid w-full grid-cols-1 gap-6 mx-auto lg:grid-cols-3">
                        @foreach ($quickaccess as $qa)
                            <form action="{{ route('quickaccess.update', $qa->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="p-6">
                                    <div class="relative w-full mb-8 lg:h-48 md:h-36 rounded-xl">
                                        <img id="preview-{{ $qa->slug }}"
                                            class="object-cover object-center w-full h-full rounded-xl"
                                            src="{{ asset('storage/image/home_image/' . $qa->image_path) }}" alt="blog">
                                        <input type="file" name="image"
                                            class="absolute inset-0 opacity-0 cursor-pointer"
                                            onchange="previewCardPhotoQA(event, 'preview-{{ $qa->slug }}')"
                                            accept=".png, .jpg, .jpeg">
                                    </div>
                                    <h1
                                        class="mx-auto mb-8 text-2xl font-semibold leading-none tracking-tighter text-neutral-600 lg:text-3xl hover:underline">
                                        {{ $qa->title }}</h1>
                                    <div class="mb-4">
                                        <label for="detail-{{ $qa->id }}"
                                            class="block text-gray-700">Details</label>
                                        <textarea id="detail-{{ $qa->id }}" name="detail"
                                            class="mt-1 h-56 block w-full border-gray-300 rounded-md shadow-sm focus:border-lime-500 focus:ring focus:ring-lime-500 focus:ring-opacity-50">{{ old('detail', $qa->detail) }}</textarea>
                                    </div>
                                    <button type="submit"
                                        class="inline-flex items-center mt-4 px-4 py-2 bg-lime-600 text-white font-semibold rounded-md shadow-sm hover:bg-lime-700">
                                        Update
                                    </button>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </section>
            <div class="max-w-2xl pt-10">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 ">Edit News Section</h2>
            </div>
            <div class="bg-white">
                <section class="text-gray-600 body-font">
                    <div class="container  mx-auto max-w-7x1">
                        <div class="flex flex-wrap w-full mb-4">
                            <div class="w-full">
                                <div class="mx-auto max-w-7xl px-6 lg:px-8 ">
                                    <div
                                        class="mx-auto mt-8 grid max-w-2xl auto-rows-fr grid-cols-1 lg:mx-0 lg:max-w-none ">
                                        <?php
                                        use App\Helpers\YoutubeHelper;
                                        ?>
                                        @foreach ($news as $yt)
                                            <form action="{{ route('news.update', $yt->slug) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <hr>
                                                <div class="flex justify-between items-center mb-10 mt-10">
                                                    <div class="w-8/12 mr-4">
                                                        <p class="text-2xl text-indigo-900 mb-4 "><strong>Link Video
                                                                YouTube</strong></p>
                                                        <input id="youtube-link-{{ $loop->index }}" type="text"
                                                            placeholder="Masukkan link YouTube"
                                                            class="w-full mb-4 p-2 border border-gray-300 rounded text-lg"
                                                            value="{{ $yt->link }}" name="link">
                                                        <button type="button"
                                                            onclick="updateVideo('youtube-link-{{ $loop->index }}', 'youtube-iframe-{{ $loop->index }}')"
                                                            class="bg-blue-600 text-white py-2 px-4 rounded">Preview
                                                            Video</button>
                                                        <iframe id="youtube-iframe-{{ $loop->index }}"
                                                            class="w-full h-64 mt-4 border border-gray-300 rounded"
                                                            src="https://www.youtube.com/embed/{{ \App\Helpers\YoutubeHelper::getYoutubeId($yt->link) }}"
                                                            allowfullscreen></iframe>
                                                    </div>
                                                    <div class="flex flex-col w-8/12 ml-4">
                                                        <p class="text-2xl text-indigo-900 mb-4"><strong>Title On
                                                                Card</strong></p>
                                                        <input type="text" placeholder="Input Text 1"
                                                            class="mb-6 p-4 border border-gray-300 rounded text-lg"
                                                            value="{{ $yt->title }}" name="title">
                                                        <p class="text-2xl text-indigo-900 mb-4">
                                                            <strong>Author</strong></p>
                                                        <select name="author"
                                                            class="mb-6 p-4 border border-gray-300 rounded text-lg">
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->id }}">
                                                                    {{ $user->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <p class="text-2xl text-indigo-900 mb-4"><strong>Uploaded
                                                                at</strong></p>
                                                        <input type="date"
                                                            class="p-2 border border-gray-300 rounded text-lg mb-4"
                                                            value="{{ $yt->date }}" name="date">
                                                        <div class="flex space-x-4">
                                                            <button
                                                                class="bg-blue-600 text-white py-2 px-4 rounded">Upload</button>
                                            </form>
                                            <form action="{{ route('news.destroy', $yt->slug) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this news item?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-600 text-white py-2 px-4 rounded">Delete</button>
                                            </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <hr>
                                <div class="flex justify-between items-center mb-6">
                                    <div class="w-8/12 mr-4">
                                        <div class="max-w-2xl mb-8">
                                            <h2 class="text-3xl font-bold tracking-tight text-lime-700 ">Create News
                                                Section</h2>
                                        </div>
                                        <p class="text-2xl text-indigo-900 mb-4"><strong>Link Video YouTube</strong>
                                        </p>
                                        <input id="youtube-link-create" type="text"
                                            placeholder="Masukkan link YouTube"
                                            class="w-full mb-4 p-2 border border-gray-300 rounded text-lg"
                                            name="link">
                                        <button type="button"
                                            onclick="createVideo('youtube-link-create', 'youtube-iframe-create')"
                                            class="bg-blue-600 text-white py-2 px-4 rounded">Preview Video</button>
                                        <iframe id="youtube-iframe-create"
                                            class="w-full h-64 mt-4 border border-gray-300 rounded" src=""
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="flex flex-col w-8/12 ml-4">
                                        </p>
                                        <p class="text-2xl text-indigo-900 mb-4"><strong>Author</strong></p>
                                        <select name="author"
                                            class="mb-6 p-4 border border-gray-300 rounded text-lg">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        <p class="text-2xl text-indigo-900 mb-4"><strong>Title On Card</strong></p>
                                        <input type="text" placeholder="Input Text 1"
                                            class="mb-6 p-4 border border-gray-300 rounded text-lg" name="title">
                                        <p class="text-2xl text-indigo-900 mb-4"><strong>Uploaded at</strong></p>
                                        <input type="date" class="p-2 border border-gray-300 rounded text-lg mb-4"
                                            name="date">
                                        <button type="submit"
                                            class="bg-blue-600 text-white py-2 px-4 rounded">Upload</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
            </div>
        </div>
    </div>
    </section>
    </div>

    </div>

    </div>
    </div>
    <script>
        function previewPhoto(event, previewId) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById(previewId);
                output.style.backgroundImage = `url(${reader.result})`;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function previewCardPhoto(event, previewId) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById(previewId);
                output.src = reader.result;
            };
            // Pastikan file dipilih sebelum membaca
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        }

        function previewCardPhotoQA(event, previewId) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById(previewId);
                if (output) {
                    output.src = reader.result;
                }
            };
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        }

        function getYoutubeId(url) {
            // Extract the YouTube video ID from the URL
            const regex =
                /(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|v\/|.+\?v=)|youtu\.be\/|youtube\.com\/embed\/)([^"&?\/\s]{11})/;
            const match = url.match(regex);
            return match ? match[1] : null;
        }

        function createVideo(linkInputId, iframeId) {
            const linkInput = document.getElementById(linkInputId);
            const iframe = document.getElementById(iframeId);

            // Function to update the video embed URL
            function updateEmbed() {
                const youtubeLink = linkInput.value;
                const videoId = getYoutubeId(youtubeLink);
                iframe.src = videoId ? `https://www.youtube.com/embed/${videoId}` : '';

                // Update the input value to the embed URL so it will be saved correctly
                linkInput.value = videoId ? `https://www.youtube.com/embed/${videoId}` : '';
            }

            // Attach the update function to the input event
            linkInput.addEventListener('input', updateEmbed);

            // Initial update
            updateEmbed();
        }

        function updateVideo(linkId, iframeId) {
            const linkInput = document.getElementById(linkId);
            const iframe = document.getElementById(iframeId);

            // Function to update the video embed URL
            function updateEmbed() {
                const youtubeLink = linkInput.value;
                const videoId = getYoutubeId(youtubeLink);
                iframe.src = videoId ? `https://www.youtube.com/embed/${videoId}` : '';

                // Update the input value to the embed URL so it will be saved correctly
                linkInput.value = videoId ? `https://www.youtube.com/embed/${videoId}` : '';
            }

            // Attach the update function to the input event
            linkInput.addEventListener('input', updateEmbed);

            // Initial update
            updateEmbed();
        }


        document.querySelectorAll('input[id^="youtube-link-"]').forEach((input, index) => {
            updateVideo('youtube-link-' + index, 'youtube-iframe-' + index);
        });

        document.getElementById('title-input').addEventListener('input', function() {
            this.classList.remove('text-gray-500');
            this.classList.add('text-black');
        });

        document.getElementById('subtitle-input').addEventListener('input', function() {
            this.classList.remove('text-gray-500');
            this.classList.add('text-black');
        });
    </script>
</body>

</html>
