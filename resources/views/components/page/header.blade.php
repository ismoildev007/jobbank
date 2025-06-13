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
                        <a class="nav-link btn btn-light" href="#" data-bs-toggle="modal" data-bs-target="#login-modal"
                           id="header-login">
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
                                <a class="nav-link  d-flex align-items-center" href="{{route('services.index')}}">
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
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown"
                               role="button"
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
<div
    class="mobile-nav d-flex justify-content-around align-items-center d-md-none fixed-bottom bg-white border-top shadow-sm px-3 py-2"
    style="height: 70px;">

    <!-- Bosh sahifa -->
    <a href="/" class="nav-icon text-center {{ request()->is('/') ? 'active' : '' }}">
        <i class="ti ti-home fs-24"></i>
        <div class="small">Bosh sahifa</div>
    </a>

    <!-- Xizmatlar -->
    <a href="{{route('page.service')}}" class="nav-icon text-center {{ Route::is('page.service') ? 'active' : '' }}">
        <i class="ti ti-layout-grid fs-24"></i>
        <div class="small">Xizmatlar</div>
    </a>

    <!-- Tezkor xizmatlar (Markazda joylashgan, Bootstrap Icons bilan) -->
    <a href="#tezkor-form" class="nav-icon text-center position-relative" data-bs-toggle="modal">
        <div class="quick-btn rounded-circle d-flex justify-content-center align-items-center shadow"
             style="width: 50px; height: 50px; margin-top: -25px; border: 2px solid #0056b3;">
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
            $profileRoute = match ($user->role) {
                '2' => route('admin.dashboard'),
                '1' => route('services.index'),
                default => route('user.profile'),
            };
        @endphp
        <a href="{{ $profileRoute }}"
           class="nav-icon text-center {{ request()->is('user/profile') || request()->is('admin/dashboard') || request()->is('provider/services') ? 'active' : '' }}">
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
                <button type="button" class="btn-close btn btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tezkor-form-submit" action="{{ route('tezkor.order.store') }}" method="POST">
                    @csrf

                    <!-- Telefon -->
                    <div class="mb-3">
                        <label for="additional_phone" class="form-label"> Telefon raqamingiz</label>

                        <input type="tel"
                               class="form-control"
                               id="additional_phone"
                               name="additional_phone"
                               placeholder="+998 90 123 45 67"
                               required
                               maxlength="19">
                    </div>

                    <!-- Asosiy kategoriya -->
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Xizmat turini tanlang</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            <option value="">-- Tanlang --</option>
                            @foreach (\App\Models\Category::whereNull('parent_id')->get() as $category)
                                <option value="{{ $category->id }}">{{ $category->title_uz }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Subkategoriya -->
                    <div class="mb-3">
                        <label for="sub_category_id" class="form-label">Yo‘nalishni aniqlashtiring
                            (subkategoriya)</label>
                        <select class="form-select" id="sub_category_id" name="sub_category_id" required>
                            <option value="">Avval xizmat turini tanlang</option>
                        </select>
                    </div>

                    <!-- Narx -->
                    <div class="mb-3">
                        <label for="price_range" class="form-label">
                            Standart narx <span class="text-muted"
                                                style="font-size: 0.875rem;">(+10% holatga qarab)</span>
                        </label>

                        <input type="text" class="form-control" id="price_range" name="price_range" readonly>
                    </div>

                    <!-- Hudud -->
                    <div class="mb-3">
                        <label for="region" class="form-label">Xizmat ko‘rsatiladigan hududni tanlang</label>
                        <select class="form-select" id="region" name="region" required>
                            <option value="">-- Hududni tanlang --</option>
                            <option value="bektemir">Bektemir</option>
                            <option value="chilonzor">Chilonzor</option>
                            <option value="mirzo-ulugbek">Mirzo Ulug‘bek</option>
                            <option value="olmazor">Olmazor</option>
                            <option value="sergeli">Sergeli</option>
                            <option value="shayxontohur">Shayxontohur</option>
                            <option value="uchtepа">Uchtepa</option>
                            <option value="yakkasaroy">Yakkasaroy</option>
                            <option value="yashnobod">Yashnobod</option>
                            <option value="yunusobod">Yunusobod</option>
                            <option value="yangihayot">Yangihayot</option>
                            <option value="mirobod">Mirobod</option>
                        </select>
                    </div>

                    <!-- Izoh -->
                    <div class="mb-3">
                        <label for="notes" class="form-label">Buyurtma bo‘yicha izohingiz</label>
                        <textarea class="form-control" id="notes" name="notes" rows="3" required></textarea>
                    </div>

                    <!-- Submit tugmasi -->
                    <button type="submit" class="btn btn-jobbank w-100">Buyurtmani tasdiqlash</button>
                </form>
            </div>
        </div>
    </div>
</div><!-- CSS -->
<style>
    .quick-btn {
        transition: all 0.3s ease;
        width: 38px !important;
        height: 38px !important;
        margin-top: -12px !important;
        border: 2px solid #0056b3;
        background-color: transparent;
        animation: pulse 2s infinite;
    }

    .quick-btn:hover {
        transform: scale(1.2);
        box-shadow: 0px 10px 20px #0056b3;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
        100% {
            transform: scale(1);
        }
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
<script>
    document.getElementById('category_id').addEventListener('change', function () {
        let categoryId = this.value;
        let subCategorySelect = document.getElementById('sub_category_id');

        if (categoryId) {
            fetch(`/get-sub-categories?category_id=${categoryId}&only_featured=1`)
                .then(response => response.json())
                .then(data => {
                    subCategorySelect.innerHTML = '<option value="">Subkategoriyani tanlang</option>';
                    data.forEach(sub => {
                        subCategorySelect.innerHTML += `<option value="${sub.id}">${sub.title_uz}</option>`;
                    });
                })
                .catch(error => {
                    console.error('Xato:', error);
                    subCategorySelect.innerHTML = '<option value="">Subkategoriyalarni yuklashda xato</option>';
                });
        } else {
            subCategorySelect.innerHTML = '<option value="">Avval kategoriyani tanlang</option>';
        }
    });
    document.getElementById('sub_category_id').addEventListener('change', function () {
        let subCategoryId = this.value;
        let priceInput = document.getElementById('price_range');

        priceInput.value = 'Yuklanmoqda...';

        if (subCategoryId) {
            fetch(`/get-subcategory-price/${subCategoryId}`)
                .then(response => response.json())
                .then(data => {
                    priceInput.value = data.price + ' so‘m';
                });
        } else {
            priceInput.value = '';
        }
    });
</script>


<script>
    const phoneInput = document.getElementById('additional_phone');

    phoneInput.addEventListener('input', function (e) {
        let input = this.value.replace(/\D/g, ''); // faqat raqamlar
        if (!input.startsWith('998')) {
            input = '998' + input;
        }
        input = input.substring(0, 12); // faqat 12 ta raqam (998 + 9 ta raqam)

        // Formatlash: +998 90 123 45 67
        let formatted = '+998 ';
        if (input.length > 3) formatted += input.substring(3, 5);
        if (input.length > 5) formatted += ' ' + input.substring(5, 8);
        if (input.length > 8) formatted += ' ' + input.substring(8, 10);
        if (input.length > 10) formatted += ' ' + input.substring(10, 12);

        this.value = formatted.trim();
    });
</script>
