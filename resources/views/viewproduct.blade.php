@extends('layouts.master')

@section('title')
    View Products | LICT E-commerce
@endsection

@section('content')
    <div class="container px-16 mx-auto mt-8">
        <div class="grid grid-cols-1 gap-10 md:grid-cols-4">
            <!-- Product Image -->
            <div class="md:col-span-1">
                <img src="{{ asset('images/products/' . $product->photopath) }}" alt="{{ $product->name }}"
                    class="object-cover w-full transition duration-300 ease-in-out transform rounded-lg shadow-lg h-80 hover:scale-105">
            </div>

            <!-- Product Details -->
            <div class="px-8 border-l-2 border-gray-200 md:col-span-2">
                <h2 class="mb-4 text-5xl font-extrabold text-blue-700">{{ $product->name }}</h2>
                <div class="flex items-center space-x-4">
                    <p class="text-3xl font-bold text-gray-900">
                        @if ($product->discounted_price)
                            Rs.{{ $product->discounted_price }}
                            <span class="text-xl font-light text-red-600 line-through">{{ $product->price }}</span>
                        @else
                            Rs.{{ $product->price }}
                        @endif
                    </p>
                </div>

                <!-- Quantity Selector -->
                <div class="flex items-center mt-6">
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <button class="px-3 py-1 text-gray-700 bg-gray-300 rounded-l hover:bg-gray-400"
                            onclick="return dec()">-</button>
                        <input type="text" name="qty" class="text-center bg-gray-200 border-none w-14" value="1"
                            readonly id="qty">
                        <button class="px-3 py-1 text-gray-700 bg-gray-300 rounded-r hover:bg-gray-400"
                            onclick="return inc()">+</button>

                </div>
                <p class="mt-2 text-gray-500">In Stock: {{ $product->stock }}</p>

                <!-- Action Buttons -->
                <div class="flex mt-6 space-x-6">

                    <button
                        class="flex items-center justify-center px-6 py-3 text-white transition duration-300 ease-in-out bg-blue-600 rounded-lg shadow hover:bg-blue-700"
                        type="submit">
                        <i class='mr-2 bx bx-cart-add'></i> Add to Cart
                    </button>
                    </form>
                    <button
                        class="flex items-center justify-center px-6 py-3 text-white transition duration-300 ease-in-out bg-green-600 rounded-lg shadow hover:bg-green-700">
                        <i class='mr-2 bx bx-credit-card'></i> Buy Now
                    </button>
                </div>
            </div>

            <!-- Product Information -->
            <div class="px-4 text-gray-600 md:col-span-1">
                <p class="mb-3"><i class="bx bxs-truck"></i> Delivery within 5 Days</p>
                <p class="mb-3"><i class="bx bx-refresh"></i> 7 days return policy</p>
                <p class="mb-3"><i class="bx bx-money"></i> Cash on delivery available</p>
            </div>
        </div>

        <!-- Product Description -->
        <div class="mt-10">
            <h2 class="text-3xl font-bold text-gray-800">About the Product</h2>
            <p class="mt-4 leading-relaxed text-gray-600">{{ $product->description }}</p>
        </div>




        {{-- related Product --}}

        <div class="mt-10 relatedproduct">
            <h2 class="pl-4 text-2xl font-bold text-blue-900 border-l-4 border-yellow-500 lg:text-4xl">Related Products</h2>
            <div class="grid grid-cols-1 gap-8 mt-10 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <!-- Loop through products -->
                @foreach ($relatedproducts as $product)
                    <!-- Product Card -->
                    <div
                        class="relative transition duration-300 transform bg-white rounded-lg shadow-lg hover:shadow-2xl hover:scale-105">
                        <img src="{{ asset('images/products/' . $product->photopath) }}" alt="{{ $product->name }}"
                            class="object-cover w-full h-56 rounded-t-lg">
                        <div class="p-5">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>

                            <!-- Price and Buy Now Section -->
                            <div class="flex items-center justify-between mt-4">
                                <div class="flex flex-col">
                                    @if ($product->discounted_price != '')
                                        <span
                                            class="text-sm text-gray-500 line-through">{{ $product->discounted_price }}</span>
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
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function inc() {
            let qty = document.getElementById('qty');
            if (parseInt(qty.value) < {{ $product->stock }})
                qty.value = parseInt(qty.value) + 1;
            return false;
        }

        function dec() {
            let qty = document.getElementById('qty');
            if (parseInt(qty.value) > 1)
                qty.value = parseInt(qty.value) - 1;
            return false;
        }
    </script>
@endsection
