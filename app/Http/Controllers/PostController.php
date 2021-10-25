<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $filters = request()->only('search', 'category', 'user');

        return view('posts.index', [
            'posts' => Post::filter($filters)
                ->latest('published_at')
                ->with('category', 'user')
                ->paginate()
                ->withQueryString(),
            'page_title' => 'La liste des posts',
        ]);
    }



    public function show(Post $post)
    {
        //find a post by its slug and pass it to a view called "post"

        $page_title = "Le post: {$post->title}";


        return view('posts.show', compact('post', 'page_title'));
    }
}
