<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
</head>

<body>
    <div class="bg-gray-50 dark:bg-gray-800 h-screen">
        <div class="flex min-h-[80vh] flex-col justify-center py-12 sm:px-6 lg:px-8">
            <div class="text-center sm:mx-auto sm:w-full sm:max-w-md">
                <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white">
                    Sign in
                </h1>
            </div>
            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                @if (session('error'))
                    <div class="bg-red-500 text-white p-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="bg-white dark:bg-gray-700 px-4 pb-4 pt-8 sm:rounded-lg sm:px-10 sm:pb-6 sm:shadow">
                    <form action="{{ route('admin.authenticate') }}" method="post">
                        @csrf
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700 dark:text-white">Email
                                address /
                                Username</label>
                            <div class="mt-1">
                                <input name="username" type="text" data-testid="username" required=""
                                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-300 dark:focus:border-indigo-400 dark:focus:ring-indigo-400 sm:text-sm"
                                    value="{{old('username')}}">
                                @error('username')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="password"
                                class="block text-sm font-medium text-gray-700 dark:text-white">Password</label>
                            <div class="mt-1 mb-5">
                                <input id="password" name="password" type="password" data-testid="password"
                                    autocomplete="current-password" required=""
                                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-300 dark:focus:border-indigo-400 dark:focus:ring-indigo-400 sm:text-sm"
                                    value="">
                                @error('password')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div>
                            <button data-testid="login" type="submit"
                                class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:bg-indigo-700 dark:border-transparent dark:hover:bg-indigo-600 dark:focus:ring-indigo-400 dark:focus:ring-offset-2 disabled:cursor-wait disabled:opacity-50">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                Sign In
                            </button>
                        </div>
                    </form>

                    <div class="m-auto mt-6 w-fit md:mt-8">
                        <span class="m-auto dark:text-gray-400">Don't have an account?
                            <a class="font-semibold text-indigo-600 dark:text-indigo-100"
                                href="/account/register">Create
                                Account</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
