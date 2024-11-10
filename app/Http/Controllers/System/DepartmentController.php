<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Requests\DepartmentUpdate;

class DepartmentController extends Controller
{
    //
    public function index(){

        $departments = Department::get();
        return view('system.department.index',compact('departments'));
    }


    public function store(Request $request){

        Department::create($request->except('_tokent'));
        return redirect()->back();
    }

    public function edit($id){
       $department =  Department::find($id);
       return view('system.department.parts.edit',compact('department'));
    }

    public function update(DepartmentUpdate $request){

        $department=Department::find($request->id);
        foreach (config('translatable.locales') as $locale) {
            $department->translateOrNew($locale)->name = $request->input($locale.'.name');

        }
        $department->save();

        return redirect()->back();

    }

    public function delete(Request $request){
        dd($request->all());
        $dept  = Department::find($request->id);
        $dept->delete();
        return redirect()->back();
    }

}
