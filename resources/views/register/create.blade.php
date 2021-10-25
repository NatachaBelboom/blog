<x-layout>
    <x-slot name="mainContent">
        <section class="px-6 py-8">
            <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
                <h1 class="text-center font-bold text-xl">Register ! </h1>
                <form action="/register" method="POST" class="mt-10">
                    @csrf
                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">Nom</label>
                        <input class="border border-gray-400 p-2 w-full" id="name" type="text" value="{{old('name')}}" name="name">

                        <x-error-message field="name" />

                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">Username</label>
                        <input class="border border-gray-400 p-2 w-full" id="username" type="text" value="{{old('username')}}" name="username">

                        <x-error-message field="username" />

                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">Email</label>
                        <input class="border border-gray-400 p-2 w-full" id="email" type="email" value="{{old('email')}}" name="email">

                        <x-error-message field="email" />

                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">Password</label>
                        <input class="border border-gray-400 p-2 w-full" id="password" type="password" value="{{old('password')}}" name="password">

                        <x-error-message field="password" />

                    </div>

                    <div class="mb-6">
                        <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                            Submit
                        </button>
                    </div>
                </form>
            </main>
        </section>
    </x-slot>
</x-layout>
