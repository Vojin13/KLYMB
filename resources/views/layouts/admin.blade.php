<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin | KLYMB')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/@heroicons/vue@2.0.18/dist/heroicons.js"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-900">

<x-fixed.navbar/>

<div class="flex min-h-screen">
    <aside class="w-64 bg-slate-900 text-slate-300 shrink-0 shadow-xl">
        <div class="p-8">
            <h1 class="text-xl font-bold tracking-widest text-white uppercase">KLYMB <span class="text-red-500">Admin</span></h1>
        </div>

        <nav class="mt-4 px-4 space-y-1">
            <a href="{{ route('admin.dashboard.index') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-red-600 hover:text-white transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                <span class="font-medium">Dashboard</span>
            </a>

            <div class="pt-4 pb-2 px-4 text-[10px] font-bold uppercase tracking-widest text-slate-500">Users & messages</div>

            <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-red-600 hover:text-white transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <span class="font-medium">Users</span>
            </a>

            <a href="{{ route('admin.messages.index') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-red-600 hover:text-white transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                <span class="font-medium">Messages</span>
            </a>

            <div class="pt-4 pb-2 px-4 text-[10px] font-bold uppercase tracking-widest text-slate-500">Shop Management</div>

            <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-red-600 hover:text-white transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                <span class="font-medium">Products</span>
            </a>

            <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-red-600 hover:text-white transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                <span class="font-medium">Categories</span>
            </a>

            <a href="{{ route('admin.brands.index') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-red-600 hover:text-white transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                <span class="font-medium">Brands</span>
            </a>

            <a href="{{ route('admin.badges.index') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-red-600 hover:text-white transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-1.006 3.505 3.505 0 015.238 0 3.42 3.42 0 001.946 1.006 3.505 3.505 0 013.97 3.97 3.42 3.42 0 001.006 1.946 3.505 3.505 0 010 5.238 3.42 3.42 0 00-1.006 1.946 3.505 3.505 0 01-3.97 3.97 3.42 3.42 0 00-1.946 1.006 3.505 3.505 0 01-5.238 0 3.42 3.42 0 00-1.946-1.006 3.505 3.505 0 01-3.97-3.97 3.42 3.42 0 00-1.006-1.946 3.505 3.505 0 010-5.238 3.42 3.42 0 001.006-1.946 3.505 3.505 0 013.97-3.97z"></path>
                </svg>
                <span class="font-medium">Badges</span>
            </a>

            <div class="pt-4 pb-2 px-4 text-[10px] font-bold uppercase tracking-widest text-slate-500">Sales</div>

            <a href="{{ route('admin.orders.index') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-red-600 hover:text-white transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                <span class="font-medium">Orders</span>
            </a>

            <a href="#" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-red-600 hover:text-white transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                <span class="font-medium">Membership</span>
            </a>

            <div class="pt-4 pb-2 px-4 text-[10px] font-bold uppercase tracking-widest text-slate-500">System</div>
            <a href="{{ route('admin.logs.index') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-red-600 hover:text-white transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="font-medium">Activity Logs</span>
            </a>
        </nav>
    </aside>

    <main class="flex-1 overflow-y-auto">

        <div class="p-12">
            @yield('content')
        </div>
    </main>
</div>

@include('scripts.flowbite')
</body>
</html>
