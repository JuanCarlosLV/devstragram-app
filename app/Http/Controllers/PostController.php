<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    // We add User parameter to get the id or another field of the User model to use the route model binding (Explain in the routes/web.php)
    public function index(User $user){
        
       return view('Dashboard', [
        'user' => $user
       ]);
    }

    public function create(){
        return view('posts.create');
    }
}
