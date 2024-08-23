<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Foto</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <style>
   body {
    margin: 0;
    font-family: Arial, sans-serif;
}

.map-container {
    margin-top: 16px; /* Margin atas untuk jarak dari elemen lain */
    position: relative;
    height: 300px; /* Tinggi kontainer peta */
    overflow: hidden; /* Menyembunyikan bagian peta yang melampaui kontainer */
    background-size: cover; /* Mengatur ukuran latar belakang */
    background-position: center; /* Mengatur posisi latar belakang */
    background-repeat: no-repeat; /* Menghindari pengulangan latar belakang */
}

  </style>
   
</head>

<body class="bg-white" onload="initMap()">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" />

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
          <a href="" class="inline-block text-gray-600 hover:text-black my-4 w-full">
            <span class="material-icons-outlined float-left pr-2">dashboard</span>
            Home
            <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
          </a>
          <a href="" class="inline-block text-gray-600 hover:text-black my-4 w-full">
            <span class="material-icons-outlined float-left pr-2">tune</span>
            Product
            <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
          </a>
          <a href="" class="inline-block text-gray-600 hover:text-black my-4 w-full">
            <span class="material-icons-outlined float-left pr-2">file_copy</span>
            About us
            <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
          </a>
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
    
      <div class="container mx-auto p-6">
      <div class="flex flex-row"> </div>
        <div class="flex flex-col w-8/12 ml-4">
            <p class="text-2xl text-indigo-900 mb-4"><strong>Ubah Email :</strong></p>
            <input type="text" class="p-2 border border-gray-300 rounded text-lg mb-4">
            <p class="text-2xl text-indigo-900 mb-4"><strong>Ubah No.telp :</strong></p>
            <input type="number" class="p-2 border border-gray-300 rounded text-lg mb-4">
            <p class="text-2xl text-indigo-900 mb-4"><strong>Ubah No.telp kantor :</strong></p>
            <input type="number" class="p-2 border border-gray-300 rounded text-lg mb-4">
            <p class="text-2xl text-indigo-900 mb-4"><strong>Ubah Alamat perusahaan :</strong></p>
            <input type="text" class="p-2 border border-gray-300 rounded text-lg mb-4">
            
    
            <p class="text-2xl text-indigo-900 mb-4"><strong>Ubah Alamat Goggle Maps :</strong></p>
    <input id="address" type="text" placeholder="Silahkan Ubah">
    <div id="map" class="map-container">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.1717072224415!2d107.5493138143469!3d-6.870018469126014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e434be67b353%3A0x65421b7cacf3aaad!2sProtel+Multi+Energy!5e0!3m2!1sid!2sid!4v1560907933897!5m2!1sid!2sid"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <button id="submit" class="bg-black text-xl text-white inline-block rounded-full mt-12 px-8 py-2 cursor-pointer"><strong>Update Lokasi</strong></button>
    </div>
    <label for="file-input" class="bg-blue-300 text-xl text-black inline-block rounded-full mt-12 px-8 py-2 cursor-pointer"><strong>Kirim</strong></label>
