@extends('layouts.app')
@section('content')
    <h1 class="text-3xl font-medium text-blue-900">Products</h1>
    <hr class="h-1 bg-red-500">
    <div class="my-5 text-right">
        <a href="{{ route('product.create') }}" class="px-5 py-3 text-white bg-blue-900 rounded-lg">Add Product's</a>
    </div>
    <table class="w-full mt-5">
        <tr>
            <th class="p-2 bg-gray-200 border">S.N</th>
            <th class="p-2 bg-gray-200 border">Product Picture</th>
            <th class="p-2 bg-gray-200 border">Product Name</th>
            <th class="p-2 bg-gray-200 border">Description</th>
            <th class="p-2 bg-gray-200 border">Price</th>
            <th class="p-2 bg-gray-200 border">Discounted Price</th>
            <th class="p-2 bg-gray-200 border">Stock</th>
            <th class="p-2 bg-gray-200 border">Status</th>
            <th class="p-2 bg-gray-200 border">Category</th>

            <th class="p-2 bg-gray-200 border">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td class="p-2 border">{{ $loop->iteration }}</td>
                <td class="p-2 border"><img src="{{ asset('images/products/' . $product->photopath) }}" alt="product image"
                        class="object-cover w-16 h-16 mx-auto">
                </td>
                <td class="p-2 border">{{ $product->name }}</td>
                <td class="p-2 border">{{ $product->description }}</td>
                <td class="p-2 border">{{ $product->price }}</td>
                <td class="p-2 border">{{ $product->discounted_price }}</td>
                <td class="p-2 border">{{ $product->stock }}</td>
                <td class="p-2 border">{{ $product->status }}</td>
                {{-- product leychai categoryfunction all data lyayo --}}
                <td class="p-2 border">{{ $product->category->name }}</td>

                <td class="p-2 border">
                    <a href="{{ route('product.edit', $product->id) }}"
                        class="px-3 py-1 font-medium text-white bg-blue-900 rounded">Edit</a>
                    <a href="{{ route('product.delete', $product->id) }}"
                        class="px-3 py-1 font-medium text-white bg-red-900 rounded"
                        onclick="return confirm('Are you sure?')">Delete</a>
                </td>


            </tr>
        @endforeach
    @endsection
