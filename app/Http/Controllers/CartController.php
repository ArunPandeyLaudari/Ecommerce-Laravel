<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required',
            'qty' => 'required|numeric'
        ]);
        // login garako user ko id tanna lai

        $data['user_id'] = Auth::id();

        // check if the product is already in the cart
        $cart = cart::where('user_id', Auth::id())->where('product_id', $data['product_id'])->first();
        if ($cart) {
            $cart->qty = $data['qty'];
            $cart->save();
            return back()->with('success', 'Product added to chart sucessfully');
        }


        cart::create($data);
        return back()->with('success', 'Product added to chart sucessfully');
    }


    public function mycart()
    {
        // user ko id le cart ko user_id sanga match garera cart haru tanna lai
        $carts = cart::where('user_id', Auth::id())->get();

        // cart ko product ko price multiply garera total nikalne lai loop chalayera garna lai
        // foreach loop chalayera total nikalne lai

        foreach ($carts as $cart) {

            // if discounted price is not empty
            if ($cart->product->discounted_price == '') {
                $cart->total = $cart->product->price * $cart->qty;
            } else {
                $cart->total = $cart->product->discounted_price * $cart->qty;
            }
        }

        return view('mycart', compact('carts'));
    }

    public function delete($id)
    {
        cart::find($id)->delete();
        return back()->with('success', 'Product deleted from cart Sucessfully');
    }
}
