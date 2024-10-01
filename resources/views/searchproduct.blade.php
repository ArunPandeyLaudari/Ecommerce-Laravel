@extends('layouts.master')

@section('title')
    Search Result| LICT E-commerce
@endsection

@section('content')
    <!-- Latest Products Section -->
    <div class="px-4 py-12 mx-auto max-w-7xl">
        <h2 class="pl-4 text-4xl font-bold text-blue-900 border-l-4 border-yellow-500 lg:text-5xl">Search Result</h2>

        <!-- Product Grid Wrapper -->
        <div class="grid grid-cols-1 gap-8 mt-10 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <!-- Loop through products -->
            @forelse ($products as $product)
                <!-- Product Card -->
                <div
                    class="relative transition duration-300 transform bg-white rounded-lg shadow-lg hover:shadow-2xl hover:scale-105">
                    <div
                        class="absolute px-3 py-1 text-sm font-semibold text-white bg-yellow-500 rounded-full top-3 right-3">
                        New
                    </div>
                    <img src="{{ asset('images/products/' . $product->photopath) }}" alt="{{ $product->name }}"
                        class="object-cover w-full h-56 rounded-t-lg">
                    <div class="p-5">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                        <p class="mt-2 text-sm text-gray-500">{{ Str::limit($product->description, 100) }}</p>

                        <!-- Price and Buy Now Section -->
                        <div class="flex items-center justify-between mt-4">
                            <div class="flex flex-col">
                                @if ($product->discounted_price != '')
                                    <span class="text-sm text-gray-500 line-through">{{ $product->discounted_price }}</span>
                                    <span class="text-xl font-bold text-gray-900">{{ $product->price }}</span>
                                @else
                                    <span class="text-xl font-bold text-gray-900">{{ $product->price }}></span>
                                @endif
                            </div>
                            <button
                                class="px-5 py-2 text-sm font-medium text-white transition duration-300 transform bg-blue-600 rounded hover:bg-blue-700 hover:scale-105 whitespace-nowrap">
                                Buy Now
                            </button>
                        </div>

                        <!-- Wishlist and Add to Cart Section -->
                        <div class="flex items-center justify-between mt-4">
                            <button class="text-sm font-semibold text-blue-600 hover:underline"><a
                                    href="{{ route('viewproductpage', $product->id) }}">View Details</a></button>
                            <button
                                class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 transition duration-300 transform bg-gray-200 rounded hover:bg-gray-300 hover:text-blue-600 hover:scale-105">
                                <i class="mr-2 text-lg bx bx-cart-alt"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

            @empty
                <div class="text-center">
                    <h2 class="text-2xl font-semibold text-gray-800">No products found</h2>
                </div>
            @endforelse
        </div>
    </div>
@endsection
