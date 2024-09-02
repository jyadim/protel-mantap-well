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

            <div class="w-2/12 mr-6">
                <div class="fixed">
                    <div class="bg-white rounded-xl shadow-lg mb-6 px-6 py-4">
                        <a href="" class="inline-block text-gray-600 hover:text-black my-4 w-full">
                            <span class="material-icons-outlined float-left pr-2">dashboard</span>
                            Home
                        </a>
                        <a href="" class="inline-block text-gray-600 hover:text-black my-4 w-full">
                            <span class="material-icons-outlined float-left pr-2">tune</span>
                            About
                            <span class="material-icons-outlined float-right"></span>
                        </a>

                        <!-- Products Dropdown -->
                        <div x-data="{ open: false }" class="my-4">
                            <!-- Dropdown Trigger -->
                            <div class="flex justify-between items-center text-gray-600 hover:text-black w-full cursor-pointer"
                                @click="open = !open">
                                <div class="flex items-center">
                                    <span class="material-icons-outlined pr-2">file_copy</span>
                                    Product's
                                </div>
                                <span :class="{ 'transform rotate-90': open }"
                                    class="material-icons-outlined transition-transform duration-200">keyboard_arrow_right</span>
                            </div>

                            <!-- Dropdown Content -->
                            <div x-show="open" class="mt-2 bg-white border rounded shadow-lg w-full">
                                <ul>
                                    <li><a href="/product-content-1"
                                            class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-black">Content
                                            1</a></li>
                                    <li><a href="/product-content-2"
                                            class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-black">Content
                                            2</a></li>
                                    <li><a href="/product-content-3"
                                            class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-black">Content
                                            3</a></li>
                                    <li><a href="/product-content-4"
                                            class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-black">Content
                                            4</a></li>
                                    <li><a href="/product-content-5"
                                            class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-black">Content
                                            5</a></li>
                                    <!-- More items can be added dynamically here -->
                                </ul>
                            </div>
                        </div>

                        <!-- Service Link -->
                        <a href="" class="inline-block text-gray-600 hover:text-black my-4 w-full">
                            <span class="material-icons-outlined float-left pr-2">file_copy</span>
                            Service
                        </a>

                        <!-- References Dropdown -->
                        <div x-data="{ open: false }" class="my-4">
                            <!-- Dropdown Trigger -->
                            <div class="flex justify-between items-center text-gray-600 hover:text-black w-full cursor-pointer"
                                @click="open = !open">
                                <div class="flex items-center">
                                    <span class="material-icons-outlined pr-2">file_copy</span>
                                    Reference's
                                </div>
                                <span :class="{ 'transform rotate-90': open }"
                                    class="material-icons-outlined transition-transform duration-200">keyboard_arrow_right</span>
                            </div>

                            <!-- Dropdown Content -->
                            <div x-show="open" class="mt-2 bg-white border rounded shadow-lg w-full">
                                <ul>
                                    <li><a href="/reference-content-1"
                                            class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-black">Content
                                            1</a></li>
                                    <li><a href="/reference-content-2"
                                            class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-black">Content
                                            2</a></li>
                                    <li><a href="/reference-content-3"
                                            class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-black">Content
                                            3</a></li>
                                    <li><a href="/reference-content-4"
                                            class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-black">Content
                                            4</a></li>
                                    <li><a href="/reference-content-5"
                                            class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-black">Content
                                            5</a></li>
                                    <!-- More items can be added dynamically here -->
                                </ul>
                            </div>
                        </div>

                        <!-- Contact Link -->
                        <a href="" class="inline-block text-gray-600 hover:text-black my-4 w-full">
                            <span class="material-icons-outlined float-left pr-2">tune</span>
                            Contact
                        </a>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg mb-6 px-6 py-4">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="inline-block text-gray-600 hover:text-black my-4 w-full text-left">
                                <span class="material-icons-outlined float-left pr-2">power_settings_new</span>
                                Log out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!------------------------------- sidebar ------------------------------------->

            <div class="w-10/12">
                <div class="max-w-2xl  mb-5 p-10">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 ">Edit Banner Home Section</h2>
                </div>
                <form action="" method="post">
                    <div class="flex flex-row">
                        @foreach ($banner as $skibidi)
                            <label for="photo-preview" class="cursor-pointer">
                                <div id="photo-div"
                                    class="bg-no-repeat bg-gray-200 border border-gray-300 rounded-xl w-7/12 mr-2 p-6"
                                    style="background-image: url({{ asset($skibidi->image_path) }}); background-position: 90% center; height: 500px; width:650px;">
                                </div>
                            </label>
                            <input type="file" id="photo-preview" name="banner_pict" accept="image/*" class="hidden"
                                onchange="previewPhoto(event)">

                            <div class="bg-no-repeat bg-orange-200 border border-orange-300 rounded-xl w-5/12 ml-2 p-6"
                                style="background-image: url({https://previews.dropbox.com/p/thumb/AAuwpqWfUgs9aC5lRoM_f-yi7OPV4txbpW1makBEj5l21sDbEGYsrC9sb6bwUFXTSsekeka5xb7_IHCdyM4p9XCUaoUjpaTSlKK99S_k4L5PIspjqKkiWoaUYiAeQIdnaUvZJlgAGVUEJoy-1PA9i6Jj0GHQTrF_h9MVEnCyPQ-kg4_p7kZ8Yk0TMTL7XDx4jGJFkz75geOdOklKT3GqY9U9JtxxvRRyo1Un8hOObbWQBS1eYE-MowAI5rNqHCE_e-44yXKY6AKJocLPXz_U4xp87K4mVGehFKC6dgk_i5Ur7gspuD7gRBDvd0sanJ9Ybr_6s2hZhrpad-2WFwWqSNkh/p.png?fv_content=true&size_mode=5}); background-position: 100% 40%;height : 400px">
                                <p class="text-2xl text-indigo-900 mb-4"><strong>Change Title</strong></p>
                                <input type="text" name="title_home" value="{{ $skibidi->title }}" id="title-input"
                                    class="mb-6 p-4 border border-gray-300 rounded text-lg w-full h-16 text-gray-500">

                                <p class="text-2xl text-indigo-900 mb-4"><strong>Change Subtitle</strong></p>
                                <input type="text" name="subtitle_home" value="{{ $skibidi->subtitle }}"
                                    id="subtitle-input"
                                    class="p-4 border border-gray-300 rounded text-lg w-full h-16 text-gray-500">
                        @endforeach
                        <br>
                        <a href=""><input type="button" value="Save"
                                class="bg-lime-500 text-xl text-white hover:no-underline inline-block rounded-full mt-12 px-8 py-2"></a>
                    </div>
                </form>
            </div>

            <div class="max-w-2xl  mb-5 p-10">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 ">Edit Product's Home Section</h2>
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
            </div>


            <section
                class="w-fit grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center gap-y-10 gap-x-10 mt-4">

                @foreach ($prodhome as $prod)
                    <div class="w-72 bg-white shadow-md rounded-xl hover:shadow-xl items-center">

                        <form action="{{ route('product.update', $prod->slug) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="file" name="image_path" class="hidden"
                                id="image-upload-{{ $prod->slug }}"
                                onchange="previewCardPhoto(event, 'card-preview-{{ $prod->slug }}')"
                                accept=".png, .jpg, .jpeg" />
                            <label for="image-upload-{{ $prod->slug }}">
                                <img src="{{ asset('storage/image/' . $prod->image_path) }}" alt="Product"
                                    class="h-80 w-72 object-cover rounded-t-xl cursor-pointer"
                                    id="card-preview-{{ $prod->slug }}" />
                            </label>
                            <div class="px-4 py-3 w-72">
                                <input type="text" name="author_name" value="{{ $prod->author->name }}"
                                    class="text-gray-400 mr-3 uppercase text-xs w-full border border-gray-300 rounded px-2 py-1 mb-2">
                                <input type="text" name="name" value="{{ $prod->name }}"
                                    class="text-lg font-bold text-black truncate block capitalize w-full border border-gray-300 rounded px-2 py-1 mb-2">
                                <div class="flex justify-between items-center">
                                    <button type="submit"
                                        class="bg-blue-600 text-white py-2 px-4 rounded">Update</button>
                                </div>
                        </form>

                        <form action="{{ route('product.destroy', $prod->slug) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this product?');"
                            class="mt-2">
                            @csrf
                            @method('DELETE')
                            <div class="flex justify-between items-center">
                                <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded">Delete</button>
                            </div>
                        </form>
                    </div>
        </div>
        @endforeach


        <!-- Create new product form -->
        <div class="w-72 bg-white shadow-md rounded-xl hover:shadow-xl items-center">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="new-image-upload" class="cursor-pointer">
                    <!-- Tambahkan ID pada gambar preview -->
                    <img src="{{ asset('images/default-image.png') }}" alt="Product"
                        class="h-80 w-72 object-cover rounded-t-xl cursor-pointer" id="card-preview-create" />
                </label>
                <input type="file" name="image_path" class="hidden" id="new-image-upload"
                    onchange="previewCardPhoto(event, 'card-preview-create')">
                <div class="px-4 py-3 w-72">
                    <input type="text" name="author_name" placeholder="Author Name"
                        class="text-gray-400 mr-3 uppercase text-xs w-full border border-gray-300 rounded px-2 py-1 mb-2">
                    <input type="text" name="name" placeholder="Product Name"
                        class="text-lg font-bold text-black truncate block capitalize w-full border border-gray-300 rounded px-2 py-1 mb-2">
                    <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded">Create New
                        Product</button>
                </div>
            </form>
        </div>


        </section>
        <div class="max-w-2xl  mb-5 p-10">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 ">Edit QuickAccess Section</h2>
        </div>
        <section>
            <div class="relative items-center w-full max-w-7xl ">
                <div class="grid w-full grid-cols-1 gap-6 mx-auto lg:grid-cols-3">
                    @foreach ($quickaccess as $qa)
                        <div class="p-6">
                            <img class="object-cover object-center w-full mb-8 lg:h-48 md:h-36 rounded-xl"
                                src=" {{ asset($qa->image_path) }} " alt="blog">
                            <h1
                                class="mx-auto mb-8 text-2xl font-semibold leading-none tracking-tighter text-neutral-600 lg:text-3xl hover:underline">
                                {{ $qa->title }}</h1>
                            <p class="mx-auto text-base leading-relaxed text-gray-500">
                                {{ Str::limit($qa->detail, '150') }}</p>
                            <div class="mt-4">
                                <a href="/{{ $qa->slug }}"
                                    class="inline-flex items-center mt-4 font-semibold text-lime-600 lg:mb-0 hover:text-lime-700 hover:underline"
                                    title="read more"> Read More » </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="max-w-2xl  mb-5 p-10">
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
                                        <div class="flex justify-between items-center mb-6">
                                            <div class="w-8/12 mr-4">
                                                <p class="text-2xl text-indigo-900 mb-4"><strong>Link Video
                                                        YouTube</strong></p>
                                                <input id="youtube-link-{{ $loop->index }}" type="text"
                                                    placeholder="Masukkan link YouTube"
                                                    class="w-full mb-4 p-2 border border-gray-300 rounded text-lg"
                                                    value="{{ $yt->link }}">
                                                <button
                                                    onclick="updateVideo('youtube-link-{{ $loop->index }}', 'youtube-iframe-{{ $loop->index }}')"
                                                    class="bg-blue-600 text-white py-2 px-4 rounded">Update
                                                    Video</button>
                                                <iframe id="youtube-iframe-{{ $loop->index }}"
                                                    class="w-full h-64 mt-4 border border-gray-300 rounded"
                                                    src="https://www.youtube.com/embed/{{ \App\Helpers\YoutubeHelper::getYoutubeId($yt->link) }}"
                                                    allowfullscreen></iframe>
                                            </div>
                                            <div class="flex flex-col w-8/12 ml-4">
                                                <p class="text-2xl text-indigo-900 mb-4"><strong>Title On
                                                        Card</strong>
                                                </p>
                                                <input type="text" placeholder="Input Text 1"
                                                    class="mb-6 p-4 border border-gray-300 rounded text-lg"
                                                    value="{{ $yt->title }}">
                                                <p class="text-2xl text-indigo-900 mb-4"><strong>Uploaded
                                                        at</strong>
                                                </p>
                                                <input type="date"
                                                    class="p-2 border border-gray-300 rounded text-lg mb-4"
                                                    value="{{ $yt->date }}">
                                                <button
                                                    class="bg-blue-600 text-white py-2 px-4 rounded">Upload</button>
                                            </div>
                                        </div>
                                    @endforeach


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
        function previewPhoto(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewDiv = document.getElementById('photo-div');
                    previewDiv.style.backgroundImage = `url(${e.target.result})`;
                    previewDiv.style.backgroundPosition = 'center';
                    previewDiv.style.backgroundSize = 'cover';
                }
                reader.readAsDataURL(input.files[0]);
            }
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


        function getYoutubeId(url) {
            var regExp = /^.*(youtu.be\/|v\/|\/u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            var match = url.match(regExp);
            return (match && match[2].length == 11) ? match[2] : null;
        }

        function updateVideo(linkId, iframeId) {
            var youtubeLink = document.getElementById(linkId).value;
            var iframe = document.getElementById(iframeId);
            var videoId = getYoutubeId(youtubeLink);
            if (videoId) {
                iframe.src = "https://www.youtube.com/embed/" + videoId;
            } else {
                alert("Invalid YouTube URL");
            }
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
