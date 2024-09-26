@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-medium text-blue-800">Dashboard</h1>
    <hr class="h-1 bg-red-500">

    <div class="grid grid-cols-3 gap-8 mt-5">
        <div class="p-5 bg-blue-100 rounded-lg shadow">
            <h2 class="text-2xl font-bold text-blue-900">Categories</h2>
            <p>Total Categories: {{ $categories }}</p>
        </div>
        <div class="p-5 bg-green-100 rounded-lg shadow">
            <h2 class="text-2xl font-bold text-blue-900">Products</h2>
            <p>Total Products: {{ $products }}</p>
        </div>
        <div class="p-5 bg-pink-100 rounded-lg shadow">
            <h2 class="text-2xl font-bold text-blue-900">Banners</h2>
            <p>Total Banner: {{ $banners }}</p>
        </div>
        <div class="p-5 bg-pink-100 rounded-lg shadow">
            <h2 class="text-2xl font-bold text-blue-900">Users</h2>
            <p>Total Users: 15</p>
        </div>
        <div class="p-5 bg-yellow-100 rounded-lg shadow">
            <h2 class="text-2xl font-bold text-blue-900">Oders</h2>
            <p>Total Oders: 15</p>
        </div>
        <div class="p-5 bg-orange-100 rounded-lg shadow">
            <h2 class="text-2xl font-bold text-blue-900">Pending Oders</h2>
            <p>Total Pending Oders: 15</p>
        </div>
        <div class="p-5 bg-purple-100 rounded-lg shadow">
            <h2 class="text-2xl font-bold text-blue-900">Processing Oders</h2>
            <p>Processing Oders: 15</p>
        </div>
        <div class="p-5 bg-gray-100 rounded-lg shadow">
            <h2 class="text-2xl font-bold text-blue-900">Completed Oders</h2>
            <p>Completed Oders: 15</p>
        </div>
    </div>
@endsection
