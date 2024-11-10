<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
USE Auth;

class AuthController extends Controller
{
    //

    public function index(){

        App::setLocale('en');
        return view('system.Auth.login');
    }

    public function login(Request $request){
        
        $request->validate([
            'email'=>'required',
            'password'=>'required'
         ]);
         $credentials = $request->only('email','password');
         if (Auth::guard('web')->attempt($credentials)) {
             return redirect()->route('system.home');
         }
         return redirect()->route('system.login.index')->with('error','Login details are not valid');
    }


    public function logout(Request $request){
        Auth::guard('web')->logout();
        return redirect()->route('system.login.index');
    }

    public function profile(Request $request){
       $employee = Auth::guard('web')->user();
       return view('admin.employee.profile',compact('employee'));
    }
    public function update(Request $request){

        $employee = Auth::guard('web')->user();
        $role=$employee->getRoleNames();


        $employee->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        $employee->syncRoles([$role]);
        Alert::success(__('dashboard.success'), __('dashboard.update_success'));
        return redirect()->back();
    }

    public function updatePassword(Request $request){

            $request->validate([
                'password'              => 'required|min:6|max:50|confirmed',
                'password_confirmation' => 'required|max:50|min:6',
            ]);


          $employee = Auth::guard('web')->user();
            if (Hash::check($request->old_password, $employee->password)) {
                $employee->update([
                    'password' => $request->password,
                ]);

                Alert::success(__('dashboard.success'), __('dashboard.update_password'));
                return redirect()->back();

           }


         return back()->withErrors(['old_password' => 'The old password is incorrect.']);
    }
}
