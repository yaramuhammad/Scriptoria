<x-app-layout>
    <div class=' container mx-auto py-10'>
        <div class='w-9/12 mx-auto'>
            <form action="{{ route('SearchResult') }}" method="GET" class=' relative'>
                <input type="search" placeholder='Search . . . ' class='rounded-3xl w-full' name='search'
                    value='{{ request()->query('search') }}'>
                <button class='bg-emerald-700 text-white py-2 px-3 rounded-full absolute right-0 m-px'><i
                        class="fas fa-search"></i></button>
            </form>

            @if(request('search'))
                <div>
                    <div class="mt-16 flex overflow-hidden border rounded-t-3xl border-zinc-400 bg-white">
                        <button
                            class="tablinks text-lg font-bold py-5 transition-all w-1/3 hover:bg-zinc-200 border-none outline-none cursor-pointer"
                            onclick="openTab(event, 'Posts')" id="defaultOpen">Posts</button>
                        <button
                            class="tablinks text-lg font-bold py-5 transition-all w-1/3 hover:bg-zinc-200 border-none outline-none cursor-pointer"
                            onclick="openTab(event, 'Categories')">Categories</button>
                        <button
                            class="tablinks text-lg font-bold py-5 transition-all w-1/3 hover:bg-zinc-200 border-none outline-none cursor-pointer"
                            onclick="openTab(event, 'Users')">Users</button>
                    </div>

                    <div id="Posts"
                        class="tabcontent bg-white hidden p-5 border rounded-b-3xl border-zinc-400 border-t-0">
                        @isset($posts)
                            @foreach($posts as $post)
                                <div class='py-10 border px-5 rounded-3xl my-4'>
                                    <a
                                        href="{{ route('posts.show',['post'=>$post]) }}">
                                        <div class='flex w-3/4'>
                                            <img src="{{ asset('storage/'.$post->imagePath) }}"
                                                alt="{{ $post->title }}" class='w-48 h-36 rounded-2xl'>
                                            <div class='ml-5'>
                                                <h2 class=' text-lg font-semibold'>{{ $post->title }}</h2>
                                                {{ implode(' ', array_slice(explode(' ',$post->body[0]), 0, 35)) }}
                                                <p class='text-emerald-700  text-lg hover:underline'> Read more >> </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endisset()
                    </div>

                    <div id="Categories"
                        class="tabcontent bg-white hidden p-5 border rounded-b-3xl border-zinc-400 border-t-0">
                        @isset($categories)

                            @foreach($categories as $category)
                                <div class='py-10 border px-5 rounded-3xl my-4'>
                                    <a
                                        href="{{ route('category.show', ['category'=>$category]) }}">
                                        <div class='flex w-3/4'>
                                            <img src="{{ asset('storage/'.$category->imagePath) }}"
                                                alt="{{ $category->title }}" class='w-48 h-36 rounded-2xl'>
                                            <div class='ml-5'>
                                                <h2 class=' text-lg font-semibold'>{{ $category->title }}</h2>
                                                {{ implode(' ', array_slice(explode(' ',$category->description), 0, 45)) }}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endisset()

                    </div>

                    <div id="Users"
                        class="tabcontent bg-white hidden p-5 border rounded-b-3xl border-zinc-400 border-t-0">
                        @isset($users)
                            @foreach($users as $user)
                                <div class='py-5 flex justify-between items-center border p-5 rounded-2xl my-3'>
                                    <div class='flex items-center'>
                                        <img src="{{ 'storage/'.$user->imagePath }}"
                                            alt="{{ $user->name }}" class='w-16 rounded-full'>
                                        <a
                                            href="{{ route('profile.show',['id'=>$user->id]) }}">
                                            <p class='text-2xl ml-5'>{{ $user->name }}</p>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endisset
                    </div>
                </div>
            @endif
        </div>

    </div>
    <script>
        document.getElementById("defaultOpen").click();

        function openTab(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" bg-emerald-700 text-white hover:bg-emerald-700",
                    "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " bg-emerald-700 text-white hover:bg-emerald-700";
        }

    </script>
</x-app-layout>
