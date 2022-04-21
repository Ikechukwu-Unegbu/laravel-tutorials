<?php

namespace App\Http\Controllers;

use App\Models\dashboard\Category;
use Illuminate\Http\Request;
use App\Models\dashboard\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class PublicPagesController extends Controller
{
    public function posts(){
        $posts = Post::paginate(12);
        $categories = Category::all();
        foreach($posts as $post){
            $truncated = Str::words($post->body, 15);
            $post->body = $truncated;
        }
        return view('pages.posts.index')
                                    ->with('posts', $posts)
                                    ->with('categories', $categories);
    }
}
