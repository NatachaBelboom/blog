<x-layout>

    <x-slot name="mainContent">
        <h1>Post from {{$category->name}}</h1>
        @forelse($category->posts as $post)
            <article>
                <h3>
                    <a href="/posts/{{$post->slug}}">{{$post->title}}</a>
                </h3>
                <p>Ecrit par <a href="/users/{{$post->user->slug}}">{{$post->user->name}}</a>, publié <time datetime="{{ $post->published_at }}">{{ $post->published_at->diffForHumans() }}</time></p>
                <p>{{$post->excerpt}}</p>
            </article>
        @empty
            <p>Il n'y a pas de posts dans la catégorie: {{ strtolower($category->name) }}</p>
        @endforelse
    </x-slot>

    <x-slot name="mainTitle">
        {{$page_title}}
    </x-slot>

</x-layout>
