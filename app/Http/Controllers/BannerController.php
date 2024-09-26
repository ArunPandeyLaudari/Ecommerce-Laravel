<?php

namespace App\Http\Controllers;

use App\Models\banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = banner::all();
        return view('banner.index', compact('banners'));
    }
    public function create()
    {


        $banners = banner::orderBy('priority')->get();
        return view('banner.create', compact('banners'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'priority' => 'required|numeric',
            'status' => 'required',
            'photopath' => 'required|image',

        ]);



        // storing picture

        $photo = $request->file('photopath');
        $photoname = time() . '.' . $photo->extension();
        $photo->move(public_path('images/banners/'), $photoname);
        $data['photopath'] = $photoname;



        banner::create($data);
        return redirect(route('banner.index'))->with('success', 'Banner Created Sucessfully');
    }
    public function edit($id)
    {
        $banner = banner::find($id);
        $banners = banner::orderBy('priority')->get();
        // single data fecth so product , Multiple categories fetcg so categories
        return view('banner.edit', compact('banner', 'banners'));
    }
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'priority' => 'required|numeric',
            'status' => 'required',
            'photopath' => 'required|image',

        ]);
        $banner = banner::find($id);
        $data['photopath'] = $banner->photopath;

        if ($request->hasFile('photopath')) {
            // storing picture

            $photo = $request->file('photopath');
            $photoname = time() . '.' . $photo->extension();
            $photo->move(public_path('images/banners/'), $photoname);
            $data['photopath'] = $photoname;

            //delete old photo
            $oldphoto = public_path('images/banners/' . $banner->photopath);
            if (file_exists($oldphoto)) {
                unlink($oldphoto);
            }
        }
        $banner->update($data);
        return redirect()->route('banner.index')->with('success', 'Banner Updated Succcessfully');
    }
    public function delete($id)
    {
        $banner = banner::find($id);
        $photo = public_path('images/banners/' . $banner->photopath);
        if (file_exists(($photo))) {
            unlink($photo);
        }
        $banner->delete();
        return redirect()->route('banner.index')->with('success', 'Banner Deleted Sucessfully');
    }
}
