<x-layout>
    <x-slot name="mainContent">
        <h1>Hello World</h1>
        <article>
            <h2>{{ $post->title }}</h2>
            <div>
                {!! $post->body !!}
            </div>
        </article>
    </x-slot>


    <x-slot name="mainTitle">
        {{$page_title}}
    </x-slot>
</x-layout>
