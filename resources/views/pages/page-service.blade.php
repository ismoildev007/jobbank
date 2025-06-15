@extends('layouts.page')

@section('content')
@php
// request('cate') ni arrayga aylantirish
$selectedCategories = request('cate');

if (!is_array($selectedCategories)) {
if ($selectedCategories) {
// Agar "4,5,6" ko'rinishda kelgan bo'lsa, explode qiling
$selectedCategories = explode(',', $selectedCategories);
} else {
$selectedCategories = [];
}
}
@endphp
<style>
    .mobile-filter-bar {
        position: fixed;
        top: 51px;
        /* header balandligiga qarab sozlanadi */
        left: 0;
        right: 0;
        z-index: 1030;
        background-color: #fff;
        padding: 8px 16px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .service-card {
        transition: transform 0.3s, box-shadow 0.3s;
        border: none;
        border-radius: 10px;
        overflow: hidden;
        background: #fff;
    }

    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15) !important;
    }

    .service-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .category-tag {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: rgba(255, 255, 255, 0.7);
        /* Yanada shaffof oq fon */
        padding: 5px 10px;
        font-size: 11px;
        font-weight: 600;
        border-radius: 4px;
        max-width: 80%;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        color: #333;
    }

    /* Mobil versiya uchun (576px dan kichik ekranlar) */
    @media (max-width: 576px) {
        .category-tag {
            max-width: 118px;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    }

    .fav-icon {
        position: absolute;
        top: 10px;
        right: 4px;
        color: #fff;
        font-size: 16px;
        /* Skrinshotdagi kabi kichikroq */
        transition: color 0.3s;
    }

    .fav-icon:hover {
        color: #ff4d4f;
    }

    .order-btn {
        background: #007BFF;
        border: none;
        padding: 6px 12px;
        /* Kichikroq padding */
        font-size: 11px;
        /* Kichikroq font */
        font-weight: 600;
        transition: background 0.3s;
    }

    .order-btn:hover {
        background: #0056b3;
        /* Hoverda quyuqroq ko'k */
    }

    .rating-stars i {
        font-size: 12px;
        /* Skrinshotdagi kabi kichikroq yulduzlar */
        margin-right: 1px;
    }

    .rating-stars {
        font-size: 12px;
    }

    .service-title {
        font-size: 14px;
        /* Skrinshotdagi kabi kichikroq font */
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
    }

    .price-box {
        font-size: 13px;
        /* Kichikroq font */
    }

    .price-unit {
        font-size: 11px !important;
        /* Yanada kichikroq */
        color: #6c757d;
    }
</style>
<!-- Breadcrumb -->
<div class="breadcrumb-bar text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title mb-2 pt-5">Xizmatlar</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="ti ti-home-2"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Xizmatlar</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="breadcrumb-bg">
            <img src="{{ asset('front/img/bg/breadcrumb-bg-01.png') }}" class="breadcrumb-bg-1" alt="Img">
            <img src="{{ asset('front/img/bg/breadcrumb-bg-02.png') }}" class="breadcrumb-bg-2" alt="Img">
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Wrapper -->
<div class="page-wrapper" style="padding-bottom: 50px">
    {{-- toast start--}}
    @include('components.page.toast')
    {{-- toast end--}}

    <div class="content">
        <div class="container">
            <div class="row">
                <!-- Mobilda ko‘rinadigan fixed search panel -->
                <div class="mobile-filter-bar d-md-none">
                    <form action="{{ route('page.service') }}" method="GET" class="d-flex">
                        <input type="text" name="keywords" class="form-control me-2" placeholder="Xizmat qidiring"
                            value="{{ request('keywords') }}">
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="offcanvas"
                            data-bs-target="#mobileFilter">
                            <i class="ti ti-filter"></i>
                        </button>
                    </form>
                </div>

                @include('components.page.mobile-filter')

                <!-- Desktop Filter Sidebar -->
                <div class="col-xl-3 col-lg-4 theiaStickySidebar d-none d-md-block">
                    <div class="card shadow-sm mb-4 mb-lg-0">
                        <div class="card-body p-4">
                            <form action="{{ route('page.service') }}" method="GET" id="filterForm">
                                <!-- Header -->
                                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
                                    <h5 class="mb-0 text-primary"><i class="ti ti-filter-check me-2"></i>Filterlar</h5>
                                    <a href="{{ route('page.service') }}"
                                        class="text-decoration-underline small">Filtrni tiklash</a>
                                </div>

                                <!-- Search -->
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">🔍 Kalit so‘z</label>
                                    <input type="text" name="keywords" id="keywords" class="form-control"
                                        placeholder="Kerakli xizmatni kiriting" maxlength="50"
                                        value="{{ request('keywords') }}">
                                </div>

                                <!-- Categories Accordion -->
                                <div class="accordion mb-3 border-bottom" id="filterAccordion1">
                                    <div class="accordion-item">
                                        <h6 class="accordion-header">
                                            <button class="accordion-button px-0 py-2 fw-medium" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseCategories"
                                                aria-expanded="true">
                                                📂 Kategoriyalar
                                            </button>
                                        </h6>
                                        <div id="collapseCategories" class="accordion-collapse collapse show">
                                            <div class="accordion-body pt-2">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" id="all_categories">
                                                    <label class="form-check-label" for="all_categories">Barcha
                                                        toifalar</label>
                                                </div>
                                                @foreach ($categories as $category)
                                                <div class="form-check mb-2">
                                                    <input name="cate[]" value="{{ $category->id }}" type="checkbox"
                                                        class="form-check-input filter_category"
                                                        id="cate_{{ $category->id }}" {{ in_array($category->id,
                                                    $selectedCategories) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="cate_{{ $category->id }}">
                                                        {{ $category->title_uz }}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Subcategory -->
                                <div class="accordion mb-3 border-bottom" id="filterAccordion2">
                                    <div class="accordion-item">
                                        <h6 class="accordion-header">
                                            <button class="accordion-button px-0 py-2 fw-medium" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseSubcategory"
                                                aria-expanded="true">
                                                🗂️ Subkategoriya
                                            </button>
                                        </h6>
                                        <div id="collapseSubcategory" class="accordion-collapse collapse show">
                                            <div class="accordion-body pt-2">
                                                <select class="form-select" name="subcategory" id="subcategory">
                                                    <option value="">Subkategoriyani tanlang</option>
                                                    @foreach ($categories->flatMap->children as $subcategory)
                                                    <option value="{{ $subcategory->id }}" {{
                                                        request('subcategory')==$subcategory->id ?
                                                        'selected' : '' }}>
                                                        {{ $subcategory->title_uz }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Location -->
                                <div class="accordion mb-3 border-bottom">
                                    <div class="accordion-item">
                                        <h6 class="accordion-header">
                                            <button class="accordion-button px-0 py-2 fw-medium" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseLocation"
                                                aria-expanded="true">
                                                📍 Joylashuv
                                            </button>
                                        </h6>
                                        <div id="collapseLocation" class="accordion-collapse collapse show">
                                            <div class="accordion-body pt-2">
                                                <select class="form-select" name="location" id="location">
                                                    <option value="">Joyni tanlang</option>
                                                    {{-- Add options dynamically if needed --}}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Price Range -->
                                <div class="accordion mb-3 border-bottom">
                                    <div class="accordion-item">
                                        <h6 class="accordion-header">
                                            <button class="accordion-button px-0 py-2 fw-medium" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapsePrice"
                                                aria-expanded="true">
                                                💰 Narxlar oralig‘i
                                            </button>
                                        </h6>
                                        <div id="collapsePrice" class="accordion-collapse collapse show">
                                            <div class="accordion-body pt-2">
                                                <input type="text" id="range" name="range_price"
                                                    class="form-control mb-2" placeholder="100000 - 1000000"
                                                    value="{{ request('range_price') }}">
                                                <p class="small text-muted">Narx: <strong>{{ request('range_price') ?:
                                                        '0 - 0'
                                                        }}</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Ratings -->
                                <div class="accordion mb-4">
                                    <div class="accordion-item">
                                        <h6 class="accordion-header">
                                            <button class="accordion-button px-0 py-2 fw-medium" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseRating"
                                                aria-expanded="true">
                                                ⭐ Baholar
                                            </button>
                                        </h6>
                                        <div id="collapseRating" class="accordion-collapse collapse show">
                                            <div class="accordion-body pt-2">
                                                @foreach ([5, 4, 3, 2, 1] as $rate)
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input rating_filter" name="rating[]"
                                                        value="{{ $rate }}" type="checkbox" id="rating_{{ $rate }}" {{
                                                        in_array($rate, request('rating', [])) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="rating_{{ $rate }}">
                                                        @for ($i = 1; $i <= 5; $i++) <i
                                                            class="fas fa-star {{ $i <= $rate ? 'text-warning' : 'text-muted' }}">
                                                            </i>
                                                            @endfor
                                                            <span class="ms-1 small">{{ $rate }}★</span>
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-dark w-100 mt-3">🔍 Qidirish</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Xizmatlar ro'yxati -->
                <div class="col-xl-9 col-lg-8">
                    <div class="row align-items-center">
                        @forelse ($services as $service)
                        <div class="col-6 col-sm-6 col-md-6 col-xl-4 mb-4">
                            <div class="card service-card p-0 shadow-sm">
                                <div class="position-relative">
                                    <a
                                        href="{{ route('single.service', ['id' => $service->id, 'slug' => $service->slug]) }}">
                                        <img src="{{ $service->image ? asset('storage/' . $service->image) : asset('front/img/default-placeholder-image.png') }}"
                                            alt="{{ $service->title_uz }}">
                                    </a>
                                    <span class="category-tag">{{ $service->category->title_uz ?? 'Noma’lum kategoriya'
                                        }}</span>
                                    <a href="javascript:void(0);" onclick="addfavour({{ $service->id }})"
                                        class="fav-icon">
                                        <i class="ti ti-heart"></i>
                                    </a>
                                </div>
                                <div class="card-body p-3">
                                    <h5 class="mb-2 fs-12">
                                        <a
                                            href="{{ route('single.service', ['id' => $service->id, 'slug' => $service->slug]) }}">{{
                                            $service->title_uz }}</a>
                                    </h5>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <p class="fs-14 mb-0">
                                            <i class="ti ti-map-pin me-2"></i>
                                            <!-- Joylashuv maydoni yo'q -->
                                        </p>
                                        <span class="rating-stars">
                                            @for ($i = 1; $i <= 5; $i++) <i
                                                class="fas fa-star {{ $i <= 0 ? 'filled' : '' }} text-warning"></i>
                                                @endfor
                                                <span class="ms-1 text-gray">0.0</span>
                                        </span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="price-box">
                                            <div class="price-amount fs-14">
                                                {{ $service->price ? number_format($service->price) . ' So‘m' : 'Narx
                                                keltirilmagan' }}
                                            </div>
                                            <div class="price-unit fs-12 text-muted">
                                                / {{ $service->type_price ?? 'Noma’lum' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center position-relative">
                                        @auth
                                        <a href="{{ route('order.page', $service->id) }}"
                                            class="btn order-btn text-white w-100">
                                            Hozir Buyurtma Bering
                                        </a>
                                        @else
                                        <a href="#" class="btn order-btn text-white w-100" data-bs-toggle="modal"
                                            data-bs-target="#login-modal">
                                            Hozir Buyurtma Bering
                                        </a>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <p class="text-center">Bu filtrlar bo‘yicha xizmatlar topilmadi.</p>
                        </div>
                        @endforelse
                    </div>

                    <!-- Sahifalash -->
                    <nav aria-label="Page navigation">
                        {{ $services->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Wrapper -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
                const forms = document.querySelectorAll('form[id^="order-form-"]');

                forms.forEach(form => {
                    form.addEventListener('submit', function (e) {
                        const serviceId = this.id.replace('order-form-', '');
                        const button = document.getElementById('order-btn-' + serviceId);
                        const providerInfo = document.getElementById('provider-info-' + serviceId);

                        // Tugmani deaktiv qilish
                        button.disabled = true;
                        button.innerText = "Buyurtma yuborildi";

                        // Provider raqamini ko‘rsatish
                        providerInfo.classList.remove('d-none');
                    });
                });
            });
</script>

@endsection
