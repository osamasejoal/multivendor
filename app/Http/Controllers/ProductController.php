<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Nullable;

class ProductController extends Controller
{
   




    //========================================
    // INDEX method for view product data
    //========================================
    public function index()
    {
        $products = Product::all();
        return view('backend.product.view', compact('products'));
    }





    //========================================
    // CREATE method for creating product data
    //========================================
    public function create()
    {
        if (auth()->user()->roll == 2) {
            $categories = Category::all();
            $sub_categories = SubCategory::all();
            return view('backend.product.add' , compact('categories' , 'sub_categories'));
        }
    }





    //========================================
    // STORE method for creating product data
    //========================================
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'description' => 'required',
            'short_desc' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'status' => 'required',
            'deal' => 'required',
        ], [
            'category_id.required' => 'Category name is required',
            'sub_category_id.required' => 'Sub Category name is required',
            'name.required' => 'Product name is required',
            'price.required' => 'Price rate is required',
            'price.numeric' => 'It must be numeric',
            'quantity.required' => 'Product quantity is required',
            'quantity.numeric' => 'It must be numeric',
            'description.required' => 'Description is required',
            'short_desc.required' => 'Short description is required',
            'image.required' => 'Product Image is required',
            'image.image' => 'Please choose a image file',
            'image.mimes' => 'Image extension can be png, jpg, jpeg',
            'status.required' => 'Product status is required',
            'deal.required' => 'Deal of the Day field is required',
        ]);

        $img = Image::make($request->image);
        $img_name = auth()->id() . auth()->user()->name . Str::random('5') . '.' . $request->image->getClientOriginalExtension();
        $img->save(base_path('public/backend/assets/images/product-img/' . $img_name));


        Product::insert([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'short_desc' => $request->short_desc,
            'image' => $img_name,
            'status' => $request->status,
            'deal' => $request->deal,
            'discount' => $request->discount,
        ]);

        return back()->with('success' , 'Successfully create your Product');
    }






    public function show(Product $product)
    {
        //
    }





    //========================================
    // EDIT method for updating product data
    //========================================
    public function edit($id)
    {
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $products = Product::find($id);
        return view('backend.product.edit', compact('products' , 'sub_categories', 'categories'));
    }





    //========================================
    // UPDATE method for updating product data
    //========================================
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'description' => 'required',
            'short_desc' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg',
            'status' => 'required',
            'deal' => 'required',
        ], [
            'category_id.required' => 'Category name is required',
            'sub_category_id.required' => 'Sub Category name is required',
            'name.required' => 'Product name is required',
            'price.required' => 'Price rate is required',
            'price.numeric' => 'It must be numeric',
            'quantity.required' => 'Product quantity is required',
            'quantity.numeric' => 'It must be numeric',
            'description.required' => 'Description is required',
            'short_desc.required' => 'Short description is required',
            'image.image' => 'Please choose a image file',
            'image.mimes' => 'Image extension can be png, jpg, jpeg',
            'status.required' => 'Product status is required',
            'deal.required' => 'Deal of the Day field is required',
        ]);

        if ($request->hasFile('image')) {
            unlink(base_path('public/backend/assets/images/product-img/' . Product::find($id)->image));
            $img = Image::make($request->image);
            $img_name = auth()->id() . auth()->user()->name . Str::random('5') . '.' . $request->image->getClientOriginalExtension();
            $img->save(base_path('public/backend/assets/images/product-img/' . $img_name));

            Product::find($id)->update([
                'image' => $img_name,
            ]);

        }

        Product::find($id)->update([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'short_desc' => $request->short_desc,
            'status' => $request->status,
            'deal' => $request->deal,
            'discount' => $request->discount,
        ]);

        return back()->with('success', 'Successfully Updated your Product');
    }





    //========================================
    // DESTROY method for delete product data
    //========================================
    public function destroy($id)
    {
        Product::find($id)->delete();
        return back();
    }
}
