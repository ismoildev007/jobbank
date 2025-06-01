<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="u5ecyw7iT68XZ89HvCzUSXrUbD1K5fzng1ieG3iH">
    <meta name="description" content="Truely Sell">
    <meta name="keywords" content="Truely Sell">
    <title>Jobbank</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/admin/assets/img/logo.png">
    <link rel="stylesheet" href="/front/css/bootstrap.min.css">

    <!-- Datepicker CSS -->

    <link rel="stylesheet" href="/front/css/bootstrap-datetimepicker.min.css">

    <!-- Toastr CSS -->
    <link href="/assets/plugins/toastr/toatr.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link rel="stylesheet" href="/front/css/animate.css">

    <link rel="stylesheet" href="/front/css/bootstrap-datetimepicker.min.css">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="/front/plugins/tabler-icons/tabler-icons.css">
    <link href="https://unpkg.com/@tabler/icons-webfont@latest/tabler-icons.min.css" rel="stylesheet">


    <!-- Fontawesome Icon CSS -->
    <link rel="stylesheet" href="/front/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/front/plugins/fontawesome/css/all.min.css">


    <!-- select CSS -->
    <link rel="stylesheet" href="/front/plugins/select2/css/select2.min.css">

    <!-- summernote CSS -->
    <link rel="stylesheet" href="/assets/plugins/summernote/summernote-bs4.min.css">

    <!-- Owlcarousel CSS -->


    <link rel="stylesheet" href="/front/plugins/owlcarousel/owl.carousel.min.css">


    <!-- Fancybox -->
    <link rel="stylesheet" href="/front/plugins/fancybox/jquery.fancybox.min.css">

    <!-- Mobile CSS-->
    <link rel="stylesheet" href="/front/plugins/intltelinput/css/intlTelInput.css">
    <link rel="stylesheet" href="/front/plugins/intltelinput/css/demo.css">

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="/front/plugins/datatables/datatables.min.css">

    <!-- Feather CSS -->
    <link rel="stylesheet" href="/front/css/feather.css">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="/assets/plugins/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="/front/css/stylenew.css">

    <!-- Style CSS -->
    <!-- Style CSS -->

    <link rel="stylesheet" href="/front/css/style-dynamic.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/custom.css">

    <style>
        .btn-jobbank {
            color: white;
            background-color: #007bff !important;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            text-transform: uppercase;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-jobbank:hover {
            background-color: #0056b3;
        }

    </style>
    <style>
        .category-card {
            transition: all 0.3s ease-in-out;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            border: 1px solid #ffffff22;
        }

        .category-card:hover::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0));
            z-index: 2;
        }

        .category-card:hover .view-btn {
            opacity: 1 !important;
        }
    </style>
    <style>
        .category-title-wrapper {
            background: linear-gradient(to top, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0));
            padding: 6px 10px;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 2;
        }

        .category-title {
            font-size: 14px;
            color: #fff;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.7);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }


    </style>
    <style>
        :root {
            --primary-color: #1A73E8; /* yoki logoga mos boshqa rang */
        }

        .nav-icon.active i,
        .nav-icon.active div {
            color: var(--primary-color) !important;
        }
    </style>
    <style>
        .banner-img-mobile {
            width: 100% !important;
            max-height: 320px !important;
            object-fit: contain;
            display: block;
            margin: 0 auto;
            padding: 0;
            border-radius: 0;
        }


    </style>
</head>
<body data-frontend="home" data-lang="uz">

<div id="pageLoader" class="loader_front">
    <div class="loader-content">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <p>Sending OTP, please wait...</p>
    </div>
</div>

<div id="NewletterpageLoader" class="loader_front">
    <div class="loader-content">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <p>Sending Newsletter, please wait...</p>
    </div>
</div>


<div class="mobile-header sticky-top bg-white shadow-sm py-2 px-3 d-md-none">
    <div class="d-flex align-items-center justify-content-between">


        <a href="https://jobbank.uz">
            <img src="/admin/assets/img/logo.png" alt="Logo" style="height: 35px;">
        </a>


        <div class="d-flex align-items-center gap-3">


            <div class="dropdown">
                <button class="btn p-0 border-0 bg-transparent d-flex align-items-center" type="button"
                        id="langDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src='/front/img/flags/uz.png' alt="flag" style="height: 24px;">
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="langDropdown">
                    <li>
                        <a class="dropdown-item d-flex align-items-center language-select" data-id="1" href="#">
                            <img src="/front/img/flags/en.png" width="20" class="me-2">
                            English
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center language-select" data-id="24" href="#">
                            <img src="/front/img/flags/uz.png" width="20" class="me-2">
                            Uzbek
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center language-select" data-id="25" href="#">
                            <img src="/front/img/flags/ru.png" width="20" class="me-2">
                            Русский
                        </a>
                    </li>
                </ul>
            </div>


            <a href="tel:+998884455544" class="text-decoration-none d-flex align-items-center gap-1">
                <i class="fa fa-phone" style="font-size: 20px; color: var(--primary-color);"></i>
            </a>


        </div>
    </div>
</div>


<!-- Header -->
<header class="header header-new d-none d-md-block">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
          <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
          </span>
                </a>
                <a href="https://jobbank.uz" class="navbar-brand logo">
                    <img src="/admin/assets/img/logo.png" class="img-fluid" alt="Logo">
                </a>
                <a href="https://jobbank.uz" class="navbar-brand logo-small">
                    <img src="/admin/assets/img/logo.png" class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="https://jobbank.uz" class="menu-logo">
                        <img src="/admin/assets/img/logo.png" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="fas fa-times"></i></a>
                </div>
                <div class="mobile-header d-flex flex-column justify-content-between h-100">
                    <ul class="main-nav align-items-lg-center list-menus">
                        <li class="d-none d-lg-block">
                            <div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle bg-light-300 fw-medium"
                                       data-bs-toggle="dropdown">
                                        <i class="ti ti-layout-grid me-1"></i>Kategoriyalar
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="/services/santexnika-xizmati">
                                                Santexnika xizmati
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="/services/elektrika-xizmati">
                                                Elektrika xizmati
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="/services/maishiy-texnika-xizmati">
                                                Maishiy texnika xizmati
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="/services/uy-tamirlash-xizmati">
                                                Uy ta`mirlash xizmati
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="/services/tozalash-xizmati">
                                                Tozalash xizmati
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="/services/dizenfeksiya-xizmati">
                                                Dizenfeksiya xizmati
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="active ">
                            <a href="index.html" target="_self">
                                Bosh sahifa
                            </a>
                        </li>
                        <li class=" ">
                            <a href="/about-us" target="_self">
                                Biz haqimizda
                            </a>
                        </li>
                        <li class=" ">
                            <a href="service.html" target="_self">
                                Xizmatlar
                            </a>
                        </li>
                        <li class=" blog_menu">
                            <a href="/blogs" target="_self">
                                Bloglar
                            </a>
                        </li>
                        <li class=" ">
                            <a href="/contact-us" target="_self">
                                Biz bilan bog'laning
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-bs-toggle="modal"
                               data-bs-target="#provider">
                                Xizmat Ko`rsatuvchi Bo`lish
                            </a>
                        </li>
                        <li class="d-none d-lg-block">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle d-flex align-items-center language-selects"
                                        type="button" id="languageDropdown" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    <img src="/front/img/flags/uz.png" class="me-2" alt="Logo">

                                </button>
                                <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center language-select" data-id="1"
                                           href="javascript:void(0);">
                                            <img src="/front/img/flags/en.png" class="me-2" alt="Logo">
                                            English
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center language-select" data-id="24"
                                           href="javascript:void(0);">
                                            <img src="/front/img/flags/uz.png" class="me-2" alt="Logo">
                                            Uzbek
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center language-select" data-id="25"
                                           href="javascript:void(0);">
                                            <img src="/front/img/flags/ru.png" class="me-2" alt="Logo">
                                            Русский
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item px-3 py-1 w-100 d-lg-none d-block">
                            <div class="dropdown w-100">
                                <button
                                    class="btn w-100 text-start dropdown-toggle d-flex align-items-center justify-content-between language-selects"
                                    type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">


                                    <img src="/front/img/flags/uz.png" class="me-2" alt="Logo">
                                    <span>Uzbek</span>
                                </button>

                                <ul class="dropdown-menu w-100" aria-labelledby="languageDropdown">
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center language-select" data-id="1"
                                           href="javascript:void(0);">
                                            <img src="/front/img/flags/en.png" class="me-2" alt="Logo">
                                            English
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center language-select" data-id="24"
                                           href="javascript:void(0);">
                                            <img src="/front/img/flags/uz.png" class="me-2" alt="Logo">
                                            Uzbek
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center language-select" data-id="25"
                                           href="javascript:void(0);">
                                            <img src="/front/img/flags/ru.png" class="me-2" alt="Logo">
                                            Русский
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                    <ul>
                        <li class="nav-item px-3 py-1 w-100 d-lg-none d-block">
                            <a class="nav-link btn btn-light" href="#" data-bs-toggle="modal"
                               data-bs-target="#login-modal"><i class="ti ti-lock me-2"></i>Kirish</a>
                        </li>
                        <li class="nav-item px-3 py-1 mb-3 d-lg-none d-block">
                            <a class="nav-link btn btn-jobbank" href="#" data-bs-toggle="modal"
                               data-bs-target="#register-modal"><i class="ti ti-user-filled me-2"></i>Ro`yxatdan o`tish</a>
                        </li>

                    </ul>
                </div>
            </div>

            <ul class="nav header-navbar-rht">
                <li class="nav-item pe-1">
                    <a class="nav-link btn btn-light" href="#" data-bs-toggle="modal" data-bs-target="#login-modal"><i
                            class="ti ti-lock me-2"></i>Kirish</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-jobbank" href="#" data-bs-toggle="modal"
                       data-bs-target="#register-modal"><i class="ti ti-user-filled me-2"></i>Ro`yxatdan o`tish</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<!-- /Header -->

<!-- Mobile Bottom Navbar -->
<div class="mobile-nav d-flex justify-content-around align-items-center d-md-none fixed-bottom bg-white border-top shadow-sm py-2 px-1">

    <!-- Bosh sahifa -->
    <a href="index.html" class="nav-icon text-center active">
        <i class="ti ti-home fs-20"></i>
        <div class="small">Bosh sahifa</div>
    </a>

    <!-- Xizmatlar (Offcanvas) -->
    <a href="service.html" class="nav-icon text-center  ">
        <i class="ti ti-layout-grid fs-20"></i>
        <div class="small">Xizmatlar</div>
    </a>

    <!-- Blog -->
    <a href="/blogs" class="nav-icon text-center ">
        <i class="ti ti-notebook fs-20"></i>
        <div class="small">Blog</div>
    </a>


    <!-- Kirish / Kabinet -->
    <!-- Mobil Nav ichida -->
    <a href="#" class="nav-icon text-center" data-bs-toggle="modal" data-bs-target="#authRoleModal">
        <i class="ti ti-lock fs-20"></i>
        <div class="small">Kirish</div>
    </a>

</div>

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
            <div class="col d-flex">
                <a href="/services/santexnika-xizmati" class="text-decoration-none flex-fill">
                    <div class="position-relative category-card d-flex flex-column justify-content-between"
                         style="height: 160px; border-radius: 12px; overflow: hidden; background: url('/storage/categoriesIcon/TYyYNAxG06DAo67siLZBScGwZV1lsad5wa3rwYkq.png') center/cover no-repeat; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: 0.3s;">


                        <div class="position-absolute top-0 start-0 w-100 h-100"
                             style="background-color: rgba(0, 0, 0, 0.4); z-index: 1;"></div>


                        <div class="category-title-wrapper">
                            <h6 class="category-title mb-0" title="Santexnika xizmati">Santexnika xizmati</h6>
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
            <div class="col d-flex">
                <a href="/services/elektrika-xizmati" class="text-decoration-none flex-fill">
                    <div class="position-relative category-card d-flex flex-column justify-content-between"
                         style="height: 160px; border-radius: 12px; overflow: hidden; background: url('/storage/categoriesIcon/bJbiBnOE4MCrz0YkhZV2UxWkz46BSWCkfaOTsHFk.png') center/cover no-repeat; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: 0.3s;">


                        <div class="position-absolute top-0 start-0 w-100 h-100"
                             style="background-color: rgba(0, 0, 0, 0.4); z-index: 1;"></div>


              jobbank          <div class="category-title-wrapper">
                            <h6 class="category-title mb-0" title="Elektrika xizmati">Elektrika xizmati</h6>
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
            <div class="col d-flex">
                <a href="/services/maishiy-texnika-xizmati" class="text-decoration-none flex-fill">
                    <div class="position-relative category-card d-flex flex-column justify-content-between"
                         style="height: 160px; border-radius: 12px; overflow: hidden; background: url('/storage/categoriesIcon/kI4LVou2DpxzRn6lWWr2twbhezzgYgdAF9IgG0eJ.png') center/cover no-repeat; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: 0.3s;">


                        <div class="position-absolute top-0 start-0 w-100 h-100"
                             style="background-color: rgba(0, 0, 0, 0.4); z-index: 1;"></div>


                        <div class="category-title-wrapper">
                            <h6 class="category-title mb-0" title="Maishiy texnika xizmati">Maishiy texnika xizmati</h6>
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
            <div class="col d-flex">
                <a href="/services/uy-tamirlash-xizmati" class="text-decoration-none flex-fill">
                    <div class="position-relative category-card d-flex flex-column justify-content-between"
                         style="height: 160px; border-radius: 12px; overflow: hidden; background: url('/storage/categoriesIcon/bEVcSHxeYSOQw19PhkgeYKH1PvB2AUDOKEk7AThH.png') center/cover no-repeat; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: 0.3s;">


                        <div class="position-absolute top-0 start-0 w-100 h-100"
                             style="background-color: rgba(0, 0, 0, 0.4); z-index: 1;"></div>


                        <div class="category-title-wrapper">
                            <h6 class="category-title mb-0" title="Uy ta`mirlash xizmati">Uy ta`mirlash xizmati</h6>
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
            <div class="col d-flex">
                <a href="/services/tozalash-xizmati" class="text-decoration-none flex-fill">
                    <div class="position-relative category-card d-flex flex-column justify-content-between"
                         style="height: 160px; border-radius: 12px; overflow: hidden; background: url('/storage/categoriesIcon/ox2y1SuY1cb5GFJPa5JKRd9fPVyS75OirpfTSFpU.png') center/cover no-repeat; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: 0.3s;">


                        <div class="position-absolute top-0 start-0 w-100 h-100"
                             style="background-color: rgba(0, 0, 0, 0.4); z-index: 1;"></div>


                        <div class="category-title-wrapper">
                            <h6 class="category-title mb-0" title="Tozalash xizmati">Tozalash xizmati</h6>
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
            <div class="col d-flex">
                <a href="/services/dizenfeksiya-xizmati" class="text-decoration-none flex-fill">
                    <div class="position-relative category-card d-flex flex-column justify-content-between"
                         style="height: 160px; border-radius: 12px; overflow: hidden; background: url('/storage/categoriesIcon/UzannVjFlQPADxiXk1L8RV7gL6OXj6TUUX7RSQqe.png') center/cover no-repeat; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: 0.3s;">


                        <div class="position-absolute top-0 start-0 w-100 h-100"
                             style="background-color: rgba(0, 0, 0, 0.4); z-index: 1;"></div>


                        <div class="category-title-wrapper">
                            <h6 class="category-title mb-0" title="Dizenfeksiya xizmati">Dizenfeksiya xizmati</h6>
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


<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-xl-4">
                    <div class="footer-widget">
                        <div class="card bg-light-200 border-0 mb-3">
                            <div class="card-body">
                                <h5 class="mb-3">Ro‘yxatdan o‘ting va obuna bo‘ling</h5>
                                <form id="subscriberForm" autocomplete="off" novalidate="novalidate">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="subscriber_email"
                                               id="subscriber_email"
                                               placeholder="Elektron pochta manzilingizni kiriting">
                                        <span class="text-danger error-text" id="subscriber_email_error"></span>
                                    </div>
                                    <button type="submit" class="btn-sm btn-jobbank w-100" id="subscriberBtn">Obuna
                                        bo‘ling
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="d-flex align-items-center ">
                            <h6 class="fs-14 fw-normal me-2">Ilovamizni yuklab oling</h6>
                            <img src="/front/img/icons/app-store.svg" class="me-2" alt="img">
                            <img src="/front/img/icons/goolge-play.svg" class="me-2" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <div>
                            <p class="mb-2 text-start"></p>
                        </div>
                        <ul class="menu-links mb-2">
                            <li>
                                <a href="/terms-conditions">Shartlar va Qoidalar</a>
                            </li>
                            <li>
                                <a href="/privacy-policy">Maxfiylik Siyosati</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</body>
</html>
