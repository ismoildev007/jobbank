@extends('layouts.page')

@section('content')
    <style>
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
            background-color: rgba(255, 255, 255, 0.7); /* Yanada shaffof oq fon */
            padding: 5px 10px;
            font-size: 12px;
            font-weight: 600;
            border-radius: 4px;
            max-width: 80%;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            color: #333;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
        /* Mobil versiya uchun (576px dan kichik ekranlar) */
        @media (max-width: 576px) {
            .category-tag {
                max-width: 135px;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        }
        .fav-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #fff;
            font-size: 18px; /* Skrinshotdagi kabi kichikroq */
            transition: color 0.3s;
        }
        .fav-icon:hover {
            color: #ff4d4f;
        }
        .order-btn {
            background: #007BFF;
            border: none;
            padding: 6px 12px; /* Kichikroq padding */
            font-size: 11px; /* Kichikroq font */
            font-weight: 600;
            transition: background 0.3s;
        }
        .order-btn:hover {
            background: #0056b3; /* Hoverda quyuqroq ko'k */
        }
        .rating-stars i {
            font-size: 12px; /* Skrinshotdagi kabi kichikroq yulduzlar */
            margin-right: 1px;
        }
        .rating-stars {
            font-size: 12px;
        }
        .service-title {
            font-size: 14px; /* Skrinshotdagi kabi kichikroq font */
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }
        .price-box {
            font-size: 13px; /* Kichikroq font */
        }
        .price-unit {
            font-size: 11px !important; /* Yanada kichikroq */
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
    <div class="page-wrapper">
        <div class="content">
            <div class="container">
                <div class="row">
                    <!-- Mobilda ko‘rinadigan fixed search panel -->
                    <div class="mobile-filter-bar d-md-none">
                        <form action="{{ route('page.service') }}" method="GET" class="d-flex">
                            <input type="text" name="keywords" class="form-control me-2" placeholder="Xizmat qidiring" value="{{ request('keywords') }}">
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="offcanvas" data-bs-target="#mobileFilter">
                                <i class="ti ti-filter"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Mobile Filter Offcanvas -->
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileFilter" aria-labelledby="mobileFilterLabel">
                        <div class="offcanvas-header">
                            <h5 id="mobileFilterLabel">Filterlar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <form action="{{ route('page.service') }}" method="GET" id="filterForm">
                                <div class="mb-3">
                                    <label class="form-label">Kalit So‘z Bo‘yicha Qidirish</label>
                                    <input type="text" name="keywords" class="form-control" placeholder="Kerakli xizmatni kiriting" value="{{ request('keywords') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kategoriyalar</label>
                                    @foreach ($categories as $category)
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" name="cate[]" value="{{ $category->id }}" id="cat_{{ $category->id }}"
                                                {{ in_array($category->id, request('cate', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="cat_{{ $category->id }}">
                                                {{ $category->title_uz }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Joylashuv</label>
                                    <select class="form-select" name="location">
                                        <option value="">Joyni Tanlang</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Narxlar oralig‘i</label>
                                    <input type="text" class="form-control" name="range_price" placeholder="100000 - 1000000" value="{{ request('range_price') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Rating</label>
                                    @foreach ([5, 4, 3, 2, 1] as $rate)
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" name="rating[]" value="{{ $rate }}" id="rating_{{ $rate }}"
                                                {{ in_array($rate, request('rating', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="rating_{{ $rate }}">
                                                {{ $rate }}★ va yuqori
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="submit" class="btn btn-dark w-100 mt-3">Filterni qo‘llash</button>
                            </form>
                        </div>
                    </div>

                    <!-- Desktop Filter Sidebar -->
                    <div class="col-xl-3 col-lg-4 theiaStickySidebar d-none d-md-block">
                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body">
                                <form action="{{ route('page.service') }}" method="GET" id="filterForm">
                                    <div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
                                        <h5><i class="ti ti-filter-check me-2"></i>Filterlar</h5>
                                        <a href="{{ route('page.service') }}">Filtrni Tiklash</a>
                                    </div>
                                    <div class="mb-3 pb-3 border-bottom">
                                        <label class="form-label">Kalit So‘z Bo‘yicha Qidirish</label>
                                        <input type="text" name="keywords" id="keywords" class="form-control" maxlength="50" placeholder="Kerakli xizmatni kiriting" value="{{ request('keywords') }}">
                                    </div>
                                    <div class="accordion border-bottom mb-3">
                                        <div class="accordion-item mb-3">
                                            <div class="accordion-header" id="accordion-headingThree">
                                                <div class="accordion-button p-0 mb-3" data-bs-toggle="collapse" data-bs-target="#accordion-collapseThree" aria-expanded="true" aria-controls="accordion-collapseThree" role="button">
                                                    Kategoriyalar
                                                </div>
                                            </div>
                                            <div id="accordion-collapseThree" class="accordion-collapse collapse show" aria-labelledby="accordion-headingThree">
                                                <div class="content-list mb-3" id="fill-more">
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" id="all_categories" type="checkbox">
                                                            Barcha toifalar
                                                        </label>
                                                    </div>
                                                    @foreach ($categories as $category)
                                                        <div class="form-check mb-2">
                                                            <label class="form-check-label">
                                                                <input name="cate[]" value="{{ $category->id }}" class="form-check-input filter_category" type="checkbox"
                                                                    {{ in_array($category->id, request('cate', [])) ? 'checked' : '' }}>
                                                                {{ $category->title_uz }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion border-bottom mb-3">
                                        <div class="accordion-header" id="accordion-headingFour">
                                            <div class="accordion-button p-0 mb-3" data-bs-toggle="collapse" data-bs-target="#accordion-collapseFour" aria-expanded="true" aria-controls="accordion-collapseFour" role="button">
                                                Subkategoriya
                                            </div>
                                        </div>
                                        <div id="accordion-collapseFour" class="accordion-collapse collapse show" aria-labelledby="accordion-headingFour">
                                            <div class="mb-3">
                                                <select class="form-select" name="subcategory" id="subcategory">
                                                    <option value="" {{ request('subcategory') ? '' : 'selected' }}>Subkategoriyani tanlang</option>
                                                    @foreach ($categories->flatMap->children as $subcategory)
                                                        <option value="{{ $subcategory->id }}" {{ request('subcategory') == $subcategory->id ? 'selected' : '' }}>
                                                            {{ $subcategory->title_uz }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion border-bottom mb-3">
                                        <div class="accordion-header" id="accordion-headingFive">
                                            <div class="accordion-button p-0 mb-3" data-bs-toggle="collapse" data-bs-target="#accordion-collapseFive" aria-expanded="true" aria-controls="accordion-collapseFive" role="button">
                                                Joylashuv
                                            </div>
                                        </div>
                                        <div id="accordion-collapseFive" class="accordion-collapse collapse show" aria-labelledby="accordion-headingFive">
                                            <div class="mb-3">
                                                <select class="form-select" name="location" id="location">
                                                    <option value="" {{ request('location') ? '' : 'selected' }}>Joyni Tanlang</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion border-bottom mb-3">
                                        <div class="accordion-header" id="accordion-headingSix">
                                            <div class="accordion-button p-0 mb-3" data-bs-toggle="collapse" data-bs-target="#accordion-collapseSix" aria-expanded="true" aria-controls="accordion-collapseSix" role="button">
                                                Narxlar oralig‘i
                                            </div>
                                        </div>
                                        <div id="accordion-collapseSix" class="accordion-collapse collapse show" aria-labelledby="accordion-headingSix">
                                            <div class="filter-range">
                                                <input type="text" id="range" class="range" name="range_price" value="{{ request('range_price') }}">
                                            </div>
                                            <div class="filter-range-amount mb-3">
                                                <p class="fs-14" id="price_display">Narx <span>{{ request('range_price') ?: '0 - 0' }}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion">
                                        <div class="accordion-item mb-3">
                                            <div class="accordion-header" id="accordion-headingTwo">
                                                <div class="accordion-button fs-18 p-0 mb-3" data-bs-toggle="collapse" data-bs-target="#accordion-collapseTwo" aria-expanded="true" aria-controls="accordion-collapseTwo" role="button">
                                                    Baholar
                                                </div>
                                            </div>
                                            <div id="accordion-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="accordion-headingTwo">
                                                <div class="mb-3">
                                                    @foreach ([5, 4, 3, 2, 1] as $rate)
                                                        <div class="form-check mb-2">
                                                            <label class="form-check-label d-block">
                                                                <input class="form-check-input rating_filter" name="rating[]" value="{{ $rate }}" type="checkbox"
                                                                    {{ in_array($rate, request('rating', [])) ? 'checked' : '' }}>
                                                                <span class="rating">
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        <i class="fas fa-star {{ $i <= $rate ? 'filled' : '' }}"></i>
                                                                    @endfor
                                                                </span>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark w-100" id="searchServiceBtn">Qidirish</button>
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
                                            <a href="{{ route('single.service', ['id' => $service->id, 'slug' => $service->slug]) }}">
                                                <img src="{{ $service->image ? asset('storage/' . $service->image) : asset('front/img/default-placeholder-image.png') }}"
                                                     alt="{{ $service->title_uz }}">
                                            </a>
                                            <span class="category-tag">{{ $service->category->title_uz ?? 'Noma’lum kategoriya' }}</span>
                                            <a href="javascript:void(0);" onclick="addfavour({{ $service->id }})" class="fav-icon">
                                                <i class="ti ti-heart"></i>
                                            </a>
                                        </div>
                                        <div class="card-body p-3">
                                            <h5 class="mb-2 fs-16">
                                                <a href="{{ route('single.service', ['id' => $service->id, 'slug' => $service->slug]) }}">{{ $service->title_uz }}</a>
                                            </h5>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <p class="fs-14 mb-0">
                                                    <i class="ti ti-map-pin me-2"></i>
                                                    <!-- Joylashuv maydoni yo'q -->
                                                </p>
                                                <span class="rating-stars">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <i class="fas fa-star {{ $i <= 0 ? 'filled' : '' }} text-warning"></i>
                                                    @endfor
                                                    <span class="ms-1 text-gray">0.0</span>
                                                </span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="price-box">
                                                    <div class="price-amount fs-14">
                                                        {{ $service->price ? number_format($service->price) . ' So‘m' : 'Narx keltirilmagan' }}
                                                    </div>
                                                    <div class="price-unit fs-12 text-muted">
                                                        / {{ $service->type_price ?? 'Noma’lum' }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3 text-center">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#login-modal" class="btn order-btn text-white w-100">
                                                    Hozir Buyurtma Bering
                                                </a>
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
@endsection
