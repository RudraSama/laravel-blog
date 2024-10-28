<x-layout title="Edit Category">

    <div class="w-[80%] mx-auto">
        <x-back_button />
    </div>

    <main class="w-[680px] mx-auto">
        <h1 class="text-3xl my-10">Edit Blog</h1>

        <ul class="text-sm text-red-600 list-disc">
            @if($errors->any())
                {!! implode('', $errors->all('<li>:message</li>')) !!}
            @endif
        </ul>

        <form method="POST" action="/admin/category/edit/{{$category->id}}/update" autocomplete="off">
            @csrf
            @method('PUT')
            <div class="flex flex-col my-2">
                <label for="category">Category Name</label>
                <input type="text" id="category" name="category" value="{{$category->category}}" class="p-1 border-[1px] border-gray-400 outline-none rounded-lg"/>
            </div>

            <div class="flex flex-col my-2">
                <label for="description">Category Description</label>
                <input type="text" id="description" name="description" value="{{$category->description}}" class="p-1 border-[1px] border-gray-400 outline-none rounded-lg"/>
            </div>

            <button type="submit" class="text-white bg-sky-400 hover:bg-sky-600 duration-200 px-4 py-2 text-lg rounded-2xl">Update</button>

        </form>
    </main>
</x-layout>
