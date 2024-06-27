<x-app-layout>

    <div class=' container mx-auto'>
        <div class='w-9/12 mx-auto flex flex-col items-center'>
            <h1 class='text-5xl py-16 text-emerald-700'>
            <i class="fas fa-bookmark"></i>
                Saved Posts
            </h1>
            <div class="grid grid-cols-3 gap-4">
                @foreach($posts as $post)
                    <x-post :post='$post' />
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
