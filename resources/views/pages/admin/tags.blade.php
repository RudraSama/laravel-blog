<x-layout title="Tags">
    <main class="w-[80%] mx-auto">

        <x-back_button />

        <div class="my-10">
            <a href="/admin/tag/create" class="p-3 text-white bg-green-500 hover:bg-green-600 duration-200 rounded-lg">Create New Tag</a>
        </div>
        <div class="mt-20">
            <div class="w-full flex justify-between text-xl text-white [&>*]:basis-1/5 [&>*]:text-center [&>*]:bg-sky-400 [&>*]:p-4">
                <span>Id</span>
                <span>Tag</span>
                <span>Description</span>
                <span>Color</span>
                <span>Edit</span>
                <span>Delete</span>
            </div>
            @foreach($tags as $tag)
                <div class="w-full flex justify-between text-lg [&>*]:basis-1/5 [&>*]:text-center [&>*]:p-2 [&>*]:border-b-[1px] [&>*]:border-b-gray-300">
                    <span>{{$tag->id}}</span>
                    <span>{{$tag->tag}}</span>
                    <span>{{$tag->description}}</span>
                    <span>
                        <div class="w-14 h-6 mx-auto" style="background-color: {{$tag->tag_color}}"></div>
                    </span>
                    <a href="/admin/tag/edit/{{$tag->id}}" class="text-green-500"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="/admin/tag/delete/{{$tag->id}}" class="text-red-600"><i class="fa-solid fa-trash"></i></a>
                </div>
            @endforeach
        </div>
    </main>
</x-layout>
