<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{

    public function store(Post $post)
    {
        $attributes = request()->validate([
            'body' => 'required',
        ]);

        $attributes['user_id'] = auth()->id();

        $post->comments()->create($attributes);

        return back()->with('success', 'Comment has been published');


    }
}
