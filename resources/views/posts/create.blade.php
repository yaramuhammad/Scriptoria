<x-app-layout>
    <div class='container mx-auto'>
        <div class='flex flex-col items-center'>
            <form action="{{ route('posts.store') }}" method="POST" enctype='multipart/form-data'
                class='bg-white p-10 rounded-3xl w-6/12'>
                <h1 class='text-3xl py-5 text-center'>
                    Create a new post
                </h1>
                @csrf
                <div class='py-5'>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"
                        required />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div class='py-5'>
                    <x-input-label for="body" :value="__('Body')" />
                    <textarea name="body" cols="30" rows="10"
                        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        :value="old('body')" required>
                        {{old('body')}}
                    </textarea>
                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                </div>
                
                <div class='py-5'>
                    <x-input-label for="category" :value="__('Category')" />
                    @foreach($categories as $category)
                    <input type="checkbox" id='{{ $category->id }}' value='{{ $category->id }}'
                    name='categories[]' class='rounded'>
                    <label for="{{ $category->id }}">{{ $category->title }}</label>
                    <br>
                    
                    @endforeach
                    <x-input-error :messages="$errors->get('categories')" class="mt-2" />
                </div>
                <div class='py-5'>
                    <x-input-label for="image" :value="__('Image')" />
                    <input type="file" name='image' required>
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>
                <div class='text-center'>
                    <button class='bg-emerald-700 py-2 px-5 text-white rounded-3xl text-lg'>Post</button>
                </div>
            </form>


        </div>
    </div>
</x-app-layout>
