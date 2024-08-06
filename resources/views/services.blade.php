<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>pme-bandung</title>
    <style>
        .content {
            display: none;
        }

        .expandable {
            cursor: pointer;
        }

        .details {
            display: none;
            margin-top: 10px;
            border: 1px solid #ddd;
            padding: 20px;
            /* Increased padding for larger content area */
            background-color: #f9f9f9;
            /* Light background color for contrast */
            border-radius: 8px;
            /* Rounded corners for the details section */
            position: relative;

        }

        .card-container {
            position: relative;
            margin-bottom: 20px;
            /* Spacing between cards and their details */
        }

        .expandable:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Subtle shadow on hover */
        }
    </style>
</head>

<body>
    <div class="min-h-full">
        <x-navbar></x-navbar>
        <main>
            <section id="features" class="container mx-auto px-4 space-y-6 py-10 md:py-12 lg:py-20 mt-10">

                <div class="mx-auto flex max-w-[58rem] flex-col items-center space-y-4 text-center">

                    <h2 class="font-bold text-3xl leading-[1.1] sm:text-3xl md:text-6xl">Services</h2>

                    <p class="max-w-[85%] leading-normal text-muted-foreground sm:text-lg sm:leading-7">
                        With our experiences, resources and extensive networks, we can support your project from early
                        stage to final operation and. We provide the following services:
                    </p>

                </div>

                <div class="mx-auto grid justify-center gap-4 sm:grid-cols-2 md:max-w-[64rem] md:grid-cols-3">
                    @foreach ($services as $service)
                        <div class="card-container">
                            <div class="relative overflow-hidden rounded-lg border bg-white select-none hover:shadow hover:shadow-lime-200 p-2 expandable"
                                data-target="{{ $service['id'] }}">
                                <div class="flex h-[300px] flex-col justify-between rounded-md p-6">
                                    <div class="space-y-2">
                                        <h3 class="font-bold">{{ $service['title'] }}</h3>
                                        <p class="text-sm text-muted-foreground">{{ $service['detail'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div id="{{ $service['id'] }}" class="details">
                                <p>{{ $service['image'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </section>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var expandables = document.querySelectorAll('.expandable');
                    expandables.forEach(function(expandable) {
                        expandable.addEventListener('click', function() {
                            var targetId = this.getAttribute('data-target');
                            var content = document.getElementById(targetId);
                            if (content.style.display === 'none' || content.style.display === '') {
                                content.style.display = 'block';
                            } else {
                                content.style.display = 'none';
                            }
                        });
                    });
                });
            </script>
        </main>
        <x-footer></x-footer>
</body>

</html>
