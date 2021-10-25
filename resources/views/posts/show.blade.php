<x-layout>
    <x-slot name="mainContent">
        <section class="px-6 py-8">
            <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
                <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                    <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                        <img src="/images/illustration-1.png" alt="" class="rounded-xl">

                        <p class="mt-4 block text-gray-400 text-xs">
                            Published
                            <time datetime="{{ $post->published_at }}">{{ $post->published_at->diffForHumans() }}</time>
                        </p>

                        <div class="flex items-center lg:justify-center text-sm mt-4">
                            <img src="/images/lary-avatar.svg" alt="Lary avatar">
                            <div class="ml-3 text-left">
                                <h5 class="font-bold"><a
                                        href="/users/{{$post->user->username}}">{{$post->user->name}}</a></h5>
                                <h6>Mascot at Laracasts</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-8">
                        <div class="hidden lg:flex justify-between mb-6">
                            <a href="/"
                               class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                                <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                    <g fill="none" fill-rule="evenodd">
                                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5"
                                              d="M21 1v20.16H.84V1z">
                                        </path>
                                        <path class="fill-current"
                                              d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                        </path>
                                    </g>
                                </svg>

                                Back to Posts
                            </a>
                            <div class="space-x-2">
                                {{--<a href="/categories/{{ $post->category->slug }}"
                                   class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                   style="font-size: 10px">{{ $post->category->name }}</a>--}}
                                <x-category-button :category="$post->category"/>

                            </div>
                        </div>

                        <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                            {{ $post->title }}
                        </h1>

                        <div class="space-y-4 lg:text-lg leading-loose">
                            <p>{!! $post->body !!}</p>
                        </div>
                    </div>

                    <section class="space-y-6 col-start-5 col-span-8 mt-10">

                            @auth()
                                <x-panel>
                                    <h3 class="text-xl font-bold uppercase">Comments</h3>
                                    <form action="/posts/{{$post->id}}/comments" method="post">
                                        @csrf
                                        <header class="flex">
                                            <img src="https://i.pravatar.cc/60?u={{auth()->id()}}"
                                                 width="40"
                                                 height="40"
                                                 alt=""
                                                 class="rounded-full">

                                        </header>
                                        <label for="body" class="block mb-6">Participate!</label>
                                        <textarea
                                            class="w-full text-sm focus:outline-none focus:ring "
                                            id="body"
                                            name="body"
                                            rows="5"
                                            placeholder="Write something"></textarea>

                                        <div>
                                            <button type="submit" class="bg-blue-500 text-white rounded-xl p-2">Envoyer</button>
                                        </div>
                                    </form>
                                </x-panel>

                        @else
                                <p class="semi-bold">
                                    <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">login</a> to leave a comment.
                                </p>
                            @endauth



                        @foreach($post->comments as $comment)
                            <x-postcomment :comment="$comment" />
                        @endforeach
                    </section>

                </article>

            </main>
        </section>
    </x-slot>
</x-layout>