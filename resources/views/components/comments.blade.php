@props(['post'])
    <div class='bg-white rounded-3xl p-5 mt-16'>

        <h3 class='text-2xl mb-8'>Comments</h3>
        @foreach($post->comments as $comment)
            <x-comment :comment='$comment' />
        @endforeach

        <form action="{{ route('comments.store') }}" method="POST" class='w-full flex justify-between items-center'>
            @csrf
            <img src="{{asset('storage/'.Auth::user()->imagePath)}}" alt="{{Auth::user()->name}}" class='w-12 rounded-full'>
            <input type="text" name="post_id" hidden value="{{ $post->id }}">
            <input type="text" name="body" class='w-10/12 rounded-3xl' placeholder='Leave a comment . . .'>
            <button class='bg-emerald-700 text-white px-3 py-2 rounded-2xl w-1/12'>Post</button>
        </form>
    </div>
