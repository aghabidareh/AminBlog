<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }

    public function getReplay(){
        return $this->hasMany(BlogReplayComment::class ,'comment_id');
    }
}
