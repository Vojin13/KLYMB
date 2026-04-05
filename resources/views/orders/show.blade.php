@extends('layouts.app')

@section('title', 'Order Details #' . $order->id . ' | KLYMB')

@section('content')
    <main class="bg-gray-50 antialiased min-h-screen pb-24 text-gray-900 uppercase">
        <section class="relative bg-white border-b border-gray-100 py-12 overflow-hidden">
            <div class="max-w-screen-xl mx-auto px-4 relative z-10">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                    <div>
                        <a href="{{ route('orders.index') }}" class="inline-flex items-center gap-2 text-[10px] font-black tracking-widest text-gray-400 hover:text-red-600 transition-colors mb-6">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7" /></svg>
                            Back to My Orders
                        </a>
                        <h1 class="text-4xl md:text-6xl font-black tracking-tighter text-black">
                            Order <span class="text-red-600">#{{ $order->id }}</span>
                        </h1>
                        <p class="mt-2 text-xs font-bold tracking-[1px] text-gray-400">
                            Placed on {{ $order->created_at->format('d.m.Y. \a\t H:i') }}
                        </p>
                    </div>

                    @php
                        $statusClasses = [
                            'pending' => 'bg-yellow-100 text-yellow-700 border-yellow-200',
                            'completed' => 'bg-green-100 text-green-700 border-green-200',
                            'cancelled' => 'bg-red-100 text-red-700 border-red-200',
                            'shipped' => 'bg-blue-100 text-blue-700 border-blue-200',
                        ];
                        $class = $statusClasses[$order->status] ?? 'bg-gray-100 text-gray-700 border-gray-200';
                    @endphp
                    <div class="inline-block px-6 py-2 text-[10px] font-black tracking-[1px] border-2 {{ $class }} rounded-full text-center">
                        Status: {{ $order->status }}
                    </div>
                </div>
            </div>
        </section>

        <section class="py-12">
            <div class="max-w-screen-xl mx-auto px-4">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <div class="lg:col-span-2 space-y-8">
                        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
                            <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                                <h3 class="font-black tracking-widest text-xs">Items in this shipment</h3>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left">
                                    <thead>
                                    <tr class="text-gray-400 text-[10px] font-black tracking-[0.2em] border-b border-gray-100">
                                        <th class="p-6">Gear</th>
                                        <th class="p-6 text-center">Quantity</th>
                                        <th class="p-6 text-right">Unit Price</th>
                                        <th class="p-6 text-right">Subtotal</th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                    @foreach($order->items as $item)
                                        <tr class="hover:bg-gray-50/50 transition-colors">
                                            <td class="p-6">
                                                <div class="flex items-center gap-4">
                                                    <div class="w-20 h-20 bg-white border border-gray-100 rounded-lg shrink-0 overflow-hidden">
                                                        <img src="{{ asset('storage/' . $item->product->primaryImage->path) }}"
                                                             class="w-full h-full object-contain p-2">
                                                    </div>
                                                    <div>
                                                        <p class="font-black tracking-tight text-sm">{{ $item->product->name }}</p>
                                                        <p class="text-red-600 text-[10px] font-black tracking-widest">{{ $item->product->brand->name }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-6 text-center font-bold text-gray-500">
                                                x{{ $item->quantity }}
                                            </td>
                                            <td class="p-6 text-right font-bold text-sm">
                                                €{{ number_format($item->price, 2) }}
                                            </td>
                                            <td class="p-6 text-right font-black text-sm">
                                                €{{ number_format($item->price * $item->quantity, 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-white border border-gray-200 p-8 rounded-xl shadow-sm">
                                <h3 class="font-black tracking-widest text-[10px] text-red-600 mb-4">Shipping Address</h3>
                                <div class="text-sm font-bold text-gray-600 leading-relaxed tracking-tight">
                                    <p class="text-black font-black text-base mb-2">{{ $order->user->first_name }} {{ $order->user->last_name }}</p>
                                    <p>{{ $order->address }}</p>
                                    <p>{{ $order->city }}</p>
                                    <p class="mt-4 flex items-center gap-2">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                                        {{ $order->phone }}
                                    </p>
                                </div>
                            </div>

                            <div class="bg-white border border-gray-200 p-8 rounded-xl shadow-sm">
                                <h3 class="font-black tracking-widest text-[10px] text-red-600 mb-4">Billing Method</h3>
                                <div class="text-sm font-bold text-gray-600 leading-relaxed tracking-tight">
                                    <p>Payment on Delivery</p>
                                    <p class="text-[10px] text-gray-400 mt-1">Standard courier service</p>
                                    <div class="mt-6 p-4 bg-gray-50 rounded-lg border border-gray-100">
                                        <p class="text-[9px] font-black text-gray-400 tracking-widest">Support</p>
                                        <p class="text-[10px] font-bold text-black mt-1">support@klymb.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-[#1A252F] rounded-2xl p-8 text-white shadow-xl">
                            <h3 class="text-xl font-black tracking-widest mb-8 border-b border-white/10 pb-4 text-red-600">Financial Summary</h3>
                            <div class="space-y-4">
                                <div class="flex justify-between text-gray-400 text-xs font-bold">
                                    <span>Subtotal</span>
                                    <span class="text-white">€{{ number_format($order->total_price, 2) }}</span>
                                </div>
                                <div class="flex justify-between text-gray-400 text-xs font-bold">
                                    <span>Shipping</span>
                                    <span class="text-green-500">FREE</span>
                                </div>
                                <hr class="border-white/10 my-6">
                                <div class="flex justify-between items-end">
                                    <span class="text-xs font-black tracking-widest text-gray-400">Total Paid</span>
                                    <span class="text-3xl font-black text-white leading-none">€{{ number_format($order->total_price, 2) }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                            <h4 class="text-[10px] font-black tracking-widest text-black mb-4">KLYMB Policy</h4>
                            <p class="text-[10px] text-gray-500 leading-relaxed font-bold tracking-tight">
                                This order is covered by our 30-day return policy. Keep the original packaging and tags for valid returns.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
