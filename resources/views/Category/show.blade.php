<x-app-layout>

    <div class='container mx-auto'>
        <div class='w-9/12 mx-auto relative'>
            <img src="{{ asset('storage/'.$category->imagePath) }}"
                alt="{{ $category->title }}" class="w-full rounded-3xl"/>
            <div class='absolute top-0 left-0 bg-[#0000004d] w-full h-full p-4 flex flex-col justify-end rounded-3xl'>
                <h1 class='text-6xl text-white capitalize py-2'>{{ $category->title }}</h1>
                <p class='text-lg text-white w-10/12'>{{ $category->description }} </p>
            </div>
        </div>
        <div class='flex py-4 w-9/12 mx-auto justify-between'>
            <form action="{{route('category.show',['category'=>$category])}}" class='flex w-9/12 relative' method='GET'>
                <input type="search" placeholder='Search in {{$category->title}}' class='rounded-3xl w-full' name='search' value='{{request()->query('search')}}'>
                <button class='bg-emerald-700 text-white py-2 px-3 rounded-full absolute right-0 m-px'><i
                class="fas fa-search"></i></button>
            </form>
            @if(Auth::user()->isPreferenced($category->id))
                <form
                    action="{{ route('unfollowCategory', ['category'=>$category]) }}"
                    method='POST'>
                    @csrf
                    @method('DELETE')
                    <button class='bg-emerald-700 text-white py-2 px-3 rounded-full'>Unfollow Category</button>
                </form>
            @else
                <form
                    action="{{ route('followCategory', ['category'=>$category]) }}"
                    method='POST'>
                    @csrf
                    <button class='bg-emerald-700 text-white py-2 px-3 rounded-full'>Follow Category</button>
                </form>
            @endif

        </div>
        <div class="grid grid-cols-3 gap-4 w-9/12 mx-auto">
            @foreach($posts as $post)
                <x-post :post='$post' />
            @endforeach
        </div>

    </div>





</x-app-layout>
