<x-layout title="Login">
    <main class="w-full h-screen flex justify-center items-center">
        <form method="POST" action="/login" class="flex flex-col gap-1 [&>input]:outline-none [&>input]:px-2 [&>input]:py-1 [&>input]:border-2 [&>input]:border-gray-200 text-lg shadow-2xl px-10 py-20 bg-gradient-to-r from-[#f3e7e9] to-[#e3eeff] rounded-xl">
            @csrf
            <input type="email" name="email" placeholder="Email" required="true" />
            <input type="password" name="password" placeholder="Password" required="true" />
            <button type="submit" class="mr-auto mt-2 px-3 font-medium rounded-lg py-2 text-white dark:bg-blue-600 dark:hover:bg-blue-700 text-base">LOGIN</button>
            <ul class="text-sm text-red-600 list-disc">
                @if($errors->any())
                    {!! implode('', $errors->all('<li>:message</li>')) !!}
                @endif
            </ul>
        </form>
    </main>
</x-layout>
