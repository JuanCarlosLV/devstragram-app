<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){


        $request->request->add(['username' => Str::slug($request->username)]);
        
     // the variable name, username, email, password are the name of the input field in the register.blade.php
      $request->validate([
        'name'=> 'required|max:30',
        'username'=> 'required|unique:users|min:3|max:20',
        'email'=> 'required|unique:users|email|max:60',
        'password'=> 'required|confirmed|min:5',
        
      ]);

      // the variable name, username, email, password are the name of the column in the database and the value after -> from request is the name of the input field in the register.blade.php

      User::create([
        'name'=> $request->name,
        'username'=> $request->username,
        'email'=> $request->email,
        'password'=> Hash::make($request->password),
      ]);

      //this is a way to authenticate the user after registration by getting each input
     /* Auth::attempt([
        'email'=> $request->email,
        'password'=> $request->password,
      ]);
      */

      // this is another way to authenticate the use but using only method, is supposed to use auth() helper, but it wasnt working so i used Auth facade

      Auth::attempt($request->only('email', 'password'));

      return redirect()->route('posts.index', Auth::user()->username);
       
    }
   
}
