<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function blog(){
        $records = Blog::getRecords();

        return view('backend.blog.list' , compact('records'));
    }
    public function addBlog(){
        $records = Category::getCategories();

        return view('backend.blog.add' , compact('records'));
    }
    public function storeBlog(Request $request){
        $saver = new Blog();
        $saver->user_id = Auth::user()->id;
        $saver->slug = trim($request->tags);
        $saver->title = trim($request->title);
        $saver->meta_keywords = trim($request->meta_keywords);
        $saver->meta_description = trim($request->meta_description);
        $saver->description = trim($request->description);
        $saver->category_id = $request->category_id;
        $saver->is_publish = $request->is_publish;
        $saver->status = $request->status;
        $saver->save();

        if(!empty($request->file('image'))){
            $ext = $request->file('image')->getClientOriginalExtension();
            $file = $request->file('image');
            $fileName = date('ymdhis') . '.'. $ext;
            $file->move('upload/',$fileName);

            $saver->image = $fileName;
        }

        $saver->save();

        return redirect()->route('panel-blog-list')->with('success','blog successfully created');
    }
    public function editBlog($id){
        $records = Category::getCategories();
        $blog = Blog::find($id);
        return view('backend.blog.edit', compact(['blog','records']));
    }
    public function updateBlog($id , Request $request){
        $saver = Blog::find( $id );
        $saver->title = trim($request->title);
        $saver->meta_keywords = trim($request->meta_keywords);
        $saver->meta_description = trim($request->meta_description);
        $saver->description = trim($request->description);
        $saver->category_id = $request->category_id;
        $saver->is_publish = $request->is_publish;
        $saver->status = $request->status;
        $saver->save();

        if(!empty($request->file('image'))){
            $ext = $request->file('image')->getClientOriginalExtension();
            $file = $request->file('image');
            $fileName = date('ymdhis') . '.'. $ext;
            $file->move('upload/',$fileName);

            $saver->image = $fileName;
        }

        $saver->save();

        return redirect()->route('panel-blog-list')->with('success','blog successfully updated');
    }
    public function deleteBlog($id){
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->route('panel-blog-list')->with('success','blog successfully deleted');
    }
}
