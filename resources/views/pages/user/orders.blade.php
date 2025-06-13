@extends('layouts.page')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="breadcrumb-bar text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Buyurtmalarim</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href=""><i class="ti ti-home-2"></i></a></li>
                            <li class="breadcrumb-item">User</li>
                            <li class="breadcrumb-item active" aria-current="page">Buyurtmalarim</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="breadcrumb-bg">
                <img src="/front/img/bg/breadcrumb-bg-01.png" class="breadcrumb-bg-1" alt="Img">
                <img src="/front/img/bg/breadcrumb-bg-02.png" class="breadcrumb-bg-2" alt="Img">
            </div>
        </div>
    </div>
    <!-- Users List Table -->
    <div class="card">
        <div class="page-wrapper">
            <div class="content">
                <div class="container">
                    <div class="row justify-content-center">
                        @include('components.page.user.sidebar')
                        <div class="col-xl-9 col-lg-8">
                            <h4 class="mb-3">Buyurtmalarim</h4>

                            <div class="card-datatable">
                                        <table class="datatables-users table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Foydalanuvchi</th>
                                                    <th>Telefon</th>
                                                    <th>Provider</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orders as $order)
                                                <tr>
                                                    <td>{{ $order->id }}</td>
                                                    <td>{{ $order->user->full_name}}</td>
                                                    <td>{{ $order->user->phone }}</td>
                                                    <td>{{ $order->provider->full_name }}</td>
                                                    <td>{{ $order->status }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- / Content -->
@endsection