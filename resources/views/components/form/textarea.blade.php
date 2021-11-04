@props(['name'])

<x-form.field>

    <x-form.label name="{{$name}}"/>

    <textarea
        id="{{$name}}"
        name="{{$name}}"
        {{$attributes}}
        class="border border-gray-200 rounded p-2 w-full"
    >
        {{ $slot ?? old( $name )}}
    </textarea>

    <x-form.error name="{{$name}}"/>

</x-form.field>
