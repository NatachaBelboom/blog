<x-layout>

    <x-slot name="mainContent">

        @include('_posts-header')

            <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
                @if($posts->count())
                    <x-posts-grid :posts="$posts" />
                    {{$posts->links()}}
                @else
                    <p>There is no post yet</p>
                @endif
            </main>

    </x-slot>

    <x-slot name="mainTitle">
        {{$page_title}}
    </x-slot>

</x-layout>




