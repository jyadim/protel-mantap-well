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

    .image-container {
      width: 600px; /* Ukuran kontainer gambar */
      height: 400px; /* Ukuran kontainer gambar */
      overflow: hidden; /* Menyembunyikan bagian gambar yang melebihi kontainer */
      border-radius: 1rem; /* Border radius untuk gambar */
      background-color: #f5f5f5; /* Warna latar belakang untuk kontainer gambar */
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 16px; /* Jarak bawah untuk memisahkan gambar dengan tombol upload */
    }

    .image-container img {
      width: 100%;
      height: 100%;
      object-fit: cover; /* Menjaga rasio aspek gambar */
    }

    /* Sembunyikan input file */
    #image-input {
      display: none;
    }

    .upload-btn {
      display: inline-block;
      cursor: pointer;
      background-color: #fcb045;
      color: #fff;
      padding: 10px 20px;
      border-radius: 5px;
      text-align: center;
    }
  </style>
</head>

<body class="bg-white">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" />

  <div class="min-h-screen">
    <div class="fixed bg-blue-50 text-blue-800 px-10 py-1 z-10 w-full">
      <div class="flex items-center justify-between py-2 text-5x1">
        <div class="font-bold text-blue-900 text-xl">Admin<span class="text-orange-600">Protel</span></div>
        <div class="flex items-center text-gray-500">
          <div class="bg-center bg-cover bg-no-repeat rounded-full inline-block h-12 w-12 ml-2"></div>
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
            Servis
            <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
          </a>
          <div class="dropdown relative inline-block w-full">
            <a href="/f" class="inline-block text-gray-600 hover:text-black my-4 w-full">
              <span class="material-icons-outlined float-left pr-2">tune</span>
              References
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
            Services
            <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
          </a>
          <a href="" class="inline-block text-gray-600 hover:text-black my-4 w-full">
            <span class="material-icons-outlined float-left pr-2">settings</span>
            References
            <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
          </a>
          <a href="" class="inline-block text-gray-600 hover:text-black my-4 w-full">
            <span class="material-icons-outlined float-left pr-2">power_settings_new</span>
            Contact us
            <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
          </a>
        </div>
      </div>

      <div class="flex-1">
        <div class="sm:flex items-center max-w-screen-2xl mb-10">
          <div class="flex justify-center sm:w-3/5 px-16 flex-col items-start">
            <div class="image-container">
              <img id="uploaded-image" src="https://www.pme-bandung.com/assets/upload/images/web%202023.jpg" alt="Company Image">
            </div>
            <label for="image-input" class="upload-btn mt-4"><strong>Upload Gambar</strong></label>
            <!-- Input file yang disembunyikan -->
            <input type="file" id="image-input" accept="image/*" onchange="previewImage(event)">
          </div>
        </div>
        <div class="sm:w-3/4 p-5">
          <div class="text">
            <span class="text-gray-500 border-b-2 border-lime-600 uppercase">About us</span>
            <h2 class="my-4 font-bold text-3xl sm:text-4xl mb-4">
              About <span class="text-lime-600">Our Company</span>
            </h2>
            <input type="text" placeholder="Inputkan judul" class="mt-6 mb-4 p-4 border border-black rounded text-lg w-full">
          </div>
          <p class="text-gray-700 text-justify">
            <h3 class="my-4 font-bold text-lg sm:text-xl mb-4 text-gray-500">
              About <span class="text-lime-600">inputkan</span>
            </h3>
          </p>
          <textarea placeholder="Tuliskan deskripsi" class="mb-6 p-4 border border-black rounded text-lg w-full" rows="4"></textarea>
          <p class="text-gray-700 text-justify">
            <h3 class="my-4 font-bold text-lg sm:text-xl mb-4 text-gray-500">
              About <span class="text-lime-600">inputkan</span>
            </h3>
          </p>
          <textarea placeholder="Tuliskan deskripsi" class="mb-6 p-4 border border-black rounded text-lg w-full" rows="4"></textarea>
        </div>
        
      </div>
    </div>
  </div>

  <script>
    function previewImage(event) {
      const input = event.target;
      const file = input.files[0];
      const reader = new FileReader();
      
      reader.onload = function(e) {
        const img = document.getElementById('uploaded-image');
        img.src = e.target.result;
      }

      if (file) {
        reader.readAsDataURL(file);
      }
    }
  </script>
</body>

</html>
