<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use function Symfony\Component\String\b;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {

        $attributes = $this->validatePost(new Post());

        $attributes['thumbnail_path'] = request()->file('thumbnail')?->store('thumbnails');
        unset($attributes['thumbnail']);
        $attributes['user_id'] = auth()->id();
        $attributes['published_at'] = now();

        $post = Post::create($attributes);

        return redirect('/posts/'.$post->slug)->with('success', 'Your post has been created and is now published');

    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        if (isset($attributes['thumbnail'])){
            $attributes['thumbnail_path'] = request()->file('thumbnail')?->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'post deleted');
    }


    protected function validatePost(?Post $post = null): array
    {

        $post ??= new Post();

        return request()->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'body' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required|image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id), 'max:255'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

    }
}

