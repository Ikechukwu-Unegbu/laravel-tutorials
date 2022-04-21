<?php

namespace App\Http\Controllers;

use App\Models\dashboard\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function adminSearchPosts(Request $request){
        $request->validate([
            'search_term'=>'required|string'
        ]);

        $results = Post::where('title', 'like', '%'.$request->search_term.'%')->paginate(20);
        return view('dashboard.posts.search_result')
                                                ->with('results', $results);
    }
}
