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
                <div class="max-w-2xl mb-10">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 ">Edit About Us Section</h2>
                </div>
                @foreach ($about as $abt)
                    <form action="{{ route('about.edit', $abt->id) }}" method="POST" enctype="multipart/form-data"
                        class="max-w-7xl mx-auto p-6 bg-white shadow-lg rounded-lg">
                        @csrf
                        @method('PUT')

                        <div class="sm:flex items-start">
                            <!-- Image Preview Section -->
                            <div class="sm:w-1/2 flex justify-center sm:justify-start mb-6 sm:mb-0">
                                <label for="photo-preview-{{ $abt->id }}" class="cursor-pointer">
                                    <div id="photo-div-{{ $abt->id }}"
                                        class="bg-no-repeat bg-cover bg-gray-200 border border-gray-300 rounded-xl"
                                        style="background-image: url('{{ asset('storage/image/about/' . $abt->image_path) }}'); background-position: center; height: 400px; width: 550px; ">
                                    </div>
                                </label>
                                <input type="file" id="photo-preview-{{ $abt->id }}" name="image_path"
                                    accept=".png, .jpg, .jpeg" class="hidden"
                                    onchange="previewPhoto(event, 'photo-div-{{ $abt->id }}')">
                            </div>

                            <!-- Description Section -->
                            <div class="sm:w-1/2 sm:pl-8">
                                <textarea name="description1" class="text-gray-700 w-full border p-3 rounded-lg h-40 mb-4" rows="4">{{ $abt->description1 }}</textarea>
                                <textarea name="description2" class="text-gray-700 w-full border p-3 rounded-lg h-40" rows="4">{{ $abt->description2 }}</textarea>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end mt-6">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors">
                                Update
                            </button>
                        </div>
                    </form>
                @endforeach



                <div class="flex flex-col">
                    <div class="flex flex-col mt-8">
                        <!-- Meet the Team -->
                        <div class="container max-w-7xl px-4">
                            <!-- Section Header -->
                            <!-- Team Members -->
                            <div class="max-w-7xl mx-auto p-6 bg-white shadow-lg rounded-lg">
                                <div class="max-w-2xl mb-10">
                                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 ">Edit Team Section</h2>
                                </div>
                                <div class="flex flex-wrap -mx-4">
                                    @foreach ($team as $member)
                                        <!-- Update Form -->
                                        <form action="{{ route('team.update', $member->id) }}" method="POST"
                                            enctype="multipart/form-data" class="w-full md:w-6/12 lg:w-3/12 px-4 mb-6">
                                            @csrf
                                            @method('PUT')

                                            <!-- Team Member -->
                                            <div
                                                class="flex flex-col items-center bg-gray-100 p-6 rounded-lg shadow-lg">
                                                <!-- Avatar -->
                                                <div class="relative">
                                                    <label for="photo-preview-{{ $member->id }}"
                                                        class="cursor-pointer">
                                                        <div id="avatar-preview-{{ $member->id }}"
                                                            class="bg-no-repeat bg-cover bg-gray-200 border border-gray-300"
                                                            style="background-image: url('{{ asset('storage/image/about/' . $member->image_path) }}'); background-position: center; height: 200px; width: 200px;">
                                                        </div>
                                                    </label>
                                                    <input type="file" id="photo-preview-{{ $member->id }}"
                                                        name="images" accept=".png, .jpg, .jpeg"
                                                        class="absolute inset-0 opacity-0 cursor-pointer"
                                                        onchange="previewImage(event, 'avatar-preview-{{ $member->id }}')">
                                                </div>

                                                <!-- Details -->
                                                <div class="text-center mt-4">
                                                    <!-- Name -->
                                                    <input type="text" name="names"
                                                        value="{{ $member->team_name }}"
                                                        class="text-gray-900 text-lg font-semibold bg-transparent border-b border-gray-300 focus:border-gray-500 focus:outline-none px-2 py-1 w-full max-w-xs"
                                                        placeholder="Team Member Name">
                                                </div>
                                                <div class="flex justify-between mt-6 w-full">
                                                    <!-- Update Button -->
                                                    <button type="submit"
                                                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors">
                                                        Update 
                                                    </button>
                                                </form>
                                                    <!-- Delete Form -->
                                                    <form action="{{ route('team.destroy', $member->id) }}"
                                                        method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg transition-colors">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                       
                                    @endforeach

                                    <form action="{{ route('team.store') }}" method="POST"
                                        enctype="multipart/form-data" class="w-full md:w-6/12 lg:w-3/12 px-4 mb-6">
                                        @csrf

                                        <!-- Team Member -->
                                        <div class="flex flex-col items-center bg-gray-100 p-6 rounded-lg shadow-lg">
                                            <!-- Avatar -->
                                            <div class="relative">
                                                <label for="photo-preview-new" class="cursor-pointer">
                                                    <div id="avatar-preview-new"
                                                        class="bg-no-repeat bg-cover bg-gray-200 border border-gray-300"
                                                        style="background-image: url('{{ asset('default-avatar.jpg') }}'); background-position: center; height: 200px; width: 200px;">
                                                    </div>
                                                </label>
                                                <input type="file" id="photo-preview-new" name="images"
                                                    accept=".png, .jpg, .jpeg"
                                                    class="absolute inset-0 opacity-0 cursor-pointer"
                                                    onchange="previewImage(event, 'avatar-preview-new')">
                                            </div>

                                            <!-- Details -->
                                            <div class="text-center mt-4">
                                                <!-- Name -->
                                                <input type="text" name="names"
                                                    class="text-gray-900 text-lg font-semibold bg-transparent border-b border-gray-300 focus:border-gray-500 focus:outline-none px-2 py-1 w-full max-w-xs"
                                                    placeholder="Team Member Name">
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="flex justify-end mt-6">
                                                <button type="submit"
                                                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors">
                                                    Add Team Member
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>




                                <!-- resources/views/team/create.blade.php -->

                            </div>
                            <h2 class="text-2xl font-bold mb-4">Manage PDFs</h2>

                            @foreach ($about as $aboutItem)
                                @if ($aboutItem->pdf_path)
                                    <!-- Check if a PDF is already uploaded -->
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Current PDF:</label>
                                        <a href="{{ asset('storage/pdfs/' . $aboutItem->pdf_path) }}"
                                            class="text-blue-500 underline" target="_blank">{{ $aboutItem->pdf_title }}</a>
                                        <small class="text-gray-500">You cannot upload another PDF.</small>
                                    </div>
                                @else
                                    <!-- Form to Upload PDF if none exists -->
                                    <form action="{{ route('about.pdf.store', $aboutItem->id) }}" method="POST"
                                        enctype="multipart/form-data" class="mb-6">
                                        @csrf
                                        <div class="mb-4">
                                            <label class="block text-gray-700">Upload PDF:</label>
                                            <input type="file" name="pdf" accept="application/pdf"
                                                class="w-full px-4 py-2 border rounded-lg" required>
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-gray-700">PDF Title:</label>
                                            <input type="text" name="title" class="w-full px-4 py-2 border rounded-lg"
                                                placeholder="PDF Title" required>
                                        </div>
                                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Upload PDF</button>
                                    </form>
                                @endif
                            @endforeach
                            
                            <!-- Form Edit PDF jika sedang mengedit PDF -->
                            @if(isset($editingPDF)) 
                                <form action="{{ route('about.pdf.update', [$about->id, $editingPDF->id]) }}" method="POST" enctype="multipart/form-data" class="mb-6">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Update PDF File:</label>
                                        <input type="file" name="pdf" accept="application/pdf" class="w-full px-4 py-2 border rounded-lg">
                                        <small class="text-gray-500">Current File: {{ $editingPDF->pdf_path }}</small>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700">PDF Title:</label>
                                        <input type="text" name="title" class="w-full px-4 py-2 border rounded-lg" value="{{ $editingPDF->pdf_title }}" required>
                                    </div>
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Update PDF</button>
                                </form>
                            @endif
                            
                            <!-- Tabel PDF yang sudah di-upload -->
                            <h3 class="text-xl font-semibold mb-4">Uploaded PDFs</h3>
                            <table class="w-full table-auto bg-white shadow-lg rounded-lg">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2">Title</th>
                                        <th class="px-4 py-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($about as $pdf)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $pdf->pdf_title }}</td>
                                        <td class="border px-4 py-2">
                                            <!-- Tombol untuk Edit PDF -->
                            
                                            <!-- Delete PDF -->
                                            <form action="{{ route('about.pdf.delete', $pdf->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            <!-- Form Edit PDF that will be filled with data when the edit button is clicked -->
                            
                            
                            
                            


                        </div>
                    </div>
                </div>
            </div>
            <script>
                function previewPhoto(event, previewId) {
                    console.log('Preview photo function called');
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function() {
                            const output = document.getElementById(previewId);
                            output.style.backgroundImage = `url(${reader.result})`;
                            console.log('Image preview updated');
                        };
                        reader.readAsDataURL(file);
                    } else {
                        console.log('No file selected');
                    }
                }

                function previewImage(event, previewId) {
                    const reader = new FileReader();
                    reader.onload = function() {
                        const output = document.getElementById(previewId);
                        output.style.backgroundImage = `url(${reader.result})`;
                    };
                    if (event.target.files[0]) {
                        reader.readAsDataURL(event.target.files[0]);
                    }
                }
            </script>
</body>

</html>
