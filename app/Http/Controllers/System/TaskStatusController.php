<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaskStatus;
use App\Http\Requests\TaskStatusUpdate;


class TaskStatusController extends Controller
{
    public function index(){

        $TaskStatuses = TaskStatus::get();
        return view('system.taskstatus.index',compact('TaskStatuses'));
    }


    public function store(Request $request){

        TaskStatus::create($request->except('_tokent'));
        return redirect()->back();
    }

    public function edit($id){
       $TaskStatus =  TaskStatus::find($id);
       return view('system.taskstatus.parts.edit',compact('TaskStatus'));
    }

    public function update(Request $request,$id){

        $TaskStatus=TaskStatus::find($request->id);
        foreach (config('translatable.locales') as $locale) {
            $TaskStatus->translateOrNew($locale)->name = $request->input($locale.'.name');

        }
        $TaskStatus->save();

        return redirect()->back();

    }

    public function delete(Request $request){
        $status  = TaskStatus::find($request->id);
        $status->delete();
        return redirect()->back();
    }

    public function show(){

    }
}
