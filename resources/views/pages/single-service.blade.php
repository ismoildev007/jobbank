@extends('layouts.page')

@section('content')
    <div class="breadcrumb-bar text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Xizmat Tafsilotlari</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="https://truelysell-laravel.dreamstechnologies.com/"><i class="ti ti-home-2"></i></a></li>
                            <li class="breadcrumb-item">Xizmatlar</li>
                            <li class="breadcrumb-item active" aria-current="page">Xizmat Tafsilotlari</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="breadcrumb-bg">
                <img src="https://jobbank.uz/front/img/bg/breadcrumb-bg-01.png" class="breadcrumb-bg-1" alt="Img">
                <img src="https://jobbank.uz/front/img/bg/breadcrumb-bg-02.png" class="breadcrumb-bg-2" alt="Img">
            </div>
        </div>
    </div>

    <div class="page-wrapper">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card border-0">
                            <div class="card-body">
                                <div class="service-head mb-2">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                                        <h3 class="mb-2">{{ $service->title_uz }}</h3>
                                        <span class="badge badge-purple-transparent mb-2"><i class="ti ti-calendar-check me-1"></i>{{ $service->provider->orders_count ?? 0 }}+ Buyurtmalar</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between flex-wrap mb-2">
                                        <div class="d-flex align-items-center flex-wrap">
                                            <p class="me-3 mb-2"><i class="ti ti-map-pin me-2"></i>{{ $service->provider->location ?? 'Toshkent' }}</p>
                                            <p class="mb-2"><i class="ti ti-star-filled text-warning me-2"></i><span class="text-gray-9">0 </span>(0 sharhlar)</p>
                                        </div>
                                        <div class="d-flex align-items-center flex-wrap">
                                            <a href="javascript:void(0);" class="me-3 mb-2"><i class="ti ti-eye me-2"></i>5 Ko‘rishlar</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="service-wrap mb-4">
                                    <div class="owl-carousel service-carousel nav-center mb-3 owl-loaded owl-drag" id="large-img">
                                        <div class="owl-stage-outer">
                                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s;">
                                                @if ($service->image)
                                                    <div class="owl-item active">
                                                        <img src="{{ asset('storage/' . $service->image) }}" class="img-fluid img_one" alt="{{ $service->title_uz }}">
                                                    </div>
                                                @else
                                                    <div class="owl-item active" >
                                                        <img src="https://jobbank.uz/assets/img/placeholder.jpg" class="img-fluid img_one" alt="Default Img">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="owl-nav disabled">
                                            <button type="button" role="presentation" class="owl-prev"><i class="fa-solid fa-chevron-left"></i></button>
                                            <button type="button" role="presentation" class="owl-next"><i class="fa-solid fa-chevron-right"></i></button>
                                        </div>
                                        <div class="owl-dots disabled"></div>
                                    </div>
{{--                                    <div class="owl-carousel slider-nav-thumbnails nav-center owl-loaded owl-drag" id="small-img">--}}
{{--                                        <div class="owl-stage-outer">--}}
{{--                                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s; width: 144px;">--}}
{{--                                                @if ($service->image)--}}
{{--                                                    <div class="owl-item active current" style="width: 133.2px; margin-right: 10px;">--}}
{{--                                                        <div><img src="{{ asset('storage/' . $service->image) }}" class="img-fluid img_two" alt="{{ $service->title_uz }}"></div>--}}
{{--                                                    </div>--}}
{{--                                                @else--}}
{{--                                                    <div class="owl-item active current" style="width: 133.2px; margin-right: 10px;">--}}
{{--                                                        <div><img src="https://jobbank.uz/assets/img/placeholder.jpg" class="img-fluid img_two" alt="Default Img"></div>--}}
{{--                                                    </div>--}}
{{--                                                @endif--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="owl-nav disabled">--}}
{{--                                            <button type="button" role="presentation" class="owl-prev disabled"><i class="fa-solid fa-chevron-left"></i></button>--}}
{{--                                            <button type="button" role="presentation" class="owl-next disabled"><i class="fa-solid fa-chevron-right"></i></button>--}}
{{--                                        </div>--}}
{{--                                        <div class="owl-dots disabled"></div>--}}
{{--                                    </div>--}}
                                </div>

                                <div class="accordion service-accordion">
                                    <div class="accordion-item mb-4">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button p-0" type="button" data-bs-toggle="collapse" data-bs-target="#overview" aria-expanded="false">
                                                Xizmat haqida umumiy ma'lumot
                                            </button>
                                        </h2>
                                        <div  class="accordion-collapse collapse show">
                                            <div class="accordion-body border-0 p-0 pt-3">
                                                <div class="more-text" style="height: 100%!important;">
                                                    <p>{{ $service->description_uz ?? 'Tafsilotlar mavjud emas' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card border-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between border-bottom mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="mb-3">
                                            <h4>
                                                <span class="display-6 fw-bold">
                                                    {{ number_format($service->price ?? 0, 0, ',', ' ') }} So‘m
                                                </span> /
                                                <span class="text-muted">{{ $service->type_price ?? 'Soatlik' }}</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="fixed-order-menu ">
                                    @auth
                                        <a class="btn btn-primary border-0 w-100 mb-3" href="{{ route('order.page', $service->id) }}">
                                            <i class="ti ti-calendar me-2"></i> Xizmat Buyurtma Qilish
                                        </a>
                                    @else
                                        <a href="#" class="btn btn-primary border-0 w-100 mb-3" data-bs-toggle="modal" data-bs-target="#login-modal">
                                            Xizmat Buyurtma Qilish
                                        </a>
                                    @endauth
                                </div>

                                <div class="card border-0">
                                    <div class="card-body">
                                        <h4 class="mb-3">Xizmat Ko‘rsatuvchi</h4>
                                        <div class="provider-info text-center bg-light p-3 mb-3">
                                            <div class="avatar avatar-xl mb-3">
                                                <img src="{{ $service->provider->profile_image ?? 'https://jobbank.uz/assets/img/profile-default.png' }}" alt="img" class="img-fluid rounded-circle">
                                                <span class="service-active-dot"><i class="ti ti-check"></i></span>
                                            </div>
                                            <h5>{{ $service->provider->full_name ?? 'Noma’lum' }}</h5>
                                            <p class="text-muted"><i class="ti ti-star-filled text-warning me-2"></i><span>{{ $service->provider->average_rating ?? 0 }}</span> ({{ $service->provider->reviews_count ?? 0 }} sharhlar)</p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h6 class="text-muted mb-0"><i class="ti ti-user me-2"></i>A’zo Bo‘lgan Vaqti</h6>
                                            <p>{{ date('Y', strtotime($service->provider->created_at)) }}</p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h6 class="text-muted mb-0"><i class="ti ti-map-pin me-1"></i>Manzil</h6>
                                            <p>{{ $service->provider->location ?? 'Toshkent' }}</p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h6 class="text-muted mb-0"><i class="ti ti-file-text me-1"></i>Buyurtmalar Soni</h6>
                                            <p>{{ $service->provider->orders_count ?? 0 }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border-0">
                                    <div class="card-body">
                                        <h4 class="mb-3">Joylashuv</h4>
                                        <div class="map-wrap">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2997301.448737672!2d66.5848!3d39.6721!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f4d19b20426f8d5%3A0x5e376babae0c4e47!2sToshkent%2C%20Uzbekistan!5e0!3m2!1sen!2suz!4v1717770876845!5m2!1sen!2suz" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="contact-map w-100" style="border-radius: 0.5rem; height: 200px;"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Barcha qurilmalarda - menyuni oddiy holatga tushirish */
        .fixed-order-menu {
            position: static;
            width: 100%;
            padding: 10px 15px;
            display: flex;
            justify-content: center;
            gap: 10px;
            box-shadow: none; /* Soyalarni olib tashlaymiz */
        }

        .fixed-order-menu a.btn {
            flex: 1;
            text-align: center;
            padding: 10px;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            border: none;
            text-decoration: none;
        }

        /* Mobil ekranlar uchun maxsus dizayn */
        @media (max-width: 768px) {
            .fixed-order-menu {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                background-color: white;
                box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
                z-index: 10000;
            }
        }
    </style>

@endsection
