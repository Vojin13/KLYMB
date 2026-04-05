@extends('layouts.app')

@section('title', 'My Orders | KLYMB')

@section('content')
    <div class="fixed top-24 right-6 z-[100] space-y-3 min-w-[300px] pointer-events-none">
        @if(session('success'))
            <div class="pointer-events-auto bg-black text-white p-5 border-l-8 border-green-500 shadow-2xl flex justify-between items-center animate-slide-in">
                <span class="font-black tracking-widest text-[10px] uppercase">{{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" class="ml-4 font-black text-xs hover:text-red-600 transition-colors uppercase">X</button>
            </div>
        @endif
    </div>

    <main class="bg-gray-50 antialiased min-h-screen pb-24 text-gray-900">
        <section class="relative bg-white border-b border-gray-100 py-16 overflow-hidden">
            <div class="max-w-screen-xl mx-auto px-4 text-center relative z-10">
                <h1 class="text-7xl md:text-9xl font-black uppercase tracking-tighter text-black opacity-[0.03] absolute left-0 right-0 -top-6 md:-top-10 pointer-events-none select-none">
                    History
                </h1>
                <h2 class="text-4xl md:text-6xl font-black uppercase tracking-tight text-black">
                    My <span class="text-red-600">Orders</span>
                </h2>
                <div class="mt-4 flex justify-center items-center gap-4">
                    <span class="h-[1px] w-8 bg-red-600"></span>
                    <p class="text-xs font-bold uppercase tracking-[0.4em] text-gray-400">Track your gear history</p>
                    <span class="h-[1px] w-8 bg-red-600"></span>
                </div>
            </div>
        </section>

        <section class="py-12">
            <div class="mx-auto max-w-screen-xl px-4">
                @if($orders->isEmpty())
                    <div class="text-center py-20 bg-white rounded-2xl shadow-sm border border-gray-100">
                        <svg class="mx-auto h-20 w-20 text-gray-100 mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        <h3 class="text-2xl font-black uppercase tracking-tight text-black">No orders yet</h3>
                        <p class="text-gray-500 mt-2 mb-8 uppercase text-[10px] font-bold tracking-widest">You haven't placed any orders in the past.</p>
                        <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center px-8 py-4 text-sm font-black uppercase tracking-widest text-white bg-black hover:bg-red-600 transition-all duration-300 rounded-lg">
                            Start Shopping
                        </a>
                    </div>
                @else
                    <div class="space-y-6">
                        @foreach($orders as $order)
                            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:border-black transition-all duration-300 shadow-sm hover:shadow-xl">
                                <div class="bg-gray-50/50 p-6 border-b border-gray-100 flex flex-wrap items-center justify-between gap-4">
                                    <div class="flex items-center gap-8">
                                        <div>
                                            <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-1">Order Number</p>
                                            <p class="font-black text-sm uppercase tracking-tight text-black">#{{ $order->id }}</p>
                                        </div>
                                        <div>
                                            <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-1">Date Placed</p>
                                            <p class="font-black text-sm uppercase tracking-tight text-black">{{ $order->created_at->format('d M, Y') }}</p>
                                        </div>
                                        <div>
                                            <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-1">Status</p>
                                            @php
                                                $statusColors = [
                                                    'pending' => 'text-yellow-600',
                                                    'completed' => 'text-green-600',
                                                    'cancelled' => 'text-red-600',
                                                    'shipped' => 'text-blue-600',
                                                ];
                                                $color = $statusColors[$order->status] ?? 'text-gray-600';
                                            @endphp
                                            <p class="font-black text-sm uppercase tracking-widest {{ $color }}">{{ $order->status }}</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-1">Total Amount</p>
                                        <p class="font-black text-xl text-red-600 uppercase">€{{ number_format($order->total_price, 2) }}</p>
                                    </div>
                                </div>

                                <div class="p-6">
                                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                                        <div class="flex -space-x-4 overflow-hidden">
                                            @foreach($order->items->take(4) as $item)
                                                <div class="inline-block h-16 w-16 rounded-lg border-2 border-white bg-white shadow-sm overflow-hidden bg-gray-50">
                                                    <img src="{{ asset('storage/' . $item->product->primaryImage->path) }}"
                                                         alt="{{ $item->product->name }}"
                                                         class="h-full w-full object-contain p-1">
                                                </div>
                                            @endforeach
                                            @if($order->items->count() > 4)
                                                <div class="flex items-center justify-center h-16 w-16 rounded-lg border-2 border-white bg-black text-white text-[10px] font-black uppercase">
                                                    +{{ $order->items->count() - 4 }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="flex gap-3 w-full md:w-auto">
                                            <a href="{{ route('orders.show', $order) }}" class="flex-1 md:flex-none text-center px-6 py-3 text-[10px] font-black uppercase tracking-widest text-black border-2 border-black hover:bg-black hover:text-white transition-all duration-300 rounded-lg">
                                                View Details
                                            </a>
                                        </div>
                                    </div>

                                    <div class="mt-6 pt-6 border-t border-gray-50">
                                        <p class="text-[9px] font-bold text-gray-400 uppercase tracking-[0.2em]">
                                            Included in this order:
                                            <span class="text-gray-600">
                                                {{ $order->items->map(fn($i) => $i->product->name)->join(', ') }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    </main>
@endsection
