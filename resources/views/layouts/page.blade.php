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

@yield('content')

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
