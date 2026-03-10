@extends('layouts.app')

@section('title', 'Contact | KLYMB ')

@section('content')

    <section class="relative bg-white border-b border-gray-100 py-24 overflow-hidden">
        <div class="max-w-screen-xl mx-auto px-4 text-center relative z-10">
            <h1 class="text-7xl md:text-9xl font-black uppercase tracking-tighter text-black opacity-[0.03] absolute left-0 right-0 -top-10 md:-top-16 pointer-events-none select-none">
                Get In Touch
            </h1>
            <h2 class="text-5xl md:text-7xl font-black uppercase tracking-tight text-black">
                Contact <span class="text-red-600">Us</span>
            </h2>
            <div class="mt-6 flex justify-center items-center gap-4">
                <span class="h-[1px] w-12 bg-red-600"></span>
                <p class="text-sm font-bold uppercase tracking-[0.4em] text-gray-400">Join the tribe</p>
                <span class="h-[1px] w-12 bg-red-600"></span>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="grid md:grid-cols-12 gap-16">

                <div class="md:col-span-4 space-y-12">
                    <div>
                        <h3 class="text-red-600 text-xs font-black uppercase tracking-[0.3em] mb-6 italic">// Headquarters</h3>
                        <p class="text-2xl font-black uppercase text-black leading-tight">
                            Zdravka Čelara 16, <br>
                            Belgrade, Serbia
                        </p>
                    </div>

                    <div>
                        <h3 class="text-red-600 text-xs font-black uppercase tracking-[0.3em] mb-6 italic">// Connectivity</h3>
                        <a href="mailto:hello@klymb.com" class="block text-xl font-bold text-black hover:text-red-600 transition-colors">support@klymb.com</a>
                        <a href="tel:+381601234567" class="block text-xl font-bold text-black mt-2">+381 60 123 4567</a>
                    </div>

                    <div>
                        <h3 class="text-red-600 text-xs font-black uppercase tracking-[0.3em] mb-6 italic">// Hours</h3>
                        <div class="flex justify-between border-b border-gray-100 pb-2">
                            <span class="text-sm font-bold uppercase text-gray-400">Mon - Fri</span>
                            <span class="text-sm font-black text-black">08:00 - 23:00</span>
                        </div>
                        <div class="flex justify-between border-b border-gray-100 py-2">
                            <span class="text-sm font-bold uppercase text-gray-400">Weekend</span>
                            <span class="text-sm font-black text-black">10:00 - 22:00</span>
                        </div>
                    </div>
                </div>

                <div class="md:col-span-8 bg-gray-50 p-8 md:p-12 relative">
                    <div class="absolute top-0 right-0 w-16 h-16 border-t-4 border-r-4 border-black"></div>

                    <div class="mb-8">
                        <h2 class="text-2xl font-black uppercase tracking-widest text-gray-900">Send us a message</h2>
                        <div class="w-12 h-1 bg-black mt-2"></div>
                    </div>

                    @if ($errors->any())
                        <div class="mb-8 p-4 bg-red-50 border-2 border-red-600">
                            <ul class="text-red-600 text-xs font-black uppercase tracking-widest list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="mb-8 p-4 bg-green-50 border-2 border-green-600">
                            <p class="text-green-600 text-xs font-black uppercase tracking-widest">
                                {{ session('success') }}
                            </p>
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-8">
                        @csrf

                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-black uppercase tracking-widest text-gray-900">Name</label>
                            <input type="text" name="name" id="name"
                                   value="{{ auth()->check() ? auth()->user()->username : old('name') }}"
                                   {{ auth()->check() ? 'readonly' : 'required' }}
                                   class="w-full border p-3 text-base font-medium transition-all {{ auth()->check() ? 'bg-gray-100 border-gray-200 text-gray-500 cursor-not-allowed' : 'bg-white border-gray-300 focus:border-black focus:outline-none focus:ring-1 focus:ring-black' }}">
                        </div>

                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-black uppercase tracking-widest text-gray-900">Email</label>
                            <input type="email" name="email" id="email"
                                   value="{{ auth()->check() ? auth()->user()->email : old('email') }}"
                                   {{ auth()->check() ? 'readonly' : 'required' }}
                                   class="w-full border p-3 text-base font-medium transition-all {{ auth()->check() ? 'bg-gray-100 border-gray-200 text-gray-500 cursor-not-allowed' : 'bg-white border-gray-300 focus:border-black focus:outline-none focus:ring-1 focus:ring-black' }}">
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="message" class="block text-sm font-black uppercase tracking-widest text-gray-900">Message</label>
                            <textarea name="message" id="message" rows="4" required
                                      class="w-full bg-white border border-gray-300 p-3 text-base font-medium focus:border-black focus:outline-none focus:ring-1 focus:ring-black transition-all resize-none">{{ old('message') }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <button type="submit"
                                    class="cursor-pointer w-full bg-black text-white font-black uppercase tracking-widest py-4 text-sm hover:bg-red-600 transition-all duration-300">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="relative h-[400px] w-full overflow-hidden">
        <iframe class="w-full h-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3368.393950971455!2d20.482096976757852!3d44.814731371070856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7a95dfdba1fb%3A0x7dd3ed9b437a11d6!2z0JfQtNGA0LDQstC60LAg0KfQtdC70LDRgNCwIDE2LCDQkdC10L7Qs9GA0LDQtCAxMTAwMA!5e1!3m2!1ssr!2srs!4v1772830261894!5m2!1ssr!2srs" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

@endsection
