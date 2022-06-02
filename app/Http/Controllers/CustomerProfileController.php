<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class CustomerProfileController extends Controller
{
    




    /*
    |--------------------------------------------------------------------------
    |                         MY PROFILE METHOD
    |--------------------------------------------------------------------------
    */
    public function myProfile(){
        return view('frontend.profile.my-profile');
    }
    




    /*
    |--------------------------------------------------------------------------
    |                         UPDATE MY PROFILE METHOD
    |--------------------------------------------------------------------------
    */
    public function updateMyProfile(Request $request){
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'image|mimes:png,jpg,jpeg',
        ], [
            'name.required' => "This field is required",
            'email.required' => "This field is required",
            'email.email' => "Please enter a valid email",
            'image.image' => "Please choose a image",
            'image.mimes' => "We allow png,jpg & jpeg",
        ]);

        if ($request->hasFile('image')) {
            if (auth()->user()->image != 'default.png' ) {
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

        return back()->with('success', 'Successfully updated your profile');
    }

}
