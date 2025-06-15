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

                    <h4 class="text-center mb-2 mt-0 mt-md-4">To‘lov Ma’lumotlari</h4>
                    <p class="text-center mb-2">Tanlangan obuna va foydalanuvchi ma’lumotlari quyida keltirilgan.</p>

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
                        <div class="col-lg mb-lg-0 mb-3">
                            <div class="card border shadow-none pricing-card">
                                <div class="card-body position-relative pt-4">
                                    <div class="my-5 pt-6 text-center">
                                        <img src="{{ asset('/admin/assets/img/illustrations/pricing-' . strtolower($booking->sub->name_en) . '.png') }}" alt="{{ $booking->sub->name_uz }} Ikonasi" height="100" class="pricing-icon">
                                    </div>
                                    <h4 class="card-title text-center text-capitalize mb-2">{{ $booking->sub->name_uz }}</h4>
                                    <p class="text-center mb-5">
                                        @if($booking->sub->name_uz == 'Basic')
                                            Har bir kishi uchun oddiy boshlash
                                        @elseif($booking->sub->name_uz == 'Standard')
                                            Kichik va o'rta bizneslar uchun
                                        @else
                                            Yirik tashkilotlar uchun yechim
                                        @endif
                                    </p>
                                    <div class="text-center">
                                        <div class="d-flex justify-content-center">
                                            <h1 class="text-primary mb-0">{{ number_format($booking->price, 0, ',', ' ') }}</h1>
                                            <sub class="h6 text-body pricing-duration mt-auto mb-1"> so‘m</sub>
                                        </div>
                                    </div>

                                    <ul class="list-group ps-6 my-5 pt-4">
                                        <li class="mb-4"><strong>Foydalanuvchi:</strong> {{ auth()->user()->full_name }}</li>
                                        <li class="mb-4"><strong>Telefon:</strong> {{ auth()->user()->phone }}</li>
                                        <li class="mb-4"><strong>To‘lov Holati:</strong> {{ $paymeTransaction->payment_status }}</li>
                                        <li class="mb-4"><strong>Miqdor:</strong> {{ number_format($paymeTransaction->amount, 0, ',', ' ') }} so‘m</li>
                                    </ul>

                                    @if ($paymeTransaction->payment_status == 'pending' && $booking->price > 0)
                                        <form action="{{ route('payment') }}" method="POST" class="subscribe-form">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $booking->id }}">
                                            <button type="submit" class="btn btn-outline-primary d-grid w-100 pricing-btn">
                                                To‘lovni amalga oshirish
                                            </button>
                                        </form>
                                    @else
                                        <p class="text-success text-center">Bu bepul reja, to‘lov talab qilinmaydi.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
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
