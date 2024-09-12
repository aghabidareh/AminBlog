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
}
