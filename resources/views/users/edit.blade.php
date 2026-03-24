@extends('layouts.app')

@section('title', 'KLYMB | Edit profile')

@section('content')

    <div class="max-w-4xl mx-auto space-y-8 py-10 px-4">
        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-r-lg shadow-sm">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-bold text-red-800">
                            Error: ({{ $errors->count() }}):
                        </h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

            @if(session('success'))
                <div class="mb-8 bg-green-50 border-l-4 border-green-500 p-4 shadow-sm flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-bold text-green-800 uppercase tracking-tight">
                                {{ session('success') }}
                            </p>
                        </div>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-green-500 hover:text-green-700 transition cursor-pointer">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            @endif
        <div class="border-b-4 border-black pb-4">
            <h1 class="text-4xl font-black uppercase tracking-tighter text-gray-900">Settings</h1>
            <p class="text-gray-500 font-bold uppercase tracking-widest text-xs mt-1">
                User Profile / {{ $user->username }}
            </p>
        </div>

        <div class="bg-white">
            <form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <div class="space-y-8">
                        <div class="space-y-6">
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-xs font-black uppercase tracking-widest text-gray-900 mb-2">First Name</label>
                                    <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}"
                                           class="w-full border-2 border-gray-100 focus:border-black outline-none p-3 transition text-sm font-bold bg-gray-50">
                                </div>
                                <div>
                                    <label class="block text-xs font-black uppercase tracking-widest text-gray-900 mb-2">Last Name</label>
                                    <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}"
                                           class="w-full border-2 border-gray-100 focus:border-black outline-none p-3 transition text-sm font-bold bg-gray-50">
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-black uppercase tracking-widest text-gray-900 mb-2">Date of Birth</label>
                                <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}"
                                       class="w-full border-2 border-gray-100 focus:border-black outline-none p-3 transition text-sm font-bold bg-gray-50">
                            </div>

                            <div>
                                <label class="block text-xs font-black uppercase tracking-widest text-gray-900 mb-2">Username</label>
                                <input type="text" name="username" value="{{ old('username', $user->username) }}"
                                       class="w-full border-2 border-gray-100 focus:border-black outline-none p-3 transition text-sm font-bold bg-gray-50">
                            </div>

                            <div>
                                <label class="block text-xs font-black uppercase tracking-widest text-gray-900 mb-2">Email Address</label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                       class="w-full border-2 border-gray-100 focus:border-black outline-none p-3 transition text-sm font-bold bg-gray-50">
                            </div>
                        </div>

                        <div class="pt-8 border-t-2 border-dashed border-gray-200">
                            <h3 class="text-sm font-black uppercase tracking-widest text-gray-900 mb-6 flex items-center">
                                <span class="bg-black text-white px-2 py-1 mr-2 text-xs">Security</span> Password Update
                            </h3>
                            <div class="space-y-4">
                                <input type="password" name="password" placeholder="NEW PASSWORD"
                                       class="w-full border-2 border-gray-100 focus:border-black outline-none p-3 transition text-sm font-bold placeholder:text-gray-300 bg-gray-50">
                                <input type="password" name="password_confirmation" placeholder="CONFIRM NEW PASSWORD"
                                       class="w-full border-2 border-gray-100 focus:border-black outline-none p-3 transition text-sm font-bold placeholder:text-gray-300 bg-gray-50">
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col items-center justify-start py-10 bg-gray-50 border-2 border-gray-100 relative">
                        <label class="text-xs font-black uppercase tracking-widest text-gray-900 mb-8">Profile Portrait</label>

                        <div class="mb-10 relative inline-block">
                            <img src="{{ $user->avatars ? asset('storage/' . $user->active_avatar->path) : asset('images/default-avatar.png') }}"
                                 alt="Avatar"
                                 class="h-56 w-56 object-cover border-8 border-white shadow-xl relative z-10">
                            <div class="absolute -inset-2 border-2 border-black z-0 translate-x-2 translate-y-2"></div>
                        </div>

                        <div class="w-full max-w-xs px-6">
                            <label class="block text-center cursor-pointer bg-black text-white px-6 py-4 text-xs font-black uppercase tracking-widest hover:bg-red-600 transition">
                                Browse Files
                                <input type="file" name="avatar" class="hidden">
                            </label>
                            <p id="file-name" class="text-[10px] text-gray-400 mt-3 text-center uppercase font-bold tracking-widest italic">No file selected</p>
                        </div>
                    </div>
                </div>

                <div class="mt-16 flex justify-between items-center border-t-4 border-black pt-8">
                    <a href="{{ url()->previous() }}" class="text-gray-400 font-black uppercase tracking-widest text-xs hover:text-black transition">
                        &larr; Discard
                    </a>
                    <button type="submit" class="cursor-pointer bg-black text-white px-16 py-5 font-black uppercase tracking-widest hover:bg-red-600 transition text-sm shadow-[8px_8px_0px_rgba(0,0,0,0.1)]">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.querySelector('input[name="avatar"]').addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                let fileName = e.target.files[0].name;
                let display = document.getElementById('file-name');
                display.innerText = 'Selected: ' + fileName;
                display.classList.remove('text-gray-400');
                display.classList.add('text-black');
            }
        });
    </script>
@endsection
