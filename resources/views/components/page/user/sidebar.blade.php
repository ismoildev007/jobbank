@auth
    @php
        $user = Auth::user();
        $image = $user->image ?? '/assets/img/profile-default.png'; // Foydalanuvchi rasmi yoki default
        $name = $user->full_name ?? 'Foydalanuvchi';
        $createdAt = \Carbon\Carbon::parse($user->created_at)->format('M Y'); // Jun 2025 format
    @endphp

    <div class="col-xl-3 col-lg-4 theiaStickySidebar">
        <div class="theiaStickySidebar">
            <div class="card user-sidebar mb-4 mb-lg-0">
                <div class="card-header user-sidebar-header mb-4">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <span class="user rounded-circle avatar avatar-xxl mb-2">
                            <img src="{{ $image }}" alt="{{ $name }}"
                                 class="img-fluid rounded-circle headerProfileImg">
                        </span>
                        <h6 class="mb-2 headerName">{{ $name }}</h6>
                        <p class="fs-14">A'zo bo‘lgan vaqti: {{ $createdAt }}</p>
                    </div>
                </div>
                <div class="card-body user-sidebar-body p-0">
                    <ul>
                        <li class="mb-4">
                            <a href="{{ route('user.profile') }}" class="d-flex align-items-center">
                                <i class="ti ti-layout-grid me-2"></i> Sozlamalar
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="d-flex align-items-center">
                                <i class="ti ti-device-mobile me-2"></i> Buyurtmalarim
                            </a>
                        </li>
                        <li class="mb-0">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="d-flex align-items-center btn btn-link p-0 text-start w-100">
                                    <i class="ti ti-logout me-2"></i> Chiqish
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endauth
