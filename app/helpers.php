<?php

use App\Models\Cart;
use App\Models\CompanyInfo;
use App\Models\CompanySocial;
use App\Models\Product;
use App\Models\Wishlist;

function carts(){
    return Cart::where( 'user_id', auth()->id() )->get();
}

function wishlists(){
    return Wishlist::where( 'user_id', auth()->id() )->get();
}

function cart_exist($id){
    return Cart::where('user_id', auth()->id())
        ->where('product_id', $id)
        ->first();
}

function wishlist_exist($id){
    return Wishlist::where('user_id', auth()->id())
        ->where('product_id', $id)
        ->first();
}



//---------------------------------------------------
// company_data() method for showing CompanyInfo data 
//---------------------------------------------------
function company_data(){
    return CompanyInfo::first();
}



//-------------------------------------------------------
// company_social() method for showing CompanySocial data 
//-------------------------------------------------------
function company_social(){
    return CompanySocial::all();
}

?>