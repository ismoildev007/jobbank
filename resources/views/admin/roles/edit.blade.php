@extends('layouts.admin')
@section('content')
    <main class="nxl-container">
        <h2 class="title mb-4 text-center">
            {{ __('User Edit') }}
        </h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow border-0 rounded-lg">
            <div class="card-header bg-gradient text-white text-center">
                <h5>
                    {{ __('User Edit') }}
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">{{ __('Email') }} <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="phone">{{ __('Phone') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="password">
                                {{ __('New Password') }}
                            </label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('Leave blank to keep current password') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password_confirmation">
                                {{ __('Confirm New Password') }}
                            </label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="{{ __('Confirm new password') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="role_id">{{ __('Role') }}</label>
                            <select class="form-control" id="role_id" name="role_id">
                                <option value="" disabled>Select {{ __('Role') }}</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status">{{ __('Status') }}</label>
                            <select class="form-control" id="status" name="status">
                                <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>{{ __('Active') }}</option>
                                <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="col-md-6">
                            <a href="{{ route('users.index') }}" class="btn btn-secondary btn-lg">
                                {{ __('Back') }}
                            </a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-lg w-100 mx-2">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <style>
        .card {
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background: linear-gradient(135deg, #007bff, #6610f2);
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .form-control {
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #6610f2;
            box-shadow: 0 0 5px rgba(102, 16, 242, 0.5);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            transform: translateY(-2px);
        }

        .btn-secondary {
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
        }

        .alert {
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .text-danger {
            font-size: 0.9rem;
        }

        .mb-3 {
            margin-bottom: 1rem !important;
        }
    </style>
@endsection
