@extends('layouts.app')

@section('title', 'Home | KLYMB')

@section('content')
<main>
    <section class="relative h-[91vh] flex items-center bg-cover bg-center"
             style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('assets/img/Hero.png') }}')">

        <div class="max-w-screen-xl px-4 mx-auto w-full">
            <div class="max-w-3xl">
                <h1 class="mb-6 text-4xl font-extrabold uppercase tracking-tight leading-tight md:text-5xl xl:text-6xl text-white">
                    Built to climb <br>
                    <span class="text-primary-500">Geared to perform</span>
                </h1>

                <p class="max-w-2xl font-semibold mb-8 font-light text-gray-200 md:text-lg lg:text-xl">
                    Bouldering & Gear. One Spot.
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="#" class="uppercase inline-flex items-center justify-center px-6 py-3 text-base font-medium text-white rounded-lg bg-red-600 hover:bg-red-700 transition">
                        Shop now
                        <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                    <a href="#" class="uppercase inline-flex items-center justify-center px-6 py-3 text-base font-medium text-white border border-gray-400 rounded-lg hover:bg-white hover:text-black transition">
                        Programs
                        <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<section class="bg-white py-8 antialiased md:py-12">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
            <div>
                <h2 class="text-3xl font-extrabold tracking-tight text-black sm:text-4xl uppercase">
                    TOP PICKS
                </h2>
            </div>
        </div>

        <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">

            @foreach($topPicks as $p)

                <x-product-card
                    :id="$p['id']"
                    :image="$p['image']"
                    :name="$p['name']"
                    :price="$p['price']"
                    :badge="$p['badge']"
                    :url="$p['url']"
                />

            @endforeach

        </div>

        </div>
    </div>
</section>

<!--<section class="bg-white py-12 antialiased">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <div class="mb-10 flex items-center justify-between pb-4">
            <h2 class="text-3xl font-extrabold tracking-tight text-black sm:text-4xl uppercase">
                Top Picks
            </h2>
            <a href="#" class="inline-flex items-center text-sm font-bold uppercase tracking-wider text-black hover:underline">
                Shop All
                <svg class="ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>

        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
            <div class="group flex flex-col border-b border-gray-200 pb-6 lg:border-none">
                <div class="mb-6 flex h-64 items-center justify-center overflow-hidden rounded-lg bg-white p-4">
                    <img src="{{ asset('assets/img/image1.png') }}" alt="La Sportiva Finale" class="h-full w-full object-contain transition-transform duration-300 group-hover:scale-105" />
                </div>
                <hr class="border-gray-200">
                <div class="pt-2">
                    <h3 class="text-sm font-bold uppercase tracking-wide text-black">La Sportiva Finale</h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">€129,95</p>
                    <button type="button" class="mt-4 w-full bg-[#1A252F] px-5 py-2.5 text-xs font-bold uppercase text-white hover:bg-black focus:outline-none">
                        Buy Now
                    </button>
                </div>
            </div>

            <div class="group flex flex-col border-b border-gray-200 pb-6 lg:border-none">
                <div class="mb-6 flex h-64 items-center justify-center overflow-hidden rounded-lg bg-white p-4">
                    <img src="{{ asset('assets/img/image2.png') }}" alt="Chalk Powder" class="h-full w-full object-contain transition-transform duration-300 group-hover:scale-105" />
                </div>
                <hr class="border-gray-200">
                <div class="pt-2">
                    <h3 class="text-sm font-bold tracking-wide uppercase text-black">Chalk Powder 300g</h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">€18,95</p>
                    <button type="button" class="mt-4 w-full bg-[#1A252F] px-5 py-2.5 text-xs font-bold uppercase text-white hover:bg-black focus:outline-none">
                        Buy Now
                    </button>
                </div>
            </div>

            <div class="group flex flex-col border-b border-gray-200 pb-6 lg:border-none">
                <div class="mb-6 flex h-64 items-center justify-center overflow-hidden rounded-lg bg-white p-4">
                    <img src="{{ asset('assets/img/image3.png') }}" alt="La Sportiva Chalkbag" class="h-full w-full object-contain transition-transform duration-300 group-hover:scale-105" />
                </div>
                <hr class="border-gray-200">
                <div class="pt-2">
                    <h3 class="text-sm font-bold uppercase tracking-wide text-black">La Sportiva Chalkbag</h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">€24,95</p>
                    <button type="button" class="mt-4 w-full bg-[#1A252F] px-5 py-2.5 text-xs font-bold uppercase text-white hover:bg-black focus:outline-none">
                        Buy Now
                    </button>
                </div>
            </div>

            <div class="group flex flex-col border-b border-gray-200 pb-6 lg:border-none">
                <div class="mb-6 flex h-64 items-center justify-center overflow-hidden rounded-lg bg-white p-4">
                    <img src="{{ asset('assets/img/image4.png') }}" alt="La Sportiva Tarantula" class="h-full w-full object-contain transition-transform duration-300 group-hover:scale-105" />
                </div>
                <hr class="border-gray-200">
                <div class="pt-2">
                    <h3 class="text-sm font-bold uppercase tracking-wide text-black">La Sportiva Tarantula</h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">€99,95</p>
                    <button type="button" class="mt-4 w-full bg-[#1A252F] px-5 py-2.5 text-xs font-bold uppercase text-white hover:bg-black focus:outline-none">
                        Buy Now
                    </button>
                </div>
            </div>

        </div>
    </div>
</section> -->

<section class="relative bg-black py-32 text-white overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/img/mountains.jpg') }}" alt="Background" class="h-full w-full object-cover" />

        <div class="absolute inset-0 bg-black/30"></div>

        <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-transparent to-black/80"></div>
    </div>

    <div class="relative z-10 mx-auto max-w-screen-xl px-4">
        <div class="text-center mb-24">
            <h3 class="text-red-600 text-[13px] font-black uppercase tracking-[0.3em] mb-4">Our Program</h3>
            <h2 class="text-5xl md:text-7xl font-black uppercase tracking-tighter text-white">
                Vision Into <span class="text-transparent" style="-webkit-text-stroke: 1px white;">Motion</span>
            </h2>
            <div class="mt-6 h-1 w-24 bg-red-600 mx-auto"></div>
        </div>

        <div class="grid gap-8 md:grid-cols-3">

            <div class="group relative p-10 border border-white/10 bg-black/50 backdrop-blur-md transition-all duration-500 hover:border-red-600">
                <div class="absolute top-0 left-0 w-1 h-0 bg-red-600 transition-all duration-500 group-hover:h-full"></div>
                <div class="mb-8 text-red-500 transition-transform duration-500 group-hover:scale-110">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                    </svg>
                </div>
                <h4 class="text-xl font-black uppercase mb-4 tracking-widest">Open Sessions</h4>
                <p class="text-sm leading-relaxed text-gray-300">
                    With over 500 m² of dynamic climbing terrain, high-performance flooring, and a dedicated strength & mobility zone, KLYMB offers flexible open slots every day of the week.
                </p>
            </div>

            <div class="group relative p-10 border border-white/10 bg-black/50 backdrop-blur-md transition-all duration-500 hover:border-red-600">
                <div class="absolute top-0 left-0 w-1 h-0 bg-red-600 transition-all duration-500 group-hover:h-full"></div>
                <div class="mb-8 text-red-500 transition-transform duration-500 group-hover:scale-110">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                    </svg>
                </div>
                <h4 class="text-xl font-black uppercase mb-4 tracking-widest">Group Training</h4>
                <p class="text-sm leading-relaxed text-gray-300">
                    Climbing gets better with people. Our group training sessions are built to boost motivation, consistency, and shared progress led by experienced coaches.
                </p>
            </div>

            <div class="group relative p-10 border border-white/10 bg-black/50 backdrop-blur-md transition-all duration-500 hover:border-red-600">
                <div class="absolute top-0 left-0 w-1 h-0 bg-red-600 transition-all duration-500 group-hover:h-full"></div>
                <div class="mb-8 text-red-500 transition-transform duration-500 group-hover:scale-110">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm6 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75z" />
                    </svg>
                </div>
                <h4 class="text-xl font-black uppercase mb-4 tracking-widest">Kids Program</h4>
                <p class="text-sm leading-relaxed text-gray-300">
                    Climbing is play at its best. Our Kids Climb program builds coordination, confidence, and creativity through carefully guided fun and adventure.
                </p>
            </div>

        </div>

        <div class="mt-20 text-center">
            <a href="#" class="group relative inline-flex items-center justify-center px-10 py-4 font-black uppercase tracking-widest text-white border-2 border-white hover:border-red-600 transition-all duration-300">
                <span class="relative z-10">View Pricing</span>
                <div class="absolute inset-0 bg-red-600 scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300"></div>
            </a>
        </div>
    </div>
</section>

<section class="bg-gray-50 py-16 antialiased">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <div class="lg:flex lg:items-center lg:gap-16">

            <div class="flex-1 text-center lg:text-left">
                <h3 class="text-[#19506B] text-sm font-bold uppercase tracking-[0.3em] mb-4">Why climb with us?</h3>
                <h2 class="mb-8 text-4xl font-extrabold uppercase tracking-tight text-black sm:text-5xl">
                    More than just <br> <span class="text-red-600">four walls.</span>
                </h2>

                <div class="grid gap-8 sm:grid-cols-2">
                    <div class="space-y-3">
                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-red-100 text-red-600 lg:mx-0">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04c0 4.833 1.533 9.347 4.5 13.153a11.955 11.955 0 0017.36 0c2.967-3.806 4.5-8.32 4.5-13.153z"></path></svg>
                        </div>
                        <h4 class="text-lg font-bold uppercase text-gray-900">Safety First</h4>
                        <p class="text-gray-600">Highest safety standards with certified instructors and premium flooring systems.</p>
                    </div>

                    <div class="space-y-3">
                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-[#19506B] text-white lg:mx-0">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h4 class="text-lg font-bold uppercase text-gray-900">Weekly Resets</h4>
                        <p class="text-gray-600">Fresh routes every week. From beginner slabs to world-class overhead bouldering.</p>
                    </div>

                    <div class="space-y-3">
                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-green-100 text-green-600 lg:mx-0">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <h4 class="text-lg font-bold uppercase text-gray-900">Community Driven</h4>
                        <p class="text-gray-600">Join our community events, local competitions, and climbing workshops.</p>
                    </div>

                    <div class="space-y-3">
                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-yellow-100 text-yellow-700 lg:mx-0">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        </div>
                        <h4 class="text-lg font-bold uppercase text-gray-900">Pro Shop & Cafe</h4>
                        <p class="text-gray-600">Grab the best gear or relax with a high-quality coffee after your session.</p>
                    </div>
                </div>
            </div>

            <div class="mt-12 lg:mt-0 flex-1 relative">
                <div class="relative z-10 overflow-hidden rounded-2xl shadow-2xl transition-transform duration-500 hover:scale-[1.02]">
                    <img src="{{ asset('assets/img/gym.jpg') }}" alt="Our Gym" class="w-full h-[500px] object-cover">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-8">
                        <p class="text-white text-2xl font-black uppercase italic">"The best bouldering gym in the region."</p>
                        <p class="text-gray-300 mt-2 font-medium">- Vertical Magazine</p>
                    </div>
                </div>
                <div class="absolute -bottom-6 -right-6 h-full w-full border-4 border-red-600 rounded-2xl -z-0 hidden sm:block"></div>
            </div>

        </div>
    </div>
</section>

<section class="bg-white py-8 antialiased md:py-12">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
            <div>
                <h2 class="text-3xl font-extrabold tracking-tight text-black sm:text-4xl uppercase">
                    Our Best Selling Gear
                </h2>
            </div>
        </div>

        <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">

            @foreach($bestSellingGear as $p)

                <x-product-card
                    :id="$p['id']"
                    :image="$p['image']"
                    :name="$p['name']"
                    :price="$p['price']"
                    :badge="$p['badge']"
                    :url="$p['url']"
                />

            @endforeach

        </div>
    </div>
</section>

<section class="bg-white py-16">
    <div class="mx-auto max-w-screen-xl px-4">
        <div class="relative overflow-hidden rounded-3xl bg-[#1A252F] px-8 py-12 shadow-2xl sm:px-16 md:py-20">
            <div class="absolute top-0 right-0 -mr-20 -mt-20 h-64 w-64 rounded-full bg-red-600/10"></div>
            <div class="absolute bottom-0 left-0 -ml-20 -mb-20 h-64 w-64 rounded-full bg-[#FFA53A]/10"></div>

            <div class="relative z-10 mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-extrabold uppercase tracking-tight text-white sm:text-4xl">
                    Ready to reach <span class="text-red-600">new heights?</span>
                </h2>
                <p class="mt-6 text-lg leading-8 text-gray-300">
                    Join KLYMB today. Whether you're a first-timer or a pro, our community is waiting for you. Get your first session with 50% off!
                </p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="#" class="rounded-lg bg-red-600 px-8 py-3.5 text-sm font-bold uppercase text-white shadow-sm hover:bg-red-700 transition-all focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                        Get Started
                    </a>
                    <a href="#" class="uppercase inline-flex items-center justify-center px-6 py-3 text-sm font-medium text-white border border-gray-400 rounded-lg hover:bg-white hover:text-black transition">
                        View Memberships
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
