<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
                <ul class="nav nav-treeview" style="border-bottom: 1px solid rgba(255,255,255, .2)">
                    <li class="nav-header">КОНТЕНТ</li>
                <li class="nav-item">

                    <li class="nav-item">
                        <a href="{{ route('admin.main_header.index') }}" class="nav-link @yield('main_header')">
                            <i class="fas fa-i-cursor nav-icon"></i>
                            <p>Welcome • Заголовок</p>
                        </a>
                    </li>

                <li class="nav-item">
                    <a href="{{ route('admin.about.index') }}" class="nav-link @yield('about')">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                            О компании
                        </p>
                    </a>
                </li>


                    <li class="nav-item">
                        <a href="{{ route('admin.banners.index') }}" class="nav-link @yield('banner')">
                            <i class="nav-icon far fa-square"></i>
                            <p>
                                Преимущества
                            </p>
                        </a>
                    </li>

                <li class="nav-item">
                    <a href="{{ route('admin.contacts.index') }}" class="nav-link @yield('contact')">
                        <i class="nav-icon fas fa-phone"></i>
                        <p>
                            Контакты
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.managers.index') }}" class="nav-link @yield('manager')">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Менеджеры
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.ip.index') }}" class="nav-link @yield('ip')">
                        <i class="nav-icon far fa-id-card"></i>
                        <p>
                            Информация об ИП
                        </p>
                    </a>
                </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.delivery.index') }}" class="nav-link @yield('delivery')">
                            <i class="nav-icon fas fa-truck"></i>
                            <p>
                                Инфо о доставке
                            </p>
                        </a>
                    </li>
            </ul>
            <ul class="nav nav-treeview" style="border-bottom: 1px solid rgba(255,255,255, .2)">
                <li class="nav-header">ТОВАРЫ</li>
                <li class="nav-item">

                    <a href="{{ route('admin.categories.index') }}" class="nav-link @yield('category')">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>
                            Категории
                        </p>
                    </a>
                </li>
                <li class="nav-item">

                    <a href="{{ route('admin.products.index') }}" class="nav-link @yield('product')">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>
                            Товары
                        </p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview" style="border-bottom: 1px solid rgba(255,255,255, .2)">
                <li class="nav-header">ОТЗЫВЫ</li>
                <li class="nav-item">

                    <a href="{{ route('admin.reviews.index') }}" class="nav-link @yield('review')">
                        <i class="nav-icon fas fa-star-half-alt"></i>
                        <p>
                            Отзывы
                        </p>
                    </a>

                </li>
            </ul>
            <ul class="nav nav-treeview" style="border-bottom: 1px solid rgba(255,255,255, .2)">
                <li class="nav-header">ЗАЯВКИ</li>
                <li class="nav-item">
                    <a href="{{ route('admin.applications.index') }}" class="nav-link @yield('applications')">
                        <i class="nav-icon far fa-address-book"></i>
                        <p>
                            Заявки
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.contacts.index') }}" class="nav-link @yield('users')">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Пользователи
                        </p>
                    </a>
                </li>
        </li>

    </ul>
    </li>

</nav>
