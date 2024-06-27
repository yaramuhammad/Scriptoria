<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $data= $request->validate( [
            "body"=> "required",
            "post_id"=> "required",
        ]);
        $data['user_id'] = Auth::user()->id;
        $comment = Comment::create($data);
        return redirect()->route("posts.show",['post'=>$comment->post])->with("success","");
    }

    public function destroy(Comment $comment)
    {
        if($comment->user->id == Auth::user()->id) { 
            $post = $comment->post;
            $comment->delete();
            return redirect()->route('posts.show',['post'=>$post])->with('success','');
        }
        else
        {
            return abort(403);
        }
    }
}
