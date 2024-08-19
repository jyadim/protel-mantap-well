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
    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #f1f1f1;
    }

    #image-preview, #image-preview-a, #image-preview-b, #image-preview-c {
      width: 400px;
      height: 400px;
      object-fit: cover;
      border: 2px solid #000;
      display: block;
      margin-bottom: 1rem;
    }
  </style>
</head>

<body class="bg-white">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" />

  <div class="min-h-screen">
    <div class="fixed bg-blue-50 text-blue-800 px-10 py-1 z-10 w-full">
      <div class="flex items-center justify-between py-2 text-5x1">
        <div class="font-bold text-blue-900 text-xl">Admin<span class="text-orange-600">Panel</span></div>
        <div class="flex items-center text-gray-500">
          <span class="material-icons-outlined p-2" style="font-size: 30px">search</span>
          <span class="material-icons-outlined p-2" style="font-size: 30px">notifications</span>
          <div class="bg-center bg-cover bg-no-repeat rounded-full inline-block h-12 w-12 ml-2" style="background-image: url(https://i.pinimg.com/564x/de/0f/3d/de0f3d06d2c6dbf29a888cf78e4c0323.jpg)"></div>
        </div>
      </div>
    </div>

    <div class="flex flex-row pt-24 px-10 pb-4">
      <div class="w-2/12 mr-6">
        <div class="bg-blue-50 rounded-xl shadow-lg mb-6 px-6 py-4">
          <a href="/adminhome" class="inline-block text-gray-600 hover:text-black my-4 w-full">
            <span class="material-icons-outlined float-left pr-2">dashboard</span>
            Home
            <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
          </a>
          <a href="/c" class="inline-block text-gray-600 hover:text-black my-4 w-full">
            <span class="material-icons-outlined float-left pr-2">file_copy</span>
            About us
            <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
          </a>
          <div class="dropdown relative inline-block w-full">
            <a href="/a" class="inline-block text-gray-600 hover:text-black my-4 w-full">
              <span class="material-icons-outlined float-left pr-2">tune</span>
              Product
              <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
            </a>
            <div class="dropdown-content rounded-md shadow-lg">
              <a href="/b">Product 1</a>
              <a href="/a2">Product 2</a>
              <a href="/a3">Product 3</a>
            </div>
          </div>
          <a href="/e" class="inline-block text-gray-600 hover:text-black my-4 w-full">
            <span class="material-icons-outlined float-left pr-2">file_copy</span>
            servis
            <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
          </a>
          <div class="dropdown relative inline-block w-full">
            <a href="/f" class="inline-block text-gray-600 hover:text-black my-4 w-full">
              <span class="material-icons-outlined float-left pr-2">tune</span>
              references
              <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
            </a>
            <div class="dropdown-content rounded-md shadow-lg">
              <a href="/g">Product 1</a>
              <a href="/a2">Product 2</a>
              <a href="/a3">Product 3</a>
            </div>
          </div>
        </div>


        <div class="bg-blue-50 rounded-xl shadow-lg mb-6 px-6 py-4">
          <a href="" class="inline-block text-gray-600 hover:text-black my-4 w-full">
            <span class="material-icons-outlined float-left pr-2">face</span>
            Profile
            <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
          </a>
          <a href="" class="inline-block text-gray-600 hover:text-black my-4 w-full">
            <span class="material-icons-outlined float-left pr-2">settings</span>
            Settings
            <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
          </a>
          <a href="" class="inline-block text-gray-600 hover:text-black my-4 w-full">
            <span class="material-icons-outlined float-left pr-2">power_settings_new</span>
            Log out
            <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
          </a>
        </div>
      </div>

      <div class="container mx-auto p-6">
        <p class="text-3xl text-indigo-900 mb-4">Upload Video</p>
        <div class="flex flex-row">
          <div id="video-preview" class="bg-blue-50 border border-black rounded-xl w-full h-96 mr-4 p-7 relative">
            <video id="preview-video" class="absolute top-0 left-0 w-full h-full object-cover" autoplay muted loop style="display: none;"></video>
          </div>
        </div>
        <input type="file" id="file-input" class="hidden" accept="video/*" onchange="previewVideo(event)">
        <label for="file-input" class="bg-blue-300 text-xl text-white inline-block rounded-full mt-12 px-8 py-2 cursor-pointer"><strong>Upload</strong></label>

        <div class="max-w-screen-xl mx-auto py-8 px-4 lg:py-16 lg:px-6">
          <div class="text-center mb-10">
            <h2 class="text-4xl tracking-tight font-bold text-primary-800">Highlighted Features</h2>
          </div>

          <div class="flex flex-col md:flex-row">
            <!-- can help image -->
            <div class="mr-0 md:mr-8 mb-6 md:mb-0">
              <img id="image-preview" class="w-full mx-auto" src="https://placeholder.pics/svg/400" alt="can_help_banner">
              <input type="file" id="image-input" class="hidden" accept="image/*" onchange="previewImage(event)">
              <label for="image-input" class="bg-pink-600 text-xl text-white inline-block rounded-full mt-8 px-6 py-2 cursor-pointer"><strong>Upload Gambar</strong></label>
            </div>
            <!-- end can help image -->

            <div class="flex-1 flex flex-col sm:flex-row flex-wrap -mb-4 -mx-2">
              <div class="w-full sm:w-1/2 mb-4 px-2 ">
                <div class="h-full py-4 px-6 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                  <h3 class="text-2xl font-bold text-md mb-6">Inputkan text:</h3>
                  <input type="text" class="p-2 border border-gray-500 rounded text-lg mb-4">
                  <p class="text-sm">Inputkan text</p>
                  <textarea placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg" rows="4"></textarea>
                </div>
              </div>
              <div class="w-full sm:w-1/2 mb-4 px-2 ">
                <div class="h-full py-4 px-6 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                  <h3 class="text-2xl font-bold text-md mb-6">Inputkan text:</h3>
                  <input type="text" class="p-2 border border-gray-500 rounded text-lg mb-4">
                  <p class="text-sm">Inputkan text</p>
                  <textarea placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg" rows="4"></textarea>
                </div>
              </div>

              <div class="w-full sm:w-1/2 mb-4 px-2 ">
                <div class="h-full py-4 px-6 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                  <h3 class="text-2xl font-bold text-md mb-6">Inputkan text:</h3>
                  <input type="text" class="p-2 border border-gray-500 rounded text-lg mb-4">
                  <p class="text-sm">Inputkan text</p>
                  <textarea placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg" rows="4"></textarea>
                </div>
              </div>
              <div class="w-full sm:w-1/2 mb-4 px-2 ">
                <div class="h-full py-4 px-6 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                  <h3 class="text-2xl font-bold text-md mb-6">Inputkan text:</h3>
                  <input type="text" class="p-2 border border-gray-500 rounded text-lg mb-4">
                  <p class="text-sm">Inputkan text</p>
                  <textarea placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg" rows="4"></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Existing content continues here -->
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
            <div class="flex flex-col md:flex-row">
                        <!-- can help image -->
                        <div class="mr-0 md:mr-8 mb-6 md:mb-0">
                            <img id="image-preview-a" class="w-full mx-auto" src="https://placeholder.pics/svg/400" alt="can_help_banner">
                            <input type="file" id="image-input-a" class="hidden" accept="image/*" onchange="updateImage(event, 'a')">
                            <label for="image-input-a" class="bg-pink-600 text-xl text-white inline-block rounded-full mt-8 px-6 py-2 cursor-pointer"><strong>Upload Gambar a</strong></label>
                        </div>

                        <div class="mr-0 md:mr-8 mb-6 md:mb-0">
                            <img id="image-preview-b" class="w-full mx-auto" src="https://placeholder.pics/svg/400" alt="can_help_banner">
                            <input type="file" id="image-input-b" class="hidden" accept="image/*" onchange="updateImage(event, 'b')">
                            <label for="image-input-b" class="bg-pink-600 text-xl text-white inline-block rounded-full mt-8 px-6 py-2 cursor-pointer"><strong>Upload Gambar b</strong></label>
                        </div>

                        <div class="mr-0 md:mr-8 mb-6 md:mb-0">
                            <img id="image-preview-c" class="w-full mx-auto" src="https://placeholder.pics/svg/400" alt="can_help_banner">
                            <input type="file" id="image-input-c" class="hidden" accept="image/*" onchange="updateImage(event, 'c')">
                            <label for="image-input-c" class="bg-pink-600 text-xl text-white inline-block rounded-full mt-8 px-6 py-2 cursor-pointer"><strong>Upload Gambar c</strong></label>
                        </div>
                </div> <!-- Modal -->
            

        </div>
    </div>
</section>
</div>

  <script>
    function previewVideo(event) {
      const videoPreview = document.getElementById('preview-video');
      videoPreview.src = URL.createObjectURL(event.target.files[0]);
      videoPreview.style.display = 'block';
    }

    function previewImage(event) {
      const imagePreview = document.getElementById('image-preview');
      imagePreview.src = URL.createObjectURL(event.target.files[0]);
    }
    function updateImage(event, imageId) {
                const imagePreview = document.getElementById(`image-preview-${imageId}`);
                imagePreview.src = URL.createObjectURL(event.target.files[0]);
            }
  </script>
</body>

</html>
