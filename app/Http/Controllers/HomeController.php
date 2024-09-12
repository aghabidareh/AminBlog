<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view("home.home");
    }
    public function about(){
        return view('home.about');
    }
    public function contact(){
        return view('home.contact');
    }
    public function team(){
        return view('home.team');
    }
    public function gallery(){
        return view('home.gallery');
    }
    public function blog(){
        return view('home.blog');
    }
}
