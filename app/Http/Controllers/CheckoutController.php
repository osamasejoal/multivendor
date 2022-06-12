<?php

namespace App\Http\Controllers;

use App\Models\BillingDetail;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Country;
use App\Models\City;
use App\Models\Coupon;
use App\Models\OrderDetail;
use App\Models\OrderSummary;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{





    /*
|--------------------------------------------------------------------------
|                             VIEW METHOD
|--------------------------------------------------------------------------
*/
    public function view()
    {

        if (strpos(url()->previous(), 'carts/view') || strpos(url()->previous(), '/check/out')) {
            $carts      = Cart::where('user_id', auth()->id())->get();
            $countries  = Country::all();
            return view('frontend.checkout.view', compact('carts', 'countries'));
        } else {
            abort(404);
        }
    }





    /*
|--------------------------------------------------------------------------
|                           CHECKOUT POST METHOD
|--------------------------------------------------------------------------
*/
    public function checkoutPost(Request $request)
    {

        $request->validate([
            '*'                 => 'required',
            'payment_option'    => 'required',
            'order-notes'       => 'nullable',
        ], [
            'payment_option.required'   => "Please select your payment option",
            '*.required'                => "This field is required",
        ]);


        $order_summary_id = OrderSummary::insertGetId([
            'user_id'           => auth()->id(),
            'coupon_code'       => session('s_coupon_code'),
            'cart_total'        => session('s_cart_total'),
            'discount_total'    => session('s_discount'),
            'sub_total'         => session('s_subtotal'),
            'shipping'          => 30,
            'grand_total'       => session('s_subtotal') + 30,
            'payment_option'    => $request->payment_option,
            'created_at'        => Carbon::now(),
        ]);


        BillingDetail::insert([
            'order_summary_id'  => $order_summary_id,
            'name'              => $request->name,
            'email'             => $request->email,
            'phone_number'      => $request->phone,
            'country_id'        => $request->country,
            'city_id'           => $request->city,
            'address'           => $request->address,
            'postcode'          => $request->postcode,
            'order_notes'       => $request->order_notes,
            'created_at'        => Carbon::now(),
        ]);


        $carts = Cart::where('user_id', auth()->id())->get();
        foreach ($carts as $cart) {
            OrderDetail::insert([
                'order_summary_id' => $order_summary_id,
                'vendor_id' => $cart->vendor_id,
                'product_id' => $cart->product_id,
                'product_price' => $cart->relationToProduct->price,
                'amount' => $cart->amount,
            ]);

            // Quantity decreament from PRODUCT table
            Product::find($cart->product_id)->decrement('quantity', $cart->amount);

            // Delete from CART table
            Cart::find($cart->id)->delete();
        }
        
        // Limit decreament from COUPON table
        if (session('s_coupon_code')) {
            Coupon::where('code', session('s_coupon_code'))->decrement('limit', 1);
        }

        if ($request->payment_option == 1) {
            return redirect('/my/orders');
        } else {
            Session::put('s_order_summary_id', $order_summary_id);
            return redirect('/pay');
        }
        
    }





    /*
|--------------------------------------------------------------------------
|                           CITY LIST METHOD
|--------------------------------------------------------------------------
*/
    public function cityList(Request $request)
    {
        $str_city = "<option value=''>Select a City</option>";
        $cities = City::where('country_id', $request->country_id)->get();
        foreach ($cities as $city) {
            $str_city .= "<option value='$city->id'>$city->name</option>";
        }
        echo $str_city;
    }
}
