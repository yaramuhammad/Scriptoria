<x-guest-layout>

    <style>

        
        html {
            width: 100%;
            height: 100%;
            position: relative;
        }
        
        .right {
            position: absolute;
            top: 0;
            left: 50%;
            z-index: 100;
        }
        
        .part {
            width: 50%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: left 1s, opacity 0.3s;
        }
        
        .left {
            position: absolute;
            top: 0;
            left: 0%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .trans {
            opacity: 0;
        }

        </style>

<body>
    @if (Route::current()->uri() === 'register')
        @if ($errors->has('email'))
            @foreach ($errors->get('email') as $error)
                @if ($error === 'These credentials do not match our records.')
                    @php
                        $method='login';
                    @endphp
        
                @else
                    @php
                        $method='register';
                     @endphp
                @endif
            @endforeach
        @else
            @php
                $method='register';
            @endphp
        @endif
    @else
        @php
            $method='login';
        @endphp
    @endif
    
    
    
    
    
    <div class="relative {{ $method=='login'?'right':'left' }}  part text-white bg-emerald-700 p-14">
    <div class="absolute flex items-start justify-center top-16 left-64">
        <img src="{{ asset('images/logo-white.png') }}" alt="">
        <h1 style='font-family:"Lugrasimo", cursive;' class='text-7xl ml-3'>Scriptoria</h1>
    </div>
    <div class='text-center leading-loose' id='welcomeContent'></div>
</div>
<div
class="{{ $method=='login'?'left':'right' }} part">
<x-auth-session-status class="mb-4" :status="session('status')" />
<button onclick="change()">change</button>
</div>



<script>
    let LoginContent = `<form method="POST" action="{{ route('login') }}" class="w-6/12">
    
    @csrf
    <x-input-label for="email" :value="__('Email')" />
    
    <!-- Email Address -->
    <div>
    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
    
    <!-- Password -->
    <div class="mt-4">
    <x-input-label for="password" :value="__('Password')" />
    
    <x-text-input id="password" class="block mt-1 w-full"
    type="password"
    name="password"
    required autocomplete="current-password" />
    
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            
            <!-- Remember Me -->
            <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
            </div>
            
            
            <div class="flex items-center justify-end mt-4">
            @if(Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
            </a>
            @endif
            
            
            <x-primary-button class="ms-3">
            {{ __('Log in') }}
            </x-primary-button>
            </div>
            </form>
            `
            
            let RegisterContent = `
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="w-6/12">
            @csrf
            <div class='flex justify-center'>
            <input type="file" name='image' id='imageField' hidden onchange="previewImage(event)">
            <label for='imageField' class='cursor-pointer'>
            <div class='rounded-full relative border border-1 border-black'>
            <img id="preview" src="{{ asset('images/profile.png') }}"  width=100 height=100 class="block rounded-full m-1"'>
            <span class="absolute block material-symbols-outlined rounded-full border border-1 border-black top-24 left-20 z-20">
            edit
            </span>
            </div>
            </label>
            </div>
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
            <!-- Name -->
            <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            
            <!-- Email Address -->
            <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            
            <!-- Password -->
            <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            
            <x-text-input id="password" class="block mt-1 w-full"
            type="password"
            name="password"
            required autocomplete="new-password" />
            
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            
            <!-- Confirm Password -->
            <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
            type="password"
            name="password_confirmation" required autocomplete="new-password" />
            
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
            {{ __('Register') }}
            </x-primary-button>
            </div>
            </form>
            `
            
            let welcomeLoginContent = `<h1 class='text-4xl'>
            Hello, Friend!
            </h1>
            <br>
            <p class='text-xl'>
            Enter your personal details and start journey with us
            </p>
            <span class = 'text-lg mr-2'>Don't Have An Account?</span>
            <button type='button' class='bg-white py-0.5 px-3 my-4 text-black rounded-3xl hover:bg-gray-100' onclick="change()">{{ __('Register! ') }}</button>
            `
            
            let welcomeRegisterContent = `<h1 class='text-4xl'>
                Welcome!
                </h1>
                <br>
                <p class='text-xl'>
                Enter your personal details and start journey with us
                </p>
                <span class = 'text-lg mr-2'>Already have an account?</span>
                <button type='button' class='bg-white py-0.5 px-3 my-4 text-black rounded-3xl hover:bg-gray-100' onclick="change()">{{ __('Login! ') }}</button>
                `
                
                let welcome = document.querySelector("#welcomeContent")
                
                </script>
    @if($method=='login')
    <script>
        document.querySelector(".left").innerHTML = LoginContent;
        welcome.innerHTML = welcomeLoginContent;
        
        </script>
    @else
    <script>
        document.querySelector(".right").innerHTML = RegisterContent;
        welcome.innerHTML = welcomeRegisterContent;
        </script>
    @endif
    
    <script>
        function change() {

            let divs = document.querySelectorAll(".part");
            
            divs.forEach((element) => {
                element.classList.toggle("right");
                element.classList.toggle("left");
            });
            divs[1].classList.add('trans');
            setTimeout(() => {
                divs[1].classList.remove('trans');
                if (divs[0].classList.contains("left")) {
                    divs[1].innerHTML = RegisterContent
                    welcome.innerHTML = welcomeRegisterContent;
                    
                } else {
                    divs[1].innerHTML = LoginContent
                    welcome.innerHTML = welcomeLoginContent;
                    
                }
            }, 300);
        }
        
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
        
        </script>


</x-guest-layout>