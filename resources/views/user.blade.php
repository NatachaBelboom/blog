<x-layout>

    <x-slot name="mainContent">
        <h1>Tous les posts de {{$user->name}}</h1>
        @forelse($user->posts as $post)
            <article>
                <h3>
                    <a href="/posts/{{$post->slug}}">{{$post->title}}</a>
                </h3>
                <p>Ecrit par {{$user->name}}, publié <time datetime="{{ $post->published_at }}">{{ $post->published_at->diffForHumans() }}</time></p>
                <p>{{$post->excerpt}}</p>
                <p>{{$post->category->name}}</p>
            </article>
        @empty
            <p>Il n'y a pas de posts pour {{ strtolower($user->name) }}</p>
        @endforelse
    </x-slot>

    <x-slot name="mainTitle">
        {{$page_title}}
    </x-slot>

</x-layout>
