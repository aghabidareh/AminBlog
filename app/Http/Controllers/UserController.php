<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user(){
        $records = User::getRecordUsers();

        return view("backend.user.list" , compact("records"));
    }
}
