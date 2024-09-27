<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class Pagecontroller extends Controller
{
    public function home()
    {
        $products = Product::where('status', 'show')->latest()->limit(4)->get();
        return view('welcome', compact('products'));
    }

    public function viewproduct($id)
    {
        $product = Product::find($id);
        $relatedproducts = Product::where('category_id', $product->category_id)->where('id', '!=', $id)->limit(3)->get();
        return view('viewproduct', compact('product', 'relatedproducts'));
    }
    public function categoryproduct($id)
    {
        $category = Category::where('status', 'show')->find($id);

        $products = Product::where('category_id', $id)->where('status', 'show')->get();

        return view('categoryproduct', compact('products', 'category'));
    }

    // checkout page ko lagi function banako esewa ma cart id pathauna parxa so cart id pathauna parxa

    public function checkout($cartid)
    {

        $cart = cart::find($cartid);

        if ($cart->product->discounted_price == '') {
            $cart->total = $cart->product->price * $cart->qty;
        } else {
            $cart->total = $cart->product->discounted_price * $cart->qty;
        }

        $cart->tax = $cart->total * 0.13;


        return view('checkout', compact('cart'));
    }
}
