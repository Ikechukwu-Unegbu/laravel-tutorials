<?php

namespace App\Models\dashboard;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Loggable;
    public function post(){
        return $this->belongsToMany(Post::class);
    }
}
