<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\dashboard\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }

    public function blogs(){
        $blogs = Post::paginate(20);
        foreach($blogs as $post){
            $truncated = Str::words($post->body, 15);
            $post->body = $truncated;
        }
        return view('dashboard.posts.index')
                                    ->with('posts', $blogs);
    }

    public function showblog($slug){
        $blog = Post::where('slug', '=',$slug)->first();
        return view('dashboard.posts.show')->with('blog', $blog);
    }
}
