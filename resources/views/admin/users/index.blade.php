@extends('layouts.admin')
@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">
                            <th>{{ __('general.admin_list') }}</th>
                        </h5>
                    </div>
                </div>
                <div class="page-header-right ms-auto">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">
                        <i class="feather-plus me-2"></i>
                        {{ __('general.admin_create') }}
                    </a>
                </div>
            </div>

            <div class="main-content">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="table-responsive">
                <table class="table dataTable">
                    <thead class="">
                    <tr>
                        <th>{{ __('id') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('email') }}</th>
                        <th>{{ __('phone') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $admin)
                        <tr>
                            <td class="text-center px-3">
                                <a href="{{ route('users.edit', $admin->id) }}" class="avatar-text avatar">{{ $admin->id }}</a>
                            </td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->phone }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </main>
@endsection
