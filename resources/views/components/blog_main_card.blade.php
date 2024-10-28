@props(['blog'])
<div class="flex w-full gap-5 p-6 shadow-2xl">
    <div class="flex-[60%]">
        <img src="{{$blog->banner_url}}" alt="{{$blog->title}}" class="rounded-xl" />
    </div>

    <div class="flex-[40%] flex flex-col">
        <a href="/blog/{{$blog->id}}">
            <h1 class="text-3xl">{{$blog->title}}</h1>
        </a>
        <span class="text-gray-600 my-2">{{$blog->author}}</span>
        <span class="text-white bg-sky-500 px-2 py-1 rounded-xl w-fit my-2">{{$blog->category->category}}</span>
        <p class="text-xl py-4">
            {{$blog->excerpt}}
        </p>

        <div class="mt-auto flex">
            <div class="flex flex-wrap gap-2 basis-1/2" >
                @foreach($blog->tags as $tag)
                    <x-tag tag="{{$tag->tag->tag}}" color="{{$tag->tag->tag_color}}"/>
                @endforeach
            </div>

            <span class="ml-auto text-gray-600">{{$blog->updated_at->format('j F Y')}}</span>
        </div>
    </div>
</div>
