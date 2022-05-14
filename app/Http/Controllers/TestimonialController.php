<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;


class TestimonialController extends Controller
{
   




    /*
    |--------------------------------------------------------------------------
    |                              INDEX METHOD
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('backend.testimonial.view', compact('testimonials'));
    }
 




    /*
    |--------------------------------------------------------------------------
    |                              CREATE METHOD
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('backend.testimonial.add');
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
            'profession' => 'required',
            'comment' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg',
        ], [
            'name.required' => 'This field is required',
            'profession.required' => 'This field is required',
            'comment.required' => 'This field is required',
            'image.required' => 'This field is required',
            'image.image' => 'Please choose a image',
            'image.mimes' => 'It can be jpg or jpeg',
        ]);

        $img = Image::make($request->image);
        $img_name = auth()->id() . auth()->user()->name . Str::random('5') . '.' . $request->image->getClientOriginalExtension();
        $img->save(base_path('public/backend/assets/images/testimonial-img/' . $img_name));

        Testimonial::insert([
            'name' => $request->name,
            'profession' => $request->profession,
            'comment' => $request->comment,
            'image' => $img_name,
            'status' => 1,
        ]);

        return back()->with('success', 'Successfully create your testimonial');
    }






    public function show(Testimonial $testimonial)
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
        $testimonial = Testimonial::find($id);
        return view('backend.testimonial.edit', compact('testimonial'));
    }





    /*
    |--------------------------------------------------------------------------
    |                              UPDATE METHOD
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'profession' => 'required',
            'comment' => 'required',
            'image' => 'image|mimes:jpg,jpeg',
            'status' => 'required',
        ], [
            'name.required' => 'This field is required',
            'profession.required' => 'This field is required',
            'comment.required' => 'This field is required',
            'image.image' => 'Please choose a image',
            'image.mimes' => 'It can be jpg or jpeg',
            'status.required' => 'This field is required',
        ]);

        if ($request->hasFile('image')) {
            unlink(base_path('public/backend/assets/images/testimonial-img/' . Testimonial::find($id)->image));
            $img = Image::make($request->image);
            $img_name = auth()->id() . auth()->user()->name . Str::random('5') . '.' . $request->image->getClientOriginalExtension();
            $img->save(base_path('public/backend/assets/images/testimonial-img/' . $img_name));

            Testimonial::find($id)->update([
                'image' => $img_name,
            ]);
        }

        Testimonial::find($id)->update([
            'name' => $request->name,
            'profession' => $request->profession,
            'comment' => $request->comment,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Successfully updated your testimonial');
    }





    /*
    |--------------------------------------------------------------------------
    |                              DESTROY METHOD
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        unlink(base_path('public/backend/assets/images/testimonial-img/' . Testimonial::find($id)->image));
        Testimonial::find($id)->delete();
        return back();
    }
}
