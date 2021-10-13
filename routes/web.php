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
    $posts = Post::latest('published_at')->with('category', 'user')->get();

    return view('posts', [
        'posts' => $posts,
        'page_title' => 'La liste des posts',
        'categories' => \App\Models\Category::whereHas('posts')->orderBy('name')->get(),
    ]);
})->name('home');


Route::get('/posts/{post:slug}', function (Post $post) { //ce qui donne Post::where('slug', $post)->firstOrFail()
//find a post by its slug and pass it to a view called "post"

    $page_title = "Le post: {$post->title}";

    return view('post', compact('post', 'page_title'));
});


Route::get('/categories/{category:slug}', function(\App\Models\Category $category ){
    $page_title = "Tous les posts de la catégorie {$category->name}";
    $categories = \App\Models\Category::whereHas('posts')->get();
    $posts = $category->posts();
    $currentCategory = $category;

    return view('posts', compact('category','posts', 'currentCategory', 'categories', 'page_title')); //on veut que ca retourne posts

})->name('single-category');


Route::get('/categories', function (){
   /*\Illuminate\Support\Facades\DB::listen(function ($query){
        logger($query->sql, $query->bindings);
    });*/

    $categories = \App\Models\Category::all();

    return view('categories', [
        'categories' => $categories,
        'page_title' => 'La liste des categories'
    ]);
});

Route::get('/users/{user:slug}', function(\App\Models\User $user ){
    $page_title = "Tous les posts de {$user->name}";

    $user->load('posts.category');  //category est une relation imbriquée de post
    $users = \App\Models\User::whereHas('posts')->get();
    $categories = \App\Models\Category::whereHas('posts')->get();

    $posts = $user->posts->load('category', 'user');

    return view('posts', compact('user', 'posts', 'categories', 'users', 'page_title'));
});

Route::get('/users', function (){

    $users = \App\Models\User::all();

    return view('users', [
        'users' => $users,
        'page_title' => 'La liste des users'
    ]);
});

