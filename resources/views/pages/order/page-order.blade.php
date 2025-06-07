@extends('layouts.page')

@section('content')
    <style>
        /* Umumiy sahifa stillari */
        .order-page-wrapper {
            background: linear-gradient(145deg, #e0eafc 0%, #cfdef3 100%);
            padding: 50px 0;
            position: relative;
            overflow: hidden;
        }

        /* Breadcrumb dizayni */
        .breadcrumb-bar {
            background: linear-gradient(90deg, #007bff, #00c4ff);
            padding: 20px 0;
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        }

        .breadcrumb-title {
            color: #fff;
            font-size: 2rem;
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .breadcrumb-item a {
            color: #fff;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .breadcrumb-item a:hover {
            color: #e0eafc;
        }

        .breadcrumb-item.active {
            color: #e0eafc;
            font-weight: 600;
        }

        .breadcrumb-bg img {
            opacity: 0.3;
            filter: blur(2px);
        }

        /* Forma kartasi */
        .order-form-card {
            background: #fff;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            margin-top: 40px;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .order-form-card:hover {
            transform: translateY(-5px);
        }

        .order-form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #007bff, #00c4ff);
        }

        .order-form-card .form-label {
            font-weight: 600;
            color: #2c3e50;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .order-form-card .form-control {
            border-radius: 12px;
            border: 1px solid #e0e0e0;
            padding: 14px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .order-form-card .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.3);
            background: #fff;
        }

        .order-form-card textarea {
            resize: vertical;
            min-height: 120px;
        }

        .submit-btn {
            background: linear-gradient(90deg, #007bff, #00c4ff);
            border: none;
            padding: 14px;
            font-size: 1.2rem;
            font-weight: 600;
            border-radius: 12px;
            color: #fff;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .submit-btn:hover {
            background: linear-gradient(90deg, #0056b3, #0096cc);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
        }

        .submit-btn::after {
            content: '→';
            position: absolute;
            right: 20px;
            opacity: 0;
            transition: opacity 0.3s ease, right 0.3s ease;
        }

        .submit-btn:hover::after {
            opacity: 1;
            right: 15px;
        }

        /* Xato xabarlari */
        .text-danger {
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Mobil qurilmalar uchun */
        @media (max-width: 768px) {
            .order-page-wrapper {
                padding: 30px 0;
            }

            .order-form-card {
                padding: 25px;
                margin-top: 20px;
            }

            .breadcrumb-title {
                font-size: 1.5rem;
            }

            .submit-btn {
                font-size: 1rem;
                padding: 12px;
            }
        }

        @media (max-width: 576px) {
            .order-form-card {
                padding: 20px;
            }

            .form-control {
                font-size: 0.9rem;
                padding: 12px;
            }
        }
    </style>

    <div class="breadcrumb-bar text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2 pt-5">{{ $service->title_uz }} uchun buyurtma</h2>
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

    <div class="order-page-wrapper">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <!-- Buyurtma formasi -->
                        <div class="order-form-card">
                            <form method="POST" action="{{ route('order.create', $service->id) }}">
                                @csrf
                                <div class="mb-4">
                                    <label for="name" class="form-label">
                                        <i class="ti ti-user"></i> Ism <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="name" id="name" class="form-control" required
                                           placeholder="Ismingizni kiriting" value="{{ old('name', Auth::user()->full_name ?? '') }}">
                                    @error('name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="address" class="form-label">
                                        <i class="ti ti-map-pin"></i> Manzil <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="address" id="address" class="form-control" required
                                           placeholder="Manzilingizni kiriting" value="{{ old('address') }}">
                                    @error('address')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="additional_phone" class="form-label">
                                        <i class="ti ti-phone"></i> Qo‘shimcha telefon raqami
                                    </label>
                                    <input type="text" name="additional_phone" id="additional_phone" class="form-control"
                                           placeholder="+998 90 123 45 67" value="{{ old('additional_phone') }}">
                                    @error('additional_phone')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="notes" class="form-label">
                                        <i class="ti ti-notes"></i> Qo‘shimcha izohlar
                                    </label>
                                    <textarea name="notes" id="notes" class="form-control" rows="5"
                                              placeholder="Buyurtma haqida qo‘shimcha ma’lumot">{{ old('notes') }}</textarea>
                                    @error('notes')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn submit-btn w-100">Buyurtma berish</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Telefon raqami formatlash
        document.getElementById('additional_phone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.startsWith('998')) {
                value = '+' + value;
                if (value.length > 4) value = value.slice(0, 4) + ' ' + value.slice(4);
                if (value.length > 7) value = value.slice(0, 7) + ' ' + value.slice(7);
                if (value.length > 11) value = value.slice(0, 11) + ' ' + value.slice(11);
                if (value.length > 14) value = value.slice(0, 14) + ' ' + value.slice(14);
            }
            e.target.value = value;
        });
    </script>
@endsection
