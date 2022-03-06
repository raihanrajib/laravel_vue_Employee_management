<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentStoreReqest;

class DepartmentController extends Controller
{

    public function index(Request $request)
    {
        $departments = Department::all();
        if ($request->has('search')) {
            $departments = Department::where('name', 'like', "%{$request->search}%")->get();
        }
        return view('department.index', compact('departments'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentStoreReqest $request)
    {
        Department::create([
            'name' =>$request->name
        ]);
        return redirect()->route('departments.index')->with('message', 'Department stored Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Department $department)
    {
        return view('department.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentStoreReqest $request,Department $department)
    {
        $department->update([
            'name'=>$request->name
        ]);

        return redirect()->route('departments.index')->with('message', 'Department updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('message', 'Department deletd Succesfully');
    }
}
