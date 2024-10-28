<!DOCTYPE html>
@props(['title'])

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        @vite('resources/css/app.css')
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!--temp CDN -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet"/>


        <!--only load these libraries when logged in as ADMIN-->
        @if(Auth::check())
            <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
            <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
        @endif
    </head>
    <body class="font-poppins">
        <header>
            <x-nav />
        </header>

        {{ $slot}}

        @if(session('message'))
            <div id="flashMessageBox" class="absolute top-[50%] left-[50%] -translate-y-[50%] -translate-x-[50%] flex flex-col items-center text-3xl text-white bg-teal-600 py-4 px-10 rounded-xl">
                <span>{{session('message')}}</span>
                <br/>
                <button class="text-sm mt-5" onclick="closeFlashMessageBox()">close</i></button>
            </div>

            <script>
                const closeFlashMessageBox = ()=>{
                    document.getElementById("flashMessageBox").style.display = "none";
                }
            </script>
        @endif



        @vite('resources/js/app.js')
    </body>
</html>
