<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="m-1 font-sans antialiased">
    @include('layouts.alert')
    <div class="flex">
        <nav class="h-screen text-blue-400 shadow-lg w-36 bg-gra">
            <img src="{{ asset('images/lictlogo.png') }}" alt="lict logo" class="h-24 mx-auto w-34">
            <ul class="">
                <li class="px-2 py-3 mt-5 font-medium text-center text-white bg-blue-900 rounded"><a
                        href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="px-2 py-3 mt-5 font-medium text-center text-white bg-blue-900 rounded"><a
                        href="{{ route('catagory.index') }}">Categories</a></li>
                <li class="px-2 py-3 mt-5 font-medium text-center text-white bg-blue-900 rounded"><a
                        href="{{ route('product.index') }}">Product's</a></li>
                <li class="px-2 py-3 mt-5 font-medium text-center text-white bg-blue-900 rounded"><a
                        href="{{ route('dashboard') }}">Users</a></li>
                <li class="px-2 py-3 mt-5 font-medium text-center text-white bg-blue-900 rounded"><a
                        href="{{ route('banner.index') }}">Banner</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full px-2 py-3 mt-5 font-medium text-center text-white bg-blue-900 rounded -xl">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>

        <div class="flex-1 p-4">
            @yield('content')
        </div>
    </div>
</body>

</html>
