@props(['post'])
<div class='bg-white'>
    <a href="{{ route('posts.show', ['post'=>$post]) }}">
        <img src="{{ asset('storage/'.$post->imagePath) }}" alt="{{ $post->title }}"
            class='w-full h-56'>
    </a>
    <div class='py-2 px-3'>
        @foreach($post->categories as $category)
            •<a class='cursor-pointer text-sm text-gray-700' href='{{ route('category.show',['category'=>$category]) }}'> {{ $category->title }} </a>
        @endforeach

        <h2 class='font-semibold text-2xl cursor-pointer'>
            <a
                href="{{ route('posts.show', ['post'=>$post]) }}">{{ $post->title }}</a>
        </h2>
        <a href=" {{ route('posts.show', ['post'=>$post]) }}">
            <div class='py-4 cursor-pointer'>
                {{ implode(' ', array_slice(explode(' ',$post->body[0]), 0, 35)) }}
                <p class='text-emerald-700  text-lg hover:underline'> Read more >> </p>
            </div>
        </a>

        <div class='flex items-center justify-between'>

            <a class='font-semibold cursor-pointer	'
                href="{{ route('profile.show', ['id'=>$post->user->id]) }}">
                <div class='flex items-center'>
                    <img src="{{ asset('storage/'.$post->user->imagePath) }}"
                        alt="{{ $post->user->name }}" class='w-6  rounded-full mr-3 h-6'>
                    {{ $post->user->name }}
                </div>
            </a>
            <span class=' text-sm text-gray-700'>{{ $post->created_at->diffForHumans() }}</span>

        </div>
    </div>
</div>
