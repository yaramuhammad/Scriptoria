<x-app-layout>
    <div class='mx-auto container py-10'>
        @if($followed=='category')
            <div class='bg-white w-9/12 mx-auto p-5 rounded-3xl'>
                @foreach($categories as $category)
                    <div class='py-5 flex justify-between items-center border p-5 rounded-2xl my-3'>
                        <div class='flex items-center'>
                            <img src="{{ 'storage/'.$category->imagePath }}"
                                alt="{{ $category->title }}" class='w-64 rounded-xl'>
                            <div>
                                <a
                                    href="{{ route('category.show',['category'=>$category]) }}">
                                    <p class='text-2xl ml-5'>{{ $category->title }}</p>
                                </a>
                                <p class='ml-5'>{{ $category->description }}</p>
                            </div>
                        </div>
                        @if(!Auth::user()->isPreferenced($category->id))
                            <form
                                action="{{ route('followCategory',['category'=>$category]) }}"
                                method='POST'>
                                @csrf
                                <button class=' bg-emerald-700 text-white px-3 py-2 rounded-xl'>
                                    Follow
                                </button>
                            </form>
                        @else
                            <form
                                action=" {{ route('unfollowCategory', ['category'=>$category]) }}"
                                method='POST'>
                                @csrf
                                @method('Delete')
                                <button class=' bg-emerald-700 text-white px-3 py-2 rounded-xl'>
                                    Unfollow
                                </button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class='bg-white w-9/12 mx-auto p-5 rounded-3xl'>
                @if(count($users))
                    @foreach($users as $user)
                        @if(Auth::id()!=$user->id)
                            <div class='py-5 flex justify-between items-center border p-5 rounded-2xl my-3'>
                                <div class='flex items-center'>
                                    <img src="{{ 'storage/'.$user->imagePath }}"
                                        alt="{{ $user->name }}" class='w-16 rounded-full'>
                                    <a
                                        href="{{ route('profile.show',['id'=>$user->id]) }}">
                                        <p class='text-2xl ml-5'>{{ $user->name }}</p>
                                    </a>
                                </div>
                                @if(!$user->isFollowedBy(Auth::user()->id))
                                    <form
                                        action="{{ route('follow',['user'=>$user]) }}"
                                        method='POST'>
                                        @csrf
                                        <button class=' bg-emerald-700 text-white px-3 py-2 rounded-xl'>
                                            Follow
                                        </button>
                                    </form>
                                @else
                                    <form
                                        action="{{ route('unfollow',['user'=>$user]) }}"
                                        method='POST'>
                                        @csrf
                                        @method('Delete')
                                        <button class=' bg-emerald-700 text-white px-3 py-2 rounded-xl'>
                                            Unfollow
                                        </button>
                                    </form>
                                @endif
                            </div>
                        @endif
                    @endforeach
                @else
                <p>You don't have any {{Route::current()->uri()}} yet</p>
                @endif
            </div>
        @endif
    </div>
</x-app-layout>
