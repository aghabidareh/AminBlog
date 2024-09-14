<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Blog extends Model
{
    use HasFactory;
    public static function getRecords(){
        return self::select("blogs.*")->orderBy("id","desc")->paginate(3);
    }

    public static function getRecordsFront(){
        $return = self::select('blogs.*' , 'users.name as user_name' , 'categories.name as categories_name')
        ->join('users' , 'users.id' , '=' , 'blogs.user_id')
        ->join('categories' , 'categories.id' , '=' , 'blogs.category_id');

        if(!empty(Request::get('search'))){
            $return = $return->where('blogs.title', 'like' , '%' . Request::get('search') . '%')->orWhere('blogs.description' , 'like' , '%'. Request::get('search') . '%');
        }

        $return = $return->where('blogs.is_publish',1)
        ->where('blogs.status',1)
        ->orderby('blogs.id','desc')
        ->paginate(3);

        return $return;    
    }

    public function getImage(){
        if(!empty($this->image)){
            return url('upload/'.$this->image);
        }else{
            return;
        }
    }

    public static function getRecordsSlug(string $slug){
        return self::select('blogs.*' , 'users.name as user_name' , 'categories.name as categories_name')->join('users' , 'users.id' , '=' , 'blogs.user_id')->join('categories' , 'categories.id' , '=' , 'blogs.category_id')->where('blogs.is_publish',1)->where('blogs.status',1)->where('blogs.slug',$slug)->first();
    }

    public static function getRecentPosts(){
        return self::select('blogs.*' , 'users.name as user_name' , 'categories.name as categories_name')->join('users' , 'users.id' , '=' , 'blogs.user_id')->join('categories' , 'categories.id' , '=' , 'blogs.category_id')->where('blogs.is_publish',1)->where('blogs.status',1)->orderby('blogs.id','desc')->limit(3)->get();
    }

    public static function getRelatedPosts($category_id , $id){
        return self::select('blogs.*' , 'users.name as user_name' , 'categories.name as categories_name')->join('users' , 'users.id' , '=' , 'blogs.user_id')->join('categories' , 'categories.id' , '=' , 'blogs.category_id')->where('blogs.id' , '!=' , $id)->where('blogs.category_id' , '=' , $category_id)->where('blogs.is_publish',1)->where('blogs.status',1)->orderby('blogs.id','desc')->limit(5)->get();
    }
}
