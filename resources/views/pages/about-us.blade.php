@extends('layouts.app')

@section('title', 'About Us | KLYMB')

@section('content')

    <section class="relative bg-white border-b border-gray-100 py-24 overflow-hidden">
        <div class="max-w-screen-xl mx-auto px-4 text-center relative z-10">
            <h1 class="text-7xl md:text-9xl font-black uppercase tracking-tighter text-black opacity-[0.03] absolute left-0 right-0 -top-10 md:-top-16 pointer-events-none select-none">
                Climbing Culture
            </h1>
            <h2 class="text-5xl md:text-7xl font-black uppercase tracking-tight text-black">
                About <span class="text-red-600">Us</span>
            </h2>
            <div class="mt-6 flex justify-center items-center gap-4">
                <span class="h-[1px] w-12 bg-red-600"></span>
                <p class="text-sm font-bold uppercase tracking-[0.4em] text-gray-400">Vision into motion</p>
                <span class="h-[1px] w-12 bg-red-600"></span>
            </div>
        </div>
    </section>

    <section class="relative py-32 bg-white overflow-hidden">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="grid md:grid-cols-12 gap-12 items-center">
                <div class="md:col-span-5 order-2 md:order-1">
                    <h3 class="text-red-600 text-xs font-black uppercase tracking-[0.3em] mb-4 italic">// 01. The Origin</h3>
                    <h2 class="text-5xl md:text-6xl font-black uppercase tracking-tighter text-black mb-8 leading-[0.9] md:leading-[0.85]">
                        Born on the <br>
                        <span class="text-transparent inline-block mt-2" style="-webkit-text-stroke: 1.5px black;">
        Vertical Rock
    </span>
                    </h2>
                    <p class="text-gray-600 leading-relaxed mb-8 text-lg font-medium">
                        KLYMB is more than just a shop and a gym. It is a project born from pure passion for heights. Founded in the heart of Belgrade in 2024, we started with a single vision: to create a space where premium gear meets world-class training.
                    </p>
                    <div class="inline-flex items-center gap-4 group cursor-default">
                        <div class="h-1 w-12 bg-red-600 transition-all group-hover:w-20"></div>
                        <span class="text-black font-black uppercase tracking-widest text-sm text-gray-400">EST. 2024</span>
                    </div>
                </div>
                <div class="md:col-span-7 order-1 md:order-2 relative">
                    <div class="relative z-10">
                        <img src="{{ asset('assets/img/about-1.jpg') }}" alt="Climbing culture" class="rounded-sm shadow-2xltransition-all duration-700">
                    </div>
                    <div class="absolute -top-6 -right-6 w-32 h-32 border-t-4 border-r-4 border-red-600 z-0"></div>
                    <div class="absolute -bottom-10 -left-10 text-[150px] font-black text-gray-100 -z-10 select-none">KLYMB</div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-black py-24 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none" style="background-image: radial-gradient(#ffffff 0.5px, transparent 0.5px); background-size: 30px 30px;"></div>
        <div class="max-w-screen-xl mx-auto px-4 relative z-10">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-12 text-center">
                <div class="group">
                    <span class="block text-6xl font-black text-white mb-2 transition-transform group-hover:-translate-y-2">500+</span>
                    <span class="text-red-600 uppercase text-sm font-black tracking-[0.3em]">m² Climbing Space</span>
                </div>
                <div class="group">
                    <span class="block text-6xl font-black text-white mb-2 transition-transform group-hover:-translate-y-2 text-red-600">12K</span>
                    <span class="text-red-600 uppercase text-sm font-black tracking-[0.3em]">Active Climbers</span>
                </div>
                <div class="group">
                    <span class="block text-6xl font-black text-white mb-2 transition-transform group-hover:-translate-y-2">50+</span>
                    <span class="text-red-600 uppercase text-sm font-black tracking-[0.3em]">Gear Brands</span>
                </div>
                <div class="group">
                    <span class="block text-6xl font-black text-white mb-2 transition-transform group-hover:-translate-y-2">100%</span>
                    <span class="text-red-600 uppercase text-sm font-black tracking-[0.3em]">Dedication</span>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32 bg-white">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-20 gap-6">
                <div class="max-w-xl">
                    <h3 class="text-red-600 text-xs font-black uppercase tracking-[0.3em] mb-4">// 02. Why We Do It</h3>
                    <h2 class="text-5xl font-black uppercase text-black leading-[0.9]">Our <br>Philosophy</h2>
                </div>
                <p class="text-gray-500 italic font-medium border-l-2 border-red-600 pl-4 uppercase text-sm tracking-widest">Climb smarter, push harder.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-1">
                <div class="group bg-gray-50 p-12 transition-all duration-300 hover:bg-black hover:text-white">
                    <div class="text-red-600 mb-8 font-black text-5xl italic opacity-50 group-hover:opacity-100 group-hover:translate-x-2 transition-all">01</div>
                    <h4 class="text-xl font-black uppercase mb-4 tracking-tighter">Quality First</h4>
                    <p class="text-gray-500 text-sm leading-relaxed group-hover:text-gray-300">
                        There is no room for average gear in our shop. We personally test every product before offering it to the community.
                    </p>
                </div>
                <div class="group bg-gray-50 p-12 transition-all duration-300 hover:bg-black hover:text-white">
                    <div class="text-red-600 mb-8 font-black text-5xl italic opacity-50 group-hover:opacity-100 group-hover:translate-x-2 transition-all">02</div>
                    <h4 class="text-xl font-black uppercase mb-4 tracking-tighter">No Ego Culture</h4>
                    <p class="text-gray-500 text-sm leading-relaxed group-hover:text-white/80">
                        Whether it's your first time in climbing shoes or you are an 8c climber, you are always welcome. We build community, not elites.
                    </p>
                </div>
                <div class="group bg-gray-50 p-12 transition-all duration-300 hover:bg-black hover:text-white">
                    <div class="text-red-600 mb-8 font-black text-5xl italic opacity-50 group-hover:opacity-100 group-hover:translate-x-2 transition-all">03</div>
                    <h4 class="text-xl font-black uppercase mb-4 tracking-tighter">Evolution</h4>
                    <p class="text-gray-500 text-sm leading-relaxed group-hover:text-gray-300">
                        Routes change every week. Training programs adapt to science. KLYMB evolves because climbing evolves.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32 bg-gray-50 border-y border-gray-200 relative overflow-hidden">
        <div class="max-w-screen-xl mx-auto px-4 relative z-10">
            <div class="grid md:grid-cols-3 gap-16">
                <div class="relative group">
                    <div class="text-[100px] font-black text-black opacity-[0.03] absolute -top-16 -left-4 group-hover:opacity-10 transition-all">2023</div>
                    <h4 class="text-sm font-black uppercase mb-4 text-red-600 tracking-[0.2em]">The Vision</h4>
                    <p class="text-gray-600 text-sm leading-relaxed border-l border-gray-300 pl-4">Two friends, one garage, and a dream to bring pro-climbing gear to the local scene.</p>
                </div>
                <div class="relative group">
                    <div class="text-[100px] font-black text-black opacity-[0.03] absolute -top-16 -left-4 group-hover:opacity-10 transition-all">2024</div>
                    <h4 class="text-sm font-black uppercase mb-4 text-red-600 tracking-[0.2em]">The Opening</h4>
                    <p class="text-gray-600 text-sm leading-relaxed border-l border-gray-300 pl-4">Launch of our physical location in Belgrade with over 500m² of climbing terrain.</p>
                </div>
                <div class="relative group">
                    <div class="text-[100px] font-black text-black opacity-[0.03] absolute -top-16 -left-4 group-hover:opacity-10 transition-all">2025</div>
                    <h4 class="text-sm font-black uppercase mb-4 text-red-600 tracking-[0.2em]">The Expansion</h4>
                    <p class="text-gray-600 text-sm leading-relaxed border-l border-gray-300 pl-4">Building the largest climbing community in the Balkans and expanding our Gear Shop.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="relative py-32 bg-white overflow-hidden">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="grid md:grid-cols-12 gap-16 items-center">

                <div class="md:col-span-6 relative">
                    <div class="relative z-10">
                        <img src="{{ asset('assets/img/community.jpg') }}" alt="KLYMB Community" class="rounded-sm shadow-2xl transition-all duration-700 w-full h-[500px] object-cover">
                    </div>

                    <div class="absolute -bottom-6 -left-6 w-32 h-32 border-b-4 border-l-4 border-red-600 z-0"></div>
                    <div class="absolute -top-10 -right-10 text-[120px] font-black text-gray-50 opacity-50 -z-10 select-none">TRIBE</div>
                </div>

                <div class="md:col-span-6">
                    <h3 class="text-red-600 text-xs font-black uppercase tracking-[0.3em] mb-4 italic">// 03. Our Tribe</h3>
                    <h2 class="text-5xl md:text-6xl font-black uppercase tracking-tighter text-black mb-8 leading-[0.9]">
                        Beyond the <br>
                        <span class="text-transparent inline-block mt-2" style="-webkit-text-stroke: 1.5px black;">Physical Wall</span>
                    </h2>
                    <p class="text-gray-600 leading-relaxed mb-8 text-lg font-medium">
                        Climbing is 20% strength and 80% community. At KLYMB, we don't just provide the holds; we provide the atmosphere. From late-night sessions to outdoor trips, our mission is to connect people who aren't afraid to fail until they stick the move.
                    </p>

                    <div class="flex flex-col gap-4">
                        <div class="flex items-start gap-4 p-4 border-l-2 border-black bg-gray-50 hover:border-red-600 transition-colors">
                            <div>
                                <h4 class="font-black uppercase text-sm tracking-widest text-black">Weekly Community Resets</h4>
                                <p class="text-gray-500 text-xs mt-1 italic">Fresh problems every Friday, discussed over coffee.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 p-4 border-l-2 border-black bg-gray-50 hover:border-red-600 transition-colors">
                            <div>
                                <h4 class="font-black uppercase text-sm tracking-widest text-black">Open Platform</h4>
                                <p class="text-gray-500 text-xs mt-1 italic">A place where beginners learn from pros without ego.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="flex flex-wrap justify-center items-center gap-12 md:gap-20 opacity-20 grayscale hover:opacity-100 transition-all duration-1000">
                <span class="text-xl font-black uppercase tracking-tighter">La Sportiva</span>
                <span class="text-xl font-black uppercase tracking-tighter">Petzl</span>
                <span class="text-xl font-black uppercase tracking-tighter underline decoration-red-600 decoration-4">Black Diamond</span>
                <span class="text-xl font-black uppercase tracking-tighter">Mammut</span>
                <span class="text-xl font-black uppercase tracking-tighter">Scarpa</span>
            </div>
        </div>
    </section>

@endsection
