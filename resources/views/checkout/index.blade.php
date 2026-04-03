@extends('layouts.app')

@section('title', 'Checkout | KLYMB')

@section('content')
    <main class="bg-gray-50 min-h-screen py-12">
        <div class="max-w-screen-xl mx-auto px-4">
            <form action="{{ route('checkout.store') }}" method="POST">
                @if ($errors->any())
                    <div class="p-4 bg-red-50 border-2 border-red-600">
                        <ul class="text-red-600 text-xs font-black uppercase tracking-widest">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @csrf
                <div class="lg:grid lg:grid-cols-12 lg:gap-12">

                    <div class="lg:col-span-7">
                        <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm">
                            <h2 class="text-2xl font-black uppercase tracking-tight mb-8">Shipping <span class="text-red-600">Details</span></h2>

                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Street Address</label>
                                    <input type="text" name="address" required
                                           class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-red-600 outline-none transition"
                                           placeholder="e.g. Bulevar Kralja Aleksandra 123">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">City</label>
                                        <input type="text" name="city" required
                                               class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-red-600 outline-none transition"
                                               placeholder="e.g. Belgrade">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Phone</label>
                                        <input type="text" name="phone" required
                                               class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-red-600 outline-none transition"
                                               placeholder="+381...">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-12 pt-8 border-t border-gray-100">
                                <h3 class="text-sm font-black uppercase tracking-widest mb-4">Payment Method</h3>
                                <div class="p-4 border-2 border-red-600 rounded-xl bg-red-50 flex items-center justify-between">
                                    <span class="font-bold text-gray-900 text-sm italic uppercase tracking-wider">Cash on Delivery</span>
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-5 mt-8 lg:mt-0">
                        <div class="bg-[#1A252F] rounded-2xl p-8 text-white shadow-xl sticky top-8">
                            <h3 class="text-xl font-black uppercase tracking-widest mb-6 border-b border-white/10 pb-4 text-red-600">Your Order</h3>

                            <div class="max-h-64 overflow-y-auto mb-6 pr-2 custom-scrollbar">
                                @foreach($cartItems as $item)
                                    <div class="flex justify-between items-center mb-4">
                                        <div>
                                            <p class="text-sm font-black uppercase tracking-tight">{{ $item->product->name }}</p>
                                            <p class="text-xs text-gray-400 font-bold uppercase tracking-widest">{{ $item->quantity }}x €{{ number_format($item->product->price->price, 2) }}</p>
                                        </div>
                                        <span class="font-black">€{{ number_format($item->product->price->price * $item->quantity, 2) }}</span>
                                    </div>
                                @endforeach
                            </div>

                            <div class="space-y-4 pt-6 border-t border-white/10">
                                <div class="flex justify-between text-gray-400 text-xs font-black uppercase tracking-widest">
                                    <span>Subtotal</span>
                                    <span>€{{ number_format($totalPrice, 2) }}</span>
                                </div>
                                <div class="flex justify-between items-end pt-4">
                                    <span class="text-sm font-black uppercase tracking-[0.2em]">Total Amount</span>
                                    <span class="text-3xl font-black text-red-600">€{{ number_format($totalPrice, 2) }}</span>
                                </div>
                            </div>

                            <input type="hidden" name="total_price" value="{{ $totalPrice }}">

                            <button type="submit" class="cursor-pointer w-full mt-8 bg-red-600 hover:bg-red-700 text-white font-black uppercase tracking-[0.2em] py-5 rounded-xl transition-all shadow-lg shadow-red-600/20 active:scale-[0.98]">
                                Confirm Order
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
