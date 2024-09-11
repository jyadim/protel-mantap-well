<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AdminProtel</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" />
    <style>
        /* Additional custom styles */
        .form-section {
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            font-size: 1.125rem;
            color: #4A5568;
            margin-bottom: 0.5rem;
        }
        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #E2E8F0;
            border-radius: 0.375rem;
            font-size: 1rem;
            color: #2D3748;
        }
        .form-group input::placeholder {
            color: #A0AEC0;
        }
        .map-preview {
            border: 1px solid #E2E8F0;
            border-radius: 0.375rem;
            overflow: hidden;
        }
        .map-preview iframe {
            width: 100%;
            height: 480px;
            border: none;
        }
        .btn-primary {
            background-color: #3182CE;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            font-size: 1rem;
            border: none;
            cursor: pointer;
        }
        .btn-primary:hover {
            background-color: #2B6CB0;
        }
    </style>
</head>

<body>
    <div class="min-h-screen">
        <div class="fixed bg-white text-blue-800 px-10 py-1 z-10 w-full border-b-2">
            <div class="flex items-center justify-between py-2 text-5x1">
                <div class="font-bold text-blue-600 text-xl">Admin<span class="text-lime-600">Protel</span></div>
            </div>
        </div>

        <div class="flex flex-row pt-24 px-10 pb-4">
            <x-sidebar :product="$product" :ref="$ref"></x-sidebar>

            <div class="bg-white flex-1 p-8">
                <section class="text-gray-600 body-font">
                    <div class="container mx-auto">
                        <div class="max-w-3xl mx-auto">
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
                            <h2 class="text-3xl font-bold mb-6">Edit Contact's Home Section</h2>

                            <form action="{{ route('contact.update', $contact_info->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-section">
                                    <div class="form-group">
                                        <label for="email">Change Email:</label>
                                        <input type="email" id="email" name="email" placeholder="Input Email" value="{{ $contact_info->email }}">
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="phone">Change Phone Number:</label>
                                        <input type="text" id="phone" name="phone" placeholder="Input Phone Number" value="{{ $contact_info->mobile }}">
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="office_phone">Change LandLine:</label>
                                        <input type="text" id="office_phone" name="office_phone" placeholder="Input LandLine" value="{{ $contact_info->land_line }}">
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="company_address">Change Company Address:</label>
                                        <input type="text" id="company_address" name="company_address" placeholder="Input Company Address" value="{{ $contact_info->address }}">
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="google-maps-address">Change Google Maps Address:</label>
                                        <input id="google-maps-address" type="text" placeholder="Input Google Maps Address" name="link_maps" value="{{ $contact_info->link_maps }}">
                                    </div>
                            
                                    <div class="form-group">
                                        <div class="flex justify-between items-center">
                                            <button type="button" onclick="updateMapPreview()" class="btn-primary">Preview Location</button>
                                        </div>
                                    </div>
                            
                                    <div class="form-group map-preview">
                                        <iframe id="google-maps-preview" src="{{ $contact_info->link_maps }}" allowfullscreen="" loading="lazy"></iframe>
                                    </div>
                            
                                    <button type="submit" class="btn-primary">Save Changes</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <script>
            function extractLocationFromUrl(url) {
                const placeIdRegex = /place\/(.*?)\/@/;
                const match = url.match(placeIdRegex);
                if (match) {
                    return match[1];
                }

                const coordRegex = /@(-?\d+\.\d+),(-?\d+\.\d+),/;
                const coordMatch = url.match(coordRegex);
                if (coordMatch) {
                    return `-geo=${coordMatch[1]},${coordMatch[2]}`;
                }

                return null;
            }

            function updateMapPreview() {
                const addressInput = document.getElementById('google-maps-address').value;
                const iframe = document.getElementById('google-maps-preview');

                const location = extractLocationFromUrl(addressInput);
                const mapUrl = location ? `https://www.google.com/maps?q=${encodeURIComponent(location)}&output=embed` : '';

                iframe.src = mapUrl;
            }

            document.getElementById('google-maps-address').addEventListener('input', updateMapPreview);
        </script>
    </div>
</body>

</html>
