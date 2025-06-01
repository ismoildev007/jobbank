<!-- Основной контейнер боковой панели -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="Изображение пользователя">
        </div>
        <div class="info text-white-50">
         Администратор
        </div>
    </div>
    <div class="sidebar">
        <!-- Меню боковой панели -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Дашборд
                        </p>
                    </a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('categories.index')}}" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-list"></i>--}}
{{--                        <p>--}}
{{--                            Категории--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('products.index')}}" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-box"></i>--}}
{{--                        <p>--}}
{{--                            Продукты--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </nav>
        <!-- /.Меню боковой панели -->
    </div>
    <!-- /.Боковая панель -->
</aside>
