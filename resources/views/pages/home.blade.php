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
            background-color: rgba(255, 255, 255, 0.5);
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
        @media (max-width: 576px) {
            .category-tag {
                max-width: 150px;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        }
        .fav-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #fff;
            font-size: 18px;
            transition: color 0.3s;
        }
        .fav-icon:hover {
            color: #ff4d4f;
        }
        .order-btn {
            background: #007BFF;
            border: none;
            padding: 6px 12px;
            font-size: 11px;
            font-weight: 600;
            border-radius: 20px;
            transition: background 0.3s;
        }
        .order-btn:hover {
            background: #0056b3;
        }
        .rating-stars i {
            font-size: 12px;
            margin-right: 1px;
        }
        .rating-stars {
            font-size: 12px;
        }
        .service-title {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }
        .price-box {
            font-size: 13px;
        }
        .price-unit {
            font-size: 11px !important;
            color: #6c757d;
        }
        .blog-card img {
            transition: transform 0.3s;
        }
        .blog-card img:hover {
            transform: scale(1.05);
        }
        .blog-card h5 {
            transition: color 0.3s;
        }
        .blog-card h5:hover {
            color: #007BFF;
        }
    </style>

    <!-- Banner qismi -->
    <section class="hero-section d-md-block d-none" id="home">
        <div class="hero-content position-relative overflow-hidden">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s"
                             style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-name: fadeInUp;">
                            <h1 class="mb-2">Texnika ta'miri uchun mutaxassislarni toping <span
                                    class="typed" data-type-text="Technicians">Technicians</span><span
                                    class="ityped-cursor">|</span></h1>
                            <p class="mb-3 sub-title">Tezkor va sifatli texnika ta'miri xizmatlari.</p>
                            <div class="banner-form bg-white border mb-3">
                                <form id="searchForm">
                                    <div class="d-md-flex align-items-center">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text px-1"><i class="ti ti-search"></i></span>
                                            <select class="form-control" id="categoryDropdown" name="categoryId" required="">
                                                <option value="" selected="" disabled="">Texnika ta'mirini tanlang</option>
                                                <option value="4">Santexnika ta'miri</option>
                                                <option value="5">Elektrika ta'miri</option>
                                                <option value="6">Maishiy texnika ta'miri</option>
                                                <option value="10">Uy texnikasi ta'miri</option>
                                                <option value="11">Konditsioner ta'miri</option>
                                                <option value="15">Dizenfeksiya va texnika tozalash</option>
                                            </select>
                                        </div>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text px-1"><i class="ti ti-map-pin"></i></span>
                                            <input type="text" class="form-control" name="location"
                                                   placeholder="Joylashuvni kiriting" maxlength="100">
                                        </div>
                                        <div class="mb-2">
                                            <button type="submit" id="submitSearchForm"
                                                    class="btn btn-jobbank d-inline-flex align-items-center w-100">
                                                <i class="feather-search me-2"></i>
                                                Qidirish
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <img src="/front/img/bg/bg-06.svg" alt="img" class="shape-06 round-animate">
                            </div>
                            <div class="d-flex align-items-center flex-wrap banner-info">
                                <div class="d-flex align-items-center me-4 mt-4">
                                    <img src="/front/img/icons/success-01.svg" alt="icon">
                                    <div class="ms-2">
                                        <h6>500 +</h6>
                                        <p>Mutaxassislar soni</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center me-4 mt-4">
                                    <img src="/front/img/icons/success-02.svg" alt="icon">
                                    <div class="ms-2">
                                        <h6>10,000+</h6>
                                        <p>Ta'mirlangan texnikalar</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center me-4 mt-4">
                                    <img src="/front/img/icons/success-03.svg" alt="icon">
                                    <div class="ms-2">
                                        <h6>5,000+ </h6>
                                        <p>Mijozlar sharhlari</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="banner-img wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s"
                         style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-name: fadeInUp;">
                        <img src="/front/img/banner.png" alt="img" class="img-fluid animation-float">
                    </div>
                </div>
            </div>
            <div class="hero-image">
                <div class="d-inline-flex bg-white p-2 rounded align-items-center shape-01 floating-x">
                    <span class="avatar avatar-md bg-warning rounded-circle me-2"><i class="ti ti-star-filled"></i></span>
                    <span>4.8 / 5<small class="d-block">(150 ta sharh)</small></span>
                    <i class="border-edge"></i>
                </div>
                <div class="d-inline-flex bg-white p-2 rounded align-items-center shape-02 floating-x">
                    <span class="me-2"><img src="/front/img/icons/tick-banner.svg" alt=""></span>
                    <p class="fs-12 text-dark mb-0">200+ Ta'mir yakunlandi</p>
                    <i class="border-edge"></i>
                </div>
                <img src="/front/img/bg/bg-03.svg" alt="img" class="shape-03">
                <img src="/front/img/bg/bg-04.svg" alt="img" class="shape-04">
                <img src="/front/img/bg/bg-05.svg" alt="img" class="shape-05">
            </div>
        </div>
        <div class="modal fade wallet-modal home-modal" id="add-offer" data-bs-backdrop="static" data-bs-keyboard="false"
             tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="modalBody">
                    <div class="modal-header d-flex align-items-center justify-content-between border-0">
                        <h5>Eng yaxshi texnika mutaxassislarini toping</h5>
                        <a href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close"><i
                                class="ti ti-circle-x-filled fs-24"></i></a>
                    </div>
                    <form action="provider-offers.html">
                        <div class="modal-body " id="modal-body-content">
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gray" data-bs-dismiss="modal">Bekor qilish</button>
                        <button type="submit" id="continue-btn" class="btn btn-dark">Davom etish</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="hero-section d-block d-md-none pt-0" id="home">
        <div class="hero-content position-relative overflow-hidden">
            <div class="text-center">
                <img src="/front/img/1.png" alt="Texnika ta'miri banneri" class="img-fluid banner-img-mobile"
                     style="max-height: 260px; object-fit: contain;">
            </div>
        </div>
        <div class="mobile-filter-bar d-md-none px-3 mt-3">
            <form action="/services" method="GET" class="d-flex">
                <input type="text" name="keywords" class="form-control me-2" placeholder="Texnika ta'mirini qidiring">
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="offcanvas"
                        data-bs-target="#mobileFilter">
                    <i class="ti ti-filter"></i>
                </button>
            </form>
        </div>
    </section>

    <section class="section category-section bg-white mt-0 pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center wow fadeInUp" data-wow-delay="0.2s"
                     style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="section-header text-center">
                        <h2 class="">Bizning texnika ta'miri xizmatlarimiz</h2>
                    </div>
                </div>
            </div>
            <div class="row g-4 row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-xl-6 row-cols-xxl-6 justify-content-center">
                @foreach ($categories as $category)
                    <div class="col d-flex">
                        <a href="/services/{{ $category->id }}" class="text-decoration-none flex-fill">
                            <div class="position-relative category-card d-flex flex-column justify-content-between"
                                 style="height: 160px; border-radius: 12px; overflow: hidden; background: url('{{ asset('storage/' . $category->image) }}') center/cover no-repeat; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: 0.3s;">
                                <div class="position-absolute top-0 start-0 w-100 h-100"
                                     style="background-color: rgba(0, 0, 0, 0.4); z-index: 1;"></div>
                                <div class="category-title-wrapper">
                                    <h6 class="category-title mb-0" title="{{ $category->title_uz }}">{{ $category->title_uz }}</h6>
                                </div>
                                <div class="position-relative z-2 text-center pb-2 pt-5 view-btn"
                                     style="opacity: 0; transition: opacity 0.3s;">
                                    <span class="btn btn-sm btn-light rounded-pill px-3 py-1" style="font-size: 13px;">
                                        Barchasini ko‘rish
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section pt-0 bg-white d-md-block d-none">
        <div class="container">
            <div class="work-section bg-black m-0">
                <div class="row align-items-center bg-01">
                    <div class="col-md-12 wow fadeInUp" data-wow-delay="0.2s"
                         style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="section-header text-center">
                            <h2 class="mb-1 text-white">
                                Texnika ta'mirini qanday <span class="text-linear-primary">amalga oshiramiz</span>
                            </h2>
                            <p class="text-light">Bizning xizmatlarimiz sifatli va tezkor, mijozlar uchun qulay.</p>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-4 text-center">
                        <div class="work-step">
                            <h4 class="text-white">1. Xizmatni qidiring</h4>
                            <p class="text-light">Kerakli texnika ta'miri xizmatini tanlang (masalan, konditsioner yoki santexnika).</p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="work-step">
                            <h4 class="text-white">2. Mutaxassisni tanlang</h4>
                            <p class="text-light">Yaqin atrofdagi yuqori baholangan mutaxassisni tanlang va buyurtma bering.</p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="work-step">
                            <h4 class="text-white">3. Texnikangiz ta'mirlanadi</h4>
                            <p class="text-light">Mutaxassis tezda kelib, texnikangizni sifatli ta'mir qiladi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section blog-section bg-white pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center wow fadeInUp" data-wow-delay="0.2s"
                     style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="section-header text-center">
                        <h2 class="mb-1">
                            Texnika ta'miri bo‘yicha <span class="text-linear-primary">maslahatlar</span>
                        </h2>
                        <p class="sub-title">Texnika bilan bog‘liq muammolarni hal qilish bo‘yicha foydali ma’lumotlar.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="blog-card">
                        <h5><a href="/blog/konditsioner-tozalash" class="text-decoration-none">Konditsionerni qanday tozalash kerak</a></h5>
                        <p>Konditsioneringizni uzoq muddat ishlatish uchun o‘zingiz tozalash bo‘yicha maslahatlar.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="blog-card">
                        <h5><a href="/blog/elektr-simlari-tamirlash" class="text-decoration-none">Elektr simlarini ta'mirlash bo‘yicha maslahatlar</a></h5>
                        <p>Elektr simlaridagi muammolarni xavfsiz hal qilish usullari.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="blog-card">
                        <h5><a href="/blog/maishiy-texnika-saqlash" class="text-decoration-none">Maishiy texnikani uzoq muddat saqlash usullari</a></h5>
                        <p>Maishiy texnikangizni buzilishdan himoya qilish bo‘yicha maslahatlar.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Business Section -->
    <section class="section business-section bg-black d-md-block d-none">
        <div class="container">
            <div class="row align-items-center bg-01">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.2s"
                     style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="section-header mb-md-0 mb-4">
                        <h2 class="text-white display-4">Texnika ta'miri xizmatlaringizni qo‘shing va daromad toping <span
                                class="text-linear-primary"></span></h2>
                        <p class="text-light">Santexnika, elektrika va maishiy texnika ta'miri mutaxassislarini uchun platforma, mijozlarni osongina toping.</p>
                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#provider"
                           class="btn btn-jobbank"><i class="ti ti-user-filled me-2"></i>Ro`yxatdan o`tish</a>
                    </div>
                </div>
                <div class="col-md-6 text-md-end wow fadeInUp" data-wow-delay="0.2s"
                     style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="business-img">
                        <img src="/front/img/business.jpg" class="img-fluid" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
