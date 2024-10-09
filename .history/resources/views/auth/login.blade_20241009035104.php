@extends('auth.master')

@section('title')
    Loign
@endsection

@section('content')
    <div class="w-[400px] flex flex-col items-center justify-center p-8 bg-neutral-50">
    	    <h1 class="font-title text-red-500 text-2xl">Welcome</h1>
    	    <p class="text-lg font-semibold">Join Our Community</p>
    	    <hr class="w-full my-4 border-red-500"/>
    	    <form method="POST" action="{{ route('login') }}" class="w-full">
                @csrf

                <!-- Email Address -->
                <div class="mb-6">
                    <label class="block text-black font-semibold mb-2" for="email">Email</label>
                    <input class="w-full px-3 py-2 rounded-md bg-neutral-300" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label class="block text-black font-semibold mb-2" for="password">Password</label>
                    <input class="w-full px-3 py-2 rounded-md bg-neutral-300" id="password" type="password" name="password" required autocomplete="current-password"/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button class="w-full py-3 bg-red-500 text-white rounded-md font-semibold text-base mt-4">
                    Login
                </button>

                <!-- Forgot Password -->
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif
                </div>
    	    </form>
    	  </div>

@endsection








