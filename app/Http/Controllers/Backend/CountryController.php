<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryStoreRequest;
use App\Http\Requests\CountryUpdateRequest;

class CountryController extends Controller
{
    public function index(Request $request)
    {
       $countries = Country::all();
       if($request->has('search')){
           $countries = Country::where('name','like',"%{$request->search}%")->get();
       }
       return view('country.index',compact('countries'));

    }

    public function create()
    {
        return view('country.create');
    }

    public function store(CountryStoreRequest $request)
    {
        Country::create([
            'country_code' => $request->country_code,
            'name' => $request->name,

        ]);
        return redirect()->route('countries.index')->with('message', 'Country added Succesfully');

        
    }


    public function edit(Country $country)
    {
       return view('country.edit',compact('country'));
    }

    public function update(CountryUpdateRequest $request, Country $country)
    {
       
        $country->update([
            'name' => $request->name,
            'country_code' => $request->country_code,

        ]);

        return redirect()->route('countries.index')->with('message', 'Country Updated Succesfully');
    }

    public function destroy(Country $country){


        $country->delete();
        return redirect()->route('countries.index')->with('message', 'Could not find Country');
        
    }

}
