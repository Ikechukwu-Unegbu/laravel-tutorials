<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dashboard\Post;
use Illuminate\Support\Str;
class PublicPagesController extends Controller
{
    public function posts(){
        $posts = Post::paginate(12);
        foreach($posts as $post){
            $truncated = Str::words($post->body, 50);
            $post->body = $truncated;
        }
        return view('pages.posts.index')->with('posts', $posts);
    }
}
