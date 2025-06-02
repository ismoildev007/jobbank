@extends('layouts.admin')
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

        <div class="row g-6 mb-6">
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="me-1">
                                <p class="text-heading mb-1">Sessiyalar</p>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-1 me-2">{{ $users->count() }}</h4>
                                    <p class="text-success mb-1">(+0%)</p>
                                </div>
                                <small class="mb-0">Jami Foydalanuvchilar</small>
                            </div>
                            <div class="avatar">
                                <div class="avatar-initial bg-label-primary rounded-3">
                                    <div class="icon-base ri ri-group-line icon-26px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="me-1">
                                <p class="text-heading mb-1">Providerlar</p>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-1 me-1">{{ $users->where('role', \App\Models\User::ROLE_PROVIDER)->count() }}</h4>
                                    <p class="text-success mb-1">(+0%)</p>
                                </div>
                                <small class="mb-0">O‘tgan haftadagi analitika</small>
                            </div>
                            <div class="avatar">
                                <div class="avatar-initial bg-label-danger rounded">
                                    <div class="icon-base ri ri-user-add-line icon-26px scaleX-n1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="me-1">
                                <p class="text-heading mb-1">Faol Foydalanuvchilar</p>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-1 me-1">{{ $users->where('status', 'Aktiv')->count() }}</h4>
                                    <p class="text-danger mb-1">(+0%)</p>
                                </div>
                                <small class="mb-0">O‘tgan haftadagi analitika</small>
                            </div>
                            <div class="avatar">
                                <div class="avatar-initial bg-label-success rounded-3">
                                    <div class="icon-base ri ri-user-follow-line icon-26px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="me-1">
                                <p class="text-heading mb-1">Kutilayotgan Foydalanuvchilar</p>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-1 me-1">{{ $users->where('is_verified', 0)->count() }}</h4>
                                    <p class="text-success mb-1">(+0%)</p>
                                </div>
                                <small class="mb-0">O‘tgan haftadagi analitika</small>
                            </div>
                            <div class="avatar">
                                <div class="avatar-initial bg-label-warning rounded-3">
                                    <div class="icon-base ri ri-user-search-line icon-26px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users List Table -->
        <div class="card">
            <form id="filterForm" method="GET" action="{{ route('admin.dashboard') }}">
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-0">Filtrlar</h5>
                    <div class="d-flex justify-content-between align-items-center row gx-5 pt-4 gap-5 gap-md-0">
                        <div class="col-md-4 user_role">
                            <select class="form-select" name="role" onchange="this.form.submit()">
                                <option value="">Rolni tanlang</option>
                                <option value="2" {{ $roleFilter == '2' ? 'selected' : '' }}>Admin</option>
                                <option value="1" {{ $roleFilter == '1' ? 'selected' : '' }}>Provider</option>
                                <option value="0" {{ $roleFilter == '0' ? 'selected' : '' }}>Foydalanuvchi</option>
                            </select>
                        </div>
                        <div class="col-md-4 user_plan">
                            <select class="form-select" name="status" onchange="this.form.submit()">
                                <option value="">Statusni tanlang</option>
                                <option value="Aktiv" {{ $statusFilter == 'Aktiv' ? 'selected' : '' }}>Faol</option>
                                <option value="Bloklangan" {{ $statusFilter == 'Bloklangan' ? 'selected' : '' }}>Faol emas</option>
                            </select>
                        </div>
                        <div class="col-md-4 user_status">
                            <select class="form-select" name="is_verified" onchange="this.form.submit()">
                                <option value="">Tasdiqlash holatini tanlang</option>
                                <option value="1" {{ $verifiedFilter == '1' ? 'selected' : '' }}>Tasdiqlangan</option>
                                <option value="0" {{ $verifiedFilter == '0' ? 'selected' : '' }}>Tasdiqlanmagan</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            <div class="card-datatable">
                <table class="datatables-users table">
                    <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>
                            <a href="{{ route('admin.dashboard', ['sort_by' => 'full_name', 'sort_order' => $sortBy == 'full_name' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                                Foydalanuvchi
                                @if($sortBy == 'full_name')
                                    <i class="ri {{ $sortOrder == 'asc' ? 'ri-arrow-up-line' : 'ri-arrow-down-line' }}"></i>
                                @endif
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.dashboard', ['sort_by' => 'phone', 'sort_order' => $sortBy == 'phone' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                                Telefon
                                @if($sortBy == 'phone')
                                    <i class="ri {{ $sortOrder == 'asc' ? 'ri-arrow-up-line' : 'ri-arrow-down-line' }}"></i>
                                @endif
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.dashboard', ['sort_by' => 'role', 'sort_order' => $sortBy == 'role' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                                Rol
                                @if($sortBy == 'role')
                                    <i class="ri {{ $sortOrder == 'asc' ? 'ri-arrow-up-line' : 'ri-arrow-down-line' }}"></i>
                                @endif
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.dashboard', ['sort_by' => 'status', 'sort_order' => $sortBy == 'status' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                                Status
                                @if($sortBy == 'status')
                                    <i class="ri {{ $sortOrder == 'asc' ? 'ri-arrow-up-line' : 'ri-arrow-down-line' }}"></i>
                                @endif
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('admin.dashboard', ['sort_by' => 'is_verified', 'sort_order' => $sortBy == 'is_verified' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                                Tasdiqlash
                                @if($sortBy == 'is_verified')
                                    <i class="ri {{ $sortOrder == 'asc' ? 'ri-arrow-up-line' : 'ri-arrow-down-line' }}"></i>
                                @endif
                            </a>
                        </th>
                        <th>Amallar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td></td>
                            <td>
                                @if($user->avatar)
                                    <img src="{{ $user->avatar }}" alt="Avatar" class="rounded-circle" width="40" height="40">
                                @else
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="20" cy="20" r="20" fill="#E0E0E0"/>
                                        <path d="M20 12C17.8 12 16 13.8 16 16C16 18.2 17.8 20 20 20C22.2 20 24 18.2 24 16C24 13.8 22.2 12 20 12ZM20 22C16.5 22 10 23.8 10 27V30H30V27C30 23.8 23.5 22 20 22Z" fill="#666"/>
                                    </svg>
                                @endif
                            </td>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                @if($user->role == \App\Models\User::ROLE_ADMIN)
                                    Admin
                                @elseif($user->role == \App\Models\User::ROLE_PROVIDER)
                                    Provider
                                @else
                                    Foydalanuvchi
                                @endif
                            </td>
                            <td>
                                @if($user->role == \App\Models\User::ROLE_PROVIDER)
                                    <form action="{{ route('admin.users.toggle-status', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="status" {{ $user->status === 'Aktiv' ? 'checked' : '' }} onchange="this.form.submit()">
                                            <label class="form-check-label">{{ $user->status === 'Aktiv' ? 'Faol' : 'Faol emas' }}</label>
                                        </div>
                                    </form>
                                @else
                                    <span class="badge {{ $user->status === 'Aktiv' ? 'bg-label-success' : 'bg-label-warning' }}">
                                            {{ $user->status === 'Aktiv' ? 'Faol' : 'Faol emas' }}
                                        </span>
                                @endif
                            </td>
                            <td>
                                @if($user->role == \App\Models\User::ROLE_PROVIDER)
                                    <form action="{{ route('admin.users.toggle-verification', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="is_verified" {{ $user->is_verified ? 'checked' : '' }} onchange="this.form.submit()">
                                            <label class="form-check-label">{{ $user->is_verified ? 'Tasdiqlangan' : 'Tasdiqlanmagan' }}</label>
                                        </div>
                                    </form>
                                @else
                                    <span class="badge {{ $user->is_verified ? 'bg-label-success' : 'bg-label-danger' }}">
                                            {{ $user->is_verified ? 'Tasdiqlangan' : 'Tasdiqlanmagan' }}
                                        </span>
                                @endif
                            </td>
                            <td>
                                @if($user->role == \App\Models\User::ROLE_PROVIDER)
                                    <a href="#" class="btn btn-sm btn-primary">Tahrirlash</a>
                                    <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bu foydalanuvchini o‘chirishni tasdiqlaysizmi?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">O‘chirish</button>
                                    </form>
                                @else
                                    <a href="#" class="btn btn-sm btn-primary">Tahrirlash</a>
                                    <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bu foydalanuvchini o‘chirishni tasdiqlaysizmi?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">O‘chirish</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
