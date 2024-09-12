<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public static function getRecords(){
        return self::select("blogs.*")->orderBy("id","desc")->paginate(5);
    }

    public static function getRecordsFront(){
        return self::select('blogs.*' , 'users.name as user_name' , 'categories.name as categories_name')->join('users' , 'users.id' , '=' , 'blogs.user_id')->join('categories' , 'categories.id' , '=' , 'blogs.category_id')->where('blogs.is_publish',1)->where('blogs.status',1)->orderby('blogs.id','desc')->paginate(10);
    }

    public function getImage(){
        if(!empty($this->image) && file_exists(storage_path('blog\\'. $this->image))){
            return storage_path('blog\\'. $this->image);
    }
}}
