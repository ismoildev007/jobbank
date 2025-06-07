@extends('layouts.page')

@section('content')
    <style>
        .order-success-wrapper {
            background: linear-gradient(135deg, #f4f7f9 0%, #d9e7f7 100%);
            padding: 50px 0;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .breadcrumb-bar {
            background: linear-gradient(90deg, #4a90e2, #63b3ed);
            padding: 15px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        .breadcrumb-title {
            color: #fff;
            font-size: 1.5rem;
            font-weight: 600;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
        }

        .breadcrumb-item a {
            color: #e0f0ff;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .breadcrumb-item a:hover {
            color: #fff;
        }

        .breadcrumb-item.active {
            color: #fff;
            font-weight: 500;
        }

        .breadcrumb-bg img {
            opacity: 0.2;
            filter: blur(1px);
        }

        .success-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            text-align: center;
            max-width: 400px;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
        }

        .success-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #4a90e2, #63b3ed);
        }

        .success-icon {
            font-size: 3rem;
            color: #27ae60;
            margin-bottom: 10px;
            display: block;
        }

        .success-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .success-message {
            font-size: 0.95rem;
            color: #7f8c8d;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .phone-number {
            font-size: 1.2rem;
            font-weight: 600;
            color: #fff;
            background: linear-gradient(90deg, #4a90e2, #63b3ed);
            padding: 8px 18px;
            border-radius: 8px;
            display: inline-block;
            margin: 10px 0;
            transition: transform 0.3s ease;
        }

        .phone-number:hover {
            transform: translateY(-2px);
        }

        .btn-primary {
            background: linear-gradient(90deg, #e74c3c, #c0392b);
            border: none;
            padding: 8px 20px;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: 6px;
            color: #fff;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #c0392b, #a93226);
            transform: translateY(-2px);
            box-shadow: 0 3px 8px rgba(231, 76, 60, 0.3);
        }

        @media (max-width: 768px) {
            .success-card {
                padding: 20px;
                margin: 0 10px;
            }

            .success-icon {
                font-size: 2.5rem;
            }

            .success-title {
                font-size: 1.4rem;
            }

            .success-message {
                font-size: 0.9rem;
            }

            .phone-number {
                font-size: 1.1rem;
                padding: 6px 15px;
            }

            .btn-primary {
                font-size: 0.9rem;
                padding: 6px 18px;
            }
        }
    </style>

    <div class="breadcrumb-bar text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">{{ $service->title_uz }} uchun buyurtma</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="ti ti-home-2"></i> Bosh sahifa</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('page.service') }}">Xizmatlar</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Buyurtma</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="breadcrumb-bg">
                <img src="{{ asset('front/img/bg/breadcrumb-bg-01.png') }}" class="breadcrumb-bg-1" alt="Img">
                <img src="{{ asset('front/img/bg/breadcrumb-bg-02.png') }}" class="breadcrumb-bg-2" alt="Img">
            </div>
        </div>
    </div>

    <div class="order-success-wrapper">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="success-card">
                            <h2 class="success-title text-success">Muvaffaqiyatli!</h2>
                            <p class="success-message">
                                Sizning buyurtmangiz <strong>{{ $service->title_uz }}</strong> uchun muvaffaqiyatli yuborildi!
                            </p>
                            <p class="success-message">
                                Agar kerak bo‘lsa, ushbu xizmat bilan bog‘lanish uchun quyidagi raqamga murojaat qiling yoki tez orada <strong>{{ $service->title_uz }}</strong> siz bilan bog‘lanadi.
                            </p>
                            @if ($service->provider->phone ?? false)
                                @php
                                    $phoneRaw = $service->provider->phone;
                                    if (!str_starts_with($phoneRaw, '+998')) {
                                        if (str_starts_with($phoneRaw, '0')) {
                                            $phoneRaw = '+998' . substr($phoneRaw, 1);
                                        } else {
                                            $phoneRaw = '+998' . $phoneRaw;
                                        }
                                    }
                                    $phoneDigits = substr($phoneRaw, 4);
                                    $formattedPhone = '+998 ' . substr($phoneDigits, 0, 2) . ' ' .
                                        substr($phoneDigits, 2, 3) . ' ' .
                                        substr($phoneDigits, 5, 2) . ' ' .
                                        substr($phoneDigits, 7, 2);
                                @endphp
                                <div class="phone-number">{{ $formattedPhone }}</div>
                            @else
                                <p class="success-message text-muted">Telefon raqami mavjud emas.</p>
                            @endif
                            <a href="{{ route('page.service') }}" class="btn btn-primary mt-3">Bosh sahifaga qaytish</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
