<div class="mx-auto w-[80%] flex justify-between items-center m-2 p-2 border-b-[1px] border-b-gray-400">

    <form method="GET" action="{{Auth::check()?"/dashboard":"/"}}">
        <div class="border-[1px] border-gray-500 p-1 ">
            <input type="search" name="search" placeholder="search" value="{{request()->get('search')}}" class="outline-none p-2" /> <i class="fa-solid fa-magnifying-glass fa-xl"></i>
        </div>
    </form>
    <div class="flex gap-3 text-xl">
        <a href="/">Home</a>

        @if(Auth::check())
            <a href="/dashboard">Dashboard</a>
            <a href="/logout">Logout</a>
        @else
            <a href="/login">Login</a>
        @endif
    </div>
</div>
