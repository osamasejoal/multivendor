<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    




/*
|--------------------------------------------------------------------------
|                             ADD COUNTRY METHOD
|--------------------------------------------------------------------------
*/
    public function addCountry(){
        return view('backend.area.country.add');
    }
    




/*
|--------------------------------------------------------------------------
|                             STORE COUNTRY METHOD
|--------------------------------------------------------------------------
*/
    public function storeCountry(Request $request){
        $request->validate([
            'name' => 'required|string|unique:countries,name'
        ], [
            'name.required' => 'This field is required',
            'name.string' => 'Please set a country name',
            'name.unique' => 'This is country is already in database',
        ]);

        Country::insert([
            'name' => $request->name,
        ]);

        return back()->with('success', 'Successfully add your country');
    }
    




/*
|--------------------------------------------------------------------------
|                             VIEW COUNTRY METHOD
|--------------------------------------------------------------------------
*/
    public function viewCountries(){
        $countries = Country::all();
        return view('backend.area.country.view', compact('countries'));
    }
    




/*
|--------------------------------------------------------------------------
|                           DESTROY COUNTRY METHOD
|--------------------------------------------------------------------------
*/
    public function destroyCountries($id){
        Country::find($id)->delete();
        return back()->with('success', 'Successfully deleted your country');
    }
    




/*
|--------------------------------------------------------------------------
|                             ADD CITY METHOD
|--------------------------------------------------------------------------
*/
    public function addCity(){
        $countries = Country::all();
        return view('backend.area.city.add', compact('countries'));
    }
    




/*
|--------------------------------------------------------------------------
|                             STORE CITY METHOD
|--------------------------------------------------------------------------
*/
    public function storeCity(Request $request){
        $request->validate([
            'country_id' => 'required|integer',
            'name' => 'required|string'
        ], [
            'country_id.required' => 'This field is required',
            'country_id.integer' => "Don't be shy",
            'name.required' => 'This field is required',
            'name.string' => 'Please set a City name',
        ]);

        City::insert([
            'country_id' =>$request->country_id,
            'name' => $request->name,
        ]);

        return back()->with('success', 'Successfully add your City');
    }
    




/*
|--------------------------------------------------------------------------
|                             VIEW CITY METHOD
|--------------------------------------------------------------------------
*/
    public function viewCities(){
        $cities = City::all();
        return view('backend.area.city.view', compact('cities'));
    }
    




/*
|--------------------------------------------------------------------------
|                           DESTROY CITY METHOD
|--------------------------------------------------------------------------
*/
    public function destroyCities($id){
        Country::find($id)->delete();
        return back()->with('success', 'Successfully deleted your country');
    }


}
