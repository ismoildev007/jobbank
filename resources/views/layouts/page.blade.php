<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="u5ecyw7iT68XZ89HvCzUSXrUbD1K5fzng1ieG3iH">
    <meta name="description" content="Jobbank.uz - Turli xizmatlar uchun eng yaxshi platforma. Santexnika, elektrika, maishiy texnika ta'miri va boshqa xizmatlarni toping.">
    <meta name="keywords" content="xizmatlar, santexnika, elektrika, maishiy texnika, Jobbank.uz">
    <meta name="author" content="Jobbank Team">
    <title>Jobbank.uz - Xizmatlar Platformasi</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/admin/assets/img/logo.png">
    <link rel="stylesheet" href="/front/css/bootstrap.min.css">

    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="/front/css/bootstrap-datetimepicker.min.css">

    <!-- Toastr CSS -->
    <link href="/assets/plugins/toastr/toatr.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link rel="stylesheet" href="/front/css/animate.css">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="/front/plugins/tabler-icons/tabler-icons.css">
    <link href="https://unpkg.com/@tabler/icons-webfont@latest/tabler-icons.min.css" rel="stylesheet">

    <!-- Fontawesome Icon CSS -->
    <link rel="stylesheet" href="/front/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/front/plugins/fontawesome/css/all.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="/front/plugins/select2/css/select2.min.css">

    <!-- Summernote CSS -->
    <link rel="stylesheet" href="/assets/plugins/summernote/summernote-bs4.min.css">

    <!-- Owlcarousel CSS -->
    <link rel="stylesheet" href="/front/plugins/owlcarousel/owl.carousel.min.css">

    <!-- Fancybox -->
    <link rel="stylesheet" href="/front/plugins/fancybox/jquery.fancybox.min.css">

    <!-- Mobile CSS -->
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
            --primary-color: #1A73E8;
        }

        .nav-icon.active i,
        .nav-icon.active div {
            color: var(--primary-color) !important;
        }

        /* Mobil header uchun CSS qoidalarini aniqlashtirish */
        .mobile-header {
            display: none; /* Dastlab yashiriladi */
            position: fixed !important; /* Sticky effekt uchun */
            top: 0 !important; /* Yuqorida joylashishi uchun */
            left: 0 !important;
            width: 100% !important;
            z-index: 1000 !important; /* Boshqa elementlar ustida bo‘lishi uchun */
            background-color: #fff !important; /* Fon rangi */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1) !important; /* Soya */
        }

        /* Mobil qurilmalarda ko‘rsatish */
        @media (max-width: 767.98px) {
            .mobile-header {
                display: block !important; /* Mobil qurilmalarda ko‘rsatiladi */
            }
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
        <p>Yuklanmoqda, iltimos kuting...</p>
    </div>
</div>

<div id="NewletterpageLoader" class="loader_front">
    <div class="loader-content">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <p>Yangiliklar obunasi yuborilmoqda, iltimos kuting...</p>
    </div>
</div>

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
                    <img src="/admin/assets/img/logo.png" class="img-fluid" alt="Jobbank.uz Logo">
                </a>
                <a href="https://jobbank.uz" class="navbar-brand logo-small">
                    <img src="/admin/assets/img/logo.png" class="img-fluid" alt="Jobbank.uz Logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="https://jobbank.uz" class="menu-logo">
                        <img src="/admin/assets/img/logo.png" class="img-fluid" alt="Jobbank.uz Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <div class="mobile-header d-flex flex-column justify-content-between h-100">
                    <ul class="main-nav align-items-lg-center list-menus">
                        <li class="d-none d-lg-block">
                            <div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle bg-light-300 fw-medium" data-bs-toggle="dropdown">
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
                                                Uy ta'mirlash xizmati
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
                        <li class="active">
                            <a href="/" target="_self">
                                Bosh sahifa
                            </a>
                        </li>
                        <li>
                            <a href="/about-us" target="_self">
                                Biz haqimizda
                            </a>
                        </li>
                        <li>
                            <a href="/services" target="_self">
                                Xizmatlar
                            </a>
                        </li>
                        <li class="blog_menu">
                            <a href="/blogs" target="_self">
                                Bloglar
                            </a>
                        </li>
                        <li>
                            <a href="/contact-us" target="_self">
                                Biz bilan bog'laning
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#provider">
                                Xizmat Ko‘rsatuvchi Bo‘lish
                            </a>
                        </li>
                        <li class="d-none d-lg-block">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle d-flex align-items-center language-selects" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="/front/img/flags/uz.png" class="me-2" alt="Uzbek Flag">
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center language-select" data-id="1" href="javascript:void(0);">
                                            <img src="/front/img/flags/en.png" class="me-2" alt="English Flag">
                                            English
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center language-select" data-id="24" href="javascript:void(0);">
                                            <img src="/front/img/flags/uz.png" class="me-2" alt="Uzbek Flag">
                                            Uzbek
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center language-select" data-id="25" href="javascript:void(0);">
                                            <img src="/front/img/flags/ru.png" class="me-2" alt="Russian Flag">
                                            Русский
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item px-3 py-1 w-100 d-lg-none d-block">
                            <div class="dropdown w-100">
                                <button class="btn w-100 text-start dropdown-toggle d-flex align-items-center justify-content-between language-selects" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="/front/img/flags/uz.png" class="me-2" alt="Uzbek Flag">
                                    <span>Uzbek</span>
                                </button>
                                <ul class="dropdown-menu w-100" aria-labelledby="languageDropdown">
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center language-select" data-id="1" href="javascript:void(0);">
                                            <img src="/front/img/flags/en.png" class="me-2" alt="English Flag">
                                            English
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center language-select" data-id="24" href="javascript:void(0);">
                                            <img src="/front/img/flags/uz.png" class="me-2" alt="Uzbek Flag">
                                            Uzbek
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center language-select" data-id="25" href="javascript:void(0);">
                                            <img src="/front/img/flags/ru.png" class="me-2" alt="Russian Flag">
                                            Русский
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <ul class="nav header-navbar-rht">
                <li class="nav-item pe-1">
                    <a class="nav-link btn btn-light" href="#" data-bs-toggle="modal" data-bs-target="#login-modal" id="header-login">
                        <i class="ti ti-lock me-2"></i>Kirish
                    </a>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-jobbank" id="header-register">
                        <i class="ti ti-user-filled me-2"></i>Ro‘yxatdan o‘tish
                    </button>
                </li>
            </ul>
        </nav>
    </div>
</header>

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
                                        <input type="text" class="form-control" name="subscriber_email" id="subscriber_email" placeholder="Elektron pochta manzilingizni kiriting">
                                        <span class="text-danger error-text" id="subscriber_email_error"></span>
                                    </div>
                                    <button type="submit" class="btn-sm btn-jobbank w-100" id="subscriberBtn">Obuna bo‘ling</button>
                                </form>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <h6 class="fs-14 fw-normal me-2">Jobbank.uz ilovasini yuklab oling</h6>
                            <img src="/front/img/icons/app-store.svg" class="me-2" alt="App Store">
                            <img src="/front/img/icons/goolge-play.svg" class="me-2" alt="Google Play">
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
                            <p class="mb-2 text-start">© 2025 Jobbank.uz - Barcha huquqlar himoyalangan.</p>
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

<style>
    /* Modalning asl holatini belgilash */
    .modal.fade .modal-dialog {
        transform: translateY(-50px);
        opacity: 0;
        transition: all 0.5s ease-in-out;
    }

    /* Modal ochilganda */
    .modal.fade.show .modal-dialog {
        transform: translateY(0);
        opacity: 1;
    }

    /* Modal yopilganda */
    .modal.fade:not(.show) .modal-dialog {
        transform: translateY(-50px);
        opacity: 0;
    }

    /* Modal fonining animatsiyasi */
    .modal.fade {
        transition: opacity 0.5s ease-in-out;
    }

    .modal.fade:not(.show) {
        opacity: 0;
    }

    .modal.fade.show {
        opacity: 1;
    }

    .user-type-btn {
        transition: all 0.3s ease;
    }

    .user-type-btn.active {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }
</style>

<div class="modal fade" id="login-modal" style="display: none;" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">
                <a href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled fs-20"></i></a>
            </div>
            <div class="modal-body p-4">
                <form action="{{ route('authenticate') }}" method="POST" autocomplete="off" novalidate="novalidate">
                    @csrf
                    <div class="text-center mb-3">
                        <h3 class="mb-2">Jobbank.uz ga xush kelibsiz</h3>
                        <p>Hisobingizga kirish uchun ma’lumotlaringizni kiriting</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefon raqami</label>
                        <input type="text" name="phone" class="form-control" placeholder="Telefon raqamini kiriting" autocomplete="tel">
                    </div>
                    <div class="mb-3">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <label class="form-label">Parol</label>
                            <a href="javascript:void(0);" class="text-primary fw-medium text-decoration-underline mb-1 fs-14" data-bs-toggle="modal" data-bs-target="#forgot-modal">Parolni unutdingizmi?</a>
                        </div>
                        <div class="input-group">
                            <input type="password" name="password" id="login_password" class="form-control" maxlength="100" placeholder="Parolingizni kiriting" autocomplete="current-password">
                            <button class="btn btn-outline-dark" type="button" id="loginTogglePassword" tabindex="-1">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                        <div class="invalid-feedback" id="password_error"></div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex align-items-center justify-content-end flex-wrap row-gap-2">
                            <div class="form-check">
                                <a class="form-check-label text-decoration-underline" id="otp_signin2" for="otp_signin" style="cursor: pointer;">
                                    OTP orqali tizimga kirish
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="error_login_message" class="text-danger text-center m-1"></div>
                    <div class="mb-3">
                        <button type="submit" class="login_btn btn btn-lg btn-jobbank w-100">Kirish</button>
                    </div>
                    <div class="login-or mb-3">
                        <span class="span-or">Yoki quyidagi bilan kirish</span>
                    </div>
                    <div class="d-flex justify-content-center">
                        <p>Hisobingiz yo'qmi? <a href="javascript:void(0);" class="text-primary" data-bs-toggle="modal" data-bs-target="#register-modal">Jobbank.uz ga qo'shiling</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="register-modal" tabindex="-1" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">
                <a href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled fs-20"></i></a>
            </div>
            <div class="modal-body p-4">
                <form action="{{ route('user.register') }}" method="POST" autocomplete="off" novalidate="novalidate">
                    @csrf
                    <input type="hidden" name="role" id="role" value="0">

                    <div class="text-center mb-3">
                        <div class="btn-group mb-3" role="group">
                            <button type="button" class="btn btn-outline-primary user-type-btn active" data-type="user">Foydalanuvchi</button>
                            <button type="button" class="btn btn-outline-primary user-type-btn mx-2" data-type="provider">Xizmat ko‘rsatuvchi</button>
                        </div>
                        <h3 class="mb-2" id="register-title">Foydalanuvchi sifatida ro‘yxatdan o‘tish</h3>
                        <p>Jobbank.uz hisobingizni yaratish uchun ma’lumotlaringizni kiriting</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">To‘liq ism</label>
                        <input type="text" name="full_name" id="full_name" class="form-control" maxlength="255" placeholder="To‘liq ismingizni kiriting">
                        <div class="invalid-feedback" id="full_name_error">@error('full_name') {{ $message }} @enderror</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefon raqami</label>
                        <div class="iti iti--allow-dropdown iti--separate-dial-code">
                            <div class="iti__flag-container">
                                <div class="iti__selected-flag" role="combobox" aria-controls="iti-0__country-listbox" aria-owns="iti-0__country-listbox" aria-expanded="false" tabindex="0" title="Uzbekistan (Oʻzbekiston): +998" aria-activedescendant="iti-0__item-uz">
                                    <div class="iti__flag iti__uz"></div>
                                    <div class="iti__selected-dial-code">+998</div>
                                    <div class="iti__arrow"></div>
                                </div>
                                <ul class="iti__country-list iti__hide" id="iti-0__country-listbox" role="listbox" aria-label="List of countries">
                                    <li class="iti__country iti__standard iti__active" tabindex="-1" id="iti-0__item-uz" role="option" data-dial-code="998" data-country-code="uz" aria-selected="true">
                                        <div class="iti__flag-box">
                                            <div class="iti__flag iti__uz"></div>
                                        </div>
                                        <span class="iti__country-name">Uzbekistan (Oʻzbekiston)</span>
                                        <span class="iti__dial-code">+998</span>
                                    </li>
                                </ul>
                            </div>
                            <input class="form-control" id="phone" name="phone" maxlength="12" type="tel" placeholder="Telefon raqamini kiriting" autocomplete="tel" data-intl-tel-input-id="0" style="padding-left: 96px;">
                        </div>
                        <div class="invalid-feedback" id="phone_error">@error('phone') {{ $message }} @enderror</div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <label class="form-label">Parol</label>
                        </div>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control" maxlength="100" placeholder="Parolingizni kiriting" autocomplete="current-password">
                            <button class="btn btn-outline-dark" type="button" id="togglePassword" tabindex="-1">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                        <div class="invalid-feedback" id="password_error">@error('password') {{ $message }} @enderror</div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <label class="form-label">Parolni tasdiqlash</label>
                        </div>
                        <div class="input-group">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" maxlength="100" placeholder="Parolingizni tasdiqlang" autocomplete="current-password">
                            <button class="btn btn-outline-dark" type="button" id="togglePasswordConfirmation" tabindex="-1">
                                <i class="fas fa-eye" id="toggleIconConfirmation"></i>
                            </button>
                        </div>
                        <div class="invalid-feedback" id="password_confirmation_error">@error('password_confirmation') {{ $message }} @enderror</div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2">
                            <div class="form-check">
                                <input class="form-check-input" name="terms_policy" type="checkbox" value="1" id="terms_policy">
                                <label class="form-check-label" for="terms_policy">
                                    Men roziman <a href="https://jobbank.uz/terms-conditions" class="text-primary text-decoration-underline">Shartlar va Qoidalar</a> & <a href="https://jobbank.uz/privacy-policy" class="text-primary text-decoration-underline">Maxfiylik Siyosati</a>
                                </label>
                                <div class="invalid-feedback" id="terms_policy_error">@error('terms_policy') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" id="register_btn" class="register_btn btn btn-lg btn-linear-primary w-100">Ro‘yxatdan o‘tish</button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <p>Hisobingiz bormi? <a href="javascript:void(0);" type="submit" class="text-primary" data-bs-target="#login-modal" data-bs-toggle="modal">Kirish</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Bottom Navbar -->
<div class="mobile-nav d-flex justify-content-around align-items-center d-md-none fixed-bottom bg-white border-top shadow-sm py-2 px-1">
    <!-- Bosh sahifa -->
    <a href="/" class="nav-icon text-center active">
        <i class="ti ti-home fs-20"></i>
        <div class="small">Bosh sahifa</div>
    </a>
    <!-- Xizmatlar -->
    <a href="/services" class="nav-icon text-center">
        <i class="ti ti-layout-grid fs-20"></i>
        <div class="small">Xizmatlar</div>
    </a>
    <!-- Blog -->
    <a href="/blogs" class="nav-icon text-center">
        <i class="ti ti-notebook fs-20"></i>
        <div class="small">Blog</div>
    </a>
    <!-- Kirish / Kabinet -->
    <a href="#" class="nav-icon text-center" data-bs-toggle="modal" data-bs-target="#authRoleModal">
        <i class="ti ti-lock fs-20"></i>
        <div class="small">Kirish</div>
    </a>
</div>

<!-- Mobil header -->
<div class="mobile-header sticky-top bg-white shadow-sm py-2 px-3 d-md-none">
    <div class="d-flex align-items-center justify-content-between">
        <a href="https://jobbank.uz">
            <img src="/admin/assets/img/logo.png" alt="Jobbank.uz Logo" style="height: 35px;">
        </a>
        <div class="d-flex align-items-center gap-3">
            <div class="dropdown">
                <button class="btn p-0 border-0 bg-transparent d-flex align-items-center" type="button" id="langDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="/front/img/flags/uz.png" alt="Uzbek Flag" style="height: 24px;">
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="langDropdown">
                    <li>
                        <a class="dropdown-item d-flex align-items-center language-select" data-id="1" href="#">
                            <img src="/front/img/flags/en.png" width="20" class="me-2" alt="English Flag">
                            English
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center language-select" data-id="24" href="#">
                            <img src="/front/img/flags/uz.png" width="20" class="me-2" alt="Uzbek Flag">
                            Uzbek
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center language-select" data-id="25" href="#">
                            <img src="/front/img/flags/ru.png" width="20" class="me-2" alt="Russian Flag">
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const userTypeButtons = document.querySelectorAll('.user-type-btn');
        const registerTitle = document.getElementById('register-title');
        const roleInput = document.getElementById('role');

        userTypeButtons.forEach(button => {
            button.addEventListener('click', function () {
                userTypeButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                const type = this.getAttribute('data-type');
                if (type === 'user') {
                    registerTitle.textContent = 'Foydalanuvchi sifatida ro‘yxatdan o‘tish';
                    roleInput.value = '0';
                } else if (type === 'provider') {
                    registerTitle.textContent = 'Xizmat ko‘rsatuvchi sifatida ro‘yxatdan o‘tish';
                    roleInput.value = '1';
                }
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const registerLink = document.getElementById('header-register');
        const loginLink = document.getElementById('header-login');
        const registerModal = document.getElementById('register-modal');
        const loginModal = document.getElementById('login-modal');
        const closeModalBtn = registerModal.querySelector('[data-bs-dismiss="modal"]');

        registerLink.addEventListener('click', function (e) {
            e.preventDefault();
            registerModal.style.display = 'block';
            registerModal.classList.add('show');
            document.body.classList.add('modal-open');
        });
        loginLink.addEventListener('click', function (e) {
            e.preventDefault();
            loginModal.style.display = 'block';
            loginModal.classList.add('show');
            document.body.classList.add('modal-open');
        });

        closeModalBtn.addEventListener('click', function () {
            registerModal.style.display = 'none';
            loginModal.style.display = 'none';
            registerModal.classList.remove('show');
            loginModal.classList.remove('show');
            document.body.classList.remove('modal-open');
        });

        registerModal.addEventListener('click', function (e) {
            if (e.target === registerModal) {
                registerModal.style.display = 'none';
                registerModal.classList.remove('show');
                document.body.classList.remove('modal-open');
            }
        });
        loginModal.addEventListener('click', function (e) {
            if (e.target === loginModal) {
                loginModal.style.display = 'none';
                loginModal.classList.remove('show');
                document.body.classList.remove('modal-open');
            }
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && registerModal.classList.contains('show')) {
                registerModal.style.display = 'none';
                loginModal.style.display = 'none';
                registerModal.classList.remove('show');
                loginModal.classList.remove('show');
                document.body.classList.remove('modal-open');
            }
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>
