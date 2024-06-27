<x-guest-layout>
    <div class='w-full h-dvh flex justify-center items-center'>
        <div class='flex flex-col items-center'>
            <p class='text-2xl	text-emerald-700 py-8'>Welcome to</p>
            <div class='flex justify-center'>
                <img src="{{ asset('images/logo.png') }}" alt="logo" class='w-1/12'>
                <h1 class='text-9xl	text-emerald-700' style='font-family:"Lugrasimo", cursive;'>
                    {{ config('app.name') }}</h1>
            </div>
            <div class='pt-16 mt-16'>
                <a href="{{route('register')}}" class=' bg-emerald-700 text-white px-4 py-2 rounded-3xl mr-5'>Register</a>
                <a href="{{route('login')}}" class=' bg-emerald-700 text-white px-4 py-2 rounded-3xl'>Login</a>
            </div>
        </div>
    </div>

</x-guest-layout>
