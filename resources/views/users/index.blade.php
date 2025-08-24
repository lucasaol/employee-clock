@extends('layouts.app')

@section('title', __('Team Members'))

@section('content')
    <div class="bg-white dark:bg-gray-600 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

            <section class="flex justify-between items-center mb-4">

                <h1 class="font-semibold text-xl leading-tight">
                    {{ __('Team Members') }}
                </h1>

                <a href="{{ route('users.index') }}"
                   class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white px-4 py-2 rounded font-semibold">
                    Criar Usuário
                </a>
            </section>

            <section class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-200">ID</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Nome</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Email</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Role</th>
                            <th class="px-6 py-3 text-center text-sm font-medium text-gray-500 dark:text-gray-200">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($users as $user)
                            <tr>
                                <td class="px-6 py-4 text-sm">{{ $user->id }}</td>
                                <td class="px-6 py-4 text-sm">{{ $user->name }}</td>
                                <td class="px-6 py-4 text-sm">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-sm capitalize">{{ $user->role }}</td>
                                <td class="px-6 py-4 text-center flex justify-center gap-2">
                                    <a href="{{ route('users.index', $user) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                                        Editar
                                    </a>
                                    <form action="{{ route('users.index', $user) }}" method="POST" onsubmit="return confirm('Tem certeza?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                                            Deletar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>

        </div>
    </div>
@endsection
