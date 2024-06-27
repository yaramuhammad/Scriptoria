<x-app-layout>

    <div class='container mx-auto py-10 flex justify-center flex-col items-center relative'>
        <img src="{{ asset('storage/'.$user->imagePath) }}" alt="{{ $user->name }}"
            class='w-1/6 rounded-full'>
        <p class='pt-5 pb-2 text-2xl font-bold'>{{ $user->name }}</p>
        <p class='pb-5'>{{ $user->email }}</p>

        <div class='grid grid-cols-3 gap-3'>
            <div class=' px-3 text-center text-lg'>
                {{ count($user->posts) }}
                <br>
                Posts
            </div>
            <div class=' px-3 text-center text-lg'>
                <a href="{{route('followers')}}" class='hover:underline'>
                    {{ count($user->followers) }}
                    <br>
                    Followers
                </a>
            </div>
            <div class=' px-3 text-center text-lg'>
                <a href="{{route('followings')}}" class='hover:underline'>
                    {{ count($user->followings) }}
                    <br>
                    Following
                </a>
            </div>
        </div>

        @if(Auth::id()==$user->id)
            <div class='pt-5 pb-2 flex'>
                <a href='{{ route('profile.edit') }}'
                    class='bg-emerald-700 px-3 py-2 mx-16 text-white rounded-xl'> <i class="fas fa-pen mr-2"> </i>
                    Edit</a>
            </div>
        @else
            <div class='pt-5 pb-2 flex'>
                @if(!$user->isFollowedBy(Auth::user()))
                    <form
                        action="{{ route('follow', ['user'=>$user]) }}"
                        method='POST'>
                        @csrf
                        <button class=' bg-emerald-700 text-white px-3 py-2 rounded-xl mx-1'>
                            <i class="fas fa-user-plus mr-1"></i>
                            Follow
                        </button>
                    </form>
                @else
                    <form
                        action="{{ route('unfollow', ['user'=>$user]) }}"
                        method='POST'>
                        @csrf
                        @method('Delete')
                        <button class=' bg-emerald-700 text-white px-3 py-2 rounded-xl mx-1'>
                            <i class="fas fa-user-minus mr-1"></i>
                            Unfollow
                        </button>
                    </form>
                @endif
                <button class=' bg-emerald-700 text-white px-3 py-2 rounded-xl mx-1'>
                    <i class="fas fa-comment mr-1"></i>
                    Message
                </button>
            </div>


        @endif


        <div class="grid grid-cols-3 gap-4 w-9/12 py-10">
            @foreach($user->posts as $post)
                <x-post :post='$post' />
            @endforeach
        </div>
    </div>

</x-app-layout>
