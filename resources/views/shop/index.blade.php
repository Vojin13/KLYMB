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
                <form action="{{ route('products.index') }}" method="GET" id="filter-form">
                    <div class="lg:grid lg:grid-cols-4 lg:gap-8">
                        <aside class="hidden lg:block">
                            <div class="space-y-8">
                                <div>
                                    <h3 class="text-sm font-bold uppercase tracking-wider text-black mb-4">Categories</h3>
                                    <div class="space-y-2">
                                        @foreach($categories as $category)
                                            <div class="flex items-center">
                                                <input type="checkbox" name="categories[]" value="{{ $category->slug }}"
                                                       id="cat-{{ $category->slug }}"
                                                       {{ is_array(request('categories')) && in_array($category->slug, request('categories')) ? 'checked' : '' }}
                                                       class="h-4 w-4 rounded border-gray-300 text-red-600 focus:ring-red-500">
                                                <label for="cat-{{ $category->slug }}" class="ml-3 text-sm font-medium text-gray-600 hover:text-black cursor-pointer">{{ $category->name }}</label>
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
                                                <input type="checkbox" name="brands[]" value="{{ $brand->slug }}"
                                                       id="brand-{{ $brand->slug }}"
                                                       {{ is_array(request('brands')) && in_array($brand->slug, request('brands')) ? 'checked' : '' }}
                                                       class="h-4 w-4 rounded border-gray-300 text-red-600 focus:ring-red-500">
                                                <label for="brand-{{ $brand->slug }}" class="ml-3 text-sm font-medium text-gray-600 hover:text-black cursor-pointer">{{ $brand->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <hr class="border-gray-200">

                                <div>
                                    <h3 class="text-sm font-bold uppercase tracking-wider text-black mb-4">Price Range</h3>
                                    <div class="flex items-center gap-2">
                                        <input type="number" name="price_min" value="{{ request('price_min') }}" placeholder="Min" class="w-full rounded-lg border border-gray-300 p-2 text-sm focus:border-red-500 focus:ring-red-500">
                                        <span class="text-gray-400">-</span>
                                        <input type="number" name="price_max" value="{{ request('price_max') }}" placeholder="Max" class="w-full rounded-lg border border-gray-300 p-2 text-sm focus:border-red-500 focus:ring-red-500">
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <button type="submit" class="w-full rounded-lg bg-[#1A252F] py-3 text-sm font-bold uppercase text-white hover:bg-black transition cursor-pointer">
                                        Apply Filters
                                    </button>
                                    <a href="{{ route('products.index') }}" class="block w-full text-center rounded-lg bg-gray-100 py-3 text-xs font-bold uppercase text-gray-500 hover:bg-gray-200 transition">
                                        Clear All
                                    </a>
                                </div>
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
                                    <input type="text" name="search" value="{{ request('search') }}"
                                           placeholder="SEARCH FOR GEAR..."
                                           class="w-full bg-white border border-gray-300 rounded-lg p-2.5 pl-10 text-sm focus:border-red-500 focus:ring-1 focus:ring-red-500 outline-none font-bold tracking-tight transition-all">
                                </div>

                                <div class="flex items-center gap-3 w-full md:w-auto shrink-0">
                                    <select name="sort" onchange="this.form.submit()" class="w-full md:w-auto rounded-lg border-gray-300 py-2.5 pl-3 pr-10 text-sm focus:border-red-500 focus:ring-red-500 font-bold uppercase cursor-pointer">
                                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                                        <option value="low-to-high" {{ request('sort') == 'low-to-high' ? 'selected' : '' }}>Price: Low to High</option>
                                        <option value="high-to-low" {{ request('sort') == 'high-to-low' ? 'selected' : '' }}>Price: High to Low</option>
                                        <option value="name-asc" {{ request('sort') == 'name-asc' ? 'selected' : '' }}>Name: Ascending</option>
                                        <option value="name-desc" {{ request('sort') == 'name-desc' ? 'selected' : '' }}>Name: Descending</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                                @forelse($products as $p)
                                    <x-product-card
                                        :id="$p->id"
                                        :image="asset('storage/' . $p->primaryImage->path)"
                                        :name="$p->name"
                                        :price="$p->price->price"
                                        :badge="$p->badge"
                                        :brand="$p->brand->name"
                                        :category="$p->category->name"
                                        :url="route('products.show',$p)"
                                    />
                                @empty
                                    <div class="col-span-full py-12 text-center">
                                        <p class="text-gray-400 font-bold uppercase tracking-widest">No gear found matching your filters.</p>
                                    </div>
                                @endforelse
                            </div>

                            <div class="mt-8">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection
