@props(['id', 'image', 'name', 'price', 'badge', 'url', 'brand', 'category'])

<div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm group hover:shadow-md transition-shadow">
    <div class="h-56 w-full overflow-hidden rounded-md">
        <a href="{{ $url }}" class="block h-full w-full">
            <img class="mx-auto h-full w-full object-contain transition-transform duration-500 ease-in-out group-hover:scale-110"
                 src="{{ asset($image) }}"
                 alt="{{ $name }}" />
        </a>
    </div>

    <div class="pt-6">
        <div class="mb-4 flex items-center justify-between gap-4">
            @if($badge)
                <span
                    class="me-2 rounded px-2.5 py-0.5 text-xs font-bold"
                    style="background-color: {{ $badge->bg_color }}; color: {{ $badge->text_color }};"
                >
                    {{ $badge->name }}
                </span>
            @else
                <div class="h-5"></div>
            @endif

            <div class="flex items-center justify-end gap-1">
                <a href="{{ route('products.show', $id) }}" class="rounded-lg p-2 text-gray-500 hover:cursor-pointer hover:bg-gray-100 hover:text-gray-900">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" /><path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="mt-2 flex flex-col gap-0.5">

            <span class="text-sm font-bold uppercase text-red-500">{{ $brand }}</span>
        </div>
        <a href="{{ $url }}" class="text-lg font-bold leading-tight uppercase text-gray-900 hover:text-red-600 transition-colors">
            {{ $name }}
        </a>

        <div class="mt-2 flex flex-col gap-0.5">

            <span class="text-sm font-bold uppercase text-gray-500">{!! $category !!}</span>
        </div>

        <ul class="mt-4 flex items-center gap-4">
            <li class="flex items-center gap-2">
                <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5"/>
                    <circle cx="7" cy="18" r="2" stroke="currentColor" stroke-width="2"/>
                    <circle cx="17" cy="18" r="2" stroke="currentColor" stroke-width="2"/>
                </svg>
                <p class="text-sm font-medium text-gray-500">Fast Delivery</p>
            </li>
        </ul>

        <div class="mt-4 flex items-center justify-between gap-4 font-black">
            <p class="text-2xl text-gray-900">€{{ $price }}</p>
            <button type="button" class="hover:cursor-pointer inline-flex items-center rounded-lg bg-[#1A252F] px-4 py-2.5 text-sm font-bold text-white hover:bg-black transition-colors">
                Add to cart
            </button>
        </div>
    </div>
</div>
