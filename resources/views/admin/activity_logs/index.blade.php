@extends('layouts.admin')

@section('title', 'Activity Logs | KLYMB')

@section('content')
    <div class="space-y-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-black uppercase tracking-tighter text-gray-900">Activity <span class="text-red-600">Logs</span></h1>
                <p class="text-gray-500 font-bold uppercase tracking-widest text-xs mt-1">Track system routes and request methods</p>
            </div>
        </div>

        <div class="flex justify-start mb-4">
            <p class="text-gray-500 font-bold text-sm uppercase tracking-widest">
                Showing
                <span class="text-black">{{ $logs->firstItem() ?? 0 }}</span>
                to
                <span class="text-black">{{ $logs->lastItem() ?? 0 }}</span>
                of
                <span class="text-black">{{ $logs->total() }}</span>
                requests
            </p>
        </div>

        <div class="bg-white border border-gray-200 shadow-sm overflow-hidden rounded-sm">
            <table class="w-full text-left">
                <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-gray-500">
                    <th class="p-6 font-bold uppercase tracking-wider text-sm">User</th>
                    <th class="p-6 font-bold uppercase tracking-wider text-sm">Method</th>
                    <th class="p-6 font-bold uppercase tracking-wider text-sm">Route</th>
                    <th class="p-6 font-bold uppercase tracking-wider text-sm">Query</th>
                    <th class="p-6 font-bold uppercase tracking-wider text-sm">Payload</th>
                    <th class="p-6 font-bold uppercase tracking-wider text-sm text-right">Date & Time</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @forelse($logs as $log)
                    <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-white' : 'bg-gray-50'}} hover:bg-gray-100 transition-colors">
                        <td class="p-6">
                            <div class="flex items-center gap-3">
                                <span class="font-bold text-gray-900 uppercase text-sm tracking-tight">{{ $log->user->email ?? 'Guest' }}</span>
                            </div>
                        </td>

                        <td class="p-6">
                            @php
                                $methodColor = match($log->method) {
                                    'POST'   => ['bg' => '#dcfce7', 'text' => '#15803d'],
                                    'DELETE' => ['bg' => '#fee2e2', 'text' => '#b91c1c'],
                                    'PUT', 'PATCH' => ['bg' => '#dbeafe', 'text' => '#1d4ed8'],
                                    default  => ['bg' => '#f3f4f6', 'text' => '#374151']
                                };
                            @endphp
                            <span class="rounded px-3 py-1.5 text-xs font-black uppercase tracking-widest shadow-sm border border-black/5"
                                  style="background-color: {{ $methodColor['bg'] }}; color: {{ $methodColor['text'] }};">
                                {{ $log->method }}
                            </span>
                        </td>

                        <td class="p-6">
                            <span class="font-mono text-sm text-gray-700 bg-gray-200/50 px-2 py-1 rounded">
                                {{ $log->route }}
                            </span>
                        </td>

                        <td class="p-6 font-mono text-sm text-gray-500 italic">
                            {{ $log->queryString ?: '-' }}
                        </td>

                        <td class="p-6">
                            @if($log->data && $log->data !== '[]')
                                <button type="button"
                                        onclick="alert('{!! addslashes($log->data) !!}')"
                                        class="text-sm font-black uppercase tracking-widest text-red-600 hover:text-black transition-colors cursor-pointer underline underline-offset-4">
                                    View Data
                                </button>
                            @else
                                <span class="text-sm text-gray-300 uppercase font-bold tracking-widest">Empty</span>
                            @endif
                        </td>

                        <td class="p-6 text-right">
                            <div class="flex flex-col items-end">
                                <span class="text-gray-900 font-bold text-sm uppercase">{{ $log->created_at->format('d. M. Y.') }}</span>
                                <span class="text-gray-400 font-mono text-xs">{{ $log->created_at->format('H:i:s') }}</span>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-12 text-center text-gray-400 font-black uppercase tracking-widest">No activity logs found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="py-4">
            {{ $logs->links() }}
        </div>
    </div>
@endsection
