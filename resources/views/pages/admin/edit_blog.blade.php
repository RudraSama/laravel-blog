<x-layout title="Edit Blog">

    <div class="w-[80%] mx-auto">
        <x-back_button />
    </div>

    <main class="w-[680px] mx-auto mb-10">
        <h1 class="text-3xl my-10">Edit Blog</h1>

        <ul class="text-sm text-red-600 list-disc">
            @if($errors->any())
                {!! implode('', $errors->all('<li>:message</li>')) !!}
            @endif
        </ul>

        <form method="POST" action="/admin/blog/edit/{{$blog->id}}/update" autocomplete="off" id="blogEditForm">

            @csrf
            @method("PUT")
            <div class="flex flex-col my-2">
                <label for="title">Blog Title</label>
                <input type="text" id="title" name="title" value="{{$blog->title}}" class="p-1 border-[1px] border-gray-400 outline-none rounded-lg"/>
            </div>

            <div class="flex flex-col my-2">
                <label for="excerpt">Excerpt</label>
                <input type="text" id="excerpt" name="excerpt" value="{{$blog->excerpt}}" class="p-1 border-[1px] border-gray-400 outline-none rounded-lg"/>
            </div>

            <div class="flex flex-col my-2">
                <label for="banner_url">Banner Image URL</label>
                <input type="text" id="banner_url" name="banner_url" value="{{$blog->banner_url}}" class="p-1 border-[1px] border-gray-400 outline-none rounded-lg"/>
            </div>

            <div class="my-2">
                <label for="Category">Category</label>
                <select class="w-full" id="category_id" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{$category->id == $blog->category->id?"selected":""}}>{{$category->category}}</option>
                    @endforeach
                </select>
            </div>

            <div class="my-5">
                <label>Body</label>
                <div id="editor" class="!h-80 !text-base">
                    {!! $blog->body !!}
                </div>
                <input type="hidden" name="body" id="body">
            </div>

            <div class="my-5">
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" {{!$blog->published?"checked":""}} name="published" id="published" class="sr-only peer">
                  <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                  <span class="ms-3 text-sm font-medium text-gray-900">Save as Draft?</span>
                </label>
            </div>


            <div class="my-5">
                <label for="">Select tags</label>
                <div class="flex flex-wrap gap-2" id="tagList">
                    @foreach($tags as $tag)
                        <label for="tag-{{$tag->id}}" class="py-1 border-2 border-transparent rounded-lg has-[:checked]:border-2 has-[:checked]:border-sky-600">
                            <x-tag tag="{{$tag->tag}}" color="{{$tag->tag_color}}" />
                            <input type="checkbox" id="tag-{{$tag->id}}" onchange="addTag(this)" class="hidden" {{in_array($tag->id, $blog_tags)?"checked":""}}/>
                        </label>


                        @if(in_array($tag->id, $blog_tags))
                            <input type="hidden" name="tags[]" value="{{$tag->id}}" id="hidden-{{$tag->id}}" />
                        @endif
                    @endforeach
                </div>
            </div>

            <button type="submit" class="text-white bg-sky-400 px-4 py-2 text-lg rounded-2xl">Update</button>

        </form>


        <script>
            const quill = new Quill('#editor', {
                theme: 'snow'
            });

            document.getElementById("blogEditForm").onsubmit = (event)=>{
                const bodyInput = document.getElementById("body");
                bodyInput.value = quill.root.innerHTML;
            }

        </script>
    </main>
</x-layout>
