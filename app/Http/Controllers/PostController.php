<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    // We add User parameter to get the id or another field of the User model to use the route model binding (Explain in the routes/web.php)
    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->get();
        
        return view('dashboard', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required',
        ]);


        //this is a one way to create a post and save it in the database

        /*

         Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'user_id' => Auth::user()->id,
        ]);

         */


        // this is another way to create a post and save it in the database. Both ways are correct but i prefer the first one

        /*
         $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $request->image;
        $post->user_id = Auth::user()->id;
        $post->save();
        */

        /* This is the third way to create and save a post. This way is available when we define relationships like User->Posts 
        In this case we use the user() method beacuse ist from the current user, so if we have defined the relation, we can call that relation, in this case is Post, so we call the posts() method from User model, then we call the create() method to create a new post and save it in the database.
        */

        $request->user()->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'user_id' => Auth::user()->id,
        ]);



        return redirect()->route('posts.index', Auth::user()->username);
    }
}
