@extends('layouts.app')

@section('title', __('Profile'))

@section('content')

    <div class="mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-6">{{ __('Profile') }}</h1>
        <p class="mt-1 text-sm">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>

        @if (session('success'))
            <div id="success-alert"
                 class="fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg transition-opacity duration-500"
            >
                {{ session('success') }}
            </div>
        @endif

        <form method="post" action="{{ route('profile.password.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('put')

            <div class="space-y-4 grid grid-cols-3">

                <div class="mb-4 pr-4">
                    <label for="current_password" class="block font-medium text-sm">{{ __('Current password') }}</label>
                    <input id="current_password" type="password" name="current_password" required
                           class="w-full border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  @error('current_password') border-red-500 @enderror">
                    @error('current_password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4 pr-4">
                    <label for="password" class="block font-medium text-sm">{{ __('New password') }}</label>
                    <input id="password" type="password" name="password" required
                           class="w-full border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  @error('password') border-red-500 @enderror">
                    @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4 pr-4">
                    <label for="password_confirmation" class="block font-medium text-sm">{{ __('Confirm password') }}</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                           class="w-full border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  @error('password_confirmation') border-red-500 @enderror">
                    @error('password_confirmation')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="space-y-4">
                <button type="submit"
                        class="w-full bg-blue-600 text-white px-4 py-2 rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                    {{ __('Save') }}
                </button>
            </div>
        </form>
    </div>
@endsection
