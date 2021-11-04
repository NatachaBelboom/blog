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
            <x-form.textarea name="body"/>
            <x-form.error name="body" />
            <div>
                <x-form.button>
                    Publish
                </x-form.button>
            </div>
        </form>
    </x-panel>

@else
    <p class="semi-bold">
        <a href="/register" class="hover:underline">Register</a> or
        <a href="/login" class="hover:underline">login</a> to leave a comment.
    </p>
@endauth
