@if ($paginator->hasPages())
    <nav class="flex items-center justify-center space-x-2 mt-8">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 border border-gray-200 text-gray-300 font-black uppercase text-[10px] tracking-widest cursor-default">Prev</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 border border-black font-black uppercase text-[10px] tracking-widest hover:bg-red-600 hover:text-white transition shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] active:shadow-none active:translate-y-[2px]">Prev</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        {{-- Selektovana stranica - CRVENA --}}
                        <span class="px-4 py-2 border border-black bg-red-600 text-white font-black uppercase text-[10px] tracking-widest shadow-[2px_2px_0px_0px_rgba(0,0,0,1)]">{{ $page }}</span>
                    @else
                        {{-- Ostale stranice --}}
                        <a href="{{ $url }}" class="px-4 py-2 border border-black font-black uppercase text-[10px] tracking-widest hover:bg-red-600 hover:text-white transition shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] active:shadow-none active:translate-y-[2px]">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 border border-black font-black uppercase text-[10px] tracking-widest hover:bg-red-600 hover:text-white transition shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] active:shadow-none active:translate-y-[2px]">Next</a>
        @else
            <span class="px-4 py-2 border border-gray-200 text-gray-300 font-black uppercase text-[10px] tracking-widest cursor-default">Next</span>
        @endif
    </nav>
@endif
