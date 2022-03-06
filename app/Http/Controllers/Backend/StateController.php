<?php

namespace App\Http\Controllers\Backend;

use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StateStoreRequest;

class StateController extends Controller
{

    public function index(Request $request)
    {
        $states = State::all();
        if($request->has('search')){
            $states = State::where('name','like',"%{$request->search}%")->get();
        }
        return view('state.index',compact('states'));
    }

 
    public function create()
    {
        $countries = Country::all();
        return view('state.create',compact('countries'));
    }



    public function store(StateStoreRequest $request)
    {
        State::create($request->validated());
        return redirect()->route('states.index')->with('message', 'State Created Successfully');
    }

    public function edit(State $state)
    {   $countries = Country::all();
        return view('state.edit',compact('countries','state'));
    }


    public function update(StateStoreRequest $request, State $state)
    {
        $state->update([
            'country_id' => $request->country_id,
            'name' => $request->name
        ]);
        return redirect()->route('states.index')->with('message', 'Updated State Successfully');

    }


    public function destroy(State $state)
    {
        $state->delete();
        return redirect()->route('states.index')->with('message', 'State Deleted Successfully');
    }
}
