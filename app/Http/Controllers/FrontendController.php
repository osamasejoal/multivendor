<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\CompanyInfo;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Testimonial;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
  




    /*
    |--------------------------------------------------------------------------
    |                              FRONTPAGE METHOD
    |--------------------------------------------------------------------------
    */
    public function frontpage(){
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $products = Product::all();
        $banners = Banner::all();
        $testimonials = Testimonial::all();

        return view('frontend.index', compact('categories', 'sub_categories', 'products', 'banners', 'testimonials'));
    }
    




    /*
    |--------------------------------------------------------------------------
    |                          CATEGORY PRODUCT METHOD
    |--------------------------------------------------------------------------
    */
    public function categoryProduct($id){

        $category = Category::find($id);
        $products = Product::where('category_id', $id)->get();
            return view('frontend.category-product', compact('products', 'category'));
        
    }





    /*
    |--------------------------------------------------------------------------
    |                            PRODUCT PAGE METHOD
    |--------------------------------------------------------------------------
    */
    public function productPage($id){
        $product = Product::find($id);
        return view('frontend.single-product', compact('product'));

    }





    /*
    |--------------------------------------------------------------------------
    |                         DEAL OF THE DAY METHOD
    |--------------------------------------------------------------------------
    */
    public function dealOfTheDay(){
        
        $deals = Product::where('deal', 1)->get();
        return view('frontend.deal-of-the-day', compact('deals'));

    }


}
