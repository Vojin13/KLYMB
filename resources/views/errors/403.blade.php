@extends('layouts.app')

@section('title', 'Access Denied | KLYMB')

@section('content')
    <main class="flex min-h-[70vh] items-center justify-center bg-gray-50 px-4">
        <div class="text-center">
            <h1 class="text-9xl font-black text-black opacity-5">403</h1>
            <div class="relative -mt-16">
                <h2 class="text-4xl font-black uppercase tracking-tight text-black">
                    Access <span class="text-red-600">Denied</span>
                </h2>
                <p class="mt-4 text-gray-500 font-medium max-w-sm mx-auto">
                    {{ $exception->getMessage() ?: 'You do not have the necessary permissions to access this gear.' }}
                </p>
                <div class="mt-10">
                    <a href="{{ url('/') }}" class="inline-flex items-center justify-center px-8 py-3 text-sm font-black uppercase tracking-widest text-white bg-black hover:bg-red-600 transition-all rounded-lg">
                        Back to Base
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
