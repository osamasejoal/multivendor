<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    




    //======================================
    // INDEX method for view categories
    //======================================
    public function index()
    {
        $categories = Category::all();
        return view('backend.categories.view', compact('categories'));
    }





    //======================================
    // CREATE method for creating categories
    //======================================
    public function create()
    {
        return view('backend.categories.add');
    }





    //======================================
    // STORE method for creating categories
    //======================================
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'description' => 'required',
            'image' => 'required | image | mimes:png,jpg,jpeg',
        ], [
            'name.required' => 'Category Name is required',
            'description.required' => 'Description is required',
            'image.required' => 'Image is required',
            'image.image' => 'Please choose a image file',
            'image.mimes' => 'Image extension can be png, jpg or jpeg',
        ]);

        $img = Image::make($request->image);
        $img_name = auth()->id() . auth()->user()->name . Str::random('5') . '.' . $request->image->getClientOriginalExtension();
        $img->save(base_path('public/backend/assets/images/category-img/' . $img_name));

        Category::insert([
            'name' => $request->name,
            'image' => $img_name,
            'status' => $request->status,
            'description' => $request->description,
        ]);
        return back()->with('success', 'Successfully create your Category');
    }





    public function show(Category $category)
    {
        //
    }





    //======================================
    // EDIT method for update categories
    //======================================
    public function edit($id)
    {
        $categories = Category::find($id);
        return view('backend.categories.edit', compact('categories'));
    }





    //====================================
    // UPDATE method for update categories
    //====================================
    public function update(Request $request,  $id)
    {

        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'description' => 'required',
            'image' => 'image | mimes:png,jpg,jpeg',
        ], [
            'name.required' => 'Category Name is required',
            'description.required' => 'Description is required',
            'image.image' => 'Please choose a image file',
            'image.mimes' => 'Image extension can be png, jpg or jpeg',
        ]);

        if ($request->hasFile('image')) {
            unlink(base_path('public/backend/assets/images/category-img/' . Category::find($id)->image ));
            $img = Image::make($request->image);
            $img_name = auth()->id() . auth()->user()->name . Str::random('5') . '.' . $request->image->getClientOriginalExtension();
            $img->save(base_path('public/backend/assets/images/category-img/' . $img_name));

            Category::find($id)->update([
                'image' => $img_name,
            ]);
        
        }

        Category::find($id)->update([
            'name' => $request->name,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Successfully updated your Category');
    }





    //======================================
    // DESTROY method for delete categories
    //======================================
    public function destroy($id)
    {
        Category::find($id)->delete();
        return back();
    }
}
