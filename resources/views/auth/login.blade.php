@extends('layouts.guest')

@section('content')
    <h2 class="text-2xl mb-6 text-center">{{__('Login')}}</h2>

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium mb-1">{{__('E-mail')}}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="w-full border border-gray-300 rounded p-2 @error('email') border-red-500 @enderror">
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium mb-1">{{__('Password')}}</label>
            <input id="password" type="password" name="password" required
                   class="w-full border border-gray-300 rounded p-2 @error('password') border-red-500 @enderror">
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4 flex items-center">
            <input type="checkbox" name="remember" id="remember" class="mr-2" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember" class="text-sm">{{__('Remember me')}}</label>
        </div>

        <div class="mb-4">
            <button type="submit"
                    class="w-full py-2 px-4 rounded font-semibold
           bg-blue-600 text-white hover:bg-blue-700
           dark:bg-blue-500 dark:hover:bg-blue-600
           transition-colors duration-200">
                {{__('Log in')}}
            </button>
        </div>
    </form>



@endsection
