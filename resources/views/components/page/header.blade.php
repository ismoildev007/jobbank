<div class="header">
    <!-- Start Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <!-- Language Selection -->
                <div class="col-md-4 col-sm-2">
                    <div class="language-wrapper">
                        <div class="box-language">
                            <form id="form-language" action="{{ route('locale.change') }}" method="POST">
                                @csrf
                                <div class="btn-group toggle-wrap">
                                <span class="toggle">
                                    <span>
                                        <img
                                            src="/assets/img/language/{{ app()->getLocale() }}-{{ app()->getLocale() }}.png"
                                            alt="{{ strtoupper(app()->getLocale()) }}"
                                            title="{{ strtoupper(app()->getLocale()) }}"
                                            height="11" width="16">
                                        {{ strtoupper(app()->getLocale()) }}
                                    </span>
                                </span>
                                    <ul style="display: none;" class="toggle_cont pull-right">
                                        <li>
                                            <button
                                                class="language-select {{ app()->getLocale() == 'en' ? 'selected' : '' }}"
                                                type="submit" name="lang" value="en">
                                                <img src="/assets/img/language/en-en.png" alt="English" title="English" height="11" width="16">English
                                            </button>
                                        </li>
                                        <li>
                                            <button
                                                class="language-select {{ app()->getLocale() == 'uz' ? 'selected' : '' }}"
                                                type="submit" name="lang" value="uz">
                                                <img src="/assets/img/language/uz-uz.png" alt="O‘zbek" title="O‘zbek"
                                                     height="11" width="16">
                                                O‘zbek
                                            </button>
                                        </li>
                                        <li>
                                            <button
                                                class="language-select {{ app()->getLocale() == 'ru' ? 'selected' : '' }}"
                                                type="submit" name="lang" value="ru">
                                                <img src="/assets/img/language/ru-ru.png" alt="Русский" title="Русский"
                                                     height="11" width="16">
                                                Русский
                                            </button>
                                        </li>
                                        <li>
                                            <button
                                                class="language-select {{ app()->getLocale() == 'tr' ? 'selected' : '' }}"
                                                type="submit" name="lang" value="tr">
                                                <img src="/assets/img/language/tr-tr.png" alt="Türkçe" title="Türkçe"
                                                     height="11" width="16">
                                                Türkçe
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                        <a href="#"><i class="icon-phone"></i> +998 91 073 93 73</a>
                    </div>
                </div>
                <!-- Search & Cart -->
                <div class="col-md-8 col-sm-10">
                    <div class="search-area">
                        <form action="{{ route('search.products') }}" method="GET">
                            <div class="control-group">
                                <input
                                    class="search-field"
                                    style="padding-left: 20px"
                                    placeholder="{{ __('messages.search_placeholder') }}"
                                    name="search"
                                    value="{{ request('search') }}"
                                >
                                <button type="submit" class="btn btn-primary search-button" style="margin-top: 1.5px!important;">
                                    <i class="icon-magnifier"></i>
                                    izlash
                                </button>
                            </div>
                        </form>

                    </div>
                    <div class="shop-cart">
                        <ul>
                            <li>
                                <a href="{{ route('cart') }}" class="cart-icon cart-btn" role="button">
                                    <i class="icon-basket"></i>
                                    <span class="cart-label">{{ session('cart') ? count(session('cart')) : 0 }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="account link-inline">
                        @auth
                            <a href="{{ route('user.profile') }}">
                                <i class="icon-user"></i>
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}">
                                <i class="icon-login"></i>
                                <span>{{ __('messages.login') }}</span>
                            </a>
                        @endauth
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- End Top Bar -->

        <!-- Start  Logo & Naviagtion  -->
        <nav class="navbar navbar-default" data-spy="affix" data-offset-top="50">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <!-- Stat Toggle Nav Link For Mobiles -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="/">
                            <svg width="80" height="40" viewBox="0 0 100 60" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M78.5643 45.3339C77.7771 45.3339 76.8149 45.2481 75.9403 45.0827C74.6283 44.7519 72.7915 43.9003 70.4298 38.497C66.4063 29.3813 56.4351 5.2379 54.9481 1.94201C54.3296 0.508475 53.8923 0 53.3737 0C52.7615 0 52.3241 0.673882 51.6181 2.36471L35.9678 39.7713C34.6558 42.8099 33.5187 44.8315 30.6323 45.1746C30.1075 45.2542 29.239 45.34 28.708 45.34C28.1769 45.34 27.9145 45.4258 27.9145 45.7688V46.4427H38.2544L38.3231 46.2712L39.985 41.9706L44.096 31.5009C44.096 31.5009 44.1834 31.4151 44.1834 31.3294L50.9184 14.1148L51.4432 12.8405C51.4432 12.5893 51.6119 12.3382 51.7931 12.3382C51.9743 12.3382 52.0555 12.5893 52.1367 12.8405L52.9302 14.8683L65.238 46.4488H79.3452V45.775C79.3452 45.438 78.9954 45.3461 78.558 45.3461" fill="#231F20"></path> <path d="M95.4267 11.5479C90.5348 6.57954 83.1001 6.35287 77.3272 6.34062H77.3335H62.0017V6.86135C62.0017 7.12477 62.2079 7.19829 62.6203 7.19829C63.0326 7.19829 63.5762 7.25342 64.101 7.33306C65.6004 7.66388 66.0065 8.38677 66.0752 9.89994C66.2127 11.3457 66.2127 12.6629 66.2127 19.5855V23.7084C68.5743 29.32 70.8484 34.6865 72.3229 38.0253C72.8227 39.1648 73.3163 40.1389 73.8036 40.9475C75.5342 41.07 77.3897 41.1987 79.0454 41.1987C87.7796 41.1987 92.6965 37.9702 94.8832 35.7954C97.5447 33.2285 100 28.8728 100 23.1448C100 17.4168 97.8133 13.9249 95.4267 11.554M89.7601 35.7954C86.8924 38.1662 83.6874 39.0239 78.9079 39.0239C75.1531 39.0239 73.31 38.0988 72.6977 37.2473C72.2916 36.7204 72.2167 34.9377 72.1479 33.7554C72.1479 32.8977 72.0792 29.4058 72.0792 24.5967V18.8687C72.0792 15.242 72.0792 11.2906 72.1479 9.71003C72.1479 9.25056 72.2854 8.98714 72.6977 8.85236C73.1101 8.65632 74.8094 8.52155 75.7653 8.52155C79.4515 8.52155 84.8432 9.0484 89.1416 13.0672C91.1908 14.9112 93.7149 18.6665 93.7149 24.4619C93.7149 29.1362 92.7652 33.2898 89.7601 35.7954Z" fill="#231F20"></path> <path d="M40.8284 23.1509L36.5738 33.3204L34.2996 17.2452H34.0872L23.7786 37.5536C22.7227 39.7223 22.4416 40.1205 22.023 40.1205C21.6044 40.1205 21.1108 39.2444 20.4049 37.8232C19.2178 35.728 15.5004 28.7564 14.9444 27.4699C14.5196 26.5203 11.7144 21.1721 10.0337 17.7231H9.82757L7.37224 35.5258C7.29726 36.3406 7.22854 36.9471 7.22854 37.6884C7.22854 38.5032 7.85955 38.9626 8.63426 39.1096C8.80295 39.1403 8.95914 39.1709 9.10284 39.1954H9.12158C9.54017 39.2628 10.2399 39.3302 10.6648 39.3302C11.0896 39.3302 11.2958 39.3976 11.2958 39.6733V40.2124H0V39.6733C0 39.3976 0.21242 39.3302 0.631013 39.3302C0.993378 39.3302 1.56191 39.2812 1.98051 39.226C3.24253 38.9014 3.5924 37.1186 3.86105 35.5932L8.49057 6.21196C8.63426 5.47069 8.91541 5.06024 9.334 5.06024C9.68387 5.06024 9.96501 5.2624 10.596 6.42025L23.4974 31.795L36.3364 6.14457C36.755 5.39718 36.9674 5.06024 37.386 5.06024C37.8046 5.06024 38.0857 5.47069 38.2294 6.42025L40.8347 23.1509H40.8284Z" fill="#231F20"></path> <path d="M11.2208 57.6843C10.9147 57.6843 10.8334 57.6904 10.4898 57.6598V59.8775H9.20904V53.7696H11.3083C12.9139 53.7696 13.5637 54.6028 13.5637 55.6565C13.5637 56.9675 12.539 57.6843 11.227 57.6843M11.2208 54.8233H10.4961V56.5938C10.6835 56.6122 10.8084 56.6122 10.9709 56.6122C11.7206 56.6122 12.2454 56.3733 12.2454 55.6871C12.2454 55.2216 12.0142 54.8233 11.2208 54.8233Z" fill="#231F20"></path> <path d="M19.6739 53.7635L17.1373 59.8713H18.4868L19.1116 58.4194H21.3857L21.9918 59.8713H23.3537L20.8109 53.7635H19.6676H19.6739ZM20.2549 55.534L20.9359 57.3228H19.5364L20.2487 55.534H20.2549Z" fill="#231F20"></path> <path d="M28.7642 53.7635C30.2761 53.7635 30.9197 54.6151 30.9197 55.5217C30.9197 56.2569 30.4948 56.8328 29.7576 57.1268L31.7443 59.8713H30.2324L28.4518 57.378H28.027V59.8713H26.7462V53.7635H28.7642ZM28.0332 56.312H28.658C29.2953 56.312 29.5827 55.9935 29.5827 55.5156C29.5827 55.0745 29.3328 54.8172 28.658 54.8172H28.0332V56.312Z" fill="#231F20"></path> <path d="M36.1489 53.7635V59.8713H37.4297V57.2432H39.6164V56.1772H37.4297V54.8172H40.1724V53.7635H36.1489Z" fill="#231F20"></path> <path d="M47.4072 60C45.7454 60 44.6395 59.0749 44.6395 57.0839V53.7635H45.9203V57.3657C45.9203 58.5481 46.7013 58.9034 47.401 58.9034C48.1007 58.9034 48.9004 58.5481 48.9004 57.3657V53.7635H50.1749V57.4576C50.1749 59.1607 48.8567 60 47.401 60" fill="#231F20"></path> <path d="M60.4086 53.7635L58.3469 56.2875L56.2914 53.7635H55.1231V59.8713H56.4101V55.8035L58.3469 58.1315L60.2962 55.8035V59.8713H61.5894V53.7635H60.4086Z" fill="#231F20"></path> <path d="M66.6563 53.7635V59.8713H70.786V58.8115H67.937V57.2126H70.1862V56.1527H67.937V54.8172H70.7422V53.7635H66.6563Z" fill="#231F20"></path> <path d="M78.0707 60C76.4089 60 75.303 59.0749 75.303 57.0839V53.7635H76.5838V57.3657C76.5838 58.5481 77.3647 58.9034 78.0645 58.9034C78.7642 58.9034 79.5639 58.5481 79.5639 57.3657V53.7635H80.8384V57.4576C80.8384 59.1607 79.5202 60 78.0645 60" fill="#231F20"></path> <path d="M87.8108 53.7635C89.3228 53.7635 89.9663 54.6151 89.9663 55.5217C89.9663 56.2569 89.5414 56.8328 88.8042 57.1268L90.791 59.8713H89.279L87.4984 57.378H87.0736V59.8713H85.7866V53.7635H87.8108ZM87.0799 56.312H87.7046C88.3419 56.312 88.6293 55.9935 88.6293 55.5156C88.6293 55.0745 88.3856 54.8172 87.7046 54.8172H87.0799V56.312Z" fill="#231F20"></path> </svg>
                        </a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <!-- Start Navigation List -->
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="/" class="{{ Request::is('/') ? 'active' : '' }}">{{ __('messages.home') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}" class="{{ Request::is('about') ? 'active' : '' }}">{{ __('messages.about') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('products') }}" class="{{ Request::is('products*') ? 'active' : '' }}">{{ __('messages.shop') }}</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="{{ Request::is('pages*') ? 'active' : '' }}">{{ __('messages.pages') }} <span class="caret"></span></a>
                                <ul class="dropdown">
                                    <li>
                                        <a href="{{ route('about') }}" class="{{ Request::is('about') ? 'active' : '' }}">{{ __('messages.about') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}">{{ __('messages.contact') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('checkout') }}" class="{{ Request::is('checkout') ? 'active' : '' }}">{{ __('messages.checkout') }}</a>
                                    </li>
                                    <li>
                                        <a href="#" class="{{ Request::is('faqs') ? 'active' : '' }}">{{ __('messages.faqs') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}">{{ __('messages.contact') }}</a>
                            </li>
                        </ul>


                        <!-- End Navigation List -->
                    </div>
                </div>
            </div>


            <!-- End Header Logo & Naviagtion -->

            <!-- Mobile Menu Start -->
        <!-- Mobile Menu Start -->
        <ul class="mobile-menu">
            <li>
                <a href="/">{{ __('messages.home') }}</a>
            </li>
            <li><a href="{{route('about')}}">{{ __('messages.about') }}</a></li>
            <li>
                <a class="active" href="{{route('products')}}">{{ __('messages.shop') }}</a>
            </li>
            <li>
                <a href="#">{{ __('messages.pages') }}</a>
                <ul class="dropdown">
                    <li><a href="{{route('about')}}">{{ __('messages.abouts') }}</a></li>
                    <li><a href="{{route('contact')}}">{{ __('messages.contact') }}</a></li>
                    <li><a href="{{route('checkout')}}">{{ __('messages.checkout') }}</a></li>
                    <li><a href="{{route('checkout')}}">{{ __('messages.shopping_cart') }}</a></li>
                    <li><a href="">{{ __('messages.faqs') }}</a></li>
                </ul>
            </li>
            <li>
                <a href="{{route('contact')}}">{{ __('messages.contact') }}</a>
            </li>
        </ul>
        <!-- Mobile Menu End -->

        <!-- Mobile Menu End -->
        </nav>
</div>
<!-- Header Section End -->

<style>
    .link-inline {
        padding: 6px 6px !important;
        margin-top: 9px!important;
    }

</style>
<!-- End Page Header -->
