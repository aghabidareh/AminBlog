<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public static function getRecords(){
        return self::select("blogs.*")->orderBy("id","desc")->paginate(3);
    }

    public static function getRecordsFront(){
        return self::select('blogs.*' , 'users.name as user_name' , 'categories.name as categories_name')->join('users' , 'users.id' , '=' , 'blogs.user_id')->join('categories' , 'categories.id' , '=' , 'blogs.category_id')->where('blogs.is_publish',1)->where('blogs.status',1)->orderby('blogs.id','desc')->paginate(3);
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

    public function getComment(){
        return $this->hasMany(BlogComment::class , 'blog_id')->orderBy('blog_comments.id' , 'desc');
    }

    public function getCommentsCount(){
        return $this->hasMany(BlogComment::class ,'blog_id')->count();
    }

}
