<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Notifications\SlackNotif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class PostCommentController extends Controller
{

    public function store(Post $post)
    {
        $attributes = request()->validate([
            'body' => 'required',
        ]);

        $attributes['user_id'] = auth()->id();

        $comment = $post->comments()->create($attributes);

        \App\Events\CommentPosted::dispatch($comment);

        Notification::route('slack', env('SLACK_HOOK'))
            ->notify(new SlackNotif($comment));

        return back()->with('success', 'Comment has been published');


    }
}
