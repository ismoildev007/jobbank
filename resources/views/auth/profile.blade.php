@extends('layouts.page')
@section('content')
    <!-- Start Page Header -->
    <div class="page-header py-4 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"><i class="icon-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Мой профиль</li>
                        </ol>
                    </nav>
                    <h2 class="entry-title text-primary">Мой профиль</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Header -->

    <div class="section py-5">
        <div class="container">
            <div class="row">
                <!-- Orders Sidebar -->
                <div class="col-md-4">
                    <div class=" shadow-sm mb-4">
                        <div class="card-header bg-primary text-white text-center">
                            <h3>Мой профиль</h3>
                        </div>
                        <div class="card-body">
                            <!-- Profilni yangilash formasi -->
                            <form action="" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3" style="margin-top: 5px!important;">
                                    <label for="name" class="form-label">Имя</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                                </div>
                                <div class="mb-3" style="margin-top: 5px!important;">
                                    <label for="email" class="form-label">Эл. почта</label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
                                </div>
                                <div class="d-flex justify-content-between" style="margin-top: 15px!important;">
                                    <button type="submit" class="btn btn-primary w-50 me-2">Сохранить</button>
                                </div>
                            </form>

                            <!-- Logout formasi -->
                            <form action="{{ route('logout') }}" method="POST" class="mt-3">
                                @csrf
                                <button class="btn btn-danger w-100">Выйти</button>
                            </form>
                        </div>

                    </div>
                </div>

                <div class="col-md-8">
                    <div class=" ">
                        <div class="card-header bg-secondary text-white text-center">
                            <h5>История заказов</h5>
                        </div>
                        <div class="">
                            @if($orders->isEmpty())
                                <p class="text-center text-muted">Вы еще не сделали ни одного заказа.</p>
                            @else
                               <div class="row">
                                   <ul class="list-group list-group-flush">
                                       @foreach ($orders as $order)

                                           <li class="col-md-6 list-group-item order-item ">
                                               <div class="d-flex justify-content-between align-items-center mb-3">
                                                   <div>
                                                       <span class="order-id"><strong>Заказ №{{ $order->id }}</strong></span>
                                                       <span class="order-status badge bg-success text-white ms-3">{{ $order->status }}</span>
                                                   </div>
                                                   <div class=" ms-3">{{ $order->total_amount }} UZS</div>
                                                   <small class="text-muted">{{ $order->created_at->format('d.m.Y H:i') }}</small>
                                               </div>
                                               <div>
                                                   <h6>Товары в заказе:</h6>
                                                   <ul class="product-list">
                                                       @foreach ($order->items as $item)
                                                           <li class="product-item">
                                                               <span class="product-name"><strong>{{ $item->product->name_ru }}</strong></span>
                                                               <span> — {{ $item->quantity }} шт.</span>
                                                               <span> по ${{ number_format($item->price, 2) }}</span>
                                                           </li>
                                                       @endforeach
                                                   </ul>
                                               </div>
                                           </li>
                                       @endforeach
                                   </ul>
                               </div>
                            @endif
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>
    <


@endsection
