<br>
<style>
    .dropdown:hover .dropdown-content {
        display: block;
    }

</style>
<nav class='px-5 my-10 flex justify-between items-center container mx-auto'>
    <a href="{{ route('welcome') }}">
        <div class='flex content-start'>
            <img src="{{ asset('images/logo.png') }}" alt="logo" class='w-1/12'>
            <h1 class='text-7xl	text-emerald-700 ml-4' style='font-family:"Lugrasimo", cursive;'>
                {{ config('app.name') }}</h1>
        </div>
    </a>
    @auth

        <div class='flex'>
            <a href="{{ route('SearchResult') }}" class='text-emerald-700 block mx-10'><i
                    class="fas fa-search"></i></a>
            <div class="dropdown relative ">
                <button class="dropbtn capitalize">{{ Auth::user()->name }} ▽</button>
                <div class="dropdown-content hidden absolute bg-slate-200 min-w-24">
                    <a href="{{ route('profile.show',['id'=>Auth::id()]) }}"
                        class='block p-3 hover:bg-slate-300'>Profile</a>
                    <a href="{{ route('posts.saved') }}"
                        class='block p-3 hover:bg-slate-300'>Saved</a>

                    <form action="{{ route('logout') }}" method="POST"
                        class='block p-3 hover:bg-slate-300'>
                        @csrf
                        <button> Logout</button>
                    </form>
                </div>
            </div>
        </div>
    @endauth
</nav>
