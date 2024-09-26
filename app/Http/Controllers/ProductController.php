<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }
    public function create()
    {

        // helps to fetch the catefory data in the $categories variable

        $categories = Category::orderBy('priority')->get();
        return view('product.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric|lt:price',
            'stock' => 'required|numeric',
            'status' => 'required',
            'photopath' => 'required|image',

        ]);



        // storing picture

        $photo = $request->file('photopath');
        $photoname = time() . '.' . $photo->extension();
        $photo->move(public_path('images/products/'), $photoname);
        $data['photopath'] = $photoname;



        Product::create($data);
        return redirect(route('product.index'))->with('success', 'Product Created Sucessfully');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::orderBy('priority')->get();
        // single data fecth so product , Multiple categories fetcg so categories
        return view('product.edit', compact('product', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric|lt:price',
            'stock' => 'required|numeric',
            'status' => 'required',
            'photopath' => 'nullable|image',

        ]);

        $product = Product::find($id);
        $data['photopath'] = $product->photopath;

        if ($request->hasFile('photopath')) {
            // storing picture

            $photo = $request->file('photopath');
            $photoname = time() . '.' . $photo->extension();
            $photo->move(public_path('images/products/'), $photoname);
            $data['photopath'] = $photoname;

            //delete old photo
            $oldphoto = public_path('images/products/' . $product->photopath);
            if (file_exists($oldphoto)) {
                unlink($oldphoto);
            }
        }
        $product->update($data);
        return redirect()->route('product.index')->with('success', 'Product Updated Succcessfully');
    }
    public function delete($id)
    {
        $product = Product::find($id);
        $photo = public_path('images/products/' . $product->photopath);
        if (file_exists(($photo))) {
            unlink($photo);
        }
        $product->delete();
        return redirect()->route('product.index')->with('success', 'products Deleted Sucessfully');
    }
}
