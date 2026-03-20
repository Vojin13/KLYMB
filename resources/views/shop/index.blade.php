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
                                    @foreach($categories as $category)
                                        <div class="flex items-center">
                                            <input type="checkbox" id="{{ $category->slug }}" class="h-4 w-4 rounded border-gray-300 text-red-600 focus:ring-red-500">
                                            <label for="{{ $category->slug }}" class="ml-3 text-sm font-medium text-gray-600 hover:text-black cursor-pointer">{{ $category->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <hr class="border-gray-200">

                            <div>
                                <h3 class="text-sm font-bold uppercase tracking-wider text-black mb-4">Brands</h3>
                                <div class="space-y-2">
                                    @foreach($brands as $brand)
                                        <div class="flex items-center">
                                            <input type="checkbox" id="{{ $brand->slug }}" class="h-4 w-4 rounded border-gray-300 text-red-600 focus:ring-red-500">
                                            <label for="{{ $brand->slug }}" class="ml-3 text-sm font-medium text-gray-600 hover:text-black cursor-pointer">{{ $brand->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <hr class="border-gray-200">

                            <div>
                                <h3 class="text-sm font-bold uppercase tracking-wider text-black mb-4">Price Range</h3>
                                <div class="flex items-center gap-2">
                                    <input type="number" id="price-min" name="price-min" placeholder="Min" class="w-full rounded-lg border border-gray-300 p-2 text-sm focus:border-red-500 focus:ring-red-500">
                                    <span class="text-gray-400">-</span>
                                    <input type="number" name="price-max" id="price-max" placeholder="Max" class="w-full rounded-lg border border-gray-300 p-2 text-sm focus:border-red-500 focus:ring-red-500">
                                </div>
                            </div>

                            <button class="w-full rounded-lg bg-[#1A252F] py-3 text-sm font-bold uppercase text-white hover:bg-black transition cursor-pointer">
                                Apply Filters
                            </button>
                        </div>
                    </aside>

                    <div class="lg:col-span-3">

                        <div class="mb-8 flex flex-col md:flex-row items-center gap-4 border-b border-gray-200 pb-6">

                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <input type="text"
                                       placeholder="SEARCH FOR GEAR..."
                                       class="w-full bg-white border border-gray-300 rounded-lg p-2.5 pl-10 text-sm focus:border-red-500 focus:ring-1 focus:ring-red-500 outline-none font-bold tracking-tight transition-all">
                            </div>

                            <div class="flex items-center gap-3 w-full md:w-auto shrink-0">
                                <select class="w-full md:w-auto rounded-lg border-gray-300 py-2.5 pl-3 pr-10 text-sm focus:border-red-500 focus:ring-red-500 font-bold uppercase cursor-pointer">
                                    <option value="newest">Newest</option>
                                    <option value="low-to-high">Price: Low to High</option>
                                    <option value="high-to-low">Price: High to Low</option>
                                    <option value="name-asc">Name: Ascending</option>
                                    <option value="name-desc">Name: Descending</option>
                                    <option value="brand-asc">Brand: Ascending</option>
                                    <option value="brand-desc">Brand: Descending</option>
                                </select>

                                <button type="button" class="inline-flex items-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-bold uppercase text-gray-900 hover:bg-gray-100 lg:hidden shrink-0">
                                    <svg class="mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd"></path></svg>
                                    Filters
                                </button>
                            </div>
                        </div>

                        <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                            @foreach($products as $p)
                                <x-product-card
                                    :id="$p->id"
                                    :image="asset('assets/img/'.$p->primaryImage->path)"
                                    :name="$p->name"
                                    :price="$p->price->price"
                                    :badge="$p->badge->name"
                                    :url="route('products.show',$p)"
                                />
                            @endforeach
                        </div>

                        {{ $products->links() }}
                    </div>

                </div>
            </div>
        </section>
    </main>

@endsection
