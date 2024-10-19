@extends('auth.master')

@section('title')
    Reset Password
@endsection

@section('content')
    
        <h2 class="font-title text-red-500 text-2xl">Reset Password</h2>
        <p class="text-lg font-semibold">Enter your details</p>
        <hr class="w-full my-4 border-red-500"/>
        <form method="POST" action="{{ route('password.store') }}" class="w-full">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="mb-6">
                <label class="block text-black font-semibold mb-2" for="email">Email</label>
                <input class="w-full px-3 py-2 rounded-md bg-neutral-300" id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username"/>
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

            <!-- Submit Button -->
            <button class="w-full py-3 bg-red-500 text-white rounded-md font-semibold text-base mt-4">
                Reset Password
            </button>
        </form>
    </div>
@endsection
