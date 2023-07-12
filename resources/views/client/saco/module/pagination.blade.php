<!-- Previous page symbol "<" Link -->

@if ($paginator->hasPages())
<ul class="pagination d-flex justify-content-center align-items-center">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li class="page-item disabled">
        <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
        </a>
    </li>
    @else
    <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" class="page-link text-custom-2" rel="prev">&laquo;</a></li>
    @endif

    {{-- Pagination Elements(represents page number such as 1,2,3) --}}
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <li class="page-item disabled text-dark">{{ $element }}</li>
    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <li class="page-item active">
        <a href="#" class="page-link bg-dark border-dark">{{ $page }}<span class="sr-only">(current)</span></a>
    </li>
    @else
    <li class="page-item">
        <a href="{{ $url }}" class="page-link text-dark">{{ $page }}</a>
    </li>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page symbol ">" Link --}}
    @if ($paginator->hasMorePages())
    <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" class="page-link text-custom-2" rel="next">&raquo;</a></li>
    @else
    <li class="page-item disabled">
        <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
        </a>
    </li>
    @endif
</ul>
@endif