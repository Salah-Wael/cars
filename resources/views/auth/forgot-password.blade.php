@extends('auth.master')

@section('title')
    Password Reset
@endsection

@section('content')
    <div class="w-[400px] flex flex-col items-center justify-center p-8 bg-neutral-50">
        <h2 class="font-title text-red-500 text-2xl">Forgot Your Password?</h2>
        <p class="text-lg font-semibold">No problem. Just enter your email address, and we’ll send you a reset link.</p>
        <hr class="w-full my-4 border-red-500"/>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="w-full">
            @csrf

            <!-- Email Address -->
            <div class="mb-6">
                <label class="block text-black font-semibold mb-2" for="email">Email</label>
                <input class="w-full px-3 py-2 rounded-md bg-neutral-300" id="email" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <button class="w-full py-3 bg-red-500 text-white rounded-md font-semibold text-base mt-4">
                Email Password Reset Link
            </button>
        </form>
    </div>
@endsection
