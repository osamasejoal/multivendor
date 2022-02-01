<?php

namespace App\Http\Controllers;

use App\Models\CompanySocial;
use Illuminate\Http\Request;

class CompanySocialController extends Controller
{
   




    //===============================================
    // index method for showing company social data
    //===============================================
    public function index()
    {
        $socials =  CompanySocial::all();
        return view('backend.company-social.view', compact('socials'));
    }





    //===============================================
    // create method for creating company social data
    //===============================================
    public function create()
    {
        return view('backend.company-social.add');
    }





    //===============================================
    // store method for creating company social data
    //===============================================
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





    //===============================================
    // edit method for updating company social data
    //===============================================
    public function edit($id)
    {
        $social = CompanySocial::find($id);
        return view('backend.company-social.edit', compact('social'));
    }





    //===============================================
    // update method for updating company social data
    //===============================================
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





    //===============================================
    // destroy method for deleting company social data
    //===============================================
    public function destroy($id)
    {
        CompanySocial::find($id)->delete();
        return back();
    }
}
