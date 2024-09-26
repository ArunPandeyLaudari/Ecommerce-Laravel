<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller



{
    public function dashboard()
    {
        $categories = Category::count();

        $products = Product::count();

        $banners = banner::count();

        return view('dashboard', compact('categories', 'products', 'banners'));
    }
}
