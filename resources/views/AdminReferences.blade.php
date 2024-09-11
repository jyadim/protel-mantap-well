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
                        @if ($reference['title'] || $reference['description'])
                            <!-- Update Form for Reference -->
                            <form method="POST" action="{{ route('reference.update', $reference['id']) }}" enctype="multipart/form-data" class="space-y-6">
                                @csrf
                                @method('PUT')

                                <!-- Reference Information -->
                                <section class="text-gray-700 body-font border-t border-gray-200">
                                    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-24">
                                        <div class="flex flex-col md:flex-row items-center">
                                            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-full mb-6 md:mb-0">
                                                <img alt="feature" class="object-cover object-center h-full w-full" src="{{ asset('storage/image/references/'.$reference['image']) }}">
                                            </div>
                                            <div class="md:w-1/2 w-full lg:pl-16">
                                                <section class="py-6">
                                                    <div class="container mx-auto px-4">
                                                        <div class="mb-4">
                                                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                                                            <input type="text" id="title" name="title" value="{{ old('title', $reference->title) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-lime-500 mb-4" required>
                                                        </div>

                                                        <div class="mb-4">
                                                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                                                            <textarea id="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-lime-500 mb-4" rows="4" required>{{ old('description', $reference->description) }}</textarea>
                                                        </div>

                                                        <div class="mb-4">
                                                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                                                            <input type="file" id="image" name="image" class="object-cover object-center rounded w-full">
                                                        </div>

                                                        <div class="mt-6 flex justify-center">
                                                            <button type="submit" class="inline-flex text-white bg-lime-600 border-0 py-2 px-6 focus:outline-none hover:bg-lime-700 rounded text-lg">Update Reference</button>
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
                            @if (isset($reference['partners']) && count($reference['partners']) > 0)
                            <form method="POST" action="{{ route('reference.partners.update', $reference['id']) }}" class="space-y-6" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                        
                                <input type="hidden" name="reference_id" value="{{ $reference['id'] }}">
                        
                                <section class="text-gray-700 body-font border-t border-gray-200">
                                    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-24">
                                        <div class="flex flex-col md:flex-row items-center">
                                            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-full mb-6 md:mb-0">
                                                <img alt="feature" class="object-cover object-center h-full w-full" src="{{ asset('storage/image/references/'.$reference['image']) }}">
                                            </div>
                                            <div class="md:w-1/2 w-full lg:pl-16">
                                                <div class="grid grid-cols-2 gap-4">
                                                    @foreach ($reference['partners'] as $partner)
                                                        <div class="flex flex-col items-center md:items-start p-4 border rounded-lg shadow-sm bg-white">
                                                            <div class="w-10 h-10 md:w-12 md:h-12 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4 md:mb-5">
                                                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 md:w-6 md:h-6" viewBox="0 0 24 24">
                                                                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                                                </svg>
                                                            </div>
                                                            <div class="text-center md:text-left w-full">
                                                                <div class="mb-4">
                                                                    <label for="partner-title-{{ $partner['id'] }}" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                                                                    <input type="text" id="partner-title-{{ $partner['id'] }}" name="partners[{{ $partner['id'] }}][title]" value="{{ old('partners.' . $partner['id'] . '.title', $partner['title']) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                                                </div>
                        
                                                                <div class="mb-4">
                                                                    <label for="partner-text-{{ $partner['id'] }}" class="block text-gray-700 text-sm font-bold mb-2">Text:</label>
                                                                    <input type="text" id="partner-text-{{ $partner['id'] }}" name="partners[{{ $partner['id'] }}][text]" value="{{ old('partners.' . $partner['id'] . '.text', $partner['text']) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                                                </div>
                        
                                                                <div class="mb-4">
                                                                    <label for="partner-link-{{ $partner['id'] }}" class="block text-gray-700 text-sm font-bold mb-2">Link:</label>
                                                                    <input type="url" id="partner-link-{{ $partner['id'] }}" name="partners[{{ $partner['id'] }}][link]" value="{{ old('partners.' . $partner['id'] . '.link', $partner['link']) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                                                </div>
                        
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="mb-4">
                                                    <label for="partner-image-{{ $partner['id'] }}" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                                                    <input type="file" id="partner-image-{{ $partner['id'] }}" name="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                </div>
                                                <div class="mt-6 md:mt-7 flex justify-center md:justify-start">
                                                    <button type="submit" class="inline-flex text-white bg-lime-600 border-0 py-2 px-4 md:py-2 md:px-6 focus:outline-none hover:bg-lime-700 rounded text-sm md:text-lg">Update Partners</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </form>
                        @endif
                        
                        
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</body>

</html>
