<x-layout>
    <x-slot name="mainContent">
        <h1>Tout les users</h1>
        @foreach ($users as $user)
            <ul>
                <li>
                    <a href="/users/{{ $user->slug }}">{{$user->name}}</a> - {{$user->posts->count()}}
                </li>
            </ul>
        @endforeach
    </x-slot>
</x-layout>


<x-slot name="mainTitle">
    {{$page_title}}
</x-slot>


