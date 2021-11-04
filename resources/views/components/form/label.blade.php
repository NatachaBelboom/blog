@props(['name'])

<label
    for="{{$name}}"
    class="block mb-2 font-bold text-xs text-gray-700 uppercase"
>
    {{ucwords($name)}}
</label>
