<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">

    <nav class="bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-100 shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-xl font-bold text-blue-400">
                        Dashboard
                    </a>

                    <div class="ml-10 flex items-baseline space-x-4">
                        @if(auth()->user()->is_admin())
                            <a href="{{ route('users.index') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-200 dark:hover:bg-gray-700">
                                {{__('Team Members')}}
                            </a>
                        @endif
                    </div>
                </div>

                <div class="flex items-center">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-200 dark:hover:bg-gray-700">
                            {{__('Profile')}}
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-xs hover:bg-gray-100 dark:hover:bg-gray-700">
                                {{__('Logout')}}
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </nav>

    <main class="flex-1 max-w-7xl mx-auto p-6">
        @yield('content')
    </main>
</div>
</body>
</html>
