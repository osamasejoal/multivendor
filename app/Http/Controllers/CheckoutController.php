<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CheckoutController extends Controller
{
       




/*
|--------------------------------------------------------------------------
|                             VIEW METHOD
|--------------------------------------------------------------------------
*/
    public function view(){
        
        if (strpos(url()->previous(), 'carts/view')) {
            $carts = Cart::all();
            return view('frontend.checkout.view', compact('carts'));
        } else {
            abort(404);
        }
        
    }
   




/*
|--------------------------------------------------------------------------
|                           CHECKOUT POST METHOD
|--------------------------------------------------------------------------
*/
    public function checkoutPost(Request $request){
        return $request;
    }
}
