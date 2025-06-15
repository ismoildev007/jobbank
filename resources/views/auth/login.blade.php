<!doctype html>
<html lang="uz" class="layout-wide customizer-hide" dir="ltr" data-skin="default" data-bs-theme="light"
      data-assets-path="/admin/assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Jobbank.uz: Kirish | Ish topish platformasi</title>

    <meta name="description"
          content="Jobbank.uz - O'zbekistonda ish topish uchun eng yaxshi platforma. Hisobingizga kiring va yangi imkoniyatlarni kashf eting.">
    <meta name="keywords"
          content="Jobbank.uz, ish topish, vakansiya, O'zbekiston, ish platformasi, bootstrap dashboard">
    <meta property="og:title" content="Jobbank.uz - Ish topish platformasi">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://jobbank.uz">
    <meta property="og:image"
          content="/admin/assets/img/logo.png">
    <meta property="og:description"
          content="Jobbank.uz - O'zbekistonda ish topish uchun eng yaxshi platforma. Hisobingizga kiring va yangi imkoniyatlarni kashf eting.">
    <meta property="og:site_name" content="Jobbank.uz">
    <link rel="canonical" href="https://jobbank.uz">

    <!-- ? PROD Only: Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5J3LMKC');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/admin/assets/img/logo.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="../../../css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/admin/assets/vendor/fonts/iconify-icons.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href="/admin/assets/vendor/libs/node-waves/node-waves.css">
    <link rel="stylesheet" href="/admin/assets/vendor/libs/pickr/pickr-themes.css">
    <link rel="stylesheet" href="/admin/assets/vendor/css/core.css">
    <link rel="stylesheet" href="/admin/assets/css/demo.css">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/admin/assets/vendor/libs/%40form-validation/form-validation.css">

    <!-- Page CSS -->
    <link rel="stylesheet" href="/admin/assets/vendor/css/pages/page-auth.css">

    <!-- Helpers -->
    <script src="/admin/assets/vendor/js/helpers.js"></script>
    <script src="/admin/assets/vendor/js/template-customizer.js"></script>
    <script src="/admin/assets/js/config.js"></script>
</head>

<body>
<!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5J3LMKC" height="0" width="0"
            style="display: none; visibility: hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- Content -->
<div class="position-relative">
    <div class="authentication-wrapper authentication-basic container-p-y p-4 p-sm-0">
        <div class="authentication-inner py-6">
            <!-- Login -->
            <div class="card p-md-7 p-1">
                <!-- Logo -->
                <div class="app-brand justify-content-center mt-5">
                    <a href="/" class="app-brand-link gap-2">
                        <span class="app-brand-logo demo">
                            <img src="/admin/assets/img/logo.png" alt="Jobbank.uz Logo" width="50">
                        </span>
                    </a>
                </div>
                <!-- /Logo -->

                <div class="card-body mt-1">
                    <h4 class="mb-1">Jobbank.uz ga xush kelibsiz! 👋</h4>
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form class="login-form" id="login-form" role="form" action="{{ route('authenticate') }}" method="POST">
                        @csrf
                        <div class="form-floating form-floating-outline mb-5 form-control-validation">
                            <input type="text" class="form-control" id="login-phone" placeholder="Telefon raqami" name="phone">
                            <label for="login-phone">Telefon raqami</label>
                            <div class="invalid-feedback" id="phone_error"></div>
                        </div>
                        <div class="mb-5">
                            <div class="form-password-toggle form-control-validation">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input type="password" id="login-password" class="form-control" name="password"
                                               placeholder="············"
                                               aria-describedby="password">
                                        <label for="login-password">Parol</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer" id="loginTogglePassword">
                    <i class="icon-base ri ri-eye-off-line icon-20px" id="toggleIcon"></i>
                </span>
                                </div>
                                <div class="invalid-feedback" id="password_error"></div>
                            </div>
                        </div>
                        <div class="mb-2 text-center text-danger" id="error_login_message"></div>
                        <div class="mb-5">
                            <button class="btn btn-primary d-grid w-100" type="submit">Kirish</button>
                        </div>
                    </form>
                    <script>
                        // Show/hide password toggle
                        document.getElementById('loginTogglePassword').addEventListener('click', function () {
                            const password = document.getElementById('login-password');
                            const icon = document.getElementById('toggleIcon');
                            if (password.type === 'password') {
                                password.type = 'text';
                                icon.classList.remove('ri-eye-off-line');
                                icon.classList.add('ri-eye-line');
                            } else {
                                password.type = 'password';
                                icon.classList.remove('ri-eye-line');
                                icon.classList.add('ri-eye-off-line');
                            }
                        });

                        // Submit login form
                        document.getElementById('login-form').addEventListener('submit', async function (e) {
                            e.preventDefault();

                            const phone = document.getElementById('login-phone').value.trim();
                            const password = document.getElementById('login-password').value;
                            const phoneError = document.getElementById('phone_error');
                            const passwordError = document.getElementById('password_error');
                            const errorMessage = document.getElementById('error_login_message');

                            // Tozalash
                            phoneError.textContent = '';
                            passwordError.textContent = '';
                            errorMessage.textContent = '';

                            // Validation
                            if (!phone) {
                                phoneError.textContent = 'Iltimos, telefon raqamini kiriting.';
                                return;
                            }
                            if (!password) {
                                passwordError.textContent = 'Iltimos, parolni kiriting.';
                                return;
                            }

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

                                if (response.ok) {
                                    window.location.href = data.redirect || '{{ route('user.profile') }}';
                                } else {
                                    errorMessage.textContent = data.error || 'Noto‘g‘ri telefon raqam yoki parol.';
                                }
                            } catch (error) {
                                errorMessage.textContent = 'Server bilan bog‘lanishda xatolik.';
                            }
                        });
                    </script>


                    <p class="text-center mb-5">
                        <span>Platformamizda yangimisiz?</span>
                        <a href="auth-register-basic.html">
                            <span>Hisob yarating</span>
                        </a>
                    </p>

                    <div class="divider my-5">
                        <div class="divider-text">yoki</div>
                    </div>

                    <div class="d-flex justify-content-center gap-2">
                        <a href="javascript:;" class="btn btn-icon rounded-circle btn-text-facebook">
                            <i class="icon-base ri ri-facebook-fill icon-18px"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon rounded-circle btn-text-twitter">
                            <i class="icon-base ri ri-twitter-fill icon-18px"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon rounded-circle btn-text-github">
                            <i class="icon-base ri ri-github-fill icon-18px"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-google-plus">
                            <i class="icon-base ri ri-google-fill icon-18px"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Login -->
            <img alt="mask" src="/admin/assets/img/illustrations/auth-basic-login-mask-light.png"
                 class="authentication-image d-none d-lg-block"
                 data-app-light-img="illustrations/auth-basic-login-mask-light.png"
                 data-app-dark-img="illustrations/auth-basic-login-mask-dark.png">
        </div>
    </div>
</div>
<!-- / Content -->

<!-- Core JS -->
<script src="/admin/assets/vendor/libs/jquery/jquery.js"></script>
<script src="/admin/assets/vendor/libs/popper/popper.js"></script>
<script src="/admin/assets/vendor/js/bootstrap.js"></script>
<script src="/admin/assets/vendor/libs/node-waves/node-waves.js"></script>
<script src="/admin/assets/vendor/libs/%40algolia/autocomplete-js.js"></script>
<script src="/admin/assets/vendor/libs/pickr/pickr.js"></script>
<script src="/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="/admin/assets/vendor/libs/hammer/hammer.js"></script>
<script src="/admin/assets/vendor/libs/i18n/i18n.js"></script>
<script src="/admin/assets/vendor/js/menu.js"></script>
<script src="/admin/assets/vendor/libs/%40form-validation/popular.js"></script>
<script src="/admin/assets/vendor/libs/%40form-validation/bootstrap5.js"></script>
<script src="/admin/assets/vendor/libs/%40form-validation/auto-focus.js"></script>
<script src="/admin/assets/js/main.js"></script>
<script src="/admin/assets/js/pages-auth.js"></script>
</body>
</html>
