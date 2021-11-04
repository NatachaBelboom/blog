<x-layout>
    <x-slot name="mainContent">
        <section class="px-6 py-8">
            <main class="max-w-lg mx-auto mt-10 bg-gray-100">
                <x-panel>
                    <h1 class="text-center font-bold text-xl">Login </h1>
                    <form action="/sessions" method="POST" class="mt-10">
                        @csrf

                        <x-form.input name="email" type="email" autocomplete="username"/>
                        <x-form.input name="password" autocomplete="current-password"/>
                        <x-form.button>Login</x-form.button>

                    </form>
                </x-panel>

            </main>
        </section>
    </x-slot>
</x-layout>
