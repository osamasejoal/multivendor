<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function view(){
        
        if (strpos(url()->previous(), 'carts/view')) {
            return view('frontend.checkout.view');
        } else {
            abort(404);
        }
        
    }
}
