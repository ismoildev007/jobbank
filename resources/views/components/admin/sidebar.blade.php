<ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item active open">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon icon-base ri ri-home-smile-line"></i>
            <div data-i18n="Dashboards">Dashboards</div>
            <div class="badge badge-center text-bg-danger rounded-pill ms-auto">5</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ Request::is('admin/categories*') ? 'active' : '' }}">
            <a href="{{ route('categories.index') }}" class="menu-link">
                    <div data-i18n="Categories">Category</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/services*') ? 'active' : '' }}">
            <a href="{{ route('services.index') }}" class="menu-link">
                    <div data-i18n="Services">Services</div>
                </a>
            </li>

        </ul>
    </li>

    <!-- Layouts -->
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon icon-base ri ri-layout-2-line"></i>
            <div data-i18n="Layouts">Layouts</div>
        </a>

        <ul class="menu-sub">
            <li class="menu-item">
                <a href="layouts-collapsed-menu.html" class="menu-link">
                    <div data-i18n="Collapsed menu">Collapsed menu</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="layouts-content-navbar.html" class="menu-link">
                    <div data-i18n="Content navbar">Content navbar</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="layouts-content-navbar-with-sidebar.html" class="menu-link">
                    <div data-i18n="Content nav + Sidebar">Content nav + Sidebar</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="../horizontal-menu-template/" class="menu-link" target="_blank">
                    <div data-i18n="Horizontal">Horizontal</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="layouts-without-menu.html" class="menu-link">
                    <div data-i18n="Without menu">Without menu</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="layouts-without-navbar.html" class="menu-link">
                    <div data-i18n="Without navbar">Without navbar</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="layouts-fluid.html" class="menu-link">
                    <div data-i18n="Fluid">Fluid</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="layouts-container.html" class="menu-link">
                    <div data-i18n="Container">Container</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="layouts-blank.html" class="menu-link">
                    <div data-i18n="Blank">Blank</div>
                </a>
            </li>
        </ul>
    </li>

    <!-- Front Pages -->
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon icon-base ri ri-file-copy-line"></i>
            <div data-i18n="Front Pages">Front Pages</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="../front-pages/landing-page.html" class="menu-link" target="_blank">
                    <div data-i18n="Landing">Landing</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="../front-pages/pricing-page.html" class="menu-link" target="_blank">
                    <div data-i18n="Pricing">Pricing</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="../front-pages/payment-page.html" class="menu-link" target="_blank">
                    <div data-i18n="Payment">Payment</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="../front-pages/checkout-page.html" class="menu-link" target="_blank">
                    <div data-i18n="Checkout">Checkout</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="../front-pages/help-center-landing.html" class="menu-link" target="_blank">
                    <div data-i18n="Help Center">Help Center</div>
                </a>
            </li>
        </ul>
    </li>
    <!-- Narxlar Rejasi -->
    <li class="menu-item">
        <a href="{{ route('pricing') }}" class="menu-link">
            <i class="menu-icon icon-base ri ri-wallet-line"></i>
            <div data-i18n="Obuna Rejasi">Narxlar Rejasi</div>
        </a>
    </li>
    <!-- Barcha Obunalar -->
    <li class="menu-item">
        <a href="{{ route('admin.subscriptions') }}" class="menu-link">
            <i class="menu-icon icon-base ri ri-list-check"></i>
            <div data-i18n="Barcha Obunalar">Barcha Obunalar</div>
        </a>
    </li>


</ul>
