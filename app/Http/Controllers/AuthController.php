<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }
    public function register(){
        return view("auth.register");
    }
    public function forgetPassword(){
        return view("auth.forget");
    }
    public function createUser(Request $request){
        request()->validate([
            "name"=> "required",
            "email"=> "required|unique:users|email",
            "password"=>"required",
        ]);

        $saver = new User();
        $saver->name = trim($request->name);
        $saver->email = trim($request->email);
        $saver->password = Hash::make($request->password);
        $saver->save();

        return redirect("login")->with("success","your account successfully registered");
    }
}
