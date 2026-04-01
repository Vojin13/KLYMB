@extends('layouts.admin')

@section('title', 'Log Details | KLYMB')

@section('content')
    <div class="space-y-8">
        <div class="flex justify-between items-center border-b border-gray-200 pb-6">
            <div>
                <h1 class="text-3xl font-black uppercase tracking-tighter text-gray-900">
                    Log <span class="text-red-600">Details</span>
                </h1>
                <p class="text-gray-500 font-bold uppercase tracking-widest text-xs mt-1">ID: #{{ $log->id }}</p>
            </div>
            <a href="{{ route('admin.logs.index') }}"
               class="bg-black text-white px-6 py-2 text-xs font-black uppercase tracking-widest hover:bg-red-600 transition-colors rounded-sm">
                Back to logs
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white border border-gray-200 p-6 shadow-sm">
                    <h3 class="text-xs font-black uppercase tracking-widest text-gray-400 mb-4 border-b pb-2">Request Info</h3>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-[10px] font-black uppercase text-gray-400">User</label>
                            <p class="text-sm font-bold text-gray-900">{{ $log->user->email ?? 'Guest User' }}</p>
                        </div>

                        <div>
                            <label class="block text-[10px] font-black uppercase text-gray-400">Method</label>
                            @php
                                $methodColor = match($log->method) {
                                    'POST'   => ['bg' => '#dcfce7', 'text' => '#15803d'],
                                    'DELETE' => ['bg' => '#fee2e2', 'text' => '#b91c1c'],
                                    'PUT', 'PATCH' => ['bg' => '#dbeafe', 'text' => '#1d4ed8'],
                                    default  => ['bg' => '#f3f4f6', 'text' => '#374151']
                                };
                            @endphp
                            <span class="inline-block mt-1 rounded px-2 py-1 text-[10px] font-black uppercase tracking-widest border border-black/5"
                                  style="background-color: {{ $methodColor['bg'] }}; color: {{ $methodColor['text'] }};">
                            {{ $log->method }}
                        </span>
                        </div>

                        <div>
                            <label class="block text-[10px] font-black uppercase text-gray-400">Route</label>
                            <p class="text-sm font-mono text-red-600 break-all">{{ $log->route }}</p>
                        </div>

                        <div>
                            <label class="block text-[10px] font-black uppercase text-gray-400">Timestamp</label>
                            <p class="text-sm font-bold text-gray-900 uppercase">
                                {{ $log->created_at->format('d. M Y. — H:i:s') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-6">

                <div class="bg-white border border-gray-200 shadow-sm overflow-hidden">
                    <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                        <h3 class="text-xs font-black uppercase tracking-widest text-gray-900">Query Parameters</h3>
                    </div>
                    <div class="p-6 overflow-x-auto">
                        @if($log->queryString)
                            <pre class="text-xs font-mono text-blue-600 bg-blue-50 p-4 rounded border border-blue-100">{{ $log->queryString }}</pre>
                        @else
                            <p class="text-xs font-bold uppercase tracking-widest text-gray-300 italic">No query parameters</p>
                        @endif
                    </div>
                </div>

                <div class="bg-white border border-gray-200 shadow-sm overflow-hidden">
                    <div class="bg-gray-50 px-6 py-3 border-b border-gray-200 flex justify-between items-center">
                        <h3 class="text-xs font-black uppercase tracking-widest text-gray-900">Payload (Data)</h3>
                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-tighter">JSON Format</span>
                    </div>
                    <div class="p-6 bg-[#1a1a1a] overflow-x-auto">
                        @if($log->data && $log->data !== '[]')
                            <pre class="text-sm font-mono text-green-400 leading-relaxed">{{ json_encode(json_decode($log->data), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>
                        @else
                            <p class="text-xs font-bold uppercase tracking-widest text-gray-500 italic">Empty payload</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
