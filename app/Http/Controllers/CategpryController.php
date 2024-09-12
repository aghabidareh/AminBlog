<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategpryController extends Controller
{
    public function category(){
        $records = Category::getRecords();
        return view("backend.category.list",compact("records"));
    }
    public function addCategory(){
        return view("backend.category.add");
    }
    public function storeCategory(Request $request){
        $category = new Category();
        $category->name = $request->name;
        $category->title = $request->title;
        $category->meta_title = $request->meta_title;
        $category->meta_keywords = $request->meta_keywords;
        $category->meta_description = $request->meta_description;
        $category->status = $request->status;
        $category->save();

        return redirect()->route("panel-category-list")->with("success","category successfully created");
    }
    public function editCategory($id){
        $category = Category::find($id);
        return view("backend.cateegory.edit",compact("category"));
    }
    public function updateCategory($id , Request $request){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->title = $request->title;
        $category->meta_title = $request->meta_title;
        $category->meta_keywords = $request->meta_keywords;
        $category->meta_description = $request->meta_description;
        $category->status = $request->status;
        $category->save();

        return redirect()->route("panel-category-list")->with("success","category successfully updated");
    }
    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();

        return redirect()->route("panel-category-list")->with("success","category successfully deleted");
    }
}
