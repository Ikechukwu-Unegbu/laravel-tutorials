<?php

namespace App\Models\dashboard;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Loggable;

    public function category(){
        return $this->belongsToMany(Category::class);
    }
}
