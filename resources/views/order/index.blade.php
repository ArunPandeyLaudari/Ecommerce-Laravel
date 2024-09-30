@extends('layouts.app')
@section('content')
    <h1 class="text-3xl font-medium text-blue-800">Orders</h1>
    <hr class="h-1 bg-red-500">
    <table class="w-full mt-5">
        <tr>
            <th class="p-2 bg-gray-200 border">Order Date</th>
            <th class="p-2 bg-gray-200 border">Product Image</th>
            <th class="p-2 bg-gray-200 border">Product Image</th>
            <th class="p-2 bg-gray-200 border">Customer Name</th>
            <th class="p-2 bg-gray-200 border">Phone</th>
            <th class="p-2 bg-gray-200 border">Address</th>
            <th class="p-2 bg-gray-200 border">Rate</th>
            <th class="p-2 bg-gray-200 border">Quantity</th>
            <th class="p-2 bg-gray-200 border">Total</th>
            <th class="p-2 bg-gray-200 border">Status</th>
            <th class="p-2 bg-gray-200 border">Action</th>
        </tr>

        @foreach ($orders as $order)
            <tr class="text-center">
                <td class="p-2 border">{{ $order->created_at }}</td>
                <td class="p-2 border">
                    <img src="{{ asset('images/products/' . $order->product->photopath) }}" alt=""
                        class="mx-auto h-14">
                </td>
                <td class="p-2 border">{{ $order->product->name }}</td>
                <td class="p-2 border">{{ $order->name }}</td>
                <td class="p-2 border">{{ $order->phone }}</td>
                <td class="p-2 border">{{ $order->address }}</td>
                <td class="p-2 border">{{ $order->price }}</td>
                <td class="p-2 border">{{ $order->qty }}</td>
                <td class="p-2 border">{{ $order->qty * $order->price }}</td>
                <td class="p-2 border">{{ $order->status }}</td>
                <td class="p-2 border">Pending Confirm Complete sheeping</td>



            </tr>
        @endforeach

    </table>
@endsection
