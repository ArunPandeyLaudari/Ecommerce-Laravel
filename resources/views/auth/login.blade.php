@extends('layouts.master')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-r from-purple-400 to-indigo-600">
        <div
            class="w-full max-w-md p-8 transition-transform duration-500 ease-in-out transform bg-white shadow-lg rounded-2xl hover:scale-105">
            <h2 class="text-3xl font-bold text-center text-gray-900">{{ __('Admin Login') }}</h2>

            <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="mt-1 w-full px-4 py-3 border  rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 @error('email') border-red-500 @enderror transition-colors duration-300">
                    @error('email')
                        <span class="block mt-2 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" required
                        class="mt-1 w-full px-4 py-3 border  rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 @error('password') border-red-500 @enderror transition-colors duration-300">
                    @error('password')
                        <span class="block mt-2 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                        <label for="remember_me" class="block ml-2 text-sm text-gray-900">{{ __('Remember Me') }}</label>
                    </div>
                    <div class="text-sm">
                        <a href="{{ route('password.request') }}"
                            class="text-purple-600 hover:underline">{{ __('Forgot Your Password?') }}</a>
                    </div>
                </div>

                <div class="mb-6">
                    <button type="submit"
                        class="flex justify-center w-full px-6 py-3 text-lg font-semibold text-white transition-transform duration-300 ease-in-out transform bg-purple-600 rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 hover:scale-105">
                        {{ __('Login') }}
                    </button>
                </div>

                <div class="text-center">
                    <p class="text-sm text-gray-600">{{ __('Need an account?') }}
                        <a href="{{ route('register') }}" class="text-purple-600 hover:underline">{{ __('Sign Up') }}</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection
