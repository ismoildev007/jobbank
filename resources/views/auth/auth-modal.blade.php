<div class="modal fade" id="auth-modal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">
                <a href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled fs-20"></i></a>
            </div>
            <div class="modal-body p-4">
                <!-- Navbar uchun tugmalar -->
                <div class="text-center mb-3">
                    <div class="btn-group mb-3" role="group" id="auth-nav">
                        <button type="button" class="btn btn-outline-primary auth-tab active" data-tab="login">Kirish</button>
                        <button type="button" class="btn btn-outline-primary auth-tab mx-2" data-tab="register">Ro‘yxatdan o‘tish</button>
                        <button type="button" class="btn btn-outline-primary auth-tab" data-tab="forgot">Parolni tiklash</button>
                    </div>
                </div>

                <!-- Login formasi -->
                <div id="login-form-container" class="auth-form">
                    <form id="login-form" action="{{ route('authenticate') }}" method="POST" autocomplete="off" novalidate="novalidate">
                        @csrf
                        <div class="text-center mb-3">
                            <h3 class="mb-2">Xush kelibsiz</h3>
                            <p>Hisobingizga kirish uchun ma’lumotlaringizni kiriting</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mobile Number</label>
                            <input type="text" name="phone" id="login-phone" class="form-control" placeholder="Enter Mobile Number" autocomplete="tel">
                        </div>
                        <div class="mb-3">
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <label class="form-label">Parol</label>
                                <a href="javascript:void(0);" class="text-primary fw-medium text-decoration-underline mb-1 fs-14" onclick="showTab('forgot')">Parolni unutdingizmi?</a>
                            </div>
                            <div class="input-group">
                                <input type="password" name="password" id="login_password" class="form-control" maxlength="100" placeholder="Parolingizni kiriting" autocomplete="current-password">
                                <button class="btn btn-outline-dark" type="button" id="loginTogglePassword" tabindex="-1">
                                    <i class="fas fa-eye" id="toggleIcon"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback" id="login-password_error"></div>
                        </div>
                        <div id="login-error_message" class="text-danger text-center m-1"></div>
                        <div class="mb-3">
                            <button type="submit" class="login_btn btn btn-lg btn-jobbank w-100">Kod yuborish</button>
                        </div>
                    </form>
                    <div id="verify-login-form-container" class="d-none">
                        <form id="verify-login-form" action="{{ route('verify.login.code') }}" method="POST" autocomplete="off" novalidate="novalidate">
                            @csrf
                            <input type="hidden" name="phone" id="verify-login-phone">
                            <div class="mb-4">
                                <label for="code" class="block text-sm font-medium text-gray-700">Tasdiqlash kodi</label>
                                <input type="text" name="code" id="login-code" class="form-control mt-1 block w-full p-2 border rounded" placeholder="6 raqamli kod" required>
                                <div class="invalid-feedback" id="login-code_error"></div>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="block text-sm font-medium text-gray-700">Parol</label>
                                <input type="password" name="password" id="verify-login-password" class="form-control mt-1 block w-full p-2 border rounded" placeholder="Parolingizni kiriting" required>
                                <div class="invalid-feedback" id="verify-login-password_error"></div>
                            </div>
                            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Tasdiqlash</button>
                        </form>
                    </div>
                </div>

                <!-- Register formasi -->
                <div id="register-form-container" class="auth-form d-none">
                    <form id="register-form" action="{{ route('user.register') }}" method="POST" autocomplete="off" novalidate="novalidate">
                        @csrf
                        <input type="hidden" name="role" id="role" value="0">
                        <div class="text-center mb-3">
                            <div class="btn-group mb-3" role="group">
                                <button type="button" class="btn btn-outline-primary user-type-btn active" data-type="user">Foydalanuvchi</button>
                                <button type="button" class="btn btn-outline-primary user-type-btn mx-2" data-type="provider">Xizmat ko‘rsatuvchi</button>
                            </div>
                            <h3 class="mb-2" id="register-title">Foydalanuvchi sifatida ro‘yxatdan o‘tish</h3>
                            <p>Hisobingizga kirish uchun ma’lumotlaringizni kiriting</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">To‘liq ism</label>
                            <input type="text" name="full_name" id="register-full_name" class="form-control" maxlength="255" placeholder="To‘liq ismingizni kiriting">
                            <div class="invalid-feedback" id="register-full_name_error"></div>
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
                                            <div class="iti__flag-box"><div class="iti__flag iti__uz"></div></div>
                                            <span class="iti__country-name">Uzbekistan (Oʻzbekiston)</span>
                                            <span class="iti__dial-code">+998</span>
                                        </li>
                                    </ul>
                                </div>
                                <input class="form-control" id="register-phone" name="phone" maxlength="12" type="tel" placeholder="Telefon raqamini kiriting" autocomplete="tel" data-intl-tel-input-id="0" style="padding-left: 96px;">
                            </div>
                            <div class="invalid-feedback" id="register-phone_error"></div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <label class="form-label">Parol</label>
                            </div>
                            <div class="input-group">
                                <input type="password" name="password" id="register-password" class="form-control" maxlength="100" placeholder="Parolingizni kiriting" autocomplete="current-password">
                                <button class="btn btn-outline-dark" type="button" id="register-togglePassword" tabindex="-1">
                                    <i class="fas fa-eye" id="register-toggleIcon"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback" id="register-password_error"></div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <label class="form-label">Parolni tasdiqlash</label>
                            </div>
                            <div class="input-group">
                                <input type="password" name="password_confirmation" id="register-password_confirmation" class="form-control" maxlength="100" placeholder="Parolingizni tasdiqlang" autocomplete="current-password">
                                <button class="btn btn-outline-dark" type="button" id="register-togglePasswordConfirmation" tabindex="-1">
                                    <i class="fas fa-eye" id="register-toggleIconConfirmation"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback" id="register-password_confirmation_error"></div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2">
                                <div class="form-check">
                                    <input class="form-check-input" name="terms_policy" type="checkbox" value="1" id="register-terms_policy">
                                    <label class="form-check-label" for="register-terms_policy">
                                        Men roziman <a href="https://jobbank.uz/terms-conditions" class="text-primary text-decoration-underline">Shartlar va Qoidalar</a> & <a href="https://jobbank.uz/privacy-policy" class="text-primary text-decoration-underline">Maxfiylik Siyosati</a>
                                    </label>
                                    <div class="invalid-feedback" id="register-terms_policy_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" id="register_btn" class="register_btn btn btn-lg btn-linear-primary w-100">Kod yuborish</button>
                        </div>
                    </form>
                    <div id="verify-register-form-container" class="d-none">
                        <form id="verify-register-form" action="{{ route('verify.register.code') }}" method="POST" autocomplete="off" novalidate="novalidate">
                            @csrf
                            <input type="hidden" name="full_name" id="verify-register-full_name">
                            <input type="hidden" name="phone" id="verify-register-phone">
                            <input type="hidden" name="password" id="verify-register-password">
                            <input type="hidden" name="role" id="verify-register-role">
                            <input type="hidden" name="terms_policy" id="verify-register-terms_policy">
                            <div class="mb-4">
                                <label for="code" class="block text-sm font-medium text-gray-700">Tasdiqlash kodi</label>
                                <input type="text" name="code" id="register-code" class="form-control mt-1 block w-full p-2 border rounded" placeholder="6 raqamli kod" required>
                                <div class="invalid-feedback" id="register-code_error"></div>
                            </div>
                            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Tasdiqlash</button>
                        </form>
                    </div>
                </div>

                <!-- Forgot password formasi -->
                <div id="forgot-form-container" class="auth-form d-none">
                    <div id="forgot-phone-form">
                        <form id="forgot-send-code-form" autocomplete="off" novalidate="novalidate">
                            @csrf
                            <div class="text-center mb-3">
                                <h3 class="mb-2">Parolni tiklash</h3>
                                <p>Telefon raqamingizga tasdiqlash kodi yuboramiz</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Telefon raqami</label>
                                <input type="text" name="phone" id="forgot-phone" class="form-control" placeholder="+998901234567">
                                <div class="invalid-feedback" id="forgot-phone_error"></div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-lg btn-jobbank w-100">Kod yuborish</button>
                            </div>
                            <div class="d-flex justify-content-center">
                                <p>Hisobingiz bormi? <a href="javascript:void(0);" class="text-primary" onclick="showTab('login')">Kirish</a></p>
                            </div>
                        </form>
                    </div>
                    <div id="forgot-verify-form-container" class="d-none">
                        <form id="forgot-verify-code-form" autocomplete="off" novalidate="novalidate">
                            @csrf
                            <input type="hidden" name="phone" id="forgot-verify-phone">
                            <div class="text-center mb-3">
                                <h3 class="mb-2">Kodni tasdiqlash</h3>
                                <p>Telefon raqamingizga yuborilgan kodni kiriting</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tasdiqlash kodi</label>
                                <input type="text" name="code" id="forgot-code" class="form-control" placeholder="6 raqamli kod">
                                <div class="invalid-feedback" id="forgot-code_error"></div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-lg btn-jobbank w-100">Kodni tasdiqlash</button>
                            </div>
                            <div class="d-flex justify-content-center">
                                <p><a href="javascript:void(0);" class="text-primary" id="forgot-resend-code">Kodni qayta yuborish</a></p>
                            </div>
                        </form>
                    </div>
                    <div id="forgot-password-form-container" class="d-none">
                        <form id="forgot-reset-password-form" autocomplete="off" novalidate="novalidate">
                            @csrf
                            <input type="hidden" name="phone" id="forgot-reset-phone">
                            <input type="hidden" name="token" id="forgot-reset-token">
                            <div class="text-center mb-3">
                                <h3 class="mb-2">Yangi parol</h3>
                                <p>Yangi parolingizni kiriting</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Yangi parol</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="forgot-password" class="form-control" maxlength="100" placeholder="Yangi parolni kiriting" autocomplete="new-password">
                                    <button class="btn btn-outline-dark" type="button" id="forgot-togglePassword" tabindex="-1">
                                        <i class="fas fa-eye" id="forgot-toggleIcon"></i>
                                    </button>
                                </div>
                                <div class="invalid-feedback" id="forgot-password_error"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Parolni tasdiqlash</label>
                                <div class="input-group">
                                    <input type="password" name="password_confirmation" id="forgot-password_confirmation" class="form-control" maxlength="100" placeholder="Parolni tasdiqlang" autocomplete="new-password">
                                    <button class="btn btn-outline-dark" type="button" id="forgot-togglePasswordConfirmation" tabindex="-1">
                                        <i class="fas fa-eye" id="forgot-toggleIconConfirmation"></i>
                                    </button>
                                </div>
                                <div class="invalid-feedback" id="forgot-password_confirmation_error"></div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-lg btn-jobbank w-100">Parolni yangilash</button>
                            </div>
                            <div class="d-flex justify-content-center">
                                <p>Hisobingiz bormi? <a href="javascript:void(0);" class="text-primary" onclick="showTab('login')">Kirish</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Tablar o‘rtasida o‘tish funksiyasi
    function showTab(tab) {
        document.querySelectorAll('.auth-form').forEach(form => form.classList.add('d-none'));
        document.getElementById(`${tab}-form-container`).classList.remove('d-none');
        document.querySelectorAll('.auth-tab').forEach(btn => btn.classList.remove('active'));
        document.querySelector(`.auth-tab[data-tab="${tab}"]`).classList.add('active');
    }

    // Dastlabki tabni o‘rnating
    document.addEventListener('DOMContentLoaded', () => {
        showTab('login');
    });

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

    // Login formasi
    document.getElementById('login-form').addEventListener('submit', async function (e) {
        e.preventDefault();
        const phone = document.getElementById('login-phone').value.trim();
        const password = document.getElementById('login_password').value;
        const passwordError = document.getElementById('login-password_error');
        passwordError.textContent = '';

        if (!phone) {
            passwordError.textContent = 'Iltimos, telefon raqamini kiriting.';
            passwordError.style.display = 'block';
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
                document.getElementById('login-form').classList.add('d-none');
                document.getElementById('verify-login-form-container').classList.remove('d-none');
                document.getElementById('verify-login-phone').value = phone;
                document.getElementById('verify-login-password').value = password;
            } else {
                passwordError.textContent = data.error || 'Xatolik yuz berdi.';
                passwordError.style.display = 'block';
            }
        } catch (error) {
            passwordError.textContent = 'Server bilan bog‘lanishda xatolik.';
            passwordError.style.display = 'block';
        }
    });

    document.getElementById('verify-login-form').addEventListener('submit', async function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        const codeError = document.getElementById('login-code_error');
        const passwordError = document.getElementById('verify-login-password_error');
        codeError.textContent = '';
        passwordError.textContent = '';

        try {
            const response = await fetch('{{ route('verify.login.code') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            });
            const data = await response.json();

            if (response.ok) {
                window.location.href = data.redirect || '{{ route('user.profile') }}';
            } else {
                if (data.errors?.code) codeError.textContent = data.errors.code[0];
                if (data.errors?.password) passwordError.textContent = data.errors.password[0];
                codeError.style.display = 'block';
                passwordError.style.display = 'block';
            }
        } catch (error) {
            codeError.textContent = 'Server bilan bog‘lanishda xatolik.';
            codeError.style.display = 'block';
        }
    });

    document.getElementById('loginTogglePassword').addEventListener('click', () => togglePasswordVisibility('login_password', 'toggleIcon'));

    // Register formasi
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

    document.getElementById('register-form').addEventListener('submit', async function (e) {
        e.preventDefault();
        const full_name = document.getElementById('register-full_name').value;
        const phone = document.getElementById('register-phone').value.trim();
        const password = document.getElementById('register-password').value;
        const password_confirmation = document.getElementById('register-password_confirmation').value;
        const role = document.getElementById('role').value;
        const terms_policy = document.getElementById('register-terms_policy').checked ? '1' : '0';
        const full_nameError = document.getElementById('register-full_name_error');
        const phoneError = document.getElementById('register-phone_error');
        const passwordError = document.getElementById('register-password_error');
        const passwordConfirmationError = document.getElementById('register-password_confirmation_error');
        const termsPolicyError = document.getElementById('register-terms_policy_error');
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

            if (response.ok) {
                document.getElementById('register-form').classList.add('d-none');
                document.getElementById('verify-register-form-container').classList.remove('d-none');
                document.getElementById('verify-register-full_name').value = full_name;
                document.getElementById('verify-register-phone').value = phone;
                document.getElementById('verify-register-password').value = password;
                document.getElementById('verify-register-role').value = role;
                document.getElementById('verify-register-terms_policy').value = terms_policy;
            } else {
                if (data.errors?.full_name) full_nameError.textContent = data.errors.full_name[0];
                if (data.errors?.phone) phoneError.textContent = data.errors.phone[0];
                if (data.errors?.password) passwordError.textContent = data.errors.password[0];
                if (data.errors?.password_confirmation) passwordConfirmationError.textContent = data.errors.password_confirmation[0];
                if (data.errors?.terms_policy) termsPolicyError.textContent = data.errors.terms_policy[0];
                full_nameError.style.display = 'block';
                phoneError.style.display = 'block';
                passwordError.style.display = 'block';
                passwordConfirmationError.style.display = 'block';
                termsPolicyError.style.display = 'block';
            }
        } catch (error) {
            phoneError.textContent = 'Server bilan bog‘lanishda xatolik.';
            phoneError.style.display = 'block';
        }
    });

    document.getElementById('verify-register-form').addEventListener('submit', async function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        const codeError = document.getElementById('register-code_error');
        codeError.textContent = '';

        try {
            const response = await fetch('{{ route('verify.register.code') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            });
            const data = await response.json();

            if (response.ok) {
                window.location.href = data.redirect || '{{ route('user.profile') }}';
            } else {
                codeError.textContent = data.error || 'Xatolik yuz berdi.';
                codeError.style.display = 'block';
            }
        } catch (error) {
            codeError.textContent = 'Server bilan bog‘lanishda xatolik.';
            codeError.style.display = 'block';
        }
    });

    document.getElementById('register-togglePassword').addEventListener('click', () => togglePasswordVisibility('register-password', 'register-toggleIcon'));
    document.getElementById('register-togglePasswordConfirmation').addEventListener('click', () => togglePasswordVisibility('register-password_confirmation', 'register-toggleIconConfirmation'));

    // Forgot password formasi
    document.getElementById('forgot-send-code-form').addEventListener('submit', async function (e) {
        e.preventDefault();
        const phone = document.getElementById('forgot-phone').value.trim();
        const phoneError = document.getElementById('forgot-phone_error');
        phoneError.textContent = '';

        if (!phone) {
            phoneError.textContent = 'Iltimos, telefon raqamini kiriting.';
            phoneError.style.display = 'block';
            return;
        }

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
                document.getElementById('forgot-phone-form').classList.add('d-none');
                document.getElementById('forgot-verify-form-container').classList.remove('d-none');
                document.getElementById('forgot-verify-phone').value = phone;
            } else {
                phoneError.textContent = data.error || 'Xatolik yuz berdi.';
                phoneError.style.display = 'block';
            }
        } catch (error) {
            phoneError.textContent = 'Server bilan bog‘lanishda xatolik.';
            phoneError.style.display = 'block';
        }
    });

    document.getElementById('forgot-verify-code-form').addEventListener('submit', async function (e) {
        e.preventDefault();
        const phone = document.getElementById('forgot-verify-phone').value;
        const code = document.getElementById('forgot-code').value;
        const codeError = document.getElementById('forgot-code_error');
        codeError.textContent = '';

        try {
            const response = await fetch('{{ route('verify.reset.code') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ phone, code })
            });
            const data = await response.json();

            if (response.ok) {
                document.getElementById('forgot-verify-form-container').classList.add('d-none');
                document.getElementById('forgot-password-form-container').classList.remove('d-none');
                document.getElementById('forgot-reset-phone').value = phone;
                document.getElementById('forgot-reset-token').value = data.token;
            } else {
                codeError.textContent = data.error || 'Xatolik yuz berdi.';
                codeError.style.display = 'block';
            }
        } catch (error) {
            codeError.textContent = 'Server bilan bog‘lanishda xatolik.';
            codeError.style.display = 'block';
        }
    });

    document.getElementById('forgot-resend-code').addEventListener('click', async function () {
        const phone = document.getElementById('forgot-verify-phone').value;
        const phoneError = document.getElementById('forgot-phone_error');
        phoneError.textContent = '';

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
                alert('Yangi kod yuborildi!');
            } else {
                phoneError.textContent = data.error || 'Xatolik yuz berdi.';
                phoneError.style.display = 'block';
            }
        } catch (error) {
            phoneError.textContent = 'Server bilan bog‘lanishda xatolik.';
            phoneError.style.display = 'block';
        }
    });

    document.getElementById('forgot-reset-password-form').addEventListener('submit', async function (e) {
        e.preventDefault();
        const phone = document.getElementById('forgot-reset-phone').value;
        const token = document.getElementById('forgot-reset-token').value;
        const password = document.getElementById('forgot-password').value;
        const passwordConfirmation = document.getElementById('forgot-password_confirmation').value;
        const passwordError = document.getElementById('forgot-password_error');
        const passwordConfirmationError = document.getElementById('forgot-password_confirmation_error');
        passwordError.textContent = '';
        passwordConfirmationError.textContent = '';

        if (password !== passwordConfirmation) {
            passwordConfirmationError.textContent = 'Parollar mos emas.';
            passwordConfirmationError.style.display = 'block';
            return;
        }

        try {
            const response = await fetch('{{ route('reset.password') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ phone, token, password, password_confirmation: passwordConfirmation })
            });
            const data = await response.json();

            if (response.ok) {
                alert('Parol muvaffaqiyatli yangilandi!');
                showTab('login');
            } else {
                passwordError.textContent = data.error || 'Xatolik yuz berdi.';
                passwordError.style.display = 'block';
            }
        } catch (error) {
            passwordError.textContent = 'Server bilan bog‘lanishda xatolik.';
            passwordError.style.display = 'block';
        }
    });

    document.getElementById('forgot-togglePassword').addEventListener('click', () => togglePasswordVisibility('forgot-password', 'forgot-toggleIcon'));
    document.getElementById('forgot-togglePasswordConfirmation').addEventListener('click', () => togglePasswordVisibility('forgot-password_confirmation', 'forgot-toggleIconConfirmation'));

    // Modal ochilganda formani tozalash
    document.getElementById('auth-modal').addEventListener('show.bs.modal', function () {
        showTab('login');
        document.getElementById('login-form').classList.remove('d-none');
        document.getElementById('verify-login-form-container').classList.add('d-none');
        document.getElementById('register-form').classList.add('d-none');
        document.getElementById('verify-register-form-container').classList.add('d-none');
        document.getElementById('forgot-phone-form').classList.add('d-none');
        document.getElementById('forgot-verify-form-container').classList.add('d-none');
        document.getElementById('forgot-password-form-container').classList.add('d-none');
        document.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');
        document.getElementById('login-form').reset();
        document.getElementById('verify-login-form').reset();
        document.getElementById('register-form').reset();
        document.getElementById('verify-register-form').reset();
        document.getElementById('forgot-send-code-form').reset();
        document.getElementById('forgot-verify-code-form').reset();
        document.getElementById('forgot-reset-password-form').reset();
    });

    // Tablarni boshqarish
    document.querySelectorAll('.auth-tab').forEach(tab => {
        tab.addEventListener('click', () => {
            showTab(tab.getAttribute('data-tab'));
        });
    });
</script>
