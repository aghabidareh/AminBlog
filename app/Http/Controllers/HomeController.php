<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
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
        $blogs = Blog::getRecordsFront();

        return view('home.blog' , compact('blogs'));
    }

    public function show($slug){
        $categories = Category::getCategories();
        $blog = Blog::getRecordsSlug($slug);
        $recents = Blog::getRecentPosts();
        $relatedPosts = Blog::getRelatedPosts($blog->category_id , $blog->id);
        if(!empty($blog)){
            return view('home.blogShow', compact(['blog','categories','recents','relatedPosts']));
        }else{
            abort(404);
        }
    }
}
