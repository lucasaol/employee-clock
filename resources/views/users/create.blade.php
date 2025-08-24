@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-6">Criar Usuário</h1>

        <form action="{{ route('users.store') }}" method="POST">
            @include('users.partials._form', ['submitLabel' => __('Create')])
        </form>
    </div>
@endsection
