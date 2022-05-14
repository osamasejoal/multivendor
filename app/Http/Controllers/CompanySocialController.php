<?php

namespace App\Http\Controllers;

use App\Models\CompanySocial;
use Illuminate\Http\Request;

class CompanySocialController extends Controller
{
 




    /*
    |--------------------------------------------------------------------------
    |                              INDEX METHOD
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $socials =  CompanySocial::all();
        return view('backend.company-social.view', compact('socials'));
    }





    /*
    |--------------------------------------------------------------------------
    |                              CREATE METHOD
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('backend.company-social.add');
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
            'link' => 'required|url',
            'icon' => 'required',
        ], [
            'name.required' => 'Social media name is required',
            'link.required' => 'Social media link is required',
            'link.url' => 'Please enter a valid url',
            'icon.required' => 'Social media icon is required',
        ]);

        CompanySocial::insert([
            'name' => $request->name,
            'link' => $request->link,
            'icon' => $request->icon,
        ]);

        return back();
    }






    public function show(CompanySocial $companySocial)
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
        $social = CompanySocial::find($id);
        return view('backend.company-social.edit', compact('social'));
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
            'link' => 'required|url',
            'icon' => 'required',
        ], [
            'name.required' => 'Social media name is required',
            'link.required' => 'Social media link is required',
            'link.url' => 'Please enter a valid url',
            'icon.required' => 'Social media icon is required',
        ]);

        CompanySocial::find($id)->update([
            'name' => $request->name,
            'link' => $request->link,
            'icon' => $request->icon,
        ]);

        return back();
    }





    /*
    |--------------------------------------------------------------------------
    |                              DESTROY METHOD
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        CompanySocial::find($id)->delete();
        return back();
    }
}
