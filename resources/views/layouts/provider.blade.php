<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="Iwwjw1bR3aOKHVRruG0bO7YDiWqhHtXp9sTvJCVD">

    <title>Jobbank</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="https://jobbank.uz/storage/favicons/CQWBVMkTN1Kz0lsYnrdQTKtB2qdw7ejFVaGRMMm5.png">

    <!-- Bootstrap CSS -->

    <!-- Bootstrap CSS -->
    <style data-fullcalendar=""></style><link rel="stylesheet" href="/front/css/bootstrap.min.css">

    <!-- Animation CSS -->
    <link rel="stylesheet" href="/front/css/animate.css">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="/front/plugins/tabler-icons/tabler-icons.css">

    <!-- Fontawesome Icon CSS -->
    <link rel="stylesheet" href="/front/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/front/plugins/fontawesome/css/all.min.css">

    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="/front/css/bootstrap-datetimepicker.min.css">

    <!-- Toastr CSS -->
    <link href="/assets/plugins/toastr/toatr.css" rel="stylesheet">

    <!-- select CSS -->
    <link rel="stylesheet" href="/front/plugins/select2/css/select2.min.css">

    <!-- Owlcarousel CSS -->
    <link rel="stylesheet" href="/front/plugins/owlcarousel/owl.carousel.min.css">

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="/front/plugins/datatables/datatables.min.css">

    <!-- Mobile CSS-->
    <link rel="stylesheet" href="/front/plugins/intltelinput/css/intlTelInput.css">
    <link rel="stylesheet" href="/front/plugins/intltelinput/css/demo.css">

    <!-- Tagsinput CSS -->
    <link rel="stylesheet" href="/front/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">

    <!-- Feather CSS -->
    <link rel="stylesheet" href="/front/css/feather.css">

    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="/assets/plugins/boxicons/css/boxicons.min.css">
    <!-- FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
    <!-- summernote CSS -->
    <link rel="stylesheet" href="/assets/plugins/summernote/summernote-bs4.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/front/css/stylenew.css">

    <!-- Custom JS -->
    <script src="/assets/js/custom.js"></script>

</head>
<body data-provider="provider.dashboard" class="provider-page" data-lang="uz">
<div id="language-settings" data-language-id="24"></div>
<div id="datatable_data" data-length_menu="Menyu uzunligi" data-info="Ma’lumot" data-info_empty="Hech qanday yozuv mavjud emas" data-info_filter="(Jami _MAX_ ta yozuvdan filtrlangan)" data-search="Qidirish:" data-zero_records="Mos yozuv topilmadi" data-first="Birinchi" data-last="Oxirgi" data-next="Keyingi" data-prev="Orqaga"></div>
<!-- Main Wrapper -->
<div class="main-wrapper">
    <!-- Header -->
    <div class="header provider-header">

        <!-- Logo -->
        <div class="header-left active text-center">
            <a href="{{ route('provider.dashboard') }}" class="logo logo-normal">
                <img src="https://jobbank.uz/storage/logos/AIccKpqqNFsDwTyFgJ5sYFnDhVwQmGaE61W3ap7c.png" alt="Logo" style="width: 4rem;">
            </a>
            <a href="{{ route('provider.dashboard') }}" class="logo-small">
                <img src="https://jobbank.uz/storage/mobile-icon/dVoQCe3r6UWkfQ0rIad86pjLzPbexkGFNuakdz6U.png" alt="Logo">
            </a>
            <a id="toggle_btn" href="javascript:void(0);">
                <i class="ti ti-menu-deep"></i>
            </a>
        </div>
        <!-- /Logo -->

        <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
        </a>

        <div class="header-user">
            <div class="nav user-menu">

                <!-- Search -->

                <!-- /Search -->
                <ul>
                    <li class="d-none d-lg-block">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle d-flex align-items-center language-selects" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/front/img/flags/uz.png" class="me-2" alt="Logo">

                            </button>
                            <ul class="dropdown-menu dropdown-profile" aria-labelledby="languageDropdown">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center language-select" data-id="1" href="javascript:void(0);">
                                        <img src="/front/img/flags/en.png" class="me-2" alt="Logo">
                                        English
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center language-select" data-id="24" href="javascript:void(0);">
                                        <img src="/front/img/flags/uz.png" class="me-2" alt="Logo">
                                        Uzbek
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center language-select" data-id="25" href="javascript:void(0);">
                                        <img src="/front/img/flags/ru.png" class="me-2" alt="Logo">
                                        Русский
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>

                <div class="d-flex align-items-center">
                    <div class="me-2 site-link">
                        <a href="/" class="d-flex align-items-center justify-content-center mx-2"><i class="feather-globe mx-1"></i>Veb-saytga tashrif buyuring</a>
                    </div>
                    <div class="provider-head-links">
                        <div>
                            <a href="javascript:void(0);" id="dark-mode-toggle" class="dark-mode-toggle me-2">
                                <i class="fa-regular fa-moon"></i>
                            </a>
                            <a href="javascript:void(0);" id="light-mode-toggle" class="dark-mode-toggle me-2">
                                <i class="ti ti-sun-filled"></i>
                            </a>
                        </div>
                    </div>
                    <div class="provider-head-links">
                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center me-2  notify-link" data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="feather-bell bellcount"></i></a>
                        <div class="dropdown-menu dropdown-menu-end notification-dropdown p-4 notify-users">
                            <div class="d-flex dropdown-body align-items-center justify-content-between border-bottom p-0 pb-3 mb-3">
                                <h6 class="notification-title">Bildirishnomalar <span class="fs-18 text-gray notificationcount"></span></h6>
                                <div class="d-flex align-items-center">
                                    <a class="text-primary fs-15 me-3 lh-1 markallread">Barchasini o’qilgan qilib belgilash</a>
                                </div>
                            </div>

                            <div class="noti-content">
                                <div class="d-flex flex-column" id="notification-data">

                                </div>
                            </div>
                            <div class="d-flex p-0 notification-footer-btn">
                            </div>
                            <div class="d-flex p-0 notification-footer-btn">
                                <a href="#" class="btn btn-light rounded  me-2 cancel cancelnotify">Bekor qilish</a>
                                <a href="https://jobbank.uz/provider/notifications" class="btn btn-dark rounded viewall">Barchasini ko`rishl</a>
                            </div>
                        </div>
                    </div>
                    <div class="provider-head-links">
                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center me-2"><i class="feather-maximize"></i></a>
                    </div>
                    <div class="dropdown">
                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                            <div class="booking-user d-flex align-items-center">
                            <span class="user-img">
                                <img src="https://jobbank.uz/assets/img/profile-default.png" class="headerProfileImg" alt="user">
                            </span>
                            </div>
                        </a>
                        <ul class="dropdown-menu p-2 dropdown-profile">
                            <li><a class="dropdown-item d-flex align-items-center" href="https://jobbank.uz/provider/dashboard"><i class="ti ti-layout-grid me-1"></i>Boshqaruv paneli</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="https://jobbank.uz/provider/profile"><i class="ti ti-user me-1"></i>Mening profilim</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="https://jobbank.uz/logout"><i class="ti ti-logout me-1"></i>Chiqish</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="dropdown mobile-user-menu d-flex align-items-center w-auto">
            <div class="dropdown">
                <button class="btn dropdown-toggle d-flex align-items-center language-selects" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="/front/img/flags/uz.png" class="me-2" alt="Logo">

                </button>
                <ul class="dropdown-menu dropdown-profile" aria-labelledby="languageDropdown">
                    <li>
                        <a class="dropdown-item d-flex align-items-center language-select" data-id="1" href="javascript:void(0);">
                            <img src="/front/img/flags/en.png" class="me-2" alt="Logo">
                            English
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center language-select" data-id="24" href="javascript:void(0);">
                            <img src="/front/img/flags/uz.png" class="me-2" alt="Logo">
                            Uzbek
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center language-select" data-id="25" href="javascript:void(0);">
                            <img src="/front/img/flags/ru.png" class="me-2" alt="Logo">
                            Русский
                        </a>
                    </li>
                </ul>
            </div>
            <a href="javascript:void(0);" class="nav-link dropdown-toggle ms-2" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="https://jobbank.uz/provider/dashboard">Boshqaruv paneli</a>
                <a class="dropdown-item" href="https://jobbank.uz/provider/profile">Mening profilim</a>
                <a class="dropdown-item" href="https://jobbank.uz/logout">Chiqish</a>
            </div>
        </div>
        <!-- /Mobile Menu -->

    </div>
    <!-- /Header -->
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: 655px;"><div class="sidebar-inner slimscroll" style="overflow: hidden; width: 100%; height: 655px;">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="active">
                            <a href="https://jobbank.uz/provider/dashboard" class="active"><i class="ti ti-layout-grid"></i><span>Boshqaruv paneli</span></a>
                        </li>
                        {{--                        <li class="">--}}
                        {{--                            <a href="https://jobbank.uz/provider/leads" class="">--}}
                        {{--                                <i class="ti ti-world"></i><span>Yetakchilar</span>--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                        {{--                        <li class="">--}}
                        {{--                            <a href="https://jobbank.uz/provider/transaction" class="">--}}
                        {{--                                <i class="ti ti-credit-card"></i><span>Tranzaksiya</span>--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                        {{--                        <li class="">--}}
                        {{--                            <a href="https://jobbank.uz/provider/payouts"><i class="ti ti-wallet"></i><span>To`lov</span></a>--}}
                        {{--                        </li>--}}
                        <li class="">
                            <a href="{{ route('services.index') }}"><i class="ti ti-briefcase"></i><span>Mening xizmatim</span></a>
                        </li>
                        <li class="">
                            <a href="https://jobbank.uz/provider/bookinglist" class=""><i class="ti ti-calendar-month"></i><span>Buyurtmalar </span></a>
                        </li>
                        {{--                        <li class="">--}}
                        {{--                            <a href="https://jobbank.uz/provider/calendar" class=""><i class="ti ti-calendar"></i><span>Kalendar</span></a>--}}
                        {{--                        </li>--}}
                        <li class="">
                            <a href="https://jobbank.uz/provider/subscription" class=""><i class="ti ti-bell-plus"></i><span>Obuna</span></a>
                        </li>
                        {{--                        <li class="">--}}
                        {{--                            <a href="https://jobbank.uz/provider/reviews"><i class="ti ti-star"></i><span>Sharhlar</span></a>--}}
                        {{--                        </li>--}}
                        {{--                        <li class="">--}}
                        {{--                            <a href="https://jobbank.uz/provider/chat" class=""><i class="ti ti-message"></i><span>Chat</span></a>--}}
                        {{--                        </li>--}}
                        {{--                        <li class="">--}}
                        {{--                            <a href="https://jobbank.uz/provider/notifications" class="d-flex align-items-center ">--}}
                        {{--                                <i class="ti ti-bell me-2"></i>--}}
                        {{--                                <span>Bildirishnoma</span>--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                        <li>
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" style="background: none; border: none; cursor: pointer;">
                                    <i class="ti ti-logout-2"></i>
                                    <span>Chiqish</span>
                                </button>
                            </form>
                        </li>

                    </ul>
                </div>
            </div><div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 655.4px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
    </div>

    @yield('content')
</div>
<!-- /Main Wrapper -->


<!-- Delete Account -->
<div class="modal fade custom-modal" id="del-account">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center justify-content-between border-bottom">
                <h5 class="modal-title">Hisobni o`chirish</h5>
                <a href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled fs-20"></i></a>
            </div>
            <form id="deleteAccountForm" novalidate="novalidate">
                <div class="modal-body">
                    <p class="mb-3">Akkauntni o’chirishni tasdiqlash</p>
                    <div class="mb-0">
                        <label class="form-label">Parol</label>
                        <div class="pass-group">
                            <input type="password" class="form-control pass-input" name="password" id="password" placeholder="*************">
                            <span class="toggle-password feather-eye-off"></span>
                        </div>
                        <span class="error-text text-danger" id="password_error"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-light me-2" data-bs-dismiss="modal">Bekor qilish</a>
                    <button type="submit" class="btn btn-dark" id="deleteAccountBtn" data-id="42" data-delete="Hisobni o`chirish" data-password_required="Parol talab qilinadi.">Hisobni o`chirish</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Delete Account -->

<div id="permissionError" data-error=""></div>

<!-- Jquery JS -->
<script src="/front/js/jquery-3.7.1.min.js"></script>

<!-- jQuery validation -->
<script src="/assets/js/jquery-validation.min.js"></script>
<script src="/assets/js/jquery-validation-additional-methods.min.js"></script>
<!-- Firebase SDKs -->
<script src="https://www.gstatic.com/firebasejs/9.6.10/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.6.10/firebase-messaging-compat.js"></script>
<script src="/assets/js/fcmscript.js"></script>
<!-- Slimscroll JS -->
<script src="/front/js/jquery.slimscroll.min.js"></script>

<!-- Bootstrap JS -->
<script src="/front/js/bootstrap.bundle.min.js"></script>

<!-- Wow JS -->
<script src="/front/js/wow.min.js"></script>

<!-- Owlcarousel Js -->
<script src="/front/plugins/owlcarousel/owl.carousel.min.js"></script>

<!-- Toastr JS -->
<script src="/assets/plugins/toastr/toastr.min.js"></script>

<!-- select JS -->
<script src="/front/plugins/select2/js/select2.min.js"></script>

<!-- Datatable JS -->
<script src="/front/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/front/plugins/datatables/datatables.min.js"></script>

<script src="/front/js/cursor.js"></script>

<!-- Datepicker Core JS -->
<script src="/front/plugins/moment/moment.min.js"></script>
<script src="/front/js/bootstrap-datetimepicker.min.js"></script>

<!-- Tagsinput JS -->
<script src="/front/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>

<!-- Mobile Input -->
<script src="/front/plugins/intltelinput/js/intlTelInput.js"></script>
<script src="/front/plugins/ityped/index.js"></script>

<!-- Calendar JS -->
<script src="/assets/plugins/fullcalendar/calendar.js"></script>
<script src="/assets/js/calendarscript.js"></script>

<!-- Validation-->
<script src="/front/js/validation.js"></script>

<script src="/front/js/user-lang-script.js"></script>

<!-- Script JS -->
<script src="/front/js/script.js"></script><div class="sidebar-overlay"></div>

<!-- Home Page Script JS -->
<script src="/front/js/provider2.js"></script>


<!-- Custom JS -->
<script src="/assets/js/custom.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/resource-timegrid@6.1.8/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.8/main.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<!-- summernote JS -->
<script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>




</body>
</html>
