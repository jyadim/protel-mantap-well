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
  
      <!-- input a -->
      <section class="container mx-auto p-10 md:py-12 px-0 md:p-8 md:px-0">
        <section class="p-5 md:p-0 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-10 items-start ">
          <section class="p-5 py-10 bg-purple-50 text-center transform duration-500 hover:-translate-y-2 cursor-pointer">
            <img id="image-preview-a" src="https://www.dropbox.com/s/mlor33hzk73rh0c/x14423.png?dl=1" alt="" class="mb-4 w-48 h-48 object-cover mx-auto">
            <h1 class="text-3xl my-5">input text</h1>
            <input type="text" placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg">
            <p class="mb-5">tuliskan deskripsi product</p>
            <textarea placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg" rows="4"></textarea>
            <input type="file" id="file-input-a" class="hidden" onchange="previewImage(event, 'image-preview-a')">
            <button onclick="document.getElementById('file-input-a').click()" class="p-2 px-6 bg-purple-500 text-white rounded-md hover:bg-purple-600">Upload Gambar</button>
          </section>

          <!-- input b -->
          <section class="p-5 py-10 bg-green-50 text-center transform duration-500 hover:-translate-y-2 cursor-pointer">
            <img id="image-preview-b" src="https://www.dropbox.com/s/8ymeus1n9k9bhpd/y16625.png?dl=1" alt="" class="mb-4 w-48 h-48 object-cover mx-auto">
            <h1 class="text-3xl my-5">input text</h1>
            <input type="text" placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg">
            <p class="mb-5">tuliskan deskripsi product</p>
            <textarea placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg" rows="4"></textarea>
            <input type="file" id="file-input-b" class="hidden" onchange="previewImage(event, 'image-preview-b')">
            <button onclick="document.getElementById('file-input-b').click()" class="p-2 px-6 bg-green-500 text-white rounded-md hover:bg-green-600">Upload Gambar</button>
          </section>

          <!-- input c -->
          <section class="p-5 py-10 bg-red-50 text-center transform duration-500 hover:-translate-y-2 cursor-pointer">
            <img id="image-preview-c" src="https://www.dropbox.com/s/ykdro56f2qltxys/hh2774663-87776.png?dl=1" alt="" class="mb-4 w-48 h-48 object-cover mx-auto">
            <h1 class="text-3xl my-5">input text</h1>
            <input type="text" placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg">
            <p class="mb-5">tuliskan deskripsi product</p>
            <textarea placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg" rows="4"></textarea>
            <input type="file" id="file-input-c" class="hidden" onchange="previewImage(event, 'image-preview-c')">
            <button onclick="document.getElementById('file-input-c').click()" class="p-2 px-6 bg-red-500 text-white rounded-md hover:bg-red-600">Upload Gambar</button>
          </section>

          <!-- input d -->
          <section class="p-5 py-10 bg-blue-50 text-center transform duration-500 hover:-translate-y-2 cursor-pointer">
            <img id="image-preview-d" src="https://www.dropbox.com/s/1fav310i2eqkdz8/tool2.png?dl=1" alt="" class="mb-4 w-48 h-48 object-cover mx-auto">
            <h1 class="text-3xl my-5">input text</h1>
            <input type="text" placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg">
            <p class="mb-5">tuliskan deskripsi product</p>
            <textarea placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg" rows="4"></textarea>
            <input type="file" id="file-input-d" class="hidden" onchange="previewImage(event, 'image-preview-d')">
            <button onclick="document.getElementById('file-input-d').click()" class="p-2 px-6 bg-blue-500 text-white rounded-md hover:bg-blue-600">Upload Gambar</button>
          </section>
        </section>
      </section>
    </div>
  </div>
  </div>
  </div>


  <script>
    function previewImage(event, imageId) {
      const input = event.target;
      const file = input.files[0];
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById(imageId).src = e.target.result;
      }
      if (file) {
        reader.readAsDataURL(file);
      }
    }
    function toggleDropdown() {
        var dropdown = document.getElementById("dropdownContent");
        dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
      }
  </script>
  </div>
</body>

</html>
