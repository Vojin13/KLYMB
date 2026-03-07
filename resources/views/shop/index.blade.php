@extends('layouts.app')

@section('title','Shop | KLYMB')

@section('content')
<main class="bg-gray-50 antialiased min-h-screen">

    <section class="relative bg-white border-b border-gray-100 py-24 overflow-hidden">
        <div class="max-w-screen-xl mx-auto px-4 text-center relative z-10">
            <h1 class="text-7xl md:text-9xl font-black uppercase tracking-tighter text-black opacity-[0.03] absolute left-0 right-0 -top-10 md:-top-16 pointer-events-none select-none">
                Pro Gear
            </h1>

            <h2 class="text-5xl md:text-7xl font-black uppercase tracking-tight text-black">
                KLYMB <span class="text-red-600">Shop</span>
            </h2>

            <div class="mt-6 flex justify-center items-center gap-4">
                <span class="h-[1px] w-12 bg-red-600"></span>
                <p class="text-sm font-bold uppercase tracking-[0.4em] text-gray-400">Precision Engineered</p>
                <span class="h-[1px] w-12 bg-red-600"></span>
            </div>
        </div>
    </section>

        <section class="py-8 md:py-12">
            <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                <div class="lg:grid lg:grid-cols-4 lg:gap-8">

                    <aside class="hidden lg:block">
                        <div class="space-y-8">
                            <div>
                                <h3 class="text-sm font-bold uppercase tracking-wider text-black mb-4">Categories</h3>
                                <div class="space-y-2">
                                    @foreach(['Climbing Shoes', 'Chalk & Bags', 'Harnesses', 'Ropes', 'Carabiners', 'Apparel'] as $cat)
                                        <div class="flex items-center">
                                            <input type="checkbox" id="{{ Str::slug($cat) }}" class="h-4 w-4 rounded border-gray-300 text-red-600 focus:ring-red-500">
                                            <label for="{{ Str::slug($cat) }}" class="ml-3 text-sm font-medium text-gray-600 hover:text-black cursor-pointer">{{ $cat }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <hr class="border-gray-200">

                            <div>
                                <h3 class="text-sm font-bold uppercase tracking-wider text-black mb-4">Brands</h3>
                                <div class="space-y-2">
                                    @foreach(['La Sportiva', 'Black Diamond', 'Petzl', 'Scarpa', 'Mammut'] as $brand)
                                        <div class="flex items-center">
                                            <input type="checkbox" id="{{ Str::slug($brand) }}" class="h-4 w-4 rounded border-gray-300 text-red-600 focus:ring-red-500">
                                            <label for="{{ Str::slug($brand) }}" class="ml-3 text-sm font-medium text-gray-600 hover:text-black cursor-pointer">{{ $brand }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <hr class="border-gray-200">

                            <div>
                                <h3 class="text-sm font-bold uppercase tracking-wider text-black mb-4">Price Range</h3>
                                <div class="flex items-center gap-2">
                                    <input type="number" placeholder="Min" class="w-full rounded-lg border border-gray-300 p-2 text-sm focus:border-red-500 focus:ring-red-500">
                                    <span class="text-gray-400">-</span>
                                    <input type="number" placeholder="Max" class="w-full rounded-lg border border-gray-300 p-2 text-sm focus:border-red-500 focus:ring-red-500">
                                </div>
                            </div>

                            <button class="w-full rounded-lg bg-[#1A252F] py-3 text-sm font-bold uppercase text-white hover:bg-black transition">
                                Apply Filters
                            </button>
                        </div>
                    </aside>

                    <div class="lg:col-span-3">

                        <div class="mb-6 flex items-center justify-between border-b border-gray-200 pb-6">
                            <p class="text-sm font-medium text-gray-500 italic">Showing 1-12 of 48 products</p>

                            <div class="flex items-center gap-4">
                                <select class="rounded-lg border-gray-300 py-2 pl-3 pr-10 text-sm focus:border-red-500 focus:ring-red-500 font-bold uppercase">
                                    <option>Sort by: Newest</option>
                                    <option>Price: Low to High</option>
                                    <option>Price: High to Low</option>
                                    <option>Best Selling</option>
                                </select>

                                <button type="button" class="inline-flex items-center rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 lg:hidden">
                                    <svg class="mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd"></path></svg>
                                    Filters
                                </button>
                            </div>
                        </div>

                        <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                            @foreach($products as $p)
                                <x-product-card
                                    :id="$p['id']"
                                    :image="$p['image']"
                                    :name="$p['name']"
                                    :price="$p['price']"
                                    :badge="$p['badge']"
                                    :url="$p['url']"
                                />
                            @endforeach
                        </div>

                        <div class="mt-12 flex justify-center">
                            <nav class="inline-flex -space-x-px rounded-md shadow-sm">
                                <a href="#" class="inline-flex items-center rounded-l-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50">Previous</a>
                                <a href="#" class="inline-flex items-center border border-gray-300 bg-red-600 px-4 py-2 text-sm font-medium text-white">1</a>
                                <a href="#" class="inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50">2</a>
                                <a href="#" class="inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50">3</a>
                                <a href="#" class="inline-flex items-center rounded-r-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50">Next</a>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>

@endsection
