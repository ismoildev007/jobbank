@props(['paginator', 'elements'])

@php
    $paginator->appends(request()->query());
    $elements = $paginator->links()->elements;
@endphp

@if ($paginator->hasPages())
    <ul class="pagination justify-content-center align-items-center flex-wrap" {{ $attributes }}>
        <style>
            .pagination .page-item a, .pagination .page-item span {
                border-radius: 50%;
                width: 40px;
                height: 40px;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 14px;
                font-weight: 500;
                transition: all 0.3s;
                margin: 0 5px;
            }
            .pagination .page-item a.page-link-1 {
                background-color: #fff;
                color: #333;
                border: 1px solid #ddd;
            }
            .pagination .page-item a.page-link-1:hover {
                background-color: #f1f1f1;
            }
            .pagination .page-item a.page-link-1.active {
                background-color: #007BFF;
                color: white;
                border: 1px solid #007BFF;
            }
            .pagination .page-item.disabled span {
                background-color: transparent;
                color: #6c757d;
                border: none;
            }
            .pagination .page-item a.prev-next {
                background-color: transparent;
                color: #333;
                border: none;
                font-size: 14px;
                font-weight: 500;
            }
            .pagination .page-item a.prev-next:hover {
                color: #007BFF;
            }
        </style>

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item me-2 disabled">
                <span class="d-flex justify-content-center align-items-center prev-next">
                    <i class="ti ti-arrow-left me-2"></i>Orqaga
                </span>
            </li>
        @else
            <li class="page-item me-2">
                <a class="d-flex justify-content-center align-items-center prev-next" href="{{ $paginator->previousPageUrl() }}" rel="prev">
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
                <a class="d-flex justify-content-center align-items-center prev-next" href="{{ $paginator->nextPageUrl() }}" rel="next">
                    Keyingi <i class="ti ti-arrow-right ms-2"></i>
                </a>
            </li>
        @else
            <li class="page-item me-2 disabled">
                <span class="d-flex justify-content-center align-items-center prev-next">
                    Keyingi <i class="ti ti-arrow-right ms-2"></i>
                </span>
            </li>
        @endif
    </ul>
@endif
