<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Requests\{EmployeeUpdate,EmployeeStore};
use Auth;
use App\Traits\fileTrait;
use Alert;
class EmployeeController extends Controller
{
    use fileTrait;
    //
    public function index(){
        $employees = Employee::with('manager')->where('id','!=',Auth::user()->id)->get();
        return view('system.employees.index', compact('employees'));
    }


    public function store(EmployeeStore $request){
        $input = $request->except('_tokent');
        $input['image']          = ($request->image!=null) ? $this->MoveImage($request->image,'uploads/employees') : null;
        $input['department_id']  = Auth::user('web')->department_id;
        Employee::create($input);
        return redirect()->back();
    }

    public function edit($id){
       $employee =  Employee::find($id);
       $employees = Employee::with('manager')->get();
       return view('system.employees.edit', compact('employee','employees'));
    }

    public function update(EmployeeUpdate $request, Employee $employee){
        $input = $request->except(['_tokent','_method']);
        $input['image']          = ($request->image!=null) ? $this->MoveImage($request->image,'uploads/employees') : null;
        $input['department_id']  = Auth::user('web')->department_id;
        $employee->update($input);
        return redirect()->back();

    }

    public function delete(Request $request){
        $employee  = Employee::find($request->id);
        $employee->delete();
        Alert::success('تم الحذف', 'تم حذف الموظف بنجاح');
        return redirect()->back();
    }
}
