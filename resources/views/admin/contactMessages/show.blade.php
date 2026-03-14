@extends('layouts.admin')

@section('content')
    <div class="w-full space-y-8">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-black uppercase tracking-tighter text-gray-900">Message Details</h1>
            <a href="{{ route('admin.messages.index') }}" class="text-sm font-bold text-gray-500 hover:text-black uppercase tracking-widest">← Back to Inbox</a>
        </div>

        @if ($errors->any())
            <div class="p-4 bg-red-50 border-2 border-red-600">
                <ul class="text-red-600 text-xs font-black uppercase tracking-widest">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('message'))
            <div class="p-4 text-sm text-green-800 bg-green-50 border border-green-200 rounded-lg">
                {{ session('message') }}
            </div>
        @endif

        <div class="bg-white p-8 border border-gray-200 shadow-sm">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">From: {{ $message->user?->email ?? $message->email }}</p>
            <p class="text-lg text-gray-800 mb-6">{{ $message->message }}</p>
            <span class="text-xs text-gray-500">{{ $message->created_at->format('d. M. Y. H:i') }}</span>
        </div>

        <div class="bg-white p-8 border border-gray-200 shadow-sm">
            <h2 class="text-xl font-bold uppercase tracking-tight mb-4">Reply to message</h2>
            <form action="{{ route("admin.messages.update", $message->id) }}" method="POST">
                @csrf @method('PATCH')

                <textarea name="answer" rows="6"
                          {{ $message->is_answered ? 'disabled' : '' }}
                          class="w-full p-4 border border-gray-300 transition focus:border-red-500 focus:ring-0
                         disabled:bg-gray-100
                         disabled:text-black
                         disabled:cursor-not-allowed
                         disabled:border-gray-200"
                          placeholder="Write your answer here...">{{ $message->answer }}</textarea>

                <button type="submit"
                        {{ $message->is_answered ? 'disabled' : '' }}
                        class="mt-4 bg-slate-900 text-white px-8 py-3 font-bold uppercase tracking-widest transition
               hover:bg-red-600
               disabled:bg-gray-400
               disabled:cursor-not-allowed
               disabled:hover:bg-gray-400">
                    Send Reply
                </button>
            </form>
        </div>
    </div>
@endsection
