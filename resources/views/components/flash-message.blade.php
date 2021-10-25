

@if(session()->has('success'))
    <div x-data="{ show:true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="bg-blue-500 bottom-3 right-3 fixed rounded rounded-2xl text-white p-4 text-xs">
        <p>
            {{session('success')}}
        </p>
    </div>
@endif
