<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



/*
    The method name() is for identify the route, this is useful when we need to change the name of the route, with this we dont need to change the name in all the views, we just need to change the name in the route
 */
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class,'store'])->name('logout');


Route::get('/edit-profile', [PerfilController::class, 'index'])->name('profile.index')->middleware('auth');

Route::post('/edit-profile', [PerfilController::class, 'store'])->name('profile.store')->middleware('auth');


/*  this is the route model binding, with this we can put in the uri the username of the user or another field. 
    This will show the URL app's like this www.domainapp.com/juandev <- this is the username of the user so in this case we dont need to see and use the id of the user but the username
    In order to use this in the PostController we need to modified the index method adding a parameter, in this case the Model User
*/
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth'); 
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');


Route::post('/{user:username}/posts/{post}', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');


Route::post('/imagenes', [ImagenController::class, 'store'])->name('images.store');

Route::post('post/{post}/likes', [LikeController::class, 'store'])->name('post.likes.store');

Route::delete('post/{post}/likes', [LikeController::class, 'destroy'])->name('post.likes.destroy');


Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');

Route::delete('/{user:username}/follow', [FollowerController::class, 'destroy'])->name('users.unfollow');

