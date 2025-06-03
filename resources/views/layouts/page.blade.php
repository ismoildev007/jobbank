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



<x-page.header></x-page.header>



@yield('content')
<x-page.footer></x-page.footer>


<style>
    /* Modalning asl holatini belgilash */
    .modal.fade .modal-dialog {
        transform: translateY(-50px); /* Modal yuqoridan boshlanadi */
        opacity: 0; /* Dastlab ko‘rinmaydi */
        transition: all 0.5s ease-in-out; /* Animatsiya 0.5 sekund davom etadi */
    }

    /* Modal ochilganda */
    .modal.fade.show .modal-dialog {
        transform: translateY(0); /* Modal o‘z joyiga keladi */
        opacity: 1; /* To‘liq ko‘rinadi */
    }

    /* Modal yopilganda */
    .modal.fade:not(.show) .modal-dialog {
        transform: translateY(-50px); /* Modal yana yuqoriga siljiydi */
        opacity: 0; /* Ko‘rinmaydi */
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
                        <h3 class="mb-2">Xush kelibsiz </h3>
                        <p>Hisobingizga kirish uchun ma’lumotlaringizni kiriting</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mobile Number</label>
                        <input type="text" name="phone" class="form-control" placeholder="Enter Mobile Number" autocomplete="tel">
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
                        <button type="submit" class="login_btn btn btn-lg     btn-jobbank  w-100">Kirish </button>
                    </div>
                    <div class="login-or mb-3">
                        <span class="span-or">Yoki quyidagi bilan kirish </span>
                    </div>
                    <div class="d-flex justify-content-center">
                        <p>Hisobingiz yo'qmi? <a href="javascript:void(0);" class="text-primary" data-bs-toggle="modal" data-bs-target="#register-modal"> Bizga qo'shiling</a>
                        </p>
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
                    <input type="hidden" name="role" id="role" value="0"> <!-- Role uchun hidden input -->

                    <div class="text-center mb-3">
                        <!-- Tugmalar -->
                        <div class="btn-group mb-3" role="group">
                            <button type="button" class="btn btn-outline-primary user-type-btn active" data-type="user">Foydalanuvchi</button>
                            <button type="button" class="btn btn-outline-primary user-type-btn mx-2" data-type="provider">Xizmat ko‘rsatuvchi</button>
                        </div>
                        <h3 class="mb-2" id="register-title">Foydalanuvchi sifatida ro‘yxatdan o‘tish</h3>
                        <p>Hisobingizga kirish uchun ma’lumotlaringizni kiriting</p>
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





<!-- Header -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const userTypeButtons = document.querySelectorAll('.user-type-btn');
        const registerTitle = document.getElementById('register-title');
        const roleInput = document.getElementById('role');

        userTypeButtons.forEach(button => {
            button.addEventListener('click', function () {
                // Barcha tugmalardan "active" klassini olib tashlash
                userTypeButtons.forEach(btn => btn.classList.remove('active'));
                // Tanlangan tugmaga "active" klassini qo‘shish
                this.classList.add('active');

                // Tugma turiga qarab sarlavha va role qiymatini o‘zgartirish
                const type = this.getAttribute('data-type');
                if (type === 'user') {
                    registerTitle.textContent = 'Foydalanuvchi sifatida ro‘yxatdan o‘tish';
                    roleInput.value = '0'; // Foydalanuvchi uchun role = 0
                } else if (type === 'provider') {
                    registerTitle.textContent = 'Xizmat ko‘rsatuvchi sifatida ro‘yxatdan o‘tish';
                    roleInput.value = '1'; // Xizmat ko‘rsatuvchi uchun role = 1
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

        // Modalni ochish
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

        // Modalni yopish (Close tugmasi bosilganda)
        closeModalBtn.addEventListener('click', function () {
            registerModal.style.display = 'none';
            loginModal.style.display = 'none';
            registerModal.classList.remove('show');
            loginModal.classList.remove('show');
            document.body.classList.remove('modal-open');
        });

        // Modal tashqarisiga bosilganda yopish
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

        // Klaviaturada Esc tugmasi bosilganda modalni yopish
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
<!-- Bootstrap JS (bundan oldin Popper.js ham kerak) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
