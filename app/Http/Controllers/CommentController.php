<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, User $user, Post $post)
    {
       $request->validate([
           'comment' => 'required|max:255',
       ]);
        
       Comment::create([
        'user_id' => Auth::user()->id,
        'post_id' => $post->id,
        'comment' => $request->comment,
       ]);

       return back()->with('mensaje', 'Comentario enviado correctamente');

    }
}

