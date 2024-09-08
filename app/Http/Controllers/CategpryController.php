<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
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
        die;
    }
    public function editCategory($id){
        $category = Category::find($id);
        return view("backend.cateegory.edit",compact("category"));
    }
    public function updateCategory($id , Request $request){
        die;
    }
    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
    }
}
