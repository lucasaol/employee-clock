@extends('layouts.app')

@section('title', __('Team Members'))

@section('content')
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

            <div class="flex justify-between items-center mb-4">

                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Team Members') }}
                </h1>

                <a href="{{ route('users.index') }}"
                   class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white px-4 py-2 rounded font-semibold">
                    Criar Usuário
                </a>
            </div>
        </div>


    </div>
@endsection
