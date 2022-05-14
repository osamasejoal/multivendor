<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
  




    /*
    |--------------------------------------------------------------------------
    |                              INDEX METHOD
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $customers = User::where('roll', 3)->get();
        return view('backend.customer.view', compact('customers'));
    }





    /*
    |--------------------------------------------------------------------------
    |                              CREATE METHOD
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('backend.customer.add');
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
        ], [
            'name.required' => 'This field is required',
            'email.required' => 'This field is required',
            'email.email' => 'Please enter a valid email',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('12345678'),
            'image' => 'default.png',
            'roll' => 3,
        ]);

        return back()->with('success', 'Customer account created successfully');
    }






    public function show($id)
    {
        //
    }





    public function edit($id)
    {
        //
    }





    public function update(Request $request, $id)
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
        User::find($id)->delete();
        return back();
    }
}
