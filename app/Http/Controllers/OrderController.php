<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Order;
use COM;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        return view('order.index', compact('orders'));
    }

    public function store(Request $request, $cartid)
    {


        $data = $request->data;
        $data = base64_decode($data);
        $data = json_decode($data, true);
        $cart = cart::find($cartid);
        $data = [
            'user_id' => $cart->user_id,
            'product_id' => $cart->product_id,
            'qty' => $cart->qty,
            'price' => $cart->product->price,
            'payment_method' => 'Esewa',
            'name' => $cart->user->name,
            'phone' => '09876543456789',
            'address' => 'Kathmandu',
        ];
        Order::create($data);
        $cart->delete();
        return redirect()->route('homepage')->with('success', 'Order Placed Successfully');
    }

    public function storecod(Request $request) {}
}
