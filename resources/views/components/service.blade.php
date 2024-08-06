<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expandable Sections</title>
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
            padding: 20px; /* Increased padding for larger content area */
            background-color: #f9f9f9; /* Light background color for contrast */
            border-radius: 8px; /* Rounded corners for the details section */
            position: relative;
            
        }

        .card-container {
            position: relative;
            margin-bottom: 20px; /* Spacing between cards and their details */
        }

        .expandable:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow on hover */
        }
    </style>
</head>

<body>

    <section id="features" class="container mx-auto px-4 space-y-6 py-10 md:py-12 lg:py-20 mt-10">

        <div class="mx-auto flex max-w-[58rem] flex-col items-center space-y-4 text-center">

            <h2 class="font-bold text-3xl leading-[1.1] sm:text-3xl md:text-6xl">Services</h2>

            <p class="max-w-[85%] leading-normal text-muted-foreground sm:text-lg sm:leading-7">
                With our experiences, resources and extensive networks, we can support your project from early
                stage to final operation and. We provide the following services:
            </p>

        </div>

        <div class="mx-auto grid justify-center gap-4 sm:grid-cols-2 md:max-w-[64rem] md:grid-cols-3">

            <div class="card-container">
                <div class="relative overflow-hidden rounded-lg border bg-white select-none hover:shadow hover:shadow-lime-200 p-2 expandable"
                    data-target="details1">
                    <div class="flex h-[300px] flex-col justify-between rounded-md p-6">
                        <div class="space-y-2">
                            <h3 class="font-bold">Survey, Planning & Design (Feasibility Study) of MHP</h3>
                            <p class="text-sm text-muted-foreground">We can support you from initial development of
                                a small hydro project such as reconnaissance visit, flow and head measurement,
                                topographic and demographic survey, detailed engineering design and budgeting.</p>
                        </div>
                    </div>
                </div>
                <div id="details1" class="details">
                    <p>p balap</p>
                </div>
            </div>

            <div class="card-container">
                <div class="relative overflow-hidden rounded-lg border bg-white select-none hover:shadow hover:shadow-lime-200 p-2 expandable"
                    data-target="details2">
                    <div class="flex h-[300px] flex-col justify-between rounded-md p-6">
                        <div class="space-y-2">
                            <h3 class="font-bold">Supervision & Quality Assurance of MHP</h3>
                            <p class="text-sm text-muted-foreground">We have qualified and experienced technical
                                team to monitor the construction work and to ensure quality control during
                                construction and operation of a small hydro project.</p>
                        </div>
                    </div>
                </div>
                <div id="details2" class="details">
                    <p>Additional details about Supervision & Quality Assurance...</p>
                </div>
            </div>

            <div class="card-container">
                <div class="relative overflow-hidden rounded-lg border bg-white select-none hover:shadow hover:shadow-lime-200 p-2 expandable"
                    data-target="details3">
                    <div class="flex h-[300px] flex-col justify-between rounded-md p-6">
                        <div class="space-y-2">
                            <h3 class="font-bold">Power Evacuation & Grid Connection</h3>
                            <p class="text-sm text-muted-foreground">We provide service to design power evacuation
                                system, grid connection facilities and necessary coordination for obtaining power
                                purchase agreement.</p>
                        </div>
                    </div>
                </div>
                <div id="details3" class="details">
                    <p>Additional details about Power Evacuation & Grid Connection...</p>
                </div>
            </div>

            <div class="card-container">
                <div class="relative overflow-hidden rounded-lg border bg-white select-none hover:shadow hover:shadow-lime-200 p-2 expandable"
                    data-target="details4">
                    <div class="flex h-[300px] flex-col justify-between rounded-md p-6">
                        <div class="space-y-2">
                            <h3 class="font-bold">Project Management & Consultancy</h3>
                            <p class="text-sm text-muted-foreground">Our experienced team provides comprehensive project management services, ensuring your project is completed on time and within budget.</p>
                        </div>
                    </div>
                </div>
                <div id="details4" class="details">
                    <p>Additional details about Project Management & Consultancy...</p>
                </div>
            </div>

            <div class="card-container">
                <div class="relative overflow-hidden rounded-lg border bg-white select-none hover:shadow hover:shadow-lime-200 p-2 expandable"
                    data-target="details5">
                    <div class="flex h-[300px] flex-col justify-between rounded-md p-6">
                        <div class="space-y-2">
                            <h3 class="font-bold">Environmental Impact Assessment</h3>
                            <p class="text-sm text-muted-foreground">We conduct thorough environmental impact assessments to ensure your project complies with all environmental regulations and standards.</p>
                        </div>
                    </div>
                </div>
                <div id="details5" class="details">
                    <p>Additional details about Environmental Impact Assessment...</p>
                </div>
            </div>

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

</body>

</html>
