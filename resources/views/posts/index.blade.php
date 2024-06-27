<x-app-layout>
    <div class='flex container mx-auto justify-end py-7'>
        @auth
            <a href="{{ route('posts.create') }}"
                class='bg-emerald-700 text-white px-3 py-2 rounded-2xl'>
                Create a new post
                <i class="fas fa-pen ml-2"> </i>
            </a>
        @endauth
    </div>
    <div class='flex container mx-auto'>
        <div class=' w-2/12'>
            <ul class='w-full mr-4 text-lg bg-white p-2'>
                <h2 class='text-3xl py-2'>Categories</h2>
                @foreach($categories as $category)
                    <a href="{{ route('category.show',['category'=>$category]) }}"
                        class='p-2 block hover:text-gray-600 hover:underline'>
                        <li>{{ $category->title }}</li>
                    </a>
                @endforeach
            </ul>

        </div>
        <div class='w-1/12'></div>
        <div class='w-9/12'>

            @if(count($posts))
                <div class="grid grid-cols-3 gap-4">
                    @foreach($posts as $post)
                        <x-post :post='$post' />
                    @endforeach
                </div>
            @else
                <div class='px-10 text-2xl'>
                    <p class='text-center'> There aren't any posts for you, <br> You can follow 
                    <a href="{{route('followAuthors')}}" class=' underline'>Authors</a>
                    or 
                    <a href="{{route('followCategories')}}" class=' underline'>Categories</a>
                    </p>
                </div>
            @endif
        </div>
    </div>





</x-app-layout>
