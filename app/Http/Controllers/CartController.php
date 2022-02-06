<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{





    //==============================
    // CUSTOM method for add to cart
    //==============================
    public function index($id){

        if (cart_exist($id)) {
            $amount = Cart::where('product_id', $id)->first()->amount;

            Cart::where('product_id', $id)->first()->update([
                'amount' => $amount + 1,
            ]);

            return back();
        }
        else{
            $quantity = Product::find($id)->quantity;
            if ($quantity >= 1) {
                Cart::create([
                    'product_id' => $id,
                    'user_id' => auth()->id(),
                    'amount' => 1,
                    'status' => 1,
                ]);
                return back();
            } else {
                return back()->with('warning', 'This product is stock out');
            }
        }

    }





    //==============================
    // DELETE method for add to cart
    //==============================
    public function delete($id)
    {
        Cart::find($id)->delete();
        return back();
    }





    //====================================
    // view method for show to carts page
    //====================================
    public function view()
    {
        $carts = Cart::all();
        return view('frontend.carts', compact('carts'));
    }
}
