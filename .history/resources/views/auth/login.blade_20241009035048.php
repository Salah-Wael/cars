@extends('auth.master')

@section('title')
    Register
@endsection

@section('content')
    <h1 class="font-title text-red-500 text-2xl">Welcome</h1>
          <p class="text-lg font-semibold">Join Our Community</p>
          <hr class="w-full my-4 border-red-500"/>

          <form method="POST" action="{{ route('register') }}" class="w-full">
            @csrf

            <!-- Name -->
            <div class="mb-6">
              <label class="block text-black font-semibold mb-2" for="name">User Name</label>
              <input class="w-full px-3 py-2 rounded-md bg-neutral-300" id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"/>
              <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mb-6">
              <label class="block text-black font-semibold mb-2" for="email">E-mail</label>
              <input class="w-full px-3 py-2 rounded-md bg-neutral-300" id="email" type="email" name="email" :value="old('email')" required autocomplete="username"/>
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-6">
              <label class="block text-black font-semibold mb-2" for="password">Password</label>
              <input class="w-full px-3 py-2 rounded-md bg-neutral-300" id="password" type="password" name="password" required autocomplete="new-password"/>
              <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
              <label class="block text-black font-semibold mb-2" for="password_confirmation">Confirm Password</label>
              <input class="w-full px-3 py-2 rounded-md bg-neutral-300" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"/>
              <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <input type="submit" class="w-full py-3 bg-red-500 text-white rounded-md font-semibold text-base" value="Create Account">

          </form>

          <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
              {{ __('Already registered?') }}
            </a>
          </div>
@endsection








