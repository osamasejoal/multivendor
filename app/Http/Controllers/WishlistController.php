<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{





    //=================================
    // INDEX method for add to wishlist
    //=================================
    public function index($id){

        Wishlist::create([
            'product_id' => $id,
            'user_id' => auth()->id(),
            'status' => 1,
        ]);

        return back();
    }
    

    


    //==================================
    // DELETE method for add to wishlist
    //==================================
    public function delete($id){
        Wishlist::find($id)->delete();
        return back();
    }





    //===========================================
    // view method for show to wishlist page
    //===========================================
    public function view()
    {
        $wishlists = Wishlist::all();
        return view('frontend.wishlists', compact('wishlists'));
    }
}
