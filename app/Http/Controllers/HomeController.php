<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Testimonial;

class HomeController extends Controller
{
    




    /*
    |--------------------------------------------------------------------------
    |                              __CONSTRUCT METHOD
    |--------------------------------------------------------------------------
    */
    public function __construct()
    {
        $this->middleware('auth');
    }





    /*
    |--------------------------------------------------------------------------
    |                              INDEX METHOD
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        if (auth()->user()->roll == 3) {

            $categories = Category::all();
            $sub_categories = SubCategory::all();
            $products = Product::all();
            $banners = Banner::all();
            $testimonials = Testimonial::all();

            return view('frontend.index', compact('categories', 'sub_categories', 'products', 'banners', 'testimonials'));
        } else {
            return view('backend.index');
        }
        
        
    }
}
