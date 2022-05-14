<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    




    /*
    |--------------------------------------------------------------------------
    |                              INDEX METHOD
    |--------------------------------------------------------------------------
    */
    public function index(){
        return view('backend.profile.view');
    }





    /*
    |--------------------------------------------------------------------------
    |                              UPDATE METHOD
    |--------------------------------------------------------------------------
    */
    public function update(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'image' => 'image | mimes:png,jpg,jpeg',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email',
            'image.image' => 'Please choose a image file',
            'image.mimes' => 'It can be png, jpg or jpeg file',
        ]);
        
        if ($request->hasFile('image')) {
            if (auth()->user()->image != 'default.png') {
                unlink(base_path('public/backend/assets/images/profile-pic/' . $request->image));
            }
            $img = Image::make($request->image);
            $img_name = auth()->id() . auth()->user()->name . Str::random('5') . "." . $request->image->getClientOriginalExtension();
            $img->save(base_path('public/backend/assets/images/profile-pic/' . $img_name));

            User::find(auth()->id())->update([
                'image' => $img_name,
            ]);
        }
        

        User::find(auth()->id())->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('success', "Successfully updated your data");
    }
    




    /*
    |--------------------------------------------------------------------------
    |                         CUSTOMER PROFILE METHOD
    |--------------------------------------------------------------------------
    */
    public function customer_profile(){
        return view('frontend.customer-profile');
    }

}
