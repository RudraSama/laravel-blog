<x-layout title="Categories">
    <main class="w-[80%] mx-auto">

        <x-back_button />

        <div class="my-10">
            <a href="/admin/category/create" class="p-3 text-white bg-green-500 hover:bg-green-600 duration-200 rounded-lg">Create New Category</a>
        </div>
        <div class="mt-20">
            <div class="w-full flex justify-between text-xl text-white [&>*]:basis-1/5 [&>*]:text-center [&>*]:bg-sky-400 [&>*]:p-4">
                <span>Id</span>
                <span>Category</span>
                <span>Description</span>
                <span>Edit</span>
                <span>Delete</span>
            </div>
            @foreach($categories as $category)
                <div class="w-full flex justify-between text-lg [&>*]:basis-1/5 [&>*]:text-center [&>*]:p-2 [&>*]:border-b-[1px] [&>*]:border-b-gray-300">
                    <span>{{$category->id}}</span>
                    <span>{{$category->category}}</span>
                    <span>{{$category->description}}</span>
                    <a href="/admin/category/edit/{{$category->id}}" class="text-green-500"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="/admin/category/delete/{{$category->id}}" class="text-red-600"><i class="fa-solid fa-trash"></i></a>
                </div>
            @endforeach
        </div>
    </main>
</x-layout>
