<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Foto</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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

    #image-preview, #image-preview2 {
      width: 720px;
      height: 400px;
      object-fit: cover;
      border: 2px solid #000;
      display: block;
      margin-top: 1rem;
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
              refrences
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

      <!-- Container Gambar 1 dan Input -->
      <div class="flex flex-col w-full">
        <!-- Gambar dan Input 1 -->
        <div class="flex flex-col md:flex-row items-start w-full mb-12">
          <div class="lg:w-1/2 md:w-1/2 w-full">
            <img id="image-preview" class="object-cover object-center rounded" alt="Uploaded Image" src="https://www.pme-bandung.com/assets/upload/images/T15%202023.jpg">
            <input type="file" id="image-input" class="hidden" accept="image/*" onchange="previewImage(event)">
            <label for="image-input" class="bg-pink-600 text-xl text-white inline-block rounded-full mt-8 px-6 py-2 cursor-pointer"><strong>Upload Gambar</strong></label>
            
          </div>

          <div class="lg:pl-10 w-full md:w-1/2 mt-8 md:mt-0">
          <h1 class="title-font sm:text-3xl text-3xl mb-4 font-medium text-gray-900">UBAH JUDUL</h1>
            <input type="text" placeholder="Inputkan judul" class="mb-4 p-4 border border-black rounded text-lg w-full">
            <p class="mb-5 leading-relaxed text-xl">Tuliskan deskripsi</p>
            <textarea placeholder="Tuliskan deskripsi" class="mb-6 p-4 border border-black rounded text-lg w-full" rows="4"></textarea>
          </div>
        </div>

        <!-- Gambar dan Input 2 -->
        <div class="flex flex-col md:flex-row items-start w-full">
          <div class="lg:w-1/2 md:w-1/2 w-full">
            <img id="image-preview2" class="object-cover object-center rounded" alt="Uploaded Image 2" src="https://www.pme-bandung.com/assets/upload/images/SAMPUL%20UTAMA%204.jpg">
            <input type="file" id="image-input2" class="hidden" accept="image/*" onchange="previewImage2(event)">
            <label for="image-input2" class="bg-pink-600 text-xl text-white inline-block rounded-full mt-8 px-6 py-2 cursor-pointer"><strong>Upload Gambar Kedua</strong></label>
          </div>

          <div class="lg:pl-10 w-full md:w-1/2 mt-8 md:mt-0">
          <h1 class="title-font sm:text-3xl text-3xl mb-4 font-medium text-gray-900">UBAH JUDUL</h1>
            <input type="text" placeholder="Inputkan judul" class="mb-4 p-4 border border-black rounded text-lg w-full">
            <p class="mb-5 leading-relaxed text-xl">Tuliskan deskripsi</p>
            <textarea placeholder="Tuliskan deskripsi" class="mb-6 p-4 border border-black rounded text-lg w-full" rows="4"></textarea>
          </div>
        </div>



        <section class="text-gray-700 body-font border-t border-gray-200">
    <div class="container px-5 py-24 mx-auto flex flex-wrap">
    <div class="lg:w-1/2 w-full mb-10 lg:mb-0 rounded-lg overflow-hidden">
    <img id="image-preview3" alt="feature" style="width: 900px; height: 900px;" class="object-cover object-center" src="https://www.pme-bandung.com/assets/upload/images/web%202023_2.jpg">
    <input type="file" id="image-input3" class="hidden" accept="image/*" onchange="previewImage3(event)">
    <label for="image-input3" class="bg-pink-600 text-xl text-white inline-block rounded-full mt-8 px-6 py-2 cursor-pointer"><strong>Upload Gambar 33</strong></label>
</div>
        <div class="flex flex-col lg:w-1/2 w-full lg:pl-10">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full md:w-1/2 p-4 flex flex-col items-center lg:items-start">
                    <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                        </svg>
                    </div>
                    <div class="flex-grow text-center lg:text-left">
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">INPUTKAN TULISAN</h2>
                        <input type="text" placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg">

                        <h2 class="text-gray-600 hover:underline mb-2">taukan link</h2>
                        <input type="text" placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg">
                    </div>
                </div>
                <div class="w-full md:w-1/2 p-4 flex flex-col items-center lg:items-start">
                    <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                            <circle cx="6" cy="6" r="3"></circle>
                            <circle cx="6" cy="18" r="3"></circle>
                            <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                        </svg>
                    </div>
                    <div class="flex-grow text-center lg:text-left">
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">INPUTKAN TULISAN</h2>
                        <input type="text" placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg">
                        <h2 class="text-gray-600 hover:underline mb-2">taukan link</h2>
                        <input type="text" placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg">
                    </div>
                </div>
                <div class="w-full md:w-1/2 p-4 flex flex-col items-center lg:items-start">
                    <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <div class="flex-grow text-center lg:text-left">
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">INPUTKAN TULISAN</h2>
                        <input type="text" placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg">
                        <h2 class="text-gray-600 hover:underline mb-2">taukan link</h2>
                        <input type="text" placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg">
                    </div>
                </div>
                <div class="w-full md:w-1/2 p-4 flex flex-col items-center lg:items-start">
                    <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <div class="flex-grow text-center lg:text-left">
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">INPUTKAN TULISAN</h2>
                        <input type="text" placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg">
                        <h2 class="text-gray-600 hover:underline mb-2">taukan link</h2>
                        <input type="text" placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg">
                    </div>
                </div>
                <div class="w-full md:w-1/2 p-4 flex flex-col items-center lg:items-start">
                    <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <div class="flex-grow text-center lg:text-left">
                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">INPUTKAN TULISAN</h2>
                    <input type="text" placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg">
                    <h2 class="text-gray-600 hover:underline mb-2">taukan link</h2>
                    <input type="text" placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg">
                    </div>
                </div>
                <div class="w-full md:w-1/2 p-4 flex flex-col items-center lg:items-start">
                    <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <div class="flex-grow text-center lg:text-left">
                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">INPUTKAN TULISAN</h2>
                    <input type="text" placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg">
                        <h2 class="text-gray-600 hover:underline mb-2">taukan link</h2>
                        <input type="text" placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
      </div>
      

    </div>
  </div>

  <script>
    function previewImage(event) {
      const imagePreview = document.getElementById('image-preview');
      imagePreview.src = URL.createObjectURL(event.target.files[0]);
    }

    function previewImage2(event) {
      const imagePreview2 = document.getElementById('image-preview2');
      imagePreview2.src = URL.createObjectURL(event.target.files[0]);
    }
    function previewImage3(event) {
    const imagePreview3 = document.getElementById('image-preview3');
    imagePreview3.src = URL.createObjectURL(event.target.files[0]);
}

  </script>
</body>

</html>
