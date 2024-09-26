@extends('layouts.master')
@section('content')
    <div class="px-16">
        <div class="pl-2 border-l-4 border-blue-900">
            <h1 class="text-2xl font-bold">MyCart</h1>
            <p>Products in Cart</p>
        </div>
        <table class="w-full mt-5">
            <tr>
                <th class="p-2 border border-gray-300">Product Image</th>
                <th class="p-2 border border-gray-300">Product Name</th>
                <th class="p-2 border border-gray-300">Quantity</th>

                <th class="p-2 border border-gray-300">Price</th>
                <th class="p-2 border border-gray-300">Total</th>
                <th class="p-2 border border-gray-300">Action</th>
            </tr>
            @foreach ($carts as $cart)
                <tr text-center>
                    <td class="p-2 border border-gray-100"><img
                            src="{{ asset('images/products/' . $cart->product->photopath) }}" alt=""
                            class="h-16 mx-auto"></td>
                    <td class="p-2 border border-gray-100">{{ $cart->product->name }}</td>
                    <td class="p-2 border border-gray-100">{{ $cart->qty }}</td>
                    <td class="p-2 font-semibold border border-gray-100">
                        @if ($cart->product->discounted_price == '')
                            {{ $cart->product->price }}
                        @else
                            {{ $cart->product->discounted_price }}
                            <br>
                            <span class="block text-xs text-red-600 line-through">
                                {{ $cart->product->price }}
                            </span>
                        @endif
                    </td>
                    <td class="p-2 border border-gray-100">{{ $cart->total }}</td>
                    <td class="p-2 text-center bodered boder-gray-100">
                        <a href="" class="px-2 py-1 text-white bg-blue-900 rounded-lg">Checkout</a>
                        <a href="{{ route('cart.delete', $cart->id) }}"
                            class="px-2 py-1 text-white bg-red-600 rounded-lg">Remove</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
