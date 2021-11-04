@props(['trigger', 'entries'])

<div x-data="{show:false}" @click.away="show=false">
{{-- Trigger (déclancheur) --}}
    <div @click="show = !show">
        {{$trigger}}
    </div>
{{-- Entries / Items --}}
    <div x-show="show" class="py-2 absolute bg-gray-100 rounded-xl w-full mt-2 overflow-auto max-h-52" style="display: none">
        {{$slot}}
    </div>
</div>
