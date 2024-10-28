<x-layout title="{{$blog->title}}">
    <div class="w-[80%] mx-auto">
        <x-back_button />
    </div>
    <main class="w-[680px] mx-auto">

        <div class="mt-20">
            <h1 class="text-3xl font-bold">{{$blog->title}}</h1>
            <div class="mt-2">
                <span>Published By : {{$blog->author}}</span>
                &nbsp;
                &#8226;
                &nbsp;
                <span class="text-gray-500">{{$blog->updated_at->format('j F Y')}}</span>
            </div>

            <div class="my-4">
                <img src="{{$blog->banner_url}}" alt="{{$blog->title}}" class="w-full"/>
            </div>

            <div class="text-justify font-tinos text-lg">
                {!! $blog->body !!}
            </div>
        </div>
    </main>
</x-layout>
