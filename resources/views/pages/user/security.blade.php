@extends('layouts.page')

@section('content')
    <div class="breadcrumb-bar text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="https://jobbank.uz/user/dashboard"><i class="ti ti-home-2"></i></a></li>
                            <li class="breadcrumb-item">User</li>
                            <li class="breadcrumb-item active" aria-current="page">Security Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="breadcrumb-bg">
                <img src="https://jobbank.uz/front/img/bg/breadcrumb-bg-01.png" class="breadcrumb-bg-1" alt="Img">
                <img src="https://jobbank.uz/front/img/bg/breadcrumb-bg-02.png" class="breadcrumb-bg-2" alt="Img">
            </div>
        </div>
    </div>
    <div class="page-wrapper" style="transform: none;">
        <div class="content" style="transform: none;">
            <div class="container" style="transform: none;">
                <div class="row justify-content-center" style="transform: none;">

                    <div class="col-xl-3 col-lg-4 theiaStickySidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

                        <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;"><div class="card user-sidebar mb-4 mb-lg-0">
                                <div class="card-header user-sidebar-header mb-4">
                                    <div class="d-flex justify-content-center align-items-center flex-column">
                <span class="user rounded-circle avatar avatar-xxl mb-2">
                                            <img src="https://jobbank.uz/assets/img/profile-default.png" alt="Default Profile Image" class="img-fluid rounded-circle headerProfileImg">
                                    </span>
                                        <h6 class="mb-2 headerName">testetstesre test</h6>
                                        <p class="fs-14"> Member Since Jun 2025</p>
                                    </div>
                                </div>
                                <div class="card-body user-sidebar-body p-0">
                                    <ul>
                                        <li class="mb-4">
                                            <a href="https://jobbank.uz/user/dashboard" class="d-flex align-items-center">
                                                <i class="ti ti-layout-grid me-2"></i>
                                                Dashboard
                                            </a>
                                        </li>
                                        <li class="mb-4">
                                            <a href="https://jobbank.uz/user/bookinglist" class="d-flex align-items-center">
                                                <i class="ti ti-device-mobile me-2"></i>
                                                Bookings
                                            </a>
                                        </li>
                                        <!-- <li class="mb-4">
                                            <a href="favourites.html" class="d-flex align-items-center">
                                                <i class="ti ti-heart me-2"></i>
                                                Favorites
                                            </a>
                                        </li>
                                        <li class="mb-4">
                                            <a href="customer-wallet.html" class="d-flex align-items-center">
                                                <i class="ti ti-wallet me-2"></i>
                                                Wallet
                                            </a>
                                        </li>
                                        <li class="mb-4">
                                            <a href="customer-reviews.html" class="d-flex align-items-center">
                                                <i class="ti ti-star me-2"></i>
                                                Reviews
                                            </a>
                                        </li> -->
                                        <li class="mb-4">
                                            <a href="https://jobbank.uz/user/chat" class="d-flex align-items-center">
                                                <i class="ti ti-message-circle me-2"></i>
                                                Chat
                                            </a>
                                        </li>
                                        <li class="mb-4">
                                            <a href="https://jobbank.uz/user/leads" class="d-flex align-items-center">
                                                <i class="ti ti-world me-2"></i>
                                                Leads
                                            </a>
                                        </li>
                                        <li class="mb-4">
                                            <a href="https://jobbank.uz/user/transaction" class="d-flex align-items-center">
                                                <i class="ti ti-credit-card me-2"></i>
                                                Transaction
                                            </a>
                                        </li>
                                        <li class="mb-4">
                                            <a href="https://jobbank.uz/user/wallet" class="d-flex align-items-center">
                                                <i class="ti ti-wallet me-2"></i>
                                                Wallet
                                            </a>
                                        </li>
                                        <li class="mb-4">
                                            <a href="https://jobbank.uz/user/notifications" class="d-flex align-items-center">
                                                <i class="ti ti-bell me-2"></i>
                                                Notification
                                            </a>
                                        </li>
                                        <li class="mb-4">
                                            <a href="https://jobbank.uz/user/ticket" class="d-flex align-items-center">
                                                <i class="ti ti-ticket me-2"></i>
                                                Tickets
                                            </a>
                                        </li>
                                        <li class="submenu mb-4">
                                            <a href="javascript:void(0);" class="d-block mb-3 active subdrop"><i class="ti ti-settings me-2"></i><span>Settings</span><span class="menu-arrow"></span></a>
                                            <ul class="ms-4" style="display: block;">
                                                <li class="mb-3">
                                                    <a href="https://jobbank.uz/user/profile" class="fs-14 d-inline-flex align-items-center"><i class="ti ti-chevrons-right me-2"></i>Profile Settings</a>
                                                </li>
                                                <li class="mb-3">
                                                    <a href="https://jobbank.uz/user/security" class="fs-14 d-inline-flex align-items-center active"><i class="ti ti-chevrons-right me-2"></i>Security Settings</a>
                                                </li>
                                                <li class="mb-3">
                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#del-account" class="fs-14" id="del_account_btn"><i class="ti ti-chevrons-right me-2"></i>Delete Account</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="mb-0">
                                            <a href="https://jobbank.uz/logout" class="d-flex align-items-center">
                                                <i class="ti ti-logout me-2"></i>
                                                Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div><div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;"><div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0px; top: 0px; transition: all; width: 340px; height: 836px;"></div></div><div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div></div></div></div></div>

                    <div class="col-xl-9 col-lg-8">
                        <h4 class="mb-3">Security Settings</h4>

                        <div class="row">
                            <div class="col-xl-4 col-md-4 d-flex mb-3">
                                <div class="linked-item flex-fill">
                                    <div class="linked-wrap">
                                        <div class="linked-acc">
                                        <span class="link-icon rounded-circle">
                                            <i class="ti ti-lock"></i>
                                        </span>
                                            <div class="linked-info">
                                                <h6 class="fs-16">Password Management</h6>
                                                <p class="text-gray fs-12 text-truncate">Last Changed:  <span class="text-dark fs-12">03/06/2025, 09:21 PM</span></p>
                                            </div>
                                        </div>
                                        <div class="linked-action">
                                            <button class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#change-password">Change Password</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-4 col-md-4 d-flex mb-3">
                                <div class="linked-item flex-fill">
                                    <div class="linked-wrap">
                                        <div class="linked-acc">
                                        <span class="link-icon rounded-circle">
                                            <i class="ti ti-circle-check-filled text-success"></i>
                                        </span>
                                            <div class="linked-info">
                                                <h6 class="fs-16">Device Management</h6>
                                                <p class="text-gray fs-12 text-truncate">Last Changed:
                                                    <span class="text-dark fs-12">
                                                    03/06/2025, 09:30 PM
                                                </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="linked-action">
                                            <button class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#device-management">Manage</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
