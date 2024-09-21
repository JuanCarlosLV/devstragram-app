<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Laravel\Facades\Image;

class PerfilController extends Controller
{
    public function index()
    {
        return view("profile.index");
    }

    public function store(Request $request)
    {

        $request->request->add(['username' => Str::slug($request->username)]);

        $request->validate([
            'username' => [
                'required',
                'unique:users,username,' . Auth::user()->id,
                'min:3',
                'max:20',
                'not_in:twitter,edit-profile'
            ],
            'email' => [
                'required', 
                'unique:users,email,' . Auth::user()->id,
                'email', 
                'max:60']
        ]);


        // logic for save profiles images
        if ($request->image) {
            $image = $request->file('image');

            $nameImage = Str::uuid() . "." . $image->extension();

            $imageServer = Image::read($image);

            $imageServer->resize(1000, 1000);

            $imagePath = public_path('profiles') . '/' . $nameImage;
            $imageServer->save($imagePath);
        }
        $user = User::find(Auth::user()->id);
        $user->username = $request->username;
        $user->image = $nameImage ?? Auth::user()->image ?? null;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('posts.index', $user->username);
    }

    // add functionality to change password

    public function destroy() {}
}
