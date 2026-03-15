@extends('layouts.admin')

@section('content')
    <div class="space-y-8">
        {{-- Header --}}
        <div>
            <h1 class="text-3xl font-black text-gray-900 uppercase tracking-tighter">Dashboard</h1>
            <p class="text-gray-500 font-bold uppercase tracking-widest text-xs mt-1">System Overview & Recent Activity</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="bg-white p-6 border border-gray-200 shadow-sm rounded-sm">
                <p class="text-gray-500 font-bold uppercase tracking-widest text-xs">Total Messages</p>
                <h2 class="text-4xl font-black mt-2 text-gray-900">{{ $total_messages }}</h2>
                <p class="text-gray-500 text-xs font-bold mt-2">
                    <span class="text-green-600">{{ $last_7_days_messages }}</span> new in last 7 days
                </p>
                @if($percentage > 0)
                    <p class="text-green-600 text-[10px] font-bold uppercase mt-1 tracking-wider">+{{ number_format($percentage, 1) }}% increase</p>
                @endif
            </div>

            <div class="bg-white p-6 border border-gray-200 shadow-sm rounded-sm">
                <p class="text-gray-500 font-bold uppercase tracking-widest text-xs">Unanswered</p>
                <h2 class="text-4xl font-black mt-2 text-red-600">{{ $unanswered_count }}</h2>
                <p class="text-red-500 text-xs font-bold mt-2">Action required</p>
            </div>

            <div class="bg-white p-6 border border-gray-200 shadow-sm rounded-sm">
                <p class="text-gray-500 font-bold uppercase tracking-widest text-xs">Active Users</p>
                <h2 class="text-4xl font-black mt-2 text-gray-900">{{ $registred_users_count }}</h2>
                <p class="text-gray-500 text-xs font-bold mt-2">
                    <span class="text-blue-600">{{ $last_7_days_users }}</span> new in last 7 days
                </p>
            </div>

            <div class="bg-white p-6 border border-gray-200 shadow-sm rounded-sm">
                <p class="text-gray-500 font-bold uppercase tracking-widest text-xs">System Status</p>
                <h2 class="text-4xl font-black mt-2 text-green-600">ONLINE</h2>
                <p class="text-gray-500 text-xs font-bold mt-2">All systems operational</p>
            </div>
        </div>

        <div class="bg-white border border-gray-200 shadow-sm rounded-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h3 class="font-black uppercase tracking-tight text-gray-800">Recent Inquiries</h3>
            </div>
            <div class="p-6">

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                        <tr class="border-b border-gray-200">
                            <th class="py-3 px-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Sender</th>
                            <th class="py-3 px-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Message</th>
                            <th class="py-3 px-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Status</th>
                            <th class="py-3 px-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">

                        @foreach($recent_messages as $m)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-4 px-4 text-sm font-bold text-gray-900">{{ $m->user?->email ?? $m->email }}</td>
                                <td class="py-4 px-4 text-sm text-gray-500 truncate max-w-xs">{{ Str::words($m->message,12) }}</td>
                                @if($m->is_answered)
                                    <td class="py-4 px-4">
                                        <span class="px-2 py-1 bg-green-50 text-green-600 text-[10px] font-black uppercase rounded-full">Resolved</span>
                                    </td>
                                @else
                                    <td class="py-4 px-4">
                                        <span class="px-2 py-1 bg-red-50 text-red-600 text-[10px] font-black uppercase rounded-full">Unanswered</span>
                                    </td>
                                @endif
                                <td class="py-4 px-4 text-right">
                                    <a href="{{ route('admin.messages.show', $m->id) }}" class="text-blue-600 hover:text-blue-800 font-bold text-xs uppercase">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="mt-6 text-center">
                        <a href="{{ route('admin.messages.index') }}" class="text-[12px] font-black uppercase tracking-widest text-gray-400 hover:text-gray-900 transition-colors">
                            View All Inquiries &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
