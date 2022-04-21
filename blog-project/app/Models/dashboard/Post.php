<?php

namespace App\Models\dashboard;

use App\Models\Comment;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Loggable;

    public function category(){
        return $this->belongsToMany(Category::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }
}
