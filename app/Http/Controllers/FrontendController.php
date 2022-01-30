<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\CompanyInfo;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    




    public function index()
    {
        
    }
  



    
    public function create()
    {
        //
    }
  



    
    public function store(Request $request)
    {
        //
    }
  



    
    public function show($id)
    {
        //
    }
  



    
    public function edit($id)
    {
        //
    }
  



    
    public function update(Request $request, $id)
    {
        //
    }
  



    
    public function destroy($id)
    {
        //
    }




    // ===================================
    // FRONTPAGE method for view frontpage
    // ===================================
    public function frontpage(){
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $products = Product::all();
        $company_info = CompanyInfo::all()->first();

        return view('frontend.front-page', compact('categories', 'sub_categories', 'products', 'company_info'));
    }
    



    // ====================================================
    // categoryProduct method for view categorywise product
    // ====================================================
    public function categoryProduct($id){

        $category = Category::find($id);
        $products = Product::where('category_id', $id)->get();
            return view('frontend.category-product', compact('products', 'category'));
        
    }




    // ===============================================
    // productPage method for view single product page
    // ===============================================
    public function productPage($id){
        $product = Product::find($id);
        return view('frontend.single-product', compact('product'));

    }




    // ===============================================
    // dealOfTheDay method for view single product page
    // ===============================================
    public function dealOfTheDay(){
        
        $deals = Product::where('deal', 1)->get();
        return view('frontend.deal-of-the-day', compact('deals'));

    }


}
