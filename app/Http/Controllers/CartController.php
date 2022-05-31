<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Carbon;

class CartController extends Controller
{





    /*
    |--------------------------------------------------------------------------
    |                              INDEX METHOD
    |--------------------------------------------------------------------------
    */
    public function index($id){

        if (cart_exist($id)) {
            $amount = Cart::where('product_id', $id)->first()->amount;
            $quantity = Product::find($id)->quantity;

            if ($amount < $quantity) {
                Cart::where('product_id', $id)->first()->update([
                    'amount' => $amount + 1,
                ]);
            }
            
            return back();
        }
        else{
            $quantity   = Product::find($id)->quantity;
            $vendor_id  = Product::find($id)->user_id;
            if ($quantity >= 1) {
                Cart::create([
                    'user_id' => auth()->id(),
                    'vendor_id' => $vendor_id,
                    'product_id' => $id,
                    'amount' => 1,
                    'status' => 1,
                ]);
                return back();
            } else {

                return back()->with('warning', 'This product is stock out');
            }
        }

    }





    /*
    |--------------------------------------------------------------------------
    |                              PRODUCT PAGE CART METHOD
    |--------------------------------------------------------------------------
    */
    public function productPageCart(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|integer|min:1',
        ], [
            'amount.required' => "Please set your quantity",
            'amount.integer' => "Please set your quantity",
            'amount.min' => "Please set your quantity",
        ]);

        $quantity = Product::find($id)->quantity;

        if ($request->amount <= $quantity) {


            if (cart_exist($id)) {

                $previous_amount = Cart::where('product_id', $id)->first()->amount;
                $unit_amount = $previous_amount+$request->amount;

                if ($unit_amount <= $quantity) {
                    Cart::where('product_id', $id)->first()->update([
                        'amount' => $unit_amount,
                    ]);
                    return back()->with('success', 'successfully updated in your cart.');
                }
                else{
                    return back()->with('danger', 'Sorry! We have not enough stock.');
                }

            }
            else{
                Cart::create([
                    'product_id' => $id,
                    'user_id' => auth()->id(),
                    'amount' => $request->amount,
                    'status' => 1,
                ]);
                return back()->with('success', 'successfully added in your cart.');
            }
            

        }
        else{
            return back()->with('danger', 'Sorry! We have not enough stock.');
        }
    }





    /*
    |--------------------------------------------------------------------------
    |                              DELETE METHOD
    |--------------------------------------------------------------------------
    */
    public function delete($id)
    {
        Cart::find($id)->delete();
        return back();
    }





    /*
    |--------------------------------------------------------------------------
    |                              VIEW METHOD
    |--------------------------------------------------------------------------
    */
    public function view(Request $request)
    {

        if ($request->has('coupon_code')) {

            $code_name = $request->coupon_code;

            if (Coupon::where('code', $code_name)->exists()) {
                $coupon_info = Coupon::where('code', $code_name)->first();

                if ($coupon_info->limit >=1) {

                    if ($coupon_info->validity >= Carbon::today()->format('Y-m-d')) {

                        $discount = (session('s_cart_total') * $coupon_info->discount)/100;
                        $coupon = $coupon_info->code;
                        
                    }
                    else {
                        return redirect('carts/view')->with([
                            'code_name' => $code_name,
                            'coupon_error' => "Coupon validity date is over!"
                        ]);
                    }
                    
                }
                else {
                    return redirect('carts/view')->with([
                        'code_name' => $code_name,
                        'coupon_error' => "Coupon limit is over!"
                    ]);
                }
                
            }
            else {
                return redirect('carts/view')->with([
                    'code_name' => $code_name,
                    'coupon_error' => "Invalid coupon!"
                ]);
            }
        }
        else {
            $discount = 0;
            $coupon = "";
        }



        $carts = Cart::where('user_id', auth()->id())->get();

        return view('frontend.cart.view', compact('carts', 'coupon', 'discount'));
    }





    /*
    |--------------------------------------------------------------------------
    |                              CART UPDATE METHOD
    |--------------------------------------------------------------------------
    */
    public function cartUpdate(Request $request)
    {

        foreach ($request->amount as $cart_id => $updated_amount) {

            Cart::find($cart_id)->update([
                'amount' => $updated_amount
            ]);
            
        }

        return back();

    }
}
