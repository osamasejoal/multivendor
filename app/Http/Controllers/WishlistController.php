<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index($id){

// return ;
// die();

        if (Wishlist::where('product_id', $id)->first()) {
            return back()->with([
                'error' => 'already exist',
                'product_id' => $id,
            ]);
        }
        else{
            Wishlist::create([
                'product_id' => $id,
                'user_id' => auth()->id(),
                'status' => 1,
            ]);

            return back();
        }

        
    }
}
