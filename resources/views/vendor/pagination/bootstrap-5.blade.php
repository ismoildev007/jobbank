@props(['paginator', 'elements'])

@php
    $paginator->appends(request()->query());
    $elements = $paginator->links()->elements;
    $currentPage = $paginator->currentPage();
    $lastPage = $paginator->lastPage();
    $window = 2;
    $startPage = max(1, $currentPage - $window);
    $endPage = min($lastPage, $currentPage + $window);
@endphp

@if ($paginator->hasPages())
    <ul class="pagination justify-content-center align-items-center flex-wrap" {{ $attributes }}>
        <style>
            .me-1 {
                margin-right: -0.35rem !important;
            }
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
                transition: color 0.3s;
            }
            .pagination .page-item a.prev-next:hover {
                color: #007BFF;
            }
            .pagination .page-item a.prev-next i, .pagination .page-item span.prev-next i {
                font-size: 18px; /* Ikonkalarni kattaroq qilish */
                font-weight: 700; /* Ikonkalarni qalinroq qilish */
                transition: transform 0.3s; /* Animatsiya qo‘shish */
            }
            .pagination .page-item a.prev-next:hover i {
                transform: scale(1.2); /* Hoverda ikonka biroz kattalashadi */
            }
            .pagination .ellipsis {
                margin: 0 5px;
                font-size: 14px;
                color: #6c757d;
            }
        </style>

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item me-1 disabled">
                <span class="d-flex justify-content-center align-items-center prev-next">
                    <i class="ti ti-arrow-left me-2"></i>
                </span>
            </li>
        @else
            <li class="page-item me-1">
                <a class="d-flex justify-content-center align-items-center prev-next" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <i class="ti ti-arrow-left me-2"></i>
                </a>
            </li>
        @endif

        {{-- First Page Link --}}
        @if ($startPage > 1)
            <li class="page-item me-1">
                <a class="page-link-1 d-flex justify-content-center align-items-center" href="{{ $paginator->url(1) }}">1</a>
            </li>
            @if ($startPage > 2)
                <li class="page-item me-1 disabled"><span class="ellipsis">...</span></li>
            @endif
        @endif

        {{-- Pagination Elements --}}
        @for ($page = $startPage; $page <= $endPage; $page++)
            <li class="page-item me-1">
                <a class="page-link-1 d-flex justify-content-center align-items-center {{ $page == $currentPage ? 'active' : '' }}" href="{{ $paginator->url($page) }}">{{ $page }}</a>
            </li>
        @endfor

        {{-- Last Page Link --}}
        @if ($endPage < $lastPage)
            @if ($endPage < $lastPage - 1)
                <li class="page-item me-1 disabled"><span class="ellipsis">...</span></li>
            @endif
            <li class="page-item me-1">
                <a class="page-link-1 d-flex justify-content-center align-items-center" href="{{ $paginator->url($lastPage) }}">{{ $lastPage }}</a>
            </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item me-1">
                <a class="d-flex justify-content-center align-items-center prev-next" href="{{ $paginator->nextPageUrl() }}" rel="next">
                     <i class="ti ti-arrow-right ms-2"></i>
                </a>
            </li>
        @else
            <li class="page-item me-1 disabled">
                <span class="d-flex justify-content-center align-items-center prev-next">
                     <i class="ti ti-arrow-right ms-2"></i>
                </span>
            </li>
        @endif
    </ul>
@endif
