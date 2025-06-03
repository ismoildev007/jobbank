@extends('layouts.page')

@section('content')
    <!-- O'zgaruvchi qo'shamiz -->
    <section class="hero-section d-md-block d-none" id="home">
        <div class="hero-content position-relative overflow-hidden">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s"
                             style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-name: fadeInUp;">
                            <!--<h1 class="mb-2">Yaqin atrofdagi yuqori baholangan mutaxassis bilan bog‘laning</h1> -->
                            <h1 class="mb-2">Yaqin atrofdagi yuqori baholangan mutaxassis bilan bog‘laning <span
                                    class="typed" data-type-text="Carpenters">Carpente</span><span
                                    class="ityped-cursor">|</span></h1>

                            <p class="mb-3 sub-title">Biz sizni birinchi urinishdayoq va har safar to‘g‘ri xizmat bilan
                                bog‘lay olamiz.</p>
                            <div class="banner-form bg-white border mb-3">
                                <form id="searchForm">
                                    <div class="d-md-flex align-items-center">

                                        <div class="input-group mb-2">
                                            <span class="input-group-text px-1"><i class="ti ti-search"></i></span>
                                            <select class="form-control" id="categoryDropdown" name="categoryId"
                                                    required="">
                                                <option value="" selected="" disabled="">Xizmat Qidirish</option>
                                                <option value="4">Santexnika xizmati</option>
                                                <option value="5">Elektrika xizmati</option>
                                                <option value="6">Maishiy texnika xizmati</option>
                                                <option value="10">Uy ta`mirlash xizmati</option>
                                                <option value="11">Tozalash xizmati</option>
                                                <option value="15">Dizenfeksiya xizmati</option>
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
                            <div class="d-flex align-items-center flex-wrap">
                            </div>
                            <div class="d-flex align-items-center flex-wrap banner-info">

                                <div class="d-flex align-items-center me-4 mt-4">
                                    <img src="/front/img/icons/success-01.svg" alt="icon">
                                    <div class="ms-2">
                                        <h6>215,292 +</h6>
                                        <p>Tasdiqlangan Yetkazib Beruvchilar</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center me-4 mt-4">
                                    <img src="/front/img/icons/success-02.svg" alt="icon">
                                    <div class="ms-2">
                                        <h6>90,000+</h6>
                                        <p>Bajarilgan Xizmatlar</p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center me-4 mt-4">
                                    <img src="/front/img/icons/success-03.svg" alt="icon">
                                    <div class="ms-2">
                                        <h6>2,390,968 </h6>
                                        <p>Global Sharhlar</p>
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
                    <span>4.9 / 5<small class="d-block">(255 ta sharh)</small></span>
                    <i class="border-edge"></i>
                </div>
                <div class="d-inline-flex bg-white p-2 rounded align-items-center shape-02 floating-x">
                    <span class="me-2"><img src="/front/img/icons/tick-banner.svg" alt=""></span>
                    <p class="fs-12 text-dark mb-0">300 Buyurtma Yakunlandi</p>
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
                        <h5>Eng Yaxshi Mutaxassislarni Toping</h5>
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
            <!-- Banner title va rasm -->
            <div class="text-center">
                <img src="/front/img/1.png" alt="Xizmatlar banneri" class="img-fluid      banner-img-mobile"
                     style="max-height: 260px; object-fit: contain;">
            </div>
        </div>
        <!-- Mobilda ko‘rinadigan fixed search panel -->
        <div class="mobile-filter-bar d-md-none px-3 mt-3">
            <form action="/services" method="GET" class="d-flex">
                <input type="text" name="keywords" class="form-control me-2" placeholder="Xizmat qidiring">
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="offcanvas"
                        data-bs-target="#mobileFilter">
                    <i class="ti ti-filter"></i>
                </button>
            </form>
        </div>
    </section>

    <section class="section category-section bg-white mt-0  pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center wow fadeInUp" data-wow-delay="0.2s"
                     style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="section-header text-center">

                        <h2 class="">Ommabop Kategoriyalar</h2>

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
                                Jobbank.uz qanday<span class="text-linear-primary">
								ishlaydi</span>
                            </h2>
                            <p class="text-light">Har bir ro‘yxat aniq va qisqa bo‘lib, mijozlarga qulaylik yaratish uchun
                                mo‘ljallangan.
                            </p>
                        </div>
                    </div>
                </div>
                <h6 class="text-center">Ishlash tartibi mavjud emas.</h6>
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
                            So‘nggi bloglarimizni ko‘rib<span class="text-linear-primary"> chiqing</span>
                        </h2>
                        <p class="sub-title">Har bir ro‘yxat aniq va qisqa bo‘lib, mijozlarga qulaylik yaratish uchun
                            mo‘ljallangan.</p>
                    </div>
                </div>
            </div>
            <h6 class="text-center">Oxirgi bloglar mavjud emas.</h6>
        </div>
    </section>


    <!-- Business Section -->
    <section class="section business-section bg-black d-md-block d-none">
        <div class="container">
            <div class="row align-items-center bg-01">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.2s"
                     style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="section-header mb-md-0 mb-4">
                        <h2 class="text-white display-4">Xizmatlar qo‘shing va biz bilan biznesingizni rivojlantiring <span
                                class="text-linear-primary"></span></h2>
                        <p class="text-light">Turli toifalardagi mahalliy mutaxassislar bilan bog‘laydigan ko‘p qirrali
                            platforma, uyingiz uchun suv ta'mirlash va elektr ishlaridan tortib, shaxsiy xizmatlar –
                            fotografiya va repetitorlikgacha.</p>
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
