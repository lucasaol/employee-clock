@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <header class="bg-white dark:bg-gray-600 shadow">
       <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </header>
@endsection
