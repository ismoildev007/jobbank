@props(['paginator', 'elements'])

@php
    $paginator->appends(request()->query());
    $elements = $paginator->links()->elements;
@endphp

@if ($paginator->hasPages())
    <ul class="pagination justify-content-center align-items-center flex-wrap" {{ $attributes }}>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item me-2 disabled">
                <span class="d-flex justify-content-center align-items-center">
                    <i class="ti ti-arrow-left me-2"></i>Orqaga
                </span>
            </li>
        @else
            <li class="page-item me-2">
                <a class="d-flex justify-content-center align-items-center" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <i class="ti ti-arrow-left me-2"></i>Orqaga
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item me-2 disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item me-2">
                            <a class="page-link-1 d-flex justify-content-center align-items-center active" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item me-2">
                            <a class="page-link-1 d-flex justify-content-center align-items-center" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item me-2">
                <a class="d-flex justify-content-center align-items-center" href="{{ $paginator->nextPageUrl() }}" rel="next">
                    Keyingi <i class="ti ti-arrow-right ms-2"></i>
                </a>
            </li>
        @else
            <li class="page-item me-2 disabled">
                <span class="d-flex justify-content-center align-items-center">
                    Keyingi <i class="ti ti-arrow-right ms-2"></i>
                </span>
            </li>
        @endif
    </ul>
@endif
