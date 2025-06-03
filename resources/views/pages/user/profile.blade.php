@extends('layouts.page')

@section('content')
    <div class="breadcrumb-bar text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Settings</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href=""><i class="ti ti-home-2"></i></a></li>
                            <li class="breadcrumb-item">User</li>
                            <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
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

    <div class="page-wrapper">
        <div class="content">
            <div class="container">
                <div class="row justify-content-center">
                    @include('components.page.user.sidebar')

                    <div class="col-xl-9 col-lg-8">
                        <h4 class="mb-3">Profile Settings</h4>

                        <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Full Name *</label>
                                    <input type="text" name="first_name" class="form-control" value="{{ old('full_name', Auth::user()->full_name) }}">
                                    @error('full_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Phone Number *</label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone', Auth::user()->phone) }}">
                                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Email *</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', Auth::user()->email) }}">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                            </div>



                            <div class="mt-3">
                                <button type="submit" class="btn btn-jobbank">Save Changes</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
