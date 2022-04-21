@if ($paginator->hasPages())

<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        @if ($paginator->onFirstPage())
            <li class="disabled page-item " aria-disabled="true" aria-label="@lang('pagination.previous')">
                <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true"></a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">{{ $page }}</a>

                        @else
                            <li class="page-item"><a class="page-link " href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="disabled page-item" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a class="page-link page-link-next" href="#" aria-label="Next"></a>

                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
    </ul>
</nav>
@endif
