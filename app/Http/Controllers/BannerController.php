<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    




    //=====================================
    // INDEX method for view banner data
    //=====================================
    public function index()
    {
        $banners = Banner::all();
        return view('backend.banner.view', compact('banners'));
    }





    //=====================================
    // CREATE method for create banner data
    //=====================================
    public function create()
    {
        return view('backend.banner.add');
    }





    //=====================================
    // STORE method for create banner data
    //=====================================
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg',
        ], [
            'title.required' => 'This field is required',
            'description.required' => 'This field is required',
            'image.required' => 'This field is required',
            'image.image' => 'Please choose a Image',
            'image.mimes' => 'It can be a jpg/jpeg file',
        ]);

        $img = Image::make($request->image);
        $img_name = auth()->id() . auth()->user()->name . Str::random('5') . '.' . $request->image->getClientOriginalExtension();
        $img->save(base_path('public/backend/assets/images/banner-img/' . $img_name));
        
        Banner::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $img_name,
            'status' => 1,
        ]);

        return back()->with('success', 'Successfully create your Banner');
    }




    

    public function show(Banner $banner)
    {
        //
    }





    //=================================
    // EDIT method for edit banner data
    //=================================
    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('backend.banner.edit', compact('banner'));
    }
    




    //===================================
    // UPDATE method for edit banner data
    //===================================
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg',
            'status' => 'required',
        ], [
            'title.required' => 'This field is required',
            'description.required' => 'This field is required',
            'image.required' => 'This field is required',
            'image.image' => 'Please choose a Image',
            'image.mimes' => 'It can be a jpg/jpeg file',
            'status.required' => 'This field is required',
        ]);

        if ($request->hasFile('image')) {
            unlink(base_path('public/backend/assets/images/banner-img/' . Banner::find($id)->image));
            $img = Image::make($request->image);
            $img_name = auth()->id() . auth()->user()->name . Str::random('5') . '.' . $request->image->getClientOriginalExtension();
            $img->save(base_path('public/backend/assets/images/banner-img/' . $img_name));

            Banner::find($id)->update([
                'image' => $img_name,
            ]);
        }

        Banner::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Successfully updated your banner');
    }





    //======================================
    // DESTROY method for delete banner data
    //======================================
    public function destroy($id)
    {
        unlink(base_path('public/backend/assets/images/banner-img/' . Banner::find($id)->image));
        Banner::find($id)->delete();
        return back();
    }
}
