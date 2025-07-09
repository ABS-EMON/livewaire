<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100">

    <nav class="bg-gray-800 text-white p-4">
        <div class="container mx-auto flex justify-between">
            <span>Welcome, {{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="hover:underline">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container mx-auto mt-10">
        @livewire('task-manager')
    </div>

    @livewireScripts
</body>
</html>
