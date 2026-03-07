@extends('layouts.app')

@section('title', 'Login | KLYMB')

@section('content')
    <div class="min-h-screen flex bg-black">

        <div class="hidden lg:flex lg:w-1/2 items-center justify-center relative overflow-hidden bg-cover bg-center"
             style="background-image: url('{{ asset('assets/img/gym.jpg') }}');">

            <div class="absolute inset-0 bg-black/60"></div>

            <div class="z-10 p-12 text-white">
                <h1 class="text-6xl font-black uppercase tracking-tighter mb-4 leading-[0.9]">
                    Master<br>Your<br>Gravity
                </h1>
                <p class="text-xl font-medium opacity-60 italic">// Beyond the wall.</p>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white">
            <div class="max-w-md w-full">
                <h2 class="text-4xl font-black uppercase tracking-tighter mb-2">Welcome Back</h2>
                <p class="text-gray-500 mb-8 uppercase font-bold tracking-widest text-xs">// Enter your credentials to access your dashboard</p>

                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest mb-2 text-gray-400">Email</label>
                        <input type="email" name="email" class="w-full border-2 border-gray-200 p-4 focus:border-red-600 outline-none font-bold transition-all" required>
                    </div>
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest mb-2 text-gray-400">Password</label>
                        <input type="password" name="password" class="w-full border-2 border-gray-200 p-4 focus:border-red-600 outline-none font-bold transition-all" required>
                    </div>
                    <button type="submit" class="w-full py-5 bg-black text-white font-black uppercase tracking-widest hover:bg-red-600 transition-all cursor-pointer">
                        Log In
                    </button>
                </form>

                <div class="mt-8 text-center text-xs font-black uppercase tracking-widest text-gray-400">
                    Don't have an account? <a href="{{ route('register') }}" class="text-red-600 hover:underline">Join the tribe</a>
                </div>
            </div>
        </div>
    </div>
@endsection
