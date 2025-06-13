<ul class="menu-inner py-1">
    <!-- Dashboards -->
    @if(auth()->check() && auth()->user()->role === \App\Models\User::ROLE_ADMIN)

    <li class="menu-item  ">
        <a href="{{ route('admin.dashboard') }}" class="menu-link ">
            <i class="menu-icon ri ri-home-smile-line"></i>
            <div data-i18n="Dashboards">Dashboards</div>
        </a>
    </li>
    @endif

    @if(auth()->check() && auth()->user()->role === \App\Models\User::ROLE_ADMIN)
        <li class="menu-item {{ Request::is('admin/categories*') ? 'active' : '' }}">
            <a href="{{ route('categories.index') }}" class="menu-link">
                <i class="menu-icon ri ri-layout-2-line"></i>
                <div data-i18n="Categories">Category</div>
            </a>
        </li>
    @endif

    <li class="menu-item {{ Request::is('admin/services*') ? 'active' : '' }}">
        <a href="{{ route('services.index') }}" class="menu-link">
            <i class="menu-icon ri ri-file-copy-line"></i>
            <div data-i18n="Services">Services</div>
        </a>
    </li>

    <li class="menu-item {{ Request::is('pricing') ? 'active' : '' }}">
        <a href="{{ route('pricing') }}" class="menu-link">
            <i class="menu-icon ri ri-wallet-line"></i>
            <div data-i18n="Obuna Rejasi">Obuna Rejasi</div>
        </a>
    </li>

    <li class="menu-item {{ Request::is('provider/orders') ? 'active' : '' }}">
        <a href="{{ route('provider.orders') }}" class="menu-link">
            <i class="menu-icon ri ri-list-check"></i>
            <div data-i18n="Buyurtmalar">Buyurtmalar</div>
        </a>
    </li>

    @if(auth()->check() && auth()->user()->role === \App\Models\User::ROLE_ADMIN)
        <li class="menu-item {{ Request::is('admin/subscriptions*') ? 'active' : '' }}">
            <a href="{{ route('admin.subscriptions') }}" class="menu-link">
                <i class="menu-icon ri ri-list-check"></i>
                <div data-i18n="Barcha Obunalar">Barcha Obunalar</div>
            </a>
        </li>
    @endif

    @if(auth()->check() && auth()->user()->role === \App\Models\User::ROLE_ADMIN)
        <li class="menu-item {{ Request::is('provider/register*') ? 'active' : '' }}">
            <a href="{{ route('provider.register') }}" class="menu-link">
                <i class="menu-icon ri ri-list-check"></i>
                <div data-i18n="Provider register">Provider register</div>
            </a>
        </li>
    @endif
</ul>
