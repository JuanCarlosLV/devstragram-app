<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request){
        $image = $request->file('file');

        $nameImage = Str::uuid() . "." . $image->extension();

        $imageServer = Image::read($image);

        $imageServer->resize(1000,1000);

        $imagePath = public_path('uploads') . '/' . $nameImage;
        $imageServer->save($imagePath);


        return response()->json(['imagen'=> $nameImage]);
    }
}
