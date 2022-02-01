<?php

namespace App\Http\Controllers;

use App\Models\CompanyInfo;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class CompanyInfoController extends Controller
{
    public function index(){
        $company_profile = CompanyInfo::first();
        return view('backend.profile.company-profile', compact('company_profile'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'logo' => 'image|mimes:png',
        ], [
           'name.required' => 'Company name is required',
           'phone.required' => 'Phone number is required',
           'email.required' => 'Email address is required',
            'email.email' => 'Please select a valid email address',
           'address.required' => 'Company address is required',
           'logo.image' => 'Please choose a Image',
           'logo.mimes' => 'Logo can be a png file',
        ]);

        if ($request->hasFile('logo')) {
            unlink(base_path('public/backend/assets/images/company-logo/' . CompanyInfo::find($id)->logo));
            $img = Image::make($request->logo);
            $img_name = auth()->id() . auth()->user()->name . Str::random('5') . '.' . $request->logo->getClientOriginalExtension();
            $img->save(base_path('public/backend/assets/images/company-logo/' . $img_name));

            CompanyInfo::find($id)->update([
                'logo' => $img_name,
            ]);
        }

        CompanyInfo::find($id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        return back();
    }
}
