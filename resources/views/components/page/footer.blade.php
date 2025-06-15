@if (!Request::is('service') && !Request::is('servicedetail/*'))
    <footer class="d-none">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-xl-4">
                    <div class="footer-widget">
                        <div class="card bg-light-200 border-0 mb-3">
                            <div class="card-body">
                                <h5 class="mb-3">Ro‘yxatdan o‘ting va obuna bo‘ling</h5>
                                <form id="subscriberForm" autocomplete="off" novalidate="novalidate">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="subscriber_email"
                                               id="subscriber_email"
                                               placeholder="Elektron pochta manzilingizni kiriting">
                                        <span class="text-danger error-text" id="subscriber_email_error"></span>
                                    </div>
                                    <button type="submit" class="btn-sm btn-jobbank w-100" id="subscriberBtn">Obuna
                                        bo‘ling
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="d-flex align-items-center ">
                            <h6 class="fs-14 fw-normal me-2">Ilovamizni yuklab oling</h6>
                            <img src="/front/img/icons/app-store.svg" class="me-2" alt="img">
                            <img src="/front/img/icons/goolge-play.svg" class="me-2" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <div>
                            <p class="mb-2 text-start"></p>
                        </div>
                        <ul class="menu-links mb-2">
                            <li>
                                <a href="/terms-conditions">Shartlar va Qoidalar</a>
                            </li>
                            <li>
                                <a href="/privacy-policy">Maxfiylik Siyosati</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
    <footer class="jobbank-footer py-4">
        <div class="container">
            <!-- Main Title -->
            <div class="text-center mb-4">
                <div class="d-inline-flex align-items-center gap-3 mb-3 flex-wrap justify-content-center">
                    <div class="icon-circle">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h3 class="mb-0 fw-bold text-primary"> Jobbank.uz qanday ishlaydi?</h3>
                </div>
                <div class="title-line mx-auto"></div>
            </div>

            <!-- Steps Section -->
            <div class="row g-3 mb-4">
                <!-- Step 1 -->
                <div class="col-12">
                    <div class="step-card step-blue d-flex align-items-start p-4 rounded-3">
                        <div class="step-num step-num-blue me-3 flex-shrink-0">1</div>
                        <p class="mb-0 fs-5 fw-medium">O'zingizga kerakli xizmat turini tanlang.</p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="col-12">
                    <div class="step-card step-blue d-flex align-items-start p-4 rounded-3">
                        <div class="step-num step-num-blue-light me-3 flex-shrink-0">2</div>
                        <p class="mb-0 fs-5 fw-medium">Ustani tanlang va <strong class="text-primary fs-5">"Buyurtma berish"</strong> tugmasini bosing.</p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="col-12">
                    <div class="step-card step-blue d-flex align-items-start p-4 rounded-3">
                        <div class="step-num step-num-blue-dark me-3 flex-shrink-0">3</div>
                        <div class="flex-grow-1">
                            <p class="mb-2 fs-5 fw-medium">Kerakli manzilni, telefon raqamingizni kiriting va buyurtmani tasdiqlang.</p>
                            <div class="d-flex gap-2 justify-content-start">
                                <i class="fas fa-map-marker-alt text-primary fs-4"></i>
                                <i class="fas fa-phone text-primary fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Success Badge -->
            <div class="text-center mb-4">
                <span class="badge bg-primary-subtle text-primary px-4 py-3 rounded-pill fs-5 fw-medium">
                    <i class="fas fa-check-circle me-2 fs-5"></i>
                    Xizmat muvaffaqiyatli bajariladi!
                </span>
            </div>

            <!-- Copyright -->
            <hr class="my-2">
            <div class="text-center ">
                <p class="mb-3 text-muted fs-6">
                    © 2025 <span class="fw-bold text-primary fs-6">Jobbank.uz</span>. Barcha huquqlar himoyalangan.
                </p>
                <div class="d-flex justify-content-center gap-4 flex-wrap d-none d-md-block">
                    <a href="#" class="text-decoration-none text-muted fs-6 hover-link">Maxfiylik siyosati</a>
                    <a href="#" class="text-decoration-none text-muted fs-6 hover-link">Foydalanish shartlari</a>
                    <a href="#" class="text-decoration-none text-muted fs-6 hover-link">Yordam</a>
                </div>
            </div>
        </div>
    </footer>

    <style>
        :root {
            --primary-blue: #2563eb;
            --primary-blue-light: #3b82f6;
            --primary-blue-dark: #1d4ed8;
            --primary-blue-extra-light: #60a5fa;
        }

        .jobbank-footer {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: auto;
        }

        .icon-circle {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--primary-blue-light), var(--primary-blue-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .icon-circle i {
            color: white;
            font-size: 18px;
        }

        .title-line {
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-blue-light), var(--primary-blue));
            border-radius: 2px;
        }

        .step-card {
            background: white;
            border: 1px solid #e2e8f0;
            transition: all 0.2s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .step-card:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 16px rgba(37, 99, 235, 0.1);
            border-color: var(--primary-blue-light);
        }

        .step-num {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 18px;
            color: white;
            margin-top: 2px;
        }

        /* Ko'k rangning turli soyalari */
        .step-num-blue {
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-dark));
            box-shadow: 0 3px 10px rgba(37, 99, 235, 0.3);
        }

        .step-num-blue-light {
            background: linear-gradient(135deg, var(--primary-blue-light), var(--primary-blue));
            box-shadow: 0 3px 10px rgba(59, 130, 246, 0.3);
        }

        .step-num-blue-dark {
            background: linear-gradient(135deg, var(--primary-blue-dark), #1e3a8a);
            box-shadow: 0 3px 10px rgba(29, 78, 216, 0.4);
        }

        .hover-link:hover {
            color: var(--primary-blue-light) !important;
        }

        .bg-primary-subtle {
            background-color: #dbeafe !important;
        }

        .text-primary {
            color: var(--primary-blue) !important;
        }

        /* Font size improvements */
        h3 {
            font-size: 1.5rem !important;
        }

        .fs-5 {
            font-size: 1.1rem !important;
        }

        .fs-6 {
            font-size: 0.95rem !important;
        }

        /* Mobile optimizations */
        @media (max-width: 768px) {
            h3 {
                font-size: 1.3rem !important;
            }

            .fs-5 {
                font-size: 1rem !important;
            }

            .step-card {
                padding: 16px !important;
            }

            .step-num {
                width: 36px;
                height: 36px;
                font-size: 16px;
                margin-right: 12px !important;
            }
        }

        @media (max-width: 576px) {
            h3 {
                font-size: 1.2rem !important;
                text-align: center;
            }

            .step-card {
                padding: 14px !important;
            }

            .step-num {
                width: 34px;
                height: 34px;
                font-size: 15px;
                margin-right: 10px !important;
            }

            .fs-5 {
                font-size: 0.95rem !important;
                line-height: 1.4;
            }

            .badge {
                font-size: 0.9rem !important;
                padding: 8px 16px !important;
            }

            .d-flex.gap-4 {
                flex-direction: column;
                gap: 8px !important;
            }
        }

        @media (max-width: 400px) {
            .step-num {
                width: 32px;
                height: 32px;
                font-size: 14px;
                margin-right: 8px !important;
            }

            .fs-5 {
                font-size: 0.9rem !important;
            }
        }
    </style>

@endif
