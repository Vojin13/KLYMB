@extends('layouts.admin')

@section('content')
    <div class="max-w-2xl mx-auto space-y-8">
        <div>
            <h1 class="text-3xl font-black uppercase tracking-tighter text-gray-900">Edit User</h1>
            <p class="text-gray-500 font-bold uppercase tracking-widest text-xs mt-1">
                Updating: {{ $user->username }}
            </p>
        </div>

        <div class="bg-white border border-gray-200 shadow-sm p-8">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PATCH')
                @include('admin.users._form')

                <div class="mt-8 flex justify-end space-x-4">
                    <a href="{{ route('admin.users.index') }}" class="text-gray-500 font-bold uppercase tracking-widest text-xs hover:text-black transition py-3">
                        Cancel
                    </a>
                    <button type="submit" class="cursor-pointer bg-black text-white px-8 py-3 font-black uppercase tracking-widest hover:bg-red-600 transition text-xs">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
