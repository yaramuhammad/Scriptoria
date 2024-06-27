@props(['comment'])

    <div class='my-6 border p-3 rounded-3xl'>
        <div class='flex'>

            <a class='font-semibold cursor-pointer mb-3 block'
                href="{{ route('profile.show', ['id'=>$comment->user->id]) }}">

                <img src="{{ asset('storage/'.$comment->user->imagePath) }}"
                    alt="{{ $comment->user->name }}" class='w-6  rounded-full mr-3 h-6'>

            </a>
            <div class='mb-3'>
                <a class='font-semibold cursor-pointer block'
                    href="{{ route('profile.show', ['id'=>$comment->user->id]) }}">
                    {{ $comment->user->name }}
                </a>
                @if(Auth::user()->id==$comment->user->id)
                    <form
                        action="{{ route('comments.destroy',['comment'=>$comment]) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button class='text-red-700'><i class="fas fa-trash text-sm"> </i>
                            Delete</button>
                    </form>
                @endif
            </div>
        </div>
        <p class='px-8'>{{ $comment->body }}</p>
    </div>
