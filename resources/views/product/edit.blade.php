@extends('layouts.app')
@section('content')
    <h1 class="text-4xl font-extrabold text-blue-900">Edit Product</h1>
    <hr class="h-1 bg-red-500">

    <form action="{{ route('product.update', $product->id) }}" method="POST" class="mt-5" enctype="multipart/form-data">
        @csrf
        <select name="category_id" id="" class="w-full my-2 rounded-lg">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if ($product->category_id == $category->id) selected @endif>{{ $category->name }}
                </option>
            @endforeach

        </select>
        <input type="text" placeholder="Enter Product Name" name="name" class="w-full my-2 rounded-lg"
            value="{{ $product->name }}">
        @error('name')
            <p class="-mt-2 text-red-500">{{ $message }}</p>
        @enderror

        <textarea name="description" id="" cols="30" rows="5" placeholder="Enter Product Description"
            class="w-full my-2 rounded-lg">{{ $product->description }}</textarea>
        @error('description')
            <p class="-mt-2 text-red-500">{{ $message }}</p>
        @enderror

        <input type="text" placeholder="Enter Price" name="price" class="w-full my-2 rounded-lg"
            value="{{ $product->price }}">
        @error('price')
            <p class="-mt-2 text-red-500">{{ $message }}</p>
        @enderror

        <input type="text" placeholder="Enter Discounted Price" name="discounted_price" class="w-full my-2 rounded-lg"
            value="{{ $product->discounted_price }}">
        @error('discounted_price')
            <p class="-mt-2 text-red-500">{{ $message }}</p>
        @enderror

        <select type="text" name="status" class="w-full my-2 rounded-lg">
            <option value="show" @if ($product->status == 'show') selected @endif>Show</option>
            <option value="hide" @if ($product->status == 'hide') selected @endif>Hide</option>
        </select>


        <input type="text" placeholder="Enter Stock" name="stock" class="w-full my-2 rounded-lg"
            value="{{ $product->stock }}">
        @error('stock')
            <p class="-mt-2 text-red-500">{{ $message }}</p>
        @enderror


        <input type="file" name="photopath" class="w-full my-2 rounded-lg">
        @error('photopath')
            <p class="-mt-2 text-red-500">{{ $message }}</p>
        @enderror

        <p>Current Picture:</p>
        <img src="{{ asset('images/products/' . $product->photopath) }}" alt="" class="w-44">
        <div class="flex justify-center">
            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg">Update Product</button>
            <a href="{{ route('product.index') }}" class="px-4 py-2 ml-2 text-white bg-red-500 rounded-lg">Cancel</a>
        </div>
    </form>
@endsection
