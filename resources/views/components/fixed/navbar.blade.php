<nav class="bg-neutral-primary h-[9vh] sticky w-full z-50 top-0 start-0 border-b border-gray-200 p-2">
    <div class="max-w-screen-xl flex items-center justify-between mx-auto px-4 h-full">

        <a href="/" class="flex items-center space-x-3 group w-[150px] flex-shrink-0">
            <img src="{{ asset('assets/img/logo.png') }}" class="h-10 transition-transform duration-300 group-hover:scale-105" alt="KLYMB Logo" />
        </a>

        <div class="hidden md:flex flex-grow justify-center" id="navbar-cta">
            <ul class="flex flex-col md:flex-row font-medium md:space-x-8">
                @php
                    $navLinks = [
                        ['name' => 'Home', 'route' => 'home'],
                        ['name' => 'Membership', 'route' => 'membership'],
                        ['name' => 'Shop', 'route' => 'shop'],
                        ['name' => 'About us', 'route' => 'about'],
                        ['name' => 'Contact', 'route' => 'contact']
                    ];
                @endphp
                @foreach($navLinks as $l)
                    <li>
                        <a href="{{ route($l['route']) }}" class="font-semibold relative block py-2 px-3 text-gray-900 rounded md:bg-transparent md:p-0 uppercase group transition-colors hover:text-black">
                            {{ $l['name'] }}
                            <span class="absolute bottom-[-8px] left-1/2 w-0 h-[3px] bg-red-600 transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
                        </a>
                    </li>
                @endforeach

                @auth
                    @if(auth()->user()->role->name == 'admin')
                        <a href="{{ route('admin.users') }}" class="font-semibold relative block py-2 px-3 text-gray-900 rounded md:bg-transparent md:p-0 uppercase group transition-colors hover:text-black">
                            Admin Panel
                            <span class="absolute bottom-[-8px] left-1/2 w-0 h-[3px] bg-red-600 transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
                        </a>
                    @endif
                @endauth
            </ul>
        </div>

        <div class="flex items-center justify-end gap-x-4 w-[150px] flex-shrink-0">
            @guest
                <a href="{{ route('show.login') }}" class="text-gray-700 hover:text-red-600 transition transform hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
                </a>
            @else
                <div class="flex items-center gap-x-3">
                    <a href="#" class="hover:text-red-600 font-semibold text-gray-900 uppercase hover:text-black transition-colors whitespace-nowrap">
                        {{ auth()->user()->username }}
                    </a>
                    <form action="{{ route('auth.logout') }}" method="POST" class="flex items-center">
                        @csrf
                        <button type="submit" class="cursor-pointer text-gray-700 hover:text-red-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" /></svg>
                        </button>
                    </form>
                </div>
            @endguest

            <a href="#" class="text-gray-700 hover:text-red-600 transition relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>
                <span class="absolute -top-1 -right-2 flex h-4 w-4 items-center justify-center rounded-full bg-red-600 text-[10px] font-bold text-white shadow-sm">0</span>
            </a>

            <button data-collapse-toggle="navbar-cta" type="button" class="md:hidden p-2 text-gray-500 rounded-lg hover:bg-gray-100">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 17 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/></svg>
            </button>
        </div>
    </div>
</nav>
