<!-- source: https://github.com/mfg888/Responsive-Tailwind-CSS-Grid/blob/main/index.html -->
<div class="mx-auto max-w-2xl text-center mb-5 p-10">
    <h2 class="text-3xl font-bold tracking-tight text-gray-900 ">Introducing Our Product's</h2>
    <p class="mt-2 text-lg leading-8 text-gray-600">
        check our signature product's
    </p>
</div>
<!-- ✅ Grid Section - Starts Here 👇 -->
<section id="Projects"
    class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 ">
    
@foreach ($prodhome as $prod)

    <!--   ✅ Product card 1 - Starts Here 👇 -->
    <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
        <a href="#">
            <img src="img/microhydro.jpg"
                    alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
            <div class="px-4 py-3 w-72">
                <span class="text-gray-400 mr-3 uppercase text-xs">PME Bandung</span>
                <p class="text-lg font-bold text-black truncate block capitalize">Crossflow Turbine</p>
                <div class="flex items-center">
                <p class="text-base font-semibold text-black">Detail </p>                   
                </div>
            </div>
        </a>
    </div>
    <!--   🛑 Product card 1 - Ends Here  -->
    @endforeach
   
</section>

<!-- 🛑 Grid Section - Ends Here -->


