@props(['blog'])

<div class="p-5 shadow-2xl">
    <div class="">
        <img src="{{$blog->banner_url}}" alt="{{$blog->title}}" class="rounded-lg w-full object-cover aspect-video"/>
    </div>

    <div class="flex flex-col py-1">
        <a href="/blog/{{$blog->id}}">
            <h1 class="text-2xl">{{$blog->title}}</h1>
        </a>
        <span class="text-gray-600 my-2">{{$blog->author}}</span>
        <span class="text-white bg-sky-500 px-2 py-1 rounded-xl w-fit">{{$blog->category->category}}</span>
        <p class="text-lg my-4 line-clamp-4">
            {{$blog->excerpt}}
       </p>

        <div class="mt-auto flex">
            <div class="flex flex-wrap gap-2 basis-1/2">
                @foreach($blog->tags as $tag)
                    <x-tag tag="{{$tag->tag->tag}}" color="{{$tag->tag->tag_color}}"/>
                @endforeach
            </div>

            <span class="ml-auto text-gray-600">{{$blog->updated_at->format('j F Y')}}</span>
        </div>

        @if(Auth::check())
            <div class="flex justify-end gap-5 mt-5 float-end">
                <span class="mr-auto px-2 py-1 text-white rounded-lg {{$blog->published?"bg-green-500":"bg-orange-600"}}">{{$blog->published?"Published":"Draft"}}</span>
                <a href="/admin/blog/edit/{{$blog->id}}" class="text-white bg-blue-400 px-2 py-1 rounded-xl">Edit</a>
                <a href="/admin/blog/delete/{{$blog->id}}" class="text-white bg-red-600 px-2 py-1 rounded-xl">Delete</a>
            </div>
        @endif
    </div>

</div>
