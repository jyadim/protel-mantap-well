<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>References | PME Bandung</title>
</head>

<body>
    <x-navbar></x-navbar>
    <div class="container mx-auto px-4 pt-36">
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
    </div>
    @foreach ($references as $reference)
        @if (!$reference['title'] || ($reference['description'] && $reference['title'] !== 'Partners'))
            <section class="text-gray-700 body-font border-t border-gray-200">
                <div class="container mx-auto px-6 lg:px-12 py-24 lg:py-32 flex flex-col md:flex-row items-center">
                    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-full mb-10 md:mb-0">
                        <img class="object-cover object-center rounded" alt="{{ $reference['title'] }}"
                            src="{{ asset('storage/image/references/' . $reference['image']) }}">
                    </div>
                    <div
                        class="lg:flex-grow md:w-1/2 lg:pl-20 flex flex-col md:items-start md:text-left items-center text-justify">
                        <h1 class="title-font sm:text-5xl md:text-4xl text-3xl mb-6 font-medium text-gray-900">
                            {{ $reference['title'] }}</h1>
                        <p class="mb-10 leading-relaxed text-justify text-lg lg:text-xl">{{ $reference['description'] }}
                        </p>
                        <div class="flex justify-center">
                            <a href="/gallery/{{ $reference['slug'] }}"
                                class="inline-flex text-white bg-lime-600 border-0 py-3 px-8 focus:outline-none hover:bg-lime-700 rounded text-lg">See
                                more</a>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if (isset($reference['partners']) && count($reference['partners']) > 0)
        <section class="text-gray-700 body-font border-t border-gray-200">
            <div class="container mx-auto px-6 lg:px-12 py-12 md:py-24">
                <div class="flex flex-col md:flex-row items-start">
                    <!-- Vertical layout for partner images and details -->
                    <div class="lg:max-w-lg lg:w-1/2 md:w-full w-full mb-6 md:mb-0 flex flex-col space-y-4">
                        @foreach ($partners as $itil)
                            <img alt="feature" class="object-cover object-center h-auto w-full rounded-lg"
                                src="{{ asset('storage/image/references/' . $itil['image_path']) }}">
                        @endforeach
                    </div>
        
                    <div class="lg:flex-grow md:w-1/2 lg:pl-20 flex flex-col md:items-start md:text-left items-center text-justify">
                        <div class="flex flex-col space-y-4">
                            @foreach ($partners as $index => $item)
                                <!-- Each partner card -->
                                <div class="w-full p-4">
                                    <div class="bg-white shadow-lg p-6 rounded-lg flex flex-col items-start">
                                        <!-- Parent Title inside Card -->
                                        <h2 class="text-xl font-semibold text-gray-900 mb-4">
                                            {{ $item['partner_title'] }}
                                        </h2>
        
                                        <!-- Partner Logo and Title -->
                                        <div class="flex flex-col space-y-2">
                                            @foreach ($item['partners'] as $partnerIndex => $partner)
                                                <div class="w-full flex items-start mb-2 partner-item-{{ $index }}"
                                                    style="{{ $partnerIndex >= 3 ? 'display: none;' : '' }}">
                                                    <div
                                                        class="w-6 h-6 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mr-4">
                                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" class="w-6 h-6"
                                                            viewBox="0 0 24 24">
                                                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <h3 class="text-lg font-medium text-gray-900">
                                                            {{ $partner['title'] }}
                                                        </h3>
                                                        <a href="{{ $partner['link'] }}"
                                                            class="text-blue-500 hover:underline" target="_blank">
                                                            {{ $partner['text'] }}
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
        
                                        <!-- See More button -->
                                        @if (count($item['partners']) > 4)
                                            <button onclick="togglePartners({{ $index }}, this)"
                                                class="mt-4 text-blue-500 hover:underline">
                                                See More
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
        
                        <div class="mt-8 flex justify-center md:justify-start">
                            <a href="/gallery/{{ $reference['slug'] }}"
                                class="inline-flex text-white bg-lime-600 border-0 py-3 px-6 focus:outline-none hover:bg-lime-700 rounded text-lg">
                                See more
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        @endif

        <script>
            function togglePartners(index, button) {
                const partnerItems = document.querySelectorAll(`.partner-item-${index}`);
                let isExpanded = false;

                partnerItems.forEach((item, idx) => {
                    // Toggle display of items with index >= 6
                    if (idx >= 3) {
                        if (item.style.display === 'none') {
                            item.style.display = 'flex';
                            isExpanded = true;
                        } else {
                            item.style.display = 'none';
                        }
                    }
                });

                // Update button text based on the current display state
                button.textContent = isExpanded ? 'See Less' : 'See More';
            }
        </script>
    @endforeach
    @if ($references->isNotEmpty())
        @php
            $firstItem = $references->first();
        @endphp

        <form action="{{ route('ref.pdf.download', $firstItem->id) }}" method="GET" onclick="showNotification()">
            <input type="hidden" name="id" value="{{ $firstItem->id }}">
            <button type="submit"
                class="fixed bottom-4 right-4 max-w-[140px] py-2 px-4 flex justify-center items-center bg-lime-600 hover:bg-lime-700 focus:ring-lime-500 focus:ring-offset-lime-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                <svg width="20" height="20" fill="currentColor" class="mr-2" viewBox="0 0 1792 1792"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1344 1472q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm256 0q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm128-224v320q0 40-28 68t-68 28h-1472q-40 0-68-28t-28-68v-320q0-40 28-68t68-28h427q21 56 70.5 92t110.5 36h256q61 0 110.5-36t70.5-92h427q40 0 68 28t28 68zm-325-648q-17 40-59 40h-256v448q0 26-19 45t-45 19h-256q-26 0-45-19t-19-45v-448h-256q-42 0-59-40-17-39 14-69l448-448q18-19 45-19t45 19l448 448q31 30 14 69z">
                    </path>
                </svg>
                Download Brochure
            </button>
        </form>
    @endif


    <x-footer></x-footer>
</body>

</html>
