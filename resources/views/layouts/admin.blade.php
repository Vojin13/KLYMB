<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin | KLYMB')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">

<x-fixed.navbar />

<div class="flex min-h-screen">
    <aside class="w-64 bg-black text-white shrink-0">
        <div class="p-8 border-b border-gray-800">
            <h1 class="text-2xl font-black tracking-tighter">KLYMB ADMIN</h1>
        </div>
        <nav class="mt-6">
            <a href="{{ route('admin.users') }}" class="flex items-center gap-4 py-4 px-8 hover:bg-red-600 transition font-bold uppercase">
                <span>📊</span> Dashboard
            </a>
            <a href="{{ route('admin.users') }}" class="flex items-center gap-4 py-4 px-8 hover:bg-red-600 transition font-bold uppercase">
                <span>👥</span> Users
            </a>
            <a href="{{ route('admin.messages') }}" class="flex items-center gap-4 py-4 px-8 hover:bg-red-600 transition font-bold uppercase">
                <span>📩</span> Messages
            </a>
            <a href="" class="flex items-center gap-4 py-4 px-8 hover:bg-red-600 transition font-bold uppercase">
                <span>💳</span> Membership
            </a>
        </nav>
    </aside>

    <main class="flex-1 p-12 overflow-y-auto">
        @yield('content')
    </main>
</div>
</body>
</html>
