<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\dashboard\Post;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class InteractionController extends Controller
{
    public function storeComment(Request $request){

        $request->validate([
            'comment'=>'required|string|max:200'
        ]);

        $urlString = url()->previous();
        $urlString = explode('/', $urlString);
        $slugFromUrl = end($urlString);

        $post =Post::where('slug', '=', $slugFromUrl)->first();

        $comment = new Comment();
        $loggedInuser = Auth::user()->id;

        $comment->comment = $request->comment;
        $comment->user_id = $loggedInuser;
        $comment->post_id = $post->id;
        $comment->approval_state = 'unapproved';
        $comment->save();
        Session::flash('success', 'comment posted successfully.');

        return redirect()->back();
    }
}
