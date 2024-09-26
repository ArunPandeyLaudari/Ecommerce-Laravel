<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/lictlogo.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- boxicon --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('layouts.alert')
    <div class="flex items-center justify-between px-2 py-2 text-blue-900 bg-white">
        <p><i class='bx bxl-facebook-circle'></i>&nbsp;<i class='bx bxl-tiktok'></i>&nbsp;<i
                class='bx bxl-instagram'></i>&nbsp;<i class='bx bxl-youtube'></i></p>
        <p><i class='bx bxs-phone-call'></i> &nbsp;9876543432</p>
    </div>

    <nav class="sticky top-0 z-40 mb-5 bg-white border-gray-200 dark:bg-blue-900">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('images/lictlogo.png') }}" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">LICT Ecommerce</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>

            {{-- search filed --}}
            <form action="">
                <input type="search" name="search" class="px-3 py-2 border border-gray-300 rounded-lg "
                    placeholder="SEARCH HERE">
                <button type="submit" class="px-4 py-2 text-white bg-yellow-600 rounded-lg">Search</button>
            </form>


            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 dark:border-gray-700">
                    <li>
                        <a href="{{ route('homepage') }}"
                            class="block px-3 py-2 text-white rounded md:bg-transparent md:p-0 dark:text-white hover:text-blue-600 "
                            aria-current="page">Home</a>
                    </li>

                    @php
                        $categories = App\Models\Category::orderBy('priority')->get();
                    @endphp
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('categoryproduct', $category->id) }}"
                                class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">{{ $category->name }}</a>
                        </li>
                    @endforeach


                    <li>

                        {{-- login vaysi name ley wlc garna  lai --}}
                        @auth

                            <div class="relative group">
                                <i class='p-1 text-sm bg-gray-200 rounded cursor-pointer bx bxs-user-pin'></i>
                                <div
                                    class="absolute hidden w-48 p-2 bg-gray-100 border rounded shadow -right-10 top-8 group-hover:block">
                                    <a href="{{ route('mycart') }}" class="block p-4 py-2 hover:bg-gray-200">
                                        <i class='bx bx-bar-chart-alt'></i> My Chart
                                    </a>
                                    <a href="" class="block p-4 py-2 hover:bg-gray-200">
                                        <i class='bx bx-shopping-bag'></i> My Order
                                    </a>
                                    <a href="" class="block p-4 py-2 hover:bg-gray-200">
                                        <i class='bx bx-user'></i> My Profile
                                    </a>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="block w-full p-4 py-2 text-left rounded-md hover:bg-gray-200">
                                            <i class='bx bx-log-out'></i> Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}"
                                class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                Login</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    @yield('content')

    <footer class="py-8 mt-10 text-white bg-blue-900">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col space-y-6 text-left md:flex-row md:justify-between md:space-y-0">
                <!-- First Column -->
                <div class="md:w-4/12">
                    <h1 class="mb-4 text-2xl font-bold text-yellow-400">LICT Ecommerce</h1>
                    <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta necessitatibus,
                        non consequatur consequuntur voluptatum quibusdam dolorum odio voluptatibus. Veritatis
                        exercitationem fuga ex necessitatibus! Harum error explicabo, minus excepturi quas quod.</p>
                </div>
                <!-- Second Column -->
                <div class="md:w-1/4">
                    <h1 class="mb-4 text-2xl font-bold">Quick Links</h1>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:underline">Home</a></li>
                        <li><a href="#" class="hover:underline">Electronic</a></li>
                        <li><a href="#" class="hover:underline">Groceries</a></li>
                        <li><a href="#" class="hover:underline">Fashion</a></li>
                        <li><a href="#" class="hover:underline">Accessories</a></li>
                    </ul>
                </div>
                <!-- Third Column -->
                <div class="md:w-4/12">
                    <h1 class="mb-4 text-2xl font-bold">Contact Us</h1>
                    <p class="text-sm">Address: Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae fugit,
                        quod sunt deleniti iusto maxime ratione voluptas. In, dolor, sapiente odio sunt unde quos
                        dolorum quae dicta fugiat nesciunt nisi?</p>
                    <p class="mt-4 text-sm">Phone: 9829096752</p>
                    <p class="text-sm">Email: info@info.com</p>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
