<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\dashboard\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('dashboard.posts.index');
    }

    public function create(){
        $categories = Category::all();
        return view('dashboard.posts.create')->with('categories', $categories);
    }

    public function store(Request $request){
        $request->validate([
            'title'=> ['required', 'string'],
            'slug'=> ['required', 'unique:posts', 'max:255'],
            'post_img'=> ['required', 'mimes:jpg,bmp,png'],
            'body'=>['required', 'string'],
            'category'=>['required']
        ]);

        

    }
}
