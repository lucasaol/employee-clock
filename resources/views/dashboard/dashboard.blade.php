@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <div class="mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-6">
            {{ __('Dashboard') }}
        </h1>

        @include('dashboard.partials.time_record_form')
        @include('dashboard.partials.time_record_list')

    </div>
@endsection
