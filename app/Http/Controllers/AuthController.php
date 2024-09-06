<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\RegisterMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
        $saver->remember_token = Str::random(40);
        $saver->save();

        Mail::to($request->email)->send(new RegisterMail($saver));

        return redirect("login")->with("success","verify your email address now");
    }

    public function verify($token){
        $user = User::where("remember_token" , '=' , $token)->first();
        if(!empty($user)){
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->save();
            return redirect("login")->with("success","your account successfully verified");
        }else{
            abort(404);
        }
    }
}
