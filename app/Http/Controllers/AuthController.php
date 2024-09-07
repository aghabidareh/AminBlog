<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Models\User;
use App\Mail\RegisterMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function authLogin(Request $request){
        $remember = !empty($request) ? true : false;

        if(Auth::attempt(['email' => $request->email , 'password' => $request->password] , $remember)){
            if(!empty(Auth::user()->email_verified_at)){
                return redirect()->route('dashboard');
            }else{
                $userId = Auth::user()->id;
                Auth::logout();

                $saver = User::getSingle($userId);
                $saver->remember_token = Str::random(40);
                $saver->save();

                Mail::to($request->email)->send(new RegisterMail($saver));
                return redirect()->back()->with("success","you can verify your email address now");
            }
        }else{
            return redirect()->back()->with('error','please enter the correct email and password');
        }
    }

    public function sendForgetPassword(Request $request){
        $user = User::where('email', $request->email)->first();
        if(!empty($user)){
            $user->remember_token = Str::random(40);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with("success","check your email and reset your password");
        }else{
            return redirect()->back()->with('error','enter a valid email');
        }
    }

    public function reset($token){
        $user = User::where('remember_token', $token)->first();
        if(!empty($user)){
            $data['user'] = $user;
            return view('auth.reset' , compact('data'));
        }else{
            abort(404);
    }
}
public function postReset($token , Request $request){
    $user = User::where('remember_token', $token)->first();
    if(!empty($user)){
        if($request->password == $request->cpassword){
            $user->password = Hash::make($request->password);
            if(empty($user->email_verified_at)){
                $user->email_verified_at = date('Y-m-d H:i:s');
            }
            $user->remember_token = Str::random(40);
            $user->save();

            return redirect()->route('login')->with('success','password successfully reset');
        }else{
            return redirect()->back()->with('error','confirmation password and new password doesn not match together.');
        }
    }else{
        abort(404);
}
}
public function logout(){
    Auth::logout();
    return redirect()->route('login');
}
}