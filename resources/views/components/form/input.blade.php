@props(['name'])

<x-form.field>

    <x-form.label name="{{$name}}"/>

    <input
        id="{{$name}}"
        name="{{$name}}"
        class="border border-gray-200 p-2 w-full rounded"
        x-ref="newtitle"
        @input="$refs.slugfield.value = slugify($refs.newtitle.value, '-')"
        {{ $attributes(['value' => old($name)]) }}
    >

    <x-form.error name="{{$name}}"/>

</x-form.field>
