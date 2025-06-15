@php use Illuminate\Support\Facades\Auth; @endphp
@extends('layouts.admin')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="pb-sm-12 pb-2 rounded-top">
                <div class="container py-2">
                    @php
                        $user = Auth::user();
                        $currentSubscription = $user ? \App\Models\Subscription::where('provider_id', $user->id)
                            ->where('end_date', '>=', now())
                            ->with('sub')
                            ->first() : null;
                    @endphp
                    @if($currentSubscription)
                        <div class="alert alert-info text-center">
                            Siz hozirda <strong>{{ $currentSubscription->sub->name_uz }}</strong> rejasi obunasidasiz. <br>
                            Obuna tugash sanasi: <strong>{{ $currentSubscription->end_date->format('d.m.Y H:i') }}</strong> <br>
                            @if($currentSubscription->sub->price > 0)
                                <form action="{{ route('subscription.restart') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-warning mt-2">Qayta boshlash</button>
                                </form>
                            @endif
                        </div>
                    @endif
                    <h4 class="text-center mb-2 mt-0 mt-md-4">Narxlar Rejasi</h4>
                    <p class="text-center mb-2">Barcha rejalar mahsulotingizni yaxshilash uchun 40+ ilg'or vositalar va funksiyalarni o'z ichiga oladi. Ehtiyojingizga mos reja tanlang.</p>
                    <div class="d-flex align-items-center justify-content-center flex-wrap gap-2 pt-7 mb-6">
                        <label class="switch switch-sm ms-sm-5 ps-sm-5 me-0">
                            <span class="switch-label fw-medium text-body pe-1 fs-6">Oylik</span>
                            <input type="checkbox" class="switch-input price-duration-toggler" checked="">
                            <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                            </span>
                            <span class="switch-label fw-medium text-body ps-9 fs-6">Yillik</span>
                        </label>
                        <div class="mt-n5 ms-n5 ml-2 mb-8 d-none d-sm-flex align-items-center gap-1">
                            <i class="icon-base ri ri-corner-left-down-fill icon-24px text-body-secondary scaleX-n1-rtl"></i>
                            <span class="badge badge-sm bg-label-primary rounded-pill mb-2">10% gacha tejang</span>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger text-center">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="pricing-plans row mx-4 gy-3 px-lg-12">
                        @foreach($subs as $index => $sub)
                            <div class="col-lg mb-lg-0 mb-3">
                                <div class="card border shadow-none pricing-card">
                                    <div class="card-body position-relative pt-4">
                                        <div class="my-5 pt-6 text-center">
                                            <img src="{{ asset('/admin/assets/img/illustrations/pricing-' . strtolower($sub->name_en) . '.png') }}" alt="{{ $sub->name_uz }} Ikonasi" height="100" class="pricing-icon">
                                        </div>
                                        <h4 class="card-title text-center text-capitalize mb-2">{{ $sub->name_uz }}</h4>
                                        <p class="text-center mb-5">
                                            @if($sub->name_uz == 'Basic')
                                                Har bir kishi uchun oddiy boshlash
                                            @elseif($sub->name_uz == 'Standard')
                                                Kichik va o'rta bizneslar uchun
                                            @else
                                                Yirik tashkilotlar uchun yechim
                                            @endif
                                        </p>
                                        <div class="text-center">
                                            <div class="d-flex justify-content-center">
                                                <h1 class="price-toggle price-yearly text-primary mb-0">{{ number_format($sub->price, 0, ',', ' ') }}</h1>
                                                <h1 class="price-toggle price-monthly text-primary mb-0 d-none">{{ number_format(round($sub->price * 1.2), 0, ',', ' ') }}</h1>
                                                <sub class="h6 text-body pricing-duration mt-auto mb-1">/oy</sub>
                                            </div>
                                            <small class="price-yearly price-yearly-toggle text-body-secondary">{{ number_format($sub->price * 12, 0, ',', ' ') }} so'm / yil</small>
                                        </div>

                                        <ul class="list-group ps-6 my-5 pt-4">
                                            @foreach(explode(',', $sub->description_uz) as $feature)
                                                <li class="mb-4">{{ trim($feature) }}</li>
                                            @endforeach
                                        </ul>

                                        <form action="{{ route('subscribe', $sub->id) }}" method="POST" class="subscribe-form">
                                            @csrf
                                            <button type="submit" class="btn {{ $currentSubscription && $currentSubscription->sub_id == $sub->id ? 'btn-outline-success' : 'btn-outline-primary' }} d-grid w-100 pricing-btn"
                                                {{ $currentSubscription && $currentSubscription->sub_id == $sub->id ? 'disabled' : '' }}>
                                                {{ $currentSubscription && $currentSubscription->sub_id == $sub->id ? 'Joriy Rejangiz' : 'Faollashtirish' }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .pricing-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #ddd !important; /* Barcha kartalar uchun bir xil chegara */
        }
        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .pricing-icon {
            transition: transform 0.3s ease;
        }
        .pricing-icon:hover {
            transform: scale(1.1);
        }
        .pricing-btn {
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .pricing-btn:hover {
            background-color: #007bff;
            color: white !important;
        }
        .btn-outline-success.pricing-btn:hover {
            background-color: #28a745;
            color: white !important;
        }
        .btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
    </style>
@endsection
