@extends('layouts.app')

@section('content')
<div class="mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow">
    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-6">{{__('Team Members')}}</h1>

    <form action="{{ route('users.update', $user) }}" method="POST">
        @method('PUT')
        @include('users.partials._form')
    </form>
</div>
@endsection
