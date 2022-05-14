<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    




    /*
    |--------------------------------------------------------------------------
    |                              INDEX METHOD
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $vendors =Vendor::all();
        return view('backend.vendor.view', compact('vendors'));
    }





    /*
    |--------------------------------------------------------------------------
    |                              CREATE METHOD
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('backend.vendor.add');
    }





    /*
    |--------------------------------------------------------------------------
    |                              STORE METHOD
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'logo' => 'required|image|mimes:png,jpg,jpeg',
        ], [
            'name.required' => 'This field is required',
            'email.required' => 'This field is required',
            'email.email' => 'Please enter a valid email',
            'address.required' => 'This field is required',
            'phone.required' => 'This field is required',
            'logo.required' => 'This field is required',
            'logo.image' => 'Please choose a image',
            'logo.mimes' => 'it can be jpg, jpeg or png',
        ]);

        // $rand_pass = Str::random('10');

        $user_info = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('12345678'),
            'image' => 'default.png',
            'roll' => 2,
        ]);

        $img = Image::make($request->logo);
        $img_name = auth()->id() . auth()->user()->name . Str::random('5') . '.' . $request->logo->getClientOriginalExtension();
        $img->save(base_path('public/backend/assets/images/vendor-logo/' . $img_name));

        Vendor::insert([
            'user_id' => $user_info->id,
            'address' => $request->address,
            'phone' => $request->phone,
            'logo' => $img_name,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Vendor account created successfully');
    }






    public function show(Vendor $vendor)
    {
        //
    }





    public function edit($id)
    {
        
    }





    public function update(Request $request, Vendor $vendor)
    {
        //
    }





    /*
    |--------------------------------------------------------------------------
    |                              DESTROY METHOD
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        Vendor::find($id)->delete();
        return back();
    }
}
