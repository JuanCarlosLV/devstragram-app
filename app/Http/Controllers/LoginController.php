<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }


    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);

        $isAuthenticated = Auth::attempt($request->only('email', 'password'), $request->remember);
        if (!$isAuthenticated) {
            return back()->with('mensaje', 'Credenciales incorrectas');
        }

        return redirect()->route('posts.index', Auth::user()->username);
    }
}
