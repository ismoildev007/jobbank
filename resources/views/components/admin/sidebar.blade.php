<ul class="menu-inner py-1">
    <!-- Dashboards -->
    @if(auth()->check() && auth()->user()->role === \App\Models\User::ROLE_ADMIN)
        <li class="menu-item">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon ri ri-dashboard-line"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>
    @endif

    <!-- Categories -->
    @if(auth()->check() && auth()->user()->role === \App\Models\User::ROLE_ADMIN)
        <li class="menu-item {{ Request::is('admin/categories*') ? 'active' : '' }}">
            <a href="{{ route('categories.index') }}" class="menu-link">
                <i class="menu-icon ri ri-stack-line"></i>
                <div data-i18n="Categories">Category</div>
            </a>
        </li>
    @endif

    <!-- Services -->
    <li class="menu-item {{ Request::is('admin/services*') ? 'active' : '' }}">
        <a href="{{ route('services.index') }}" class="menu-link">
            <i class="menu-icon ri ri-service-line"></i>
            <div data-i18n="Services">Services</div>
        </a>
    </li>

    <!-- Obuna Rejasi -->
    <li class="menu-item {{ Request::is('pricing') ? 'active' : '' }}">
        <a href="{{ route('pricing') }}" class="menu-link">
            <i class="menu-icon ri ri-money-dollar-circle-line"></i>
            <div data-i18n="Obuna Rejasi">Obuna Rejasi</div>
        </a>
    </li>

    <!-- Buyurtmalar -->
    <li class="menu-item {{ Request::is('provider/orders') ? 'active' : '' }}">
        <a href="{{ route('provider.orders') }}" class="menu-link">
            <i class="menu-icon ri ri-shopping-cart-line"></i>
            <div data-i18n="Buyurtmalar">Buyurtmalar</div>
        </a>
    </li>

    <!-- Barcha Obunalar -->
    @if(auth()->check() && auth()->user()->role === \App\Models\User::ROLE_ADMIN)
        <li class="menu-item {{ Request::is('admin/subscriptions*') ? 'active' : '' }}">
            <a href="{{ route('admin.subscriptions') }}" class="menu-link">
                <i class="menu-icon ri ri-vip-crown-line"></i>
                <div data-i18n="Barcha Obunalar">Barcha Obunalar</div>
            </a>
        </li>
    @endif

    <!-- Provider register -->
    @if(auth()->check() && auth()->user()->role === \App\Models\User::ROLE_ADMIN)
        <li class="menu-item {{ Request::is('provider/register*') ? 'active' : '' }}">
            <a href="{{ route('provider.register') }}" class="menu-link">
                <i class="menu-icon ri ri-user-add-line"></i>
                <div data-i18n="Provider register">Provider register</div>
            </a>
        </li>
    @endif
</ul>
