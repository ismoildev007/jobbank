<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="u5ecyw7iT68XZ89HvCzUSXrUbD1K5fzng1ieG3iH">
    <meta name="description" content="Truely Sell">
    <meta name="keywords" content="Truely Sell">
    <title>Jobbank</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

        .text-primary{
            color: #0056b3!important;
        }
        .btn-primary{
            background-color: #0056b3!important;
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
    <style>
        .user-type-btn {
            transition: all 0.3s ease;
        }
        .user-type-btn.active {
            background-color: #e6f0fa !important;
            color: #0056b3 !important;
            border-color: #0056b3 !important;
        }
        .user-type-btn:hover {
            background-color: #d1e3fa;
            border-color: #003d82;
        }
        .btn-primary {
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #003d82;
            border-color: #003d82;
        }
        .form-control:focus {
            border-color: #0056b3;
            box-shadow: 0 0 0 0.2rem rgba(0, 86, 179, 0.25);
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
<!-- Toast Container -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1080">
    <div id="error-toast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="error-toast-message">
                Xatolik yuz berdi!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Yopish"></button>
        </div>
    </div>
</div>

<!-- Script -->
<script>
    function showErrorAlert(message) {
        const toastElement = document.getElementById('error-toast');
        const toastBody = document.getElementById('error-toast-message');
        toastBody.textContent = message;

        const toast = new bootstrap.Toast(toastElement);
        toast.show();
    }
    function showLoader(message = 'Iltimos, kuting...') {
        const loader = document.getElementById('pageLoader');
        const text = loader.querySelector('p');
        text.textContent = message;
        loader.style.display = 'flex';
    }

    function hideLoader() {
        const loader = document.getElementById('pageLoader');
        loader.style.display = 'none';
    }
</script>

<div class="modal fade" id="login-modal" style="display: none;" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">
                <a href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled fs-20"></i></a>
            </div>
            <div class="modal-body p-4">
                <form id="login-form" action="{{ route('authenticate') }}" method="POST" autocomplete="off" novalidate="novalidate">
                    @csrf
                    <div class="text-center mb-3">
                        <h3 class="mb-2">Xush kelibsiz</h3>
                        <p>Hisobingizga kirish uchun ma’lumotlaringizni kiriting</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mobile Number</label>
                        <input type="text" name="phone" id="login-phone" class="form-control" placeholder="Enter Mobile Number" autocomplete="tel">
                        <div class="invalid-feedback" id="phone_error"></div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <label class="form-label">Parol</label>
                            <a href="javascript:void(0);" class="text-primary fw-medium text-decoration-underline mb-1 fs-14" data-bs-toggle="modal" data-bs-target="#forgot-modal">Parolni unutdingizmi?</a>
                        </div>
                        <div class="input-group">
                            <input type="password" name="password" id="login-password" class="form-control" maxlength="100" placeholder="Parolingizni kiriting" autocomplete="current-password">
                            <button class="btn btn-outline-dark" type="button" id="loginTogglePassword" tabindex="-1">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                        <div class="invalid-feedback" id="password_error"></div>
                    </div>
                    <div id="error_login_message" class="text-danger text-center m-1"></div>
                    <div class="mb-3">
                        <button type="submit" class="login_btn btn btn-lg btn-jobbank w-100">Kirish</button>
                    </div>
                </form>
                <div class="login-or mb-3">
                    <span class="span-or">Yoki quyidagi bilan kirish</span>
                </div>
                <div class="d-flex justify-content-center">
                    <p>Hisobingiz yo‘qmi? <a href="javascript:void(0);" class="text-primary" data-bs-toggle="modal" data-bs-target="#register-modal">Ro'yxatdan o'tish</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Password show/hide toggle
    document.getElementById('loginTogglePassword').addEventListener('click', function () {
        const password = document.getElementById('login-password');
        const icon = document.getElementById('toggleIcon');
        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            password.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });

    // Login form submission
    document.getElementById('login-form').addEventListener('submit', async function (e) {
        e.preventDefault();
        const phone = document.getElementById('login-phone').value.trim();
        const password = document.getElementById('login-password').value;
        const phoneError = document.getElementById('phone_error');
        const passwordError = document.getElementById('password_error');
        const errorMessage = document.getElementById('error_login_message');

        phoneError.textContent = '';
        passwordError.textContent = '';
        errorMessage.textContent = '';

        if (!phone) {
            phoneError.textContent = 'Iltimos, telefon raqamini kiriting.';
            phoneError.style.display = 'block';
            return;
        }
        if (!password) {
            passwordError.textContent = 'Iltimos, parolni kiriting.';
            passwordError.style.display = 'block';
            return;
        }
        showLoader()

        try {
            const response = await fetch('{{ route('authenticate') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ phone, password })
            });
            const data = await response.json();
            hideLoader();

            if (response.ok) {
                window.location.href = data.redirect || '{{ route('user.profile') }}';
            } else {
                errorMessage.textContent = data.error || 'Noto‘g‘ri telefon raqam yoki parol.';
                errorMessage.style.display = 'block';
            }
        } catch (error) {
            hideLoader();
            errorMessage.textContent = 'Server bilan bog‘lanishda xatolik.';
            errorMessage.style.display = 'block';
        }
    });
</script>

<div class="modal fade" id="register-modal" tabindex="-1" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">
                <a href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled fs-20"></i></a>
            </div>
            <div class="modal-body p-4">
                <form id="register-form" action="{{ route('user.register') }}" method="POST" autocomplete="off" novalidate="novalidate">
                    @csrf
                    <input type="hidden" name="role" id="role" value="0">

                    <!-- Foydalanuvchi va Provider tanlash -->
                    <div class="text-center mb-4">
                        <div class="d-flex justify-content-center gap-2 mb-3">
                            <button type="button" class="btn btn-outline-primary user-type-btn active shadow-sm rounded-pill px-4 py-2" data-type="user" style="background-color: #e6f0fa; border-color: #0056b3;">Foydalanuvchi</button>
                            <button type="button" class="btn btn-outline-primary user-type-btn shadow-sm rounded-pill px-4 py-2" data-type="provider" style="border-color: #0056b3;">Xizmat ko‘rsatuvchi</button>
                        </div>
                        <h3 class="mb-2" id="register-title" style="color: #0056b3;">Foydalanuvchi sifatida ro‘yxatdan o‘tish</h3>
                        <p class="text-muted">Hisobingizga kirish uchun ma’lumotlaringizni kiriting</p>
                    </div>

                    <!-- To‘liq ism -->
                    <div class="mb-3">
                        <label class="form-label" style="color: #0056b3;">To‘liq ism</label>
                        <input type="text" name="full_name" id="full_name" class="form-control" maxlength="255" placeholder="To‘liq ismingizni kiriting">
                        <div class="invalid-feedback" id="full_name_error"></div>
                    </div>

                    <!-- Telefon raqami -->
                    <div class="mb-3">
                        <label class="form-label" style="color: #0056b3;">Telefon raqami</label>
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
                            <input class="form-control" id="register-phone" name="phone" maxlength="12" type="tel" placeholder="Telefon raqamini kiriting" autocomplete="tel" data-intl-tel-input-id="0" style="padding-left: 96px;">
                        </div>
                        <div class="invalid-feedback" id="phone_error"></div>
                    </div>

                    <!-- Parol -->
                    <div class="mb-3">
                        <label class="form-label" style="color: #0056b3;">Parol</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control" maxlength="100" placeholder="Parolingizni kiriting" autocomplete="current-password">
                            <button class="btn btn-outline-primary" type="button" id="togglePassword" tabindex="-1" style="border-color: #0056b3;">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                        <div class="invalid-feedback" id="password_error"></div>
                    </div>

                    <!-- Parolni tasdiqlash -->
                    <div class="mb-3">
                        <label class="form-label" style="color: #0056b3;">Parolni tasdiqlash</label>
                        <div class="input-group">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" maxlength="100" placeholder="Parolingizni tasdiqlang" autocomplete="current-password">
                            <button class="btn btn-outline-primary" type="button" id="togglePasswordConfirmation" tabindex="-1" style="border-color: #0056b3;">
                                <i class="fas fa-eye" id="toggleIconConfirmation"></i>
                            </button>
                        </div>
                        <div class="invalid-feedback" id="password_confirmation_error"></div>
                    </div>

                    <!-- Shartlar va qoidalar -->
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" name="terms_policy" type="checkbox" value="1" id="terms_policy">
                            <label class="form-check-label" for="terms_policy">
                                Men roziman <a href="https://jobbank.uz/terms-conditions" class="text-primary text-decoration-underline">Shartlar va Qoidalar</a> & <a href="https://jobbank.uz/privacy-policy" class="text-primary text-decoration-underline">Maxfiylik Siyosati</a>
                            </label>
                            <div class="invalid-feedback" id="terms_policy_error"></div>
                        </div>
                    </div>

                    <!-- Yuborish tugmasi -->
                    <div class="mb-3">
                        <button type="submit" id="register_btn" class="btn btn-lg btn-primary w-100" style="background-color: #0056b3; border-color: #0056b3;">Kod yuborish</button>
                    </div>
                </form>

                <!-- Tasdiqlash kodi formasi -->
                <div id="verify-register-form-container" class="d-none">
                    <div id="loading-spinner" class="text-center mb-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Yuklanmoqda...</span>
                        </div>
                        <p class="text-muted mt-2">Kod yuborilmoqda...</p>
                    </div>
                    <form id="verify-register-form" action="{{ route('verify.register.code') }}" method="POST" autocomplete="off" novalidate="novalidate" class="d-none">
                        @csrf
                        <input type="hidden" name="full_name" id="verify-full_name">
                        <input type="hidden" name="phone" id="verify-phone">
                        <input type="hidden" name="password" id="verify-password">
                        <input type="hidden" name="password_confirmation" id="password_confirmation_hidden">
                        <input type="hidden" name="role" id="verify-role">
                        <input type="hidden" name="terms_policy" id="verify-terms_policy">
                        <div class="mb-4">
                            <label for="code" class="form-label" style="color: #0056b3;">Tasdiqlash kodi</label>
                            <input type="text" name="code" id="register-code" class="form-control" placeholder="6 raqamli kod" required>
                            <div class="invalid-feedback" id="code_error"></div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" id="verify_btn" class="btn btn-lg btn-primary w-100" style="background-color: #0056b3; border-color: #0056b3;">Tasdiqlash</button>
                        </div>
                    </form>
                </div>

                <!-- Kirish havolasi -->
                <div class="d-flex justify-content-center">
                    <p class="text-muted">Hisobingiz bormi? <a href="javascript:void(0);" class="text-primary" data-bs-target="#login-modal" data-bs-toggle="modal">Kirish</a></p>
                </div>
            </div>
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

        // Parol ko‘rsatish/gizlash
        document.getElementById('togglePassword').addEventListener('click', function () {
            const password = document.getElementById('password');
            const icon = document.getElementById('toggleIcon');
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        document.getElementById('togglePasswordConfirmation').addEventListener('click', function () {
            const passwordConfirmation = document.getElementById('password_confirmation');
            const icon = document.getElementById('toggleIconConfirmation');
            if (passwordConfirmation.type === 'password') {
                passwordConfirmation.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordConfirmation.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Register formasi
        document.getElementById('register-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const full_name = document.getElementById('full_name').value;
            const phone = document.getElementById('register-phone').value.trim();
            const password = document.getElementById('password').value;
            const password_confirmation = document.getElementById('password_confirmation').value;
            const role = document.getElementById('role').value;
            const terms_policy = document.getElementById('terms_policy').checked ? '1' : '0';
            const full_nameError = document.getElementById('full_name_error');
            const phoneError = document.getElementById('phone_error');
            const passwordError = document.getElementById('password_error');
            const passwordConfirmationError = document.getElementById('password_confirmation_error');
            const termsPolicyError = document.getElementById('terms_policy_error');
            full_nameError.textContent = '';
            phoneError.textContent = '';
            passwordError.textContent = '';
            passwordConfirmationError.textContent = '';
            termsPolicyError.textContent = '';

            if (!full_name) full_nameError.textContent = 'Ismni kiritish majburiy.';
            if (!phone) phoneError.textContent = 'Telefon raqamni kiritish majburiy.';
            if (!password) passwordError.textContent = 'Parolni kiritish majburiy.';
            if (password !== password_confirmation) passwordConfirmationError.textContent = 'Parollar mos emas.';
            if (!terms_policy) termsPolicyError.textContent = 'Shartlar va qoidalarni qabul qilish majburiy.';
            if (full_nameError.textContent || phoneError.textContent || passwordError.textContent || passwordConfirmationError.textContent || termsPolicyError.textContent) {
                full_nameError.style.display = 'block';
                phoneError.style.display = 'block';
                passwordError.style.display = 'block';
                passwordConfirmationError.style.display = 'block';
                termsPolicyError.style.display = 'block';
                return;
            }

            const registerBtn = document.getElementById('register_btn');
            registerBtn.disabled = true;
            registerBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Yuborilmoqda...';

            // Ro'yxatdan o'tish formasini yashirish va loading ko'rsatish
            document.getElementById('register-form').classList.add('d-none');
            document.getElementById('verify-register-form-container').classList.remove('d-none');
            document.getElementById('loading-spinner').classList.remove('d-none');
            document.getElementById('verify-register-form').classList.add('d-none');
            showLoader();

            try {
                const response = await fetch('{{ route('user.register') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ full_name, phone, password, password_confirmation, role, terms_policy })
                });

                const data = await response.json();
                hideLoader();

                if (response.ok) {
                    // Loadingni yashirish va tasdiqlash formasini ko'rsatish
                    document.getElementById('loading-spinner').classList.add('d-none');
                    document.getElementById('verify-register-form').classList.remove('d-none');
                    document.getElementById('verify-full_name').value = full_name;
                    document.getElementById('verify-phone').value = phone;
                    document.getElementById('verify-password').value = password;
                    document.getElementById('password_confirmation_hidden').value = password_confirmation;
                    document.getElementById('verify-role').value = role;
                    document.getElementById('verify-terms_policy').value = terms_policy;
                } else {
                    // Xato bo'lsa, ro'yxatdan o'tish formasini qayta ko'rsatish
                    document.getElementById('register-form').classList.remove('d-none');
                    document.getElementById('verify-register-form-container').classList.add('d-none');
                    registerBtn.disabled = false;
                    registerBtn.innerHTML = 'Kod yuborish';

                    // Xatolarni ko‘rsatish
                    if (data.errors) {
                        if (data.errors.phone) {
                            phoneError.textContent = data.errors.phone[0];
                            phoneError.style.display = 'block';
                        }
                        if (data.errors.full_name) {
                            full_nameError.textContent = data.errors.full_name[0];
                            full_nameError.style.display = 'block';
                        }
                        if (data.errors.password) {
                            passwordError.textContent = data.errors.password[0];
                            passwordError.style.display = 'block';
                        }
                        if (data.errors.password_confirmation) {
                            passwordConfirmationError.textContent = data.errors.password_confirmation[0];
                            passwordConfirmationError.style.display = 'block';
                        }
                        if (data.errors.terms_policy) {
                            termsPolicyError.textContent = data.errors.terms_policy[0];
                            termsPolicyError.style.display = 'block';
                        }
                    } else {
                        showErrorAlert(data.error || 'Xatolik yuz berdi.');
                    }
                }
            } catch (error) {
                // Xato bo'lsa, ro'yxatdan o'tish formasini qayta ko'rsatish
                document.getElementById('register-form').classList.remove('d-none');
                document.getElementById('verify-register-form-container').classList.add('d-none');
                registerBtn.disabled = false;
                registerBtn.innerHTML = 'Kod yuborish';
                showErrorAlert('Server bilan bog‘lanishda xatolik.');
                hideLoader();
            }
        });

        // Verify register formasi
        document.getElementById('verify-register-form').addEventListener('submit', async function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const codeError = document.getElementById('code_error');
            codeError.textContent = '';

            const verifyBtn = document.getElementById('verify_btn');
            verifyBtn.disabled = true;
            verifyBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Tasdiqlanmoqda...';

            showLoader('Kod yuborilmoqda, iltimos kuting...');

            try {
                const response = await fetch('{{ route('verify.register.code') }}', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                });

                const data = await response.json();

                hideLoader();

                if (response.ok) {
                    verifyBtn.disabled = false;
                    verifyBtn.innerHTML = 'Tasdiqlash';
                    const redirectUrl = data.redirect || '{{ route('user.profile') }}';
                    window.location.href = redirectUrl;
                } else {
                    verifyBtn.disabled = false;
                    verifyBtn.innerHTML = 'Tasdiqlash';
                    showErrorAlert(data.error || 'Xatolik yuz berdi.');
                }
            } catch (error) {
                hideLoader();
                verifyBtn.disabled = false;
                verifyBtn.innerHTML = 'Tasdiqlash';
                showErrorAlert('Server bilan bog‘lanishda xatolik.');
            }
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
            window.location.reload();
        });

        // Modal tashqarisiga bosilganda yopish
        registerModal.addEventListener('click', function (e) {
            if (e.target === registerModal) {
                registerModal.style.display = 'none';
                registerModal.classList.remove('show');
                document.body.classList.remove('modal-open');
                window.location.reload();
            }
        });
        loginModal.addEventListener('click', function (e) {
            if (e.target === loginModal) {
                loginModal.style.display = 'none';
                loginModal.classList.remove('show');
                document.body.classList.remove('modal-open');
                window.location.reload();
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
                window.location.reload();
            }
        });
    });
</script>

<div class="modal fade" id="forgot-modal" tabindex="-1" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">
                <a href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled fs-20"></i></a>
            </div>
            <div class="modal-body p-4">
                <!-- Telefon raqam kiritish formasi -->
                <div id="phone-form">
                    <form id="send-code-form" autocomplete="off" novalidate="novalidate">
                        @csrf
                        <div class="text-center mb-3">
                            <h3 class="mb-2">Parolni tiklash</h3>
                            <p>Telefon raqamingizga tasdiqlash kodi yuboramiz</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telefon raqami</label>
                            <input type="text" name="phone" id="phone" class="form-control phone" placeholder="+998901234567">
                            <div class="invalid-feedback" id="phone_error"></div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" id="send-code-btn" class="btn btn-lg btn-primary w-100" style="background-color: #0056b3; border-color: #0056b3;">Kod yuborish</button>
                        </div>
                        <div class="d-flex justify-content-center">
                            <p>Hisobingiz bormi? <a href="javascript:void(0);" class="text-primary" data-bs-toggle="modal" data-bs-target="#login-modal">Kirish</a></p>
                        </div>
                    </form>
                </div>

                <!-- Kod tasdiqlash formasi -->
                <div id="code-form" class="d-none">
                    <form id="verify-code-form" autocomplete="off" novalidate="novalidate">
                        @csrf
                        <input type="hidden" name="phone" id="phone-hidden">
                        <div class="text-center mb-3">
                            <h3 class="mb-2">Kodni tasdiqlash</h3>
                            <p>Telefon raqamingizga yuborilgan kodni kiriting</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tasdiqlash kodi</label>
                            <input type="text" name="code" id="code" class="form-control" placeholder="6 raqamli kod">
                            <div class="invalid-feedback" id="code_error"></div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" id="verify-code-btn" class="btn btn-lg btn-primary w-100" style="background-color: #0056b3; border-color: #0056b3;">Kodni tasdiqlash</button>
                        </div>
                        <div class="d-flex justify-content-center">
                            <p><a href="javascript:void(0);" id="resend-code" class="text-primary">Kodni qayta yuborish</a></p>
                        </div>
                    </form>
                </div>

                <!-- Yangi parol kiritish formasi -->
                <div id="password-form" class="d-none">
                    <form id="reset-password-form" autocomplete="off" novalidate="novalidate">
                        @csrf
                        <input type="text" name="phone" id="phone-hidden-password" style="display: none">
                        <input type="hidden" name="token" id="reset-token">
                        <div class="text-center mb-3">
                            <h3 class="mb-2">Yangi parol</h3>
                            <p>Yangi parolingizni kiriting</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Yangi parol</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control" maxlength="100" placeholder="Yangi parolni kiriting" autocomplete="new-password">
                                <button class="btn btn-outline-primary" type="button" id="togglePassword" tabindex="-1" style="border-color: #0056b3;">
                                    <i class="fas fa-eye" id="toggleIcon"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback" id="password_error"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Parolni tasdiqlash</label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" maxlength="100" placeholder="Parolni tasdiqlang" autocomplete="new-password">
                                <button class="btn btn-outline-primary" type="button" id="togglePasswordConfirmation" tabindex="-1" style="border-color: #0056b3;">
                                    <i class="fas fa-eye" id="toggleIconConfirmation"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback" id="password_confirmation_error"></div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" id="reset-password-btn" class="btn btn-lg btn-primary w-100" style="background-color: #0056b3; border-color: #0056b3;">Parolni yangilash</button>
                        </div>
                        <div class="d-flex justify-content-center">
                            <p>Hisobingiz bormi? <a href="javascript:void(0);" class="text-primary" data-bs-toggle="modal" data-bs-target="#login-modal">Kirish</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Parol ko‘rsatish/gizlash funksiyasi
    function togglePasswordVisibility(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

    document.getElementById('togglePassword')?.addEventListener('click', () => togglePasswordVisibility('password', 'toggleIcon'));
    document.getElementById('togglePasswordConfirmation')?.addEventListener('click', () => togglePasswordVisibility('password_confirmation', 'toggleIconConfirmation'));

    // Telefon raqam kiritish formasi
    document.getElementById('send-code-form').addEventListener('submit', async function (e) {
        e.preventDefault();
        const phone = document.getElementById('phone').value.trim();
        const phoneError = document.getElementById('phone_error');
        const sendCodeBtn = document.getElementById('send-code-btn');
        phoneError.textContent = '';

        if (!phone) {
            phoneError.textContent = 'Iltimos, telefon raqamini kiriting.';
            phoneError.style.display = 'block';
            return;
        }

        sendCodeBtn.disabled = true;
        sendCodeBtn.textContent = '2:00';

        try {
            const response = await fetch('{{ route('forgot.password') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ phone })
            });
            const data = await response.json();

            if (response.ok) {
                document.getElementById('phone-form').classList.add('d-none');
                document.getElementById('code-form').classList.remove('d-none');
                document.getElementById('phone-hidden').value = phone;
                document.getElementById('phone-hidden-password').value = phone;
            } else {
                sendCodeBtn.disabled = false;
                sendCodeBtn.textContent = 'Kod yuborish';
                phoneError.textContent = data.error || 'Xatolik yuz berdi.';
                phoneError.style.display = 'block';
                showErrorAlert(data.error || 'Xatolik yuz berdi.');
            }
        } catch (error) {
            sendCodeBtn.disabled = false;
            sendCodeBtn.textContent = 'Kod yuborish';
            phoneError.textContent = 'Server bilan bog‘lanishda xatolik.';
            phoneError.style.display = 'block';
            showErrorAlert('Server bilan bog‘lanishda xatolik.');
        }
    });

    // Kodni qayta yuborish
    document.getElementById('resend-code').addEventListener('click', async function (e) {
        e.preventDefault();
        const phone = document.getElementById('phone-hidden').value;
        const phoneError = document.getElementById('phone_error');
        const sendCodeBtn = document.getElementById('send-code-btn');
        phoneError.textContent = '';

        if (!phone) {
            showErrorAlert('Telefon raqami topilmadi.');
            return;
        }

        sendCodeBtn.setAttribute('disabled', 'disabled');
        showLoader()

        try {
            const response = await fetch('{{ route('forgot.password') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ phone })
            });
            const data = await response.json();
            hideLoader();

            if (response.ok) {
                alert('Yangi kod yuborildi!');
            } else {
                sendCodeBtn.disabled = false;
                sendCodeBtn.textContent = 'Kod yuborish';
                showErrorAlert(data.error || 'Xatolik yuz berdi.');
            }
        } catch (error) {
            hideLoader();
            sendCodeBtn.disabled = false;
            sendCodeBtn.textContent = 'Kod yuborish';
            showErrorAlert('Server bilan bog‘lanishda xatolik.');
        }

        sendCodeBtn.removeAttribute('disabled', 'disabled');
        sendCodeBtn.textContent = 'Kod yuborish';
    });

    // Kod tasdiqlash formasi
    document.getElementById('verify-code-form').addEventListener('submit', async function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        const codeError = document.getElementById('code_error');
        codeError.textContent = '';
        showLoader()

        try {
            const response = await fetch('{{ route('verify.reset.code') }}', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            });
            const data = await response.json();
            hideLoader();

            if (response.ok) {
                document.getElementById('code-form').classList.add('d-none');
                document.getElementById('password-form').classList.remove('d-none');
                document.getElementById('reset-token').value = data.token;
            } else {
                showErrorAlert(data.error || 'Xatolik yuz berdi.');
            }
        } catch (error) {
            hideLoader();
            showErrorAlert('Server bilan bog‘lanishda xatolik.');
        }
    });

    // Yangi parol kiritish formasi
    document.getElementById('reset-password-form').addEventListener('submit', async function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        const passwordError = document.getElementById('password_error');
        const passwordConfirmationError = document.getElementById('password_confirmation_error');
        const resetBtn = document.getElementById('reset-password-btn');
        passwordError.textContent = '';
        passwordConfirmationError.textContent = '';

        const password = formData.get('password');
        const passwordConfirmation = formData.get('password_confirmation');
        const phone = formData.get('phone');

        // FormData ma'lumotlarini konsolga chiqarish (debug uchun)
        console.log('FormData contents:');
        for (let [key, value] of formData.entries()) {
            console.log(`${key}: ${value}`);
        }

        if (!phone) {
            showErrorAlert('Telefon raqami topilmadi.');
            return;
        }

        if (!password) {
            showErrorAlert('Parolni kiritish majburiy.');
            return;
        }

        if (password !== passwordConfirmation) {
            showErrorAlert('Parollar mos emas.');
            return;
        }

        resetBtn.disabled = true;
        resetBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Yangilanmoqda...';

        showLoader()
        try {
            const response = await fetch('{{ route('reset.password') }}', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            });
            const data = await response.json();

            hideLoader();

            if (response.ok) {
                alert('Parol muvaffaqiyatli yangilandi!');
                const modal = bootstrap.Modal.getInstance(document.getElementById('forgot-modal'));
                modal.hide();
                window.location.href = '{{ url('/') }}';
            } else {
                resetBtn.disabled = false;
                resetBtn.innerHTML = 'Parolni yangilash';
                showErrorAlert(data.error || 'Xatolik yuz berdi.');
            }
        } catch (error) {
            hideLoader();
            resetBtn.disabled = false;
            resetBtn.innerHTML = 'Parolni yangilash';
            showErrorAlert('Server bilan bog‘lanishda xatolik.');
        }
    });

    // Modal ochilganda formani tozalash
    document.getElementById('forgot-modal').addEventListener('show.bs.modal', function () {
        document.getElementById('phone-form').classList.remove('d-none');
        document.getElementById('code-form').classList.add('d-none');
        document.getElementById('password-form').classList.add('d-none');
        document.getElementById('send-code-form').reset();
        document.getElementById('verify-code-form').reset();
        document.getElementById('reset-password-form').reset();
        document.getElementById('phone_error').textContent = '';
        document.getElementById('code_error').textContent = '';
        document.getElementById('password_error').textContent = '';
        document.getElementById('password_confirmation_error').textContent = '';
    });
</script>

<!-- Header -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS (bundan oldin Popper.js ham kerak) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


</body>
</html>
