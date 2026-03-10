@extends('layouts.admin')

@section('content')
    <div class="space-y-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-black uppercase tracking-tighter text-gray-900">Message Inbox</h1>
                <p class="text-gray-500 font-bold uppercase tracking-widest text-xs mt-1">Manage customer inquiries</p>
            </div>
        </div>

        <div class="flex justify-start mb-4">
            <p class="text-gray-500 font-bold text-sm uppercase tracking-widest">
                Showing
                <span class="text-black">{{ $messages->firstItem() ?? 0 }}</span>
                to
                <span class="text-black">{{ $messages->lastItem() ?? 0 }}</span>
                of
                <span class="text-black">{{ $messages->total() }}</span>
                messages
            </p>
        </div>

        <div class="bg-white border border-gray-200 shadow-sm overflow-hidden">
            <table class="w-full text-left text-base">
                <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-gray-500">
                    <th class="p-6 font-bold uppercase tracking-wider text-sm">#</th>
                    <th class="p-6 font-bold uppercase tracking-wider text-sm">Sender</th>
                    <th class="p-6 font-bold uppercase tracking-wider text-sm">Message</th>
                    <th class="p-6 font-bold uppercase tracking-wider text-sm">Is answered</th>
                    <th class="p-6 font-bold uppercase tracking-wider text-sm">Date</th>
                    <th class="p-6 font-bold uppercase tracking-wider text-sm text-right">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @if($messages->total() > 0)
                    @foreach($messages as $m)
                        <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-white' : 'bg-gray-50'}} hover:bg-gray-100 transition-colors">
                            <td class="p-6">{{ $loop->iteration + $messages->firstItem() - 1 }}</td>
                            <td class="p-6">{{ $m->user?->email ?? $m->email }}</td>
                            <td class="p-6 text-gray-600">{{ Str::words($m->message,12) }}</td>
                            <td class="p-6 text-center text-lg font-mono">
                                {{ $m->is_answered ? '✅' : '❌' }}
                            </td>
                            <td class="p-6 text-gray-600 text-sm">{{ $m->created_at->format('d. M. Y. H:i:s') }}</td>
                            <td class="p-6 text-right space-x-4">
                                <a href="" class="text-blue-600 font-bold hover:text-blue-800 transition cursor-pointer">Read</a>
                                <form action="" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 font-bold hover:text-red-800 transition cursor-pointer">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="p-12 text-center text-gray-400 font-black uppercase tracking-widest">No messages found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        {{ $messages->links() }}
    </div>
@endsection
