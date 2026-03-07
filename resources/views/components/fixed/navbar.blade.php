<nav class="bg-neutral-primary h-[9vh] sticky w-full z-50 top-0 start-0 border-b border-gray-200 p-2">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

        <a href="/" class="flex items-center space-x-3 group">
            <img src="{{ asset('assets/img/logo.png') }}" class="h-10 transition-transform duration-300 group-hover:scale-105" alt="KLYMB Logo" />
        </a>

        <div class="flex items-center md:order-2 space-x-3">
            <a href="{{ route('login') }}" class="text-gray-700 hover:text-red-600 transition transform hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
            </a>
            <a href="#" class="text-gray-700 hover:text-red-600 transition transform hover:scale-110 relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>
                <span class="absolute -top-1 -right-2 flex h-4 w-4 items-center justify-center rounded-full bg-red-600 text-[10px] font-bold text-white shadow-sm">0</span>
            </a>
            <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 17 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/></svg>
            </button>
        </div>

        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">

                @php

                $navLinks = [
                    [
                        'name' => 'Home',
                        'route' => 'home'
                    ],
                    [
                        'name' => 'Membership',
                        'route' => 'membership'
                    ],
                    [
                        'name' => 'Shop',
                        'route' => 'shop'
                    ],
                    [
                        'name' => 'About us',
                        'route' => 'about'
                    ],
                    [
                        'name' => 'Contact',
                        'route' => 'contact'
                    ]
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

            </ul>
        </div>
    </div>
</nav>
