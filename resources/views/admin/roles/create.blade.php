@extends('layouts.admin')
@section('content')
    <main class="nxl-container">
        <h2 class="title mb-4 text-center">
            {{ __('User create') }}
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
                    {{ __('User create') }}
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Name') }}" required>
                        </div>
{{--                        <div class="col-md-6 mb-3">--}}
{{--                            <label for="user_id">{{ __('User') }}</label>--}}
{{--                            <select class="form-control" id="user_id" name="user_id">--}}
{{--                                <option value="" disabled selected>Select {{ __('User') }}</option>--}}
{{--                                @foreach($users as $user)--}}
{{--                                    <option value="{{ $user->id }}">{{ $user->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
                        <h4>Ruxsatlar:</h4>
                        @foreach ($permissions as $permission)
                            <label>
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                {{ $permission->name }}
                            </label><br>
                        @endforeach
                    </div>
                    <button class="btn-primary" type="submit">create</button>
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
