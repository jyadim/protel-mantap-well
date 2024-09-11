<div class="w-2/12 mr-6">
    @props(['product', 'ref'])
    <div class="fixed">
        <div class="bg-white rounded-xl shadow-lg mb-6 px-6 py-4">
            <a href="{{route('admin.dashboard')}}" class="inline-block text-gray-600 hover:text-black my-4 w-full">
                <span class="material-icons-outlined float-left pr-2">dashboard</span>
                Home
            </a>
            <a href="{{route('about.index')}}" class="inline-block text-gray-600 hover:text-black my-4 w-full">
                <span class="material-icons-outlined float-left pr-2">tune</span>
                About
                <span class="material-icons-outlined float-right"></span>
            </a>

            <!-- Products Dropdown -->
            <div x-data="{ open: false }" class="my-4">
                <!-- Dropdown Trigger -->
                <div class="flex justify-between items-center text-gray-600 hover:text-black w-full">
                    <div class="flex items-center">
                        <a href="{{route('product.index')}}">
                        <span class="material-icons-outlined pr-2">file_copy</span>
                        Product's
                    </a>
                    </div>
                    <span @click="open = !open" :class="{ 'transform rotate-90': open }"
                        class="material-icons-outlined cursor-pointer transition-transform duration-200">keyboard_arrow_right</span>
                </div>
            
                <!-- Dropdown Content -->
                <div x-show="open" class="mt-2 bg-white border rounded shadow-lg w-full">
                    <ul>
                        @foreach ($product as $prod)
                        <li><a href="{{route('detailproduct.edit', $prod->slug)}}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-black">{{$prod->title}}</a></li>
                        @endforeach
                        
                        
                        <!-- More items can be added dynamically here -->
                    </ul>
                </div>
            </div>
            

            <!-- Service Link -->
            <a href="{{route('service.index')}}" class="inline-block text-gray-600 hover:text-black my-4 w-full">
                <span class="material-icons-outlined float-left pr-2">file_copy</span>
                Service
            </a>

            <!-- References Dropdown -->
            <div x-data="{ open: false }" class="my-4">
                <!-- Dropdown Trigger -->
                <div class="flex justify-between items-center text-gray-600 hover:text-black w-full">
                    <div class="flex items-center">
                        <a href="{{route('references.index')}}">
                        <span class="material-icons-outlined pr-2">file_copy</span>
                        Reference's
                    </a>
                    </div>
                    <span @click="open = !open" :class="{ 'transform rotate-90': open }"
                        class="material-icons-outlined cursor-pointer transition-transform duration-200">keyboard_arrow_right</span>
                </div>
            
                <!-- Dropdown Content -->
                <div x-show="open" class="mt-2 bg-white border rounded shadow-lg w-full">
                    <ul>
                        @foreach ($ref as $ref)
                        <li><a href="{{route('gallery.edit', $ref->slug)}}"
                            class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-black">{{$ref->title}}</a></li>
                        @endforeach
                        
                        
                        <!-- More items can be added dynamically here -->
                    </ul>
                </div>
            </div>

            <!-- Contact Link -->
            <a href="{{route('contact.index')}}" class="inline-block text-gray-600 hover:text-black my-4 w-full">
                <span class="material-icons-outlined float-left pr-2">tune</span>
                Contact
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg mb-6 px-6 py-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="inline-block text-gray-600 hover:text-black my-4 w-full text-left">
                    <span class="material-icons-outlined float-left pr-2">power_settings_new</span>
                    Log out
                </button>
            </form>
        </div>
    </div>
</div>