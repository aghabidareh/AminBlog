<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static function getRecords(){
        return self::select("categories.*")->orderBy("id","desc")->paginate(30);
    }
}
