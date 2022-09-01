<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('main'); //usamos el metodo __invoke

//rutas para el perfil

Route::get('/edit-profile', [ProfileController::class, 'index'])
        ->name('profile.index');
Route::post('/edit-profile', [ProfileController::class, 'store'])
        ->name('profile.store');

// Route::get('/create-account',[RegisterController::class, 'index'])->name('register');
Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'store'])->name('register');

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']); //->name('login');

//para seguridad y tener acceso a @csrf
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/post', [PostController::class, 'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])
       ->name('posts.destroy');

Route::post('/{user:username}/posts/{post}', [CommentController::class, 'store'])
       ->name('comments.store');


Route::post('/image', [ImagenController::class, 'store'])->name('images.store');

Route::post('/posts/{post}/likes', [LikeController::class, 'store'])
       ->name('posts.likes.store');

Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])
       ->name('posts.likes.destroy');

//following
Route::post('/{user:username}/follow', [FollowerController::class, 'store'])
      ->name('users.follow');
Route::delete('/{user:username}/follow', [FollowerController::class, 'destroy'])
      ->name('users.unfollow');


