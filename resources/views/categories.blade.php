
<x-layout>
    <x-slot name="mainContent">
        <h1>Available categories</h1>
        @foreach ($categories as $category)
            <ul>
                <li>
                    <a href="/categories/{{ $category->slug }}">{{ $category->name }}</a>
                    - {{$category->posts->count()}}
                </li>
            </ul>
        @endforeach
    </x-slot>
</x-layout>


    <x-slot name="mainTitle">
        {{$page_title}}
    </x-slot>


