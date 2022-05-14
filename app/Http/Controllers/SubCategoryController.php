<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{





    /*
    |--------------------------------------------------------------------------
    |                              INDEX METHOD
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $sub_categories = SubCategory::all();
        return view('backend.sub-categories.view', compact('sub_categories'));
    }





    /*
    |--------------------------------------------------------------------------
    |                              CREATE METHOD
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        $categories = Category::all();
        return view('backend.sub-categories.add', compact('categories'));
    }





    /*
    |--------------------------------------------------------------------------
    |                              STORE METHOD
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'description' => 'required',
            'image' => 'required | image | mimes:png,jpg,jpeg',
            'category_id' => 'required',
        ], [
            'name.required' => 'Category Name is required',
            'description.required' => 'Description is required',
            'image.required' => 'Image is required',
            'image.image' => 'Please choose a image file',
            'image.mimes' => 'Image extension can be png, jpg or jpeg',
            'category_id.required' => 'Please choose a category',
        ]);

        $img = Image::make($request->image);
        $img_name = auth()->id() . auth()->user()->name . Str::random('5') . '.' . $request->image->getClientOriginalExtension();
        $img->save(base_path('public/backend/assets/images/sub-category-img/' . $img_name));

        SubCategory::insert([
            'name' => $request->name,
            'image' => $img_name,
            'status' => $request->status,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);
        return back()->with('success', 'Successfully create your Sub Category');
    }





    public function show(SubCategory $subCategory)
    {
        //
    }





    /*
    |--------------------------------------------------------------------------
    |                              EDIT METHOD
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $categories = Category::all();
        $sub_categories = SubCategory::find($id);
        return view('backend.sub-categories.edit', compact('sub_categories', 'categories'));
    }





    /*
    |--------------------------------------------------------------------------
    |                              UPDATE METHOD
    |--------------------------------------------------------------------------
    */
    public function update(Request $request,  $id)
    {

        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'description' => 'required',
            'image' => 'image | mimes:png,jpg,jpeg',
            'category_id' => 'required',
        ], [
            'name.required' => 'Category Name is required',
            'description.required' => 'Description is required',
            'image.image' => 'Please choose a image file',
            'image.mimes' => 'Image extension can be png, jpg or jpeg',
            'category_id.required' => 'Please choose a category',
        ]);

        if ($request->hasFile('image')) {
            unlink(base_path('public/backend/assets/images/sub-category-img/' . SubCategory::find($id)->image));
            $img = Image::make($request->image);
            $img_name = auth()->id() . auth()->user()->name . Str::random('5') . '.' . $request->image->getClientOriginalExtension();
            $img->save(base_path('public/backend/assets/images/sub-category-img/' . $img_name));

            SubCategory::find($id)->update([
                'image' => $img_name,
            ]);
        }

        SubCategory::find($id)->update([
            'name' => $request->name,
            'status' => $request->status,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return back()->with('success', 'Successfully updated your Category');
    }





    /*
    |--------------------------------------------------------------------------
    |                              DESTROY METHOD
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        SubCategory::find($id)->delete();
        return back();
    }
}