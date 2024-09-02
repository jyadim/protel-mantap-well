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

      <div class="container mx-auto p-6">
        <p class="text-3xl text-indigo-900 mb-4">Upload Foto</p>
        <div class="flex flex-row">
          <div id="photo-preview" class="bg-no-repeat bg-blue-50 border border-black rounded-xl w-full h-96 mr-4 p-7" style="background-image: url('https://previews.dropbox.com/p/thumb/AAvyFru8elv-S19NMGkQcztLLpDd6Y6VVVMqKhwISfNEpqV59iR5sJaPD4VTrz8ExV7WU9ryYPIUW8Gk2JmEm03OLBE2zAeQ3i7sjFx80O-7skVlsmlm0qRT0n7z9t07jU_E9KafA9l4rz68MsaZPazbDKBdcvEEEQPPc3TmZDsIhes1U-Z0YsH0uc2RSqEb0b83A1GNRo86e-8TbEoNqyX0gxBG-14Tawn0sZWLo5Iv96X-x10kVauME-Mc9HGS5G4h_26P2oHhiZ3SEgj6jW0KlEnsh2H_yTego0grbhdcN1Yjd_rLpyHUt5XhXHJwoqyJ_ylwvZD9-dRLgi_fM_7j/p.png?fv_content=true&size_mode=5'); background-position: center; background-size: cover;">
          </div>
          <div class="flex flex-col w-8/12 ml-4">
            <p class="text-2xl text-indigo-900 mb-4"><strong>Lorem Ipsum</strong></p>
            <textarea placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg" rows="4"></textarea>
            <p class="text-2xl text-indigo-900 mb-4"><strong>Lorem Ipsum</strong></p>
            <textarea placeholder="Input Text 2" class="mb-6 p-4 border border-gray-300 rounded text-lg" rows="4"></textarea>
          </div>
        </div>
        <input type="file" id="file-input" class="hidden" accept="image/*" onchange="previewPhoto(event)">
        <label for="file-input" class="bg-blue-300 text-xl text-white inline-block rounded-full mt-12 px-8 py-2 cursor-pointer"><strong>upload</strong></label>
        <div class="flex justify-center">
          <p class="text-3xl text-indigo-900 mb-4 text-center">Upload Foto</p>
        </div>
        <section id="Projects" class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5">

 <!-- Product card b -->
 <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
  <div id="card-preview-b" class="bg-no-repeat bg-red-200 border border-red-300 rounded-t-xl w-full h-48 p-4" style="background-image: url('https://images.unsplash.com/photo-1649261191624-ca9f79ca3fc6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8NDd8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60'); background-position: center; background-size: cover;">
  </div>
  <div class="px-4 py-3 w-72">
    <span class="text-gray-400 mr-3 uppercase text-xs">Brand</span>
    <p class="text-lg font-bold text-black truncate block capitalize">inputkan text</p>
    <input type="text" placeholder="Input Text" class="mb-4 p-2 border border-gray-300 rounded w-full text-sm h-8">
    <input type="file" id="file-input-b" class="hidden" accept="image/*" onchange="previewCardPhoto(event, 'card-preview-b')">
    <label for="file-input-b" class="bg-gray-900 text-white py-1 px-3 rounded-full font-bold hover:bg-gray-800 cursor-pointer">upload</label>
  </div>
</div>


          <!-- Product card c -->
          <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
  <div id="card-preview-c" class="bg-no-repeat bg-red-200 border border-red-300 rounded-t-xl w-full h-48 p-4" style="background-image: url('https://images.unsplash.com/photo-1649261191624-ca9f79ca3fc6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8NDd8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60'); background-position: center; background-size: cover;">
  </div>
  <div class="px-4 py-3 w-72">
    <span class="text-gray-400 mr-3 uppercase text-xs">Brand</span>
    <p class="text-lg font-bold text-black truncate block capitalize">inputkan text</p>
    <input type="text" placeholder="Input Text" class="mb-4 p-2 border border-gray-300 rounded w-full text-sm h-8">
    <input type="file" id="file-input-c" class="hidden" accept="image/*" onchange="previewCardPhoto(event, 'card-preview-c')">
    <label for="file-input-c" class="bg-gray-900 text-white py-1 px-3 rounded-full font-bold hover:bg-gray-800 cursor-pointer">upload</label>
  </div>
</div>


          <!-- Product card d -->
          <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
  <div id="card-preview-d" class="bg-no-repeat bg-red-200 border border-red-300 rounded-t-xl w-full h-48 p-4" style="background-image: url('https://images.unsplash.com/photo-1649261191624-ca9f79ca3fc6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8NDd8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60'); background-position: center; background-size: cover;">
  </div>
  <div class="px-4 py-3 w-72">
    <span class="text-gray-400 mr-3 uppercase text-xs">Brand</span>
    <p class="text-lg font-bold text-black truncate block capitalize">inputkan text</p>
    <input type="text" placeholder="Input Text" class="mb-4 p-2 border border-gray-300 rounded w-full text-sm h-8">
    <input type="file" id="file-input-d" class="hidden" accept="image/*" onchange="previewCardPhoto(event, 'card-preview-d')">
    <label for="file-input-d" class="bg-gray-900 text-white py-1 px-3 rounded-full font-bold hover:bg-gray-800 cursor-pointer">upload</label>
  </div>
</div>

          <!-- Product card e -->
          <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
  <div id="card-preview-e" class="bg-no-repeat bg-red-200 border border-red-300 rounded-t-xl w-full h-48 p-4" style="background-image: url('https://images.unsplash.com/photo-1649261191624-ca9f79ca3fc6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8NDd8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60'); background-position: center; background-size: cover;">
  </div>
  <div class="px-4 py-3 w-72">
    <span class="text-gray-400 mr-3 uppercase text-xs">Brand</span>
    <p class="text-lg font-bold text-black truncate block capitalize">inputkan text</p>
    <input type="text" placeholder="Input Text" class="mb-4 p-2 border border-gray-300 rounded w-full text-sm h-8">
    <input type="file" id="file-input-e" class="hidden" accept="image/*" onchange="previewCardPhoto(event, 'card-preview-e')">
    <label for="file-input-e" class="bg-gray-900 text-white py-1 px-3 rounded-full font-bold hover:bg-gray-800 cursor-pointer">upload</label>
  </div>
</div>

        </section>
        <div class="container mx-auto p-6">
        <p class="text-3xl text-indigo-900 mb-4">Upload Foto</p>
        <div class="flex flex-row">
        <section id="Projects" class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5">

<!-- Product card template starts -->
<div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
  <div id="card-preview-f" class="bg-no-repeat bg-red-200 border border-red-300 rounded-t-xl w-full h-48 p-4" style="background-image: url('https://images.unsplash.com/photo-1649261191624-ca9f79ca3fc6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8NDd8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60'); background-position: center; background-size: cover;">
  </div>
  <div class="px-4 py-3 w-72">
    <span class="text-gray-400 mr-3 uppercase text-xs">Brand</span>
    <p class="text-lg font-bold text-black truncate block capitalize">inputkan text</p>
    <textarea placeholder="Input Text f" class="mb-4 p-2 border border-gray-300 rounded w-full"></textarea>
    <input type="file" id="file-input-f" class="hidden" accept="image/*" onchange="previewCardPhoto(event, 'card-preview-f')">
    <label for="file-input-f" class="bg-gray-900 text-white py-1 px-3 rounded-full font-bold hover:bg-gray-800 cursor-pointer">upload</label>
  </div>
</div>


<!-- Product card b -->
<div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
  <div id="card-preview-g" class="bg-no-repeat bg-red-200 border border-red-300 rounded-t-xl w-full h-48 p-4" style="background-image: url('https://images.unsplash.com/photo-1649261191624-ca9f79ca3fc6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8NDd8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60'); background-position: center; background-size: cover;">
  </div>
  <div class="px-4 py-3 w-72">
    <span class="text-gray-400 mr-3 uppercase text-xs">Brand</span>
    <p class="text-lg font-bold text-black truncate block capitalize">inputkan text</p>
    <textarea placeholder="Input Text g" class="mb-4 p-2 border border-gray-300 rounded w-full"></textarea>
    <input type="file" id="file-input-g" class="hidden" accept="image/*" onchange="previewCardPhoto(event, 'card-preview-g')">
    <label for="file-input-g" class="bg-gray-900 text-white py-1 px-3 rounded-full font-bold hover:bg-gray-800 cursor-pointer">upload</label>
  </div>
</div>


<!-- Product card c -->
<div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
  <div id="card-preview-h" class="bg-no-repeat bg-red-200 border border-red-300 rounded-t-xl w-full h-48 p-4" style="background-image: url('https://images.unsplash.com/photo-1649261191624-ca9f79ca3fc6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8NDd8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60'); background-position: center; background-size: cover;">
  </div>
  <div class="px-4 py-3 w-72">
    <span class="text-gray-400 mr-3 uppercase text-xs">Brand</span>
    <p class="text-lg font-bold text-black truncate block capitalize">inputkan text</p>
    <textarea placeholder="Input Text h" class="mb-4 p-2 border border-gray-300 rounded w-full"></textarea>
    <input type="file" id="file-input-h" class="hidden" accept="image/*" onchange="previewCardPhoto(event, 'card-preview-h')">
    <label for="file-input-h" class="bg-gray-900 text-white py-1 px-3 rounded-full font-bold hover:bg-gray-800 cursor-pointer">upload</label>
  </div>
</div>
</div>
</div>

        </section>
        <div class="flex justify-center">
          <p class="text-3xl text-indigo-900 mb-4 text-center">Tautan YouTube</p>
        </div>

        <!-- YouTube Video Section A -->
        <div class="flex justify-between items-center mt-8">
          <div class="w-8/12 mr-4">
            <p class="text-2xl text-indigo-900 mb-4"><strong>Video YouTube</strong></p>
            <input id="youtube-link-a" type="text" placeholder="Masukkan link YouTube" class="w-full mb-4 p-2 border border-gray-300 rounded text-lg">
            <button onclick="updateVideo('youtube-link-a', 'youtube-iframe-a')" class="bg-blue-600 text-white py-2 px-4 rounded">Update Video</button>
            <iframe id="youtube-iframe-a" class="w-full h-64 mt-4 border border-gray-300 rounded" src=""></iframe>
          </div>
          <div class="flex flex-col w-8/12 ml-4">
            <p class="text-2xl text-indigo-900 mb-4"><strong>Lorem Ipsum</strong></p>
            <textarea placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg" rows="4"></textarea>
            <p class="text-2xl text-indigo-900 mb-4"><strong>Lorem Ipsum</strong></p>
            <input type="date" class="p-2 border border-gray-300 rounded text-lg mb-4">
            <button class="bg-blue-600 text-white py-2 px-4 rounded">Upload</button>
          </div>
        </div>

        <!-- YouTube Video Section B -->
        <div class="flex justify-between items-center mt-8">
          <div class="w-8/12 mr-4">
            <p class="text-2xl text-indigo-900 mb-4"><strong>Video YouTube</strong></p>
            <input id="youtube-link-b" type="text" placeholder="Masukkan link YouTube" class="w-full mb-4 p-2 border border-gray-300 rounded text-lg">
            <button onclick="updateVideo('youtube-link-b', 'youtube-iframe-b')" class="bg-blue-600 text-white py-2 px-4 rounded">Update Video</button>
            <iframe id="youtube-iframe-b" class="w-full h-64 mt-4 border border-gray-300 rounded" src=""></iframe>
          </div>
          <div class="flex flex-col w-8/12 ml-4">
            <p class="text-2xl text-indigo-900 mb-4"><strong>Lorem Ipsum</strong></p>
            <textarea placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg" rows="4"></textarea>
            <p class="text-2xl text-indigo-900 mb-4"><strong>Lorem Ipsum</strong></p>
            <input type="date" class="p-2 border border-gray-300 rounded text-lg mb-4">
            <button class="bg-blue-600 text-white py-2 px-4 rounded">Upload</button>
          </div>
        </div>

        <!-- YouTube Video Section C -->
        <div class="flex justify-between items-center mt-8">
          <div class="w-8/12 mr-4">
            <p class="text-2xl text-indigo-900 mb-4"><strong>Video YouTube</strong></p>
            <input id="youtube-link-c" type="text" placeholder="Masukkan link YouTube" class="w-full mb-4 p-2 border border-gray-300 rounded text-lg">
            <button onclick="updateVideo('youtube-link-c', 'youtube-iframe-c')" class="bg-blue-600 text-white py-2 px-4 rounded">Update Video</button>
            <iframe id="youtube-iframe-c" class="w-full h-64 mt-4 border border-gray-300 rounded" src=""></iframe>
          </div>
          <div class="flex flex-col w-8/12 ml-4">
            <p class="text-2xl text-indigo-900 mb-4"><strong>Lorem Ipsum</strong></p>
            <textarea placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg" rows="4"></textarea>
            <p class="text-2xl text-indigo-900 mb-4"><strong>Lorem Ipsum</strong></p>
            <input type="date" class="p-2 border border-gray-300 rounded text-lg mb-4">
            <button class="bg-blue-600 text-white py-2 px-4 rounded">Upload</button>
          </div>
        </div>

      </div>
    </div>
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
          const preview = document.getElementById('photo-preview');
          preview.style.backgroundImage = `url(${e.target.result})`;
          preview.style.backgroundPosition = 'center';
          preview.style.backgroundSize = 'cover';
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    function previewCardPhoto(event, previewId) {
      const input = event.target;
      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
          const preview = document.getElementById(previewId);
          preview.style.backgroundImage = `url(${e.target.result})`;
          preview.style.backgroundPosition = 'center';
          preview.style.backgroundSize = 'cover';
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    function updateVideo(linkId, iframeId) {
      var link = document.getElementById(linkId).value;
      var videoId = extractVideoId(link);
      if (videoId) {
        var iframe = document.getElementById(iframeId);
        iframe.src = 'https://www.youtube.com/embed/' + videoId;
      } else {
        alert('Masukkan link YouTube yang valid.');
      }
    }

    function extractVideoId(url) {
      var videoId = '';
      var regex = /(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
      var match = url.match(regex);
      if (match && match[1]) {
        videoId = match[1];
      }
      return videoId;
    }
  </script>
</body>

</html>
