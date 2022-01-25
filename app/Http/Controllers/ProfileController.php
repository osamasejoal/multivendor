<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index(){
        return view('backend.profile.user-data');
    }

    public function update(Request $request){
        
        if ($request->hasFile('image')) {
            if (auth()->user()->image != 'default.png') {
                unlink(base_path('public/backend/assets/images/profile-pic/' . $request->image));
            }
            $img = Image::make($request->image);
            $img_name = auth()->id() . auth()->user()->name . Str::random('5') . "." . $request->image->getClientOriginalExtension();
            $img->save(base_path('public/backend/assets/images/profile-pic/' . $img_name));
            // return auth()->id();
            // die();
            User::find(auth()->id())->update([
                'image' => $img_name,
            ]);
        }
        

        User::find(auth()->id())->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return back();
    }
}
