@auth()
    <x-panel>
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
                placeholder="Write something"
                required>
                        {{old('body')}}
            </textarea>
            @error('body')
                <p class=" text-xs">{{$message}}</p>
            @enderror
            <div>
                <x-submit-button>
                    Publish
                </x-submit-button>
            </div>
        </form>
    </x-panel>

@else
    <p class="semi-bold">
        <a href="/register" class="hover:underline">Register</a> or
        <a href="/login" class="hover:underline">login</a> to leave a comment.
    </p>
@endauth
