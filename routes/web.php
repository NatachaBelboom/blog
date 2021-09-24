<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

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



Route::get('/posts', function () {
    return view('posts');
});


Route::get('/', function () {
    $posts = Post::all();

    return view('posts', [
        'posts' => $posts,
        'page_title' => 'La liste des posts'
    ]);
});


Route::get('/posts/{post}', function ($slug) {
//find a post by its slug and pass it to a view called "post"
    $post = Post::findOrFail($slug);

    return view('post',[
        'post' => $post,
        'page_title' => "Le post: {$post->title}"

    ]);
});

//return view('post', compact('post', 'page_title'));
