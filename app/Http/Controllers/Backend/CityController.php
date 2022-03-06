<?php

namespace App\Http\Controllers\Backend;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityStoreRequest;

class CityController extends Controller
{

    public function index()
    {
        $cities = City::all();
        return view('city.index',compact('cities'));
    }

    public function create()
    {
       
        $states = State::all();
        return view('city.create',compact('states'));
    }


    public function store(Request $request)
    {
        $cities = City::all();
        City::create([            
        'state_id'=>$request->state_id,
        'name' =>$request->name
        ]);

        return redirect()->route('cities.index')->with('message','City stored successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit(City $city)
    {
        $states = State::all();
        return view('city.edit',compact('states','city'));
    }


    
    public function update(CityStoreRequest $request, City $city)
    {
        $city->update([
            'state_id' => $request->state_id,
            'name' => $request->name
        ]);

        return redirect()->route('cities.index')->with('message','City Updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delet();
        return redirect()->route('cities.index')->with('message','City Deleted successfully');
    }
}
