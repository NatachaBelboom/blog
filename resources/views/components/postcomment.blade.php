@props(['comment'])
<x-panel class="bg-gray-100">
<article class="flex space-x-4">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60?u={{$comment->user->id}}"
             width="60"
             height="60"
             alt=""
             class="rounded-xl"></div>
    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{$comment->user->username}}</h3>
            <p class="text-xs">Posted
                <time datetime="{{$comment->created_at}}">{{$comment->created_at->format('d M. Y')}} at {{$comment->created_at->format('H:i')}}</time>
            </p>
        </header>
        <p>{{$comment->body}}</p>
    </div>
</article>
</x-panel>
