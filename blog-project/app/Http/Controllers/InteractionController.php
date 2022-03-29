<?php

namespace App\Http\Controllers;

use App\Models\Comment;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InteractionController extends Controller
{
    public function storeComment(Request $request){
        $request->validate([
            'comment'=>'required|string|max:200'
        ]);

        $comment = new Comment();
        $loggedInuser = Auth::user()->id;

        $comment->comment = $request->comment;
        $comment->user_id = $loggedInuser;
        $comment->approval_state = 'unapproved';
        $comment->save();
        Session::flash('success', 'comment posted successfully.');

        return redirect()->back();
    }
}
