<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    //index file lai controll garna

    public function index()
    {


        // database bata sabai tanna lai
        $catagories = Category::orderBy('priority')->get();
        return view('catagory.index', compact('catagories'));
    }


    // add caragory or  create

    public function create()
    {
        return view('catagory.create');
    }

    public function store(Request $request)
    {
        //   die garako dekhauna
        // dd('hi');

        // req bata ako submit vayara ako herna lai hami you garna pani sakinxa

        // dd($request->all());



        // aba chai request lai validate main kam mathi ko tw just check grya  and asma chai name ko adarma validate hunxa hai remmber*****

        // $request->validate([
        //     'priority' => 'required',
        //     'name' => 'required'
        // ]);

        // aba validate vako data tanara rakhna lai

        $data = $request->validate([
            'priority' => 'required|numeric',
            'name' => 'required'
        ]);

        Category::create($data);

        return redirect(route('catagory.index'))
            // sucess vayo vney sucess variable pathauni display garna
            ->with('success', 'Category Created Sucessfully');

        //  or also we can do as
        // return redirect()-> route('catagory.index')

    }

    public function edit($id)
    {
        $catagory = Category::find($id);
        return view('catagory.edit', compact(('catagory')));
    }

    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'priority' => 'required|numeric',
            'name' => 'required'
        ]);


        $catagory = Category::find($id);
        $catagory->update($data);
        return redirect()->route('catagory.index')->with('success', 'Catagory Updated Sucessfully');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $catagory = Category::find($id);

        // category falna lako tara pai
        // lai auta product xa tesko namm ma tesko lagi paila category falna lauanw parxa so alert dini

        $products = Product::where('category_id', $id)->count();

        if ($products > 0) {
            return redirect()->route('catagory.index')->with('error', 'Category cannot be deleted, it has products');
        }
        //   haina vaney pauxa
        $catagory->delete();

        return redirect()->route('catagory.index')->with('success', 'Category Deleted Successfully');
    }
}
