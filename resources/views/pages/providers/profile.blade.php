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
    <style data-fullcalendar=""></style><link rel="stylesheet" href="https://jobbank.uz/front/css/bootstrap.min.css">

    <!-- Animation CSS -->
    <link rel="stylesheet" href="https://jobbank.uz/front/css/animate.css">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="https://jobbank.uz/front/plugins/tabler-icons/tabler-icons.css">

    <!-- Fontawesome Icon CSS -->
    <link rel="stylesheet" href="https://jobbank.uz/front/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://jobbank.uz/front/plugins/fontawesome/css/all.min.css">

    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="https://jobbank.uz/front/css/bootstrap-datetimepicker.min.css">

    <!-- Toastr CSS -->
    <link href="https://jobbank.uz/assets/plugins/toastr/toatr.css" rel="stylesheet">

    <!-- select CSS -->
    <link rel="stylesheet" href="https://jobbank.uz/front/plugins/select2/css/select2.min.css">

    <!-- Owlcarousel CSS -->
    <link rel="stylesheet" href="https://jobbank.uz/front/plugins/owlcarousel/owl.carousel.min.css">

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="https://jobbank.uz/front/plugins/datatables/datatables.min.css">

    <!-- Mobile CSS-->
    <link rel="stylesheet" href="https://jobbank.uz/front/plugins/intltelinput/css/intlTelInput.css">
    <link rel="stylesheet" href="https://jobbank.uz/front/plugins/intltelinput/css/demo.css">

    <!-- Tagsinput CSS -->
    <link rel="stylesheet" href="https://jobbank.uz/front/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">

    <!-- Feather CSS -->
    <link rel="stylesheet" href="https://jobbank.uz/front/css/feather.css">

    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="https://jobbank.uz/assets/plugins/boxicons/css/boxicons.min.css">
    <!-- FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
    <!-- summernote CSS -->
    <link rel="stylesheet" href="https://jobbank.uz/assets/plugins/summernote/summernote-bs4.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://jobbank.uz/front/css/stylenew.css">

    <!-- Custom JS -->
    <script src="https://jobbank.uz/assets/js/custom.js"></script>

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
            <a href="{{ route('provider.profile') }}" class="logo logo-normal">
                <img src="https://jobbank.uz/storage/logos/AIccKpqqNFsDwTyFgJ5sYFnDhVwQmGaE61W3ap7c.png" alt="Logo" style="width: 4rem;">
            </a>
            <a href="{{ route('provider.profile') }}" class="logo-small">
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
                        <li class="">
                            <a href="https://jobbank.uz/provider/leads" class="">
                                <i class="ti ti-world"></i><span>Yetakchilar</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="https://jobbank.uz/provider/transaction" class="">
                                <i class="ti ti-credit-card"></i><span>Tranzaksiya</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="https://jobbank.uz/provider/payouts"><i class="ti ti-wallet"></i><span>To`lov</span></a>
                        </li>
                        <li class="">
                            <a href="https://jobbank.uz/provider/service"><i class="ti ti-briefcase"></i><span>Mening xizmatim</span></a>
                        </li>
                        <li class="">
                            <a href="https://jobbank.uz/provider/bookinglist" class=""><i class="ti ti-calendar-month"></i><span>Buyurtmalar </span></a>
                        </li>
                        <li class="">
                            <a href="https://jobbank.uz/provider/calendar" class=""><i class="ti ti-calendar"></i><span>Kalendar</span></a>
                        </li>
                        <li class="">
                            <a href="https://jobbank.uz/provider/subscription" class=""><i class="ti ti-bell-plus"></i><span>Obuna</span></a>
                        </li>
                        <li class="">
                            <a href="https://jobbank.uz/provider/reviews"><i class="ti ti-star"></i><span>Sharhlar</span></a>
                        </li>
                        <li class="">
                            <a href="https://jobbank.uz/provider/chat" class=""><i class="ti ti-message"></i><span>Chat</span></a>
                        </li>
                        <li class="">
                            <a href="https://jobbank.uz/provider/notifications" class="d-flex align-items-center ">
                                <i class="ti ti-bell me-2"></i>
                                <span>Bildirishnoma</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="https://jobbank.uz/provider/ticket" class=""><i class="ti ti-ticket"></i><span>Chiptalar</span></a>
                        </li>
                        <li class="">
                            <a href="https://jobbank.uz/provider/branch"><i class="ti ti-git-branch"></i><span>Filial</span></a>
                        </li>
                        <li class="">
                            <a href="https://jobbank.uz/provider/staff-list"><i class="ti ti-users"></i><span>Xodimlar</span></a>
                        </li>
                        <li class="">
                            <a href="https://jobbank.uz/provider/roles-permissions"><i class="ti ti-shield-plus"></i><span>Rollar va Ruxsatlar</span></a>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-settings"></i><span>Sozlamalar</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li class="">
                                    <a href="https://jobbank.uz/provider/profile" class=""><i class="ti ti-chevrons-right me-2"></i>Profil Sozlamalari</a>
                                </li>
                                <li class="">
                                    <a href="https://jobbank.uz/provider/security" class=""><i class="ti ti-chevrons-right me-2"></i>Xavfsizlik Sozlamalari</a>
                                </li>
                                <li class="">
                                    <a href="https://jobbank.uz/provider/subscriptionhistory" class=""><i class="ti ti-chevrons-right me-2"></i>Reja va to`lovlar</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#del-account" id="del_account_btn"><i class="ti ti-chevrons-right me-2"></i>Hisobni o`chirish</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="https://jobbank.uz/logout"><i class="ti ti-logout-2"></i><span>Chiqish</span></a>
                        </li>
                    </ul>
                </div>
            </div><div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 655.4px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
    </div>
    <div class="page-wrapper">
        <div class="content container-fluid pb-0">
            <div class="row justify-content-center">
                <div class="col-xxl-3 col-md-6">
                    <div class="row flex-fill">
                        <div class="col-12">
                            <div class="card prov-widget">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                            <p class="mb-1 real-label">Kelgusi buyurtmalar</p>
                                            <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                            <h5><span class="counter upcomingcount real-label">0</span></h5>
                                        </div>
                                        <span class="prov-icon bg-info d-flex justify-content-center align-items-center rounded">
                                        <i class="ti ti-calendar-check"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card prov-widget">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                            <p class="mb-1 real-label">Bajarilgan buyurtmalar</p>
                                            <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                            <h5><span class="counter completecount real-label">0</span></h5>
                                        </div>
                                        <span class="prov-icon bg-success d-flex justify-content-center align-items-center rounded">
                                        <i class="ti ti-calendar-check"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card prov-widget">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                            <p class="mb-1 real-label">Bekor qilingan buyurtmalar</p>
                                            <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                            <h5><span class="counter cancelcount real-label">0</span></h5>
                                        </div>
                                        <span class="prov-icon bg-danger d-flex justify-content-center align-items-center rounded">
                                        <i class="ti ti-calendar-check"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div>
                                <div class="d-flex justify-content-center flex-column mb-3">
                                    <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                    <h6 class="text-center real-label">Umumiy daromad</h6>
                                    <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                    <h5 class="text-center totalincome real-label">So'm0</h5>

                                </div>
                                <div class="d-flex justify-content-around mb-3">
                                    <div>
                                        <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                        <p class="mb-0 real-label">Umumiy daromad</p>
                                        <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                        <h5 class="completeincome real-label">So'm0</h5>
                                    </div>
                                    <div>
                                        <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                        <p class="mb-0 real-label">To`lanishi kerak bo`lgan summa</p>
                                        <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                        <h5 class="totaldue real-label">So'm0</h5>
                                    </div>
                                </div>
                                <div id="daily-chart"></div>
                                <div class="d-flex justify-content-center flex-column">
                                    <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                    <a href="https://jobbank.uz/provider/transaction" class="btn btn-dark real-label">Barcha daromadlarni ko`rish</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                            <h6 class="mb-3 real-label">Obuna</h6>
                            <div class="d-flex gap-3 flex-warp">
                                <div class="bg-light-300 rounded p-3 w-50">
                                    <div class="d-flex justify-content-between flex-wrap row-gap-2 mb-2 nosubscribe" style="display: none;">
                                        <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                        <p class="mb-0 text-dark fw-medium subscribeplan real-label" style="display: none;">Siz hali hech qanday reja obunasiga yozilmadingiz.</p>
                                    </div>
                                    <div class="subscribedpack" style="">
                                        <div class="d-flex justify-content-between flex-wrap row-gap-2 mb-2">
                                            <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                            <span class="badge badge-success real-label">
                                            <i class="ti ti-point-filled"></i>Joriy reja
                                        </span>
                                        </div>
                                        <div class="mb-2">
                                            <p class="mb-0 text-dark fw-medium subscribedplantitle">Free</p>
                                            <span class="description"></span>
                                        </div>
                                        <div class="d-flex mb-2">
                                            <h5 class="me-2 subprice"></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-light-300 rounded p-3 w-50 topup" style="display: none;">
                                    <div class="d-flex justify-content-between flex-wrap row-gap-2 mb-2">
                                        <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                        <span class="badge badge-success real-label">
                                        <i class="ti ti-point-filled"></i>Top-Up
                                    </span>
                                    </div>
                                    <div class="mb-2">
                                        <p class="mb-0 text-dark fw-medium topupplantitle" style="display: none;"></p>
                                    </div>
                                    <div class="d-flex mb-2">
                                        <h5 class="me-2 topupprice" style="display: none;"></h5>
                                    </div>
                                </div>
                                <div class="bg-light-500 rounded p-3 popularplan" style="">
                                    <div class="d-flex justify-content-between align-items-center gap-3 mb-2">
                                        <div class="">
                                            <p class="mb-0 text-dark fw-medium plantitle">Silver</p>
                                            <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                            <span class="d-block mb-2 real-label fs-12">Kichik jamoalar uchun eng mashhur rejalarimiz.</span>
                                            <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                            <a href="https://jobbank.uz/provider/subscription" class="text-info d-block real-label fs-10">Barcha rejalarni ko`rish</a>
                                        </div>
                                        <div class="d-flex">
                                            <h5 class="planprice">So'm50.00</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                <h6 class="real-label">Eng yaxshi xizmatlar</h6>
                                <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                <a href="https://jobbank.uz/provider/service" class="btn border serviceview real-label" style="display: none;">Barchasini ko`rish</a>
                            </div>
                            <div class="servicecard"><div class="text-center">No Data Found</div></div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                <h6 class="real-label">Buyurtmalar</h6>
                                <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                <a href="https://jobbank.uz/provider/bookinglist" class="btn border bookview real-label" style="display: none;">Barchasini ko`rish</a>
                            </div>
                            <div class="bookcard"><div class="text-center">No Data Found</div></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                <h6 class="real-label">Eng so`nggi sharhlar</h6>
                            </div>
                            <div class="ratecard"><div class="text-center">No Data Found</div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div id="message-loader" class="loader-wrapper hidden">
            <div class="spinner"></div>
        </div> -->
    </div>
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
<script src="https://jobbank.uz/front/js/jquery-3.7.1.min.js"></script>

<!-- jQuery validation -->
<script src="https://jobbank.uz/assets/js/jquery-validation.min.js"></script>
<script src="https://jobbank.uz/assets/js/jquery-validation-additional-methods.min.js"></script>
<!-- Firebase SDKs -->
<script src="https://www.gstatic.com/firebasejs/9.6.10/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.6.10/firebase-messaging-compat.js"></script>
<script src="https://jobbank.uz/assets/js/fcmscript.js"></script>
<!-- Slimscroll JS -->
<script src="https://jobbank.uz/front/js/jquery.slimscroll.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://jobbank.uz/front/js/bootstrap.bundle.min.js"></script>

<!-- Wow JS -->
<script src="https://jobbank.uz/front/js/wow.min.js"></script>

<!-- Owlcarousel Js -->
<script src="https://jobbank.uz/front/plugins/owlcarousel/owl.carousel.min.js"></script>

<!-- Toastr JS -->
<script src="https://jobbank.uz/assets/plugins/toastr/toastr.min.js"></script>

<!-- select JS -->
<script src="https://jobbank.uz/front/plugins/select2/js/select2.min.js"></script>

<!-- Datatable JS -->
<script src="https://jobbank.uz/front/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="https://jobbank.uz/front/plugins/datatables/datatables.min.js"></script>

<script src="https://jobbank.uz/front/js/cursor.js"></script>

<!-- Datepicker Core JS -->
<script src="https://jobbank.uz/front/plugins/moment/moment.min.js"></script>
<script src="https://jobbank.uz/front/js/bootstrap-datetimepicker.min.js"></script>

<!-- Tagsinput JS -->
<script src="https://jobbank.uz/front/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>

<!-- Mobile Input -->
<script src="https://jobbank.uz/front/plugins/intltelinput/js/intlTelInput.js"></script>
<script src="https://jobbank.uz/front/plugins/ityped/index.js"></script>

<!-- Calendar JS -->
<script src="https://jobbank.uz/assets/plugins/fullcalendar/calendar.js"></script>
<script src="https://jobbank.uz/assets/js/calendarscript.js"></script>

<!-- Validation-->
<script src="https://jobbank.uz/front/js/validation.js"></script>

<script src="https://jobbank.uz/front/js/user-lang-script.js"></script>

<!-- Script JS -->
<script src="https://jobbank.uz/front/js/script.js"></script><div class="sidebar-overlay"></div>

<!-- Home Page Script JS -->
<script src="https://jobbank.uz/front/js/provider2.js"></script>


<!-- Custom JS -->
<script src="https://jobbank.uz/assets/js/custom.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/resource-timegrid@6.1.8/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.8/main.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<!-- summernote JS -->
<script src="https://jobbank.uz/assets/plugins/summernote/summernote-bs4.min.js"></script>




</body>
</html>
