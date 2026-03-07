@extends('layouts.app')

@section('title', 'Membership | KLYMB ')

@section('content')

    <section class="relative bg-white border-b border-gray-100 py-24">
        <div class="max-w-screen-xl mx-auto px-4 text-center">
            <h1 class="text-7xl md:text-9xl font-black uppercase tracking-tighter text-black opacity-[0.03] absolute left-0 right-0 -top-10 pointer-events-none select-none">
                Join Tribe
            </h1>
            <h2 class="text-5xl md:text-7xl font-black uppercase tracking-tight text-black">
                Become a <span class="text-red-600">Member</span>
            </h2>
            <p class="mt-6 text-gray-500 font-medium max-w-lg mx-auto">
                Unlock full access to our facilities, elite training programs, and the most supportive climbing community in Belgrade.
            </p>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div>
                    <h3 class="text-red-600 text-xs font-black uppercase tracking-[0.3em] mb-4 italic">// Your progression</h3>
                    <h2 class="text-4xl md:text-5xl font-black uppercase tracking-tight mb-8">
                        More than just a <span class="text-black">wall</span>
                    </h2>
                    <p class="text-lg text-gray-500 font-medium leading-relaxed mb-8">
                        At KLYMB, we don't believe in static training. Our system is designed to push you out of your comfort zone, whether you're an absolute beginner or prepping for your next big climb in the great outdoors.
                    </p>
                    <div class="flex gap-8">
                        <div>
                            <div class="text-3xl font-black text-red-600">150+</div>
                            <div class="text-xs font-black uppercase tracking-widest">Active Routes</div>
                        </div>
                        <div>
                            <div class="text-3xl font-black text-red-600">7d</div>
                            <div class="text-xs font-black uppercase tracking-widest">Rotation Cycle</div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="h-64 border-2 border-black/10 overflow-hidden">
                        <img src="{{ asset('assets/img/climbing-action-1.jpg') }}" alt="Climbing at KLYMB" class="w-full h-full object-cover">
                    </div>

                    <div class="h-64 border-2 border-black/10 mt-12 overflow-hidden">
                        <img src="{{ asset('assets/img/climbing-action-2.jpg') }}" alt="KLYMB Facility" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-gray-50">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8">

                <div class="bg-white border-2 border-gray-200 p-10 flex flex-col hover:border-black transition-all">
                    <h3 class="text-sm font-black uppercase tracking-widest text-gray-400 mb-4">// Daily</h3>
                    <div class="text-5xl font-black mb-8">10€</div>
                    <ul class="space-y-4 mb-10 flex-grow text-gray-600 font-medium">
                        <li>✓ Full wall access</li>
                        <li>✓ Day locker access</li>
                        <li>✓ Free rental chalk</li>
                    </ul>
                    <a href="#" class="block text-center py-4 bg-black text-white font-black uppercase tracking-widest hover:bg-red-600 transition-all">Get Pass</a>
                </div>

                <div class="bg-black text-white p-10 flex flex-col relative">
                    <div class="absolute top-0 right-0 bg-red-600 px-4 py-1 text-[10px] font-black uppercase tracking-widest">Most Popular</div>
                    <h3 class="text-sm font-black uppercase tracking-widest text-red-600 mb-4">// Monthly</h3>
                    <div class="text-5xl font-black mb-8">60€</div>
                    <ul class="space-y-4 mb-10 flex-grow font-medium text-gray-300">
                        <li>✓ Unlimited wall entry</li>
                        <li>✓ 2 Guest passes per month</li>
                        <li>✓ Priority class booking</li>
                        <li>✓ 10% Shop discount</li>
                    </ul>
                    <a href="#" class="block text-center py-4 bg-red-600 text-white font-black uppercase tracking-widest hover:bg-white hover:text-black transition-all">Join Tribe</a>
                </div>

                <div class="bg-white border-2 border-gray-200 p-10 flex flex-col hover:border-black transition-all">
                    <h3 class="text-sm font-black uppercase tracking-widest text-gray-400 mb-4">// Annual</h3>
                    <div class="text-5xl font-black mb-8">600€</div>
                    <ul class="space-y-4 mb-10 flex-grow text-gray-600 font-medium">
                        <li>✓ Everything in Monthly</li>
                        <li>✓ Free climbing gear gift</li>
                        <li>✓ Personal training plan</li>
                        <li>✓ 1 Guest pass per week</li>
                    </ul>
                    <a href="#" class="block text-center py-4 bg-black text-white font-black uppercase tracking-widest hover:bg-red-600 transition-all">Go Pro</a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-screen-xl mx-auto px-4 grid md:grid-cols-3 gap-12 text-center">
            <div>
                <div class="text-4xl mb-6">🧗</div>
                <h4 class="font-black uppercase text-xl mb-4 tracking-widest">Dynamic Routes</h4>
                <p class="text-gray-500 font-medium">New, professionally set routes every single week. No matter your level, you'll always have a challenge.</p>
            </div>
            <div>
                <div class="text-4xl mb-6">⚙️</div>
                <h4 class="font-black uppercase text-xl mb-4 tracking-widest">Pro Training</h4>
                <p class="text-gray-500 font-medium">Full access to moonboards, kilter boards, and specialized strength training zones for elite performance.</p>
            </div>
            <div>
                <div class="text-4xl mb-6">🤝</div>
                <h4 class="font-black uppercase text-xl mb-4 tracking-widest">The Tribe</h4>
                <p class="text-gray-500 font-medium">Join a community of climbers who push, support, and grow together. More than just a gym – it's a team.</p>
            </div>
        </div>
    </section>

    <section class="py-24 bg-black text-white text-center">
        <h2 class="text-3xl font-black uppercase tracking-tighter mb-6">Still not sure?</h2>
        <p class="text-gray-400 mb-8 max-w-md mx-auto">Come in for a single day pass first. If you love it, we'll deduct the price of your day pass from your first month!</p>
        <a href="/contact" class="inline-block px-12 py-4 bg-red-600 text-white font-black uppercase tracking-widest hover:bg-white hover:text-black transition-all">Visit Us First</a>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-3xl mx-auto px-4">
            <h2 class="text-3xl font-black uppercase text-center mb-16 tracking-tighter">Frequently Asked</h2>

            <div class="space-y-4">

                <details class="group border-b border-gray-200 pb-6">
                    <summary class="flex justify-between items-center font-black uppercase tracking-widest text-lg cursor-pointer list-none">
                        Can I cancel my membership anytime?
                        <span class="text-red-600 transition-transform group-open:rotate-45 text-2xl">+</span>
                    </summary>
                    <p class="text-gray-600 mt-4 leading-relaxed">
                        Yes, you can pause or cancel your monthly subscription directly from your Member Dashboard with no questions asked.
                    </p>
                </details>

                <details class="group border-b border-gray-200 pb-6">
                    <summary class="flex justify-between items-center font-black uppercase tracking-widest text-lg cursor-pointer list-none">
                        Are rental shoes included?
                        <span class="text-red-600 transition-transform group-open:rotate-45 text-2xl">+</span>
                    </summary>
                    <p class="text-gray-600 mt-4 leading-relaxed">
                        Annual members get rental shoes included. Daily and monthly members can rent professional gear at our front desk.
                    </p>
                </details>

                <details class="group border-b border-gray-200 pb-6">
                    <summary class="flex justify-between items-center font-black uppercase tracking-widest text-lg cursor-pointer list-none">
                        Do I need to book in advance?
                        <span class="text-red-600 transition-transform group-open:rotate-45 text-2xl">+</span>
                    </summary>
                    <p class="text-gray-600 mt-4 leading-relaxed">
                        For general wall access, no. For specialized workshops or peak hours, we recommend booking via the Member Dashboard to guarantee your spot.
                    </p>
                </details>

            </div>
        </div>
    </section>

@endsection
