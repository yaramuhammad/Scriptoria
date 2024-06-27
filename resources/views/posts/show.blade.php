<x-app-layout>
    <div class='container mx-auto px-16 py-4 flex'>
        <div class='w-8/12 pr-16 mr-16'>
            <div class='bg-white pb-10 pt-5 px-5 rounded-3xl'>
                <div class='flex justify-between items-center'>
                    <a href="{{ route('posts.index') }}"
                        class='text-xs text-gray-600 hover:underline'><i class="fas fa-arrow-left"></i> Back to
                        posts</a>
                    <form action="{{route('SavePost',['post'=>$post])}}" method='POST'>
                    @csrf
                        <button class='text-xs bg-emerald-700 text-white py-2 px-3 rounded-2xl'><i class="fas fa-bookmark"></i>
                            Save for later</button>
                    </form>
                </div>
                <h1 class='text-4xl'>
                    {{ $post->title }}</h1>
                <div class='flex items-center justify-between pt-5  pr-3'>


                    <div class='flex items-center'>
                        <a class='font-semibold cursor-pointer'
                            href="{{ route('profile.show', ['id'=>$post->user->id]) }}">
                            <img src="{{ asset('storage/'.$post->user->imagePath) }}"
                                alt="{{ $post->user->name }}" class='w-20 rounded-full mr-3 h-20 '>
                        </a>
                        <div>
                            <a class='font-semibold cursor-pointer'
                                href="{{ route('profile.show', ['id'=>$post->user->id]) }}">
                                <p class='text-2xl'>{{ $post->user->name }}</p>
                            </a>
                            <div class='flex'>
                                @if(Auth::user()->id==$post->user->id)
                                    <a href="{{ route('posts.edit',['post'=>$post]) }}"
                                        class='text-green-700 mr-4'><i class="fas fa-pen ml-2 text-sm"> </i> edit</a>
                                    |
                                    <form
                                        action="{{ route('posts.destroy', ['post'=>$post]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class='text-red-700 ml-4'><i class="fas fa-trash ml-2 text-sm"> </i>
                                            Delete</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div>
                        <span class=' text-gray-700'>{{ $post->created_at->diffForHumans() }}</span>
                        <span class=' text-gray-700'>•{{ $post->updated_at->diffForHumans() }}</span>
                    </div>


                </div>
            </div>
            <div class='bg-white p-10 my-10 rounded-3xl'>

                @for($i=0 ; $i<count($post->body); $i+=3)
                    <p class='leading-relaxed mb-5'>
                        {{ $post->body[$i] }}
                        {{ $post->body[$i+1]??'' }}
                        {{ $post->body[$i+2] ??'' }}
                    </p>

                @endfor
            </div>
            <x-comments :post='$post' />


        </div>
        <div class='w-4/12'>
            <div>
                <img src="{{ asset('storage/'.$post->imagePath) }}" alt="{{ $post->title }}"
                    class=' rounded-3xl mb-8 w-full'>
                <div class='bg-white p-5 rounded-3xl '>
                    <h2 class='text-2xl pb-5'>Categories: </h2>
                    @foreach($post->categories as $category)
                        <a href="{{ route('category.show',['category'=>$category]) }}"
                            class='text-gray-600 text-lg block hover:text-gray-400 hover:underline'>
                            {{ $category->title }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>





</x-app-layout>
