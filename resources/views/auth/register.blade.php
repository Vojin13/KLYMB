@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center p-4 bg-gray-100 relative overflow-hidden">

        <div class="absolute top-0 left-0 w-64 h-64 bg-black rotate-45 -translate-x-20 -translate-y-20 opacity-10"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-red-600 rotate-12 translate-x-20 translate-y-20 opacity-10"></div>

        <div class="max-w-2xl w-full bg-white p-12 border-4 border-black relative z-10 shadow-[12px_12px_0px_0px_rgba(0,0,0,1)]">

            <div class="mb-10">
                <h2 class="text-5xl font-black uppercase tracking-tighter mb-2">Join The Tribe</h2>
                <div class="w-20 h-2 bg-red-600"></div>
                <p class="text-gray-500 font-bold mt-4 uppercase tracking-widest text-sm">// Register your account to access the facility</p>
            </div>

            <form action="{{ route('auth.register') }}" method="POST" class="space-y-6">
                @csrf

                @if ($errors->any())
                    <div class="p-4 bg-red-50 border-2 border-red-600">
                        <ul class="text-red-600 text-xs font-black uppercase tracking-widest">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest mb-2 text-gray-400">First Name</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" class="w-full border-2 border-black p-4 focus:border-red-600 outline-none font-bold" required>
                    </div>
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest mb-2 text-gray-400">Last Name</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" class="w-full border-2 border-black p-4 focus:border-red-600 outline-none font-bold" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-black tracking-widest mb-2 uppercase text-gray-400">Username</label>
                        <input type="text" name="username" value="{{ old('username') }}" class="w-full border-2 border-black p-4 focus:border-red-600 outline-none font-bold" required>
                    </div>
                    <div>
                        <label class="block text-xs font-black tracking-widest mb-2 uppercase text-gray-400">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full border-2 border-black p-4 focus:border-red-600 outline-none font-bold" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-black tracking-widest mb-2 uppercase text-gray-400">Date of Birth</label>
                        <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="w-full border-2 border-black p-4 focus:border-red-600 outline-none font-bold text-gray-900 bg-white" required>
                    </div>
                    <div>
                        <label class="block text-xs font-black tracking-widest uppercase mb-2 text-gray-400">Password</label>
                        <input type="password" name="password" class="w-full border-2 border-black p-4 focus:border-red-600 outline-none font-bold" required>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-black tracking-widest uppercase mb-2 text-gray-400">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="w-full border-2 border-black p-4 focus:border-red-600 outline-none font-bold" required>
                </div>

                <button type="submit" class="w-full py-6 bg-black text-white font-black tracking-widest hover:bg-red-600 transition-all text-xl cursor-pointer">
                    Create Account
                </button>
            </form>
        </div>
    </div>
@endsection
