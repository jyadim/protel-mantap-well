<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>pme-bandung</title>
</head>

<body>
    <div class="min-h-full">
        <x-navbar></x-navbar>

            <div class="relative overflow-hidden h-screen">
        <video class="object-cover w-full h-full" autoplay muted loop>
            <source src="mp4/microhydro.mp4" type="video/mp4">
        </video>
    </div>
    </div>

<section class="w-full mx-auto py-10 bg-gray-50 dark:bg-white dark:text-white">
    <div class="xl:w-[80%] sm:w-[85%] xs:w-[90%] mx-auto flex md:flex-row xs:flex-col lg:gap-4 xs:gap-2 justify-center lg:items-stretch md:items-center mt-4">
        <div class="lg:w-[50%] xs:w-full">
            <img class="lg:rounded-t-lg sm:rounded-sm xs:rounded-sm h-full object-cover" src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw1fHxob21lfGVufDB8MHx8fDE3MTA0OTAwNjl8MA&ixlib=rb-4.0.3&q=80&w=1080" alt="billboard image" />
        </div>
        <div class="lg:w-[50%] sm:w-full xs:w-full bg-gray-100 dark:bg-white dark:text-gray-400 md:p-4 xs:p-0 rounded-md">
            <h5 class="text-3xl font-semibold text-gray-900 dark:text-black">What is an electronic load controller?</h5>
            <p class="text-md mt-4 dark:text-black">Electronic Load Controller (ELC) is a controller used in micro hydro power to control load and frequency of generator by diverting excess power generated to dummy/ballast load.
                The purpose of ELC is to make sure that generated power is the same with consumed power (main load+ballast load)
                Power diversion to ballast load is done by electronic switch Thyristor and automatically without any moving parts.
                Therefore frequency and voltage will be maintained and stable. Following are some brief advantages of ELC for micro hydro power :<br>
                1. Constant generated frequency and voltage<br>
                2. No water hammer risk, no need to close turbine<br>
                3. Avoid runaway speed on generator<br>
                4. No operator required to control water<br>
                5. Plug and play system, no setting or adjustment<br>
                6. Maintenance free and long lifetime
            </p>
        </div>
    </div>
    
    <!-- col-2 -->
<div class="xl:w-[80%] sm:w-[85%] xs:w-[90%] mx-auto flex md:flex-row xs:flex-col lg:gap-4 xs:gap-2 justify-center lg:items-stretch md:items-center mt-6">
    <!-- Kotak teks -->
   <div class="lg:w-[50%] xs:w-full bg-gray-100 dark:bg-white dark:text-gray-400 md:p-4 xs:p-4 rounded-md flex flex-col">
    <h3 class="text-3xl font-semibold text-gray-900 dark:text-black mb-2">Highlight Features</h3>
    <p class="text-md dark:text-black">
        1. Micro controller based for accuracy and high performance<br>
        2. Phase angle control, two steps for less harmonic<br>
        3. Built in under/over frequency relay<br>
        4. Easy replacement with plug in socket<br>
        5. Panel integrated with metering and protection<br>
        6. Simple and robust easy in transport<br>
        7. Competitive price and most affordable
    </p>
</div>
    <!-- Gambar pada tampilan lebih kecil -->
    <div class="lg:w-[50%] xs:w-full flex-shrink-0">
        <img class="lg:rounded-t-lg sm:rounded-sm xs:rounded-sm w-full h-full object-cover" src="https://images.unsplash.com/photo-1516455590571-18256e5bb9ff?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxMXx8aG9tZXxlbnwwfDB8fHwxNzEwNDkwMDcwfDA&ixlib=rb-4.0.3&q=80&w=1080" alt="billboard image" />
    </div>
</div>

<div class="xl:w-[80%] sm:w-[85%] xs:w-[90%] mx-auto flex md:flex-row xs:flex-col lg:gap-4 xs:gap-2 justify-center lg:items-stretch md:items-center mt-4">
        <div class="lg:w-[50%] xs:w-full">
            <img class="lg:rounded-t-lg sm:rounded-sm xs:rounded-sm h-full object-cover" src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw1fHxob21lfGVufDB8MHx8fDE3MTA0OTAwNjl8MA&ixlib=rb-4.0.3&q=80&w=1080" alt="billboard image" />
        </div>
        <div class="lg:w-[50%] sm:w-full xs:w-full bg-gray-100 dark:bg-white dark:text-gray-400 md:p-4 xs:p-0 rounded-md">
            <h5 class="text-3xl font-semibold text-gray-900 dark:text-black">General Elc Specification</h5>
            <p class="text-md mt-4 dark:text-black">
1. ELC Type    	Digital system with microcontroller<br>
2. Control method	Phase angle control, two steps<br>
3. Power          	1 - 500 kW<br>
4. Voltage  	230/400 Volt (1 and 3 Phase)<br>
5. Frequency	50 Hz or 60 Hz<br>
6. Freq. accuracy	<± 0.2 Hz<br>
7. Freq. sensing	10 ms or 100 times/s at 50 Hz<br>
8. Recovery time	±3 seconds
            </p>
        </div>
    </div>     

     <!-- col-2 -->
<div class="xl:w-[80%] sm:w-[85%] xs:w-[90%] mx-auto flex md:flex-row xs:flex-col lg:gap-4 xs:gap-2 justify-center lg:items-stretch md:items-center mt-6">
    <!-- Kotak teks -->
   <div class="lg:w-[50%] xs:w-full bg-gray-100 dark:bg-white dark:text-gray-400 md:p-4 xs:p-4 rounded-md flex flex-col">
    <h3 class="text-3xl font-semibold text-gray-900 dark:text-black mb-2">Standard Protection And Standard Metering</h3>
    <p class="text-md dark:text-black">
1. MCCB for main load 	1. Pilot lamps, 3P <br>
2. Contactor for main load	2. Amp.meter ballast, 3P <br>
3. Fuse/ MCB for protection	3. Amp.meter consumer, 3P <br>
4. Over/Under Freq. (optional)	4. Voltmeter generator, 1P<br>
5. Over/Under Volt. (optional)	5. Hour counter, 1P<br>
6. Lightning arrester (optional)	6. Frequency generator, 1P
    </p>
</div>
    <!-- Gambar pada tampilan lebih kecil -->
    <div class="lg:w-[50%] xs:w-full flex-shrink-0">
        <img class="lg:rounded-t-lg sm:rounded-sm xs:rounded-sm w-full h-full object-cover" src="https://images.unsplash.com/photo-1516455590571-18256e5bb9ff?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxMXx8aG9tZXxlbnwwfDB8fHwxNzEwNDkwMDcwfDA&ixlib=rb-4.0.3&q=80&w=1080" alt="billboard image" />
    </div>
</div>
  </section>

<x-footer> </x-footer>
</body>

</html>


