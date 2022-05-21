<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CouponController extends Controller
{
    




    /*
    |--------------------------------------------------------------------------
    |                              INDEX METHOD
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $coupons = Coupon::all();
        return view('backend.coupon.view', compact('coupons'));
    }
  




    /*
    |--------------------------------------------------------------------------
    |                              CREATE METHOD
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('backend.coupon.add');
    }
  




    /*
    |--------------------------------------------------------------------------
    |                              STORE METHOD
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'code'      => 'required',
            'discount'  => 'required|numeric|min:1|max:99',
            'validity'  => 'required|date|after_or_equal:today',
            'limit'     => 'required|numeric|min:1',
            'status'    => 'required',
        ], [
            'name.required'             => 'This field is required.',
            'code.required'             => 'This field is required.',
            'discount.required'         => 'This field is required.',
            'discount.numeric'          => 'Please enter a numeric type data.',
            'discount.min'              => 'The discount must be at least 1.',
            'discount.max'              => 'The discount must not be greater than 99.',
            'validity.required'         => 'This field is required.',
            'validity.date'             => 'Please enter a valid date.',
            'validity.after_or_equal'   => 'Please enter a date after or equal to today.',
            'limit.required'            => 'This field is required.',
            'limit.numeric'             => 'Please enter a numeric type data.',
            'limit.min'                 => 'The limit must be at least 1.',
            'status.required'           => 'This field is required.',
        ]);

        Coupon::insert($request->except('_token') + [
            'created_at' =>Carbon::now()
        ]);

        return back()->with('success', 'Successfully created your coupon');
    }






    public function show(Coupon $coupon)
    {
        //
    }
  




    /*
    |--------------------------------------------------------------------------
    |                              EDIT METHOD
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('backend.coupon.edit', compact('coupon'));
    }
  




    /*
    |--------------------------------------------------------------------------
    |                              UPDATE METHOD
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'discount'  => 'required|numeric|min:1|max:99',
            'validity'  => 'required|date|after_or_equal:today',
            'limit'     => 'required|numeric|min:1',
            'status'    => 'required',
        ], [
            'discount.required'         => 'This field is required.',
            'discount.numeric'          => 'Please enter a numeric type data.',
            'discount.min'              => 'The discount must be at least 1.',
            'discount.max'              => 'The discount must not be greater than 99.',
            'validity.required'         => 'This field is required.',
            'validity.date'             => 'Please enter a valid date.',
            'validity.after_or_equal'   => 'Please enter a date after or equal to today.',
            'limit.required'            => 'This field is required.',
            'limit.numeric'             => 'Please enter a numeric type data.',
            'limit.min'                 => 'The limit must be at least 1.',
            'status.required'           => 'This field is required.',
        ]);

        // return $request->except('_token', '_method');
        Coupon::find($id)->update($request->except('_token', '_method') + [
            'updated_at' => Carbon::now()
        ]);
        return back()->with('success', 'Successfully updated your coupon');
    }
  




    /*
    |--------------------------------------------------------------------------
    |                              DESTROY METHOD
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        Coupon::find($id)->delete();
        return back();
    }
}
