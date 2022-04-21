<?php

namespace App\Models;

use App\Models\dashboard\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }

   public function post(){
       return $this->belongsTo(Post::class);
   }
}
