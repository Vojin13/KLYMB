@extends('layouts.app')

@section('title', $product->name . ' | KLYMB')

@section('content')
<main class="bg-white antialiased min-h-screen">
    <nav class="mx-auto max-w-screen-xl px-4 py-6">
        <ol class="flex items-center space-x-2 text-xs font-bold uppercase tracking-widest text-gray-400">
            <li><a href="{{ route('products.index') }}" class="hover:text-black transition">Shop</a></li>
            <li><span class="mx-2">/</span></li>
            <li><a href="#" class="hover:text-black transition">{{ $product->category->name }}</a></li>
            <li><span class="mx-2">/</span></li>
            <li class="text-black">{{ $product->brand->name }}</li>
        </ol>
    </nav>

    <section class="mx-auto max-w-screen-xl px-4 pb-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <div class="lg:col-span-6">
                <div class="sticky top-24 space-y-4">
                    <div class="aspect-square bg-gray-100 overflow-hidden border border-gray-100">
                        <img id="main-image" 
                             src="{{ asset('assets/img/'.$product->primaryImage->path) }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-full object-cover transition-opacity duration-300 ease-in-out opacity-100">
                    </div>
                    
                    <div class="grid grid-cols-4 gap-4">
                        @foreach ($product->images as $i)
                            <div onclick="changeImage('{{ asset('assets/img/' . $i->path) }}', this)" 
                                 class="thumbnail-item aspect-square bg-gray-100 border-2 {{ $i->is_primary ? 'border-red-600' : 'border-transparent' }} cursor-pointer transition-all duration-300 hover:border-gray-300">
                                <img src="{{ asset('assets/img/' . $i->path) }}" 
                                     class="w-full h-full object-cover {{ $i->is_primary ? 'opacity-100' : 'opacity-70' }} hover:opacity-100 transition-opacity">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="lg:col-span-6 flex flex-col">
                <div class="border-b border-gray-100 pb-8">
                    @if($product->badge)
                        <span class="inline-block bg-red-600 text-white text-[10px] font-black uppercase tracking-[0.2em] px-3 py-1 mb-6">
                            {{ $product->badge->name }}
                        </span>
                    @endif
                    
                    <h1 class="text-4xl md:text-5xl font-black uppercase tracking-tighter text-black mb-2">
                        {{ $product->name }}
                    </h1>
                    
                    <p class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-6 tracking-widest">Brand: {{ $product->brand->name }}</p>
                    
                    <div class="flex items-baseline gap-4">
                        <span class="text-3xl font-black text-black">€{{ number_format($product->price->price, 2) }}</span>
                    </div>
                </div>

                <div class="py-8">
                    <h3 class="text-xs font-black uppercase tracking-[0.2em] text-black mb-4">Precision Overview</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ $product->description }}
                    </p>
                </div>

                <div class="space-y-6">
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xs font-black uppercase tracking-[0.2em] text-black">Select Size</h3>
                            <button class="text-[10px] font-bold uppercase text-gray-400 underline underline-offset-4">Size Guide</button>
                        </div>
                        <div class="grid grid-cols-4 gap-2">
                            <button class="size-btn py-3 border border-gray-200 text-sm font-bold hover:border-black transition">40</button>
                            <button class="size-btn py-3 border border-black bg-black text-white text-sm font-bold">41</button>
                            <button class="size-btn py-3 border border-gray-200 text-sm font-bold hover:border-black transition">42</button>
                            <button class="py-3 border border-gray-200 text-sm font-bold hover:border-black transition text-gray-300 cursor-not-allowed" disabled>43</button>
                        </div>
                    </div>

                    <div class="flex gap-4 pt-4">
                        <div class="flex items-center border border-gray-200">
                            <button class="px-4 py-2 hover:bg-gray-50">-</button>
                            <input type="text" value="1" class="w-12 text-center font-bold border-none focus:ring-0">
                            <button class="px-4 py-2 hover:bg-gray-50">+</button>
                        </div>
                        <button class="flex-1 bg-red-600 hover:bg-black text-white font-black uppercase tracking-widest py-4 transition duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <div class="mt-12 border-t border-gray-100">
                    <details class="group py-4 border-b border-gray-100" open>
                        <summary class="flex justify-between items-center cursor-pointer list-none">
                            <span class="text-xs font-black uppercase tracking-widest text-black">Tech Specs</span>
                            <span class="transition group-open:rotate-180">+</span>
                        </summary>
                        <div class="mt-4 text-sm text-gray-600 space-y-2">
                            <div class="flex justify-between py-1 border-b border-gray-50">
                                <span class="text-gray-400">Category</span>
                                <span class="font-medium text-black">{{ $product->category->name }}</span>
                            </div>
                            <div class="flex justify-between py-1 border-b border-gray-50">
                                <span class="text-gray-400">Material</span>
                                <span class="font-medium text-black">Premium KLYMB Fabric</span>
                            </div>
                        </div>
                    </details>
                    
                    <details class="group py-4 border-b border-gray-100">
                        <summary class="flex justify-between items-center cursor-pointer list-none">
                            <span class="text-xs font-black uppercase tracking-widest text-black">Shipping & Returns</span>
                            <span class="transition group-open:rotate-180">+</span>
                        </summary>
                        <div class="mt-4 text-sm text-gray-600">
                            <p>Free express shipping on all orders over €150. 30-day return policy for unused gear.</p>
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    /**
     * Menja glavnu sliku sa Tailwind fade tranzicijom
     */
    function changeImage(src, element) {
        const mainImage = document.getElementById('main-image');
        
        // 1. Počni fade-out (Tailwind klasa)
        mainImage.classList.add('opacity-0');
        
        // 2. Zameni izvor slike nakon što se slika sakrije (300ms)
        setTimeout(() => {
            mainImage.src = src;
            // 3. Vrati opacity na 100
            mainImage.classList.remove('opacity-0');
        }, 300);

        // 4. Update bordera na malim slikama
        document.querySelectorAll('.thumbnail-item').forEach(item => {
            item.classList.remove('border-red-600');
            item.classList.add('border-transparent');
            item.querySelector('img').classList.replace('opacity-100', 'opacity-70');
        });

        // Istakni kliknutu sliku
        element.classList.remove('border-transparent');
        element.classList.add('border-red-600');
        element.querySelector('img').classList.replace('opacity-70', 'opacity-100');
    }
</script>
@endsection