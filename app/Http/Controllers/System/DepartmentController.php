<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Department,Employee};
use App\Http\Requests\DepartmentUpdate;
use Alert;

class DepartmentController extends Controller
{
    //
    public function index(){

        $departments = Department::withcount('employees')->withSum('employees', 'salary')->get();
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
        $dept  = Department::find($request->id);

        if(Employee::where('department_id',$request->id)->count()>0){
            Alert::alert('لا يمكن الحذف', ' لا يمكن حذف هذا القسم لان يوجد به موظفين');
            return redirect()->back();
        }

        $dept->delete();
        return redirect()->back();
    }

}
