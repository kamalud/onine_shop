<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function LoginShow(){
        return Inertia('Admin/Auth/LoginView');
    }

    public function Login(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->passthru,'isAdmin' => true])){
          return redirect()->rooute('admin.dashboard')->with('success','Admin login has been successfuly');
        }
        return redirect()->route('admin.login')->with('error','Invalid credintails');
    }

    public function logout(Request $request){
     Auth::guard('web')->logout();
     $request->session()->invalidate();
     return redirect()->route('admin.login')->with('success','Admin logout success');
    }
}
