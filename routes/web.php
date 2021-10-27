<?php

use App\Http\Controllers\SessionController;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\PostCommentController;
use \App\Http\Controllers\NewsletterController;
use App\Models\Post;
use \App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use \MailchimpMarketing\ApiClient;


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


//liste de tous les posts
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show']);


Route::get('/users/{user:slug}', function (\App\Models\User $user) {
    $page_title = "Tous les posts de {$user->name}";

    $user->load('posts.category');  //category est une relation imbriquée de post
    $users = \App\Models\User::whereHas('posts')->get();
    $categories = \App\Models\Category::whereHas('posts')->get();

    $posts = $user->posts->load('category', 'user');

    return view('posts.index', compact('user', 'posts', 'categories', 'users', 'page_title'));
});


Route::get('/register', [RegisterController::class, 'create'])->middleware('guest'); //affiche le formulaire
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');


Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');
Route::get('/login', [SessionController::class, 'create'])->middleware('guest'); //affiche le formulaire

Route::post('/sessions', [SessionController::class, 'store'])->middleware('guest');

Route::post('/posts/{post}/comments', [PostCommentController::class, 'store'])->middleware('auth');


Route::post('/newsletter', NewsletterController::class);
