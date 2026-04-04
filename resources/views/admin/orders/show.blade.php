@extends('layouts.admin')

@section('content')
    <div class="space-y-8 pb-24 text-gray-900 uppercase">
        <div class="flex justify-between items-start">
            <div>
                <div class="flex items-center gap-4 mb-2">
                    <h1 class="text-4xl font-black tracking-tighter">
                        Order #{{ $order->id }}
                    </h1>
                    @php
                        $statusClasses = [
                            'pending' => 'bg-yellow-100 text-yellow-700 border-yellow-200',
                            'completed' => 'bg-green-100 text-green-700 border-green-200',
                            'cancelled' => 'bg-red-100 text-red-700 border-red-200',
                            'shipped' => 'bg-blue-100 text-blue-700 border-blue-200',
                        ];
                        $class = $statusClasses[$order->status] ?? 'bg-gray-100 text-gray-700 border-gray-200';
                    @endphp
                    <span class="px-4 py-1 text-[10px] font-black tracking-widest border {{ $class }} rounded-full">
                        {{ $order->status }}
                    </span>
                </div>
                <p class="text-gray-500 font-bold tracking-widest text-xs">
                    Placed on {{ $order->created_at->format('d.m.Y. H:i') }}
                </p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('admin.orders.index') }}" class="bg-white border-2 border-black text-black px-6 py-3 font-black tracking-widest hover:bg-black hover:text-white transition text-xs text-center min-w-[120px]">
                    Back
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="p-4 text-sm text-green-800 bg-green-50 border border-green-200 font-bold tracking-tight">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white border border-gray-200 shadow-sm overflow-hidden rounded-sm">
                    <div class="p-6 border-b border-gray-100 bg-gray-50">
                        <h3 class="font-black tracking-widest text-sm">Items Ordered</h3>
                    </div>
                    <table class="w-full text-left">
                        <thead>
                        <tr class="text-gray-400 text-[10px] font-black tracking-[0.2em] border-b border-gray-100">
                            <th class="p-6">Product</th>
                            <th class="p-6 text-center">Qty</th>
                            <th class="p-6 text-right">Price</th>
                            <th class="p-6 text-right">Subtotal</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                        @foreach($order->items as $item)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-16 h-16 bg-gray-100 border border-gray-200 flex-shrink-0">
                                            <img src="{{ asset('storage/' . $item->product->primaryImage->path) }}" class="w-full h-full object-contain p-1">
                                        </div>
                                        <div>
                                            <p class="font-black tracking-tight">{{ $item->product->name }}</p>
                                            <p class="text-red-600 text-[10px] font-black tracking-widest">{{ $item->product->brand->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-6 text-center font-bold text-gray-600">
                                    x{{ $item->quantity }}
                                </td>
                                <td class="p-6 text-right font-bold">
                                    €{{ number_format($item->price, 2) }}
                                </td>
                                <td class="p-6 text-right font-black">
                                    €{{ number_format($item->price * $item->quantity, 2) }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="bg-white border border-gray-200 p-8 rounded-sm">
                    <h3 class="font-black tracking-widest text-sm mb-4">Contact Info:</h3>
                    <div class="text-base font-medium text-gray-600 leading-relaxed tracking-tighter">
                        <p class="text-black">Customer name: {{ $order->user->first_name }} {{ $order->user->last_name }}</p>
                        Address: {{ $order->address }} | City:
                        {{ $order->city }} <br>
                        Phone: {{ $order->phone }}<br>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white border border-gray-200 p-8 rounded-sm">
                    <h3 class="font-black tracking-widest mb-6 border-b border-gray-100 pb-4">Customer Info</h3>
                    <div class="space-y-4">
                        <div>
                            <p class="text-[10px] font-black tracking-widest text-gray-400 mb-1">User Account</p>
                            <p class="font-bold tracking-tight">{{ $order->user->username }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-black tracking-widest text-gray-400 mb-1">Email Address</p>
                            <p class="font-bold text-blue-500 italic tracking-normal lowercase">{{ $order->user->email }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-black text-white p-8 rounded-sm">
                    <h3 class="font-black tracking-widest text-sm mb-6 border-b border-white/10 pb-4 text-red-600">Financial Summary</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between text-xs font-bold tracking-widest text-gray-400">
                            <span>Subtotal</span>
                            <span class="text-white">€{{ number_format($order->total_price, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-xs font-bold tracking-widest text-gray-400">
                            <span>Shipping</span>
                            <span class="text-green-500">FREE</span>
                        </div>
                        <div class="pt-6 border-t border-white/10 flex justify-between items-end">
                            <span class="text-xs font-black tracking-[0.2em]">Total Amount</span>
                            <span class="text-3xl font-black text-white leading-none">€{{ number_format($order->total_price, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
