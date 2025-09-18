@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" class="flex justify-end">
        <ul class="flex items-center space-x-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="text-gray-400 px-3 py-1">&lsaquo;</li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 rounded-full bg-gray-200 hover:bg-blue-500 hover:text-white">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="px-3 py-1 text-gray-500">{{ $element }}</li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="px-3 py-1 rounded-full bg-blue-600 text-white">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="px-3 py-1 rounded-full bg-gray-200 hover:bg-blue-500 hover:text-white">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 rounded-full bg-gray-200 hover:bg-blue-500 hover:text-white">&rsaquo;</a>
                </li>
            @else
                <li class="text-gray-400 px-3 py-1">&rsaquo;</li>
            @endif
        </ul>
    </nav>
@endif
