<x-layout title="Dashboard">

    <main class="w-[80%] mx-auto">
        <div class=" my-10">
            <a href="/admin/blog/create" class="p-3 text-white bg-green-500 hover:bg-green-600 duration-200 rounded-lg">Create New Blog</a>
            <a href="/admin/categories" class="p-3 text-white bg-green-500 hover:bg-green-600 duration-200 rounded-lg">Categories</a>
            <a href="/admin/tags" class="p-3 text-white bg-green-500 hover:bg-green-600 duration-200 rounded-lg">Tags</a>
        </div>
        <div class="grid grid-cols-3 gap-10 mt-10">
            @foreach($blogs as $blog)
                <x-blog_card :blog="$blog" />
            @endforeach
        </div>
    </main>
</x-layout>
