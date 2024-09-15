<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\BlogComment;
use App\Models\BlogReplayComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    
    public function storeComment(Request $request){
        $saver = new BlogComment();
        $saver->user_id = Auth::user()->id;
        $saver->blog_id = $request->blog_id;
        $saver->comment = $request->comment;
        $saver->save();

        return redirect()->back()->with('success','your comment successfully added.');
    }

    public function storeReplayComment(Request $request){
        $saver = new BlogReplayComment();
        $saver->user_id = Auth::user()->id;
        $saver->comment_id = $request->comment_id;
        $saver->comment = $request->comment;
        $saver->save();

        return redirect()->back()->with('success','your replay successfully sent');
    }
}
