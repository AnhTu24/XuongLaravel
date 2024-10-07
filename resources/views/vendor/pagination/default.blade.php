@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><a class="pagination__link">«</a></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" class="pagination__link"><i class="fa-solid fa-angles-left fa-2xs"></i></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li><a class="pagination__link">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><a href="{{ $url }}" class="pagination__link active">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}" class="pagination__link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" class="pagination__link"><i class="fa-solid fa-angles-right fa-2xs"></i></a></li>
        @else
            <li class="disabled"><a class="pagination__link">»</a></li>
        @endif
    </ul>
@endif
