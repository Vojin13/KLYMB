@extends('layouts.admin')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-black uppercase tracking-tighter text-gray-900 mb-6">Add New User</h1>

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            @include('admin.users._form')

            <div class="mt-8 flex justify-end">
                <button type="submit" class="bg-black text-white px-8 py-3 font-black uppercase text-xs hover:bg-red-600 transition cursor-pointer">
                    Create User
                </button>
            </div>
        </form>
    </div>
@endsection
