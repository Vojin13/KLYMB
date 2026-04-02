@extends('layouts.app')

@section('title', 'Your Cart | KLYMB')

@section('content')
    <main class="bg-gray-50 antialiased min-h-screen pb-24">
        <section class="relative bg-white border-b border-gray-100 py-16 overflow-hidden">
            <div class="max-w-screen-xl mx-auto px-4 text-center relative z-10">
                <h1 class="text-7xl md:text-9xl font-black uppercase tracking-tighter text-black opacity-[0.03] absolute left-0 right-0 -top-6 md:-top-10 pointer-events-none select-none">
                    Checkout
                </h1>
                <h2 class="text-4xl md:text-6xl font-black uppercase tracking-tight text-black">
                    Your <span class="text-red-600">Cart</span>
                </h2>
                <div class="mt-4 flex justify-center items-center gap-4">
                    <span class="h-[1px] w-8 bg-red-600"></span>
                    <p class="text-xs font-bold uppercase tracking-[0.4em] text-gray-400">Review your gear</p>
                    <span class="h-[1px] w-8 bg-red-600"></span>
                </div>
            </div>
        </section>

        <section class="py-12">
            <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                @if($cartItems->isEmpty())
                    <div class="text-center py-20 bg-white rounded-2xl shadow-sm border border-gray-100">
                        <svg class="mx-auto h-20 w-20 text-gray-200 mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <h3 class="text-2xl font-black uppercase tracking-tight text-black">Your cart is empty</h3>
                        <p class="text-gray-500 mt-2 mb-8">Looks like you haven't added any gear yet.</p>
                        <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center px-8 py-4 text-sm font-black uppercase tracking-widest text-white bg-black hover:bg-red-600 transition-all duration-300 rounded-lg">
                            Return to Shop
                        </a>
                    </div>
                @else
                    <div class="lg:grid lg:grid-cols-12 lg:gap-12">
                        <div class="lg:col-span-8 space-y-4">
                            @foreach($cartItems as $item)
                                <div class="group relative bg-white border border-gray-200 rounded-xl p-4 md:p-6 transition-all hover:border-red-600/30 hover:shadow-md">
                                    <div class="flex items-center gap-6">
                                        <div class="h-24 w-24 md:h-32 md:w-32 shrink-0 overflow-hidden rounded-lg bg-gray-50 border border-gray-100">
                                            <img src="{{ asset('storage/' . $item->product->primaryImage->path) }}"
                                                 alt="{{ $item->product->name }}"
                                                 class="h-full w-full object-contain p-2">
                                        </div>

                                        <div class="flex-1">
                                            <div class="flex flex-col md:flex-row md:items-start justify-between gap-2">
                                                <div>
                                                    <p class="text-[10px] font-black uppercase tracking-widest text-red-600 mb-1">
                                                        {{ $item->product->brand->name }}
                                                    </p>
                                                    <h3 class="text-lg font-black uppercase tracking-tight text-black group-hover:text-red-600 transition-colors">
                                                        {{ $item->product->name }}
                                                    </h3>
                                                </div>
                                                <p class="text-xl font-black text-black">
                                                    €{{ number_format($item->product->price->price * $item->quantity, 2) }}
                                                </p>
                                            </div>

                                            <div class="mt-6 flex items-center justify-between">
                                                <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden">
                                                    <form action="{{ route('cart.update', $item) }}" method="POST" class="inline">
                                                        @csrf @method('PATCH')
                                                        <input type="hidden" name="quantity" value="{{ $item->quantity - 1 }}">
                                                        <button type="submit" {{ $item->quantity <= 1 ? 'disabled' : '' }} class="px-3 py-1 bg-gray-50 hover:bg-gray-100 text-gray-600 transition disabled:opacity-30">-</button>
                                                    </form>

                                                    <span class="px-4 py-1 font-bold text-sm border-x border-gray-200">{{ $item->quantity }}</span>

                                                    <form action="{{ route('cart.update', $item) }}" method="POST" class="inline">
                                                        @csrf @method('PATCH')
                                                        <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}">
                                                        <button type="submit" class="px-3 py-1 bg-gray-50 hover:bg-gray-100 text-gray-600 transition">+</button>
                                                    </form>
                                                </div>

                                                <form action="{{ route('cart.destroy', $item) }}" method="POST">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-red-600 transition flex items-center gap-1">
                                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                                        Remove
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-12 lg:mt-0 lg:col-span-4">
                            <div class="sticky top-8 space-y-6">
                                <div class="bg-[#1A252F] rounded-2xl p-8 text-white shadow-xl">
                                    <h3 class="text-xl font-black uppercase tracking-widest mb-8 border-b border-white/10 pb-4">Order Summary</h3>

                                    <div class="space-y-4">
                                        <div class="flex justify-between text-gray-400 text-sm font-bold uppercase">
                                            <span>Subtotal</span>
                                            <span class="text-white">€{{ number_format($totalPrice, 2) }}</span>
                                        </div>
                                        <div class="flex justify-between text-gray-400 text-sm font-bold uppercase">
                                            <span>Shipping</span>
                                            <span class="text-green-500 uppercase">Free</span>
                                        </div>
                                        <hr class="border-white/10 my-6">
                                        <div class="flex justify-between items-end">
                                            <span class="text-sm font-bold uppercase tracking-widest text-gray-400">Total Amount</span>
                                            <span class="text-3xl font-black text-red-600">€{{ number_format($totalPrice, 2) }}</span>
                                        </div>
                                    </div>

                                    <form action="#" method="POST" class="mt-10">
                                        @csrf
                                        <button type="submit" class="group relative w-full overflow-hidden rounded-lg bg-red-600 py-4 font-black uppercase tracking-[0.2em] text-white transition-all hover:bg-red-700">
                                            <span class="relative z-10">Proceed to Checkout</span>
                                        </button>
                                    </form>

                                    <div class="mt-6 flex items-center justify-center gap-2">
                                        <svg class="h-4 w-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                        <span class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Secure 256-bit SSL Payment</span>
                                    </div>
                                </div>

                                <div class="bg-white border border-gray-200 rounded-2xl p-6">
                                    <h4 class="text-xs font-black uppercase tracking-widest text-black mb-4">KLYMB Support</h4>
                                    <p class="text-xs text-gray-500 leading-relaxed">
                                        Free returns within 30 days. Need help? Contact our pro team at
                                        <span class="text-black font-bold">support@klymb.com</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    </main>
@endsection
