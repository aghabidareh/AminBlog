<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(){
        return view('backend.blog.list');
    }
    public function addBlog(){
        return view('backend.blog.add');
    }
    public function storeBlog(Request $request){}
    public function editBlog($id){
        $blog = Blog::find($id);
        return view('backend.blog.edit', compact('blog'));
    }
    public function updateBlog($id , Request $request){}
    public function deleteBlog($id){
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->route('panel-blog-list');
    }
}
