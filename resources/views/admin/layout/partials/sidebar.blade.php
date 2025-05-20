<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link d-flex flex-column justify-items-center align-items-center">
        <img src="{{ asset('assets/img/logo-white.png') }}" alt="" style="width: 90%">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="pb-3 mt-3 mb-3 user-panel d-flex">
            <div class="info d-flex align-items-center">
                <a href="#" class="d-block">
                    {{ auth()->user()->name }}
                </a>
                <a class="py-1 ml-3 btn btn-sm btn-danger" href="{{ route('logout') }}">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                {{-- ----------------------------- --}}
                {{-- ********* DASHBOARD ********* --}}
                {{-- ----------------------------- --}}
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" @class(['nav-link', 'active' => request()->routeIs('dashboard')])>
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>

                {{-- ----------------------------- --}}
                {{-- ********* COUNTRIES ********* --}}
                {{-- ----------------------------- --}}
                <li class="nav-item">
                    <a href="{{ route('dashboard.countries.index') }}" @class([
                        'nav-link',
                        'active' => request()->routeIs('dashboard.countries.*'),
                    ])>
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Countries
                        </p>
                    </a>
                </li>

                {{-- ----------------------------- --}}
                {{-- ********* CATEGORIES ********* --}}
                {{-- ----------------------------- --}}
                <li class="nav-item">
                    <a href="{{ route('dashboard.history-categories.index') }}" @class([
                        'nav-link',
                        'active' => request()->routeIs('dashboard.history-categories.*'),
                    ])>
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>

                {{-- ----------------------------- --}}
                {{-- ********* CARS ********* --}}
                {{-- ----------------------------- --}}
                <li class="nav-item">
                    <a href="{{ route('dashboard.cars.index') }}" @class([
                        'nav-link',
                        'active' => request()->routeIs('dashboard.cars.*'),
                    ])>
                        <i class="nav-icon fas fa-car"></i>
                        <p>
                            Cars
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
