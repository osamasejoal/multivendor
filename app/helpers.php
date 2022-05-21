<?php

use App\Models\Cart;
use App\Models\CompanyInfo;
use App\Models\CompanySocial;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;



/*
|--------------------------------------------------------------------------
|                              CARTS METHOD
|--------------------------------------------------------------------------
*/
function carts(){
    return Cart::where( 'user_id', auth()->id() )->get();
}



/*
|--------------------------------------------------------------------------
|                           WISHLISTS METHOD
|--------------------------------------------------------------------------
*/
function wishlists(){
    return Wishlist::where( 'user_id', auth()->id() )->get();
}



/*
|--------------------------------------------------------------------------
|                          CART EXIST METHOD
|--------------------------------------------------------------------------
*/
function cart_exist($id){
    return Cart::where('user_id', auth()->id())
        ->where('product_id', $id)
        ->first();
}



/*
|--------------------------------------------------------------------------
|                          WISHLIST EXIST METHOD
|--------------------------------------------------------------------------
*/
function wishlist_exist($id){
    return Wishlist::where('user_id', auth()->id())
        ->where('product_id', $id)
        ->first();
}



/*
|--------------------------------------------------------------------------
|                          GET VENDOR METHOD
|--------------------------------------------------------------------------
*/
function get_vendor($id){
    return User::find($id)->name;
}



/*
|--------------------------------------------------------------------------
|                          COMPANY DATA METHOD
|--------------------------------------------------------------------------
*/
function company_data(){
    return CompanyInfo::first();
}



/*
|--------------------------------------------------------------------------
|                          COMPANY SOCIAL METHOD
|--------------------------------------------------------------------------
*/
function company_social(){
    return CompanySocial::all();
}

?>