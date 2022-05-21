<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

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
    public function view()
    {
        $carts = Cart::all();
        return view('frontend.cart.view', compact('carts'));
    }





    /*
    |--------------------------------------------------------------------------
    |                              VIEW METHOD
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
