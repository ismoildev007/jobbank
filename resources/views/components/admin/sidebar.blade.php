<ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item active open">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon icon-base ri ri-home-smile-line"></i>
            <div data-i18n="Dashboards">Dashboards</div>
            <div class="badge badge-center text-bg-danger rounded-pill ms-auto">5</div>
        </a>

    </li>
    @if(auth()->check() && auth()->user()->role === \App\Models\User::ROLE_ADMIN)
        <li class="menu-item {{ Request::is('admin/categories*') ? 'active' : '' }}">
            <a href="{{ route('categories.index') }}" class="menu-link">
                <i class="menu-icon icon-base ri ri-layout-2-line"></i>
                <div data-i18n="Categories">Category</div>
            </a>
        </li>

    @endif


    <li class="menu-item {{ Request::is('admin/services*') ? 'active' : '' }}">
        <a href="{{ route('services.index') }}" class="menu-link">
            <i class="menu-icon icon-base ri ri-file-copy-line"></i>

            <div data-i18n="Services">Services</div>
        </a>
    </li>
    <li class="menu-item  {{ Request::is('pricing') ? 'active' : '' }}">
        <a href="{{ route('pricing') }}" class="menu-link">
            <i class="menu-icon icon-base ri ri-wallet-line"></i>
            <div data-i18n="Obuna Rejasi">Narxlar Rejasi</div>
        </a>
    </li>
    <!-- Barcha Obunalar -->
    @if(auth()->check() && auth()->user()->role === \App\Models\User::ROLE_ADMIN)
    <li class="menu-item " >
        <a href="{{ route('admin.subscriptions') }}" class="menu-link">
            <i class="menu-icon icon-base ri ri-list-check"></i>
            <div data-i18n="Barcha Obunalar">Barcha Obunalar</div>
        </a>
    </li>
    @endif


</ul>
