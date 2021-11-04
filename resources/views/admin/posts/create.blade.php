<x-layout>
    <x-setting-page heading="Publish new post">
        <form
            action="/admin/posts"
            method="POST"
            x-data="{}"
            enctype="multipart/form-data"
        >
            @csrf

            <x-form.input name="title" />
            <x-form.input name="slug" />
            <x-form.input name="thumbnail" type="file"/>
            <x-form.textarea name="excerpt"/>
            <x-form.textarea name="body"/>

            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id">
                    @foreach(\App\Models\Category::all() as $category)
                        <option
                            @if(old('category_id')==$category->id)
                            selected
                            @endif
                            value="{{$category->id}}">
                            {{$category->name}}
                        </option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </x-form.field>

            <x-form.button>Post article</x-form.button>
        </form>
    </x-setting-page>
</x-layout>
