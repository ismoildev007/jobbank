@php use Illuminate\Support\Facades\Auth; @endphp
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
                <a href="/" class="navbar-brand logo">
                    <img src="/admin/assets/img/logo.png" class="img-fluid" alt="Logo">
                </a>
                <a href="/" class="navbar-brand logo-small">
                    <img src="/admin/assets/img/logo.png" class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="/" class="menu-logo">
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
                            <a href="/" target="_self">
                                Bosh sahifa
                            </a>
                        </li>
                        <li class=" ">
                            <a href="#" target="_self">
                                Biz haqimizda
                            </a>
                        </li>
                        <li class=" ">
                            <a href="{{route('page.service')}}" target="_self">
                                Xizmatlar
                            </a>
                        </li>
                        <li class=" blog_menu">
                            <a href="" target="_self">
                                Bloglar
                            </a>
                        </li>
                        <li class=" ">
                            <a href="" target="_self">
                                Biz bilan bog'laning
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
                </div>
            </div>

            <ul class="nav">

                @guest
                    <!-- Guestlar uchun: Kirish va Ro'yxatdan o'tish -->
                    <li class="nav-item pe-1">
                        <a class="nav-link btn btn-light" href="#" data-bs-toggle="modal" data-bs-target="#login-modal" id="header-login">
                            <i class="ti ti-lock me-2"></i>Kirish
                        </a>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link btn btn-jobbank" id="header-register">
                            <i class="ti ti-user-filled me-2"></i>Ro`yxatdan o`tish
                        </button>
                    </li>
                @else
                    @php
                        $user = Auth::user();
                    @endphp

                    @if ($user->role === '1')
                        <!-- Provider -->
                        @if ($user->status === 'Aktiv')
                            <!-- Status active bo'lsa profilni ko'rsatamiz -->
                            <li class="nav-item ">
                                <a class="nav-link  d-flex align-items-center" href="{{route('services.index')}}" >
                                    <i class="ti ti-user fs-16 me-2"></i>
                                    <span>{{ $user->full_name }}</span>
                                </a>
                            </li>
                        @else
                            <!-- Status active emas, boshqa narsa yoki bo'sh -->
                            <li class="nav-item">
                                <a href="#" class="nav-link disabled">Provider status: Faol emas</a>
                            </li>
                        @endif
                    @else
                        <!-- Oddiy userlar uchun: Profil ikon va dropdown bosh qismda -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-user fs-16 me-2"></i>
                                <span>{{ $user->full_name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                                <li><a class="dropdown-item" href="{{ route('user.profile') }}">Profil</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item" type="submit">Chiqish</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endguest

            </ul>




        </nav>
    </div>
</header>
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

<!-- Mobile Bottom Navbar -->
<div class="mobile-nav d-flex justify-content-around align-items-center d-md-none fixed-bottom bg-white border-top shadow-sm px-3 py-2" style="height: 70px;">

    <!-- Bosh sahifa -->
    <a href="/" class="nav-icon text-center {{ request()->is('/') ? 'active' : '' }}">
        <i class="ti ti-home fs-24"></i>
        <div class="small">Bosh sahifa</div>
    </a>

    <!-- Xizmatlar -->
    <a href="#" class="nav-icon text-center {{ Route::is('page.service') ? 'active' : '' }}">
        <i class="ti ti-layout-grid fs-24"></i>
        <div class="small">Xizmatlar</div>
    </a>

    <!-- Tezkor xizmatlar (Markazda joylashgan, Bootstrap Icons bilan) -->
    <a href="#tezkor-form" class="nav-icon text-center position-relative" data-bs-toggle="modal">
        <div class="quick-btn rounded-circle d-flex justify-content-center align-items-center shadow" style="width: 50px; height: 50px; margin-top: -25px; border: 2px solid #0056b3;">
            <i class="bi bi-lightning-fill fs-20" style="color: #0056b3;"></i>
        </div>
        <div class="small text-dark mt-1" style="font-weight: 500;">Tezkor</div>
    </a>

    <!-- Sevimlilar -->
    <a href="#" class="nav-icon text-center {{ Route::is('favorites.index') ? 'active' : '' }}">
        <i class="ti ti-heart fs-24"></i>
        <div class="small">Sevimlilar</div>
    </a>

    <!-- Profil yoki Kirish -->
    @guest
        <a href="#" class="nav-icon text-center" data-bs-toggle="modal" data-bs-target="#login-modal" id="header-login">
            <i class="ti ti-lock fs-24"></i>
            <div class="small">Kirish</div>
        </a>
    @else
        @php
            $user = Auth::user();
            $nameWords = explode(' ', $user->full_name);
            $displayName = $nameWords[0];
        @endphp
        <a href="#" class="nav-icon text-center {{ request()->is('user/profile') ? 'active' : '' }}">
            <i class="ti ti-user fs-24"></i>
            <div class="small">{{ $displayName }}</div>
        </a>
    @endguest

</div>

<!-- Tezkor Xizmat Formasi (Modal) -->
<div class="modal fade" id="tezkor-form" tabindex="-1" aria-labelledby="tezkorFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tezkorFormLabel">Tezkor Xizmat Uchun Ariza</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Ismingiz</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="service" class="form-label">Xizmat turi</label>
                        <select class="form-select" id="service" required>
                            <option value="">Tanlang</option>
                            <option value="repair">Ta'mirlash</option>
                            <option value="delivery">Yetkazib berish</option>
                            <option value="consultation">Maslahat</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Izoh</label>
                        <textarea class="form-control" id="description" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark w-100">Yuborish</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- CSS -->
<style>
    .quick-btn {
        transition: all 0.3s ease;
        width: 40px!important;
        height: 40px!important;
        margin-top: 4px!important;
        border: 2px solid #0056b3;
        background-color: transparent;
        animation: pulse 2s infinite;
    }
    .quick-btn:hover {
        transform: scale(1.2);
        box-shadow: 0px 10px 20px #0056b3;
    }
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }
    .nav-icon .small {
        font-size: 0.7rem;
    }
    .modal-content {
        border-radius: 10px;
    }
    .btn-close {
        font-size: 1.5rem;
    }
</style>

<!-- JavaScript va Bootstrap uchun CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
