<x-layout title="Home">
    <main class="w-[80%] mx-auto">
        @if(count($blogs) > 0)
            <x-blog_main_card :blog="$blogs[0]"/>
            <div class="grid grid-cols-3 gap-10 mt-10">
                @foreach($blogs as $key=> $blog)
                    @if($key != 0)
                        <x-blog_card :blog="$blog" />
                    @endif
                @endforeach
            </div>

        @else
            <div class="w-full h-screen flex justify-center items-center">
                <span class="text-2xl">No Blog Post Found</span>
            </div>
        @endif

        <div class="w-full flex justify-center text-2xl mt-10 p-20">
            <div>
                <button

                    onclick="window.location.href='?page={{request()->get('page')-1}}'"
                    @if(request()->get('page') == null || request()->get('page') == 0)
                        disabled="true"
                        class = "text-gray-500"
                    @endif
                ><i class="fa-solid fa-angle-left"></i></button>

                    @if(request()->get('page') == null)
                       1
                    @else
                        {{request()->get('page')}}
                    @endif
                    /
                    {{$blogs->lastPage()}}

                <button

                    onclick="window.location.href='?page={{request()->get('page') == null?2:request()->get('page')+1}}'"
                    @if(request()->get('page') == $blogs->lastPage())
                        disabled="true"
                        class="text-gray-500"
                    @endif

                ><i class="fa-solid fa-angle-right"></i></button>
            </div>
        </div>
    </main>
</x-layout>
