@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center space-x-2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 border border-gray-200 text-gray-300 font-black uppercase text-[10px] tracking-widest">Prev</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 border border-black font-black uppercase text-[10px] tracking-widest hover:bg-black hover:text-white transition">Prev</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-4 py-2 border border-gray-200 text-gray-400 font-black uppercase text-[10px] tracking-widest">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-4 py-2 border border-black bg-black text-white font-black uppercase text-[10px] tracking-widest">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 border border-black font-black uppercase text-[10px] tracking-widest hover:bg-black hover:text-white transition">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 border border-black font-black uppercase text-[10px] tracking-widest hover:bg-black hover:text-white transition">Next</a>
        @else
            <span class="px-4 py-2 border border-gray-200 text-gray-300 font-black uppercase text-[10px] tracking-widest">Next</span>
        @endif
    </nav>
@endif
