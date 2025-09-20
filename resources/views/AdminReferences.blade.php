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
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet" />

    <div class="min-h-screen">
        <!-- Header -->
        <header class="fixed bg-white text-blue-800 px-10 py-2 z-10 w-full border-b-2">
            <div class="flex items-center justify-between text-xl">
                <div class="font-bold text-blue-600">Admin<span class="text-lime-600">Protel</span></div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="pt-24 px-10 pb-4">
            <div class="flex">
                <x-sidebar :product="$product" :ref="$ref"></x-sidebar>

                <!-- Content Area -->
                <div class="w-full md:w-10/12">
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

                    @foreach ($references as $reference)
                        @if (!$reference['title'] || ($reference['description'] && $reference['title'] !== 'Partners'))
                            <!-- Update Form for Reference -->
                            <form method="POST" action="{{ route('reference.update', $reference['id']) }}"
                                enctype="multipart/form-data" class="space-y-6">
                                @csrf
                                @method('PUT')

                                <!-- Reference Information -->
                                <section class="text-gray-700 body-font border-t border-gray-200">
                                    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-24">
                                        <div class="flex flex-col md:flex-row items-center">
                                            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-full mb-6 md:mb-0">
                                                <img alt="feature" class="object-cover object-center h-full w-full"
                                                    src="{{ asset('storage/image/references/' . $reference['image']) }}">
                                            </div>
                                            <div class="md:w-1/2 w-full lg:pl-16">
                                                <section class="py-6">
                                                    <div class="container mx-auto px-4">
                                                        <div class="mb-4">
                                                            <label for="title"
                                                                class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                                                            <input type="text" id="title" name="title"
                                                                value="{{ old('title', $reference->title) }}"
                                                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-lime-500 mb-4"
                                                                required>
                                                        </div>

                                                        <div class="mb-4">
                                                            <label for="description"
                                                                class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                                                            <textarea id="description" name="description"
                                                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-lime-500 mb-4"
                                                                rows="4" required>{{ old('description', $reference->description) }}</textarea>
                                                        </div>

                                                        <div class="mb-4">
                                                            <label for="image"
                                                                class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                                                            <input type="file" id="image" name="image"
                                                                class="object-cover object-center rounded w-full">
                                                        </div>

                                                        <div class="mt-6 flex justify-center">
                                                            <button type="submit"
                                                                class="inline-flex text-white bg-lime-600 border-0 py-2 px-6 focus:outline-none hover:bg-lime-700 rounded text-lg">Update
                                                                Reference</button>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </form>
                        @endif
                        <!-- Update Form for Partners -->
                    @endforeach
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold mb-4">Manage Partners</h2>
                        @foreach ($partners as $item)
                            <div class="lg:flex lg:items-center lg:space-x-6 mb-6">
                                <!-- Image Section -->
                                <div class="lg:w-1/2 w-full mb-4 lg:mb-0">
                                    <img alt="feature"
                                        class="object-cover object-center h-full w-full rounded-lg shadow-md"
                                        src="{{ asset('storage/image/references/' . $item['image_path']) }}">
                                </div>

                                <!-- Update Image Form Section -->
                                <div class="lg:w-1/2 w-full">
                                    <form action="{{ route('reference.partners.image.update', $item['id']) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-4">
                                            <label for="partner[{{ $item['id'] }}][image_path]"
                                                class="block text-gray-700">Update Image:</label>
                                            <input type="file" name="partner[{{ $item['id'] }}][image_path]"
                                                id="image" class="w-full px-4 py-2 border rounded-lg">
                                        </div>
                                        <button type="submit"
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                                            Update Image
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach

                        <div class="p-6 border rounded-lg bg-white shadow-lg mb-8">
                            <h3 class="text-xl font-semibold mb-4">Existing Partners</h3>

                            <!-- Partner Select Dropdown -->
                            <select name="partner" id="partner-select" class="w-full px-4 py-2 border rounded-lg">
                                <option value="">Select Partner Type</option>
                                @foreach ($partners as $partner)
                                    <option value="{{ $partner->id }}">{{ $partner->partner_title }}</option>
                                @endforeach
                            </select>

                            <!-- Partner Display Section -->
                            <div id="partner-list" class="mt-4">
                                @foreach ($reference->partners as $partner)
                                    <div class="flex flex-col mb-4 p-4 border rounded-lg shadow-sm bg-gray-100 partner-item"
                                        data-partner-id="{{ $partner->partner_id }}">
                                        <!-- Partner Information Display -->
                                        <div class="flex items-center">
                                            <div class="flex-1">
                                                <p><strong>Title:</strong> {{ $partner->title }}</p>
                                                <p><strong>Text:</strong> {{ $partner->text }}</p>
                                                <p><strong>Link:</strong> <a href="{{ $partner->link }}"
                                                        target="_blank" class="text-blue-600">{{ $partner->link }}</a>
                                                </p>
                                            </div>
                                            <!-- Delete Button -->
                                            <form action="{{ route('partners.delete', $partner->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this partner?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 text-white px-3 py-1 rounded-lg">Delete</button>
                                            </form>
                                            <!-- Update Button -->
                                            <button onclick="showUpdateForm({{ $partner->id }})"
                                                class="bg-blue-500 text-white px-3 py-1 rounded-lg ml-2">Update</button>
                                        </div>

                                        <!-- Hidden Update Form -->
                                        <div id="update-form-{{ $partner->id }}"
                                            class="mt-4 p-4 border rounded-lg bg-white shadow-md"
                                            style="display: none;">
                                            <form action="{{ route('reference.partners.update', $reference['id']) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="reference_id"
                                                    value="{{ $reference['id'] }}">

                                                <div class="mb-4">
                                                    <label for="title-{{ $partner->partner_id }}"
                                                        class="block text-gray-700">Title:</label>
                                                    <input type="text"
                                                        name="partners[{{ $partner['id'] }}][title]"
                                                        id="title-{{ $partner->partner_id }}"
                                                        value="{{ $partner->title }}"
                                                        class="w-full px-4 py-2 border rounded-lg">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="text-{{ $partner->partner_id }}"
                                                        class="block text-gray-700">Text:</label>
                                                    <input type="text" name="partners[{{ $partner['id'] }}][text]"
                                                        id="text-{{ $partner->partner_id }}"
                                                        value="{{ $partner->text }}"
                                                        class="w-full px-4 py-2 border rounded-lg">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="link-{{ $partner->partner_id }}"
                                                        class="block text-gray-700">Link:</label>
                                                    <input type="text" name="partners[{{ $partner['id'] }}][link]"
                                                        id="link-{{ $partner->partner_id }}"
                                                        value="{{ $partner->link }}"
                                                        class="w-full px-4 py-2 border rounded-lg">
                                                </div>
                                                <button type="submit"
                                                    class="bg-green-600 hover:bg-lime-700 text-white px-4 py-2 rounded-lg">Save
                                                    Changes</button>
                                                <button type="button" onclick="hideUpdateForm({{ $partner->id }})"
                                                    class="bg-gray-500 text-white px-4 py-2 rounded-lg ml-2">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Add Partner Form -->
                        <div class="p-6 border rounded-lg bg-gray-50 shadow-lg mb-8">
                            <h3 class="text-xl font-semibold mb-4">Add Partner</h3>
                            <form action="{{ route('partners.store', $reference->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label for="title" class="block text-gray-700">Select Partnership:</label>
                                    <select name="partner" class="w-full px-4 py-2 border rounded-lg">
                                        @foreach ($partners as $partner)
                                            <option value="{{ $partner->id }}">{{ $partner->partner_title }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="mb-4">
                                    <label for="title" class="block text-gray-700">Title:</label>
                                    <input type="text" name="title" id="title"
                                        class="w-full px-4 py-2 border rounded-lg" required>
                                </div>

                                <div class="mb-4">
                                    <label for="text" class="block text-gray-700">Text:</label>
                                    <input type="text" name="text" id="text"
                                        class="w-full px-4 py-2 border rounded-lg" required>
                                </div>

                                <div class="mb-4">
                                    <label for="link" class="block text-gray-700">Link:</label>
                                    <input type="url" name="link" id="link"
                                        class="w-full px-4 py-2 border rounded-lg" required>
                                </div>


                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg w-full">Add
                                    Partner</button>
                            </form>
                        </div>

                        <!-- Existing Partners List -->


                    </div>

                    <!-- JavaScript to Show Partners Based on Selected Partner ID -->
                    <!-- Partner Type Dropdown -->
                    <select id="partner-select" onchange="togglePartnerList()">
                        <option value="">Select Partner Type</option>
                        @foreach ($partners as $partner)
                            <option value="{{ $partner->partner_id }}">{{ $partner->title }}</option>
                        @endforeach
                    </select>

                    <!-- Partner List Container -->
                    <div id="partner-list" class="mt-4" style="display: none;">
                        @foreach ($reference->partners as $partner)
                            <div class="flex flex-col mb-4 p-4 border rounded-lg shadow-sm bg-gray-100 partner-item"
                                data-partner-id="{{ $partner->partner_id }}">
                                <!-- Partner Information Display -->
                                <div class="flex items-center">
                                    <div class="flex-1">
                                        <p><strong>Title:</strong> {{ $partner->title }}</p>
                                        <p><strong>Text:</strong> {{ $partner->text }}</p>
                                        <p><strong>Link:</strong> <a href="{{ $partner->link }}" target="_blank"
                                                class="text-blue-600">{{ $partner->link }}</a></p>
                                    </div>
                                    <!-- Delete Button -->
                                    <form action="{{ route('partners.delete', $partner->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this partner?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white px-3 py-1 rounded-lg">Delete</button>
                                    </form>
                                    <!-- Update Button -->
                                    <button onclick="showUpdateForm({{ $partner->partner_id }})"
                                        class="bg-blue-500 text-white px-3 py-1 rounded-lg ml-2">Update</button>
                                </div>

                                <!-- Hidden Update Form -->
                                <div id="update-form-{{ $partner->partner_id }}"
                                    class="mt-4 p-4 border rounded-lg bg-white shadow-md" style="display: none;">
                                    <form action="{{ route('reference.partners.update', $reference['id']) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="reference_id" value="{{ $reference['id'] }}">

                                        <div class="mb-4">
                                            <label for="title-{{ $partner->partner_id }}"
                                                class="block text-gray-700">Title:</label>
                                            <input type="text" name="partners[{{ $partner['id'] }}][title]"
                                                id="title-{{ $partner->partner_id }}" value="{{ $partner->title }}"
                                                class="w-full px-4 py-2 border rounded-lg">
                                        </div>
                                        <div class="mb-4">
                                            <label for="text-{{ $partner->partner_id }}"
                                                class="block text-gray-700">Text:</label>
                                            <input type="text" name="partners[{{ $partner['id'] }}][text]"
                                                id="text-{{ $partner->partner_id }}" value="{{ $partner->text }}"
                                                class="w-full px-4 py-2 border rounded-lg">
                                        </div>
                                        <div class="mb-4">
                                            <label for="link-{{ $partner->partner_id }}"
                                                class="block text-gray-700">Link:</label>
                                            <input type="text" name="partners[{{ $partner['id'] }}][link]"
                                                id="link-{{ $partner->partner_id }}" value="{{ $partner->link }}"
                                                class="w-full px-4 py-2 border rounded-lg">
                                        </div>
                                        <button type="submit"
                                            class="bg-green-600 hover:bg-lime-700 text-white px-4 py-2 rounded-lg">Save
                                            Changes</button>
                                        <button type="button" onclick="hideUpdateForm({{ $partner->partner_id }})"
                                            class="bg-gray-500 text-white px-4 py-2 rounded-lg ml-2">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <script>
                        function togglePartnerList() {
                            const select = document.getElementById("partner-select");
                            const partnerList = document.getElementById("partner-list");

                            if (select.value) {
                                partnerList.style.display = "block";
                            } else {
                                partnerList.style.display = "none";
                            }
                        }

                        // Ensure the correct display state on page load
                        window.addEventListener('DOMContentLoaded', function() {
                            togglePartnerList();
                        });
                    </script>

                    <script>
                        document.getElementById('partner-select').addEventListener('change', function() {
                            const selectedPartnerId = this.value;
                            const partnerList = document.getElementById('partner-list');
                            const partnerItems = document.querySelectorAll('.partner-item');

                            if (selectedPartnerId) {
                                // Show the partner list if a specific partner is selected
                                partnerList.style.display = 'block';
                                partnerItems.forEach(item => {
                                    item.style.display = item.getAttribute('data-partner-id') === selectedPartnerId ?
                                        'flex' : 'none';
                                });
                            } else {
                                // Hide the partner list if "Select Partners Type" is chosen
                                partnerList.style.display = 'none';
                            }
                        });

                        function showUpdateForm(partnerId) {
                            document.querySelectorAll('[id^="update-form-"]').forEach(form => form.style.display = 'none');
                            document.getElementById(`update-form-${partnerId}`).style.display = 'block';
                        }

                        function hideUpdateForm(partnerId) {
                            document.getElementById(`update-form-${partnerId}`).style.display = 'none';
                        }
                    </script>






                    <h2 class="text-2xl font-bold mb-4">Manage PDFs</h2>

                    <form action="{{ route('ref.pdf.store', $reference->id) }}" method="POST"
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
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Upload
                            PDF</button>
                    </form>




                                    <!-- Display existing PDF -->
                                    <h3 class="text-xl font-semibold mb-4">Uploaded PDFs</h3>
                                    <table class="w-full table-auto bg-white shadow-lg rounded-lg">
                                        <thead>
                                            <tr>
                                                <th class="px-4 py-2">Title</th>
                                                <th class="px-4 py-2">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reference->pdf_ref as $pdf)
                                                <tr>
                                                    <td class="border px-4 py-2">{{ $pdf->pdf_title }}</td>
                                                    <td class="border px-4 py-2">
                                                        <!-- Tombol untuk Edit PDF -->

                                                        <!-- Delete PDF -->
                                                        <form action="{{ route('ref.pdf.delete', $pdf->id) }}"
                                                            method="POST" class="inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="bg-red-500 text-white px-4 py-2 rounded-lg">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                       

                    <!-- Show upload form only if no PDFs exist across all references -->

                </div>
            </div>
        </main>
    </div>
</body>

</html>
