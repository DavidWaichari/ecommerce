@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- First Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <a class="page-link mx-1" href="#" aria-label="First">
                        First
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link mx-1" href="{{ $paginator->url(1) }}" aria-label="First">
                        First
                    </a>
                </li>
            @endif

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <a class="page-link mx-1" href="#" aria-label="@lang('pagination.previous')">
                        <i class="feather-icon icon-chevron-left"></i>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link mx-1" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        <i class="feather-icon icon-chevron-left"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><a class="page-link mx-1">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><a class="page-link mx-1">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link mx-1" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link mx-1" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        <i class="feather-icon icon-chevron-right"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <a class="page-link mx-1" href="#" aria-label="@lang('pagination.next')">
                        <i class="feather-icon icon-chevron-right"></i>
                    </a>
                </li>
            @endif

            {{-- Last Page Link --}}
            @if ($paginator->currentPage() == $paginator->lastPage())
                <li class="page-item disabled" aria-disabled="true">
                    <a class="page-link mx-1" href="#" aria-label="Last">
                        Last
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link mx-1" href="{{ $paginator->url($paginator->lastPage()) }}" aria-label="Last">
                        Last
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
