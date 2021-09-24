@extends('layout')

@section('main_content')
        <h1>Hello World</h1>
        <article>
            <h2>{{ $post->title }}</h2>
            <div>
                {!! $post->body !!}
            </div>
        </article>
@endsection

@section('main_title')
    <title>{{$page_title}}</title>
@endsection
