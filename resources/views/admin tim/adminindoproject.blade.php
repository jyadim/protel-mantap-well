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

      <div class="flex-1">
        <section class="bg-center bg-no-repeat bg-none bg-white-700 bg-blend-multiply mt-12 flex justify-center items-center">
          <div class="px-4 mx-auto text-center py-4 lg:py-4"> <!-- Mengurangi padding atas di sini -->
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-black md:text-5xl lg:text-6xl"
              style="font-size: 3rem; color: black;">
              UBAH JUDUL </h1>
            <input type="text" placeholder="Inputkan judul" class="mb-4 p-4 border border-black rounded text-lg w-full">
          </div>
        </section>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-10 md:px-20">
          <!-- Loop to add 12 cards -->
          <!-- Card Template -->
          <!-- Card 1 -->
          <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="relative">
              <img id="card1-img" class="w-full h-48 object-cover"
                src="https://www.pme-bandung.com/assets/images/gallery/205-electronic-load-controller-and-micro-hydro-turbines--2x150-kw-elc-and-synchronizer-papua.jpg" alt="Micro Hydro Turbines">
            </div>
            <div class="p-4 mt-4">
              <label class="bg-blue-500 text-white rounded px-4 py-2 cursor-pointer -ml-2">
                <strong>Upload Gambar card</strong>
                <input id="card1-input" type="file" class="hidden" accept="image/*" onchange="updateImage('card1-img', 'card1-input')" />
              </label>
            </div>
            <div class="p-4">
              <div class="text-lg font-medium text-gray-800 mb-2">UBAH TULISAN JUDUL
                <input type="text" placeholder="Input Text 1" class="mb-6 p-4 border border-gray-300 rounded text-lg">
                <div class="text-sm">
                  <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600">
                    Inputkan link Google Maps
                  </p>
                  <input id="maps-link1" type="text" placeholder="Masukkan lokasi" class="p-4 border border-black rounded text-lg w-full mt-4">
                  <button onclick="openMapsLink('maps-link1')" class="p-4 bg-blue-500 text-white rounded mt-4">Buka Lokasi</button>
                </div>
              </div>
              <div id="display-link1" class="mt-6 text-lg text-gray-700"></div>

              <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600 mb-4">Masukan deskripsi</p>
              <textarea placeholder="Tuliskan deskripsi" class="mb-6 p-4 border border-black rounded text-lg w-full" rows="4"></textarea>
            </div>
          </div>

          <!-- Card 2 to 12 (Copy and paste the above card structure) -->
          <!-- Update IDs and placeholders -->
          <!-- Card 2 -->
          <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="relative">
              <img id="card2-img" class="w-full h-48 object-cover"
                src="https://www.pme-bandung.com/assets/images/gallery/214-micro-hydro-turbine-crossflow-turbine-electronic-load-controller-load-control-micro-hydro-control-30kw-mechanical-electrical-for-raja-ampat-project-papua.jpg" alt="Micro Hydro Turbine">
            </div>
            <div class="p-4 mt-4">
              <label class="bg-blue-500 text-white rounded px-4 py-2 cursor-pointer -ml-2">
                <strong>Upload Gambar card</strong>
                <input id="card2-input" type="file" class="hidden" accept="image/*" onchange="updateImage('card2-img', 'card2-input')" />
              </label>
            </div>
            <div class="p-4">
              <div class="text-lg font-medium text-gray-800 mb-2">UBAH TULISAN JUDUL
                <input type="text" placeholder="Input Text 2" class="mb-6 p-4 border border-gray-300 rounded text-lg">
                <div class="text-sm">
                  <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600">
                    Inputkan link Google Maps
                  </p>
                  <input id="maps-link2" type="text" placeholder="Masukkan lokasi" class="p-4 border border-black rounded text-lg w-full mt-4">
                  <button onclick="openMapsLink('maps-link2')" class="p-4 bg-blue-500 text-white rounded mt-4">Buka Lokasi</button>
                </div>
              </div>
              <div id="display-link2" class="mt-6 text-lg text-gray-700"></div>

              <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600 mb-4">Masukan deskripsi</p>
              <textarea placeholder="Tuliskan deskripsi" class="mb-6 p-4 border border-black rounded text-lg w-full" rows="4"></textarea>
            </div>
          </div>

          <!-- Repeat for Cards 3 to 12 -->
          <!-- Card 3 -->
          <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="relative">
              <img id="card3-img" class="w-full h-48 object-cover"
                src="https://www.pme-bandung.com/assets/images/gallery/213-micro-hydro-turbine-crossflow-turbine-electronic-load-controller-load-control-micro-hydro-control-30kw-pelton-turbine-for-west-borneo-project.jpg" alt="Micro Hydro Turbine">
            </div>
            <div class="p-4 mt-4">
              <label class="bg-blue-500 text-white rounded px-4 py-2 cursor-pointer -ml-2">
                <strong>Upload Gambar card</strong>
                <input id="card3-input" type="file" class="hidden" accept="image/*" onchange="updateImage('card3-img', 'card3-input')" />
              </label>
            </div>
            <div class="p-4">
              <div class="text-lg font-medium text-gray-800 mb-2">UBAH TULISAN JUDUL
                <input type="text" placeholder="Input Text 3" class="mb-6 p-4 border border-gray-300 rounded text-lg">
                <div class="text-sm">
                  <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600">
                    Inputkan link Google Maps
                  </p>
                  <input id="maps-link3" type="text" placeholder="Masukkan lokasi" class="p-4 border border-black rounded text-lg w-full mt-4">
                  <button onclick="openMapsLink('maps-link3')" class="p-4 bg-blue-500 text-white rounded mt-4">Buka Lokasi</button>
                </div>
              </div>
              <div id="display-link3" class="mt-6 text-lg text-gray-700"></div>

              <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600 mb-4">Masukan deskripsi</p>
              <textarea placeholder="Tuliskan deskripsi" class="mb-6 p-4 border border-black rounded text-lg w-full" rows="4"></textarea>
            </div>
          </div>

                 <!-- Card 4 -->
                 <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="relative">
              <img id="card4-img" class="w-full h-48 object-cover"
                src="https://www.pme-bandung.com/assets/images/gallery/207-micro-hydro-turbine-crossflow-turbine-electronic-load-controller-load-control-micro-hydro-control-complete-me-supply-15-kw-nusa-tenggara-timur.jpg">
            </div>
            <div class="p-4 mt-4">
              <label class="bg-blue-500 text-white rounded px-4 py-2 cursor-pointer -ml-2">
                <strong>Upload Gambar card</strong>
                <input id="card4-input" type="file" class="hidden" accept="image/*" onchange="updateImage('card4-img', 'card4-input')" />
              </label>
            </div>
            <div class="p-4">
              <div class="text-lg font-medium text-gray-800 mb-2">UBAH TULISAN JUDUL
                <input type="text" placeholder="Input Text 4" class="mb-6 p-4 border border-gray-300 rounded text-lg">
                <div class="text-sm">
                  <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600">
                    Inputkan link Google Maps
                  </p>
                  <input id="maps-link4" type="text" placeholder="Masukkan lokasi" class="p-4 border border-black rounded text-lg w-full mt-4">
                  <button onclick="openMapsLink('maps-link4')" class="p-4 bg-blue-500 text-white rounded mt-4">Buka Lokasi</button>
                </div>
              </div>
              <div id="display-link4" class="mt-6 text-lg text-gray-700"></div>

              <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600 mb-4">Masukan deskripsi</p>
              <textarea placeholder="Tuliskan deskripsi" class="mb-6 p-4 border border-black rounded text-lg w-full" rows="4"></textarea>
            </div>
          </div>

          <!-- Card 5 -->
          <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="relative">
              <img id="card5-img" class="w-full h-48 object-cover"
                src="https://www.pme-bandung.com/assets/images/gallery/204-electronic-load-controller-and-micro-hydro-turbines--complete-water-to-wire-75kw-sulawesi-.jpg">
            </div>
            <div class="p-4 mt-4">
              <label class="bg-blue-500 text-white rounded px-4 py-2 cursor-pointer -ml-2">
                <strong>Upload Gambar card</strong>
                <input id="card5-input" type="file" class="hidden" accept="image/*" onchange="updateImage('card5-img', 'card5-input')" />
              </label>
            </div>
            <div class="p-4">
              <div class="text-lg font-medium text-gray-800 mb-2">UBAH TULISAN JUDUL
                <input type="text" placeholder="Input Text 5" class="mb-6 p-4 border border-gray-300 rounded text-lg">
                <div class="text-sm">
                  <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600">
                    Inputkan link Google Maps
                  </p>
                  <input id="maps-link5" type="text" placeholder="Masukkan lokasi" class="p-4 border border-black rounded text-lg w-full mt-4">
                  <button onclick="openMapsLink('maps-link5')" class="p-4 bg-blue-500 text-white rounded mt-4">Buka Lokasi</button>
                </div>
              </div>
              <div id="display-link5" class="mt-6 text-lg text-gray-700"></div>

              <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600 mb-4">Masukan deskripsi</p>
              <textarea placeholder="Tuliskan deskripsi" class="mb-6 p-4 border border-black rounded text-lg w-full" rows="4"></textarea>
            </div>
          </div>

          <!-- Card 6 -->
          <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="relative">
              <img id="card6-img" class="w-full h-48 object-cover"
                src="https://www.pme-bandung.com/assets/images/gallery/212-micro-hydro-turbine-crossflow-turbine-electronic-load-controller-load-control-micro-hydro-control-crossflow-turbine-for-training-institution.jpg">
            </div>
            <div class="p-4 mt-4">
              <label class="bg-blue-500 text-white rounded px-4 py-2 cursor-pointer -ml-2">
                <strong>Upload Gambar card</strong>
                <input id="card6-input" type="file" class="hidden" accept="image/*" onchange="updateImage('card6-img', 'card6-input')" />
              </label>
            </div>
            <div class="p-4">
              <div class="text-lg font-medium text-gray-800 mb-2">UBAH TULISAN JUDUL
                <input type="text" placeholder="Input Text 6" class="mb-6 p-4 border border-gray-300 rounded text-lg">
                <div class="text-sm">
                  <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600">
                    Inputkan link Google Maps
                  </p>
                  <input id="maps-link6" type="text" placeholder="Masukkan lokasi" class="p-4 border border-black rounded text-lg w-full mt-4">
                  <button onclick="openMapsLink('maps-link6')" class="p-4 bg-blue-500 text-white rounded mt-4">Buka Lokasi</button>
                </div>
              </div>
              <div id="display-link6" class="mt-6 text-lg text-gray-700"></div>

              <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600 mb-4">Masukan deskripsi</p>
              <textarea placeholder="Tuliskan deskripsi" class="mb-6 p-4 border border-black rounded text-lg w-full" rows="4"></textarea>
            </div>
          </div>

          <!-- Card 7 -->
          <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="relative">
              <img id="card7-img" class="w-full h-48 object-cover"
                src="https://www.pme-bandung.com/assets/images/gallery/210-micro-hydro-turbine-crossflow-turbine-electronic-load-controller-load-control-micro-hydro-control-mhp-kasiala-40kw-tojo-unauna-district-sulawesi-tengah-2021.jpg">
            </div>
            <div class="p-4 mt-4">
              <label class="bg-blue-500 text-white rounded px-4 py-2 cursor-pointer -ml-2">
                <strong>Upload Gambar card</strong>
                <input id="card7-input" type="file" class="hidden" accept="image/*" onchange="updateImage('card7-img', 'card7-input')" />
              </label>
            </div>
            <div class="p-4">
              <div class="text-lg font-medium text-gray-800 mb-2">UBAH TULISAN JUDUL
                <input type="text" placeholder="Input Text 7" class="mb-6 p-4 border border-gray-300 rounded text-lg">
                <div class="text-sm">
                  <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600">
                    Inputkan link Google Maps
                  </p>
                  <input id="maps-link7" type="text" placeholder="Masukkan lokasi" class="p-4 border border-black rounded text-lg w-full mt-4">
                  <button onclick="openMapsLink('maps-link7')" class="p-4 bg-blue-500 text-white rounded mt-4">Buka Lokasi</button>
                </div>
              </div>
              <div id="display-link7" class="mt-6 text-lg text-gray-700"></div>

              <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600 mb-4">Masukan deskripsi</p>
              <textarea placeholder="Tuliskan deskripsi" class="mb-6 p-4 border border-black rounded text-lg w-full" rows="4"></textarea>
            </div>
          </div>

          <!-- Card 8 -->
          <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="relative">
              <img id="card8-img" class="w-full h-48 object-cover"
                src="https://www.pme-bandung.com/assets/images/gallery/211-micro-hydro-turbine-crossflow-turbine-electronic-load-controller-load-control-micro-hydro-control-mhp-lembor-30kw-komodo-flores-nusa-tenggara-timur.jpg">
            </div>
            <div class="p-4 mt-4">
              <label class="bg-blue-500 text-white rounded px-4 py-2 cursor-pointer -ml-2">
                <strong>Upload Gambar card</strong>
                <input id="card8-input" type="file" class="hidden" accept="image/*" onchange="updateImage('card8-img', 'card8-input')" />
              </label>
            </div>
            <div class="p-4">
              <div class="text-lg font-medium text-gray-800 mb-2">UBAH TULISAN JUDUL
                <input type="text" placeholder="Input Text 8" class="mb-6 p-4 border border-gray-300 rounded text-lg">
                <div class="text-sm">
                  <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600">
                    Inputkan link Google Maps
                  </p>
                  <input id="maps-link8" type="text" placeholder="Masukkan lokasi" class="p-4 border border-black rounded text-lg w-full mt-4">
                  <button onclick="openMapsLink('maps-link8')" class="p-4 bg-blue-500 text-white rounded mt-4">Buka Lokasi</button>
                </div>
              </div>
              <div id="display-link8" class="mt-6 text-lg text-gray-700"></div>

              <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600 mb-4">Masukan deskripsi</p>
              <textarea placeholder="Tuliskan deskripsi" class="mb-6 p-4 border border-black rounded text-lg w-full" rows="4"></textarea>
            </div>
          </div>

          <!-- Card 9 -->
          <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="relative">
              <img id="card9-img" class="w-full h-48 object-cover"
                src="https://www.pme-bandung.com/assets/images/gallery/203-electronic-load-controller-and-micro-hydro-turbines--off-grid-2-kwp-solar-power-sulawesi-.jpg">
            </div>
            <div class="p-4 mt-4">
              <label class="bg-blue-500 text-white rounded px-4 py-2 cursor-pointer -ml-2">
                <strong>Upload Gambar card</strong>
                <input id="card9-input" type="file" class="hidden" accept="image/*" onchange="updateImage('card9-img', 'card9-input')" />
              </label>
            </div>
            <div class="p-4">
              <div class="text-lg font-medium text-gray-800 mb-2">UBAH TULISAN JUDUL
                <input type="text" placeholder="Input Text 9" class="mb-6 p-4 border border-gray-300 rounded text-lg">
                <div class="text-sm">
                  <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600">
                    Inputkan link Google Maps
                  </p>
                  <input id="maps-link9" type="text" placeholder="Masukkan lokasi" class="p-4 border border-black rounded text-lg w-full mt-4">
                  <button onclick="openMapsLink('maps-link9')" class="p-4 bg-blue-500 text-white rounded mt-4">Buka Lokasi</button>
                </div>
              </div>
              <div id="display-link9" class="mt-6 text-lg text-gray-700"></div>

              <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600 mb-4">Masukan deskripsi</p>
              <textarea placeholder="Tuliskan deskripsi" class="mb-6 p-4 border border-black rounded text-lg w-full" rows="4"></textarea>
            </div>
          </div>

          <!-- Card 10 -->
          <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="relative">
              <img id="card10-img" class="w-full h-48 object-cover"
                src="https://www.pme-bandung.com/assets/images/gallery/208-micro-hydro-turbine-crossflow-turbine-electronic-load-controller-load-control-micro-hydro-control-supply-of-electronic-load-controller-elc-for-various-sites.jpg">
            </div>
            <div class="p-4 mt-4">
              <label class="bg-blue-500 text-white rounded px-4 py-2 cursor-pointer -ml-2">
                <strong>Upload Gambar card</strong>
                <input id="card10-input" type="file" class="hidden" accept="image/*" onchange="updateImage('card10-img', 'card10-input')" />
              </label>
            </div>
            <div class="p-4">
              <div class="text-lg font-medium text-gray-800 mb-2">UBAH TULISAN JUDUL
                <input type="text" placeholder="Input Text 10" class="mb-6 p-4 border border-gray-300 rounded text-lg">
                <div class="text-sm">
                  <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600">
                    Inputkan link Google Maps
                  </p>
                  <input id="maps-link10" type="text" placeholder="Masukkan lokasi" class="p-4 border border-black rounded text-lg w-full mt-4">
                  <button onclick="openMapsLink('maps-link10')" class="p-4 bg-blue-500 text-white rounded mt-4">Buka Lokasi</button>
                </div>
              </div>
              <div id="display-link10" class="mt-6 text-lg text-gray-700"></div>

              <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600 mb-4">Masukan deskripsi</p>
              <textarea placeholder="Tuliskan deskripsi" class="mb-6 p-4 border border-black rounded text-lg w-full" rows="4"></textarea>
            </div>
          </div>

          <!-- Card 11 -->
          <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="relative">
              <img id="card11-img" class="w-full h-48 object-cover"
                src="https://www.pme-bandung.com/assets/images/gallery/206-electronic-load-controller-and-micro-hydro-turbines--supply-over-25-units-of-elc--prowater-padang.jpg">
            </div>
            <div class="p-4 mt-4">
              <label class="bg-blue-500 text-white rounded px-4 py-2 cursor-pointer -ml-2">
                <strong>Upload Gambar card</strong>
                <input id="card11-input" type="file" class="hidden" accept="image/*" onchange="updateImage('card11-img', 'card11-input')" />
              </label>
            </div>
            <div class="p-4">
              <div class="text-lg font-medium text-gray-800 mb-2">UBAH TULISAN JUDUL
                <input type="text" placeholder="Input Text 11" class="mb-6 p-4 border border-gray-300 rounded text-lg">
                <div class="text-sm">
                  <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600">
                    Inputkan link Google Maps
                  </p>
                  <input id="maps-link11" type="text" placeholder="Masukkan lokasi" class="p-4 border border-black rounded text-lg w-full mt-4">
                  <button onclick="openMapsLink('maps-link11')" class="p-4 bg-blue-500 text-white rounded mt-4">Buka Lokasi</button>
                </div>
              </div>
              <div id="display-link11" class="mt-6 text-lg text-gray-700"></div>

              <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600 mb-4">Masukan deskripsi</p>
              <textarea placeholder="Tuliskan deskripsi" class="mb-6 p-4 border border-black rounded text-lg w-full" rows="4"></textarea>
            </div>
          </div>

          <!-- Card 12 -->
          <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="relative">
              <img id="card12-img" class="w-full h-48 object-cover"
                src="https://www.pme-bandung.com/assets/images/gallery/209-micro-hydro-turbine-crossflow-turbine-electronic-load-controller-load-control-micro-hydro-control-water-to-wire-project-mhp-masewo-sulawesi-tengah.jpg">
            </div>
            <div class="p-4 mt-4">
              <label class="bg-blue-500 text-white rounded px-4 py-2 cursor-pointer -ml-2">
                <strong>Upload Gambar card</strong>
                <input id="card12-input" type="file" class="hidden" accept="image/*" onchange="updateImage('card12-img', 'card12-input')" />
              </label>
            </div>
            <div class="p-4">
              <div class="text-lg font-medium text-gray-800 mb-2">UBAH TULISAN JUDUL
                <input type="text" placeholder="Input Text 12" class="mb-6 p-4 border border-gray-300 rounded text-lg">
                <div class="text-sm">
                  <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600">
                    Inputkan link Google Maps
                  </p>
                  <input id="maps-link12" type="text" placeholder="Masukkan lokasi" class="p-4 border border-black rounded text-lg w-full mt-4">
                  <button onclick="openMapsLink('maps-link12')" class="p-4 bg-blue-500 text-white rounded mt-4">Buka Lokasi</button>
                </div>
              </div>
              <div id="display-link12" class="mt-6 text-lg text-gray-700"></div>

              <p class="text-gray-500 font-semibold leading-none hover:text-indigo-600 mb-4">Masukan deskripsi</p>
              <textarea placeholder="Tuliskan deskripsi" class="mb-6 p-4 border border-black rounded text-lg w-full" rows="4"></textarea>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>

  <script>
    function updateImage(imgId, inputId) {
      var file = document.getElementById(inputId).files[0];
      var reader = new FileReader();
      reader.onload = function (e) {
        document.getElementById(imgId).src = e.target.result;
      };
      if (file) {
        reader.readAsDataURL(file);
      }
    }

    function openMapsLink(inputId) {
      var link = document.getElementById(inputId).value;
      if (link) {
        window.open(link, '_blank');
      }
    }
  </script>
</body>

</html>
