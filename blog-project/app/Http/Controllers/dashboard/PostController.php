<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\dashboard\Category;
use Illuminate\Http\Request;
use App\Models\dashboard\Post;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
        
        // var_dump($category);die;
        
        $request->validate([
            'title'=> ['required', 'string'],
            'slug'=> ['required', 'unique:posts', 'max:255'],
            'post_img'=> ['required', 'mimes:jpg,bmp,png'],
            'body'=>['required', 'string'],
            'category'=>['required']
        ]);

        $post = new Post();

        $post->title = $request->title;
        $post->slug = $request->slug;
        // $post->post_img = $request->post_img;
        $post->body = $request->body;
        $post->save();
        $category = Category::find($request->category);
        $category->post()->attach($post->id);

      

        if($request->hasFile('post_img')){
            $fileNameToStore = $request->slug."".$request->file('post_img')->getClientOriginalName();
            $extension = $request->post_img->extension();
            $request->post_img->storeAs('/public/BlogPhotos', $fileNameToStore);
            // $url = Storage::url($unix.".".$extension);  
            $urlMain= $request->post_img->move(public_path('BlogPhotos'), $fileNameToStore);
            $postimg = Post::where('slug','=',$request->slug)->first();
            $postimg->img_url = $fileNameToStore;
            $postimg->save();
        }
        

        Session::flash('success', 'You have successfully posted a new blog');
        return redirect()->route('post.create');
    }

    public function show($slug){
        $post = Post::where('slug', '=', $slug)->first();

        return view('pages.posts.show')->with('post', $post);
    }
}
