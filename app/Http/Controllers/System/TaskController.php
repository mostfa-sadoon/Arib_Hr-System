<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Task,Employee,TaskStatus};
use App\Http\Requests\TaskUpdate;
use Auth;

class TaskController extends Controller
{
    //
    public function index(){

        $tasks = Task::get();
        $taskStatus = TaskStatus::where('department_id',Auth::user('web')->department_id)->get();
        $employees = Employee::get();
        return view('system.task.index',compact('tasks','employees','taskStatus'));
    }


    public function store(Request $request){

        $input = $request->except('_tokent');
        $input['created_by'] = Auth::user('web')->id;
        Task::create($input);
        return redirect()->back();
    }

    public function edit($id){
       $task =  Task::find($id);
       return view('system.task.parts.edit',compact('task'));
    }

    public function update(TaskUpdate $request,$id){

        $department=Task::find($request->id);
        foreach (config('translatable.locales') as $locale) {
            $department->translateOrNew($locale)->name = $request->input($locale.'.name');

        }
        $department->save();

        return redirect()->back();

    }

    public function delete(Request $request){
        $dept  = Task::find($request->id);
        $dept->delete();
        return redirect()->back();
    }
}
