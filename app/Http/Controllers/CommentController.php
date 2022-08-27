<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request ,User $user, Post $post)
    {
        $this->validate($request, [
            'comment'=>'required|max:255',
        ]);

        Comment::create([
            'comment'=>$request->comment,
            'post_id'=>$post->id,
            'user_id'=>auth()->user()->id,
        ]);

        return back()->with('message', 'Comentario guardado !!');
    }
}
