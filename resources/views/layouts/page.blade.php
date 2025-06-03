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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/icons-sprite.svg">
    <link href="https://unpkg.com/@tabler/icons-webfont@latest/tabler-icons.min.css" rel="stylesheet">

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
            color: white;
        }

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

        :root {
            --primary-color: #1A73E8;
        }

        .nav-icon.active i,
        .nav-icon.active div {
            color: var(--primary-color) !important;
        }

        .banner-img-mobile {
            width: 100% !important;
            max-height: 320px !important;
            object-fit: contain;
            display: block;
            margin: 0 auto;
            padding: 0;
            border-radius: 0;
        }

        /* Header fixes */
        .header-new {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand img {
            height: 40px;
            width: auto;
        }

        /* Mobile header fixes */
        .mobile-header {
            background-color: #fff !important;
            border-bottom: 1px solid #e0e0e0;
            position: sticky;
            top: 0;
            z-index: 1001;
            padding: 10px 15px !important;
        }

        .mobile-header img {
            height: 35px !important;
            width: auto;
        }

        /* Mobile navigation fixes */
        .mobile-nav {
            background-color: #fff !important;
            border-top: 1px solid #e0e0e0;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 8px 5px !important;
        }

        .nav-icon {
            color: #666;
            text-decoration: none;
            padding: 5px;
            border-radius: 8px;
            transition: all 0.3s ease;
            flex: 1;
            max-width: 80px;
        }

        .nav-icon:hover,
        .nav-icon.active {
            color: var(--primary-color) !important;
            background-color: rgba(26, 115, 232, 0.1);
        }

        .nav-icon i {
            display: block;
            margin-bottom: 2px;
        }

        .nav-icon .small {
            font-size: 11px;
            line-height: 1.2;
        }

        /* Modal fixes */
        .modal.fade .modal-dialog {
            transform: translateY(-50px);
            opacity: 0;
            transition: all 0.3s ease-in-out;
        }

        .modal.show .modal-dialog {
            transform: translateY(0);
            opacity: 1;
        }

        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .user-type-btn {
            transition: all 0.3s ease;
            border: 1px solid #007bff;
        }

        .user-type-btn.active {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        /* Language dropdown fixes */
        .dropdown-menu {
            border: 1px solid #e0e0e0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        /* Form fixes */
        .form-control {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px 15px;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        /* Footer fixes */
        footer {
            margin-bottom: 70px; /* Mobil nav uchun joy */
        }

        @media (min-width: 768px) {
            footer {
                margin-bottom: 0;
            }

            .mobile-header,
            .mobile-nav {
                display: none !important;
            }
        }

        /* Content spacing */
        .main-content {
            padding-top: 20px;
            padding-bottom: 80px; /* Mobil nav uchun joy */
        }

        @media (min-width: 768px) {
            .main-content {
                padding-bottom: 20px;
            }
        }

        /* Loading spinner */
        .loader_front {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loader-content {
            text-align: center;
        }

        /* Responsive text */
        @media (max-width: 767px) {
            h1 { font-size: 1.8rem; }
            h2 { font-size: 1.5rem; }
            h3 { font-size: 1.3rem; }

            .btn {
                padding: 8px 16px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body data-frontend="home" data-lang="uz">

<!-- Loading Spinner -->
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

<!-- Mobile Header -->
<div class="mobile-header d-md-none">
    <div class="d-flex align-items-center justify-content-between">
        <a href="https://jobbank.uz">
            <img src="https://via.placeholder.com/120x40/007bff/ffffff?text=JOBBANK" alt="Logo">
        </a>

        <div class="d-flex align-items-center gap-3">
            <!-- Language Dropdown -->
            <div class="dropdown">
                <button class="btn p-0 border-0 bg-transparent d-flex align-items-center" type="button"
                        id="langDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://via.placeholder.com/24x16/ff0000/ffffff?text=UZ" alt="flag" style="height: 24px; border-radius: 2px;">
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="langDropdown">
                    <li>
                        <a class="dropdown-item d-flex align-items-center language-select" data-id="1" href="#">
                            <img src="https://via.placeholder.com/20x14/0000ff/ffffff?text=EN" width="20" class="me-2">
                            English
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center language-select" data-id="24" href="#">
                            <img src="https://via.placeholder.com/20x14/ff0000/ffffff?text=UZ" width="20" class="me-2">
                            Uzbek
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center language-select" data-id="25" href="#">
                            <img src="https://via.placeholder.com/20x14/ffffff/ff0000?text=RU" width="20" class="me-2">
                            Русский
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Phone Link -->
            <a href="tel:+998884455544" class="text-decoration-none d-flex align-items-center gap-1">
                <i class="fa fa-phone" style="font-size: 20px; color: var(--primary-color);"></i>
            </a>
        </div>
    </div>
</div>

<!-- Desktop Header -->
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
                    <img src="https://via.placeholder.com/120x40/007bff/ffffff?text=JOBBANK" class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="https://jobbank.uz" class="menu-logo">
                        <img src="https://via.placeholder.com/120x40/007bff/ffffff?text=JOBBANK" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="fas fa-times"></i></a>
                </div>
                <div class="mobile-header d-flex flex-column justify-content-between h-100">
                    <ul class="main-nav align-items-lg-center list-menus">
                        <li class="d-none d-lg-block">
                            <div class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle bg-light-300 fw-medium"
                                   data-bs-toggle="dropdown">
                                    <i class="ti ti-layout-grid me-1"></i>Kategoriyalar
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/services/santexnika-xizmati">Santexnika xizmati</a></li>
                                    <li><a class="dropdown-item" href="/services/elektrika-xizmati">Elektrika xizmati</a></li>
                                    <li><a class="dropdown-item" href="/services/maishiy-texnika-xizmati">Maishiy texnika xizmati</a></li>
                                    <li><a class="dropdown-item" href="/services/uy-tamirlash-xizmati">Uy ta`mirlash xizmati</a></li>
                                    <li><a class="dropdown-item" href="/services/tozalash-xizmati">Tozalash xizmati</a></li>
                                    <li><a class="dropdown-item" href="/services/dizenfeksiya-xizmati">Dizenfeksiya xizmati</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="active"><a href="index.html" target="_self">Bosh sahifa</a></li>
                        <li><a href="/about-us" target="_self">Biz haqimizda</a></li>
                        <li><a href="service.html" target="_self">Xizmatlar</a></li>
                        <li class="blog_menu"><a href="/blogs" target="_self">Bloglar</a></li>
                        <li><a href="/contact-us" target="_self">Biz bilan bog'laning</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#provider">
                                Xizmat Ko`rsatuvchi Bo`lish
                            </a>
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
                        <i class="ti ti-user-filled me-2"></i>Ro`yxatdan o`tish
                    </button>
                </li>
            </ul>
        </nav>
    </div>
</header>

<!-- Main Content -->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-4">JobBank - Xizmatlar Platformasi</h1>
                <p class="text-center mb-4">Eng yaxshi xizmatlarni topish va taklif qilish uchun ishonchli platforma</p>

                <!-- Service Categories -->
                <div class="row g-3">
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card category-card h-100">
                            <div class="card-body text-center">
                                <i class="ti ti-tools fs-1 text-primary mb-3"></i>
                                <h6 class="card-title">Santexnika</h6>
                                <p class="small text-muted">Professional santexnika xizmatlari</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card category-card h-100">
                            <div class="card-body text-center">
                                <i class="ti ti-bolt fs-1 text-warning mb-3"></i>
                                <h6 class="card-title">Elektrika</h6>
                                <p class="small text-muted">Elektr montaj va ta'mirlash</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card category-card h-100">
                            <div class="card-body text-center">
                                <i class="ti ti-device-tv fs-1 text-info mb-3"></i>
                                <h6 class="card-title">Maishiy texnika</h6>
                                <p class="small text-muted">Texnika ta'mirlash xizmati</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card category-card h-100">
                            <div class="card-body text-center">
                                <i class="ti ti-home fs-1 text-success mb-3"></i>
                                <h6 class="card-title">Uy ta'mirlash</h6>
                                <p class="small text-muted">Uy va ofis ta'mirlash</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-light py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xl-4">
                <div class="footer-widget">
                    <div class="card bg-light-200 border-0 mb-3">
                        <div class="card-body">
                            <h5 class="mb-3">Ro'yxatdan o'ting va obuna bo'ling</h5>
                            <form id="subscriberForm" autocomplete="off">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="subscriber_email" id="subscriber_email"
                                           placeholder="Elektron pochta manzilingizni kiriting">
                                    <span class="text-danger error-text" id="subscriber_email_error"></span>
                                </div>
                                <button type="submit" class="btn-sm btn-jobbank w-100" id="subscriberBtn">Obuna bo'ling</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-3">
            <ul class="list-inline">
                <li class="list-inline-item"><a href="/terms-conditions">Shartlar va Qoidalar</a></li>
                <li class="list-inline-item"><a href="/privacy-policy">Maxfiylik Siyosati</a></li>
            </ul>
        </div>
    </div>
</footer>

<!-- Mobile Bottom Navigation -->
<div class="mobile-nav d-md-none">
    <a href="index.html" class="nav-icon active">
        <i class="ti ti-home fs-20"></i>
        <div class="small">Bosh sahifa</div>
    </a>
    <a href="service.html" class="nav-icon">
        <i class="ti ti-layout-grid fs-20"></i>
        <div class="small">Xizmatlar</div>
    </a>
    <a href="/blogs" class="nav-icon">
        <i class="ti ti-notebook fs-20"></i>
        <div class="small">Blog</div>
    </a>
    <a href="#" class="nav-icon" data-bs-toggle="modal" data-bs-target="#login-modal">
        <i class="ti ti-lock fs-20"></i>
        <div class="small">Kirish</div>
    </a>
</div>

<!-- Login Modal -->
<div class="modal fade" id="login-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <form action="#" method="POST" autocomplete="off">
                    <div class="text-center mb-3">
                        <h3 class="mb-2">Xush kelibsiz</h3>
                        <p>Hisobingizga kirish uchun ma'lumotlaringizni kiriting</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefon raqami</label>
                        <input type="text" name="phone" class="form-control" placeholder="Telefon raqamini kiriting">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Parol</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" placeholder="Parolingizni kiriting">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-jobbank w-100">Kirish</button>
                    </div>
                    <div class="text-center">
                        <p>Hisobingiz yo'qmi? <a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#register-modal">Bizga qo'shiling</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="register-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <form action="#" method="POST" autocomplete="off">
                    <input type="hidden" name="role" id="role" value="0">

                    <div class="text-center mb-3">
                        <div class="btn-group mb-3" role="group">
                            <button type="button" class="btn btn-outline-primary user-type-btn active" data-type="user">Foydalanuvchi</button>
                            <button type="button" class="btn btn-outline-primary user-type-btn" data-type="provider">Xizmat ko'rsatuvchi</button>
                        </div>
                        <h3 class="mb-2" id="register-title">Foydalanuvchi sifatida ro'yxatdan o'tish</h3>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">To'liq ism</label>
                        <input type="text" name="full_name" class="form-control" placeholder="To'liq ismingizni kiriting">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefon raqami</label>
                        <input type="text" name="phone" class="form-control" placeholder="Telefon raqamini kiriting">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Parol</label>
                        <input type="password" name="password" class="form-control" placeholder="Parolingizni kiriting">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Parolni tasdiqlash</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Parolingizni tasdiqlang">
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" name="terms_policy" type="checkbox" id="terms_policy">
                            <label class="form-check-label" for="terms_policy">
                                Men roziman <a href="#" class="text-primary">Shartlar va Qoidalar</a> & <a href="#" class="text-primary">Maxfiylik Siyosati</a>
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-jobbank w-100">Ro'yxatdan o'tish</button>
                    </div>
                    <div class="text-center">
                        <p>Hisobingiz bormi? <a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#login-modal">Kirish</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // User type selection
        const userTypeButtons = document.querySelectorAll('.user-type-btn');
        const registerTitle = document.getElementById('register-title');
        const roleInput = document.getElementById('role');

        userTypeButtons.forEach(button => {
            button.addEventListener('click', function () {
                userTypeButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                const type = this.getAttribute('data-type');
                if (type === 'user') {
                    registerTitle.textContent = 'Foydalanuvchi sifatida ro'yxatdan o'tish';
                    roleInput.value = '0';
                } else if (type === 'provider') {
                    registerTitle.textContent = 'Xizmat ko'rsatuvchi sifatida ro'yxatdan o'tish';
                    roleInput.value = '1';
                }
            });
        });

        // Mobile navigation active state
        const navLinks = document.querySelectorAll('.nav-icon');
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                // Don't change active state for modal triggers
                if (!this.hasAttribute('data-bs-toggle')) {
                    navLinks.forEach(nav => nav.classList.remove('active'));
                    this.classList.add('active');
                }
            });
        });

        // Language selection
        const languageSelects = document.querySelectorAll('.language-select');
        languageSelects.forEach(select => {
            select.addEventListener('click', function(e) {
                e.preventDefault();
                const langId = this.getAttribute('data-id');
                console.log('Selected language:', langId);
                // Bu yerda til o'zgartirish logikasini qo'shishingiz mumkin
            });
        });

        // Newsletter form
        const subscriberForm = document.getElementById('subscriberForm');
        if (subscriberForm) {
            subscriberForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const email = document.getElementById('subscriber_email').value;
                if (email) {
                    alert('Obuna uchun rahmat!');
                    this.reset();
                }
            });
        }

        // Category card hover effects
        const categoryCards = document.querySelectorAll('.category-card');
        categoryCards.forEach(card => {
            card.addEventListener('click', function() {
                console.log('Category clicked:', this.querySelector('.card-title').textContent);
            });
        });
    });
</script>

</body>
</html>
