<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user(){
        $records = User::getRecordUsers();

        return view("backend.user.list" , compact("records"));
    }

    public function addUser(){
        return view("backend.user.add");
    }

    public function storeUser(Request $request){
        request()->validate([
            "name"=> "required",
            "email"=> "required|unique:users|email",
            "password"=>"required",
        ]);


        $saver = new User;
        $saver->name = trim($request->name);
        $saver->email = trim($request->email);
        $saver->password = Hash::make($request->password);
        $saver->status = trim($request->status);
        $saver->save();

        return redirect()->route('panel-user-list')->with("success","user successfully created");
    }

    public function editUser($id){
        $user = User::find($id);
        return view("backend.user.edit", compact("user"));
    }
    public function updateUser($id , Request $request){

        $user = User::find($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->status = trim($request->status);
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('panel-user-list')->with("success","user successfully updated");
    }

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();

        return redirect()->route('panel-user-list')->with("success","user successfully deleted");
    }
}
