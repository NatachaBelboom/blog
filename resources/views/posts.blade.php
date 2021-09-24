@extends('layout')

@section('main_content')
        <h1>Hello World</h1>
        @foreach ($posts as $post)
            <article>
                <h2><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
                <p>Publié le: {{ $post->date }}</p>
                <p>{{ $post->excerpt }}</p>
            </article>
        @endforeach
@endsection

