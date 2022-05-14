<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{





    /*
    |--------------------------------------------------------------------------
    |                              INDEX METHOD
    |--------------------------------------------------------------------------
    */
    public function index($id){

        Wishlist::create([
            'product_id' => $id,
            'user_id' => auth()->id(),
            'status' => 1,
        ]);

        return back();
    }
    




    /*
    |--------------------------------------------------------------------------
    |                              DELETE METHOD
    |--------------------------------------------------------------------------
    */
    public function delete($id){
        Wishlist::find($id)->delete();
        return back();
    }





    /*
    |--------------------------------------------------------------------------
    |                              VIEW METHOD
    |--------------------------------------------------------------------------
    */
    public function view()
    {
        $wishlists = Wishlist::all();
        return view('frontend.wishlists', compact('wishlists'));
    }
}
